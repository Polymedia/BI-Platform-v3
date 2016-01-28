{use class="yii\grid\GridView"}
{use class="yii\widgets\Pjax"}
{use class="yii\helpers\Url"}

{assign "startPjax" Pjax::begin()}

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

{GridView::widget(['dataProvider' => $dataProvider])}


{*$this->registerJs("var options = ".json_encode($options).";", View::POS_END, 'my-options');*}

{assign "endPjax" Pjax::end()}