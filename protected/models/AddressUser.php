<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 5/17/15
 * Time: 3:02 PM
 * To change this template use File | Settings | File Templates.
 */

class AddressUser extends AddressUserBase{

    /**
     * @param string $className
     * @return AddressBase
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

    public static function getAddressByUser($userId)
    {
        return self::model()->find(
            'user_id =:user_id',
            array(
                ':user_id' => $userId
            )
        );
    }

    public static function getAllByUserId($userID)
    {
        return self::model()->findAll(
            array(
                'condition' => 'user_id =:user_id',
                'params' => array(
                    ':user_id' => $userID,
                )
            )
        );
    }

    public function getFullAddress()
    {
        $address = Address::model()->findByPk($this->address_id);

        if ($address instanceof Address)
        {
            return $address->street . ' ' . $address->number . ' ' .  $address->city . ' ' . $address->county->county_name;
        }
    }

    public static function saveAddress($userId, $addressId)
    {
        $addressUser = new AddressUser();
        $addressUser->address_id = $addressId;
        $addressUser->user_id = $userId;
        $addressUser->saveThrowEx();

    }

}