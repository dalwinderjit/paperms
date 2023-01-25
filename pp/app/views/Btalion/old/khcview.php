<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> Issued weapon/Ammunition list</title>
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
      <h3> &nbsp; &nbsp;  History of weapon </h3>
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
              <th>Ammunition Type</th>
              <th>Weapon</th>
              <th>Body No.</th>
              <th>Butt No.</th>
              <th>Bore</th>
              <th>Issue info</th>
              <th>Issue To</th>
              <th>RC/Voucher No</th>
              <th>RC Date</th>
              <th>Weapon Issued</th>
              <th>Magzine Issued</th>
              <th>Issued Service Ammunition</th>
              <th>Issued Practice Ammunition</th>
              <th>Condition of Weapon</th>
              <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td> <?php echo $value->atype; ?></td>
                    <td><?php if($value->abore){ $n= explode(',', $value->abore); echo $n[1]. '&nbsp;';}
                        if($value->ammubore){ $n= explode(',', $value->ammubore); echo $n[1];}
                   ?></td>
                   <td><?php if($value->wbodyno != ''){
                      $info = fetchoneinfo('old_weapon',array('old_weapon_id' => $value->wbodyno)); if($info != ''){echo $info->bono;} 
                    } ?></td>
                    <td><?php if($value->wbodyno != ''){
                      $info = fetchoneinfo('old_weapon',array('old_weapon_id' => $value->wbodyno)); if($info != ''){echo $info->buno;} 
                    } ?></td>
                    <td><?php if($value->abore){ $n= explode(',', $value->abore); echo $n[0];}
                        if($value->ammubore){ $n= explode(',', $value->ammubore); echo $n[0];}
                   ?></td>
                    <td><?php echo $value->typeofduty; ?> &nbsp; <?php echo $value->placeofduty.' &nbsp;'.$value->duty; ?></td>
                    <td><?php if($value->issueto != ''){
                      $info = fetchoneinfo('newosi',array('man_id' => $value->issueto)); if($info != ''){ echo $info->cexrank.$info->cminirank.$info->cmedirank.$info->ccprank.$info->cccrank. '&nbsp;'.$info->name.'&nbsp; No:'.$info->depttno; $blist = fetchoneinfo('users',array('users_id' => $info->bat_id)); echo '&nbsp;'.$blist->nick;  } 
                    }  echo '&nbsp;'.$value->district; 

                  
                      $infoss = fetchoneinfo('old_weapon',array('old_weapon_id' => $value->wbodyno));
                       if($infoss != ''){echo $infoss->other;} 
                    
                     ?>

                    <?php if($value->ibat_id != ''){
                      $info = fetchoneinfo('users',array('users_id' => $value->ibat_id));
                       if($info != ''){echo $info->user_name;} 
                    
                    }  ?><?php if($value->pissuetoname != ''){
                      $info = fetchoneinfo('newosi',array('man_id' => $value->pissuetoname)); if($info != ''){echo $info->cexrank.$info->cminirank.$info->cmedirank.$info->ccprank.$info->cccrank. '&nbsp;'.$info->name.'&nbsp; No:'.$info->depttno; $blist = fetchoneinfo('users',array('users_id' => $info->bat_id)); echo '&nbsp;'.$blist->nick;} 
                    }  ?></td>
                    <td><?php echo $value->drcvno; ?></td>
                     <td><?php echo $value->drdate; ?></td>
                    <td><?php $c = explode(',', $value->bodyno); echo count($c); ?></td>
                    <td><?php echo $value->mags.$value->magp; ?></td>
                    <td><?php if($value->amqunt !=''){echo $value->amqunt;}else{echo '-';} ?></td>
                    <td><?php if($value->ammupqty !=''){echo $value->ammupqty;}else{echo '-';} ?></td>
                    <td><?php if($value->wbodyno != ''){
                      $infoc = fetchoneinfo('old_weapon',array('old_weapon_id' => $value->wbodyno)); if($infoc != ''){echo $infoc->conofwap;} 
                    } ?></td>
                    
                    <td><?php echo date('d-m-Y',strtotime($value->idate)); ?></td> 
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
         scrollX:850
    } );
  

});
</script>
</body>
</html>