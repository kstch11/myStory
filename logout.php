<?php
/**
 * Delete user's data from session, so that user can log out
 */
session_start();
unset($_SESSION["userId"]);
unset($_SESSION["username"]);
header('Location: index.php');