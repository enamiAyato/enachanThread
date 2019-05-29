<?php require 'init.php' ?>

<?php /* 検索機能 */?>
<?php require 'search.php' ?>

<?php

    if(isset($_POST["search"])){
        $search = htmlspecialchars($_POST["search"]);

        try{
            //トランザクション開始
            $pdo->beginTransaction();

            //SQL文発行
            $sql = "SELECT * FROM thread3 where content LIKE '%$search%';";

            //ステートメントハンドラを取得
            $stmh = $pdo->prepare($sql);

            //実行
            $stmh->execute();

            //検索ヒット数カウント
            $count = $stmh->rowCount();

            //トランザクション終了
            $pdo->commit();
        
        }catch(PDOException $Exception){
            $pdo->rollBack;
            print "エラー".$Exception->getMessage();
        }

    }

    //書き込み件数を表示
    if($count == 0){
        print "書き込みがありません。 <br>";
    }else if($count < 51){
        print "検索結果は".$count."件です。<br><br>";
    }
?>

<?php
    while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
?>
    名前:<?php print $row['name']; ?> <br>
    時間:<?php print $row['time']; ?> 
    <p> <a href="threadView.php?id=<?php print $row['id']; ?>">内容</a>:<?php print $row['content']; ?> </p>

    <br>
    <br>

<?php
    }
?>