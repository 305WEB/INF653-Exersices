<?php
require('database.php');



$ItemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);

if($ItemNum) {
    $query = 'DELETE FROM todoitems
                WHERE ItemNum =:ItemNum';

    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum);
    $success = $statement->execute();
    $statement->closeCursor();
}

$deleted = true;

header('Location: index.php');
exit;

?>