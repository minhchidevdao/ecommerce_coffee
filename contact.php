<?php
    
    $active='Contact';
    include("includes/header.php");

?>
  
    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li style="color:antiquewhite">
                        Liên hệ với chúng tôi
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <div class="box"><!-- box Begin -->
                    
                    <div class="box-header" style="color:antiquewhite"><!-- box-header Begin -->
                        
                        <center><!-- center Begin -->
                            
                            <h2> Đóng góp ý kiến của bạn giúp xây dựng cửa hàng tốt hơn </h2>
                            
                            <p class="text-muted" style="color:antiquewhite"> <!-- text-muted Begin -->
                                
                            Nếu bạn có bất kỳ thắc mắc, hãy liên hệ ngay với cửa hàng. Cảm ơn bạn đã ghé cửa hàng 
                                
                            </p><!-- text-muted Finish -->
                            
                        </center><!-- center Finish -->
                        
                        <form action="contact.php" method="post"><!-- form Begin -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Tên của bạn</label>
                                
                                <input type="text" class="form-control" placeholder="vd: Minh Chí" name="name" required value="<?php if(isset($_POST['name']) && $_POST['name'] != NULL){ echo $_POST['name']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Email</label>
                                
                                <input type="text" class="form-control" placeholder="Lưu ý: nhập email đúng để chúng tôi có thể trả lời góp ý của bạn trong thời gian sớm nhất" name="email" required value="<?php if(isset($_POST['email']) && $_POST['email'] != NULL){ echo $_POST['email']; } ?>">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Chủ đề</label>
                                
                                <input type="text" class="form-control" name="subject" required value="Đánh giá về shop">
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="form-group"><!-- form-group Begin -->
                                
                                <label>Ý kiến của bạn</label>
                                
                                <textarea name="message" class="form-control" rows="8">shop tốt, 5 sao</textarea>
                                
                            </div><!-- form-group Finish -->
                            
                            <div class="text-center"><!-- text-center Begin -->
                                
                                <button type="submit" name="submit" class="btn btn-primary">
                                
                                <i class="fa fa-user-md"></i> Gửi phản hồi
                                
                                </button>
                                
                            </div><!-- text-center Finish -->
                            
                        </form><!-- form Finish -->
                        
                        <?php 
                        
                        if(isset($_POST['submit'])){
                            
                            /// Admin receives message with this ///
                            
                            $sender_name = $_POST['name'];
                            
                            $sender_email = $_POST['email'];
                            
                            $sender_subject = $_POST['subject'];
                            
                            $sender_message = $_POST['message'];
                            
                            $insert_sender = "insert into `sender`(`sender_c_name`, `sender_c_email`, `sender_subject`, `sender_message`, `sender_date`) values ('$sender_name','$sender_email','$sender_subject','$sender_message',NOW())";

                            $run_sender = mysqli_query($con,$insert_sender);

                            if($run_sender){

                                //goi thu vien
                                include("functions/class.smtp.php");
                                include "functions/class.phpmailer.php"; 
                                $nFrom = "Coffee Store";    //mail duoc gui tu dau, thuong de ten cong ty ban
                                $mFrom = "mailtestforworkofstudy@gmail.com";  //dia chi email cua ban 
                                $mPass = "akuh jidr mfsl fqsk";       //mat khau email cua ban
                                $nTo = $sender_name; //Ten nguoi nhan
                                $mTo = $sender_email;   //dia chi nhan mail
                                $mail             = new PHPMailer();
                                $body             = "Cám ơn bạn đã đóng góp ý kiến, chúng tôi sẽ trả lời bạn trong thời gian sớm nhất";   // Noi dung email
                                $title            = "Chào $sender_name, cám ơn bạn đã đóng góp ý kiến";   //Tieu de gui mail
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

                                    echo "<script>window.open('contact.php','_self')</script>";
                                    
                                } 
                                else {
                                    
                                    echo "<script>alert('Cám ơn bạn đã đóng góp ý kiến')</script>";

                                    echo "<script>window.open('contact.php','_self')</script>";
                                }
                            }
                            
                        }
                        
                        ?>
                        
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