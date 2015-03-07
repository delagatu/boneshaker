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

    public function randomCriteria()
    {
        $this->getDbCriteria()->mergeWith(
            array(
                'order' => 'RAND()',
                'limit' => 1
            )
        );

        return $this;

    }

    public static function getRandomOffer()
    {
        $condition = ' CURDATE() BETWEEN DATE(begin_date) AND DATE(end_date) ';
        return self::model()->randomCriteria()->find($condition);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not add the offer: ' . var_export($this->getErrors(), 1));
        }
    }

}
