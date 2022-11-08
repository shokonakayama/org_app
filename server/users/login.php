<?php 
// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

//変数の初期化
$email = '';
$password = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $errors = login_validate($email, $password);
}
?>
<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>
<body>
    <header class="header wrapper">
        <h1>
            <div class="header_left">
                旅ログ
            </div>
            <i class="fa-solid fa-plane"></i>
        </h1>
    </header>
    <main class="main_content content_center wrapper"></main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
</body>
</html>
