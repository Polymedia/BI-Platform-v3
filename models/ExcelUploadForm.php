<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ExcelUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;

    public function rules()
    {
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv, xls, xlsx'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->excelFile->saveAs(Yii::$app->basePath . '/uploads/' . $this->excelFile->baseName . '.' . $this->excelFile->extension);
            return true;
        } else {
            return false;
        }
    }
}