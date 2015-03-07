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
//        $this->prepareKeywords();
        $dataProvider = SearchProduct::model()->searchByKeyWord($this->keywords);
        return $dataProvider;
    }

}
