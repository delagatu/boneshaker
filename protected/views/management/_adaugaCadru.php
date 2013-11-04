<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addFrameForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addFrameForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addFrameForm, 'maker_id', $addFrameForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addFrameForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
            echo $form->labelEx($addFrameForm, 'name');
            echo $form->textField($addFrameForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addFrameForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
            echo $form->labelEx($addFrameForm,'valid');
            echo $form->checkBox($addFrameForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>