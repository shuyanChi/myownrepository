<?php
    session_start();
    include '../../inc/dbConnection.php';
    $dbConn = startConnection();
    
    $userName = $_POST["username"];
    //echo $userName. "<br />";
    $passWord = sha1($_POST["password"]);
    echo $passWord . "<br />";
    
   /* $sql = "SELECT * FROM om_admin WHERE userName = '$userName'
            AND password = '$passWord'";*/
    $sql = "SELECT * FROM om_admin  WHERE  userName = :userName AND password = :password";
    $np = array();
    $np[':userName'] = $userName;
    $np[':password'] = $passWord;
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    print_r($record);
    if(empty($record)) {
        echo "Wrong user name or password!!";
    }
    else {
       // echo "Welcome ". $record['firstName'] . " " . $record['lastName'];
       $_SESSION['adminfullname'] = $record['firstName'] . " ". $record['lastName'];
       header('Location: admin.php');
    }
?>