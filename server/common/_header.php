<header class="header wrapper">
    <h1>
        <a class="header_left" href="/server/users/index.php">
            旅ログ <i class="fa-solid fa-plane"></i>
        </a>
    </h1>
    <div class="header_right">
        <li class="header_nav_item"><a href="/server/information/search.php">観光地検索</a></li>
        <li class="header_nav_item"><a href="/server/map/map_register.php">旅行歴記録</a></li>
        <li class="header_nav_item"><a href="/server/experience/experience_upload.php">体験談投稿</a></li>
        <li class="header_nav_item"><a href="/server/users/mypage.php">マイページ</a></li>
        <li class="header_nav_item"><a href="/server/users/login.php">ログアウト</a></li>
    </div>
    <div class="header_right_side">
        <li class="header_nav_item">ログイン中<br>
        <?= $user['nickname'] ?>さん
        </li>
    </div>
</header>
