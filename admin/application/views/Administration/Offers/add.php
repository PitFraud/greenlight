<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Employee & Designation</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <!-- <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>addOffer">  -->
    <?php echo form_open_multipart('Administration/addOffer');?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Offers</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="off_id" value="<?php if(isset($records[0]->off_id)) echo $records[0]->off_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Offer Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="off_name" id="category"  value="<?php if(isset($records[0]->off_name)) echo $records[0]->off_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Percentage %<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="off_per" id="category"  value="<?php if(isset($records[0]->off_percentage)) echo $records[0]->off_percentage ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Start Date</label>
                <div class="col-sm-5">
                  <input type="date"  required  class="form-control" name="Str_date" id="category"  value="<?php if(isset($records[0]->off_strt_date)) echo $records[0]->off_strt_date ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">End Date</label>

                <div class="col-sm-5">
                <input type="date"  required  class="form-control" name="end_date" id="category"  value="<?php if(isset($records[0]->off_end_date)) echo $records[0]->off_end_date ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Offer Image</label>

                <div class="col-sm-5">
                <input type="file"  required  class="form-control" name="off_img" id="category"  value="<?php if(isset($records[0]->off_img)) echo $records[0]->off_img ?>">
                <?php if(isset($records[0]->off_img)){ ?>
                <img src="<?php echo base_url() ?>assets/uploads/offers/<?php echo $records[0]->off_img ?>" alt="" style="height: 50px; width:50px;">
                <?php } ?>  
              </div>
              </div>
              <br><br>
              <!-- <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Status<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="status" class="form-control">
                    <?php
                    
                    foreach($act as $row)
                    {      
                      ?>
                      <option value="1" <?php if(isset($records[0]->status)) if($records[0]->status == 1) { echo 'selected';} ?>>Active</option>
                      <option value="0" <?php if(isset($records[0]->status)) if($records[0]->status == 0) { echo 'selected';} ?>>InActive</option>
                        
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div> -->
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