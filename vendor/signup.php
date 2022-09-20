<?php
session_start();
require '../db.php';

$username = $_POST["username"];
$password = $_POST["password"];
$passwordConfirm = $_POST['password_confirm'];
register($username, $password, $passwordConfirm);
