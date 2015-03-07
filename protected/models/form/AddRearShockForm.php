<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/21/13
 * Time: 10:19 PM
 * To change this template use File | Settings | File Templates.
 */

class AddRearShockForm extends CFormModel{

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
            'name' => 'Nume suspensie',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addRearShockForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_REAR_SHOCK, $params,true);
    }

    public function getMakers()
    {
        $makers = CHtml::listData(Maker::getMakerByType(ItemType::COMPONENTE), 'id', 'name');
        return $makers;

    }

    public function saveRearShock()
    {
        $rearShock = new RearShock();
        $rearShock->maker_id = $this->maker_id;
        $rearShock->name = $this->name;
        $rearShock->valid = 1;
        $rearShock->saveThrowEx();
        return $rearShock;
    }

}