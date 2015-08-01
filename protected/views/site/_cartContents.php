<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/13/15
 * Time: 2:47 PM
 * To change this template use File | Settings | File Templates.
 */

$arrayDataProvider=new CArrayDataProvider($positions, array(
    'id'=>'id',
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $arrayDataProvider,
        'id' => 'cosul_meu',
        'emptyText' => 'Nici un produs',
        'itemsCssClass' => 'transparentTable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "transparentTable-even-row" : "transparentTable-odd-row"',
        'filterCssClass' => 'transparentTable-odd-row',
        'afterAjaxUpdate' => 'cartActions',
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
                'name' => 'prod_image',
                'header' => '',
                'type' => 'raw',
                'value' => '$data->getUrlWithPic()'
            ),

            array(
                'name' => 'name',
                'header' => 'Produs comandat',
                'type' => 'raw',
                'value' => '$data->getDisplayName()'
            ),

            array(
                'name' => 'quantity',
                'header' => 'Cantitate',
                'type' => 'raw',
                'value' => '$data->getQuantityInput('.($page_id).')'
            ),

            array(
                'name' => 'totalPrice',
                'header' => 'Pret total',
                'type' => 'raw',
                'value' => '$data->getSumPriceForCart()',
            ),

            array(
                'name' => 'removeItem',
                'header' => '',
                'type' => 'raw',
                'value' => '$data->getRemoveButton()',
            ),
        ),
    )
);
