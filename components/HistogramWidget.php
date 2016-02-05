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
    public $title = "Title";
    public $subtitle = "";

    public $name;


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (isset($this->view->params[$this->name . '_series'])) {
            $series = $this->view->params[$this->name . '_series'];
        } else {
            //echo var_dump("RDEFDGFD");
            return;
        }

        if (isset($this->view->params[$this->name . '_categories'])) {
            $categories = $this->view->params[$this->name . '_categories'];
        } else {
            //echo var_dump("dcgdgdf");
            return;
        }

        //echo var_dump($series);

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

            if (chart.series.length == 1) {
                chart.series[0].setData(data_series_'.$id.'[0].data);
                return;
            }
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
        subtitle: {
            text: "'.$this->subtitle.'"
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