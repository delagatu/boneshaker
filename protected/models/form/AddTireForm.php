<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/28/13
 * Time: 10:35 PM
 * To change this template use File | Settings | File Templates.
 */
class AddTireForm extends CFormModel
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
            'name' => 'Nume anvelopa',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addTireForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_TIRE, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getMakerByType(ItemType::ACCESORII), 'id', 'name');
        return $frames;

    }

    public function saveTire()
    {
        $tire = new Tire();
        $tire->maker_id = $this->maker_id;
        $tire->name = $this->name;
        $tire->valid = 1;
        $tire->saveThrowEx();
        return $tire;
    }

}
