<?php
include("database.php");




// Get all categories
$query = 'SELECT * FROM todoitems
                       ORDER BY ItemNum';
$statement = $db->prepare($query);
$statement->execute();
$todoitems = $statement->fetchAll();
$statement->closeCursor();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Todo List</title>
</head>
<body>

<header>
    <h1>To Do List</h1>
</header>

<div id="list-wrapper">

<?php foreach ($todoitems as $todoitem) : ?>

<ul class="flg-flex">
  
                <li class="item-4">

                    <input type="hidden" name="id" value="<?php echo $todoitem['ItemNum']; ?>" />

                    <span class="Title"><?php echo $todoitem['Title']; ?></span>
                    <br/>
                    <span class="Description"><?php echo $todoitem['Description']; ?></span>
                </li>
                <li class="item-3">
                   
                    <form action="delete_record.php" class="delete" method="POST">

                        <input type="hidden" name="ItemNum" value="<?php echo $todoitem['ItemNum']; ?>" />
                        <button class="delete"><span class="material-symbols-outlined">delete</span></button>

                    </form>
                </li>
             

</ul>

<?php endforeach; ?>

</div>
        <form id="Add_itemForm" action="add_todoitem.php" method="post">

        <ul class="flg-flex" style="border: none; margin-top:25px; padding-top: 0 !important;">
  
                <li class="item-4">

                  
                    <input class="add_input" type="text" name="title" placeholder="Title" maxlength="20"><br>
                 
                    <input class="add_input" type="text" name="description" placeholder="Description" maxlength="50"><br>

                </li>

                <li class="item-3">

                    <button class="add_button" type="submit"><strong>Add <br/>Item</strong></button><br>

                </li>

        </ul>

        </form>
    
</body>
</html>