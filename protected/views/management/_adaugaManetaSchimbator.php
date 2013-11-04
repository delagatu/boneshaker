<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addShifterForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addShifterForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addShifterForm, 'maker_id', $addShifterForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addShifterForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addShifterForm, 'name');
        echo $form->textField($addShifterForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addShifterForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addShifterForm,'valid');
        echo $form->checkBox($addShifterForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>