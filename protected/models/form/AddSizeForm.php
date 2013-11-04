<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/6/13
 * Time: 8:36 PM
 * To change this template use File | Settings | File Templates.
 */
class AddSizeForm extends CFormModel
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
            'name' => 'Marime',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addSizeForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_SIZE, $params,true);
    }

    public function saveSize()
    {
        $bicicleSize = new BicycleSize();
        $bicicleSize->size = $this->name;
        $bicicleSize->valid = 1;
        $bicicleSize->saveThrowEx();
        return $bicicleSize;
    }
}
