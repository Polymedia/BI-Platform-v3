<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class MultipleSelect extends Widget {

    public $allValues;
    public $selectedValues;
    public $name;

    private $_allValues = [];

    public function init()
    {
        MultipleSelectAsset::register($this->view);

        $this->allValues = $this->view->params[$this->name.'_all'];
        $this->selectedValues = $this->view->params[$this->name];

        foreach ($this->allValues as $k => $v)
            $this->_allValues[$v] = $v;

        parent::init();
    }

    public function run()
    {
        $id = $this->getId();

        echo Html::beginTag('div');
        echo Html::beginTag("select", ['id' => $id, 'multiple' => 'multiple', 'class'=>'invisible', 'style' => 'width: 300px;', 'name' => $this->name.'[]']);
        echo Html::renderSelectOptions($this->selectedValues, $this->_allValues);
        echo Html::endTag("select");
        echo Html::submitButton('OK',['style' => 'margin: 0 5px;']);
        echo Html::endTag('div');

        echo "<script type='text/javascript'>";
        echo "$('#${id}').removeClass('invisible');";
        echo "$('#${id}').multipleSelect()";
        echo "</script>";
    }
} 