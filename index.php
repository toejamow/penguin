<?php
include "connect.php"; // выражение include включает и выполняет указанный файл, файл для подключения БД
include "header.php"; 

$sort = isset($_GET["sort"])?$_GET["sort"]:false;
$filter = isset($_GET["filter"])?$_GET["filter"]:false;

$param = "";

$query = "select * from news";

if($sort) {
    $query = "SELECT * FROM News ORDER BY publish_date $sort";
} 

if($filter) {
    $param .= "filter=$filter";
    $query = "select * from news where category_id = $filter"; 
}

if($sort && $filter) {
    $query = "select * from news where category_id = $filter order by publish_date $sort";
}

$news = mysqli_query($con, $query);

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
        <ul class="list-group list-group-horizontal mt-5 mb-3">
                <li class="list-group-item">
                    <a href="/?sort=ASC<?=($param!='')?'&'.$param:''?>"><img width="20" src="images/asc-sort.png" alt="asc"></a>
                </li>
                <li class="list-group-item">
                    <a href="/?sort=DESC<?=($param!='')?'&'.$param:''?>"><img width="20" src="images/desc-sort.png" alt="desc"></a>
                </li>
            </ul>
        <?php
        

if(mysqli_num_rows($news)==0){ 
    echo "нет новостей"; } else {
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
    }
        
        ?>
    </div>
        </section>
    </main>

</body>
</html>