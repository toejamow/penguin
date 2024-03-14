<?php
require ("connect.php");
require ("header.php");

$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE username = '$_COOKIE[user]'"));

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2>Добро пожаловать, <?=$user['username'];?></h2>
    <input required type="text" value="<?=$user['email'];?>">
</html>