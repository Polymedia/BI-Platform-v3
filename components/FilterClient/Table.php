<?php

namespace app\components\FilterClient;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\FilterClientAsset;

class Table extends Widget
{
    public $name;
    public $optionsCaption;

    public function init()
    {
        parent::init();

        $view = $this->getView();
        FilterClientAsset::register($view);
        $view->registerJs('visiology.run();');

        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        return '
            <div id="'.$this->name.'"
                 data-visiology-name="'.$this->name.'"
                 data-bind="with: '.$this->name.'">
                 <input data-bind="value: ko_start" />
                 <input data-bind="value: ko_limit" />
                 <table class="table table-condensed">
                    <thead>
                        <tr data-bind="foreach: ko_columnNames">
                            <th> <span data-bind="text: $data"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-bind="foreach: ko_items">
                        <tr data-bind="foreach: $parent.ko_columnNames">
                            <td data-bind="text: $parent[$data]"></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <script type="text/javascript">
            function onConstruct_'.$this->name.'(visiology) {
                // Implementation
                visiology.model.'.$this->name.' = {};
                visiology.model.'.$this->name.'.defaults = {};

                // Default values
                visiology.model.'.$this->name.'.depends_on = [];
            }
            function onUser_'.$this->name.'(widget) {
                '.$content.'
            }
            function onDeploy_'.$this->name.'(visiology) {
                visiology.model.'.$this->name.'.ko_start = ko.observable(0);
                visiology.model.'.$this->name.'.ko_limit = ko.observable(20);
                visiology.model.'.$this->name.'.ko_columnNames = ko.computed(function() {
                    var temp_data = visiology.internal.widgetGetData(visiology.data, visiology.model, visiology.model.'.$this->name.');

                    if (temp_data.length > 0) {
                        return Object.keys(temp_data[0]);
                    }

                    return [];
                });
                visiology.model.'.$this->name.'.ko_items = ko.computed(function () {
                    var start = parseInt(visiology.model.'.$this->name.'.ko_start(), 10);
                    if (start == NaN)
                        start = 0;
                    var limit = parseInt(visiology.model.'.$this->name.'.ko_limit(), 10);
                    if (limit == NaN) {
                        limit = 20;
                    }
                    return visiology.internal.widgetGetData(visiology.data, visiology.model, visiology.model.'.$this->name.').slice(start, start + limit);
                });
            }
        </script>';
    }
}