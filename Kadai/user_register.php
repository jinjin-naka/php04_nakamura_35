<?php

// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
kanricheck();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index_kanri.php">データ登録</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select_kanri.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="user_register.php">ユーザー登録</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="user_insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="text" name="lpw"></label><br>
                <label>管理者：<input type="hidden" name="kanri_flg" value="0"><input type="checkbox" name="kanri_flg" value="1"></label><br>
                <label>退職者：<input type="hidden" name="life_flg" value="0"><input type="checkbox" name="life_flg" value="1"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
