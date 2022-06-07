<?php

session_start();

    require 'define.inc.php';//define.inc.php ファイルを読み込む
    $dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;
    try{
        $dbh = new PDO($dsn,DBUSER,DBPASS);//データベースに接続する
    }
    catch(PDOException $e) {
        //データベースへ接続できないwらーが発生したらここを実行する
    print('DBへ接続出来ません'.$e->getMessage());
    //$e->getMessage()にはDBへ接続出来ないエラー内容が入ってくる。
    exit();
    
    }
    $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
    $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
    $age = htmlspecialchars($_POST["age"],ENT_QUOTES);
    $comment = nl2br(htmlspecialchars($_POST["comment"],ENT_QUOTES));
    /*---MAMP環境では実行不可---*/
    //お問い合わせ内容をメールで送信する場合
    $regtime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO data VALUES(NULL,?,?,?,?,'$regtime',0)";

    $stmt = $dnh->prepare($sql);
    $stmt->execute(array($name,$email,$age,$comment));



    $tomail = '';//送信先(宛先)メールアドレス
    $frommail = '';//送信元(差出人)メールアドレス
    mb_language("japanese");
    mb_internal_encoding("utf-8");
    $submject = 'メールのタイトル';//メールのタイトル
    $body = 'フォームへのお問い合わせがありました。'."\n".'名前:'.$name."\n".'メールアドレス:'.&email."\n".'年齢:'.$age."\n".'コメント'.$comment;//メールの本文
    mb_send_mail($tomail,$submject,$body,"From:".$frommail);//メールの送信
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>お問合せ完了</h1>
        <p>お問い合わせを受け付けました。</p>
    </main>
</body>
</html>