<?php //sleep(1200);  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> ManPower Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
<?php $this->load->view('Btalion/html/navbar'); ?>
  <div class="mainpanel">
<?php $this->load->view('Btalion/html/headbar'); ?>
    <div class="pageheader">
      <h3> &nbsp; &nbsp;  ManPower Report</h3>
    </div>

    <div class="contentpanel">  
      <div class="row">
        <div class="col-sm-12">
       <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible" id="warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
</div>
      <?php  endif; ?>
    <div class="panel panel-default">
        
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h3>Total Records: <?php echo count($weapon); ?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
              <th>S.No</th>
              <th>View All Info</th>
              <th>Battalion</th>
              <th>Name</th>
              <th>Present Rank</th>
              <th>Dept. No </th>
              <th>District</th>      
              <th>Gender</th>
              <th>Marital Status</th>
              <th>Date of Birth</th>
              <th>Date of Enlistment</th>
              <th>Caste</th>
              <th>Category</th>
              <th>Phone1</th>
              <th>Blood Group</th>
              <th> Education/ Qualified</th>
              <th>Computer literate</th>
              <th>Qualified Courses</th>
              <th>Date of Retirement</th>
              <th>Extension Retirement Date</th>
              <th>Bank AC No.</th>
              <th>Height</th>
              <th>GPF Pol No /PRAN No.</th>
              <th>Good entries</th>
              <th>Bad entries</th>
              <th>Posting Details</th>
              <th>Date of Posting</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                
                    <td> 
                    <a href="<?php echo base_url('bt-osiinfo/'.$value->man_id); ?>" class="btn btn-success btn-xs" target="_blank"> <i class="fa fa-eye"></i> View</a>
                     </td>
                     <td><?php $batname = fetchoneinfodesc('users',array('users_id' => $value->bat_id ),'users_id'); echo $batname->nick; ?></td>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    <td><?php echo $value->district; ?></td>
                    <td><?php echo $value->gender; ?></td>
                    <td><?php echo $value->maritalstatus; ?></td>
                    <td><?php $db =  date('d-m-Y',strtotime($value->dateofbith)); if($db == '01-01-1970'){echo '-';}else{echo $db;} ?></td>
                    <td><?php $dde =  date('d-m-Y',strtotime($value->dateofinlitment)); if($dde == '01-01-1970'){echo'-';}else{ echo $dde;} ?> </td>
                    <td><?php echo $value->caste; ?></td>
                    <td><?php echo $value->category; ?></td>
                    <td><?php echo $value->phono1; ?></td>
                     <td><?php echo $value->bloodgroup; ?></td>
                    <td><?php echo $value->eduqalification; ?> &nbsp; <?php echo $value->UnderGraduate.$value->Graduate.$value->PostGraduate.$value->Doctorate.$value->Doctorateother; ?></td>  
                    <td><?php echo $value->comlit; ?></td> 
                    <td><?php $ax = explode('@', $value->NamesofsCourses);
                           echo count($ax);  ?></td>
                    <td><?php echo $value->dateofretirment; ?></td>
                    <td>-</td>

                    <td><?php echo $value->bankacno; ?></td>
                   <td><?php echo $value->feet."'".$value->inch."''"; ?></td>
                   
                    <td><?php echo $value->gpfpranno; ?> &nbsp; <?php echo $value->PRAN; ?></td>
                    <td><?php echo $value->gd1; ?></td>
                    <td><?php echo $value->bd1; ?></td>
                    <?php $pos = fetchoneinfodesc('newosip',array('man_id' => $value->man_id ),'man_id'); ?>
                                 
                   <?php   if($pos !=''){ ?> 
                         <td><?php  echo $pos->fone1.$pos->vploc.$pos->vpdis.$pos->fone2.$pos->noj.$pos->jsdis.$pos->fone3.$pos->fone3.$pos->fone4.$pos->fone5.$pos->osgloc.$pos->osgdis.$pos->fone6.$pos->fone7.$pos->fone8.$pos->fone9.$pos->bsdnob.$pos->bsddis.$pos->bsdloc.$pos->fone10.$pos->fone11.$pos->fone12.$pos->lone1.$pos->perdupod.$pos->perdudis.$pos->perduorno.$pos->perduordate.$pos->lone2.$pos->dgppod.$pos->dgpdis.$pos->dgporno.$pos->dgpordate.$pos->lone3.$pos->tertdpod.$pos->tertddis.$pos->tertdorno.$pos->tertdordate.$pos->sqone1.$pos->sqone2.$pos->sqone3.$pos->sqone4.$pos->sqone5.$pos->sstgpod.$pos->sstgdis.$pos->sstgorno.$pos->sstgordate.$pos->sqone6.$pos->sqone6.$pos->sqone7.$pos->swatpod.$pos->swatdis.$pos->swatorno.$pos->swatordate.$pos->paone1.$pos->paone2.$pos->awdpmpod.$pos->awdpmorno.$pos->awdpmordate.$pos->paone3.$pos->awdpfpod.$pos->awdpforno.$pos->awdpfordate.$pos->paone4.$pos->awdpompod.$pos->awdpomorno.$pos->awdpomordate.$pos->paone5.$pos->awdpofpod.$pos->awdpoforno.$pos->awdpofordate.$pos->paone6.$pos->paone7.$pos->paone8.$pos->paone9.$pos->paone10.$pos->paone11.$pos->paone12.$pos->paone13.$pos->paone14.$pos->paone15.$pos->paone16.$pos->paone17.$pos->paone18.$pos->paone19.$pos->paone20.$pos->paone21.$pos->paone22.$pos->paone23.$pos->paone24.$pos->ssone23.$pos->dsopod.$pos->dsoorno.$pos->dsoordate.$pos->ssone24.$pos->csojalorno.$pos->csojalordate.$pos->ssone25.$pos->mispatorno.$pos->mispatordate.$pos->ssone26.$pos->othersnod.$pos->othersnodis.$pos->othersorno.$pos->othersordate.$pos->awbone1.$pos->awbone2.$pos->pssawonof.$pos->pssaworank.$pos->pssawoordate.$pos->awbone3.$pos->osihonoo.$pos->awbone4.$pos->Readerosinbo.$pos->Orderly.$pos->telopr.$pos->darrun.$pos->awbone5.$pos->bnkgdop.$pos->awbone6.$pos->bhogpog.$pos->bhogdop.$pos->awbone7.$pos->tradestot.$pos->tradestt.$pos->tradesbat.$pos->tradesdop.$pos->tradesorno.$pos->awbone8.$pos->mtsecpod.$pos->mtsecvehno.$pos->mtsecdop.$pos->mtsecorno.$pos->awbone9.$pos->quartbradop.$pos->quartbraorno.$pos->awbone10.$pos->awbone11.$pos->awbone12.$pos->awbone12.$pos->recrutnorb.$pos->recrutorno.$pos->recrutordate.$pos->bmdone1.$pos->bmdone2.$pos->leavefrom.'&nbsp;'.$pos->leaveto.$pos->bmdone3.$pos->absentfrom.$pos->absentddr.$pos->absentdate.$pos->bmdone4.$pos->usdos.$pos->usros.$pos->bmdone5.$pos->bmdone6.$pos->bmdone7.$pos->bmdone8.$pos->bmdone9.$pos->bmdone10.$pos->instone1.$pos->instone2.$pos->instone3.$pos->instone4.$pos->traning1.$pos->traning2.$pos->traning3.$pos->btarin1.$pos->btarin2.$pos->btarin3.$pos->btarin4.$pos->btarin5.$pos->btarin6.$pos->btarin7.$pos->btarin8.$pos->btarin9.$pos->btarin10.$pos->cfpop.$pos->cfppd.$pos->cfpdop.$pos->cfpdop; ?></td>
                          <td><?php echo $pos->dateofposting1; ?></td> 
                    <?php  }else{ ?>
                    <td></td><td></td>
                    <?php } ?>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          <?php //echo $links; ?> 
        </div><!-- panel-body -->
        </div><!-- panel -->
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/retina.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.cookies.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>webroot/js/select2.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url();?>webroot/js/custom.js"></script>

<script src="<?php echo base_url(); ?>webroot/data/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/vfs_fonts.js"></script></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/data/js/dataTables.colVis.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  "use strict";
  jQuery("select").select2({width:"100%"}),
  jQuery("select").removeClass("form-control"),
  jQuery('#DateofRetirementdor').datepicker({dateFormat: "yy-mm-dd"}); 
  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dateofesnlistment1').datepicker({dateFormat: "yy-mm-dd"});
  jQuery('#edateofesnlistment1').datepicker({dateFormat: "yy-mm-ddy"});

  
  jQuery('#dateofbirth').datepicker({dateFormat: "yy-mm-dd"});
  jQuery('#dateofbirthi').datepicker({dateFormat: "yy-mm-dd"});


  
});
   
     $("#postate").change(function(){
    var state = $("#postate").val();
    var dataStrings = 'state='+ state;
      $.ajax({
    type: "POST",
    url: "<?php echo base_url();?>bt-sti-ajfilter",
    data: dataStrings,
    cache: false,
    success: function(html){
    $("#dis").html(html);
    }  
      
    });

    });

  $(document).on('change', '#stts', function() {
  if(this.value == 'Under Graduate'){
     $('#ugb').show();
     $('#gb').hide();
     $('#pgb').hide();
     $('#docb').hide();
   }else if(this.value == 'Graduate'){
    $('#gb').show();
     $('#pgb').hide();
     $('#docb').hide();
     $('#ugb').hide();
   }else if(this.value == 'Post Graduate'){
    $('#pgb').show();
    $('#docb').hide();
     $('#ugb').hide();
     $('#gb').hide();
   }else if(this.value == 'Doctorate'){
    $('#docb').show();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }else if(this.value == 'Other'){
    $('#docOther1').show();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }else{
      $('#docb').hide();
    $('#ugb').hide();
     $('#gb').hide();
     $('#pgb').hide();
   }
});



         $(document).on('change', '#RankRankre', function() {
      if(this.value == 'Executive Staff'){
     $('#eors1').show();
     $('#eors2').hide();
     $('#eors3').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   } else if(this.value == 'Medical Staff'){
     $('#eors3').show();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(this.value == 'Ministerial Staff'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').show();
      $('#eors4').hide();
      $('#eors5').hide();
   }else if(this.value == 'Class-IV (P)'){
      $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').show();
      $('#eors5').hide();
   }else if(this.value == 'Class-IV (C)'){
        $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }else{
    $('#eors3').hide();
     $('#eors1').hide();
     $('#eors2').hide();
      $('#eors4').hide();
      $('#eors5').show();
   }
  
});

   $(document).on('change', '#catcouses', function() {
      if(this.value == 'Special Dept. Courses'){
     $('#NamesofsCourses12').show();
      $('#NamesofsCourses22').hide();
   } else if(this.value == 'Other Prof. Courses'){
     $('#NamesofsCourses22').show();
     $('#NamesofsCourses12').hide();
   }else{
     $('#NamesofsCourses22').hide();
     $('#NamesofsCourses12').hide();
   }
  
});

   $(document).on('change', '#Postingtiset', function() {
      if(this.value == 'Fix Duties'){
     $('#apart1').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   } else if(this.value == 'Law & Order Duty'){
     $('#apart2').show();
     $('#apart1').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Special Squads'){
     $('#apart3').show();
     $('#apart2').hide();
     $('#apart1').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Permanent Attachment'){
     $('#apart4').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart1').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Training'){
     $('#apart5').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart1').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Sports'){
     $('#apart6').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart1').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Available with BNs'){
     $('#apart7').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart1').hide();
     $('#apart8').hide();
     $('#apart9').hide();
   }else if(this.value == 'Battalion Misc Duties'){
     $('#apart8').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart1').hide();
     $('#apart9').hide();
   }else if(this.value == 'Institutions'){
     $('#apart9').show();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart1').hide();
   }else{
      $('#apart9').hide();
     $('#apart2').hide();
     $('#apart3').hide();
     $('#apart4').hide();
     $('#apart5').hide();
     $('#apart6').hide();
     $('#apart7').hide();
     $('#apart8').hide();
     $('#apart1').hide();
   }
  
});


$(document).ready(function() {
var table = $('#table').DataTable( {
         dom: 'C<"clear">Bfrtip',

       buttons: [
            {
               extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },{
               extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        colVis: {
            exclude: [ 0 ]
        },
         scrollY: 350,
        scrollX: 800
    } );
  

});
</script>
</body>
</html>