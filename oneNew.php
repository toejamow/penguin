<?php

include("connect.php");
include("header.php");

$new_id = isset($_GET["new"]) ? intval($_GET["new"]) : false;
$query_getNew = "SELECT news.*, categories.name FROM news INNER JOIN categories on news.category_id = categories.category_id where news_id = $new_id";
$new = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));


$month = ["01"=>"Января","02"=>"Февраль","03"=>"Марта","04"=>"Апрель","05"=>"Май","06"=>"Июнь","07"=>"Июль","08"=>"Август",
"09"=>"Сентябрь","10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь"];

function date_new($date_old) {
    global $month;
    $date = date("d.m.Y h:i", strtotime($date_old));
    return substr($date,0,2)." ".$month[substr($date, 3, 2)] . " " . substr($date, 6);
}

$publish_date = date_new($new['publish_date']);

$commQuery = mysqli_query($con, "SELECT * FROM Comments INNER JOIN Users ON users.user_id = comments.user_id WHERE news_id = $new_id");
$comments = mysqli_fetch_all($commQuery);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>страница одной новости</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
        <section class="last-news">
        <div class="news">
        <?php
            echo "<p id='post_id'>Пост". " " . $new['news_id'] . "<p>";
            echo "<div class='card'>";
            echo "<div class='header_php'>";
            echo "<h3>" . $new['title'] . "</h3>";
            echo "<p>" . $publish_date . "</p>";
            echo "</div>";
            echo "<p id='text_php'>" . $new['content'] . "</p>";
            echo "<img src=images/news/" . $new['image'] . ">";
            echo "<p id='categNameNew'> Категория:" . " " . $new['name'] . "</p>";
            echo "</div>";
        ?>

        <h3 class="mb-3">Комментарии | <?=mysqli_num_rows($commQuery)?> <img style="height:25px; width:25px;" src="images/icon_comm.png"> </h3>

    
        <form action="comment-DB.php" method="POST" style="display:flex; flex-direction:column;">
        <input type="hidden" name="id_new" value="<?=$new_id?>">
            <div class="idk" style="display:flex; flex-direction:column;">
                <label for="comm_txt">Напишите комментарий</label>
                <input type="text" id="comm_txt" name="comment_self">
            </div>
            <button type="submit">Отправить</button>
        </form>

        <div class="card_comms">

        <?php if(mysqli_num_rows($commQuery)) {
            foreach ($comments as $comment) { ?>
            
                <div class="card-body">
                    <h2><?=$comment[6]?>  <span id="comm_date"><?=date_new($comment[4]);?></span></h2>
                    <p><?=$comment[3]?></p>
                </div>

            <?php }

        } else echo "<i>комментариев нема!</i>";
        ?>
    </div>
        </section>
    </main>
    
</body>
</html>
