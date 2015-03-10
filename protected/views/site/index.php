<?php $this->pageTitle = Yii::app()->name . ' | Vanzari si Service Biciclete | Piese Biciclete ';
$this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
?>

<div class='grid_1305'>

    <?php

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>Product::model()->getByMaker(null, null, false),
        'itemView'=>ControllerPagePartial::PARTIAL_PRODUCT,
        'summaryText' => '<span class = "boldText">{start}</span> - <span class = "boldText">{end}</span> rezultate din totalul de <span class = "boldText">{count}</span>',
        'pagerCssClass' => 'grid_10 push_2 prepend-top-10',
        'ajaxUpdate' => false,
        'emptyText' =>'Niciun rezultat.',
        'pager' => array(
            'class' => 'CLinkPager',
            'maxButtonCount' => 6,
            'header' => 'Pagina:',
            'prevPageLabel' => ' < Anterioara',
            'nextPageLabel' => 'Urmatoare > ',
            'lastPageLabel' => 'Ultima',
            'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
        ),
    ));
    ?>
</div> <!-- content right content end -->
