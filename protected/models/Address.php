<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 5/17/15
 * Time: 2:50 PM
 * To change this template use File | Settings | File Templates.
 */

class Address extends AddressBase{

    /**
     * @param string $className
     * @return AddressBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowException()
    {
        if (!$this->save())
        {
            throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), 1));
        }
    }

}