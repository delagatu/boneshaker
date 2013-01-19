<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 1/8/13
 * Time: 10:45 PM
 * To change this template use File | Settings | File Templates.
 */
class AddProductForm extends CFormModel
{
    public $maker_id;
    public $item_type_id;
    public $sub_product_id;
    public $name;
    public $description;
    public $price;
    public $photoUpload;
    public $photos;

    public function __construct($scenario = '')
    {
        $this->initialize();
    }

    private function initialize()
    {
        $this->item_type_id = ItemType::BICICLETE;
        $this->photoUpload = new PhotoUpload();
    }

    public function rules()
    {
        return array(
            array('maker_id', 'required', 'message' => 'Alegeti producatorul'),
            array('name', 'required','message' => 'Denumirea este obligatorie'),
            array('description', 'required','message' => 'Descrierea este obligatorie'),
            array('price', 'required', 'message' => 'Pretul este obligatoriu'),
            array('price', 'numerical', 'allowEmpty' => false, 'message' => 'Te rog sa introduci doar numere'),
            array('sub_product_id', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'maker_id' => 'Producator',
            'sub_product_id' => 'Categorie',
            'name' => 'Denumire articol',
            'description' => 'Descriere',
            'price' => 'Pret'
        );
    }

    public function makerList()
    {
        $bikeMakers = Maker::getMakerByType($this->item_type_id);
        return Chtml::listData($bikeMakers, 'id', 'name');
    }

    public function subProductList()
    {
        $subProducts = SubProduct::getAllSubProduct();
        return Chtml::listData($subProducts,'id', 'name');
    }

    public function saveProduct()
    {
        $this->photos = CUploadedFile::getInstancesByName('uploadFile');

        $attributes = array(
            'maker_id' => $this->maker_id,
            'item_type_id' => $this->item_type_id,
            'sub_product_id' => $this->sub_product_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'available' => Product::AVAILABLE,
            'created_at' => new CDbExpression('NOW()'),
        );

        $product = Product::newItem($attributes);
        if ($product instanceof Product)
        {
            $this->photoUpload->saveFiles($product->id, $this->photos);
            return $product->id;
        }

        return 0;
    }
}
