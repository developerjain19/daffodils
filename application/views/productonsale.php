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
                        <h2>Our Collection</h2>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Our Collection</span>
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
            <div class="row">
            <div class="col-lg-3">
                    <div class="widget-area">

                        <!-- <div class="search widget-item">
                            <form>
                                <input type="text" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn">
                                    <i class='bx bx-search'></i>
                                </button>
                            </form>
                        </div> -->

                        
                         
                        <div class="categories widget-item">
                            <h3>Categories:</h3>
                            <ul>


                                <?php if (!empty($category)) {
                                    foreach ($category as $row) { 
                                        $count = getNumRows('products',array('category_id'=> $row['category_id'])) ;?>
                                        <li>
                                            <a href="<?= base_url('index/collection/'.$row['category_id']) ?>"><?= $row['cat_name']; ?><span>(<?= $count ?>)</span></a>
                                        </li>
                                <?php }
                                } ?>
                            </ul>
                            <!-- <input type="hidden" value="<?= $categoryid ?>" id="catid" />
                            <input type="hidden" value="<?= $subcategoryid ?>" id="subcatid" /> -->
                        </div>
                        <div class="tags widget-item">
                            <h3>Tags:</h3>
                            <ul>
                            <?php if (!empty($subcategory)) {
                                    foreach ($subcategory as $row) { 
                                        $count = getNumRows('products',array('subcategory_id'=> $row['sub_category_id'])) ;
                                        ?>
                                        <li>
                                            <a href="<?= base_url('index/collection/'.$row['cat_id'].'/'.$row['sub_category_id']) ?>"> <?= $row['subcat_name']; ?> <span> (<?= $count ?>)</span></a>
                                        </li>

                                <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9">
                    <div id="Container" class="row justify-content-center">
                        <?php if (!empty($products)) {
                            foreach ($products as $row) { ?>
                                <div class="col-sm-6 col-lg-4 mix <?= $row['category_id']; ?>">

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
                        <?php }
                        } else {
                            echo 'No stock available for sale . get in touch to know more';
                        } ?>

                    </div>
                    <!-- <div class="text-center">
                        <a class="common-btn" href="#">
                            Load More Products
                            <img src="<?= base_url() ?>assets/images/shape1.png" alt="Shape">
                            <img src="<?= base_url() ?>assets/images/shape2.png" alt="Shape">
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>