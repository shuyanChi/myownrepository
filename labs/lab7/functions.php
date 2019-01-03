<?php
    session_start();
    include '../../inc/dbConnection.php';
    $dbConn = startConnection();
    
    function displayAllProducts() {
        global $dbConn;
        $sql = "SELECT productName, price FROM om_product ORDER BY productName";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<a class='btn btn-primary' role='button' href='updateProduct.php?productId=".$record['productId']."'>Update</a>";
            echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
            echo $record['productName'] . " ". $record['price'] . "<br />";
        }

    }
?>