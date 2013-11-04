<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/28/13
 * Time: 10:33 PM
 * To change this template use File | Settings | File Templates.
 */
class Tire extends TireBase
{

    /**
     * @param string $className
     * @return TireBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw New Exception('Can not save tire: ' . var_export($this->getErros(), 1));
        }
    }

    public static function getTires()
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
