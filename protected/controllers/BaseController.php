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

    public function hasMultiplePermission(Array $roles = array())
    {
        foreach ($roles as $role)
        {
            if (Yii::app()->user->checkAccess($role))
            {
                return true;
            }
        }

        return false;
    }

    public function readSafeName($getParam)
    {
        return StringManager::readSafeName($getParam);
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
            ControllerPagePartial::CONTROLLER_EQUIPMENT => ControllerPagePartial::CONTROLLER_EQUIPMENT,
            ControllerPagePartial::CONTROLLER_COMPONENTE => ControllerPagePartial::CONTROLLER_COMPONENTE,
        );

        $category = (isset($acceptedControllers[$controller])) ? $controller : ControllerPagePartial::CONTROLLER_BICYCLE;

        return ucfirst($category);
    }

    public function getLeftMenuContent()
    {
        $controller = $this->getId();
        $itemTypeId = ItemType::getIdByLabel($controller);
        $makerName = Yii::app()->request->getQuery('makerName');

        return ItemType::getMenuArray($makerName, $itemTypeId);
    }

    public function getIsActiveHeaderByController($compare)
    {
        $controller = $this->getId();

        return (strtolower($compare) == strtolower($controller)) ? 'active' : '';
    }

    public function getIsActiveHeaderByUrl($compare)
    {
        $url = Yii::app()->request->getUrl();

        return (strtolower($compare) == strtolower($url)) ? 'active' : '';
    }

    public function generateBreadcrumb()
    {
        $breadCrumbs = array(
            ucfirst($this->id) => $this->createUrl('/' . $this->id),
        );

        $makerName = Yii::app()->request->getQuery('makerName');

        if (!empty($makerName))
        {
            $breadCrumbs[$makerName] = $this->createUrl($this->id . '/index/', array('makerName' => $makerName));
        }

        $this->breadcrumbs = $breadCrumbs;
    }
}