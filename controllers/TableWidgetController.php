<?php

namespace app\controllers;

use app\controllers\classes\Filter;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\View;

use app\models\DataTable;
use yii\data\ActiveDataProvider;

class TableWidgetController extends BaseDashboardController
{
    public function actionIndex()
    {
        $tableModel = DataTable::find()->all();

        return $this->render('index.tpl', ['data' => $tableModel]);
    }
}