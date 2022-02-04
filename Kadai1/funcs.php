<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn()
{
    try {
        $pdo = new PDO('mysql:dbname=php04_db; charset=utf8; host=localhost', 'root', 'root');
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
      }

}

function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)

function rediret($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()
function logincheck()
{
    if ($_SESSION['chk_ssid']!= session_id ()){
        exit('LOGIN ERROR');
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}
