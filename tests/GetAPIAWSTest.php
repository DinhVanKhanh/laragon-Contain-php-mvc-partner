<?php
declare(strict_types=1);
namespace tests;
$_SERVER['SERVER_ADDR'] = "::1";

use \App\Models\TFP;
use App\Controllers\Auth\LoginController;
use \Core\View;
use \App\Models\User;
use Core\Model;
use \App\Models\Security;

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
require_once __DIR__ . "/../../../common_files/smtp_mail.php";

class GetAPIAWSTest extends \PHPUnit\Framework\TestCase
{
	public function testGetAPIAWS()
	{
		$json   = '{
					"req_his":{
						"data":[
							{"name":"req_his_cd","value":"300068876771","operator":"="},
						],
						"fields":"user_cd,users,req_his_cd,print_ymd,req_syu_kb,req_syu_nm,req_his_sumi_fg,req_his_sumi_nm,seikyu",
						"sort":"print_ymd desc",
					},
					"req_his_d":{
						"data":[
							{"name":"un_syu_kb","value":"1,2,3","operator":"in"}
						],
						"fields":"req_his_dno,un_syu_kb,un_syu_nm,hs_ymd,d_no,dm_no,ushin_cd,shin_nm,uri_tan,uri_su,hon_kin,zei_kin,zei_ritu"
					},
				}';
		$api    = "req_his";
		$method = "GET";
		$res    = GetAPIAWSTest::getAPIDataAWS($api, $json, $method);
		echo '<pre>';
		print_r($res);
	}
	public static function getAPIDataAWS($api, $json, $method)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL            => 'http://www.hp-sorizo.apn.mym.sorimachi.biz/TFP/test1.php',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST  => 'POST',
				CURLOPT_POSTFIELDS     => json_encode(
					array(
						'api'    => $api,
						'json'   => $json,
						'method' => $method,
					)
				),
				CURLOPT_CONNECTTIMEOUT => 0,
				CURLOPT_TIMEOUT        => 4000,
				CURLOPT_HTTPHEADER     => array(
					"Accept: */*",
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"X-HTTP-Method-Override: POST"
				)
			)
		);

		$response = curl_exec($curl);
		$response = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response);
		$response = json_decode($response, true);
		curl_close($curl);
		return $response;
	}
}