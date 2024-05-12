<?php 

    $active='Account';
    include("includes/header.php");

?>
   
    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li style="color: antiquewhite;">
                        <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li style="color: antiquewhite;">
                        Đăng ký
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2 style="color: antiquewhite;"> Đăng ký tài khoản mới </h2>
                            
                        </center><!-- center Finish -->
                        
                        <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Họ và tên:</label>
                                
                                <input type="text" class="form-control" placeholder="Nhập họ và tên" name="c_name" required value="<?php if(isset($_POST['c_name']) && $_POST['c_name'] != NULL){ echo $_POST['c_name']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                            
                                <label style="color: antiquewhite;">Email:</label>
                                
                                <input type="email" class="form-control" placeholder="Email@.com ..." name="c_email" required value="<?php if(isset($_POST['c_email']) && $_POST['c_email'] != NULL){ echo $_POST['c_email']; } ?>">
                            
                            </div><!-- form-group Finish -->
                        
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Số điện thoại:</label>
                                
                                <input type="number" class="form-control" name="c_contact" required value="<?php if(isset($_POST['c_contact']) && $_POST['c_contact'] != NULL){ echo $_POST['c_contact']; } ?>">
                                
                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Tên đăng nhập:</label>
                                
                                <input type="text" class="form-control" name="c_username" required value="<?php if(isset($_POST['c_username']) && $_POST['c_username'] != NULL){ echo $_POST['c_username']; } ?>">
                                
                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Nhập mật khẩu:</label>
                                
                                <input type="password" class="form-control" minlength="8" name="c_pass" required value="<?php if(isset($_POST['c_pass']) && $_POST['c_pass'] != NULL){ echo $_POST['c_pass']; } ?>">
                                
                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Nhập lại mật khẩu</label>
                                
                                <input type="password" class="form-control" minlength="8" name="c_pass2" required value="<?php if(isset($_POST['c_pass2']) && $_POST['c_pass2'] != NULL){ echo $_POST['c_pass2']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Địa chỉ:</label>
                                
                                <input type="text" class="form-control" name="c_address" required value="<?php if(isset($_POST['c_address']) && $_POST['c_address'] != NULL){ echo $_POST['c_address']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color: antiquewhite;">Ảnh Avatar của bạn</label>
                                
                                <input type="file" class="form-control form-height-custom" name="c_image">
                                
                            </div><!-- form-group Finish -->

                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="continue" class="btn btn-primary">
                                
                                    <i class="fa fa-user-md"></i> Đăng ký
                                
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
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_username = $_POST['c_username'];
    
    $c_pass = sha1($_POST['c_pass']);

    $c_pass2 = sha1($_POST['c_pass2']);
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    $c_ip = getRealIpUser();

    $check_username = "select * from customers where customer_username = '$c_username'";
    $run_check_username = mysqli_query($con, $check_username);

    $check_email = "select * from customers where customer_email = '$c_email'";
    $run_check_email = mysqli_query($con, $check_email);

    $check_contact = "select * from customers where customer_contact = '$c_contact'";
    $run_check_contact = mysqli_query($con, $check_contact);

    if ( ($c_pass != $c_pass2) ) {
        
        echo "<script>alert('Mật khẩu bạn nhập không khớp')</script>";
        
    }
    elseif( (mysqli_num_rows($run_check_username) > 0) ){

        echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";

    }
    elseif( (mysqli_num_rows($run_check_email) > 0) ){

        echo "<script>alert('Email đã được đăng ký trên tài khoản khác')</script>";

    }
    elseif( (mysqli_num_rows($run_check_contact) > 0) ){

        echo "<script>alert('Số điện thoại đã được đăng ký trên tài khoản khác')</script>";

    }
    else{

        

            $insert_customer = "insert into customers (customer_name, customer_email, customer_contact, customer_username, customer_pass, customer_address, customer_image, customer_ip) values ('$c_name','$c_email','$c_contact','$c_username','$c_pass','$c_address','User.jpg','$c_ip')";
            $run_customer = mysqli_query($con,$insert_customer);
           

                $_SESSION['insert_customer']=$insert_customer;
                
                $_SESSION['username_register']=$c_username;
                $_SESSION['customer_username']=$c_username;

                $_SESSION['c_ip']=$c_ip;
                                            
                echo "<script>alert('Đăng ký thành công')</script>";
        
                echo "<script>window.open('index.php','_self')</script>";

            

        }

    }



?>