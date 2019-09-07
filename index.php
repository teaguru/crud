<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM country ORDER BY id DESC");
?>

<html>
<head>
    <title>Список стран</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel='stylesheet' href="css/style.css">
</head>

<body>
<div class="container">
    <div class="menu"><h2>
        <a href="add.html" class="active add-link">Добавление новой страны</a><br/><br/></h2>
    </div>

    <table class="table table-striped table-dark" border=0>

        <tr>
            <thead class="thead-light">
            <td>Страна</td>
            <td>Столица</td>

            <td>Обновить</td>
            </tr>
            </thead>
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['country_name'] . "</td>";
                echo "<td>" . $row['capital_name'] . "</td>";

                echo "<td><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Вы точно готовы удалить запись?')\">Удалить</a></td>";
            }
            ?>
    </table>
</div>
</body>
</html>
