

      <div id="sub-container">
        <div id="mainMenu">
          <i class="fas fa-chevron-left" style="color: #8e9090"></i> MAIN MENU
        </div>
        <hr />
        <div id="sub-container-content">
          <!-- <div class="sidenavContentHeader">Prime Video</div>
          <a href="#"><div class="sidenavContent">All Videos</div></a> -->
        </div>
      </div>
    </div>
    <!-- Grab user_id from session -->
    <input type="hidden" id="sess_user_id" value="<?php echo $this->session->userdata('user_id')  ?>">
    <!--Not Sidenav-->
    <div>

  <div class="main-sec"></div>



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <!-- <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>assets/img/sli1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
     <img src="<?php echo base_url(); ?>assets/img/sli2.jpg" class="img-fluid full-width" alt="Banner">
    </div> -->
    <?php $active = true; ?>
    <?php foreach($banner as $ban):?>
      <div class="carousel-item <?php echo ($active == true)?"active":"" ?>"> 
        <img src="<?php echo base_url(); ?>admin/assets/uploads/banners/<?php echo $ban->ban_img ?>" class="d-block w-100" alt="...">
      </div>
    <?php $active = false; ?>
    <?php endforeach; ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>













  </section>
  <!-- slider -->
  <!-- Browse by category -->
  <section class="browse-cat bg-theme-primary section-padding">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12 din-non">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Browse by Product <span class="fs-14 align-self-center">
                <a href="#">See All Products</a></span></h3>
          </div>
        </div>
        <div class="col-12">
          <div class="category-slider swiper-container">
            <div class="swiper-wrapper">

              <?php foreach($proscro as $proscros){ ?>
              <div class="swiper-slide">
                <a href="<?php echo base_url(); ?>SubCategory/SubCategoryMenu/<?php echo $proscros->pro_sub_cat_id ?>" class="categories">
                  <div class="icon text-custom-white bg-light-green ">
                    <img src="<?php echo base_url(); ?>admin/assets/uploads/prodsubcat/<?php echo $proscros->pro_sub_cat_img ?>" class="rounded-circle" alt="categories">
                  </div> <span class="text-light-black cat-name"><?php echo $proscros->pro_sub_cat_name ?></span>
                </a>
              </div>
               <?php } ?>
               <div class="swiper-slide">
                <a href="<?php echo base_url() ?>All/AllPage" class="categories">
                  <div class="icon text-custom-white bg-light-green ">
                    <img src="<?php echo base_url(); ?>admin/assets/uploads/prodsubcat/all.png" class="rounded-circle" alt="categories">
                  </div> <span class="text-light-black cat-name">ALL</span>
                </a>
              </div>
            </div>

            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Browse by category -->
  <!-- sell section -->
  <section class="recent-order section-padding">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Deals Of The Day <span class="fs-14">
                <!-- <a href="order-details.html">See All Bestdeal</a></span></h3> -->
          </div>
        </div>
        <?php foreach($dod as $dods){ ?>
          <?php foreach($product_list as $product_lists){ ?>
            <?php if($product_lists->pro_list_id == $dods->dod_product_id){ ?>
              <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-6">
          <div class="product-box mb-md-20">
            <div class="product-img">
              <a href="<?php echo base_url() ?>singleProduct/<?php echo $product_lists->pro_list_id ?>">
                <img src="<?php echo base_url(); ?>admin/assets/uploads/productlist/<?php echo $product_lists->pro_list_img; ?>" class="img-fluid full-width" alt="product-img">
              </a>
              <div class="product-badge">
                <div class="product-label new"> <span>Deal</span>
                </div>
                <div class="product-label discount"> <span><?php echo $dods->dod_discount; ?>%</span>
                </div>
              </div>
              <div class="button-group"> <a href="#" data-toggle="tooltip" data-placement="left" onclick="addWishList(<?php echo $product_lists->pro_list_id ?>)" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="" onclick="product_list_modal(<?php echo $product_lists->pro_list_id ?>)"  data-toggle="modal" data-target="#quick_view"><span
                    data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
              </div>
            
            </div>
            <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $product_lists->pro_sub_cat_name; ?></a></span>
              <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $product_lists->pro_list_name; ?></a></h6>
              <div class="product-money mt-10"> <span class="text-dark-red fw-500">$<?php echo $product_lists->pro_list_dicount_price; ?></span>
                <span class="text-price">$<?php echo $product_lists->prod_list_price_original; ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php }}} ?>
      </div>
    </div>
  </section>
  <!-- sell section end -->
  <!--shopping section end-->
  <!-- advertisement banner-->
  <?php foreach($super_deals as $super_deals1){ ?>
  <section class="section-padding advertisement-banner-1">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-lg-8">
          <div class="advertisement-text-1">
            <h6 class="sub-head">Super deal of the Month</h6>
            <h3 class="text-white heading"><?php echo $super_deals1->super_deal_name ?></h3>
          
            <a href="<?php echo base_url() ?>SubCategory/SubCategoryMenu/<?php echo $super_deals1->super_sub_category_fk ?>" class="btn-solid with-line btn-big mt-20"><span>Shop Now <i class="fas fa-caret-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
  <!-- advertisement banner-->
  <!-- Hot Deals -->
  <section class="ex-collection section-padding bg-theme-primary">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title"> Our Hot Deals</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach($hot_deals as $hdeal){ ?>
        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
          <figure class="banner-statistics">
            <a href="#" class="promo-lines">
              <img src="<?php echo base_url(); ?>admin/assets/uploads/hotdeals/<?php echo $hdeal->deal_image ?>" alt="product banner" class="full-width img-fluid">
            </a>
            <div class="banner-content text-left">
              <h6 class="banner-text1"><?php echo $hdeal->pro_sub_cat_name ?></h6>
              <h4 class="banner-text2"><?php echo $hdeal->deal_second_head ?></h4>
              <a href="<?php echo base_url() ?>SubCategory/SubCategoryMenu/<?php echo $hdeal->deal_psc_fk ?>" class="btn btn-text">Shop Now</a>
            </div>
          </figure>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!--Hot deals End-->
  <!--shopping section-->
  <section class="section-padding our-product">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Our Latest Products</h3>
          </div>
        </div>
        
        <div class="col-lg-12 col-md-12">
          <div class="row">

          <?php foreach($latest_product as $latest_product1){ ?>
            <?php foreach($latest_product_list as $latest_product_list1){ ?>
              <?php if($latest_product_list1->pro_list_id == $latest_product1->latpro_pro_id){ ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6">
              <div class="product-box mb-md-20">
                <div class="product-img">
                  <a href="#">
                    <img src="<?php echo base_url(); ?>admin/assets/uploads/productlist/<?php echo $latest_product_list1->pro_list_img; ?>" class="img-fluid full-width" alt="product-img">
                  </a>
                  <div class="product-badge">
                    <div class="product-label new"> <span>New</span>
                    </div>
                  </div>
                  <div class="button-group"> <a href="#" data-toggle="tooltip" onclick="addWishList(<?php echo $latest_product_list1->pro_list_id ?>)" data-placement="left" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                    <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" onclick="product_list_modal(<?php echo $latest_product_list1->pro_list_id ?>)" data-toggle="modal" data-target="#quick_view"><span
                        data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                  </div>
                
                </div>
                <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $latest_product_list1->pro_sub_cat_name; ?></a></span>
                  <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $latest_product_list1->pro_list_name; ?></a></h6>
                  <div class="product-money mt-10"> <span class="text-dark-red fw-500">$<?php echo $latest_product_list1->pro_list_dicount_price; ?></span>
                    <span class="text-price">$<?php echo $latest_product_list1->prod_list_price_original; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <?php }}} ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--shopping section end-->
  <!-- advertisement banner-->
  <section class="section-padding advertisement-banner">
    <div class="row">
      <div class="col-12">
        <div class="advertisement-text">
          <h3 class="fs-60 text-white">SALE <span class="text-dark-red">25%</span>OFF</h3>
          <p class="fs-18">Shop the latest products right we have beard supplies from top brands.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- advertisement banner-->
  <!--shopping section-->
  <section class="section-padding our-product">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title"> Our Various Plants</h3>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="row">
          <?php foreach($Various_product as $Various_product1){ ?>
          <?php foreach($Various_product_list as $Various_product_list1){ ?>
          <?php if($Various_product1->varpro_pro_id == $Various_product_list1->pro_list_id){ ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6">
              <div class="product-box mb-md-20">
                <div class="product-img">
                  <a href="<?php echo base_url() ?>singleProduct/<?php echo $Various_product1->varpro_pro_id ?>">
                    <img src="<?php echo base_url(); ?>admin/assets/uploads/productlist/<?php echo $Various_product_list1->pro_list_img; ?>" class="img-fluid full-width" alt="product-img">
                  </a>
                  <div class="product-badge">
                    <div class="product-label new"> <span>New</span>
                    </div>
                  </div>
                  <div class="button-group"> <a href="#" data-toggle="tooltip" onclick="addWishList(<?php echo $Various_product_list1->pro_list_id ?>)" data-placement="left" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                    <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" onclick="product_list_modal(<?php echo $Various_product_list1->pro_list_id ?>)" data-toggle="modal" data-target="#quick_view"><span
                        data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                  </div>
                  
                </div>
                <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $Various_product_list1->pro_sub_cat_name; ?></a></span>
                  <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $Various_product_list1->pro_list_name; ?></a></h6>
                  <div class="product-money mt-10"> <span class="text-dark-red fw-500">$<?php echo $Various_product_list1->pro_list_dicount_price; ?></span>
                    <span class="text-price">$<?php echo $Various_product_list1->prod_list_price_original; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <?php }}} ?>

            
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
          <div class="large-product-box  p-relative">
            <img src="<?php echo base_url(); ?>assets/img/promo/p-2.jpg" class="img-fluid full-width" alt="image">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--shopping end section-->
  <!--Special offer-->
  <section class="section-padding ex-collection bg-theme-primary">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Our Special Offers</h3>
          </div>
        </div>
        <?php foreach($special_offer as $special_offers){ ?>
        <div class="col-lg-6 col-md-12">
          <figure class="banner-statistics">
            <a href="#" class="promo-lines">
              <img src="<?php echo base_url(); ?>admin/assets/uploads/specialoffers/<?php echo $special_offers->spoff_img ?>" alt="product banner" class="full-width img-fluid">
            </a>
            <div class="banner-content text-left">
              <h6 class="banner-text1"><?php echo $special_offers->pro_sub_cat_name ?></h6>
              <h4 class="banner-text2"><?php echo $special_offers->spoff_second_head ?></h4>
              <a href="<?php echo base_url() ?>SubCategory/SubCategoryMenu/<?php echo $special_offers->spoff_psc_fk ?>" class="btn btn-text">Shop Now</a>
            </div>
          </figure>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<div class="flt" align="center"> 
  <a href="#" class="float">
<i class="fa fa-plus my-float"> &nbsp;Sell</i>
</a>
</div>
  <!-- END Subscriber -->
