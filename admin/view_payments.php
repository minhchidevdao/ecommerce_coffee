<?php 
    
    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem hoá đơn thanh toán
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default" style=" border-color:#372525"><!-- panel panel-default begin -->
            <div class="panel-heading" style="background-color: #372525; border-color:#372525"><!-- panel-heading begin -->
               <h3 class="panel-title" style="color: antiquewhite;" ><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Xem hoá đơn thanh toán
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Đơn: </th>
                                <th> Mã hoá đơn: </th>
                                <th> Tổng tiền hoá đơn: </th>
                                <th> Phương thức thanh toán: </th>
                                <th> Địa chỉ: </th>
                                <th> Số điện thoại: </th>
                                <th> Tên người nhận: </th>
                                <th> Tên người nhận: </th>
                                <th> Xoá hoá đơn: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_payments = "select * from payments";
                                
                                $run_payments = mysqli_query($con,$get_payments);
          
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['payment_id'];
                                    
                                    $invoice_no = $row_payments['invoice_no'];
                                    
                                    $amount = $row_payments['amount'];
                                    
                                    $payment_mode = $row_payments['payment_mode'];
                                    
                                    $consignee_address = $row_payments['consignee_address'];

                                    $phone_number  = $row_payments['phone_number'];
                                    
                                    $consignee  = $row_payments['consignee'];
                                    
                                    $payment_date = $row_payments['payment_date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $amount; ?> đ</td>
                                <td> <?php echo $payment_mode; ?> </td>
                                <td> <?php echo $consignee_address; ?></td>
                                <td> <?php echo $phone_number; ?></td>
                                <td> <?php echo $consignee; ?> </td>
                                <td> <?php echo $payment_date; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_payment=<?php echo $payment_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Xoá
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>