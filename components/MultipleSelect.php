<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class MultipleSelect extends Widget {

    public $allValues;
    public $selectedValues;
    public $initialText;
    public $name;
    public $data;
    public $value;

    public function init()
    {
        $allValuesTmp = $this->allValues;

        foreach ($allValuesTmp as $v)
        {
            $allValuesTmp2[$v] = $v;
        }

        $selectedValuesTmp = $this->selectedValues;

        if ($selectedValuesTmp)
            foreach ($selectedValuesTmp as $v)
            {
                $selectedValuesTmp2[$v] = $v;
            }
        else
            $selectedValuesTmp2 = null;


        $this->data = $allValuesTmp2;
        $this->value = $selectedValuesTmp2;

        MultipleSelectAsset::register($this->view);
        parent::init();
    }

    public function run()
    {
        $id = $this->getId();

        echo Html::beginForm('','get', ['id' => $id, 'class'=>'invisible', 'data-pjax' => '1']);
        echo Html::beginTag("select", ['multiple' => 'multiple', 'style' => 'width: 300px;']);
        echo Html::renderSelectOptions($this->value, $this->data);
        echo Html::endTag("select");
        echo Html::submitButton('OK',['style' => 'margin: 0 5px;']);
        echo Html::endForm();

        echo "<script type='text/javascript'>";
        echo "$('#${id}').removeClass('invisible');";
        echo "$('#${id} select').multipleSelect()";
        echo "</script>";
    }
} 