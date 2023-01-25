
             <li><a href="<?php echo base_url(); ?>bt-mtoreportone"><i class="fa fa-angle-double-right"></i> MTO Report-I</a></li> <li><a href="<?php echo base_url(); ?>bt-mskreportone"><i class="fa fa-angle-double-right"></i> MSK Report-I</a></li>

            <li><a href="<?php echo base_url(); ?>bt-osireportone"><i class="fa fa-angle-double-right"></i> OSI Report-I</a></li>

             <li><a href="<?php echo base_url(); ?>bt-qtrreportone"><i class="fa fa-angle-double-right"></i> Quarter Report-I</a></li>

             
            <li><a href="<?php echo base_url(); ?>bt-weaponlist" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Report </a></li>
            <li><a href="<?php echo base_url(); ?>bt-ammulist" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ammunition Service Report </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-ammulistp" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ammunition Practice Report </a></li>             
            <li><a href="<?php echo base_url(); ?>bt-cmsk" target="_blank"><i class="fa fa-angle-double-right"></i> MSK </a></li>
                <?php if($this->session->userdata('nick') == '7th Bn. PAP'){ ?>
              <li><a href="<?php echo base_url(); ?>bt-hor-report"><i class="fa fa-angle-double-right"></i> Horse Report</a></li> <?php } ?>



              
             <li <?php if(base_url().'bt-deposit-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-ammu"><i class="fa fa-angle-double-right"></i> Deposit Ammunition</a></li>
                 <li <?php if(base_url().'bt-ammu-weapon-con' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ammu-weapon-con"><i class="fa fa-angle-double-right"></i> Update Ammunition</a></li>
                 <li <?php if(base_url().'bt-ins-ammu' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ins-ammu"><i class="fa fa-angle-double-right"></i> Inspection </a></li> 


                  <li><a href="<?php echo base_url(); ?>bt-allquantityreports" target="_blank"><i class="fa fa-angle-double-right"></i> All Modules Report </a></li>


                               <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-osi-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          

          <li><a href="<?php echo base_url(); ?>bt-weaponlist" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Report </a></li> 
          <li><a href="<?php echo base_url(); ?>bt-ammulist"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ser Ammu Report</a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulistp"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Prt Ammu Report</a></li>          
            <li <?php if(base_url().'bt-ckhcarms' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-mtoreporttwos" target="_blank"><i class="fa fa-angle-double-right"></i> <span>MTO Report</span></a></li>
             <li><a href="<?php echo base_url(); ?>bt-mskanti" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Report </a></li>
              <li><a href="<?php echo base_url(); ?>bt-mskantis" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Report </a></li> 
               <li><a href="<?php echo base_url(); ?>bt-mskantiss" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Report </a></li> 
             <li><a href="<?php echo base_url(); ?>bt-cqtrs"  target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER Report</a></li>
              <li><a href="<?php echo base_url(); ?>bt-osireportone"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Statement</a></li>

              <li><a href="<?php echo base_url(); ?>bt-osireportlist"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -I</a></li>

              <li><a href="<?php echo base_url(); ?>bt-serreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Sec Cover -II</a></li>

               <li><a href="<?php echo base_url(); ?>bt-tempreport"  target="_blank"><i class="fa fa-angle-double-right"></i> OSI Temp Att.</a></li>
             
          </ul>
        </li>



          <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Covering Letters</span></a>
          <ul class="children"  <?php if(base_url().'bt-osi-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li><a href="<?php echo base_url(); ?>bt-armdgp" target="_blank"><i class="fa fa-angle-double-right"></i> Arms Retrun DGP</a></li>

          <li><a href="<?php echo base_url(); ?>bt-armaadgp"  target="_blank"><i class="fa fa-angle-double-right"></i>Arms Return ADGP</a></li>
          <li><a href="<?php echo base_url(); ?>bt-cartage"  target="_blank"><i class="fa fa-angle-double-right"></i> Empty Cartridge Return</a></li>
          <li><a href="<?php echo base_url(); ?>bt-munintion" target="_blank"><i class="fa fa-angle-double-right"></i> Munition Return </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-cpomt" target="_blank"><i class="fa fa-angle-double-right"></i> <span>CPO MT Return</span></a></li>
             <li><a href="<?php echo base_url(); ?>bt-mt" target="_blank"><i class="fa fa-angle-double-right"></i> MT Return ADGP </a></li>
              <li><a href="<?php echo base_url(); ?>bt-mtdgp" target="_blank"><i class="fa fa-angle-double-right"></i> MT Return DGP</a></li> 
               <li><a href="<?php echo base_url(); ?>bt-qt" target="_blank"><i class="fa fa-angle-double-right"></i> QTR_Return </a></li> 
             <li><a href="<?php echo base_url(); ?>bt-msk"  target="_blank"><i class="fa fa-angle-double-right"></i> MSK Return</a></li>

             <li <?php if(base_url().'bt-deposit-arm' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-arm"><i class="fa fa-angle-double-right"></i> Deposit Weapon</a></li>
                <li <?php if(base_url().'bt-weapon-con' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-weapon-con"><i class="fa fa-angle-double-right"></i> Update Weapon</a></li>
                 <li <?php if(base_url().'bt-ins-arm' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-ins-arm"><i class="fa fa-angle-double-right"></i> Inspection</a></li>
                
              
             
          </ul>
        </li>
                   


                    <li class="nav-parent  <?php if(base_url().'bt-papall' == current_url() || base_url().'bt-all-reportpap' == current_url() || base_url().'bt-ser-ammui' == current_url() || base_url().'bt-p-ammui' == current_url() || base_url().'bt-riflealrs' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> PAP</span></a>
          <ul class="children"  <?php if(base_url().'bt-papall' == current_url() || base_url().'bt-all-reportpap' == current_url() || base_url().'bt-ser-ammui' == current_url() || base_url().'bt-p-ammui' == current_url() || base_url().'bt-riflealrs' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li <?php if(base_url().'bt-papall' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-papall"><i class="fa fa-angle-double-right"></i> ALL - PAP BNS</a></li>
             <li <?php if(base_url().'bt-all-reportpap' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-all-reportpap"><i class="fa fa-angle-double-right"></i> PAP BNS</a></li>
              
          </ul>
        </li>


        
             <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Reports</span></a>
          <ul class="children"  <?php if(base_url().'bt-osi-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
         
          <li><a href="<?php echo base_url(); ?>bt-weaponlistipg" target="_blank"><i class="fa fa-angle-double-right"></i> KHC Weapon Report </a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulistigp"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Ser Ammu Report</a></li>
          <li><a href="<?php echo base_url(); ?>bt-ammulistpigp"  target="_blank"><i class="fa fa-angle-double-right"></i> KHC Prt Ammu Report</a></li>
           
            <li><a href="<?php echo base_url(); ?>bt-mtoreporttwosigp" target="_blank"><i class="fa fa-angle-double-right"></i> <span>MTO Report</span></a></li>
             <li><a href="<?php //echo base_url(); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK Report </a></li>
              <li><a href="<?php //echo base_url(); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK II Report </a></li> 
               <li><a href="<?php //echo base_url(); ?>" target="_blank"><i class="fa fa-angle-double-right"></i> MSK III Report </a></li> 
             <li><a href="<?php echo base_url(); ?>bt-cqtrsigp"  target="_blank"><i class="fa fa-angle-double-right"></i> QUARTER Report</a></li>
              
             
          </ul>
        </li>


          <li class="nav-parent  <?php if(base_url().'bt-osi-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Covering Letters</span></a>
          <ul class="children"  <?php if(base_url().'bt-osi-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li><a href="<?php echo base_url(); ?>bt-armdgp" target="_blank"><i class="fa fa-angle-double-right"></i> Arms Retrun DGP</a></li>
          <li><a href="<?php echo base_url(); ?>bt-armaadgp"  target="_blank"><i class="fa fa-angle-double-right"></i>Arms Return ADGP</a></li>
          <li><a href="<?php echo base_url(); ?>bt-cartage"  target="_blank"><i class="fa fa-angle-double-right"></i> Empty Cartridge Return</a></li>
          <li><a href="<?php echo base_url(); ?>bt-munintion" target="_blank"><i class="fa fa-angle-double-right"></i> Munition Return </a></li> 
            <li><a href="<?php echo base_url(); ?>bt-cpomt" target="_blank"><i class="fa fa-angle-double-right"></i> <span>CPO MT Return</span></a></li>
             <li><a href="<?php echo base_url(); ?>bt-mt" target="_blank"><i class="fa fa-angle-double-right"></i> MT Return ADGP </a></li>
              <li><a href="<?php echo base_url(); ?>bt-mtdgp" target="_blank"><i class="fa fa-angle-double-right"></i> MT Return DGP</a></li> 
               <li><a href="<?php echo base_url(); ?>bt-qt" target="_blank"><i class="fa fa-angle-double-right"></i> QTR_Return </a></li> 
             <li><a href="<?php echo base_url(); ?>bt-msk"  target="_blank"><i class="fa fa-angle-double-right"></i> MSK Return</a></li>
              
             
          </ul>
        </li>




        <li <?php if(base_url().'bt-all-reports' == current_url() || base_url().'bt-khc' == current_url() || base_url().'bt-osi-oldall' == current_url() || base_url().'bt-msk-oldall' == current_url() || base_url().'bt-vichele-oldall' == current_url() || base_url().'bt-horse-olds' == current_url() ||  base_url().'bt-quaters-olds' == current_url() || base_url().'bt-khc-ammu' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-all-reports"><i class="fa fa-angle-double-right"></i> PAP BNs</a></li>

         <li class="nav-parent  <?php if(base_url().'bt-allirb' == current_url() || base_url().'bt-irb' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> IRB</span></a>
          <ul class="children"  <?php if(base_url().'bt-allirb' == current_url() || base_url().'bt-irb' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li <?php if(base_url().'bt-allirb' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>bt-allirb"><i class="fa fa-angle-double-right"></i> ALL IRB BNS</a></li>

             <li <?php if(base_url().'bt-irb' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-irb"><i class="fa fa-angle-double-right"></i> IRB BNS</a></li>
              
          </ul>
        </li>
       
         <li class="nav-parent  <?php if(base_url().'bt-allcdo' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> CDO</span></a>
          <ul class="children"  <?php if(base_url().'bt-allcdo' == current_url() || base_url().'bt-cdo' == current_url()) { ?> style="display: block;"  <?php  } ?>>
          <li <?php if(base_url().'bt-allcdo' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url();?>bt-allcdo"><i class="fa fa-angle-double-right"></i> ALL CDO BNS</a></li>

             <li <?php if(base_url().'bt-cdo' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-cdo"><i class="fa fa-angle-double-right"></i> CDO BNS</a></li>
              
          </ul>
        </li>
           <li <?php if(base_url().'bt-special-unit' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-special-unit"><i class="fa fa-angle-double-right"></i> Special Unit</a></li><hr/>


           <li <?php if(base_url().'bt-deposit-horse' == current_url()) { ?> class="active" <?php  } ?>><a href="<?php echo base_url(); ?>bt-deposit-horse"><i class="fa fa-angle-double-right"></i> Deposit Horse</a></li>
          
           <li <?php if(base_url().'bt-update-horse' == current_url()) { ?>class="active"  <?php  } ?>><a href="<?php echo base_url(); ?>bt-update-horse"><i class="fa fa-angle-double-right"></i> Update Horse Info</a></li>



             <li class="nav-parent  <?php if(base_url().'bt-horse-old' == current_url()) { ?> nav-active active  <?php  } ?>"><a href="#"> <span><i class="fa fa-angle-double-right"></i> Deployment</span></a>
          <ul class="children"  <?php if(base_url().'bt-horse-old' == current_url()) { ?> style="display: block;"  <?php  } ?>>
           <li><a href="<?php echo base_url(); ?>bt-osifoni"  target="_blank"><i class="fa fa-angle-double-right"></i> F Order not issued</a></li>
           
              <li><a href="<?php echo base_url(); ?>bt-osipfpp"  target="_blank"><i class="fa fa-angle-double-right"></i> Posted for pay purpose</a></li>

              <li><a href="<?php echo base_url(); ?>bt-osi-nor"  target="_blank"><i class="fa fa-angle-double-right"></i> Not reported</a></li>

               <li><a href="<?php echo base_url(); ?>bt-osi-nord"  target="_blank"><i class="fa fa-angle-double-right"></i> Not relieved</a></li>

                <li><a href="<?php echo base_url(); ?>bt-osi-ea"  target="_blank"><i class="fa fa-angle-double-right"></i> Excess Attached</a></li>

                <li><a href="<?php echo base_url(); ?>bt-osi-vac"  target="_blank"><i class="fa fa-angle-double-right"></i> Vacancies</a></li>
          </ul>
        </li> 
