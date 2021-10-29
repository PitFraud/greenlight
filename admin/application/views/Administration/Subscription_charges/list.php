<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subscription</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Subscription Charges list</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>Administration/addSubscriptionCharges" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Add Subscription</a>
            </div>
          </div>
        </div>
        <div class="box-body">
            <table id="employee" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SINO</th>
                  <th>Subscription Name</th>
                  <th>Price</th>
                  <th>Validity(Days)</th>
                  <th>Ads(Total)</th>
                  <TH>Entered Date</TH>
                  <th><center>EDIT/DELETE</center></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
      </div>
    </section>  
</div>    