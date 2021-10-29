

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

<body class="log-bdy">
	<div class="inner-wrapper">
		<div class="container-fluid no-padding">
			<div class="row no-gutters overflow-auto">
				<!-- <div class="col-md-6">
					<div class="main-banner">
						<img src="assets/img/slider.jpg" class="img-fluid full-width main-img" alt="banner">
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="section-2 user-page main-padding login-pad">
						<div class="login-sec">
							<div class="login-box">
								<form method="post" action="<?php echo site_url();?>/Register/reg">
									<h4 class="text-light-black fw-600">Create your account</h4>
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-6">
											<div class="form-group">
												<label class="text-light-white fs-14">First name</label>
												<input type="text" name="first" class="form-control form-control-submit" placeholder="First Name" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-6">
											<div class="form-group">
												<label class="text-light-white fs-14">Last name</label>
												<input type="text" name="last" class="form-control form-control-submit" placeholder="Last Name" required>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label class="text-light-white fs-14">Email</label>
												<input type="email" name="email"  id="email" class="form-control form-control-submit" placeholder="Email I'd" onblur="emailcheck()" required>
											</div>
											<div class="form-group">
												<label class="text-light-white fs-14">Password (8 character minimum)</label>
												<input type="password" id="password-field" name="password" class="form-control form-control-submit" value="password" placeholder="Password" required>
												<div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
											</div>
											<div class="form-group checkbox-reset">
												<label class="custom-checkbox mb-0">
													<input type="checkbox" name="#"> <span class="checkmark"></span> Keep me signed in</label>
											</div>
											<div class="form-group">
												<button type="submit" class="btn-second-2 btn-submit full-width btn-14">Create your account</button>
											</div>
											<div class="form-group text-center"> <span>or</span>
											</div>
											<div class="form-group">
												<button type="submit" class="btn-second-2 btn-facebook full-width">
													<img src="<?php echo base_url(); ?>assets/img/facebook-logo.svg" alt="btn logo">Continue with Facebook</button>
											</div>
											<div class="form-group">
												<button type="submit" class="btn-second-2 btn-google full-width">
													<img src="<?php echo base_url(); ?>assets/img/google-logo.png" alt="btn logo">Continue with Google</button>
											</div>
											<div class="form-group text-center">
												<p class="text-light-black mb-0">Have an account? <a href="<?php echo base_url(); ?>Home/Login">Sign in</a>
												</p>
											</div> <span class="text-light-black fs-12 terms">agree to the <a href="#"> Terms of Use </a> and <a href="#"> Privacy Policy.</a></span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script>

        function emailcheck(){

        var email = $('#email').val();

        if(email != '')
        {
          $.ajax({
            url:"<?php echo site_url('Register/check_email');?>",
            method:"POST",
            data:{email:email},
            success:function(data)
            {
            	console.log(data);
          //alert(data);
          if(data==1){
          // document.regForm.submit();

          }
          else{
            $("#email").val("");
            swal("EMAIL ALREADY EXIST");

          }
          }
          });
        }
      }

   </script>
