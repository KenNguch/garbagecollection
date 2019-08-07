<!DOCTYPE html>
<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<?php if(!defined('datalist_db_encoding')) define('datalist_db_encoding', 'UTF-8'); ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?php echo datalist_db_encoding; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Garbage Garbage Kollectorz System  | <?php echo (isset($x->TableTitle) ? $x->TableTitle : ''); ?></title>
    <link id="browser_favicon" rel="shortcut icon" href="<?php echo PREPEND_PATH; ?>resources/images/appgini-icon.png">

    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/paper.css">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/lightbox/css/lightbox.css" media="screen">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/select2/select2.css" media="screen">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/datepicker/css/datepicker.css" media="screen">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.css" media="screen">
    <link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>dynamic.css.php">

    <!--[if lt IE 9]>
    <script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <![endif]-->
    <script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery-1.12.4.min.js"></script>
    <script>var $j = jQuery.noConflict();</script>
    <script src="<?php echo PREPEND_PATH; ?>resources/moment/moment-with-locales.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery.mark.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/prototype.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/scriptaculous.js?load=effects"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/select2/select2.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/jscookie/js.cookie.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/datepicker/js/datepicker.packed.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo PREPEND_PATH; ?>common.js.php"></script>
    <?php if(isset($x->TableName) && is_file(dirname(__FILE__) . "/hooks/{$x->TableName}-tv.js")){ ?>
        <script src="<?php echo PREPEND_PATH; ?>hooks/<?php echo $x->TableName; ?>-tv.js"></script>
    <?php } ?>

</head>
<body>
<div class="container theme-paper theme-compact">
    <?php if(function_exists('handle_maintenance')) echo handle_maintenance(true); ?>

    <?php if(!$_REQUEST['Embedded']){ ?>
        <?php if(function_exists('htmlUserBar')) echo htmlUserBar(); ?>
        <div style="height: 70px;" class="hidden-print"></div>
    <?php } ?>

    <?php if(class_exists('Notification')) echo Notification::placeholder(); ?>

    <!-- process notifications -->
    <?php $notification_margin = ($_REQUEST['Embedded'] ? '15px 0px' : '-15px 0 -45px'); ?>
    <div style="height: 60px; margin: <?php echo $notification_margin; ?>;">
        <?php if(function_exists('showNotifications')) echo showNotifications(); ?>
    </div>

    <?php if(!defined('APPGINI_SETUP') && is_file(dirname(__FILE__) . '/hooks/header-extras.php')){ include(dirname(__FILE__).'/hooks/header-extras.php'); } ?>
    <!-- Add header template below here .. -->


    <!DOCTYPE html>
    <html>
    <head>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/googlemap.js"></script>
        <style type="text/css">
            .container {
                height: 450px;
            }

            #map {
                width: 100%;
                height: 100%;
                border: 1px solid blue;
            }

            #data, #allData {
                display: none;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <?php
        require 'education.php';
        $edu = new education;
        $coll = $edu->getCollegesBlankLatLng();
        $coll = json_encode($coll, true);
        echo '<div id="data">' . $coll . '</div>';

        $allData = $edu->getAllColleges();
        $allData = json_encode($allData, true);
        echo '<div id="allData">' . $allData . '</div>';
        ?>
        <div id="map"></div>
    </div>
    </body>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1bF3Ry-gVyKmSVse4s1zmfnyd4_9b3F8&callback=loadMap">
    </script>
    </html>
<?php
if (!$footerCode) {
    include_once("$currDir/footer.php");
} else {
    ob_start();
    include_once("footer.php");
    $dFooter = ob_get_contents();
    ob_end_clean();
    echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
}
?>