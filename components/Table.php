<?php

namespace app\components;

use yii\helpers\Html;

class Table extends Widget
{
    public $header;
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {      
        if (!$this->header)
            $this->header = $this->data->header();
        
        echo Html::beginTag('table', ['id' => $this->name, 'class' => 'table table-bordered']);
        // Header
        echo Html::beginTag('tr');
        foreach ($this->header as $head)
            echo Html::tag('th', strval($head));
        echo Html::endTag('tr');
        // Data
        foreach ($this->data as $item) {         
            echo Html::beginTag('tr');
            foreach (Widget::toArray($item) as $value)
                echo Html::tag('td', strval($value));
            echo Html::endTag('tr');
        }
        echo Html::endTag('table');
        
        parent::run();
    }
}