<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $maker_id
 * @property integer $item_type_id
 * @property integer $sub_product_id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property integer $available
 * @property string $created_at
 * @property string $updated_at
 * @property integer $accessory_type_id
 * @property integer $equipment_type_id
 * @property integer $component_type_id
 * @property integer $accessory_sub_type_id
 * @property integer $component_sub_type_id
 *
 * The followings are the available model relations:
 * @property BicycleDescription[] $bicycleDescriptions
 * @property CartDetail[] $cartDetails
 * @property HomePageProduct[] $homePageProducts
 * @property Offer[] $offers
 * @property Photo[] $photos
 * @property AccessorySubType $accessorySubType
 * @property ComponentSubType $componentSubType
 * @property ComponentType $componentType
 * @property EquipmentType $equipmentType
 * @property Maker $maker
 * @property ItemType $itemType
 * @property SubProduct $subProduct
 * @property AccessoryType $accessoryType
 * @property ProductImport[] $productImports
 * @property ProductKeywords[] $productKeywords
 */
class ProductBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductBase the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maker_id, item_type_id, created_at', 'required'),
			array('maker_id, item_type_id, sub_product_id, available, accessory_type_id, equipment_type_id, component_type_id, accessory_sub_type_id, component_sub_type_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>300),
			array('price', 'length', 'max'=>10),
			array('description, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, maker_id, item_type_id, sub_product_id, name, description, price, available, created_at, updated_at, accessory_type_id, equipment_type_id, component_type_id, accessory_sub_type_id, component_sub_type_id', 'safe', 'on'=>'search'),
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
			'bicycleDescriptions' => array(self::HAS_MANY, 'BicycleDescription', 'product_id'),
			'cartDetails' => array(self::HAS_MANY, 'CartDetail', 'product_id'),
			'homePageProducts' => array(self::HAS_MANY, 'HomePageProduct', 'product_id'),
			'offers' => array(self::HAS_MANY, 'Offer', 'product_id'),
			'photos' => array(self::HAS_MANY, 'Photo', 'product_id'),
			'accessorySubType' => array(self::BELONGS_TO, 'AccessorySubType', 'accessory_sub_type_id'),
			'componentSubType' => array(self::BELONGS_TO, 'ComponentSubType', 'component_sub_type_id'),
			'componentType' => array(self::BELONGS_TO, 'ComponentType', 'component_type_id'),
			'equipmentType' => array(self::BELONGS_TO, 'EquipmentType', 'equipment_type_id'),
			'maker' => array(self::BELONGS_TO, 'Maker', 'maker_id'),
			'itemType' => array(self::BELONGS_TO, 'ItemType', 'item_type_id'),
			'subProduct' => array(self::BELONGS_TO, 'SubProduct', 'sub_product_id'),
			'accessoryType' => array(self::BELONGS_TO, 'AccessoryType', 'accessory_type_id'),
			'productImports' => array(self::HAS_MANY, 'ProductImport', 'product_id'),
			'productKeywords' => array(self::HAS_MANY, 'ProductKeywords', 'product_id'),
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
			'item_type_id' => 'Item Type',
			'sub_product_id' => 'Sub Product',
			'name' => 'Name',
			'description' => 'Description',
			'price' => 'Price',
			'available' => 'Available',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'accessory_type_id' => 'Accessory Type',
			'equipment_type_id' => 'Equipment Type',
			'component_type_id' => 'Component Type',
			'accessory_sub_type_id' => 'Accessory Sub Type',
			'component_sub_type_id' => 'Component Sub Type',
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
		$criteria->compare('item_type_id',$this->item_type_id);
		$criteria->compare('sub_product_id',$this->sub_product_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('available',$this->available);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('accessory_type_id',$this->accessory_type_id);
		$criteria->compare('equipment_type_id',$this->equipment_type_id);
		$criteria->compare('component_type_id',$this->component_type_id);
		$criteria->compare('accessory_sub_type_id',$this->accessory_sub_type_id);
		$criteria->compare('component_sub_type_id',$this->component_sub_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}