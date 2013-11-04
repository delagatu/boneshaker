<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 9:32 PM
 * To change this template use File | Settings | File Templates.
 */
class AddDerailleurForm extends CFormModel
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
            'name' => 'Nume schimbator',
            'vaid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addDerailleurForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_DERAILLEUR, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveDerailleur()
    {
        $derailleur = new Derailleur();
        $derailleur->maker_id = $this->maker_id;
        $derailleur->name = $this->name;
        $derailleur->valid = 1;
        $derailleur->saveThrowEx();
        return $derailleur;
    }
}
