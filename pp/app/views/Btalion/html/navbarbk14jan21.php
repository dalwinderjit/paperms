
<div class="leftpanel">
	<div class="logopanel">
        <h1><span></span> <img src="<?php echo base_url(); ?>webroot/images/logo.png" class="img-reponsive col-xs-offset-2"/>  <span></span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">
      <h5 class="sidebartitle" style="background:rgb(218,32,22); height:40px; width: 200px; color:white; display: table-cell;
  vertical-align: middle; -webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);"><strong><?php echo $this->session->userdata('nick'); ?></strong></h5><br/>
      <ul class="nav nav-pills nav-stacked nav-bracket">
      <li><a href="<?php echo base_url(); ?>bt-dashboard"><i class="fa fa-angle-double-right"></i> Home </a></li>
        <?php if($this->session->userdata('user_log')==0 || $this->session->userdata('user_log')== NULL ){ ?>
           <li <?php if(base_url().'bt-dashboard' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>bt-dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li <?php if(base_url().'bt-dashboard' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>bt-dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        
          <li class="nav-parent <?php if(base_url().'bt-add-arm' == current_url() || base_url().'bt-view-arm' == current_url() || base_url().'bt-issue-arm' == current_url() || base_url().'bt-view-issue-arm' == current_url() || base_url().'bt-view-issue-arms' == current_url() || base_url().'bt-deposit-arm' == current_url() || base_url().'bt-view-deposit-arm' == current_url() || base_url().'bt-weapon-con' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"><span>Arms Management</span></a>
          <ul class="children" <?php if(base_url().'bt-add-arm' == current_url() || base_url().'bt-view-arm' == current_url() || base_url().'bt-issue-arm' == current_url() || base_url().'bt-view-issue-arm' == current_url() || base_url().'bt-view-issue-arms' == current_url() || base_url().'bt-deposit-arm' == current_url() || base_url().'bt-view-deposit-arm' == current_url() || base_url().'bt-weapon-con' == current_url()) { ?> style="display: block;"  <?php  } ?>>
                <li <?php if(base_url().'bt-view-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-view-arm"><i class="fa fa-angle-double-right"></i> View all arms</a></li>
                <li <?php if(base_url().'bt-add-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-arm"><i class="fa fa-angle-double-right"></i> Issue arms</a></li>
                <li <?php if(base_url().'bt-deposit-arm' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-arm"><i class="fa fa-angle-double-right"></i> Deposit arms</a></li>
                <li <?php if(base_url().'bt-weapon-con' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-weapon-con"><i class="fa fa-angle-double-right"></i> Weapon condition/status</a></li>
          </ul>
        </li>
      
        <li class="nav-parent  <?php if(base_url().'bt-add-ammunition' == current_url() || base_url().'bt-view-ammunition' == current_url()|| base_url().'bt-update-ammunition/'.$this->uri->segment(2) == current_url() || base_url().'bt-recieved-ammunition' == current_url() || base_url().'bt-view-recieved-ammunition' == current_url() || base_url().'bt-view-issue-ammu' == current_url() || base_url().'bt-deposit-ammu' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Ammunition Management</span></a>
          <ul class="children"  <?php if(base_url().'bt-add-ammunition' == current_url() || base_url().'bt-view-ammunition' == current_url() || base_url().'bt-update-ammunition/'.$this->uri->segment(2) == current_url() || base_url().'bt-recieved-ammunition' == current_url() || base_url().'bt-view-recieved-ammunition' == current_url() || base_url().'bt-view-issue-ammu' == current_url() || base_url().'bt-deposit-ammu' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-view-ammunition' == current_url() || base_url().'bt-update-ammunition/'.$this->uri->segment(2) == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-view-ammunition"><i class="fa fa-angle-double-right"></i> View all ammunition</a></li>
            <li <?php if(base_url().'bt-add-ammunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-ammunition"><i class="fa fa-angle-double-right"></i> Issue ammunition</a></li>
             <li <?php if(base_url().'bt-deposit-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-ammu"><i class="fa fa-angle-double-right"></i> Deposit ammunition</a></li>
          </ul>
        </li>

           <li class="nav-parent <?php if(base_url().'bt-add-officer' == current_url() || base_url().'bt-add-manpower' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Man Power Management</span></a>
          <ul class="children" <?php if(base_url().'bt-add-officer' == current_url() || base_url().'bt-add-manpower' == current_url()) { ?> style="display:block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-add-officer' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-officer"><i class="fa fa-angle-double-right"></i> Add Officer</a></li>
            <li <?php if(base_url().'bt-add-manpower' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-manpower"><i class="fa fa-angle-double-right"></i> Man power Master</a></li>
           </ul>
        </li>
        
        <li class="nav-parent <?php if(base_url().'bt-add-vehicle' == current_url() || base_url().'bt-view-vehicle' == current_url() || base_url().'bt-view-v-details/'.$this->uri->segment(2) == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Vehicles Management</span></a>
          <ul class="children" <?php if(base_url().'bt-add-vehicle' == current_url() || base_url().'bt-view-vehicle' == current_url() || base_url().'bt-view-v-details/'.$this->uri->segment(2) == current_url()) { ?> style="display:block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-add-vehicle' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-vehicle"><i class="fa fa-angle-double-right"></i> Add new Vehicle</a></li>
            </ul>
        </li>

        <li class="nav-parent <?php if(base_url().'bt-add-material' == current_url() || base_url().'bt-view-material' == current_url() || base_url().'bt-view-m-details/'.$this->uri->segment(2) == current_url() || base_url().'bt-add-pmaterial' == current_url() || base_url().'bt-view-pmaterial' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Material Management</span></a>
          <ul class="children" <?php if(base_url().'bt-add-material' == current_url() || base_url().'bt-view-material' == current_url() || base_url().'bt-view-m-details/'.$this->uri->segment(2) == current_url() ||  base_url().'bt-add-pmaterial' == current_url() || base_url().'bt-view-pmaterial' == current_url()) { ?> style="display:block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-add-material' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-material"><i class="fa fa-angle-double-right"></i> Add new material (Recieved)</a></li>
            <li <?php if(base_url().'bt-add-pmaterial' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-pmaterial"><i class="fa fa-angle-double-right"></i> Add Purchased material</a></li>
             </ul>
        </li>
          

        <li class="nav-parent  <?php if(base_url().'bt-add-horse' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Horse Management</span></a>
          <ul class="children"  <?php if(base_url().'bt-add-horse' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-add-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-horse"><i class="fa fa-angle-double-right"></i> <span> Add Horse</span></a></li> 
             <li <?php if(base_url().'bt-deposit-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-horse"><i class="fa fa-angle-double-right"></i> Deposit Horse</a></li>
          </ul>
        </li>

        <li class="nav-parent  <?php if(base_url().'bt-add-quater' == current_url() || base_url().'bt-alot-quater' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Quarter Management</span></a>
          <ul class="children"  <?php if(base_url().'bt-add-quater' == current_url() || base_url().'bt-alot-quater' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-add-quater' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-quater"><i class="fa fa-angle-double-right"></i> <span> Quarter Management</span></a></li> 
             <li <?php if(base_url().'bt-alot-quater' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-alot-quater"><i class="fa fa-angle-double-right"></i> Alot Quarter</a></li>
          </ul>
        </li>


        <li class="nav-parent  <?php if(base_url().'bt-add-horse' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span>Old Data Management</span></a>
          <ul class="children"  <?php if(base_url().'bt-add-horse' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-ser-ammu' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-ser-ammu"><i class="fa fa-angle-double-right"></i> <span>Service Ammunition</span></a></li> 
             <li <?php if(base_url().'bt-p-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-p-ammu"><i class="fa fa-angle-double-right"></i> Practice Ammunition</a></li><hr/>


              <li <?php if(base_url().'bt-riflealr' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-riflealr"><i class="fa fa-angle-double-right"></i> Weapons</a></li>
          </ul>
        </li>
     
       <?php }else{ ?>
       <?php  if($this->session->userdata('user_log')==1 ){
        ?>
          <?php if($this->session->userdata('nick') == 'Comdt 75 Bn PAP' || $this->session->userdata('nick') == '27th Bn. PAP' || $this->session->userdata('nick') == '80th Bn. PAP' || $this->session->userdata('nick') == '7th Bn. PAP' || $this->session->userdata('nick') == 'Cso.PAP' || $this->session->userdata('nick') == 'RTC.PAP' || $this->session->userdata('nick') == 'Comdt I CDO BN' || $this->session->userdata('nick') == 'Comdt 9 Bn PAP.ASR' || $this->session->userdata('nick') == 'Comdt 5-IRB.ASR' || $this->session->userdata('nick') == 'Comdt 4-IRB.KPT' || $this->session->userdata('nick') == 'Comdt ISTC.KPT' || $this->session->userdata('nick') == 'Comdt 13th Bn. PAP' || $this->session->userdata('nick') == 'Comdt 82 Bn. PAP' || $this->session->userdata('nick') == 'Comdt 3 CDO. PAP' || $this->session->userdata('nick') == 'Comdt 4 CDO. PAP' || $this->session->userdata('nick') == 'Comdt 3-IRB.LDH'|| $this->session->userdata('nick') == 'Comdt 6-IRB.SGR' || $this->session->userdata('nick') == 'Comdt 2-IRB.SGR' || $this->session->userdata('nick') == 'Comdt 2 CDO BN' || $this->session->userdata('nick') == 'Comdt 36 PAP BN' || $this->session->userdata('nick') == 'Comdt 1-IRB' || $this->session->userdata('nick') == 'Comdt CTC/BHG' || $this->session->userdata('nick') == 'Comdt RTC.L/KOTHI' ||  $this->session->userdata('nick') == 'CSO Punjab Police'){  ?>
             <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Modules</span></a>
          <ul class="children"  <?php if(base_url().'bt-ckhcarms' == current_url() || base_url().'bt-ckhcammu' == current_url() || base_url().'bt-cmto' == current_url() || base_url().'bt-cosi' == current_url() || base_url().'bt-cqtr' == current_url() || base_url().'bt-cmsk' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <?php if($this->session->userdata('nick') != 'CSO Punjab Police'){ ?>
            <li <?php if(base_url().'bt-ckhcarms' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-ckhcarms"><i class="fa fa-angle-double-right"></i> <span>KHC WEAPON</span></a></li>
            <li <?php if(base_url().'bt-cbkhcarmsissued' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-cbkhcarmsissued"><i class="fa fa-angle-double-right"></i> <span>KHC WEAPON ISSUED</span></a></li>
            <li><a href="<?php echo base_url(); ?>bt-khc-cammuss" target="_blank"><i class="fa fa-angle-double-right"></i> KHC AMMUNITION -S </a></li> 
             <li><a href="<?php echo base_url(); ?>bt-khc-cammu" target="_blank"><i class="fa fa-angle-double-right"></i> KHC AMMUNITION -P </a></li> 

            <li><a href="<?php echo base_url(); ?>bt-cmto" target="_blank"><i class="fa fa-angle-double-right"></i> MTO </a></li> 
            <?php } ?>
            <li><a href="<?php echo base_url(); ?>bt-cosi" target="_blank"><i class="fa fa-angle-double-right"></i> OSI </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-cqtr" target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-cmsk" target="_blank"><i class="fa fa-angle-double-right"></i> MSK </a></li>
            <li><a href="<?php echo base_url(); ?>bt-msk-coldissued" target="_blank"><i class="fa fa-angle-double-right"></i> MSK ISSUED </a></li>
          </ul>
        </li> 

        <li class="nav-parent  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Returns</span></a>
          <ul class="children"  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> style="display: block;"  <?php  } ?>>
           <?php if($this->session->userdata('nick') != 'CSO Punjab Police'){ ?>
            <li><a href="<?php echo base_url(); ?>bt-ammulist"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ser Ammu Return</a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulistp"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Prt Ammu Return</a></li>
          <li><a href="<?php echo base_url(); ?>bt-weaponlist" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Return </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-mtoreporttwopp" target="_blank"><i class="fa fa-angle-double-right"></i> <span>MTO Return</span></a></li>
            <li><a href="<?php echo base_url(); ?>bt-mtoreporttwospolselect" target="_blank"><i class="fa fa-angle-double-right"></i> <span>POL Return</span></a></li>
            <?php } ?>
             <li><a href="<?php echo base_url('bt-mskanti'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Return </a></li>
              <li><a href="<?php echo base_url('bt-mskantis'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Return </a></li> 
               <li><a href="<?php echo base_url('bt-mskantiss'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Return </a></li> 
             <li><a href="<?php echo base_url('bt-cqtrs'); ?>"  target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER Return</a></li>

              <li><a href="<?php echo base_url(); ?>bt-osireportone"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Statement</a></li>
        
              <li><a href="<?php echo base_url(); ?>bt-osireportlist"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -I</a></li>

              <li><a href="<?php echo base_url(); ?>bt-serreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -II</a></li>


               <li><a href="<?php echo base_url(); ?>bt-tempreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Temp Att.</a></li>

          </ul>
        </li>





        <!-- <li <?php //if(base_url().'bt-special-unit' == current_url()) { ?>class="active"  <?php  //} ?>><a href="<?php //echo base_url(); ?>bt-special-unit"><i class="fa fa-angle-double-right"></i> Special Unit</a></li> -->
          
       <?php } ?>
         <?php if($this->session->userdata('nick') == 'Adgp.PAP'){  ?>
          <li><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> View Manpower </a></li>
        <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
        <?php } ?>

        <?php if($this->session->userdata('nick') == 'E3-ADGP'){  ?>
        <li><a href="<?php echo base_url(); ?>bt-quaters-oldl"><i class="fa fa-angle-double-right"></i> View Quater</a></li>
        <?php } ?>


       <?php } ?>
         <?php  if($this->session->userdata('user_log')==2 ){
        ?>
          <?php if($this->session->userdata('nick') == '75th Bn. PAP' || $this->session->userdata('nick') == '27th Bn. PAP' || $this->session->userdata('nick') == '80th Bn. PAP' || $this->session->userdata('nick') == '7th Bn. PAP' ){  ?>

         <li><a href="<?php echo base_url(); ?>bt-riflealr"><i class="fa fa-angle-double-right"></i> View Arms</a></li>
        <li><a href="<?php echo base_url(); ?>bt-ser-ammu"><i class="fa fa-angle-double-right"></i> View Service Ammunition</a></li>
         <li><a href="<?php echo base_url(); ?>bt-p-ammu"><i class="fa fa-angle-double-right"></i> View Pracice Ammunition</a></li>
        <li><a href="<?php echo base_url(); ?>bt-vichele-old"><i class="fa fa-angle-double-right"></i> View Vehicles </a></li>
        <li><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> View Manpower </a></li>
        
        <li><a href="<?php echo base_url(); ?>bt-quaters-oldl"><i class="fa fa-angle-double-right"></i> View Quater</a></li>

         <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
         <?php  if($this->session->userdata('nick') == '7th Bn. PAP' ){ ?>
       <li><a href="<?php echo base_url(); ?>bt-horse-old"><i class="fa fa-angle-double-right"></i> View Horse</a></li>
       <?php } ?>
       
       <?php } ?>


       <?php if($this->session->userdata('nick') == 'RTC.PAP'){  ?>
        <li><a href="<?php echo base_url(); ?>bt-riflealr"><i class="fa fa-angle-double-right"></i> View Arms</a></li>
        <li><a href="<?php echo base_url(); ?>bt-ser-ammu"><i class="fa fa-angle-double-right"></i> View Service Ammunition</a></li>
         <li><a href="<?php echo base_url(); ?>bt-p-ammu"><i class="fa fa-angle-double-right"></i> View Pracice Ammunition</a></li>
        <li><a href="<?php echo base_url(); ?>bt-vichele-old"><i class="fa fa-angle-double-right"></i> View Vehicles </a></li>
        <li><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> View Manpower </a></li>
        <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
        <?php } ?>

        <?php if($this->session->userdata('nick') == 'Cso.PAP'){  ?>
        <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
        <?php } ?>

         <?php if($this->session->userdata('nick') == 'Adgp.PAP'){  ?>
          <li><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> View Manpower </a></li>
        <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
        <?php } ?>

        <?php if($this->session->userdata('nick') == 'E3-ADGP'){  ?>
        <li><a href="<?php echo base_url(); ?>bt-quaters-oldl"><i class="fa fa-angle-double-right"></i> View Quater</a></li>
        <?php } ?>

       
       <?php } ?>

        <?php if($this->session->userdata('user_log') == 11){  ?>
        <li><a href="<?php echo base_url(); ?>bt-vichele-old"><i class="fa fa-angle-double-right"></i> View Vehicles </a></li>
        <?php } ?>


        <?php if($this->session->userdata('user_log') == 12){  ?>
           <li><a href="<?php echo base_url(); ?>bt-riflealr"><i class="fa fa-angle-double-right"></i> View Arms</a></li>
        <li><a href="<?php echo base_url(); ?>bt-ser-ammu"><i class="fa fa-angle-double-right"></i> View Service Ammunition</a></li>
         <li><a href="<?php echo base_url(); ?>bt-p-ammu"><i class="fa fa-angle-double-right"></i> View Pracice Ammunition</a></li>
         <li><a href="<?php echo base_url(); ?>bt-horse-old"><i class="fa fa-angle-double-right"></i> View Horse</a></li>
        <?php } ?>

        <?php if($this->session->userdata('user_log') == 13){  ?>
        <li><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> View Manpower </a></li>
        <?php } ?>

        <?php if($this->session->userdata('user_log') == 14){  ?>
       <li><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> View Material </a></li>
        <li><a href="<?php echo base_url(); ?>bt-vichele-old"><i class="fa fa-angle-double-right"></i> View Vehicles </a></li>
        <li><a href="<?php echo base_url(); ?>bt-quaters-oldl"><i class="fa fa-angle-double-right"></i> View Quater</a></li>
        <?php } ?>

       <?php  if($this->session->userdata('user_log')==3 ){
        ?>
        <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Add</span></a>
          <ul class="children">
            <li <?php if(base_url().'bt-addarmbat' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-addarmbat"><i class="fa fa-angle-double-right"></i> Add Weapon</a></li>

                 <li <?php if(base_url().'bt-add-ammunitionbt' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-ammunitionbt"><i class="fa fa-angle-double-right"></i> Add Ammunition Ser</a></li>

                 <li <?php if(base_url().'bt-add-ammunitionprcbt' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-ammunitionprcbt"><i class="fa fa-angle-double-right"></i> Add Ammunition Prac</a></li>

                 <li <?php if(base_url().'bt-munitionadd' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-munitionadd"><i class="fa fa-angle-double-right"></i>Add Munition Weapon</a></li>

                  <li <?php if(base_url().'bt-add-munitionammu' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-munitionammu"><i class="fa fa-angle-double-right"></i>Add Munition Ammu</a></li>
           </ul>
        </li>

        <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Issue</span></a>
          <ul class="children">
            <li <?php if(base_url().'bt-add-arm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-arm"><i class="fa fa-angle-double-right"></i> Weapon/Ammu</a></li>

                 <li <?php if(base_url().'bt-issueextra' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-issueextra"><i class="fa fa-angle-double-right"></i> Extra Ammunition</a></li>

                 <li <?php if(base_url().'bt-issuemunition' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-issuemunition"><i class="fa fa-angle-double-right"></i>Issue Munition Wep</a></li>

                

           </ul>
        </li>
                 

        <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Deposit</span></a>
          <ul class="children">
                 <li <?php if(base_url().'bt-issuedeposit' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-issuedeposit"><i class="fa fa-angle-double-right"></i> Weapon/Ammu</a></li>
              
                 
              </ul>
        </li>


        <li <?php if(base_url().'bt-import-khc' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-import-khc"><i class="fa fa-angle-double-right"></i> Export Excel</a></li>

        
         <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Nodel Battalion</span></a>
          <ul class="children">
                 
                  <li <?php if(base_url().'bt-nodellistwep' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-nodellistwep"><i class="fa fa-angle-double-right"></i>Weapon/Service Ammu.</a></li>

                  <li <?php if(base_url().'bt-nodeldepositp' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-nodeldepositp"><i class="fa fa-angle-double-right"></i> Practice Ammunition</a></li> 
                                  
              </ul>
        </li>
             
          <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Inspection</span></a>
          <ul class="children">
                 <li <?php if(base_url().'bt-ins-arm' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ins-arm"><i class="fa fa-angle-double-right"></i> Weapons</a></li>

             <li <?php if(base_url().'bt-ins-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ins-ammu"><i class="fa fa-angle-double-right"></i> Ammunition</a></li>

              </ul>
        </li>


                <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Sanction/Remarks</span></a>
          <ul class="children">
                 <li <?php if(base_url().'bt-sammusun' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-sammusun"><i class="fa fa-angle-double-right"></i> Sanction Ammu Ser</a></li>

             <li <?php if(base_url().'bt-pammusun' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-pammusun"><i class="fa fa-angle-double-right"></i> Sanction Ammu Prc</a></li>

             <li <?php if(base_url().'bt-armsun' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-armsun"><i class="fa fa-angle-double-right"></i> Sanction Weapon</a></li>

             <li <?php if(base_url().'bt-armsuni' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-armsuni"><i class="fa fa-angle-double-right"></i> Remarks Weapon</a></li>

             <li <?php if(base_url().'bt-ammuser' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ammuser"><i class="fa fa-angle-double-right"></i> Remarks Service Ammu</a></li>

             <li <?php if(base_url().'bt-ammuper' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ammuper"><i class="fa fa-angle-double-right"></i> Remarks Practice  Ammu</a></li>

             
              </ul>

              
        </li>
             <!-- 
                <li><a href="<?php //echo base_url('bt-weapon-update'); ?>"><i class="fa fa-angle-double-right"></i> Update Weapon</a></li>
                 <li><a href="#"><i class="fa fa-angle-double-right"></i> Inspection</a></li> -->
               

                  <li class="nav-parent  <?php if(base_url().'bt-bkhcarms' == current_url() || base_url().'bt-bkhcammu' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-bkhcarms' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li <?php if(base_url().'bt-bkhcarms' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-bkhcarms"><i class="fa fa-angle-double-right"></i> Weapons</a></li>
          <li <?php if(base_url().'bt-bkhcammus' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-bkhcammus"><i class="fa fa-angle-double-right"></i> <span>Ammunition Ser</span></a></li>
          <li <?php if(base_url().'bt-bkhcammu' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-bkhcammu"><i class="fa fa-angle-double-right"></i> <span>Ammunition Prac</span></a></li>

           <li <?php if(base_url().'bt-bkhcarmsissued' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-bkhcarmsissued"><i class="fa fa-angle-double-right"></i> Issued Weapon/Ammu</a></li>
            <li <?php if(base_url().'bt-depostreport' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-depostreport"><i class="fa fa-angle-double-right"></i>Deposit Weapon/Ammu</a></li>

            <li <?php if(base_url().'bt-depositdesown' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-depositdesown"><i class="fa fa-angle-double-right"></i>Nodel BN Ammu</a></li>

            <li <?php if(base_url().'bt-cawep' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-cawep"><i class="fa fa-angle-double-right"></i>CA weapon report</a></li>
           
          

          </ul>
        </li> 

          <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Return</span></a>
          <ul class="children">
         <li><a href="<?php echo base_url(); ?>bt-weaponlist" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Report </a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulist"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ser Ammu Report</a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulistp"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Prt Ammu Report</a></li>
          
          
          <li><a href="<?php echo base_url(); ?>bt-serannureport" target="_blank"><i class="fa fa-angle-double-right"></i> Service Shell Report </a></li> 
          <li><a href="<?php echo base_url(); ?>bt-pracreport" target="_blank"><i class="fa fa-angle-double-right"></i> Practice Shell Report </a></li>   
          <li><a href="<?php echo base_url(); ?>bt-munitionreport" target="_blank"><i class="fa fa-angle-double-right"></i> Munition Report </a></li> 

          </ul>
        </li> 
       
        <?php
          if($this->session->userdata('userid')== 45){ ?>
             <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Empty Cart deposit</span></a>
          <ul class="children">
             
                 <li <?php if(base_url().'bt-depositdis' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-depositdis"><i class="fa fa-angle-double-right"></i> Deposit by district/unit</a></li>

                 <li <?php if(base_url().'bt-depositdisview' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-depositdisview"><i class="fa fa-angle-double-right"></i> Dist/unit wise report</a></li>
          
          </ul>
        </li>
        <?php  } ?>

       
       
 <li class="nav-parent"><a href="#"> <span><i class="fa fa-angle-double-right"></i>Ammunition Convert</span></a>
          <ul class="children">
             
                 <li <?php if(base_url().'bt-depositdis' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>ammunition/service-to-practice"><i class="fa fa-angle-double-right"></i> Service to Practice</a></li>

                
          
          </ul>
        </li>

        <li <?php if(base_url().'bt-khc-update-weapons' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-khc-update-weapons" target="_blank"><i class="fa fa-angle-double-right"></i><img class="new_option"  src="<?php echo base_url().'webroot/images/photos/new.png'; ?>"> Migrate Weapons</a></li>
        <li><a href="<?php echo base_url(); ?>khc-figures" target="_blank" style="background-color:rgba(119, 0, 255, 1);"><i class="fa fa-angle-double-right"></i>   KHC Weapon Figures</a></li>

       <?php } ?>
       <?php  if($this->session->userdata('user_log')==4 ){
        ?>
                <li <?php if(base_url().'bt-add-manpower' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-manpower"><i class="fa fa-angle-double-right"></i>Add Record</a></li> 

                <li <?php if(base_url().'bt-update-manpower' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-update-manpower"><i class="fa fa-angle-double-right"></i> De Induction</a></li> 
                 

        <li <?php if(base_url().'bt-osisun' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-osisun"><i class="fa fa-angle-double-right"></i> OSI Sanction</a></li>
 
         <li <?php if(base_url().'bt-osi-old' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-osi-old" target="_blank" style="background-color:rgba(119, 0, 255, 1);"><i class="fa fa-angle-double-right"></i>OSI Data &amp; Excel</a></li>  

		 
		   <li class="nav-parent<?php if(base_url().'deployment-statement' == current_url() || base_url().'deployment-statement-consolidated' == current_url() || base_url().'deployment-history' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i>Deployment</span></a>
			 <ul class="children" <?php if(base_url().'deployment-statement' == current_url() || base_url().'deployment-statement-consolidated' == current_url() || base_url().'deployment-history' == current_url()||stripos(current_url(),base_url().'deployment-history-employee')>-1) { ?> style="display: block;"  <?php  } ?>>
             
                 <li <?php if(base_url().'deployment-statement' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>deployment-statement"><i class="fa fa-angle-double-right"></i>Overall Statement</a></li>
				<li <?php if(base_url().'deployment-statement-consolidated' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>deployment-statement-consolidated"><i class="fa fa-angle-double-right"></i>Consolidated Statement</a></li>
				<li <?php if(base_url().'deployment-history' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>deployment-history"><i class="fa fa-angle-double-right"></i>History</a></li>
				<?php if(stripos(current_url(),base_url().'deployment-history-employee')>-1){ ?>
				<li <?php if(stripos(current_url(),base_url().'deployment-history-employee')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url();?>"><i class="fa fa-angle-double-right"></i>Deployment History</a></li>
				<?php } ?>
          </ul>
        </li>
			<li class="nav-parent<?php if(base_url().'add-employees-posting' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i>Employee Posting</span></a>
			 <ul class="children" <?php if(base_url().'add-employees-posting' == current_url()) { ?> style="display: block;"  <?php  } ?>>
             
                 <li <?php if(base_url().'add-employees-posting' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>add-employees-posting"><i class="fa fa-angle-double-right"></i>Add Posting</a></li>
				
				
				
          </ul>
        </li>
      

            <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-osi-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>

          <?php if($this->session->userdata('userid') == 74 || $this->session->userdata('userid') == 60 || $this->session->userdata('userid') == 93  || $this->session->userdata('userid') == 213){  ?>
          <li <?php if(base_url().'bt-rtc' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-rtc"><i class="fa fa-angle-double-right"></i> <span>Permanent Man Power</span></a></li>
            <?php if($this->session->userdata('userid') == 74){ ?>
             <li <?php if(base_url().'bt-rtctemp' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-rtctemp"><i class="fa fa-angle-double-right"></i> <span>Temporary Man Power</span></a></li>
             <?php } ?>

             <?php if($this->session->userdata('userid') == 60 ){ ?>
              <li <?php if(base_url().'bt-controltemp' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-controltemp"><i class="fa fa-angle-double-right"></i> <span>Temporary Man Power</span></a></li>
              <?php } ?>

              <?php if($this->session->userdata('userid') == 93 ){ ?>
              <li <?php if(base_url().'bt-csotemp' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-csotemp"><i class="fa fa-angle-double-right"></i> <span>Temporary Man Power</span></a></li>
              <?php } ?>

             
             <!-- <li <?php //if(base_url().'bt-postingfilter' == current_url()) { ?>class="active"  <?php // } ?>><a href="<?php //echo base_url(); ?>bt-postingfilter"><i class="fa fa-angle-double-right"></i> <span>Posting View</span></a></li> -->
              <li <?php if(base_url().'bt-updatemanpowerlist' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-updatemanpowerlist"><i class="fa fa-angle-double-right"></i> De Induction</a></li> 

                <li <?php if(base_url().'bt-import-osi' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-import-osi"><i class="fa fa-angle-double-right"></i> Export OSI data</a></li>

                <li <?php if(base_url().'bt-import-osiss' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-import-osiss"><i class="fa fa-angle-double-right"></i> Export Posting data</a></li> 
                
          <?php }else{ ?>
            <li <?php if(base_url().'bt-osi-old' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-osi-old"><i class="fa fa-angle-double-right"></i> <span>Man Power</span></a></li>
            
               <!-- <li <?php //if(base_url().'bt-postingfilter' == current_url()) { ?>class="active"  <?php // } ?>><a href="<?php //echo base_url(); ?>bt-postingfilter"><i class="fa fa-angle-double-right"></i> <span>Posting View</span></a></li> -->

             <li <?php if(base_url().'bt-updatemanpowerlist' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-updatemanpowerlist"><i class="fa fa-angle-double-right"></i> De Induction</a></li> 

             <li <?php if(base_url().'bt-import-osi' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-import-osi"><i class="fa fa-angle-double-right"></i> Export OSI data</a></li> 

             <li <?php if(base_url().'bt-import-osiss' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-import-osiss"><i class="fa fa-angle-double-right"></i> Export Posting data</a></li>
       
          <?php } ?>

            
           
          </ul>
        </li>


           <li class="nav-parent  <?php if(base_url().'bt-horse-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Return</span></a>
          <ul class="children"  <?php if(base_url().'bt-horse-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
           <li><a href="<?php echo base_url(); ?>bt-osireportone"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Statement</a></li>
           
            
              <li><a href="<?php echo base_url(); ?>bt-osireportlist"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -I</a></li>

              <li><a href="<?php echo base_url(); ?>bt-serreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -II</a></li>

               <li><a href="<?php echo base_url(); ?>bt-tempreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Temp Att.</a></li>
          </ul>
        </li>




       <?php } ?>

       <?php  if($this->session->userdata('user_log')==5 ){
        ?>
         <li <?php if(base_url().'bt-add-material' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-material"><i class="fa fa-angle-double-right"></i> Add Material</a></li>
              
              <li <?php if(base_url().'bt-alot-pmaterial' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-alot-pmaterial"><i class="fa fa-angle-double-right"></i> Issue Material</a></li>
		 <li <?php if(base_url().'bt-msk-oldissued' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-msk-oldissued"><i class="fa fa-angle-double-right"></i> <span>Deposit Material</span></a></li>
       <li <?php if(base_url().'bt-msksun' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-msksun"><i class="fa fa-angle-double-right"></i> MSK Sanction</a></li> 

       

                 <li class="nav-parent  <?php if(base_url().'bt-msk-old' == current_url() || base_url().'bt-msk-oldissued' == current_url() || base_url().'equipment-figures' == current_url() || base_url().'bt-condemlistmsk' == current_url() || base_url().'bt-msk-olddatadeposit' == current_url() || base_url().'bt-condemlistmskaction' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-msk-old' == current_url()|| base_url().'bt-msk-oldissued' == current_url()  || base_url().'equipment-figures' == current_url()|| base_url().'bt-condemlistmsk' == current_url() || base_url().'bt-msk-olddatadeposit' == current_url() || base_url().'bt-condemlistmskaction' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-msk-old' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-msk-old"><i class="fa fa-angle-double-right"></i> <span>Total Material</span></a></li> 

            <li <?php if(base_url().'bt-msk-oldissued' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-msk-oldissued"><i class="fa fa-angle-double-right"></i> <span>Issued Material</span></a></li> 
              <li <?php if(base_url().'bt-condemlistmsk' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-condemlistmsk"><i class="fa fa-angle-double-right"></i> <span> Condem Material </span></a></li> 
		<?php if(false){ ?>
              <li <?php if(base_url().'bt-mskqunlist' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mskqunlist"><i class="fa fa-angle-double-right"></i> <span> Current Material </span></a></li> 
		<?php }else{ ?>
				<li <?php if(base_url().'equipment-figures'==current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>equipment-figures"><i class="fa fa-angle-double-right"></i> <span> Current Material </span></a></li> 
             <li <?php if(base_url().'bt-msk-olddatadeposit' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-msk-olddatadeposit"><i class="fa fa-angle-double-right"></i> <span>Deposit Material</span></a></li> 
		<?php } ?>

              <li <?php if(base_url().'bt-condemlistmskaction' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-condemlistmskaction"><i class="fa fa-angle-double-right"></i> <span> Auction Material </span></a></li> 
              
            
          </ul>
        </li>

                 <li class="nav-parent  <?php if(base_url().'bt-horse-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Return</span></a>
          <ul class="children"  <?php if(base_url().'bt-horse-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
		  
       <?php if(true){ ?>
       <li><a href="<?php echo base_url(); ?>bt-mskanti" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Report </a></li>
              <li><a href="<?php echo base_url(); ?>bt-mskantis" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Report </a></li> 
               <li><a href="<?php echo base_url(); ?>bt-mskantiss" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Report </a></li> 
          
	   <?php }else{ ?>
	   	 <li><a href="<?php echo base_url(); ?>equipment-figures" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Report </a></li>
       <li><a href="<?php echo base_url(); ?>equipment-figures" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Report </a></li> 
       <li><a href="<?php echo base_url(); ?>equipment-figures" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Report </a></li> 
      <?php } ?>
          </ul>
        </li>	
        <li><a href="<?php echo base_url(); ?>equipment-figures" target="_blank" <?php if(base_url().'equipment-figures' == current_url()) { $color="rgba(54,91,133,1)"; }else{ $color="rgba(119, 0, 255, 1)";} ?>style="background-color:<?php echo $color; ?>;"><i class="fa fa-angle-double-right"></i> MSK Figure View </a> </li>

    
       <?php } ?>



       <?php  if($this->session->userdata('user_log')==6 ){
        ?>
        <li <?php if(base_url().'bt-add-vehicle' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-vehicle"><i class="fa fa-angle-double-right"></i> Add Vehicle</a></li>
            

        <li <?php if(base_url().'bt-issue-vehicle' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-issue-vehicle"><i class="fa fa-angle-double-right"></i> Duty Update</a></li>

          <li <?php if(base_url().'bt-vichele-viewdata' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-vichele-viewdata"><i class="fa fa-angle-double-right"></i> Update Profile</a></li>

	<li <?php if(base_url().'mt-figure-view' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>mt-figure-view"><i class="fa fa-angle-double-right"></i><img class="new_option"  src="<?php echo base_url().'webroot/images/photos/new.png'; ?>"> Figure View</a></li>


                <li class="nav-parent  <?php if(base_url().'bt-vichele-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-vichele-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-vichele-old' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-vichele-old"><i class="fa fa-angle-double-right"></i> <span>Vehicles </span></a></li> 

            <li <?php if(base_url().'bt-update-vechile' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-update-vechile"><i class="fa fa-angle-double-right"></i> <span> Deinduction Report </span></a></li> 
      
             
          </ul>
        </li>

              <li <?php if(base_url().'bt-ins-vic' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-ins-vic"><i class="fa fa-angle-double-right"></i> Inspection/Service</a></li>

        <li <?php if(base_url().'bt-vicheldein' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-vicheldein"><i class="fa fa-angle-double-right"></i> Deinduction</a></li>

        <li <?php if(base_url().'bt-pol-viewlist' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-pol-viewlist"><i class="fa fa-angle-double-right"></i> POL Update</a></li>

        <li <?php if(base_url().'bt-add-mrepair' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-mrepair"><i class="fa fa-angle-double-right"></i> Add Repair</a></li>

          <li <?php if(base_url().'bt-mtosun' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mtosun"><i class="fa fa-angle-double-right"></i> MT Sanction</a></li>


             <li class="nav-parent  <?php if(base_url().'bt-horse-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Return</span></a>
          <ul class="children"  <?php if(base_url().'bt-horse-old' == current_url() || base_url().'mt-figure-view' == current_url()) { ?> style="display: block;"  <?php  } ?>>
        <li <?php if(base_url().'bt-ckhcarms' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mtoreporttwopp" target="_blank"><i class="fa fa-angle-double-right"></i> <span>MTO Report</span></a></li>
         <li <?php if(base_url().'bt-mtoreporttwospolselect' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mtoreporttwospolselect"  target="_blank"><i class="fa fa-angle-double-right"></i> <span>POL  Report</span></a></li> 
		 <li <?php if(base_url().'mt-figure-view' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>mt-figure-view"><i class="fa fa-angle-double-right"></i><img class="new_option"  src="<?php echo base_url().'webroot/images/photos/new.png'; ?>"> Figure View</a></li>
          </ul>
        </li>

       <?php } ?>

        <?php  if($this->session->userdata('user_log')==7 ){
        ?>
        <li <?php if(base_url().'bt-add-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-horse"><i class="fa fa-angle-double-right"></i> <span> Acquisition Horses</span></a></li> 

        <li <?php if(base_url().'bt-alot-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-alot-horse"><i class="fa fa-angle-double-right"></i> <span> Allot  Horses</span></a></li>

             
    
       <li <?php if(base_url().'bt-horse-helth' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-horse-helth"><i class="fa fa-angle-double-right"></i> Health Checkup</a></li>

       <li <?php if(base_url().'bt-horse-dein' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-horse-dein"><i class="fa fa-angle-double-right"></i> deinduction</a></li>


           <li class="nav-parent  <?php if(base_url().'bt-view-horse' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-view-horse' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-view-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-view-horse"><i class="fa fa-angle-double-right"></i> <span>View all Horse </span></a></li> 
            <li <?php if(base_url().'bt-view-alot-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-view-alot-horse"><i class="fa fa-angle-double-right"></i> <span>View Alot Horse </span></a></li>

            <li <?php if(base_url().'bt-horse-deinview' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-horse-deinview"><i class="fa fa-angle-double-right"></i> Deinduction list</a></li>

          </ul>
        </li>

       <?php } ?>

       <?php  if($this->session->userdata('user_log')==8 ){
        ?>
        <li <?php if(base_url().'bt-add-quater' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-add-quater"><i class="fa fa-angle-double-right"></i><span> Add Quarter Info</span></a></li> 


         <li <?php if(base_url().'bt-alot-quater' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-alot-quater"><i class="fa fa-angle-double-right"></i> Allot Quarter</a></li>

         <li <?php if(base_url().'bt-update-quater' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-update-quater"><i class="fa fa-angle-double-right"></i> Update Quarter</a></li>

         <li <?php if(base_url().'bt-evo-quater' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-evo-quater"><i class="fa fa-angle-double-right"></i> Evacuation Quarter</a></li>

             <li class="nav-parent  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-quaters-oldl"><i class="fa fa-angle-double-right"></i> <span>Quarter</span></a></li> 
            
             
          </ul>
        </li>

        <li class="nav-parent  <?php if(base_url().'bt-horse-old' == current_url() || base_url().'quarters' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Return</span></a>
		
          <ul class="children"  <?php if(base_url().'bt-horse-old' == current_url() || base_url().'quarters' == current_url()) { ?> style="display: block;"  <?php  } ?>>
         <li><a href="<?php echo base_url(); ?>bt-cqtrs"  target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER Report</a></li>
		  <li <?php if(base_url().'quarters' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>quarters"><i class="fa fa-angle-double-right"></i> <span>Figure View</span></a></li>
          </ul>
        </li>
		 <li <?php if(base_url().'quarters' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>quarters"><i class="fa fa-angle-double-right"></i> <span>Figure View</span></a></li> 
       <?php } ?>


       <?php  if($this->session->userdata('user_log')==9 ){
        ?>
 <li <?php if(base_url().'bt-view-paparm' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-view-paparm"><i class="fa fa-angle-double-right"></i> View arms</a></li>
        
 <li <?php if(base_url().'bt-pap-vehicle' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-pap-vehicle"><i class="fa fa-angle-double-right"></i> View vehicle</a></li>
 <?php } ?>
          <?php  if($this->session->userdata('user_log')==10){  //account branch
        ?>
 <li <?php if(base_url().'accounts' == current_url() || base_url().'accounts-add-bill' == current_url() || (stripos(current_url(),base_url().'accounts-edit-bill')>-1)) { ?>class="nav-parent active"  <?php  } ?>><a href="<?php echo base_url(); ?>accounts"><i class="fa fa-angle-double-right"></i> Accounts</a>
    <ul class="children"  <?php if(base_url().'accounts' == current_url() || base_url().'accounts-add-bill' == current_url() || (stripos(current_url(),base_url().'accounts-edit-bill')>-1)) { ?> style="display: block;"  <?php  } ?>>
            <li <?php if(base_url().'accounts' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>accounts"><i class="fa fa-angle-double-right"></i> <span>List </span></a></li> 

            <li <?php if(base_url().'accounts-add-bill' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>accounts-add-bill"><i class="fa fa-angle-double-right"></i> <span> Add Bill </span></a></li> 
      
      <?php if(stripos(current_url(),base_url().'accounts-edit-bill')>-1){ ?>
      <li <?php if(stripos(current_url(),base_url().'accounts-edit-bill')>-1) { ?>class="active"  <?php  } ?>><a href="<?php echo current_url();?>"><i class="fa fa-angle-double-right"></i>Edit Bill</a></li>
      <?php } ?>
      
        </ul>
  </li>
 <?php } ?>

        <?php  if($this->session->userdata('user_log')== 100 ){
        ?>
		
       <li><a href="<?php echo base_url(); ?>bt-all-reports"><i class="fa fa-angle-double-right"></i> PAP/IRB/CDO BNS</a></li>

       <li class="nav-parent  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Returns</span></a>
          <ul class="children"  <?php if(base_url().'bt-quaters-oldl' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li><a href="<?php echo base_url(); ?>bt-all-ipwepreport" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Return </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-all-ipserreport"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ser Ammu Return</a></li>
          <li><a href="<?php echo base_url(); ?>bt-all-ipprcreport"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Prt Ammu Return</a></li>
         
            <li><a href="<?php echo base_url(); ?>bt-all-ipmtreport" target="_blank"><i class="fa fa-angle-double-right"></i> <span>MTO Return</span></a></li>
             <li><a href="<?php echo base_url('bt-all-ipmsoreport'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Return </a></li>
              <li><a href="<?php echo base_url('bt-all-ipmstreport'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Return </a></li> 
               <li><a href="<?php echo base_url('bt-all-ipmsthreport'); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Return </a></li> 
             <li><a href="<?php echo base_url('bt-all-ipqtrreport'); ?>"  target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER Return</a></li>

              <li><a href="<?php echo base_url(); ?>bt-all-iposifrreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Statement</a></li>
        
              <?php if(false){ ?><li><a href="<?php echo base_url(); ?>bt-all-iposioreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -I</a></li>

              <li><a href="<?php echo base_url(); ?>bt-all-ipositreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -II</a></li>

               <li><a href="<?php echo base_url(); ?>bt-all-iposithreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Temp Att.</a></li>
               <?php } ?>
          </ul>
        </li>



        <li><a href="<?php echo base_url(); ?>equipment-figures" target="_blank" style="background-color:rgba(70, 0, 25, 1);"><i class="fa fa-angle-double-right"></i> MSK Figure View</a></li>
        <!--li><a href="<?php //echo base_url(); ?>bt-khc?show_status=&orderno=&issued=&report=1"><i class="fa fa-angle-double-right"></i> KHC Figure View</a></li-->
        <li><a href="<?php //echo base_url(); ?>khc-figures" target="_blank" style="background-color:rgba(119, 0, 255, 1);"><i class="fa fa-angle-double-right"></i> KHC Figure View</a></li>
        <li><a href="<?php echo base_url(); ?>mt-figure-view" target="_blank" style="background-color:rgba(70, 0, 25, 1);"><i class="fa fa-angle-double-right"></i> MT Figure View</a></li>
        <li><a href="<?php echo base_url(); ?>quarters" target="_blank" style="background-color:rgba(119, 0, 255, 1);"><i class="fa fa-angle-double-right"></i> Quater Figure View</a></li>
      <!--li> <li><a href="<?php echo base_url(); ?>-"><i class="fa fa-angle-double-right"></i> OSI Figure View</a></li><li-->
      <?php if(false){ ?><li><a href="<?php echo base_url(); ?>user-excel-data"><i class="fa fa-angle-double-right"></i> Export OSI Excel</a></li><?php } ?>
      <li><a href="<?php echo base_url(); ?>bt-osi-old"target="_blank" style="background-color:rgba(119, 0, 25, 1);"><i class="fa fa-angle-double-right"></i> OSI Consolidate Data</a></li>
	  
		 <li><a href="<?php echo base_url(); ?>deployment-statement"target="_blank" style="background-color:rgba(119, 0, 25, 1);"><i class="fa fa-angle-double-right"></i>Deployment</a></li>
       <?php } ?>

       <?php  if(base_url().'bt-ser-ammui' == current_url() || base_url().'bt-p-ammui' == current_url() || base_url().'bt-riflealrs' == current_url()){
        ?>
         <li <?php if(base_url().'bt-riflealrs' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-riflealrs"><i class="fa fa-angle-double-right"></i> Weapons</a></li>
         <li <?php if(base_url().'bt-p-ammui' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-p-ammui"><i class="fa fa-angle-double-right"></i> Practice Ammunition</a></li>

       <li <?php if(base_url().'bt-ser-ammui' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-ser-ammui"><i class="fa fa-angle-double-right"></i> <span>Service Ammunition</span></a></li> 
            

    <?php } }?>

     <?php  if($this->session->userdata('user_log')== 101){
        ?>
         <li <?php if(base_url().'bt-mskqunlistadmin' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mskqunlistadmin"><i class="fa fa-angle-double-right"></i> Msk Quantity </a></li>
      <?php } ?>
      <li><a href="<?php echo base_url();?>logout"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li><br/>
    <li <?php if(base_url().'bt-password' == current_url()) { ?>class="active"  <?php  } ?> 
      ><a href="<?php echo base_url(); ?>bt-password" style="background:#667C2F !important; color:#fff;"><i class="fa fa-angle-double-right"></i> Reset Password</a></li>
     <li><a href="<?php echo base_url();?>bt-helpdesk"  style="background:#667C2F !important; color:#fff;"><i class="fa fa-angle-double-right"></i> <span>Helpdesk</span></a></li>
     <li><a href="#" style="background:#667C2F !important; color:#fff;"><i class="fa fa-angle-double-right"></i> <span>FAQ</span></a></li><hr/>
 
      </ul>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

