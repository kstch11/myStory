<?php
require_once 'db.php';
require_once 'Story.php';

/**
 * Create new story
 */
if (isset($_POST["title"])) {
    $story = new Story();
    $story->setTitle($_POST["title"]);
    $story->setDescription($_POST["description"]);
    $story->setText($_POST['text']);
    persistStory($story);
    $_SESSION['title'] = $story->getTitle();
    $_SESSION['description'] = $story->getDescription();
    $_SESSION['text'] = $story->getText();
    unset($_POST["title"]);
    header("Location: listofstories.php");
}




/**
 * Persists new story to DB
 * Firstly, the story is being validated and stored into DB afterwards
 * @param Story $story - task object to be persisted
 */
function persistStory($story) {
    global $connection;

    $title = @htmlspecialchars($story->getTitle());
    $description = @htmlspecialchars($story->getDescription());
    $text = @htmlspecialchars($story->getText());
    if (strlen($title) > 100) {
        echo '<script>';
        echo 'alert("Title cannot be more than 100 chars!")';
        echo '</script>';
        echo "<script>window.location.href='storyform.php'</script>";
        exit ('Title cannot be more than 100 chars');
    }
    if (strlen($description) > 500) {
        echo '<script>';
        echo 'alert("Description cannot be more than 500 chars!")';
        echo '</script>';
        echo "<script>window.location.href='storyform.php'</script>";
        exit ('Description cannot be more than 500 chars');
    }
    if (strlen($text) > 10000) {
        echo '<script>';
        echo 'alert("Story cannot be more than 10000 chars!")';
        echo '</script>';
        echo "<script>window.location.href='storyform.php'</script>";
        exit ('Story cannot be more than 10000 chars');
    }
    if (strlen($title) == 0 || strlen($description) == 0 || strlen($text) == 0) {
        echo '<script>';
        echo 'alert("Fields cannot be empty!")';
        echo '</script>';
        echo "<script>window.location.href='storyform.php'</script>";
        exit ('Fields cannot be empty');
    }
    if ($connection != false) {
        $sqlQuery = "INSERT INTO stories (title, description, text) 
        VALUES ('".$title."', '".$description."', '".$text."')";
        $persistedQuery = mysqli_query($connection, $sqlQuery);
        if (!$persistedQuery) {
            echo '<script>';
            echo 'alert("Data cannot be processed right now. Try later!")';
            echo '</script>';
            echo "<script>window.location.href='storyform.php'</script>";
            exit('Data cannot be processed right now. Try later');
        }
    } else {
        exit('smth wrong');
    }
}


