<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addWheelSizeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

    <div class ='form'>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addWheelSizeForm, 'name');
            echo $form->textField($addWheelSizeForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addWheelSizeForm,'name');
            ?>
        </div>

    </div>

<?php $this->endWidget(); ?>