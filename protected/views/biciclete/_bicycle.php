<div class='grid_4 prepend-top-10' id='products'>
    <div class="grid_4 bigNameGrey"><?php echo $bicycle->name; ?></div>
    <div class="grid_4" id="menu_element_spacer">&nbsp;</div>
    <div class="grid_2">
        <?php echo CHtml::image(Yii::app()->baseUrl .'/' . $bicycle->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID),$bicycle->name);  ?>
    </div>
    <div class="grid_1">
        <?php echo $bicycle->description; ?>
    </div>
    <div class = 'grid_2'>
        <?php
        $link = $this->createUrl($bicycle->itemType->itemController() . '/' . $bicycle->itemType->itemView(), array('id' => $bicycle->id));
        echo CHtml::link('Detalii', $link, array('class' => 'fancy_green_link'));
        ?>
    </div>
    <?php if (Yii::app()->params['buyAvailable']): ?>
    <div class = 'grid_1'>
        <?php $link = $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::ADD_TO_CART, array('id' => $bicycle->id)) ?>
        <?php echo CHtml::link('In Cos', $link, array('class' => 'fancy_black_link')); ?>
    </div>
    <?php endif; ?>
</div>