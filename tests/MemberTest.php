<?php
declare(strict_types=1);
$_SERVER['SERVER_ADDR'] = "::1";

use \App\Models\TFP;
use App\Controllers\Auth\LoginController;
use \Core\View;
use \App\Models\User;
use Core\Model;
use \App\Models\Security;
use \tests\DataFake;
use \tests\GetAPIAWSTest;
use \tests\ArrayTest\FindKeyArrayTest;

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

class MemberTest extends \PHPUnit\Framework\TestCase
{
    //function listKyno
	public function testListKyno()
	{
        //input data
        $user_cd = '100008243801';
        $ky_syu_kb = '6';

        //init
        $arrYMD = [];
		$num    = 0;

        $json_according_user_cd = '{
                    "ky":{
                    "data":[
                        {"name":"user_cd","value":"%s","operator":"="},
                        {"name":"ky_syu_kb","value":"%s","operator":"in"},
                    ],
                    "fields":"ky_no,ky_syu_kb",
                    },
                    "ky_his":{
                    "fields":"ky_no,ky_his_ren,ky_his_syu_kb,ky_e_ymd",
                    "sort":"ky_his_ren desc"
                    }
                }';
        $json_according_user_cd = sprintf($json_according_user_cd, $user_cd, $ky_syu_kb);
        $ky_according_user_cd = GetAPIAWSTest::getAPIDataAWS("ky", $json_according_user_cd, "GET");

		FindKeyArrayTest::GetYMDAccordingKyno($ky_according_user_cd, "ky_e_ymd", "", $num, $arrYMD, "ky_syu_kb"); // return $num and $arr
		$maxYMDAccordingKyno = FindKeyArrayTest::maxYMDAccordingKyno($arrYMD);
        $ky_no = reset($maxYMDAccordingKyno[$ky_syu_kb]);


        $json_according_ky_no = '{
                                    "ky":{
                                        "data":[
                                        {"name":"ky_no","value":"%s","operator":"="},
                                        ],
                                        "fields":"ky_no,user_cd,ky_syu_kb,ky_next_kb",
                                    },
                                    "ky_prod":{
                                        "fields":"ky_prod_no,prod_no,prod,sral"
                                    }
                                }';
        $json_according_ky_no = sprintf($json_according_ky_no, $ky_no);
		$ky_according_ky_no = GetAPIAWSTest::getAPIDataAWS("ky", $json_according_ky_no, "GET");

		// $isSSS  = $this->isSSS($maxYMD);
		/////
        



		$this->assertEquals(true, true);
	}
}
