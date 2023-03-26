<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $contact = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $this->appId = trim($contact[0]['appid']);
        $this->secret_key = trim($contact[0]['secret_key']);
    }
    public function index()
    {


        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['testimonials'] = $this->CommonModal->getAllRowsInOrder('testimonials', 'tid', 'desc');

        $data['banner'] = $this->CommonModal->getAllRowsInOrder('banner', 'bid', 'ASC');
        $data['featured'] = $this->CommonModal->getRowByIdWithLimit('products', 'featured', '1', '12');
        $data['cate'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '25', 'category_id', 'ASC');

        $data['dealasc'] = $this->CommonModal->getAllRowsInOrderWithLimit('deals', '2', 'id', 'ASC');

        $data['dealdesc'] = $this->CommonModal->getAllRowsInOrderWithLimit('deals', '2', 'id', 'DESC');

        $data['products'] = $this->CommonModal->getAllRowsInOrderWithLimit('products', '18', 'product_id', 'desc');
        $data['promocode'] = $this->CommonModal->getRowById('promocode', 'status', '0');

        $data['company'] = "";
        $data['title'] = 'The Daffodils Farm - Naturally Grown Farm Fresh Vegetables & Food Products in Bhopal';
        $this->load->view('home', $data);
    }

    public function shop_by_category()
    {

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['cate'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';


        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Shop By Category  ';
        $this->load->view('shop-by-category', $data);
    }


    public function team_details($id)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';

        $data['team'] = $this->CommonModal->getRowById('ourteam', 'tid', $id);


        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'The Daffodils Farm';
        $this->load->view('team_details', $data);
    }

    public function any_query()
    {
        $data['logo'] = 'assets/logo.png';
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['featured'] = $this->CommonModal->getRowByIdWithLimit('products', 'featured', 1, 1);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $ins = $this->CommonModal->insertRow('contact_query', $post);
            if ($ins) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Any Query';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('any_query', $data);
    }
    public function login()
    {

        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['logo'] = 'assets/logo.png';

        $data['title'] = 'Login';
        $data['company'] = 'The Daffodils Farm';
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "user_registration";
            $login_data = $this->CommonModal->getRowByOr($table, array('emailid' => $uname), array('contact' => $uname));

            if (!empty($login_data)) {
                if ($login_data[0]['password'] == $password) {
                    $session = $this->session->set_userdata(array('login_user_id' => $login_data[0]['reg_id'], 'login_user_name' => $login_data[0]['fullname'], 'login_user_emailid' => $login_data[0]['emailid'], 'login_user_contact' => $login_data[0]['contact']));

                    if (count($this->cart->contents()) > 0) {
                        redirect(base_url('checkout'));
                    } else {
                        redirect(base_url('profile'));
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Wrong Password.</h6>');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('loginError', '<h6 class="alert alert-warning">Username or Password not match.</h6>');
                redirect(base_url('login'));
            }
        } else {
            if ($this->session->has_userdata('login_user_id')) {
                redirect(base_url('Web/profile'));
            }
        }


        $this->load->view('login', $data);
    }

    public function forgot_password()
    {


        $data['title'] = 'Forgot Password -  The Daffodils Farm';
        if (count($_POST) > 0) {
            extract($this->input->post());
            $email = $this->input->post('email');
            $table = "user_registration";
            $login_data = $this->CommonModal->getSingleRowById($table, array('emailid' => $email));

            if (!empty($login_data)) {



                $message = '<h6 style="margin: 0;
                font-size: 1.3em;
                color: rgb(80, 79, 79);
                font-family: Source Sans Pro;
                letter-spacing: 1px;">Hey there! </h6><br>
                <p style="margin: 0;
                font-size: 1.3em;
                color: rgb(80, 79, 79);
                font-family: Source Sans Pro;
                letter-spacing: 1px;">You Have Been Reset Your Password Sucessfully <br>
        
                   Your new Password is  - <span style=" color: #ffa800;
                  font-weight: 700;">' . $login_data[0]['password'] . '</span> <br>

                  <p style="margin: 0;
                  padding: 4px;
                  color: #5892FF;
                  font-family: Source Sans Pro;
                  letter-spacing: 1px;">Click To login <a href="' . base_url() . 'login" style="text-decoration: none;
                color: #006573;
                font-weight: 600;"> The Daffodils Farm</a>
                  </p>
        ';
                mailmsg($email, 'Forgot Password  | From  The Daffodils Farm', $message);

                $this->session->set_userdata('forget', '<span class="text-success">Check your mail ID for Password</span>');
                // redirect(base_url('Index/forget_password'));
            } else {
                $this->session->set_userdata('forget', '<span class="text-danger">No username found</span>');
                redirect(base_url('Index/forget_password'));
            }
        } else {

            $this->load->view('forgot-password', $data);
        }
    }
    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');

        $data['logo'] = 'assets/logo.png';

        $data['title'] = 'Register -  The Daffodils Farm';
        if (count($_POST) > 0) {
            $count = $this->CommonModal->getNumRows('user_registration', array('emailid' => $this->input->post('emailid'), 'contact' => $this->input->post('contact')));
            if ($count > 0) {
                $this->session->set_userdata('msg', '<h6 class="alert alert-warning">You have already registered with this email id or contact no.</h6>');
            } else {
                $post = $this->input->post();

                $message = sendmail($post['emailid'] . '/' . $post['number'],  $post['password'], base_url() . 'login');
                mailmsg($post['emailid'], 'Registered with  The Daffodils Farm | Welcome User', $message);
                $regid = $this->CommonModal->insertRowReturnId('user_registration', $post);
                if (!empty($regid)) {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-success">You have Registered Successfully. please continue Your Shopping</h6>');
                    $session = $this->session->set_userdata(array('login_user_id' => $regid, 'login_user_name' => $post['fullname'], 'login_user_emailid' => $post['emailid'], 'login_user_contact' => $post['contact']));

                    if (count($this->cart->contents()) > 0) {
                        redirect(base_url('checkout'));
                    } else {
                        redirect(base_url('profile'));
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-danger">Server error</h6>');
                }
            }
        } else {
        }
        $this->load->view('register', $data);
    }


    public function changePassword()
    {
        extract($this->input->post());
        $user_registration = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->has_userdata('login_user_id'));
        // print_r($current);
        // print_r($user_registration[0]['password']);
        if ($current == $user_registration[0]['password']) {
            if ($new == $confirm) {
                $this->session->set_userdata('msg', 'Password is submitted successfully');
                $this->CommonModal->updateRowById('user_registration', 'reg_id', $this->session->has_userdata('login_user_id'), array('password' => $new));
            } else {
                $this->session->set_userdata('msg', 'New password and Confirm password does\'nt match');
            }
        } else {
            $this->session->set_userdata('msg', 'You have entered wrong Current password');
        }
        redirect(base_url('index/profile'));
    }

    public function thankyou()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        // print_r($this->session->userdata);
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Phone verification';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('thankyou', $data);
    }


    public function about()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');


        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' About Us';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('about', $data);
    }
    public function contact()
    {
        echo sessionId('otp');
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('contact_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Contact Us';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('contact', $data);
    }
    public function product()
    {
        $cateid = $this->input->get('category');
        $data['cateid'] = base64_decode($cateid);

        $data['search'] = $this->input->get('searchbox');

        $subcate  = $this->input->get('subcate');
        $data['subcateid'] = base64_decode($subcate);
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['sidecategory'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'ASC');
        $data['subcategory'] = $this->CommonModal->getAllRowsInOrder('sub_category', 'cat_id', 'desc');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Our product';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('collection', $data);
    }



    public function promocode_details($pid)
    {

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['promocode'] = $this->CommonModal->getRowByMoreId('promocode', array('status' => '0', 'pid' => $pid));
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Our Promocode Details';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('promocode_details', $data);
    }

    public function sale()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['subcategory'] = $this->CommonModal->getAllRowsInOrder('sub_category', 'subcat_name', 'asc');
        $data['products'] = $this->CommonModal->getRowById('products', 'sale', '1');

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Our product';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('productonsale', $data);
    }
    public function product_details()
    {
        $id = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        // $data['product_reveiw'] = $this->CommonModal->getRowById('product_reveiw', 'product_id', $id);
        $data['products_image'] = $this->CommonModal->getRowById('products_image', 'product_id', $id);

        $table = "products";

        $data['affiliate'] = $this->uri->segment(4);
        $data['details'] = $this->Dashboard_model->fetch_collection($table, $id);
        $currentURL = current_url();
        $params   = $_SERVER['QUERY_STRING'];
        $data['fullURL'] = $currentURL;
        // $data['fullURL'] = $currentURL . '?' . $params;  

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Our product details';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('collection_details', $data);
    }

    public function cart_checkout()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            $this->session->set_userdata('checkout', 'Login here to continue');
        } else {
            $data['login'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');

        $data['city'] = $this->CommonModal->getRowById('tbl_cities', 'name', 'Bhopal');
        $data['promocode'] = $this->CommonModal->getRowById('promocode', 'status', '0');

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Add to cart';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('add_to_cart', $data);
    }
    public function getcity()
    {
        $state = $this->input->post('state');


        $data['city'] = $this->CommonModal->getRowByIdInOrder('tbl_cities', array('state_id' => $state), 'name', 'asc');
        $this->load->view('dropdown', $data);
    }
    public function profile()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index');
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['login_user'] = $this->session->userdata();

        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'user_id', $this->session->userdata('login_user_id'));
        $data['profiledata'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));


        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Profile';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('profile', $data);
    }
    public function orders()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index');
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['login_user'] = $this->session->userdata();
        $data['orderDetails'] = $this->CommonModal->getRowByIdInOrder('checkout', array('user_id' => $this->session->userdata('login_user_id')), 'id', 'DESC');

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Profile';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('orders', $data);
    }
    public function cancelorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '2'));
        if ($upd) {
            return '0';
        } else {
            return '1';
        }
    }
    public function returnorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '5'));
        if ($upd) {
            return '0';
        } else {
            return '1';
        }
    }

    public function wishlist()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index');
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['login_user'] = $this->session->userdata();
        $data['wishList'] = $this->CommonModal->getRowById('products_wishlist', 'user_id', $this->session->userdata('login_user_id'));
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Wishlist';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('wishlist', $data);
    }

    public function orderDetails()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index');
        }
        $checkoutID = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'id', $checkoutID);
        $data['orderProductDetails'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $checkoutID);
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Profile';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('orderDetails', $data);
    }
    public function orderInvoice()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index');
        }
        $checkoutID = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'id', $checkoutID);
        $data['orderProductDetails'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $checkoutID);
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Profile';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('orderInvoice', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('login_user_name');
        $this->session->unset_userdata('login_user_emailid');
        $this->session->unset_userdata('login_user_contact');
        $this->session->unset_userdata('login_user_type');
        $this->session->unset_userdata('referal_id');

        redirect(base_url('index'));
    }

    // razorpay code
    public function checkoutpay()
    {
        $msg = '';
        $msgpro = '';
        $admmsg = '';

      
        if (count($_POST) > 0) {

            $totalPrice = $this->input->post('totalPrice');
            print_r($totalPrice);
            exit();
    

            if ($this->input->post('grand_total') > 0) {

                $checkoutdata = $this->input->post();
                $user_id = $this->input->post('user_id');

                $state = $this->input->post('state');
                $city = $this->input->post('city');
                $pincode = $this->input->post('pincode');
                $address = $this->input->post('address');

                $this->session->set_flashdata('gtotal', $this->input->post('grand_total'));

                $data = array('state' => $state, 'city' => $city, 'pincode' => $pincode, 'address' => $address);
                $checkoutdata['create_date_only'] = setDateOnly();
                $update = $this->CommonModal->updateRowById('user_registration', 'reg_id', $user_id, $data);

                $post = $this->CommonModal->insertRowReturnId('checkout', $checkoutdata);

                $this->session->set_flashdata('last_checkout_id', $post);

                $msg .= $post['name'] . ', your order is been placed, proceed to pay for confirmation <br>';
                $admmsg .= 'New order on process by ' . $post['name'] . ' Contact no. - ' . $post['number'];

                $unumber = $this->session->set_flashdata('unumber', $this->input->post('number'));


                foreach ($this->cart->contents() as $items) :
                    $product = array('checkoutid' => $post, 'product_id' => $items['id'], 'product_img' => $items['image'], 'product_name' => $items['name'], 'product_price' => $items['price'], 'product_quantity' => $items['qty'], 'total_pro_amt' => ($items['price'] * $items['qty']));
                    $this->CommonModal->insertRowReturnId('checkout_product', $product);
                    $msgpro .= 'Product Details - ' . $items['name'] . '<br> [ ' . $items['price'] . ' * ' . $items['qty'] . '] <br>';
                endforeach;

                if ($post != '') {
                    if ($this->input->post('payment_type') == '0') {
                        $this->cart->destroy();
                        redirect(base_url('Index/booking_status'));
                    } else {
                        // $data['company'] = "The Daffodils Farm";
                        // $data['title']              = 'Checkout payment ';
                        // $data['currency_code']      = 'INR';
                        // $data['grandtotal']         = (int)$this->input->post('grand_total');
                        // $data['name']               = $this->input->post('name');
                        // $data['email']              = $this->input->post('email');
                        // $data['number']             = $this->input->post('number');
                        // $data['callback_url']       = base_url() . '/Index/callback';
                        // $data['surl']               = base_url() . '/Index/success';
                        // $data['furl']               = base_url() . '/Index/failed';
                        $data['product']             = $post;
                        $this->load->view('payment-code', $data);
                    }
                } else {
                    echo 'Check Form Data';
                }
            } else {
                $this->session->set_userdata("msg", "Please select product. your card couldn't be empty");
                redirect(base_url('index/cart_checkout'));
            }
        }
    }

    public function fetchtoken()
    {
        $curl = curl_init();

        $customer_details = array(
            "customer_details" => array(
                "customer_id" => (string)sessionId('login_user_id'),
                "customer_email" => sessionId('login_user_emailid'),
                "customer_phone" => sessionId('login_user_contact')
            ),
            "order_amount" => sessionId('gtotal'),
            "order_currency" => "INR",
            "order_note" => "test order"
        );

        $details = json_encode($customer_details);

        // echo '<pre>';
        // print_r($details);
        // exit();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>  $details,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "x-api-version: 2022-09-01",
                "x-client-id: " .  $this->appId,
                "x-client-secret:" . $this->secret_key
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array("error" => 1));
            echo "cURL Error #:" . $err;
            die();
        } else {
            $result = json_decode($response, true);
            header('Content-Type: application/json; charset=utf-8');
            $output = array("payment_session_id" => $result["payment_session_id"]);
            echo json_encode($result);
            die();
        }
    }

    public function checkstatus()
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders/" . $_GET["order_id"],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "x-api-version: 2022-09-01",
                "x-client-id:" . $this->appId,
                "x-client-secret: " . $this->secret_key
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array("error" => 1));
            echo "cURL Error #:" . $err;
            die();
        } else {
            $result = json_decode($response, true);
            header('Content-Type: application/json; charset=utf-8');
            $output = array("order_status" => $result["order_status"]);
            echo json_encode($output);
            die();
        }
    }


    public function success()
    {

        $updateData = array('orderId' => $this->input->get('order_id'), 'order_token' => $this->input->get('order_token'), 'order_status' => $this->input->get('order_status'));

        $this->CommonModal->updateRowById('checkout', 'id', sessionId('last_checkout_id'), $updateData);
        $this->cart->destroy();

        $mailmessage = checkoutmail(sessionId('login_user_name'), $this->input->get('order_id'));
        mailmsg(sessionId('login_user_emailid'), 'Registered with Daffodils | Order Details', $mailmessage);

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Razorpay Success ';

        $msg = '';
        $msg .= "<h4>Your transaction is successful</h4>";
        $msg .= "<br/>";
        $msg .= "<p>Transaction ID: " . $this->session->flashdata('razorpay_payment_id') . '</p>';
        $msg .= "<br/>";
        $msg .= "<p>Order ID: " . $this->input->get('order_token') . '</p>';
        $data['message'] = $msg;

        $this->load->view('payment_msg', $data);
    }
    public function failed()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $updateData = array('orderId' => $this->input->get('order_id'), 'order_token' => $this->input->get('order_token'), 'order_status' => $this->input->get('order_status'));

        $this->CommonModal->updateRowById('checkout', 'id', sessionId('last_checkout_id'), $updateData);
        $this->cart->destroy();
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $this->cart->destroy();
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Payment Failed ';
        $msg = '';
        $msg .= "<h4>Your transaction got Failed</h4>";
        $msg .= "<br/>";
        $msg .= "<p>Transaction ID: " . $this->input->get('order_token') . '</p>';
        $msg .= "<br/>";
        $msg .= "<p>Order ID: " . $this->input->get('order_id') . '</p>';
        $data['message'] = $msg;

        $this->load->view('payment_msg', $data);
    }
    public function booking_status()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $order_id = "#Daffodils" . rand('1000', '10000');
        $updateData = array('orderId' => $order_id);

        $this->CommonModal->updateRowById('checkout', 'id', sessionId('last_checkout_id'), $updateData);

        $mailmessage = checkoutmail(sessionId('login_user_name'), $this->input->get('order_id'));
        mailmsg(sessionId('login_user_emailid'), 'Registered with Daffodils | Order Details', $mailmessage);
        $this->cart->destroy();
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Payment Status';
        $msg = '';
        $msg .= "<h4>Order Confirmed </h4>";
        $msg .= "<br/>";
        $msg .= "<p>Thank you for shopping on The Daffodils Farm.</p> ";
        $msg .= "<br/>";
        $msg .= "<p>We're prepping your order.You will be notified regarding the order shipment shortly .<br/><h5>Till then happy shopping 🙂</h5></p>";
        $data['message'] = $msg;



        $this->load->view('payment_msg', $data);
    }

    // ajax function
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $qty = $this->input->post('qty');

        // print_r($this->input->post());
        // exit();

        $product = $this->CommonModal->getRowByIdfield('products', 'product_id', $product_id, array('product_id', 'price', 'pro_name', 'img'));
        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => $qty,
            'price'   => $product[0]['price'],
            'name'    => htmlentities($product[0]['pro_name']),

            'image'    => $product[0]['img']
        );

        $this->cart->insert($data);
        // print_r($data);
    }
    public function cart_list()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Disclaimer ';

        $this->load->view('cart_list', $data);
    }
    public function update_qty()
    {
        extract($this->input->post());
        // print_r($this->input->post());
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty
        );


        $this->cart->update($data);
        // echo 're';
        print_r($data);
    }

    public function addTowishlist()
    {
        $product_id = $this->input->post('pid');
        $user_id = $this->session->userdata('login_user_id');
        $post = array('product_id' => $product_id, 'user_id' => $user_id);
        $ret =  $this->CommonModal->insertRow('products_wishlist', $post);
        if ($ret) {
            echo  '1';
        } else {
            echo '0';
        }
    }
    public function removewishlist()
    {
        $pw_id = $this->input->post('pid');
        $ret = $this->CommonModal->deleteRowById('products_wishlist', array('pw_id' => $pw_id));


        if ($ret) {
            echo  '1';
        } else {
            echo '0';
        }
    }

    public function fetch_totalitems()
    {
        echo $this->cart->total_items();
    }
    public function fetch_totalamount()
    {
        echo $this->cart->total();
    }
    public function delete_item()
    {
        $product_id = $this->input->post('pid');
        $data = array(
            'rowid' => $product_id,
            'qty'   => 0
        );


        $this->cart->update($data);
    }
    public function fetch_data()
    {

        $this->load->view('cart');
    }
    public function cartAjax()
    {

        $this->load->view('cartListAjax');
    }
    public function cartAjax2()
    {

        $this->load->view('cartListAjax2');
    }


    public function filterData()
    {
        // print_r($_POST);

        $price = ((isset($_POST['price'])) ? $_POST['price'] : '');

        $getsub_cate = ((isset($_POST['getsub_cate'])) ? $_POST['getsub_cate'] : '');
        $search = ((isset($_POST['search'])) ? $_POST['search'] : '');
        $category = ((isset($_POST['category'])) ? $_POST['category'] : '');
        $subcategory = ((isset($_POST['subcategory'])) ? $_POST['subcategory'] : '');
        $query = "SELECT * FROM `products` WHERE `status` = '0'";
        if (($search != '')  || ($category != '') || ($subcategory != '')) {


            // print_r($search);

            if ($search != '') {

                $query .= " AND `pro_name` LIKE '%" . trim($search) . "%'  OR `price` LIKE '%" . trim($search) . "%' OR `description` LIKE '%" . trim($search) . "%'  ";
            }

            if ($category != '') {
                $cate = implode("','", $category);
                $query .= " AND category_id IN('" . $cate . "')";
            }

            if ($subcategory != '') {
                $subcate = implode("','", $subcategory);
                $query .= " AND subcategory_id IN('" . $subcate . "')";
            }




            if ($getsub_cate != '') {

                $query .= " AND subcategory_id IN('" . $getsub_cate . "')";
            }

            if ($price != '') {
                if ($price == '0') {
                    $query .= " ORDER BY `price` ASC";
                } else {
                    $query .= " ORDER BY `price` DESC";
                }
            }
        }
        //  echo $query;
        $data['all_data'] = $this->CommonModal->runQuery($query);

        // print_r($all_data);


        $this->load->view('get_product', $data);
    }


    public function getProduct()
    {
        $categoryid = $this->input->post('catid');
        $subcategoryid = $this->input->post('subcatid');
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        if ($subcategoryid != '') {
            $data['products'] = $this->CommonModal->getDataByIdInOrderLimit('products', array('subcategory_id' => $subcategoryid), 'product_id', 'desc', $limit, $offset);
        } elseif ($categoryid != '') {
            $data['products'] =  $this->CommonModal->getDataByIdInOrderLimit('products', array('category_id' => $categoryid), 'product_id', 'desc', $limit, $offset);
            //    $data['products'] = $this->CommonModal->getAllRows('products');

        } else {

            $data['products'] = $this->CommonModal->getAllRows('products');
            // print_r($data['products']);
        }

        $this->load->view('get_product', $data);
    }
    public function checkPromo()
    {
        $promocode = $this->input->post('promocode');
        echo json_encode($this->CommonModal->getRowById('promocode', 'title', $promocode));
    }

    public function faq()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['faq'] = $this->CommonModal->getAllRowsInOrder('faq', 'fid', 'desc');


        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'FAQ ';

        $this->load->view('faq', $data);
    }
    public function disclaimer()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Disclaimer ';

        $this->load->view('disclaimer', $data);
    }
    public function privacypolicy()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';

        $data['privacypolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid', '17');


        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Privacy Policy ';

        $this->load->view('privacypolicy', $data);
    }

    public function returnPolicy()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';

        $data['policy'] = $this->CommonModal->getAllRows('tbl_return_policy');


        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Return Policy ';

        $this->load->view('returnPolicy', $data);
    }

    public function shipping_policy()
    {

        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['company'] = "The Daffodils Farm";
        $data['title'] = 'Shipping Policy ';

        $data['privacypolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid',  '18');
        $this->load->view('shipping_policy', $data);
    }


    public function terms_condition()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['terms'] = $this->CommonModal->getRowById('terms', 'tid', '1');


        $data['company'] = "The Daffodils Farm";

        $data['title'] = 'Terms and condition ';

        $this->load->view('terms_condition', $data);
    }
    public function consultation()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('consult_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Consultation';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('consultation', $data);
    }

    public function videos()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['videos'] = $this->CommonModal->getAllRowsInOrder('videos', 'vid', 'desc');
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Videos';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('videos', $data);
    }
    public function blogs()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['blogs'] = $this->CommonModal->getAllRowsInOrder('blogs', 'bid', 'desc');
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Blogs';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('blogs', $data);
    }
    public function video_detail($vid)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['videos'] = $this->CommonModal->getRowByIdInOrder('videos', array('vid' => $vid), 'vid', 'desc');
        $data['allvideos_list'] = $this->CommonModal->getAllRowsInOrder('videos', 'vid', 'desc');

        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Videos';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('video_detail', $data);
    }





    public function product_review($pid)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['row'] = $this->CommonModal->getRowById('products', 'product_id', $pid);
        // $data['products_image'] = $this->CommonModal->getRowById('products_image', 'product_id', $pid);
        // print_r($data['row']);
        $data['product_id'] = $pid;

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['image'] = imageUpload('image', 'uploads/review');
            $insert = $this->CommonModal->insertRowReturnId('product_reveiw', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your review is successfully submit');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error');
            }
            redirect(base_url('index/orders'));
        } else {
        }
        $data['company'] = "The Daffodils Farm";
        $data['title'] = ' Product Review';
        $data['logo'] = 'assets/logo.png';
        $this->load->view('review', $data);
    }


    // public function upload_product_list()
    // {
    //     $data['logo'] = 'assets/logo.png';
    //     $data['category'] = $this->CommonModal->getAllRowsInOrderWithLimit('category', '7', 'category_id', 'ASC');

    //     $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
    //     $data['featured'] = $this->CommonModal->getRowByIdWithLimit('products', 'featured', 1, 1);

    //     if (count($_POST) > 0) {
    //         $post = $this->input->post();

    //         $post['list'] = imageUpload('list', 'uploads/plist/');
    //         $ins = $this->CommonModal->insertRow('product_enquiry', $post);
    //         if ($ins) {
    //             $ToEmail = 'info@thedaffodilsfarm.com';
    //             $EmailSubject = 'Product List';
    //             $mailheader = "From:   info@thedaffodilsfarm.com\r\n";
    //             $mailheader .= "Reply-To:   info@thedaffodilsfarm.com\r\n";
    //             $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

    //             $msg .= "Name: " . $post["name"] . ("<br>");
    //             $msg .= "Mobile: " . $post["number"] . ("<br>");
    //             $msg .= "List:  <a href=" . base_url() . 'uploads/plist/' . $post["list"] . " target='_blank'>Click Here</a>" . ("<br>");

    //             $msg .= "Date: " . date('Y-m-d') . ("<br>");

    //             mail($ToEmail,  $EmailSubject, $msg, $mailheader) or die("Failure");
    //             $this->session->set_userdata('message', 'We received your product list. we will call for confirmation of the order');
    //             $this->session->set_userdata('msg_class', 'text-success');
    //         } else {
    //             $this->session->set_userdata('message', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
    //             $this->session->set_userdata('msg_class', 'text-success');
    //         }
    //     } else {
    //     }
    //     $data['company'] = "The Daffodils Farm";
    //     $data['title'] = ' Upload Product List';
    //     $data['logo'] = 'assets/logo.png';
    //     $this->load->view('plist', $data);
    // }
}
