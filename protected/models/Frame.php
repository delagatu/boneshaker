<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/21/12
 * Time: 9:32 PM
 * To change this template use File | Settings | File Templates.
 */
class Frame extends FrameBase
{
    /**
     * @static
     * @param string $className
     * @return FrameBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getFrames()
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
