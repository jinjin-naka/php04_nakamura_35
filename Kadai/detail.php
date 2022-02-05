<?php



 $id = $_GET['id'];

// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
kanricheck();

 $pdo = db_conn();

 //３．データ登録SQL作成
 $stmt = $pdo->prepare('SELECT * FROM gs_bm_table where id = :id');
 $stmt->bindValue(':id',$id, PDO::PARAM_INT);
 $status = $stmt->execute();

 //３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit('SQLError:' . print_r($error, true));
} else {
    $view = $stmt->fetch();
}

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
            <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="user_register.php">ユーザー登録</a></div>
            <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
        </div>
    </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
            <legend>参考ポートフォリオ記事登録</legend>
                <label>ポートフォリオ名：<input type="text" name="portfolio" value=<?= $view['portfolio'] ?>></label><br>
                <label>作者：<input type="text" name="author" value=<?= $view['author'] ?>></label><br>
                <label>URL：<input type="text" name="URL" value=<?= $view['URL'] ?>></label><br>
                参考になったポイント<br>
                <label><textArea name="content" rows="4" cols="40"><?= $view['content'] ?></textArea></label><br>
                <input type="hidden" name="id" value=<?= $view['id'] ?>>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>

