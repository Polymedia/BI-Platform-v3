<?php

namespace app\components\FilterClient;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\FilterClientAsset;

class Filter extends Widget
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
            <select id="'.$this->name.'"
                    data-visiology-name="'.$this->name.'"
                    data-bind="options: '.$this->name.'.ko_values,
                               value: '.$this->name.'.ko_selected,
                               optionsCaption: \''.$this->optionsCaption.'\'"></select>
            <script type="text/javascript">
                function onConstruct_'.$this->name.'(visiology) {
                    // Implementation
                    visiology.model.'.$this->name.' = {};
                    visiology.model.'.$this->name.'.defaults = {};

                    // Default values
                    visiology.model.'.$this->name.'.defaults.column_to_filter = \'\';
                    visiology.model.'.$this->name.'.defaults.selected = \'\';
                    visiology.model.'.$this->name.'.depends_on = [];

                    visiology.model.'.$this->name.'.onRequestFilterValues = visiology.defaults.filterGetValues;
                    visiology.model.'.$this->name.'.onRequestFilteredData = visiology.defaults.filterGetData;
                }
                function onUser_'.$this->name.'(widget) {
                    '.$content.'
                }
                function onDeploy_'.$this->name.'(visiology) {
                    visiology.model.'.$this->name.'.ko_values = ko.computed(function() {
                        return visiology.model.'.$this->name.'.onRequestFilterValues(visiology.data, visiology.model, visiology.model.'.$this->name.');
                    });
                    visiology.model.'.$this->name.'.ko_selected = ko.observable(visiology.model.'.$this->name.'.defaults.selected);

                    visiology.model.'.$this->name.'.getData = function(child_data) {
                        var temp_data = visiology.internal.widgetGetData(child_data, visiology.model, visiology.model.'.$this->name.');
                        return visiology.model.'.$this->name.'.onRequestFilteredData(temp_data, visiology.model, visiology.model.'.$this->name.');
                    };
                }
            </script>';
    }
}