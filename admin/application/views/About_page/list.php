<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Us</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>About Us</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>addAboutpage" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Add About Us</a>
            </div>
          </div>
        </div>
        <div class="box-body">
            <table id="about_us" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SINO</th>
                  <th>About Us Title</th>
                  <th>Description</th>
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