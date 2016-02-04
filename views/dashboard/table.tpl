{use class="yii\grid\GridView"}
{use class="yii\helpers\Url"}
{use class="yii\widgets\ActiveForm" type="block"}
{use class="yii\helpers\Html"}
{use class="app\components\MultipleSelect"}
{use class="app\components\HistogramWidget"}
{use class="miloschuman\highcharts\Highcharts"}
{use class="miloschuman\highcharts\HighchartsAsset"}
{use class="app\components\ChildDashboard"}
{assign "hc" HighchartsAsset::register($this)->withScripts(['highcharts', 'modules/exporting', 'modules/drilldown', 'modules/data'])}



<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        {if $filter_region}
            {$filter_region}
        {else}
            Выберите регион
        {/if}
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        {foreach $filter_region_all as $region}
            <li><a href="{Url::current(['filter_region' => $region])}">{$region}</a></li>
        {/foreach}
    </ul>
</div>

{MultipleSelect::widget(['name' => 'filter_people', 'allValues' => $filter_people_all, 'selectedValues' => $filter_people,
'initialText' => 'Select Names...'])}



<div id="container2" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>

{ChildDashboard::widget()}
{HistogramWidget::widget(['model2' => $model2, 'title' => "Безработные"])}

{GridView::widget(['dataProvider' => $dataProvider])}

    <script type="text/javascript">
        var data2 = [ {foreach $model2 as $model}
            {$model->getUnemploymentYouth()},
            {/foreach}
        ]
    </script>

{MultipleSelect::widget(['name' => 'filter_people', 'allValues' => $filter_people_all, 'selectedValues' => $filter_people,
                        'initialText' => 'Select Names...'])}

{GridView::widget(['dataProvider' => $dataProvider2])}
<script type="text/javascript">    function refreshChart() {


        var chart2 = $('#container2').highcharts();
        chart2.series[0].setData(data2);
    }</script>


{registerJs}        {*@formatter:off*}

    $('#container').highcharts({
        title: {
            text: 'Unemployment'
        },
        xAxis: [{
            categories: [
                {foreach $model2 as $model}
                '{$model->getRegionName()}',
                {/foreach},
            ]
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: {literal} '{value}', {/literal}
            },
            title: {
                text: 'Count',
            }
        }],
        tooltip: {
            shared: true
        },
        series: [{
            name: 'Tokyo',
            type: 'column',
            data: data
        }]
    });

        $('#container2').highcharts({
        title: {
            text: 'Unemployment'
        },
        xAxis: [{
            categories: [
                {foreach $model2 as $model}
                '{$model->getRegionName()}',
                {/foreach},
            ]
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: {literal} '{value}', {/literal}
            },
            title: {
                text: 'Count',
            }
        }],
        tooltip: {
            shared: true
        },
        series: [{
            name: 'Tokyo',
            type: 'column',
            data: data2
        }]
    });

    $(document).on('pjax:complete', refreshChart);
{/registerJs}
