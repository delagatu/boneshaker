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
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button_link_styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid_960.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/main.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container_16">
    <div id="header">
        <div class="grid_9 push_4 prepend-top-180" id="menu">
            <div class="grid_1 menu-padding"><?php echo CHtml::link('Home', $this->createUrl('/index.php'));?></div>
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
                <?php echo CHtml::image(Yii::app()->baseUrl . "/images/design/menu_bicycle_header.jpg", 'Biciclete'); ?>
                <?php
                $bicyleMaker = Maker::getMakerByType(ItemType::BICICLETE);

                $totalCount = count($bicyleMaker);
                $currentCount = 1;
                foreach ($bicyleMaker as $maker) {
                    $params = array('maker' => $maker,
                        'currentCount' => $currentCount,
                        'totalCount' => $totalCount,

                    );
                    $currentCount++;
                    $this->renderPartial('/' . ControllerPagePartial::LAYOUTS . '/' . ControllerPagePartial::PARTIAL_LAYOUT_MAIN_LEFT_MENU, $params);

                }
                ?>
            </div>

            <div class="grid_3 prepend-top-40">
                <?php echo CHtml::image(Yii::app()->baseUrl . "/images/design/una_alta.jpg", 'Una-Alta'); ?>

                <?php

                $offer = new Offer();
                $randomOffer = $offer->getRandomOffer();

                if (!is_null($randomOffer))
                {
                    $productDetails = Product::getProductById($randomOffer->product_id);
                    $photo =  Photo::getOnePhotoByType($randomOffer->product_id, PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID);

                    echo $randomOffer->offer_title . '<br />';
                    if ($photo instanceof Photo)
                    {
                        echo CHtml::image(Yii::app()->baseUrl . '/' . $productDetails->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID),
                            $randomOffer->offer_title);
                    }
                }

                ?>

            </div>

        </div>

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