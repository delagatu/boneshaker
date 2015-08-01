<div id = "dialog-confirm"></div>
<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 3/2/14
 * Time: 5:02 PM
 */

$this->layout = 'main';
$this->pageTitle = Yii::app()->name . ' | Cosul Meu ';

if (!(isset($placeOrder)))
{
    $placeOrder = new PlaceOrderForm();
    $placeOrder->initDetails();
}

$params = array(
    'positions' => $positions,
    'page_id' => $page_id,
    'placeOrder' => $placeOrder,
);

Yii::app()->controller->renderPartial('_cartContents', $params);

Yii::app()->controller->renderPartial('_plaseazaComanda', $params);
?>

<div class="grid_13 padding-top-5">
<?php echo CHtml::link('Inapoi', Yii::app()->request->getUrlReferrer(), array('class' => 'detail-back')); ?>
</div>