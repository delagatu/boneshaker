<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:30 PM
 * To change this template use File | Settings | File Templates.
 */
class SubProduct extends SubProductBase
{
    /**
     * @param string $className
     * @return SubProduct
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getAllSubProduct()
    {
        return self::model()->findAll(
            'available =:available',
            array(
                ':available' => 1
            )
        );
    }
}
