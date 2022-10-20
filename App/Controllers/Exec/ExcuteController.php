<?php

namespace App\Controllers\Exec;
use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class ExcuteController extends \Core\Controller
{

	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function contact_formAction()
	{
		require_once __DIR__ . "/../../functions/contact_form.php";
		global $typePage;
		$name = @$_GET;
		if (empty($name)) {
			echo "<script>location.href='/partner/saag'</script>";
			exit();
		}

		$name = array_keys($name)[0];
		$name = explode("/", $name)[1];
		switch ($name) {
			case 'saag':
				$typePage = "saag";
				$id      = @$_POST["id"];
				$name    = @$_POST["fullname"];
				$email   = @$_POST["email"];
				$comment = @$_POST["comment"];
				$page    = @$_POST['page'];
				break;
			case 'sosp':
				$typePage = "sosp";
				$id      = @$_POST["id"];
				$syamei  = @$_POST["syamei"];
				$tant    = @$_POST["tant"];
				$email   = @$_POST["email"];
				$cat     = @$_POST["cat"];
				$comment = @$_POST["comment"];
				$page    = @$_POST['page'];
				break;
			case 'soup':
				$typePage = "soup";
				$id      = @$_POST["id"];
				$syamei  = @$_POST["syamei"];
				$tant    = @$_POST["tant"];
				$email   = @$_POST["email"];
				$comment = @$_POST["comment"];
				$page    = @$_POST['page'];
				break;
			case 'soi':
				$typePage = "soi";
				break;
			default:
				$typePage = "";
				break;
		}

		$template = "contact_form";


		// echo $name;
		if (@$_POST["act"] == "mail") {
			SendMail($typePage);
		}

		// // 入力チェック
		$Wk_emes = CheckInput($typePage);
		if ($Wk_emes != "") {
			error($typePage, $Wk_emes);
		}
		switch ($typePage) {
			case 'saag':
				View::render($typePage . '/contact_form.php', compact('name', 'typePage', 'template', 'id', 'email', 'comment', 'page'));
				break;
			case 'sosp':
				View::render($typePage . '/contact_form.php', compact('name', 'typePage', 'template', 'id', 'email', 'comment', 'page','syamei', 'tant', 'cat'));
				break;
			case 'soup':
				View::render($typePage . '/contact_form.php', compact('name', 'typePage', 'template', 'id', 'email', 'comment', 'page', 'syamei', 'tant'));
				break;
			
			default:
				# code...
				break;
		}
	}

	public function ordersp_formAction()
	{	
		require_once __DIR__ . "/../../functions/contact_form.php";
		
		$name = @$_GET;
		if (empty($name)) {
			echo "<script>location.href='/partner/saag'</script>";
			exit();
		}

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
				$typePage = "";
				break;
		}

		$template = "contact_form";
		///
		global $catalog;
		$id       = @$_POST["id"];
		$syamei   = @$_POST["syamei"];
		$tant     = @$_POST["tant"];
		$address1 = @$_POST["address1"];
		$address2 = @$_POST["address2"];
		$tel      = @$_POST["tel"];
		$email    = @$_POST["email"];
		$zip      = @$_POST["zip"];
		$page     = @$_POST['page'];

		// メール送信
		$catalog = array(
			"会計王／会計王 PRO" => 0,
			"給料王" => 0,
			"販売王" => 0,
			"顧客王" => 0,
			"みんなの青色申告" => 0,
			"訪問指導お助けパック　レスキュー王" => 0,
			"サポート＆サービスガイドブック＜王シリーズ＞" => 0,
			"サポート＆サービスガイドブック＜みんなのシリーズ＞" => 0,
			"ソリマチ専用帳票カタログ" => 0,
			"会計王 NPO法人スタイル" => 0,
			"「王シリーズ」総合カタログ" => 0,
			"会計王 介護事業所スタイル" => 0
		);
		$keys = array_keys($catalog);
		$numCatalog = count($catalog);
		for ($i = 1; $i <= $numCatalog; $i++) {
			$catalog[$keys[$i - 1]] = (@$_POST["c" . $i] == "") ? 0 : @$_POST["c" . $i];
		}
		if (@$_POST["act"] == "mail") {
			SendMail($typePage, $catalog);
		}

		// 入力チェック
		$Wk_emes = CheckInput($typePage, true);

		if ($Wk_emes != "") {
			error($typePage, $Wk_emes);
		}


		View::render($typePage . '/ordersp_form.php', compact('name', 'typePage', 'template', 'id', 'syamei', 'tant', 'address1', 'address2', 'tel', 'email', 'zip', 'page', 'catalog'));
	}

}
