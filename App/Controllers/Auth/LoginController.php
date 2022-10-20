<?php

namespace App\Controllers\Auth;

use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;
use \App\Models\TFP;
use \App\Models\Security;
use App\Controllers\Maintenance\LogController;

//STEP1:
define("ERR_PTNLOGIN_01_01_01", "ERR_PTNLOGIN_01_01_01");
define("ERR_PTNLOGIN_01_01_02", "ERR_PTNLOGIN_01_01_02");
define("ERR_PTNLOGIN_01_01_03", "ERR_PTNLOGIN_01_01_03");
define("ERR_PTNLOGIN_01_01_11", "ERR_PTNLOGIN_01_01_11");
define("ERR_PTNLOGIN_01_01_12", "ERR_PTNLOGIN_01_01_12");
define("ERR_PTNLOGIN_01_01_13", "ERR_PTNLOGIN_01_01_13");
//STEP2
define("ERR_PTNLOGIN_02_01_01", "ERR_PTNLOGIN_02_01_01");
define("ERR_PTNLOGIN_02_01_02", "ERR_PTNLOGIN_02_01_02");
define("ERR_PTNLOGIN_02_01_03", "ERR_PTNLOGIN_02_01_03");
define("ERR_PTNLOGIN_02_02_01", "ERR_PTNLOGIN_02_02_01");
define("ERR_PTNLOGIN_02_02_02", "ERR_PTNLOGIN_02_02_02");
define("ERR_PTNLOGIN_02_02_03", "ERR_PTNLOGIN_02_02_03");
define("ERR_PTNLOGIN_02_02_04", "ERR_PTNLOGIN_02_02_04");
define("ERR_PTNLOGIN_03_01_01", "ERR_PTNLOGIN_03_01_01");
define("ERR_PTNLOGIN_03_01_11", "ERR_PTNLOGIN_03_01_11");

define("ERR_PTNLOGIN_04_01_01", "ERR_PTNLOGIN_04_01_01");


/**
 * Home controller
 *
 * PHP version 7.0
 */
class LoginController extends \Core\Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function loginAction()
	{
		$err = "";
		if (empty(session_id()))
			session_start();
		$typePage = @$_POST["typePage"];
		$id = @$_POST["id"];
		$pass = @$_POST["pass"];
		$template = "index";
		//check LoginID
		$LoginID = $_SESSION[$typePage]["login"] ?? "";
		if (!empty($LoginID))
			TFP::delSession($LoginID);
		//end check LoginID

		//regrex
		$idDelHyphen = preg_replace("/-/", "", $id);
		// ↓↓　<2022/05/27> <KhanhDinh> <accept user login>
		$accept = TFP::acceptLogin($typePage, $idDelHyphen, $pass);
		if ($accept) {
			echo "<script>location.href='"  . "/partner/" . $typePage . "/member/" . "'</script>";
			exit;
		}
		// ↑↑　<2022/05/27> <KhanhDinh> <accept user login>

		$err = TFP::validate($idDelHyphen, $pass);
		if (!empty($err))
			goto Error;
		//end regrex

		$lenId = strlen($idDelHyphen);
		$user_cd = "";
		$maxYMD = "";
		$ValueUserSub = TFP::getValueUserSub($typePage);
		// $json_user_cd = TFP::json12($idDelHyphen,"201,202");
		if ($lenId == 12) {
			//STEP 2:
			$json_user_cd = TFP::json12($idDelHyphen, $ValueUserSub["value_12"]);
			// die("json1");
			$user_sub = TFP::GetAPIData("user_sub", $json_user_cd, "GET");
			$count = (int)TFP::GetFirstByField($user_sub, "count");

			if ($count == 0) {
				$result = TFP::proccessCheckNot12($idDelHyphen, $pass, $typePage, $err);
				if (!empty($err))
					goto Error;

				$user_cd = $result["user_cd"]; // if error return $err
				$idDelHyphen = $result["idDelHyphen"]; // get id from TFP user_sub

				if (!empty($err))
					goto Error;
				$maxYMD = TFP::proccessCheckKy($user_cd, $ValueUserSub["ky_syu_kb"], $err); // if error return $err

				if (!empty($err))
					goto Error;
			} else { // when user_sub has data
				// ↓↓　<2022/04/27> <YenNhiTran> <process check for value_not_12>
				$user_sub_val_id = TFP::GetFirstByField($user_sub["user_sub"][0], "user_sub_val");
				$json_user_sub_id = TFP::jsonNot12($user_sub_val_id, $ValueUserSub["value_not_12"]);
				$res_user_sub_id = TFP::GetAPIData("user_sub", $json_user_sub_id, "GET");
				$count_user_sub =  (int)TFP::GetFirstByField($res_user_sub_id, "count");
				if ($count_user_sub != 1) {
					$err = ERR_PTNLOGIN_02_01_03;
					goto Error;
				}
				// ↑↑　<2022/04/27> <YenNhiTran> <process check for value_not_12>
				$user_sub_pass = TFP::GetFirstByField($user_sub["user_sub"][1], "user_sub_val");
				$err = TFP::checkPass($user_sub_pass, $pass, $lenId);
				if (!empty($err))
					goto Error;
				//STEP 3:
				$maxYMD = TFP::proccessCheckKy($idDelHyphen, $ValueUserSub["ky_syu_kb"], $err); // if error return $err
				if (!empty($err))
					goto Error;
				// $user_cd = $idDelHyphen;
				$user_cd = TFP::GetFirstByField($user_sub["user_sub"][0], "user_cd");
				$idDelHyphen = TFP::GetFirstByField($user_sub["user_sub"][0], "user_sub_val"); // get id from TFP user_sub
			}
		} else {
			$result = TFP::proccessCheckNot12($idDelHyphen, $pass, $typePage, $err);
			if (!empty($err))
				goto Error;

			$user_cd = $result["user_cd"]; // if error return $err
			$idDelHyphen = $result["idDelHyphen"]; // get id from TFP user_sub

			if (!empty($err))
				goto Error;
			$maxYMD = TFP::proccessCheckKy($user_cd, $ValueUserSub["ky_syu_kb"], $err); // if error return $err
			if (!empty($err))
				goto Error;
		}
		//STEP4:
		$err = TFP::saveSession($maxYMD, $user_cd, $typePage, $LoginID); // if error return $err
		if (!empty($err))
			goto Error;

		//save session
		TFP::saveData($LoginID, $typePage, $idDelHyphen, $pass, $user_cd);

		//save log
		// LogController::saveLog($typePage, $clickedLink, $action1, $action2);
		LogController::saveLogDB($typePage, "", "login", "", "");

		echo "<script>location.href='"  . "/partner/" . $typePage . "/member/" . "'</script>";
		exit;

		// header('Location:/' . $typePage . "/member/");
		Error:
		$_SESSION[$typePage]['classError'] = array('input' => 'style="margin-bottom:0px"', 'text' => '[' . $err . ']' . 'ログインでエラーが発生しました。会員IDとパスワードを再度ご確認ください。', 'expire' => time());
		echo "<script>location.href='"  . "/partner/" . $typePage . "'</script>";
		// header('Location:/' . $typePage);
		exit;
	}

	public function loginTFPAction()
	{
		if (empty(session_id()))
			session_start();
		$typePage = @$_POST["typePage"];
		$id = @$_POST["id"];
		$pass = @$_POST["pass"];
		$template = "index";



		$check = User::login($typePage, $id, $pass);
		if ($check >= 1) {
			$db = User::getData($typePage, $id, $pass);
			$_SESSION[strtoupper($typePage) . "-ID"] = $id;
			$_SESSION[strtoupper($typePage) . "-NAME"] = $db["{$typePage}_name"];
			$_SESSION[strtoupper($typePage) . "-PASS"] = $pass;
			$_SESSION[$typePage]["user-ﬂag"] = $typePage;
			$_SESSION[$typePage]["login"] = true;
			$_SESSION[$typePage]["expire"] = time();
			echo "<script>location.href='"  . "/partner/" . $typePage . "/member/" . "'</script>";
			exit;
			// header('Location:/' . $typePage . "/member/");
		} else {
			$_SESSION[$typePage]['classError'] = array('input' => 'style="margin-bottom:0px"', 'text' => 'ログインでエラーが発生しました。会員IDとパスワードを再度ご確認ください。');
			echo "<script>location.href='"  . "/partner/" . $typePage . "'</script>";
			// header('Location:/' . $typePage);
			exit;
		}
	}
}
