<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addTireForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addTireForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addTireForm, 'maker_id', $addTireForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addTireForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addTireForm, 'name');
        echo $form->textField($addTireForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addTireForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addTireForm,'valid');
        echo $form->checkBox($addTireForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>