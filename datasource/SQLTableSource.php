<?php

namespace app\datasource;

use app\datasource\DataSource;

class SQLTableSource extends DataSource
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
        $this->table = DataSource::value($args, 'table', 1);
        $this->table = strval($this->table);
            
        // Get certain columns
        $this->columns = DataSource::value($args, 'columns', 2);
        if ($this->columns && !is_array($this->columns))
            $this->columns = [$this->columns];
            
        // Get distinct option
        $this->distinct = (bool)DataSource::value($args, 'distinct', 3);
            
        // Get OrderBy option
        $this->order = DataSource::value($args, 'order', 3);
        if ($this->order && !is_array($this->order))
            $this->order = [$this->order => 'ASC'];
        
        $this->build();
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
            $names = explode('.', $name, 2);
            if (count($names) > 1) {
                $useMethod = 'use' . $names[0] . 'Query';
                $filterMethod = 'filterBy' . $names[1];
                $this->query = $this->query->$useMethod()->$filterMethod($filter)->endUse();  
            } else {
                $method = 'filterBy' . $name;
                $this->query = $this->query->$method($filter);   
            }
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
    
    private function build()
    {
        // Create query
        $class = '\\' . $this->table . 'Query';
        $this->query = $class::create();
        
        // Apply different options
        // Filter columns
        if ($this->columns) {
            foreach ($this->columns as $column) {
                $names = explode('.', $column, 2);
                if (count($names) > 1) {
                    $method = 'use' . $names[0] . 'Query';
                    $this->query = $this->query->$method()->endUse();
                }  
            }
            $this->query = $this->query->select($this->columns);
        }
            
        // Filter columns
        if ($this->distinct)
            $this->query = $this->query->distinct();
            
        // Order by
        if ($this->order) {
            foreach ($this->order as $name => $order) {
                $method = 'orderBy' . $name;
                $this->query = $this->query->$method($order);
            }
        }
    }
}