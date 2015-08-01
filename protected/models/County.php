<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 5/12/15
 * Time: 8:39 AM
 * To change this template use File | Settings | File Templates.
 */

class County extends CountyBase{

    /**
     * @param string $className
     * @return CountyBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return mixed
     */
    public static function getAll()
    {
        return self::model()->findAll(array('order'=>'county_name'));
    }

}