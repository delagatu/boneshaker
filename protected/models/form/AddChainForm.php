<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/9/13
 * Time: 12:13 PM
 * To change this template use File | Settings | File Templates.
 */
class AddChainForm extends CFormModel
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
            'name' => 'Nume lant',
            'valid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addChainForm' => $this,
        );

        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_CHAIN, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveChain()
    {
        $chain = new Chain();
        $chain->maker_id = $this->maker_id;
        $chain->name = $this->name;
        $chain->valid = 1;
        $chain->saveThrowEx();
        return $chain;
    }

}
