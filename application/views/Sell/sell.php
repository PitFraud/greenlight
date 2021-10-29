
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

<div class="edit-prf-plant-wrap col-lg-12">

<h2 class="text-center">Post your ad</h2>


<div class="choos-cat-wrp col-md-8">
  <h5>CHOOSE A CATEGORY</h5>
  <nav class='animated bounceInDown'>
    <?php foreach($post_ad as $post_ads1){ ?>
    <div class="btn-group dropright">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $post_ads1->prod_cat_name ?></button>
        <div class="dropdown-menu">
        <?php foreach($post_ad_sub as $post_ad_sub1){ ?>
            <?php if($post_ads1->pro_cat_id == $post_ad_sub1->pro_cat_id_fk){ ?>
            <a href="<?php echo base_url() ?>addSellProduct/<?php echo $post_ad_sub1->pro_sub_cat_id?>" class="dropdown-item"><?php echo $post_ad_sub1->pro_sub_cat_name ?></a>
            <?php }else{ ?>
            <a href="#" class="dropdown-item"><span style="color:red;">No Menu!</span></a>
          <?php }} ?>
        </div>
    </div>
    <?php } ?> 
</div>
</nav>
</div>
</div>





