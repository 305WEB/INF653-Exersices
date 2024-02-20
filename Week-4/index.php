<?php
// POST DATA
$newCity = filter_input(INPUT_POST, "newCity", FILTER_UNSAFE_RAW);
$countryCode = filter_input(INPUT_POST, "countryCode", FILTER_UNSAFE_RAW);
$district = filter_input(INPUT_POST, "district", FILTER_UNSAFE_RAW);
$population = filter_input(INPUT_POST, "population", FILTER_UNSAFE_RAW);

// GET DATA
$city = filter_input(INPUT_GET, "city", FILTER_UNSAFE_RAW);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4</title>
</head>
<body>


<main>

<header> <h1>Connecting to Database</h1></header>

<?php
if (isset($deleted)) {
    echo "Record Deleted. <br>";
} 
elseif(isset($updated)) {
    echo "Record Updated. <br>";
}
?>


<?php if (!$city && !$newCity) { ?>

    <section>

        <h2>Select Data / Read Data</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <label for="city">City Name:</label>
            <input type="text" id="city" name="city" required></input>
            <button>Submit</button>

        </form>
    </section>
 

    <section>

        <h2>Insert Data / Create Data</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <label for="newCity">New City:</label>
            <input type="text" id="newCity" name="newCity" required></input>
          

            <label for="countryCode">New Counry Code:</label>
            <input type="text" id="countryCode" name="countryCode" required></input>
       

            <label for="district">New District:</label>
            <input type="text" id="district" name="district" required></input>
         

            <label for="population">New Population:</label>
            <input type="text" id="population" name="population" required></input>
         

            <button>Submit</button>

        </form>
    </section>

    <?php } else { ?> 

        <?php include("database.php") ?>


        <?php 
        if ($newCity) {

                $query = 'INSERT INTO city

                (Name, CountryCode, District, Population)
                VALUES
                (:newCity, :countryCode, :district, :population)';

                $statement = $db->prepare($query);

                $statement->bindValue(':newCity', $newCity );
                $statement->bindValue(':countryCode', $countryCode );
                $statement->bindValue(':district', $district );
                $statement->bindValue(':population', $population );

                $statement->execute();
                $statement->closeCursor();


        } ?>

        <?php if ($city || $newCity)  {

            $query = 'SELECT * FROM city
                      WHERE Name = :city
                      ORDER BY Population DESC';
            
            $statement = $db->prepare($query);

            if ($city) {
                $statement->bindValue(":city", $city);
            } else {
                $statement->bindValue(":city", $newCity);
            }
            $statement->execute();
            $results = $statement->fetchAll();
            $statement-> closeCursor();

            // echo  $results;
        } ?>

        <?php
                                                  /* IF BEGIN  */
            if (!empty($results)) { ?>     

            <section>

            <h3>Update or Delete Data</h3>

                <?php foreach ($results as $result) {
                    $id = $result["ID"];
                    $city = $result["Name"];
                    $countryCode = $result["CountryCode"];
                    $district = $result["District"];
                    $population = $result["Population"];

                        // BEGIN OF FOR EACH
                    ?>  

                 <!-- UPDATE FORM -->

                <form action="update_record.php" class="update" method="POST">

                <input type="hidden" name="id" value="<?php echo $id ?>" />

                <label for="city<?php echo $city ?>">City Name:</label>
                <input type="text" name="city" value="<?php echo $city ?>" />

                <label for="countryCode-<?php echo $countryCode ?>">Country Code:</label>
                <input type="text"  name="countryCode" value="<?php echo $countryCode ?>"  />

                <label for="district-<?php echo $district ?>">District:</label>
                <input type="text"  name="district" value="<?php echo $district ?>"  />

                <label for="population<?php echo $population ?>">Population:</label>
                <input type="text"  name="population" value="<?php echo $population ?>"  />

                <button class="red">Update</button>

                </form>

                <!-- DELETE FORM -->

                <form action="delete_record.php" class="delete" method="POST">

                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <button class="red">Delete</button>

                </form>

                         <!-- FOR EACH END-->
               <?php  } ?>

            </section>
            
                                                   <!--  ELSE -->
            <?php } else { ?>               

                <p> Sorry, no results.</p>

            <?php } ?>                              <!-- IF END -->

            <a href="<?php  echo $_SERVER['PHP_SELF']?>">Go to request form.</a>

        <?php } ?>


</main>
<footer></footer>
    
</body>
</html>