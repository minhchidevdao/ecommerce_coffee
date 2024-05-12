<?php 
    
    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol style="color: antiquewhite; background-color: #372525;" class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Thêm loại sản phẩm
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div style="border-color:#372525 ;" class="panel panel-default"><!-- panel panel-default begin -->
            <div style="background-color: #372525;" class="panel-heading"><!-- panel-heading begin -->
                <h3 style="color:antiquewhite" class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Thêm loại sản phẩm
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"  style="background-color: #372525;"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label style="color:antiquewhite"  for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Tên loại sản phẩm 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="cat_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label style="color:antiquewhite" for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Mô tả loại sản phẩm 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea type='text' name="cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Thêm loại sản phẩm" name="submit" type="submit" class="form-control btn btn-warning">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['submit'])){
              
              $cat_title = $_POST['cat_title'];
              
              $cat_desc = $_POST['cat_desc'];
              
              $insert_cat = "insert into categories (cat_title,cat_desc) values ('$cat_title','$cat_desc')";
              
              $run_cat = mysqli_query($con,$insert_cat);
              
              if($run_cat){
                  
                  echo "<script>alert('Loại sản phẩm mới đã được thêm')</script>";
                  
                  echo "<script>window.open('index.php?view_cats','_self')</script>";
                  
              }
              
          }

?>

<?php } ?>