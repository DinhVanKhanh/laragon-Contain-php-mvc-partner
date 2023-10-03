<?php
namespace tests;

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
require_once __DIR__ . "/../../../common_files/smtp_mail.php";

class DataFake extends \PHPUnit\Framework\TestCase
{
    public static function resultAPIInstructor(){
        $res     = array(
			"status"      => 0,
			"message"     => '',
			"instructor"  => array(
				"0" => array(
					"inst_no"     => 'SOI99996',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				"1" => array(
					"inst_no"     => 'SOI99999',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				"2" => array(
					"inst_no"     => 'SOI99998',
					"inst_syu_kb" => '2',
					"inst_syu_nm" => 'ＳＯＩ給料',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				)
			),

			"total_count" => 4,
			"count"       => 4
		);

        return $res;
	}

    public static function resultAPIPartnerMemberKy(){
        $res     = array(
			"status"      => 0,
			"message"     => '',
			"instructor"  => array(
				"0" => array(
					"inst_no"     => 'SOI99996',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				"1" => array(
					"inst_no"     => 'SOI99999',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				"2" => array(
					"inst_no"     => 'SOI99998',
					"inst_syu_kb" => '2',
					"inst_syu_nm" => 'ＳＯＩ給料',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				)
			),

			"total_count" => 4,
			"count"       => 4
		);

        return $res;
	}
}
