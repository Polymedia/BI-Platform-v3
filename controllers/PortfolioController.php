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

        $t = ПроектыQuery::create()->select('*')->orderBy('id')->find()->toArray();

        $w = $this->getWidget('widget_portfolio');
        $w->setData($t);

        foreach ($t as $key => $project)
        {
            $widget = $this->getWidget('widget_portfolio_'.$key);

            $w_data = array(rand(10,100), rand(10,100), rand(10,100), rand(10,100));

            $widget->setSeries($w_data);
            $widget->setCategories(array("1", "2", "3", "4"));
        }



        return $this->render('index.tpl', ['projects' => $t]);
    }
}