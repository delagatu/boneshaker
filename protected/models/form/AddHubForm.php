<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 12:22 PM
 * To change this template use File | Settings | File Templates.
 */
class AddHubForm extends CFormModel
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
            'name' => 'Nume butuc',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addHubForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_HUB, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveHub()
    {
        $hub = new Hub();
        $hub->maker_id = $this->maker_id;
        $hub->name = $this->name;
        $hub->valid = 1;
        $hub->saveThrowEx();
        return $hub;
    }
}
