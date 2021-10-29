<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Company</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>addCompany"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Company Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="cmp_id" value="<?php if(isset($records[0]->cmp_id)) echo $records[0]->cmp_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Company Name <span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="company" id="company"  value="<?php if(isset($records[0]->cmp_name)) echo $records[0]->cmp_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Address</label>

                <div class="col-sm-5">
                  <textarea required class="form-control" name="cmp_address" id="cmp_address"><?php if(isset($records[0]->cmp_adress)) echo $records[0]->cmp_adress ?></textarea>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Phone</label>

                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="cmp_phone" id="cmp_phone"  value="<?php if(isset($records[0]->cmp_phone)) echo $records[0]->cmp_phone ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Email</label>

                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="cmp_email" id="cmp_email"  value="<?php if(isset($records[0]->cmp_email)) echo $records[0]->cmp_email ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">GSTIN</label>

                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="cmp_gst" id="cmp_gst"  value="<?php if(isset($records[0]->cmp_gst)) echo $records[0]->cmp_gst ?>">
                </div>
              </div>
              <br><br>
              <hr>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Username</label>

                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="username" id="username"  value="<?php if(isset($records[0]->user_name)) echo $records[0]->user_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Password</label>

                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="password" id="password"  value="<?php if(isset($records[0]->password)) echo $records[0]->password ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <center><input type="submit" class="btn common-btn" name="submit"></center>
            </div>              
          </fieldset>
        </div>


      </div>


    </div>
    </form>
  </section>
</div>        