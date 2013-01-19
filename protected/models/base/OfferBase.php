<?php

/**
 * This is the model class for table "offer".
 *
 * The followings are the available columns in table 'offer':
 * @property integer $id
 * @property integer $product_id
 * @property string $offer_title
 * @property string $offer_description
 * @property integer $discount_percent
 * @property string $offer_price
 * @property string $begin_date
 * @property string $end_date
 * @property integer $available
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class OfferBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OfferBase the static model class
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
		return 'offer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id', 'required'),
			array('product_id, discount_percent, available', 'numerical', 'integerOnly'=>true),
			array('offer_title', 'length', 'max'=>100),
			array('offer_price', 'length', 'max'=>10),
			array('offer_description, begin_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, offer_title, offer_description, discount_percent, offer_price, begin_date, end_date, available', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'offer_title' => 'Offer Title',
			'offer_description' => 'Offer Description',
			'discount_percent' => 'Discount Percent',
			'offer_price' => 'Offer Price',
			'begin_date' => 'Begin Date',
			'end_date' => 'End Date',
			'available' => 'Available',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('offer_title',$this->offer_title,true);
		$criteria->compare('offer_description',$this->offer_description,true);
		$criteria->compare('discount_percent',$this->discount_percent);
		$criteria->compare('offer_price',$this->offer_price,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('available',$this->available);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}