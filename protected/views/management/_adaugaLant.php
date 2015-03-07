<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addChainForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addChainForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addChainForm, 'maker_id', $addChainForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addChainForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addChainForm, 'name');
        echo $form->textField($addChainForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addChainForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addChainForm,'valid');
        echo $form->checkBox($addChainForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>