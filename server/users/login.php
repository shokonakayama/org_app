<?php
// 関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

//セッション開始
session_start();

//変数の初期化
$email = '';
$password = '';

$errors = [];

//ログイン判定
if (isset($_SESSION['current_user'])) {
    header('Location: ../user/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $errors = login_validate($email, $password);

    if (empty($errors)) {
        $user = find_user_by_email($email);
        if (!empty($user) && password_verify($password, $user['password'])) {
            user_login($user);
        } else {
            $errors[] = MSG_EMAIL_PASSWORD_NOT_MATCH;
        }
    }
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

            <?php include_once __DIR__ . '/../common/_errors.php' ?>

            <form action="" class="login_form" method="post">
                <input type="email" name="email" id="email" placeholder="メールアドレス" value="<?= h($email) ?>">
                <input type="password" name="password" id="password" placeholder="パスワード">
                <div class="button_area">
                    <input type="submit" value="ログイン" class="index_page_button">
                    <br>
                    <a href="signup.php" class="login_content_signup_page_button">新規登録はこちら✈︎</a>
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
