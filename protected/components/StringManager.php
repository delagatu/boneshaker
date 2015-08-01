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

    const encodeHash = 'zz9*89654';

    public static function resize($inputStr, $maxLength, $newClass)
    {
        return (strlen($inputStr) > $maxLength) ? ' ' . $newClass : '';
    }

    public static function readSafeName($getParam)
    {
        return str_replace('_', ' ', $getParam);
    }

    public static function getUrlSafeName($name)
    {
        return str_replace(' ', '_', $name);
    }

    public static function encode($toEncode)
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(self::encodeHash), $toEncode, MCRYPT_MODE_CBC, md5(md5(self::encodeHash))));
    }

    public static function decode($encoded)
    {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(self::encodeHash), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5(self::encodeHash))), "\0");
    }

}
