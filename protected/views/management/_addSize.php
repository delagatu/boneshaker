<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addSizeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addSizeForm, 'name');
        echo $form->textField($addSizeForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addSizeForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>