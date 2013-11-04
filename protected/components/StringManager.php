<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 6/12/13
 * Time: 6:35 PM
 * To change this template use File | Settings | File Templates.
 */
class StringManager
{

    public static function resize($inputStr, $maxLength, $newClass)
    {
        return (strlen($inputStr) > $maxLength) ? ' ' . $newClass : '';
    }

}
