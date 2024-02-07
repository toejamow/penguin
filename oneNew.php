<?php

include("connect.php");
include("header.php");

$new_id = isset($_GET["new"]) ? intval($_GET["new"]) : false;
$query_getNew = "SELECT news.*, categories.name FROM news INNER JOIN categories on news.category_id = categories.category_id where news_id = $new_id";
$new = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));

$date = date("d.m.Y h:i", strtotime($new['publish_date']));
$month = ["01"=>"Января","02"=>"Февраль","03"=>"Март","04"=>"Апрель","05"=>"Май","06"=>"Июнь","07"=>"Июль","08"=>"Август",
"09"=>"Сентябрь","10"=>"Октябрь","11"=>"Новябрь","12"=>"Декабрь"];

$m_text = $month [substr ($date, 3, 2)];  

$publish_date = substr($date,0,2)." ".$m_text." ".substr($date,6);
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
    </div>
        </section>
    </main>
    
</body>
</html>
