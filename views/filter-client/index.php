<?php
use app\components\FilterClient\Filter;
use app\components\FilterClient\Columns;
use app\components\FilterClient\Pie;
use app\components\FilterClient\Table;

use yii\helpers\Json;
?>

<script>
    function onRequestVisiologyData() {
        return <?=Json::encode($data, JSON_PRETTY_PRINT)?>;
    }
</script>

<div>
    <?php Filter::begin(['name' => "filter_year", 'optionsCaption' => "All years"]); ?>
    <script>
        function onUser_filter_year(widget) {
            // User code here
            widget.defaults.column_to_filter = 'year';
            widget.defaults.selected = '';
        }
    </script>
    <?php Filter::end(); ?>
</div>

<br />

<div>
    <?php Filter::begin(['name' => "filter_category", 'optionsCaption' => "All categories"]); ?>
    <script>
        function onUser_filter_category(widget) {
            // User code here
            widget.defaults.column_to_filter = 'category';
            widget.defaults.selected = '';
            widget.depends_on = ['filter_year'];
        }
    </script>
    <?php Filter::end(); ?>

    <?php Filter::begin(['name' => "filter_manager", 'optionsCaption' => "All managers"]); ?>
    <script>
        function onUser_filter_manager(widget) {
            // User code here
            widget.defaults.column_to_filter = 'manager';
            widget.defaults.selected = '';
            widget.depends_on = ['filter_year'];
        }
    </script>
    <?php Filter::end(); ?>
</div>

<br />

<div>
    <table>
        <tbody>
        <tr>
            <td style="width:50%; height:400px;">
                <?php Columns::begin(['name' => "chart"]); ?>
                <script>
                    function onUser_chart(widget) {
                        // User code here
                        widget.defaults.category_name = 'category';
                        widget.defaults.serie_name = 'manager';
                        widget.defaults.measure_name = 'amount';
                        widget.depends_on = ['filter_category', 'filter_manager'];
                    }
                </script>
                <?php Columns::end(); ?>

            </td>
            <td style="width:50%; height:400px;">
                <?php Pie::begin(['name' => "pie"]); ?>
                    <script>
                        function onUser_pie(widget) {
                            // User code here
                            widget.defaults.column_for_serie = 'category';
                            widget.defaults.measure_name = 'amount';
                            widget.depends_on = ['filter_category', 'filter_manager'];
                        }
                    </script>
                <?php Pie::end(); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div>
    <?php Table::begin(['name' => "table"]); ?>
    <script>
        function onUser_table(widget) {
            // User code here
            widget.depends_on = ['filter_category', 'filter_manager'];
        }
    </script>
    <?php Table::end(); ?>
</div>