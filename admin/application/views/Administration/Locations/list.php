<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Locations</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Locations List</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>addLocation" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Add Offer</a>
            </div>
          </div>
        </div>
        <div class="box-body">
            <table id="locations" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SINO</th>
                  <th>City Name</th>
                  <th>District Name</th>
                  <th>State Name</th>
                  <th>Post Code</th>
                  <th>Entered Date</th>
                  <!-- <TH>Status</TH> -->
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