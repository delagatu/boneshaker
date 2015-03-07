<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addColorForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addColorForm, 'name');
        echo $form->textField($addColorForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addColorForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>