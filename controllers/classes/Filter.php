<?php

namespace app\controllers\classes;

use yii\base\Component;
use yii\helpers\ArrayHelper;

/**
 * @property array $possibleValues
 * @property string|array $selectedValues Read only.
 * @property mixed $selectedValue Read only.
 * @property string $name
 */

class Filter extends Component
{
    private $_possibleValues;
    private $_selectedValues;

    /**
     * @param string|array $selectedValues
     */
    public function __construct($selectedValues)
    {
        $this->_selectedValues = $selectedValues;
    }

    /**
     * @return array|mixed
     */
    public function getSelectedValues()
    {
        return $this->_selectedValues;
    }

    /**
     * @param array|ObjectCollection $values
     * @return Filter $this
     */
    public function setPossibleValues($values)
    {
        if (is_object($values))
            $values = $values->toArray();

        $this->_possibleValues = $values;
        return $this;
    }

    public function getPossibleValues()
    {
        return $this->_possibleValues;
    }

    /**
     * @return bool
     */
    public function isSelected()
    {
        return (bool) $this->selectedValues;
    }

    public function getSelectedValue()
    {
        if (!$this->isSelected())
            return null;

        if (is_array($this->selectedValues))
            return $this->selectedValues[0];
        else
            return $this->selectedValues;
    }

}