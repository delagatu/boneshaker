<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addBrakeLeverForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addBrakeLeverForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addBrakeLeverForm, 'maker_id', $addBrakeLeverForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addBrakeLeverForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBrakeLeverForm, 'name');
        echo $form->textField($addBrakeLeverForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addBrakeLeverForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addBrakeLeverForm,'valid');
        echo $form->checkBox($addBrakeLeverForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>