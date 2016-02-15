<?php

namespace app\datasource;

use app\datasource\DataSource;

class TableSource extends DataSource
{
    public $table;
    public $columns;
    public $distinct;
    public $order;
    
    private $query;
    private $tableMap;
    
    function __construct(Array $args)
    {
        parent::__construct($args);
        
        // Get table name
        if (array_key_exists('table', $args))
            $this->table = $args['table'];
        else
            $this->table = $args[1];
            
        $this->table = strval($this->table);
            
        // Get certain columns
        if (array_key_exists('columns', $args))
            $this->columns = $args['columns'];
        else if (count($args) > 2)
            $this->columns = $args[2];
            
        if ($this->columns && !is_array($this->columns))
            $this->columns = [$this->columns];
            
        // Get distinct option
        if (array_key_exists('distinct', $args))
            $this->distinct = (bool)$args['distinct'];
        else if (count($args) > 3)
            $this->distinct = (bool)$args[3];
            
        // Get OrderBy option
        if (array_key_exists('order', $args))
            $this->order = $args['order'];
        else if (count($args) > 4)
            $this->order = $args[4];
            
        if ($this->order && !is_array($this->order))
            $this->order = [$this->order => 'ASC'];
        
        // Create query
        $class = '\\' . $this->table . 'Query';
        $this->query = $class::create();
        
        // Apply different options
        // Filter columns
        if ($this->columns)
            $this->query = $this->query->select($this->columns);
            
        // Filter columns
        if ($this->distinct)
            $this->query = $this->query->distinct();
            
        // Order by
        if ($this->order)
            foreach ($this->order as $name => $order) {
                $method = 'orderBy' . $name;
                $this->query = $this->query->$method($order);
            }
    }
    
    public function header()
    {
        if ($this->columns)
            return $this->columns;

        // Get columns mapping
        $class = '\\Map\\' . $this->table . 'TableMap';
        $table = $class::getTableMap();
        $columns = $table->getColumns();
        
        $result = [];
        foreach ($columns as $column) {
            $result[] = $column->getName();
        }
        
        return $result;
    }
    
    public function filter(Array $filters)
    {
        foreach ($filters as $name => $filter) {
            $method = 'filterBy' . $name;
            $this->query = $this->query->$method($filter);
        }
    }

    public function getIterator()
    {
        return $this->query->find()->getIterator();
    }
    
    public function count()
    {
        return $this->query->count();
    }
}