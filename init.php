<?php
    /* データベース情報 */
    $db_user = "shika";
    $db_pass = "hoge";
    $db_host = "localhost";
    $db_name = "mydb";
    $db_type = "mysql";

    /* DSN設定 */
    $dns = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    try{

        /* データベース接続 */
        $pdo = new PDO($dns, $db_user, $db_pass);
        
        /* エラーモード設定 */
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

    }catch(PDOException $e){
        /* エラーメッセージ */
        print('Error:'.$e->getMessage());
        die();
    }


?>