<!DOCTYPE html>
<html lang="en">
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
    <div class="header">
        <div class="header-div1">
            <img src="images/menu.png" alt="">
            <p>Разделы</p>
        </div>
        <hr class="hr1">
        <div class="header-div2">
            <img src="images/search.png" alt="">
            <label for="">
                <input type="search" name="" id="nav-search" placeholder="Поиск">
            </label>
        </div>
        <div class="header-div3">
            <img src="images/profile.png" alt="">
            <a href="">Войти</a>
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
        <a href="#">Новости</a>
        <a href="#">Мнение</a>
        <a href="#">Наука</a>
        <a href="#">Жизнь</a>
        <a href="#">Путешествие</a>
        <a href="#">Деньги</a>
        <a href="#">Арты & Дизайн</a>
        <a href="#">Спорт</a>
        <a href="#">Люди</a>
        <a href="#">Лечение</a>
        <a href="#">Образование</a>
    </div>

<main>

<h1>Создать публикацию</h1>

    <form action="createNewValid.php" method="POST" enctype="multipart/form-data" class="newsForm">

    <label for="userTitle">Напишите заголовок...</label>
    <input type="text" id="userTitle" name="userTitle">
    <br>

    <label for="userCategory">Выберите категорию</label>
    <select name="userCategory" id="Category">
        <option value="Cago">Cago</option>
        <option value="Estriper">Estriper</option>
        <option value="Crico" selected>Crico</option>
        <option value="Kawasaki">Kawasaki</option>
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