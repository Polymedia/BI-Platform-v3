<?php

namespace app\datasource;

abstract class DataSource implements \IteratorAggregate, \Countable
{
    public $type = 'unknown';
    
    public static function type(Array $args)
    {
        if (array_key_exists('name', $args))
            return strval($args['name']);
        else
            return strval($args[0]);
    }
    
    public static function create(Array $args)
    {
        $type = DataSource::type($args);
        $class = __NAMESPACE__ . '\\' . ucfirst($type) . 'Source';
        return new $class($args);
    }
    
    function __construct(Array $args)
    {
        $this->type = DataSource::type($args);
    }

    abstract public function header(); // Column names
    abstract public function filter(Array $filters); // Filter data with associative array
}