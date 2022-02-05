<?php

// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
logincheck();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>運用情報登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select_user.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>参考ポートフォリオ記事登録</legend>
                <label>ポートフォリオ名：<input type="text" name="portfolio"></label><br>
                <label>作者：<input type="text" name="author"></label><br>
                <label>URL：<input type="text" name="URL"></label><br>
                参考になったポイント<br>
                <label><textArea name="content" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
