<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Our Team</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addOurteam"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Our Team Details</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="our_team_id" value="<?php if(isset($records[0]->our_team_id )) echo $records[0]->our_team_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Our Team Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="ourteam_name" id="category"  value="<?php if(isset($records[0]->our_team_name)) echo $records[0]->our_team_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Designation<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="ourteam_desig" id="category"  value="<?php if(isset($records[0]->our_team_desig)) echo $records[0]->our_team_desig ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Twitter Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="twitter" id="category"  value="<?php if(isset($records[0]->our_team_twitter_link)) echo $records[0]->our_team_twitter_link ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Pintrest Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="pintrest" id="category"  value="<?php if(isset($records[0]->our_team_pintrest_link)) echo $records[0]->our_team_pintrest_link ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Instagram Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="instagram" id="category"  value="<?php if(isset($records[0]->our_team_instagram_link)) echo $records[0]->our_team_instagram_link ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Vimeo Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="vimeo" id="category"  value="<?php if(isset($records[0]->our_team_vimeo_link)) echo $records[0]->our_team_vimeo_link ?>">
                </div>
              </div>
              <br><br>
              
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Display Order<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="ourteam_disp_ord" id="category"  value="<?php if(isset($records[0]->our_team_dip_order)) echo $records[0]->our_team_dip_order ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Image<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="file"  required  class="form-control" name="ourteam_name_image" id="category"  value="<?php if(isset($records[0]->our_team_img)) echo $records[0]->our_team_img ?>">
                <?php if(isset($records[0]->our_team_img)) { ?>
                <img src="<?php echo base_url() ?>assets/uploads/ourteam/<?php echo $records[0]->our_team_img ?>" alt="" width ="100" height="100">
                <?php } ?>
                </div>
              </div>
              <br><br>
            </div>
            <div class="form-group">
              <center><input type="submit" class="btn btn-success" name="submit"></center>
            </div>              
          </fieldset>
        </div>


      </div>


    </div>
    </form>
  </section>
</div>        