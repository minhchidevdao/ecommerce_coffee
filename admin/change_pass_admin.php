<?php 

    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<?php 
        
        $user_admin = $_SESSION['admin_username'];
        
        $get_user = "select * from admins where admin_username='$user_admin'";
        
        $run_user = mysqli_query($con,$get_user);
        
        $row_user = mysqli_fetch_array($run_user);
        
        $user_id = $row_user['admin_id'];
        
        $user_name = $row_user['admin_name'];
        
        $user_pass = $row_user['admin_pass'];
        
        $user_email = $row_user['admin_email'];
        
        $user_image = $row_user['admin_image'];
        
        $user_country = $row_user['admin_address'];
        
        $user_about = $row_user['admin_about'];
        
        $user_contact = $row_user['admin_contact'];
        
        $user_job = $row_user['admin_job'];

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Đổi mật khẩu tài khoản Admin
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
            <div class="panel-heading"><!-- panel-heading Begin -->
                
                <h3 class="panel-title"><!-- panel-title Begin -->
                    
                    <i class="fa fa-money fa-fw"></i> Đổi mật khẩu tài khoản Admin <strong><?php echo $_SESSION['admin_username'] ?></strong>
                    
                </h3><!-- panel-title Finish -->
                
            </div> <!-- panel-heading Finish -->
            
            <div class="panel-body"><!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nhập mật khẩu cũ </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input style="position: relative" type="password" id="password_old" placeholder="Mật khẩu"  name="password_old" class="form-control" required value="<?php if(isset($_POST['password_old']) && $_POST['password_old'] != NULL){ echo $_POST['password_old']; } ?>">

                        </div><!-- col-md-6 Finish -->

                        <button type="button" style="cursor: pointer;" id="show_old"><i class="fa fa-eye"></i></button>
                        <!-- <button id="show"><i class="fa fa-eye-slash"></i></button> -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nhập mật khẩu mới </label>
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input type="password" id="password_new" placeholder="Mật khẩu mới" name="password_new" class="form-control" required  value="<?php if(isset($_POST['password_new']) && $_POST['password_new'] != NULL){ echo $_POST['password_new']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->

                        <button type="button" style="cursor: pointer;" id="show_new"><i class="fa fa-eye"></i></button>
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Nhập lại mật khẩu mới </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input type="password" id="password_new2" placeholder="Mật khẩu mới" name="password_new2" class="form-control" required  value="<?php if(isset($_POST['password_new2']) && $_POST['password_new2'] != NULL){ echo $_POST['password_new2']; } ?>">
                            
                        </div><!-- col-md-6 Finish -->

                        <button type="button" style="cursor: pointer;" id="show_new2"><i class="fa fa-eye"></i></button>
                        
                    </div><!-- form-group Finish -->
        
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"></label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="change" value="Đổi mật khẩu" type="submit" class="btn btn-success form-control">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                </form><!-- form-horizontal Finish -->
                
            </div><!-- panel-body Finish -->
                
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<script>
    document.getElementById('show_old').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password_old');
        password.type = password.type == 'password' ? 'text': 'password';
    }
    document.getElementById('show_new').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password_new');
        password.type = password.type == 'password' ? 'text': 'password';
    }
    document.getElementById('show_new2').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password_new2');
        password.type = password.type == 'password' ? 'text': 'password';
    }
</script>

<?php 

    if(isset($_POST['change'])){
        
        $password_old = sha1($_POST['password_old']);
        
        $password_new = $_POST['password_new'];
        
        $password_new2 = $_POST['password_new2'];
        
        $sel_a_old_pass = "select * from admins where admin_pass='$password_old'";
        
        $run_a_old_pass = mysqli_query($con,$sel_a_old_pass);
        
        $check_a_old_pass = mysqli_fetch_array($run_a_old_pass);
        
        if($check_a_old_pass==0){
            
            echo "<script>alert('Mật khẩu sai, vui lòng thử lại')</script>";
            
            //echo "<script>window.open('index.php?change_pass_admin','_self')</script>";
            
        }
        
        elseif($password_new != $password_new2){
            
            echo "<script>alert('Mật khẩu mới của bạn không khớp với mật khẩu vừa nhập, vui lòng thử lại')</script>";
            
            //echo "<script>window.open('index.php?change_pass_admin','_self')</script>";
            
        }
        else{
            $update_a_pass = "update admins set admin_pass='".sha1($password_new)."' where admin_username='$user_admin'";
        
            $run_a_pass = mysqli_query($con,$update_a_pass);
            
            if($run_a_pass){
                
                echo "<script>alert('Đổi mật khẩu thành công')</script>";
                
                echo "<script>window.open('index.php?change_pass_admin','_self')</script>";
                
            }
        }
    }

?>


<?php } ?>