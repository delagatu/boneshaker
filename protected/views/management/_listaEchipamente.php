<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 1/19/13
 * Time: 9:38 AM
 * To change this template use File | Settings | File Templates.
 */

$this->layout = '//layouts/management';

?>

<div class='grid_13 prepend-top-20'>

    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $product->getAllByType($itemType, $maker, $name, $price),
        'filter' => $product->getAllByType($itemType, $maker, $name, $price),
        'itemsCssClass' => 'browntable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "even" : "odd"',
        'filterCssClass' => 'odd',
        'id' => 'listaBiciclete',
        'afterAjaxUpdate' => 'deleteProduct',
        'updateSelector' => '{page},{sort}',
        'pager' => array(
            'maxButtonCount' => 6,
            'header' => 'Pagina:',
            'prevPageLabel' => ' < Anterioara',
            'nextPageLabel' => 'Urmatoare > ',
            'lastPageLabel' => 'Ultima',
            'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
        ),
        'summaryText' => '<span class = "boldText">{start}</span> - <span class = "boldText">{end}</span> rezultate din totalul de <span class = "boldText">{count}</span>',
        'emptyText' => 'Niciun rezultat',
        'columns' => array(

            array(
                'header' => 'Valid',
                'type' => 'raw',
                'value' => '$data->isValidCheckBox()',
                'filter' => false,
            ),

            array(
                'header' => 'Prima pagina',
                'type' => 'raw',
                'value' => '$data->isForHomePageCheckBox()',
                'filter' => false,
            ),

            array(
                'header' => 'Producator',
                'name' => 'maker_name_sort',
                'value' => '$data->getMaker()',
                'filter' => CHtml::textField('maker_name_sort', $maker, array('class' => 'styled-input medium-input', 'placeholder' => 'Cauta')),
            ),

            array(
                'header' => 'Produs',
                'name' => 'bicycle_name_sort',
                'value' => '$data->getName()',
                'filter' => CHtml::textField('name_sort', $name, array('class' => 'styled-input medium-input', 'placeholder' => 'Cauta')),
            ),

            array(
                'header' => 'Pret',
                'name' => 'price_sort',
                'value' => '$data->getPrice()',
                'filter' => CHtml::textField('price_sort', $price, array('class' => 'styled-input small-input', 'placeholder' => 'Cauta')),
            ),

            array(
                'header' => 'Data inserarii',
                'name' => 'created_at_sort',
                'value' => '$data->getCreatedDate()',
                'filter' => false,
            ),

            array(
                'header' => 'Ultima modificare',
                'name' => 'updated_at_sort',
                'value' => '$data->getUpdatedDate()',
                'filter' => false,
            ),

            array(
                'header' => 'Operatiuni',
                'type' => 'raw',
                'value' => '$data->getEquipmentEditLink()',
                'filter' => false,
            ),

        )
    ));

    echo Chtml::link('Adauga echipamente', $this->createUrl(ControllerPagePartial::PAGE_ACTION_ADD_EQUIPMENT), array('class' => 'action-link'));

    ?>

</div>