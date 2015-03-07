<?php foreach (Yii::app()->user->getFlashes() as $key => $value): ?>

    <div class = '_flash_<?php echo $key?>'><?php echo $value; ?></div>

<?php endforeach; ?>