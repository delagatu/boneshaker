<?php

/**
 * This is the model class for table "tire".
 *
 * The followings are the available columns in table 'tire':
 * @property integer $id
 * @property integer $maker_id
 * @property string $name
 * @property integer $valid
 *
 * The followings are the available model relations:
 * @property BicycleDescription[] $bicycleDescriptions
 * @property BicycleDescription[] $bicycleDescriptions1
 * @property Maker $maker
 */
class TireBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TireBase the static model class
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
		return 'tire';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maker_id, valid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, maker_id, name, valid', 'safe', 'on'=>'search'),
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
			'bicycleDescriptions' => array(self::HAS_MANY, 'BicycleDescription', 'rear_tire_id'),
			'bicycleDescriptions1' => array(self::HAS_MANY, 'BicycleDescription', 'front_tire_id'),
			'maker' => array(self::BELONGS_TO, 'Maker', 'maker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'maker_id' => 'Maker',
			'name' => 'Name',
			'valid' => 'Valid',
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
		$criteria->compare('maker_id',$this->maker_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('valid',$this->valid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}