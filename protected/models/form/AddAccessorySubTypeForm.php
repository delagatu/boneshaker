<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 12/4/13
 * Time: 10:42 PM
 * To change this template use File | Settings | File Templates.
 */

class AddAccessorySubTypeForm extends CFormModel{

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
            'name' => 'Nume sub categorie accesorii',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addAccessorySubTypeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_ACCESSORY_SUB_TYPE, $params,true);
    }

    public function saveAccessorySubType()
    {
        $accessory_sub_type = new AccessorySubType();
        $accessory_sub_type->name = $this->name;
        $accessory_sub_type->available = 1;
        $accessory_sub_type->saveThrowEx();
        return $accessory_sub_type;
    }

}