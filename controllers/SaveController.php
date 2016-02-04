<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;

class SaveController extends Controller
{
    public function actionSave()
    {
        $postText = Yii::$app->request->post('text');
        $postFile = Yii::$app->request->post('fileName');

        $file = fopen($postFile, "wb");

        fwrite($file, $postText);

        fclose($file);

        return $this->render('save', ['text' => "GOOD"]);
    }
}