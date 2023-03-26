<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>
<style>
    @media only screen and (max-width: 600px) {
        .badge {
            padding: 5px;
            font-size: 10px;
        }
    }
</style>

<body>

    <?php include('includes/menu.php'); ?>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Order history</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Order history</li>
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
            <p class="text text-warning">
                <?php
                if ($this->session->has_userdata('msg')) {
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg');
                }
                ?>
            </p>
            <?php

            if (!empty($orderDetails)) {
                foreach ($orderDetails as $row) {
            ?>
                    <div class="card m-3">
                        <div class="card-body shadow">
                            <div class="row mt-3 p-2">
                                <div class="col-sm-9 col-lg-9">
                                    <h4>Order Date - <?= convertDatedmy($row['create_date']); ?></h4>
<h6>Order ID - <?= $row['orderId']; ?> </h6>

                                </div>
                                <div class="col-sm-3 col-lg-3 ">

                                    <?php
                                    if ($row['status'] == '1' || $row['status'] == '5' || $row['status'] == '6') {

                                        if ($row['awb_assign_status'] == 1) {
                                    ?>

                                            <a href="<?= ('https://vedicos.shiprocket.co/tracking/' . $row['awb_code']) ?>" class="badge p-1 badge-info" target="_blank"> Track Order</a>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9 col-lg-9">
                                    <?php
                                    $checkoutProduct = getRowById('checkout_product', 'checkoutid', $row['id']);
                                    if (!empty($checkoutProduct)) {
                                        foreach ($checkoutProduct as $productRow) {
                                            if (!empty($productRow)) {
                                                $productRowData = getRowById('products', 'product_id', $productRow['product_id'])[0];
                                                // print_r($productRowData);
                                    ?>
                                                <div class="col-sm-12 col-lg-12 text-center ">
                                                    <div class="products-item shadow p-2 order-border ">
                                                        <div class="top row ">
                                                            <div class="col-md-2">
                                                                <img style="object-fit: cover;height:50px;" src="<?= base_url(); ?>uploads/products/<?= $productRow['product_img']; ?>" alt="Products">

                                                            </div>
                                                            <div class="col-md-3">
                                                                <b>
                                                                    <h6 class="text-uppercase">
                                                                        <a href="<?= base_url(); ?>index/product_details/<?= $productRowData['product_id']; ?>" target="_blank"><?= $productRow['product_name']; ?></a>
                                                                    </h6>
                                                                </b>
                                                            </div>
                                                            <div class="col-md-2 text-center">
                                                                <span><b>Rs. <?= $productRow['product_price']; ?> X <?= $productRow['product_quantity']; ?>
                                                                    </b></span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span> <b>
                                                                        Total - Rs. <?= ($productRow['product_price'] * $productRow['product_quantity']); ?> /- </b></span>
                                                            </div>

                                                            <?php if ($row['status'] == '3') { ?>
                                                                <div class="col-md-2">
                                                                    <a class="badge p-1 badge-secondary" target="_blank" href="<?= base_url('Index/product_review/' . $productRow['product_id']) ?>" data-id="<?= $productRowData['product_id'] ?>">Add Review</a></div>

                                                                <?php
                                                            }
                                                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php }
                                        }
                                    } ?>
                                    <div class="col-sm-12">
                                        <br> <br>
                                        <b>Grand Total - Rs. <?= $row['grand_total'] ?></b>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-3 ">

                                    Order Status - <br>
                                    <p class=" badge p-1 badge-<?= (($row['status'] == 0) ? 'info' : (($row['status'] == 1) ? 'warning' : (($row['status'] == 2) ? 'danger' : (($row['status'] == 3) ? 'success' : (($row['status'] == '4') ? 'warning' : (($row['status'] == '5') ? 'info' : (($row['status'] == '6') ? 'info' : (($row['status'] == '7') ? 'secondary' : (($row['status'] == '8') ? 'warning' : (($row['status'] == '9') ? 'warning' : '')))))))))) ?>  ">


                                        <?php echo (($row['status'] == '0') ? 'New order' : (($row['status'] == '1') ? 'On process' : (($row['status'] == '2') ? 'Canceled ' : (($row['status'] == '3') ? 'Order delivered' : (($row['status'] == '4') ? 'Cancelled and refunded' : (($row['status'] == '5') ? 'Shipment' : (($row['status'] == '6') ? 'On the way' : (($row['status'] == '7') ? 'Order Cancelled' : (($row['status'] == '8') ? 'Request for return' : (($row['status'] == '9') ? 'Order return initiated' : '')))))))))); ?>


                                    </p><br>
                                    
                                 <?php echo (($row['return_receipt'] == '') ? '' : 'Return Amount  - <a target="_blank" href="' . base_url('uploads/returnrequest/' . $row['return_receipt']) . '" class="btn btn-danger">View Receipt</a><br>'); ?>

                                    More Actions -<br>
                                    <a href="<?= base_url('index/orderDetails/' . $row['id']) ?>" class="badge p-1 badge-primary" target="_blank"> All Details</a>
                                    <hr>


                                    <?php if ($row['status'] == '3') {
                                        if (dateDiff(convertDatedmy($row['update_date']), setDateOnly()) <= 7) {
                                    ?>
                                            <a href="<?= base_url('index/orderInvoice/' . $row['id']) ?>" class="badge p-1 badge-danger" target="_blank"> View Invoice</a>

                                            <hr>

                                            <button id="" data-id="<?= $row['id'] ?>" class="returnpro text text-danger"> Return Order </button>

                                        <?php
                                        }
                                    } elseif ($row['status'] == '0' || $row['status'] == '1') {

                                        ?>

                                        <button id="" data-id="<?= $row['id'] ?>" class="cancelpro text text-danger"> Cancel order </button>


                                    <?php
                                    } else {
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo 'No Order History Found';
            }
            ?>


        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $('#refpoint').text(<?= $rp ?>);

        $('.cancelpro').click(function() {
            var id = $(this).data('id');
            console.log(id);

            if (confirm("Are you sure you want to cancel the order")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Index/cancelorder') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == '0') {
                            history.go(0);
                        } else {
                            alert('Not applicable');
                        }
                    }
                });
            }
        });
        $('.returnpro').click(function() {
            var id = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url('Index/returnorder') ?>",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    if (response == '0') {
                        history.go(0);
                    } else {
                        alert('Not applicable');
                    }
                }
            });
        });
        returnpro
    </script>

</body>

</html>