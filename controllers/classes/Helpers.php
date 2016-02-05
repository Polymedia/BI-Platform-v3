<?php
namespace app\controllers\classes;

use Yii;

class Helpers
{
    public static function toKeyValueArray($model, $keyColumn = 'PrimaryKey', $valueColumn = null)
    {
        $ret = [];
        $keyGetterMethod = 'get' . $keyColumn;
        $valueGetterMethod = (null === $valueColumn) ? '__toString' : ('get' . $valueColumn);
        foreach ($model as $obj) {
            $ret[$obj->$keyGetterMethod()][] = $obj->$valueGetterMethod();
        }

        return $ret;
    }
}
