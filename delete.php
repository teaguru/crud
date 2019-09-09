<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
//getting id of the data from url
$id = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM country WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

//redirect to index.php
header("Location:index.php");

?>
