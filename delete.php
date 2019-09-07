<?php
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM country WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

//редирект (index.php in our case)
header("Location:index.php");
?>
