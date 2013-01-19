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

    const HOME_PAGE_SIZE = 6;
    const BICYCLES_PAGE_SIZE = 6;
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
}
