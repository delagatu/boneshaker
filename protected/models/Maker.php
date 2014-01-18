<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:28 PM
 * To change this template use File | Settings | File Templates.
 */
class Maker extends MakerBase
{

    /**
     * @static
     * @param string $className
     * @return MakerBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the maker: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public static function getAllMaker()
    {
        return self::model()->findAll();
    }

    public static function getMakerByType($item_type_id)
    {

        return self::model()->findAll(array(
            'condition' => 'item_type_id=:item_type_id and available=:available',
            'params' => array(':item_type_id' => $item_type_id,
                'available' => 1,
            ),
        ));

    }

    public static function getAll($itemTypeId = null)
    {
        return self::model()->findAll('item_type_id =:item_type_id', array(':item_type_id' => $itemTypeId));
    }

    public function searchMakerByType($name = null, $itemTypeId = null)
    {
        $criteria = new CDbCriteria;
        $criteria->compare('item_type_id', $itemTypeId);
//        $criteria->compare('available', 1);
        $criteria->addSearchCondition('name', $name);

        $sort = array(
            'attributes' => array(
                    'defaultOrder' => 'name ASC',
                    'name' => array(
                        'asc' => 'name asc',
                        'desc' => 'name desc',
                        'default' => 'name DESC',
                    )
                ),
            );

        $pagination = array('pageSize' => 10);

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        $dataProvider->sort = $sort;
        $dataProvider->pagination = $pagination;

        return $dataProvider;
    }

    public function isAvailable()
    {
        return $this->available == 1;
    }

    public function getName()
    {
        return str_replace(' ', '_', $this->name);
    }

    public function getUrlSafeName()
    {
        return StringManager::getUrlSafeName($this->name);
    }

    public static function deleteMaker($id)
    {
        return self::model()->updateByPk($id,
            array(
                'available' => 0
            )
        );
    }

    public function getEditName()
    {
        return CHtml::link($this->getName(), Yii::app()->controller->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_EDIT_MAKER));
    }

    public function getValidCheckBox()
    {
        $htmlOptions = array(
            'class' => 'invalidate-maker',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_VALIDATE_MAKER),
            'data-maker-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getType()
    {
        if ($this->itemType instanceof ItemType)
        {
            return $this->itemType->getName();
        }

        return 'N/A';
    }

    public static function getIdByName($name)
    {
        $maker = self::model()->find(
            'name like :name',
            array(
                ':name' => trim($name)
            )
        );

        if ($maker instanceof Maker)
        {
            return $maker->id;
        }

    }

    public static function getIdByLabelAndType($name, $itemTypeId)
    {
        $maker = self::model()->find(
            'name like :name AND item_type_id =:item_type_id',
            array(
                ':name' => $name,
                ':item_type_id' => $itemTypeId,
            )
        );

        if ($maker instanceof Maker)
        {
            return $maker->id;
        }
    }

    public static function getAllMakerDropDown($itemTypeId, $makerName = '', $subProduct = '')
    {
        $listData = CHtml::listData(self::getAll($itemTypeId), 'name', 'name');
        $makerName = str_replace('_', ' ', $makerName);

        $params = array();
        $maker = Yii::app()->request->getQuery('makerName', Yii::app()->request->getQuery('makerAndProduct', ''));
        $subItem = str_replace('_', ' ',Yii::app()->request->getQuery('subItem'));

        if (self::validMaker($subItem))
        {
            $makerName = $subItem;
        }

        if (!self::validMaker($maker))
        {
            $params = array('makerName' => str_replace(' ', '_', $maker));
        }

        if (!empty($subProduct))
        {
            $params['subProduct'] = str_replace(' ', '_', $subProduct);
        }

        $itemType = ItemType::getById($itemTypeId);
        $controller = ($itemType instanceof ItemType) ? $itemType->itemController() : '/';

        $htmlOptions = array(
            'empty' => 'Producator',
            'class' => 'long-input search-by-maker',
            'data-url' => Yii::app()->controller->createUrl($controller . '/' . ControllerPagePartial::PAGE_COMPONENTE_INDEX, $params),
        );

        return Chosen::dropDownList('producator-' . $itemTypeId, $makerName, $listData, $htmlOptions);
    }

    public static function validMaker($makerName)
    {
        return self::model()->exists('name like :name', array(':name' => $makerName));
    }

}
