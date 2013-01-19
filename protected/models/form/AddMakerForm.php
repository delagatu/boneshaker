<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/6/12
 * Time: 7:25 PM
 * To change this template use File | Settings | File Templates.
 */
class AddMakerForm extends CFormModel
{

    public $name;
    public $item_type_id;


    public function rules()
    {
        return array(
            // name required, custom message
            array('name', 'required', 'message' => 'Numele producatorului este obligatoriu!'),

            // maker type required, custom message
            array('item_type_id', 'required', 'message' => 'Tipul de producator neselectat!'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Nume producator',
            'item_type_id' => 'Tipul'
        );
    }

    public function saveMaker()
    {
        $maker = new Maker();
        $maker->name = $this->name;
        $maker->item_type_id = $this->item_type_id;
        $maker->available = 1;
        $maker->save();
    }

}
