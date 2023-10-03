<?php
namespace tests\MethodTest;

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

class StaticTest extends \PHPUnit\Framework\TestCase
{
    public function testMethodStatic()
	{
		// display_errorsをONに設定
		ini_set( 'display_errors', 1 );


		require_once __DIR__ . "/../../../../common_files/webserver_flg.php";
		require_once __DIR__ . "/../../../../common_files/IPAdress.php";
		require_once __DIR__ . "/../../../../common_files/japanese.php";
		require_once __DIR__ . "/../../../../common_files/lib/softdownload/common.php";
		global $DATAFILES_DIRECTORY;
		global $PRG_DOWNLOAD_SERVER;
		date_default_timezone_set( "Asia/Tokyo" );
		// メールアドレスが入っていなければ処理終了。
		$DLMailAddress = trim( $_POST["email"] ?? "hello" );
		if ( $DLMailAddress == "" ) {
			exit;
		}
		$DLMailAddress = strtolower( $DLMailAddress );
		$DLMailAddress = Japanese::strConv( $DLMailAddress, 8 );

		echo 1234;
	}
}
