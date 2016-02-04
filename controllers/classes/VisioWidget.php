<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.02.2016
 * Time: 19:08
 */


namespace app\controllers\classes;

use yii\base\Component;

use app\components;

/**
 * @property string|array $data Read only.
 * @property string $name
 */

class VisioWidget extends Component
{
    private $_data;

    /**
     * @param $values
     * @return VisioWidget $this
     */
    public function setData($values)
    {
        $this->_data = $values;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getData()
    {
        return $this->_data;
    }
}