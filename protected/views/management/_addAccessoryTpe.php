<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addAccessoryTypeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addAccessoryTypeForm, 'name');
        echo $form->textField($addAccessoryTypeForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addAccessoryTypeForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>