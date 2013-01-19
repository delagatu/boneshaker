<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 7/30/12
 * Time: 5:15 PM
 * To change this template use File | Settings | File Templates.
 */
class BicycleDescription extends BicycleDescriptionBase
{

    /**
     * @static
     * @param string $className
     * @return BicycleDescriptionBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getByProductId($id)
    {
        return self::model()->find(
            'product_id =:product_id',
            array(
                ':product_id' => $id
            )
        );
    }

}
