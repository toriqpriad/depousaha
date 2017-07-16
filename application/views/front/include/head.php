<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title><?=$title_page?></title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <?php
  if(isset($description)){
  ?>
  <meta name="description" content="<?=$description?>">
  <? } else {
  ?>
  <meta name="description" content="<?=$footer['info']->site_description?>">
  <?php
  }
  ?>
  <meta name="author" content="<?=$footer['info']->site_name?>">

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="<?=FRONTEND_STATIC_FILES?>asset/css/bootstrap.min.css" type="text/css" media="screen">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="<?=FRONTEND_STATIC_FILES?>css/font-awesome.min.css" type="text/css" media="screen">

  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/slicknav.css" media="screen">

  <!-- Margo CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/style.css" media="screen">

  <!-- Responsive CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/responsive.css" media="screen">

  <!-- Css3 Transitions Styles  -->
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/animate.css" media="screen">

  <!-- Color CSS Styles  -->
  <!-- <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/red.css" title="red" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/jade.css" title="jade" media="screen" /> -->
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/green.css" title="green" media="screen" />
  <!-- <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/blue.css" title="blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/beige.css" title="beige" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/cyan.css" title="cyan" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/orange.css" title="orange" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/peach.css" title="peach" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/pink.css" title="pink" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/purple.css" title="purple" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/sky-blue.css" title="sky-blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?=FRONTEND_STATIC_FILES?>css/colors/yellow.css" title="yellow" media="screen" /> -->

  <!-- Margo JS  -->
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.migrate.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/modernizrr.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.appear.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/count-to.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.textillate.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.lettering.js"></script>
  <!-- <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.easypiechart.min.js"></script> -->
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.parallax.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="<?=FRONTEND_STATIC_FILES?>js/jquery.slicknav.js"></script>

  <!--[if IE 8]><script src="<?=FRONTEND_STATIC_FILES?>http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="<?=FRONTEND_STATIC_FILES?>http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
