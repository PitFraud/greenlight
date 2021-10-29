
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
        <h2 class="text-white">My Ads</h2>
        <ul>
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">My Ads</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
  <div class="container">
    <div class="col-md-12 pad-term">
  
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">MY ADS</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">FAVOURITES</a>
  </li> -->

</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row">
            <?php foreach($ads as $adds) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6">
              <div class="product-box mb-md-20">
                <div class="product-img">
                <a onclick="return confirmDelete(<?php echo $adds->pro_list_id ?>)"><i class="far fa-times-circle close-btn"></i></a>
                <a href="<?php echo base_url() ?>Sell/editSell/<?php echo $adds->pro_list_id ?>" ><i class="fa fa-edit" style="font-size:16px;color:#28a745"></i></a>
                  <a href="<?php echo base_url() ?>singleProduct/<?php echo $adds->pro_list_id ?>">
                    <img src="<?php echo base_url() ?>admin/assets/uploads/productlist/<?php echo $adds->pro_list_img ?>" class="img-fluid full-width" alt="product-img">
                  </a>
                  <div class="product-badge">
                    <div class=""> 
                    </div>
                  </div>
          
                </div>
                <div class="product-caption text-center"> <span class="product-category"><a href="#"><?php echo $adds->pro_sub_cat_name ?></a></span>
                  <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black"><?php echo $adds->pro_list_name ?></a></h6>
                  <div class="product-money mt-10"> <span class="text-dark-red fw-500">$<?php echo $adds->pro_list_dicount_price ?></span>
                    <span class="text-price">$<?php echo $adds->prod_list_price_original ?></span>
                  </div>
                  
                </div>
              </div>
            </div>
            <?php } ?>


            
</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  
</div>
</div>
</div>
<script>
     function confirmDelete(pro_list_id){
    var conf = confirm("Do you want to Delete Your Product ?");
        if(conf){
        $.ajax({
            url:"<?php echo base_url();?>MyAds/deleteAdsProduct/",
            data:{pro_list_id:pro_list_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var options = $.parseJSON(data);
                console.log(options);
                location.reload();
            }
        });

    }
    }
</script>	