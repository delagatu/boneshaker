<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 5:19 PM
 * To change this template use File | Settings | File Templates.
 */
class BrakeLever extends BrakeLeverBase
{

    /**
     * @static
     * @param string $className
     * @return BrakeLeverBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getBrakeLevers()
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
            throw new Exception('Can not save the brake lever: ' . var_export($this->getErrors(), 1));
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
