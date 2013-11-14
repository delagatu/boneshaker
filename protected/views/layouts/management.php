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
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/management.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button_link_styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid_1100.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/browntable.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/_flashMessages.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jHtmlArea.css"/>
    <?php Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
    );?>

    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/javascript/management.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/javascript/jHtmlArea-0.7.5.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/javascript/jquery.colorbox-min.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container_20">
    <div id="header">
        <div class="grid_14 push_3 prepend-top-180" id="menu">
            <div class="grid_2 menu-padding padding-left-20"><?php echo CHtml::link('Home', Yii::app()->getBaseUrl(true));?></div>
            <div
                class="grid_2 menu-padding padding-right-15"><?php echo CHtml::link('Biciclete', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_BICYCLE));?></div>
            <div class="grid_2 menu-padding padding-right-5"><?php echo CHtml::link('Accesorii', $this->createUrl('/' . ControllerPagePartial::CONTOLLER_ACCESORY));?></div>

            <div class="grid_2 menu-padding padding-right-5"><?php echo CHtml::link('Componente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_COMPONENTE));?></div>
            <div
                class="grid_3 menu-padding padding-right-5"><?php echo CHtml::link('Echipamente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_EQUIPMENT));?></div>
            <div
                class="grid_1 menu-padding padding-right-5"><?php echo CHtml::link('Contact', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CONTACT));?></div>
        </div>
        <!-- menu -->

    </div>
        <!-- menu -->

    </div>
</div>
<!-- header -->

<div class="container_20">

    <div class="grid_18 push_1" id="main_content">
        <div class="grid_10 push_8">
            <?php if (Yii::app()->params['webShopAvailable']): ?>
            <div  class="grid_1"><?php echo Chtml::image(Yii::app()->baseUrl . '/images/design/shopping_car.jpg'); ?></div>
            <?php endif; ?>
            <div
                    class="grid_4 push_4 prepend-top-10">
                <?php
                Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAl_SITE_GENERAL_SEARCH_FORM);
                ?>
            </div>
            <div class = 'grid_1 push_4 prepend-top-15'>
                <?php echo Chtml::image(Yii::app()->baseUrl . '/images/design/ajax-loader.gif','Se incarca ...', array('class' => 'progressbar')); ?>
            </div>
        </div>
        <div class="grid_17" id="spacer_main_content">
            &nbsp;
        </div>

        <div class="grid_4 prepend-top-20" id="left_menu">

            <div class="grid_4">
                <div id = "producatori" class="categoryHeader">
                    <h2>
                        Producatori
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Adauga', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_ADD_MAKER));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Producatori Valizi', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST));?>
                        </li>
                    </ul>
                </div>
            </div> <!-- producatori -->

            <div class="grid_4">
                <div id = "biciclete" class="categoryHeader">
                    <h2>
                        Biciclete
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Adauga', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_ADD_BICYCLE));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Lista', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::VIEW_ALL_BICYCLE));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST, array('tip' => ItemType::BICICLETE)));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Categorii', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MANAGEMENT_VIEW_SUB_PRODUCT));?>
                        </li>
                    </ul>
                </div>
            </div>   <!-- biciclete -->

            <div class = 'grid_4'>
                <div id = "piese_accesorii" class="categoryHeader">
                    <h2>
                        Piese & Accesorii
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Adauga', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_ADD));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Lista', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_LIST_PA));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST, array('id' => ItemType::ACCESORII)));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Categorii', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MANAGEMENT_VIEW_ACCESSORY_TYPE));?>
                        </li>
                    </ul>

                </div>
            </div>

            <div class = 'grid_4'>
                <div id = "piese_accesorii" class="categoryHeader">
                    <h2>
                        Componente
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Adauga', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_ADD_COMPONENTS));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Lista', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_LIST_COMPONENTS));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST, array('id' => ItemType::COMPONENTE)));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Categorii', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MANAGEMENT_COMPONENT_CATEGORY));?>
                        </li>
                    </ul>

                </div>
            </div>


            <div class = 'grid_4'>
                <div id = "echipamente" class="categoryHeader">
                    <h2>
                        Echipamente
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Adauga', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_ACTION_ADD_EQUIPMENT));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Lista', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_EQUIPMENT_LIST));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST, array('id' => ItemType::ECHIPAMENTE)));?>
                        </li>
                        <li>
                            <?php echo CHtml::link('Categorii', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MANAGEMENT_VIEW_EQUIPMENT_TYPE));?>
                        </li>
                    </ul>

                </div>
            </div>

            <div class = 'grid_4'>
                <div id = "setari_generale" class="categoryHeader">
                    <h2>
                        Setari Generale
                    </h2>

                    <ul>
                        <li>
                            <?php echo CHtml::link('Produse prima pagina', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MANAGEMENT_HOME_PAGE_PRODUCTS));?>
                        </li>
                    </ul>

                </div>
            </div>

        </div>     <!-- left Menu -->

        <div class="grid_11">
            <?php echo $content; ?>
        </div>

    </div>
    <!-- #main_content -->

</div>
<!-- content -->

<div class="container_20">
    <div class="grid_18 prepend-top-10" id="footer">
        <?php $login = CHtml::link('Login', $this->createUrl('/site/login'));
        $logout = CHtml::link('Logout', $this->createUrl('/site/logout'));

        $userData = (Yii::app()->user->isGuest) ? '' : Yii::app()->user->getState('userData', '') . ' | ';
        $accountLink = (empty($userData)) ? '' : CHtml::link($userData, $this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT), array('class' => 'account'));

        echo (Yii::app()->user->isGuest) ? $login : $accountLink . $logout;
        ?>
        |
        <?php echo CHtml::link('Register', array('/site/register')); ?>
        |
        Site Map
        |
        Copyright &copy; <?php echo date('Y'); ?> by Boneshaker
    </div>
</div>

</body>
</html>