<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/3/13
 * Time: 8:55 PM
 * To change this template use File | Settings | File Templates.
 */
class NewsletterUserStatus extends NewsletterUserStatusBase
{
    const UNCONFIRMED  = 'Unconfirmed';
    const CONFIRMED = 'Confirmed';
    const INACTIVE = 'Inactive';

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getIdByLabel($label)
    {
        $status = self::model()->find('status like :status', array(':status' => $label));

        if ($status instanceof NewsletterUserStatus)
        {
            return $status->id;
        }

    }

}
