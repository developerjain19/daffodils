<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/template/header_link'); ?>

<body class="sidebar-fixed">
    <div id="app">
        <?php $this->load->view('admin/template/header'); ?>

        <?php $this->load->view('admin/template/sidebar'); ?>
        <!--START PAGE HEADER -->
        <header class="page-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h1><?= $title ?></h1>
                </div>

                <ul class="actions top-right">
                    <li>
                        <button onclick="history.back()" class="btn btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

                    </li>
                </ul>

            </div>
        </header>

        <section class="page-content container-fluid">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($productInfo as $row) {
                                //  print_r($row);
                            ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">
                                                
                                                <div class="form-group  col-md-4">
                                                    <label class="">Product Category Name</label>
                                                    <select class="form-control" name="category_id" id="category_id">
                                                        <option>Select Product Category</option>
                                                        <?php foreach ($category as $rows) {
                                                        ?>
                                                            <option value="<?= $rows['category_id']; ?>" <?= (($rows['category_id'] == $row['category_id']) ? 'selected' : '') ?>><?= $rows['cat_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label class="">Product Sub Category Name</label>
                                                    <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                        <?php
                                                        $subcat = getRowById('sub_category', 'sub_category_id', $row['subcategory_id']);
                                                        ?>
                                                        <option value="<?= $subcat[0]['sub_category_id']; ?>"><?= $subcat[0]['subcat_name']; ?></option>

                                                    </select>
                                                </div>

                                                <div class="form-group  col-md-4">
                                                    <label class="">Product Name</label>
                                                    <input class="form-control" type="text" name="pro_name" value="<?= $row['pro_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="">Offer Price</label>
                                                    <input class="form-control" type="text" name="price" value="<?= $row['price']; ?>">
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                         <div class="form-group">
                                         <label class=""> Old Price</label>
                                         <input type="text" placeholder="Enter Product old Price" name="old_price" class="form-control" value="<?= $row['old_price']; ?>">

                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">

                                                    <label class="">Quantity</label>
                                                    <input type="text" placeholder="Enter Product Quantity" name="quantity" class="form-control" value="<?= $row['quantity']; ?>">


                                                </div>
                                                <div class="col-md-3 form-group">

                                                    <label class="">Quantity Type</label>

                                                    <select class="form-control" name="quantity_type">
                                                        <option value="">Select type</option>
                                                        <?php $getType = getAllData('tbl_quantity_type');
                                                        foreach ($getType as $type) { ?>
                                                            <option value="<?= $type['quantity_name'] ?>" <?= (($type['quantity_name'] == $row['quantity_type']) ? 'selected' : '') ?>><?= $type['quantity_name'] ?></option><?php } ?>
                                                    </select>
                                                </div>


                                       <div class="col-md-3 form-group">
                                         <div class="form-group">
                                         <label class=""> Discount Percent(%)</label>
                                         <input id="hori-pass1" type="text" placeholder="Enter Product Offer percent" name="offer_per" value="<?= $row['offer_per']; ?>" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4"> <label class="">Add Product Image1 </label>
                                                    <input class="form-control pd-r-80" type="file" name="img_temp">
                                                    <input class="form-control pd-r-80" type="hidden" name="img" 
                                                    value="<?php echo $row['img'] ?>">

                                                </div>
                                                <div class="col-md-2"> <img src="<?= base_url() ?>uploads/products/<?= $row['img'] ?>" width="100px" /></div>

                                            
                                            <div class="form-group col-md-4">
                                                 <label class="">Add Product Image2 </label>
                                                    <input class="form-control pd-r-80" type="file" name="img2_temp">
                                                    <input class="form-control pd-r-80" type="hidden" name="img2" 
                                                    value="<?php echo $row['img2'] ?>">

                                                </div>
                                                <div class="col-md-2"> <img src="<?= base_url() ?>uploads/products/<?= $row['img2'] ?>" width="100px" /></div>

                                            

                                        <div class="form-group col-md-4">
                                             <label class="">Add Product Image3 </label>
                                        <input class="form-control pd-r-80" type="file" name="img3_temp">
                                        <input class="form-control pd-r-80" type="hidden" name="img3"  value="<?php echo $row['img3'] ?>">

                                                </div>
                                                <div class="col-md-2"> <img src="<?= base_url() ?>uploads/products/<?= $row['img3'] ?>" width="100px" />
                                                
                                                </div>

                                        </div>
                                            <div class="form-group">
                                                <label class="">Product Description</label>
                                                <textarea cols="80" id="editor1" name="description" rows="10"><?= $row['description']; ?></textarea>
                                            </div>



                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                        </div>
                        </form>
                    <?php
                            }
                    ?>
                    </div>
                </div>
        </section>

    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#category_id').change(function() {
            var category_id = $('#category_id').val();
            console.log(category_id);
            $.ajax({
                method: "POST",
                url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                data: {
                    category_id: category_id
                },
                success: function(response) {
                    $('#sub_category_id').html(response);
                }
            });
        });
    </script>
</body>

</html>