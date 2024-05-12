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
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Trang admin Coffee</title>
</head>

<body>
    <div id="wrapper">
        <form action="" class="form-login" method="post" action="" id="form-login">
            <h1 class="form-heading"> Đăng nhập trang Admin </h1>
            <div class="form-group">
                <i class="fa fa-user"></i>
                <input type="text" class="form-input" placeholder="Tên đăng nhập" name="admin_username" required value="<?php if(isset($_POST['admin_username']) && $_POST['admin_username'] != NULL){ echo $_POST['admin_username']; } ?>">
            </div>
            <div class="form-group">
                <i class="fa fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" name="admin_pass" required value="<?php if(isset($_POST['admin_pass']) && $_POST['admin_pass'] != NULL){ echo $_POST['admin_pass']; } ?>">
                <div id="eye">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit" name="admin_login">
        </form>
    </div>
    
</body>
<script src="js/jquery-331.min.js"></script>
<script>
$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>
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