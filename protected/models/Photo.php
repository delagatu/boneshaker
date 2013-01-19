<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */
class Photo extends PhotoBase
{
    /**
     * @static
     * @param string $className
     * @return PhotoBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save()) {
            Throw new Exception('Imposibil de salvat: ' . var_dump($this->getErrors()));
        }
    }

    /**
     * @static
     * @param $productId
     * @return mixed
     */
    public static function getOnePhotoByType($productId)
    {
        return self::model()->find(array(
            'condition' => 'product_id=:product_id AND order_id =:order_id',
            'params' => array(
                ':product_id' => $productId,
                ':order_id' => PhotoOrder::PHOTO_ORDER_PRIMARY_ID
            ),
        ));
    }

    public static function getPrimaryPhotoPerProduct($productId)
    {
        return self::model()->find(
            'product_id =:product_id AND order_id =:order_id',
            array(
                ':product_id' => $productId,
                ':order_id' => PhotoOrder::PHOTO_ORDER_PRIMARY_ID
            )
        );
    }

}
