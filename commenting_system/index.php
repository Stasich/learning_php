<?php
require_once('connect_to_mysql.php');  //подключение к базе
require_once ('model.php');

if ($_POST) {                           //если есть данные в POST запросе до добаить их в базу
    $name = htmlentities( $_POST['first_name'] );
    $comment = htmlentities( $_POST['comment'] );
    insertComment( $name, $comment, $pdo);
}

$stmt = getComments( $pdo );

require_once ("html.php");        // html страничка