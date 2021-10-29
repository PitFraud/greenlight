<head>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/image-uploader.min.css">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
<?php if($balance_ad_count >= 4) { ?>
<div class="edit-prf-plant-wrap col-lg-12">

<h2 class="text-center">Post your ad</h2>
<form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>insertSellProduct">
<!-- <?php echo form_open_multipart('Sell/insertSellProduct');?> -->
<div class="select-cat-wrp">
<h5>SELECTED CATEGORY</h5>
<input type="hidden" name="subscription_id" value="<?php echo @$subscription_id[0]->subp_id ?>"/>
<input type="hidden" name="sub_cat_id" value="<?php echo @$sub_cat_prod[0]->pro_sub_cat_id ?>"/>
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>"/>
<input type="hidden" name="prodlist_id" value="<?php if(isset($records[0]->pro_list_id)) echo $records[0]->pro_list_id ?>"/>
<?php if(isset($sub_cat_prod)) { ?>
<h6><?php echo @$sub_cat_prod[0]->pro_sub_cat_name ?> &nbsp; <a href="<?php echo base_url() ?>Sell">Change</a></h6>
<?php } ?>
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Ads Left</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $balance_ad_count ?>">
    </div>
  </div>
<hr>
<h6>INCLUDE SOME DETAILS </h6>
<div class="form-group col-md-6">
  <label class="text-light-white fs-14">Ad Title</label>
  <input type="text" name="p_name" class="form-control form-control-submit" value="<?php if(isset($records[0]->pro_list_name)) echo $records[0]->pro_list_name ?>" required="">
</div>
<div class="form-group col-md-6">
<label for="exampleFormControlTextarea1">Description *</label>
<textarea class="form-control" name="p_details" id="exampleFormControlTextarea1" value="" rows="3"><?php if(isset($records[0]->pro_list_details)) echo $records[0]->pro_list_details ?></textarea>
</div>
  <br>
  <h6>SET A PRICE</h6>
<div class="form-group col-md-6">
  <label class="text-light-white fs-14">Price</label>
  <input type="text" name="p_price" class="form-control form-control-submit" value="<?php if(isset($records[0]->prod_list_price_original)) echo $records[0]->prod_list_price_original ?>" required="">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Upload Image</label>
    <input type="file" name="p_image" class="form-control-file" id="exampleFormControlFile1" value="<?php if(isset($records[0]->pro_list_img)) echo $records[0]->pro_list_img ?>" placeholder="Upload Product Image">
    <?php if(isset($records)){ ?>
      <img src="<?php echo base_url() ?>admin/assets/uploads/productlist/<?php echo $records[0]->pro_list_img ?>" alt="">
    <?php } ?>
  </div>
                        
  <h6>UPLOAD UP TO 9 PHOTOS</h6>
  <div class="row">
  <div class="upload-btn-img col-lg-2 pt-ryt-upload-new">
    <img src="<?php echo base_url() ?>assets/img/add-photo.png"class="img-thumbnail p-0 m-0 "  alt="user profile image">
    <?php if(isset($records2)) { ?>
      <?php foreach($records2 as $multi){ ?>
        <a href="#"><i class="fa fa-close"></i></a>
    <img src="<?php echo base_url() ?>admin/assets/uploads/prodlist_mult_img/<?php echo $multi->proli_img_name ?>" alt="">
    
    <?php }} else { ?>
    <input type="file" id="files" name="files[]" placeholder="add photo" onchange="preview_images();" value=""   multiple/>
    <?php } ?>  
</div>
<div class='col-lg-2' id="image_preview"></div>
</div>

<!-- <div class="input-images" ></div> -->


<hr>
<h6>YOUR CURRENT LOCATION</h6>

 <!-- <div class="form-group col-md-6" style="margin-bottom:40px;">
    <label for="exampleFormControlSelect1">Location</label>
    <select class="form-control" name="location_id" id="exampleFormControlSelect1">
      <?php foreach($locations as $locs){ ?>
      <option value=""></option>
      <option value="<?php $locs->loc_id ?>"><?php echo $locs->loc_city_name ?></option>
      <?php } ?>
    </select>
  </div> -->
  
  <div class="form-group col-md-6" style="margin-bottom:40px;">
    
    <table class="table table-borderless">
    <tr>
      <td>State:</td>
      <td id="state"></td>
    </tr>
    <tr>
      <td>City</td>
      <td id="city"></td>
    </tr>
    <tr>
      <td>Neighbourhood</td>
      <td id="neighbourhood"></td>
    </tr>
    <tr>
      <td colspan="2"><p><span style="color: red;">*</span><u>Allow Location Access on your Browser</u></p>
      </td>
    </tr>
    <tr>
      <td><input type="hidden" name="latitude" id="lat" value=""></td>
      <td><input type="hidden" name="longitude" id="lng" value=""></td>
    </tr>
    </table>
    
    
  </div>

 <button class="post-now-btn" id="submit" type="submit">Post Now</button>
                  
</div>
</form>

</div>
<?php } else { ?>
<!--  -->
<div class="edit-prf-plant-wrap col-lg-12">

<h2 class="text-center">HELLO DARKNESS MY OLD FRIEND</h2>

</div>
<?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bigdatacloudapi/js-reverse-geocode-client@latest/bigdatacloud_reverse_geocode.min.js" type="text/javascript"></script>
<script>
 function preview_images() 
{
 var total_file=document.getElementById("files").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
 }
}
/*bigdatacloudapi/js-reverse-geocode-client - GitHUB*/
 /* Initialise Reverse Geocode API Client */
 var reverseGeocoder=new BDCReverseGeocode();
 //display output to html element
var s = document.getElementById("state");
var c = document.getElementById("city");
var n = document.getElementById("neighbourhood");
var la = document.getElementById("lat");
var ln = document.getElementById("lng");
 /* Get the current user's location information, based on the coordinates provided by their browser */
    /* Fetching coordinates requires the user to be accessing your page over HTTPS and to allow the location prompt. */
    reverseGeocoder.getClientLocation(function(result) {
        s.innerHTML = result.localityInfo.administrative[1].name;
        c.innerHTML = result.localityInfo.administrative[2].name;
        n.innerHTML = result.localityInfo.administrative[5].name;
        la.innerHTML = result.latitude;
        ln.innerHTML = result.longitude;
        document.getElementById('lat').value=result.latitude;
        document.getElementById('lng').value=result.longitude;
    });

    
</script>

<body>