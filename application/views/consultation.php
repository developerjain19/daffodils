<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Consultation with Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="ec-breadcrumb-item active">Consultation with Us</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Ec Consultation with Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside">
                        <img src="<?= base_url('assets/img/1469975.png') ?>" />
                    </div>
                    <div class="ec-contact-rightside">
                         <div class="ec-contact-container">
                            <div class="ec-contact-form">
                            <p class="text text-warning"><?php
                                if ($this->session->has_userdata('msg')) {
                                 echo $this->session->userdata('msg');
                                 $this->session->unset_userdata('msg');
                                }
                                ?>
                                </p>
                                <form action="" method="post">
                                    <span class="ec-contact-wrap">
                                        <label>  Name*</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                    
                                    </span>
                                     
                                    <span class="ec-contact-wrap">
                                        <label>Email*</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Please enter your email">
                                    
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Phone Number*</label>
                                        <input type="text" name="phone" id="phone_number" placeholder="Phone" required data-error="Please enter your number" class="form-control">
                                    
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>Comments/Questions*</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="3" placeholder="Write message" required data-error="Write your message"></textarea>
                                   
                                    </span>
                                     
                                    <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </span>
                                </form>
                            </div>
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