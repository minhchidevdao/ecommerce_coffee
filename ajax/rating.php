
<?php
    include("db.php");
?>
<?php

    $filepath = realpath(dirname(__FILE__));
    // include_once ($filepath.'../includes/db.php');
    // $db  = $con;

    if(isset($_POST['index'])){
        $index = $_POST['index'];
        $product_id = $_POST['product_id'];
        $customer_id = $_POST['customer_id'];
        $query = "INSERT INTO tbl_rating(product_id,customer_id,rating) VALUES ('$product_id','$customer_id','$index')";
        $result = mysqli_query($con, $query);
        print_r($_POST);
        if($result){
            echo 'done';
        }
    }

?>