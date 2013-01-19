<?php

/**
 * This is the model class for table "bicycle_description".
 *
 * The followings are the available columns in table 'bicycle_description':
 * @property integer $id
 * @property integer $product_id
 * @property string $freewheel
 * @property string $spokes
 * @property string $tires
 * @property string $handlebar
 * @property string $stem
 * @property string $headset
 * @property string $seatpost
 * @property string $saddle
 * @property string $pedals
 * @property integer $frame_id
 * @property integer $size_id
 * @property integer $speed_id
 * @property integer $color_id
 * @property integer $fork_id
 * @property integer $derailleur_front_id
 * @property integer $derailleur_rear_id
 * @property integer $shifter_id
 * @property integer $brake_lever_id
 * @property integer $brake_system_id
 * @property integer $chain_wheel_id
 * @property integer $bb_set_id
 * @property integer $chain_id
 * @property integer $front_hub_id
 * @property integer $rear_hub_id
 * @property integer $rim_id
 * @property integer $front_rim_id
 * @property integer $rear_rim_id
 *
 * The followings are the available model relations:
 * @property BbSet $bbSet
 * @property BrakeLever $brakeLever
 * @property BrakeSystem $brakeSystem
 * @property Chain $chain
 * @property ChainWheel $chainWheel
 * @property Derailleur $derailleurFront
 * @property Derailleur $derailleurRear
 * @property Hub $frontHub
 * @property Rim $frontRim
 * @property Product $product
 * @property Frame $frame
 * @property BicycleSize $size
 * @property Speed $speed
 * @property Color $color
 * @property Hub $rearHub
 * @property Rim $rearRim
 * @property Fork $fork
 * @property Shifter $shifter
 */
class BicycleDescriptionBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BicycleDescriptionBase the static model class
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
		return 'bicycle_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, frame_id, size_id, speed_id, color_id, fork_id, derailleur_front_id, derailleur_rear_id, shifter_id, brake_lever_id, brake_system_id, chain_wheel_id, chain_id, front_hub_id, rear_hub_id, rim_id, front_rim_id, rear_rim_id', 'required'),
			array('product_id, frame_id, size_id, speed_id, color_id, fork_id, derailleur_front_id, derailleur_rear_id, shifter_id, brake_lever_id, brake_system_id, chain_wheel_id, bb_set_id, chain_id, front_hub_id, rear_hub_id, rim_id, front_rim_id, rear_rim_id', 'numerical', 'integerOnly'=>true),
			array('freewheel, spokes, tires, handlebar, stem, headset, seatpost, saddle, pedals', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, freewheel, spokes, tires, handlebar, stem, headset, seatpost, saddle, pedals, frame_id, size_id, speed_id, color_id, fork_id, derailleur_front_id, derailleur_rear_id, shifter_id, brake_lever_id, brake_system_id, chain_wheel_id, bb_set_id, chain_id, front_hub_id, rear_hub_id, rim_id, front_rim_id, rear_rim_id', 'safe', 'on'=>'search'),
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
			'bbSet' => array(self::BELONGS_TO, 'BbSet', 'bb_set_id'),
			'brakeLever' => array(self::BELONGS_TO, 'BrakeLever', 'brake_lever_id'),
			'brakeSystem' => array(self::BELONGS_TO, 'BrakeSystem', 'brake_system_id'),
			'chain' => array(self::BELONGS_TO, 'Chain', 'chain_id'),
			'chainWheel' => array(self::BELONGS_TO, 'ChainWheel', 'chain_wheel_id'),
			'derailleurFront' => array(self::BELONGS_TO, 'Derailleur', 'derailleur_front_id'),
			'derailleurRear' => array(self::BELONGS_TO, 'Derailleur', 'derailleur_rear_id'),
			'frontHub' => array(self::BELONGS_TO, 'Hub', 'front_hub_id'),
			'frontRim' => array(self::BELONGS_TO, 'Rim', 'front_rim_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'frame' => array(self::BELONGS_TO, 'Frame', 'frame_id'),
			'size' => array(self::BELONGS_TO, 'BicycleSize', 'size_id'),
			'speed' => array(self::BELONGS_TO, 'Speed', 'speed_id'),
			'color' => array(self::BELONGS_TO, 'Color', 'color_id'),
			'rearHub' => array(self::BELONGS_TO, 'Hub', 'rear_hub_id'),
			'rearRim' => array(self::BELONGS_TO, 'Rim', 'rear_rim_id'),
			'fork' => array(self::BELONGS_TO, 'Fork', 'fork_id'),
			'shifter' => array(self::BELONGS_TO, 'Shifter', 'shifter_id'),
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
			'freewheel' => 'Freewheel',
			'spokes' => 'Spokes',
			'tires' => 'Tires',
			'handlebar' => 'Handlebar',
			'stem' => 'Stem',
			'headset' => 'Headset',
			'seatpost' => 'Seatpost',
			'saddle' => 'Saddle',
			'pedals' => 'Pedals',
			'frame_id' => 'Frame',
			'size_id' => 'Size',
			'speed_id' => 'Speed',
			'color_id' => 'Color',
			'fork_id' => 'Fork',
			'derailleur_front_id' => 'Derailleur Front',
			'derailleur_rear_id' => 'Derailleur Rear',
			'shifter_id' => 'Shifter',
			'brake_lever_id' => 'Brake Lever',
			'brake_system_id' => 'Brake System',
			'chain_wheel_id' => 'Chain Wheel',
			'bb_set_id' => 'Bb Set',
			'chain_id' => 'Chain',
			'front_hub_id' => 'Front Hub',
			'rear_hub_id' => 'Rear Hub',
			'rim_id' => 'Rim',
			'front_rim_id' => 'Front Rim',
			'rear_rim_id' => 'Rear Rim',
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
		$criteria->compare('freewheel',$this->freewheel,true);
		$criteria->compare('spokes',$this->spokes,true);
		$criteria->compare('tires',$this->tires,true);
		$criteria->compare('handlebar',$this->handlebar,true);
		$criteria->compare('stem',$this->stem,true);
		$criteria->compare('headset',$this->headset,true);
		$criteria->compare('seatpost',$this->seatpost,true);
		$criteria->compare('saddle',$this->saddle,true);
		$criteria->compare('pedals',$this->pedals,true);
		$criteria->compare('frame_id',$this->frame_id);
		$criteria->compare('size_id',$this->size_id);
		$criteria->compare('speed_id',$this->speed_id);
		$criteria->compare('color_id',$this->color_id);
		$criteria->compare('fork_id',$this->fork_id);
		$criteria->compare('derailleur_front_id',$this->derailleur_front_id);
		$criteria->compare('derailleur_rear_id',$this->derailleur_rear_id);
		$criteria->compare('shifter_id',$this->shifter_id);
		$criteria->compare('brake_lever_id',$this->brake_lever_id);
		$criteria->compare('brake_system_id',$this->brake_system_id);
		$criteria->compare('chain_wheel_id',$this->chain_wheel_id);
		$criteria->compare('bb_set_id',$this->bb_set_id);
		$criteria->compare('chain_id',$this->chain_id);
		$criteria->compare('front_hub_id',$this->front_hub_id);
		$criteria->compare('rear_hub_id',$this->rear_hub_id);
		$criteria->compare('rim_id',$this->rim_id);
		$criteria->compare('front_rim_id',$this->front_rim_id);
		$criteria->compare('rear_rim_id',$this->rear_rim_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}