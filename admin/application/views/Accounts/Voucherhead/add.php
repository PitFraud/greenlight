<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Voucher Head Details
			<!-- <small>Optional description</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<form class="form-horizontal" method="POST" action="<?php echo base_url();?>addVoucherhead/" >
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<fieldset>
							<legend>Voucher Head Details</legend>
							<input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

							<!-- radio -->
							<div class="form-group">
								<input type="hidden" name="vouch_id" value="<?php if(isset($records[0]->vouch_id)) echo $records[0]->vouch_id ?>"/>
								<div class="box-body">
									<div class="form-group">
										<label for="customer_email" class="col-sm-4 control-label"> Voucher Head </label>
										<div class="col-sm-5">
											<input type="Text"  class="form-control" required name="vouch_head" value="<?php if(isset($records[0]->vouch_head)) echo $records[0]->vouch_head; ?>"/>
										</div>
									</div>
									<div class="form-group">
										<label for="customer_email" class="col-sm-4 control-label"> Description</label>
										<div class="col-sm-5">
											<textarea class="form-control" required name="vouch_desc"><?php if(isset($records[0]->vouch_desc)) echo $records[0]->vouch_desc; ?></textarea>
										</div>
									</div>
									<div class="form-group" align="center">
										<button type="submit" class="btn btn-success">Save</button>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
	</form>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->






