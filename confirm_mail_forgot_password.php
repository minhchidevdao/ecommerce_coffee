<?php 

    $active='Account';
    include("includes/header.php");
    if(!isset($_SESSION['code_sent'])){
        
        echo "<script>window.open('forgot_password.php','_self')</script>";

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
                    <li style="color:aliceblue">
                        Tài khoản
                    </li>
                    <li style="color:aliceblue">
                        Quên mật khẩu
                    </li>
                    <li style="color:aliceblue">
                        Đặt lại mật khẩu
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2 style="color:aliceblue"> Nhập mã bảo mật </h2> <?php // echo $code_sent ?>

                            <p style="color:aliceblue"> Vui lòng kiểm tra email của bạn. Mã của bạn dài 6 số. </p>
                            
                        </center><!-- center Finish -->
                        
                        <form action="confirm_mail_forgot_password.php" method="post"><!-- form Begin -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color:aliceblue"> Nhập mã 6 chữ số </label>
                                
                                <input type="text" class="form-control" placeholder="Nhập mã 6 chữ số chúng tôi vừa gửi cho bạn" name="code" minlength="6" maxlength="6" required value="<?php if(isset($_POST['code']) && $_POST['code'] != NULL){ echo $_POST['code']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="continue" class="btn btn-primary">
                                
                                    Tiếp tục
                                
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

if(isset($_POST['continue'])){
    
    $code = $_POST['code'];

    if ($code == $code_sent ) {

        // echo "<script>alert('Mã vừa nhập là: $code')</script>";

        $_SESSION['ok'] = "1";
        
        echo "<script>window.open('change_password_forgot.php','_self')</script>";
        
    }
    else{

        echo "<script>alert('Mã bảo mật không khớp, vui lòng nhập lại')</script>";

        exit();

    }

}

?>

<?php } ?>