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
                            <h2 class="ec-breadcrumb-title">FAQ</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">FAQ</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec FAQ page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">FAQ</h2>
                        <h2 class="ec-title">FAQ</h2>
                        <p class="sub-title mb-3">Customer service management</p>
                    </div>
                </div> -->
                <div class="ec-faq-wrapper">
                    <div class="ec-faq-container">

                        <div id="ec-faq">
                            <?php
                            $i=1;
                            foreach ($faq as $faq_element) {
                            ?>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title"><?= $i ?>. <?= $faq_element['f_title'] ?></h4>
                                    <div class="ec-faq-content">
                                        <?= $faq_element['f_description'] ?>
                                    </div>
                                </div>
                            <?php
                            $i++;
                            }
                            ?>
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