<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 8:17 PM
 * To change this template use File | Settings | File Templates.
 */
class AddSpeedForm extends CFormModel
{
    public $name;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Camp obligatoriu.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nr. Viteze',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addSpeedForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_SPEED, $params,true);
    }

    public function saveSpeed()
    {
        $speed = new Speed();
        $speed->name = $this->name;
        $speed->valid = 1;
        $speed->saveThrowEx();
        return $speed;
    }
}
