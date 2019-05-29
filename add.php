<?php 

    if(isset($_POST["name"], $_POST["content"])){

        //名前が空の時
        if($_POST["name"] == ''){
            $isName = true;
            $_POST["name"] = "名無しさん";
        }else{
            $isName = true;
        }

        //内容が空の時
        if($_POST["content"] == ''){
            $isContent = false;
        }else{
            $isContent = true;
        }
    }

    //データベースに追加
    if(isset($isName,$isContent)){
        if($isName && $isContent){
            
            try{
                //トランザクション開始
                $pdo->beginTransaction();

                //SQL文発行
                $sql = "INSERT INTO thread3(name,content,time,pass) VALUES(:_name, :_content,:_time,:_pass);";

                //ステートメントハンドラを取得
                $stmh = $pdo->prepare($sql);

                //値を結びつける
                $stmh->bindValue(":_name",$_POST["name"],PDO::PARAM_STR);
                $stmh->bindValue(":_content",$_POST["content"], PDO::PARAM_STR);
                $stmh->bindValue(":_pass",$_POST["pass"], PDO::PARAM_STR);

                $date = new DateTime("now",new DateTimeZone('Asia/Tokyo'));;
               // $date = $data-> format('Y-m-d H:i:s');
                $stmh->bindValue(":_time",$date-> format('Y-m-d H:i:s'),PDO::PARAM_STR);

                //実行
                $stmh->execute();

                //トランザクション終了
                $pdo->commit();
            
            }catch(PDOException $Exception){
                $pdo->rollBack;
                print "エラー".$Exception->getMessage();
            }
        }
    }

?>