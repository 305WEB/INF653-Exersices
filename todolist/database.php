<?php
//data source network
$dsn = "mysql:host=localhost; dbname=todolist";
$username = 'root';
// $password = "1qaz";

try {
    $db = new PDO($dsn, $username);

} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    // .= concatenates error messsage
    $error_message .= $e->getMessage();
    // echo $error_message;

    include('view/error.php');
    exit();

}


?>