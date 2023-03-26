<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>

    <section class="ec-page-content section-space-p" style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg');">
        <div class="container">
            <div class="row">

                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="col-md-12 text-center">
                            <div class="section-title">

                                <h2 class="ec-title">Register </h2>
                            </div>
                        </div>
                        <div class="ec-login-form">
                            <p class="text-danger">
                                <?php
                                if ($this->session->has_userdata('regmsg')) {
                                    // echo 'show active';
                                } else {
                                }
                                ?>
                            <div class="ec-single-pro-tab-moreinfo">
                                <p class="text-danger">
                                    <?php
                                    if ($this->session->has_userdata('regmsg')) {
                                        echo $this->session->userdata('regmsg');
                                    }
                                    ?>


                                </p>
                                <div class="row">                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <form action="<?= base_url('Index/register') ?>" method="post">

                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your Name:" required>

                                    <input type="email" class="form-control" name="emailid" placeholder="Your Email:" value=" ">


                                    <input type="number" class="form-control" name="contact" placeholder="Your Contact:" required maxlength="10" pattern="\d*">


                                    <input type="text" class="form-control" name="password" placeholder="Password" minlength="4" title="Password must contain 4 digit atleast" required>


                                    <span class="ec-register-wrap ec-register-btn">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                    </span>
                                </form>
                            </div>

                            </div>
                            </div>

                            <br>
                            <div class="btn " align="center">Existing User ? <a href="<?= base_url('login') ?>"> Log in</a></div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>


</body>

</html>