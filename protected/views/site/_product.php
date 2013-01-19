<div class='grid_4 prepend-top-10' id='products'>
    <div class="grid_4 bigNameGrey"><?php echo $product->name; ?></div>
    <div class="grid_4" id="menu_element_spacer">&nbsp;</div>
    <div class="grid_2">
        <?php
        echo CHtml::image(Yii::app()->baseUrl . '/' . $product->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID), $product->name); ?>
    </div>
    <div class="grid_1">
        <?php echo $product->description; ?>
    </div>
    <div class = 'grid_2'>
        <?php
        $link = $this->createUrl($product->itemType->itemController() . '/' . $product->itemType->itemView(), array('id' => $product->id));
        echo CHtml::link('Detalii', $link, array('class' => 'fancy_green_link'));
        ?>
    </div>
    <?php if (Yii::app()->params['buyAvailable']): ?>
    <div class = 'grid_1'>
        <?php $link = $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::ADD_TO_CART, array('id' => $product->id)) ?>
        <?php echo CHtml::link('In Cos', $link, array('class' => 'fancy_black_link')); ?>
    </div>
    <?php endif; ?>

</div>