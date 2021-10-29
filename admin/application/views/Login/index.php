<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_css.css">
<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <img style="height: 200px;" src="<?php echo base_url(); ?>assets/images/handplants.png">
        <!-- <h2>Logo</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget eros dapibus, ultricies tellus vitae, consectetur tortor. Etiam rutrum placerat
        </p>
        <a class="btn" href="">Read More</a> -->
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Login</h2>
        <form action="<?php echo base_url(); ?>index.php/Login" method="post">
          <p>
            <input type="text" placeholder="Username" name="username" required>
          </p>
          <p>
            <input type="password" placeholder="Password" name="password" required>
          </p>
          <p>
            <input class="btn" type="submit" value="Sing In" />
            <span style="color:#ff0000"><?php if(isset($message)) echo $message; ?><span>
          </p>
          <p>
            <!-- <a href="">Forget password?</a> -->
            <!-- <a href="">Create an account.</a> -->
          </p>
        </form>
      </div>
    </div>
  </div>
  <!-- <div class="credit">
    Designed by <a href=""> </a>
  </div> -->
</div>