<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM country ORDER BY id DESC");
?>

    <html>
<head>
    <title>Список стран</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel='stylesheet' href="css/style.css">
</head>

<body>
<a href="add.html" class="alert alert-info add-link" >Добавление новой страны</a><br/><br/>

<table class="table table-striped table-dark"   border=0>

    <tr>
     <thead class="thead-light">    
        <td>Страна</td>
        <td>Столица</td>

        <td>Обновить</td>
    </tr>
      </thead>
    <?php
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['countryname']."</td>";
        echo "<td>".$row['capitalname']."</td>";

        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Вы точно готовы удалить запись?')\">Delete</a></td>";
    }
    ?>
</table>
</body>
    </html>
