<?php

//1. POSTデータ取得

$id = $_GET['id'];
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
kanricheck();


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE from gs_user_table 
                    where id = :id
                    ');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    rediret('user_select.php');
}

