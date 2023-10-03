<?php

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

class WriteLogTest extends \PHPUnit\Framework\TestCase
{
    public function testWriteLog()
	{
		try {
			$data       = [];
			$regex      = "/^\/faq\/?/i";
			$pathname   = $_POST["pathname"] ?? "";
			$key_search = $_POST["key_search"] ?? "";
			if ( !preg_match( $regex, $pathname ) ) {
				$result["flag"] = false;
				$result["err"]  = "This isn't folder faq";
				goto Result;
			}

			$subname  = explode( "/", $pathname )[2];
			$date     = date( "Y-m-d" );
			$time     = date( "H:i:s" );
			$ip       = TFP::GetClientIP();
			$LOG_FAQ  = __DIR__ . '/../../../../data/logs/bs_faqsearch/';
			$filename = "faq-search-word" . date( "_Y_m" ) . '.csv';

			file_put_contents( $LOG_FAQ . $filename, $date . "," . $time . "," . $subname . "," . $key_search . "," . $ip . PHP_EOL, FILE_APPEND | LOCK_EX );
			$result["flag"] = true;

		} catch (\Throwable $th) {
			$result["flag"] = false;
			$result["err"]  = "Unexpected error";
		}

		Result:
		echo json_encode( $result );
		die();
	}

	public function testWriteLog2()
	{
		try {
			$result   = [];
			$regex    = "/^\/faq\/?/i";
			$pathName = $_POST["pathName"] ?? "";

			// check pathName is folder faq
			if ( !preg_match( $regex, $pathName ) ) {
				$result["flag"] = false;
				$result["err"]  = "This isn't folder faq";
				goto Result;
			}

			$filePath  = __DIR__ . '/../../../../data/logs/bs_faqsearch/';
			$fileName  = "faq-search-word" . date( "_Y_m" ) . '.csv';
			$dirLog    = $filePath . $fileName;
			$subName   = explode( "/", $pathName )[2]; /* split pathName */
			$keySearch = $_POST["keySearch"] ?? "";
			$this->writeLogFaqSearch( $subName, $keySearch, $dirLog );
			$result["flag"] = true;
		} catch (\Throwable $th) {
			$result["flag"] = false;
			$result["err"]  = "Unexpected error";
		}

		Result:
		echo json_encode( $result );
		die();
	}

	function writeLogFaqSearch( $subName, $keySearch, $dir )
	{
		$date = date( "Y-m-d" );
		$time = date( "H:i:s" );
		$ip   = TFP::GetClientIP();
		file_put_contents( $dir, $date . "," . $time . "," . $subName . "," . $keySearch . "," . $ip . PHP_EOL, FILE_APPEND | LOCK_EX );
	}
}
