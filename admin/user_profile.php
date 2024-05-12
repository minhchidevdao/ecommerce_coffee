<?php 

    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<?php 

    if(isset($_GET['user_profile'])){
        
        $edit_user = $_GET['user_profile'];
        
        $get_user = "select * from admins where admin_id='$edit_user'";
        
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
        
    }

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Cập nhật thông tin Admin
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
            <div class="panel-heading"><!-- panel-heading Begin -->
                
                <h3 class="panel-title"><!-- panel-title Begin -->
                    
                    <i class="fa fa-money fa-fw"></i> Cập nhật thông tin Admin <strong><?php echo $_SESSION['admin_username'] ?></strong>
                    
                </h3><!-- panel-title Finish -->
                
            </div> <!-- panel-heading Finish -->
            
            <div class="panel-body"><!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Tên </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Email </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_email; ?>"  name="admin_email" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Địa chỉ </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_country; ?>"  name="admin_address" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Số điện thoại </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_contact; ?>"  name="admin_contact" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Công việc </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_job; ?>"  name="admin_job" type="text" class="form-control" required>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Ảnh đại diện </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="admin_image" type="file" class="form-control">
                            
                            <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_name; ?>" width="70" height="70">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"> Giới thiệu về Admin </label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <textarea  name="admin_about" class="form-control" rows="6"> <?php echo $admin_about; ?></textarea>
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group Begin -->
                        
                        <label class="col-md-3 control-label"></label> 
                        
                        <div class="col-md-6"><!-- col-md-6 Begin -->
                            
                            <input name="update" value="Cập nhật thông tin Admin" type="submit" class="btn btn-primary form-control">
                            
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                </form><!-- form-horizontal Finish -->
                
            </div><!-- panel-body Finish -->
                
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->


<?php 

    if(isset($_POST['update'])){
        
        $user_name = $_POST['admin_name'];
        $user_email = $_POST['admin_email'];
        $user_country = $_POST['admin_address'];
        $user_contact = $_POST['admin_contact'];
        $user_job = $_POST['admin_job'];
        $user_about = $_POST['admin_about'];

        if(is_uploaded_file($_FILES['admin_image']['tmp_name'])){
        
            $user_image = $_FILES['admin_image']['name'];
            $temp_admin_image = $_FILES['admin_image']['tmp_name'];
            
            move_uploaded_file($temp_admin_image,"admin_images/$user_image");
            
            $update_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_address='$user_country',admin_contact='$user_contact',admin_job='$user_job',admin_about='$user_about',admin_image='$user_image' where admin_id='$user_id'";
            
            $run_user = mysqli_query($con,$update_user);
            
            if($run_user){
                
                echo "<script>alert('Người dùng đã được cập nhật thành công')</script>";
                //echo "<script>window.open('view_users.php','_self')</script>";
                
            }
        }

        else{
            $update_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_address='$user_country',admin_contact='$user_contact',admin_job='$user_job',admin_about='$user_about' where admin_id='$user_id'";
            
            $run_user = mysqli_query($con,$update_user);
            
            if($run_user){
                
                echo "<script>alert('Người dùng đã được cập nhật thành công')</script>";
                //echo "<script>window.open('view_users.php','_self')</script>";
                
            }
        }
        
    }

?>


<?php } ?>