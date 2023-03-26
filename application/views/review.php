<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Review product</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="ec-breadcrumb-item active">Review product</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Ec Review product page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside">
                        <div class="ec-contact-container">
                            <div class="ec-contact-form "><h5 class="text-primary"><b>Write your review here</b></h5><hr>
                                <p class="text text-warning"><?php
                                                                if ($this->session->has_userdata('msg')) {
                                                                    echo $this->session->userdata('msg');
                                                                    $this->session->unset_userdata('msg');
                                                                }
                                                                ?>
                                </p>
                                <form action="" method="post" class="row" enctype="multipart/form-data">
                                    <span class=" col-md-12">
                                        <label> Your Name*</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name" value="<?= $this->session->userdata('login_user_name') ?>">
                                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>" class="form-control">
                                        <input type="hidden" name="product_id" value="<?= $product_id ?>" class="form-control">

                                    </span>
                                    <span class=" col-md-12">
                                        <label>Product Image*</label>
                                        <input type="file" name="image" id="name" class="form-control">


                                    </span>


                                    <span class=" col-md-12">
                                        <label>How do you ke the Product?*</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Write message" required data-error="Write your message"></textarea>

                                    </span>

                                    <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ec-contact-rightside">
                        <div class="ec-contact-container">
                            <div class="row">
                                 
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <?php
                                            
                                            if ($row[0]['img1'] != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row[0]['img1']; ?>" alt="<?= $row[0]['pro_name']; ?>" style="height:300px;">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title"> Product name - <br><?= $row[0]['pro_name']; ?> </h5>
                                        <div class="ec-single-rating-wrap">
                                            <!-- <div class="ec-single-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </div> -->

                                        </div>
                                        <!-- <div class="ec-single-desc"><?= $row[0]['description']; ?></div> -->


                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <h4>Price - </h4>
                                                <?php
                                                if ($row[0]['old_price'] != '') {
                                                ?>

                                                    <span class="old-price"><strike>Rs. <?= $row[0]['old_price']; ?></strike></span>
                                                <?php
                                                }
                                                ?>


                                                <span class="new-price">Rs. <?= $row[0]['price']; ?></span>
                                            </div>



                                        </div>
                                        <p> <?= $row[0]['description']; ?></p>

                                         




                                    </div>
                                </div>
                            </div>
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