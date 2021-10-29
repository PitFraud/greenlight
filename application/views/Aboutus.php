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

	<div class="main-sec"></div>


<div class="breadcrumb-area">
    <div class="overlay overlay-bg"></div>
    <div class="container-fluid">
      <div class="breadcrumb-content">
        <h2 class="text-white">About us</h2>
        <ul>
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">About us</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
  <!-- about us -->
  <?php foreach($about_us as $about) { ?>
  <section class="aboutus section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="history-title mb-md-40">
            <h2 class="text-light-black"><?php echo $about->about_us_title ?></span></h2>
            <p class="text-light-white"><?php echo $about->about_us_descp ?></p>
            <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.</p>
            <a href="#" class="btn-solid with-line btn-big mt-20"><span>Learn More <i class="fas fa-caret-right"></i></span></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-md-6">
              <div class="histry-img mb-xs-20">
                <img src="assets/img/about/about1.jpg" class="img-fluid full-width" alt="Histry">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
              <div class="histry-img mb-xl-20">
                <img src="assets/img/about/about2.jpg" class="img-fluid full-width" alt="Histry">
              </div>
              <div class="histry-img">
                <img src="assets/img/about/about3.jpg" class="img-fluid full-width" alt="Histry">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
  <!-- about us -->
  <!-- How It Woks -->
  <section class="section-padding how-it-works bg-theme-primary">
    <div class="container">
      <div class="section-header-style-2">
        <h6 class="text-light-green sub-title">Our Process</h6>
        <h3 class="text-light-black header-title">How Does It Work</h3>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="how-it-works-box arrow-1">
            <div class="how-it-works-box-inner"> <span class="icon-box">
                                <img src="assets/img/how1.png" alt="icon">
                                <span class="number-box">01</span>
              </span>
              <h6>Search</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="how-it-works-box arrow-2">
            <div class="how-it-works-box-inner"> <span class="icon-box">
                                <img src="assets/img/how2.png" alt="icon">
                                <span class="number-box">02</span>
              </span>
              <h6>Select</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="how-it-works-box arrow-1">
            <div class="how-it-works-box-inner"> <span class="icon-box">
                                <img src="assets/img/how3.png" alt="icon">
                                <span class="number-box">03</span>
              </span>
              <h6>Order</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="how-it-works-box">
            <div class="how-it-works-box-inner"> <span class="icon-box">
                                <img src="assets/img/how4.png" alt="icon">
                                <span class="number-box">04</span>
              </span>
              <h6>Enjoy</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- How It Woks -->
  
</div>

<section id="team" class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" text-center">
                        <h2>Our <span>Team</span></h2>
                        <h4>Meet our awesome and expert team members</h4>
                    </div>
                </div>
            </div>
            
                <div class="row team-items">
                <?php foreach($our_team as $our_teams) { ?>
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Lorem Ipsum</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="<?php echo $our_teams->our_team_twitter_link ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="<?php echo $our_teams->our_team_pintrest_link ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="<?php echo $our_teams->our_team_instagram_link ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="<?php echo $our_teams->our_team_vimeo_link ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4><?php echo $our_teams->our_team_name ?></h4>
                                <span><?php echo $our_teams->our_team_desig ?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Lorem Ipsum</h4>
                                    <p>
                                          kING.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Lorem Ipsum</h4>
                                <span>App Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Lorem Ipsum</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-envelope-open"></i></a>
                                </span>
                                <h4>Lorem Ipsum</h4>
                                <span>Web designer</span>
                            </div>
                        </div>
                    </div> -->
                </div>
        </div>
    </section>
