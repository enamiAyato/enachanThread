<?php
    try{
        $pdo->beginTransaction();

        $sql = "select * from thread3;";

        $stmh = $pdo->prepare($sql);

        $stmh -> execute();

        $count = $stmh->rowCount();

        $pdo->commit();
    }catch(PDOException $e){
        print "エラー：".$e->getMessage();
    }

    //書き込み件数を表示
    if($count == 0){
        print "書き込みがありません。 <br>";
    }else{
        print "書き込み件数は".$count."件です。<br><br>";
    }

    //現在のページ番号
    if(!isset($_REQUEST['page'])){
        $page = 1;
    }else{
        $page = $_REQUEST['page'];
    }
    $page = max($page,1);

    //最大ページ数
    $maxPage = ceil($count/50);

    //最初に表示する記事の値
    $start = ($page -1) * 50;
?>

<?php

    try{
        $pdo->beginTransaction();

        $sql = "select * from thread3 LIMIT {$start},50;";

        $stmh = $pdo->prepare($sql);

        $stmh -> execute();

        $pdo->commit();
    }catch(PDOException $e){
        print "エラー：".$e->getMessage();
    }

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

<?php
    if($page > 1 ) {
?>
    <a href="index.php?page=<?php print($page - 1); ?>">前のページ</a>
<?php
    }else{
?>
<!-- 前のページ -->
<?php
}
?>

<?php
    if ($page < $maxPage ){
?>　　
    <a href="index.php?page=<?php print($page + 1); ?>">次のページ</a>
<?php
    }else{
?>
<!-- 次のページ -->
<?php
    }
?>

