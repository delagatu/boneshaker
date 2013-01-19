<?php

/**
 * This is the model class for table "photo_source".
 *
 * The followings are the available columns in table 'photo_source':
 * @property integer $id
 * @property integer $photo_id
 * @property string $photo_source_path
 * @property integer $photo_type_id
 *
 * The followings are the available model relations:
 * @property Photo $photo
 * @property PhotoType $photoType
 */
class PhotoSourceBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PhotoSourceBase the static model class
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
		return 'photo_source';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_id, photo_type_id', 'required'),
			array('photo_id, photo_type_id', 'numerical', 'integerOnly'=>true),
			array('photo_source_path', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, photo_id, photo_source_path, photo_type_id', 'safe', 'on'=>'search'),
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
			'photo' => array(self::BELONGS_TO, 'Photo', 'photo_id'),
			'photoType' => array(self::BELONGS_TO, 'PhotoType', 'photo_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'photo_id' => 'Photo',
			'photo_source_path' => 'Photo Source Path',
			'photo_type_id' => 'Photo Type',
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
		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('photo_source_path',$this->photo_source_path,true);
		$criteria->compare('photo_type_id',$this->photo_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}