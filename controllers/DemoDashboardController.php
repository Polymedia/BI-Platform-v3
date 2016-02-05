<?php

namespace app\controllers;

use UnemploymentQuery;
use PeopleQuery;
use Yii;
use yii\data\ActiveDataProvider;

use app\models\UnemploymentAR;
use app\models\PeopleAR;
use models;
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
                        'roles' => ['?'],
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