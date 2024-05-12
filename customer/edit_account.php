<?php 

$customer_session = $_SESSION['customer_username'];

$get_customer = "select * from customers where customer_username='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>
<h1 align="center">Edit Your Account</h1>

<form action="" method="POST" enctype="multipart/form-data"><!-- form Begin -->

    <div class="form-group">

        <label> Họ và tên: </label>
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
        
    </div>

    <div class="form-group">

        <label> Email: </label>
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div>

    <div class="form-group">

        <label> Số điện thoại: </label>
        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

    </div>

    <div class="form-group">

        <label> Địa chỉ: </label>
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div>

    <div class="form-group">

        <label> Ảnh đại diện: </label>

        <input  name="c_image" type="file" class="form-control form-height-custom">

        <!-- <input name="product_img3" type="file" class="form-control form-height-custom"> -->

        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" width="240" height="240" alt="Costumer Image">
        
    </div>

    <div class="text-center"><!-- text-center Begin -->

        <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Cập nhật

        </button><!-- btn btn-primary Finish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];

    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];

    if(is_uploaded_file($_FILES['c_image']['tmp_name'])){
    
        $c_image = $_FILES['c_image']['name'];
        
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        
        move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
        
        $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id' ";
        
        $run_customer = mysqli_query($con,$update_customer);
        
        if($run_customer){
            
            echo "<script>alert('Tài khoản của bạn đã được cập nhật')</script>";

            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
            
        }
    }
    else{
        $update_customer = "update customers set customer_name=N'$c_name',customer_email='$c_email',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$update_id' ";
        
        $run_customer = mysqli_query($con,$update_customer);
        
        if($run_customer){
            
            echo "<script>alert('Tài khoản của bạn đã được cập nhật')</script>";

            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
            
        }
    }
}

?>