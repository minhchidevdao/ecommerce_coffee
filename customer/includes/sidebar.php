<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div style="background:bisque;" class="panel-heading"><!--  panel-heading  Begin  -->
        
        <?php
        $customer_session = $_SESSION['customer_username'];
        $get_customer = "select * from customers where customer_username = '$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_image = $row_customer['customer_image'];
        $customer_name = $row_customer['customer_name'];
        if(!isset($_SESSION['customer_username'])){
            
        }
        else{
            echo "
                <center>

                    <img src='customer_images/$customer_image' class='img-responsive' >

                </center>

                <br>

                <h3 class='panel-title' align='center'>

                    Name: $customer_name


                </h3>
            ";
        }
        ?>
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body" style="background:bisque;"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            <li  class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a style="background-color:#510e06; color: antiquewhite;" href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> Đơn hàng của tôi
                    
                </a>
                
            </li>
            

            
            <li>
                
                <a style="color: #510e06" href="logout.php">
                    
                    <i class="fa fa-sign-out"></i> Đăng xuất
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->