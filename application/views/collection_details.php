<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>

    <?php $row = $details; ?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title"> Products Details</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Products Details</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
 
 
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">

                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar col-sm-4">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <?php

                                            if ($row->img != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row->img; ?>" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                             <?php
                                                    if ($row->img2 != '') {
                                                    ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row->img2; ?>" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                                    }
                                            ?> 
                                             <?php
                                                    if ($row->img3 != '') {
                                                    ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row->img3; ?>" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                                    }
                                            ?> 


                                        </div>
                                         <div class="single-nav-thumb">
                                              <?php
                                            if ($row->img != '') {
                                            ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row->img2 != '') {
                                            ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img1; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row->img3 != '') {
                                            ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img2; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            

                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar col-sm-8">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title"> <?= $row->pro_name; ?> </h5>
                                        <div class="ec-single-rating-wrap">
                                            <div class="ec-single-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </div>

                                        </div>
                                        <!-- <div class="ec-single-desc"><?= $row->description; ?></div> -->


                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <?php
                                                if ($row->old_price != '') {
                                                ?>

                                                    <span class="old-price"><strike>Rs. <?= $row->old_price; ?></strike></span>
                                                <?php
                                                }
                                                ?>


                                                <span class="new-price">Rs. <?= $row->price; ?></span>
                                            </div>



                                        </div>
                                        
                 <div class="single-pro-content">
                    <div class="ec-single-qty" >
                        <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $row->product_id ?>" data-type="sidecart">-</div>
                        <div class="qty-plus-minus">
                            <input class="qty-input" id="qtysidecart<?= $row->product_id ?>" type="text" value="1" />
                        </div>
                        <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $row->product_id ?>" data-type="sidecart">+</div>
                    </div>
                </div>
                                        <div class="ec-single-qty">
                                            
                                            <div class="ec-single-cart">
                                               <button class="shopbtn addCart" data-id="<?= $row->product_id ?>">Add To Cart</button>
                                            </div>
                                            <div class="ec-single-cart pl-1">
                                                <button class="btn btn-warning buynow" data-id="<?= $row->product_id ?>"> Buy now</button>

                                            </div>
                                        </div>
                                        
                                        
                                        <p> <?= $row->description; ?></p>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>