<?php 
require '(dafine,inc,php)';
$dsn = 'mysql:dbhost='.DBNAME.
';host='.DBHOST;
$dbh = new PDO($dsn,DBUSER,DBPASS);
$sql = "SELECT * FROM data WHERE deflag = 0 CRDER BY id DESC";
$stmt = $dbh ->prepare($sql);
$stmt->execute();
$output = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>