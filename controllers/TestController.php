<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class TestController extends Controller
{
    public function actionIndex()
    {
        /** You code goes here **/

        return $this->render('index.tpl');
    }
}