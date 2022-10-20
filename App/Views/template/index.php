<?php
date_default_timezone_set('Asia/Tokyo');
if (empty(session_id())) {
	session_start();
}

define("SITE", $_SERVER['DOCUMENT_ROOT']);
define("__SERVER_NAME__", $_SERVER['SERVER_NAME'] . ":8383");
define("DIR", __DIR__);
define("URL_CURRENT", $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define("__EXWS_OCCTop__", "http://www.occ21.co.jp");
define("__EXWS_SBIBSTop__", "http://www.sbi-bs.co.jp/");
define("__EXWS_SBIBSKeihiBankIntro__", "http://www.sbi-bs.co.jp/01_01_03.html");
define("__EXWS_AdobeReaderDL__", "http://www.adobe.co.jp/products/acrobat/readstep2.html");

//solution
define("__EXWS_NDTatsuzinTop__", "https://www.tatsuzin.info/");
define("__EXWS_LetsTop__", "https://www.lets-co.com/");
//solution

define("__EXWS_SBIBSBCSeminarTop__", "https://www.bc-seminar.jp/");
define("__EXWS_SBIBSBCSeminarSAAGTop__", "https://www.bc-seminar.jp/form/saag");


//require_once __DIR__ . '/../../../../../common_files/connect_db.php';
global $SORIMACHI_HOME, $SORIMACHI_HOME_SSL;

// $SORIMACHI_HOME        = $SORIMACHI_HOME . "/";
// $SORIMACHI_HOME_SSL    = $SORIMACHI_HOME_SSL . "/";

$lang = [
	"ja" => "ja",
	"en" => "en",
	"vn" => "vn",
];

// require_once __DIR__ . "/libs/redirect.class.php";
// use Redirect\Redirect as Redirect;

// new Redirect('/sorizo/contents_list/content.php' );

?>
<!DOCTYPE html>
<html lang="<?= $lang['ja'] ?>">

<head>

	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex,nofollow">
		<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmgp.org/xfn/11" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel='stylesheet' id='sorimachi-fonts-css' href='https://fonts.googleapis.com/css?family=Libre+Franklin%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C800%2C800i&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
		<link rel='stylesheet' href='/assets/css/style.css' />
		<!-- <link rel="stylesheet" href="/assets/css/blue.css">
        <link rel="stylesheet" href="/assets/css/colors-dark.css">
        <link rel="stylesheet" href="/assets/css/general_req.css">
        <link rel="stylesheet" href="/assets/css/general.css">
        <link rel="stylesheet" href="/assets/css/ie8.css">
        <link rel="stylesheet" href="/assets/css/ie9.css">
        <link rel="stylesheet" href="/assets/css/list.css">
        <link rel="stylesheet" href="/assets/css/partner_sa.css">
        <link rel="stylesheet" href="/assets/css/partner.css"> -->

		<!-- <title>内容の確認をお願いします。</title> -->
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

		<script>
			/* <![CDATA[ */
			var sorimachiScreenReaderText = {
				"quote": "<svg class=\"icon icon-quote-right\" aria-hidden=\"true\" role=\"img\"> <use href=\"#icon-quote-right\" xlink:href=\"#icon-quote-right\"><\/use> <\/svg>"
			};
			/* ]]> */
		</script>
		<!-- <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?ver=5.3.8'></script> -->
		<script type='text/javascript' src='/assets/js/jquery-3.3.1.min.js'></script>
		<script type='text/javascript' src='/assets/js/partner.js'></script>
		<script type='text/javascript' src='/assets/js/customize-jquery.js'></script>
		<script type='text/javascript' src='/assets/js/customize-controls.js'></script>
		<script type='text/javascript' src='/assets/js/customize-preview.js'></script>
		<script type='text/javascript' src='/assets/js/general.js'></script>
		<script type='text/javascript' src='/assets/js/global.js'></script>
		<script type='text/javascript' src='/assets/js/html5.js'></script>
		<script type='text/javascript' src='/assets/js/jquery.scrollTo.js'></script>
		<script type='text/javascript' src='/assets/js/navigation.js'></script>
		<script type='text/javascript' src='/assets/js/skip-link-focus-fix.js'></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2097811-11"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', 'UA-2097811-11');

			//set log
			$(document).ready(function() {
				jQuery('a').click(function(e) {
					var download = $(this).attr("download");
					var status = (typeof download !== typeof undefined && download !== false) ? "Download" : "Link";
					var titleLink = $(this).text();
					var thisLink = $(this).attr("href");
					var typePage = '<?= $typePage ?>';
					jQuery.ajax({
						type: 'POST',
						dataType: "json",
						url: '/partner/log/',
						async: false,
						data: {
							'action1': status,
							'action2': titleLink,
							'clickedLink': thisLink,
							'typePage': typePage,
						},
						cache: false,
						success: function(data) {
							if (!data)
								console.log('error write log');
						}
					});
				});


				/////////////
				// jQuery('a').click(function(e, options) {
				// 	alert('1234');
				// 	options = options || {};
				// 	if (!options.lots_of_stuff_done) {
				// 		var download = $(this).attr("download");
				// 		var status = (typeof download !== typeof undefined && download !== false) ? "Download" : "Link";
				// 		var titleLink = $(this).text();
				// 		var thisLink = $(this).attr("href");
				// 		var typePage = '<?= $typePage ?>';
				// 		// console.log(status);
				// 		// return false;
				// 		jQuery.ajax({
				// 			type: 'POST',
				// 			dataType: "json",
				// 			url: '/partner/log/',
				// 			data: {
				// 				'action1': status,
				// 				'action2': titleLink,
				// 				'clickedLink': thisLink,
				// 				'typePage': typePage,
				// 			}
				// 		}).then(function() {
				// 			// retrigger the submit event with lots_of_stuff_done set to true
				// 			$(e.currentTarget).trigger('submit', {
				// 				'lots_of_stuff_done': true
				// 			});
				// 		});

				// 	} else {
				// 		return false;
				// 	}
				// });
			});
		</script>

	</head>

</head>

<body>
</body>

</html>