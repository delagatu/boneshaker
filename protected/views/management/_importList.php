<?php

$this->layout = '//layouts/management';

?>

<h3> Produse Importate </h3>

<div class='grid_13 prepend-top-20'>

    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => ProductImport::model()->getAll(),
        'filter' => ProductImport::model()->getAll(),
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
                'header' => 'Valid',
                'type' => 'raw',
                'value' => '$data->isValidCheckBox()',
                'filter' => false,
            ),

            array(
                'header' => 'Tip Produs: Producator / Produs / Pret',
                'type' => 'raw',
                'value' => '$data->getProductDetails()',
                'filter' => CHtml::textField('product_details', Yii::app()->request->getQuery('product_details', null), array('class' => 'styled-input medium-input', 'placeholder' => 'Cauta')),
            ),

            array(
                'header' => 'Din data de',
                'name' => 'import_date',
                'type' => 'raw',
                'value' => '$data->import_date',
                'filter' => false,
            ),

            array(
                'header' => 'Sursa',
                'name' => 'import_source_id',
                'type' => 'raw',
                'value' => '$data->getImportSource()',
                'filter' => false,
            ),

            array(
                'header' => 'Operatiuni',
                'type' => 'raw',
                'value' => '$data->getAvailableActions()',
                'filter' => false,
            ),

        )
    ));

    ?>

</div>