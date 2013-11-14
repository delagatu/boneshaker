<?php

class ComponenteController extends BaseController
{
    public function actionError()
    {
        $this->render('error');
    }

    public function actionIndex()
    {

        if (!is_null(Yii::app()->request->getQuery('makerName', null)))
        {
            $componentType = $this->readSafeName(Yii::app()->request->getQuery('makerName', null));
        } else {
            $componentType = $this->readSafeName(Yii::app()->request->getQuery('makerAndProduct', null));
        }


        $indexParams = array(
            'componentType' => $componentType,
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
            $this->redirect(Yii::app()->request->getUrlReferrer());
        }

        $params = array(
            'product' => $product,
        );

        $this->render(ControllerPagePartial::PARTIAL_BICYCLE_DETAIL, $params);
    }

}