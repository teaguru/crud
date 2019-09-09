<?php
//including the database connection file
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
$result = $dbConn->query("SELECT * FROM country ORDER BY id DESC");
?>
<html>
<head>
    <title>Список стран</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
    <div class="menu hvr-float">
        <a href="add_form.php" class="active add-link">Добавление новой страны</a><br/><br/>
    </div>

    <table class="table table-striped table-dark " border=0>

        <tr class="table-label">
            <thead class="thead-light table-label">
            <td>Страна</td>
            <td>Столица</td>
            <td>Удалить</td>
            </tr>
            </thead>
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td> <?= $row['country_name']; ?> </td>
            <td> <?= $row['capital_name']; ?> </td> <?

            echo "<td><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Вы точно готовы удалить запись?')\">Удалить</a></td>";
            }
            ?>
    </table>
</div>
<?php
//subscription form
include $_SERVER['DOCUMENT_ROOT'] . '/templates/sub.html';
?>
</body>

</html>
