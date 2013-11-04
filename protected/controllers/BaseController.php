<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 6/28/12
 * Time: 7:23 PM
 * To change this template use File | Settings | File Templates.
 */
class BaseController extends Controller
{

    const PAGE_SIZE = 6;
    const ROLE_AUTHORITY = 'Authority';

    protected function getUserHomePage()
    {
        if (Yii::app()->user->checkAccess('Authority'))
        {
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT));
        } else {
            $this->redirect(Yii::app()->user->returnUrl);
        }
    }

    public function leave()
    {
        $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));
    }

    public function hasPermission($role)
    {
        return Yii::app()->user->checkAccess($role);
    }

    public function readSafeName($getParam)
    {
        return str_replace('-', ' ', $getParam);
    }

    public function readProductId()
    {
        $makerAndProduct = Yii::app()->request->getQuery('makerAndProduct');

        $paramArgs = explode('-', $makerAndProduct);
        return end($paramArgs);
    }

    public function getMenuHeader()
    {
        $controller = $this->getId();
        $acceptedControllers = array(ControllerPagePartial::CONTROLLER_BICYCLE => ControllerPagePartial::CONTROLLER_BICYCLE,
            ControllerPagePartial::CONTOLLER_ACCESORY => ControllerPagePartial::CONTOLLER_ACCESORY,
            ControllerPagePartial::CONTROLLER_EQUIPMENT => ControllerPagePartial::CONTROLLER_EQUIPMENT);

        $category = (isset($acceptedControllers[$controller])) ? $controller : ControllerPagePartial::CONTROLLER_BICYCLE;

        return ucfirst($category);
    }

    public function getLeftMenuContent()
    {
        $controller = $this->getId();
        $itemTypeId = ItemType::getIdByLabel($controller);
        $makerName = Yii::app()->request->getQuery('makerName');


        switch ($itemTypeId)
        {
            case ItemType::ACCESORII:
                AccessoryType::getMenu();
                break;

            case ItemType::ECHIPAMENTE:
                EquipmentType::getMenu();
                break;

            default:
                ItemType::getMenu($makerName);
                break;
        }

    }
}
