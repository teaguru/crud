<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $capital = htmlspecialchars($_POST['capital'], ENT_QUOTES);


    // checking empty fields
    if(empty($name) || empty($capital)) {

        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($capital)) {
            echo "<font color='red'>Capital field is empty.</font><br/>";
        }


        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $sql = "INSERT INTO country(countryname, capitalname) VALUES(:name, :capital)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':name', $name);
        $query->bindparam(':capital', $capital);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>