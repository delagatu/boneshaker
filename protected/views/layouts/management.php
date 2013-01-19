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

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/management.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button_link_styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid_960.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/browntable.css"/>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/management.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container_16">
    <div id="header">
        <div class="grid_9 push_4 prepend-top-180" id="menu">
            <div class="grid_1 menu-padding"><?php echo CHtml::link('Home', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE));?></div>
            <div
                class="grid_2 menu-padding padding-right-5"><?php echo CHtml::link('Biciclete', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_BICYCLE));?></div>
            <div
                class="grid_2 menu-padding padding-right-15"><?php echo CHtml::link('Accessorii', $this->createUrl('/' . ControllerPagePartial::CONTOLLER_ACCESORY));?></div>
            <div
                class="grid_2 menu-padding padding-right-15"><?php echo CHtml::link('Echipamente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_EQUIPMENT));?></div>
            <div
                class="grid_1 menu-padding padding-right-15"><?php echo CHtml::link('Contact', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CONTACT));?></div>
        </div>
        <!-- menu -->

    </div>
</div>
<!-- header -->

<div class="container_16">

    <div class="grid_14 push_1" id="main_content">
        <div class="grid_4 push_10">
            <div
                class="grid_1"><?php echo Chtml::image(Yii::app()->baseUrl . '/images/design/shopping_car.jpg'); ?></div>
            <div
                class="grid_1 prepend-top-10"><?php echo CHtml::textField('general_search', '', array('class' => 'general_search')); ?></div>
        </div>
        <div class="grid_14" id="spacer_main_content">
            &nbsp;
        </div>

        <div class="grid_3 prepend-top-20" id="left_menu">

            <div class="grid_3">
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

            <div class="grid_3">
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
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST));?>
                        </li>
                    </ul>
                </div>
            </div>   <!-- biciclete -->

            <div class = 'grid_3'>
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
                            <?php echo CHtml::link('Producatori', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST));?>
                        </li>
                    </ul>

                </div>
            </div>

        </div>     <!-- left Menu -->

        <div class="grid_1" id="left_menu_spacer">
            &nbsp;
        </div>

        <div class="grid_9">
            <?php echo $content; ?>
        </div>

    </div>
    <!-- #main_content -->

</div>
<!-- content -->

<div class="container_16">
    <div class="grid_16 prepend-top-10" id="footer">
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