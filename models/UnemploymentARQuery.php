<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UnemploymentAR]].
 *
 * @see UnemploymentAR
 */
class UnemploymentARQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UnemploymentAR[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnemploymentAR|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}