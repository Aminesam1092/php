<?php
    $name = $_GET["name"];
    $age = $_GET["age"]
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
        <h1>GETでの受信</h1>
        <p>
            <?php
                print($name);
            ?>
        </p>
        <p>
            <?php
                print($age);
            ?>
        </p>
    </main>
</body>
</html>