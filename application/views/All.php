<style>
    .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 10px 20px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #28a745;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-top-right-radius: .25rem;
    border-bottom-right-radius : .25rem;
}

.pagination-lg>li:last-child>a, .pagination-lg>li:last-child>span {
    border-top-right-radius: .25rem;
    border-bottom-right-radius: .25rem;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #65a15a;
    border-color: #65a15a;
}
 .pagination>li>a:hover{
    z-index: 2;
    color: #fff;
    background-color: #65a15a;
    border-color: #65a15a;
}
</style>
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

    <!--Not Sidenav-->
    <div>

	<div class="main-sec"></div>


<div class="breadcrumb-area">
    <div class="overlay overlay-bg"></div>
    <div class="container-fluid">
      <div class="breadcrumb-content">
        <h2 class="text-white"></h2>
        <ul>
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">All Products</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
<!--product Start-->
  <section class="section-padding our-product bg-light-theme">
    <div class="container-fluid custom-container">
      <div class="row">
       
        <div class="col-xl-12 col-lg-12">
          <div class="full-width">
            <div class="row">
                <?php foreach($subcategory_page as $category_pages){ ?>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="product-box mb-md-20">
                  <div class="product-img">
                    <a href="<?php echo base_url() ?>singleProduct/<?php echo $category_pages->pro_list_id ?>">
                      <img src="<?php echo base_url(); ?>admin/assets/uploads/productlist/<?php echo $category_pages->pro_list_img; ?>" class="img-fluid full-width" alt="product-img">
                    </a>
                    <div class="product-badge">
                      <div class="product-label new"> <span>New</span>
                      </div>
                      <div class="product-label discount"> <span>15%</span>
                      </div>
                    </div>
                    <div class="button-group"> <a href="#" data-toggle="tooltip" data-placement="left" onclick="addWishList(<?php echo $category_pages->pro_list_id ?>)" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                      <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" onclick="product_list_modal(<?php echo $category_pages->pro_list_id ?>)" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                    </div>
                  
                  </div>
                  <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $category_pages->pro_sub_cat_name ?></a></span>
                    <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $category_pages->pro_list_name ?></a></h6>
                    <div class="product-money mt-10"> <span class="text-dark-red fw-500">$<?php echo $category_pages->pro_list_dicount_price ?></span>
                      <span class="text-price">$<?php echo $category_pages->prod_list_price_original ?></span>
                    </div>
                  </div>
                </div>
              </div>
                <?php } ?>
            </div>
          </div>
          
          <div class="custom-pagination align-item-center">
            <nav aria-label="Page navigation example">
            <?php echo $this->pagination->create_links(); ?>
              <!-- <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul> -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Product-end-->