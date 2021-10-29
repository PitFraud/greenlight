<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receipt Details
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
	  </ol>
    </section>
	<!-- Main content -->
    <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addReceiptEntry" >
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
		  <fieldset>
		    <legend>Receipt Details</legend>
			<input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
              <!-- radio -->
               <div class="form-group">
			   <input type="hidden" name="rece_id" value="<?php if(isset($records->receipt_id)) echo $records->receipt_id ?>"/>
                <div class="box-body">
				<div class="form-group">
					<label for="customer_email" class="col-sm-2 control-label"> Receipt Head </label>
					<div class="col-sm-4">
						<input type="hidden" id="receip_id_fk" value="<?php if(isset($records->receip_id_fk)) echo $records->receip_id_fk; ?>"/>
						<?php echo form_dropdown('receip_id', $receiptnames, '', 'id="receipt_name" class="form-control select2"  required data-pms-type="dropDown"', 'name="receip_id"');?>
					</div>
					<label for="customer_email" class="col-sm-2 control-label">Date (dd/mm/yyyy)</label>
					<div class="col-sm-4">
						<input type="Text"   name="rept_date" id="rept_date" class="form-control" placeholder="DD/MM/YYYY" value="<?php if(isset($records->rept_date)){ echo $records->rept_date; }?>"/>
					</div>
				</div>
				<div class="form-group">
					<label for="customer_email" class="col-sm-2 control-label"> Amount <span style="color:red">*</span></label>
					<div class="col-sm-4">
						<input type="Text"  class="form-control" data-pms-required="true" name="receipt_amount" id="receipt_amount" value="<?php if(isset($records->receipt_amount )) echo $records->receipt_amount ; ?>"/>
					</div>
					<label for="customer_email" class="col-sm-2 control-label"> Paid to <span style="color:red">*</span></label>
					<div class="col-sm-4">
						<input type="Text"  class="form-control" data-pms-required="true" name="paid_to" id="paid_to" value="<?php if(isset($records->paid_to)) echo $records->paid_to; ?>"/>
					</div>
				</div>
				<div class="form-group">
					
					<label for="customer_email" class="col-sm-2 control-label"> Narration </label>
					<div class="col-sm-4">
					<textarea class="form-control" name="narration"><?php if(isset($records->narration)) echo $records->narration; ?> </textarea>
					</div>
				</div>
				</div>
				</div>
			</fieldset>
			</div>
			</div>
		</div>
				
      
    </section>
	<div class="box-footer">                
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-4">
                      <button type="button" class="btn btn-danger" onclick="window.location.reload();">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
	</div>
	</form>
	<!-- /.content -->
  </div>
<!-- /.content-wrapper -->






