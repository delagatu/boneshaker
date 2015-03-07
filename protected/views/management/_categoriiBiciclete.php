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
        'id' => 'listaCategorii',
        'dataProvider' => SubProduct::model()->getSubProducts($name),
        'filter' => SubProduct::model()->getSubProducts($name),
        'itemsCssClass' => 'browntable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "even" : "odd"',
        'filterCssClass' => 'odd',
        'afterAjaxUpdate' => 'invalidateSubProduct',
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
                'header' => 'Categorie',
                'name' => 'name',
                'type' => 'raw',
                'value' => '$data->getName()',
                'filter' => CHtml::textField('name', $name, array('class' => 'styled-input', 'placeholder' => 'Cauta producator ...')),
            ),

        ),
    ));


    echo Chtml::link('Adauga categorie', 'javascript:', array('class' => 'action-link' , 'id' => 'add-category'));
    ?>

</div>

<div class='grid_7 hidden' id = 'addNewCategory'>

    <?php

    $addSubProductForm = new AddSubProductForm();

    $form = $this->beginWidget('CActiveForm',
        array(
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
        ));

    ?>

    <div class ='form'>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addSubProductForm, 'name');
            echo $form->textField($addSubProductForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addSubProductForm,'name');
            ?>
        </div>

        <div class = 'row'>
            <?php
                echo CHtml::submitButton('Adauga', array('class' => 'styled-button'));
            ?>
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div>