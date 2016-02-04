<?php

namespace app\components\FilterClient;

use yii\base\Widget;
use yii\helpers\Html;
use app\assets\FilterClientAsset;

class Columns extends Widget
{
    public $name;

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
                 data-bind="highchart: '.$this->name.'.ko_options">
            </div>
            <script type="text/javascript">
                function onConstruct_'.$this->name.'(visiology) {
                    // Implementation
                    visiology.model.'.$this->name.' = {};
                    visiology.model.'.$this->name.'.defaults = {};

                    // Default values
                    visiology.model.'.$this->name.'.defaults.category_name = \'\';
                    visiology.model.'.$this->name.'.defaults.serie_name = \'\';
                    visiology.model.'.$this->name.'.defaults.measure_name = \'\';
                    visiology.model.'.$this->name.'.depends_on = [];

                    visiology.model.'.$this->name.'.onInit = visiology.defaults.highcharts.onInitColumn;
                    visiology.model.'.$this->name.'.onUpdate = visiology.defaults.highcharts.onUpdateColumn;
                }
                function onUser_'.$this->name.'(widget) {
                    '.$content.'
                }
                function onDeploy_'.$this->name.'(visiology) {
                    visiology.model.'.$this->name.'.onInit($(\'#'.$this->name.'\'));
                    visiology.model.'.$this->name.'.ko_options = ko.computed(function() {
                            var filtered = visiology.internal.widgetGetData(visiology.data, visiology.model, visiology.model.'.$this->name.');

                            return {
                                data: filtered,
                                widget: visiology.model.'.$this->name.',
                                update: visiology.model.'.$this->name.'.onUpdate
                            }

                        });
                }
            </script>';
    }
}