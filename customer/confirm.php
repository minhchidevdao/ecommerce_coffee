<?php 

session_start();

if(!isset($_SESSION['customer_username'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Store Coffee</title>
    <link rel="icon" href="/images/beans.png" type="image/png">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div id="top">
        <!-- Top Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-8 offer">
                <!-- col-md-6 offer Begin -->

                <a href="#" class="btn btn-success btn-sm">

                    <?php 
                   
                   if(!isset($_SESSION['customer_username'])){
                       
                        echo "Xin chào: Khách";
                       
                   }else{
                       
                       echo "Xin chào: " . $_SESSION['customer_username'] . "";
                       
                   }
                   
                   ?>

                </a>
                <a href="checkout.php">Có <?php items(); ?> trong giỏ hàng | Tổng giá: <?php total_price(); ?> </a>

            </div><!-- col-md-6 offer Finish -->

            <div class="col-md-4">
                <!-- col-md-6 Begin -->

                <ul class="menu">
                    <!-- cmenu Begin -->

                    <li>
                        <a href="../cart.php">Giỏ hàng</a>
                    </li>

                    <li>
                        <?php 
                        
                            if(!isset($_SESSION['customer_username'])){
                                
                                echo "<a href='../customer_register.php'> Đăng ký </a>";
                                
                            }else{
                                
                                echo "<a href='my_account.php?my_orders'> ".$_SESSION['customer_username']." </a>";
                                
                            }
                        
                        ?>
                    </li>
                    
                    <li>
                        <a href="../checkout.php">
                            
                            <?php 
                            
                                if(!isset($_SESSION['customer_username'])){
                        
                                    echo "<a href='checkout.php'> Đăng nhập </a>";

                                }else{

                                    echo " <a href='logout.php'> Đăng xuất </a> ";

                                }
                            
                            ?>
                            
                        </a>
                    </li>

                </ul><!-- menu Finish -->

            </div><!-- col-md-6 Finish -->

        </div><!-- container Finish -->

    </div><!-- Top Finish -->

    <div id="navbar" class="navbar navbar-default">
        <!-- navbar navbar-default Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="navbar-header">
                <!-- navbar-header Begin -->

                <a href="../index.php" class="navbar-brand home">
                    <!-- navbar-brand home Begin -->
                    <img src="images/logo_minhchi.png" style="height: 50px; width:60px" alt="Logo" class="hidden-xs">
                    <img src="images/logo_minhchi.png" style="height: 50px; width:60px" alt="Logo" class="visible-xs">

                </a><!-- navbar-brand home Finish -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div><!-- navbar-header Finish -->

            <div class="navbar-collapse collapse" id="navigation">
                <!-- navbar-collapse collapse Begin -->

                <div class="padding-nav">
                    <!-- padding-nav Begin -->

                    <ul class="nav navbar-nav left">
                        <!-- nav navbar-nav left Begin -->

                        <li>
                            <a href="../index.php"><i class="fa fa-home"></i> Trang chủ</a>
                        </li>
                        <li>
                            <a href="../shop.php">Cửa hàng</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php"><?php echo $_SESSION['customer_username']; ?></a>
                        </li>
                        <li>
                            <a href="../cart.php">Giỏ hàng</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->

                <a href="../cart.php" class="btn navbar-btn btn-primary right">
                    <!-- btn navbar-btn btn-primary Begin -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> sản phẩn trong giỏ hàng</span>

                </a><!-- btn navbar-btn btn-primary Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse"
                        data-target="#search">
                        <!-- btn btn-primary navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-primary navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->

                    <form method="get" action="results.php" class="navbar-form">
                        <!-- navbar-form Begin -->

                        <div class="input-group">
                            <!-- input-group Begin -->

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <!-- btn btn-primary Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

            </div><!-- navbar-collapse collapse Finish -->

        </div><!-- container Finish -->

    </div><!-- navbar navbar-default Finish -->

    <div id="content">
        <!-- #content Begin -->
        <div class="container">
            <!-- container Begin -->
            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <ul class="breadcrumb">
                    <!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->

            <div class="col-md-3">
                <!-- col-md-3 Begin -->

                <?php 
    
    include("includes/sidebar.php");
    
    ?>

            </div><!-- col-md-3 Finish -->

            <div class="col-md-9">
                <!-- col-md-9 Begin -->

                <div class="box">
                    <!-- box Begin -->

                    <h1 alignt="center"> Vui lòng xác nhận thanh toán của bạn</h1>

                    <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label> Mã hoá đơn: </label>
                            <?php $code_order = rand(0,99999999); ?>

                            <input type="text" class="form-control" name="invoice_no"  required value="<?php echo $code_order ?>">

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->
                            <?php 
                            
                            $get_orders = "select * from customer_orders where order_id='$order_id'";

                            $run_orders = mysqli_query($con, $get_orders);

                            $row_orders = mysqli_fetch_array($run_orders);

                            $due_amount = $row_orders['due_amount'];

                            ?>
                            <label> Tổng tiền hoá đơn: </label>
                            <!-- <label type="text" class="form-control" name="amount_sent" required value="VNĐ"><?php //echo $due_amount ?>VNĐ</label> -->

                            <input type="text" class="form-control" name="amount_sent" required value="<?php echo $due_amount ?>VNĐ">

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label> Chọn phương thức thanh toán: </label>

                            <select name="payment_mode" class="form-control">
                                <!-- form-control Begin -->

                                <option> Thanh toán bằng tiền mặt</option>
                                <option> Chuyển khoản khi giao hàng</option>


                            </select><!-- form-control Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label> Địa chỉ đặt hàng </label>

                            <input type="text" class="form-control" name="consignee_address" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label> Số điện thoại</label>

                            <input type="text" class="form-control" name="phone_number" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label> Người nhận </label>

                            <input type="text" class="form-control" name="consignee" required>

                        </div><!-- form-group Finish -->


                        <div class="text-center">
                            <!-- text-center Begin -->

                            <button class="btn btn-primary btn-lg" name="confirm_payment">
                                <!-- tn btn-primary btn-lg Begin -->

                                <i class="fa fa-user-md"></i> Xác nhận thanh toán

                            </button><!-- tn btn-primary btn-lg Finish -->

                        </div><!-- text-center Finish -->

                    </form><!-- form Finish -->

                    <?php 
                   
                        if(isset($_POST['confirm_payment'])){
                            $update_id = $_GET['update_id'];
                            $invoice_no = $_POST['invoice_no'];
                            $amount = $_POST['amount_sent'];
                            $payment_mode = $_POST['payment_mode'];
                            $consignee_address = $_POST['consignee_address'];
                            $phone_number = $_POST['phone_number'];
                            $consignee = $_POST['consignee'];
                            
                            // $payment_date = NOW();
                            
                            $complete = "Complete";
                            
                            $insert_payment = "insert into payments (invoice_no, amount, payment_mode, consignee_address, phone_number, consignee, payment_date) values ('$invoice_no', '$amount', '$payment_mode', '$consignee_address', '$phone_number', '$consignee',NOW())";

                            // echo $insert_payment;

                            // echo "<h1>$order_id</h1>";
                            
                            $run_payment = mysqli_query($con,$insert_payment);
                            
                            $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                            
                            $run_customer_order = mysqli_query($con,$update_customer_order);
                            
                            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                            
                            $run_pending_order = mysqli_query($con,$update_pending_order);
                            
                            if($run_pending_order){
                                
                                echo "<script>alert('Cảm ơn bạn đã mua hàng, đơn đặt hàng của bạn sẽ được giao trong thời gian sớm nhất')</script>";
                                
                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                                
                            }
                            
                        }
                  
                    ?>

                </div><!-- box Finish -->

            </div><!-- col-md-9 Finish -->

        </div><!-- container Finish -->
    </div><!-- #content Finish -->

    <?php 
    
    include("includes/footer.php");
    
    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>

</html>
<?php } ?>
<?php
    if (isset($_GET['search'])) {
        $search = $_GET['user_query'];
        $_SESSION['user_query'] = $search;
        echo "<script>window.open('results.php','_self')</script>";
    }
?>