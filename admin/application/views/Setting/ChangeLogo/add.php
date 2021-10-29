<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Logo</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addLogo"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Logo</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="logo_id" value="<?php if(isset($records[0]->Logo_id)) echo $records[0]->Logo_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Logo Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="logo_name" id="category"  value="<?php if(isset($records[0]->Logo_name)) echo $records[0]->Logo_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Logo Image<span style="color:red">*</span></label>

                <div class="col-sm-5">
                <input type="file"  required  class="form-control" name="logo_img" id="category"  value="<?php if(isset($records[0]->Logo_img)) echo $records[0]->Logo_img ?>">
                <?php if(isset($records[0]->Logo_img)){ ?>
                <img src="<?php echo base_url() ?>assets/uploads/logo/<?php echo $records[0]->Logo_img ?>" alt="" style="height: 50px; width:50px;">
                <?php } ?>  
              </div>
              </div>
              <br><br>
            </div>
            <div class="form-group">
              <center><input type="submit" class="btn btn-success" name="submit" value="Submit"></center>
            </div>              
          </fieldset>
        </div>


      </div>


    </div>
    </form>
  </section>
</div>        