<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/2/13
 * Time: 9:12 AM
 * To change this template use File | Settings | File Templates.
 */

//var_dump(Yii::app()->db->getStats());

$keywords = Yii::app()->request->getQuery('keywords');

$form = $this->beginWidget('CActiveForm',
    array(
        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
        'method' =>'POST',
        'action' => $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_PARAMETRII_CAUTARE),
        'focus' => 'input[type="text"]:first',
        'htmlOptions' => array(
            'id' => 'generalSearchForm',
        )
    ));



echo Chtml::textField('keywords', $keywords, array('id' => 'search-keywords','class' => 'long-input styled-input', 'placeholder' => 'Cauta '));

$this->endWidget();

?>