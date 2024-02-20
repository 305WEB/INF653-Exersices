<?php include("header.php") ?>

<?php if ($results) { ?>     

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

    <form action="." class="update" method="POST">

            <input type="hidden" name="action" value="update"/>

            <input type="hidden" name="id" value="<?php echo $id ?>" />

            <label for="city-<?php echo $id ?>">City Name:</label>
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

    <form action="." class="delete" method="POST">
        
    <input type="hidden" name="action" value="delete"/>

        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <button class="red">Delete</button>

    </form>

             <!-- FOR EACH END-->
   <?php  } ?>

   <?php } else { ?>               

        <p> Sorry, no results.</p>

<?php } ?>     


 <?php include("status.php") ?>

 <a href=".">Back to Request Form</a>

   <?php include("footer.php") ?>