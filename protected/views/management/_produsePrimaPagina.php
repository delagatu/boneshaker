<?php

$this->layout = '//layouts/management';

?>

<h3> Produse pentru prima pagina </h3>

<div class='grid_13 prepend-top-20'>

    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => HomePageProduct::model()->getAll(),
        'filter' => HomePageProduct::model()->getAll(),
        'itemsCssClass' => 'browntable',
        'rowCssClassExpression' => '(($row % 2) == 0) ? "even" : "odd"',
        'filterCssClass' => 'odd',
        'id' => 'listaBiciclete',
        'afterAjaxUpdate' => 'deleteProduct',
        'updateSelector' => '{page},{sort}',
        'pager' => array(
            'maxButtonCount' => 6,
            'header' => 'Pagina:',
            'prevPageLabel' => ' < Anterioara',
            'nextPageLabel' => 'Urmatoare > ',
            'lastPageLabel' => 'Ultima',
            'cssFile' => Yii::app()->request->baseUrl . "/css/pager.css",
        ),
        'summaryText' => '<span class = "boldText">{start}</span> - <span class = "boldText">{end}</span> rezultate din totalul de <span class = "boldText">{count}</span>',
        'emptyText' => 'Niciun rezultat',
        'columns' => array(

            array(
                'header' => 'Prima pagina',
                'type' => 'raw',
                'value' => '$data->isForHomePageCheckBox()',
                'filter' => false,
            ),

            array(
                'header' => 'Tip Produs: Producator / Produs / Pret',
                'type' => 'raw',
                'value' => '$data->getProductDetails()',
                'filter' => CHtml::textField('product_details', '', array('class' => 'styled-input medium-input', 'placeholder' => 'Cauta')),
            ),

            array(
                'header' => 'Din data de',
                'name' => 'insert_date',
                'type' => 'raw',
                'value' => '$data->insert_date',
                'filter' => false,
            ),

        )
    ));

    ?>

</div>