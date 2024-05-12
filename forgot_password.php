<?php 

    $active='Account';
    include("includes/header.php");

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
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2 style="color:aliceblue"> Tìm tài khoản của bạn </h2>

                            <p style="color:aliceblue"> Vui lòng nhập địa chỉ email, số điện thoại di động hoặc tên người dùng của bạn để tìm kiếm tài khoản của bạn. </p>
                            
                        </center><!-- center Finish -->
                        
                        <form action="forgot_password.php" method="post"><!-- form Begin -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label style="color:aliceblue">Email, số điện thoại di dộng hoặc tên người dùng</label>
                                
                                <input type="text" class="form-control" placeholder="Email, số điện thoại hoặc tên người dùng để tìm kiếm tài khoản của bạn" name="c_search" required value="<?php if(isset($_POST['c_search']) && $_POST['c_search'] != NULL){ echo $_POST['c_search']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="search" class="btn btn-primary">
                                
                                    <i class="fa fa-search"></i> Tìm kiếm
                                
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

if(isset($_POST['search'])){
    
    $c_search = $_POST['c_search'];
    

    $check_c_search = "select * from customers where customer_contact = '$c_search' or customer_email = '$c_search' or customer_username = '$c_search'";
    $run_check_c_search = mysqli_query($con, $check_c_search);

    if ( (mysqli_num_rows($run_check_c_search) == 1) ) {

        $row_check_c_search = mysqli_fetch_array($run_check_c_search);
        $customer_id = $row_check_c_search['customer_id'];
        $customer_name = $row_check_c_search['customer_name'];
        $customer_email = $row_check_c_search['customer_email'];
        $customer_contact = $row_check_c_search['customer_contact'];
        $customer_username = $row_check_c_search['customer_username'];

        $code_sent = random_int(100000, 999999);

        $code_sent = (string)$code_sent;

        //goi thu vien
        include("functions/class.smtp.php");
        include "functions/class.phpmailer.php"; 
        $nFrom = "Coffee Store";    //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom = "mailtestforworkofstudy@gmail.com";  //dia chi email cua ban 
        $mPass = "akuh jidr mfsl fqsk";       //mat khau email cua ban
        $nTo = $customer_name; //Ten nguoi nhan
        $mTo = $customer_email;   //dia chi nhan mail
        $mail             = new PHPMailer();
        $body             = "Chào $customer_name, Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn. Nhập mã đặt lại mật khẩu sau: $code_sent";   // Noi dung email
        $title            = "$code_sent là mã khôi phục tài khoản của bạn";   //Tieu de gui mail
        $mail->IsSMTP();             
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";    // sever gui mail.
        $mail->Port       = 465;         // cong gui mail de nguyen
        // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  // khai bao dia chi email
        $mail->Password   = $mPass;              // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('mailtestforworkofstudy@gmail.com', 'Coffee Store'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail 
        if(!$mail->Send()) {

            echo "<script>alert('Có lỗi xảy ra')</script>";
       
            echo "<script>window.open('forgot_password.php','_self')</script>";
                                           
        } 
        else {

            $_SESSION['code_sent']=$code_sent;
            
            $_SESSION['username_forgot']=$customer_username;
                                           
            echo "<script>alert('Vui lòng kiểm tra email của bạn. Mã của bạn dài 6 số.')</script>";
       
            echo "<script>window.open('confirm_mail_forgot_password.php','_self')</script>";

        }
        
    }
    else{

        echo "<script>alert('Không tìm thấy email, số điện thoại di động hoặc tên đăng nhập này')</script>";

    }

}

?>