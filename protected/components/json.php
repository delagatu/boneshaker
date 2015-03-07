<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 1/26/13
 * Time: 1:43 PM
 * To change this template use File | Settings | File Templates.
 */
class json extends CApplicationComponent
{
    /**
     * @param bool $success
     */
    public static function writeJSON($data, $success = true)
    {
        if ($success)
        {
            echo CJSON::encode($data);
        } else {
            print_r($data);
        }

        Yii::app()->end();

    }
}