<?php
if (empty(session_id())) {
    session_start();
}
error_reporting(0);
@$typePage; //show from controller
@$template; //show from controller

//import functions
require_once __DIR__ . "/../../../functions.php";
// if (!checkLogin($typePage) && $template != "index")
//     redirectHome("/" . $typePage . "/");
// ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">

    <!-- <link rel='stylesheet' id='wp-block-library-css' href='https://partner.sorimachi.co.jp/wp-includes/css/dist/block-library/style.min.css?ver=5.3.4' type='text/css' media='all' /> -->
    <link rel='stylesheet' id='wp-block-library-css' href='/assets/css/search_form/style.min.css' />
    <link rel="stylesheet" href="/assets/css/search_form/responsive.css">
    <link rel="stylesheet" href="/assets/css/search_form/content.css">

    <script type='text/javascript' src='/assets/js/search_form/jquery.js'></script>
    <script type='text/javascript' src='/assets/js/search_form/jquery-migrate.min.js'></script>
    <!-- <script type='text/javascript' src='https://www.googletagmanager.com/gtag/js?id=UA-2097811-10&#038;ver=5.3.4'></script> -->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2097811-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-2097811-11');
    </script>

</head>
<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>

