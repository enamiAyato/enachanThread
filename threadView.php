<?php require 'init.php' ?>
<?php
    try{
        $pdo->beginTransaction();

        $sql = "select * from thread3 where id=:_id;";

        $stmh = $pdo->prepare($sql);

        $stmh->bindValue(":_id",$_REQUEST["id"],PDO::PARAM_STR);

        $stmh -> execute();

        $count = $stmh->rowCount();

        $pdo->commit();
    }catch(PDOException $e){
        print "エラー：".$e->getMessage();
    }


?>

<?php
 while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
    ?>
        名前:<?php print $row['name']; ?> <br>
        時間:<?php print $row['time']; ?> 
        <p>内容:<?php print $row['content']; ?> </p>
    
        <br>
        <br>

        <form name="post" method="post" action="index.php?page=1&id=<?php print $row['id']; ?>">
            パスワード：<input type = "password" name = "pass"><br>
            <input type="submit" value="削除">
        </form>
    
<?php
    }
?>
