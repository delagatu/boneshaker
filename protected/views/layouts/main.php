<!DOCTYPE html>
<html class="full" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom_design.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/shop-homepage.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/general.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--            <a class="navbar-brand" href="--><?php //echo  Yii::app()->getBaseUrl(true)?><!-- ">-->
                        <!--                <img alt="Brand" src="--><?php //echo Yii::app()->request->baseUrl; ?><!-- /images/design/logo.jpg">-->
                        <!--            </a>-->
                        <a class="navbar-brand" href="<?php echo  Yii::app()->getBaseUrl(true)?> ">
                            Logo
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <?php
                        $contactUrl = $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CONTACT);
                        ?>


                        <ul class="nav navbar-nav">
                            <!--                <li >-->
                            <!--                    --><?php //echo CHtml::link('Home', Yii::app()->getBaseUrl(true));?>
                            <!--                </li>-->
                            <li class="<?php echo $this->getIsActiveHeaderByController(ControllerPagePartial::CONTROLLER_BICYCLE) ?>">
                                <?php echo CHtml::link('Biciclete', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_BICYCLE));?>
                            </li>
                            <li class="<?php echo $this->getIsActiveHeaderByController(ControllerPagePartial::CONTOLLER_ACCESORY) ?>">
                                <?php echo CHtml::link('Accesorii', $this->createUrl('/' . ControllerPagePartial::CONTOLLER_ACCESORY));?>
                            </li>
                            <li class="<?php echo $this->getIsActiveHeaderByController(ControllerPagePartial::CONTROLLER_COMPONENTE) ?>">
                                <?php echo CHtml::link('Componente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_COMPONENTE));?>
                            </li>
                            <li class="<?php echo $this->getIsActiveHeaderByController(ControllerPagePartial::CONTROLLER_EQUIPMENT) ?>">
                                <?php echo CHtml::link('Echipamente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_EQUIPMENT));?>
                            </li>
                            <li class="<?php echo $this->getIsActiveHeaderByUrl($contactUrl) ?>">
                                <?php echo CHtml::link('Contact', $contactUrl);?>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
        </div>
    </div>

    <div class="row">

<!--        <div class="col-md-12">-->
<!--            --><?php
//            $this->widget('zii.widgets.CBreadcrumbs', array(
//                'links'=>$this->breadcrumbs,
//            ));
//            ?>
<!--        </div>-->

        <div class="col-md-12">

<!--            <div class="row carousel-holder">-->
<!---->
<!--                <div class="col-md-12">-->
<!--                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
<!--                        <ol class="carousel-indicators">-->
<!--                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--                        </ol>-->
<!--                        <div class="carousel-inner">-->
<!--                            <div class="item active">-->
<!--                                <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--                            </div>-->
<!--                            <div class="item">-->
<!--                                <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--                            </div>-->
<!--                            <div class="item">-->
<!--                                <img class="slide-image" src="http://placehold.it/800x300" alt="">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">-->
<!--                            <span class="glyphicon glyphicon-chevron-left"></span>-->
<!--                        </a>-->
<!--                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">-->
<!--                            <span class="glyphicon glyphicon-chevron-right"></span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </div>-->

            <!-- nav time here -->
            <div class="col-md-3">
                <?php
                $menuArray = $this->getLeftMenuContent();
                ?>
                <div class="list-group">
                    <span class="list-group-item text-center"><strong><?php echo $this->getMenuHeader();?></strong></span>
                    <?php foreach($menuArray as $menuItem):  ?>
                        <?php if ($menuItem instanceof Maker): ?>
                            <?php

                            $maker = Yii::app()->request->getQuery('makerName');
                            $active = $maker == $menuItem->getName() ? ' active ' : '';

                            //$url = $this->createUrl(ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PAGE_BICYCLE_INDEX, array('makerName' => $menuItem->getUrlSafeName()));
                            $url = $this->createUrl($this->id . '/index', array('makerName' => $menuItem->getUrlSafeName()));
                            echo CHtml::link($menuItem->getName(),$url, array('class' => $active . 'list-group-item leftMenuLink', 'data-maker-id' => $menuItem->id));
                            ?>
                            <!--                <a href="#" class="list-group-item">Category 1</a>-->
                            <!--                <a href="#" class="list-group-item">Category 2</a>-->
                            <!--                <a href="#" class="list-group-item">Category 3</a>-->
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!--            --><?php //$this->getLeftMenuContent(); ?>

                <?php

                $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_NEWSLETTER);

                ?>
            </div>

            <div class="col-md-9">
                <?php echo $content; ?>
            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <?php

            $login = CHtml::link('Login', $this->createUrl('/site/login'));
            $logout = CHtml::link('Logout', $this->createUrl('/site/logout'));

            $userData = (Yii::app()->user->isGuest) ? '' : Yii::app()->user->getState('userData', '') . ' &middot; ';
            $accountLink = (empty($userData)) ? '' : CHtml::link($userData, $this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT), array('class' => 'account'));

            ?>
            <p class="pull-right">
                <a href="#"><span class="glyphicon glyphicon-arrow-up"></span></a>
            </p>
            <p>&copy; 2012 -  <?php echo date('Y'); ?> Boneshaker &middot;
                <?php echo CHtml::link('Termeni si conditii', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_TERMS_AND_CONDITIONS)); ?> &middot;
                <?php echo (Yii::app()->user->isGuest) ? $login : $accountLink . $logout; ?>
                <?php echo (Yii::app()->user->isGuest) ? ' &middot; ' . CHtml::link('Cont nou', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_SITE_CONT_NOU)) : ''; ?>
            </p>

        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

</body>

</html>