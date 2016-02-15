<?php

namespace app\components;

use yii\web\View;
use yii\base\Widget;
use yii\helpers\Html;

use app\components;
use yii\helpers\Json;

class PieWidget extends Widget
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
        $series = [];
        if (isset($this->view->params[$this->name . '_series'])) {
            $series = $this->view->params[$this->name . '_series'];
        }

        $id = $this->getId();

        $series_hc = [];

        foreach ($series as $k => $v) {
            $series_hc[] = ['name' => $k, 'y' => floatval($v)];
        }

        // TODO: придумать что-то с name
        $series_hc = [['name' => ' ', 'data' => $series_hc]];

        echo '<script type="text/javascript">';
        echo "var data_series_${id} = ".Json::encode($series_hc, JSON_PRETTY_PRINT).";";
        echo '</script>';

        echo '<div id="'.$id.'" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>';

        $text2 ='
        function refreshChart'.$id.'() {
            var chart = $(\'#'.$id.'\').highcharts();

            while (chart.series.length > 0) {
                chart.series[0].remove(false);
            }
            data_series_'.$id.'.forEach(function (serie) {
                chart.addSeries(serie, false);
            });
            chart.redraw();
        }

        $(\'#'.$id.'\').highcharts({
            chart: {
                type: \'pie\'
            },
            title: {
                text: "'.$this->title.'"
            },
            subtitle: {
                text: "'.$this->subtitle.'"
            },
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