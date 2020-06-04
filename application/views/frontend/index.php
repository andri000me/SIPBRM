<?php 

Response_Helper::getData();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon -->
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets')?>/images/global/logo-dark.png">
    <meta property="og:title" content="SIPBRM" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="images/agency/hero.jpg" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/favicon.png" />
  </head>
  <body data-spy="scroll" data-target="#site-nav" data-offset="80" data-scroll-animation="true">
    <?php
      // if(isset($_SESSION['level'])){
      //   if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){
      //     redirect(base_url('dashboard'));
      //   }
      // }
      include str_replace("system", "application/views/frontend/", BASEPATH)."/layout/content.php";
     ?>
     <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.base.js"></script>
      <script src="<?= base_url('assets') ?>/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- inject:js -->
      <script src="<?= base_url('assets') ?>/js/off-canvas.js"></script>
      <script src="<?= base_url('assets') ?>/js/misc.js"></script>
    <!-- /build -->
    <!-- Map JS (Please change the API key below. Read documentation for more info) -->
    
  </body>
</html>
