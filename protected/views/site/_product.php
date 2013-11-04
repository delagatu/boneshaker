<?php
    $link = $this->createUrl(
        $data->itemType->itemController() . '/' . $data->itemType->itemView(),
        array('makerAndProduct' => $data->getDisplayNameWithId())
    );
?>
<div class='grid_6 prepend-top-10 products'>
    <div class="grid_6 bigNameGrey"><?php echo $data->getDisplayName(); ?></div>
    <div class="grid_6 menu_element_spacer">&nbsp;</div>
    <div class="grid_1 suffix_05 center_content">
        <?php
        $photoSource = Yii::app()->getBaseUrl(true) . '/' . $data->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID);
        $normalizeImage = Photo::normalizePhoto($data->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID));
        $generalImage = CHtml::image($photoSource, $data->name, $normalizeImage);
        echo CHtml::link($generalImage, $link);
        ?>
    </div>
    <div class="grid_380 push_1 ">
        <?php echo $data->getLimitedDescription(); ?>
    </div>
    <div class = 'grid_6 prepend-top-10'>
        Pret:<?php echo $data->displayPrice(); ?>
    </div>
    <div class = 'grid_6 prepend-top-10'>
        <?php
        echo CHtml::link('Detalii', $link, array('class' => 'fancy_green_link'));
        ?>
    </div>
    <?php if (Yii::app()->params['webShopAvailable']): ?>
    <div class = 'grid_1'>
        <?php $link = $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::ADD_TO_CART, array('id' => $data->id)) ?>
        <?php echo CHtml::link('In Cos', $link, array('class' => 'fancy_black_link')); ?>
    </div>
    <?php endif; ?>

</div>