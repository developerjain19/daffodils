<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
                <!-- Header Top Message Start -->
                <div class="col text-center header-top-center">
                    <div class="header-top-message text-upper">
                        <span style="font-size:14px;color:white"><b>Free Shipping This Week Order Over - 1000 INR </b></span>
                    </div>
                </div>

                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none ">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img src="<?= base_url() ?>assets/images/icons/user.svg" class="svg_img header_svg" alt="" /></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <?php
                                if ($this->session->has_userdata('login_user_id')) {
                                ?>
                                    <li><a class="dropdown-item" href="<?= base_url() ?>profile">My account</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url() ?>orders">Orders</a></li>
                                    <!-- <li><a class="dropdown-item"  href="<?= base_url() ?>wishlist">Wishlist</a></li> -->
                                    <!-- <li><a class="dropdown-item" href="#">My consultation</a></li> -->
                                    <li><a class="dropdown-item" href="<?= base_url() ?>logout">logout</a></li>
                                <?php
                                } else {
                                ?>
                                    <li>
                                       <a href="<?= base_url() ?>login" class="dropdown-item">Login</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>register" class="dropdown-item">Sign Up</a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle-cart ec-side-toggle">
                            <div class="header-icon"><img src="<?= base_url() ?>assets/images/icons/cart.svg" class="svg_img header_svg" alt="" /></div>
                            <span class="ec-header-count cart-count-lable totalitem"><?= $this->cart->total_items(); ?></span>
                        </a>

                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <img src="<?= base_url() ?>assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo">
                            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo/logo.png" alt="Site Logo" /><img class="dark-logo" src="<?= base_url() ?>assets/images/logo/dark-logo.png" alt="Site Logo" style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="<?= base_url('product') ?>">
                                <input class="form-control" placeholder="Enter Your Product Name..." type="text" name="searchbox">
                                <button class="submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle ec-header-btn" data-bs-toggle="dropdown">

                                    <i class="fa fa-user" aria-hidden="true"></i> </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php
                                    if ($this->session->has_userdata('login_user_id')) {
                                    ?>
                                        <li><a class="dropdown-item" href="<?= base_url() ?>profile">My account</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url() ?>orders">Orders</a></li>
                                        <!-- <li><a class="dropdown-item"  href="<?= base_url() ?>wishlist">Wishlist</a></li> -->
                                        <!-- <li><a class="dropdown-item" href="#">My consultation</a></li> -->
                                        <li><a class="dropdown-item" href="<?= base_url() ?>logout">logout</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                           <a href="<?= base_url() ?>login" class="dropdown-item">Login</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>register" class="dropdown-item">Sign Up</a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle ec-header-btn" data-bs-toggle="dropdown">
                                    <i class="fa fa-tty"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="<?= base_url() ?>contact">Contact Us</a></li>
                                    <li><a class="dropdown-item" href="https://wa.me/+918708530143?text=I'm%20interested%20">Chat with us</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url() ?>faq">FAQ</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url() ?>returnPolicy">Return Policy</a></li>
                                </ul>
                            </div>
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle-cart ec-side-toggle">
                                <div class="header-icon"><i class='fas fa-shopping-bag'></i></div>
                                <span class="ec-header-count cart-count-lable totalitem"><?= $this->cart->total_items(); ?></span>
                            </a>

                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="<?= base_url() ?>assets/img/menu.png" class="svg_img header_svg mr-4" alt="icon" />
                                <img src="<?= base_url() ?>assets/logo.png" alt="Site Logo" style="height:35px;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo/logo.png" alt="Site Logo" /><img class="dark-logo" src="<?= base_url() ?>assets/images/logo/logo.png" alt="Site Logo" style="display: none;" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="<?= base_url('product') ?>">
                            <input class="form-control" placeholder="Enter Your Product Name..." type="text" name="searchbox">
                            <button class="submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>


    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <ul>



                            <li><a href="<?= base_url() ?>">Home</a></li>

                            <?php
                            if (!empty($category)) {
                                foreach ($category as $category_row) {

                            ?>

                                    <li class="dropdown"> <a href="<?= base_url() ?>product?category=<?= base64_encode($category_row['category_id']); ?>&&<?= $category_row['cat_name']; ?>">
                                            <?= $category_row['cat_name']; ?></a>

                                        <?php
                                        $subcate = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_row['category_id']);

                                        if (!empty($subcate)) {
                                            echo ' <ul class="sub-menu">';
                                            foreach ($subcate as $subcate_row) {
                                        ?>

                                    <li><a href="<?= base_url() ?>product?subcate=<?= base64_encode($subcate_row['sub_category_id']); ?>&&<?= $subcate_row['subcat_name']; ?>">
                                            <?= $subcate_row['subcat_name'] ?></a>
                                    </li>


                            <?php
                                            }
                                            echo '</ul>';
                                        } ?>


                            </li>
                    <?php
                                }
                            } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- ekka Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <?php
                                    if ($this->session->has_userdata('login_user_id')) {
                                    ?>
                                        <li>
                                   <a href="<?= base_url() ?>profile">  <i class="fa fa-user" aria-hidden="true"></i>My account</a></li>

                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <a href="<?= base_url('login'); ?>"> 
                                    <i class="fa fa-user" aria-hidden="true"></i> My Account </a>
                                        </li>

                                    <?php
                                    }
                                    ?>


                    <?php
                    if (!empty($category)) {
                        foreach ($category as $category_row) {

                    ?>
                            <li>
                                <a href="<?= base_url() ?>product?category=<?= base64_encode($category_row['category_id']); ?>&&<?= $category_row['cat_name']; ?>">
                                    <?= $category_row['cat_name']; ?></a>
                                <ul class="sub-menu">


                                    <?php
                                    $subcate = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_row['category_id']);

                                    if (!empty($subcate)) {
                                        foreach ($subcate as $subcate_row) {
                                    ?>

                                            <li><a href="<?= base_url() ?>product?subcate=<?= base64_encode($subcate_row['sub_category_id']); ?>&&<?= $subcate_row['subcat_name']; ?>">
                                                    <?= $subcate_row['subcat_name'] ?></a>
                                            </li>


                                    <?php
                                        }
                                    } ?>

                                </ul>
                            </li>


                    <?php
                        }
                    } ?>
                    
                    <li><a href="<?= base_url() ?>product">Our Products</a></li>

                    <li><a href="<?= base_url() ?>about">About us</a></li>
                    <li><a href="<?= base_url() ?>contact">Contact us</a></li>




                </ul>
            </div>

        </div>
    </div>
    <!-- ekka mobile Menu End -->
</header>


<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart" style="z-index: 99999;">
    <div class="ec-cart-inner" id="cart">

    </div>
</div>