<?php $this->registerJsFile('http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.3.0.js'); ?>

<?php
use app\components\FilterClient\Filter;
use app\components\FilterClient\Columns;
use app\components\FilterClient\Pie;
use app\components\FilterClient\Table;
?>
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