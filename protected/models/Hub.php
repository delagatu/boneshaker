<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 7:35 PM
 * To change this template use File | Settings | File Templates.
 */
class Hub extends HubBase
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getHubs()
    {
        return self::model()->with('maker')->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );
    }

    public function getMakerAndProduct()
    {
        return $this->maker->name . ' ' . $this->name;
    }
}
