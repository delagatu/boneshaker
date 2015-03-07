<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/4/13
 * Time: 8:14 PM
 * To change this template use File | Settings | File Templates.
 */
class ProductKeywords extends ProductKeywordsBase
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the product keywords: ' . var_export($this->getErrors()));
        }
    }

    public static function deleteKeyWords($productId)
    {
        $product = Product::existsProduct($productId);

        if ($product)
        {
            return self::model()->deleteAll('product_id =:product_id', array(':product_id' => $productId));
        }

        return 0;
    }

    public static function getByProductId($productId)
    {
        return self::model()->find('product_id =:product_id', array(':product_id' => $productId));
    }

    public static function insertKeyWords()
    {
        $products = Product::getWithoutKeywords();
        if (is_array($products) && !empty($products))
        {
            foreach($products as $prod)
            {
                if ($prod instanceof Product)
                {
                    self::deleteKeyWords($prod->id);
                    $keywords = $prod->getKeyWords();
                    $detailKeywords = $prod->getBicycleDescriptionKeywords();

                    $productKeyWords = new ProductKeywords();
                    $productKeyWords->product_id = $prod->id;
                    $productKeyWords->keywords = $keywords;
                    $productKeyWords->details_keywords = $detailKeywords;
                    $productKeyWords->saveThrowEx();
                }
            }
        }
    }

    public function hasProduct()
    {
        return ($this->product instanceof Product);
    }

    public static function addBicycleDetails($productId)
    {
        $productKeyWords = self::getByProductId($productId);

        if (($productKeyWords instanceof ProductKeywords) && $productKeyWords->hasProduct())
        {
            $detailKeywords = $productKeyWords->product->getBicycleDescriptionKeywords();
            $productKeyWords->details_keywords = $detailKeywords;
            $productKeyWords->saveThrowEx();
        }

    }

    public function searchCriteria($keywords)
    {
        $criteria = new CDbCriteria();

        $keywordsExpl = explode(' ', $keywords);

        foreach ($keywordsExpl as $key => $value)
        {
            $criteria->addSearchCondition('concat(keywords, details_keywords)', $value);
        }

        $criteria->addCondition('concat(keywords, details_keywords) IS NOT NULL');

        $this->getDbCriteria()->mergeWith($criteria);

        return $this;
    }

    public static function getByKeywords($keywords)
    {

        $findAll = self::model()->searchCriteria($keywords)->findAll();

        $products = array();
        if (is_array($findAll) && !empty($findAll))
        {
            foreach ($findAll as $productKeywords)
            {
                if ($productKeywords instanceof ProductKeywords)
                {
                    $products[] = $productKeywords->product_id;
                }
            }
        }

        return $products;
    }

}
