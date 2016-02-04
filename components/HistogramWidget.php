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

    public $model2;

    public $tmp1, $tmp2;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $text = '<script type="text/javascript"> var data = [';

        foreach ($this->model2 as $model) {
            $text .=  $model->getUnemploymentYouth().',';
        }

        $text .= ']</script>';

        echo $text;

        $id = $this->getId();

        echo '<div id="'.$id.'" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>';

        $text2 ='
        function refreshChart() {
            var chart = $(\'#'.$id.'\').highcharts();
            chart.series[0].setData(data);
        }

        $(\'#'.$id.'\').highcharts({
        title: {
        text: "'.$this->title.'"
        },
        xAxis: [{
        categories: [';

        foreach ($this->model2 as $model) {
            $text2 .=  '"'.$model->getRegionName().'",';
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
                data: data
            }]
        });

        $(document).on(\'pjax:complete\', refreshChart);';
        $this->view->registerJs($text2);



        parent::run();
    }
}