<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/13/15
 * Time: 2:32 PM
 * To change this template use File | Settings | File Templates.
 */

$this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);

$form = $this->beginWidget('CActiveForm',
    array(
        'action' => Yii::app()->controller->createUrl("/site/plaseazaComanda"),
        'method' => 'POST',
        'enableClientValidation'=>false,
        'enableAjaxValidation' => false,
        'focus' => array($placeOrder, 'first_name'),
        'htmlOptions' => array(
            'id' => 'placeOrderForm',
        )
    ));
?>

<div class="grid_4">
    <?php
        echo $form->labelEx($placeOrder, 'nume');
        echo $form->textField($placeOrder, 'nume', array('class' => 'styled-input'));
        echo $form->error($placeOrder,'nume');
    ?>
</div>

<div class="grid_4">
    <?php
        echo $form->labelEx($placeOrder, 'prenume');
        echo $form->textField($placeOrder, 'prenume', array('class' => 'styled-input'));
        echo $form->error($placeOrder,'prenume');
    ?>
</div>

<div class="grid_4">
    <?php
    echo $form->labelEx($placeOrder, 'cnp');
    echo $form->textField($placeOrder, 'cnp', array('class' => 'styled-input'));
    echo $form->error($placeOrder,'cnp');
    ?>
</div>

<div class="grid_4 padding-top-15">
    <?php
    echo $form->labelEx($placeOrder, 'email');
    echo $form->textField($placeOrder, 'email', array('class' => 'styled-input'));
    echo $form->error($placeOrder,'email');
    ?>
</div>

<div class="grid_4 padding-top-15">
    <?php
    echo $form->labelEx($placeOrder, 'telefon');
    echo $form->textField($placeOrder, 'telefon', array('class' => 'styled-input'));
    echo $form->error($placeOrder,'telefon');
    ?>
</div>

<hr >
<div class="grid_13">
    <span class="boldText">Adresa de livrare</span>
</div>

<?php $additionlAddressHidden = ($placeOrder->userHasSavedAddresses()) ? 'not_hidden' : 'hidden'; ?>

<div class="grid_10 padding-top-5 <?php echo $additionlAddressHidden; ?>" >
    <?php
    echo $form->labelEx($placeOrder, 'adresaDeLivrare');
    echo $form->radioButtonList($placeOrder, 'adresaDeLivrare', $placeOrder->getAllUserAddress(), array('class' => 'long-input'));
    echo $form->error($placeOrder,'adresaDeLivrare');
    ?>
</div>

<div class="grid_10 padding-top-5">
    <?php
    echo $form->labelEx($placeOrder, 'judet');
    echo Chosen::activeDropDownList($placeOrder, 'judet', $placeOrder->getCountyDropDown(), array('class' => 'long-input'));
    echo $form->error($placeOrder,'judet');
    ?>
</div>

<div class="grid_4 padding-top-5">
    <?php
    echo $form->labelEx($placeOrder, 'localitate');
    echo $form->textField($placeOrder, 'localitate', array('class' => 'styled-input'));
    echo $form->error($placeOrder,'localitate');
    ?>
</div>

<div class="grid_4 padding-top-5">
    <?php
    echo $form->labelEx($placeOrder, 'strada');
    echo $form->textField($placeOrder, 'strada', array('class' => 'styled-input'));
    echo $form->error($placeOrder,'strada');
    ?>
</div>

<div class="grid_4 padding-top-5">
    <?php
    echo $form->labelEx($placeOrder, 'numar');
    echo $form->textField($placeOrder, 'numar', array('class' => 'styled-input', 'size' => 3));
    echo $form->error($placeOrder,'numar');
    ?>
</div>

<hr >
<div class="grid_13 padding-top-5">
    <?php
        echo $form->checkBox($placeOrder, 'agree');
        echo $form->labelEx($placeOrder,'agree');
    ?>
</div>

<div class="grid_13 padding-top-5">
    <?php echo CHtml::submitButton('Plaseaza comanda', array('class' => 'fancy_green_link')); ?>
</div>


<?php $this->endWidget(); ?>
