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
                            <h2 class="ec-breadcrumb-title">Return Policy</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Return Policy</li>
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
             
                <div class="ec-faq-wrapper">
                    <div class="ec-faq-container">
                         <h2>Return Policy</h2>
                        <div id="ec-faq">
                            <?php
                            if (!empty($policy)) {
                                foreach ($policy as $row) {
                            ?>
                                    <?= $row['policy'] ?>

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