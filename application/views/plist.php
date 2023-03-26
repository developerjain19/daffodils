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

                                <h2 class="ec-title">Upload your product list. we delivered all products to your doorstep  </h2>
                            </div>
                        </div>
                        <div class="ec-login-form">
                             <?php if ($msg = $this->session->userdata('message')) :
                        $msg_class = $this->session->userdata('msg_class') ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="<?= $msg_class; ?>"><?= $msg; ?></div>
                            </div>
                        </div>
                    <?php
                        $this->session->unset_userdata('message');
                    endif; ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="text" class="form-control txtOnly" name="name" id="fullname" placeholder="Your Name:" required >

                                        

                                      <input  name="number" placeholder="Phone Number" id="company_contact" required="" maxlength="10" required>
                                      <span id="mainphon"></span>
                                      <lable>Upload product List</lable>
                                    
                                      <input  type="file" name="list" class="form-control"  required="">
                                      

                                        <span class="ec-register-wrap ec-register-btn">
                                            <button class="btn btn-primary" type="submit">Upload</button>
                                        </span>
                                    </form>

                                  
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>


<script type="text/javascript">
    var err = [];

    $('#company_contact').keyup(function() {

        var contact = $('#company_contact').val();

        if (!$('#company_contact').val()) {
            err.push('true');
            $('#mainphone').text('Company Contact is required');
        } else if (IsMobile(contact) == false) {
            err.push('true');
            $('#mainphone').text('Your Number is Invalid. Should contain 10 digit contact no.');
            // $('#cmp_main').text(contact);

        } else {
            err = [];
            $('#mainphone').text('');

        }
    });


    function IsMobile(contact) {

        contact = contact.replace(/\D/g, '');
        $('#company_contact').val(contact);

        var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
        if (!regex.test(contact)) {
            return false;
        } else {
            return true;
        }
    }

    $(".txtOnly").keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
</script>
