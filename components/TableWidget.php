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

    public $data;


    public function init()
    {
        //echo var_dump($this->data);
        parent::init();
    }

    public function run()
    {
        echo '<table border="1">';
        foreach ($this->data as $item) {
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