<?php if (is_object($subProduct) && method_exists($subProduct, 'getName') && method_exists($subProduct, 'getUrlSafeName')): ?>

<?php $name = $subProduct->getName(); ?>

<div class='grid_4 tree-view-item'>
    <div class='grid_010 right_content main-tree-view'>&nbsp;  </div>
        <div class='grid_3'>
        <?php

        echo CHtml::link($name,
            $this->createUrl($controller . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX,
                array('subProduct' => $subProduct->getUrlSafeName(), 'makerName' => StringManager::getUrlSafeName($makerName))),
            array('class' => 'leftMenuLink')
        );

        ?>
    </div>
</div>
<?php endif; ?>