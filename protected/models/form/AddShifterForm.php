<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 9:18 PM
 * To change this template use File | Settings | File Templates.
 */
class AddShifterForm extends CFormModel
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
            'name' => 'Nume maneta',
            'vaid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addShifterForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_SHIFTER, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveShifter()
    {
        $shifter = new Shifter();
        $shifter->maker_id = $this->maker_id;
        $shifter->name = $this->name;
        $shifter->valid = 1;
        $shifter->saveThrowEx();
        return $shifter;
    }

}
