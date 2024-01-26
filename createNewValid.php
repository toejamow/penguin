<?php
include "connect.php";

// $newImage = $_FILES["userImages"];
// $newTitLe = $_POST["userTitle"];

// $types = ['image/jpeg', 'image/png'];

// $newText = $_POST["userText"];
// $newCategory = $_POST["userCategory"];
// $types = ['image/jpeg', 'image/png'];
// if (mb_strlen($newText) < 20) {
//     echo "кол-во символов: ок <br>";
// } else {
//     echo "кол-во символов: не ок<br>";
// }
// ;

// foreach ($types as $value) {
//     if ($newImage[ 'type'] == $value) {
//         echo 'расширение картинки: ок <br>';
//     }
// }
// ;
// if (is_string($newTitLe) && is_string($newText)) {
//     echo 'кол-во символов в тексте: ок<br>';
// }

$image = $_FILES["userImages"]["name"];
$title = $_POST["userTitle"];
$text = $_POST["userText"];

$insert = "INSERT INTO `news`(`image`, `title`, `content`, `category_id`) VALUES ('$image','$title','$text', 1)";

if(mysqli_query($con, $insert)){ 
    echo "новая запись добавлена"; 
    } else {
        echo "ошибка ". $insert. "<br>". mysqli_error($con); 
    }


?>