<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <script src="js/fieldsControl.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>myStory</title>
</head>
<body>
<header class="header" id="header">
    <div class="container">
        <div class="nav">
            <img src="img/logo.jpeg" alt="myStory" class="logoimg">
            <h1>myStory</h1>
            <ul class="menu">
                <li>
                    <a href="index.php" id="home">Home</a>
                </li>
                <?php if (!isset($_SESSION['userId'])) : ?>
                <li>
                    <a href="register.php" id="register">Register</a>
                </li>
                <li>
                    <a href="login.php" id="signin">Log in</a>
                </li>
                <?php else : ?>
                <li>
                    <a href="logout.php" id="signin">Log out</a>
                </li>
                <li>
                    <a href="listofstories.php" id="stories">Stories</a>
                </li>
                <li>
                    <a href="storyform.php" id="profile">Create a story</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</header>