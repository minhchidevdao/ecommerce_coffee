<?php 


    $active='Cart';
    include("includes/header.php");

?>
 
    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
            


                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php" style="color: antiquewhite;"><i class="fa fa-home"></i> Trang chủ</a>
                    </li>
                    <li style="color: antiquewhite;">
                        Cửa hàng
                    </li>
                    
                    <li>
                        <a style="color: antiquewhite;" href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                    </li>
                    <li style="color: antiquewhite;"> <?php echo $pro_title; ?> </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-12"><!-- col-md-12 Begin -->
                <div id="productMain" class="row"><!-- row Begin -->
                    <div class="col-sm-6"><!-- col-sm-6 Begin -->
                        <div id="mainImage"><!-- #mainImage Begin -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                                <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                    <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol><!-- carousel-indicators Finish -->
                                
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                    </div>
                                </div>
                                
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a><!-- left carousel-control Finish -->
                                
                                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a><!-- right carousel-control Finish -->
                                
                            </div><!-- carousel slide Finish -->
                        </div><!-- mainImage Finish -->

                            <?php echo $product_label; ?>

                    </div><!-- col-sm-6 Finish -->
                    
                    <div class="col-sm-6"><!-- col-sm-6 Begin -->
                        <div class="box"><!-- box Begin -->
                            <h1 class="text-center" style="color: antiquewhite;"> <?php echo $pro_title; ?> </h1>
                            
                            <?php add_cart(); ?>
                            
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                                <div class="form-group"><!-- form-group Begin -->
                                    <label style="color: antiquewhite;" for="" class="col-md-5 control-label">Số lượng sản phẩm</label>
                                    
                                    <div class="col-md-7"><!-- col-md-7 Begin -->
                                            <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select><!-- select Finish -->
                                    
                                        </div><!-- col-md-7 Finish -->
                                    
                                </div><!-- form-group Finish -->
                                
                                <div class="form-group"><!-- form-group Begin -->
                                    <label style="color: antiquewhite;" class="col-md-5 control-label">Khối lượng</label>
                                    
                                    <div class="col-md-7"><!-- col-md-7 Begin -->
                                        
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->
                                            
                                            <!-- <option disabled selected>Select a Size</option> -->
                                            <option>500g</option>
                                            <option>1KG </option>
                                       
                                            
                                        </select><!-- form-control Finish -->
                                        
                                    </div><!-- col-md-7 Finish -->
                                </div><!-- form-group Finish -->
                                
                                    <?php 

                                        if($pro_label == "sale"){

                                            echo "

                                                <p class='price sale-price'>

                                                GIÁ: <del> $pro_price đ </del><br/>

                                                SALE:     $pro_sale_price đ

                                                </p>

                                            ";

                                        }else{

                                            echo "

                                                <p class='price sale-price'>

                                                GIÁ: $pro_price đ

                                                </p>

                                            ";

                                        }

                                    ?>
                                
                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Thêm vào giỏ hàng</button></p>
                                
                            </form><!-- form-horizontal Finish -->
                            
                        </div><!-- box Finish -->
                        
                        <div class="row" id="thumbs"><!-- row Begin -->
                            
                            <div class="col-xs-4"><!-- col-xs-4 Begin -->
                                <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                    <img src="admin/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->
                            
                            <div class="col-xs-4"><!-- col-xs-4 Begin -->
                                <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                    <img src="admin/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->
                            
                            <div class="col-xs-4"><!-- col-xs-4 Begin -->
                                <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                    <img src="admin/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->
                            
                        </div><!-- row Finish -->
                        
                    </div><!-- col-sm-6 Finish -->
                    
                    
                </div><!-- row Finish -->
                
                <div class="box" id="details"><!-- box Begin -->

                
                        
                <h4 style="color:aliceblue;">Chi tiết sản phẩm</h4>

                        <div style="color:aliceblue;">
                        <p style="color:#ffffff;">
                        
                            <?php echo $pro_desc; ?> 
                        
                        </p>
                        </div>
                    
                    
                        <h4 style="color: antiquewhite;">khối lượng</h4>
                        
                        <ul>
                            <li style="color: antiquewhite;">Khối lượng tịnh 500g</li>
                            <li style="color: antiquewhite;">Khối lượng tịnh 1 KG</li>

                        </ul>  
                        
                        <hr>
                    
                </div><!-- box Finish -->
                
                <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                    
                    <?php 
                    
                        $get_products = "select * from products order by rand() LIMIT 0,4";
                    
                        $run_products = mysqli_query($con,$get_products);
                    
                    while($row_products=mysqli_fetch_array($run_products)){
                            
            
                        $pro_id = $row_products['product_id'];
                                        
                        $pro_title = $row_products['product_title'];
                        
                        $pro_price = $row_products['product_price'];
                
                        $pro_sale_price = $row_products['product_sale']; 
                        
                        $pro_img1 = $row_products['product_img1'];
                
                        $pro_label = $row_products['product_label'];
                        // $pro_desc   = $row_products['product_desc'];
                        
                        if($pro_label == "sale"){
                
                            $product_price = " <del> $pro_price đ </del> ";
                
                            $product_sale_price = "/ $pro_sale_price đ ";
                
                        }
                        else{
                
                            $product_price = " $pro_price đ ";
                
                            $product_sale_price = "";
                
                        }
                
                        if($pro_label == ""){
                            
                
                        }
                        else{
                
                            $product_label = "
                            
                                <a href='#' class='label $pro_label'>
                                
                                    <div class='theLabel'> $pro_label </div>
                                    <div class='labelBackground'>  </div>
                                
                                </a>
                            
                            ";
                
                        }
                        
                        echo "
                
                
                        
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
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
                    
                    ?>
                    
                </div><!-- #row same-heigh-row Finish -->
                
            </div><!-- col-md-12 Finish -->
            
        </div><!-- container Finish -->
    </div><!-- #content Finish -->
   
    <?php 
    
        include("includes/footer.php");
    
    ?>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
