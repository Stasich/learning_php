<?php
require("connect_to_mysql.php");  //подключение к базе

if ($_POST) {                     //если есть данные в POST запросе до добаить их в базу
    require("insert_data.php");
}
?>
<html>
<head>
    <title>future_test</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="content">
        <div class="info">
            <div style="padding-top: 40px; font-size: 10px; font-weight: bold;">
                <p>Телефон: (999) 999-99-99</p>
                <p>Email: info@test</p>
            </div>
            <div style="margin-top: 80px;">
                <p style="font-size: 44px; margin: 0;">Комментарии</p>
            </div>
        </div>
        <div class="logo">
            logo
        </div>
    </div>
</div>
<div class="comments">
    <div class="content">
        <?php
        $query = "SELECT name, text, time FROM comments ORDER BY id ASC"; //запрос комментариев из базы
        $stmt = $pdo->query($query);
        while ($row = $stmt->fetch()) {
            //foreach ( $pdo->query($query) as $row ){
            echo "<div class = \"comment\">";
            echo "<div class = \"name\">";
            echo "$row[name]";
            echo "</div>";
            echo "<div class = \"date\">";
            echo date('G:i d.m.Y', $row['time']);
            echo "</div>";
            echo "<div style = \"clear: both\"></div>";
            echo "<div class = \"text\">";
            echo "<p>$row[text]</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        <br>
        <hr>
        <div class="form">
            <form action="index.php" method="POST">
                <label>Ваше имя</label><br><br>
                <input type="text" size="26" name="first_name" required><br><br>
                <label>Ваш комментарий</label><br><br>
                <textarea cols="40" rows=10 name="comment" required></textarea>
                <br>
                <input type="submit" value="Отправить">
            </form>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<div class="footer">
    <div class="content">
        footer
    </div>
</div>
</body>
</html>