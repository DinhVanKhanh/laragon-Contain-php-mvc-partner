<?php

namespace App\Controllers\Maintenance;

date_default_timezone_set('Asia/Tokyo');

use \Core\View;
use \App\Models\User;
use Core\Model;
use PDO;
use App\Controllers\maintenance\MasterController;
use App\Models\TFP;

if (empty(session_id()))
	session_start();

define("LOG_PARTNER", './../../../../../../data/logs/partner/');
/**
 * Home controller
 *
 * PHP version 7.0
 */

class LogController extends \Core\Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		$action1 = @$_POST['action1'] ?? "View";
		$action2 = @$_POST['action2'];
		$clickedLink = @$_POST['clickedLink'];
		$typePage = @$_POST['typePage'];
		$processed = "";

		if (!isset($_SESSION["SOSP-ID"]) && !isset($_SESSION["SOUP-ID"]) && !isset($_SESSION["SAAG-ID"])) {
			return;
		}

		if (!empty($clickedLink) && preg_match('/:/', $clickedLink) != true) {
			$name = explode("/", $clickedLink);
			$processed = end($name); // get last value in array
			$processed = !empty($processed) ? $processed : $name[count($name) - 2];
			$processed = explode(".", $processed)[0];
		}

		//save log
		$saveLog = LogController::saveLog($typePage, $clickedLink, $action1, $action2);
		$saveLogDB = LogController::saveLogDB($typePage, $clickedLink, $processed, $action1, $action2);
		if (!$saveLog || !$saveLogDB)
			echo false;
		echo true;
		exit();
	}

	public static function saveLog($typePage = "", $clickedLink = "", $action1 = "", $action2 = "")
	{
		switch ($typePage) {
			case 'sosp':
				$id       = @$_SESSION["SOSP-ID"];
				$name     = @$_SESSION["SOSP-NAME"];
				$filename = "sosp_member_website_" . date("Y") . "_" . date("m") . ".txt";
				break;

			case 'soup':
				$id       = @$_SESSION["SOUP-ID"];
				$name     = @$_SESSION["SOUP-NAME"];
				$filename = "soup_member_website_" . date("Y") . "_" . date("m") . ".txt";
				break;

			default:
				$id       = @$_SESSION["SAAG-ID"];
				$name     = @$_SESSION["SAAG-NAME"];
				$filename = "saag_member_website_" . date("Y") . "_" . date("m") . ".txt";
				break;
		}

		try {
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$ip = TFP::GetClientIP();

			if ($action1 == "View") {
				file_put_contents(__DIR__ . LOG_PARTNER . $filename, $date . ", " . $time . ", " . $ip . ", " . $id . ", " . $name . ", View" . ", " . $action2 . PHP_EOL, FILE_APPEND | LOCK_EX);
			} elseif ($action1 == "Download") {
				file_put_contents(__DIR__ . LOG_PARTNER . $filename, $date . ", " . $time . ", " . $ip . ", " . $id . ", " . $name . ", " . $action1 . ", " . $action2 . PHP_EOL, FILE_APPEND | LOCK_EX);
			} elseif ($action1 == "Link" && strpos($clickedLink, "#") === false) {
				file_put_contents(__DIR__ . LOG_PARTNER . $filename, $date . ", " . $time . ", " . $ip . ", " . $id . ", " . $name . ", " . $action1 . ", " . $clickedLink . PHP_EOL, FILE_APPEND | LOCK_EX);
			}
		} catch (\Throwable $th) {
			return false;
		}
	}

	public static function saveLogDB($typePage = "", $clickedLink = "", $processed = "", $action1 = "", $action2 = "")
	{
		$IP = TFP::GetClientIP();
		if ($action1 == "Link" && strpos($clickedLink, "#") === false) {
			$action2 = $clickedLink;
		}

		$user_cd = @$_SESSION[$typePage]['user_cd'];
		$user_ﬂag = @$_SESSION[$typePage]["user-ﬂag"];
		$partner_id = @$_SESSION[strtoupper($user_ﬂag) . "-ID"];
		$sql = "INSERT INTO partner_users_log (`user_id`, `date`, `partner_type`, `processed`, `ip_address`, `partner_id`, `action1`, `action2`) 
				VALUES('{$user_cd}', '" . date("Y-m-d H:i:s") . "', '{$typePage}', '{$processed}', '{$IP}', '{$partner_id}', '{$action1}', \"{$action2}\")";
		$query = User::prepareQuery($sql);
		// $query = User::getQuery("SELECT * FROM partner_users_log",false,true);
		// echo '<pre>';
		// print_r($query);
		// echo '<pre>';
		// die();
		if ($query == false) {
			return false;
		}
	}
}
