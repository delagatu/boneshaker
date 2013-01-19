<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 6/9/12
 * Time: 3:21 PM
 * To change this template use File | Settings | File Templates.
 */
class UserStatus extends UserStatusBase
{

    /**
     * @static
     * @param string $className
     * @return UserStatusBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
