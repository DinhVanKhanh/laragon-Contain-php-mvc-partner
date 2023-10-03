<?php
namespace tests;
// declare(strict_types=1);
$_SERVER['SERVER_ADDR'] = "::1";

use \tests\DataFake;
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

class InstructorTest extends \PHPUnit\Framework\TestCase
{
	public function testInstructor()
	{
		$user_cd = "100000002107";
		$res     = DataFake::resultAPIInstructor();
		$json_instructor = TFP::jsonInstructor( $user_cd );
		// $res = TFP::GetAPIData("instructor", $json_instructor, "GET");
		$count = (int) TFP::GetFirstByField( $res, "count" );
		// echo $count;
		if ( $count == 0 ) {
			return [];
		}
		TFP::GetListByField( $res, $list_instructor, "inst_syu_kb" );
		$list_instructor = array_values( array_unique( $list_instructor ) );
		echo '<pre>';
		print_r( $list_instructor );
		echo '<pre>';
		// $this->assertEquals(['1','2'], $list_instructor);
	}
}
// ↑↑　<2023/05/24> <KhanhDinh> <regrex insert - serial>