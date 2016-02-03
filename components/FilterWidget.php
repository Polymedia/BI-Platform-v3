<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 01.02.2016
 * Time: 17:12
 */

namespace app\components;

use yii\helpers\Html;
use kartik\select2\Select2;

use app\components;

class FilterWidget extends Select2
{
    public $allValues;
    public $selectedValues;
    public $initialText;

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
        $this->options = ['multiple' => true, 'placeholder' => $this->initialText];

        parent::init();
    }

    public function run()
    {
        echo '<form id="form1" data-pjax-exclude method="GET">';
        parent::run();
        echo '<div class="form-group"><div class="col-lg-11">';
        echo Html::submitButton('Select users', ['class' => 'btn btn-primary']);
        echo '</div></div></form>';
    }
}