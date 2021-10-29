  <!-- footer -->
  <footer class="section-padding bg-light-theme pt-0 u-line bg-black">
    
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-contact">
            <h6 class="text-custom-white">About Us</h6>
            <div class="logo mb-xl-20">
              
            </div>
            <?php foreach ($footer_details as $footer49) { ?>
            <p class="text-light-white"><?php echo $footer49->footer_detail_about ?></p>
            <?php } ?>
          </div>
        </div>
        <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-links">
            <h6 class="text-custom-white">Get to Know Us</h6>
            <ul>
              <li><a href="<?php echo base_url() ?>about_us" class="text-light-white fw-600">About Us</a>
              </li>
              <li><a href="blog-left.html" class="text-light-white fw-600">Blog</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Socialize</a>
              </li>
              <li><a href="index.html" class="text-light-white fw-600">Ecom</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Perks</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-links">
            <h6 class="text-custom-white">Let Us Help You</h6>
            <ul>
              <li><a href="#" class="text-light-white fw-600">Account Details</a>
              </li>
              <li><a href="order-details.html" class="text-light-white fw-600">Order History</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Find Product</a>
              </li>
              <li><a href="login.html" class="text-light-white fw-600">Login</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Track order</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-links">
            <h6 class="text-custom-white">Share Social Media</h6>
            <ul>
              <li><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>" class="fa fa-facebook" style="font-size: 20px;color: #3B5998;"></a>
              </li>
              <li><a href="http://twitter.com/share?url=http://<?php echo base_url(); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" class="fa fa-twitter" style="font-size: 20px;color: #55ACEE;"></a>
              </li>
              <li><a href="https://api.whatsapp.com/send?text=<?php echo base_url(); ?>" class="fa fa-whatsapp" style="font-size: 20px;color: #25D366;"></a>
              </li>
              <li><a href="mailto:?Subject=Simple Share Buttons&Body=I%20Found%20this%20Website%20Online%20and%20Here%20is%20the%20link <?php echo base_url(); ?>" class="fa fa-envelope" style="font-size: 20px;color: #efd6ff;"></a>
              </li>
              <li><a href="https://telegram.me/share/url?url=<?php echo base_url(); ?>&text=Greenlight Product Link:" class="fa fa-telegram" style="font-size: 20px;color: #0088cc;"></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-links">
            <h6 class="text-custom-white">Get to Know Us</h6>
            <ul>
              <li><a href="about.html" class="text-light-white fw-600">About Us</a>
              </li>
              <li><a href="blog-details.html" class="text-light-white fw-600">Blog</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Socialize</a>
              </li>
              <li><a href="index.html" class="text-light-white fw-600">Ecom</a>
              </li>
              <li><a href="#" class="text-light-white fw-600">Perks</a>
              </li>
            </ul>
          </div>
        </div> -->
        <div class="col-xl col-lg-4 col-md-4 col-sm-6">
          <div class="footer-links">
            <h6 class="text-custom-white">Contact info</h6>
            <?php foreach($footer_details as $footer50) { ?>
            <ul class="contact-info">
              <!-- <li>
                <a href="#" class="text-light-white"> <span><i class="pe-7s-timer"></i></span>
                  Monday - Friday: 9:00 AM - 06:00 PM</a>
              </li> -->
              <li>
                <a href="#" class="text-light-white"> <span><i class="pe-7s-mail"></i></span>
                  <?php echo $footer50->footer_detail_email ?></a>
              </li>
              <li>
                <a href="#" class="text-light-white"> <span><i class="pe-7s-call"></i></span>+
                <?php echo $footer50->footer_detail_contact_1 ?></a>
              </li>
              <li>
                <a href="#" class="text-light-white"> <span><i class="pe-7s-map-marker"></i></span>+
                <?php echo $footer50->footer_detail_contact_2 ?></a>
              </li>
            </ul>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="copyright bg-black">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-lg-4">
        </div>
        
        <div class="col-lg-4">
          <div class="copyright-text"> <span class="text-light-white">© <a href="#" class="text-light-white">Wahylab solution</a> - 2021 | All Right Reserved</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" id="main_content">
        <!-- Loader Screen -->
        <div class="loader-container">
              <div class="loader"></div>
          </div>
          <!-- Lodaer End -->
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
                            <img src="<?php echo base_url(); ?>assets/img/shop/maindetail.jpg" class="img-fluid full-width" id="imagejax" alt="slider">
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
                    <h3 class="text-custom-black" id="plantname"></h3>
                  </div>
                  <div class="ratings d-flex mb-xl-20"> <span class="text-yellow"><i class="fas fa-star"></i></span>
                    <span class="text-yellow"><i class="fas fa-star"></i></span>
                    <span class="text-yellow"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <span class="text-dark-white"><i class="fas fa-star"></i></span>
                    <div class="pro-review"> <span></span>
                    </div>
                  </div>
                  <div class="price">
                    <div class="container">
                      <div class="row">
                        <div class="col-">
                        <h4 class="text-custom-red price-tag" id="discount_pr"></h4>
                        </div>
                        <div class="col-">
                        <span class="text-light-white fw-400 fs-14 " id="original_pr"></span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="product-full-des mb-20">
                    <p class="mb-0" id="full_details"></p>
                  </div>
                  <div class="availibity mt-20">
                    <h6 class="text-custom-black fw-600">Avability: <span class="text-success ml-2" id="stock_avail"></span></h6>
                  </div>
                  <div class="quantity mb-xl-20">
                    <h6 class="text-custom-black mb-0 mr-2 fw-600">Qty:</h6>
                    <div class="product-qty-input">
                      <button class="minus-btn" type="button" name="button"> <i class="fas fa-minus"></i>
                      </button>
                      <input type="text" id="stock_val" class="form-control form-control-qty text-center" name="name" value="1">
                      <button class="plus-btn" type="button" name="button"> <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="shop-bottom">
                    <div class="shop-meta mt-20">
                      <h6 class="text-custom-black mb-0 fw-600">Categories:</h6>
                      <ul class="list-inline ml-2">
                        <li class="list-inline-item" id="cat_1"><a href="#"></a>
                        </li>
                        <li class="list-inline-item"id="cat_2"><a href="#"></a>
                        </li>
                        <li class="list-inline-item"id="cat_3"><a href="#"></a>
                        </li>
                      </ul>
                    </div>
                    <div class="shop-meta mt-20">
                      <h6 class="text-custom-black mb-0 fw-600">Tags:</h6>
                      <ul class="list-inline ml-2">
                        <li class="list-inline-item" id="cat_4"><a href="#"></a>
                        </li>
                        <li class="list-inline-item"id="cat_5"><a href="#"></a>
                        </li>
                        <li class="list-inline-item" id="cat_6"><a href="#"></a>
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
  <!-- Place all Scripts Here -->
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <!-- Popper -->
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- Range Slider -->
  <script src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.min.js"></script>
  <!-- Swiper Slider -->
  <script src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
  <!-- Nice Select -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
  <!-- magnific popup -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
  <!-- sticky sidebar -->
  <script src="<?php echo base_url(); ?>assets/js/sticksy.js"></script>
  <!-- Planteco Js -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <!-- /Place all Scripts Here -->

  <script>



    function create_custom_dropdowns() {
    $('select').each(function (i, select) {
        if (!$(this).next().hasClass('dropdown-select')) {
            $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
            var dropdown = $(this).next();
            var options = $(select).find('option');
            var selected = $(this).find('option:selected');
            dropdown.find('.current').html(selected.data('display-text') || selected.text());
            options.each(function (j, o) {
                var display = $(o).data('display-text') || '';
                dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
            });
        }
    });

    $('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()"  class="dd-searchbox" type="text"></div>');
}

// Event listeners

// Open/close
$(document).on('click', '.dropdown-select', function (event) {
    if($(event.target).hasClass('dd-searchbox')){
        return;
    }
    $('.dropdown-select').not($(this)).removeClass('open');
    $(this).toggleClass('open');
    if ($(this).hasClass('open')) {
        $(this).find('.option').attr('tabindex', 0);
        $(this).find('.selected').focus();
    } else {
        $(this).find('.option').removeAttr('tabindex');
        $(this).focus();
    }
});

// Close when clicking outside
$(document).on('click', function (event) {
    if ($(event.target).closest('.dropdown-select').length === 0) {
        $('.dropdown-select').removeClass('open');
        $('.dropdown-select .option').removeAttr('tabindex');
    }
    event.stopPropagation();
});

function filter(){
    var valThis = $('#txtSearchValue').val();
    $('.dropdown-select ul > li').each(function(){
     var text = $(this).text();
        (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
   });
};
// Search

// Option click
$(document).on('click', '.dropdown-select .option', function (event) {
    $(this).closest('.list').find('.selected').removeClass('selected');
    $(this).addClass('selected');
    var text = $(this).data('display-text') || $(this).text();
    $(this).closest('.dropdown-select').find('.current').text(text);
    $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
});

// Keyboard events
$(document).on('keydown', '.dropdown-select', function (event) {
    var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
    // Space or Enter
    //if (event.keyCode == 32 || event.keyCode == 13) {
    if (event.keyCode == 13) {
        if ($(this).hasClass('open')) {
            focused_option.trigger('click');
        } else {
            $(this).trigger('click');
        }
        return false;
        // Down
    } else if (event.keyCode == 40) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            focused_option.next().focus();
        }
        return false;
        // Up
    } else if (event.keyCode == 38) {
        if (!$(this).hasClass('open')) {
            $(this).trigger('click');
        } else {
            var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
            focused_option.prev().focus();
        }
        return false;
        // Esc
    } else if (event.keyCode == 27) {
        if ($(this).hasClass('open')) {
            $(this).trigger('click');
        }
        return false;
    }
});

$(document).ready(function () {
    create_custom_dropdowns();
});


function openNav() {
    document.getElementById("mySidenav").style.animation = "expand 0.3s forwards";
    //closeBtn
    document.getElementById("closeBtn").style.display = "block";
    document.getElementById("closeBtn").style.animation = "show 0.3s";
    //Overlay
    document.getElementById("overlay").style.display = "block";
    document.getElementById("overlay").style.animation = "show 0.3s";

}

function closeNav() {
    document.getElementById("mySidenav").style.animation = "collapse 0.3s forwards";
    //closeBtn
    document.getElementById("closeBtn").style.animation = "hide 0.3s";
    //Overlay
    document.getElementById("overlay").style.animation = "hide 0.3s";

    setTimeout(() => {
        document.getElementById("closeBtn").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        //Reset Menus
        document.getElementById("main-container").style.animation = "";
        document.getElementById("main-container").style.transform = "translateX(0px)";
        document.getElementById("sub-container").style.animation = "";
        document.getElementById("sub-container").style.transform = "translateX(380px)";
    }, 300)
}

// let firstDropdownOpen = false;

function firstDropDown() {
    firstDropdownOpen = !firstDropdownOpen;
    if(firstDropdownOpen) {
        document.querySelector("#firstDropDown i").setAttribute("class", "fas fa-chevron-up");
        document.querySelector("#firstDropDown div").innerHTML = "See Less";
        //Handle Container
        document.getElementById("firstContainer").style.display = "block";
        document.getElementById("firstContainer").style.animation = "expandDropDown 0.3s forwards";
        document.getElementById("firstContainer").style.transition = "height 0.3s";
        document.getElementById("firstContainer").style.height = "410px";
    }else{
        document.querySelector("#firstDropDown i").setAttribute("class", "fas fa-chevron-down");
        document.querySelector("#firstDropDown div").innerHTML = "See More";
        //Handle Container
        document.getElementById("firstContainer").style.animation = "collapseDropDown 0.2s forwards";
        document.getElementById("firstContainer").style.transition = "height 0.2s";
        document.getElementById("firstContainer").style.height = "0px";
        setTimeout(() => {
            document.getElementById("firstContainer").style.display = "none";
        }, 200)
        
    }
}

// let secondDropDownOpen = false;

function secondDropDown() {
    secondDropDownOpen = !secondDropDownOpen;

    if(secondDropDownOpen) {
        document.querySelector("#secondDropDown i").setAttribute("class", "fas fa-chevron-up");
        document.querySelector("#secondDropDown div").innerHTML = "See Less";
        //Handle Container
        document.getElementById("secondContainer").style.display = "block";
        document.getElementById("secondContainer").style.animation = "expandDropDown 0.3s forwards";
        document.getElementById("secondContainer").style.transition = "height 0.3s";
        document.getElementById("secondContainer").style.height = "260px";
    }else{
        document.querySelector("#secondDropDown i").setAttribute("class", "fas fa-chevron-down");
        document.querySelector("#secondDropDown div").innerHTML = "See More";
        //Handle Container
        document.getElementById("secondContainer").style.animation = "collapseDropDown 0.2s forwards";
        document.getElementById("secondContainer").style.transition = "height 0.2s";
        document.getElementById("secondContainer").style.height = "0px";
        setTimeout(() => {
            document.getElementById("secondContainer").style.display = "none";
        }, 200)
        
    }
}

document.querySelectorAll(".sidenavRow").forEach(row => {
    row.addEventListener("click", () => {
        document.getElementById("main-container").style.animation = "mainAway 0.3s forwards";
        document.getElementById("sub-container").style.animation = "subBack 0.3s forwards";
    });
});

document.getElementById("mainMenu").addEventListener("click", () => {
    document.getElementById("main-container").style.animation = "mainBack 0.3s forwards";
    document.getElementById("sub-container").style.animation = "subPush 0.3s forwards";
})

//subNavContent

function openPrimeVideo() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">Prime Video</div>
    <a href="#"><div class="sidenavContent">All Videos</div></a>`;
}

function openSubmenu1(id) {

    
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">`+console.log(id)+`</div>
    <a href="#"><div class="sidenavContent"><?php $i=0;  foreach($submenu as $submenus){ if($submenus->menu_parent_id == $i){ echo $submenus->sub_menu_name;} $i++; } ?></div></a>`;
}

function openAmazonMusic() {
    document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">Amazon Music</div>
    <a href="#"><div class="sidenavContent">All Music</div></a>`;
}



 $(document).ready(function(){
    if($("body").height() < $(window).innerHeight()) {
                    $('#footer').css('position','fixed');
                    $('#footer').css('bottom',0);
    }
 });

 $(document).on({
    ajaxStart: function(){
      $('.product-details-inner').hide();
      $('.loader-container').show();
    },    
});

 function product_list_modal(id){
        $.ajax({
          
            url:"<?php echo base_url();?>product_json/",
            data:{id:id},
            method:"POST",
            datatype:"jsonp",
            success:function(data){
              var parsed_data = JSON.parse(data);  
              $('#plantname').html('<h3>'+parsed_data[0].pro_list_name+'</h3>')
              $('#discount_pr').html('$'+parsed_data[0].pro_list_dicount_price+'')
              $('#original_pr').html('$'+parsed_data[0].prod_list_price_original+'')
              $('#full_details').html('<p>'+parsed_data[0].pro_list_details+'</p>')

              if(parsed_data[0].pro_list_stock > 0){
                $('#stock_avail').html('<span>In Stock<span>')
              }
              else{
                $('#stock_avail').html('<span style="color:red;">No Stock<span>')
              }
              
              var getUrl = window.location;
              var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
              console.log(baseUrl)

              $("#imagejax").attr("src",""+baseUrl+"/admin/assets/uploads/productlist/"+parsed_data[0].pro_list_img+"");
              $('#cat_1').html('<a href="">'+parsed_data[0].prod_cat_name+'</a>')
              $('#cat_2').html('<a href="">'+parsed_data[0].pro_sub_cat_name+'</a>') 
              $('#cat_4').html('<a href="">'+parsed_data[0].prod_cat_name+'</a>') 
              $('#cat_5').html('<a href="">'+parsed_data[0].pro_sub_cat_name+'</a>') 
              $('#cat_6').html('<a href="">'+parsed_data[0].pro_list_name+'</a>') 

              
            },
            complete: function(){
               $('.loader-container').hide();
               $('.product-details-inner').show();
          }
            
        });

    }

    
    function openSubmenu(id){
      
        $.ajax({
    
            url:"<?php echo base_url();?>submenu/",
            data:{id:id},
            method:"POST",
            datatype:"jsonp",
            success:function(data){
              var sess = $('#user_id').val(); 
              var parsed_data = JSON.parse(data);  
              if(Array.isArray(parsed_data) && parsed_data.length){
              document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">`+parsed_data[0].sub_menu_name+`</div>
              <a href="<?php echo base_url() ?>`+parsed_data[0].sub_menu_link+`"><div class="sidenavContent">`+parsed_data[0].sub_menu_name+`</div></a>`;
              }else{
                document.getElementById("sub-container-content").innerHTML = `<div class="sidenavContentHeader">No Menu</div>
              <a href="#"><div class="sidenavContent">No Menu</div></a>`;  
              }  
            }
        });

    }

    var user_ids = $('#sess_user_id').val();
    if(user_ids != ""){
    function addWishList(id){
        $.ajax({
            url:"<?php echo base_url();?>Wishlist/AddWishList",
            data:{id:id,user_ids:user_ids},
            method:"POST",
            datatype:"jsonp",
            success:function(data){
              alert(data);
            }
            
        });

    }
  }

    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});



  </script>

</body>

</html>
