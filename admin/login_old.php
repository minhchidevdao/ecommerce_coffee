<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
            <h2 class="form-login-heading"> Đăng nhập trang Admin </h2>
            
            <input type="text" class="form-control" placeholder="Tên tài khoản Admin" name="admin_username" required value="<?php if(isset($_POST['admin_username']) && $_POST['admin_username'] != NULL){ echo $_POST['admin_username']; } ?>">
            
            <input type="password" id="password" class="form-control" placeholder="Mật khẩu Admin" name="admin_pass" required value="<?php if(isset($_POST['admin_pass']) && $_POST['admin_pass'] != NULL){ echo $_POST['admin_pass']; } ?>">

            <button type="button" style="cursor: pointer;" id="show">

                <i class="fa fa-eye"></i>
                
            </button>
            
            <button type="submit" class="btn btn-lg btn-success btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
                
                Đăng nhập
                
            </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
<script>
    document.getElementById('show').onclick = function(){
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        let password = document.getElementById('password');
        password.type = password.type == 'password' ? 'text': 'password';
    }
</script>
   </div><!-- container finish -->
</body>
</html>

<?php 

    if(isset($_POST['admin_login'])){
        
        $admin_username = $_POST['admin_username'];
        
        $admin_pass = sha1($_POST['admin_pass']);
        
        $get_admin = "select * from admins where admin_username='$admin_username' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_username']=$admin_username;
            
            echo "<script>alert('Đăng nhập thành công')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Tên tài khoản hoặc mật khẩu sai !')</script>";
            
        }
        
    }

?>