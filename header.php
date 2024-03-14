<?php

session_start();

$username = isset($_SESSION["user_id"])?mysqli_fetch_assoc(mysqli_query($con, "select username from users where user_id =" . $_SESSION["user_id"]))["username"]:false;


include("connect.php");
$query_category = "SELECT * FROM categories";
$categories = mysqli_fetch_all(mysqli_query($con, $query_category));
$news = mysqli_query($con, "select * from news");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div class="header-div1">
            <img src="images/menu.png" alt="">
            <p>Разделы</p>
        </div>
        <hr class="hr1">
        <div class="header-div2">
            <img src="images/search.png" alt="">
            <form id="search" action="" method="GET">
                <label for="">
                    <input type="search" name="nav-search" id="nav-search" placeholder="Поиск">
                </label>
            </form>
            



        </div>
        <div class="header-div3">
            <img src="images/profile.png" alt="">
            <?php if ($username) { ?>
                <li><a href="account.php">
                    <?=$username?>
            </a></li> <?php } ?>

            <li><a href='/sign<?=(!$username) ? "in" : "out"?>.php'>
            <?= (!$username) ? "Вход" : "Выход" ?> </a>
        </div>
    </div>
    <hr class="hr2">
    <div class="logo-date">
        <div>
            <h1>Пингвинсы</h1>
        </div>
        <div class="date-weather">
            <p>Monday, January 1, 2018</p>
            <div class="weather">
                <img src="images/weather.png" alt="">
                <p>- 23 °C</p>
            </div>
        </div>
    </div>
    <div class="section">
        <?php
        foreach ($categories as $category) {
            echo "<li id='styleme'><a href ='/?filter=" . $category[0] . "'" . ">$category[1]</a></li>";
        }
        ?>
    </div>

    <script>
        $("#search").on('keyup', function (e) { //обработчик событий, который отслеживает нажатие клавиши
            if (e.key === 'Enter') { //если нажата клавиша Enter, то выполняется следующий блок PHP кода
                <?php
            $searching = isset($_GET["nav-search"]) ? $_GET['nav-search'] : false;
            ?>
            }
});
    </script>

</body>

</html>