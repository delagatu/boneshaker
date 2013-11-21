<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */
class AddWheelSizeForm extends CFormModel
{

    public $name;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Marime roata nespecificata.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Marime roata',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addColorForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_COLOR, $params,true);
    }

    public function saveWheelSize()
    {
        $wheelSize = new WheelSize();
        $wheelSize->name = $this->name;
        $wheelSize->valid = 1;
        $wheelSize->saveThrowEx();
        return $wheelSize;
    }
}
