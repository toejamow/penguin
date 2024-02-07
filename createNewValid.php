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

$image = isset($_FILES["userImages"]["tmp_name"]) ? $_FILES['userImages'] : false;
$title = isset($_POST["userTitle"]) ? $_POST['userTitle'] : false;
$text = isset($_POST["userText"]) ? $_POST['userText'] : false;
$categ = isset($_POST["userCategory"]) ? $_POST['userCategory'] : false;

function check_news($error) {
    return "<script>alert('$error'); location.href = '/admin';</script>";
}

if ($title and $text and $categ and $image) {
    if (strlen($title) > 50) {
        echo check_news("Название не должно превышать 50 символов");
    } else {
        $file_name = $image["name"];

        $result = mysqli_query($con,"INSERT INTO news (title, content, image, category_id) VALUES ('$title', '$text',  '$file_name', '$categ')");

        if ($result) {
            move_uploaded_file($image['tmp_name'], "images/news/$file_name");
            echo check_news("Новость успешно создана");
        } else 
            echo check_news("Произошла ошибка:" . mysqli_error($con));
    }
} else {
    echo check_news("Все поля должны быть заполнены");
}

// $insert = "INSERT INTO `news`(`image`, `title`, `content`, `category_id`) VALUES ('$image','$title','$text', '$categ' )";

// if(mysqli_query($con, $insert)){ 
//     echo "новая запись добавлена"; 
//     } else {
//         echo "ошибка ". $insert. "<br>". mysqli_error($con); 
//     }


// ?>