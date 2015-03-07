<?php

class EchipamenteController extends BaseController
{
	public function actionError()
	{
		$this->render('error');
	}

    public function actionIndex()
    {

        $makerName = $this->readSafeName(Yii::app()->request->getQuery('makerName', null));
        $subProduct = $this->readSafeName(Yii::app()->request->getQuery('subProduct', null));

        $indexParams = array(
            'makerName' => $makerName,
            'subProduct' => $subProduct
        );

        $this->render(ControllerPagePartial::PAGE_EQUIPMENT_INDEX, $indexParams);
    }

	public function actionProducator()
	{
		$this->render('producator');
	}

    public function actionDetalii()
    {
        $id = $this->readProductId();
        $product = Product::getProductById($id);

        if (is_null($product) || !$product->isEquipment())
        {
            $this->redirect(Yii::app()->request->getUrlReferrer());
        }

        $params = array(
            'product' => $product,
        );

        $this->render(ControllerPagePartial::PARTIAL_EQUIPMENT_DETAIL, $params);
    }
}