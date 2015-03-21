<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/21/15
 * Time: 4:47 PM
 * To change this template use File | Settings | File Templates.
 */

class ProductImport extends ProductImportBase
{
    /**
     * @param string $className
     * @return ProductImportBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save product import: ' . var_export($this->getErrors(), 1));
        }
    }

    public function getAll()
    {
        $criteria=new CDbCriteria;
        $criteria->with = array('product');

//        $criteria->compare('product_id',319);

        $criteria->addSearchCondition('product.name', Yii::app()->request->getQuery('product_details', null));

        $dataProvider = new CActiveDataProvider(get_class($this));
        $dataProvider->criteria = $criteria;
        return $dataProvider;
    }

    public function getProductDetails()
    {

        if ($this->product instanceof Product)
        {
            $text = $this->product->getMaker() . ' / ' . $this->product->getName() . ' / '.  $this->product->getPrice();
            $link =  CHtml::link($text, Yii::app()->controller->createUrl($this->product->itemType->itemController() . '/' . $this->product->itemType->itemView(), array('makerAndProduct' => $this->product->getDisplayNameWithId())));
            return $link;
        }
    }

    public function getAvailableActions()
    {
        if ($this->product instanceof Product)
        {
            return $this->product->getBikeAvailableActions();
        }
    }

    public function isValidCheckBox()
    {
        if ($this->product instanceof Product)
        {
            return $this->product->isValidCheckBox();
        }
    }

    public function getImportSource()
    {
        if ($this->importSource instanceof ImportSource)
        {
            return $this->importSource->source_label;
        }
    }

}