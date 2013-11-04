<?php

/**
 * This is the model class for table "item_type".
 *
 * The followings are the available columns in table 'item_type':
 * @property integer $id
 * @property string $name
 * @property string $insert_date
 * @property integer $available
 * @property integer $submenu_only
 *
 * The followings are the available model relations:
 * @property Maker[] $makers
 * @property Product[] $products
 */
class ItemTypeBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemTypeBase the static model class
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
		return 'item_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('available, submenu_only', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('insert_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, insert_date, available, submenu_only', 'safe', 'on'=>'search'),
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
			'makers' => array(self::HAS_MANY, 'Maker', 'item_type_id'),
			'products' => array(self::HAS_MANY, 'Product', 'item_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'insert_date' => 'Insert Date',
			'available' => 'Available',
			'submenu_only' => 'Submenu Only',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('insert_date',$this->insert_date,true);
		$criteria->compare('available',$this->available);
		$criteria->compare('submenu_only',$this->submenu_only);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}