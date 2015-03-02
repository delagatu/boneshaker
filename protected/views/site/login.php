<?php
$this->pageTitle=Yii::app()->name . ' - Autentificare';
$this->breadcrumbs=array(
	'Login',
);

$this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
?>

<h1>Autentificare</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<!--    <p class="note">Campurile marcate cu <span class="required">*</span> sunt obligatorii.</p>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'username'); ?>
<!--		--><?php //echo $form->textField($model,'username'); ?>
<!--		--><?php //echo $form->error($model,'username'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'password'); ?>
<!--		--><?php //echo $form->passwordField($model,'password'); ?>
<!--		--><?php //echo $form->error($model,'password'); ?>
<!--	</div>-->

<!--	<div class="row rememberMe">-->
<!--		--><?php //echo $form->checkBox($model,'rememberMe'); ?>
<!--		--><?php //echo $form->label($model,'rememberMe'); ?>
<!--		--><?php //echo $form->error($model,'rememberMe'); ?>
<!--	</div>-->

<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Autentificare'); ?>
<!--	</div>-->

    <div class="input-group col-md-4 col-sm-4 col-lg-4">
        <span class="input-group-addon" id="basic-addon1"><?php echo $form->labelEx($model,'username'); ?></span>
        <?php echo $form->textField($model,'username', array('class' => 'form-control', 'placeholder' => 'Username', 'aria-describedby' => 'basic-addon1')); ?>
<!--        <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">-->
    </div>
    <div class="input-group col-md-4 col-sm-4 col-lg-4">
        <?php echo $form->error($model,'username', array('class'=>"bg-danger")); ?>
    </div>

    <div class="input-group col-md-4 col-sm-4 col-lg-4">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
