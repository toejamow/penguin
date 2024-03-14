<?php
include "connect.php"; // выражение include включает и выполняет указанный файл, файл для подключения БД
include "header.php"; 

$sort = isset($_GET["sort"])?$_GET["sort"]:false;
$filter = isset($_GET["filter"])?$_GET["filter"]:false;

$param = "";

$query = "select * from news";

$paginate_count=3;//n lim


$page=isset($_GET['page'])?$_GET['page']: 1;

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

if($searching) {
    $query = "SELECT * FROM NEWS WHERE title LIKE '%$searching%'";
}

$offset = $page *$paginate_count - $paginate_count; // offset m

$count_news= mysqli_num_rows(mysqli_query($con, $query));

$news = mysqli_query($con, $query  . " LIMIT $paginate_count OFFSET $offset");

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
            echo "<a href='oneNew.php?new=$new[news_id]'><h3>" . $new['title'] . "</h3></a>";
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

        <section>
        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <?php 
    for($i=1; $i <= ceil($count_news/$paginate_count); $i++){?>
        <li class="page-item"><a class="page-link" href="?page=<?=$i?><?=$filter?'&filter='.$filter:''?><?=$sort?'&sort='.$sort:''?>">
            <?=$i?>
        </a></li>
     <?php }?>

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</section>
    </main>

</body>
</html>