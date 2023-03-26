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
                            <h2 class="ec-breadcrumb-title">Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product-details-area ptb-100">
        <div class="container">
            <!-- <b>Your referal Code is : VED<?= $profiledata[0][0]['my_ref_code'] ?><?= $profiledata[0][0]['reg_id'] ?> </b><br>
            <b>Your total referal Point : <span id="refpoint"></span> </b> -->
            <div class="text-danger text-center"><b>
                    <?php
                    if ($this->session->has_userdata('msg')) {
                        echo $this->session->userdata('msg');
                        $this->session->unset_userdata('msg');
                    }
                    ?></b><br></div>
            <div class="bottom">


                <div class="tab-content p-3 shadow m-2" id="pills-tabContent ">


                    <div class="tab-pane fade  show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="bottom-description">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h4>Your Profile</h4>
                                <?php
                                if ($this->session->has_userdata('profilemsg')) {
                                    echo $this->session->userdata('profilemsg');
                                    $this->session->unset_userdata('profilemsg');
                                }
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-4 ">
                                        <label>Your name</label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Your Name:" value="<?php echo $profiledata[0]['fullname'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label>Your Email id</label>
                                        <input type="email" class="form-control" name="emailid" placeholder="Your Email:" value="<?php echo $profiledata[0]['emailid'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label>Your Contact no.</label>
                                        <input type="number" class="form-control" name="contact" placeholder="Your Contact:" value="<?php echo $profiledata[0]['contact'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label>Pincode</label>
                                        <input type="text" class="form-control" name="pincode" placeholder="Your pincode:" value="<?php echo $profiledata[0]['pincode'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Your address:" value="<?php echo $profiledata[0]['address'] ?>" required>
                                    </div>


                                    <div class="form-group col-md-12  text-right">
                                        <button type="submit" class="btn btn-primary ediprobtn mb-5">
                                            Update Profile
                                        </button>
                                        <!-- <a id="editprofile" data-id="0" class="badge badge-danger text-white">Edit Profile</a> -->
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $('#refpoint').text(<?= $rp ?>);
    </script>

</body>

</html>