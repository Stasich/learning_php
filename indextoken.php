<?php

$token = 'Your token';
$content = file_get_contents("php://input");  //get json data
$update = json_decode($content, true);  // arr from json
$chat_id = $update['message']['chat']['id'];
$text = $update['message']['text'];
//$textToSend = "хуе".mb_substr($text,1);
$textToSend = "Вы ввели: \"$text\".";

$urlAnswer = "https://api.telegram.org/bot$token/sendMessage?disable_web_page_preview=true&chat_id=$chat_id&text=$textToSend";
//file($urlAnswer); //если нет curl

$ch = curl_init();
// установка URL
curl_setopt($ch, CURLOPT_URL, "$urlAnswer");
// TRUE для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// 0 - не выводить заголовки
curl_setopt($ch, CURLOPT_HEADER, 0);
//
curl_exec($ch);
curl_close($ch);