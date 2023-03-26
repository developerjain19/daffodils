<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>


    <div class="page-title-area d-none">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2><?= $title ?></h2>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span><?= $title ?></span>
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

    <div class="contact-area pt-100 pb-70 mt-5">
        <div class="container">
            <!-- <div class="section-title">
                <h2>Your Payment Status</h2>
            </div> -->
            <div class="row text-center mb-5">
                 <?php echo $message; ?>
            </div>
        </div>
    </div>
 
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>