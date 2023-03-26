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
                        <h2>Our Products</h2>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Our Products</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?= base_url() ?>assets/images/page-title1.jpg" alt="About">
            <img src="<?= base_url() ?>assets/images/shape16.png" alt="Shape">
            <img src="<?= base_url() ?>assets/images/shape17.png" alt="Shape">
            <img src="<?= base_url() ?>assets/images/shape18.png" alt="Shape">
        </div>
    </div>

    <div class="products-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>Products On Sale</h2>
            </div>
            <div class="row">
                <?php foreach ($category as $row) { ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="products-item">
                            <div class="top" style="border:1px solid grey;">

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
                    <a class="common-btn" href="#">
                        Load More Products
                        <img src="assets/images/shape1.png" alt="Shape">
                        <img src="assets/images/shape2.png" alt="Shape">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>