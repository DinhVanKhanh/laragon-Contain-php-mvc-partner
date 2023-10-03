<?php

use \App\Models\User;
use \App\Models\TFP;

function headerHomePage($typePage, $template)
{
	// $page = getDetailPage();
	// $typePage = $page["type"];
	// $template = $page["template"];

	$title = "[ お問合せ先 ] ソリマチパートナー事務局";
	$tel = "03-6773-7530";
	$fax = "03-6685-4470";
	//$tel = "03-3446-1311";
	//$fax = "03-5475-5339";

	$logo = "";
	switch ($typePage) {
		case "sosp":
			$logo = "/assets/images/year/2018/11/sosp_logo.jpg";
			$bg_color = "#0077eb";
			break;
		case "soup":
			$logo = "/assets/images/year/2018/11/soup_logo.jpg";
			$bg_color = "#f60";
			break;
		case "soi":
			$logo = "/assets/images/year/2018/11/soi_logo.jpg";
			$title = "ソリマチ認定インストラクター 公式WEBサイト";
			$bg_color = "#ffc400";
			break;
		case "saag":
			$logo = "/assets/images/year/2018/11/saag_logo.jpg";
			$bg_color = "#eb0000";
			break;
	}
?>
	<div class="logo-header">
		<h1><img class="logo" src="<?= $logo ?>" title="<?= strtoupper($typePage) ?>" alt='Logo <?= strtoupper($typePage) ?>' /></h1>
	</div>
	<div class="header-right">
		<div class="info pc" style="<?= "background-color:{$bg_color}" . (($typePage != 'soi') ? '' : '; color:#3b4336; margin-top:15px') ?>"><?= $title ?></div>
		<?php if (!empty($tel)) : ?>
			<div class="tel pc">
				<span><small>TEL: </small><b><?= $tel ?></b></span>
				<span><small>FAX: </small><b><?= $fax ?></b></span>
			</div>
		<?php endif; ?>
		<div class="btn-menu sp">
			<a class="icon sp" style="background-color:<?= ($typePage != 'soi') ? $bg_color : '#ffc300' ?>" href="tel:+<?= str_replace("-", "", $tel) ?>"><i class="fa fa-phone"></i></a>
			<button id="btn-menu" class="icon-menu sp" style="background-color:<?= ($typePage != 'soi') ? $bg_color : '#ffc300' ?>;">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</button>
		</div>
	</div>
<?php   }

function menuHomePage($typePage, $template)
{
	// $sidebar = "sidebar-menu-" . strtolower(trim($typePage));
	// dynamic_sidebar($sidebar);

	// if (!empty($_SESSION[strtoupper($typePage) . "-ID"])) {
	// 	dynamic_sidebar($sidebar . "-mobile");
	// }

}

function showDir()
{
	echo "DIR: " . __DIR__ . '<br/>';
	echo "ROOT: " . $_SERVER['DOCUMENT_ROOT'] . '<br/>';
	echo "SERVER_NAME: " . $_SERVER['SERVER_NAME'] . '<br/>';
}

function setBannerLogout($typePage, $template)
{
	// $page = getDetailPage();
	// $typePage = $page["type"];
	// $template = $page["template"];

	$background = "/assets/images/year/2018/11/main_bg_" . $typePage . ".jpg";
	$title = strtoupper($typePage);
	$paragrap = 'ソリマチ・コンサルティング・コーディネーター';
	switch ($typePage) {
		case "sosp":
			$paragrap = 'ソリマチ認定セールスパートナー';
			break;
		case "soup":
			$paragrap = 'ソリマチ認定ユースウェアパートナー';
			break;
		case "soi":
			$title = "SOIとは";
			$paragrap  = '<span style="font-weight:600"> 確かな技能と経験で信頼度アップ。</span><br>
                               <span style="font-weight:600"> ユースウェア業務をよりスムーズに。</span><br>
                               <span>ソリマチ認定インストラクター「SOI」制度はソリマチソフトに対する充分な知識とそれを運用する技能を取得していることを</span><br>
                               <span>ソリマチが認める資格認定制度です。</span>';
			break;
		case "saag":
			break;
	} ?>

	<div id="banner-logout" class="clear" style="background:url('<?= $background ?>') no-repeat center;<?php if ($typePage == 'soi') echo 'height:250px'; ?>">
		<div class="banner-logout">
			<div class="info-banner pc" <?php if ($typePage == 'soi') echo 'style="width:100%; display:block"'; ?>>
				<span class="title-banner<?php if ($typePage == 'soi') {
												echo ' soi';
											} ?>"><?= $title ?></span>
				<span class="title-banner<?php if ($typePage == 'soi') {
												echo ' soi';
											} ?>"><?= $paragrap ?></span>
			</div>
			<?php if ($typePage != 'soi') : ?>
				<div class="form-logout">
					<form method="post" action="/partner/logout/typePage/">
						<div style="margin-bottom:5px;"><span>現在会員サイトにログインされています</span></div>
						<div><input type="text" style="display: none;" name="typePage" value="<?= $typePage ?>"></div>
						<button type="submit" class="logout" name="logout">ログアウト</button>
					</form>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php   }
//exit

function setBannerAllPage($typePage, $template)
{
	switch ($template) {
		case 'index':
			setBannerLogin($typePage, $template);
			break;

		default:
			// checkSessionLogout($typePage, $template);
			setBannerLogout($typePage, $template);
			break;
	}
}

function checkSessionLogout($typePage, $template)
{
	// $page = getDetailPage();
	// $typePage = $page["type"];
	// $template = $page["template"];
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	$name = strtoupper($typePage);
	if (empty($_SESSION["{$name}-ID"]) && empty($_SESSION["{$name}-PASS"])) {
		echo "<script>location.href='"  . "/partner/" . $typePage . "'</script>";
		exit();
	}

	if (isset($_POST["logout"])) {
		unset($_SESSION["{$name}-ID"]);
		unset($_SESSION["{$name}-PASS"]);
		unset($_SESSION["{$name}-NAME"]);
		unset($_SESSION["user-ﬂag"]);
		echo "<script>location.href='" . "/partner/" . $typePage . "'</script>";
		exit();
	}
}

function setBannerLogin($typePage, $template)
{
	// $page = getDetailPage();
	// $typePage = $page["type"];
	// $template = $page["template"];
	$classError = array('input' => '', 'text' => '');
	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	if (
	// 		empty($_POST["id"]) && empty($_POST["pass"])
	// 		xor empty($_POST["id"])
	// 		xor empty($_POST["pass"])
	// 	) {
	// 		goto Error;
	// 	} else {
	// 		$Wk_id_c   = $_POST["id"];
	// 		$Wk_pass_c = $_POST["pass"];

	// 		// 認証チェック
	// 		$sql = "select * from id_{$typePage} where ({$typePage}_id='{$Wk_id_c}' OR {$typePage}_id_old1='{$Wk_id_c}') AND passwords='{$Wk_pass_c}'";
	// 		$conn = ConnectPartner();
	// 		$objRS = getRow($conn, $sql);
	// 		if ($objRS === false) {
	// 			goto Error;
	// 		} else {
	// 			$_SESSION[strtoupper($typePage) . "-ID"] = $objRS["{$typePage}_id"];
	// 			$_SESSION[strtoupper($typePage) . "-NAME"] = $objRS["{$typePage}_name"];
	// 			$_SESSION[strtoupper($typePage) . "-PASS"] = $Wk_pass_c;
	// 			$_SESSION["user-ﬂag"] = $typePage;
	// 			echo "<script>location.href='" . "/partner/" . $typePage . "/member/'</script>";
	// 			exit();
	// 		}
	// 	}
	// } else {
	// 	goto Login;
	// }

	// Error:
	// $classError = array('input' => 'style="margin-bottom:0px"', 'text' => 'ログインでエラーが発生しました。会員IDとパスワードを再度ご確認ください。');

	// Login:
	$paragrap = "";
	switch ($typePage) {
		case "sosp":
			$paragrap  = '<span style="color:white; margin:10px auto; line-height:200%; animation:0.25s linear change;">「SOSP」は、貴社とソリマチを結ぶ、</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.3s linear change;">セールスパートナーシップです。</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.35s linear change;">さまざまな特典をご用意し、充実した支援体制で</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.4s linear change;">SOSP加盟店様の販売活動をバックアップいたします。</span><br>';
			$paragrap .= '<span style="color:yellow; font-weight:bold; margin:20px auto; font-size:110%; line-height:150%; animation:0.45s linear change;"><br>2022年11月25日(金)よりログインIDとパスワードが変わりました。<br>新しいID・パスワードでログインをお願いいたします。</span><br>';
			break;
		case "soup":
			$paragrap  = '<span style="color:white; margin:10px auto; line-height:200%; animation:0.25s linear change;">ソリマチ認定ユースウェアパートナー制度「SOUP」。</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.3s linear change;">ソリマチ認定インストラクター制度「SOI」。</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.35s linear change;">ソリマチ独自の資格取得システムによる技能と信頼、</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:200%; animation:0.4s linear change;">顧客の問題解決が新しいビジネスチャンスを提供いたします。</span><br>';
			$paragrap .= '<span style="color:yellow; font-weight:bold; margin:20px auto; font-size:110%; line-height:150%; animation:0.45s linear change;"><br>2022年11月25日(金)よりログインIDとパスワードが変わりました。<br>新しいID・パスワードでログインをお願いいたします。</span><br>';
			break;
		case "saag":
			$paragrap  = '<span style="color:white; margin:10px auto; line-height:180%; animation:0.25s linear change;">時代の変革に対応する</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:180%; animation:0.3s linear change;">アクティブでアグレッシブな</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:180%; animation:0.35s linear change;">総合コンサルティング事務所をめざして。</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:180%; animation:0.4s linear change;">他の事務所のさらに一歩先を行く</span><br>';
			$paragrap .= '<span style="color:white; margin:10px auto; line-height:180%; animation:0.45s linear change;">SAAG会員事務所を、ソリマチは応援します。</span><br>';
			$paragrap .= '<span style="color:yellow; font-weight:bold; margin:20px auto; font-size:110%; line-height:150%; animation:0.45s linear change;"><br>2022年11月25日(金)よりログインIDとパスワードが変わりました。<br>新しいID・パスワードでログインをお願いいたします。</span><br>';
			break;
	}
	$background = "/assets/images/year/2018/11/main_bg_" . $typePage .  ".jpg";
	$title = strtoupper($typePage) . "とは";
	$login_title = strtoupper($typePage) . "会員ID"; ?>

	<div id="banner_partner" class="clear" style="background:url('<?= $background ?>'); background-position:center;">
		<div class="banner_contain">
			<div class="info_banner pc">
				<h1 class="title-banner">
					<?= $title ?>
				</h1>
				<?= $paragrap ?>
			</div>
			<div class="form_login">
				<form method="post" action="/partner/login/typePage/">
					<div>
						<h1 class="title-banner"><?= $login_title ?></h1>
					</div>
					<div><input type="text" name="id" id="id" placeholder="<?= strtoupper($typePage) ?>会員ID" value="<?= @$_POST["id"] ?>" maxlength="20"></div>
					<div><input <?= @$_SESSION[$typePage]['classError']['input'] ?>type="password" name="pass" id="pass" placeholder="パスワード" value="<?= @$_POST["pass"] ?>" maxlength="100"></div>
					<div style="color:#fff" class="errLogin"><?= @$_SESSION[$typePage]['classError']['text'] ?></div>
					<?php (time() > @$_SESSION[$typePage]['classError']['expire']) ? $_SESSION[$typePage]['classError'] = [] : ""; ?>
					<!-- thêm vào -->
					<div><input type="text" style="display: none;" name="typePage" value="<?= $typePage ?>"></div>
					<div><button class="login" name="login" type="submit">ログイン</button></div>
				</form>
			</div>
		</div>
	</div><?php

		}

		function checkLogin($typePage)
		{
			// $query = User::checkLoginSession($_SESSION[$typePage]["login"]);
			$loginID = $_SESSION[$typePage]["login"] ?? "";
			if (empty($loginID))
				return false;
			$pData = TFP::checkLoginSession($loginID);
			if (empty($pData))
				return false;
			if (time() > $_SESSION[$typePage]["expire"] + 3600) {
				TFP::delSession($loginID);
				// session_destroy();
				$_SESSION[$typePage] = [];
				unset($_SESSION[$typePage]);

				return false;
			}

			$_SESSION[$typePage]["classError"] = [];
			TFP::updateSession($loginID);
			return true;
		}

		function redirectHome($typePage)
		{
			echo "<script>location.href='" . $typePage . "'</script>";
		}

		function session()
		{
			echo '<pre>';
			print_r($_SESSION);
			echo '<pre>';
		}

		function getDataRSS($link)
		{
			$xml = simplexml_load_file($link) or die("Unable to load XML file.");
			$print = "";
			foreach ($xml->channel->item as $item) {
				$print .= "<div class='title-news clear'><div class='title-date-rss'>" . $item->seminardate . "</div>";
				$print .= "<div class='title-text-rss'><a href='" . $item->link . "' target='_blank'>" . $item->title . "&nbsp;[" . $item->halladdress . "]</a></div></div>";
			}
			return $print;
		}
