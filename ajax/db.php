<?php
    // Create connection
    $con =mysqli_connect("localhost","root","","store_coffee");
    // Check connection
    if (!$con) {
        echo "<h1>Chưa kết nối được với XAMPP</h1>";
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //require("../index.php");
?>