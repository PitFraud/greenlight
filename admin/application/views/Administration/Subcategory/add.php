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
    <form method="post" action="<?php echo base_url(); ?>addSubcategory"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Category Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="category_id" value="<?php if(isset($records[0]->category_id)) echo $records[0]->category_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Category<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="category_parent" class="form-control">
                    <option></option>
                    <?php
                    foreach($categories as $row)
                    {
                      ?>
                      <option value="<?php echo $row->category_id; ?>" <?php if(isset($records[0]->category_parent_id)) if($records[0]->category_parent_id == $row->category_id) { echo 'selected';} ?>><?php echo $row->category; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Sub-Category<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="category" id="category"  value="<?php if(isset($records[0]->category)) echo $records[0]->category ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Description</label>

                <div class="col-sm-5">
                  <textarea required class="form-control" name="description" id="description"><?php if(isset($records[0]->category_description)) echo $records[0]->category_description ?></textarea>
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