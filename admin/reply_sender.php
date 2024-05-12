<?php 

    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<?php 

    if(isset($_GET['reply_sender'])){
        
        $reply_sender = $_GET['reply_sender'];
        
        $get_reply = "select * from sender where sender_id='$reply_sender'";
        
        $run_reply= mysqli_query($con,$get_reply);
        
        $row_get_reply = mysqli_fetch_array($run_reply);
        
        $sender_id = $row_get_reply['sender_id'];
        
        $sender_c_name = $row_get_reply['sender_c_name'];
        
        $sender_c_email = $row_get_reply['sender_c_email'];
        
        $sender_subject = $row_get_reply['sender_subject'];
        
        $sender_message = $row_get_reply['sender_message'];
        
        $sender_date = $row_get_reply['sender_date'];
        
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Trả lời góp ý khách hàng
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
            <div class="panel-heading"><!-- panel-heading Begin -->
                
                <h3 class="panel-title"><!-- panel-title Begin -->
                    
                    <i class="fa fa-paper-plane"></i> Trả lời góp ý khách hàng
                    
                </h3><!-- panel-title Finish -->
                
            </div> <!-- panel-heading Finish -->
            
            <div class="panel-body"><!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Tên khách hàng </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $sender_c_name; ?>" name="sender_c_name" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Email khách hàng </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $sender_c_email; ?>"  name="sender_c_email" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Chủ đề mail </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="Chào <?php echo $sender_c_name; ?>, cám ơn bạn đã đóng góp ý kiến"  name="sender_subject" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nội dung trả lời </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <textarea  name="sender_message" class="form-control" rows="6">Cám ơn bạn đã đóng góp ý kiến, chúng tôi sẽ trả lời bạn trong thời gian sớm nhất</textarea>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"></label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="send" value="Trả lời ý kiến" type="submit" class="btn btn-primary form-control">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                </form><!-- form-horizontal Finish -->
                
            </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

if(isset($_POST['send'])){
    
    $sender_c_name = $_POST['sender_c_name'];
    $sender_c_email = $_POST['sender_c_email'];
    $sender_subject = $_POST['sender_subject'];
    $sender_message = $_POST['sender_message'];
    //goi thu vien
    include("functions/class.smtp.php");
    include "functions/class.phpmailer.php"; 
    $nFrom = "Store coffe";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = "mailtestforworkofstudy@gmail.com";  //dia chi email cua ban 
    $mPass = "akuh jidr mfsl fqsk";       //mat khau email cua ban
    $nTo = $sender_c_name; //Ten nguoi nhan
    $mTo = $sender_c_email;   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $sender_message;   // Noi dung email
    $title            = $sender_subject;   //Tieu de gui mail
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
    $mail->AddReplyTo('mailtestforworkofstudy@gmail.com', 'Store coffe'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {

        echo "<script>alert('Có lỗi xảy ra')</script>";
   
        echo "<script>window.open('index.php?view_sender','_self')</script>";
                                       
    } 
    else {
                                       
        echo "<script>alert('Bạn đã trả lời mail khách hàng thành công')</script>";
   
        echo "<script>window.open('index.php?view_sender','_self')</script>";
    }
    
}

?>


<?php } ?>