<?php

namespace App\Controllers\Auth;

use \Core\View;
use \App\Models\User;
use \App\Models\TFP;
use Core\Model;
use PDO;
use App\Controllers\Maintenance\LogController;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class LogoutController extends \Core\Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function logoutAction()
	{
		if (empty(session_id()))
			session_start();
		$typePage = @$_POST['typePage'];
		// save log
		LogController::saveLogDB($typePage, "", "logout", "", "");

		TFP::delSession($_SESSION[$typePage]["login"]);
		// session_destroy();
		$_SESSION[$typePage] = [];
		unset($_SESSION[$typePage]);
		echo "<script>location.href='"  . "/partner/" . $typePage . "'</script>";
		exit;
	}
}
