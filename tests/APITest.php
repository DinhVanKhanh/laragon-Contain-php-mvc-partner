<?php

// declare(strict_types=1);
$_SERVER['SERVER_ADDR'] = "::1";

use \App\Models\TFP;
use App\Controllers\Auth\LoginController;
use \Core\View;
use \App\Models\User;
use Core\Model;
use \App\Models\Security;
use LDAP\Result;

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

// define("ERR_PTNLOGIN_04_01_01", "ERR_PTNLOGIN_04_01_01");
// require_once __DIR__ . "/../../../common_files/smtp_mail.php";
require_once __DIR__ . "/../../../ChooseLink/guzzle/tests/AWSTest.php";
class APITest extends \PHPUnit\Framework\TestCase
{

	function testCheckUsersValue_sn_tl() {
		// $a = new AWSTest();
		// $a->testAPIAWS();
		$user_cd = "100000002101";
		$tel = "0258330000";
		if (strlen($user_cd) == 0 || strlen($tel) == 0) {
			return false;
		}
		$json = '{
					"users": {
						"data": [
							{
								"name": "user_cd",
								"value": "'. $user_cd .'",
								"operator": "="
							}
						],
						"fields":"tel1, tel2, tel3, user_cd"

					}
				}';
		$res = TFP::GetAPIData("users", $json, "GET");
		$count = (int) TFP::GetFirstByField($res, "count");

		if($count < 0){
			goto Err;
		}
		
		$user = $res["users"][0];
		// check $tel in user info
		$listTel = [$user['tel1'], $user['tel2'], $user['tel3']];
		$listTel_trimmed_hyphen = array_map(function($tel) {
			return str_replace('-', '', $tel);
		}, $listTel);
		
		$this->assertEquals(in_array($tel, $listTel_trimmed_hyphen), true);
		// return in_array($tel, $listTel_trimmed_hyphen);
		Err:
		die("error");
	}

	public function testReqHis()
	{
		$user_cd = '';
		$json    = $this->inputJson("req_his", "test");
		$req_his = TFP::GetAPIData("req_his", $json, "GET");
		if ( $req_his["count"] == 0 ) {
			goto Err;
		}

		Err:
		echo die("error");

	}
	public function testUsers()
	{
		// for AWS
		$user_cd = '200000143411';
		$tel     = '0748628548';

		// for SERVERTEST
		$user_cd = '100000002101';
		$tel     = '0258330000';
		$json    = $this->inputJson("users", "test");
		$users   = TFP::GetAPIData("users", $json, "GET");
		if ( $users["count"] == 0 && $users["users"]["tori_kb"] == 1 ) {
			goto Err;
		}
		Err:
		echo die("error");
	}



	public function testTypeMember()
	{
		$ky = array(
			"status"      => 0,
			"message"     => "",
			"ky"          => array(
				"0" => array(
					"ky_no"     => "206000003069",
					"user_cd"   => "100000002104",
					"ky_syu_kb" => "6",
					"ky_syu_nm" => "ＳＡＡＧ",
					"ky_his"    => array(
						"0" => array(
							"ky_e_ymd"      => "2022-08-31 00:00:00.000",
							"ky_his_syu_kb" => "7",
							"ky_his_syu_nm" => "解約",
						),

						"1" => array(
							"ky_e_ymd"      => "2021-08-31 00:00:00.000",
							"ky_his_syu_kb" => "1",
							"ky_his_syu_nm" => "新規（有料）",
						)

					)
				),

				"1" => array(
					"ky_no"     => "206000003076",
					"user_cd"   => "100000002104",
					"ky_syu_kb" => "6",
					"ky_syu_nm" => "ＳＡＡＧ",
					"ky_his"    => array(
						"0" => array(
							"ky_e_ymd"      => "2023-08-31 00:00:00.000",
							"ky_his_syu_kb" => "1",
							"ky_his_syu_nm" => "新規（有料）",
						)

					)

				),

				"2" => array(
					"ky_no"     => "207000000034",
					"user_cd"   => "100000002104",
					"ky_syu_kb" => "7",
					"ky_syu_nm" => "ＳＯＳＰ",
					"ky_his"    => array(
						"0" => array(
							"ky_e_ymd"      => "2023-08-31 00:00:00.000",
							"ky_his_syu_kb" => "4",
							"ky_his_syu_nm" => "更新（有料）",
						),

						"1" => array(
							"ky_e_ymd"      => "2022-08-31 00:00:00.000",
							"ky_his_syu_kb" => "4",
							"ky_his_syu_nm" => "更新（有料）",
						),

						"2" => array(
							"ky_e_ymd"      => "2021-08-31 00:00:00.000",
							"ky_his_syu_kb" => "1",
							"ky_his_syu_nm" => "新規（有料）",
						),

					)

				),

				"3" => array(
					"ky_no"     => "208000000160",
					"user_cd"   => "100000002104",
					"ky_syu_kb" => "8",
					"ky_syu_nm" => "ＳＯＵＰ",
					"ky_his"    => array(
						"0" => array(
							"ky_e_ymd"      => "2022-12-31 00:00:00.000",
							"ky_his_syu_kb" => "7",
							"ky_his_syu_nm" => "解約",
						),

						"1" => array(
							"ky_e_ymd"      => "2021-12-31 00:00:00.000",
							"ky_his_syu_kb" => "5",
							"ky_his_syu_nm" => "更新（無料）",
						),

						"2" => array(
							"ky_e_ymd"      => "2020-12-31 00:00:00.000",
							"ky_his_syu_kb" => "1",
							"ky_his_syu_nm" => "新規（有料）",
						)

					)

				)

			),

			"total_count" => 4,
			"count"       => 4
		);

		$ky1 =
			array(
				"status"      => 0,
				"message"     => "",
				"ky"          => array(
					"0" => array(
						"ky_no"         => "206000000226",
						"user_cd"       => "100000002116",
						"ky_syu_kb"     => "6",
						"ky_syu_nm"     => "ＳＡＡＧ",
						"kai_nm"        => "ソリマチＷＥＢテストパートナー予備３",
						"user_nm"       => "パートナー予備３　テスト",
						"ky_e_ymd"      => "2026-07-31 00:00:00.000",
						"ky_his_syu_kb" => "1",
						"ky_his"        => array(
							"0" => array(
								"ky_no"         => "206000000226",
								"ky_his_ren"    => "1",
								"ky_his_syu_kb" => "1",
								"ky_his_syu_nm" => "新規（有料）",
								"ky_e_ymd"      => "2020-07-31 00:00:00.000",
							)
						)
					),

					"1" => array(
						"ky_no"     => "206000000233",
						"user_cd"   => "100000002116",
						"ky_syu_kb" => "7",
						"ky_syu_nm" => "ＳＡＡＧ",
						"kai_nm"    => "ソリマチＷＥＢテストパートナー予備３",
						"user_nm"   => "パートナー予備３　テスト",
						"ky_his"    => array(
							"0" => array(
								"ky_no"         => "206000000233",
								"ky_his_ren"    => "2",
								"ky_his_syu_kb" => "7",
								"ky_his_syu_nm" => "解約",
								"ky_e_ymd"      => "2018-07-31 00:00:00.000",
							),
							"1" => array(
								"ky_no"         => "206000000233",
								"ky_his_ren"    => "1",
								"ky_his_syu_kb" => "7",
								"ky_his_syu_nm" => "解約",
								"ky_e_ymd"      => "2017-07-31 00:00:00.000",
							)
						)
					)
				),
				"total_count" => 2,
				"count"       => 2
			);

		// $json = $this->inputJson("ky", "test");
		// $ky = TFP::GetAPIData("ky", $json_ky, "GET");
		$arrYMD = [];
		$num    = 0;
		$this->GetYMD($ky1, "ky_e_ymd", "", $num, $arrYMD, "ky_syu_kb"); // return $num and $arr
		$maxYMD = $this->MaxYMD($arrYMD);
		$isSSS  = $this->isSSS($maxYMD);
		if ( $isSSS )
			goto Err;

		Err:
		die("err");
	}

    /**
     *
     *
     * @param array $res : array input
     * @param string $field : find field to push in array
     * @param string $parr
     * @param int $count : count of elements array
     * @param array $arr : results
     * @param string $type : find field to category. vd: ky_syu_kb = 6/7/8 => SAAG/SOSP/SOUP
     *
     * @return array|mixed|void|null
     * @author Khanh
     */
	function GetYMD($res, $field, $parr = "", &$count = 0, &$arr = [], $type = "ky_syu_kb")
	{
		if (
			($field == "error" || $field == "err_msg") &&
			$parr == "" && count($res) == 2 && $res["message"] != ""
		) {
			return $res["message"];
		}
		if ( $parr == $field ) {
			return $res;
		}
		foreach ( $res as $key => $val ) {
			if ( $key === $type ) {
				$type = $val;
			}
			if ( is_array($val) ) {
				$parr = ($key == "0") ? $parr : $key;
				$val  = $this->GetYMD($val, $field, $parr, $count, $arr, $type);
				if ( $val != "" ) {
					return $val;
				}
			} elseif ( $key == $field ) {
				// print_r("key: " . $val);
				$arr[$type][$val] = $res["ky_his_syu_kb"];
				$count += 1;
			}
		}
	}

	function GetYMDBK($res, $field, $parr = "", &$count = 0, &$arr = [])
	{
		$tmp = "";
		if (
			($field == "error" || $field == "err_msg") &&
			$parr == "" && count($res) == 2 && $res["message"] != ""
		) {
			return $res["message"];
		}
		if ( $parr == $field ) {
			return $res;
		}
		foreach ( $res as $key => $val ) {
			if ( is_array($val) ) {
				$parr = ($key == "0") ? $parr : $key;
				$val  = $this->GetYMDBK($val, $field, $parr, $count, $arr);
				if ( $val != "" ) {
					return $val;
				}
			} elseif ( $key == $field ) {
				// print_r("key: " . $val);
				$arr[$val] = $res["ky_his_syu_kb"];
				$count += 1;
			}
		}
		return "";
	}

	function MaxYMD($arrYMD)
	{
		foreach ( $arrYMD as $k => $arr ) {
			$maxYMD = "";
			foreach ( $arr as $key => $value ) {
				if ( strtotime($key) > strtotime($maxYMD) ) {
					$maxYMD = $key;
					$syu_kb = $value;
				}
			}
			$arrMaxYMD[$k][$maxYMD] = $syu_kb;
		}
		return $arrMaxYMD;
	}

	function MaxYMDBK($arrYMD)
	{
		//find latest date
		foreach ( $arrYMD as $k => $arr ) {
			foreach ( $arr as $key => $value ) {
				$arr2[$k][strtotime($key)] = $value;
			}
			$max = max(array_keys($arr2[$k]));

			foreach ( $arr2[$k] as $key => $value ) {
				if ( $key == $max ) {
					$MaxYMD[$k][date('Y-m-d H:i:s', $max)] = $value;
				}
			}
		}

		return $MaxYMD;
	}

	function isSSS($maxYMD)
	{
		foreach ( $maxYMD as $key => $value ) {
			if ( in_array(reset($value), [ 1, 2, 4, 5 ]) ) {
				return true;
			}
		}
		return false;
	}

	function inputJson($name, $server = "test"): string
	{
		$json = '';
		if ( $server == "aws" ) {
			switch ($name) {
				case "ky":
					$json = '
					{
						"ky":{
						  "data":[
							{"name":"user_cd","value":"100000002101","operator":"="},
							{"name":"ky_syu_kb","value":"6,7,8","operator":"in"},
						  ],
						  "fields":"ky_no,user_cd,ky_syu_kb,ky_syu_nm"
						},
						"ky_his":{
						  "fields":"ky_e_ymd,ky_his_syu_kb,ky_his_syu_nm",
						  "sort":"ky_his_ren desc"
						}
					  }		
					';
				case "req_his":
					$json = '
					{
						"req_his":{
							"data":[{"name":"user_cd","value":' . "100000002101" . ',"operator":"="}]
						},
						"req_his_d":{},
						"req_his_s":{}
					}
		';
				case "users":
					$json = '
					{
						"users": {
							"data": [
								{
									"name": "user_cd",
									"value": "' . "200000143411" . '",
									"operator": ">"
								},
								{
									"name":"tel1",
									"value":"' . "0748628548" . '",
									"operator":"="
								}
							]
						}
					}
					';
			}
		} else {
			switch ($name) {
				case "ky":
					$json = '
									{
										"ky":{
										"data":[
											{"name":"user_cd","value":"100000002104","operator":"="},
											{"name":"ky_syu_kb","value":"6,7,8","operator":"in"},
										],
										"fields":"ky_no,user_cd,ky_syu_kb,ky_syu_nm"
										},
										"ky_his":{
										"fields":"ky_e_ymd,ky_his_syu_kb,ky_his_syu_nm",
										"sort":"ky_his_ren desc"
										}
									}		
						';
				case "req_his":
					$json = '
									{
										"req_his":{
											"data":[{"name":"user_cd","value":' . "100000002104" . ',"operator":"="}]
										},
										"req_his_d":{},
										"req_his_s":{}
									}
						';
				case "users":
					$json = '
									{
										"users": {
											"data": [
												{
													"name": "user_cd",
													"value": "' . "100000002101" . '",
													"operator": "="
												},
												{
													"name":"tel1",
													"value":"' . "0258330000" . '",
													"operator":"="
												}
											]
										}
									}
						';
			}
		}
		return $json;
	}

}
// ↑↑　<2023/05/24> <KhanhDinh> <regrex insert - serial>
