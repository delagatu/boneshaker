<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/3/13
 * Time: 9:00 PM
 * To change this template use File | Settings | File Templates.
 */
class NewsletterUser extends NewsletterUserBase
{
    /**
     * @param string $className
     * @return NewsletterUserBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw new Exception('Can not save the newsletter user: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function setStatus($userId, $status)
    {
        return self::model()->updateAll(
            array('status_id' => $status),
            'user_id =:user_id',
            array(':user_id' => $userId)
        );
    }


}
