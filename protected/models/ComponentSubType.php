<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 1/11/14
 * Time: 10:37 AM
 */

class ComponentSubType extends ComponentSubTypeBase{

    /**
     * @param string $className
     * @return ComponentSubTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    /**
     * @throws Exception
     */
    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the component sub type: ' . var_export($this->getErrors(), 1));
        }
    }

    /**
     * @return mixed
     */
    public static function getAllSubProduct()
    {
        return self::model()->findAll();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUrlSafeName()
    {
        return StringManager::getUrlSafeName($this->name);
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return $this->available == 1;
    }

    /**
     * @return mixed
     */
    public function getValidCheckBox()
    {
        $htmlOptions = array(
            'class' => 'invalidate',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_COMPONENT_SUB_TYPE),
            'data-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    /**
     * @param null $name
     * @return CActiveDataProvider
     */
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

    /**
     * @param $name
     * @return int
     */
    public static function getIdByName($name)
    {
        $componentSubType = self::model()->find(
            'name like :name',
            array(
                ':name' => trim($name)
            )
        );

        if ($componentSubType instanceof ComponentSubType)
        {
            return $componentSubType->id;
        }

        return self::model()->id;
    }

    /**
     * @return int
     */
    public function getNameLength()
    {
        return strlen($this->name);
    }

    /**
     * @param $id
     * @return string
     */
    public static function getNameById($id)
    {
        $componentSubType = self::getById($id);

        if ($componentSubType instanceof ComponentSubType)
        {
            return $componentSubType->getName();
        }

        return '';
    }

    /**
     * @param $componentSubType
     * @return Boolean
     */
    public static function isValid($componentSubType)
    {
        return self::model()->exists('name like :name', array(':name' => $componentSubType));
    }

} 