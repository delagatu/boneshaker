<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:28 PM
 * To change this template use File | Settings | File Templates.
 */
class Offer extends OfferBase
{

    /**
     * @static
     * @param string $className
     * @return OfferBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return mixed
     */
    public function getRandomOffer()
    {
        $Sql = 'SELECT id, product_id, offer_title, offer_description, discount_percent, offer_price ';
        $Sql .= ' FROM offer WHERE DATE(NOW()) BETWEEN DATE(begin_date) AND DATE(end_date) ORDER BY RAND() LIMIT 1';

        return self::model()->findBySql($Sql);
    }

}
