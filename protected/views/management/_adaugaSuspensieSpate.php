<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addRearShockForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

    <div class ='form'>

        <div class = 'row'>
            <?php echo $form->labelEx($addRearShockForm, 'maker_id'); ?>

            <?php
            echo Chosen::activeDropDownList($addRearShockForm, 'maker_id', $addRearShockForm->getMakers(),
                array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
            );
            echo $form->error($addRearShockForm,'maker_id');
            ?>
        </div>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addRearShockForm, 'name');
            echo $form->textField($addRearShockForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addRearShockForm,'name');
            ?>
        </div>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addRearShockForm,'valid');
            echo $form->checkBox($addRearShockForm, 'valid');
            ?>
        </div>

    </div>

<?php $this->endWidget(); ?>