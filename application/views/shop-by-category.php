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
                            <h2 class="ec-breadcrumb-title">Shop By Category</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop By Category</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
     <section class="section ec-category-section ec-category-wrapper-4 section-space-p">
        <div class="container">
           
            <div class="row cat-space-3  margin-minus-tb-15">
                
                   <?php 
                   
                   if($cate != ''){
                   foreach ($cate as $row) { ?>
                
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card mybox">
                        <div class="card-img">
                            <img class="cat-icon cateimg" src="<?= base_url(); ?>uploads/category/<?= $row['image']; ?>" alt="<?= $row['cat_name']; ?>">
                        </div>
                        <div class="cat-detail">
                            <h4><?= $row['cat_name']; ?></h4>
                           
                            <a class="btn-success btn-sm" href="<?= base_url() ?>product?category=<?= base64_encode($row['category_id']); ?>&&<?= $row['cat_name']; ?>">shop now</a>
                        </div>
                    </div>
                </div>
             
               <?php
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