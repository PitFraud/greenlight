<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reset Password</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>resetPassword"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Reset Password</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="form-group">
             <input type="hidden" name="id" value="<?php if(isset($records->id)) echo $records->id ?>"/>
            </div>
             <div class="box-body">
              <div class="form-group">
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Username</label>

                  <div class="col-sm-5">
                    <input type="text"  required  class="form-control" name="username" id="username"  value="<?php if(isset($records->user_name)) echo $records->user_name ?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Password</label>

                  <div class="col-sm-5">
                    <input type="text"  required  class="form-control" name="password" id="password"  value="<?php if(isset($records->password)) echo $records->password ?>">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <center><input type="submit" class="btn common-btn" name="submit"></center>
                </div>
              </div>
             </div>
              
          </fieldset>
        </div>
      </div>
    </div>
  </form>
</section>    