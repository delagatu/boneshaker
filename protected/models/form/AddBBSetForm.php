<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 12:05 PM
 * To change this template use File | Settings | File Templates.
 */
class AddBBSetForm extends CFormModel
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
            'name' => 'Nume butuc pedalier',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addBBSetForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_BB_SET, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveBBSet()
    {
        $bb_set = new BbSet();
        $bb_set->maker_id = $this->maker_id;
        $bb_set->name = $this->name;
        $bb_set->valid = 1;
        $bb_set->saveThrowEx();
        return $bb_set;
    }

}
