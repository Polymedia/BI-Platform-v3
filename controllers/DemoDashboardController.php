<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

class DemoDashboardController extends BaseDashboardController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /** You code goes here **/

        return $this->render('index.tpl');
    }
}