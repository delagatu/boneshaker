<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addHubForm, 'maker_id'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php echo $form->labelEx($addHubForm, 'maker_id'); ?>

        <?php
        echo Chosen::activeDropDownList($addHubForm, 'maker_id', $addHubForm->getMakers(),
            array('class' => 'addBicicleDetailDropDown long-input','empty' => 'Selecteaza')
        );
        echo $form->error($addHubForm,'maker_id');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addHubForm, 'name');
        echo $form->textField($addHubForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addHubForm,'name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addHubForm,'valid');
        echo $form->checkBox($addHubForm, 'valid');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>