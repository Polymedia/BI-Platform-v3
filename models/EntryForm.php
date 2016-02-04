<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $fileName;
    public $content;

    public function rules()
    {
        return [
            [['fileName'], 'required']
        ];
    }
}
