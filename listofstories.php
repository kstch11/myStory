<?php
session_start();
require_once 'db.php';
include 'header.php';
?>

<section>
    <?php
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $pageLimit = 5;
    $start = $pageLimit * ($page - 1);
    $storyCount = getNumberOfStoriesInDB();
    $maxPages = ceil($storyCount/$pageLimit);
    $stories = getAllStories($start, $pageLimit);
    ?>
    <?php foreach ($stories as $story) : ?>
    <div class="storylist">
        <div class="storylist-form">
            <h2 class="storylist-title"><?=$story['title'] ?></h2>
            <article><?=mb_substr($story['description'], 0, 200, 'UTF-8').'...' ?></article>
            <button class="button" id="read-button"><a href="storypage.php?storyId=<?=$story['storyId'] ?>" >Read</a></button>
        </div>
    </div>
    <?php endforeach;?>
    <div class="pagination-container">
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $maxPages; $i++) : ?>
                    <button class="page-item" id="pagination-button"><a class="page-link" href="listofstories.php?page=<?=$i?> "><?=$i?></a></button>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</section>
<footer></footer>
</body>
</html>
