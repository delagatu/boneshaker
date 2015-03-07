<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 3/2/14
 * Time: 5:02 PM
 */

$this->layout = 'main';
$this->pageTitle = Yii::app()->name . ' | Cosul Meu ';

//$price = 0;
//foreach($positions as $position) {
//    $price += $position->getSumPrice();
//}
//
//echo $price;


$arrayDataProvider=new CArrayDataProvider($positions, array(
    'id'=>'id',
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $arrayDataProvider,
        'htmlOptions' => array('id' =>'cosul_meu'),
        'emptyText' => 'Nici un produs',
        'itemsCssClass' => 'transparentTable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "transparentTable-even-row" : "transparentTable-odd-row"',
        'filterCssClass' => 'transparentTable-odd-row',
        'afterAjaxUpdate' => 'updateQuantity',
        'pager' => array(
            'maxButtonCount' => 6,
            'header' => 'Pagina:',
            'prevPageLabel' => ' < Anterioara',
            'nextPageLabel' => 'Urmatoare > ',
            'lastPageLabel' => 'Ultima',
            'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
        ),
        'summaryText' => '<span class = "boldText">{start}</span> - <span class = "boldText">{end}</span> rezultate din totalul de <span class = "boldText">{count}</span>',
    'columns' => array(

        array(
            'name' => 'name',
            'header' => 'Produs comandat',
            'type' => 'raw',
            'value' => '$data->getNameForCart()'
        ),

        array(
            'name' => 'quantity',
            'header' => 'Cantitate',
            'type' => 'raw',
            'value' => '$data->getQuantityInput()'
        ),

        array(
            'name' => 'totalPrice',
            'header' => 'Pret total',
            'type' => 'raw',
            'value' => '$data->getSumPriceForCart()',
        ),
    ),
    )
);


    $backLink = CHtml::link('Inapoi', Yii::app()->request->getUrlReferrer(), array('class' => 'detail-back'));

echo $backLink;