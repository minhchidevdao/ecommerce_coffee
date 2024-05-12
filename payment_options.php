<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_username = $_SESSION['customer_username'];
    
    $select_customer = "select * from customers where customer_username='$session_username'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    
    <h1 class="text-center" style="color:aliceblue">Chọn phương thức thanh toán</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a href="order.php?c_id=<?php echo $customer_id ?>"> Ship COD </a>
         
     </p><!-- lead text-center Finish -->
     
     
    
</div><!-- box Finish -->