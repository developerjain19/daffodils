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
                            <h2 class="ec-breadcrumb-title">Our deals  and Promocode</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Our deals  and Promocode</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <section class="ec-card-blog section-space-p">
        <div class="container">
            <!-- <div class="row">
				<div class="col-md-12 text-center">
					<div class="section-title">
						<h2 class="ec-bg-title">Style 1</h2>
						<h2 class="ec-title">Style 1</h2>
						<p class="sub-title">Browse The Collection of Top Categories</p>
					</div>
				</div>
			</div> -->
            <div class="row margin-minus-t-15">
                <?php
                $i = 1;
                if (!empty($promocode)) {
                    foreach ($promocode as $row) {
                ?>
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                             
                            
                                     
                                    <h1>Use Promocode - <?php echo $row['title']; ?></h1>
                                    <p><?php echo $row['description']; ?> </p><br>
                                    <h4>Terms and condition - </h4>
                                    <p><?php echo $row['terms']; ?> </p>
                                    
                                     
                                 
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>

            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>