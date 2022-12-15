<?php

namespace App\Controllers\Exec;

use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;
use \App\Models\TFP;
use App\Controllers\Maintenance\LogController;


/**
 * Home controller
 *
 * PHP version 7.0
 */
class RedirectController extends \Core\Controller
{

	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		$name = @$_GET;

		if (empty($name)) {
			echo "<script>location.href='/partner/saag'</script>";
			exit();
		}
		$strName = array_keys($name)[0];
		$pattern = "/partner\/?$/i";
		if (preg_match($pattern, $strName)) {
			echo "<script>location.href='" . "/partner/saag" . "/'</script>";
			exit();
		}
		$name = explode("/", $strName)[1];


		// $name = preg_replace('/_php/', '', $name);
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$namePage = "SAAG";
				break;
			case 'sosp':
				$typePage = "sosp";
				$namePage = "SOSP";

				break;
			case 'soup':
				$typePage = "soup";
				$namePage = "SOUP";

				break;
			case 'soi':
				$typePage = "soi";
				$namePage = "SOI";

				break;
			default:
				$typePage = "";
				break;
		}
		$template = "index";
		// echo '<pre>';
		// print_r(get_defined_vars());
		// echo '<pre>';
		// die();
		View::render($typePage . '/index.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function reqAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				echo "<script>location.href='https://member.sorimachi.co.jp/form/request_saag/'</script>";
				exit();
				break;
			case 'sosp':
				$typePage = "sosp";
				echo "<script>location.href='https://member.sorimachi.co.jp/form/request_sosp/'</script>";
				exit();
				break;
			case 'soup':
				$typePage = "soup";
				echo "<script>location.href='https://member.sorimachi.co.jp/form/request_soup/'</script>";
				exit();
				break;
			case 'soi':
				$typePage = "soi";
				echo "<script>location.href='https://member.sorimachi.co.jp/form/request_soup/'</script>";
				exit();
				break;
			default:
				break;
		}
		exit();
	}

	public function memberAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "member";
		$namePage = "トップページ";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/member.php', compact('name', 'typePage', 'template', 'namePage'));
	}

	public function newsAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "news";
		$namePage = "お知らせ";
		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/news.php', compact('name', 'typePage', 'template', 'namePage'));
	}

	public function downloadAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];

		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				View::render('/404.html');
				break;
		}
		$template = "download";
		$namePage = "各種ダウンロード";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/download.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function faqAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "faq";
		$namePage = "製品Ｑ＆Ａ";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/faq.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function solutionAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$namePage = "王シリーズ連動製品";

				break;
			case 'sosp':
				$typePage = "sosp";
				$namePage = "パートナーソリューション";

				break;
			case 'soup':
				$typePage = "soup";
				$namePage = "パートナーソリューション";

				break;
			case 'soi':
				$typePage = "soi";
				$namePage = "パートナーソリューション";

				break;
			default:
				break;
		}
		$template = "solution";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/solution.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function keihiAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "keihi-bank";
		$namePage = "経費Bankパートナー for SAAG";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/keihi-bank.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function seminarAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "seminar";
		$namePage = "ビジネスクラスセミナー for SAAG";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/bcseminar.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function magAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "mag";
		$namePage = "メールマガジン バックナンバー";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/mag.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function formAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$namePage = "「SAAG検索」情報登録・変更";
				break;
			case 'sosp':
				$typePage = "sosp";
				$namePage = "「SOSP検索」情報登録・変更";
				break;
			case 'soup':
				$typePage = "soup";
				$namePage = "「SOUP検索」情報登録・変更";
				break;
			case 'soi':
				$typePage = "soi";
				$namePage = "「SOI検索」情報登録・変更";
				break;
			default:
				break;
		}
		$template = "form";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/form.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function contactAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$namePage = "お問い合わせフォーム";
				break;
			case 'sosp':
				$typePage = "sosp";
				$namePage = "ご意見・ご要望フォーム";
				break;
			case 'soup':
				$typePage = "soup";
				$namePage = "ご意見・ご要望フォーム";
				break;
			case 'soi':
				$typePage = "soi";
				$namePage = "お問い合わせフォーム";
				break;
			default:
				break;
		}
		$template = "contact";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/contact.php', compact('name', 'typePage', 'template', 'namePage'));
	}
	public function contact_formAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				break;
			case 'sosp':
				$typePage = "sosp";
				break;
			case 'soup':
				$typePage = "soup";
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				break;
		}
		$template = "contact_form";
		///
		$id = $_POST["id"];
		$email = $_POST["email"];
		$comment = $_POST["comment"];
		$page = $_POST["page"];

		View::render($typePage . '/contact_form.php', compact('name', 'typePage', 'template', 'id', 'email', 'comment', 'page'));
	}
	public function searchAction()
	{
		$name = @$_GET;
		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$namePage = "SAAG検索";
				break;
			case 'sosp':
				$typePage = "sosp";
				$namePage = "SOSP検索";
				break;
			case 'soup':
				$typePage = "soup";
				$namePage = "SOUP検索";
				break;
			case 'soi':
				$typePage = "soi";
				$namePage = "SOI検索";
				break;
        // ↓↓ <2022/06/07> <YenNhi>: redirect to shop search
			case 'shop':
				$typePage = "shop";
				$namePage = "ソリマチ製品取り扱い店舗検索｜ソリマチ株式会社";
				break;
			// ↑↑ <2022/06/07> <YenNhi>: redirect to shop search
			default:
				break;
		}
		$template = "search";
		// $user_flag = @$_SESSION["user-ﬂag"] ?? $typePage;
		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/search.php', compact('name', 'typePage', 'template', 'namePage'));
	}

	//SOI
	public function scheduleAction()
	{
		$typePage = "soi";
		$template = "schedule";
		$namePage = "認定試験・セミナー情報";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/schedule.php', compact('typePage', 'template', 'namePage'));
	}

	public function stepAction()
	{

		$typePage = "soi";
		$template = "step";
		$namePage = "お申込から認定まで";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render($typePage . '/step.php', compact('typePage', 'template', 'namePage'));
	}

	public function policyAction()
	{
		View::render('policy/index.php');
	}

	public function checkAssets($id = null)
	{
		echo '<pre>';
		print_r(get_defined_vars());
		print_r(@$_GET);
		print_r(@$id);
		print_r(@$_POST);
		print_r(@$_REQUEST);
		// print_r($_SERVER);
		echo '<pre>';
		die();
	}

	public function orderspAction()
	{
		$typePage = "sosp";
		$template = "ordersp";
		$namePage = "販促物請求フォーム";

		/* save log */
		//LogController::saveLog($typePage, $template, "View", $namePage);
		//LogController::saveLogDB($typePage, "", $template, "View", $namePage);

		View::render('sosp/ordersp.php', compact('typePage', 'template', 'namePage'));
	}
	
	// ↓↓　<2022/11/18> <KhanhDinh> <add menu saag/member/about.php>
	public function aboutAction()
	{
		$typePage = "saag";
		$template = "about";
		$namePage = "SAAG会員サイトの使い方";
		View::render($typePage . '/about.php', compact('typePage', 'template', 'namePage'));
		
	}
	// ↑↑　<2022/11/18> <KhanhDinh> <add menu saag/member/about.php>
}
