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

    const ACTIVE = 'Active';
    const EMAIL_NOT_CONFIRMED = 'Email not confirmed';
    const INACTIVE = 'Inactive';

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getIdByLabel($status)
    {
        $userStatus = self::model()->find(
            'status like :status',
            array(
                ':status' => $status
            )
        );

        if ($userStatus instanceof UserStatus)
        {
            return $userStatus->id;
        }
    }

}
