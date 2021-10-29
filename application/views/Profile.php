

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

<div class="row">
    <div class="col-md-2 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile Picture</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">View Profile</a>
  </li> -->

</ul>
    </div>
    <!-- /.col-md-4 -->
<div class="col-md-10">
<form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addProfile">
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <h2>Edit Profile </h2>
   <hr>
   <h6>Basic Information</h6>
    <div class="row">
  <div class="form-group col-lg-6">
  <input type="hidden" id="custId" name="user_id" value="<?php if(isset($user_info[0]->id)) echo $user_info[0]->id ?>">
    <input type="text" name="f_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your first name" value="<?php if(isset($user_info[0]->first_name)) echo $user_info[0]->first_name ?>">

  </div>
   <div class="form-group col-lg-6">

    <input type="text" name="l_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Last name" value="<?php if(isset($user_info[0]->last_name)) echo $user_info[0]->last_name ?>">

  </div>

   </div>


 <h6>Contact Information</h6>
    <div class="row">
  <div class="form-group col-lg-6">

    <input type="text" name="p_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number" value="<?php if(isset($user_info[0]->phone_no)) echo $user_info[0]->phone_no ?>">

  </div>
   <div class="form-group col-lg-6">

    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" value="<?php if(isset($user_info[0]->email)) echo $user_info[0]->email ?>">

  </div>


   </div>



  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h2>Profile Picture</h2>
<hr>
<input type="hidden" name="image_id" value="<?php if(isset($user_image)) echo $user_image[0]->user_pimg_id ?>"></input>
<div class="row">
  <div class="col-lg-4">
    <?php if(@$user_image[0]->user_pimage_name != NULL){ ?>
 <img src="<?php echo base_url() ?>admin/assets/uploads/user_profile/<?php echo @$user_image[0]->user_pimage_name ?>" class="img-fluid prof-edit-img">
      <?php } else { ?>
  <img src="<?php echo base_url() ?>admin/assets/uploads/user_profile/no_image.png" class="img-fluid prof-edit-img">
  <?php } ?>
  </div>

  <div class="col-lg-8">

    <div class="row">
      <div class="col-md-6 col-md-offset-3 center">
        <div class="btn-container">

          <p id="namefile">Only pics allowed! (jpg,jpeg,bmp,png)</p>
          <!--our custom btn which which stays under the actual one-->
          <button type="button"  class="btn btn-primary btn-sm">Choose a profile picture!</button>
          <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
          <input type="file" value="<?php if(isset($user_image[0]->user_pimage_name)) echo $user_image[0]->user_pimage_name ?>" name="profile_img" id="fileup">
        </div>
      </div>
    </div>
      <!--additional fields-->
      <br><br>
      <br><br>
      <br><br>
      <br>
    <div class="row">
      <div class="col-md-12">
        <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
        <input type="submit" value="Update Profile" class="btn btn-primary" >

      </div>
    </div>
  
  </div>
  </div>
  </div>
</div>
</form>
    </div>
    <!-- /.col-md-8 -->
  </div>







</div>
