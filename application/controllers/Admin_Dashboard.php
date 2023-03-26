<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (sessionId('admin_id') == "") {
            redirect(base_url('admin'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['category'] = $this->CommonModal->getNumRow('category');
        $data['products'] = $this->CommonModal->getNumRow('products');
        $data['user_registration'] = $this->CommonModal->getNumRow('user_registration');
        $data['contact_query'] = $this->CommonModal->getNumRow('contact_query');
        $data['new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['working'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['cancelled'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['completed'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'create_date_only', setDateOnly());
        $this->load->view('admin/dashboard', $data);
    }

    public function banner()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Home Banner";
        $data['banner'] = $this->CommonModal->getAllRows('banner');
        $config['upload_path'] = base_url('uploads/banner');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/banner/";
            move_uploaded_file($_FILES["b_img"]["tmp_name"], "$folder" . $no . $_FILES["b_img"]["name"]);
            $file_name = $no . $_FILES["b_img"]["name"];
            $post['b_img'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('banner', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'Banner added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/banner'));
        } else {
            $this->load->view('admin/banner', $data);
        }
    }
    public function deletebanner($bid)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "banner";
        $data = $this->CommonModal->getRowById('banner', 'bid', $bid);
        // print_r($data[0]['b_img']);
        if (file_exists("./uploads/banner/' . $data[0]['b_img']")) {
            unlink('./uploads/banner/' . $data[0]['b_img']);
        }

        if ($this->CommonModal->deleteRowById($table, array('bid' => $bid))) {

            $this->session->set_flashdata('msg', 'Banner Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Banner not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/banner');
    }
    public function disable()
    {
        $id = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $status = $this->uri->segment(5);

        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        if ($table == 'category') {
            $this->CommonModal->updateRowById($table, 'category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_category'));
        }
        if ($table == 'sub_category') {
            $this->CommonModal->updateRowById($table, 'sub_category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_subcategory'));
        }
        if ($table == 'promocode') {
            $this->CommonModal->updateRowById($table, 'pid', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/promocode'));
        }
        if ($table == 'products') {
            $this->CommonModal->updateRowById($table, 'product_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_products'));
        }
    }

    public function testimonials()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Testimonials  ";
        $data['testimonials'] = $this->CommonModal->getAllRows('testimonials');


        if (count($_POST) > 0) {

            $post = $this->input->post();
            $savedata = $this->CommonModal->insertRowReturnId('testimonials', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later  ');
            }
            redirect(base_url('admin_Dashboard/testimonials'));
        } else {
            $this->load->view('admin/testimonials', $data);
        }
    }
    public function deletetestimonials($tid)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "testimonials";
        $this->CommonModal->deleteRowById($table, array('tid' => $tid));
        redirect('admin_Dashboard/testimonials');
    }

    public function view_category()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Product Main Category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $this->load->view('admin/view_category', $data);
    }


    public function add_category()
    {
        $data['title'] = "Add Product Main Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $this->load->view('admin/add_category', $data);
    }

    public function addcategory()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            $cat_name = $this->input->post('cat_name');

            $file_name = imageUpload('image', 'uploads/category/');
            // $no = rand();
            // $folder = base_url() . "uploads/category/";
            // move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            // $file_name = $no . $_FILES["image"]["name"];

            $table = "category";
            $data = array('cat_name' => $cat_name, 'image' => $file_name);

            if ($this->Dashboard_model->insertdata($table, $data)) {

                $this->session->set_flashdata('msg', 'Category Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }

            redirect(base_url('admin_Dashboard/view_category'));
        } else {
            redirect(base_url('admin_Dashboard/add_category'));
        }
    }



    public function edit_category($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products Main category";
        $data['categoryInfo'] = $this->Dashboard_model->get_category_Info($category_id);
        $this->load->view('admin/edit_category', $data);
    }

    public function deletecategory($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "category";

        $data = $this->CommonModal->getRowById('category', 'category_id', $id);

        if (file_exists("./uploads/category/' . $data[0]['image']")) {
            unlink('./uploads/category/' . $data[0]['image']);
        }

        if ($this->CommonModal->deleteRowById($table, array('category_id' => $id))) {
            $this->session->set_flashdata('msg', 'Category Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Category not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }


        redirect('admin_Dashboard/view_category');
    }


    public function view_subcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Product Sub Category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $this->load->view('admin/view_subcategory', $data);
    }

    public function add_subcategory()
    {
        $data['title'] = "Add Product Sub Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/add_subcategory', $data);
    }


    public function addsubcategory()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            $cat_id = $this->input->post('cat_id');
            $subcat_name = $this->input->post('subcat_name');

            $file_name = imageUpload('image', 'uploads/subcategory/');

            $table = "sub_category";
            $data = array('cat_id' => $cat_id, 'subcat_name' => $subcat_name, 'image' => $file_name);
            if ($this->Dashboard_model->insertdata($table, $data)) {

                $this->session->set_flashdata('msg', 'Subcategory Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('admin_Dashboard/view_subcategory'));
        } else {
            redirect(base_url('admin_Dashboard/add_subcategory'));
        }
    }


    public function editcategory()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            $id = $this->input->post('id');
            $cat_name = $this->input->post('cat_name');

            $no = rand();
            if ($_FILES["image"]["name"] == "") {
                $this->db->select("*");
                $this->db->where('category_id', $id);
                $query = $this->db->get($table);
                $result = $query->row();
                $file_name = $result->image;
            } else {
                $uploadfile = $_FILES["image"]["tmp_name"];
                $folder = "uploads/category/";
                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
                $file_name = $no . $_FILES["image"]["name"];
            }
            $data = array('cat_name' => $cat_name, 'image' => $file_name);

            $update = $this->CommonModal->updateRowById($table, 'category_id', $id, $data);
            if ($update) {

                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }

            redirect(base_url() . 'admin_Dashboard/view_category');
        } else {
            redirect(base_url() . 'admin_Dashboard/edit_category');
        }
    }
    public function edit_subcategory($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products Sub category";
        $data['categoryInfo'] = $this->CommonModal->getRowById('sub_category', 'sub_category_id', $category_id);
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/edit_subcategory', $data);
    }

    public function editsubcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            print_r($_POST);



            $id = $this->input->post('id');
            $cat_id = $this->input->post('cat_id');
            $subcat_name = $this->input->post('subcat_name');

            $no = rand();
            if ($_FILES["image"]["name"] == "") {
                $this->db->select("*");
                $this->db->where('sub_category_id', $id);
                $query = $this->db->get($table);
                $result = $query->row();
                $file_name = $result->image;
            } else {
                $uploadfile = $_FILES["image"]["tmp_name"];
                $folder = "uploads/subcategory/";
                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
                $file_name = $no . $_FILES["image"]["name"];
            }


            $data = array('cat_id' => $cat_id, 'subcat_name' => $subcat_name, 'image' => $file_name);

            $update = $this->CommonModal->updateRowById('sub_category', 'sub_category_id', $id, $data);
            if ($update) {

                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'admin_Dashboard/view_subcategory');
        } else {
            redirect(base_url() . 'admin_Dashboard/edit_subcategory');
        }
    }


    public function deletesubcategory($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "sub_category";
        $data = $this->CommonModal->getRowById('sub_category', 'sub_category_id', $id);


        if (file_exists("./uploads/subcategory/' . $data[0]['image']")) {

            unlink('./uploads/subcategory/' . $data[0]['image']);
        }

        if ($this->CommonModal->deleteRowById($table, array('sub_category_id' => $id))) {
            $this->session->set_flashdata('msg', 'Subcategory Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Category not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/view_subcategory');
    }

    public function view_products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $data['title'] = "Products";
        $data['products'] = $this->CommonModal->getAllRows('products');

        $this->load->view('admin/view_products', $data);
    }

    public function get_subcategory()
    {
        $category_id = $_POST['category_id'];
        $data = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_id);
        echo '<option>Select Product Sub Category</option>';
        foreach ($data as $da) {
            echo '<option value="' . $da['sub_category_id'] . '">' . $da['subcat_name'] . '</option>';
        }
    }
    public function add_products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Product";
        $table = "category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $this->load->view('admin/add_products', $data);
    }

    public function addproducts()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['img'] = imageUpload('img', 'uploads/products/');
            $post['img2'] = imageUpload('img2', 'uploads/products/');
            $post['img3'] = imageUpload('img3', 'uploads/products/');

            $productId = $this->CommonModal->insertRowReturnId('products', $post);

            if ($productId) {
                $this->session->set_flashdata('msg', 'Product  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }



            redirect(base_url() . 'admin_Dashboard/view_products');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_products');
        }
    }

    public function edit_products()
    {

        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products";
        $data['productInfo'] = $this->Dashboard_model->get_productss($id);
        $data['category'] = $this->Dashboard_model->fetchall('category');


        if (count($_POST) > 0) {
            $post = $this->input->post();
            $temp_image = $post['image'];


            $imgtemp = $post['img'];

            if ($_FILES['img_temp']['name'] != '') {
                $img = imageUpload('img_temp', 'uploads/products/');
                $post['img'] = $img;
                if ($imgtemp != "") {
                    unlink('uploads/products/' . $imgtemp);
                }
            }

            $img2temp = $post['img2'];

            if ($_FILES['img2_temp']['name'] != '') {
                $img2 = imageUpload('img2_temp', 'uploads/products/');
                $post['img2'] = $img2;
                if ($img2temp != "") {
                    unlink('uploads/products/' . $img2temp);
                }
            }

            $img3temp = $post['img3'];
            if ($_FILES['img3_temp']['name'] != '') {
                $img3 = imageUpload('img3_temp', 'uploads/products/');
                $post['img3'] = $img3;
                if ($img3temp != "") {
                    unlink('uploads/products/' . $img3temp);
                }
            }




            $update = $this->CommonModal->updateRowById('products', 'product_id', $id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Product Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('admin_Dashboard/view_products'));
        } else {

            $this->load->view('admin/edit_products', $data);
        }

        //redirect('admin/edit_products', $data);
    }

    public function edit_productsimg($product_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (count($_POST) > 0) {
            $no = rand();
            $folder = "uploads/products/";
            move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $no . $_FILES["img"]["name"]);
            $file_name1 = $no . $_FILES["img"]["name"];
            $this->CommonModal->insertRowReturnId('products_image', array('product_id' => $product_id, 'pi_name' => $file_name1));

            redirect(base_url() . 'admin_Dashboard/edit_productsimg/' . $product_id);
        } else {
            $data['productimg'] = $this->CommonModal->getRowById('products_image', 'product_id', $product_id);
            $this->load->view('admin/edit_productsimg', $data);
        }
    }


    public function deleteproducts($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "products";
        $this->Dashboard_model->deleteproducts($table, $id);
        redirect('admin_Dashboard/view_products');
    }
    public function deleteproductimg($pi_id, $product_id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $this->CommonModal->deleteRowById('products_image', array('pi_id' => $pi_id));
        redirect('admin_Dashboard/edit_productsimg/' . $product_id);
    }

    public function deals()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Our deals";
        $data['deals'] = $this->CommonModal->getAllRows('deals');
        $config['upload_path'] = base_url('uploads/deals');

        if (count($_FILES) > 0) {

            $post['timage'] = imageUpload('timage', 'uploads/deals/');


            $savedata = $this->CommonModal->insertRowReturnId('deals', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'deals image Is added');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later');
            }
            redirect(base_url('admin_Dashboard/deals'));
        } else {
            $this->load->view('admin/deals', $data);
        }
    }

    public function deletedeals()
    {
        $id = $this->input->post('id');
        $table = "deals";
        $delete = $this->CommonModal->deleteRowById($table, array('id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }


    public function contact_query()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Contact Query";
        $table = "contact_query";
        $data['contact'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/contact', $data);
    }
    public function deletecontact($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "contact_query";
        $this->CommonModal->deleteRowById($table, array('cid' => $id));
        redirect('admin_Dashboard/contact_query');
    }
    public function promocode()
    {
        $table = "promocode";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Promocode";
        $data['promocode'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/view_promocode', $data);
    }
    public function add_promocode()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Promocode";
        $this->load->view('admin/add_promocode', $data);
    }
    public function addpromocode()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('promocode', $data);
        if ($done) {
            $this->session->set_flashdata('msg', 'Promocode Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }

        redirect(base_url() . 'admin_Dashboard/promocode');
    }
    public function deletepromocode($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "promocode";
        $done =  $this->CommonModal->deleteRowById($table, array('pid' => $id));

        if ($done) {
            $this->session->set_flashdata('msg', 'Promocode delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        }

        redirect('admin_Dashboard/promocode');
    }
    public function deleteprivacypolicy($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "privacypolicy";
        $this->CommonModal->deleteRowById($table, array('ppid' => $id));
        redirect('admin_Dashboard/privacyPolicy');
    }
    public function statusupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $status));
        redirect(base_url('admin_Dashboard/orderPlaced'));
    }
    public function orderPlaced()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";
        $id = $this->uri->segment(3);
        if ($id == '') {
            if (!empty($this->input->post('orderstatus'))) {
                $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('status' => $this->input->post('orderstatus')), 'id', 'desc', '10000', '0');
            } else {
                $data['checkout'] = $this->CommonModal->getAllRowsInOrder($table, 'id', 'desc');
            }
        } else {
            $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('user_id' => $id), 'id', 'desc', '10000', '0');
        }

        $this->load->view('admin/view_orderPlced', $data);
    }
    public function orderPlacede()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";
        $id = $this->uri->segment(3);
        if ($id == '') {
            $data['checkout'] = $this->CommonModal->getAllRows($table);
        } else {
            $data['checkout'] = $this->CommonModal->getRowById($table, 'user_id', $id);
        }

        $this->load->view('admin/view_orderPlced2', $data);
    }


    public function orderPlaced_status($status = NULL)
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";

        if ($status == '') {

            $data['checkout'] = $this->CommonModal->getAllRowsInOrder($table, 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('status' => $status), 'id', 'desc', '10000', '0');
        }
        $data['count_new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['count_order'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['count_shipment'] = $this->CommonModal->getNumRows('checkout', array('status' => '5'));
        $data['count_way'] = $this->CommonModal->getNumRows('checkout', array('status' => '6'));
        $data['count_delivered'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['count_retreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '8'));
        $data['count_return'] = $this->CommonModal->getNumRows('checkout', array('status' => '4'));
        $data['count_canreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['count_can'] = $this->CommonModal->getNumRows('checkout', array('status' => '7'));


        $this->load->view('admin/view_orderPlced', $data);
    }
    public function OrderPlacedDetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        $this->load->view('admin/OrderPlacedDetails', $data);
    }
    public function registeredUser()
    {
        $table = "user_registration";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Registered User";
        $data['registeredUser'] = $this->CommonModal->getAllRowsInOrder($table, 'reg_id', 'DESC');
        $this->load->view('admin/registeredUser', $data);
    }
    public function privacyPolicy()
    {
        $table = "privacypolicy";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getRowById($table , 'ppid' , '17');
        $this->load->view('admin/privacyPolicy', $data);
    }
    public function editprivacypolicy()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('privacypolicy', 'ppid', $id, $post);
            redirect(base_url('admin_Dashboard/privacyPolicy'));
        } else {
            $this->load->view('admin/editprivacypolicy', $data);
        }
    }
    
     public function shipping_policy()
    {
      
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Shipping Policy";
        $data['Shippingpolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid',  '18');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('privacypolicy', 'ppid', '18', $post);
            redirect(base_url('admin_Dashboard/shipping_policy'));
        } else {
            $this->load->view('admin/shipping_policy', $data);
        }
    }
    
    

    public function terms()
    {
        $table = "terms";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Terms And Condition";
        $data['terms'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/terms', $data);
    }
    public function edit_terms()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Terms";
        $data['terms'] = $this->CommonModal->getRowById('terms', 'tid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('terms', 'tid', $id, $post);
            redirect(base_url('admin_Dashboard/terms'));
        } else {
            $this->load->view('admin/edit-terms', $data);
        }
    }

    public function faq()
    {
        $table = "faq";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "FAQ";
        $data['faq'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/faq', $data);
    }
    public function add_faq()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add FAQ";
        $this->load->view('admin/add_faq', $data);
    }
    public function addfaq()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('faq', $data);
        if ($done) {

            $this->session->set_flashdata('msg', 'FAQ Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect(base_url() . 'admin_Dashboard/faq');
    }
    public function editfaq()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit FAQ";
        $data['faq'] = $this->CommonModal->getRowById('faq', 'fid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowById('faq', 'fid', $id, $post);
            if ($update) {

                $this->session->set_flashdata('msg', 'FAQ Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }

            redirect(base_url('admin_Dashboard/faq'));
        } else {
            $this->load->view('admin/editfaq', $data);
        }
    }
    public function add_privacyPolicy()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Privacy Policy";
        $this->load->view('admin/add_privacyPolicy', $data);
    }
    public function addprivacyPolicy()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('privacypolicy', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/privacyPolicy');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_privacyPolicy');
        }
    }

    public function contactdetails()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Contact Details";
        $data['contactdetails'] = $this->CommonModal->getRowById($table, 'cid', '1');
        $this->load->view('admin/contactdetails', $data);
    }
    public function blockuser($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "user_registration";
        $this->CommonModal->deleteRowById($table, array('reg_id' => $id));
        redirect('admin_Dashboard/registeredUser');
    }
    public function deletefaq($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $table = "faq";
        $delete = $this->CommonModal->deleteRowById($table, array('fid' => $id));
        if ($delete) {

            $this->session->set_flashdata('msg', 'FAQ Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }



        redirect('admin_Dashboard/faq');
    }
    public function orderdelete($id)
    {
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('viewfield' => '1'));
        redirect('admin_Dashboard/orderPlaced');
    }


    public function editcontactdetils()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $datav = $this->input->post();
        $update = $this->CommonModal->updateRowByMoreId($table, array('cid' => '1'), $datav);
        if ($update) {

            $this->session->set_flashdata('msg', 'Category Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }



        redirect(base_url() . 'admin_Dashboard/contactdetails');
    }
    public function productOnvarified()
    {
        $varified = $this->input->post('varified');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('varified' => $varified));
    }
    public function featuredProduct()
    {
        $featured = $this->input->post('featured');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('featured' => $featured));
    }
    public function fetchorder()
    {
        $filter_status = $this->input->post('filter_status');
        if ($filter_status == '') {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0'), 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => $filter_status, 'viewfield' => '0'), 'id', 'desc');
        }

        $this->load->view('admin/orderlist', $data);
    }





    public function offers()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Our Offers";
        $data['Offers'] = $this->CommonModal->getAllRows('tbl_offer');
        

        if (count($_POST) > 0) {
            // print_r($_POST);

            $post = $this->input->post();


            $savedata = $this->CommonModal->insertRowReturnId('tbl_offer', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Offers image Is added');
            } else 
            {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later');
            }
            redirect(base_url('admin_Dashboard/Offers'));
        } else {
            $this->load->view('admin/offer', $data);
        }
    }

    public function deleteOffers()
    {
        $id = $this->input->post('id');
        $table = "tbl_offer";
        $delete = $this->CommonModal->deleteRowById($table, array('id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
}
