<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 7:20 PM
 * To change this template use File | Settings | File Templates.
 */
class BbSet extends BbSetBase
{
    /**
     * @static
     * @param string $className
     * @return BbSetBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getBbSets()
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
