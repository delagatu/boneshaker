<?php

/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/25/13
 * Time: 9:34 PM
 * To change this template use File | Settings | File Templates.
 */

$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'addMissingPhotoForm',
        'action' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_MISSING_PHOTO),
        'enableClientValidation'=>false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
    ));

echo $form->errorSummary($addMissingPhotoForm);

echo $form->hiddenField($addMissingPhotoForm, 'photoId');

$listData = Chtml::listData(PhotoType::getAll(), 'id', 'widthAndHeight');

echo Chosen::activeDropDownList($addMissingPhotoForm, 'photoTypeId', $listData);

echo $form->fileField($addMissingPhotoForm, 'uploadMissingFile');

echo CHtml::submitButton('Adauga');

$this->endWidget();