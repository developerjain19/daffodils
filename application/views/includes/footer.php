<footer class="ec-footer section-space-mt mt-0">
    <div class="footer-container">

        <div class="footer-offer">
            <div class="container">
                <div class="row">
                    <div class="text-center footer-off-msg">
                        <span>Upload your product list. we delivered all products to your doorstep </span><a href="<?= base_url() ?>upload-list" target="_blank" class=>Upload List</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-2 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assets/logo.png" alt=""><img class="dark-footer-logo" src="<?= base_url(); ?>assets/img/logo.png" alt="Site Logo" style="display: none;" /></a></div>

                            <!-- <p class="text-justify">
                                Should you encounter any bugs, glitches, lack of functionality, delayed deliveries, billing errors or other problems on the beta website, please email us on info@wholesalekiranawala.in
                            </p> -->

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>about">About us</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>contact">Contact us</a></li>

                                    <li class="ec-footer-link"><a href="<?= base_url() ?>product">Our Products</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <?php
                                    if ($this->session->has_userdata('login_user_id')) {
                                    ?>
                                        <li class="ec-footer-link"><a href="<?= base_url() ?>profile">My account</a></li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="ec-footer-link">
                                            <a href="<?= base_url('login'); ?>"> My Account </a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                    <li class="ec-footer-link"><a href="<?= base_url() ?>orders">Track your Order </a></li>
                                    <!-- <li class="ec-footer-link"><a href="<?= base_url() ?>wishlist">Wish List</a></li> -->
                                    <!-- <li class="ec-footer-link"><a href="<?= base_url() ?>consultation">My consult</a></li> -->
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>cart_checkout">My cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Quick Link</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>privacy_policy">Privacy policy </a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>returnPolicy">Return policy </a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>terms_condition">Term & condition</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url() ?>shipping_policy">Shipping policy</a></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Contact Details</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">Address: <?= $contactdetails[0]['address'] ?></li>
                                    <li class="ec-footer-link"><span>Call Us: </span><a href="tel:<?= $contactdetails[0]['f_contact'] ?>"><?= $contactdetails[0]['f_contact'] ?></a></li>
                                    <li class="ec-footer-link"><span>Email: </span><a href="mailto:<?= $contactdetails[0]['f_email'] ?>"><?= $contactdetails[0]['f_email'] ?></a>, <a href="mailto:<?= $contactdetails[0]['s_email'] ?>"><?= $contactdetails[0]['s_email'] ?></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->

                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy wcolor">Copyright © <?= date("Y") ?> <a class="site-name text-upper" href="<?= $base_url ?>">The Daffodils Farm<span>.</span></a></div>
                        </div>
                    </div>


                    <div class="col footer-copy  text-center">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="<?= $contactdetails[0]['facebook'] ?>" target="_blank"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="<?= $contactdetails[0]['twitter'] ?>" target="_blank"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="<?= $contactdetails[0]['instagram'] ?>" target="_blank"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="<?= $contactdetails[0]['linkedin'] ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-youtube" href="<?= $contactdetails[0]['youtube'] ?>" target="_blank"><i class="ecicon eci-youtube"></i></a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="<?= base_url(); ?>assets/images/icons/payment.png" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><img src="<?= base_url(); ?>assets/images/icons/cart.svg" class="svg_img header_svg" alt="cart" />
        </div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>

<div id="snackbar">Item Added Successfully</div>


<div id="ec-popnews-bg"></div>
<div id="ec-popnews-box">
    <?php
    if ($this->session->has_userdata('checkout')) { ?>


    <?php } else {
    ?>

        <div id="ec-popnews-close" style="z-index:9999"><i class="ecicon eci-close"></i></div>
    <?php
    } ?>
    <div class="row p-0 m-0">
        <div class="col-md-5 disp-no-767 p-0 m-0">
            <img src="<?= base_url(); ?>assets/img/heart-curve-live-thread.jpg" alt="newsletter" style="height: 100%;width: auto;object-fit: cover;">
        </div>

    </div>
</div>

<div class="sticky-icon">
    <a href="<?= base_url('cart-list')  ?>" class="Instagram "><i class="fa fa-shopping-cart"></i> Item <span class="totalitem"><?= $this->cart->total_items(); ?></span></a>
    <a href="https://api.whatsapp.com/send?phone=<?= $contactdetails[0]['f_contact'] ?>&text=Here is my product List.." class="Facebook" target="_blank"><i class="fab fa-whatsapp"> </i> Whatsapp </a>

</div>