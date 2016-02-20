{use class="app\components\Filter"}
{use class="app\components\Table"}

<div class="row-fluid">
    <div class="col-md-3">
        {Filter::widget([
            "name" => "filter_project",
            "source" => [
                type => "SQLTable", 
                table => "Проекты", 
                columns => "Проект",
                order => ["id" => "ASC"]
            ]
        ])}
    </div>
    <div class="col-md-3">
        {Filter::widget([
            "name" => "filter_classification",
            "source" => ["SQLTable", "ТипыЗамечаний", "Тип_замечания", false, "id"]
        ])}
    </div>
    <div class="col-md-3">
        {Filter::widget([
            "name" => "filter_podryadchik",
            "source" => ["SQLTable", table => "ПодрядчикиПредписания", columns => "Подрядчик"]
        ])}
    </div>
    <div class="col-md-3">
        {Filter::widget([
            "name" => "filter_zamechaniya",
            "source" => ["SQLTable", table => "СтатусыЗаявкиЗавершение", columns => "Статус_завершения"]
        ])}
    </div>
</div>

<br>
<br>

{Table::widget([
    "name" => "table_predpisaniya", 
    "source" => [
        type => "SQLTable",
        table => "Предписания",
        "columns" => [
            "Проекты.Проект",
            "ТипыЗамечаний.Тип_замечания",
            "ПодрядчикиПредписания.Подрядчик",
            "СтатусыЗаявкиЗавершение.Статус_завершения"
        ]
    ],
    "filters" => [
        "filter_project" => "Проекты.проект", 
        "filter_classification" => "ТипыЗамечаний.типзамечания",
        "filter_podryadchik" => "ПодрядчикиПредписания.подрядчик",
        "filter_zamechaniya" => "СтатусыЗаявкиЗавершение.статусзавершения"
    ],
    "header" => ["Проект", "Тип замечания", "Подрядчик", "Статус завершения"]
])}
