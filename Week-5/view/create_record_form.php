<?php include("header.php") ?>

<section>

        <h2>Select Data / Read Data</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">

        <input type="hidden" name="action" value="select"/>
            <label for="city">City Name:</label>
            <input type="text" id="city" name="city" required></input>
            <button>Submit</button>

        </form>
    </section>
 

    <section>

        <h2>Insert Data / Create Data</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <input type="hidden" name="action" value="insert"/>

            <label for="newCity">New City:</label>
            <input type="text" id="newCity" name="city" required></input>
          

            <label for="countryCode">New Counry Code:</label>
            <input type="text" id="countryCode" name="countryCode" required></input>
       

            <label for="district">New District:</label>
            <input type="text" id="district" name="district" required></input>
         

            <label for="population">New Population:</label>
            <input type="text" id="population" name="population" required></input>
         

            <button>Submit</button>

        </form>
    </section>

    
<?php include("status.php") ?>

<?php include("footer.php") ?>

