{use class="app\components\Filter"}
{use class="app\components\Table"}

{Filter::widget([
    "name" => "filter_project",
    "source" => ["table", "Проекты", "Проект"]
])}

{Filter::widget([
    "name" => "filter_classification",
    "source" => ["table", "ТипыЗамечаний", "Тип_замечания"]
])}

{Filter::widget([
    "name" => "filter_podryadchik",
    "source" => ["table", "ПодрядчикиПредписания", "Подрядчик"]
])}

{Filter::widget([
    "name" => "filter_zamechaniya",
    "source" => ["table", "СтатусыЗаявкиЗавершение", "Статус_завершения"]
])}

{Filter::widget([
    "name" => "filter_datefrom",
    "source" => ["table", "Предписания", "Дата_выдачи", true, ["датавыдачи" => "DESC"]]
])}

{Filter::widget([
    "name" => "filter_dateto",
    "source" => ["table", "Предписания", "Плановая_дата_устранения", true, ["плановаядатаустранения" => "DESC"]]
])}

{Table::widget([
    "name" => "table1", 
    "source" => ["table", "Предписания"],
    "filters" => ["filter1" => "проект"]
])}