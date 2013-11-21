<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/22/13
 * Time: 7:47 PM
 * To change this template use File | Settings | File Templates.
 */
class EquipmentType extends EquipmentTypeBase
{
    /**
     * @param string $className
     * @return EquipmentTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the equipment type: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }


    /**
     * @return mixed
     */
    public static function getAll()
    {
        return self::model()->findAll();
    }

    public static function getAllValid()
    {
        return self::model()->findAll('available =:available', array(':available' => 1));
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrlSafeName()
    {
        return str_replace(' ', '_', $this->name);
    }

    public function isAvailable()
    {
        return $this->available == 1;
    }

    public function getValidCheckBox()
    {
        $htmlOptions = array(
            'class' => 'invalidate',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_EQUIPMENT_TYPE),
            'data-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getEquipmentTypes($name = null)
    {
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('name', $name);
        $criteria->order = 'id DESC';

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

    public function getId()
    {
        return $this->id;
    }

    public static function getIdByLabel($label)
    {
        $equipmentType = self::model()->find('name like :name', array(':name' => $label));

        return ($equipmentType instanceof EquipmentType) ? $equipmentType->getId() : null;
    }

    public static function getMenu()
    {

        $equipmentTypes = self::getAllValid();

        $totalCount = count($equipmentTypes);
        $count = 0;
        foreach ($equipmentTypes as $et)
        {
            Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_SUB_PRODUCT_NO_MAKER,
                array('subProduct' => $et, 'controller' => ControllerPagePartial::CONTROLLER_EQUIPMENT, 'currentCount' => $count, 'totalCount' => $totalCount));
            $count++;
        }

    }

    public function getNameLength()
    {
        return strlen($this->name);
    }

    public static function isValid($accessoryType)
    {
        return self::model()->exists('name like :name', array(':name' => $accessoryType));
    }
}
