<?php
if (empty(session_id())) {
    session_start();
}
error_reporting(0);
@$typePage; //show from controller
@$template; //show from controller

//import functions
require_once __DIR__ . "/../../../functions.php";
if (!checkLogin($typePage) && $template != "index")
    redirectHome("/" . $typePage . "/");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/assets/css/search_form/responsive.css">
    <link rel="stylesheet" href="/assets/css/search_form/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/assets/css/search_form/jquery.fancybox.css">
    <link rel="stylesheet" href="/assets/css/search_form/content.css">
    <link rel="stylesheet" href="/assets/css/search_form/jquery.fancybox.css">

    <script type='text/javascript' src='/assets/js/search_form/jquery-2.2.4.min.js'></script>
    <script type='text/javascript' src='/assets/js/search_form/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='/assets/js/search_form/autosize.js'></script>
    <script type='text/javascript' src='/assets/js/search_form/jquery.dataTables.min.js'></script>
    <script type='text/javascript' src='/assets/js/search_form/jquery.fancybox.js'></script>


    <script type="text/javascript">
        jQuery(".fancybox3").fancybox({
            "width": 700,
            "height": 800
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2097811-11"></script>
    <!-- <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-2097811-11');
        </script> -->

</head>