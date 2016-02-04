<?php

namespace app\controllers;

use Yii;


use app\models\DataTable;

//use ГодаQuery;


class TableWidgetController extends BaseDashboardController
{
    public function actionIndex()
    {
        $tableModel = DataTable::find()->all();
        $w = $this->getWidget('widget_people');
        $w->setData($tableModel);


//        $w = ГодаQuery::create()->find();
//
//        $t = $this->getWidget('widget_people');
//        $t->setData($w);

        return $this->render('index.tpl');
    }
}