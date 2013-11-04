<?php

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>true,
        'enableAjaxValidation' => true,
        'focus' => array($addEquipmentTypeForm, 'name'),
        'htmlOptions' => array(
            'id' => 'addBicycleDetailForm',
        )
    ));
?>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($addEquipmentTypeForm, 'name');
        echo $form->textField($addEquipmentTypeForm, 'name', array('class' => 'styled-input'));
        echo $form->error($addEquipmentTypeForm,'name');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>