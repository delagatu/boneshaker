<?php
$this->layout = '//layouts/management';

?>

    <h4 class="boldText">
        <?php

        if (Yii::app()->user->hasFlash('success')) {
            echo Yii::app()->user->getFlash('success');
        }

        ?>

    </h4>