<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/17/14
 * Time: 11:08 PM
 * To change this template use File | Settings | File Templates.
 */

class ImportController extends BaseController{

    public function beforeAction($action)
    {

        $roles = array(Items::ROLE_ADMINISTRATOR, Items::ROLE_AUTHORITY);
        if (Yii::app()->request->getIsAjaxRequest() && (!$this->hasMultiplePermission($roles)))
        {
            json::writeJSON('Nu esti autentificat!', false);
        }

        if (!$this->hasMultiplePermission($roles)) {
            $this->leave();
        } else {
            return true;
        }
    }

    public function actionImportXML()
    {
        Yii::app()->bikeFun->doXML();
    }

}