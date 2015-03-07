<div class = 'grid_6'>
<?php

$this->pageTitle = Yii::app()->name . ' | Cont Nou';

    $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation'=>false,
        'enableAjaxValidation' => false,
        'focus' => array($registerForm, 'first_name'),
    ));
?>

<h4> Campurile marcate cu <span class="redText">*</span> sunt obligatorii. </h4>

<div class ='form'>

    <div class = 'row'>
        <?php
        echo $form->labelEx($registerForm, 'last_name');
        echo $form->textField($registerForm, 'last_name', array('class' => 'styled-input',));
        echo $form->error($registerForm,'last_name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($registerForm, 'first_name');
        echo $form->textField($registerForm, 'first_name', array('class' => 'styled-input'));
        echo $form->error($registerForm,'first_name');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($registerForm, 'email');
        echo $form->textField($registerForm, 'email', array('class' => 'styled-input', 'title' => 'Autentificarea se face pe baza adresei de email.'));
        echo $form->error($registerForm,'email');
        ?>
    </div>

    <div class = 'row'>
        <?php
        echo $form->labelEx($registerForm, 'password');
        echo $form->passwordField($registerForm, 'password', array('class' => 'styled-input', 'title' => 'Minim 6 caractere.'));
        echo $form->error($registerForm,'password');
        ?>
    </div>

    <div class = 'row'>
        <?php echo $form->checkBox($registerForm, 'abonare_newsletter'); ?>
        <?php echo $form->labelEx($registerForm, 'abonare_newsletter'); ?>
    </div>

    <div class = 'row'>
        <?php echo $form->checkBox($registerForm, 'terms_and_conditions'); ?>
        <?php echo $form->labelEx($registerForm, 'terms_and_conditions');
        echo $form->error($registerForm,'terms_and_conditions'); ?>
    </div>

    <div class = 'row'>
        <?php
            echo Chtml::submitButton('Inregistrare');
        ?>
    </div>

</div>

<?php $this->endWidget(); ?>
</div>

<div class = 'grid_6 prepend-top-20'>
    <?php
    echo Chtml::image(Yii::app()->getBaseUrl(true) . '/images/design/programul-de-teste_2013_RO_small.png');
    ?>
</div>