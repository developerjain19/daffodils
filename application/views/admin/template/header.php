      <aside class="sidebar sidebar-left">
        <div class="sidebar-content">
          <div class="aside-toolbar">
            <ul class="site-logo">
              <li>
                <!-- START LOGO -->
                <a href="<?php echo base_url('admin'); ?>">
                  <div class="logo">
                    <img src="<?= base_url(); ?>assets/logo.png" alt="logo" style="height:55px" class="lwidth" />
                  </div>
                </a>
              </li>
            </ul>
            <ul class="header-controls">
              <li class="nav-item menu-trigger">
                <button type="button" class="btn btn-link btn-menu" data-toggle-state="mini-sidebar" data-key="leftSideBar">
                <i class="fas fa-dot-circle"></i>
                </button>
              </li>
            </ul>
          </div>
          <nav class="main-menu">
            <ul class="nav metismenu">
              <li>
                <a href="<?= base_url('admin'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Dashboard</span></a>
              </li>


              <li>
                <a href="<?= base_url('admin_Dashboard/deals'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>deals</span></a>
              </li>
          

              <li class="nav-dropdown">
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Product Category</span></a>
                <ul class="collapse nav-sub" aria-expanded="true">

                  <li>
                    <a href="<?= base_url('admin_Dashboard/view_category'); ?>"><span>Main Category</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url('admin_Dashboard/view_subcategory'); ?>"><span>Sub Category</span></a>
                  </li>

                </ul>
              </li>

              <li>
                <a href="<?= base_url('admin_Dashboard/view_products'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Products</span></a>
              </li>

              <li>
                <a href="<?= base_url('admin_Dashboard/registeredUser'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Registered User</span></a>
              </li>

              <li>
                <a href="<?= base_url('admin_Dashboard/promocode'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Promocode</span></a>
              </li>


            <li>
                <a href="<?= base_url('admin_Dashboard/offers'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>User Offer</span></a>
              </li>

              <li>
                <a href="<?= base_url('admin_Dashboard/contact_query'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Contact Query</span></a>
              </li>

              <li class="nav-dropdown">
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Company Policy</span></a>
                <ul class="collapse nav-sub" aria-expanded="true">
                  <li>
                    <a href="<?= base_url('admin_Dashboard/privacyPolicy'); ?>"><span>Privacy policy</span></a>
                  </li>
                  <li>
                    <a href="<?= base_url('admin_Dashboard/terms'); ?>"><span>Terms & Condition</span></a>
                  </li>
                   <li>
                    <a href="<?= base_url('admin_Dashboard/shipping_policy'); ?>"><span>Shipping Policy</span></a>
                  </li>
                  
                  <li>
                    <a href="<?= base_url('admin_Dashboard/faq'); ?>"><span>FAQ</span></a>
                  </li>

                </ul>
              </li>
              
                  <li>
                <a href="<?= base_url('admin_Dashboard/orderPlaced'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Order List</span></a>
              </li>
              <li>
              <a href="<?= base_url('admin_Dashboard/contactdetails'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Contact Details / Social links</span></a>
              </li>

              <li>
                <a href="<?= base_url('admin_Dashboard/banner'); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><span>Home Banner</span></a>
              </li>

             

            </ul>
          </nav>
        </div>
      </aside>