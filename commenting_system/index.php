<?php
require("connect_to_mysql.php");  //подключение к базе

if ($_POST) {                     //если есть данные в POST запросе до добаить их в базу
    require("insert_data.php");
}

require_once ("html.php");        // html страничка