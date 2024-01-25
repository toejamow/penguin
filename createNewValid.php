
<?php

$userImages = $_FILES["userImages"];
$userTitle = $_POST["userTitle"];
$userText = $_POST["userText"];
$userCategory = $_POST["userCategory"];
$types = ['image/jpeg', 'image/png'];
if (mb_strlen($userTitle)>20){
echo "<p>слишком много букв <br></р›";
};

foreach($types as $value) {
if ($userImages[ 'type'] == $value){
echo 'ок картинка есть <br>';
}
};
if (is_string($userTitle) && is_string($userText) && is_string($userCategory)) {
    echo 'ок норм текст <br>';
} else {
    echo 'нужны буковки <br>';
}

echo '<br>Введённые данные:' . '<br>';
echo 'Заголовок: ' . $userTitle . '<br>';
echo 'Текст: ' . $userText . '<br>';
echo 'Категория: ' . $userCategory . '<br>';
?>
