<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

	/**
	 * Get all the users as an associative array
	 *
	 * @return array
	 */
	public static function setPDO($query)
	{
		return static::getDB()->query($query);
	}

	public static function getAll($name)
	{
		$db = static::getDB();
		$stmt = $db->query("SELECT * FROM id_{$name}");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function login($typePage, $Wk_id_c, $Wk_pass_c)
	{
		$db = static::getDB();
		$query = "SELECT * FROM id_{$typePage} WHERE {$typePage}_id= :Wk_id_c AND passwords = :Wk_pass_c";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':Wk_id_c', $Wk_id_c, PDO::PARAM_STR);
		$stmt->bindParam(':Wk_pass_c', $Wk_pass_c, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->rowCount();
	}

	public static function getData($typePage, $Wk_id_c, $Wk_pass_c)
	{
		$db = static::getDB();
		$query = "SELECT * FROM id_{$typePage} WHERE {$typePage}_id= :Wk_id_c AND passwords = :Wk_pass_c";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':Wk_id_c', $Wk_id_c, PDO::PARAM_STR);
		$stmt->bindParam(':Wk_pass_c', $Wk_pass_c, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function checkLogin()
	{
		if (empty($_SESSION['login']))
			return false;
		return true;
	}

	public static function getQuery($query, $selectAll, $count)
	{
		//use for SELECT
		$db = static::getDB();
		$stmt = $db->prepare($query);
		$stmt->execute();

		if ($selectAll == true)
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($count == true) {
			return $stmt->rowCount();
		}

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function prepareQuery($query)
	{
		//use for INSERT/UPDATE/DELETE
		$db = static::getDB();
		$stmt = $db->prepare($query);
		return $stmt->execute();
	}

	public static function execQuery($query)
	{
		//use for INSERT/UPDATE/DELETE
		$db = static::getDB();
		$stmt = $db->exec($query);
		return $stmt;
	}

	public static function getColumn($query)
	{
		$db = static::getDB();
		$stmt = $db->prepare($query);
		$stmt->execute();
		return $stmt->columnCount();
	}
}
