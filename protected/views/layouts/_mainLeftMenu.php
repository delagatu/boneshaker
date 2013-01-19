<div class="grid_3 prepend-top-10" id='left_menu_element'>
    <?php
    $arrow = '<span class ="padding-right-15" > >> </span>';
    echo CHtml::link($arrow . $maker->name,
        $this->createUrl(ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX, array('id' => $maker->id)),
        array('class' => 'leftMenuLink',)
    );
    ?>
</div>
<?php if ($currentCount < $totalCount): ?>
<div class="grid_3" id="menu_element_spacer">
    &nbsp;
</div>
<?php endif; ?>