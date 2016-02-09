<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Url;

class Select extends Widget {

    public $allValues;
    public $selectedValue;
    public $name;
    public $initialText;

    private $_allValues = [];

    public function init()
    {
        $this->allValues = $this->view->params[$this->name.'_all'];
        $this->selectedValue = $this->view->params[$this->name];

        foreach ($this->allValues as $k => $v)
            $this->_allValues[$v] = $v;

        parent::init();
    }

    public function run()
    {
        $id = $this->getId();

        echo '
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu_'.$id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">';

        if ($this->selectedValue)
            echo $this->selectedValue;
        else
            echo $this->initialText;

        echo '<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu_'.$id.'">';

        foreach ($this->allValues as $v) {
            echo "<li><a href=".Url::current([$this->name => $v]).">${v}</a></li>";
        }

        echo '</ul>
            </div>';
    }
}