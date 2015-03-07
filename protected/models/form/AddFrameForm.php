<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/2/13
 * Time: 10:34 AM
 * To change this template use File | Settings | File Templates.
 */
class AddFrameForm extends CFormModel
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
            'name' => 'Nume cadru',
            'vaid' => 'Valid pentru vanzare'
        );
    }

    public function generateForm()
    {
        $params = array(
            'addFrameForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_FRAME, $params,true);
    }

    public function getMakers()
    {
        $frames = CHtml::listData(Maker::getAllMaker(), 'id', 'name');
        return $frames;

    }

    public function saveFrame()
    {
        $frame = new Frame();
        $frame->maker_id = $this->maker_id;
        $frame->name = $this->name;
        $frame->valid = 1;
        $frame->saveThrowEx();
        return $frame;
    }

}
