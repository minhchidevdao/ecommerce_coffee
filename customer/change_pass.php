<h1 align="center">Đổi mật khẩu</h1>
<form action="" method="POST" enctype="multipart/form-data"><!-- form Begin -->

    <div class="form-group">

        <label> Nhập mật khẩu cũ: </label>
        <input type="password" name="old_pass" class="form-control" required value="<?php if(isset($_POST['old_pass']) && $_POST['old_pass'] != NULL){ echo $_POST['old_pass']; } ?>">
        
    </div>

    <div class="form-group">

        <label> Nhập mật khẩu mới: </label>
        <input type="password" name="new_pass" class="form-control" required value="<?php if(isset($_POST['new_pass']) && $_POST['new_pass'] != NULL){ echo $_POST['new_pass']; } ?>">
        
    </div>

    <div class="form-group">

        <label> Nhập lại mật khẩu mới: </label>
        <input type="password" name="new_pass_again" class="form-control" required value="<?php if(isset($_POST['new_pass_again']) && $_POST['new_pass_again'] != NULL){ echo $_POST['new_pass_again']; } ?>">
        
    </div>


    <div class="text-center"><!-- text-center Begin -->

        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Cập nhật mật khẩu

        </button><!-- btn btn-primary Finish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->

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

    if(isset($_POST['submit'])){
        
        $c_username = $_SESSION['customer_username'];
        
        $c_old_pass = sha1($_POST['old_pass']);
        
        $c_new_pass = $_POST['new_pass'];
        
        $c_new_pass_again = $_POST['new_pass_again'];
        
        $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
        
        $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
        
        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
        
        if($check_c_old_pass==0){
            
            echo "<script>alert('Mật khẩu sai, vui lòng thử lại')</script>";
            
        }
        
        elseif($c_new_pass!=$c_new_pass_again){
            
            echo "<script>alert('Mật khẩu mới của bạn không khớp, vui lòng thử lại')</script>";
            
        }
        else{

            $update_c_pass = "update customers set customer_pass='".sha1($c_new_pass)."' where customer_username='$c_username'";
        
            $run_c_pass = mysqli_query($con,$update_c_pass);
            
            if($run_c_pass){
                
                echo "<script>alert('Đổi mật khẩu thành công')</script>";
                
                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                
            }
            
        }
        
    }

?>