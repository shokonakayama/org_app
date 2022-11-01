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
function signup_validate($email, $name, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($name)) {
        $errors[] = MSG_NAME_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}
// ログイン バリデーション関数
function login_validate($email, $password) {
    $errors = [];

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}
