<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 5/25/15
 * Time: 8:56 AM
 * To change this template use File | Settings | File Templates.
 */

class UserProfile extends UserProfileBase{

    public $cnp;

    /**
     * @param string $className
     * @return UserProfileBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function getByUserId($userId)
    {
        return self::model()->find(
            array(
                'condition' => 'user_id =:user_id',
                 'params' => array(
                    ':user_id' => $userId
                ),
            )
        );
    }

    public function hasAttribute($attribute)
    {
        return property_exists(get_class($this), $attribute);
    }

    public function isAttributeEmpty($attribute)
    {
        return empty($this->$attribute);
    }

    /**
     * @param $userId
     * @param array $attributes = array('key' => 'value')
     * key: the column name
     * value: the column value
     */
    public static function saveProfile($userId, Array $attributes = array())
    {
        $profile = self::getByUserId($userId);

        if (!$profile instanceof UserProfile)
        {
            $profile = new UserProfile();
            $profile->user_id = $userId;
        }

        foreach ($attributes as $key => $value)
        {
            if ($profile->hasAttribute($key))
            {
                $profile->$key = $value;
            }
        }

        $profile->saveThrowEx();

        return $profile;

    }
}