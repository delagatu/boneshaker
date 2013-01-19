<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php
    Yii::log($message, 1, 'application');
    if (!strpos(Yii::app()->request->urlReferrer, 'management'))
    {
        $this->redirect($this->createUrl(ControllerPagePartial::PAGE_SITE_INDEX));
    } else {

       echo $message;

    }

?>
</div>