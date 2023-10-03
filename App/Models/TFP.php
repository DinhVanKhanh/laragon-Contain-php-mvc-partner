<?php

namespace App\Models;


use PDO;
use \App\Models\User;
use \App\Models\Security;
use App\Controllers\Maintenance\LogController;

define("EXPIRED_LIMIT", "1 hour");

/**
 * Example user model
 *
 * PHP version 7.0
 */
// define("ERR_PTNLOGIN_01_01_01", "ERR_PTNLOGIN_01_01_01");
// define("ERR_PTNLOGIN_01_01_02", "ERR_PTNLOGIN_01_01_02");
// define("ERR_PTNLOGIN_01_01_03", "ERR_PTNLOGIN_01_01_03");
// define("ERR_PTNLOGIN_01_01_11", "ERR_PTNLOGIN_01_01_11");
// define("ERR_PTNLOGIN_01_01_12", "ERR_PTNLOGIN_01_01_12");
// define("ERR_PTNLOGIN_01_01_13", "ERR_PTNLOGIN_01_01_13");
// //STEP2
// define("ERR_PTNLOGIN_02_01_01", "ERR_PTNLOGIN_02_01_01");
// define("ERR_PTNLOGIN_02_01_02", "ERR_PTNLOGIN_02_01_02");
// define("ERR_PTNLOGIN_02_02_01", "ERR_PTNLOGIN_02_02_01");
// define("ERR_PTNLOGIN_02_02_02", "ERR_PTNLOGIN_02_02_02");
// define("ERR_PTNLOGIN_02_02_03", "ERR_PTNLOGIN_02_02_03");
// define("ERR_PTNLOGIN_03_01_01", "ERR_PTNLOGIN_03_01_01");
// define("ERR_PTNLOGIN_03_01_11", "ERR_PTNLOGIN_03_01_11");
class TFP extends \Core\Model
{

	/**
	 * Get all the users as an associative array
	 *
	 * @return array
	 */

	public static function GetAPIData($api, $json, $request)
	{
		$STFSApiAccessURI = $_ENV['STFS_API_ACCESS_URI'] ?? "http://192.168.3.213:80";
		$STFSApiAccessID = $_ENV['STFS_API_ACCESS_ID'] ?? "test_admin";
		$STFSApiAccessPW = $_ENV['STFS_API_ACCESS_PW'] ?? "test_pass";

		$port = (strpos($STFSApiAccessURI, ":") !== false) ? explode(":", $STFSApiAccessURI)[1] : "80";
		$port = (strpos($port, "/") !== false) ? explode("/", $STFSApiAccessURI)[0] : $port;

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_PORT => $port,
			CURLOPT_URL => $STFSApiAccessURI . "/api/" . $api,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => $request,
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_HTTPHEADER => array(
				"Accept: */*",
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"Host: " . str_replace(array("http://", "https://"), "", $STFSApiAccessURI),
				"X-Authorization: " . base64_encode($STFSApiAccessID . ":" . $STFSApiAccessPW)
			),
			"X-HTTP-Method-Override: " . $request
		));

		$response = json_decode(curl_exec($curl), true);
		$err = curl_error($curl);
		curl_close($curl);
		return ($err) ? "Error #:" . $err : $response;
	}

	public static function GetListByField($res, &$listData, $field, $parr = "")
	{
		if (($field == "error" || $field == "err_msg") &&
			$parr == "" && count($res) == 2 && $res["message"] != ""
		) {
			$listData[] = $res["message"];
			return;
		}
		if ($parr == $field) {
			foreach ($res as $val) {
				$listData[] = $val;
			}
			return;
		}
		foreach ($res as $key => $val) {
			if (is_array($val)) {
				$parr = ($key == "0") ? $parr : $key;
				TFP::GetListByField($val, $listData, $field, $parr);
			} elseif ($key == $field) {
				$listData[] = $val;
			}
		}
	}

	public static function GetFirstByField($res, $field, $parr = "")
	{
		if (($field == "error" || $field == "err_msg") &&
			$parr == "" && count($res) == 2 && $res["message"] != ""
		) {
			return $res["message"];
		}
		if ($parr == $field) {
			return $res;
		}
		foreach ($res as $key => $val) {
			if (is_array($val)) {
				$parr = ($key == "0") ? $parr : $key;
				$val = TFP::GetFirstByField($val, $field, $parr);
				if ($val != "") {
					return $val;
				}
			} elseif ($key == $field) {
				return $val;
			}
		}
		return "";
	}

	public static function GetSimpleField($API, $request, $where, $fields)
	{
		$isArray = (is_array($fields)) ? true : false;
		$str = ($isArray) ? implode(",", $fields) : $fields;
		$arr = (!$isArray && strpos($fields, ",") !== false) ? explode(",", str_replace(" ", "", $fields)) : $fields;
	//　↓↓　＜2020/11/12＞　＜KhanhDinh＞　＜修正＞
		$json = '{
                    "' . $API . '":{
                        "fields":"' . $str . '",
                        "query":"' . $where . '"
                    }' . (($API == "shin") ? ',"valid_fg" : "1" }' : '}');

	//　↑↑　＜2020/11/12＞　＜KhanhDinh＞　＜修正＞
		$res = TFP::GetAPIData($API, $json, $request);
		if ($isArray || is_array($arr)) {
			$ret = array();
			foreach ($arr as $val) {
				$ret[$val] = TFP::GetFirstByField($res, $val);
			}
			return $ret;
		}
		return TFP::GetFirstByField($res, $fields);
	}

	public static function json12($val_cd, $val_sub)
	{
		$json = "{
					'user_sub':{
						'data':[
							{'name':'user_cd','value':'{$val_cd}','operator':'='},
							{'name':'user_sub_cd','value':'{$val_sub}','operator':'in'}
							]
						}
				}";
		return $json;
	}

	public static function jsonNot12($val_cd, $val_sub)
	{
		$json = "{
					'user_sub':{
						'data':[
							{'name':'user_sub_val','value':'{$val_cd}','operator':'='},
							{'name':'user_sub_cd','value':'{$val_sub}','operator':'in'}
							]
						}
				}";
		return $json;
	}

	public static function jsonKy($val_cd, $val_ky)
	{
		$json = "{
					'ky':{
						'data':[
						{'name':'user_cd','value':'{$val_cd}','operator':'='},
						{'name':'ky_syu_kb','value':'{$val_ky}','operator':'in'}
						]
					},
					'ky_his':{
						'sort':'ky_his_ren desc'
					}
				}";
		return $json;
	}

	// ↓↓　<2022//> <KhanhDinh> <create json for instructor>
	public static function jsonInstructor($user_cd)
	{
		$json = "{
					'instructor':{
						'data':[{'name':'user_cd','value':'{$user_cd}','operator':'='}],
						'fields':'inst_no,inst_syu_kb,inst_syu_nm,tori_kb,del_fg'
					}
				}";
		return $json;
	}
	// ↑↑　<2022//> <KhanhDinh> <create json for instructor>

	public static function GetYMD($res, $field, $parr = "", &$count = 0, &$arr = [])
	{
		$tmp = "";
		if (($field == "error" || $field == "err_msg") &&
			$parr == "" && count($res) == 2 && $res["message"] != ""
		) {
			return $res["message"];
		}
		if ($parr == $field) {
			return $res;
		}
		foreach ($res as $key => $val) {
			if (is_array($val)) {
				$parr = ($key == "0") ? $parr : $key;
				$val = TFP::GetYMD($val, $field, $parr, $count, $arr);
				if ($val != "") {
					return $val;
				}
			} elseif ($key == "ky_his_syu_kb") {
				$tmp = $val;
			} elseif ($key == $field) {
				// print_r("key: " . $val);
				$arr[$val] = $tmp;
				$count += 1;
			}
		}
		return "";
	}
	// ↓↓　<2022/05/27> <KhanhDinh> <add feature procces id have 12 character>
	public static function proccessCheck12($id, $typePage, &$err)
	{
		$ValueUserSub = TFP::getValueUserSub($typePage); // return getValueUserSub
		$json_user_sub_val = TFP::jsonNot12($id, $ValueUserSub['value_not_12']);
		$user_sub_val = TFP::GetAPIData("user_sub", $json_user_sub_val, "GET");
		$count = (int)TFP::GetFirstByField($user_sub_val, "count");

		if ($count == 0) {
			$err = "error check 12";
			return false;
		}

		if ($count == 2) {
			$err = ERR_PTNLOGIN_02_01_03;
			return false;
		}
		return true;
	}
	// ↑↑　<2022/05/27> <KhanhDinh> <add feature procces id have 12 character>


	public static function proccessCheckNot12($id, $pass, $typePage, &$err)
	{
		$result = [];
		$ValueUserSub = TFP::getValueUserSub($typePage); // return getValueUserSub
		$lenId = strlen($id);

		$json_user_sub_val = TFP::jsonNot12($id, $ValueUserSub['value_not_12']);

		$user_sub_val = TFP::GetAPIData("user_sub", $json_user_sub_val, "GET");
		$count = (int)TFP::GetFirstByField($user_sub_val, "count");

		if ($count == 0) {
			$err = ERR_PTNLOGIN_02_02_01;
			return false;
		}

		if ($count == 2) {
			$err = ERR_PTNLOGIN_02_02_04;
			return false;
		}
		// die(ERR_PTNLOGIN_02_02_01);

		$result['user_cd'] = TFP::GetFirstByField($user_sub_val["user_sub"][0], "user_cd");
		$json_user_cd = TFP::json12($result['user_cd'], $ValueUserSub['value_12']);
		$user_sub = TFP::GetAPIData("user_sub", $json_user_cd, "GET");
		// //if empty user_sub => error pass
		// if(empty($user_sub))
		// 	return ERR_PTNLOGIN_02_02_01;

		//if not empty => get pass in TFP
		$user_sub_pass = TFP::GetFirstByField($user_sub["user_sub"][1], "user_sub_val");
		$result['idDelHyphen'] = TFP::GetFirstByField($user_sub["user_sub"][0], "user_sub_val"); // get id from TFP user_sub
		//
		$err = TFP::checkPass($user_sub_pass, $pass, $lenId);
		if (!empty($err))
			return false;

		return $result;
	}

	public static function proccessCheckKy($user_cd, $ky_syu_kb, &$err)
	{
		//STEP 3:
		$json_ky = TFP::jsonKy($user_cd, $ky_syu_kb);
		$ky = TFP::GetAPIData("ky", $json_ky, "GET");
		$count = (int)TFP::GetFirstByField($ky, "count");

		//if empty ky
		if ($count == 0) {
			$err = ERR_PTNLOGIN_03_01_01;
			return false;
			// die(ERR_PTNLOGIN_03_01_01);
		}

		$num = 0;
		$ky_his_syu_kb = "";
		$arr = [];
		TFP::GetYMD($ky, "ky_e_ymd", "", $num, $arr); // return $num and $arr
		$maxYMD = TFP::MaxYMD($arr, $ky_his_syu_kb);

		if (!in_array($ky_his_syu_kb, ["0", "1", "2", "3", "4", "5"])) {
			$err = ERR_PTNLOGIN_03_01_11;
			return false;
			// die(ERR_PTNLOGIN_03_01_11);
		}

		return $maxYMD;
	}

	public static function MaxYMD($arr, &$ky_his_syu_kb)
	{
		//find latest date
		foreach ($arr as $key => $value) {
			$arr2[strtotime($key)] = $value;
		}
		$max = max(array_keys($arr2));

		foreach ($arr2 as $key => $value) {
			if ($key == $max) {
				$ky_his_syu_kb = $value;
				break;
			}
		}
		// $ky_his_syu_kb = array_search($max, $arr2);
		$MaxYMD = date('Y-m-d H:i:s', $max);

		return $MaxYMD;
	}

	public static function checkPass($user_sub_pass, $pass, $lenId)
	{
		if (empty($user_sub_pass)) {
			$err = ($lenId == 12) ? ERR_PTNLOGIN_02_01_01 : ERR_PTNLOGIN_02_02_02;
			return $err;
			// die(ERR_PTNLOGIN_02_02_02);
		}
		//if pass in TFP difference pass user
		if ($user_sub_pass != $pass) {
			$err = ($lenId == 12) ? ERR_PTNLOGIN_02_01_02 : ERR_PTNLOGIN_02_02_03;
			return $err;
		}
		// die(ERR_PTNLOGIN_02_02_03);
		return "";
	}

	public static function validate($idDelHyphen, $pass)
	{
		$pattern1 = "/^\s*$/"; 			 			// check blank(empty)
		$pattern2 = "/^[0-9a-zA-Z]*$/";  			// check from 0-9 or a-z or A-Z
		$pattern3 = "/^(?:[0-9a-zA-Z]{3,13})$/";    // check 3<= x <=13
		$pattern4 = "/^(?:[0-9a-zA-Z]{4,13})$/";
		$pattern5 = "/-/";				 			// remove -

		// $idDelHyphen = preg_replace($pattern5, "", $id);
		// echo $idDelHyphen . "-" . $pass . '<br/>';
		//check id
		if (preg_match($pattern1, $idDelHyphen)) {
			$err = ERR_PTNLOGIN_01_01_01;
			return $err;
			// die(ERR_PTNLOGIN_01_01_01);
		}
		if (!preg_match($pattern2, $idDelHyphen)) {
			$err = ERR_PTNLOGIN_01_01_02;
			return $err;
			// die(ERR_PTNLOGIN_01_01_02);
		}
		if (!preg_match($pattern3, $idDelHyphen)) {
			$err = ERR_PTNLOGIN_01_01_03;
			return $err;
			// die(ERR_PTNLOGIN_01_01_03);
		}
		//check pass
		if (preg_match($pattern1, $pass)) {
			$err = ERR_PTNLOGIN_01_01_11;
			return $err;
			// die(ERR_PTNLOGIN_01_01_11);
		}
		if (!preg_match($pattern2, $pass)) {
			$err = ERR_PTNLOGIN_01_01_12;
			return $err;
			// die(ERR_PTNLOGIN_01_01_12);
		}
		if (!preg_match($pattern4, $pass)) {
			$err = ERR_PTNLOGIN_01_01_13;
			return $err;
			// die(ERR_PTNLOGIN_01_01_13);
		}
		return "";
	}

	public static function saveDB($tfp_ky_e_ymd, $user_cd, $partner_type, &$LoginID)
	{
		if (empty(session_id()))
			session_start();
		$IP = TFP::GetClientIP();
		$LoginID = md5($IP . @$_SERVER["REQUEST_TIME_FLOAT"] . random_int(10000, 99999));
		$timeLimit = date("Y-m-d H:i:s", strtotime('+' . EXPIRED_LIMIT));
		$crypt  = new Security();
		$encrypt_user_cd = TFP::EncryptData($user_cd);
		$sql = "INSERT INTO partner_login_session (`login-session-id`, `login-start-time`, `login-limit-time`, `encrypt_user_cd`, `tfp_ky_e_ymd`, `partner_type`, `ip_address`) VALUES('{$LoginID}', '" . date("Y-m-d H:i:s") . "', '" . $timeLimit . "', '{$encrypt_user_cd}', '{$tfp_ky_e_ymd}','{$partner_type}' ,'{$IP}')";
		$query = User::prepareQuery($sql);
		if ($query == false) {
			return ERR_PTNLOGIN_04_01_01;
		}
		$sql = "DELETE FROM partner_login_session WHERE `login-limit-time` < '" . date("Y-m-d H:i:s", strtotime('-5 minutes')) . "';";
		User::prepareQuery($sql);
	}

	public static function checkLoginSession($loginID)
	{
		$query = "SELECT * FROM partner_login_session WHERE `login-session-id` = '{$loginID}'";
		$stmt = User::getQuery($query, false, false);
		return $stmt;
	}

	public static function updateSession($LoginID)
	{
		$timeLimit = date("Y-m-d H:i:s", strtotime('+' . EXPIRED_LIMIT));
		// // $Conn = ConnectTouroku();
		$sql = "UPDATE partner_login_session 
				SET `login-limit-time` = '{$timeLimit}'
					WHERE `login-session-id` = '{$LoginID}'";
		$query = User::execQuery($sql);
	}

	public static function delSession($LoginID)
	{
		$sql = "DELETE FROM partner_login_session WHERE `login-session-id` = '{$LoginID}'";
		$query = User::prepareQuery($sql);
		// if ($query == false) {
		// 	return ERR_PTNLOGIN_04_01_01;
		// }
	}

	public static function saltinfo()
	{
		$filename = __DIR__ . "/../../../../common_files/salt.txt";
		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$tokenSecret = fread($myfile, filesize($filename));
		fclose($myfile);
		return hash_hmac('sha256', $tokenSecret, 'A really strong static key goes here!');
	}

	public static function EncryptData($data)
	{
		$crypt  = new Security();
		return $crypt->encrypt($data, TFP::saltinfo());
	}

	public static function DecryptData($data)
	{
		$crypt  = new Security();
		return $crypt->decrypt($data, TFP::saltinfo());
	}

	public static function GetClientIP()
	{
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipAddr = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_X_FORWARDED']))
			$ipAddr = $_SERVER['HTTP_X_FORWARDED'];
		else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipAddr = $_SERVER['HTTP_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_FORWARDED']))
			$ipAddr = $_SERVER['HTTP_FORWARDED'];
		else if (isset($_SERVER['REMOTE_ADDR']))
			$ipAddr = $_SERVER['REMOTE_ADDR'];
		else
			$ipAddr = 'UNKNOWN';
		return $ipAddr;
	}

	// Save array data into session
	public static function saveSession1($LoginID, $typePage, $id, $pass, $user_cd)
	{
		if (session_id() == "") {
			session_start();
		}
		// $_SESSION["user-ﬂag"] = $typePage;
		$_SESSION[strtoupper($typePage) . "-ID"] = $id;
		$_SESSION[strtoupper($typePage) . "-PASS"] = $pass;
		$_SESSION[$typePage]["user_cd"] = $user_cd;
		$_SESSION[$typePage]["user-ﬂag"] = $typePage;
		$_SESSION[$typePage]["login"] = $LoginID;
		$_SESSION[$typePage]["expire"] = time();
	}

	// Save array data into session
	public static function saveSession(array $arr)
	{
		if (session_id() == "") {
			session_start();
		}

		extract($arr);
		// $_SESSION["user-ﬂag"] = $typePage;
		$_SESSION[strtoupper($typePage) . "-ID"] = $idDelHyphen;
		$_SESSION[strtoupper($typePage) . "-PASS"] = $pass;
		$_SESSION[$typePage]["user_cd"] = $user_cd;
		$_SESSION[$typePage]["user-ﬂag"] = $typePage;
		$_SESSION[$typePage]["login"] = $LoginID;
		$_SESSION[$typePage]["instructor"] = $list_instructor;
		$_SESSION[$typePage]["expire"] = time();
	}

	public static function getInstructor($user_cd)
	{
		$list_instructor = [];
		$json_instructor = TFP::jsonInstructor($user_cd);
		$res = TFP::GetAPIData("instructor", $json_instructor, "GET");
		$count = (int)TFP::GetFirstByField($res, "count");
		if($count != 0){
			TFP::GetListByField($res,$list_instructor,"inst_syu_kb");
			$list_instructor = array_values(array_unique($list_instructor));
		}
		return $list_instructor;
	}

	public static function getValueUserSub($typePage)
	{
		$arr = [];
		switch ($typePage) {
			case 'saag':
				$arr['value_12'] = "201,202";
				$arr['value_not_12'] = "201";
				$arr['ky_syu_kb'] = "6";
				break;
			case 'sosp':
				$arr['value_12'] = "301,302";
				$arr['value_not_12'] = "301";
				$arr['ky_syu_kb'] = "7";
				break;
			case 'soup':
				$arr['value_12'] = "401,402";
				$arr['value_not_12'] = "401";
				$arr['ky_syu_kb'] = "8";
				break;
			default:
				break;
		}
		return $arr;
	}

	/**
	 * permission other users login
	 *
	 * @param $typePage saag|sosp|soup
	 * @param $idDelHyphen id remove -
	 * @param $pass password
	 * 
	 * @author Khanh
	 * @date 2022/05/26
	 * @return true|false
	 */
	public static function acceptLogin($typePage, $idDelHyphen, $pass)
	{
		if (empty(session_id()))
			session_start();
		// $LoginID = md5($IP . @$_SERVER["REQUEST_TIME_FLOAT"] . random_int(10000, 99999));
		$LoginID = "";
		$user_cd = $idDelHyphen;
		$maxYMD = '2099-12-31 23:59:59';
		$list_instructor = [];
		switch ($typePage) {
			case 'saag':
				if (($idDelHyphen == '10101010' && $pass == '1101') || ($idDelHyphen == '6684332880' && $pass == '6684332880')) {
					$err = TFP::saveDB($maxYMD, $user_cd, $typePage, $LoginID); // if error return $err
					if (!empty($err))
						return false;

					//save session
					$dataSession = compact("LoginID", "typePage", "idDelHyphen", "pass", "user_cd", "list_instructor");
					TFP::saveSession($dataSession);

					//save log
					// LogController::saveLog($typePage, $clickedLink, $action1, $action2);
					LogController::saveLogDB($typePage, "", "login", "", "");
					return true;
				}
				break;
			case 'sosp':
				if ($idDelHyphen == '10101010' && $pass == 'sp1101') {
					$err = TFP::saveDB($maxYMD, $user_cd, $typePage, $LoginID); // if error return $err
					if (!empty($err))
						return false;

					//save session
					$dataSession = compact("LoginID", "typePage", "idDelHyphen", "pass", "user_cd", "list_instructor");
					TFP::saveSession($dataSession);

					//save log
					// LogController::saveLog($typePage, $clickedLink, $action1, $action2);
					LogController::saveLogDB($typePage, "", "login", "", "");
					return true;
				}
				break;
			case 'soup':
				if ($idDelHyphen == '10101010' && $pass == 'up1101') {
					$err = TFP::saveDB($maxYMD, $user_cd, $typePage, $LoginID); // if error return $err
					if (!empty($err))
						return false;

					//save session
					$dataSession = compact("LoginID", "typePage", "idDelHyphen", "pass", "user_cd", "list_instructor");
					TFP::saveSession($dataSession);

					//save log
					// LogController::saveLog($typePage, $clickedLink, $action1, $action2);
					LogController::saveLogDB($typePage, "", "login", "", "");
					return true;
				}
				break;

			default:
				break;
		}
		return false;
	}
}