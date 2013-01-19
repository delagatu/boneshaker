<?php
$this->pageTitle=Yii::app()->name . ' | Accesorii ';
$this->breadcrumbs=array(
	'Site'=>array('/site'),
	'Accesorii',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
<?php $referrer = Yii::app()->request->urlReferrer; 
 echo CHtml::link('Back', $referrer); ?>
</p>