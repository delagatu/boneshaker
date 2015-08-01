<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/design/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button_link_styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid_1100.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/_flashMessages.css"/>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>

    <?php Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);?>

    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/main.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container_20">
    <div id="header">
        <div class="grid_18 push_1" id="menu">
<!--            <div class="grid_2 menu-padding padding-left-20">--><?php //echo CHtml::link('Home', Yii::app()->getBaseUrl(true));?><!--</div>-->
<!--            <div-->
<!--                    class="grid_2 menu-padding padding-right-15">--><?php //echo CHtml::link('Biciclete', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_BICYCLE));?><!--</div>-->
<!--            <div class="grid_2 menu-padding padding-right-5">--><?php //echo CHtml::link('Accesorii', $this->createUrl('/' . ControllerPagePartial::CONTOLLER_ACCESORY));?><!--</div>-->
<!---->
<!--            <div class="grid_2 menu-padding padding-right-5">--><?php //echo CHtml::link('Componente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_COMPONENTE));?><!--</div>-->
<!--            <div-->
<!--                    class="grid_3 menu-padding padding-right-5">--><?php //echo CHtml::link('Echipamente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_EQUIPMENT));?><!--</div>-->
<!--            <div-->
<!--                    class="grid_1 menu-padding padding-right-5">--><?php //echo CHtml::link('Contact', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CONTACT));?><!--</div>-->

            <div id = "navcontainer">
            <?php
            $image = CHtml::image(Yii::app()->request->baseUrl . '/images/design/logo.jpg','',  array('height' => '40px'));
            $this->widget('zii.widgets.CMenu', array(
                'encodeLabel' => false,
                'items'=>array(
                    // Important: you need to specify url as 'controller/action',
                    // not just as 'controller' even if default action is used.
                    array('label'=>'Home', 'url'=>array('site/index')),
                    array('label'=>'Biciclete', 'url'=>array('biciclete/index')),
                    array('label'=>'Accesorii', 'url'=>array('accesorii/index')),
                    array('label'=>'Componente', 'url'=>array('componente/index')),
                    array('label'=>'Echipamente', 'url'=>array('echipamente/index')),
                    array('label'=>'Contact', 'url'=>array('site/contact')),
                ),
            ));
//            ?>
            </div>

        </div>
        <!-- menu -->

    </div>

    <!-- carousel -->

    <div class="slider grid_18 push_1">
        <div class="main-slider">
            <?php
                Yii::app()->controller->renderPartial('/site/main-slider');
            ?>
        </div>
            <div class="grid_16 push_1 center_content append-dots"></div>
    </div>

</div>
<!-- header -->

<div class="container_20">

    <div class="grid_18 push_1" id="main_content">
        <div class="grid_10 push_8">

            <div
                class="grid_4 push_4 prepend-top-10">
                <?php
                    Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAl_SITE_GENERAL_SEARCH_FORM);
                ?>
            </div>

            <?php if (Yii::app()->params['webShopAvailable']): ?>
                <div  class="grid_1 push_4">
                    <?php
                        $altTitle = 'Cosul Meu';
                        $image = Chtml::image(Yii::app()->baseUrl . '/images/design/shopping_car.jpg', $altTitle);
                        $url = Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_MY_CART);
                        echo CHtml::link($image, $url, array('title' => $altTitle));
                    ?>
                </div>
            <?php endif; ?>

            <div class = 'grid_1 push_4 prepend-top-15'>
                <?php echo Chtml::image(Yii::app()->baseUrl . '/images/design/ajax-loader.gif','Se incarca ...', array('class' => 'progressbar')); ?>
            </div>
        </div>
        <div class="grid_17" id="spacer_main_content">
            &nbsp;
        </div>

        <div class="grid_4 prepend-top-20" id="left_menu">
            <?php

                $category = $this->getMenuHeader();
            ?>
            <div class="grid_4">
                <div class="grid_4 menu-header center_content">
                    <div class="menu-header-text padding-3 padding-left-20">
                        <?php echo $category; ?>
                    </div>
                </div>
                <?php
                    $this->getLeftMenuContent();
                ?>
            </div>

            <div class="grid_4 prepend-top-40">
                <?php echo CHtml::image(Yii::app()->baseUrl . "/images/design/una_alta.jpg", 'Una-Alta'); ?>

                <?php

               $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_OFFERS);

                ?>

            </div>

            <div class="grid_4 prepend-top-40">

                <?php

                $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_NEWSLETTER);

                ?>

            </div>

        </div>

<!--        <div class = 'grid_010' id="left_menu_spacer">-->
<!--            &nbsp;-->
<!--        </div>-->

        <div class="grid_13" id = 'main_content_content'>
            <?php echo $content; ?>
        </div>

    </div>
    <!-- #main_content -->

</div>
<!-- content -->

<div class="container_20">
    <div class="grid_18 prepend-top-10" id="footer">
        <?php $login = CHtml::link('Autentificare', $this->createUrl('/site/login'));
        $logout = CHtml::link('Logout', $this->createUrl('/site/logout'));

        $userData = (Yii::app()->user->isGuest) ? '' : Yii::app()->user->getState('userData', '') . ' | ';
        $accountLink = (empty($userData)) ? '' : CHtml::link($userData, $this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT), array('class' => 'account'));

        echo (Yii::app()->user->isGuest) ? $login : $accountLink . $logout;
        ?>
        |
        <?php echo CHtml::link('Cont nou', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_SITE_CONT_NOU)); ?>
        |
        <?php echo CHtml::link('Termeni si conditii', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_TERMS_AND_CONDITIONS)); ?>
        |
        Copyright &copy; 2012 -  <?php echo date('Y'); ?> by Boneshaker
    </div>
</div>

<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/jquery.colorbox-min.js'); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>

</body>
</html>