<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="#">
  <meta name="description" content="#">
  <title>Greenlight | Homepage</title>
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
  <link rel="apple-touch-icon-precomposed" href="#">
  <link rel="shortcut icon" href="#">
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fontawesome -->
  <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
  <!-- Flaticons -->
  <link href="<?php echo base_url(); ?>assets/css/font/flaticon.css" rel="stylesheet">
  <!-- Pe-icons -->
  <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet">
  <!-- Swiper Slider -->
  <link href="<?php echo base_url(); ?>assets/css/swiper.min.css" rel="stylesheet">
  <!-- Range Slider -->
  <link href="<?php echo base_url(); ?>assets/css/ion.rangeSlider.min.css" rel="stylesheet">
  <!-- magnific popup -->
  <link href="<?php echo base_url(); ?>assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Nice Select -->
  <link href="<?php echo base_url(); ?>assets/css/nice-select.css" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,500,600,700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,500,600,700&amp;display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  

  <style>
  .advertisement-banner-1 {
  background-image: url("<?php echo base_url() ?>admin/assets/uploads/superdeals/<?php foreach($super_deals as $super_deals1){ echo $super_deals1->super_deal_img; } ?>");
  background-position: top;
  background-repeat: no-repeat;
  background-attachment: scroll;
  position: relative;
  }

  .loader-container{
    width: 800px;
    height: 200px;
    background-color: #ffffff;
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loader{
    width: 50px;
    height: 50px;
    border: 5px solid;
    color: #3498db;
    border-radius: 50%;
    border-top-color: transparent;
    animation: loader 1.2s linear infinite;
}

@keyframes loader{
    25%{
        color: #2ecc71;
    }
    50%{
        color: #f1c40f;
    }
    75%{
        color: #e74c3c;
    }
    to{
        transform: rotate(360deg);
    }
}
  </style>

</head>

<body>
  <!-- Navigation -->
  <div class="main-hed">
  <header class="header">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-12">
          <div class="navigation">
            <div class="row">
            </div>
            <div class="logo">
              <a href="<?php echo base_url(); ?>index.php/">
                <?php foreach($logo as $logos){ ?>
                <img src="<?php echo base_url(); ?>admin/assets/uploads/logo/<?php echo $logos->Logo_img ?>" class="image-fit" alt="logo">
                <?php } ?>
              </a>
            </div>
            <div class="location-mob">
            <a  class="pop-up-button" href="#pop-up-one" ><i class="fas fa-map-marker-alt"></i> &nbsp;Location</a>
          </div>
            <div class="main-navigation">
        <nav class="main ser-home">
            <!-- <div class="input-group">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" style="background:#57933b; color:white;" id="cur_loc" type="button" title="Click Here To get Current Location"><i class="material-icons">my_location</i></button>
              </div>
              <input type="text" class="form-control" placeholder="Location" id="location_info" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div> -->
            <select class="js-example-basic-single" data-placeholder="Select a state" name="state">
              <option value=""><button class="btn btn-outline-secondary" style="background:#57933b; color:white;" id="cur_loc" type="button" title="Click Here To get Current Location"><i class="material-icons">Current Location</i></button></option>
              <option value="AL">Alabama</option>
              <option value="WY">Wyoming</option>
            </select>
        </nav>
<div class="wrap dis-wrp">
<form action="<?php echo base_url() ?>Search/index" method="get">
   <div class="search">
      <input type="text" class="searchTerm" name="search" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</form>
</div>
<ul class="log1">
                <li class="hamburger-menu">
                  <a href="#" class="menu-btn"> <span></span>
                    <span></span>
                    <span></span>
                  </a>
                </li>
                <li class="user-details log-reg-btn">
                <?php if($this->session->userdata('name')){?>
                <?php } else { ?>
                <?php } ?>
                  <a href="<?php echo base_url(); ?>Register/Login">  <span>Login / Register</span>
                  </a>
                </li>
            <!--    <li class="user-details">
                  <a href="#">  <span>Sell</span>
                  </a>
                </li> -->

              </ul>
  <ul class="navbar-nav mr-auto nav1">
         <li class="nav-item active">
        <a class="nav-link " onclick="openNav()" style="cursor: pointer; display: inline-block;" href="#"><i class="fas fa-bars"></i> All <span class="sr-only">(current)</span></a>
        <?php foreach($menu_cat as $menu_category1){ ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>Category/CategoryMenu/<?php echo $menu_category1->pro_cat_id ?>"><?php echo $menu_category1->prod_cat_name ?><span class="sr-only">(current)</span><p></p></a>
      </li>
      <?php } ?>
      <!-- </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Seeds <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Plants</a>
      </li>

    <li class="nav-item">
        <a class="nav-link" href="#">Pots & Planters</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Plant Care</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tools & Accessories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">DIY Pest Control</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kits</a>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="#">Offers</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Plant Subscription</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Green Gifting</a>
      </li> -->



    </ul>

            </div>
            <div class="right-side-navigation">
              <ul >
                <li class="hamburger-menu">
                  <a href="#" class="menu-btn"> <span></span>
                    <span></span>
                    <span></span>
                  </a>
                </li>
                <li class="user-details log2">
                  <?php if($this->session->userdata('name')){?>

                    <ul class="dis-none">
                    <li><i class="far fa-comment"></i></li>
                    <li class="nav-item dropdown notif"> <a lass="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown user-drop">   <a lass="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="<?php echo base_url() ?>admin/assets/uploads/user_profile/<?php echo @$user_image_header[0]->user_pimage_name ?>" class="img-fluid usr-img" style="width:25px;height:25px;border-radius: 50%;"> </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><?php echo $this->session->userdata('name');?></a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>Profile/index">View & Edit Profile</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>MyAds/Ads">My Ads</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>wishlist">Wishlist</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>help">Help</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/register/logout">Logout</a>
                      </div>
                    </li>
                    </ul>
                    <?php }else{ ?>
                  <a href="<?php echo base_url(); ?>Register/Login">  <span class="custom-btn btn-14">Login / Register</span>
                    <?php }?>
                  </a>
                </li>
                <li class="user-details log2 ">
                  <a href="<?php echo base_url() ?>Sell" ><span class="custom-btn btn-14">Sell</span>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

<div id="pop-up-one" class="pop-up-overlay" >
  <div class="pop-up">
    <h1></h1>
    <a class="close" href="#">&times;</a>
    <div class="ser-loc">
   <select name=""   id="loc_drop">
      <option>Location</option>
  </select>
</div>
  </div>
</div>
  </header>
  <section class="secnd-sec">
  <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton ">
        <i class="fa fa-search"></i>
     </button>
   <a href="#" class="sell-mob-btn">  <span >Sell</span></a>
   </div>

</div>

  <nav class="navbar navbar-expand-lg  container">

  <button class="navbar-toggler n2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:white; font-size:28px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto nav2">
         <li class="nav-item active">
        <a class="nav-link " onclick="openNav()"
      style="


        cursor: pointer;
        display: inline-block;
      " href="#"><i class="fas fa-bars"></i> All <span class="sr-only">(current)</span></a>
      </li>
      <?php foreach($menu_cat as $menu_category1){ ?>
        <!-- All the menu items comes here -->
      <li class="nav-item active">
        <?php if($menu_category1->pro_cat_id=='15') { ?>
        <a class="nav-link" href="<?php echo base_url() ?>Category/get_offer/<?php echo $menu_category1->pro_cat_id ?>"><?php echo $menu_category1->prod_cat_name ?><span class="sr-only">(current)</span></a>
      <?php }
      elseif($menu_category1->pro_cat_id=='20') { ?>
        <a class="nav-link" href="<?php echo base_url() ?>Category/get_events/<?php echo $menu_category1->pro_cat_id ?>"><?php echo $menu_category1->prod_cat_name ?><span class="sr-only">(current)</span></a>

      </li>
    <?php } else { ?>
             <a class="nav-link" href="<?php echo base_url() ?>Category/CategoryMenu/<?php echo $menu_category1->pro_cat_id ?>"><?php echo $menu_category1->prod_cat_name ?><span class="sr-only">(current)</span></a>
  <?php }} ?>



    </ul>
  </div>
</nav>
<input type="hidden" id="user_id" value="<?php  echo $this->session->userdata('user_id'); ?>">
</section>
</div>

<div id="overlay" onclick="closeNav()"></div>

    <div id="closeBtn" onclick="closeNav()">&times;</div>
    <div class="sidenav" id="mySidenav">
      <div class="sidenavHeader">
        <?php foreach($user_name as $usernames){ ?>
          <?php if($usernames != ""){ ?>
        <i class="fas fa-user-circle"></i> <?php echo $usernames->first_name; ?>&nbsp;<?php echo $usernames->last_name ?>
        <?php } else { ?>
          <i class="fas fa-user-circle"></i> Hello, Sign In
        <?php } } ?>
      </div>
      <!--Below SideNavHeader-->
      <div id="main-container">
      <?php foreach($menu_cate as $menu_cates){ ?>
        <div class="sidenavContentHeader"><?php echo $menu_cates ->menu_cat_name ?></div>
            <?php
             foreach($menu as $menuho){
              if($menu_cates ->menu_cat_id == $menuho ->menu_cat_id){
            ?>
            <a href="#" onclick="openSubmenu(<?php echo $menuho ->menu_id ?>)" ><div class="sidenavRow"><?php echo $menuho ->menu_name ?><i class="fas fa-chevron-right" style="color: #8e9090"></i></div></a>
            <?php } } ?>

        <hr />
        <?php } ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/gh/bigdatacloudapi/js-reverse-geocode-client@latest/bigdatacloud_reverse_geocode.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      </div>
      <!--End of first container-->
 <script>



</script>

<script>
$('#cur_loc').click(function(){
  /*bigdatacloudapi/js-reverse-geocode-client - GitHUB*/
 /* Initialise Reverse Geocode API Client */
 var reverseGeocoder=new BDCReverseGeocode();
 //display output to html element

 /* Get the current user's location information, based on the coordinates provided by their browser */
    /* Fetching coordinates requires the user to be accessing your page over HTTPS and to allow the location prompt. */
    reverseGeocoder.getClientLocation(function(result) {
        /* console.log(result.longitude); */
        var cur_lat = result.latitude;
        var cur_lng = result.longitude;
        var country = result.localityInfo.administrative[0].name;
        var state = result.localityInfo.administrative[1].name;
        var city = result.localityInfo.administrative[2].name;
        var neighbourhood = result.localityInfo.administrative[5].name;
        // document.getElementById('location_info').value=neighbourhood+', '+city+', '+state+', '+country;
        // document.getElementById('location_info').title=neighbourhood+', '+city+', '+state+', '+country;
        document.getElementsByClassName('location_info').value=neighbourhood+', '+city+', '+state+', '+country;
        document.getElementsByClassName('location_info').title=neighbourhood+', '+city+', '+state+', '+country;
        console.log(country,state,city,neighbourhood);
    });
});


$('#get_location')

</script>
