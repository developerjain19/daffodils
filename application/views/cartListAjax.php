<div class="eccart-pro-items">
    <?php foreach ($this->cart->contents() as $items) :
    ?>
        <div class="row m-3 center m-2 p-4" style="border: 1px solid;">
            <div class="col-md-1 text-left">
            <b>  <a href="javascript:void(0)" class="remove removeCarthm btn btn-danger " data-id="<?= $items['rowid'] ?>">×</a> 
                    </b>
            </div>
            <div class="col-md-5 text-left">
            <b>  
                 <?php echo $items['name']; ?>  </b>
            </div>
            <div class="col-md-2">
            <a href="" class="sidVedicos_pro_img ml-3"><img src="<?= base_url('uploads/products/') . $items['image']; ?>" alt="<?php echo $items['name']; ?>" class="imghm" style="width: 70px;"></a>
            </div>
            <div class="col-md-2">
                <span class="cart-price"><span>INR <?php echo $this->cart->format_number($items['price']); ?> </span>
                </span>
            </div>
            <div class="col-md-2">
                <div class="ec-pro-content" style="display: inline-flex;"> 
                    <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $items['rowid']; ?>" data-type="cart">-</div>
                    <div class="qty-plus-minus">
                        <input class="qty-input" id="qtycart<?= $items['rowid']; ?>" type="text"  value="<?php echo $items['qty']; ?>" />
                    </div>
                    <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $items['rowid']; ?>"  data-type="cart">+</div>
                </div>
            </div>

        </div>
        <?php $i++; ?>

    <?php endforeach; ?>
</div>
<div class="ec-cart-bottom">
    <div class="cart-sub-total">
        <table class="table cart-table">
            <tbody>
                
                <tr>
                    <td class="text-right"><h5><b>Total : Rs. <?php echo $this->cart->format_number($this->cart->total()); ?></b></h5></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="cart_btn text-right">
    
        <a href="<?= base_url('checkout') ?>" class="btn btn-success" >Checkout</a>
    </div>
</div>