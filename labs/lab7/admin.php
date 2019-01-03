<?php session_start();
    include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <h1>This is the admin page</h1>
        <br /><br />
        <form method="POST" action="addProduct.php">
            <input type="submit" value="Add New Products" />
        </form>
        <form method="POST" action="logout.php">
            <input type="submit" value="Logout" />
        </form>
        <?= displayAllProducts();?>
    </body>
</html>