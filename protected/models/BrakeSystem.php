<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 5:30 PM
 * To change this template use File | Settings | File Templates.
 */
class BrakeSystem extends BrakeSystemBase
{

    /**
     * @static
     * @param string $className
     * @return BrakeSystemBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getBrakeSystems()
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
            Throw new Exception('Can not save the brake system: ' . var_export($this->getErrors(), 1));
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
