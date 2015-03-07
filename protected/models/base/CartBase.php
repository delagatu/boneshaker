<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property string $create_date
 * @property string $session_id
 * @property integer $user_id
 * @property integer $cart_status_id
 *
 * The followings are the available model relations:
 * @property CartStatus $cartStatus
 * @property User $user
 * @property CartDetail[] $cartDetails
 */
class CartBase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('session_id, cart_status_id', 'required'),
			array('user_id, cart_status_id', 'numerical', 'integerOnly'=>true),
			array('session_id', 'length', 'max'=>200),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, create_date, session_id, user_id, cart_status_id', 'safe', 'on'=>'search'),
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
			'cartStatus' => array(self::BELONGS_TO, 'CartStatus', 'cart_status_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'cartDetails' => array(self::HAS_MANY, 'CartDetail', 'cart_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'create_date' => 'Create Date',
			'session_id' => 'Session',
			'user_id' => 'User',
			'cart_status_id' => 'Cart Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('cart_status_id',$this->cart_status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CartBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
