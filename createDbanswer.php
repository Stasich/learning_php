<?php
//Запускать только один раз!! для создания базы!
/*
require_once ('connectData.php');
require_once ('model.php');

try {                                                                                 // подключаюсь к mysql
$pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e ) {
echo "Невозможно установить соединение" . $e->getMessage();
}

createTable($pdo);  // создать таблицу в БД
insertAnswer($pdo); // заполнить талицу данными из файла

*/
