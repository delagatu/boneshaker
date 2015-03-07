<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 11:55 AM
 * To change this template use File | Settings | File Templates.
 */
class AddChainWheelForm extends CFormModel
{
    public $maker_id;
    public $name;
    public $valid;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Nume nespecificat.'),
            array('valid, maker_id', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'maker_id' => 'Producator',
            'name' => 'Nume pedalier',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addChainWheelForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_CHAIN_WHEEL, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveChainWheel()
    {
        $chain_wheel = new ChainWheel();
        $chain_wheel->maker_id = $this->maker_id;
        $chain_wheel->name = $this->name;
        $chain_wheel->valid = 1;
        $chain_wheel->saveThrowEx();
        return $chain_wheel;
    }
}
