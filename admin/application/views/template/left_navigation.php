<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
   <!-- Sidebar Menu -->
    <ul class="sidebar-menu" id="navi">

      <li class="<?php if($this->uri->segment(3)=="dashboard"){echo "active";}?>" ><a  href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


      <!-- Settings -->
      <li class="treeview <?php
      if($this->uri->segment(1)=="Company")
      {echo "active";}
      else if($this->uri->segment(1)=="FinYear")
      {echo "active";}
      else if($this->uri->segment(1)=="ChangePassword")
      {echo "active";}
      else if($this->uri->segment(1)=="ChangeLogo")
      {echo "active";}
      ?>">
      <a><i class="fa fa-gear"></i><span>Settings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="Company"){echo "active";}?>" >

          <a href="<?php echo base_url();?>Company"><i class="glyphicon glyphicon-share-alt"></i><span>Company</span></a>

        </li>
        <li class="<?php if($this->uri->segment(1)=="FinYear"){echo "active";}?>" ><a  href="<?php echo base_url();?>FinYear"><i class="glyphicon glyphicon-share-alt"></i> <span>Financial Year</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="ChangePassword"){echo "active";}?>" ><a  href="<?php echo base_url();?>ChangePassword"><i class="glyphicon glyphicon-share-alt"></i> <span>Change Password</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="ChangeLogo"){echo "active";}?>" ><a  href="<?php echo base_url();?>ChangeLogo"><i class="glyphicon glyphicon-share-alt"></i> <span>Change Logo</span></a></li>
      </ul>
        </li>

        <!-- Administration -->
        <li class="treeview <?php
        if($this->uri->segment(1)=="Users")
        {echo "active";}
        if($this->uri->segment(1)=="Seller")
        {echo "active";}
        if($this->uri->segment(1)=="Buyer")
        {echo "active";}
        else if($this->uri->segment(1)=="Locations")
        {echo "active";}
        else if($this->uri->segment(1)=="Offers")
        {echo "active";}
        else if($this->uri->segment(1)=="Events")
        {echo "active";}
        // else if($this->uri->segment(1)=="Category")
        // {echo "active";}
        // else if($this->uri->segment(1)=="Subcategory")
        // {echo "active";}
        else if($this->uri->segment(1)=="SubscriptionCharges")
        {echo "active";}
        else if($this->uri->segment(1)=="Designation")
        {echo "active";}
        else if($this->uri->segment(1)=="Employee")
        {echo "active";}
        else if($this->uri->segment(1)=="ProductCat")
        {echo "active";}
        else if($this->uri->segment(1)=="ProductSubCat")
        {echo "active";}
        else if($this->uri->segment(1)=="ProductListCat")
        {echo "active";}
        ?>">
        <a><i class="glyphicon glyphicon-home"></i><span>Administration</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="<?php if($this->uri->segment(1)=="Users"){echo "active";}?>" ><a href="<?php echo base_url();?>Users"><i class="glyphicon glyphicon-share-alt"></i><span>Users Details</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Seller"){echo "active";}?>" ><a href="<?php echo base_url();?>Seller"><i class="glyphicon glyphicon-share-alt"></i><span>Seller Details</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Buyer"){echo "active";}?>" ><a href="<?php echo base_url();?>Buyer"><i class="glyphicon glyphicon-share-alt"></i><span>Buyer Details</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Designation"){echo "active";}?>" ><a  href="<?php echo base_url();?>Designation"><i class="glyphicon glyphicon-share-alt"></i> <span>Designation</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Employee"){echo "active";}?>" ><a  href="<?php echo base_url();?>Employee"><i class="glyphicon glyphicon-share-alt"></i> <span>Employee</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Locations"){echo "active";}?>" ><a  href="<?php echo base_url();?>Locations"><i class="glyphicon glyphicon-share-alt"></i> <span>Locations</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Offers"){echo "active";}?>" ><a  href="<?php echo base_url();?>Offers"><i class="glyphicon glyphicon-share-alt"></i> <span>Offers</span></a></li>
          <li class="<?php if($this->uri->segment(1)=="Events"){echo "active";}?>" ><a  href="<?php echo base_url();?>Events"><i class="glyphicon glyphicon-share-alt"></i> <span>Events</span></a></li>

          <!-- <li class="<?php if($this->uri->segment(1)=="Category"){echo "active";}?>" ><a  href="<?php echo base_url();?>Category"><i class="glyphicon glyphicon-share-alt"></i> <span>Category</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="Subcategory"){echo "active";}?>" ><a  href="<?php echo base_url();?>Subcategory"><i class="glyphicon glyphicon-share-alt"></i> <span>Sub Category</span></a></li> -->

          <li class="<?php if($this->uri->segment(1)=="SubscriptionCharges"){echo "active";}?>" ><a  href="<?php echo base_url();?>SubscriptionCharges"><i class="glyphicon glyphicon-share-alt"></i> <span>Subscription Charges</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="ProductCat"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductCat"><i class="glyphicon glyphicon-share-alt"></i> <span>Product Category</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="ProductSubCat"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductSubCat"><i class="glyphicon glyphicon-share-alt"></i> <span>Product Sub Category</span></a></li>

          <li class="<?php if($this->uri->segment(1)=="ProductListCat"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductListCat"><i class="glyphicon glyphicon-share-alt"></i> <span>Product List</span></a></li>


        </ul>
        </li>

        <!-- Accounts -->
        <li class="treeview
        <?php
                if($this->uri->segment(1)=='Voucherhead')
                  {echo "active";}
                else if($this->uri->segment(1)=='Receipthead')
                  {echo "active";}
                else if($this->uri->segment(1)=='VoucherEntry')
                          {echo "active";}
                else if($this->uri->segment(1)=='ReceiptEntry')
                          {echo "active";}
                else if($this->uri->segment(1)=="DayBook")
                          {echo "active";}
                else if($this->uri->segment(1)=="Ledger")
                  {echo "active";}
                else if($this->uri->segment(1)=="Ledgerhead")
                  {echo "active";}
                else if($this->uri->segment(1)=="Groups")
                  {echo "active";}
                else if($this->uri->segment(1)=="Journal")
                  {echo "active";}
                else if($this->uri->segment(1)=="Types")
                  {echo "active";}
                else if($this->uri->segment(1)=="Subgroups")
                  {echo "active";}
        ?>">
          <a><i class="fa fa-money"></i><span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="treeview
              <?php
                if($this->uri->segment(1)=='Voucherhead')
                  {echo "active";}
                else if($this->uri->segment(1)=='Receipthead')
                  {echo "active";}
              ?>">
              <a href="#"><i class="glyphicon glyphicon-pencil"></i> Create account heads
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(1)=='Voucherhead'){echo "active";}?>" ><a href="<?php echo base_url();?>Voucherhead"><i class="glyphicon glyphicon-share-alt"></i>Voucher</a></li>
                <li class="<?php if($this->uri->segment(1)=='Receipthead'){echo "active";}?>" ><a href="<?php echo base_url();?>Receipthead"><i class="glyphicon glyphicon-share-alt"></i>Receipt</a></li>
              </ul>
            </li>
            <li class="<?php if($this->uri->segment(1)=='VoucherEntry'){echo "active";}?>" ><a href="<?php echo base_url();?>VoucherEntry"><i class="glyphicon glyphicon-share-alt"></i>Voucher Entry</a></li>
            <li class="<?php if($this->uri->segment(1)=='ReceiptEntry'){echo "active";}?>" ><a href="<?php echo base_url();?>ReceiptEntry"><i class="glyphicon glyphicon-share-alt"></i>Receipt Entry</a></li>
            <li class="<?php if($this->uri->segment(1)=="Ledger"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ledger"><i class="glyphicon glyphicon-share-alt"></i> <span>Ledger</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="DayBook"){echo "active";}?>" ><a  href="<?php echo base_url();?>DayBook"><i class="glyphicon glyphicon-share-alt"></i> <span>Daybook</span></a></li>
          </ul>
        </li>

        <!-- Settings -->
        <li class="treeview <?php
        if($this->uri->segment(1)=="Sellerreport")
        {echo "active";}
        else if($this->uri->segment(1)=="Buyerreport")
        {echo "active";}
        else if($this->uri->segment(1)=="UserReports")
        {echo "active";}
        ?>">
        <a><i class="fa fa-line-chart"></i><span>Report</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="Sellerreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Sellerreport"><i class="glyphicon glyphicon-share-alt"></i> <span>Seller Report</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="Buyerreport"){echo "active";}?>" ><a  href="<?php echo base_url();?>Buyerreport"><i class="glyphicon glyphicon-share-alt"></i> <span>Buyer Report</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="UserReports"){echo "active";}?>" ><a  href="<?php echo base_url();?>UserReports"><i class="glyphicon glyphicon-share-alt"></i> <span>Users Report</span></a></li>
        </ul>
        </li>


        <!-- Front End -->
        <li class="treeview <?php
        if($this->uri->segment(1)=="Banners")
        {echo "active";}
        else if($this->uri->segment(1)=="MenuCategory")
        {echo "active";}
        else if($this->uri->segment(1)=="Menus")
        {echo "active";}
        else if($this->uri->segment(1)=="Submenus")
        {echo "active";}
        else if($this->uri->segment(1)=="ProductScroll")
        {echo "active";}
        else if($this->uri->segment(1)=="HotDeals")
        {echo "active";}
        else if($this->uri->segment(1)=="SuperDeals")
        {echo "active";}
        else if($this->uri->segment(1)=="SpecialOff")
        {echo "active";}
        else if($this->uri->segment(1)=="DealsOfDay")
        {echo "active";}
        else if($this->uri->segment(1)=="LatestProduct")
        {echo "active";}
        else if($this->uri->segment(1)=="VariousPlant")
        {echo "active";}
        ?>">
        <a><i class="	glyphicon glyphicon-folder-open"></i><span>Home Page</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="Banners"){echo "active";}?>" ><a  href="<?php echo base_url();?>Banners"><i class="glyphicon glyphicon-share-alt"></i> <span>Banners</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="MenuCategory"){echo "active";}?>" ><a  href="<?php echo base_url();?>MenuCategory"><i class="glyphicon glyphicon-share-alt"></i> <span>Menu Category</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="Menus"){echo "active";}?>" ><a  href="<?php echo base_url();?>Menus"><i class="glyphicon glyphicon-share-alt"></i> <span>Menus</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="Submenus"){echo "active";}?>" ><a  href="<?php echo base_url();?>Submenus"><i class="glyphicon glyphicon-share-alt"></i> <span>Submenus</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="ProductScroll"){echo "active";}?>" ><a  href="<?php echo base_url();?>ProductScroll"><i class="glyphicon glyphicon-share-alt"></i> <span>Browse by Product</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="HotDeals"){echo "active";}?>" ><a  href="<?php echo base_url();?>HotDeals"><i class="glyphicon glyphicon-share-alt"></i> <span>Hot Deals</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="SuperDeals"){echo "active";}?>" ><a  href="<?php echo base_url();?>SuperDeals"><i class="glyphicon glyphicon-share-alt"></i> <span>Super Deals</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="SpecialOff"){echo "active";}?>" ><a  href="<?php echo base_url();?>SpecialOff"><i class="glyphicon glyphicon-share-alt"></i> <span>Special Offers</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="DealsOfDay"){echo "active";}?>" ><a  href="<?php echo base_url();?>DealsOfDay"><i class="glyphicon glyphicon-share-alt"></i> <span>Deals of the Day</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="LatestProduct"){echo "active";}?>" ><a  href="<?php echo base_url();?>LatestProduct"><i class="glyphicon glyphicon-share-alt"></i> <span>Latest Products</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="VariousPlant"){echo "active";}?>" ><a  href="<?php echo base_url();?>VariousPlant"><i class="glyphicon glyphicon-share-alt"></i> <span>Various Products</span></a></li>
        </ul>
        </li>


        <li class="treeview <?php
        if($this->uri->segment(1)=="Aboutpage")
        {echo "active";}
        else if($this->uri->segment(1)=="Ourteam")
        {echo "active";}
        ?>">
        <a><i class="	glyphicon glyphicon-folder-open"></i><span>About Page</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="Aboutpage"){echo "active";}?>" ><a  href="<?php echo base_url();?>Aboutpage"><i class="glyphicon glyphicon-share-alt"></i> <span>About Page</span></a></li>
        <li class="<?php if($this->uri->segment(1)=="Ourteam"){echo "active";}?>" ><a  href="<?php echo base_url();?>Ourteam"><i class="glyphicon glyphicon-share-alt"></i> <span>Our Team</span></a></li>
        </ul>
        </li>

        <li class="treeview <?php
        if($this->uri->segment(1)=="Footer")
        {echo "active";}
        ?>">
        <a><i class="	glyphicon glyphicon-folder-open"></i><span>Footer Details</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
        <li class="<?php if($this->uri->segment(1)=="Footer"){echo "active";}?>" ><a  href="<?php echo base_url();?>Footer"><i class="glyphicon glyphicon-share-alt"></i> <span>Footer</span></a></li>
        </ul>
        </li>
    </ul>
  </section>
<!-- /.sidebar -->
</aside>
