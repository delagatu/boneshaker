<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/21/13
 * Time: 11:24 PM
 * To change this template use File | Settings | File Templates.
 */

class WheelSize extends WheelSizeBase{

    /**
     * @param string $className
     * @return WheelSizeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getWheelSizes()
    {
        return self::model()->findAll(
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
            Throw new Exception('Can not save the color: ' . var_export($this->getErrors(), 1));
        }
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