<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/27/15
 * Time: 7:19 PM
 * To change this template use File | Settings | File Templates.
 */

class PlaceOrderForm extends CFormModel{

    public $nume;
    public $prenume;
    public $email;
    public $telefon;
    public $cnp;
    public $strada;
    public $numar;
    public $localitate;
    public $judet;
    public $agree;
    public $adresaDeLivrare;

    private $reference;

    public function rules()
    {
        return array(
            array('nume, prenume, telefon, email, cnp, strada, numar, localitate, judet, agree','required', 'message' => 'Camp obligatoriu'),
            array('email','email', 'message' => 'Adresa e-mail invalida'),
        );
    }

    public function attributeLabels()
    {
        $termsAndConditions = CHtml::link('termenii și condițiile', '/site/termeniSiConditii');
        return array(
            'agree' => 'Prin trimiterea comenzii accept '.$termsAndConditions.' Boneshaker',
        );
    }

    public function getCountyDropDown()
    {
        $counties = County::getAll();

        return CHtml::listData($counties, 'id', 'county_name'); //once the model is in place
    }

    public function userHasSavedAddresses()
    {
        if (!Yii::app()->user->isGuest)
        {
            $userId = Yii::app()->user->getId();

            return AddressUser::model()->exists(array('condition' => 'user_id =:user_id', 'params' => array(':user_id' => $userId)));
        }

        return false;
    }

    public function getAllUserAddress()
    {
        if (!Yii::app()->user->isGuest)
        {
            $userId = Yii::app()->user->getId();
            $userAddresses = AddressUser::getAllByUserId($userId);

            return CHtml::listData($userAddresses, 'id', 'fullAddress'); //once the model is in place
        }
    }

    protected function setReference($ref)
    {
        $this->reference = $ref;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function saveOrder()
    {
        $user = $this->getUser();

        if (!$user instanceof User)
        {
            $timestamp = time();
            $message = 'PlaceorderForm::saveOrder - no valid User instance. Time: ' . $timestamp;
            Yii::log($message, CLogger::LEVEL_ERROR, 'app');
            $this->setReference($timestamp);

            return false;
        }

        $address = $this->getAddress();
        UserProfile::saveProfile($user->id, array('cnp' => $this->cnp));
        AddressUser::saveAddress($user->id, $address->id);

        $cart = new Cart();
        $cart->create_date = new CDbExpression('NOW()');
        $cart->session_id = Yii::app()->session->getSessionID();
        $cart->user_id = $user->id;
        $cart->address_id = $address->id;
        $cart->cart_status_id = CartStatus::getIdByStatus(CartStatus::COMANDA_PLASATA);
        $cart->saveThrowException();

        $this->saveCartDetails($cart);

        return true;

    }

    public function getUser()
    {
        $user = User::getByEmail($this->email);

        if (!$user instanceof User)
        {
            $registerForm = new RegisterForm();
            $attributes = array(
                'username' => $this->email,
                'password' => $registerForm->generateRandomString(5),
                'fist_name' => $this->nume,
                'last_name' => $this->prenume,
                'email' => $this->email,
            );

            $registerForm->attributes = $attributes;
            $user = $registerForm->registerUser();
        }

        return $user;
    }

    public function getAddress()
    {
        $address = new Address();
        $address->city = $this->localitate;
        $address->county_id = $this->judet;
        $address->street = $this->strada;
        $address->number = $this->numar;
        $address->saveThrowException();

        return $address;
    }

    public function saveCartDetails(Cart $cart)
    {
        $positions = Yii::app()->shoppingCart->getPositions();

        if (!empty($positions))
        {
            foreach ($positions as $product)
            {
                if ($product instanceof Product)
                {
                    $cartDetail = new CartDetail();
                    $cartDetail->cart_id = $cart->id;
                    $cartDetail->product_id = $product->id;
                    $cartDetail->qty = $product->getQuantity();
                    $cartDetail->total_price = $product->getSumPrice();
                    $cartDetail->item_price = $product->getPrice();
                    $cartDetail->saveThrowEx();

                }
            }
        }

    }

    public function initDetails()
    {
        if (!Yii::app()->user->isGuest)
        {
            $userId = Yii::app()->user->getId();
            $user = User::getById($userId);

            if (!$user instanceof User)
            {
                return false;
            }

            $userProfile = $this->getUserProfile($userId);

            $this->nume = $user->getFirstName();
            $this->prenume = $user->getLastName();
            $this->cnp = $userProfile->cnp;
            $this->email = $user->email;
            $this->telefon = $user->telephone;
        }
    }

    public function getUserProfile($userId)
    {
        $userProfile = UserProfile::getByUserId($userId);

        if ($userProfile instanceof UserProfile)
        {
            return $userProfile;
        }

        return new UserProfile();
    }
}