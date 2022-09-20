<?php
session_start();
require 'db.php';
include 'header.php';
?>

<section>
    <?php if (isset($_SESSION['userId'])) : ?>
    <div class="story">
        <form onsubmit="return checkInputs()" action="storyservice.php" method="post" class="story-form">
            <h2 class="story-title">Title</h2>
            <div class="form-group">
                <input name="title" type="text" class="form-input" id="title" placeholder=" " value="<?php if (isset($_SESSION['title'])) echo $_SESSION['title'];?>" autofocus required>
                <label for="title" class="form-label" id="title-label">Title:</label>
            </div>
            <h2 class="story-description">Description</h2>
            <div class="form-group">
                <textarea name="description" class="form-input" id="description" placeholder=" " value="<?php if (isset($_SESSION['description'])) echo $_SESSION['description'];?>" required></textarea>
                <label for="description" class="form-label" id="title-label">Description:</label>
            </div>
            <h2 class="story-text">Text</h2>
            <div class="form-group">
                <textarea name="text" class="form-input" id="text" placeholder=" " value="<?php if (isset($_SESSION['text'])) echo $_SESSION['text'];?>" required></textarea>
                <!-- <input type="email" class="form-input" id="text" placeholder=" " required> -->
                <label for="text" class="form-label">Text:</label>
            </div>

            <button class="button" id="post-button">Post</button>
        </form>
    </div>
    <?php else : ?>
    <div class="div">
        <p>
            <script>
                alert('Log in before creating a story')
                window.location.href='login.php'
            </script>
            <?php
            exit('Log in before creating a story');
//            header("Location: 'login.php'");
            ?>
        </p>
    </div>
    <?php endif;?>
</section>
<footer></footer>
</body>
</html>
