
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
        <h2 class="text-white">Wishlist</h2>
        <ul>
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">Wishlist</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
 <section class="compare-page-wrapper section-padding">
    <!-- compare main wrapper start -->
    <div class="container">
      <div class="section-bg-color">
        <div class="row">
          <div class="col-lg-12">
            <!-- Wishlist Table Area -->
            <div class="cart-table table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>

                    <th class="pro-thumbnail">Thumbnail</th>
                    <th class="pro-title">Product</th>
                    <th class="pro-price">Discount Price</th>
                    <th class="pro-price">Original Price</th>
                    <th class="pro-remove">Remove</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($product_wishlist as $pro_wish ){ ?>
                    <?php if(empty($pro_wish)) { ?>
                        <tr>
                          <td class="pro-thumbnail" ><h1><?php echo"! No Products in Wishlist" ?></h1></td>
                      </tr>
                    <?php }  ?>
                  <tr>
                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo base_url() ?>admin/assets/uploads/productlist/<?php echo $pro_wish->pro_list_img ?>" alt="Product" /></a></td>
                    <td class="pro-title"><a href="#"><?php echo $pro_wish->pro_list_name ?></a></td>
                    <td class="pro-price"><span>$<?php echo $pro_wish->pro_list_dicount_price ?></span></td>
                    <td class="pro-price"><span>$<?php echo $pro_wish->prod_list_price_original ?></span></td>
                    <td class="pro-remove"><a href="<?php echo base_url() ?>deletewishlist/<?php echo $pro_wish->pro_wish_id ?>"><i class="pe-7s-trash"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- compare main wrapper end -->
  </section>
