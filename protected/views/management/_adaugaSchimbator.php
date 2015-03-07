<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addDerailleurForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addDerailleurForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addDerailleurForm, 'maker_id', $addDerailleurForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addDerailleurForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addDerailleurForm, 'name');
        echo $form->textField($addDerailleurForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addDerailleurForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addDerailleurForm,'valid');
        echo $form->checkBox($addDerailleurForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>