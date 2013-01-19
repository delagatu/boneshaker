<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 1/8/13
 * Time: 10:53 PM
 * To change this template use File | Settings | File Templates.
 */

$this->layout = '//layouts/management';

$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'addProductForm',
        'enableClientValidation'=>false,
        'focus' => array($addProductForm, 'maker_id'),
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
    ));
?>

<div>

    <?php foreach (Yii::app()->user->getFlashes() as $key => $value) : ?>
    <div class = 'flash-<?php echo $key; ?>' >
        <?php echo $value; ?>
    </div>
    <?php endforeach; ?>
</div>

<div class="grid_9 form">

    <h2 class="center_content">Adauga bicicleta noua</h2>

    <div class = "row">
        Campurile marcate cu <span class ='redText'>*</span> sunt obligatorii.
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'maker_id'); ?>
        <?php echo Chosen::activeDropDownList($addProductForm, 'maker_id', $addProductForm->makerList(), array('class' => 'long-input', 'empty' => 'Selecteaza')); ?>
        <?php echo $form->error($addProductForm, 'maker_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'sub_product_id'); ?>
        <?php echo Chosen::activeDropDownList($addProductForm, 'sub_product_id', $addProductForm->subProductList(), array('class' => 'long-input', 'empty' => 'Selecteaza')); ?>
        <?php echo $form->error($addProductForm, 'sub_product_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'name'); ?>
        <?php echo $form->textField($addProductForm, 'name'); ?>
        <?php echo $form->error($addProductForm, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'description'); ?>
        <?php echo $form->textArea($addProductForm, 'description', array('class' => 'description')); ?>
        <?php echo $form->error($addProductForm, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'price'); ?>
        <?php echo $form->textField($addProductForm, 'price'); ?>
        <?php echo $form->error($addProductForm, 'price'); ?>
    </div>


    <div class='row padding-5'>
        <div class="grid_2">
            <?php echo CHtml::label('Poze (max 4)', 'addBicycle'); ?>
        </div>
        <?php
        $this->widget('CMultiFileUpload', array(
            'model' => $addProductForm->photoUpload,
            'name' => 'uploadFile',
            'attribute' => 'files',
            'accept' => 'jpg|gif',
            'max' => 4,
            'denied' => 'Format nesuportat.',
            'duplicate' => 'Atentie! Duplicat.',
            'remove' => 'X',
//      'options'=>array(
//          'onFileSelect'=>'function(e, v, m){ window.console.log(m) }',
//          'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
//          'onFileAppend'=>'function(e, v, m){ uploadFile(e, v, m); }',
//          'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
//          'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
//          'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
//      ),
        ));
        ?>
    </div>

</div>


<div class='grid_6 padding-5 center_content'>
    <?php echo CHtml::submitButton('Adauga', array('id' => 'addNewBicycle', 'class' => 'styled-button')); ?>
</div>


<?php $this->endWidget(); ?>

