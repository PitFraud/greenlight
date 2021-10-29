<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Menus</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addMenus"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Menus</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="menu_id" value="<?php if(isset($records[0]->menu_id)) echo $records[0]->menu_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Select Menu Category<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="menu_cat_id_fk" class="form-control">
                    <option></option>
                    <?php
                    foreach($menu_cat as $menu_cats)
                    {
                      ?>
                      <option value="<?php echo $menu_cats->menu_cat_id; ?>" <?php if(isset($records[0]->menu_cat_id)) if($records[0]->menu_cat_id == $menu_cats->menu_cat_id) { echo 'selected';} ?>><?php echo $menu_cats->menu_cat_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>  
              <br><br>
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Menu Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="menu_name" id="category"  value="<?php if(isset($records[0]->menu_name)) echo $records[0]->menu_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Enter Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="menu_link" id="category"  value="<?php if(isset($records[0]->menu_link)) echo $records[0]->menu_link ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Entered Date<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="date"  required  class="form-control" name="menu_date" id="category"  value="<?php if(isset($records[0]->menu_entered_date)) echo $records[0]->menu_entered_date ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Menu Display Order<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="menu_order" id="category"  value="<?php if(isset($records[0]->menu_display_order)) echo $records[0]->menu_display_order ?>">
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