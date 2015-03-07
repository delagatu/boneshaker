<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/11/13
 * Time: 10:00 PM
 * To change this template use File | Settings | File Templates.
 */

class ComponentType extends ComponentTypeBase{

    /**
     * @param string $className
     * @return ComponentTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @throws Exception
     */
    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the component type: ' . var_export($this->getErrors(), 1));
        }
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
     * @return mixed
     */
    public static function getAll()
    {
        return self::model()->findAll();
    }

    /**
     * @return mixed
     */
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
            'data-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_VALIDATE_COMPONENT_TYPE),
            'data-id' => $this->id
        );

        return CHtml::checkBox('invalidate-checkbox-' . $this->id, $this->isAvailable(), $htmlOptions);
    }

    public function getComponentTypes($name = null)
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
        $criteria = '  name like :name AND available =:available ';
        $params = array(
            ':name' => $label,
            ':available' => 1
        );

        $componentType = self::model()->find($criteria, $params);

        return ($componentType instanceof ComponentType) ? $componentType->getId() : null;
    }

    public static function getMenu()
    {

        $componentTypes = self::getAllValid();

        $totalCount = count($componentTypes);
        $count = 0;

        $makerName = StringManager::readSafeName(Yii::app()->request->getQuery('makerName'));
        $componentId = ComponentType::getIdByLabel($makerName);

        foreach ($componentTypes as $ct)
        {
            if ($ct instanceof ComponentType)
            {
                $params = array(
                    'subProduct' => $ct,
                    'controller' => ControllerPagePartial::CONTROLLER_COMPONENTE,
                    'currentCount' => $count,
                    'totalCount' => $totalCount,
                    'itemTypeId' => ItemType::COMPONENTE,
                    'makerName' => $makerName,
                    'foundId' => $componentId,
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

    public static function isValid($component)
    {
        return self::model()->exists('name like :name', array(':name' => $component));
    }

    public static function getNameById($id)
    {
        $componentType = self::getById($id);

        if ($componentType instanceof ComponentType)
        {
            return $componentType->getName();
        }

        return '';
    }

}