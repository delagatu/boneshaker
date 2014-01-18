<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 1/8/13
 * Time: 10:53 PM
 * To change this template use File | Settings | File Templates.
 */

$this->pageTitle = 'Boneshaker | Adauga Componente';
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

<div class="grid_9 form" id = "addBicicleForm">

    <h2 class="center_content">Componente</h2>

    <?php
        $createUpdate = $addProductForm->getCreationUpdateTime();
        if (is_array($createUpdate)):
        foreach ($createUpdate as $key => $value):
    ?>

    <div class='grid_9'><span class = 'boldText'><?php echo $key ?>: </span><?php echo $value; ?></div>

    <?php endforeach; endif; ?>



    <div class = "row">
        Campurile marcate cu <span class ='redText'>*</span> sunt obligatorii.
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'component_type_id'); ?>
        <?php echo Chosen::activeDropDownList($addProductForm, 'component_type_id', $addProductForm->componentList(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addComponentType',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_COMPONENT_TYPE),
                'data-dialog-id' => 'addComponentTypeDialog',
                'data-title' =>'Componente'
            ));
        ?>
        <?php echo $form->error($addProductForm, 'component_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'component_sub_type_id'); ?>
        <?php echo Chosen::activeDropDownList($addProductForm, 'component_sub_type_id', $addProductForm->componentSubTypeList(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addComponentSubType',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_COMPONENT_SUB_TYPE),
                'data-dialog-id' => 'addComponentSubTypeDialog',
                'data-title' =>'Sub-componente'
            ));
        ?>
        <?php echo $form->error($addProductForm, 'component_sub_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($addProductForm, 'maker_id'); ?>
        <?php echo Chosen::activeDropDownList($addProductForm, 'maker_id', $addProductForm->makerList(), array('class' => 'long-input', 'empty' => 'Selecteaza')); ?>
        <?php echo $form->error($addProductForm, 'maker_id'); ?>
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
            <?php echo CHtml::label('Poze:', 'addBicycle'); ?>
        </div>
        <?php
        $this->widget('CMultiFileUpload', array(
            'model' => $addProductForm->photoUpload,
            'name' => 'uploadFile',
            'attribute' => 'files',
            'accept' => 'jpg|gif|jpeg',
//            'max' => 4,
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

    <div class="row">
        <?php
        $upPath = Yii::app()->getBaseUrl(true) . '/images/design/toggle_up.png';
        $downPath = Yii::app()->getBaseUrl(true) . '/images/design/toggle_down.png';

        $up = Chtml::image($upPath, '', array('class' => 'middle-align'));
        $down = Chtml::image($downPath, '', array('class' => 'middle-align'));
        $pozeDisp  = 'Poze disponibile';

        echo Chtml::link($pozeDisp . $down, 'javascript:',
            array('class' => 'action-link',
                'id' => 'show-photos',
                'data-down' => $pozeDisp . $down,
                'data-up' => $pozeDisp . $up
            )
        ); ?>
        <div id = 'display-photos'>
            <?php
            $addProductForm->getPhotos();
            ?>
        </div>
    </div>

</div>

<?php
$createUpdate = $addProductForm->getCreationUpdateTime();
if (is_array($createUpdate)):
    foreach ($createUpdate as $key => $value):
        ?>

        <div class='grid_9'><span class = 'boldText'><?php echo $key ?>: </span><?php echo $value; ?></div>

    <?php endforeach; endif; ?>

<div class='grid_6 padding-5 center_content'>
    <?php echo CHtml::submitButton($addProductForm->getButtonLabel(), array('id' => 'addNewBicycle', 'class' => 'styled-button')); ?>
</div>


<?php $this->endWidget(); ?>

<!--<div class = 'hidden' id = 'addDetailsDialog'></div>-->
<div id = 'addDetailsDialog'></div>

