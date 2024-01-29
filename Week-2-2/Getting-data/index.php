
<?php 
print_r($_GET);

print_r($_POST);

// $firstname = htmlspecialchars($_GET['first']);
// $lastname = $_GET['last'];

// $firstname = htmlspecialchars($_POST['first']);
// $lastname = $_POST['last'];

$firstname = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_STRING); // XSS
$lastname = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_STRING); // XSS



// Require fiels check

if (!empty($firstname) && !empty($lastname)){

    echo "<br/><br/>";

echo $firstname . $lastname;

} else {

    echo "Missing data";
}

if (isset($_GET['first']) && isset($_GET['last'])) {
    echo "<br/><br/>";

echo $firstname . $lastname;

} else {

    echo "<br/><br/> Hello Missing data";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Data</title>
    <link rel="stylesheet" href="css/main.css"></link>
</head>
<body>

<h1>Web Processor</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>">

<label for="first">First Name:</label>
<input type="text" id="first" name="first" autocomplete="off"></input>
<br><br>
<label for="last">Last Name:</label>
<input type="text" id="last" name="last" autocomplete="off"></input>

<br><br><br>
<div>
<button type="submit">Submit GET</button>
<button type="submit" formmethod="post">Submit Using POST</button>
<button type="reset" method="post">Reset</button>

</div>

    </form>
</body>
</html>