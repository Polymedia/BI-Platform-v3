<?php

namespace app\datasource;

abstract class DataSource implements \IteratorAggregate, \Countable
{
    public $type = 'unknown';
    
    public static function value(Array $items, $name, $index)
    {
        if (array_key_exists($name, $items))
            return $items[$name];
        else if (count($items) > $index)
            return $items[$index];
            
        return NULL;
    }
    
    public static function type(Array $args)
    {
        return strval(DataSource::value($args, 'type', 0));
    }
    
    public static function create(Array $args)
    {
        $type = DataSource::type($args);
        $class = __NAMESPACE__ . '\\' . $type . 'Source';
        return new $class($args);
    }
    
    function __construct(Array $args)
    {
        $this->type = DataSource::type($args);
    }

    abstract public function header(); // Column names
    abstract public function filter(Array $filters); // Filter data with associative array
}