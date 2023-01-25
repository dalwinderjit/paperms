<div class="leftpanel">
	<div class="logopanel">
        <h1><span></span> <img src="<?php echo base_url(); ?>webroot/images/logo.png" class="img-reponsive col-xs-offset-2"/> <span></span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
      
        <li <?php if(base_url().'ca-dashboard' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>ca-dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        
         <!-- <li class="nav-parent <?php if(base_url().'ca-add-arm' == current_url() || base_url().'ca-issue-arm' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"><span>Arms Management</span></a>
          <ul class="children" <?php if(base_url().'ca-add-arm' == current_url() || base_url().'ca-issue-arm' == current_url()) { ?> style="display: block;"  <?php  } ?>>
                <li <?php if(base_url().'ca-add-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-add-arm"><i class="fa fa-caret-right"></i> Add Weapon</a></li>
                <li <?php if(base_url().'ca-issue-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-issue-arm"><i class="fa fa-caret-right"></i>Issue Weapon</a></li> 
          </ul>
        </li>
      
        <li class="nav-parent  <?php if(base_url().'ca-add-ammunition' == current_url() || base_url().'ca-issue-ammunition' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Ammunition Management</span></a>
          <ul class="children"  <?php if(base_url().'ca-add-ammunition' == current_url() || base_url().'ca-issue-ammunition' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'ca-add-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-add-ammunition"><i class="fa fa-angle-double-right"></i> Add Ammunition</a></li>
            <li <?php if(base_url().'ca-issue-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-issue-ammunition"><i class="fa fa-angle-double-right"></i> Issue Ammunition</a></li>
          </ul>
        </li> -->
        
		<li class="nav-parent  <?php if(base_url().'course/add-course-name' == current_url() || base_url().'course/list-course-names' == current_url() || stripos(current_url(),base_url().'course/edit-course-name/')>-1 || base_url().'course-detail/add-course-detail' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Course Management</span></a>
          <ul class="children"  <?php if(base_url().'course/add-course-name' == current_url() || base_url().'course/list-course-names' == current_url() || stripos(current_url(),base_url().'course/edit-course-name/')>-1 || base_url().'course-detail/list' == current_url() || base_url().'course-detail/add-course-detail' == current_url() ||  stripos(current_url(),base_url().'course-detail/edit-course-detail/')>-1) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'course/add-course-name' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>course/add-course-name"><i class="fa fa-angle-double-right"></i> Add Course Name</a></li>
            <li <?php if( base_url().'course/list-course-names' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>course/list-course-names"><i class="fa fa-angle-double-right"></i> List Course Names</a></li>
			<?php if(stripos(current_url(),base_url().'course/edit-course-name/')>-1){ ?>
			 <li <?php if(stripos(current_url(),base_url().'course/edit-course-name/')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>course/edit-course-name/<?php echo $id; ?>"><i class="fa fa-angle-double-right"></i> Edit Course Name</a></li>
			<?php } ?>
			<?php if(false){ ?>
			<li <?php if(base_url().'course-detail/add-course-detail' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>course-detail/add-course-detail"><i class="fa fa-angle-double-right"></i>Add Course Detail</a></li>
			<li <?php if(base_url().'course-detail/list' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>course-detail/list"><i class="fa fa-angle-double-right"></i>List Course Detail</a></li>
			<?php if( stripos(current_url(),base_url().'course-detail/edit-course-detail/')>-1){ ?>
			 <li <?php if( stripos(current_url(),base_url().'course-detail/edit-course-detail/')>-1) { ?>class="active"  <?php  } ?>><a href="#"><i class="fa fa-angle-double-right"></i> Edit Course Detail</a></li>
			<?php } ?>
			<?php } ?>
          </ul>
        </li>
		 <li class="nav-parent  <?php if(base_url().'training-institute/add-institute' == current_url() || base_url().'training-institute/institute-list' == current_url() || stripos(current_url(),base_url().'training-institute/edit-institute')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Institute Management</span></a>
          <ul class="children"  <?php if(base_url().'training-institute/add-institute' == current_url() || base_url().'training-institute/institute-list' == current_url() || stripos(current_url(),base_url().'training-institute/edit-institute')>-1) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'training-institute/add-institute' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>training-institute/add-institute"><i class="fa fa-angle-double-right"></i> Add Institute</a></li>
            <li <?php if(base_url().'training-institute/institute-list' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>training-institute/institute-list"><i class="fa fa-angle-double-right"></i> List Institutes</a></li>
			<?php if(stripos(current_url(),base_url().'training-institute/edit-institute')>-1){ ?>
			<li <?php if(stripos(current_url(),base_url().'training-institute/edit-institute')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url();?>"><i class="fa fa-angle-double-right"></i>Edit posting</a></li>
			<?php } ?>
          </ul>
        </li>
		<li class="nav-parent  <?php if(base_url().'posting-list' == current_url()||  base_url().'posting-add' == current_url()||stripos(current_url(),base_url().'posting-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Posting Management</span></a>
          <ul class="children"  <?php if(base_url().'posting-add' == current_url() || base_url().'posting-list' == current_url()||stripos(current_url(),base_url().'posting-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'posting-add' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>posting-add"><i class="fa fa-angle-double-right"></i> Add Posting</a></li>
            <li <?php if(base_url().'posting-list' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>posting-list"><i class="fa fa-angle-double-right"></i> List posting</a></li>
			<?php if(stripos(current_url(),base_url().'posting-edit')>-1){ ?>
			<li <?php if(stripos(current_url(),base_url().'posting-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url();?>"><i class="fa fa-angle-double-right"></i>Edit posting</a></li>
			<?php } ?>
			
          </ul>
        </li>
		<?php if(false): ?>
        <li class="nav-parent  <?php if(base_url().'account-soes-list' == current_url()||  base_url().'account-soe-add' == current_url()||stripos(current_url(),base_url().'account-soe-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Account Branch Management</span></a>
          <ul class="children"  <?php if(base_url().'account-soes-list' == current_url() || base_url().'account-soe-add' == current_url()||stripos(current_url(),base_url().'account-soe-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'account-soes-list' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>account-soes-list"><i class="fa fa-angle-double-right"></i>SOE List</a></li>
            <li <?php if(base_url().'account-soe-add' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>account-soe-add"><i class="fa fa-angle-double-right"></i> Add Soe</a></li>
      <?php if(stripos(current_url(),base_url().'account-soe-edit')>-1){ ?>
      <li <?php if(stripos(current_url(),base_url().'account-soe-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url();?>"><i class="fa fa-angle-double-right"></i>Edit SOE</a></li>
      <?php } ?>
      
          </ul>
        </li>
		<?php endif; ?>
		<li class="nav-parent  <?php if(base_url().'ca-ranks' == current_url() || base_url().'ca-ranks-add' == current_url() ||  stripos(current_url(),base_url().'ca-ranks-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Ranks</span></a>
          <ul class="children"  <?php if(base_url().'ca-ranks' == current_url() || base_url().'ca-ranks-add' == current_url() || stripos(current_url(),base_url().'ca-ranks-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
			<li <?php if(base_url().'ca-ranks' == current_url() || base_url().'ca-deployment-reports-add' == current_url() || stripos(current_url(),base_url().'ca-deployment-reports-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-ranks"><i class="fa fa-angle-double-right"></i> Ranks List </a></li>
            <li <?php if(base_url().'ca-ranks-add' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-ranks-add"><i class="fa fa-angle-double-right"></i> Add Ranks</a></li>
			<?php if(stripos(current_url(),base_url().'ca-ranks-edit')>-1){ ?>
            <li <?php if(stripos(current_url(),base_url().'ca-ranks-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url(); ?>"><i class="fa fa-angle-double-right"></i> Edit Rank</a></li>
			<?php } ?>
          </ul>
        </li>
		<li class="nav-parent  <?php if(base_url().'ca-rank-groups' == current_url() || base_url().'ca-rank-groups-add' == current_url() || stripos(current_url(),base_url().'ca-rank-groups-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Rank Groups</span></a>
          <ul class="children"  <?php if(base_url().'ca-rank-groups' == current_url() || base_url().'ca-rank-groups-add' == current_url() || stripos(current_url(),base_url().'ca-rank-groups-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
			<li <?php if(base_url().'ca-rank-groups' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-rank-groups"><i class="fa fa-angle-double-right"></i>Rank Group List</a> </li>
            <li <?php if(base_url().'ca-rank-groups-add' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-rank-groups-add"><i class="fa fa-angle-double-right"></i> Add Rank Group</a></li>
			<?php if(stripos(current_url(),base_url().'ca-rank-groups-edit')>-1){ ?>
            <li <?php if(stripos(current_url(),base_url().'ca-rank-groups-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url(); ?>"><i class="fa fa-angle-double-right"></i> Edit Rank Group</a></li>
			<?php } ?>
          </ul>
        </li>
         <li class="nav-parent  <?php if(base_url().'ca-view-arm' == current_url() || base_url().'ca-view-arm' == current_url() || base_url().'ca-deployment-reports' == current_url() || base_url().'ca-deployment-reports-add' == current_url() || stripos(current_url(),base_url().'ca-deployment-reports-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Reports</span></a>
          <ul class="children"  <?php if(base_url().'ca-view-arm' == current_url() || base_url().'ca-view-arm' == current_url() || base_url().'ca-deployment-reports' == current_url() || base_url().'ca-deployment-reports-add' == current_url() || stripos(current_url(),base_url().'ca-deployment-reports-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
			<li <?php if(base_url().'ca-deployment-reports' == current_url() || base_url().'ca-deployment-reports-add' == current_url() || stripos(current_url(),base_url().'ca-deployment-reports-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-deployment-reports"><i class="fa fa-angle-double-right"></i> Deployment Reports <?php if( base_url().'ca-deployment-reports-add' == current_url()) { echo '-Add'; }elseif(stripos(current_url(),base_url().'ca-deployment-reports-edit')>-1){ echo '-Edit';} ?> </a></li>
            <li <?php if(base_url().'ca-view-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-view-arm"><i class="fa fa-angle-double-right"></i> View Arms</a></li>
            <li <?php if(base_url().'ca-view-issue-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-view-issue-arm"><i class="fa fa-angle-double-right"></i> View  Issue Arms</a></li>

            <li <?php if(base_url().'ca-view-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-view-ammunition"><i class="fa fa-angle-double-right"></i> View Ammunition</a></li>
            <li <?php if(base_url().'ca-view-issue-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-view-issue-ammunition"><i class="fa fa-angle-double-right"></i> View  Issue Ammunition</a></li>
          </ul>
        </li>
		<!-- Sanction strength -->
		<li class="nav-parent  <?php if(base_url().'ca-sanction-strength' == current_url() || stripos(current_url(),base_url().'ca-sanction-strength-edit')>-1) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Sanction Strength</span></a>
          <ul class="children"  <?php if(base_url().'ca-sanction-strength' == current_url() || stripos(current_url(),base_url().'ca-sanction-strength-edit')>-1) { ?> style="display: block;"  <?php  } ?>>
			<li <?php if(base_url().'ca-sanction-strength' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-sanction-strength"><i class="fa fa-angle-double-right"></i> List </a></li>
			<?php if(stripos(current_url(),base_url().'ca-sanction-strength-edit')>-1){ ?>
            <li <?php if(stripos(current_url(),base_url().'ca-sanction-strength-edit')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-sanction-strength-edit"><i class="fa fa-angle-double-right"></i> Edit</a></li>
			<?php } ?>
          </ul>
        </li>
		<li class="nav-parent  <?php if(base_url().'ca-khc-weapon-list' == current_url() || base_url().'ca-khc-weapon-main-category-list' == current_url() || base_url().'ca-khc-weapon-main-category-add' == current_url() || (stripos(current_url(),base_url().'ca-khc-weapon-main-category-edit')>-1) || base_url().'ca-khc-weapon-sub-category-list' == current_url() || (stripos(current_url(),base_url().'ca-khc-weapon-sub-category-edit')>-1) || base_url().'ca-khc-weapon-sub-category-add' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>KHC Weapon Mgmt.</span></a>
          <ul class="children"  <?php if(base_url().'ca-khc-weapon-list' == current_url() || base_url().'ca-khc-weapon-main-category-list' == current_url() || base_url().'ca-khc-weapon-main-category-add' == current_url() || (stripos(current_url(),base_url().'ca-khc-weapon-main-category-edit')>-1 || base_url().'ca-khc-weapon-sub-category-list' == current_url()) || (stripos(current_url(),base_url().'ca-khc-weapon-sub-category-edit')>-1) || base_url().'ca-khc-weapon-sub-category-add' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'ca-khc-weapon-list' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-khc-weapon-list"><i class="fa fa-angle-double-right"></i> Weapons</a></li>
            <li <?php if(base_url().'ca-khc-weapon-main-category-list' == current_url() || base_url().'ca-khc-weapon-main-category-add' == current_url() || (stripos(current_url(),base_url().'ca-khc-weapon-main-category-edit')>-1)) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-khc-weapon-main-category-list"><i class="fa fa-angle-double-right"></i> Weapon Main Cateogories
			<?php if(base_url().'ca-khc-weapon-main-category-add' == current_url()){
				echo 'Add';
			}else if((stripos(current_url(),base_url().'ca-khc-weapon-main-category-edit')>-1)){
				echo 'Edit';
			}else{
				echo 'List';
			}?>
			
			</a>
			</li>

            <li <?php if(base_url().'ca-khc-weapon-sub-category-list' == current_url() || (stripos(current_url(),base_url().'ca-khc-weapon-sub-category-edit')>-1) || base_url().'ca-khc-weapon-sub-category-add' == current_url() ) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-khc-weapon-sub-category-list"><i class="fa fa-angle-double-right"></i> Weapon Sub Category Mgmt.
				<?php if((stripos(current_url(),base_url().'ca-khc-weapon-sub-category-edit')>-1)){ echo 'Edit...'; }elseif(base_url().'ca-khc-weapon-sub-category-add' == current_url()){ echo 'Add'; } ?>
			</a></li>
            <li <?php if(base_url().'ca-view-issue-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-view-issue-ammunition"><i class="fa fa-angle-double-right"></i> View  Issue Ammunition</a></li>
          </ul>
        </li>
          <li class="nav-parent  <?php if(base_url().'ca-account-login' == current_url() ) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Account Management</span></a>
          <ul class="children"  <?php if(base_url().'ca-account-login' == current_url() ) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'ca-account-login' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>ca-account-login"><i class="fa fa-angle-double-right"></i> Login</a></li>
            
          </ul>
        </li>
 <li><a href="<?php echo base_url();?>logout"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
      </ul>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

