<?php

namespace app\datasource;

use app\datasource\DataSource;

class ArraySource extends DataSource
{
    public $values = [];
    public $headerRow = FALSE;
    
    private $position = 0;
    
    function __construct(Array $args)
    {
        parent::__construct($args);
        
        if (array_key_exists('values', $args))
            $this->values = $args['values'];
        else
            $this->values = $args[1];
            
        // Check integrity
        if (!is_array($this->values))
            $this->values = [$this->values];
            
        if (array_key_exists('headerRow', $args))
            $this->headerRow = (bool)$args['headerRow'];
        else if (count($args) > 2)
            $this->headerRow = (bool)$args[2];
    }
    
    public function header()
    {
        if ($this->headerRow && count($this->values) > 0) {
            if (is_array($this->values[0]))
                return $this->values[0];
            else
                return [$this->values[0]];
        }
        
        // Dummy header
        $heads = range(1, count($this->values[0]));
        $header = [];
        foreach ($heads as $head)
            $header[] = strval($head);
            
        return $header;
    }
    
    public function filter(Array $filters)
    {
        $header = $this->header();
        
        $ifilters = [];
        foreach ($filters as $key => $value) {
            $index = array_search($key, $header);
            $ifilters[$index] = $value;
        }
        
        $values = [];
        foreach ($this->values as $index => $value) {
            if ($index == 0 && $this->headerRow)
                $values[] = $value;
            else {
                foreach ($ifilters as $key => $filter) {
                    if (is_array($value)) {
                        if (in_array($value[$key], $filter))
                            $values[] = $value;
                    } else {
                        if (in_array($value, $filter))
                            $values[] = $value;
                    }
                }
            }
        }
        $this->values = $values;
    }

    public function getIterator()
    {
        $values = $this->headerRow ? array_slice($this->values, 1) : $this->values; 
        return new \ArrayIterator($values);
    }
    
    public function count()
    {
        return count($this->values);
    }
}