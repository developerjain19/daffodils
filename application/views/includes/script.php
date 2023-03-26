 <!-- Vendor JS -->
 <script src="<?= base_url(); ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/popper.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

 <!--Plugins JS-->
 <script src="<?= base_url(); ?>assets/js/plugins/swiper-bundle.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/countdownTimer.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/scrollup.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/jquery.zoom.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/slick.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/infiniteslidev2.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/jquery.sticky-sidebar.js"></script>

 <!-- Main Js -->
 <script src="<?= base_url(); ?>assets/js/vendor/index.js"></script>
 <script src="<?= base_url(); ?>assets/js/main.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 <script>
     <?php
        if (sessionId('mytotalamount')) {
        ?>
         let mytotalamount = <?= sessionId('mytotalamount'); ?>
     <?php
        }
        ?>

     $(document).ready(function() {


         var amtcalculate = [];

         var limit = 12;
         var offset = 0;
         var catid = $('#catid').val();
         var subcatid = $('#subcatid').val();

         load_product();
         loadproduct();
         $('#category').change(function() {
             var category = $(this).val();
             window.location = "<?= base_url('Index/collection/') ?>" + category;
         });



         function mySanckbar() {
             x = document.getElementById("snackbar");
             x.className = "show";
             setTimeout(function() {
                 x.className = x.className.replace("show", "");
             }, 3000);
         }


         $(document).on('click', '.removeCarthm', function() {
             var pid = $(this).data('id');
             //  console.log(pid);
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/delete_item') ?>",
                 data: {
                     pid: pid
                 },
                 success: function(response) {
                     load_product();
                 }
             });
         });


         $(document).on('click', '.addCart', function() {
             var pid = $(this).data('id');
             var qty = $('#qtysidecart' + pid).val();
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/addToCart') ?>",
                 data: {
                     pid: pid,
                     qty: qty
                 },
                 beforeSend: function() {
                     $(".crtbtn-" + pid).html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                 },
                 success: function(response) {
                     console.log(response);
                     load_product();

                     setTimeout(function() {
                         $('#carttext' + pid).text('');
                     }, 3000);
                     mySanckbar();
                     $(".crtbtn-" + pid).html("Add to cart").attr('disabled', false);

                 }
             });
         });


         $(document).on('click', '.buynow', function() {
             var pid = $(this).data('id');
             var qty = $('#qtysidecart' + pid).val();


             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/addToCart') ?>",
                 data: {
                     pid: pid,
                     qty: qty
                 },
                 success: function(response) {


                     window.location = "<?= base_url('Index/cart_list') ?>";
                 }
             });
         });
         $(document).on('click', '.ec_qtybtn', function() {
             var rowid = $(this).data('rowid');
             var type = $(this).data('type');
             var qty = $('#qty' + type + rowid).val();

             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/update_qty') ?>",
                 data: {
                     rowid: rowid,
                     qty: qty
                 },
                 success: function(response) {
                     //  console.log(response);
                     load_product();
                 }
             });
         });

         $(document).on('change', '#state', function() {

             var state = $(this).val();


             // console.log(state);
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/getcity') ?>",
                 data: {
                     state: state
                 },
                 success: function(response) {
                     // console.log(response);
                     $('#city').html(response);
                 }
             });
         });
         <?php
            if ($this->session->has_userdata('regmsg')) {
            ?> window.location = "<?= base_url('login') ?>";
         <?php
                $this->session->unset_userdata('regmsg');
            } elseif ($this->session->has_userdata('loginmsg')) {
            ?> window.location = "<?= base_url('login') ?>";
         <?php
                $this->session->unset_userdata('loginmsg');
            } else {
            }
            if ($this->session->has_userdata('checkout')) {
            ?> window.location = "<?= base_url('login') ?>";
         <?php
                $this->session->unset_userdata('checkout');
            }
            ?>




         var countdownv = 20;
         $('#resend').hide();
         var refreshId = setInterval(function() {
             if (countdownv > 1) {
                 $('#resendmsg').text('Resend in ' + countdownv + ' sec');
                 countdownv--;
             } else {
                 $('#resendmsg').text('');
                 clearInterval(refreshId);
             }
         }, 1000);
         setTimeout(function() {
             $('#resend').show();
         }, 20000);
     });

     function myFunction() {

         var copyText = document.getElementById("urlmsg");


         copyText.select();
         copyText.setSelectionRange(0, 99999);


         navigator.clipboard.writeText(copyText.value);

         $('#cm').text('Link Copied');
     }

     function load_checkoutbar() {
         var referalpoint = $('#referalpointcheck').data('point');
         if ($('#referalpointcheck').is(":checked")) {

         } else {
             var tamt = mytotalamount;
             var promocode_amt = $('#promocode_amt').val();
             if (promocode_amt == '') {
                 //  console.log(parseInt(tamt));
                 $('#cartgrandprice').text(parseInt(tamt));
                 allaboutamt(parseInt(tamt));
             } else {
                 $('#cartgrandprice').text(parseInt(tamt) - parseInt(promocode_amt));
                 allaboutamt(parseInt(tamt) - parseInt(promocode_amt));

             }

         }
     }

     function promo() {
         var promocode = $('#promocode').val();
         $.ajax({
             method: "POST",
             url: "<?= base_url('Index/checkPromo') ?>",
             data: {
                 promocode: promocode
             },
             success: function(response) {
                 // console.log(response);
                 if (response == 'false') {
                     $('#promomsg').text('Promo code not valid');
                     $('#promocode_amt').val('0');
                     var tamt = mytotalamount;
                     var referalpoint = $('#referalpoint').val();

                     $('#cartprice').text(tamt);

                     $('#cartgrandprice').text((parseInt(tamt)));
                     allaboutamt((parseInt(tamt)));


                 } else {
                     var obj = JSON.parse(response);
                     console.log(obj[0]['deduction']);

                     $('#promocode_amt').val(obj[0]['deduction']);
                     var tamt = mytotalamount;
                     var referalpoint = $('#referalpoint').val();
                     $('#promomsg').text('Promo code Offer amount - Rs. ' + obj[0]['deduction']);
                     $('#cartprice').text((tamt - obj[0]['deduction']));
                     console.log((parseInt(tamt) - (parseInt(obj[0]['deduction']) + parseInt(referalpoint))));
                     $('#cartgrandprice').text((parseInt(tamt) - (parseInt(obj[0]['deduction']) + parseInt(referalpoint))));
                     allaboutamt((tamt - obj[0]['deduction']));

                 }
             }
         });
     }


     function allaboutamt(grandtotal) {

         var totalPrice = grandtotal;
         console.log(totalPrice);
         $.ajax({
             url: '<?= base_url("Index/checkoutpay") ?>',
             method: 'POST',
             data: {
                 totalPrice: totalPrice
             },
             success: function(response) {

             }
         });
     }


     function load_product() {
         $.ajax({
             url: '<?= base_url("Index/fetch_data") ?>',
             method: 'POST',
             success: function(response) {
                 $('#cart').html(response);

             }
         });
         $.ajax({
             url: '<?= base_url("Index/cartAjax") ?>',
             method: 'POST',
             success: function(response) {
                 //   $('#cart').html(response);
                 $('#cart2').html(response);

             }
         });
         $.ajax({
             url: '<?= base_url("Index/cartAjax2") ?>',
             method: 'POST',
             success: function(response) {
                 $('#cart3').html(response);

             }
         });

         $.ajax({
             url: '<?= base_url("Index/fetch_totalitems") ?>',
             method: 'POST',
             success: function(response) {
                 $('.totalitem').text(response);
                 $('#totalitems').html(response);
             }
         });
         $.ajax({
             url: '<?= base_url("Index/fetch_totalamount") ?>',
             method: 'POST',
             success: function(response) {
                 $('#totalamount').val(response);
                 $('#totalpricehm').text('Rs. ' + response);
             }
         });
         load_checkoutbar();
         promo();
     }


     var limit = 12;
     var offset = 0;

     function loadproduct() {

         var catid = $('#catid').val();
         var subcatid = $('#subcatid').val();
         var url = "<?= base_url() ?>";
         $.ajax({
             method: "POST",
             //  dataType: "json",
             url: "<?= base_url('Index/getProduct') ?>",
             data: {
                 catid: catid,
                 subcatid: subcatid,
                 limit: limit,
                 offset: offset
             },
             success: function(response) {
                 $("#productData").html(response);
             },

         });
         offset += 12;

     }
     $(document).on('click', '#ec-popnews-close', function() {
         $("#ec-popnews-bg").fadeOut();
         $("#ec-popnews-box").fadeOut();

     });

     $('#loadmore').click(function() {
         loadproduct();

     });
 </script>