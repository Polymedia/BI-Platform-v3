<?php

namespace app\components;

use Yii;
use app\datasource\DataSource;
use app\datasource\ArraySource;

class Widget extends \yii\base\Widget
{
    public $name;
    public $source;
    public $filters;
    
    protected $data;

    public function init()
    {
        parent::init();
        
        // Create unique name if not set
        if (!$this->name) {
            $class = get_class($this);
            $class = strtolower($class);
            $this->name = uniqid($class);
        }
        
        // Create dummy data source
        if (!$this->source)
            $this->source = ['array', [['value_1_1', 'value_1_2'], ['value_2_1', 'value_2_2']]];
            
        $this->data = DataSource::create($this->source);
        
        // Filter data
        $filter = $this->filter();
        if ($filter)
            $this->data->filter($filter);
    }

    public function run()
    {
        parent::run();
    }
    
    static public function toArray($item)
    {
        if (is_array($item))
            return $item;
        else if (method_exists($item, 'toArray'))
            return $item->toArray();
        else
            return [$item];
    }
    
    protected function filter()
    {
        if (!$this->filters)
            return NULL;
            
        $get = Yii::$app->request->get();
        $values = [];
        foreach ($this->filters as $key => $value) {
            if (isset($get[$key]))
                $values[$value] = $get[$key];   
        }
        
        return $values;
    }
}