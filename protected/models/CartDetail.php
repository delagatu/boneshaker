<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 3/2/14
 * Time: 3:59 PM
 */

class CartDetail extends CartDetailBase{

    /**
     * @param string $className
     * @return CartDetailBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

} 