<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/7/13
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */
class AddColorForm extends CFormModel
{

    public $name;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Culoare nespecificata.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Culoare',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addColorForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_COLOR, $params,true);
    }

    public function saveColor()
    {
        $color = new Color();
        $color->name = $this->name;
        $color->valid = 1;
        $color->saveThrowEx();
        return $color;
    }
}
