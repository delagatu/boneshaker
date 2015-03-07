<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addChainWheelForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addChainWheelForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addChainWheelForm, 'maker_id', $addChainWheelForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addChainWheelForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addChainWheelForm, 'name');
        echo $form->textField($addChainWheelForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addChainWheelForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addChainWheelForm,'valid');
        echo $form->checkBox($addChainWheelForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>