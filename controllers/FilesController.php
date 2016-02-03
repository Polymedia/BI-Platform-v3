<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ArrayDataProvider;

use app\models\ExcelUploadForm;
use app\utils\ExcelReader;

class FilesController extends Controller
{
    public function actionIndex()
    {      
        $model = new ExcelUploadForm();

        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            if ($model->upload()) {
                // file is uploaded successfully
                //return;
            }
        }
        
        $data = [];
        $files = FileHelper::findFiles(Yii::$app->basePath . "/uploads/", ['recursive'=>FALSE, 'only'=>['*.csv', '*.xls', '*.xlsx']]);
        foreach ($files as $file) {
            $data[] = ['dataFile' => basename($file)];
        }
        
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data
        ]);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionRemove()
    {
        if (Yii::$app->request->isPost) {
            $filename = Yii::$app->request->post('file');
            $fullpath = Yii::$app->basePath . "/uploads/" . $filename;
            unlink($fullpath);
        }
    }
    
    public function actionPreview()
    {
        $name = Yii::$app->request->getQueryParam("name", "adresses.xlsx");
        $reader = new ExcelReader();
        $data = $reader->read($name);
        
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data
        ]);
        
        $size = count($data[0]);
        $colrange = range(0, $size - 1);
        $columns = [];
        foreach ($colrange as $column)
            $columns[] = strval($column);
        
        return $this->render('preview', [
            'dataProvider' => $dataProvider,
            'columns' => $columns
        ]);
    }
}