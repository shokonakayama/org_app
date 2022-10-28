# ピリカスクプオリジナルアプリ

## 概要

観光地検索、旅行歴記録、観光地の感想投稿をするアプリです。

<br>

## データベースとユーザーの作成

```sql

-- DBの作成
CREATE DATABASE IF NOT EXISTS sightseeing_db;

-- 作業ユーザーの作成とパスワードの設定
CREATE USER IF NOT EXISTS admin IDENTIFIED BY 'password';
GRANT ALL ON sightseeing_db.* TO admin;
```

<br>

### テーブルの作成

以下のコマンドを実行して、テーブルをセットアップします。

```bash
$ docker-compose exec app php db/db_setup.php
```
