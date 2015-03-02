<?php
$itemType = ItemType::getById($itemTypeId);
$controller = ($itemType instanceof ItemType) ? $itemType->itemController() : ControllerPagePartial::CONTROLLER_BICYCLE;
?>

<div class="visible-lg-inline visible-md-inline">
    <div class="col-sm-8 col-lg-8 col-md-8">
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
    <div class=" <?php echo $hiddenClass . ' ' . $subCategoryClass ?>" id='sub-product-<?php echo $maker->id; ?>'>
        <?php
        Product::getSubProductByMakerId($maker->id, $itemTypeId, $controller);
        ?>
    </div>
</div>

<?php //if ($currentCount < $totalCount): ?>
<!--    <div class="grid_3 menu_element_spacer">-->
<!--        &nbsp;-->
<!--    </div>-->
<!--    --><?php //endif; ?>

<!-- Split button -->
<div class="visible-xs-inline visible-sm-inline">
    <div class="col-sm-8 col-lg-8 col-md-8">
        <div class="btn-group">
            <button type="button" class="btn text-justify">
                <?php

                    echo CHtml::link($maker->getName(),
                        $this->createUrl($controller . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX, array('makerName' => $maker->getUrlSafeName())),
                        array('class' => 'leftMenuLink', 'data-maker-id' => $maker->id)
                    );

                ?>
            </button>
            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
</div>
