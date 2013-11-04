<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addBBSetForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addBBSetForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addBBSetForm, 'maker_id', $addBBSetForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addBBSetForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBBSetForm, 'name');
        echo $form->textField($addBBSetForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addBBSetForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBBSetForm,'valid');
        echo $form->checkBox($addBBSetForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>