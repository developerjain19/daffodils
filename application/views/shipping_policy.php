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
                            <h2 class="ec-breadcrumb-title">Shipping Policy</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shipping Policy</li>
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
                        <h2 class="ec-bg-title">Shipping Policy</h2>
                        <h2 class="ec-title">Shipping Policy</h2>
                    </div>
                </div> -->
                <div class="ec-faq-wrapper">
                    <div class="ec-faq-container">
                        <div id="ec-faq">
                            <?php
                            if (!empty($privacypolicy)) {
                                foreach ($privacypolicy as $row) {
                            ?>
                                    <?= $row['particulars'] ?>

                            <?php

                                }
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