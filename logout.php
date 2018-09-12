<?php
include './db/config.php';
session_start();
$_SESSION = array();
//Destroy Session
session_destroy();
header("location: index.php");
?>
