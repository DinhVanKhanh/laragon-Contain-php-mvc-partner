<?php

namespace App\Models;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class NewsRelease extends \Core\Model
{

	/**
	 * Get all the users as an associative array
	 *
	 * @return array
	 */
	public static function setPDONewsRelease($query)
	{
		return static::connectNewsRelease()->query($query);
	}

	public static function getAllNewsRelease($name)
	{
		$db = static::connectNewsRelease();
		$stmt = $db->query("SELECT * FROM id_{$name}");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	public static function getData($typePage, $Wk_id_c, $Wk_pass_c)
	{
		$db = static::connectNewsRelease();
		$query = "SELECT * FROM id_{$typePage} WHERE {$typePage}_id= :Wk_id_c AND passwords = :Wk_pass_c";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':Wk_id_c', $Wk_id_c, PDO::PARAM_STR);
		$stmt->bindParam(':Wk_pass_c', $Wk_pass_c, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function getQuery($query, $selectAll, $count)
	{
		$db = static::connectNewsRelease();

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
		$db = static::connectNewsRelease();
		$stmt = $db->prepare($query);
		return $stmt->execute();
	}

	public static function execQuery($query)
	{
		$db = static::connectNewsRelease();
		$stmt = $db->exec($query);
		return $stmt;
	}
}
