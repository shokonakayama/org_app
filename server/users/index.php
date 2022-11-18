<?php

// セッション開始
session_start();

$current_user = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <?php include_once __DIR__ . '/../common/_header.php' ?>
    <main id="main_content" class="main_content content_center wrapper">
        <div class="index_content">
            <a href="/information/search.php" class="index_content_search_page_button">観光地検索✈︎</a>
            <a href="/map/map_register.php" class="index_content_register_page_button">旅行歴記録</a>
            <a href="/experience/experience_upload.php" class="index_content_experience_upload.php">体験談投稿</a>
        </div>
    </main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
    <script src="../js/app.js"></script>
</body>

</html>
