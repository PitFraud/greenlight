
      <div id="sub-container">
        <div id="mainMenu">
          <i class="fas fa-chevron-left" style="color: #8e9090"></i> MAIN MENU
        </div>
        <hr />
        <div id="sub-container-content">
          <!-- <div class="sidenavContentHeader">Prime Video</div>
          <a href="#"><div class="sidenavContent">All Videos</div></a> -->
        </div>
      </div>
    </div>

    <!--Not Sidenav-->
    <div>
<body class="">
	<div class="inner-wrapper">
		<div class="container-fluid no-padding">
			<div class="row no-gutters">
				<!-- <div class="col-md-6">
					<div class="main-banner">
						<img src="assets/img/slider.jpg" class="img-fluid full-width main-img" alt="banner">
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="section-2 user-page main-padding login-pad">
						<div class="login-sec">
							<div class="login-box">
								<form>
									<h4 class="text-light-black fw-600">Payment </h4>
									<div class="row">
										<div class="col-12">
										<!-- 	<p class="text-light-black">Have a corporate username? <a href="#">Click here</a>
											</p> -->
											<div class="form-group">
												<label class="text-light-white fs-14">First Name</label>

                        <?php foreach($user_name as $users) { ?> 
												<input type="text" name="#" class="form-control form-control-submit" placeholder="User Name" value="<?php echo $users->first_name ?>" readonly>
                        <?php } ?>
											</div>
                      <div class="form-group">
												<label class="text-light-white fs-14">Last Name</label>

                        <?php foreach($user_name as $users) { ?> 
                          <input type="text" name="#" class="form-control form-control-submit" placeholder="User Name" value="<?php echo $users->last_name ?>" readonly>
                        <?php } ?>
											</div>
                      <div class="form-group">
												<label class="text-light-white fs-14">Package Name</label>
                        <?php foreach($subscription as $subs){ ?>
												<input  name="#" class="form-control form-control-submit"  placeholder="Package Name" value="<?php echo $subs->subp_name ?>" readonly>
                        <input type="hidden" name="#" id="sub_id" value="<?php echo $subs->subp_id ?>">
                        <?php } ?>
												<div  class=""></div>
											</div>
											<div class="form-group">
												<label class="text-light-white fs-14">Amount</label>
                        <?php foreach($subscription as $subs){ ?>
												<input  name="#" class="form-control form-control-submit" id="amt" placeholder="Amount" value="<?php echo $subs->subp_price ?>" readonly>
                        <?php } ?>
												<div  class=""></div>
											</div>
										
											<div class="form-group">
												<!-- <button type="submit" class="btn-second-2 btn-14 btn-submit full-width" onclick="Pay_now()">Pay Now</button> -->
                        <button id="rzp-button1" class="btn-second-2 btn-14 btn-submit full-width">Pay Now</button>
											</div>
										
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	</div>
<script>
  var amt = document.getElementById('amt').value;
  var sub_id = parseInt(document.getElementById('sub_id').value);
  // console.log(sub_id);
  var options = {
    "key": "rzp_test_KGoGBYZcEthZEb", // Enter the Key ID generated from the Dashboard
    "amount": amt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Greenlight",
    "description": "Test Transaction",
    "image": "<?php echo base_url() ?>assets/img/logo4.png",
    "handler": function (response){
       var pay_repo = response.razorpay_payment_id;
        // console.log(response);
        jQuery.ajax({
            url:'<?php echo base_url() ?>addPayment/',
            data:{amt:amt,pay_repo:pay_repo,sub_id:sub_id},
            method:"POST",
            datatype:"jsonp",
             success:function(result){
            console.log(result);
             }
        })
    },
    "theme": {
        "color": "#57933b"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
       console.log(response);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>