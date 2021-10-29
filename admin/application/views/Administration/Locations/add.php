<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Location</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>addLocation"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Location Details</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="loc_id" value="<?php if(isset($records[0]->loc_id)) echo $records[0]->loc_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">City Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="city_name" id="designation"  value="<?php if(isset($records[0]->loc_city_name)) echo $records[0]->loc_city_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">District Name</label>

                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="dis_name" id="designation"  value="<?php if(isset($records[0]->loc_dist_name)) echo $records[0]->loc_dist_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">State Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="state_name" id="designation"  value="<?php if(isset($records[0]->loc_state_name)) echo $records[0]->loc_state_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Post Code</label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="post_code" id="designation"  value="<?php if(isset($records[0]->loc_post_code)) echo $records[0]->loc_post_code ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Entered Date</label>
                <div class="col-sm-5">
                  <input type="date"  required  class="form-control" name="enter_date" id="designation"  value="<?php if(isset($records[0]->loc_created_date)) echo $records[0]->loc_created_date ?>">
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