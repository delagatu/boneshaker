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

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public static function getByConfirmationCode($code)
    {
        return self::model()->find(
            'confirmation_code =:confirmation_code',
            array(
                ':confirmation_code' => $code
            )
        );
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw new Exception('Can not save user: ' . var_export($this->getErrors(), 1));
        }
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function confirmEmail()
    {
        if ($this->status_id == UserStatus::getIdByLabel(UserStatus::EMAIL_NOT_CONFIRMED))
        {
            $this->status_id = UserStatus::getIdByLabel(UserStatus::ACTIVE);
            $this->saveThrowEx();
        }

    }

    public function unConfirmAccount()
    {
        $this->email = $this->id . $this->email;
        $this->status_id = UserStatus::getIdByLabel(UserStatus::INACTIVE);
        $this->saveThrowEx();
    }

    public static function getByUserName($username)
    {
        return self::model()->find('username =:username', array(':username' => $username));
    }

    public static function getByEmail($email)
    {
        return self::model()->find('email =:email', array(':email' => $email));
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }
}
