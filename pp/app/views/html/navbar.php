<div class="leftpanel">
	<div class="logopanel">
        <h1><span></span> Name <span></span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
      
        <li <?php if(base_url().'dashboard' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        
        <<li <?php if(base_url().'restaurant' == current_url()) { ?> class="active" <?php } ?>><a href="<?php echo base_url();?>restaurant"><i class="fa fa-building-o"></i> <span>Arms Management11</span></a>
        </li>
        
         <li <?php if(base_url().'timeslot' == current_url()) { ?>class="active" <?php  } ?>><a href="<?php echo base_url();?>timeslot"><i class="fa fa-clock-o"></i> <span>Ammunation Management</span></a>
        </li>
       
       <li <?php if(base_url().'userslist' == current_url()) { ?>class="active" <?php  } ?>><a href="<?php echo base_url();?>userslist"><i class="fa fa-users"></i> <span>Man Power Management</span></a>
        </li>
        
         <li <?php if(base_url().'area' == current_url()) { ?>class="active" <?php  } ?>><a href="<?php echo base_url();?>area"><i class="fa fa-location-arrow"></i> <span>Vehicles Management</span></a>   
        </li>
        
                 <li <?php if(base_url().'darea' == current_url()) { ?>class="active" <?php  } ?>><a href="<?php echo base_url();?>darea"><i class="fa fa-location-arrow"></i> <span>Material Managemnt</span></a>   
        </li>
       
                 <li class="nav-parent"><a href="#"><i class="fa fa-file-text"></i> <span>Reports</span></a>
          <ul class="children">
            <li><a href="<?php echo base_url(); ?>pending_order"><i class="fa fa-caret-right"></i>Issued Arms Detail Report</a></li>
            <li><a href="<?php echo base_url(); ?>complete_order"><i class="fa fa-caret-right"></i> Arms Report</a>
              <ul class="children" style="display: block;">
                <li><a href=""><i class="fa fa-caret-right"></i> G.F Rifle</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>LMG</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Gun-Machine</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>VLP</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Mini-Flair</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>R-455</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Pistol</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>R-38</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>AK-47</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Rifle ALR</a></li>
            </ul>
            </li>
          </ul>
        </li>
        
          <li class="nav-parent"><a href="#"><i class="fa fa-info-circle"></i> <span>Website Content</span></a>
          <ul class="children">
            <li><a href="<?php echo base_url(); ?>update-about"><i class="fa fa-caret-right"></i>About Us</a></li>
            <li><a href="<?php echo base_url(); ?>update-term"><i class="fa fa-caret-right"></i>Term & Conditions</a></li>
            <li><a href="<?php echo base_url(); ?>update-policy"><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
            <li><a href="<?php echo base_url(); ?>update-contact"><i class="fa fa-caret-right"></i>Contact-us</a></li>
          </ul>
        </li>
        
         <!-- <li class="nav-parent"><a href="#"><i class="fa fa-inbox"></i> <span>Send Messages</span></a>
          <ul class="children">
            <li><a href="<?php //echo base_url(); ?>inbox"><i class="fa fa-caret-right"></i>Create Message</a></li>
             <li><a href="<?php //echo base_url(); ?>view"><i class="fa fa-caret-right"></i>Your Inbox</a></li>
         </ul>
        </li>-->
 <li><a href="<?php echo base_url();?>superadminoff"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
      </ul>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

