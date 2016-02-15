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
            $this->header = (bool)$args['headerRow'];
        else if (count($args) > 2)
            $this->header = (bool)$args[2];
    }
    
    public function header()
    {
        if ($this->headerRow && count($this->values) > 0)
            return $this->values[0];
        
        // Dummy header
        $heads = range(1, $this->columns());
        $header = [];
        foreach ($heads as $head)
            $header[] = strval($head);
            
        return $header;
    }
    
    public function filter(Array $filters)
    {
        
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->values);
    }
    
    public function count()
    {
        return count($this->values);
    }
}