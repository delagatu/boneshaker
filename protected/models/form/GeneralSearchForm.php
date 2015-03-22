<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/2/13
 * Time: 9:07 AM
 * To change this template use File | Settings | File Templates.
 */
class GeneralSearchForm extends CFormModel
{

    public $keywords;
    public $itemType;
    public $maker;
    public $sub_product_id;
    public $price;
    public $accessory_type_id;
    public $equipment_type_id;
    public $component_type_id;
//    public $accessory_sub_type_id; //todo: implement when accessory_sub_type_id usage is implemented


    public function rules()
    {
        return array(
            array('keywords', 'safe')
        );
    }

    private function prepareKeywords()
    {
        $this->keywords = strtolower(str_replace(' ', '', $this->keywords));
    }

    public function generateDataProvider()
    {
       $this->prepareKeywords();
       return  SearchProduct::model()->searchByKeyWord($this->keywords);

    }

}
