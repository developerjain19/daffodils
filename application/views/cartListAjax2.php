<div class="eccart-pro-items">
    <?php foreach ($this->cart->contents() as $items) :
    ?>
        <div class="row m-3 center shadow  p-2">
            <div class="col-md-3 text-left">
                <a href="" class="sidVedicos_pro_img ml-3"><img src="<?= base_url('uploads/products/') . $items['image']; ?>" alt="<?php echo $items['name']; ?>" class="imghm" style="width: 70px;"></a>
            </div>
            <div class="col-md-8 text-left">
            <b>  
                 <?php echo $items['name']; ?>  </b><br>
                  <span class="cart-price"><span>INR <?php echo $this->cart->format_number($items['price']); ?> </span>
                </span>
                 <div class="ec-pro-content" style="display: inline-flex;"> 
                    <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $items['rowid']; ?>" data-type="carthm">-</div>
                    <div class="qty-plus-minus">
                        <input class="qty-input" id="qtycarthm<?= $items['rowid']; ?>" type="text"  value="<?php echo $items['qty']; ?>" />
                    </div>
                    <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $items['rowid']; ?>"  data-type="carthm">+</div>
                </div>
            </div>
            
           
            <div class="col-md-1">
                 <b>  <a href="javascript:void(0)" class="remove removeCarthm  " data-id="<?= $items['rowid'] ?>">×</a> 
                    </b>
            </div>
            <p class="text-success text-center">Delivered with 24hrs</p>

        </div>
        <?php $i++; ?>

    <?php endforeach; ?>
</div>
<div class="ec-cart-bottom">
    <div class="cart-sub-total">
        <table class="table cart-table">
            <tbody>
                
                <tr>
                    <td class="text-left"><b>Total :</b></td>
                    <td class="text-right primary-color"><b>INR <?php echo $this->cart->format_number($this->cart->total()); ?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>