<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_table".
 *
 * @property integer $id
 * @property integer $one
 * @property integer $two
 * @property integer $three
 * @property string $four
 */
class DataTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['one', 'two', 'three'], 'integer'],
            [['four'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'one' => 'One',
            'two' => 'Two',
            'three' => 'Three',
            'four' => 'Four',
        ];
    }
}
