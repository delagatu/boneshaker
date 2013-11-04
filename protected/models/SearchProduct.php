<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/2/13
 * Time: 5:55 PM
 * To change this template use File | Settings | File Templates.
 */
class SearchProduct extends Product
{

    /**
     * @param string $className
     * @return ProductBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function searchByKeyWord($keywords)
    {
        $productsByKeyWords = ProductKeywords::getByKeywords($keywords);

        $criteria = new CDbCriteria();
        $criteria->compare('available', self::AVAILABLE);
        $criteria->addInCondition($this->getTableAlias() . '.id', $productsByKeyWords);
        $searchResults = self::model()->findAll($criteria);

        $dataProvider = new CArrayDataProvider($searchResults);
        $dataProvider->pagination = array('pageSize' => BaseController::PAGE_SIZE, 'pageVar' => 'pagina');

        return $dataProvider;
    }

}
