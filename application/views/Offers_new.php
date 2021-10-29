
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
  <!-- breadcrumb -->
  <!--product Start-->
  <section class="section-padding our-product bg-light-theme">
    <div class="container-fluid custom-container">
      <section class="section-padding our-product bg-light-theme">
        <div class="container-fluid custom-container">
          <div class="row">
            <div class="offrs-wrp">
              <h4>Flat 20% OFF on all plants seeds</h4>
              <p>
                We often don't think to buy plant online. But what if we tell you that you can now order the most beautiful plants right from home? greenlight presents a broad range of Live Plants that can be bought online in India. Our online nursery collection includes Annual Flowers, Aromatic and Aquatic Plants, Cactii, Bonsai, Ferns, Indoor and Outdoor Plants, Landscape Plants, Bamboo, etc.</p>
              </div>

              <div class="col-xl-12 col-lg-12" >
                <div class="full-width">
                  <div class="row">



                    <?php foreach ($offers as $offer) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                      <div class="product-box mb-md-20">
                        <div class="product-img">
                          <a href="#">
                            <img src="<?php echo base_url(); ?>admin/assets/uploads/offers/<?php echo $offer->off_img; ?>">
                          </a>
                          <div class="product-badge">
                            <div class="product-label new"> <span>New</span>
                            </div>
                            <div class="product-label discount"> <span>15%</span>
                            </div>
                          </div>
                          <div class="button-group"> <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                            <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                          </div>

                        </div>
                        <div class="product-caption text-center"> <span class="product-category"><a href="#"></a></span>
                          <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $offer->off_name; ?></a></h6>
                          <div class="product-money mt-10"> <span class="text-dark-red fw-500">$90.00</span>
                            <span class="text-price">$250.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>



                  </div>
                </div>
                <div class="custom-pagination align-item-center">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
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
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
    <!--Product-end-->
