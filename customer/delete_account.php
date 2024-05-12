<center><!-- center Begin -->

    <h1> Bạn thực sự muốn xoá tài khoản của bạn ?</h1>

    <form action="" method="POST"><!-- form Begin -->

        <input type="submit" name="Yes" value="Tôi muốn xoá tài khoản" class="btn btn-danger">

        <input type="submit" name="No" value="Tôi không muốn xoá tài khoản" class="btn btn-primary">

    </form><!-- form Begin -->

</center><!--center Finish -->

<?php 

$c_username = $_SESSION['customer_username'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_username='$c_username'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Tài khoản của bạn đã được xoá, chúng tôi rất tiếc về điều này')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>