<?php

$randomOffer = Offer::getRandomOffer();

if ($randomOffer instanceof Offer)
{
    $productDetails = Product::getProductById($randomOffer->product_id);
    $title = $randomOffer->offer_title . '<br />';

    $image =  CHtml::image(Yii::app()->baseUrl . '/' . $productDetails->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID),
        $randomOffer->offer_title);

    $link =  CHtml::link($image, $this->createUrl($productDetails->itemType->itemController() . '/' . $productDetails->itemType->itemView(), array('makerAndProduct' => $productDetails->getDisplayNameWithId())));
    $price = $productDetails->hasPrice() ? $productDetails->getPrice() : '';

} else {

    $product = Product::getRandomProduct();

    if ($product instanceof Product)
    {
        $title = $product->getDisplayName() . '<br />';

        $image =  CHtml::image(Yii::app()->baseUrl . '/' . $product->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID),
            $product->getDisplayName());

        $link =  CHtml::link($image, $this->createUrl($product->itemType->itemController() . '/' . $product->itemType->itemView(), array('makerAndProduct' => $product->getDisplayNameWithId())));
        $price = $product->hasPrice() ? $product->getPrice() : '';
    }

}

?>

<div class = 'grid_380 center_content prepend-top-10 greyText boldText'>
    <?php echo $title; ?>
</div>

<div class = 'grid_380 center_content prepend-top-10'>
    <?php echo $link; ?>
</div>

<div class = 'grid_380 center_content prepend-top-10 boldText'>
    <?php echo $price; ?>
</div>