<?php
require('database.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING); // Using SANITIZE becase it is sending to database.
$countryCode = filter_input(INPUT_POST, 'countryCode', FILTER_SANITIZE_STRING); 
$district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING); 
$population = filter_input(INPUT_POST, 'population', FILTER_SANITIZE_STRING); 

if($id) {
    $query = 'UPDATE city
                SET Name= :city, CountryCode= :countryCode, District= :district, Population= :population
                WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':district', $district);
    $statement->bindValue(':population', $population);

    $success = $statement->execute();
    $statement->closeCursor();
}

$updated = true;

include('index.php');


?>