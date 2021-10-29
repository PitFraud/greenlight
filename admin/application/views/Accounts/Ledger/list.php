
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Ledger
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Ledger/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">  Ledger</li>
      </ol>
    </section>
   
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
			    
				<div class="col-md-3">
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover">Ledger Head</button>
						</div><!-- /btn-group -->
					<input type="text"  class="form-control"  id="ledgerbuk_head"  placeholder="Ledger Head">
				</div><!-- /input-group -->
				</div>
			<div class="col-md-4">
				<div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Ledger Date </button>
					</div><!-- /btn-group -->
						<input id="start_date" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
						<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
					<!--	<input id="end_date" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
						<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>-->
				</div>
			</div>
			<div class="col-sm-1">
					<div class="input-group">
						<button type="button" id="search" class="btn bg-orange btn-flat margin" >Search</button>
					</div>
			</div>
			  
			  
			  
			  
			  
			  
			  
			  <!--
			  
              <div class="col-md-4"><h2 class="box-title"></h2> </div>
			  <div class="col-md-2">
				
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover">Ledger Head</button>
						</div>
							<input type="text" class="form-control" id="ledgerbuk_head">
					</div>
					
				</div>
				<div class="col-md-2">
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover">Start Date</button>
						</div>
							<input type="text" class="form-control" id="start_date">
							
					</div>
					
				</div>
				<div class="col-md-2">
					<div class="input-group margin">
						
							<input type="text" class="form-control" id="end_date">
					</div>
					
				</div>
				
				<div class="col-md-4">
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover" id="search">Search</button>
						</div>
					</div>
					
				</div>
				-->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="enquiry_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL.NO</th>
				  <th>DATE</th>
				  <th>LEDGER NAME</th>
                  <th>CREDIT</th>
				  <th>DEBIT</th>
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






