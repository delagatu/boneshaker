<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 6/9/12
 * Time: 3:22 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends UserBase
{
    /**
     * @static
     * @param string $className
     * @return UserBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

}
