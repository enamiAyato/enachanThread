<?php
    if(isset($isName, $isContent)){

        if(!$isName){
            print '名前が入力されていません。 <br>';
        }

        if(!$isContent){
            print '内容が入力されていません<br><br>';
        }
    }
?>
<form name="post" method="post" action="index.php?page=<?php print($page); ?>">
    名前：<input type="text" name="name"><br><br>
    内容：<br>
    <textarea name="content" row="10" cols="30" maxlength="300"></textarea><br>
    パスワード：<input type = "password" name = "pass"><br>
    <input type="submit" value="送信">
</form>