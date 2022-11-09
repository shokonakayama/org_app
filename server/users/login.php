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
                旅ログ <i class="fa-solid fa-plane"></i>
            </div>
        </h1>
    </header>
    <main id="main_content" class="main_content content_center wrapper">
        <div class="login_content">
            <form action="" class="login_form" method="post">
                <input type="email" name="email" id="email" placeholder="メールアドレス">
                <input type="password" name="password" id="password" placeholder="パスワード">
                <div class="button_area">
                    <a href="index.php" class="index_page_button">ログイン✈︎</a>
                    <br>
                    <p><a href="signup.php" class="login_content_signup_page_button">新規登録はこちら✈︎</a></p>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
    <script src="../js/app.js"></script>
</body>

</html>
