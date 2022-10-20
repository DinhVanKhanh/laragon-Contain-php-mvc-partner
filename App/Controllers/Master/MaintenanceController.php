<?php

namespace App\Controllers\Master;

use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class MaintenanceController extends \Core\Controller
{

	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function masterAction()
	{

		$db = @$_GET;
		$typePage = "master";
		$template = "index";
		$btnLogout = '';
		// $db = json_encode($db);

		if (isset($_POST['logout'])) {
			$_SESSION['isLogged'] = false;
			echo "<script type='text/javascript'>window.location.assign('/partner/maintenance/login-master.php');</script>";
			exit;
		}

		// ログインしているかチェック
		if (isset($_SESSION['isLogged'])) {
			if ($_SESSION['isLogged'] != true || $_SESSION['isLogged'] != 1) {
				echo "<script type='text/javascript'>window.location.assign('/partner/maintenance/login-master.php');</script>";
				exit;
			} else {
				$btnLogout = '<form action="" method="post"><input type="submit" class="buttonLog" value="ログアウト" name="logout"></form>';
			}
		} else {
			echo "<script type='text/javascript'>window.location.assign('/partner/maintenance/login-master.php');</script>";
			exit;
		}

		// タブ初期値
		$tabSaag = $tabSosp = $tabSoup = $tabMenu = "";
		if (isset($_SESSION['page'])) {
			$page = $_SESSION['page'];
			if (isset($_COOKIE['tabActive']) && $_COOKIE['tabActive'] != 'null') {
				$tabBox = $_COOKIE['tabActive'];
			} else {
				switch ($page) {
					case 'admin':
						$tabBox = 'tabSaag';
						break;
					case 'saag':
						$tabBox = 'tabSaag';
						$tabSosp = $tabSoup = $tabMenu = "style='display:none'";
						break;
					case 'sosp':
						$tabBox = 'tabSosp';
						$tabSaag = $tabSoup = $tabMenu = "style='display:none'";
						break;
					case 'soup':
						$tabBox = 'tabSoup';
						$tabSaag = $tabSosp = $tabMenu = "style='display:none'";
						break;
				}
			}
		}


		View::render('master/master.php', compact('db', 'typePage', 'template', 'page', 'tabBox', 'tabSaag', 'tabSosp', 'tabSoup', 'tabMenu', 'btnLogout'));
	}

	public function loginAction()
	{
		if (!empty($_SESSION['isLogged']) && $_SESSION['isLogged'] !== false) {
			echo "<script type='text/javascript'>window.location.replace('/partner/maintenance/master.php');</script>";
			die();
		}

		$errFormat = "%sを入力してください。 <script type='text/javascript'>jQuery(document).ready(function() { focus('%s'); });</script>";
		$errWarn = "<script type='text/javascript'>jQuery(document).ready(function() { focus('%s'); });</script>";
		$err = "";
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			require_once __DIR__ . '/../../functions/search_form.php';

			$Uid = @$_POST['txtUid'];
			$Upass = @$_POST['txtUpass'];

			// ログイン処理
			if (isset($_POST['wp-submit'])) {
				// 入力チェック
				if ($Uid == "") {
					$err = sprintf($errFormat, 'ユーザーID', 'ユーザーID');
					echo sprintf($errWarn, 'txtUid');
				} elseif ($Upass == "") {
					$err = sprintf($errFormat, 'パスワード', 'パスワード');
					echo sprintf($errWarn, 'txtUpass');
				}

				// 認証チェック
				$_SESSION['isLogged'] = false;
				if ($err == '') {
					// $conn = ConnectPartner();
					$Uid = preg_replace("/[&^%$#@?|!''= ’–]/", "", $Uid);
					$query = "SELECT * FROM userform WHERE userid = '{$Uid}' AND passwords = '" . md5($Upass) . "'";

					// $row = getRow($conn, $query);
					$row = User::getQuery($query, false, false);
					if ($row !== false) {
						$_SESSION['page'] = ($row['pro_id'] == 0) ? "admin" : (($row['pro_id'] == 1) ? "saag" : (($row['pro_id'] == 2) ? "sosp" : "soup"));
						$_SESSION['isLogged'] = true;
						WriteLog(date("Y-m-d") . ", " . date("H:i:s") . ", " . GetClientIP() . ", " . $Uid . ", " . $row["username"] . ", login, ok,");
						echo "<script type='text/javascript'>window.location.replace('/partner/maintenance/master.php');</script>";
						exit();
					} else {
						$err = 'ユーザーIDまたは パスワードに誤りがあります。';
						View::render('master/login-master.php', compact('Uid', 'Upass', 'err'));
						exit();
					}
				}
			}
		}
		View::render('master/login-master.php');
	}
}
