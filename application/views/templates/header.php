<?php //THE HEADER TEMPLATE FOR THE FRONT END, CONTAINING STYLESHEETS FOR THE WHOLE SITE. THE TITLE IS DEFINED IN THE CONTROLLER ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
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
        var shearDragWhereForce = Math.pow((16 * 25.4 / 1000), 2);
        var liftForceWhere = Math.pow((15.5 * 25.4 / 1000), 2);
        var liftForceFup = 0.37;
    </script>
  </head>
  <body>
