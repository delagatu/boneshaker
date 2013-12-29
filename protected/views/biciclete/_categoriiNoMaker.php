
    <div class='grid_3 prepend-top-10' id='left_menu_element'>
        <?php
        $arrow = '<span class ="padding-right-5" > >> </span>';
        echo CHtml::link($arrow . $subProduct->getName(),
            $this->createUrl($controller . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX,
                array('makerName' => $subProduct->getUrlSafeName())),
            array('class' => 'leftMenuLink',)
        );

        $makerName = $this->readSafeName(Yii::app()->request->getQuery('makerName'));

        $accessoryId = AccessoryType::getIdByLabel($makerName);

        $hiddenClass = ($accessoryId == $subProduct->id) ? '' : 'hidden';
        $subCategoryClass = Product::getLeftMenuClass($subProduct->id, $itemTypeId, 20);

        ?>


        <div class="grid_3 <?php echo $hiddenClass . ' ' . $subCategoryClass ?>" id='sub-product-<?php echo $subProduct->id; ?>'>
            <?php
            Product::getAccessorySubTypeIdListByAccessory($subProduct->id, $itemTypeId, $controller);
            ?>
        </div>

    </div>

    <?php if ($currentCount < $totalCount): ?>
    <div class="grid_3 menu_element_spacer">
        &nbsp;
    </div>
    <?php endif; ?>

