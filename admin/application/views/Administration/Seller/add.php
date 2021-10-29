<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Seller</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <!-- <form method="post" action="<?php echo base_url(); ?>addBuyer">  -->
    <?php echo form_open_multipart('Administration/addSeller');?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Seller Details</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="sell_id" value="<?php if(isset($records[0]->sell_id)) echo $records[0]->sell_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Seller Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="seller_name" id="designation"  value="<?php if(isset($records[0]->sell_name)) echo $records[0]->sell_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Company Name</label>

                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="sell_comp_name" id="designation"  value="<?php if(isset($records[0]->sell_comp_name)) echo $records[0]->sell_comp_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Address<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="sell_address" id="designation"  value="<?php if(isset($records[0]->sell_address)) echo $records[0]->sell_address ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Phone No</label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="sell_phone" id="designation"  value="<?php if(isset($records[0]->sell_phone_no)) echo $records[0]->sell_phone_no ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Image</label>
                <div class="col-sm-5">
                  <input type="file"  required  class="form-control" name="sell_image" id="designation"  value="<?php if(isset($records[0]->sell_img)) echo $records[0]->sell_img ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Status</label>
                <div class="col-sm-5">
                  <select name="buy_status" class="form-control">
                  <?php
                    if($records[0] == NULL){
                        //this code code execute while add function is called
                     ?>
                     <option value="" >Select</option>
                     <option value="Active" >Active</option>
                     <option value="InActive" >InActive</option>
                     <?php
                     }elseif($records[0]->sell_status == 'Active'){ 
                         //below functions run when edit function is called
                    foreach($seller as $row)
                    {      
                      ?>
                      <option value="<?php echo $row->sell_status; ?>" <?php if(isset($records[0]->sell_status)) if($records[0]->sell_status == $row->sell_status) { echo 'selected';} ?>><?php echo $row->sell_status; ?></option>
                      <option value="InActive" >InActive</option>
                      <?php
                      
                    }}elseif($records[0]->sell_status == 'InActive'){
                        foreach($seller as $row){      
                    ?>
                    <option value="<?php echo $row->sell_status; ?>" <?php if(isset($records[0]->sell_status)) if($records[0]->sell_status == $row->sell_status) { echo 'selected';} ?>><?php echo $row->sell_status; ?></option>
                    <option value="Active" >Active</option>
                    <?php  }} ?>   
                  </select>
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