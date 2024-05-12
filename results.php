<?php 

    $active='Shop';
    include("includes/header.php");

?>

<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li style="color: aliceblue;">
                    <?php echo $_SESSION['user_query']; ?>
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3"> <!-- col-md-3 Begin -->

            <?php 
            
                include("includes/sidebar.php");
            
            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-9 Begin -->

            <div class='box'><!-- box Begin -->

                <h1 style="color: aliceblue;">Các sản phẩm có liên quan đến <?php echo $_SESSION['user_query']; ?>:</h1>

                </div><!-- box Finish -->

            <div id="products" class="row"><!-- row Begin -->

                <?php
                   
                        if(!isset($_GET['p_cat'])){
                            
                            if(!isset($_GET['cat'])){
                            
                                $per_page=6; 
                             
                                if(isset($_GET['page'])){
                                
                                    $page = $_GET['page'];
                                
                                }
                                else{
                                
                                    $page=1;
                                
                                }
                            
                                $start_from = ($page-1) * $per_page;

                                $search = $_SESSION['user_query'];
                                
                                $get_products = "SELECT * FROM `products` where product_title or product_keywords like '%$search%'";
                                
                                $run_products = mysqli_query($con,$get_products);

                                $count = mysqli_num_rows($run_products);

                                // echo $count;

                                if ($count <= 0) {
                                    echo " <h1 style='text-align: center;'>Không có sản phẩm nào</h1>";
                                } 
                                else{
                             
                                    while($row_products=mysqli_fetch_array($run_products)){
            
                                        $pro_id = $row_products['product_id'];
                                        
                                        $pro_title = $row_products['product_title'];
                                        
                                        $pro_price = $row_products['product_price'];
                                
                                        $pro_sale_price = $row_products['product_sale']; 
                                        
                                        $pro_img1 = $row_products['product_img1'];
                                
                                        $pro_label = $row_products['product_label'];
                                        if($pro_label == "sale"){
                                
                                            $product_price = " <del> $ $pro_price </del> ";
                                
                                            $product_sale_price = "/ $pro_sale_price đ";
                                
                                        }else{
                                
                                            $product_price = "  $pro_price đ ";
                                
                                            $product_sale_price = "";
                                
                                        }
                                
                                        if($pro_label == ""){
                                            
                                
                                        }else{
                                
                                            $product_label = "
                                            
                                                <a href='#' class='label $pro_label'>
                                                
                                                    <div class='theLabel'> $pro_label </div>
                                                    <div class='labelBackground'>  </div>
                                                
                                                </a>
                                            
                                            ";
                                
                                        }
                                        
                                        echo "
                                        
                                        <div class='col-md-4 col-sm-6 center-responsive'>
                                        
                                            <div class='product'>
                                            
                                                <a href='details.php?pro_id=$pro_id'>
                                                
                                                    <img class='img-responsive' src='admin/product_images/$pro_img1'>
                                                
                                                </a>
                                                
                                                <div class='text'>
                                                
                                                    <h3>
                                            
                                                        <a href='details.php?pro_id=$pro_id'>
                                
                                                            $pro_title
                                
                                                        </a>
                                                    
                                                    </h3>
                                                    
                                                    <p class='price'>
                                                    
                                                    $product_price &nbsp;$product_sale_price
                                                    
                                                    </p>
                                                    
                                                    <p class='button'>
                                                    
                                                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                
                                                            Chi tiết
                                
                                                        </a>
                                                    
                                                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                
                                                            <i class='fa fa-shopping-cart'></i> Thêm vào giỏ
                                
                                                        </a>
                                                    
                                                    </p>
                                                
                                                </div>
                                
                                                $product_label
                                            
                                            </div>
                                        
                                        </div>
                                        
                                        ";
                                        
                                    }
                                }
                        
                ?>

            </div><!-- row Finish -->

            <center>
                <ul class="pagination">
                    <!-- pagination Begin -->
                    <?php
                             
                        $query = "select * from products";
                                
                        $result = mysqli_query($con,$query);
                                
                        $total_records = mysqli_num_rows($result);
                                
                        $total_pages = ceil($total_records / $per_page);
                                
                        echo "
                            
                            <li>
                                
                                <a href='shop.php?page=1'> ".'Trang đầu'." </a>
                                
                            </li>
                            
                        ";
                                
                        for($i=1; $i<=$total_pages; $i++){
                                
                            echo "
                            
                                <li>
                                    
                                    <a href='shop.php?page=".$i."'> ".$i." </a>
                                    
                                </li>
                            
                            ";  
                                
                        };
                                
                        echo "
                            
                            <li>
                                
                                <a href='shop.php?page=$total_pages'> ".'Trang cuối'." </a>
                                
                            </li>
                            
                        ";
                                
                                }
                                
                            }
					 
					?>

                </ul><!-- pagination Finish -->
            </center>

            <?php 
               
               getpcatpro(); 
               
               getcatpro();
               
            ?>

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->

</div><!-- #content Finish -->
<?php
    if (isset($_GET['search'])) {
        $search = $_GET['user_query'];
        $_SESSION['user_query'] = $search;
        echo "<script>window.open('results.php','_self')</script>";
    }
?>