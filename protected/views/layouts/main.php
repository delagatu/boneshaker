<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 11/7/14
 * Time: 9:59 PM
 * To change this template use File | Settings | File Templates.
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/design/favicon.ico">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button_link_styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/_flashMessages.css"/>
    <?php Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
    );?>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/main.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/jquery.colorbox-min.js'); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

                <?php echo CHtml::link(Yii::app()->name, Yii::app()->getBaseUrl(true), array('class' => 'navbar-brand'));?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active">
                    <?php echo CHtml::link('Home', Yii::app()->getBaseUrl(true));?>
                </li>
                <li><?php echo CHtml::link('Biciclete', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_BICYCLE));?></li>
                <li><?php echo CHtml::link('Accesorii', $this->createUrl('/' . ControllerPagePartial::CONTOLLER_ACCESORY));?></li>
                <li><?php echo CHtml::link('Componente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_COMPONENTE));?></li>
                <li><?php echo CHtml::link('Echipamente', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_EQUIPMENT));?></li>
                <li><?php echo CHtml::link('Contact', $this->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_CONTACT));?></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>


          <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                  <div class="item active">
                      <img src="/images/carousel/2b701030679871261895f3b4c254a1b2.jpg" alt="First slide">
                      <div class="container">
                          <div class="carousel-caption">
                              <h1>Example headline.</h1>
                              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="/images/carousel/0bfa8f92ec622ea617d9f988d4f301ed.jpg" alt="Second slide">
                      <div class="container">
                          <div class="carousel-caption">
                              <h1>Another example headline.</h1>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="/images/carousel/1c2564a238c9200c00d07fb79533acf5.jpg" alt="Third slide">
                      <div class="container">
                          <div class="carousel-caption">
                              <h1>One more for good measure.</h1>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                          </div>
                      </div>
                  </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div><!-- /.carousel -->

          <hr class="featurette-divider">

          <div class="row featurette">
              <div class="col-md-9">
<!--                  <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>-->
<!--                  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>-->
                  <?php echo $content; ?>
              </div>
          </div>

          <!-- FOOTER -->
          <footer>
              <?php

              $login = CHtml::link('Login', $this->createUrl('/site/login'));
              $logout = CHtml::link('Logout', $this->createUrl('/site/logout'));

              $userData = (Yii::app()->user->isGuest) ? '' : Yii::app()->user->getState('userData', '') . ' &middot; ';
              $accountLink = (empty($userData)) ? '' : CHtml::link($userData, $this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT), array('class' => 'account'));

              ?>
              <p class="pull-right"><a href="#">Sus</a></p>
              <p>&copy; 2012 -  <?php echo date('Y'); ?> Boneshaker, Inc. &middot;
                  <?php echo CHtml::link('Termeni si conditii', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PAGE_SITE_TERMS_AND_CONDITIONS)); ?> &middot;
                  <?php echo (Yii::app()->user->isGuest) ? $login : $accountLink . $logout; ?>
                  <?php echo (Yii::app()->user->isGuest) ? ' &middot; ' . CHtml::link('Cont nou', Yii::app()->controller->createUrl('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_SITE_CONT_NOU)) : ''; ?>
              </p>
          </footer>

      </div><!-- /.container -->
</body>