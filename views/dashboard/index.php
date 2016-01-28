<?php

use miloschuman\highcharts\Highmaps;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Url;

?>

    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?php echo $yearSelected; ?>
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <?php foreach($possibleYears as $year): ?>
                <li><a href="<?php echo Url::current(['filter_region' => $year]); ?>"><?php echo $year; ?></a></li>
            <?php endforeach; ?>

        </ul>
    </div>

<?php
echo Highmaps::widget([
    'options' => [
        'title' => [
            'text' => 'Highmaps basic demo',
        ],
        'mapNavigation' => [
            'enabled' => true,
            'buttonOptions' => [
                'verticalAlign' => 'bottom',
            ]
        ],
        'colorAxis' => [
            'min' => 0,
        ],
        'series' => [
            [
                'data' => $data,
                'mapData' => new JsExpression('Highcharts.maps["countries/kz/kz-all"]'),
                'joinBy' => 'hc-key',
                'name' => 'Unemployment Adult for 2001 year',
                'states' => [
                    'hover' => [
                        'color' => '#BADA55',
                    ]
                ],
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '{point.name}',
                ]
            ]
        ]
    ]
]);

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Fruit Consumption'],
        'xAxis' => [
            'categories' => $possibleYears
        ],
        'yAxis' => [
            'title' => ['text' => 'Fruit eaten']
        ],
        'series' => $dataChart
    ]
]);
