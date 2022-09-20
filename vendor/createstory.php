<?php
session_start();
require_once '../db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$text = $_POST['text'];
createStory($title, $description, $text);
