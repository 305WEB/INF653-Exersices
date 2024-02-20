<?php
//data source network
$dsn = "mysql:host=localhost; dbname=world";
$username = 'root';
// $password = "1qaz";

try {
    $db = new PDO($dsn, $username);

} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    // .= concatenates error messsage
    $error_message .= $e->getMessage();
    echo $error_message;
    exit();

}

// Statemen below has password
/*
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    */

?>