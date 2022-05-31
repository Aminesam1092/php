<?php
    $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
    $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
    $age = htmlspecialchars($_POST["age"],ENT_QUOTES);
    $comment = nl2br(htmlspecialchars($_POST["comment"],ENT_QUOTES));

    $fp = fopen('data.txt','a');
    //data.txtというファイルを追記モード(ファイルがなければ自動的に作成する)で開く
    $content = $name.','.$email.','.$age.','.$comment."\n";
    //"\n"で改行を示す。書き込む内容を生成
    if(!fwrite($fp,$content)){//先頭に!をつけることで逆転させる
        //書き込みに失敗した場合にここが実行される
        print('書き込みに失敗しました。');
    }
    /*---MAMP環境では実行不可---*/
    //お問い合わせ内容をメールで送信する場合
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