
    <div class='grid_3 prepend-top-10' id='left_menu_element'>
        <?php
        $arrow = '<span class ="padding-right-5" > >> </span>';
        echo CHtml::link($arrow . $subProduct->getName(),
            $this->createUrl($controller . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX,
                array('makerName' => $subProduct->getUrlSafeName())),
            array('class' => 'leftMenuLink',)
        );

        ?>
    </div>

    <?php if ($currentCount < $totalCount): ?>
    <div class="grid_3 menu_element_spacer">
        &nbsp;
    </div>
    <?php endif; ?>

