<?php

namespace app\controllers;

use app\controllers\classes\Filter;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\View;

class FilterClientController extends BaseDashboardController
{
    public function actionIndex()
    {
        return $this->render('index.php');
    }
}