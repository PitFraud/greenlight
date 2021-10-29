<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Various Products</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>addVariousPlant"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Various Products</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="var_prod_id" value="<?php if(isset($records[0]->varpro_id)) echo $records[0]->varpro_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Product List<span style="color:red">*</span></label>
                <div class="col-sm-5 myDropdownpro">
                  <select name="product_list_id"  id='pro_list_sear' class="form-control">
                    <option ></option>
                    <?php
                    foreach($pro_list as $row)
                    {
                      ?>
                      <option value="<?php echo $row->pro_list_id; ?>" <?php if(isset($records[0]->varpro_pro_id)) if($records[0]->varpro_pro_id == $row->pro_list_id) { echo 'selected';} ?>><?php echo $row->prod_cat_name; ?>&nbsp;&nbsp;<?php echo $row->pro_sub_cat_name; ?>&nbsp;&nbsp;<?php echo $row->pro_list_name; ?>&nbsp;&nbsp;<?php echo $row->pro_list_enter_date; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Entered Date</label>

                <div class="col-sm-5">
                <input type="date"  required  class="form-control" name="var_pro_enter_date" id="category"  value="<?php if(isset($records[0]->varpro_enter_date)) echo $records[0]->varpro_enter_date ?>">
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