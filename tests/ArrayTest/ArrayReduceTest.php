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

class ArrayReduce extends \PHPUnit\Framework\TestCase
{
	public function testArrayReduce()
	{
		$res = array(
			"instructor" => array(
				array(
					"inst_no"     => 'SOI99996',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				array(
					"inst_no"     => 'SOI99999',
					"inst_syu_kb" => '1',
					"inst_syu_nm" => 'ＳＯＩ会計',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				),

				array(
					"inst_no"     => 'SOI99998',
					"inst_syu_kb" => '2',
					"inst_syu_nm" => 'ＳＯＩ給料',
					"tori_kb"     => '0',
					"del_fg"      => '0',
				)
			)
		);

		$i   = 0;
		$arr = $res["instructor"];
		$a   = array_reduce( $res["instructor"], function ($acc, $cur) use ($arr) {
			// $arr[0] = $cur;
			// $i++;
			$acc[] = $cur["inst_no"];
			return $acc;
			// return [...$acc, [$cur["inst_no"] => $cur]];
			// return $value["instructor"]["inst_syu_kb"];
		}, [] );

		$b = 123;

		$t = [];
		foreach ( $arr as $key => $value ) {
			$t["inst_no"][] = $value;
		}
		$b = 123;


		$map = [];
		$i   = 0;
		$map = array_map( function ($a) use ($i) {
			$a["sort_value"][ $i ] = $a["inst_syu_kb"] * 2;
			$a["uuuuu"][ $i ] = 9;
			$i++;
			return $a;
		}, $res["instructor"] );
		$b   = 123;

		$reduce2 = array_reduce( $res["instructor"], function ($acc, $cur) use ($i) {
			// $acc['sort_value'][$i] = $cur["inst_syu_kb"];
			// $acc['inst_no1'][$i] = $cur["inst_no"];
			// $i++;
			return [ ...$acc, $cur['inst_no'] => $cur["inst_syu_nm"] ];
			// return $acc;
			// return [...$acc, $cur['sort_value'][$i] = $cur["inst_syu_kb"], $i++];

		}, [] );
		$b       = 123;
	}
}
