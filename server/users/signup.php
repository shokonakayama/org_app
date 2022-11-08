<?php 
require_once __DIR__ . '/../common/functions.php';

$email = '';
$password = '';
$nickname = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $nickname = filter_input(INPUT_POST, 'nickname');

    $errors = login_validate($email, $password, $nickname);
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
            <form action="" class="signup_form" method="post">
                <input type="email" name="email" id="email" placeholder="メールアドレス（設定してください）">
                <input type="password" name="password" id="password" placeholder="パスワード（設定してください）">
                <input type="text" name="name" id="name" placeholder="ニックネーム（設定してください）">
                <div class="button_area">
                    <a href="login.php" class="login_page_button">新規登録する✈︎</a>
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
