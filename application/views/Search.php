
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
          <li class="active">Search results</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
 

<!--product Start-->
  <section class="section-padding our-product bg-light-theme">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-xl-3 col-lg-4">
          <div class="side-bar mb-md-40">
            <div class="main-box padding-20 trending-blog-cat mb-xl-20">
              <h4 class="text-light-black">Price</h4>
              <div class="delivery-slider">
                <input type="text" class="delivery-range-slider" value="" oninput="ranger()" id="myRange" />
              </div>
            </div>
            <div class="main-box padding-20 trending-blog-cat mb-xl-20">
              <h4 class="text-light-black">Categories</h4>
                <div class="filter">
                  <?php foreach($categories as $categories1) { ?>
                    <input type="checkbox" class="category54" onclick="cat()" id="catgeory3" name="catgeory3" value="<?php echo $categories1->pro_sub_cat_id ?>">
                    <label for="catgeory3"><?php echo $categories1->pro_sub_cat_name ?></label><br>
                    <?php } ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8">
          <div class="full-width">
            <div class="row">
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" id="filter_data">
                
              </div>
            </div>
          </div>
          <div class="custom-pagination align-item-center">
            <nav aria-label="Page navigation example" id="pagination_label">
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--Product-end-->
  <script>
$( document ).ready(function() {

  filter_data(1);

  function filter_data(page)
	{
		//var page = 1;
    var price = ranger();
    var cats = cat();
    console.log(price);
		$.ajax({
			url:"<?php echo base_url(); ?>Search/SearchFilter/"+page,
			method:"POST",
			dataType:"JSON",
			data:{price:price,cats:cats},
			success:function(data)
			{
				$('#filter_data').html(data.product_list);
				$('#pagination_label').html(data.pagination_link);
			}
		})
	}

 function ranger() {
    var range = document.getElementById('myRange');
    var range_val = range.value;
    var price_val = range_val.replace('$','');
};


function cat() {
    var category23 = document.getElementById('catgeory3').value;
};

});
</script>
