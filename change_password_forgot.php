<?php 

    $active='Account';
    include("includes/header.php");
    if(!isset($_SESSION['code_sent']) ){
        
        echo "<script>window.open('confirm_mail_forgot_password.php','_self')</script>";

    }
    elseif(!isset($_SESSION['ok'])){

        echo "<script>window.open('confirm_mail_forgot_password.php','_self')</script>";

    }
    else{

        $code_sent = $_SESSION['code_sent'];

        $username_forgot = $_SESSION['username_forgot'];

?>
   
    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li>
                        Tài khoản
                    </li>
                    <li>
                        Quên mật khẩu
                    </li>
                    <li>
                        Đặt lại mật khẩu
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2> Đổi mật khẩu </h2> <?php //echo $_SESSION['ok']; //echo $customer_username; ?>

                            <p> Lần này thì nhớ vào hộ cái nhé :))) </p>
                            
                        </center><!-- center Finish -->
                        
                        <form action="change_password_forgot.php" method="post"><!-- form Begin -->

                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Đổi mật khẩu:</label>
                                
                                <input type="password" class="form-control" placeholder="Mật khẩu mới" minlength="8" name="new_pass" required value="<?php if(isset($_POST['new_pass']) && $_POST['new_pass'] != NULL){ echo $_POST['new_pass']; } ?>">
                                
                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Nhập lại mật khẩu</label>
                                
                                <input type="password" class="form-control" placeholder="Mật khẩu mới" minlength="8" name="new_pass_again" required value="<?php if(isset($_POST['new_pass_again']) && $_POST['new_pass_again'] != NULL){ echo $_POST['new_pass_again']; } ?>">
                                
                            </div><!-- form-group Finish -->

                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="change" class="btn btn-primary">
                                
                                    <i class="fa fa-user-md"></i> Đổi mật khẩu
                                
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

    if(isset($_POST['change'])){
        
        $c_new_pass = $_POST['new_pass'];
        
        $c_new_pass_again = $_POST['new_pass_again'];

        if($c_new_pass!=$c_new_pass_again){

            echo "<script>alert('Mật khẩu mới của bạn không khớp, vui lòng thử lại')</script>";
            
            exit();
        }

        $update_c_pass = "update customers set customer_pass='".sha1($c_new_pass)."' where customer_username='$username_forgot'";
        
        $run_c_pass = mysqli_query($con,$update_c_pass);
        
        if($run_c_pass){

            session_destroy();

            $_SESSION['customer_username']=$username_forgot;

            echo "<script>alert('Đổi mật khẩu thành công')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
            
        }

    }

?>
<?php } ?>