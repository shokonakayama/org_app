<?php
require_once __DIR__ . '/../common/functions.php';

session_start();

$current_user = '';
$prefecture = '';
$prefecture_id = '';
$address_id = '';

?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <?php include_once __DIR__ . '/../common/_header.php' ?>
    <main id="main_content" class="main_content content_center wrapper">
    <?php  ?>
    </main>
        <footer>
            <?php include_once __DIR__ . '/../common/_footer.html' ?>
        </footer>
        <script src="../js/app.js"></script>
</body>

</html>
