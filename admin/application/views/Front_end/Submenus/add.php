<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add SubMenu</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>addSubmenus"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add SubMenu</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="sub_menu_id" value="<?php if(isset($records[0]->sub_menu_id)) echo $records[0]->sub_menu_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Select Parent Menu<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="menu_parent_id" class="form-control">
                    <option></option>
                    <?php
                    foreach($menu as $menus)
                    {
                      ?>
                      <option value="<?php echo $menus->menu_id; ?>" <?php if(isset($records[0]->menu_parent_id)) if($records[0]->menu_parent_id == $menus->menu_id) { echo 'selected';} ?>><?php echo $menus->menu_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">SubMenu Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="submenu_name" id="category"  value="<?php if(isset($records[0]->sub_menu_name)) echo $records[0]->sub_menu_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Enter Link<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="submenu_link" id="category"  value="<?php if(isset($records[0]->sub_menu_link)) echo $records[0]->sub_menu_link ?>">
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