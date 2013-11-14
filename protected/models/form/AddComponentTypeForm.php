<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/11/13
 * Time: 10:27 PM
 * To change this template use File | Settings | File Templates.
 */

class AddComponentTypeForm extends CFormModel
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
            'name' => 'Nume componenta',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addComponentTypeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_COMPONENT_TYPE, $params,true);
    }

    public function saveComponentType()
    {
        $componentType = new ComponentType();
        $componentType->name = $this->name;
        $componentType->available = 1;
        $componentType->saveThrowEx();
        return $componentType;
    }
}