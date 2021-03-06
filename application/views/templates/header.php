<?php //THE HEADER TEMPLATE FOR THE FRONT END, CONTAINING STYLESHEETS FOR THE WHOLE SITE. THE TITLE IS DEFINED IN THE CONTROLLER ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('img/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?>">
    <link rel="manifest" href="<?php echo base_url('img/site.webmanifest');?>">
    <link rel="mask-icon" href="<?php echo base_url('img/safari-pinned-tab.svg');?>" color="#4b8709">
    <meta name="msapplication-TileColor" content="#4b8709">
    <meta name="theme-color" content="#4b8709">

    <link rel="stylesheet" href="<?php echo base_url('fonts/fonts.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/foundation.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/toastr.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/pikaday.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/app.css');?>">
    <script>
        // Constant variables used for calculating product information.
        // Stored here so we can echo these on the front end as well
        var waterDensity = 1000;
        var shearStressSideC = 0.76;
        var liftForceFup = 0.37;
    </script>
  </head>
  <body>
