<?php

$dbname = "kadyrsel";
$host = "localhost";
$username = "kadyrsel";
$password = "webove aplikace";
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die('Connection failed: ' .mysqli_connect_error());
}


/**
 * Register user
 * @param $username - user's username
 * @param $password - user's password
 * @param $passwordConfirm - password to confirm
 */
function register($username, $password, $passwordConfirm) {
    global $connection;
    /**
     * Prevent from XSS
     */
    $processedUsername = strip_tags(trim($username));
    if (strlen($processedUsername) < 5) {
        echo '<script>';
        echo 'alert("Username cannot be less than 5 symbols!")';
        echo '</script>';
        echo "<script>window.location.href='register.php'</script>";
        exit('Username cannot be less than 5 symbols');
    }
    if (strlen($password) < 6) {
        echo '<script>';
        echo 'alert("Password cannot be less than 6 symbols!")';
        echo '</script>';
        echo "<script>window.location.href='register.php'</script>";
        exit('Password cannot be less than 6 symbols');
    }
    $queryTest = "SELECT * FROM users WHERE username='$processedUsername'";
    $dbResultTest = mysqli_query($connection, $queryTest);
    $userTest = mysqli_fetch_array($dbResultTest);
    if ($userTest) {
        echo '<script>';
        echo 'alert("User already exists!")';
        echo '</script>';
        echo "<script>window.location.href='register.php'</script>";
        exit('User already exists');
    } else {
        if ($password === $passwordConfirm) {
            $processedPassword = password_hash(trim($password), PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, password) VALUES ('".$processedUsername."', '".$processedPassword."')";
            $persistedQuery = mysqli_query($connection, $query);
            if (!$persistedQuery) {
                echo '<script>';
                echo 'alert("User does not exist!")';
                echo '</script>';
//                exit('User does not exist');
            } else {
                echo "<script>window.location.href='login.php'</script>";
//                header("Location: ../login.php");
            }
        } else {
            echo '<script>';
            echo 'alert("Entered password dont matc!")';
            echo '</script>';
            echo "<script>window.location.href='register.php'</script>";
            exit('Entered password dont match');
        }

    }
}

/**
 * Log in user
 * @param $username - user's username
 * @param $password - user's password
 */
function login($username, $password) {
    global $connection;
    /**
     * Prevent from XSS
     */
    $processedUsername = strip_tags(trim($username));

    if (strlen($processedUsername) < 5) {
        echo '<script>';
        echo 'alert("Username cannot be less than 5 symbols!")';
        echo '</script>';
        echo "<script>window.location.href='login.php'</script>";
        exit ('Username cannot be less than 5 symbols');
    }
    if (strlen($password) < 6) {
        echo '<script>';
        echo 'alert("Password cannot be less than 6 symbols!")';
        echo '</script>';
        echo "<script>window.location.href='login.php'</script>";
        exit ('Password cannot be less than 6 symbols');
    }
    $query = "SELECT * FROM users WHERE username='$processedUsername'";
    $dbResult = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($dbResult);
    if ($user) {
        $passwordDb = $user["password"];
        if (isPasswordOk($password, $passwordDb)) {
            $_SESSION["userId"] = $user["userId"];
            $_SESSION["username"] = $user["username"];
            echo "<script>window.location.href='index.php'</script>";
//            header("Location: ../index.php");
        } else {
            echo '<script>';
            echo 'alert("Wrong credentials provided!")';
            echo '</script>';
            echo "<script>window.location.href='login.php'</script>";
            exit ('Wrong credentials provided');
        }
    } else {
        echo '<script>';
        echo 'alert("User does not exist!")';
        echo '</script>';
        echo "<script>window.location.href='login.php'</script>";
        exit ('User does not exist');
    }
}

/**
 * Checks if password is valid
 * @param $password - input password
 * @param $passwordDb - password from DB
 * @return bool - false if password is not correct, true otherwise
 */
function isPasswordOk($password, $passwordDb) {
    $ret = true;

    if (!isset($password)) {
        $ret = false;
    }
    else if (!password_verify($password, $passwordDb)) {
        $ret = false;
    }

    return $ret;
}

/**
 * Gets all stoties from DB
 * @return array - list of stories from DB
 */
function getAllStories($start, $limit) {
    global $connection;
    $sqlQuery = "SELECT * FROM stories LIMIT $limit OFFSET $start";
    $result = mysqli_query($connection, $sqlQuery);
    $stories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $stories;
}

/**
 * Returns story from DB found by id
 * @param $storyId - story id
 */
function getStoryById($storyId) {
    global $connection;
    $sqlQuery = "SELECT * FROM stories WHERE storyId='$storyId'";
    $result = mysqli_query($connection, $sqlQuery);
    $story = mysqli_fetch_assoc( $result);
    return $story;
}

function getNumberOfStoriesInDB() {
    global $connection;
    $sqlQuery = "SELECT count(storyId) AS storyId FROM stories";
    $result = mysqli_query($connection, $sqlQuery);
    $storyCount = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $storyCount[0]['storyId'];

}

