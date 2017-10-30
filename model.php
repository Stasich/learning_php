<?php
function createTable($pdo)
{
  $query = "drop table if exists `answers`;CREATE TABLE `answers` (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `pattern` VARCHAR(500), `answer` VARCHAR(5000));";
  $pdo->query($query);
}

function getAnswer( $pdo, $pattern )
{
    $query = "SELECT answer FROM answers where pattern = :pattern"; //запрос ответов из базы
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'pattern' => $pattern
    ]);

    $count = $stmt->rowCount();
    $rand = rand(0, $count - 1);
    $result = $stmt->fetchAll();
    $answer = $result[$rand]['answer'];

    if ( $answer == false)
        $answer = "Я даже не знаю что сказать...";

    return $answer;
}

function insertAnswer($pdo)
{
    $query = "INSERT INTO answers (pattern, answer) VALUES ( :pattern, :answer)"; //строка для запроса
    $stmt = $pdo->prepare($query);
    $f = fopen ('answer_databse.txt', "rt" );  // строка в файле имеет формат: вопрос\ответ
    while ( $string = fgets( $f, 5000 ) ) {
        $arr = explode("\\", $string);
        $stmt->execute([
            'pattern' => $arr[0],
            'answer' => $arr[1]
        ]);
    }
}