<?php
require ("connect.php");

$login = strip_tags(trim($_POST['login']));
$pass = strip_tags(trim($_POST['pass']));
$query = "SELECT * FROM `Users` WHERE `username` = '$login' and `password` = '$pass'";
$result1 = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result1);


if(count($user) == 0){
	echo "Такой пользователь не найден.";
	exit();
}
else if(count($user) == 1){
	echo "Логин или пароль введены неверно.";
	exit();
}

setcookie('user', $user['username'], time() + 3600, "/");

header('Location: admin/index.php');
