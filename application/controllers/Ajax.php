<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
    }
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
       $qty = $this->input->post('qty');
        $product = $this->CommonModal->getRowById('products', 'product_id', $product_id);
    
        $data = array(
            'id'      => $product[0]['product_id'],
             'qty'     => $qty,
            'price'   => $product[0]['price'],
            'name'    => $product[0]['pro_name'],
            'image'    => $product[0]['img'],
        );
print_r($data);
        $this->cart->insert($data);
       
    }
}
