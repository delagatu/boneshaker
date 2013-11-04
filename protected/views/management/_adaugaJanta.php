<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addRimForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addRimForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addRimForm, 'maker_id', $addRimForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addRimForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addRimForm, 'name');
        echo $form->textField($addRimForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addRimForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addRimForm,'valid');
        echo $form->checkBox($addRimForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>