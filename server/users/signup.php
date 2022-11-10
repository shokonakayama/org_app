<?php
//関数ファイルを読み込む
require_once __DIR__ . '/../common/functions.php';

//変数の初期化
$email = '';
$nickname = '';
$password = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $nickname = filter_input(INPUT_POST, 'nickname');
    $password = filter_input(INPUT_POST, 'password');

    $errors = signup_validate($email, $nickname, $password);

    if (
        empty($errors) &&
        insert_user($email, $nickname, $password)
    ) {
        header('Location: login.php');
        exit;
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
        <div class="signup_content">

            <?php include_once __DIR__ . '/../common/_errors.php' ?>

            <form action="" class="signup_form" method="post">
                <input type="email" name="email" id="email" placeholder="メールアドレス（設定してください)" value="<?= h($email) ?>">
                <input type="password" name="password" id="password" placeholder="パスワード（設定してください)" value="<?= h($password) ?>">
                <input type="text" name="name" id="name" placeholder="ニックネーム（設定してください)">
                <div class="button_area">
                    <p><input type="submit" value="新規登録する✈︎" class="signup_button"></p>
                    <br>
                    <p><a href="login.php" class="signup_form_login_page_button">ログインはこちら✈︎</a></p>
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
