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
          <li class="active">Inner Category</li>
        </ul>
      </div>
    </div>
  </div>
  <section class="secnd-sec">
    <div class="wrap">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton ">
          <i class="fa fa-search"></i>
        </button>
        <!-- <a href="#" class="sell-mob-btn">  <span >Sell</span></a> -->
      </div>
    </div>
    <nav class="navbar navbar-expand-lg  container">
      <button class="navbar-toggler n2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:white; font-size:28px;"></i></span>
      </button>
    </nav>
  </section>
  <section class="events-wrpap">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

<?php foreach ($event_details as $event) { ?>
          <div class="col-lg-4">
            <div class="product-box mb-md-20">
              <a href="#">
                <img src="<?php echo base_url(); ?>admin/assets/uploads/events/<?php echo $event->event_image; ?>" class="img-fluid full-width" alt="product-img">
                <h4 class="text-center"><?php echo $event->event_name; ?></h4>
                <p><?php echo $event->event_desc; ?></p>         </a>
              </div>
            </div>
<?php } ?>



          </div>
        </div>
      </section>




          <div class="modal" id="quick_view">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <!-- product details inner end -->
                  <div class="product-details-inner">
                    <div class="row">
                      <div class="col-lg-5 align-self-center">
                        <div class="shop-detail-image">
                          <div class="detail-slider">
                            <div class="swiper-container">
                              <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                  <a href="#" class="popup">
                                    <img src="assets/img/shop/maindetail.jpg" class="img-fluid full-width" alt="slider">
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="shop-detail-contents mb-md-40 mt-md-40">
                          <div class="shop-detail-content-wrapper">
                            <h3 class="text-custom-black">Best Health & Inspiration Plant</h3>
                          </div>
                          <div class="ratings d-flex mb-xl-20"> <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="text-dark-white"><i class="fas fa-star"></i></span>
                            <div class="pro-review"> <span>1 Reviews</span>
                            </div>
                          </div>
                          <div class="price">
                            <h4 class="text-custom-red price-tag">$45 <span class="text-light-white fw-400 fs-14">$50</span></h4>
                          </div>
                          <div class="product-full-des mb-20">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                          </div>
                          <div class="availibity mt-20">
                            <h6 class="text-custom-black fw-600">Avability: <span class="text-success ml-2">In Stock</span></h6>
                          </div>
                          <div class="quantity mb-xl-20">
                            <h6 class="text-custom-black mb-0 mr-2 fw-600">Qty:</h6>
                            <div class="product-qty-input">
                              <button class="minus-btn" type="button" name="button"> <i class="fas fa-minus"></i>
                              </button>
                              <input type="text" class="form-control form-control-qty text-center" name="name" value="1">
                              <button class="plus-btn" type="button" name="button"> <i class="fas fa-plus"></i>
                              </button>
                            </div>
                          </div>
                          <div class="shop-bottom">
                            <div class="shop-meta mt-20">
                              <h6 class="text-custom-black mb-0 fw-600">Categories:</h6>
                              <ul class="list-inline ml-2">
                                <li class="list-inline-item"><a href="#">Health</a>
                                </li>
                                <li class="list-inline-item"><a href="#">Inner Plant</a>
                                </li>
                                <li class="list-inline-item"><a href="#">Deal</a>
                                </li>
                              </ul>
                            </div>
                            <div class="shop-meta mt-20">
                              <h6 class="text-custom-black mb-0 fw-600">Tags:</h6>
                              <ul class="list-inline ml-2">
                                <li class="list-inline-item"><a href="#">Palm Plant</a>
                                </li>
                                <li class="list-inline-item"><a href="#">Inner Plant</a>
                                </li>
                                <li class="list-inline-item"><a href="#">New Arrivel</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- product details inner end -->
                </div>
              </div>
            </div>
          </div>
        </div>
