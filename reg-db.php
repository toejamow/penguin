<?php 
$login = strip_tags(trim($_POST['login'])); // Удаляет все лишнее и записываем значение в переменную //$login
$pass = strip_tags(trim($_POST['pass'])); 
$email = strip_tags(trim($_POST['email'])); 

if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
	echo "Недопустимая длина логина";
	exit();
}

require "connect.php";

$result1 = mysqli_query($con,"SELECT * FROM `users` WHERE `username` = '$login'");
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
if(!empty($user1)){
	echo "Данный логин уже используется!";
	exit();
}
mysqli_query($con,"INSERT INTO `users` (`username`, `password`, `email`)VALUES('$login', '$pass', '$email')");

header('Location:index.php');
