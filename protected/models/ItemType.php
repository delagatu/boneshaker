<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:27 PM
 * To change this template use File | Settings | File Templates.
 */
class ItemType extends ItemTypeBase
{

    const BICICLETE = 1;
    const ACCESORII = 2;
    const ECHIPAMENTE = 3;
    const BICICLETE_SI_ACCESORII = 4;
    const BICICLETE_SI_ECHIPAMENTE = 5;
    const ACCESORII_SI_ECHIPAMENTE = 6;
    const GENERAL = 7;

    /**
     * @static
     * @param string $className
     * @return ItemTypeBase
     */

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getItemList()
    {
        return self::model()->findAll(
            array(
                'condition' => 'available =:available',
                'params' => array(
                    ':available' => 1,
                )
            )
        );
    }


    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function itemController()
    {
        switch ($this->id)
        {
            case self::BICICLETE:
                return ControllerPagePartial::CONTROLLER_BICYCLE;

            case self::ACCESORII:
                return ControllerPagePartial::CONTOLLER_ACCESORY;

            case self::ECHIPAMENTE:
                return ControllerPagePartial::CONTROLLER_EQUIPMENT;

            default:
                return ControllerPagePartial::CONTROLLER_SITE;
        }
    }

    public function itemView()
    {
        switch ($this->id)
        {
            case self::BICICLETE:
                return ControllerPagePartial::PAGE_BICYCLE_DETAIL;

            case self::ACCESORII:
                return ControllerPagePartial::PAGE_ACCESSORY_DETAIL;

            case self::ECHIPAMENTE:
                return ControllerPagePartial::PAGE_EQUIPMENT_DETAIL;

            default:
                return ControllerPagePartial::PAGE_SITE_VIEW;
        }
    }

    public static function getIdByLabel($label)
    {
        $itemType = self::model()->find('name like :name', array(':name' => $label));

        return ($itemType instanceof ItemType) ? $itemType->getId() : self::BICICLETE;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return (empty($this->id) ? self::BICICLETE : $this->id);
    }

    public function subMenuOnly()
    {
        return $this->submenu_only == 1;
    }

    public static function getMenu($makerName)
    {
        $makerList = Maker::getMakerByType(self::BICICLETE);

        $totalCount = count($makerList);
        $currentCount = 1;
        $makerId = Maker::getIdByName($makerName);

        foreach ($makerList as $maker) {
        $params = array('maker' => $maker,
            'currentCount' => $currentCount,
            'totalCount' => $totalCount,
            'makerIdGet' => $makerId,
            'itemTypeId' => self::BICICLETE,

        );
        $currentCount++;
        Yii::app()->controller->renderPartial('/' . ControllerPagePartial::LAYOUTS . '/' . ControllerPagePartial::PARTIAL_LAYOUT_MAIN_LEFT_MENU, $params);
    }

    }

}
