<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 12/4/13
 * Time: 10:30 PM
 * To change this template use File | Settings | File Templates.
 */

class AccessorySubType extends AccessorySubTypeBase{

    /**
     * @param string $className
     * @return AccessorySubTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the accessory sub type: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function getAllSubProduct()
    {
        return self::model()->findAll();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrlSafeName()
    {
        return str_replace(' ', '-', $this->name);
    }

    public function isAvailable()
    {
        return $this->available == 1;
    }

    public function getValidCheckBox()
    {
        $htmlOptions = array(
            'class' => 'invalidate',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_ACCESSORY_SUB_TYPE),
            'data-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getSubTypes($name = null)
    {
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('name', $name);
        $criteria->order = 'insert_date DESC';

        $sort = array(
            'attributes' => array(
                'defaultOrder' => 'name ASC',
                'name' => array(
                    'asc' => 'name asc',
                    'desc' => 'name desc',
                    'default' => 'name DESC',
                ),
                '*',
            ),
        );

        $pagination = array('pageSize' => 10);

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        $dataProvider->sort = $sort;
        $dataProvider->pagination = $pagination;

        return $dataProvider;
    }

    public static function getIdByName($name)
    {
        $accSubType = self::model()->find(
            'name like :name',
            array(
                ':name' => trim($name)
            )
        );

        if ($accSubType instanceof AccessorySubType)
        {
            return $accSubType->id;
        }
    }

    public function getNameLength()
    {
        return strlen($this->name);
    }

    public static function getNameById($id)
    {
        $accessorySubType = self::getById($id);

        if ($accessorySubType instanceof AccessorySubType)
        {
            return $accessorySubType->getName();
        }

        return '';
    }
}