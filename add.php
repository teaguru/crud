<?php
//подключение к базе
include_once("config.php");

if (isset($_POST['Submit'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $capital = htmlspecialchars($_POST['capital'], ENT_QUOTES);


    // проверим поля на пустоту
    if (empty($name) || empty($capital)) {

        if (empty($name)) {
            ?>
            <script> alert(('Введите название страны'));
                window.location.replace("add.html");
            </script> <?
        }

        if (empty($capital)) {
            ?>
            <script> alert(('Введите название столицы'));
                window.location.replace("add.html");
            </script> <?
        }

    } else {
        // при условии, что поля не пустые вносим данные в базу использую PDO
        $sql = "INSERT INTO country(country_name, capital_name) VALUES(:name, :capital)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':name', $name);
        $query->bindparam(':capital', $capital);
        $query->execute();
        ?>
        
             <script charset="utf-8" src="js/toast.js"></script>
             <script type="text/javascript">
                new Toast({
  message: 'Страна успешно добавленна!',
  type: 'succsess'
});
                //window.location.replace("add.html");
</script>
        <?php
        //echo "<font color='green'>Data added successfully.";
        //echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>