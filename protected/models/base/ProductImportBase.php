<?php

/**
 * This is the model class for table "product_import".
 *
 * The followings are the available columns in table 'product_import':
 * @property integer $id
 * @property integer $product_id
 * @property string $import_date
 * @property integer $user_id
 * @property integer $import_source_id
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property ImportSource $importSource
 */
class ProductImportBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImportBase the static model class
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
		return 'product_import';
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
			array('product_id, user_id, import_source_id', 'numerical', 'integerOnly'=>true),
			array('import_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, import_date, user_id, import_source_id', 'safe', 'on'=>'search'),
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
			'importSource' => array(self::BELONGS_TO, 'ImportSource', 'import_source_id'),
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
			'import_date' => 'Import Date',
			'user_id' => 'User',
			'import_source_id' => 'Import Source',
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
		$criteria->compare('import_date',$this->import_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('import_source_id',$this->import_source_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}