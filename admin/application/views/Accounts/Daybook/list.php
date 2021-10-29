
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Day Book
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Daybook/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">  Day Book</li>
      </ol>
    </section>
   
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-4"><h2 class="box-title"></h2> </div>
				<div class="col-md-4">
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover">Date</button>
						</div><!-- /btn-group -->
							<input type="text" class="form-control" id="daybuk_date">
					</div><!-- /input-group -->
					
				</div>
				<div class="col-md-4">
					<div class="input-group margin">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary nohover" id="search">Search</button>
						</div>
					</div><!-- /input-group -->
					
				</div>
				
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
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Opening Balance</strong></td>
                    <td id="opening"><?php if(isset($opening->closing_amount)) {echo $opening->closing_amount;} else { echo "0";} ?></td>
                    <td ></td>
                </tr>
                </thead>
                <tbody>
                </tbody>
				 <tfoot>
				     <tr>
					<td></td>
					<td></td>
					  <td><strong>Closing Balance</strong></td>
					  
					  <td id="profit">0</td>
					  <td id="loss" >0</td>
					</tr>
					<td></td>
					<td></td>
					  <td><strong>Total</strong></td>
					  <td id="credit_total"></td>
					  <td id="debit_total"></td>
					</tr>
					
					<tr>
					<td colspan="6"><center><button type="button" class="btn btn-success" id="save">Save</button></center></td>
					</tr>
				</tfoot>
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






