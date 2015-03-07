<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/27/12
 * Time: 10:40 PM
 * To change this template use File | Settings | File Templates.
 */
class Shifter extends ShifterBase
{

    /**
     * @static
     * @param string $className
     * @return ShifterBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getShifters()
    {
        return self::model()->with('maker')->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save shifter: ' . var_export($this->getErros(), 1));
        }
    }

    public function getMakerAndProduct()
    {
        if ($this->maker instanceof Maker)
        {
            return $this->maker->name . ' ' . $this->name;
        }

        return $this->name;
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function getName()
    {
        return $this->name;
    }

}
