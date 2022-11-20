<?php
require_once __DIR__ . '/../common/functions.php';

session_start();

$current_user = '';
$prefecture = '';
$prefecture_id = '';
$address_id = '';

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $prefecture_id = filter_input(INPUT_GET, 'prefecture_id');
    $addresses = find_addresses($prefecture_id);
}

$prefectures = find_prefectures();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $address_id = filter_input(INPUT_GET, 'address_id');
    $sightseeing_facilities = find_facilities($address_id);
}


?>

<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/../common/_head.html' ?>

<body>
    <?php include_once __DIR__ . '/../common/_header.php' ?>
    <main id="main_content" class="main_content content_center main_upload_content wrapper">
        <div class="upload_content_title">
            <p>　</p>
            <h2>体験談を投稿する✈︎✈︎</h2>
        </div>
        <div class="upload_content_left">
            <!-- 都道府県選択 -->
            <form action="" method="get">
                <select name="prefecture_id">
                    <option value="prefecture_select">都道府県を選択してください</option>
                    <?php foreach ($prefectures as $prefecture) : ?>
                        <option value="<?= $prefecture['id'] ?>" <?php if ($prefecture_id == $prefecture['id']) echo 'selected'; ?>>
                            <?= $prefecture['prefecture_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input type="submit" name="prefecture_submit" value="検索">
                <br>
                <select name="address_id">
                    <option value="city_select">市町村を選択してください</option>
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id'] ?>" <?php if ($address_id == $address['id']) echo 'selected'; ?>>
                            <?= $address['city_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input type="submit" name="city_submit" value="検索">
            </form>
            <select name="sightseeing_facility_id">
                <option value="facility_select">施設を選択してください</option>
                <?php foreach ($sightseeing_facilities as $sightseeing_facility) : ?>
                    <option value="<?= $sightseeing_facility['id'] ?>">
                        <?= $sightseeing_facility['facility_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <!-- 施設名追加入力 -->
            <form method="POST" action="">
                <textarea name="add_facility" cols="30" rows="10" placeholder="その他の施設名を入力してください（システム更新の際に追加します）"></textarea>
            </form>
            <!-- 旅行年月日 -->
            <form method="POST" action="">
                <input type="date" name="travel_date">
            </form>
            <!-- 評価 -->
            <tr>
                <th>評価</th>
                <td>
                    <input type="radio" name="radio" value="1" id="one" checked><label for="one">1</label>
                    <input type="radio" name="radio" value="2" id="two"><label for="two">2</label>
                    <input type="radio" name="radio" value="3" id="three"><label for="three">3</label>
                    <input type="radio" name="radio" value="4" id="four"><label for="four">4</label>
                    <input type="radio" name="radio" value="5" id="five"><label for="five">5</label>
                </td>
            </tr>
            <!-- 体験談入力 -->
            <form method="POST" action="">
                <textarea name="add_experience" cols="30" rows="10" placeholder="体験談を入力してください"></textarea>
            </form>
        </div>
        <div class="upload_content_right">
        </div>
        <div class="upload_content_under">
            <a href="/experience/done.php" class="upload_submit">この内容で送信✈︎</a>
            <p>　</p>
        </div>
    </main>
    <footer>
        <?php include_once __DIR__ . '/../common/_footer.html' ?>
    </footer>
    <script src="../js/app.js"></script>
</body>

</html>
