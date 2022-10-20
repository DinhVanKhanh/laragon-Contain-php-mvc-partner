<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        $config = new Config();

        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . $config->db_server_partner_name . ';dbname=' . $config->name_partner_db . ';charset=utf8';
            $db = new PDO($dsn, $config->user_partner_db, $config->pass_partner_db);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }

    protected static function connectNewsRelease()
    {
        $config = new Config();

        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . $config->db_server_service_name . ';dbname=' . $config->name_service_db . ';charset=utf8';
            $db = new PDO($dsn, $config->user_service_db, $config->pass_service_db);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
