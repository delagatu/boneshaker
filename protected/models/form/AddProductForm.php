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
    public $product;
    public $accessory_type_id;
    public $equipment_type_id;
    public $component_type_id;
    public $accessory_sub_type_id;
    public $component_sub_type_id;

    public function rules()
    {
        return array(
            array('maker_id', 'required', 'message' => 'Alegeti producatorul'),
            array('accessory_type_id', 'required', 'on' =>'addAccessory','message' => 'Alegeti tipul accesoriului',),
//            array('accessory_sub_type_id', 'required', 'on' =>'addAccessory','message' => 'Alegeti tipul accesoriului',),
            array('equipment_type_id', 'required', 'on' =>'addEquipment','message' => 'Alegeti tipul echipamentului',),
            array('component_type_id', 'required', 'on' =>'addComponent','message' => 'Alegeti tipul componentei',),
//            array('component_type_sub_id', 'required', 'on' =>'addComponent','message' => 'Alegeti tipul sub componentei',),
            array('name', 'required','message' => 'Denumirea este obligatorie'),
//            array('description', 'required','message' => 'Descrierea este obligatorie'),
            array('price', 'required', 'message' => 'Pretul este obligatoriu'),
            array('price', 'numerical', 'allowEmpty' => false, 'message' => 'Te rog sa introduci doar numere'),
            array('description, product_id, sub_product_id, component_sub_type_id, accessory_sub_type_id', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'maker_id' => 'Producator',
            'sub_product_id' => 'Categorie',
            'name' => 'Denumire articol',
            'description' => 'Descriere',
            'price' => 'Pret',
            'accessory_type_id' => 'Tip accesoriu',
            'equipment_type_id' => 'Tip echipament',
            'component_type_id' => 'Tip Componenta',
            'accessory_sub_type_id' => 'Sub categorie',
            'component_sub_type_id' => 'Sub categorie',
        );
    }

    public function getDetails($productId)
    {
        $this->product = Product::getProductById($productId);
        if ($this->product instanceof Product)
        {
            $this->maker_id = $this->product->maker_id;
            $this->sub_product_id = $this->product->sub_product_id;
            $this->name = $this->product->name;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
            $this->accessory_type_id = $this->product->accessory_type_id;
            $this->equipment_type_id = $this->product->equipment_type_id;
            $this->component_type_id = $this->product->component_type_id;
            $this->accessory_sub_type_id = $this->product->accessory_sub_type_id;
            $this->component_sub_type_id = $this->product->component_sub_type_id;
        }

    }

    public function makerList()
    {
        $bikeMakers = Maker::getAll($this->item_type_id);
        return Chtml::listData($bikeMakers, 'id', 'name');
    }

    private function addOtherOption(Array $listData, $label = 'Altceva')
    {
        $listData['-1'] = $label;
        return $listData;
    }

    public function subProductList()
    {
        $subProducts = SubProduct::getAllSubProduct();
        $listData = Chtml::listData($subProducts,'id', 'name');
        return $this->addOtherOption($listData);
    }

    public function accessoryList()
    {
        $accessory = AccessoryType::getAll();
        $listData = Chtml::listData($accessory,'id', 'name');
        return $this->addOtherOption($listData);
    }

    public function accessorySubTypeList()
    {
        $accessorySubType = AccessorySubType::getAllSubProduct();
        $listData = CHtml::listData($accessorySubType, 'id', 'name');
        return $this->addOtherOption($listData);
    }

    public function equipmentList()
    {
        $equipmentTypes = EquipmentType::getAll();
        $listData = Chtml::listData($equipmentTypes,'id', 'name');
        return $this->addOtherOption($listData);
    }

    public function componentList()
    {
        $componentTypes = ComponentType::getAll();
        $listData = CHtml::listData($componentTypes, 'id', 'name');
        return $this->addOtherOption($listData);
    }

    public function componentSubTypeList()
    {
        $componentSubType = ComponentSubType::getAllSubProduct();
        $listData = CHtml::listData($componentSubType, 'id', 'name');
        return $this->addOtherOption($listData);
    }

    private function getProduct()
    {
        $product = new Product();
        if ($this->product instanceof Product)
        {
           $product = $this->product;
        }

        return $product;

    }

    public function saveProduct()
    {

        try {

            $this->photoUpload = new PhotoUpload();
            $this->photos = CUploadedFile::getInstancesByName('uploadFile');

            $attributes = array(
                'maker_id' => $this->maker_id,
                'item_type_id' => $this->item_type_id,
                'sub_product_id' => $this->sub_product_id,
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'available' => Product::AVAILABLE,
                'accessory_type_id' => $this->accessory_type_id,
                'equipment_type_id' => $this->equipment_type_id,
                'component_type_id' => $this->component_type_id,
                'accessory_sub_type_id' => $this->accessory_sub_type_id,
                'component_sub_type_id' => $this->component_sub_type_id
            );

            $product = $this->getProduct();

            if ($product->getIsNewRecord())
            {
                $attributes['created_at'] = new CDbExpression('NOW()');
            } else {
                $attributes['updated_at'] = new CDbExpression('NOW()');
            }

            $product->attributes = $attributes;
            $product->saveThrowEx();

            ProductKeywords::insertKeyWords();

            if (($product instanceof Product) && (!empty($this->photos))) {

                $this->photoUpload->saveFiles($product->id, $this->getUploadDir(), $this->photos);
            }

            unset($this->photos);

        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
        }

        return $product->id;
    }

    private function getUploadDir()
    {
        switch ($this->item_type_id)
        {
            case ItemType::ACCESORII:
                $dir =  Yii::app()->params['accessoryDir'];
                break;

            case ItemType::COMPONENTE:
                $dir =  Yii::app()->params['componentDir'];
                break;

            case ItemType::BICICLETE:
                $dir =  Yii::app()->params['biciclesDir'];
                break;

            case ItemType::ECHIPAMENTE:
                $dir =  Yii::app()->params['equipmentsDir'];
                break;

            default:
                $dir =  Yii::app()->params['defaultDir'];
        }

        return $dir;
    }

    public function getPhotos()
    {
        if ($this->product instanceof Product)
        {
            $photos =  Photo::getPhotoPerProduct($this->product->id);
        }

        if (!empty($photos))
        {
            echo '<div class = "grid_9 boldText">Nota: imaginile sunt doar exemplificative, marimea exacta se afiseaza accesandu-le.</div> ';
            echo '<div class = "grid_9 boldText">Nota: Dimensiumea este de formatul: Lungime X Inaltime</div> ';
            foreach ($photos as $key => $photo) {
                Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_PHOTOS, array('photo' => $photo));
            }
        }

    }

    public function getButtonLabel()
    {
        $label = 'Adauga';

        if ($this->product instanceof Product)
        {
            $label = 'Salveaza modificari';
        }

        return $label;
    }

    public function getCreationUpdateTime()
    {
        $createUpdate = array();
        if ($this->product instanceof Product)
        {
            if ($this->product->hasCreateDate())
            {
                $createUpdate['Inserat'] = $this->product->getCreatedDate('d-m-Y') . ', ora ' . $this->product->getCreatedDate('H:i:s');
            }

            if ($this->product->hasUpdateDate())
            {
                $createUpdate['Actualizat'] = $this->product->getUpdatedDate('d-m-Y') . ', ora ' . $this->product->getUpdatedDate('H:i:s');
            }

        }

        return $createUpdate;
    }
}
