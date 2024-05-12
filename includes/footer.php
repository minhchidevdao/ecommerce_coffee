<?php
include("db.php");
// include("../functions/functions.php");

?>

<?php 


    
    // $product_id = $_GET['pro_id'];
    // echo "<h1>$pro_id</h1>"
    


?>

<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4 style="color:aliceblue;">Trang</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Giỏ hàng</a></li>
                    <li><a href="shop.php">Cửa hàng</a></li>
                    <li><a href="customer/my_account.php">Tài khoản</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4 style="color:aliceblue;">Người dùng</h4>
                
                <ul><!-- ul Begin -->
                    <?php 
                           
                        if(!isset($_SESSION['customer_username'])){
                               
                            echo"<a href='checkout.php'>Đăng nhập</a>";
                               
                        }
                        else{
                               
                            echo"<a href='customer/my_account.php?my_orders'>".$_SESSION['customer_username']."</a>"; 
                               
                        }
                           
                    ?>
                    <li><a href="customer_register.php">Đăng ký</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4 style="color:aliceblue;">Danh mục sản phẩm hàng đầu</h4>
                
                <ul><!-- ul Begin -->
                <?php 
                    
                    $get_p_cats = "select * from product_categories";
                
                    $run_p_cats = mysqli_query($con,$get_p_cats);
                
                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                        
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        
                        $p_cat_title = $row_p_cats['p_cat_title'];
                        
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?p_cat=$p_cat_id'>
                                
                                    $p_cat_title
                                
                                </a>
                            
                            </li>
                        
                        ";
                        
                    }
                
                ?>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4 style="color:aliceblue;">Về chúng tôi</h4>
                
                <p style="color:aliceblue;"><!-- p Start -->
                    
                    <!-- <strong>Call me Su Media inc.</strong> -->
                    
                    <br/><strong>Shop</strong>
                    <br/><strong>Địa chỉ cửa hàng:</strong>Bắc Từ Liêm,<br>Hà Nội, Việt Nam
                    <br/><strong>SĐT của hàng:</strong> 012345678
     
                    
                </p><!-- p Finish -->
                

                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12264.070629553396!2d105.77014985408128!3d21.068620488240523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1702397338812!5m2!1svi!2s" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2023 Store @All Rights Reserve</p>
            
        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-right">Theme by: <a href="#">shop</a></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->
<script src="/js/jquery-331.min.js"></script>
<script src="/js/bootstrap-337.min.js"></script>

