<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  #social_target {
  padding: 10px;
  font-size: 20px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<div id="sub-container">
  <div id="mainMenu">
    <i class="fas fa-chevron-left" style="color: #8e9090"></i> MAIN MENU
  </div>
  <hr/>
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
          <div class="gallery-top">
            <!-- <?php var_dump($product_page[0]->pro_list_img) ?> -->
            <img src="<?php echo base_url() ?>admin/assets/uploads/productlist/<?php echo $product_page[0]->pro_list_img; ?>" alt=""><br>
          </div>
                </div>
                <div class="col-lg-7">
                  <?php foreach($product_page as $pages1): ?>
                    <div class="shop-detail-contents mb-md-40 mt-md-40">
                      <div class="shop-detail-content-wrapper">
                        <h3 class="text-custom-black"><?php echo $pages1->pro_list_name ?></h3>
                      </div>
                      <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
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
                        <!-- <h6 class="text-custom-black mb-0 mr-2 fw-600">Qty:</h6>
                        <div class="product-qty-input">
                          <button class="minus-btn" type="button" name="button"> <i class="fas fa-minus"></i>
                          </button>
                          <input type="text" class="form-control form-control-qty text-center" name="name" value="1">
                          <button class="plus-btn" type="button" name="button"> <i class="fas fa-plus"></i>
                          </button>
                        </div> -->
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $current_url; ?>" class="fa fa-facebook" style="background: #3B5998;color: white;" id="social_target" target="_blank"></a>
              <a href="http://twitter.com/share?url=http://<?php echo $current_url; ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" class="fa fa-twitter" style="background: #55ACEE;color: white;" id="social_target" target="_blank"></a>
              <a href="https://api.whatsapp.com/send?text=<?php echo $current_url; ?>" class="fa fa-whatsapp" style="background: #25D366;color: white;" id="social_target" target="_blank"></a>
              <a href="https://telegram.me/share/url?url=<?php echo $current_url; ?>&text=Greenlight Product Link:" class="fa fa-telegram" style="background: #0088cc;color: white;" id="social_target" target="_blank"></a>
              <a href="mailto:?Subject=Simple Share Buttons&Body=I%20Found%20this%20Product%20Online%20and%20Here%20is%20the%20link <?php echo $current_url; ?>" class="fa fa-envelope" style="background: #55ACEE;color: white;" id="social_target" target="_blank"></a>
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






                    <!-- Comment and Description Section -Jishnu-->
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#one">Description</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#two">Comments</a></li>
                    </ul>
                    <div class="tab-content container-fluid scroll">
                      <div class="container tab-pane active" id="one"><br>
                        <p><?php echo $product_details->pro_list_details; ?></p>
                      </div>
                      <div class="container tab-pane" id="two"><br>
                        <form class="" action="<?php echo base_url(); ?>Comments/addProductComment" method="post">
                          <div class="row">
                            <div class="form-group col-md-8">
                              <input type="hidden" class="" name="product_id" value="<?php echo $pro_list_id; ?>">
                              <input type="text" class="form-control" name="post_comment" placeholder="Leave a comment..." required>
                            </div>
                            <div class="form-group col-md-2">
                              <button type="submit" class="btn btn-primary active" name="submit">Post</button>
                            </div>
                          </div>
                        </form>
                        <div class="scroll">
                        <div class="tab-content container-fluid scroll">
                          <p>Previous comments...</p>
                            <ul class="list-group">
                              <div class="row">
                                <?php foreach ($single_item_comments as $comment) { ?>
                                <div class="form-group col-md-12">

                                  <li class="list-group-item"><?php echo $comment->cmt_description;?></li>
                                    <span> <b><p style="color:rgb(79, 79, 82); font-size:10px;" align="right"><?php echo $comment->created_at; echo "&nbsp&nbsp&nbsp&nbsp&nbsp".$comment->first_name; ?></p></b> </span>
                                </div>
                              <?php } ?>
                              </div>
                            </ul>
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
<script type="text/javascript">

</script>
