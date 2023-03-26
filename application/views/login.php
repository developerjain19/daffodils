<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>



    <section class="ec-page-content section-space-p bg-green">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">

                    <h1 class="text-white d-flex flex-column">
                        <span style="font-size: 20px !important"> Welcome to </span> The Daffodils Farm
                    </h1>
                    <h6 class="text-white"> Naturally Grown Farm Fresh Vegetables & Food Products in Bhopal
                    </h6>
                    <p class="text-white text-justify mt-5">The farm specializes in naturally grown, farm-fresh vegetables and food products, ensuring that customers get high-quality produce that is both healthy and delicious. including higher nutritional value, lower pesticide residues, and fewer additives.</p>

                </div>

                <div class="col-sm-6 login-box ">
                    <p class="text-danger">
                        <?php
                        if ($this->session->has_userdata('loginmsg')) {
                            echo $this->session->userdata('loginmsg');
                            $this->session->unset_userdata('loginmsg');
                        }
                        ?>
                        <?php
                        echo $this->session->userdata('checkout');
                        // $this->session->unset_userdata('loginError');
                        ?>
                    </p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Mobile / Email</label>
                            <input type="text" class="form-control" name="uname" required>

                        </div>
                        <div class="form-group mb-0">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <br>
                            <a href="<?= base_url('forgot-password'); ?>" class="text-black py-3">Forgot your password?</a>
                        </div>
                        <span class="ec-login-wrap ec-login-btn text-center w-100">

                            <button class="btn btn-success buttonstyle w-100" type="submit">Login</button>

                        </span>

                    </form>
                    <p class="mt-4">Don't Have Login Account ? 
                        <a class="text-success font-weight-bolder" href="<?= base_url('register') ?>">Register Now</a>
                    </p>

                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>