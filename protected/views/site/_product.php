
<?php
    $url = $this->createUrl(
        $data->itemType->itemController() . '/' . $data->itemType->itemView(),
        array('makerAndProduct' => $data->getDisplayNameWithId())
    );
?>

<?php
    $photoSource = Yii::app()->getBaseUrl(true) . '/' . $data->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID);
    $normalizeImage = Photo::normalizePhoto($data->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID));
    $generalImage = CHtml::image($photoSource, $data->name);
    $imageLink = CHtml::link($generalImage, $url);
?>

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <div class="caption">
            <h1 class="text-center"> <?php echo $link = Chtml::link($data->getDisplayName(), $url); ?> </h1>
            <?php echo $data->getLimitedDescription(); ?>
        </div>
        <?php echo $imageLink; ?>
        <hr />
        <div>
            <strong>Pret: </strong><span><?php echo $data->displayPrice(); ?></span>
        </div>
    </div>
</div>
