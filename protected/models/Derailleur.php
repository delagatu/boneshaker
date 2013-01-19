<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/27/12
 * Time: 10:22 PM
 * To change this template use File | Settings | File Templates.
 */
class Derailleur extends DerailleurBase
{

    /**
     * @static
     * @param string $className
     * @return DerailleurBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getDerailleurs()
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

    public function getMakerAndProduct()
    {
        return $this->maker->name . ' ' . $this->name;
    }

}
