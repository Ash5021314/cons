<?php 
session_start();

unset($_SESSION["userName"]);

header("location: index.php");

//ini_set('display_errors','Off');
?>