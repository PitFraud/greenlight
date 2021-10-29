
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
        <h2 class="text-white">Packages</h2>
        <ul>
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">Packages</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
  
 <div class="wrapper pack-green">
       <div class="table <?php echo $subscription[0]->subp_name ?> col-md-4">
           <div class="price-section">
               <div class="price-area">
                   <div class="inner-area">
                       <span class="text">
                         &#8377;
                       </span>
                       <span class="price"><?php echo $subscription[0]->subp_price ?></span>
                   </div>
               </div>
           </div>
           <div class="package-name">
    
           </div>
           <div class="features">
               <li>
                   <span class="list-name">No Of Adds</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">100% Responsive Design</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Credit Remove Permission</span>
                   <span class="icon cross"><i class="far fa-times-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Lifetime Template Updates</span>
                   <span class="icon cross"><i class="far fa-times-circle"></i></span>
               </li>
               <div class="btn"><button><a href="<?php echo base_url() ?>Payment/<?php echo $subscription[0]->subp_id ?>" style="color:#ffd861;">Purchase</a></button></div>
           </div>
       </div>
       <div class="table <?php echo $subscription[1]->subp_name ?> col-md-4">
           <div class="price-section">
               <div class="price-area">
                   <div class="inner-area">
                       <span class="text">
                         &#8377;
                       </span>
                       <span class="price"><?php echo $subscription[1]->subp_price ?></span>
                   </div>
               </div>
           </div>
           <div class="package-name">
            
           </div>
           <div class="features">
               <li>
                   <span class="list-name">Five Existing Template</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">100% Responsive Design</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Credit Remove Permission</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Lifetime Template Updates</span>
                   <span class="icon cross"><i class="far fa-times-circle"></i></span>
               </li>
               <div class="btn"><button><a href="<?php echo base_url() ?>Payment/<?php echo $subscription[1]->subp_id ?>" style="color:#a26bfa;">Purchase</a></button></div>
           </div>
       </div>
       <div class="table <?php echo $subscription[2]->subp_name ?>">
           <div class="price-section">
               <div class="price-area">
                   <div class="inner-area">
                       <span class="text">
                          &#8377;
                       </span>
                       <span class="price"><?php echo $subscription[2]->subp_price ?></span>
                   </div>
               </div>
           </div>
           <div class="package-name">
               
           </div>
           <div class="features">
               <li>
                   <span class="list-name">All Existing Template</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">100% Responsive Design</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Credit Remove Permission</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <li>
                   <span class="list-name">Lifetime Template Updates</span>
                   <span class="icon check"><i class="fas fa-check-circle"></i></span>
               </li>
               <div class="btn"><button><a href="<?php echo base_url() ?>Payment/<?php echo $subscription[2]->subp_id ?>" style="color:#43ef8b;">Purchase</a></button></div>
           </div>
       </div>
   </div>


