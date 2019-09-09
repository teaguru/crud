<?php
//подключение к базе
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if (isset($_POST['Submit'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $capital = htmlspecialchars($_POST['capital'], ENT_QUOTES);

    //check for empty
    if (empty($name) || empty($capital)) {

        if (empty($name)) {
            echo "<font color='red'>Введите название страны</font><br/>";
        }
        if (empty($age)) {
            echo "<font color='red'>Введите название стлицы.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)
        $query = $dbConn->prepare('INSERT INTO country(country_name, capital_name) VALUES(:name, :capital)');
        $query->bindparam(':name', $name);
        $query->bindparam(':capital', $capital);
        $query->execute(array(':name' => $name, ':capital' => $capital));
        ?>

        <script charset="utf-8" src="js/toast.js"></script>

        <?php
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>Список стран</a>";
    }
}
?>
</body>
</html>