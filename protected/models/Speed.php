<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/26/12
 * Time: 11:16 AM
 * To change this template use File | Settings | File Templates.
 */
class Speed extends SpeedBase
{

    /**
     * @static
     * @param string $className
     * @return SpeedBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getSpeeds()
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
