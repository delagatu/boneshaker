<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:30 PM
 * To change this template use File | Settings | File Templates.
 */
class SubProduct extends SubProductBase
{
    /**
     * @param string $className
     * @return SubProduct
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the sub product: ' . var_export($this->getErrors(), 1));
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
        return StringManager::getUrlSafeName($this->name);
    }

    public function isAvailable()
    {
        return $this->available == 1;
    }

    public function getValidCheckBox()
    {
        $htmlOptions = array(
            'class' => 'invalidate-sub-product',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_SUB_PRODUCT),
            'data-sub-product-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getSubProducts($name = null)
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
        $subProduct = self::model()->find(
            'name like :name',
            array(
                ':name' => trim($name)
            )
        );

        if ($subProduct instanceof SubProduct)
        {
            return $subProduct->id;
        }
    }

    public function getNameLength()
    {
        return strlen($this->name);
    }
}
