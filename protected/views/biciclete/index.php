<?php $this->pageTitle = Yii::app()->name . ' | Vanzari si Service Biciclete | Piese Biciclete ';
$this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
?>

<div class="row">


    <?php

    $this->generateBreadcrumb();

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>Product::model()->getProductByTypeAndMaker(ItemType::BICICLETE, $makerName, $subProduct),
        'itemView'=>'../' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_PRODUCT,
        'summaryText' => '<strong>{start}</strong> - <strong>{end}</strong> din <strong>{count} rezultate</strong>',
        'summaryCssClass' => 'col-sm-9 text-center',
        'pagerCssClass' => 'col-sm-9 text-center',
        'ajaxUpdate' => false,
        'emptyText' =>'Niciun rezultat.',
        'template' => '{summary}{items}{pager}',
        'pager' => array(
            'class' => 'CLinkPager',
            'maxButtonCount' => 6,
            'header' => 'Pagina:',
            'prevPageLabel' => ' <',
            'nextPageLabel' => ' > ',
            'lastPageLabel' => '>>',
            'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
        ),
    ));

    ?>

</div> <!-- content right content end