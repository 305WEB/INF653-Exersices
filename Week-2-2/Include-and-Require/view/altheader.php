<header>

<?php
$name = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
if (!empty($name)){

    include('./view/greeting/user_greeting.php');

} else {

    include('./view/greeting/visitor_greeting.php');
}

?>

</header>