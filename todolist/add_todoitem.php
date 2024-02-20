<?php
// Get the product data
$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);



// Validate inputs
if ($title== null || $title== false ||
$description == null || $description == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

 
    $query = 'INSERT INTO todoitems (Title, Description) 
                VALUES (:title, :description)';


    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);

    $statement->execute();
    $statement->closeCursor();

    header('Location: index.php');
    exit;
}
?>