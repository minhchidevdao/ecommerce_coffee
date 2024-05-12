<?php 
    
    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Xem phản hồi
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <!-- <i class="fa fa-user"> -->
                    <i class="fa fa-user"></i>  Xem phản hồi
                    
                </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->

                            <tr><!-- tr begin -->

                                <th> Ý kiến: </th>
                                <th> Tên khách hàng: </th>
                                <th> Email khách hàng: </th>
                                <th> Tiêu đề: </th>
                                <th> Ý kiến của khách hàng: </th>
                                <th> Ngày góp ý: </th>
                                <th> Xoá góp ý: </th>
                                <th> Trả lời góp ý khách hàng: </th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_sender = "select * from sender";
                                
                                $run_sender = mysqli_query($con,$get_sender);
          
                                while($row_payments=mysqli_fetch_array($run_sender)){
                                    
                                    $sender_id = $row_payments['sender_id'];
                                    
                                    $sender_c_name = $row_payments['sender_c_name'];
                                    
                                    $sender_c_email = $row_payments['sender_c_email'];
                                    
                                    $sender_subject = $row_payments['sender_subject'];
                                    
                                    $sender_message = $row_payments['sender_message'];
                                    
                                    $sender_date = $row_payments['sender_date'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $sender_c_name; ?> </td>
                                <td> <?php echo $sender_c_email; ?> </td>
                                <td> <?php echo $sender_subject; ?> </td>
                                <td> <?php echo $sender_message; ?></td>
                                <td> <?php echo $sender_date; ?></td>
                                <td> 
                                     
                                    <a href="index.php?delete_sender=<?php echo $sender_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Xoá
                                    
                                    </a> 
                                     
                                </td>
                                <td> 
                                     
                                    <a href="index.php?reply_sender=<?php echo $sender_id; ?>">
                                     
                                        <i class="fa fa-paper-plane"></i> Trả lời
                                    
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