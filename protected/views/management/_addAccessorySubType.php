<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>false,
        'enableAjaxValidation' => false,
        'focus' => array($addAccessorySubTypeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

    <div class ='form'>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addAccessorySubTypeForm, 'name');
            echo $form->textField($addAccessorySubTypeForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addAccessorySubTypeForm,'name');
            ?>
        </div>

    </div>

<?php $this->endWidget(); ?>