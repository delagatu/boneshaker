<?php

/**
 * This is the model class for table "product_keywords".
 *
 * The followings are the available columns in table 'product_keywords':
 * @property integer $id
 * @property integer $product_id
 * @property string $keywords
 * @property string $details_keywords
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductKeywordsBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductKeywordsBase the static model class
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
		return 'product_keywords';
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
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('keywords, details_keywords', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, keywords, details_keywords', 'safe', 'on'=>'search'),
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
			'keywords' => 'Keywords',
			'details_keywords' => 'Details Keywords',
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('details_keywords',$this->details_keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}