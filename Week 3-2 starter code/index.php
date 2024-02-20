<?php
// $number = "";

$number = filter_input(INPUT_GET, 'num',  FILTER_SANITIZE_NUMBER_INT); // XSS

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Flash Cards</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<!-- Include the files that you created -->

<?php include('./view/header.php'); ?>

<?php 
if (!empty($number)) {

    include('./view/results.php'); 

} else {

    include('./view/form.php'); 

}

?>

<?php include('./view/footer.php'); ?>

</body>

</html>