<?php
/* Template Name: SAAG SEARCH */
// require_once __DIR__ . "/../template-partner/header/header-search.php";
require_once __DIR__ . "/../template/header/header-search.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	header("Location: /partner/shop/search/result/");
} else {
	require_once __DIR__ . "/form.php";
}
?>
