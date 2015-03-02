<?php $this->pageTitle = Yii::app()->name . ' | Vanzari si Service Biciclete | Piese Biciclete ';
$this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
?>

<div class='grid_1305'>

    <?php

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>Product::model()->getByMaker(null, null, true),
        'itemView'=>ControllerPagePartial::PARTIAL_PRODUCT,
        'summaryText' => '<strong>{start}</strong> - <strong>{end}</strong> din <strong>{count} rezultate</strong>',
        'summaryCssClass' => 'col-sm-4',
        'pagerCssClass' => 'col-sm-8',
        'template' => '{pager}{summary}{items}{pager}',
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
