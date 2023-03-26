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

                            <form action="<?php echo base_url() . 'admin_Dashboard/addproducts' ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label class="">Product Category Name</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option>Select Product Category</option>
                                                    <?php foreach ($category as $row) {
                                                    ?>
                                                        <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="">Product Sub Category Name</label>
                                                <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                    <option>Select Product Category</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="">Product Name</label>
                                                <input class="form-control" required="" type="text" name="pro_name">
                                            </div>
                                        </div>

                                        <div class="addRow ">
                                            <div class="row">
                                                <div class="col-md-3 form-group">

                                                    <label class="">Quantity</label>
                                                    <input type="number" placeholder="Enter Product Quantity" name="quantity" required  class="form-control">


                                                </div>
                                                <div class="col-md-3 form-group">

                                                    <label class="">Quantity Type</label>

                                                    <select class="form-control" name="quantity_type" required>
                                                        <option >Select type</option>
                                                        <?php $getType = getAllData('tbl_quantity_type');
                                                        foreach ($getType as $type) { ?>
                                                            <option value="<?= $type['quantity_name'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                                    </select>
                                                </div>
                                        <div class="col-md-3 form-group">
                                          <div class="form-group">
                                          <label class="">Offer Price</label>  <input type="text" placeholder="Enter Product Price" name="price" required class="form-control">

                                                    </div>
                                                </div>
                                                
                                                
                                         <div class="col-md-3 form-group">
                                         <div class="form-group">
                                         <label class=""> Old Price</label>
                                         <input   type="text" placeholder="Enter Product old Price" name="old_price" class="form-control">

                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-3 form-group">
                                         <div class="form-group">
                                         <label class=""> Discount Percent(%)</label>
                                         <input  type="text" placeholder="Enter Product Offer percent" name="offer_per" class="form-control">

                                                    </div>
                                                </div>
                                                
                                         <div class="form-group col-md-3">
                                           <label class="">Add Product Image1 </label>
                                         <div class="pos-relative">
                                          <input class="form-control" required="" type="file" name="img">
                                                    </div>
                                                </div>
                                                
                                                   <div class="form-group col-md-3">
                                           <label class="">Add Product Image2 </label>
                                         <div class="pos-relative">
                                          <input class="form-control" type="file" name="img2">
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                   <div class="form-group col-md-3">
                                           <label class="">Add Product Image3 </label>
                                         <div class="pos-relative">
                                          <input class="form-control"  type="file" name="img3">
                                                    </div>
                                                </div>
                                              
                                            </div>

                                        </div>

                                        <div class="row">


                                            <div class="form-group col-md-12">
                                                <label class="">Product Description</label>
                                                <textarea cols="80" id="editor1" name="description" rows="10"></textarea>
                                            </div>

                                            <div class="form-group col-md-12">

                                                <button type="submit" class="btn  btn-primary ">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
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
        let i = 0;
        // $('.addbutton').click(function() {
        //     i++;
        //     $('.addRow').append('</div><div class="row" id="row' + i + '">' +
        //         '<div class="col-md-3 form-group">' +

        //         ' <label class="">Quantity' +

        //         '</label>' +

        //         '<input id="hori-pass1" type="text" placeholder="Enter Product Quantity" name="quantity[]" required  class="form-control">' +

        //         '</div>' +

        //         '<div class="col-md-3 form-group">' +

        //         '<label class="">Quantity Type</label>' +

        //         '<select class="form-control" required name="quantity_type[]"><option >Select type</option><?php foreach ($getType as $type) { ?><option value="<?php echo $type['quantity_name'] ?>"><?php echo $type['quantity_name'] ?></option><?php } ?></select>' +

        //         '</div>' +
        //         '<div class="col-md-3 form-group">' +

        //         ' <label class="">Price' +

        //         '</label>' +

        //         '<input id="hori-pass1" type="text" placeholder="Enter Product Price" name="product_price[]" required  class="form-control">' +

        //         '</div>' +

        //         '<div class="form-group col-md-2">' +
        //         '<label class="">Add Product Image </label>' +
        //         '<div class="pos-relative">' +
        //         '<input class="form-control pd-r-80" required="" type="file" name="img[]">' +

        //         '</div>' +
        //         '</div>' +
        //         '<div class="col-1">' +
        //         '</br>' +
        //         '<button type="button" class="btn btn-dark remove" id="' + i + '"><i class="fa fa-minus"></i></button>' +
        //         '</div>' +
        //         '</div>'
        //     );
        // });

        $(document).on('click', '.remove', function() {
            let id = $(this).attr('id');
            $('#row' + id).remove();
        });
    </script>
</body>

</html>