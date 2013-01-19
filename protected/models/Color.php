<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/26/12
 * Time: 11:26 AM
 * To change this template use File | Settings | File Templates.
 */
class Color extends ColorBase
{
    /**
     * @static
     * @param string $className
     * @return ColorBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getColors()
    {
        return self::model()->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );
    }

}
