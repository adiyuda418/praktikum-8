<?php
session_start();
require_once ("./includes/config.php");
require_once ("./includes/connect.php");
require_once ("./includes/classes.php");

// Catch GET to call page

if(empty($_GET['page'])) {
	$page = 'welcome';
} else {
	$page = $_GET['page'];
}

require_once ("./sources/".$page.".php");
?>