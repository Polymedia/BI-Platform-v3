{use class="app\components\Filter"}
{use class="app\components\Table"}

{Filter::widget([
    "name" => "filter_project",
    "source" => ["SQLTable", table => "Проекты", columns => "Проект"]
])}

{Filter::widget([
    "name" => "filter_classification",
    "source" => ["SQLTable", table => "ТипыЗамечаний", columns => "Тип_замечания"]
])}

{Filter::widget([
    "name" => "filter_podryadchik",
    "source" => ["SQLTable", table => "ПодрядчикиПредписания", columns => "Подрядчик"]
])}

{Filter::widget([
    "name" => "filter_zamechaniya",
    "source" => ["SQLTable", table => "СтатусыЗаявкиЗавершение", columns => "Статус_завершения"]
])}

{Filter::widget([
    "name" => "filter_datefrom",
    "source" => ["SQLTable", table => "Предписания", columns => "Дата_выдачи", distinct => true, order => ["датавыдачи" => "DESC"]]
])}

{Filter::widget([
    "name" => "filter_dateto",
    "source" => ["SQLTable", table => "Предписания", columns => "Плановая_дата_устранения", distinct => true, order => ["плановаядатаустранения" => "DESC"]]
])}

{Table::widget([
    "name" => "table_predpisaniya", 
    "source" => ["SQLTable", table => "Предписания", "columns" => ["Проекты.Проект", "ТипыЗамечаний.Тип_замечания"]],
    "filters" => ["filter_project" => "Проекты.проект", "filter_classification" => "ТипыЗамечаний.типзамечания"]
])}
