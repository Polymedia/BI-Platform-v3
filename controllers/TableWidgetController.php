<?php

namespace app\controllers;

use Yii;


use app\models\DataTable;


class TableWidgetController extends BaseDashboardController
{
    public function actionIndex()
    {
        $tableModel = DataTable::find()->all();
        $w = $this->getWidget('widget_people');
        $w->setData($tableModel);

        return $this->render('index.tpl');
    }
}