<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $city
 * @property string $street
 * @property string $fix_text
 * @property string $normal
 * @property string $company
 */
class PeopleAR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fix_text'], 'string'],
            [['name', 'date', 'city', 'street', 'company'], 'string', 'max' => 255],
            [['normal'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'city' => 'City',
            'street' => 'Street',
            'fix_text' => 'Fix Text',
            'normal' => 'Normal',
            'company' => 'Company',
        ];
    }
}
