<?php
    if(isset($_GET["err"])){//指定したパラメータがURLに含まれていると成立
        $err = $_GET["err"];//errパラメーターの内容を$errに格納
        if($err == 'mail'){//$errの内容とテキストを比較して一致していたら
            $errtext = 'メールアドレスが一致しません';//変数にエラーメッセージを格納
        }
    }
    else{
        $errtext = '';//エラー内容が無いため、空文字を格納する
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
        <h1>お問合せフォーム</h1>
        <p><?php print($errtext); ?></p>
        <form name="form1" method="post" action="confirm.php" enctype="multipart/form-data"></form>
        <p>
            <?php
                print($errtext);
            ?>
        </p>
        <form name="form1" method="post" action="confirm.php">
            <dl>
                <dt>
                    <label for="name">
                        名前
                    </label>
                </dt>
                <dd>
                    <input type="text" name="name" id="name" placeholder="山田太郎">
                </dd>
                <dt>
                    <label for="email">
                        メールアドレス
                    </label>
                </dt>
                <dd>
                    <input type="email" name="email" id="email">
                </dd>
                <dt>
                    <label for="remail">
                        メールアドレス確認
                    </label>
                </dt>
                <dd>
                    <input type="email" name="remail" id="remail">
                </dd>
                <dt>
                    <label for="age">
                        年齢
                    </label>
                </dt>
                <dt><label for="image">画像ファイル</label></dt>
                <dd><input type="file" name="image" id="image" accept="image/**"></dd>
                <dd>
                    <input type="number" name="age" id="age">
                </dd>
                <dt>
                    <label for="comment">
                        コメント
                    </label>
                </dt>
                <dd>
                    <textarea name="comment" id="comment"></textarea>
                </dd>
            </dl>
            <p>
                <input type="submit" value="お問合せする">
            </p>
        </form>
    </main>
</body>
</html>