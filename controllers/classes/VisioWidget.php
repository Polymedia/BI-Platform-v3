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
 * @property string|array $series Read only.
 * @property string|array $categories Read only.
 * @property string $name
 */

class VisioWidget extends Component
{
    private $_data;

    private $_series;
    private $_categories;

    /**
     * @param $values
     * @return VisioWidget $this
     */
    public function setData($values)
    {
        if (is_object($values))
            $values = $values->toArray();

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

    /**
     * @param $values
     * @return VisioWidget $this
     */
    public function setSeries($values)
    {
        if (is_object($values))
            $values = $values->toArray();

        $this->_series = $values;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getSeries()
    {
        return $this->_series;
    }

    /**
     * @param $values
     * @return VisioWidget $this
     */
    public function setCategories($values)
    {
        if (is_object($values))
            $values = $values->toArray();

        $this->_categories = $values;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getCategories()
    {
        return $this->_categories;
    }
}