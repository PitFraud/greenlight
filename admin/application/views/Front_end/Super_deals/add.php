<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Super Deals</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>Front_end/addSuperDeals"> 
   
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Super Deals</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="supdeal_id" value="<?php if(isset($records[0]->super_deal_id)) echo $records[0]->super_deal_id ?>"/>
             <div class="box-body">
             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Super Title<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <textarea name="sup_ban_name" class="form-control" id="" ><?php if(isset($records[0]->super_deal_name)) echo $records[0]->super_deal_name ?></textarea>
                </div>
              </div>
              <br><br>
              <br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Product category<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="pro_sub_cat_fk" class="form-control">
                    <option></option>
                    <?php
                    foreach($sub_cat as $sub_cats)
                    {
                      ?>
                      <option value="<?php echo $sub_cats->pro_sub_cat_id; ?>" <?php if(isset($records[0]->super_sub_category_fk)) if($records[0]->super_sub_category_fk == $sub_cats->pro_sub_cat_id) { echo 'selected';} ?>><?php echo $sub_cats->pro_sub_cat_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Entered Date<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="date"  required  class="form-control" name="super_ent_date" id="category"  value="<?php if(isset($records[0]->super_deal_enter_date)) echo $records[0]->super_deal_enter_date ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Upload Image<span style="color:red">*</span></label>

                <div class="col-sm-5">
                <input type="file"  required  class="form-control" name="super_img" id="category"  value="<?php if(isset($records[0]->super_deal_img)) echo $records[0]->super_deal_img ?>">
                <?php if(isset($records[0]->super_deal_img)){ ?>
                <img src="<?php echo base_url() ?>assets/uploads/superdeals/<?php echo $records[0]->super_deal_img ?>" alt="" style="height: 50px; width:50px;">
                <?php } ?>  
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