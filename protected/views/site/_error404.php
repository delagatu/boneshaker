<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 4/13/15
 * Time: 2:21 PM
 * To change this template use File | Settings | File Templates.
 */

$this->pageTitle=Yii::app()->name . ' - Error 404';
$this->breadcrumbs=array(
    'Error',
);
?>


<h2>Error <?php echo $error['code']; ?></h2>

<div class="error">
    Ne pare rau, pagina solicitata nu exista!
</div>