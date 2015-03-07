<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 1/11/14
 * Time: 11:35 AM
 */

class AddComponentSubTypeForm extends CFormModel{

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
            'name' => 'Nume sub categorie componente',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addComponentSubTypeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_COMPONENT_SUB_TYPE, $params,true);
    }

    public function saveComponentSubType()
    {
        $component_sub_type = new ComponentSubType();
        $component_sub_type->name = $this->name;
        $component_sub_type->available = 1;
        $component_sub_type->insert_date = new CDbExpression('NOW()');
        $component_sub_type->saveThrowEx();
        return $component_sub_type;
    }

} 