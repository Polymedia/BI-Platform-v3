{use class="app\components\Filter"}
{use class="app\components\Table"}

{Filter::widget([
    "name" => "filter_project",
    "source" => ["SQLTable", "Проекты", "Проект"]
])}

{Filter::widget([
    "name" => "filter_classification",
    "source" => ["SQLTable", "ТипыЗамечаний", "Тип_замечания"]
])}

{Filter::widget([
    "name" => "filter_podryadchik",
    "source" => ["SQLTable", "ПодрядчикиПредписания", "Подрядчик"]
])}

{Filter::widget([
    "name" => "filter_zamechaniya",
    "source" => ["SQLTable", "СтатусыЗаявкиЗавершение", "Статус_завершения"]
])}

{Filter::widget([
    "name" => "filter_datefrom",
    "source" => ["SQLTable", "Предписания", "Дата_выдачи", true, ["датавыдачи" => "DESC"]]
])}

{Filter::widget([
    "name" => "filter_dateto",
    "source" => ["SQLTable", "Предписания", "Плановая_дата_устранения", true, ["плановаядатаустранения" => "DESC"]]
])}

{Table::widget([
    "name" => "table_predpisaniya", 
    "source" => ["SQLTable", "Предписания"],
    "filters" => ["filter_project1" => "проект"]
])}
