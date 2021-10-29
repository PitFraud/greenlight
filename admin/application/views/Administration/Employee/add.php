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
    <form method="post" action="<?php echo base_url(); ?>Administration/addEmployeeDes"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Employee Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="id" value="<?php if(isset($records[0]->emp_id)) echo $records[0]->emp_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Employee Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="emp_name" id="category"  value="<?php if(isset($records[0]->name)) echo $records[0]->name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Designation<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="designation_idfk" class="form-control">
                    <option></option>
                    <?php
                    foreach($hello as $row)
                    {
                      ?>
                      <option value="<?php echo $row->id; ?>" <?php if(isset($records[0]->designation)) if($records[0]->designation == $row->id) { echo 'selected';} ?>><?php echo $row->designation; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Phone<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="phone" id="category"  value="<?php if(isset($records[0]->phone)) echo $records[0]->phone ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Address</label>

                <div class="col-sm-5">
                  <textarea required class="form-control" name="address" id="description"><?php if(isset($records[0]->address)) echo $records[0]->address ?></textarea>
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