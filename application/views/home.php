<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>


<body class="product_page">

    <?php include('includes/menu.php'); ?>
    <div class="sticky-header-next-sec ec-main-slider section ">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                <?php $i = 0;
                foreach ($banner as $banners) { ?>
                    <div class="ec-slide-item swiper-slide  ec-slide-<?= $i ?>">

                        <img src="<?= base_url('uploads/banner/' . $banners['b_img']) ?>" class="img-reponsive" style="width:100%" />

                    </div>
                <?php $i++;
                } ?>
            </div>
            <!-- <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div> -->
        </div>
    </div>


    <section class="section ec-category-section ec-category-wrapper-4 section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Shop from Top Categories</h2>
                        <h2 class="ec-title">Shop from Top Categories</h2>
                        <p class="sub-title">Browse The Collection of Top Categories</p>
                    </div>
                </div>
            </div>
            <div class="row cat-space-3  margin-minus-tb-15">

                <?php

                if ($cate != '') {
                    foreach ($cate as $row) { ?>

                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <div class="cat-card mybox">
                                <div class="card-img">
                                    <a href="<?= base_url() ?>product?category=<?= base64_encode($row['category_id']); ?>">
                                        <img class="cat-icon cateimg" src="<?= base_url(); ?>uploads/category/<?= $row['image']; ?>" alt="<?= $row['cat_name']; ?>"></a>
                                </div>
                                <div class="cat-detail">
                                    <h4> <a href="<?= base_url() ?>product?category=<?= base64_encode($row['category_id']); ?>">
                                            <?= $row['cat_name']; ?></a></h4>

                                    <a class="btn-success btn-sm" href="<?= base_url() ?>product?category=<?= base64_encode($row['category_id']); ?>&&<?= $row['cat_name']; ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>


            </div>

            <div class=" text-center w-100 mt-4">
                <a href="<?= base_url(); ?>/shop_by_category"><button class="btn btn-success">Veiw all Category</button></a>
            </div>
        </div>
    </section>


    <section class="ec-banner section section-space-p">
        <h2 class="d-none">Banner</h2>
        <div class="container">
            <!-- ec Banners Start -->
            <div class="ec-banner-inner">
                <!--ec Banner Start -->
                <div class="ec-banner-block ec-banner-block-2">
                    <div class="row">

                        <?php
                        if ($dealasc != '') {

                            foreach ($dealasc as $row) {
                        ?>


                                <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInLeft">
                                    <div class="bnr-overlay">
                                        <img src="<?php echo base_url() . 'uploads/deals/' . $row['timage']; ?>" alt="The Daffodils Farm" />

                                        <div class="banner-content">
                                            <span class="btn btn-success"><a href="<?= base_url() ?>product">Order Now</a></span>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-fw el-prod section-space-p" style="background-image:url(<?= base_url() ?>assets/img/bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Products</h2>
                        <h2 class="ec-title">Our Products</h2>
                        <p class="sub-title "><i>Browse The Collection of Top Products</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($products != '') {

                    foreach ($products as $row) {
                ?>


                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="ec-product-fw mybox" style="margin-bottom: 15px;">
                                <div class="ec-product-image">
                                    <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>">
                                        <img src="<?= base_url() ?>uploads/products/<?= $row['img'] ?>" alt="Product" class="img-center moreimg">
                                    </a>
                                    <?= (($row['varified'] == '0') ? '<span class="ec-product-sale-label"><img src="' . base_url() . 'assets/Veg_symbol.svg" height="20px"></span>' : ''); ?>
                                    <?= (($row['offer_per'] != '') ? '	<span class="ec-product-discount-label">-' . $row['offer_per'] . '%</span>' : '') ?>
                                </div>
                                <div class="ec-product-body">
                                    <h3 class="ec-title"><a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>"><?= $row['pro_name'] ?></a></h3>
                                    <div class="ec-price"><span>₹ <?= $row['old_price'] ?></span> ₹ <?= $row['price'] ?></div>
                                    <div class="single-pro-content">
                                        <div class="ec-single-qty" style="text-align: center; justify-content: center;">
                                            <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $row['product_id'] ?>" data-type="sidecart">-</div>
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" id="qtysidecart<?= $row['product_id'] ?>" type="text" value="1" />
                                            </div>
                                            <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $row['product_id'] ?>" data-type="sidecart">+</div>
                                        </div>
                                    </div>
                                    <div class="ec-single-cart">
                                        <button class="shopbtn addCart crtbtn-<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>">Add To Cart </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>




    <section class="section ec-offer-section section-space-p section-space-m" style="background-image: url('assets/img/banner.webp');">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-11 col-lg-12 col-md-7 col-sm-7 ec-offer-content">


                    <span class="ec-offer-price">Get All Fresh vegetables</span>
                    <span class=""><b>Take now 20% off for all product.</b></span>
                    <!-- <a class="btn btn-primary" href="shop-left-sidebar-col-3.html" data-animation="zoomIn">Shop Now</a> -->
                </div>
            </div>
        </div>
    </section>



    <section class="sec-fw el-prod section-space-p" style="background-image:url(<?= base_url() ?>assets/img/bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">All Featured Products</h2>
                        <h2 class="ec-title">All Featured Products</h2>
                        <p class="sub-title">Browse The Featured Products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($featured != '') {

                    foreach ($featured as $row) {

                        viewproduct($row, '3');

                ?>



                <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>


    <section class="section ec-services-section section-space-p ec-test-section">
        <h2 class="d-none">How it works</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content mb-3  col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/1.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free Shipping</h2>
                            <p>Free Shipping , Order Over - 699 INR</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content  mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/2.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>24X7 Support</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/3.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>7 Days Return</h2>
                            <p>Simply return it within 7 days for an exchange</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/4.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Payment Secure</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>