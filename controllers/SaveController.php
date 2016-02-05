<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;

class SaveController extends Controller
{
    public function actionSave()
    {
        $postText = html_entity_decode(Yii::$app->request->post('text'), ENT_QUOTES);
        $postFile = Yii::$app->request->post('fileName');

        $file = fopen($postFile, "wb");

        $resText = str_replace("&gt", ">", $postText);
        fwrite($file, $postText);

        fclose($file);

        return $this->render('save', ['text' => "GOOD"]);
    }
}