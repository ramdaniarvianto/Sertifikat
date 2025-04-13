<?php 
require_once "helper.php";

session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: " . BASEURL . "/login");
exit;