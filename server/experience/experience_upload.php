<?php
require_once __DIR__ . '/../common/functions.php';

session_start();

$current_user = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}

$prefectures = find_prefecture_name();
$addresses = find_city_name();

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
                    <option value="都道府県選択">都道府県を選択してください</option>
                    <?php foreach ($prefectures as $prefecture) : ?>
                        <option value="<?= $prefecture['id'] ?>"><?= $prefecture['prefecture_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="cities">
                    <option value="市町村選択">市町村を選択してください</option>
                    <?php
                    $sql = 'SELECT * FROM city_name';

                    if ($addresses = $dbh->query($sql)) {

                        foreach ($addresses as $address) {
                            $addresses .= "<option value='" . $address['id'];
                            $addresses .= "'>" . $address['city_name'] . "</option>";
                        }
                    }
                    ?>
                    <form method="POST" action="'"></form>
                </select>
            </form>
        </div>
        <div class="content_right">
        </div>
        <div class="submit_button">
            <input type="submit" name="submit" value="この内容で投稿✈︎">
        </div>
    </main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
    <script src="../js/app.js"></script>
</body>

</html>
