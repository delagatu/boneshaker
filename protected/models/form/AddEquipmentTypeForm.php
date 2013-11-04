<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/22/13
 * Time: 7:52 PM
 * To change this template use File | Settings | File Templates.
 */
class AddEquipmentTypeForm extends CFormModel
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
            'name' => 'Tipul nou: ',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addEquipmentTypeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_EQUIPMENT_TYPE, $params,true);
    }

    public function saveEquipmentType()
    {
        $equipment_type = new EquipmentType();
        $equipment_type->name = $this->name;
        $equipment_type->available = 1;
        $equipment_type->saveThrowEx();
        return $equipment_type;
    }

}
