<?php
require('database.php');

// FILTER_VALIDATE_INT is used because of data is being POSTED.

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if($id) {
    $query = 'DELETE FROM city
                WHERE ID =:id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $success = $statement->execute();
    $statement->closeCursor();
}

$deleted = true;

include('index.php');

?>