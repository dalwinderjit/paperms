<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> Deinduction List Report</title>
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
        <div class="panel-heading">
          </div>
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h3>Total Records: <?php echo count($uname); ?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
              <th>S.No</th>
              <th>Re Call</th>
              <th>Change Status</th>
              <th>Type</th>
               <th>Date</th>
              <th>Relieved</th>
              <th>Transfer/Deputation</th>
              <th>Name</th>
              <th>Present Rank</th>
              <th>Dept. No </th>
              <th>Type of Duty</th>
              <th>Father's Name</th>
              <th>House no.</th>
              <th>Street No.</th>
              <th>Village/Mohalla</th>
              <th>Ward No.</th>
              <th>City</th>
              <th>Post Office</th>
              <th>Police Station</th>
              <th>Tehsil</th>
              <th>State</th>
              <th>City</th>      
              <th>Gender</th>
              <th>Marital Status</th>
              <th>Date of Birth</th>
              <th>Caste</th>
              <th>Category</th>
              <th>Phone1</th>
              <th>Blood Group</th>
              <th> Education</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($uname!=''){ foreach($uname as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td> <?php $relcall = fetchoneinfodesc('newosi',array('man_id' => $value->nop),'man_id'); if($relcall !=''){ if($relcall->uid == 1 && $value->ti =='Promotion Transfer' || $value->ti =='Transfer' || $value->ti =='On deputation' || $value->ti =='Dismissed' || $value->ti =='Resignation' || $value->ti =='Missing' ){ ?> <a href="<?php echo base_url('bt-recall'.'/'.$value->nop.'/'.$value->deinduction_id); ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to Re-Call?');">Re Call</a> <?php  }} ?></td>
                     <td><?php if($value->reld == 'No'){ ?><a href="<?php echo base_url('bt-moverelived'.'/'.$value->deinduction_id); ?>" class="btn btn-primary">Move to Relieved</a>
                     <?php } ?>
                     </td>
                    <td><?php echo $value->ti;?></td>
                    <td><?php echo $value->Dateofrelieving.$value->Dateofrelievingi.$value->DeputationUnit.$value->DismissDate.$value->DateofReti.$value->dates.$value->DateofReti1.$value->DateofDeath.$value->pgrDateofRetirement.$value->pgrDateofRetirement;?></td>
                    <td><?php if($value->reld == 'Yes'){echo 'Relieved';}else{ echo'-';} ?></td>
                    <td> <?php $uname = fetchoneinfodesc('users',array('users_id' => $value->ito),'users_id'); if($uname !=''){ echo $uname->nick;} ?></td>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    <td><?php echo $value->typeofduty; ?></td>
                    <td><?php echo $value->fathername; ?></td>
                    <td><?php echo $value->houseno; ?></td>
                    <td><?php echo $value->streetno; ?></td>
                    <td><?php echo $value->villmohala; ?></td>
                    <td><?php echo $value->wardno; ?></td>
                    <td><?php echo $value->city; ?></td>
                    <td><?php echo $value->postoffice; ?></td>
                     <td><?php echo $value->policestation; ?></td>
                    <td><?php echo $value->teshil; ?></td>
                    <td><?php echo $value->state; ?></td>
                    <td><?php echo $value->district; ?></td>
                    <td><?php echo $value->gender; ?></td>
                    <td><?php echo $value->maritalstatus; ?></td>
                     <td><?php echo $value->dateofbith; ?></td>
                    <td><?php echo $value->caste; ?></td>
                    <td><?php echo $value->category; ?></td>
                    <td><?php echo $value->phono1; ?></td>
                     <td><?php echo $value->bloodgroup; ?></td>
                    <td><?php echo $value->eduqalification; ?></td> 
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->  
          
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

  jQuery('#ircd').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#id').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#ircdi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#idi').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dateofesnlistment1').datepicker({dateFormat: "dd/mm/yy"});
  jQuery('#dateofbirth').datepicker({dateFormat: "dd/mm/yy"});
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