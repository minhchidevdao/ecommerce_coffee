<center>
    <!-- center Begin -->

    <h1 style="color: #897761;">Đơn hàng </h1>



</center>
<!--center Finish -->

<hr>


<div class="table-responsive">
    <!-- table-responsive Begin -->

    <table class="table table-bordered table-hover">
        <!-- table table-bordered table-hover Begin -->

        <thead>
            <!-- thead Begin -->

            <tr>
                <!-- tr Begin -->

                <th>Đơn hàng:</th>
                <th>Tổng tiền hoá đơn: </th>
                <th>Mã hoá đơn: </th>
                <th>Số lượng: </th>
                <th>Khối lượng</th>
                <th>Ngày đặt: </th>
                <th>Đã thanh toán / Chưa thanh toán:</th>
                <th>Trạng thái: </th>

            </tr><!-- tr Finish -->

        </thead><!-- thead Finish -->

        <tbody>
            <!-- tbody Begin -->

            <?php

            $customer_session = $_SESSION['customer_username'];

            $get_customer = "select * from customers where customer_username='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $get_orders = "select * from customer_orders where customer_id='$customer_id'";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['order_id'];

                $due_amount = $row_orders['due_amount'];
                // $code_order = rand(0,9999); // mã sản phẩm random

                $invoice_no = $row_orders['invoice_no'];

                $qty = $row_orders['qty'];

                $size = $row_orders['size'];

                $order_date = substr($row_orders['order_date'], 0, 11);

                $order_status = $row_orders['order_status'];

                $i++;

                if ($order_status == 'Pending') {

                    $order_status = 'Chưa xác nhận thanh toán';
                } else {

                    $order_status = 'Đã xác nhận thanh toán';
                }

            ?>

                <tr>
                    <!--  tr Begin  -->

                    <th> <?php echo $i; ?> </th>
                    <td> <?php echo $due_amount; ?> đ </td>
                    <td> <?php echo $invoice_no; ?> </td>
                    <td> <?php echo $qty; ?> </td>
                    <td> <?php echo $size; ?> </td>
                    <td> <?php echo $order_date; ?> </td>
                    <td> <?php echo $order_status; ?> </td>

                    <td>

                        <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-warning btn-sm"> Thanh toán </a>

                    </td>

                </tr><!--  tr Finish  -->

            <?php } ?>

        </tbody><!-- tbody Finish -->

    </table>
    <!--table table-bordered table-hover Finish -->

</div>
<!--table-responsive Finish -->