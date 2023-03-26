 <div class="ec-cart-top">
     <div class="ec-cart-title">
         <span class="cart_title">My Cart</span>
         <button class="ec-close" id="ec-close" >×</button>
     </div>
     <ul class="eccart-pro-items">
         <?php $i = 1; ?>

         <?php foreach ($this->cart->contents() as $items) :
            ?>
             <li>
                 <a href="" class="sidVedicos_pro_img"><img src="<?= base_url('uploads/products/') . $items['image']; ?>" alt="<?php echo $items['name']; ?>"></a>
                 <div class="ec-pro-content">
                     <a href="" class="cart_pro_title"><?php echo $items['name']; ?></a>
                     <span class="cart-price"><span>INR <?php echo $this->cart->format_number($items['price']); ?> </span> 
                         <div class="ec-pro-content" style="display: inline-flex;"> 
                    <div class="dec ec_qtybtn badge badge-secondary p-2 m-2" data-rowid="<?= $items['rowid']; ?>" data-type="sidecart">-</div>
                    <div class="qty-plus-minus">
                        <input class="qty-input" id="qtysidecart<?= $items['rowid']; ?>" type="text"  value="<?php echo $items['qty']; ?>" />
                    </div>
                    <div class="inc ec_qtybtn  badge badge-secondary  p-2 m-2" data-rowid="<?= $items['rowid']; ?>"  data-type="sidecart">+</div>
                </div>
                         <a href="javascript:void(0)" class="remove removeCarthm" data-id="<?= $items['rowid'] ?>">×</a>
                 </div>
             </li>
             <?php $i++; ?>

         <?php endforeach; ?>
     </ul>
 </div>
 <div class="ec-cart-bottom">
     <div class="cart-sub-total">
         <table class="table cart-table">
             <tbody>
                
                     <td class="text-left">Total :</td>
                     <td class="text-right primary-color">INR <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                 </tr>
             </tbody>
         </table>
     </div>
     <div class="cart_btn">
         <!-- <a href="#" class="btn btn-primary">View Cart</a> -->
         <a href="<?= base_url('checkout') ?>" class="btn btn-secondary">Checkout</a>
     </div>
 </div>