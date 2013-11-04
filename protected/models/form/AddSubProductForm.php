<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/10/13
 * Time: 7:44 PM
 * To change this template use File | Settings | File Templates.
 */
class AddSubProductForm extends CFormModel
{

    public $name;

    public function rules()
    {
        return array(
            array('name','required', 'message' => 'Categorie nespecificata.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nume categorie',
        );
    }

    public function generateForm()
    {
        $params = array(
            'addSubProductForm' => $this,
        );
        return Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_ADD_SUB_PRODUCT, $params,true);
    }

    public function saveSubProduct()
    {
        $sub_product = new SubProduct();
        $sub_product->name = $this->name;
        $sub_product->available = 1;
        $sub_product->insert_date = new CDbExpression('NOW()');
        $sub_product->saveThrowEx();
        return $sub_product;
    }

}
