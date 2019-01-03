<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection();
    function displayCat() { 
        global $dbConn;
        $sql = "SELECT * FROM om_category ORDER BY catName DESC";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        //$record = $stmt -> fetch();
        //only RETURN associtive array
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
       // print_r($records);
        //echo $record[1]['catDescription']."<br>";
        foreach ($records as $record) {
            echo "<option>". $record['catName']."</option>";
        }
    }
    function filterProducts() {
        global $dbConn;
        $product = $_GET['productName'];
        /* this sql works but it doesn't prevent sql injection due to the single quotes
        $sql = "SELECT * FROM om_product 
        WHERE productName LIKE '%$product%' OR productDescription LIKE '%$product%'";
        */
         $sql = "SELECT * FROM om_product 
        WHERE productName LIKE :product";
        $namedParameters = array();
        $namedParameters[':product'] = "%$product%";
        
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record) {
            echo $record['productName'];
        } 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ottermart</title>
    </head>
    <body>
        <h1>Ottermart</h1>
        <h2>product Search</h2>
        <form>
            Product: <input type="text" name="productName" placeholder="Product keyword"/><br />
            Category: <select name="category">
                <option value="">Select one</option>   
                <?= displayCat();?>
            </select>
            <input type="submit" name="submit" value="Search!">
        </form>
            <?=filterProducts() ?>
    </body>
</html>