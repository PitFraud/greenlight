<style>
.rating{
  width:150px;
}
.ratingStars{
  font-size: 15px;
  color: grey;
  cursor: pointer;
  text-shadow: 2px 3px  #ddd;
}
.hoverStars{
  color: #fd0;
  font-size: 15px;
}
.clickStars{
  color: #fd0;
  font-size: 15px;
}
</style>

      <div id="sub-container">
        <div id="mainMenu">
          <i class="fas fa-chevron-left" style="color: #8e9090"></i> MAIN MENU
        </div>
        <hr/>

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
          <li class="active">Various Kinds Of Palm Plants</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
 <!--Shop-Details-->
  <section class="section-padding bg-light-theme">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop-detail-image">
            <div class="detail-slider">
              <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                  <?php foreach($mult_img as $images5){ ?>
                  <?php foreach($product_page as $page_img){ ?>
                    <?php if($page_img->pro_list_id == $images5->proli_img_list_fk){ ?>
                  <div class="swiper-slide">
                    <a href="#" class="popup">
                      <img src="<?php echo base_url() ?>admin/assets/uploads/prodlist_mult_img/<?php echo $images5->proli_img_name ?>" class="img-fluid full-width" alt="slider">
                    </a>
                    <div class="shop-type-tag"> <a href="#" class="bg-custom-black ty pe-tag"></a>
                    </div>
                  </div>
                  <?php }}} ?>
                </div>
                <!-- Add Arrows -->
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              <div class="swiper-container gallery-thumbs ">
                <div class="swiper-wrapper">
                <?php foreach($mult_img as $images5){ ?>
                  <?php foreach($product_page as $page_img){ ?>
                    <?php if($page_img->pro_list_id == $images5->proli_img_list_fk){ ?>
                  <div class="swiper-slide">
                    <img src="<?php echo base_url() ?>admin/assets/uploads/prodlist_mult_img/<?php echo $images5->proli_img_name ?>" class="img-fluid full-width" alt="slider">
                  </div>
                  <?php }}} ?>
                </div>
                <!-- Add Arrows --> <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <?php foreach($product_page as $pages1): ?>
          <div class="shop-detail-contents mb-md-40 mt-md-40">
            <div class="shop-detail-content-wrapper">
              <h3 class="text-custom-black"><?php echo $pages1->pro_list_name ?></h3>
            </div>
            <?php foreach($star as $stars){ ?>
            <div id='rating' class='rating'>
              <span class='ratingStars'>
                <i class="fa fa-star" aria-hidden="true" id="tests" value='1' <?php echo ($stars->average_rating >= 1)?'style="color: #fd0;font-size: 15px;"':''; ?>></i>
              </span>
              <span class='ratingStars'>
                <i class="fa fa-star" aria-hidden="true" id="tests" value='2' <?php echo ($stars->average_rating >= 2)?'style="color: #fd0;font-size: 15px;"':''; ?>></i>
              </span>
              <span class='ratingStars'>
                <i class="fa fa-star" aria-hidden="true"  id="tests" value='3' <?php echo ($stars->average_rating >= 3)?'style="color: #fd0;font-size: 15px;"':''; ?>></i>
              </span>
              <span class='ratingStars'>
                <i class="fa fa-star" aria-hidden="true" id="tests" value='4' <?php echo ($stars->average_rating >= 4)?'style="color: #fd0;font-size: 15px;':''; ?>></i>
              </span>
              <span class='ratingStars'>
                <i class="fa fa-star" aria-hidden="true" id="tests" value='5' <?php echo ($stars->average_rating >= 5)?'style="color: #fd0;font-size: 15px;':''; ?>></i>
              </span>
              <div class="pro-review"> <span><?php echo $stars->product_star ?> Total Stars</span>
              </div>
            </div>
            <?php } ?>
            <!-- session userd id -->
            <input type="hidden" id="sess_user_id" value="<?php echo $this->session->userdata('user_id')  ?>">
            <input type="hidden" id="product_id" value="<?php echo $pages1->pro_list_id ?>">
            <!-- Rating -->
            <div class="price">
              <h4 class="text-custom-red price-tag">$<?php echo $pages1->pro_list_dicount_price ?> <span class="text-light-white fw-400 fs-14"><strike>$<?php echo $pages1->prod_list_price_original ?></strike></span></h4>
            </div>
            <div class="product-full-des mb-20">
              <p class="mb-0"><?php echo $pages1->pro_list_details ?></p>
            </div>
            <div class="availibity mt-20">
              <?php if($pages1->pro_list_stock >0){ ?>
              <h6 class="text-custom-black fw-600">Avability: <span class="text-success ml-2">In Stock</span></h6>
              <?php }else{ ?>
                <h6 class="text-custom-black fw-600">Avability: <span class="text-danger ml-2">No Stock</span></h6>
              <?php } ?>
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
                  <?php foreach($pro_cat as $category){ ?>
                    <?php if($category->pro_cat_id == $pages1->pro_cat_id_fk){ ?>
                  <li class="list-inline-item"><a href="#"><?php echo $category->prod_cat_name; ?></a>
                  <?php } }?>
                  </li>
                  <li class="list-inline-item"><a href="#"><?php echo $pages1->pro_sub_cat_name ?></a>
                  </li>
                  <li class="list-inline-item"><a href="#">Deal</a>
                  </li>
                </ul>
              </div>
              <div class="shop-meta mt-20">
                <h6 class="text-custom-black mb-0 fw-600">Tags:</h6>
                <ul class="list-inline ml-2">
                <?php foreach($pro_cat as $category){ ?>
                    <?php if($category->pro_cat_id == $pages1->pro_cat_id_fk){ ?>
                  <li class="list-inline-item"><a href="#"><?php echo $category->prod_cat_name; ?></a>
                  <?php }} ?>
                  </li>
                  <li class="list-inline-item"><a href="#"><?php echo $pages1->pro_sub_cat_name ?></a>
                  </li>
                  <li class="list-inline-item"><a href="#">New Arrivel</a>
                  </li>
                </ul>
              </div>
              <div class="product-btn mt-20"> <a href="#" class="btn-solid with-line ml-2">Chat with seller</a>
              </div>
            </div>
          </div>
            <?php endforeach ?>
        </div>







        <div class="col-12">
          <div class="shop-detail-description-sec">
            <div class="tabs">
              <ul class="nav nav-tabs">
                <li class="nav-item"> <a class="nav-link  active" data-toggle="tab" href="#description">Description</a>
                </li>
                <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#reviews">Reviews (4)</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="description">
                  <?php foreach($product_page as $pages2): ?>
                    <p class=" mb-xl-20"><?php echo $pages2->pro_list_details ?></p>
                  <?php endforeach ?>
                </div>
                <div class="tab-pane fade" id="reviews">
                  <!-- comments -->
                  <div class="comment-box p-relative">
                    <div id="comment-box">
                      <ul class="comments">

                        <?php foreach($review as $reviews){ ?>
                          <?php foreach($product_page as $pages3){ ?>
                            <?php if($reviews->prolist_re_pro_fk == $pages3->pro_list_id){ ?>
                              <li class="comment">
                                <article>
                                  <div class="comment-avatar ">
                                    <img src="<?php echo base_url() ?>admin/assets/uploads/user_profile/<?php echo $reviews->user_pimage_name ?>" class="rounded-circle" alt="comment">
                                  </div>
                                  <div class="comment-content">
                                    <div class="comment-meta">
                                      <div class="comment-meta-header">
                                        <h5 class="text-custom-red fw-600 author mb-3"><?php echo $reviews->first_name ?>&nbsp;<?php echo $reviews->last_name ?></h5>
                                        <div class="post-date">
                                          <div class="date bg-custom-black"><?php echo $reviews->prolist_re_date ?>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="comment-meta-reply"> <a href="#" class="comment-reply-link btn-first red-btn text-custom-black">Reply</a>
                                      </div>
                                    </div>
                                    <div class="comment">
                                      <p><?php echo $reviews->prolist_re_comment ?></p>
                                    </div>
                                  </div>
                                </article>
                                <ul class="children">
                                  <li class="comment">
                                    <?php foreach($reply as $replies){ ?>
                                      <?php if($reviews->prolist_re_id == $replies->prolist_rp_review_fk){ ?>
                                        <article>
                                          <div class="comment-avatar">
                                            <img src="<?php echo base_url() ?>admin/assets/uploads/user_profile/<?php echo $replies->user_pimage_name ?>" class="rounded-circle" alt="comment">
                                          </div>
                                          <div class="comment-content ">
                                            <div class="comment-meta">
                                              <div class="comment-meta-header">
                                                <h5 class="text-custom-red fw-600 author mb-3"><?php echo $replies->first_name ?>&nbsp;<?php echo $replies->last_name ?></h5>
                                                <div class="post-date">
                                                  <div class="date bg-custom-black "><?php echo $replies->prolist_rp_date ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="comment-meta-reply"> <a href="#" class="comment-reply-link btn-first red-btn text-custom-black">Reply</a>
                                              </div>
                                            </div>
                                            <div class="comment">
                                              <p><?php echo $replies->prolist_rp_reply ?></p>
                                            </div>
                                          </div>
                                        </article>
                                      <?php } }?>
                                    </li>
                                  </ul>
                                </li>
                              <?php }}} ?>
                            </ul>
                          </div>
                        </div>
                        <!-- comments -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>







      </div>
    </div>
  </section>
  <!--Shop-Details End-->
  <section class="section-padding shop-description">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-header-left">
            <h3 class="text-light-black header-title title">Related Items <span class="fs-14">

          </div>
        </div>
        <?php foreach($related_pro as $relateds){ ?>
          <?php foreach($product_page as $page7){?>
            <?php if($page7->pro_list_id != $relateds->pro_list_id){ ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="product-box mb-md-20">
            <div class="product-img">
              <a href="<?php echo base_url() ?>singleProduct/<?php echo $relateds->pro_list_id ?>">
                <img src="<?php echo base_url() ?>admin/assets/uploads/productlist/<?php echo $relateds->pro_list_img ?>" class="img-fluid full-width" alt="product-img">
              </a>
              <div class="product-badge">
                <div class="product-label new"> <span>Deal</span>
                </div>
                <div class="product-label discount"> <span>15%</span>
                </div>
              </div>
              <div class="button-group"> <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" onclick="product_list_modal(<?php echo $relateds->pro_list_id ?>)" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
              </div>

            </div>
            <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $relateds->pro_sub_cat_name ?></a></span>
              <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $relateds->pro_list_name ?></a></h6>
              <div class="product-money mt-10"> <span class="text-dark-red fw-500"><?php echo $relateds->pro_list_dicount_price ?></span>
                <span class="text-price"><?php echo $relateds->prod_list_price_original ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php }}} ?>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </section>
  <!-- Shop-Details-Description END -->
	<script>
    (function($){
  $(document).ready(function() {
    var stars = $('#rating .ratingStars'),
        radios = $(':radio[name="rating"]' );

    stars.hover(
      function(){
      var $this = $(this);
      $this.prevAll().addBack().addClass('hoverStars');
    },
    function(){
      var $this = $(this);
      $this.prevAll().addBack().removeClass('hoverStars');
    });
    stars.on('click', function(){
      var $this = $(this);
      $this.siblings().removeClass('clickStars')
      $this.prevAll().addBack().addClass('clickStars');
      var rating = $('.clickStars').length;
      var sess_u_id = $('#sess_user_id').val();
      var pro_id = $('#product_id').val();
       if(sess_u_id !== ""){
        $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>Productpage/insertStarData",
        data: {rating:rating, sess_u_id:sess_u_id, pro_id:pro_id},
        dataType: "text",
        success: function(resultData) {
          alert("Save Complete");

        }
        });
      }
    });

  });
})(jQuery);
  </script>
