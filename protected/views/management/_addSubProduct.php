<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addSubProductForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addSubProductForm, 'name');
        echo $form->textField($addSubProductForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addSubProductForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>