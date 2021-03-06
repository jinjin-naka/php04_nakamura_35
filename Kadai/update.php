<?php

//1. POSTデータ取得
$portfolio = $_POST['portfolio'];
$author = $_POST['author'];
$URL = $_POST['URL'];
$content = $_POST['content'];
$id = $_POST['id'];

// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
kanricheck();


//2. DB接続します
//*** function化する！  *****************
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE 
                gs_bm_table 
            SET 
                portfolio = :portfolio,
                author = :author,
                URL = :URL,
                content = :content,
                date = sysdate()
            where 
                id = :id;
            ');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':portfolio', $portfolio, PDO::PARAM_STR);
$stmt->bindValue(':URL', $URL, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    rediret('index_kanri.php');
}

