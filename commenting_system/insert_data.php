<?php
$time = time();                 //получаю текущее время
$name = $_POST['first_name'];
$text = $_POST['comment'];

$name = htmlentities($name);   //
$text = htmlentities($text);

$query = "INSERT INTO comments (name, text, time) VALUES ( :name, :text, :time )"; //строка для запроса
$stmt = $pdo->prepare($query);
$stmt->execute([
    'name' => $name,
    'text' => $text,
    'time' => $time
]);

