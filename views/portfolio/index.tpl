{use class="app\components\TableWidget"}
{use class="app\components\ProjectWidget"}


{use class="yii\grid\GridView"}
{use class="yii\helpers\Url"}
{use class="yii\widgets\ActiveForm" type="block"}
{use class="yii\helpers\Html"}
{use class="app\components\FilterWidget"}
{use class="app\components\HistogramWidget"}
{use class="miloschuman\highcharts\HighchartsAsset"}
{use class="app\components\ChildDashboard"}
{use class="miloschuman\highcharts\Highcharts"}
{assign "hc" HighchartsAsset::register($this)->withScripts(['highcharts', 'modules/exporting', 'modules/drilldown', 'modules/data'])}


{foreach $projects as $key => $project}
<div class="container fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="/img/{$project["Проекты.Картинка"]}" class="img-responsive">
                </div>
                <div class="col-md-8">
                    <p>
                        Руководитель проекта
                    </p>
                    <p>
                        <b>
                            {$project["Проекты.Руководитель"]}
                        </b>
                    </p>
                    <br>
                    <p>
                        Заказчик
                    </p>
                    <p>
                        <b>
                            {$project["Проекты.Заказчик"]}
                        </b>
                    </p>
                    <br>
                    <p>
                        Подрядчики
                    </p>
                    <p>
                        <b>
                            {$project["Проекты.Подрядчики"]}
                        </b>
                    </p>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <p>
                {HistogramWidget::widget(['name' => "widget_portfolio_{$key}", 'title' => "Безработные"])}
            </p>
        </div>
        <div class="col-md-4">
            <p>
                Content
            </p>
        </div>
    </div>
</div>

{/foreach}



