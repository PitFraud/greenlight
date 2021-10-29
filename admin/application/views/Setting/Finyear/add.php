<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Financial Year</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>addFinYear"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Financial Year Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="box-body">
              <div class="form-group">
               <input type="hidden" name="finyear_id" value="<?php if(isset($records->finyear_id)) echo $records->finyear_id ?>"/>
               <?php echo validation_errors(); ?>
               <label for="inputEmail3" class="col-sm-2 control-label"></label>

             </div>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Financial Year <span style="color:red">*</span></label>

                <div class="col-sm-4">
                  <input type="text"   class="form-control" name="fin_year" placeholder="Ex: 2016 - 2017" value="<?php if(isset($records->fin_year)) echo $records->fin_year ?>">
                </div>
              </div><br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Start Date<span style="color:red">*</span></label>

                <div class="col-sm-4">
                  <input type="text"   class="form-control" name="start_date" id="start_date"  value="<?php if(isset($records->fin_startdate)){ $start_date = str_replace('-', '/', $records->fin_startdate); $start_date =  date("d/m/Y",strtotime($start_date));  echo $start_date; }?>">
                </div>
              </div><br><br>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">End date <span style="color:red">*</span></label>

                <div class="col-sm-4">
                  <input type="text"   class="form-control" name="end_date" id="end_date"  value="<?php if(isset($records->fin_enddate)){ $end_date = str_replace('-', '/', $records->fin_enddate); $end_date =  date("d/m/Y",strtotime($end_date));  echo $end_date; }?>">
                </div>
              </div><br><br>
              <div class="form-group">
                <label class="col-sm-6 control-label">
                  <input type="hidden" id="fin_status" value="<?php if(isset($records->fin_status)) echo $records->fin_status ?>">
                  <input type="Checkbox" class="finckbox" name="currentfn" value="1"/>&nbsp;&nbsp;Set As Current FinancialYear
                </label>
              </div><br><br>
              <div class="form-group">
                <center><button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </div>              
          </fieldset>
        </div>
      </div>
    </div>
    </form>
  </section>
</div>        