<?php
$checkoutuser = getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
$rp = (int)$checkoutuser[0]['total_ref'] - (int)$checkoutuser[0]['total_used_ref'];
?>
<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Checkout</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="<?= base_url('Index/checkoutpay') ?>" method="POST">
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        <h5 class="text-danger">
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                        </h5>
                    </div>
                    <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                        <!-- checkout content Start -->
                        <div class="ec-checkout-content">
                            <div class="ec-checkout-inner">

                                <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                    <div class="ec-checkout-block ec-check-bill">
                                        <h3 class="ec-checkout-title">Billing Details</h3>
                                        <div class="ec-bl-block-content">
                                            <div class="ec-check-subtitle">Checkout Options</div>

                                            <div class="ec-check-bill-form">

                                                <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
                                                <div class="ec-bill-wrap">
                                                    <label>Full name</label>

                                                    <input type="text" class="form-control" name="name" placeholder="Name:" value="<?= $login[0]['fullname'] ?>" required>
                                                </div>
                                                <div class="ec-bill-wrap ">
                                                    <label>Email ID</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email:" value="<?= $login[0]['emailid'] ?>" required>
                                                </div>
                                                <div class="ec-bill-wrap ">
                                                    <label>Contact No.</label>
                                                    <input type="text" class="form-control" name="number" placeholder="Phone No:" value="<?= $login[0]['contact'] ?>" required>
                                                </div>



                                                <div class="ec-bill-wrap" style="display:none">
                                                    <label>State</label>

                                                    <select class="form-control" name="state" required id="state" style="border: 1px solid #ededed;">
                                                        <option value="">Select state </option>
                                                        <?php
                                                        if ($state_list) {
                                                            foreach ($state_list as $state) {
                                                        ?>
                                                                <option value="<?= $state['state_id'] ?>" <?= (($state['state_id'] ==  '21') ? 'Selected' : '') ?>><?= $state['state_name'] ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>

                                                <div class="ec-bill-wrap ">
                                                    <label>City</label>

                                                    <select name="city" class="form-control" id="city" style="border: 1px solid #ededed;">

                                                        <?php
                                                        //   if($login[0]['city'] != '' ){
                                                        ?>

                                                        <option value="<?= $city[0]['id'] ?>" Selected> <?= $city[0]['name'] ?></option>

                                                        <?php
                                                        //}
                                                        ?>

                                                    </select>



                                                </div>


                                                <div class="ec-bill-wrap "><br>
                                                    <label>Pincode</label>
                                                    <input type="text" class="form-control" name="pincode" placeholder="Pincode*" value="<?= $login[0]['pincode'] ?>">
                                                </div>
                                                <div class="ec-bill-wrap">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Address*" value="<?= $login[0]['address'] ?>" required>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-checkout-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Product List</h3>
                                </div>
                                <div id="cart3">

                                </div>
                            </div>
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Summary</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-summary">
                                        <!--<div>-->
                                        <!--    <span class="text-left">Total</span>-->
                                        <!--    <span class="text-right" id="totalpricehm"></span>-->
                                        <!--</div>-->
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right">Free Delivery</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Coupon Discount</span>
                                            <span class="text-right"><a class="ec-checkout-coupan">Apply Coupon</a></span>
                                        </div>
                                        <div class="ec-checkout-coupan-content">

                                            <input class="ec-coupan" type="text" placeholder="Enter Your Coupon Code" name="promocode" id="promocode" value="">
                                            <input class="ec-coupan" type="hidden" placeholder="Enter Your Coupon Code" name="promocode_amt" id="promocode_amt" value="">
                                            <p class="ec-coupan-btn badge badge-primary m-2" id="promo">Apply</p>
                                            <p id="promomsg" class="text-green"></p>
                                            <?php

                                            if (!empty($promocode)) {
                                                foreach ($promocode as $promo) {
                                            ?>

                                                    <div>
                                                        <div class="ec-sb-title">
                                                            <h3 class="ec-sidebar-title"><?= $promo['title'] ?> <span class="save">You Save ₹ <?= $promo['deduction'] ?>/-</span></h3>
                                                        </div>
                                                        <div class="ec-sb-block-content">
                                                            <div class="ec-checkout-pay">
                                                                <div class="ec-pay-desc"><?= $promo['description'] ?>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>

                                            <?php

                                                }
                                            }
                                            ?>


                                        </div>
                                        <div class="ec-checkout-summary-total">
                                            <span class="text-left">Total Amount<br>(after coupon)</span>
                                            <span class="text-right">Rs. <span id="cartprice"><?php echo $this->cart->format_number($this->cart->total()); ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Payment Method</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-pay">
                                        <div class="ec-pay-desc">Please select the preferred payment method to use on this
                                            order.</div>
                                        <!-- <form action="#"> -->
                                        <span class="ec-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="payment_type" value="0" style="height: 20px;width:20px;" />
                                                <label for="pay1">Cash On Delivery</label>
                                                <br>
                                                <input type="radio" id="pay1" name="payment_type" value="1" checked style="height: 20px;width:20px;" />
                                                <label for="pay1"> Online Payment</label>
                                                <br>
                                                <span>
                                                    <input type="checkbox" value="" checked style="height: 20px;width:20px;">
                                                    <label>
                                                        I've read and accept <a href="<?= base_url('terms_condition') ?>">Terms & Condition</a>
                                                    </label>
                                                </span>
                                            </span>

                                            <div class="ec-checkout-rightside col-lg-12 col-md-12">
                                                <input class="form-control" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">

                                                <?php $this->session->set_flashdata('mytotalamount', $this->cart->total()); ?>

                                                
                                                <input class="form-control" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">
                                                <span class="ec-check-order-btn">
                                                    <button type="submit" class="btn btn-primary">Place Order </button>
                                                </span>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </form>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $(document).on('click', '#promo', function() {
            promo();
        });

        $(document).on('click', '#referalpointcheck', function() {
            load_checkoutbar();
        });
    </script>

</body>

</html>