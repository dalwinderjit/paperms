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
      <h3> &nbsp; &nbsp;  Issued weapon/Ammunition list</h3>
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
          <div class="row">
               <?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off',
      'method' => 'get'
      );
 echo form_open_multipart("", $attributes);
?>

                  <div class="row">

                  <div class="col-sm-3"><div class="form-group">
                         <?php  
                    $ito = array();
                 $ito[''] = '--Battalion--';
                 foreach ($uname as $value) {
                  if($value->users_id == 91 || $value->users_id == 92 || $value->users_id == 93  || $value->users_id == 94  || $value->users_id == 95){
                   
                 }elseif($this->session->userdata('userid') == 209 || $this->session->userdata('userid') == 210){
                    $ito[192] = '1-IRB';
                    $ito[167] = '2-IRB';
                    $ito[156] = '3-IRB';
                    $ito[115] = '4-IRB';
                    $ito[110] = '5-IRB';
                    $ito[162] = '6-IRB';
                    $ito[123] = '7-IRB';
                  }elseif($this->session->userdata('userid') == 211 || $this->session->userdata('userid') == 212){
                    $ito[100] = '1-CDO';
                    $ito[174] = '2-CDO';
                    $ito[144] = '3-CDO';
                    $ito[150] = '4-CDO';
                    $ito[180] = '5-CDO';
                  }else{
                    $ito[$value->users_id] = $value->nick;
                  } 
                  }
/*newarea Textfield*/
 echo form_dropdown('ito', $ito, set_value('ito',(isset($_GET['ito'])) ? $_GET['ito'] : ''),'id="ito" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('ito');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div>
                         
                  <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array();
$tpi[''] = '--Type of Weapon--';
                 foreach ($tow as $value) {
                   $tpi[$value->arm] = $value->arm;
                 }
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',(isset($_GET['tpi'])) ? $_GET['tpi'] : ''),'id="tpi" data-placeholder="--Name of Weapon--" title="Please select at least 1 area" class="select2"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>

                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                  <div class="col-sm-3"><div class="form-group">
<?php
/*$tpi = array();
$tpi[''] = '--Body No--';
foreach ($bodys as $value) {
 $tpi[$value->old_weapon_id] = $value->bono;
}
/*newarea Textfield*/
 /*echo form_dropdown('orderno', $tpi, set_value('orderno',(isset($_GET['orderno'])) ? $_GET['orderno'] : ''),'id="orderno" data-placeholder="Choose One" title="Please select at least 1 area" class="select2"'); 
 echo form_error('orderno');*/

 $lsd = array('type' => 'text','name' => 'orderno','id' => 'orderno','class' => 'form-control','placeholder' =>'Body No','value' => set_value('orderno'));
echo form_input($lsd);
echo form_error('lsd');
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div>

               <!--  <div class="col-sm-3"><div class="form-group">
<?php
/*$lsd = array('type' => 'text','name' => 'rcno','id' => 'ons','class' => 'form-control','placeholder' =>'Received Voucher/ RC No. ','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');*/
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div> -->


                 <!--  <div class="col-sm-3"><div class="form-group">
<?php
/*$lsd = array('type' => 'text','name' => 'mrec','id' => 'ons','class' => 'form-control','placeholder' =>'No. of Magazine Received','value' => set_value('ons'));
echo form_input($lsd);
echo form_error('lsd');*/
?>
                    <label for="ons" class="error"></label>
                  </div>
                </div> -->

                <div class="col-sm-3"><div class="form-group">
            <?php  
$it = array('' => '--Issue To--','Gunman' => 'Gunman','Guard' => 'Guard', 'Temp Duty' => 'Temp Duty', 'Company' => 'Company', 'Police Officer' => 'Police Officer','Battalion' => 'Battalion/Unit','ARP' => 'ARP','SDRF' => 'SDRF', 'SSG' => 'SSG','Control Room' => 'Control Room','PPA/PHR' => 'PPA/PHR', 'District' => 'District','Other' => 'Other',);
/*newarea Textfield*/
 echo form_dropdown('typeofduty', $it, set_value('typeofduty',(isset($_GET['typeofduty'])) ? $_GET['typeofduty'] : ''),'id="it" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('typeofduty');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 

                <div class="col-sm-3"><br/><div class="form-group">
            <?php  
$it = array('' => '--Ammunition Type--','Service' => 'Service','Practice' => 'Practice');
/*newarea Textfield*/
 echo form_dropdown('amtype', $it, set_value('amtype',(isset($_GET['amtype'])) ? $_GET['amtype'] : ''),'id="it" data-placeholder="Choose One" title="Please select at least 1 value" class="select2"'); 
 echo form_error('amtype');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> <br/>

                <div class="col-sm-3"><br/>
                   <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo base_url('bt-igcbkhcarmsissued'); ?>" class="btn btn-default">Reset</a>
                </div>

                  </div><br/>

                  <div class="row">
                    
                      
                  </div>

<?php echo form_close(); ?>
          </div></div>
        <div class="panel-body"> 
          <!-- Example split danger button -->
          <h3>Total Records: <?php echo $counts; ?></h3>
          <div class="table-responsive">
            <table class="table"  id="table">
              <thead>
                 <tr>
              
              <th>S.No</th>
              <th>Battalions/Units</th>
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
              <th>Status of weapon </th>
              <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php $batname = fetchoneinfo('users',array('users_id' => $value->bat_id)); if($batname !=''){echo $batname->nick;}  ?></td>
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
                    <td><?php echo $value->typeofduty; ?> &nbsp; <?php echo $value->placeofduty; ?></td>
                    <td><?php if($value->issueto != ''){
                      $info = fetchoneinfo('newosi',array('man_id' => $value->issueto)); if($info != ''){ echo $info->cexrank.$info->cminirank.$info->cmedirank.$info->ccprank.$info->cccrank. '&nbsp;'.$info->name.'&nbsp; No:'.$info->depttno;  $blist = fetchoneinfo('users',array('users_id' => $info->bat_id)); if($blist !=''){echo '&nbsp;'.$blist->nick;}   } 
                    }  echo '&nbsp;'.$value->issueother.'&nbsp;'.$value->district.' &nbsp;'.$value->duty; 
                    
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
                    <td><?php if($value->wbodyno != ''){
                      $infoc = fetchoneinfo('old_weapon',array('old_weapon_id' => $value->wbodyno)); if($infoc != ''){echo $infoc->staofserv;} 
                    } ?></td>
                    <td><?php echo date('d-m-Y',strtotime($value->idate)); ?></td> 
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           <?php echo $links; ?>
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