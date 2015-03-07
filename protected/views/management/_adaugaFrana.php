<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addBrakeSystemForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addBrakeSystemForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addBrakeSystemForm, 'maker_id', $addBrakeSystemForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addBrakeSystemForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBrakeSystemForm, 'name');
        echo $form->textField($addBrakeSystemForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addBrakeSystemForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBrakeSystemForm,'valid');
        echo $form->checkBox($addBrakeSystemForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>