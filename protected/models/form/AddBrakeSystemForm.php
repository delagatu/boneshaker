<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 11:40 AM
 * To change this template use File | Settings | File Templates.
 */
class AddBrakeSystemForm extends CFormModel
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
            'name' => 'Nume frana',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addBrakeSystemForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_BRAKE_SYSTEM, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveBrakeSystem()
    {
        $brake_system = new BrakeSystem();
        $brake_system->maker_id = $this->maker_id;
        $brake_system->name = $this->name;
        $brake_system->valid = 1;
        $brake_system->saveThrowEx();
        return $brake_system;
    }
}
