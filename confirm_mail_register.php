<?php 

    $active='Account';
    include("includes/header.php");
    if(!isset($_SESSION['code_sent'])){
        
        echo "<script>window.open('customer_register.php','_self')</script>";

    }
    else{

        $code_sent = $_SESSION['code_sent'];

        $insert_customer = $_SESSION['insert_customer'];

        $c_username = $_SESSION['username_register'];

        $c_ip = $_SESSION['c_ip'];

?>
   
    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li style="color:aliceblue">
                        Tài khoản
                    </li>
                    <li style="color:aliceblue">
                        Đăng ký
                    </li>
                    <li style="color:aliceblue">
                        Xác nhận email
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2 style="color:aliceblue"> Nhập mã bảo mật </h2> <?php // echo $code_sent ?>

                            <p style="color:aliceblue"> Vui lòng kiểm tra email để nhập mã xác nhận. Mã của bạn dài 6 số. </p>
                            
                        </center><!-- center Finish -->
                        
                        <form action="confirm_mail_register.php" method="post"><!-- form Begin -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: aliceblue;"> Nhập mã bao gồm 6 chữ số đã gửi vào email của bạn </label>
                                
                                <input type="text" class="form-control" name="code" minlength="6" maxlength="6" required value="<?php if(isset($_POST['code']) && $_POST['code'] != NULL){ echo $_POST['code']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="register" class="btn btn-primary">
                                
                                    Xác nhận
                                
                                </button>
                                
                            </div><!-- text-center Finish -->
                            
                        </form><!-- form Finish -->
                        
                    </div><!-- box-header Finish -->
                    
                </div><!-- box Finish -->
                
            </div><!-- col-md-12 Finish -->
            
        </div><!-- container Finish -->
    </div><!-- #content Finish -->
    
    <?php 
        
        include("includes/footer.php");
        
    ?>
        
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>


<?php 

if(isset($_POST['register'])){
    
    $code = $_POST['code'];

    if ($code == $code_sent ) {

        // echo "<script>alert('Mã vừa nhập là: $code')</script>";
        
        $run_customer = mysqli_query($con,$insert_customer);
            
        $sel_cart = "select * from cart where ip_add='$c_ip'";
        
        $run_cart = mysqli_query($con,$sel_cart);
        
        $check_cart = mysqli_num_rows($run_cart);
        
        if($check_cart > 0){
            
            // If register have items in cart //
            
            $_SESSION['customer_username']=$c_username;
            
            echo "<script>alert('Bạn đã đăng ký tài khoản thành công')</script>";
            
            echo "<script>window.open('checkout.php','_self')</script>";
            
        }
        else{
            
            // If register without items in cart //
            
            $_SESSION['customer_username']=$c_username;
            
            echo "<script>alert('Bạn đã đăng ký tài khoản thành công')</script>";
            
            echo "<script>window.open('index.php','_self')</script>";
            
        }
        
    }
    else{

        echo "<script>alert('Mã bảo mật không khớp, vui lòng nhập lại')</script>";

        exit();

    }

}

?>

<?php } ?>