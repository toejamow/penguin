<?php
include "connect.php";
include "header.php";
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;800&display=swap" rel="stylesheet">
    <title>Пингвинсы</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>

<h1>Создать публикацию</h1>

    <form class="form_create" action="createNewValid.php" method="POST" enctype="multipart/form-data" class="newsForm">

    <label for="userTitle">Напишите заголовок...</label>
    <input type="text" id="userTitle" name="userTitle">
    <br>

    <label for="userCategory">Выберите категорию</label>
    <select name="userCategory" id="Category">
        <?php 
        foreach ($categories as $category) {
            $id_cat = $category[0];
            $name = $category[1];
            echo "<option value='$id_cat'>$name</option>";
        } ?>
    </select>

    <label for="userImages">Загрузите изображение</label>
    <input type="file" id="userImages" name="userImages" accept="image/*" >
    <br>

    <label for="userText">Напишите текст...</label>
    <input id="text"  type="text" name="userText">
    <br>

    <input id="button" type="submit" value="Сохранить">

</form>
</main>
</body>
</html>