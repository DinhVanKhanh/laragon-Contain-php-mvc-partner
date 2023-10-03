<?php
namespace tests\ArrayTest;

// declare(strict_types=1);
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
// require_once __DIR__ . "/../../../common_files/smtp_mail.php";

class FindKeyArrayTest extends \PHPUnit\Framework\TestCase
{
    	/**
	* Divide each category and stored in array when get API of (SAAG|SOSP|SOUP). Array include key = ky_e_ymd, value = ky_no
	*
	* @param array $res : array input
	* @param string $field : find field to push in array
	* @param int $count: count of elements array 
	* @param array $arr : results
	* @param string $type : find field to category. vd: ky_syu_kb = 6/7/8 => SAAG/SOSP/SOUP
	* 
	* @author Khanh
	* @return array param $arr and $count
	*/
	public static function GetYMDAccordingKyno($res, $field, $parr = "", &$count = 0, &$arr = [], $type = "ky_syu_kb") 
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
				$val  = FindKeyArrayTest::GetYMDAccordingKyno($val, $field, $parr, $count, $arr, $type);
				if ( $val != "" ) {
					return $val;
				}
			} elseif ( $key == $field ) {
				// print_r("key: " . $val);
				$arr[$type][$val] = $res["ky_no"];
				$count += 1;
			}
		}
	}

	
	/**
	* find max date in array of category (SAAG|SOSP|SOUP)
	*
	* @param array $arrYMD array of category getting from function GetYMDAccordingKyno()
	* 
	* @author Khanh
	* @return array array of category is max date
	*/ 
	public static function maxYMDAccordingKyno($arrYMD)
	{
		$arrMaxYMD = [];
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
}
