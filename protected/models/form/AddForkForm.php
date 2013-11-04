<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 9:04 PM
 * To change this template use File | Settings | File Templates.
 */
class AddForkForm extends CFormModel
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
            'name' => 'Nume furca',
            'vaid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addForkForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_FORK, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveFork()
    {
        $fork = new Fork();
        $fork->maker_id = $this->maker_id;
        $fork->name = $this->name;
        $fork->valid = 1;
        $fork->saveThrowEx();
        return $fork;
    }


}
