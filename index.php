  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <include link rel='stylesheet' href="css/stye.css"
<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM country ORDER BY id DESC");
?>

    <html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="bootstrap.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<a href="add.html">Добавление новой страны</a><br/><br/>

<table class="table table-striped table-dark"  width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
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
    </html><?php
