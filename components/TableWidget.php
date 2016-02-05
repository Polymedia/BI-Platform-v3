<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 04.02.2016
 * Time: 10:45
 */

namespace app\components;

use yii\widgets\InputWidget;
use yii\helpers\Html;

use app\components;

class TableWidget extends InputWidget
{
    public $title;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo '<table class="table table-bordered">';
        foreach ($this->view->params[$this->name] as $item) {
            echo '<tr>';
                foreach($item as $value) {
                    echo '<td>';
                    echo $value;
                    echo '</td>';
                }
            echo '</tr>';
        }
        echo '</table>';
        parent::run();
    }
}