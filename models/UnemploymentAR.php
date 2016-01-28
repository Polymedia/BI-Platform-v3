<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unemployment".
 *
 * @property integer $id
 * @property string $unemployment_adult
 * @property string $unemployment_youth
 * @property string $region_id
 * @property string $region_name
 * @property integer $year
 */
class UnemploymentAR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unemployment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unemployment_adult', 'unemployment_youth', 'region_id', 'region_name', 'year'], 'required'],
            [['unemployment_adult', 'unemployment_youth'], 'number'],
            [['year'], 'integer'],
            [['region_id', 'region_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unemployment_adult' => 'Unemployment Adult',
            'unemployment_youth' => 'Unemployment Youth',
            'region_id' => 'Region ID',
            'region_name' => 'Region Name',
            'year' => 'Year',
        ];
    }

    /**
     * @inheritdoc
     * @return UnemploymentARQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnemploymentARQuery(get_called_class());
    }
}
