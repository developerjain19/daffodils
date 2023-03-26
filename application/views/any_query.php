<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>


    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Customer Service</h2>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Customer Service</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?= base_url(); ?>assets/images/page-title1.jpg" alt="About">
            <img src="<?= base_url(); ?>assets/images/shape16.png" alt="Shape">
            <img src="<?= base_url(); ?>assets/images/shape17.png" alt="Shape">
            <img src="<?= base_url(); ?>assets/images/shape18.png" alt="Shape">
        </div>
    </div>


    <div class="common-faq-area ptb-100">
        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-lg-8">
                    <div class="section-title">
                        <h2>Have any Query or problem , feel free to get in touch.</h2>
                    </div>
                    <p class="text-danger">
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>
                    </p>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-2">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6 mb-2">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6 mb-2">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone_number" placeholder="Phone" required data-error="Please enter your number" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12  mb-2">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Write message" required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                        <label class="form-check-label" for="flexCheckDefault3">
                                            I accept all <a href="terms-conditions.html">Terms & Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button type="submit" class="btn common-btn">
                                        Send Message
                                        <img src="assets/images/shape1.png" alt="Shape">
                                        <img src="assets/images/shape2.png" alt="Shape">
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="section-title">
                        <h2>Our Featured product</h2>
                    </div>
                    <?php foreach ($featured as $row) { ?>
                        <div class="col-sm-12 col-lg-12">
                        <div class="products-item">
                            <div class="top">
                                 
                                <a class="wishlist" href="#" data-id="<?= $row['product_id'] ?>">
                                    <?php
                                    // $wish = getSingleRowById('products_wishlist', array('product_id' => $row['product_id'], 'user_id' => $this->session->has_userdata('login_user_id')));
                                    // if (!empty($wish)) {
                                    //     if (count($wish) > 0) {
                                    //         echo " <i class='bx bx-heart-fill'></i>";
                                    //     } else {
                                    //         echo " <i class='bx bx-heart'></i>";
                                    //     }
                                    // } else {
                                        echo " <i class='bx bx-heart'></i>";
                                    // }
                                    ?>

                                </a>
                                <img style="object-fit: cover;height:200px;" src="<?= base_url(); ?>uploads/products/<?= $row['img1']; ?>" alt="Products">
                                <div class="inner">
                                    <h3>
                                        <a href="<?= base_url(); ?>index/product_details/<?= $row['product_id']; ?>"><?= $row['pro_name']; ?></a>
                                    </h3>
                                    <span><?= $row['price']; ?></span>
                                </div>
                            </div>
                            <div class="bottom">
                                <a class="cart-text addCart" data-id="<?= $row['product_id'] ?>">Add To Cart</a>
                                <i class='bx bx-plus'></i>
                            </div>
                        </div>
                        </div>
                    <?php } ?>



                    <div class="text-center">
                        <a class="common-btn one" href="shop.html">
                            View all Featured Products
                            <img src="assets/images/shape1.png" alt="Shape">
                            <img src="assets/images/shape2.png" alt="Shape">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>