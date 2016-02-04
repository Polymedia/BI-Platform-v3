<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class MultipleSelect extends Widget {

    public $allValues;
    public $selectedValues;
    public $name;

    public function init()
    {
        $this->allValues = $this->view->params[$this->name.'_all'];
        $this->selectedValues = $this->view->params[$this->name];

        MultipleSelectAsset::register($this->view);
        parent::init();
    }

    public function run()
    {
        $id = $this->getId();

        echo Html::beginForm('','get', ['id' => $id, 'class'=>'invisible', 'data-pjax' => '1']);
        echo Html::beginTag("select", ['multiple' => 'multiple', 'style' => 'width: 300px;', 'name' => $this->name]);
        echo Html::renderSelectOptions($this->selectedValues, $this->allValues);
        echo Html::endTag("select");
        echo Html::submitButton('OK',['style' => 'margin: 0 5px;']);
        echo Html::endForm();

        echo "<script type='text/javascript'>";
        echo "$('#${id}').removeClass('invisible');";
        echo "$('#${id} select').multipleSelect()";
        echo "</script>";
    }
} 