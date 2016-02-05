<?php

namespace app\controllers;

use app\controllers\classes\Helpers;
use app\utils\ExcelReader;
use UnemploymentQuery;
use yii\helpers\ArrayHelper;

class TemplateController extends BaseDashboardController
{
    public function actionIndex()
    {
        $model = UnemploymentQuery::create();

        $filter = $this->getFilter('filter_region');
        $filter->setPossibleValues(UnemploymentQuery::create()->distinct()->select('region_name')->find());

        if (!$filter->isSelected())
            $filter->setSelectedValues($filter->getPossibleValues()[0]);


        $model = $model->filterByRegionName($filter->selectedValue)->find();


        $widget = $this->getWidget('widget_hist');
        $widget->setCategories($model->getColumnValues('Year'));
        $widget->setSeries(['Безработица' => $model->getColumnValues('UnemploymentYouth')]);


        $widget = $this->getWidget('widget_hist2');
        $widget->setCategories($model->getColumnValues('RegionName'));
        $widget->setSeries(Helpers::toKeyValueArray($model, 'Year', 'UnemploymentYouth'));

        return $this->render('index.tpl');
    }
}