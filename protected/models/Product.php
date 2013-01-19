<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:30 PM
 * To change this template use File | Settings | File Templates.
 */

class Product extends ProductBase
{
    /**
     * @static
     * @param string $className
     * @return ProductBase
     */

    const AVAILABLE = 1;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Imposibil de salvat: ' . var_dump($this->getErrors()));
        }
    }

    /**
     * @return mixed
     */
    public function getAllBicyle()
    {
        return self::model()->with('photos')->findAll(array(
            'condition' => 'item_type_id=:item_type_id and available=:available',
            'params' => array(':item_type_id' => ItemType::BICICLETE,
                'available' => 1,
            ),
        ));
    }

    public function limitProduct($offset, $limit)
    {
        $this->getDbCriteria()->mergeWith(
            array(
                'offset' => $offset,
                'limit' => $limit,
            )
        );

        return $this;
    }

    public function getProductByMaker($offset, $limit, $makerId)
    {
        return self::model()->limitProduct($offset, $limit)->with('photos')->findAll(array(
            'condition' => 'available=:available AND maker_id =:maker_id',
            'params' => array(
                ':available' => 1,
                ':maker_id' => $makerId
            ),
        ));

    }

    public function getPrimaryPhotoByType($type)
    {
        $photo = Photo::getPrimaryPhotoPerProduct($this->id);
        if ($photo instanceof Photo)
        {
            $photoSource = PhotoSource::getByPhotoAndType($photo->id,$type);
            if ($photoSource instanceof PhotoSource)
            {
                return $photoSource->photo_source_path;
            }
        }
    }

    public function getProduct($offset, $limit)
    {
        return self::model()->limitProduct($offset, $limit)->with('photos')->findAll(array(
            'condition' => 'available=:available',
            'params' => array(':available' => 1,),
        ));
    }

    /**
     * @param $makerId
     * @return mixed
     */
    public function getAllBicyleByMaker($makerId)
    {
        return self::model()->findAll(array(
            'condition' => 'item_type_id=:item_type_id and maker_id=:maker_id and available=:available',
            'params' => array(':item_type_id' => ItemType::BICICLETE,
                ':maker_id' => $makerId,
                'available' => 1,
            ),
        ));
    }

    /**
     * @param $productId
     * @return mixed
     */
    public static function getProductById($productId)
    {
        return self::model()->with(array('photos' => array('joinType' => 'INNER JOIN') ))->findByPk($productId);
    }

    public static function isProductAvailable($id)
    {
        return self::model()->exists(
            'id =:id AND available =:available',
            array(
                ':id' => $id,
                 ':available' => self::AVAILABLE,
            )
        );
    }

    public static function newItem($attributes)
    {
        $product = new Product();
        $product->attributes = $attributes;
        $product->saveThrowEx();
        return $product;
    }

}
