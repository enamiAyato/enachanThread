<html>
    <head>
        <title>えなちゃん掲示板</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </head>
    <body>
        <?php /*DB情報*/ ?>
        <?php require 'init.php' ?>

        <?php /*書き込み追加*/ ?>
        <?php require 'add.php' ?>

        <?php /*書き込み削除*/ ?>
        <?php require 'delete.php' ?>

        <?php /* 検索機能 */?>
        <?php require 'search.php' ?>

        <?php /*書き込み一覧*/ ?>
        <?php require 'view.php'?>

        <?php /*投稿フォーム*/ ?>
        <?php require 'form.php' ?>
    

    </body>
</html> 