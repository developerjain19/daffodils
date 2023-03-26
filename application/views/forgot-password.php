<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>



    <section class="ec-page-content section-space-p" style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>

                <div class="col-sm-4" style="background:white">
                    <p class="text-danger">

                    <p><?php
                        if ($this->session->has_userdata('forget')) {
                            echo $this->session->userdata('forget');
                            $this->session->unset_userdata('forget');
                        }
                        ?>
                    </p>
                    <form action="" method="post">

                        <div class="row">
                            <div class="form-group  col-md-12">
                                <label class="control-label" for="email"><span class="require">*</span>Enter Your Email Address</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email ID " required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between flex-row-reverse">
                            <div class="float-left float-sm-left">
                                <a class="btn btn-default" href="<?= base_url('login'); ?>">Back</a>
                            </div>
                            <div class="float-right float-sm-right">
                                <input type="submit" value="Continue" class="btn btn-success">
                            </div>
                        </div>
                    </form>

                </div>
            </div>  
        </div>
    </section>

        </main>
        <!-- End of Main -->
        <?php include('includes/footer.php') ?>

        <?php include('includes/footer-link.php') ?>

</body>



</html>