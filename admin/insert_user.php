<?php 

    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Thêm Admin
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
            <div class="panel-heading"><!-- panel-heading Begin -->
                
                <h3 class="panel-title"><!-- panel-title Begin -->
                    
                    <i class="fa fa-money fa-fw"></i> Thêm Admin
                    
                </h3><!-- panel-title Finish -->
                
            </div> <!-- panel-heading Finish -->
            
            <div class="panel-body"><!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Tên </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_name" type="text" class="form-control" required value="<?php if(isset($_POST['admin_name']) && $_POST['admin_name'] != NULL){ echo $_POST['admin_name']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Email </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_email" type="text" class="form-control" required value="<?php if(isset($_POST['admin_email']) && $_POST['admin_email'] != NULL){ echo $_POST['admin_email']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nhập tên tài khoản </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_username" type="text" class="form-control" required value="<?php if(isset($_POST['admin_username']) && $_POST['admin_username'] != NULL){ echo $_POST['admin_username']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Mật khẩu </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_pass" type="password" id="password1" class="form-control" required value="<?php if(isset($_POST['admin_pass']) && $_POST['admin_pass'] != NULL){ echo $_POST['admin_pass']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->

                        <button type="button" style="cursor: pointer;" id="show1"><i class="fa fa-eye"></i></button>
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nhập lại mật khẩu </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_pass2" type="password" id="password2" class="form-control" required value="<?php if(isset($_POST['admin_pass2']) && $_POST['admin_pass2'] != NULL){ echo $_POST['admin_pass2']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->

                        <button type="button" style="cursor: pointer;" id="show2"><i class="fa fa-eye"></i></button>
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Địa chỉ </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_address" type="text" class="form-control" required value="<?php if(isset($_POST['admin_address']) && $_POST['admin_address'] != NULL){ echo $_POST['admin_address']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Số điện thoại </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_contact" type="text" class="form-control" required value="<?php if(isset($_POST['admin_contact']) && $_POST['admin_contact'] != NULL){ echo $_POST['admin_contact']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Công việc </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_job" type="text" class="form-control" required value="<?php if(isset($_POST['admin_job']) && $_POST['admin_job'] != NULL){ echo $_POST['admin_job']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Ảnh đại diện </label> 
                        
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_image" type="file" class="form-control">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Giới thiệu về Admin </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <textarea name="admin_about" class="form-control" rows="8"></textarea>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"></label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="submit" value="Thêm Admin" type="submit" class="btn btn-success form-control">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                </form><!-- form-horizontal Finish -->
                
            </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<script>
    document.getElementById('show1').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password1');
        password.type = password.type == 'password' ? 'text': 'password';
    }
    document.getElementById('show2').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password2');
        password.type = password.type == 'password' ? 'text': 'password';
    }
</script>

<?php 

if(isset($_POST['submit'])){
    
    $user_name = $_POST['admin_name'];

    $user_email = $_POST['admin_email'];

    $user_username = $_POST['admin_username'];

    $user_pass = sha1($_POST['admin_pass']);

    $user_pass2 = sha1($_POST['admin_pass2']);

    $user_country = $_POST['admin_address'];

    $user_contact = $_POST['admin_contact'];

    $user_job = $_POST['admin_job'];

    $user_about = $_POST['admin_about'];
    
    $check_username = "select * from admins where admin_username = '$user_username'";
    $run_check_username = mysqli_query($con, $check_username);

    $check_email = "select * from admins where admin_email = '$user_email'";
    $run_check_email = mysqli_query($con, $check_email);

    $check_contact = "select * from admins where admin_contact = '$user_contact'";
    $run_check_contact = mysqli_query($con, $check_contact);

    if ( ($user_pass != $user_pass2)) {
        
        echo "<script>alert('Mật khẩu bạn nhập không khớp')</script>";
        
    }
    elseif((mysqli_num_rows($run_check_username) > 0)){

        echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";

    }
    elseif((mysqli_num_rows($run_check_email) > 0)){

        echo "<script>alert('Email đã được đăng ký trên tài khoản khác')</script>";

    }
    elseif((mysqli_num_rows($run_check_contact) > 0)){

        echo "<script>alert('Số điện thoại đã được đăng ký trên tài khoản khác')</script>";

    }
    else{

        if(is_uploaded_file($_FILES['admin_image']['tmp_name'])){

            $user_image = $_FILES['admin_image']['name'];
            $temp_admin_image = $_FILES['admin_image']['tmp_name'];
            
            move_uploaded_file($temp_admin_image,"admin_images/$user_image");
            
            $insert_user = "insert into admins (admin_name,admin_email,admin_username,admin_pass,admin_address,admin_contact,admin_job,admin_image,admin_about) values ('$user_name','$user_email','$user_username','$user_pass','$user_country','$user_contact','$user_job','$user_image','$user_about')";
            
            $run_user = mysqli_query($con,$insert_user);
            
            if($run_user){
                
                echo "<script>alert('Đã thêm Admin')</script>";
                //echo "<script>window.open('index.php?view_users','_self')</script>";
                
            }
        }
        else{
            $insert_user = "insert into admins (admin_name,admin_email,admin_username,admin_pass,admin_address,admin_contact,admin_job,admin_image,admin_about) values ('$user_name','$user_email','$user_username','$user_pass','$user_country','$user_contact','$user_job','UserAdmins.jpg','$user_about')";
            
            $run_user = mysqli_query($con,$insert_user);
            
            if($run_user){
                
                echo "<script>alert('Đã thêm Admin')</script>";
                //echo "<script>window.open('index.php?view_users','_self')</script>";
                
            }
        }
    }
    
}

?>


<?php } ?>