<?php

namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\helpers\StringHelper;

use app\assets\FilterAsset;

class Filter extends Widget
{  
    public $multiple;
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        FilterAsset::register($this->view);
        
        $values = [];
        foreach ($this->data as $value) {
            $value = strval($value);
            $values[$value] = $value;
        }
        
        $default = $this->multiple ? array_keys($values) : key($values);
        $selected = $this->selected($default);
        
        // Setup options
        $options = [
            'id' => $this->name, 
            'name' => $this->name . '[]',
            'style' => 'width: 300px;'
        ];
        
        if ($this->multiple)
            $extra = ['multiple' => 'multiple'];
        else
            $extra = [
                'class' => 'selectpicker', 
                'onchange' => 'this.form.submit()'
            ];
            
        $options = array_merge($options, $extra);
        
        // Render
        echo Html::beginTag('div');
        echo Html::beginTag('select', $options);
        echo Html::renderSelectOptions($selected, $values);
        echo Html::endTag("select");
        echo Html::endTag('div');
        
        if ($this->multiple) {
            echo Html::beginTag('script', ['type' => 'text/javascript']);
            echo "$('select[multiple]').multipleSelect({onClose: function () { $('form').submit() } })";
            echo Html::endTag('script');
        } else {
            echo Html::beginTag('script', ['type' => 'text/javascript']);
            echo "$('.selectpicker').selectpicker()";
            echo Html::endTag('script');
        }
        
        parent::run();
    }
    
    private function selected($default)
    {
        $get = Yii::$app->request->get();
        if (isset($get[$this->name]))
            return $get[$this->name];
        
        return $default;
    }
}