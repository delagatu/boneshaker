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

//$form = $this->beginWidget('CActiveForm',
//    array(
//        'enableClientValidation' => true,
//        'enableAjaxValidation' => true,
////        'method' =>'POST',
//        'method' =>'GET',
////        'action' => $this->createUrl(ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_PARAMETRII_CAUTARE),
//        'action' => $this->createUrl('/' . ControllerPagePartial::PAGE_SITE_CAUTA . '/'),
//        'focus' => 'input[type="text"]:first',
//        'htmlOptions' => array(
//            'id' => 'generalSearchForm',
//        )
//    ));


$params = array('id' => 'search-keywords',
        'class' => 'long-input styled-input',
        'placeholder' => 'Cauta ',
        );

echo Chtml::textField('keywords', $keywords, $params);

//$this->endWidget();

?>