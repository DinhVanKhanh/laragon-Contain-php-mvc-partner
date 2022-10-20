<?php

use App\Controllers\Maintenance\LogController;

@$typePage; //show from controller
@$template; //show from controller
@$namePage;
//import functions
require_once __DIR__ . "/../../../functions.php";
if (!checkLogin($typePage) && $template != "index" && $typePage != "soi")
	redirectHome("/partner/" . $typePage . "/");
else {
	/* save log */
	LogController::saveLog($typePage, $template, "View", $namePage);
	LogController::saveLogDB($typePage, "", $template, "View", $namePage);
}
?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2097811-11"></script>
<!-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-2097811-11');
</script> -->

<head>
	<title><?= @$namePage . " – Partner's Website – Sorimachi" ?></title>
</head>

<body>
	<a name="top_page"></a>
	<div id="container">
		<header class="brand clear">
			<?php headerHomePage($typePage, $template); ?>
		</header>

		<nav class="topnav clear" id="myTopnav">
			<?php
			/*  menuHomePage($typePage, $template); */
			if ($typePage == "saag")
				require_once __DIR__ . "/../nav/nav_saag.php";
			elseif ($typePage == "sosp")
				require_once __DIR__ . "/../nav/nav_sosp.php";
			elseif ($typePage == "soup")
				require_once __DIR__ . "/../nav/nav_soup.php";
			elseif ($typePage == "soi")
				require_once __DIR__ . "/../nav/nav_soi.php";

			?>
		</nav>

		<?php
		/* if ( is_page( 'maintenance' ) ) {
                echo "<script>location.href='" . __SITE__ . "/partner/maintenance/login-partner/'</script>";
                exit;
            }
            else  */ {
			if ($typePage == 'soi') {
				setBannerLogout($typePage, $template);
			} else {
				setBannerAllPage($typePage, $template);
			}
		}
		?>