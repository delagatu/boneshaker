<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 1/21/14
 * Time: 11:01 PM
 */

class CartStatus extends CartStatusBase{

const COMANDA_PLASATA = 'Comanda plasata';
CONST COMANDA_FINALIZATA = 'Comanda finalizata';
CONST PREDATA_CURIERULUI = 'Predata curierului';
CONST LIVRATA_LA_DESTINATIE = 'Livrata la destinatie';
CONST PRELUARE_REFUZATA = 'Preluare refuzata';

    /**
     * @param string $className
     * @return CartStatusBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @param $status
     * @return mixed
     */
    public static function getByStatus($status)
    {
        return self::model()->find('status =:status', array(':status' => $status));
    }
}