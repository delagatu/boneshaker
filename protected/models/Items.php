<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 1/20/14
 * Time: 7:40 PM
 */

class Items extends ItemsBase{

    /**
     * @param string $className
     * @return ItemsBase
     */

    const ROLE_AUTHORITY = 'Authority';
    const ROLE_ADMINISTRATOR = 'Administrator';

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

} 