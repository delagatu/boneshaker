<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addComponentTypeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

    <div class ='form'>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addComponentTypeForm, 'name');
            echo $form->textField($addComponentTypeForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addComponentTypeForm,'name');
            ?>
        </div>

    </div>

<?php $this->endWidget(); ?>