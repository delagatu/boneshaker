<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css"/>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/detailsSlideshow.js');

$displayName = $product->getDisplayName();
$this->pageTitle = $displayName;

$backLink = CHtml::link('Inapoi', Yii::app()->request->getUrlReferrer(), array('class' => 'detail-back'));

echo $backLink;

?>

<div class="grid_13 menu-padding prepend-top-10">
    <div class = 'grid_3 prepend-top-5'><span class="bigNameGrey"> Pret:</span> <?php echo $product->displayPrice('greenText bigText'); ?></div>
    <div class="grid_6 bigNameGreyPadding"><span><?php echo $displayName ?></span><div class = 'detail-name'>&nbsp;</div></div>
</div>


<div class='grid_7 prepend-top-20'>
    <div class = 'grid_7'>
        <?php
        $image = CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $product->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_MEDIUM_ID), $product->name,array('id' => 'primary_photo'));
        echo $link = Chtml::link($image, Yii::app()->getBaseUrl(true) . '/' . $product->getBigOrNot(PhotoType::PHOTO_TYPE_BIG_ID), array('class' => 'gallery_main'));
        ?>
    </div>
    <div class = 'grid_5 prepend-top-10'>
        <?php
        $photos = Photo::getPhotoPerProduct($product->id);
        foreach ($photos as $key => $photo) {
            $image = CHtml::image($photo->getSourceByType(PhotoType::PHOTO_TYPE_THUMB_ID), $product->name);
            echo $link = Chtml::link($image, $photo->getBigOrNot(),
                array('class' => 'gallery',
                    'data-medium-photo' => $photo->getSourceByType(PhotoType::PHOTO_TYPE_MEDIUM_ID),
                    'data-big-photo' => $photo->getBigOrNot()
                )
            );
        }
        ?>
    </div>

</div>


<div class = 'grid_5 push_050 prepend-top-20'>
    <?php echo $product->description; ?>
</div>

<div class = 'grid_13 prepend-top-10'>
    <?php
    echo $backLink;
    ?>
</div>