<div class='grid_5 prepend-top-10 products'>
    <div class="grid_5 bigNameGrey"><?php echo $data->name; ?></div>
    <div class="grid_5 menu_element_spacer">&nbsp;</div>
    <div class="grid_1">
        <?php echo CHtml::image(Yii::app()->baseUrl .'/' . $data->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID),$data->name);  ?>
    </div>
    <div class="grid_3 push_1">
        <?php echo $data->description; ?>
    </div>
    <div class = 'grid_2 prepend-top-10'>
        <?php
        $link = $this->createUrl($data->itemType->itemController() . '/' . $data->itemType->itemView(), array('id' => $data->id));
        echo CHtml::link('Detalii', $link, array('class' => 'fancy_green_link'));
        ?>
    </div>
    <?php
    if (Yii::app()->params['webShopAvailable'] === true): ?>
    <div class = 'grid_1'>
        <?php $link = $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::ADD_TO_CART, array('id' => $data->id)) ?>
        <?php echo CHtml::link('In Cos', $link, array('class' => 'fancy_black_link')); ?>
    </div>
    <?php endif; ?>
</div>