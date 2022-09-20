<?php

//if (isset($_SESSION['userId'])) {
//    header("Location: ../index.php");
//}
//else {
//    header("Location: ../login.php");
//}
session_start();
require '../db.php';
$username = $_POST["username"];
$password = $_POST["password"];
login($username, $password);
