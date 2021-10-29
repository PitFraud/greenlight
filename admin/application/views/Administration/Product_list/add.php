<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Product List</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>addProductListCat">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Add Product List</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id') ?>"/>
            <!-- <?php var_dump($this->session->userdata()); ?> -->
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="product_id" value="<?php if(isset($records[0]->pro_list_id)) echo $records[0]->pro_list_id ?>"/>
             <div class="box-body">

             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Select Product Sub Category<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select name="pro_sub_cat_id_fk" class="form-control">
                    <option></option>
                    <?php
                    foreach($prod_sub_cat as $prod_sub_cats)
                    {
                      ?>
                      <option value="<?php echo $prod_sub_cats->pro_sub_cat_id; ?>" <?php if(isset($records[0]->pro_sub_cat_id)) if($records[0]->pro_sub_cat_id == $prod_sub_cats->pro_sub_cat_id) { echo 'selected';} ?>><?php echo $prod_sub_cats->pro_sub_cat_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <br><br>

             <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Product Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="product_name" id="category"  value="<?php if(isset($records[0]->pro_list_name)) echo $records[0]->pro_list_name ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Product Details<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <textarea required class="form-control" name="product_details" id="description"><?php if(isset($records[0]->pro_list_details)) echo $records[0]->pro_list_details ?></textarea>
                </div>
              </div>
              <br><br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Original Price<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="product_original_price" id="category"  value="<?php if(isset($records[0]->prod_list_price_original)) echo $records[0]->prod_list_price_original ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Discount Price<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="product_discount_price" id="category"  value="<?php if(isset($records[0]->pro_list_dicount_price)) echo $records[0]->pro_list_dicount_price ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Stock<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="text"  required  class="form-control" name="product_stock" id="category"  value="<?php if(isset($records[0]->pro_list_stock)) echo $records[0]->pro_list_stock ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Entered Date<span style="color:red">*</span></label>
                <div class="col-sm-5">
                <input type="date"  required  class="form-control" name="product_enter_date" id="category"  value="<?php if(isset($records[0]->pro_list_enter_date)) echo $records[0]->pro_list_enter_date ?>">
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label" style="text-align:right;">Upload Image<span style="color:red">*</span></label>

                <div class="col-sm-5">
                <input type="file"  required  class="form-control" name="product_image" id="category"  value="<?php if(isset($records[0]->pro_list_img)) echo $records[0]->pro_list_img ?>">
                <?php if(isset($records[0]->pro_list_img)){ ?>
                <img src="<?php echo base_url() ?>assets/uploads/productlist/<?php echo $records[0]->pro_list_img ?>" alt="" style="height: 50px; width:50px;">
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
