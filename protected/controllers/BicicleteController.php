<?php

class BicicleteController extends BaseController
{
	public function actionError()
	{
		$this->render('error');
	}

	public function actionIndex()
	{
        $id = Yii::app()->request->getQuery('id', null);

        $product = new Product();

        $criteria = new CDbCriteria;
        $criteria->order = 'created_at DESC';
        $criteria->compare('maker_id', $id);
        $total = $product->count($criteria);

        $pages=new CPagination($total);
        $pages->pageSize = BaseController::BICYCLES_PAGE_SIZE;
        $pages->applyLimit($criteria);

        if (!is_null($id))
        {
            $bicycle = $product->getProductByMaker($pages->offset, $pages->limit, $id);
        } else {
            $bicycle = $product->getProduct($pages->offset, $pages->limit);
        }

        $indexParams = array(
            'bicycle' => $bicycle,
            'pages' => $pages
        );

		$this->render(ControllerPagePartial::PAGE_BICYCLE_INDEX, $indexParams);
	}

	public function actionProducator()
	{
		$this->render('producator');
	}

    private function checkProduct()
    {
        $id = Yii::app()->request->getQuery('id',null);

        if (is_null($id))
        {
            $this->leave();
        }

        $available = Product::isProductAvailable($id);

        if (!$available)
        {
            $this->leave();
        }

        return Product::getProductById($id);

    }

    public function actionDetalii()
    {
       $product = $this->checkProduct();

       $this->render(ControllerPagePartial::PARTIAL_BICYCLE_DETAIL);
    }

}