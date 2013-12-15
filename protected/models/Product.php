<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:30 PM
 * To change this template use File | Settings | File Templates.
 */

class Product extends ProductBase
{
    /**
     * @static
     * @param string $className
     * @return ProductBase
     */

    const AVAILABLE = 1;
    const NOT_AVAILABLE = 0;

    /**
     * @param string $className
     * @return ProductBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function isBicycle()
    {
        return $this->item_type_id == ItemType::BICICLETE;
    }

    public function isAccessory()
    {
        return $this->item_type_id == ItemType::ACCESORII;
    }

    public function isComponent()
    {
        return $this->item_type_id == ItemType::COMPONENTE;
    }

    public function isEquipment()
    {
        return $this->item_type_id == ItemType::ECHIPAMENTE;
    }

    public function getItemType()
    {
        return $this->item_type_id;
    }

    public function getItemTypeName($default = 'INVALID')
    {
        return ($this->itemType instanceof ItemType) ? $this->itemType->getName() : $default;
    }

    public static function setUpdateDate($id)
    {
        $attributes = array('updated_at' => new CDbExpression('NOW()'));
        return self::model()->updateByPk($id, $attributes);
    }

    public function invalidate()
    {
        $this->available = self::NOT_AVAILABLE;
        $this->updated_at = new CDbExpression('NOW()');
       return $this->update(array ('available', 'updated_at'));
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), 1));
        }
    }

    public function limitProduct($offset, $limit)
    {
        $this->getDbCriteria()->mergeWith(
            array(
                'offset' => $offset,
                'limit' => $limit,
            )
        );

        return $this;
    }

    public function getProduct()
    {
        return self::model()->with('photos')->orderProductDescByDate()->findAll(array(
            'condition' => 'available=:available',
            'params' => array(':available' => 1,),
        ));
    }

    public function getByMaker($makerId = null, $subProductId = null, $homePage = false)
    {
        $criteria = new CDbCriteria();
        $criteria->compare($this->tableAlias . '.available', self::AVAILABLE);
        $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        $criteria->compare($this->tableAlias . '.sub_product_id', $subProductId);

        $homePageProductAvailable = HomePageProduct::areProductsAvailable();

        if ($homePageProductAvailable && $homePage) {
            $criteria->join = ' INNER JOIN home_page_product hpp ON ' . $this->tableAlias .'.id = hpp.product_id';
        }

        $criteria->order = $this->tableAlias . '.created_at DESC';

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        $dataProvider->pagination = array('pageSize' => BaseController::PAGE_SIZE, 'pageVar' => 'pagina');

        return $dataProvider;
    }

    public function getProductByTypeAndMaker($typeId, $makerName = null, $subProduct = null, $homePage = false)
    {
        $makerId = null;
        if (!empty($makerName))
        {
            $makerId = Maker::getIdByName($makerName);
        }

        $subProductId = null;
        if (!empty($subProduct))
        {
            $subProductId = SubProduct::getIdByName($subProduct);
        }

        $dataProvider = $this->getByMaker($makerId, $subProductId, $homePage);
        $criteria = $dataProvider->getCriteria();
        $criteria->compare($this->tableAlias . '.item_type_id', $typeId);
        $dataProvider->criteria = $criteria;

        return $dataProvider;

    }

    private function componentSort($usage, $subUsage)
    {
        $criteria = new CDbCriteria();

        if (ComponentType::isValid($usage))
        {
            $componentId = ComponentType::getIdByLabel($usage);
            $criteria->compare($this->tableAlias . '.component_type_id', $componentId);
        }

        if (Maker::validMaker($usage))
        {
            $makerId = Maker::getIdByLabelAndType($usage, ItemType::COMPONENTE);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        if (!empty($subUsage) && Maker::validMaker($subUsage))
        {
            $makerId = Maker::getIdByLabelAndType($subUsage, ItemType::COMPONENTE);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        return $criteria;
    }

    private function accessorySort($usage, $subUsage)
    {
        $criteria = new CDbCriteria();

        if (AccessoryType::isValid($usage))
        {
            $accessoryTypeId = AccessoryType::getIdByLabel($usage);
            $criteria->compare($this->tableAlias . '.accessory_type_id', $accessoryTypeId);
        }

        if (Maker::validMaker($usage))
        {
            $makerId = Maker::getIdByLabelAndType($usage, ItemType::ACCESORII);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        if (!empty($subUsage) && Maker::validMaker($subUsage))
        {
            $makerId = Maker::getIdByLabelAndType($subUsage, ItemType::ACCESORII);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        return $criteria;
    }

    private function equipmentSort($usage, $subUsage)
    {
        $criteria = new CDbCriteria();

        if (EquipmentType::isValid($usage))
        {
            $equipmentTypeId = EquipmentType::getIdByLabel($usage);
            $criteria->compare($this->tableAlias . '.equipment_type_id', $equipmentTypeId);
        }

        if (Maker::validMaker($usage))
        {
            $makerId = Maker::getIdByLabelAndType($usage, ItemType::ECHIPAMENTE);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        if (!empty($subUsage) && Maker::validMaker($subUsage))
        {
            $makerId = Maker::getIdByLabelAndType($subUsage, ItemType::ECHIPAMENTE);
            $criteria->compare($this->tableAlias . '.maker_id', $makerId);
        }

        return $criteria;
    }

    public function getProductByTypeAndUsage($typeId, $usage, $subUsage = '')
    {
        $criteria = new CDbCriteria();
        $criteria->compare($this->tableAlias . '.available', self::AVAILABLE);
        $criteria->compare($this->tableAlias . '.item_type_id', $typeId);

        if ($typeId == ItemType::ACCESORII)
        {

            $criteria->mergeWith($this->accessorySort($usage, $subUsage));
        }

        if ($typeId == ItemType::COMPONENTE)
        {
            $criteria->mergeWith($this->componentSort($usage, $subUsage));
        }

        if ($typeId == ItemType::ECHIPAMENTE)
        {
//            $equipmentId = EquipmentType::getIdByLabel($usage);
//            $criteria->compare($this->tableAlias . '.equipment_type_id', $equipmentId);

            $criteria->mergeWith($this->equipmentSort($usage, $subUsage));
        }

        $criteria->order = $this->tableAlias . '.created_at DESC';

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        $dataProvider->pagination = array('pageSize' => BaseController::PAGE_SIZE, 'pageVar' => 'pagina');

        return $dataProvider;

    }

    public function getPrimaryPhotoByType($type)
    {
        $photo = Photo::getPrimaryPhotoPerProduct($this->id);
        if ($photo instanceof Photo)
        {
            $photoSource = PhotoSource::getByPhotoAndType($photo->id,$type);
            if ($photoSource instanceof PhotoSource)
            {
                return $photoSource->photo_source_path;
            }
        }
    }

    public function getBigOrNot()
    {
        $photo = Photo::getPrimaryPhotoPerProduct($this->id);
        if ($photo instanceof Photo)
        {
            $photoSource = PhotoSource::getByPhotoAndType($photo->id,PhotoType::PHOTO_TYPE_BIG_ID);
            if ($photoSource instanceof PhotoSource)
            {
                return $photoSource->photo_source_path;
            }
        }

        return $this->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_MEDIUM_ID);
    }

    public function orderProductDescByDate()
    {
        $this->getDbCriteria()->mergeWith(
            array(
                'order' => $this->tableAlias . '.created_at DESC'
            )
        );

        return $this;
    }

    /**
     * @param $makerId
     * @return mixed
     */
    public function getAllBicyleByMaker($makerId)
    {
        return self::model()->findAll(array(
            'condition' => 'item_type_id=:item_type_id and maker_id=:maker_id and available=:available',
            'params' => array(':item_type_id' => ItemType::BICICLETE,
                ':maker_id' => $makerId,
                'available' => self::AVAILABLE,
            ),
        ));
    }

    /**
     * @param $productId
     * @return mixed
     */
    public static function getProductById($productId)
    {
        return self::model()->with(array('photos' => array('joinType' => 'LEFT JOIN') ))->findByPk($productId);
    }

    public static function isProductAvailable($id)
    {
        return self::model()->exists(
            'id =:id AND available =:available',
            array(
                ':id' => $id,
                 ':available' => self::AVAILABLE,
            )
        );
    }

    public static function newItem($attributes)
    {
        $product = new Product();
        $product->attributes = $attributes;
        $product->saveThrowEx();
        return $product;
    }

    public function getMaker($default = 'INVALID')
    {
        return ($this->maker instanceof Maker) ? $this->maker->getName() : $default;
    }

    public function getName()
    {
        return $this->name;
    }

    public function hasPrice()
    {
        $price = floor($this->price);
        return !empty($price);
    }

    public function getPrice()
    {
        return floor($this->price) .' RON ';
    }

    public function displayPrice($additionalClass = '')
    {
        if ($this->hasPrice())
        {
            return '<span class="boldText '.$additionalClass.'">'. $this->getPrice() . '</span>';
        }

        return Chtml::image(Yii::app()->getBaseUrl(true) . '/images/design/Phone-icon20x20.png', 'Telefonic', array('class' => 'align-text-bottom'));

    }

    public function getCreatedDate($format = 'd-m-Y')
    {
        return date($format,strtotime($this->created_at));
    }

    public function getUpdatedDate($format = 'd-m-Y')
    {
        return !empty($this->updated_at) ? date($format,strtotime($this->updated_at)) : '';
    }

    public function getAllByType($type, $maker = null, $name = null, $price = null)
    {
        $criteria = new CDbCriteria();
        $criteria->with = array('maker' => array('alias' => 'ma'));
        $criteria->compare($this->tableAlias . '.item_type_id', $type);
        $criteria->addSearchCondition('ma.name',$maker);
        $criteria->addSearchCondition($this->tableAlias .'.name',$name);
        $criteria->addSearchCondition($this->tableAlias .'.price',$price);

        $sort = array(
            'defaultOrder' => $this->tableAlias . '.available DESC',
            'attributes' => array(
                'maker_name_sort' => array(
                    'asc' => 'ma.name ASC',
                    'desc' => 'ma.name DESC',
                ),
                'bicycle_name_sort' => array(
                    'asc' => $this->tableAlias . '.name ASC',
                    'desc' => $this->tableAlias . 'name DESC',
                ),

                'price_sort' => array(
                    'asc' => $this->tableAlias . '.price ASC',
                    'desc' => $this->tableAlias . '.price DESC',
                ),

                'created_at_sort' => array(
                    'asc' => $this->tableAlias . '.created_at ASC',
                    'desc' => $this->tableAlias . '.created_at DESC',
                ),

                'updated_at_sort' => array(
                    'asc' => $this->tableAlias . '.updated_at ASC',
                    'desc' => $this->tableAlias . '.updated_at DESC',
                ),

                'valid_sort' => array(
                    'asc' => $this->tableAlias . '.available ASC',
                    'desc' => $this->tableAlias . '.available DESC',
                ),

                '*',
            ),
        );

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        $dataProvider->pagination = array('pageSize' => 10);
        $dataProvider->sort = $sort;

        return $dataProvider;
    }


    public function getBikeAvailableActions()
    {
        $generalInfo = Chtml::link('General', Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_ADD_BICYCLE, array('id' => $this->id)));
        $pieces = Chtml::link('Componente', Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_ADD_BICYCLE_DETAILS, array('id' => $this->id)));

        return $generalInfo . '<br />' . $pieces;
    }

    public function getAccessoryEditLink()
    {
        $editLink = Chtml::link('Editeaza', Yii::app()->controller->createUrl(ControllerPagePartial::ACTION_ADD, array('id' => $this->id)));
        return $editLink;
    }

    public function getComponentEditLink()
    {
        $editLink = Chtml::link('Editeaza', Yii::app()->controller->createUrl(ControllerPagePartial::ACTION_ADD_COMPONENTS, array('id' => $this->id)));
        return $editLink;
    }


    public function getEquipmentEditLink()
    {
        $editLink = Chtml::link('Editeaza', Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_ACTION_ADD_EQUIPMENT, array('id' => $this->id)));
        return $editLink;
    }

    public function getDisplayName()
    {
        $maker = $this->getMaker(' ');
        return empty($maker) ? '' : $maker . '-' . $this->name;
    }

    public function getDisplayNameWithId()
    {
        $displayName = $this->getDisplayName();
        return str_replace(' ', '-', $displayName)  . '-' . $this->id;
    }

    public function isAvailable()
    {
        return $this->available == 1;
    }

    public function isValidCheckBox()
    {
        $deleteHtmlOptions = array(
            'data-delete-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_VALIDATE_PRODUCT),
            'data-delete-id' => $this->id,
            'class' => 'delete-product',
        );

        return Chtml::checkBox('product-valid-' . $this->id, $this->isAvailable(),$deleteHtmlOptions);
    }

    private function getDescriptionWithLimit($length = 120)
    {
        $substr = str_replace('<br>', '', substr($this->description, 0, $length));

//        $startDiv =  preg_replace('~(.*)' . preg_quote('<div>', '~') . '~', '$1' . '', $substr, 1);
//        return preg_replace('~(.*)' . preg_quote('</div>', '~') . '~', '$1' . '', $startDiv, 1);

        return substr_replace($substr, '', strrpos($substr, '<div>'), strlen($substr)) . '...';




    }

    private function getBicycleComponents()
    {
        $bicycleDescription = BicycleDescription::getByProductId($this->id);

        if ($bicycleDescription instanceof BicycleDescription)
        {
            return $bicycleDescription->getLimitedData(4);
        }

        return $this->getDescriptionWithLimit();

    }

    public function getLimitedDescription($length = 120)
    {
        if ($this->isBicycle())
        {
            return $this->getBicycleComponents();
        }

        return $this->getDescriptionWithLimit($length);
    }

    public function randomCriteria()
    {
        $this->getDbCriteria()->mergeWith(
            array(
                'order' => 'RAND()',
                'limit' => 1
            )
        );

        return $this;

    }

    public static function getRandomProduct()
    {
        $condition = ' available =:available ';
        $params = array(':available' => self::AVAILABLE);

        return self::model()->randomCriteria()->find($condition, $params);
    }

    public static function getWithoutKeywords()
    {
        $criteria = new CDbCriteria();

        $criteria->alias = 'pr';
        $criteria->join = ' LEFT JOIN product_keywords pk on pr.id = pk.product_id ';
        $criteria->addCondition('pk.product_id IS NULL');
        $criteria->compare('pr.available', self::AVAILABLE);

        return self::model()->findAll($criteria);
    }

    public function getSubProductName($default = 'INVALID')
    {
        return ($this->subProduct instanceof SubProduct) ? $this->subProduct->getName() : $default;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAccessoryTypeName($default = 'INVALID')
    {
        return ($this->accessoryType instanceof AccessoryType) ? $this->accessoryType->getName() : $default;
    }

    public function getAccessorySubTypeName($default = 'INVALID')
    {
        return ($this->accessorySubType instanceof AccessorySubType) ? $this->accessorySubType->getName() : $default;
    }

    public function getEquipmentTypeName($default = 'INVALID')
    {
        return ($this->equipmentType instanceof EquipmentType) ? $this->equipmentType->getName() : $default;
    }

    public function getBicycleDescriptionKeywords()
    {
        if (!$this->isBicycle())
        {
            return '';
        }

        $bicycleDescription = BicycleDescription::getByProductId($this->id);
        if ($bicycleDescription instanceof BicycleDescription)
        {
            return $bicycleDescription->getKeywords();

        }

        return '';
    }

    public function getKeyWords()
    {
        $maker = $this->getMaker(' ');
        $itemType = $this->getItemTypeName(' ');
        $subProduct = $this->getSubProductName(' ');
        $name = $this->getName();
        $description = $this->getDescription();
        $price = $this->getPrice();
        $accessoryType = $this->getAccessoryTypeName(' ');
        $accessorySubType = $this->getAccessorySubTypeName(' ');
        $equipmentType = $this->getEquipmentTypeName(' ');

        return $maker . $itemType . $subProduct . $name . $description . $price . $accessoryType . $accessorySubType . $equipmentType;
    }

    public static function existsProduct($id)
    {
        return self::model()->exists('id =:id', array(':id' =>$id));
    }

    public function getSubProductCriteria($makerId)
    {
        $criteria = new CDbCriteria();
        $criteria->join = ' INNER JOIN sub_product sp on '.$this->getTableAlias().'.sub_product_id = sp.id ';
        $criteria->compare('sp.available', 1);
        $criteria->compare($this->getTableAlias(). '.item_type_id', ItemType::BICICLETE);
        $criteria->compare($this->getTableAlias(). '.maker_id', $makerId);
        $criteria->compare($this->getTableAlias(). '.available', self::AVAILABLE);

        $this->getDbCriteria()->mergeWith(
            array(
                'select' => ' distinct('.$this->getTableAlias().'.sub_product_id) as sub_product_id',
                'condition' => $criteria->condition,
                'params' => $criteria->params,
                'join' => $criteria->join
            )
        );

        return $this;

    }

    public function getAccessoryCriteria($makerId)
    {
        $criteria = new CDbCriteria();
        $criteria->join = ' INNER JOIN accessory_type at on '.$this->getTableAlias().'.accessory_type_id = at.id ';
        $criteria->compare('at.available', 1);
        $criteria->compare($this->getTableAlias(). '.item_type_id', ItemType::ACCESORII);
        $criteria->compare($this->getTableAlias(). '.maker_id', $makerId);
        $criteria->compare($this->getTableAlias(). '.available', self::AVAILABLE);

        $this->getDbCriteria()->mergeWith(
            array(
                'select' => ' distinct('.$this->getTableAlias().'.accessory_type_id) as accessory_type_id',
                'condition' => $criteria->condition,
                'params' => $criteria->params,
                'join' => $criteria->join
            )
        );

        return $this;

    }

    public function getAccessorySubTypeCriteria($accessoryId)
    {
        $criteria = new CDbCriteria();
        $criteria->join = ' LEFT JOIN accessory_sub_type ast on '.$this->getTableAlias().'.accessory_sub_type_id = ast.id ';
        $criteria->compare('ast.available', 1);
        $criteria->compare($this->getTableAlias(). '.item_type_id', ItemType::ACCESORII);
        $criteria->compare($this->getTableAlias(). '.accessory_type_id', $accessoryId);
        $criteria->compare($this->getTableAlias(). '.available', self::AVAILABLE);

        $this->getDbCriteria()->mergeWith(
            array(
                'select' => ' distinct('.$this->getTableAlias().'.accessory_sub_type_id) as accessory_sub_type_id',
                'condition' => $criteria->condition,
                'params' => $criteria->params,
                'join' => $criteria->join
            )
        );

        return $this;

    }

    public function getEquipmentCriteria($makerId)
    {
        $criteria = new CDbCriteria();
        $criteria->join = ' INNER JOIN equipment_type et on '.$this->getTableAlias().'.equipment_type_id = et.id ';
        $criteria->compare('et.available', 1);
        $criteria->compare($this->getTableAlias(). '.item_type_id', ItemType::ECHIPAMENTE);
        $criteria->compare($this->getTableAlias(). '.maker_id', $makerId);
        $criteria->compare($this->getTableAlias(). '.available', self::AVAILABLE);

        $this->getDbCriteria()->mergeWith(
            array(
                'select' => ' distinct('.$this->getTableAlias().'.equipment_type_id) as equipment_type_id',
                'condition' => $criteria->condition,
                'params' => $criteria->params,
                'join' => $criteria->join
            )
        );

        return $this;

    }

    public static function getSubCategories($makerId, $itemTypeId)
    {
        switch($itemTypeId)
        {
            case ItemType::BICICLETE:
                return self::model()->getSubProductCriteria($makerId)->findAll();

            case ItemType::ACCESORII:
                return self::model()->getAccessoryCriteria($makerId)->findAll();

            case ItemType::ECHIPAMENTE:
                return self::model()->getEquipmentCriteria($makerId)->findAll();

            default:
                return array();
        }
    }

    public static function getLeftMenuClass($makerId, $itemTypeId, $maxLength = 20)
    {
        $subProducts = self::getSubCategories($makerId, $itemTypeId);
        $itemType = ItemType::getById($itemTypeId);

        $class = '';

        foreach ($subProducts as $sp) {

            if ($sp->subProduct instanceof SubProduct)
            {
                return ($sp->subProduct->getNameLength() > $maxLength) ?  'small-font' : '';
            }

            if ($sp->accessoryType instanceof AccessoryType )
            {
                return ($sp->accessoryType->getNameLength() > $maxLength) ?  'small-font' : '';
            }

            if ($sp->equipmentType instanceof EquipmentType )
            {
                return ($sp->equipmentType->getNameLength() > $maxLength) ?  'small-font' : '';
            }
        }

    }

    public static function getSubProductByMakerId($makerId, $itemTypeId, $controller)
    {
        $subProducts = self::getSubCategories($makerId, $itemTypeId);

        if (empty($subProducts))
        {
            return false;
        }

        $maker = Maker::getById($makerId);
        $makerName = ($maker instanceof Maker) ? $maker->getName() : '';

        $count = 0;
        $totalCount = count($subProducts);

        foreach ($subProducts as $sp)
        {
            if ($sp->subProduct instanceof SubProduct)
            {
                $subProduct = $sp->subProduct;
            }

            if ($sp->accessoryType instanceof AccessoryType )
            {
                $subProduct = $sp->accessoryType;
            }

            if ($sp->equipmentType instanceof EquipmentType )
            {
                $subProduct = $sp->equipmentType;
            }


            Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_SUB_PRODUCT,
                array('subProduct' => $subProduct, 'makerName' => $makerName, 'controller' => $controller));

            $count++;

        }
    }

    public function isForHomePage()
    {
        return HomePageProduct::existsProduct($this->id);
    }

    public function isForHomePageCheckBox()
    {
        $isForHomePageHtmlOptions = array(
            'data-delete-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_IS_FOR_HOME_PAGE),
            'data-delete-id' => $this->id,
            'class' => 'delete-product',
        );

        return Chtml::checkBox('is-for-home-page-product-' . $this->id, $this->isForHomePage(),$isForHomePageHtmlOptions);
    }


    public static function getAccessorySubTypeIdListByAccessory($accessoryId)
    {
        $product = self::model()->getAccessorySubTypeCriteria($accessoryId)->findAll();
        $accessoryName = AccessoryType::getNameById($accessoryId);

        if (is_array($product) && !empty($product))
        {
            foreach ($product as $prod)
            {
                if ($prod instanceof Product)
                {
                    $accSubType = AccessorySubType::getById($prod->accessory_sub_type_id);
                    Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_SUB_PRODUCT,
                        array('subProduct' => $accSubType, 'makerName' => $accessoryName, 'controller' => ControllerPagePartial::CONTOLLER_ACCESORY));
                }
            }
        }

    }

}
