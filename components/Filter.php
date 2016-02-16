<?php

namespace app\components;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;

use app\assets\FilterAsset;

class Filter extends Widget
{  
    public $multiple;
    public $method;
    public $default;
    public $placeholder;
    
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
        
        if (!$this->default)
            $default = $this->multiple ? array_keys($values) : key($values);
            
        $selected = $this->selected($this->default);
        
        // Setup options
        $options = [
            'id' => $this->name, 
            'name' => $this->name . '[]',
            'style' => 'width: 300px;',
            'class' => 'selectpicker'
        ];
        
        $extra = ['title' => 'Not selected'];
        if ($this->multiple)
            $extra['multiple'] = 'multiple';
            
        if ($this->placeholder)
            $extra['title'] = strval($this->placeholder);
            
        $options = array_merge($options, $extra);
        
        if (!$this->method)
            $this->method = 'get';
        
        // Render
        echo Html::beginForm(Url::canonical(), $this->method, ['data-pjax' => '1', 'id' => $this->name]);
        echo Html::beginTag('div');
        echo Html::beginTag('select', $options);
        echo Html::renderSelectOptions($selected, $values);
        echo Html::endTag("select");
        echo Html::endTag('div');
        echo Html::endForm();
        
        $jsinit = "
            $('.selectpicker').selectpicker();
            $('.selectpicker').on('hide.bs.select', function (e) {
                this.form.submit();
            });
        ";
        $this->view->registerJs($jsinit);
        
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