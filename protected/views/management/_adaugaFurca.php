<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addForkForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addForkForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addForkForm, 'maker_id', $addForkForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addForkForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addForkForm, 'name');
        echo $form->textField($addForkForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addForkForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addForkForm,'valid');
        echo $form->checkBox($addForkForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>