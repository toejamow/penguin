<?php
include "connect.php";
session_start();

$comment = isset($_POST["comment_self"])?$_POST["comment_self"]:false;

$id_new = isset($_POST["id_new"])?$_POST["id_new"]:false;

$user_id = $_SESSION['user_id'];

if($comment && $id_new) {
    $query = "INSERT INTO `comments`(`news_id`, `user_id`, `comment_text`) VALUES ($id_new,$user_id,'$comment')";
    echo $query;
    if(mysqli_query($con, $query)) header("Location: oneNew.php?new=$id_new");
    else echo "ошибка"; 
}