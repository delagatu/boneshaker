<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 7/30/12
 * Time: 10:34 PM
 * To change this template use File | Settings | File Templates.
 */

$this->layout = '//layouts/management';
?>

<div class='grid_9'>

    <h4 class="boldText">
        <?php

        if (Yii::app()->user->hasFlash('success')) {
            echo Yii::app()->user->getFlash('success');
        }

        ?>

    </h4>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'listaProducatori',
        'dataProvider' => $maker->searchMakerByType(ItemType::BICICLETE),
        'filter' => $maker,
        'itemsCssClass' => 'browntable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "e" : "o"',
        'filterCssClass' => 'o',
        'afterAjaxUpdate' => 'confirmDeleteMaker',
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
            array( // display 'create_time' using an expression
                'header' => 'Producator',
                'name' => 'name_sort',
                'value' => '$data->name',
                'filter' => CHtml::textField('Maker[name_sort]', isset($_GET['Maker']['name_sort']) ? $_GET['Maker']['name_sort'] : '', array('class' => 'styled-input', 'placeholder' => 'Cauta producator ...')),
            ),
            array(
                'header' => '',
                'type' => 'raw',
                'value' => array($this, 'getMakerListActions'),
            )
        ),
    ));


    echo Chtml::link('Adauga producator', $this->createUrl(ControllerPagePartial::PAGE_ADD_MAKER), array('class' => 'action-link'));
    ?>

</div>