<?php
    $name = htmlspecialchars($_POST["name"],ENT_QUOTES);//index.phpから送られたnameのデータを受領する
    $email = htmlspecialchars($_POST["email"],ENT_QUOTES);
    $remail = htmlspecialchars($_POST["remail"],ENT_QUOTES);
    $age = htmlspecialchars($_POST["age"],ENT_QUOTES);
    $comment = nl2br(htmlspecialchars($_POST["comment"],ENT_QUOTES));

    if($email != $remail){//$emailと$remailの中身が異なる
        //→異なっている場合に実行
        //1文字でも画面に表示されると無効になるので、それよりも前に記述する
        header('Location:index.php?err=mail');//index.phpに飛ばす
    }

    if(isset($_FILES["image"])){
        //ファイルが指定されているのでファイルの処理を行う。
        $tmp_filename = $_FILES["image"]["tmp_name"];//一時的に付けられたファイル名を取得。
        $filename = $_FILES["image"]["name"];
        $filename = date("YmdHis").'_'.$filename;
        move_uploaded_file($tmp_filename,'upload/'.$filename);
    }
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
        <h1>お問合せフォームの確認</h1>
        <dl>
            <dt>
                名前:
            </dt>
            <dd>
                <?php
                    print($name);
                ?>
            </dd>
            <dt>
                メールアドレス:
            </dt>
            <dd>
                <?php
                    print($email);
                ?>
            </dd>
            <dt>
                メールアドレス確認:
            </dt>
            <dd>
                <?php
                    print($remail);
                ?>
            </dd>
            <dt>
                年齢:
            </dt>
            <dd>
                <?php
                    print($age);
                ?>
            </dd>
            <dt>
                コメント:
            </dt>
            <dd>
                <?php
                    print($comment);
                ?>
            </dd>
        </dl>
        <form name="form2" method="post" action="complete.php">
            <input type="hidden" name="name" value="<?php print($name); ?>">
            <input type="hidden" name="email" value="<?php print($email); ?>">
            <input type="hidden" name="age" value="<?php print($age); ?>">
            <input type="hidden" name="comment" value="<?php print($comment); ?>">
            <p><input type="submit" value="これでお問合せ"></p>
        </form>
    </main>
</body>
</html>