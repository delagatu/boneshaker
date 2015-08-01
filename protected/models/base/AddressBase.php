<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property integer $id
 * @property integer $county_id
 * @property string $city
 * @property string $street
 * @property string $number
 *
 * The followings are the available model relations:
 * @property County $county
 * @property AddressUser[] $addressUsers
 * @property Cart[] $carts
 */
class AddressBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AddressBase the static model class
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
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('county_id, city, street, number', 'required'),
			array('county_id', 'numerical', 'integerOnly'=>true),
			array('city, street', 'length', 'max'=>255),
			array('number', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, county_id, city, street, number', 'safe', 'on'=>'search'),
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
			'county' => array(self::BELONGS_TO, 'County', 'county_id'),
			'addressUsers' => array(self::HAS_MANY, 'AddressUser', 'address_id'),
			'carts' => array(self::HAS_MANY, 'Cart', 'address_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'county_id' => 'County',
			'city' => 'City',
			'street' => 'Street',
			'number' => 'Number',
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
		$criteria->compare('county_id',$this->county_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('number',$this->number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}