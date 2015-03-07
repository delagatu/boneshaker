<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>false,
        'enableAjaxValidation' => false,
        'focus' => array($addComponentSubTypeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

    <div class ='form'>

        <div class = 'row'>
            <?php
            echo $form->labelEx($addComponentSubTypeForm, 'name');
            echo $form->textField($addComponentSubTypeForm, 'name', array('class' => 'styled-input'));
            echo $form->error($addComponentSubTypeForm,'name');
            ?>
        </div>

    </div>

<?php $this->endWidget(); ?>