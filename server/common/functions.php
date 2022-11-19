<?php
require_once __DIR__ . '/config.php';
//接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
//エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES:シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
// 新規ユーザー登録 バリデーション関数
function signup_validate($email, $password, $nickname)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    if (empty($nickname)) {
        $errors[] = MSG_NICKNAME_REQUIRED;
    }

    return $errors;
}

function insert_user($email, $password, $nickname)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        INSERT INTO
            users
            (email, password, nickname)
        VALUES
            (:email, :password, :nickname);
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $pw_hash, PDO::PARAM_STR);
        $stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);

        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

// ログイン バリデーション関数
function login_validate($email, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}

function find_user_by_email($email)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        users
    WHERE
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function user_login($user)
{
    $_SESSION['current_user']['id'] = $user['id'];
    $_SESSION['current_user']['nickname'] = $user['nickname'];
    header('Location: ../users/index.php');
    exit;
}

//DBよりプルダウンメニューの選択肢を引っ張ってくる
//都道府県名選択
function find_prefectures()
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        prefectures;
    EOM;

    $stmt = $dbh->prepare($sql);

    //プリペアドステートメントの準備
    $stmt->execute();
    //結果の取得
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//市町村名選択
function find_addresses($prefecture_id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        addresses
    EOM;

    if (!empty($prefecture_id)) {
        $sql .= 'WHERE prefecture_id = :prefecture_id';
    }

    $stmt = $dbh->prepare($sql);

    if (!empty($prefecture_id)) {
        $stmt->bindValue(':prefecture_id', $prefecture_id, PDO::PARAM_INT);
    }
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//施設名選択
function find_facilities($address_id)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        sightseeing_facilities
    EOM;

    if (!empty($address_id)) {
        $sql .= 'WHERE address_id = :address_id';
    }

    $stmt = $dbh->prepare(($sql));

    if (!empty($address_id)) {
        $stmt->bindValue(':address_id', $address_id, PDO::PARAM_INT);
    }
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
