<?php

class ComponenteController extends BaseController
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

        $this->render(ControllerPagePartial::PAGE_COMPONENTE_INDEX, $indexParams);
    }

    public function actionProducator()
    {
        $this->render('producator');
    }

    public function actionDetalii()
    {
        $id = $this->readProductId();
        $product = Product::getProductById($id);

        if ((!$product instanceof Product) || !$product->isComponent())
        {
            Yii::log('Componente::detalii. Invalid product {'. var_export($product, 1) .'} or not a component');
            $this->redirect(Yii::app()->request->getUrlReferrer());
        }

        $params = array(
            'product' => $product,
        );

        $this->render(ControllerPagePartial::PARTIAL_BICYCLE_DETAIL, $params);
    }

}