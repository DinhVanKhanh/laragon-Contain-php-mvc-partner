<?php

namespace App;

require_once __DIR__ . '/../../../common_files/connect_db.php';
/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
	public $db_server_service_name;
	public $user_service_db;
	public $name_service_db;
	public $pass_service_db;
	public $db_server_partner_name;
	public $name_partner_db;
	public $user_partner_db;
	public $pass_partner_db;


	function __construct()
	{
		global $DB_SERVER_SERVICE_NAME, $NAME_SERVICE_DB, $USER_SERVICE_DB, $PASS_SERVICE_DB;
		global $DB_SERVER_PARTNER_NAME, $NAME_PARTNER_DB, $USER_PARTNER_DB, $PASS_PARTNER_DB;

		/////connect newsrelease
		$this->db_server_service_name = $DB_SERVER_SERVICE_NAME;
		$this->name_service_db = $NAME_SERVICE_DB;
		$this->user_service_db = $USER_SERVICE_DB;
		$this->pass_service_db = $PASS_SERVICE_DB;

		//////connect partner
		$this->db_server_partner_name = $DB_SERVER_PARTNER_NAME;
		$this->name_partner_db = $NAME_PARTNER_DB;
		$this->user_partner_db = $USER_PARTNER_DB;
		$this->pass_partner_db = $PASS_PARTNER_DB;
	}


	/**
	 * Database host
	 * @var string
	 */
	// const DB_HOST = '192.168.3.215';
	const DB_HOST = 'localhost';

	/**
	 * Database name
	 * @var string
	 */
	// const DB_NAME = 'service_db';
	const DB_NAME = 'partner_db';

	/**
	 * Database user
	 * @var string
	 */
	const DB_USER = 'root';

	/**
	 * Database password
	 * @var string
	 */
	// const DB_PASSWORD = 'Q3$4dfQPimji';
	const DB_PASSWORD = '';

	/**
	 * Show or hide error messages on screen
	 * @var boolean
	 */
	const SHOW_ERRORS = false;
}
