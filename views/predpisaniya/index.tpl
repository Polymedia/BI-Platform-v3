{use class="app\components\MultipleSelect"}
{*{use class="app\components\ChildDashboard"}*}

{use class="app\components\TableWidget"}

Проект
{MultipleSelect::widget(['name' => 'filter_project'])}

Классификация

{MultipleSelect::widget(['name' => 'filter_classification'])}


Подрядчик

{MultipleSelect::widget(['name' => 'filter_podryadchik'])}


<b>Распределение предписаний от органов, выдавших замечания, подрядчикам и субподрядчикам</b>
<br>
Замечания

{MultipleSelect::widget(['name' => 'filter_zamechaniya'])}

Дата от:

{MultipleSelect::widget(['name' => 'filter_datefrom'])}

Дата до:

{MultipleSelect::widget(['name' => 'filter_dateto'])}

{*{ChildDashboard::widget()}*}

{TableWidget::widget(['name' => 'widget_xz'])}

{TableWidget::widget(['name' => 'widget_xz_1'])}