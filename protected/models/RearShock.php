<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/21/13
 * Time: 10:11 PM
 * To change this template use File | Settings | File Templates.
 */

class RearShock extends RearShockBase{

    /**
     * @param string $className
     * @return RearShockBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getRearShocks()
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
            Throw new Exception('Can not save the rear shock: ' . var_export($this->getErrors(), 1));
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