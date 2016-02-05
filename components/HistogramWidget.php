<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.02.2016
 * Time: 16:37
 */

namespace app\components;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;

use app\components;
use yii\helpers\Json;

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

        $series_hc = [];
        foreach ($series as $k => $v){
            foreach ($v as $i => $val) {
                $v[$i] = (float)$val;
            }

            $series_hc[] = [
                'name' => $k,
                'type' => 'column',
                'data' => $v,
            ];


        }

        echo '<script type="text/javascript">';
        echo "var data_series_${id} = ".Json::encode($series_hc, JSON_PRETTY_PRINT).";";
        echo "var data_categories_${id} = ".Json::encode($categories, JSON_PRETTY_PRINT).";";
        echo '</script>';

        echo '<div id="'.$id.'" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>';

        $text2 ='
        function refreshChart'.$id.'() {
            var chart = $(\'#'.$id.'\').highcharts();
            //chart.series[0].setData(data_series_'.$id.');

            while (chart.series.length > 0) {
                chart.series[0].remove(false);
            }
            chart.xAxis[0].setCategories(data_categories_'.$id.');
            data_series_'.$id.'.forEach(function (serie) {
                chart.addSeries(serie, false);
            });
            chart.redraw();
        }

        $(\'#'.$id.'\').highcharts({
        title: {
        text: "'.$this->title.'"
        },
        xAxis: [{
        categories: data_categories_'.$id.'
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
            series: data_series_'.$id.',
        });

        $(document).on(\'pjax:complete\', refreshChart'.$id.');';
        $this->view->registerJs($text2);

        parent::run();
    }
}