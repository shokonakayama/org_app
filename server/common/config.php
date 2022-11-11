<?php
//接続に必要な情報を定数として定義
define('DSN', 'mysql:host=db;dbname=sightseeing_db;charset=utf8');
define('USER', 'admin');
define('PASSWORD', 'password');

define('MSG_EMAIL_REQUIRED', 'メールアドレスを入力してください');
define('MSG_NICKNAME_REQUIRED', 'ニックネームを入力してください');
define('MSG_PASSWORD_REQUIRED', 'パスワードを入力してください');
define('MSG_EMAIL_PASSWORD_NOT_MATCH', 'メールアドレスかパスワードが<br>間違っています');
