<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Offers</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Offers List</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>addOffer" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Add Offer</a>
            </div>
          </div>
        </div>
        <div class="box-body">
            <table id="offer" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SINO</th>
                  <th>Offer Name</th>
                  <th>Pecentage %</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <TH>Image</TH>
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