<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 12:42 PM
 * To change this template use File | Settings | File Templates.
 */
class AddRimForm extends CFormModel
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
            'name' => 'Nume janta',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addRimForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_RIM, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getMakerByType(ItemType::ACCESORII), 'id', 'name');
        return $frames;

    }

    public function saveRim()
    {
        $rim = new Rim();
        $rim->maker_id = $this->maker_id;
        $rim->name = $this->name;
        $rim->valid = 1;
        $rim->saveThrowEx();
        return $rim;
    }

}
