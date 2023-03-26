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
                            <h2 class="ec-breadcrumb-title">Contact Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="ec-breadcrumb-item active">Contact Us</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Ec Contact Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside ">
                        <div class="ec-contact-container shadow">
                            <div class="ec-contact-form ">
                                <p class="text text-warning"><?php
                                                                if ($this->session->has_userdata('msg')) {
                                                                    echo $this->session->userdata('msg');
                                                                    $this->session->unset_userdata('msg');
                                                                }
                                                                ?>
                                </p>
                                <form action="" method="post" class="row ">
                                    <span class=" col-md-12">
                                        <label> Name*</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">

                                    </span>

                                    <span class=" col-md-6">
                                        <label>Email*</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Please enter your email">

                                    </span>
                                    <span class=" col-md-6">
                                        <label>Phone Number*</label>
                                        <input type="text" pattern="\d*" maxlenght="10" name="phone" placeholder="Phone" required data-error="Please enter your number" class="form-control">

                                    </span>
                                    <span class=" col-md-12">
                                        <label>Comments/Questions*</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Write message" required data-error="Write your message"></textarea>

                                    </span>

                                    <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ec-contact-rightside">
                        <!-- <div class="ec_contact_map">
                            <div class="ec_map_canvas">
                                <iframe id="ec_map_canvas"
                                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d71263.65594328841!2d144.93151478652146!3d-37.8734290780509!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1615963387757!5m2!1sen!2sus"></iframe>
                                <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                            </div>
                        </div> -->
                        <div class="ec_contact_info">
                            <h1 class="ec_contact_info_head">Contact us</h1>
                            <ul class="align-items-center">
                                <li class="ec-contact-item"><i class="ecicon eci-map-marker" aria-hidden="true"></i><span>Address : <?= $contactdetails[0]['address'] ?></li>
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone" aria-hidden="true"></i><span>Call Us :</span><a href="tel: <?= $contactdetails[0]['f_contact'] ?>"> <?= $contactdetails[0]['f_contact'] ?></a></li>
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope" aria-hidden="true"></i><span>Email :</span><a href="<?= $contactdetails[0]['f_email'] ?>"><span class="__cf_email__"> <?= $contactdetails[0]['f_email'] ?></span></a>
                                </li>
                            </ul>
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