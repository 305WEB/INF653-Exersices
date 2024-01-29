<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
    <link rel="stylesheet" href="css/main.css"></link>
</head>
<body>
    <header>
        <br/>
        <h1>Assignment 1 - Date: <?php  $currentDate = date('m-d-Y'); echo $currentDate; ?></h1>
        <br/>
    </header>
    <main>

        <?php 
        // Get parameters // XSS
        $firstname = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_STRING); 
        $lastname = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_STRING); 
        $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_STRING); 

        // Required fiels check
        if (empty($firstname) || empty($lastname) || empty($age)) {

            echo "<p>Hello, missing data. Please provide All three parameters.</p>";
        }

        else {

            echo "<p>Hello my name is {$firstname} {$lastname}</p>";
            echo "<p>I am {$age} years old and";

        
        if  (!empty($firstname) && !empty($lastname) && !empty($age)) {


                if ($age >= 18) {

                    echo " I am old enough to vote in the United States.</p>";
                } 
                elseif ($age < 18) {
                    
                    echo " I am NOT old enough to vote in the United States.</p>";
                
                }

                $days = $age * 365;
            
                echo "<p>{$age} years = {$days} days.</p>";

    }
}
        
        ?>
    </main>
    <footer>
        <br/><br/><br/>
    </footer>
</body>
</html>