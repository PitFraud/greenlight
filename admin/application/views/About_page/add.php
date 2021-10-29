<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Banners</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addAboutpage"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add About Page Details</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="about_us_id" value="<?php if(isset($records[0]->about_us_id)) echo $records[0]->about_us_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">About Page Title<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="about_title" id="category"  value="<?php if(isset($records[0]->about_us_title)) echo $records[0]->about_us_title ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Description<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <textarea name="about_desc" class="form-control" id="" ><?php if(isset($records[0]->about_us_descp)) echo $records[0]->about_us_descp ?></textarea>
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