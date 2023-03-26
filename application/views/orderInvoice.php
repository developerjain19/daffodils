<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>
<style>
    @media only screen and (max-width: 600px) {
        .tabrow {
            display: block;
        }
    }

    .scroll {
        overflow-x: scroll;
        scrollbar-width: thin;
    }
</style>

<body>

    <?php include('includes/menu.php'); ?>

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Your order Invoice</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Your order Invoice</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="product-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger" onclick="printDiv('printableArea')" />print Invoice</button>
                </div>
                <div class="col-md-12" id="printableArea">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($orderDetails)) {
                                                foreach ($orderDetails as $row) {

                                            ?>
                                                    <tr>
                                                        <td class="tabrow">
                                                            <h6 class="" style="border-bottom: 1px solid grey;">Sold to</h6><br>
                                                            <?php echo $row['name']; ?><br>
                                                            <?php echo $row['number']; ?><br>
                                                            <?php echo $row['email']; ?>
                                                        </td>
                                                        <td class="tabrow">
                                                            <h6 class="" style="border-bottom: 1px solid grey;">Shipping Address</h6><br><?php echo $row['address']; ?>, <?php echo $row['city']; ?> , <?php echo $row['state']; ?>
                                                        </td>
                                                        <td class="tabrow">
                                                            <h6 class="" style="border-bottom: 1px solid grey;">Invoice details</h6>
                                                            <br>Order no. - <?php echo   $row['orderId']; ?>

                                                            <br>Invoice no. - VED<?php echo  preg_replace("/[^0-9]/", "", $row['create_date']); ?><?php echo $row['id']; ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <th colspan="5" class="tabrow">We are pleased to place the order as follows</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 scroll">Your Product list
                                    <table id="order-listing" class="table">
                                        <thead>

                                            <tr>
                                                <th style="width: 5%;">S No</th>

                                                <th style="width: 35%;">Product</th>
                                                <th style="width: 20%;">Unit Price </th>
                                                <th style="width: 20%;">Qty</th>
                                                <th style="width: 20%;">Product value </th>
                                            </tr>
                                        </thead>
                                        <tbody style="overflow-x: scroll;">
                                            <?php
                                            $i = 1;
                                            if (!empty($orderProductDetails)) {
                                                foreach ($orderProductDetails as $prorow) {
                                                    // print_r($prorow);
                                            ?>

                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $prorow['product_name']; ?></td>
                                                        <td>Rs. <?php echo $prorow['product_price']; ?> </td>
                                                        <td><?php echo $prorow['product_quantity']; ?></td>
                                                        <td>Rs. <?php echo $prorow['total_pro_amt']; ?> </td>
                                                    </tr>

                                            <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="4">Sub total</td>
                                                <td>Rs. <?php echo $row['totalamount']; ?> </td>
                                            </tr>



                                            <!-- <tr>
                                                <td colspan="4">Shipping Charges</td>
                                                <td>Rs. <?= $row['user_shipping_charges']; ?> </td>
                                            </tr> -->

                                            <?php

                                            if ($orderDetails[0]['promocode'] != '') {
                                            ?>
                                                <tr>
                                                    <td colspan="4">Coupon</td>
                                                    <td>- <?= $orderDetails[0]['promocode_amt'] ?> (<?= $orderDetails[0]['promocode'] ?>) </td>
                                                </tr>
                                            <?php
                                            }

                                            ?>
                                            <tr>
                                                <td colspan="4">Grand total</td>
                                                <td>Rs. <?php echo $row['grand_total']; ?> </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><br><br><br>
                   
                </div>
            </div>

        </div>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>



    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>


</body>

</html>