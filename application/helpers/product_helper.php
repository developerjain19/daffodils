<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function viewproduct($row, $i)
{
?>
    <div class="col-lg-<?= $i ?> col-md-6 col-sm-6">
        <!-- START single card -->
        <div class="ec-product-fw mybox" style="margin-bottom: 15px;">
            <div class="ec-product-image">
                <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>">
                    <img src="<?= base_url() ?>uploads/products/<?= $row['img'] ?>" alt="Product" class="img-center proimg">
                </a>
                <?= (($row['varified'] == '0') ? '<span class="ec-product-sale-label"><img src="'. base_url().'assets/Veg_symbol.svg" height="20px"></span>' : ''); ?>
                <?= (($row['offer_per'] != '') ? '	<span class="ec-product-discount-label">-' . $row['offer_per'] . '%</span>' : '') ?>
            </div>
            <div class="ec-product-body">
                <h3 class="ec-title"><a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>"><?= $row['pro_name'] ?></a></h3>
                <div class="ec-price"><span>₹ <?= $row['old_price'] ?></span> ₹ <?= $row['price'] ?></div>
                <div class="single-pro-content">
                    <div class="ec-single-qty" style="text-align: center; justify-content: center;">
                        <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $row['product_id'] ?>" data-type="sidecart">-</div>
                        <div class="qty-plus-minus">
                            <input class="qty-input" id="qtysidecart<?= $row['product_id'] ?>" type="text" value="1" />
                        </div>
                        <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $row['product_id'] ?>" data-type="sidecart">+</div>
                    </div>
                </div>
                <div class="ec-single-cart">
                    <button class="shopbtn addCart  crtbtn-<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>