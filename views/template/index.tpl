{use class="app\components\Select"}
{use class="app\components\HistogramWidget"}
{use class="miloschuman\highcharts\Highcharts"}
{use class="miloschuman\highcharts\HighchartsAsset"}
{use class="app\components\ChildDashboard"}
{assign "hc" HighchartsAsset::register($this)->withScripts(['highcharts', 'modules/exporting', 'modules/drilldown', 'modules/data'])}

{Select::widget(['name' => 'filter_region'])}
<br>
{ChildDashboard::widget(['label' => 'Не нажимай меня!'])}

{HistogramWidget::widget(['name' => 'widget_hist', 'title' => "Динамическая перерисовка"])}

{HistogramWidget::widget(['name' => 'widget_hist2', 'title' => "Мое название"])}