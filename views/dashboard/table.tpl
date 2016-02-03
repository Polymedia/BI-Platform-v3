{use class="yii\grid\GridView"}
{use class="yii\helpers\Url"}
{use class="yii\widgets\ActiveForm" type="block"}
{use class="yii\helpers\Html"}
{use class="app\components\FilterWidget"}
{use class="app\components\HistogramWidget"}
{use class="miloschuman\highcharts\Highcharts"}
{use class="miloschuman\highcharts\HighchartsAsset"}
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


    <div id="container" data-pjax-exclude style="min-width: 310px; height: 400px; margin: 0 auto"></div>



{HistogramWidget::widget(['model2' => $model2, 'title' => "Безработные"])}

{GridView::widget(['dataProvider' => $dataProvider])}

{FilterWidget::widget(['name' => 'filter_people', 'allValues' => $filter_people_all, 'selectedValues' => $filter_people,
                        'initialText' => 'Select Names...'])}
{GridView::widget(['dataProvider' => $dataProvider2])}
