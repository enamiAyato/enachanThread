<?php require 'init.php' ?>
<?php
    if(isset($_REQUEST["id"])){

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

        $row = $stmh->fetch(PDO::FETCH_ASSOC);

        if($_POST["pass"] == $row["pass"]){

            try{
                $pdo->beginTransaction();

                $sql = "delete from thread3 where id=:_id;";

                $stmh = $pdo->prepare($sql);

                $stmh->bindValue(":_id",$_REQUEST["id"],PDO::PARAM_STR);

                $stmh -> execute();

                $count = $stmh->rowCount();

                $pdo->commit();
            }catch(PDOException $e){
                print "エラー：".$e->getMessage();
            }
        }
    }


?>