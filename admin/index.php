<?php
include "../connect.php";
include "../header-auth.php";
$news = mysqli_query($con, "select * from news");

$id_new = isset($_GET["new"])?$_GET["new"] : false;

if($id_new) $new_info = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM News where news_id = $id_new"));
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Admin</title>
</head>

<body>
   <div class="all">
    <div class="posts_adm">
    <?php
    $UserID = $_COOKIE['user'];

    echo "<h1>Добро Пожаловать, " . $UserID . "</h1>";
    ?>
        <h2>Список новостей</h2>
        <?php
        while($new = mysqli_fetch_assoc($news)) {
            $new_id = $new['news_id'];
            echo "<a href='index.php?new=$new_id'>"."Пост"." ".$new_id."</a>";
            echo "<a href='deleteNew.php?new=$new_id'>" ."Del"."</a>" . "<br>";
        }
        ?>
        <a href="/admin">+</a>
    </div>
    <div class="create_posts">
    <main>

<h1> <?=$id_new?"Редактирование новости":"Создание новости"; ?> </h1>

    <form action="<?=$id_new?"update":"../create";?>NewValid.php" method="POST" enctype="multipart/form-data" class="newsForm">


    <label for="userTitle">Напишите заголовок...</label>
    <input type="text" id="userTitle" name="userTitle" value='<?=$id_new?$new_info["title"]:""?>'>
    <br>

    <?= $id_new?"<div class='post_img' style='background-image:url(/images/news/" . $new_info['image'] . ")'></div>" : "";?>
    <?= $id_new?"<input type='hidden' name='id' value='$id_new'>" : "";?>


    <label for="userCategory">Выберите категорию</label>
    <select name="userCategory" id="Category">
        <?php 
        foreach ($categories as $category) {
            $id_cat = $category[0];
            $name = $category[1];
            $is_sel = ($id_cat == $new_info['category_id']) ? "selected" : '';
            echo "<option value='$id_cat'" . ($id_new ? $is_sel : '') . ">$name</option>";
        } ?>
    </select>

    <label for="userImages">Загрузите изображение</label>
    <input type="file" id="userImages" name="userImages" accept="image/*" >
    <br>

    <label for="userText">Напишите текст...</label>
    <input id="text"  type="text" name="userText" value='<?=$id_new?$new_info["content"]:""?>'>
    <br>

    <input id="button" type="submit" value="Сохранить">
  


</form>
</main>

    </div>
</div>

</body>

</html>