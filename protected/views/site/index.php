<?php $this->pageTitle = Yii::app()->name . ' | Vanzari si Service Biciclete | Piese Biciclete '; ?>

<div class='grid_9'>

    <?php

    foreach ($products as $product) {
        $params = array(
            'product' => $product
        );

        $this->renderPartial(ControllerPagePartial::PARTIAL_PRODUCT, $params);
    }

    ?>
</div> <!-- content right content end -->

<div class='grid_9 center_content prepend-top-10'>
    <?php $this->widget('CLinkPager',
    array(
        'pages' => $pages,
        'maxButtonCount' => 6,
        'header' => 'Pagina:',
        'prevPageLabel' => ' < Anterioara',
        'nextPageLabel' => 'Urmatoare > ',
        'lastPageLabel' => 'Ultima',
        'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
    )
); ?>
</div>