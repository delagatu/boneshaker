<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 7/31/12
 * Time: 9:53 AM
 * To change this template use File | Settings | File Templates.
 */

$this->layout = '//layouts/management';

?>

<div class='grid_9 prepend-top-60'>

    <?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'addMakerForm',
        'enableClientValidation' => true,
        'focus' => array($addMakerForm, 'name'),
    ));

    echo $form->errorSummary($addMakerForm); ?>

    <div class='grid_9 padding-5'>

        <div class="grid_2">
            <?php echo $form->labelEx($addMakerForm, 'name'); ?>
        </div>
        <div class="grid_4">
            <?php echo $form->textField($addMakerForm, 'name', array('class' => 'styled-input')); ?>
            <?php echo $form->error($addMakerForm, 'name'); ?>
        </div>

    </div>

    <div class='grid_9 padding-5'>

        <div class="grid_2">
            <?php echo $form->labelEx($addMakerForm, 'item_type_id'); ?>
        </div>
        <div class="grid_4">
            <?php $items = CHtml::listData(ItemType::getItemList(), 'id', 'name'); ?>
            <?php echo Chosen::activeDropDownList($addMakerForm, 'item_type_id', $items, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza')); ?>
            <?php echo $form->error($addMakerForm, 'item_type_id'); ?>
        </div>
    </div>

    <div class='grid_9 padding-5'>

        <div class="grid_2">
            <?php echo $form->labelEx($addMakerForm, 'valid'); ?>
        </div>
        <div class="grid_4">
            <?php echo $form->checkBox($addMakerForm, 'valid', array('checked' => 'checked')); ?>
        </div>
    </div>

    <div class="grid_6 prepend-top-10 padding-5 center_content">
        <?php echo Chtml::submitButton('Adauga', array('class' => 'styled-button')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>