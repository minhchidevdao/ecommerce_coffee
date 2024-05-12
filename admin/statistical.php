<link rel="stylesheet" href="css/morris.css">
<?php
    
    if(!isset($_SESSION['admin_username'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Bảng điều khiển / Thống kê bán hàng
                
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
                    <!-- <i class="fas fa-analytics"></i> -->
                    <i class="fa fa-bar-chart"></i>  Thống kê bán hàng
                    
                </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <div id="myfirstchart" style="height: 250px;"></div>
                    <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->

                            <tr><!-- tr begin -->

                                <th> STT: </th>
                                <th> Ngày: </th>
                                <th> Tiền hoá đơn: </th>
                                <th> Số lượng: </th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <tr><!-- tr begin -->

                            <?php
                                        $sql_statistical = "SELECT * FROM `customer_orders`";
                                        $run_statistical = mysqli_query($con,$sql_statistical);
                                        $i = 0;
                                while($row_statistical = mysqli_fetch_array($run_statistical)){
                                    $i++;
                                    $order_date = $row_statistical['order_date'];
                                    $due_amount = $row_statistical['due_amount'];
                                    $qty = $row_statistical['qty'];
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$order_date."</td>";
                                    echo "<td>".$due_amount."</td>";
                                    echo "<td>".$qty."</td>";

                            ?>

                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->

                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script src="js/jquery.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.min.js"></script>
<?php 

    echo "
    
    <script>
        new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [";
            $sql_statistical = "SELECT * FROM `customer_orders`";
            $run_statistical = mysqli_query($con,$sql_statistical);
            while($row_statistical = mysqli_fetch_array($run_statistical)){
                $order_date = $row_statistical['order_date'];
                $due_amount = $row_statistical['due_amount'];
                $qty = $row_statistical['qty'];
                echo "{ year: '$order_date', sales: $due_amount, quantity: $qty },";
            }
        echo "
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['sales','quantity'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Doanh thu','Số lượng bán ra']
        // Customize the colors of the bars
        // barColors: function (row, series, type) {
        //     if (type === 'bar') {
        //         var colors = ['#300606', '#300606']; // Add more colors if needed
        //         return colors[row.x % colors.length];
        //     }
        //     return '#300606'; // Return a default color for other elements
        });
    </script>

    ";

?>
<!-- <script>
    new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008-10-21', sales: 15000, quantity: 20 },
    { year: '2009-05-11', sales: 16000, quantity: 30 },
    { year: '2010-07-21', sales: 17000, quantity: 40 },
    { year: '2011-04-21', sales: 18000, quantity: 50 },
    { year: '2012-09-21', sales: 19000, quantity: 60 },

  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['sales','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Doanh thu','Số lượng bán ra']
});
</script> -->
<?php } ?>