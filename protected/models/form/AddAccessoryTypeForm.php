<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/17/13
 * Time: 10:38 AM
 * To change this template use File | Settings | File Templates.
 */
class AddAccessoryTypeForm extends CFormModel
{

    public $name;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Nume nespecificat.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nume accesoriu',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addAccessoryTypeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_ACCESSORY_TYPE, $params,true);
    }

    public function saveAccessoryType()
    {
        $accessory_type = new AccessoryType();
        $accessory_type->name = $this->name;
        $accessory_type->available = 1;
        $accessory_type->saveThrowEx();
        return $accessory_type;
    }

}
