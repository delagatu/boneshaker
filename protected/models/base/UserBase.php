<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $password_hash
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $last_login
 * @property string $telephone
 * @property integer $status_id
 * @property string $confirmation_code
 *
 * The followings are the available model relations:
 * @property NewsletterUser[] $newsletterUsers
 * @property UserStatus $status
 */
class UserBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password_hash, status_id', 'required'),
			array('status_id', 'numerical', 'integerOnly'=>true),
			array('username, email', 'length', 'max'=>500),
			array('password, password_hash, first_name, last_name', 'length', 'max'=>45),
			array('telephone', 'length', 'max'=>20),
			array('confirmation_code', 'length', 'max'=>200),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, password_hash, first_name, last_name, email, last_login, telephone, status_id, confirmation_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'newsletterUsers' => array(self::HAS_MANY, 'NewsletterUser', 'user_id'),
			'status' => array(self::BELONGS_TO, 'UserStatus', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'password_hash' => 'Password Hash',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'last_login' => 'Last Login',
			'telephone' => 'Telephone',
			'status_id' => 'Status',
			'confirmation_code' => 'Confirmation Code',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('password_hash',$this->password_hash,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('confirmation_code',$this->confirmation_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}