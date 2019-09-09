<?php
//connection
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if (isset($_POST['submit2'])) {
    $subscriber_name = htmlspecialchars($_POST['name_sub'], ENT_QUOTES);
    $subscriber_email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    // checking for empty fields
    if (empty($subscriber_name) || empty($subscriber_email)) {

        if (empty($subscriber_name)) {
            echo "<font color='red'>Введите название страны</font><br/>";
        }
        if (empty($subscriber_email)) {
            echo "<font color='red'>Введите название стлицы.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Назад</a>";
    } else {
        // if all the fields are not empty Add record
        $query = $dbConn->prepare('INSERT INTO subscriber(subscriber_name, subscriber_email) VALUES(:name, :capital)');
        $query->bindparam(':name', $subscriber_name);
        $query->bindparam(':capital', $subscriber_email);
        $query->execute();
        echo "<font color='green'>Спасибо, вы подписанны!.";
        echo "<br/><a href='index.php'>Список стран</a>";
        echo "<br/><a href='add_form.php'>Добавить страну</a>";
    }
}
?>
</body>
</html>
