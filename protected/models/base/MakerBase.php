<?php

/**
 * This is the model class for table "maker".
 *
 * The followings are the available columns in table 'maker':
 * @property integer $id
 * @property integer $item_type_id
 * @property string $name
 * @property string $insert_date
 * @property integer $available
 *
 * The followings are the available model relations:
 * @property ItemType $itemType
 * @property Product[] $products
 */
class MakerBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MakerBase the static model class
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
		return 'maker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_type_id', 'required'),
			array('item_type_id, available', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>300),
			array('insert_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_type_id, name, insert_date, available', 'safe', 'on'=>'search'),
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
			'itemType' => array(self::BELONGS_TO, 'ItemType', 'item_type_id'),
			'products' => array(self::HAS_MANY, 'Product', 'maker_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'item_type_id' => 'Item Type',
			'name' => 'Name',
			'insert_date' => 'Insert Date',
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
		$criteria->compare('item_type_id',$this->item_type_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('insert_date',$this->insert_date,true);
		$criteria->compare('available',$this->available);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}