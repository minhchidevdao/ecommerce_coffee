<!-- <div class="col-md-1"></div> -->

<link rel="stylesheet" href="styles/login.css">
<div style="box-shadow: 0px 0px 17px 2px black; " class="col-md-12 box "><!-- box Begin -->

    <div id="wrapper">

        <form method="post" action="checkout.php" id="form-login">

            <!-- <h1 class="form-heading"> Đăng nhập trang Admin </h1> -->

            <center><!-- center Begin -->
                    
                <h2 style="background: #048bff; color:aliceblue"  class=""> Đăng nhập </h2>
                    
               
                    
                <h3 class="text-muted"> Chào mừng bạn đã đến cửa hàng của chúng tôi ! </h3>
                    
            </center><!-- center Finish -->

            <div class="form-group">
                <i class="fa fa-user"></i>
                <label style="color:aliceblue;" for="c_username">Tên đăng nhập:  </label>
               
              
                <input type="text" class="form-input" placeholder="" name="c_username" required value="<?php if(isset($_POST['c_username']) && $_POST['c_username'] != NULL){ echo $_POST['c_username']; } ?>">

              
                
                
            </div>

            <div class="form-group">

                <i class="fa fa-key"></i>
                <label style="color:aliceblue;" for="c_pass">Mật khẩu:  </label>

                <input type="password" class="form-input" placeholder="" name="c_pass" required value="<?php if(isset($_POST['c_pass']) && $_POST['c_pass'] != NULL){ echo $_POST['c_pass']; } ?>">

                <div id="eye">

                    <i class="fa fa-eye"></i>

                </div>

            </div>

            <input type="submit" value="Đăng nhập" class="form-submit center" name="login">
               
            <center><!-- center Begin -->
                
                <a href="customer_register.php">
                    
                    <h4>Đăng ký </h4>
                    
                </a>
                
            </center><!-- center Finish -->

            <center><!-- center Begin -->
                
                <a href="forgot_password.php">
                    
                    <h4> Quên mật khẩu? </h4>
                    
                </a> 
                
            </center><!-- center Finish -->
        </form>
    </div>
    
</div><!-- box Finish -->
<!-- <div class="col-md-1"></div> -->
<script src="js/jquery-331.min.js"></script>
<script>
$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>

<?php 

if(isset($_POST['login'])){
    
    $customer_username = $_POST['c_username'];
    
    $customer_pass = sha1($_POST['c_pass']);
    
    $select_customer = "select * from customers where customer_username='$customer_username' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Email hoặc mật khẩu không đúng')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        $sql_lay_id = "select * from customers where customer_username='$customer_username'";
        $run_sql_lay_id =  mysqli_query($con,$sql_lay_id);
        $row_sql_lay_id = mysqli_fetch_array($run_sql_lay_id);
        $customer_id = $row_sql_lay_id['customer_id'];
        $_SESSION['customer_username']=$customer_username;
        $_SESSION['customer_id']=$customer_id;
        // echo "<h1>".$_SESSION['customer_id']."</h1>";
        
        
       echo "<script>alert('".$_SESSION['customer_id']."')</script>"; 
       echo "<script>alert('Đăng nhập thành công')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }
    else{
        
        $_SESSION['customer_username']=$customer_username;
        
       echo "<script>alert('Đăng nhập thành công')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>