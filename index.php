<?php
include "connect.php"; // выражение include включает и выполняет указанный файл
include "header.php";

$query_get_category = "select * from categories";

$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category)); //получаем результат запроса из переменной query_get_category
// и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса

$news = mysqli_query($con,"select * from news");

$id_cat = isset($_GET['cat']) ? ($_GET['cat']) : false;

$news = mysqli_query($con, "select * from news where category_id = '$id_cat'");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
        <section class="last-news">
        <div class="news">
        <?php
        while($new = mysqli_fetch_assoc($news)) {
            echo "<p id='post_id'>Пост". " " . $new['news_id'] . "<p>";
            echo "<div class='card'>";
            echo "<div class='header_php'>";
            echo "<h3>" . $new['title'] . "</h3>";
            echo "<p>" . $new['publish_date'] . "</p>";
            echo "</div>";
            echo "<p id='text_php'>" . $new['content'] . "</p>";
            echo "<img src=images/news/" . $new['image'] . ">";
            echo "</div>";
        }
        
        ?>
    </div>
        </section>
    </main>

</body>
</html>