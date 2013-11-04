<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>false,
        'enableAjaxValidation' => false,
        'focus' => array($addSpeedForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addSpeedForm, 'name');
        echo $form->textField($addSpeedForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addSpeedForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>