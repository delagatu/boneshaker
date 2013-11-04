<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 9:47 PM
 * To change this template use File | Settings | File Templates.
 */
class AddBrakeLeverForm extends CFormModel
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
            'name' => 'Nume maneta frana',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addBrakeLeverForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_BRAKE_LEVER, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveBrakeLever()
    {
        $brake_lever = new BrakeLever();
        $brake_lever->maker_id = $this->maker_id;
        $brake_lever->name = $this->name;
        $brake_lever->valid = 1;
        $brake_lever->saveThrowEx();
        return $brake_lever;
    }
}
