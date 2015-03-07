<?php
$itemType = ItemType::getById($itemTypeId);
$controller = ($itemType instanceof ItemType) ? $itemType->itemController() : ControllerPagePartial::CONTROLLER_BICYCLE;
?>

<div class="grid_3 prepend-top-10" id='left_menu_element'>
    <?php
    $arrow = '<span class ="padding-right-5" > >> </span>';
    echo CHtml::link($arrow . $maker->getName(),
        $this->createUrl($controller . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX, array('makerName' => $maker->getUrlSafeName())),
        array('class' => 'leftMenuLink', 'data-maker-id' => $maker->id)
    );
    ?>
</div>
<?php
    $hiddenClass = ($makerIdGet == $maker->id) ? '' : 'hidden';
    $subCategoryClass = Product::getLeftMenuClass($maker->id, $itemTypeId, 20);

    ?>
<div class="grid_3 <?php echo $hiddenClass . ' ' . $subCategoryClass ?>" id='sub-product-<?php echo $maker->id; ?>'>
    <?php
    Product::getSubProductByMakerId($maker->id, $itemTypeId, $controller);
    ?>
</div>

<?php if ($currentCount < $totalCount): ?>
    <div class="grid_3 menu_element_spacer">
        &nbsp;
    </div>
    <?php endif; ?>