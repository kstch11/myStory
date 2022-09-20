<?php
session_start();
include 'header.php';
require_once 'db.php';
$storyId = $_GET['storyId'];
//if storyId is not numeric the script stops
if (!is_numeric($storyId)) {
    exit();
}
//getting story array
$story = getStoryById($storyId);
?>

<section>
    <div class="story-page">
        <div class="story-container">
            <h2 class="story-title"><?=$story['title'] ?></h2>
<!--            <h3>Author:</h3>-->
            <article><?=$story['text'] ?></article>
<!--            <div class="comment">-->
<!--                <textarea name="" id="" cols="30" rows="10"></textarea>-->
<!--            </div>-->
        </div>
    </div>
</section>
<footer></footer>
</body>
</html>
