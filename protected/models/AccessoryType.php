<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/14/13
 * Time: 9:22 PM
 * To change this template use File | Settings | File Templates.
 */
class AccessoryType extends AccessoryTypeBase
{
    /**
     * @param string $className
     * @return AccessoryTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getByName($name)
    {
        return self::model()->find('name =:name', array(':name' => $name));
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the accessory type: ' . var_export($this->getErrors(), 1));
        }
    }

    /**
     * @return mixed
     */
    public static function getAll()
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
            'class' => 'invalidate',
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_ACCESSORY_TYPE),
            'data-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getAccessoryTypes($name = null)
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
        $accessoryType = self::getByName($label);

        return ($accessoryType instanceof AccessoryType) ? $accessoryType->getId() : self::model()->id;
    }

    public static function getAllValid()
    {
        return self::model()->findAll('available =:available', array(':available' => 1));
    }

    public static function getMenu()
    {

        $accessoryTypes = self::getAllValid();

        $totalCount = count($accessoryTypes);
        $count = 0;

        $makerName = StringManager::readSafeName(Yii::app()->request->getQuery('makerName'));
        $accessoryId = AccessoryType::getIdByLabel($makerName);

        foreach ($accessoryTypes as $at)
        {
            if ($at instanceof AccessoryType)
            {
                $params = array(
                    'subProduct' => $at,
                    'controller' => ControllerPagePartial::CONTOLLER_ACCESORY,
                    'currentCount' => $count,
                    'totalCount' => $totalCount,
                    'itemTypeId' => ItemType::ACCESORII,
                    'makerName' => $makerName,
                    'foundId' => $accessoryId,
                );
                Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_SUB_PRODUCT_NO_MAKER,$params);
                $count++;
            }
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

    public static function getNameById($id)
    {
        $accessoryType = self::getById($id);

        if ($accessoryType instanceof AccessoryType)
        {
            return $accessoryType->getName();
        }

        return '';
    }

}
