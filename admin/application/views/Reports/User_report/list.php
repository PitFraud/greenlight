
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Users Report
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Details</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="input-group margin">
		<div class="input-group-btn">
		<button type="button" class="btn btn-primary nohover">Created Date</button>
		</div><!-- /btn-group -->
		<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-4 form-control" placeholder="dd/mm/yyyy" >
		<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
		
		<div class="input-group-btn">
		<button type="button" class="btn btn-primary nohover">Updated Date</button>
		</div><!-- /btn-group -->    
		<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-4 form-control" placeholder="dd/mm/yyyy" >
		<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
		
    <div class="input-group-btn">
		<button type="button" class="btn btn-primary nohover">Name</button>
		</div><!-- /btn-group -->    
		<input id="pmsUserName" type="text"   name="user_name"  class="col-md-4 form-control" placeholder="Search User Name" >
		<span tabindex="-1" class="input-group-btn select-calendar date-range"></span>
		
		<div class="col-sm-1">
		<div class="input-group-btn">
		<button type="button" id="search" class="btn btn-primary nohover" >Search</button>
		</div>
		</div>
	</div>
	</div>
      <div class="row">
		<div class="box">
		
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="users_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>FIRST NAME</th>
                  <th>LAST NAME</th>
                  <th>EMAIL</th>
                  <th>CREATED DATE</th>
                  <th>UPDATED DATE</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
     </div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






