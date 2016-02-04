<?php
use app\components\FilterClient\Filter;
use app\components\FilterClient\Columns;
use app\components\FilterClient\Pie;
use app\components\FilterClient\Table;
?>

<script>
    function onRequestVisiologyData() {
        var bigData = [];
        var years = [2014, 2015, 2016];
        var groups = [["South", "North"], ["South", "North"], ["South", "North"]];
        var categories = [
            ["Electronics", "Mobile", "Cars", "Computers"],
            ["Electronics", "Mobile", "Cars", "Computers", "Tabs", "Services"],
            ["Electronics", "Computers", "Tabs"]];
        var managers = [
            ["Roy Smith", "Barbara Wake", "Garry Kleine", "Liz Washington"],
            ["Roy Smith", "Barbara Wake", "Garry Kleine", "Liz Washington", "Mike Sober"],
            ["Roy Smith", "Barbara Wake", "Sarah Hails"]
        ];
        for (var j = 0; j < years.length; j++) {
            for (var i = 0; i < 20000; i++) {
                bigData.push({
                    id: i,
                    year: years[j],
                    group: groups[j][Math.floor(Math.random() * groups[j].length)],
                    category: categories[j][Math.floor(Math.random() * categories[j].length)],
                    manager: managers[j][Math.floor(Math.random() * managers[j].length)],
                    amount: Math.random() * 100
                });
            }
        }

        return bigData;
    }
</script>

<div>
    <?php Filter::begin(['name' => "filter_year", 'optionsCaption' => "All years"]); ?>
        // User code here
        widget.defaults.column_to_filter = 'year';
        widget.defaults.selected = '';
    <?php Filter::end(); ?>
</div>

<br />

<div>
    <?php Filter::begin(['name' => "filter_category", 'optionsCaption' => "All categories"]); ?>
        // User code here
        widget.defaults.column_to_filter = 'category';
        widget.defaults.selected = '';
        widget.depends_on = ['filter_year'];
    <?php Filter::end(); ?>

    <?php Filter::begin(['name' => "filter_manager", 'optionsCaption' => "All managers"]); ?>
        // User code here
        widget.defaults.column_to_filter = 'manager';
        widget.defaults.selected = '';
        widget.depends_on = ['filter_year'];
    <?php Filter::end(); ?>
</div>

<br />

<div>
    <table>
        <tbody>
        <tr>
            <td style="width:50%; height:400px;">
                <?php Columns::begin(['name' => "chart"]); ?>
                    // User code here
                    widget.defaults.category_name = 'category';
                    widget.defaults.serie_name = 'manager';
                    widget.defaults.measure_name = 'amount';
                    widget.depends_on = ['filter_category', 'filter_manager'];
                <?php Columns::end(); ?>
            </td>
            <td style="width:50%; height:400px;">
                <?php Pie::begin(['name' => "pie"]); ?>
                    // User code here
                    widget.defaults.column_for_serie = 'category';
                    widget.defaults.measure_name = 'amount';
                    widget.depends_on = ['filter_category', 'filter_manager'];
                <?php Pie::end(); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div>
    <?php Table::begin(['name' => "table"]); ?>
        // User code here
        widget.depends_on = ['filter_category', 'filter_manager'];
    <?php Table::end(); ?>
</div>