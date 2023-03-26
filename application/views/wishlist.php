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
                            <h2 class="ec-breadcrumb-title">Wishlist</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Wishlist</li>
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
            <div class="row p-5">
                <?php
                // print_r($this->session->userdata('login_user_id'));

                if (!empty($wishList)) {
                    foreach ($wishList as $wishRow) {

                        if (!empty($wishRow)) {
                            $productRowD = getRowById('products', 'product_id', $wishRow['product_id']);

                            if (!empty($productRowD)) {
                                // print_r($productRowD);
                                $productImgRowD = getRowById('products_image', 'product_id', $wishRow['product_id']);
                                // print_r($productImgRowD);
                                if (!empty($productImgRowD)) {
                                } else {
                                    $productImgRowD[0]['pi_name'] = 'default.jpg';
                                }
                ?>
                                <div class="col-sm-12 col-lg-12 mt-3">
                                    <div class="products-item  shadow p-2">
                                        <div class="top row">
                                            <!-- <a class="wishlist" href="#">
                                                        <i class='bx bx-heart'></i>
                                                    </a> -->
                                                     <div class="col-md-2">
                                                         <img style="object-fit: cover;height:100px;" src="<?= base_url(); ?>uploads/products/<?= $productImgRowD[0]['pi_name']; ?>" alt="Products">
                                            
                                                     </div>
                                                     <div class="col-md-5">
                                                         <b>
                                                    <h6>
                                                        <a href="<?= base_url(); ?>index/product_details/<?= $productRowD[0]['product_id']; ?>"><?= $productRowD[0]['pro_name']; ?></a>
                                                    </h6>
                                                </b>
                                                     </div>
                                                     <div class="col-md-2">
                                                         <span>Rs. <?= $productRowD[0]['price']; ?> </span>
                                                     </div>
                                            <div class="col-md-2">
 <a class="cart-text addCart" data-id="<?= $productRowD[0]['product_id'] ?>">Add To Cart</a>
                                            </div>
                                            <div class="col-md-1">
 <a class="cart-text removewish" data-id="<?= $wishRow['pw_id'] ?>">Remove</a>
                                            </div>
                                        </div>
                                        

                                    </div>

                                </div>
                <?php
                            }
                        }
                    }
                } else {
                    echo 'No products are added to wishist';
                }
                ?>
            </div> 
        </div>
    </div>
    
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $('#refpoint').text(<?= $rp ?>);
    </script>

</body>

</html>