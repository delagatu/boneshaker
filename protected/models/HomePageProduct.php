<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/9/13
 * Time: 6:51 PM
 * To change this template use File | Settings | File Templates.
 */
class HomePageProduct extends HomePageProductBase
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getByProductId($productId)
    {
        return self::model()->find('product_id =:product_id', array(':product_id' => $productId));
    }

    public static function existsProduct($productId)
    {
        return self::model()->exists('product_id =:product_id', array(':product_id' => $productId));
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw new Exception('Can not save the home page product: ' . var_export($this->getErrors() , 1));
        }
    }

    public function deleteThrowEx()
    {
        if (!$this->delete())
        {
            throw new Exception('Can not delete the home page product: ' . var_export($this->getErrors() , 1));
        }
    }

    public function getAll()
    {
        $dataProvider = new CActiveDataProvider(get_class($this));
        return $dataProvider;
    }

    public static function addProduct($productId)
    {
        $homePageProduct = new HomePageProduct();
        $homePageProduct->product_id = $productId;
        $homePageProduct->insert_date = new CDbExpression('NOW()');
        $homePageProduct->saveThrowEx();
    }

    public static function deleteProduct($productId)
    {
        $homePageProduct = self::getByProductId($productId);
        if ($homePageProduct instanceof HomePageProduct)
        {
            $homePageProduct->deleteThrowEx();
        }
    }

    public static function addDeleteProduct($productId, $available)
    {
        if (self::existsProduct($productId))
        {
            if (!$available)
            {
                self::deleteProduct($productId);
            }
        } else {
            if ($available)
            {
                self::addProduct($productId);
            }
        }
    }

    public function isForHomePageCheckBox()
    {
        $product = Product::getProductById($this->product_id);

        if ($product instanceof Product)
        {
            return $product->isForHomePageCheckBox();
        }
    }

    public function getProductDetails()
    {
        $product = Product::getProductById($this->product_id);

        if ($product instanceof Product)
        {
            return '<span class = "boldText">' . $product->getItemTypeName(). '</span>' . ':' . $product->getMaker() . ' / ' . $product->getName() . ' / '.  $product->getPrice();
        }
    }

    public static function areProductsAvailable()
    {
        $count = self::model()->count();

        return $count > 0;
    }

    public static function getAllForSlider()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'rand()';

        return self::model()->findAll($criteria);
    }

}
