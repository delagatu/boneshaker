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

<div class='grid_7'>

    <h4 class="boldText">

        <?php
        $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
        ?>

    </h4>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'listaProducatori',
        'dataProvider' => Maker::model()->searchMakerByType($name, $itemType),
        'filter' => Maker::model()->searchMakerByType($name, $itemType),
        'itemsCssClass' => 'browntable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "even" : "odd"',
        'filterCssClass' => 'odd',
        'afterAjaxUpdate' => 'invalidateMaker',
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
                'header' => 'Valid',
                'type' => 'raw',
                'value' => '$data->getValidCheckBox()',
                'filter' => false,
            ),

            array(
                'header' => 'Producator',
                'name' => 'name',
                'type' => 'raw',
                'value' => '$data->getEditName()',
                'filter' => CHtml::textField('name', $name, array('class' => 'styled-input', 'placeholder' => 'Cauta producator ...')),
            ),

            array(
                'header' => 'Tipul',
                'name' => 'name',
                'type' => 'raw',
                'value' => '$data->getType()',
                'filter' => false
            ),
        ),
    ));


    echo Chtml::link('Adauga producator', $this->createUrl(ControllerPagePartial::PAGE_ADD_MAKER), array('class' => 'action-link'));
    ?>

</div>