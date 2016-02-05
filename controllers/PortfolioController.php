<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 04.02.2016
 * Time: 16:01
 */

namespace app\controllers;

use Yii;

use app\models\DataTable;

use ПроектыQuery;
use app\models\UnemploymentAR;
use UnemploymentQuery;

use yii\data\ActiveDataProvider;


class PortfolioController extends BaseDashboardController
{
    public function actionIndex()
    {

        $t = ПроектыQuery::create()->orderById()->find()->toArray();

        $w = $this->getWidget('widget_portfolio');
        $w->setData($t);


        

        $model = UnemploymentAR::find();
        $model2 = UnemploymentQuery::create();

        $regionFilter = $this->getFilter('filter_region');
        $regionFilter->setPossibleValues(UnemploymentQuery::create()->distinct()->select('region_name')->find());

        if ($regionFilter->isSelected()) {
            $model->where(['region_name' => $regionFilter->selectedValue]);
            $model2->filterByRegionName($regionFilter->selectedValue);
        }

        $model2 = $model2->find();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'unemployment_adult' => SORT_DESC
                ]
            ],
        ]);




        return $this->render('index.tpl', ['projects' => $t, 'model2' => $model2, 'dataProvider' => $dataProvider]);
    }
}