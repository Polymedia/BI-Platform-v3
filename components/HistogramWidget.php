<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.02.2016
 * Time: 16:37
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

use app\components;

class HistogramWidget extends Widget
{
    public $title;

    public $name;

    public $model2;


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $series = $this->view->params[$this->name.'_series'];
        $categories = $this->view->params[$this->name.'_categories'];
        $id = $this->getId();


        $text = '<script type="text/javascript"> var data'.$id.' = [';


        foreach ($series as $serie)
            $text .= $serie.',';


        $text .= ']</script>';

        echo $text;


        echo '<div id="'.$id.'" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>';

        $text2 ='
        function refreshChart() {
            var chart = $(\'#'.$id.'\').highcharts();
            chart.series[0].setData(data'.$id.');
        }

        $(\'#'.$id.'\').highcharts({
        title: {
        text: "'.$this->title.'"
        },
        xAxis: [{
        categories: [';


        foreach ($categories as $category) {
            $text2 .= $category.',';
        }

        $text2 .= ']
        }],
        yAxis: [{ // Primary yAxis
        labels: {
            format: \'{value}\',
            },
        title: {
            text: \'Count\',
            }
        }],
            tooltip: {
            shared: true
            },
            series: [{
            name: \'Tokyo\',
                type: \'column\',
                data: data'.$id.'
            }]
        });

        $(document).on(\'pjax:complete\', refreshChart);';
        $this->view->registerJs($text2);

        parent::run();
    }
}