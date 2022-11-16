<?php
require_once __DIR__ . 'functions.php';

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
        <div class="content_title">
            <h2>体験談を投稿する✈︎✈︎</h2>
        </div>
        <div class="content_left">
            <form action="mypage.php tourist_information.php" method="post">
                <select name="prefectures">
                    <?php foreach ($prefectures as $prefecture) : ?>
                        <option value="<?= $prefecture['id'] ?>"><?= $prefecture['prefecture_name'] ?></option>
                        //<option value="都道府県選択">都道府県を選択してください</option>
                    <?php endforeach; ?>
                </select>
                <select name="cities"></select>
            </form>
        </div>
        <div class="content_right">
        </div>
        <div class="submit_button">
            <input type="submit" name="submit" value="この内容で送信✈︎">
        </div>
    </main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
    <script src="../js/app.js"></script>
</body>

</html>




<select name="prefectures">
    <?php foreach ($news_news as $news_new) : ?>
        <option value="<?= $news_new['id'] ?>"><?= $news_new['name'] ?></option>
    <?php endforeach; ?>
</select>

function find_news()
{
// データベースに接続
$dbh = connect_db();

/* タスク照会
---------------------------------------------*/
// done を抽出条件に指定してデータを取得
$sql = <<<EOM SELECT * FROM news EOM; // プリペアドステートメントの準備 $stmt=$dbh->prepare($sql);

    $stmt->execute();

    // 結果の取得
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
