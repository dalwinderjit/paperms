<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> Statement of practice ammunition issued, empty/miss cases deposited</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>
</head>
<body>
 
      <div class="row">
        <div class="col-sm-12">
       
    <div class="panel panel-default">
        <div class="panel-body"> 
          <div class="table-responsive">
          <h3 class="text-center">Statement of practice ammunition issued, empty/miss cases deposited</h3>
            <table class="table" >
              <thead>
                 <tr>
              <th>S.No</th>
              <th>Type of Arms</th>
              <th>Ammunition Bore</th>
              <th>Qty. Issued</th>
              <th>Miss cartridges</th>
              <th>Empty cartridges</th>
			  <th>Lost cartridges</th>
			  <th>Live cartridges</th>
              <th>Qty. of empty cartridges deposited in 27th Bn.PAP</th>
              <th>RC NO.</th>
              <th>RC Date</th>
              <th>Qty. of Miss fires cartridges deposited in CA Bahadurgarh</th>
              <th>RC NO.</th>
              <th>RC Date</th>
              <th>Reason for not/ less deposited cartridges</th>
                </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->weapon; //if($value->ammubore){ $n= explode(',', $value->ammubore); echo $n[1];}
                   ?></td>
                    <td><?php echo $value->bore; //if($value->ammubore){ $n= explode(',', $value->ammubore); echo $n[0];}
                   ?></td>
                    
                    <td><?php  
                      
                    
                      ?></td>
                    <td><?php  echo $value->mcat;
                      ?></td>
                    <td><?php echo $value->ecat;
                      ?></td>
                    <td><?php echo $value->locat;
                      ?></td>
					<td><?php echo $value->lcat;
                      ?></td>
                    <td><?php $id = fetchoneinfocartridgesbtnsend($value->bore,$value->deposit_ammu_id);
                    
                    if($id != ''){
                      echo $id->eammu;
                    }else{
                      echo'-';
                    }
                     ?></td> 
                    
                    <td><?php if($id != ''){
                      echo $id->rcno;
                    }else{
                      echo'-';
                    } ?></td> 
                    <td><?php if($id != ''){
                      echo $id->rdate;
                    }else{
                      echo'-';
                    } ?></td> 
                    <td><?php if($id != ''){
                      //echo $id->caempty;
                    }else{
                      echo'-';
                    } ?></td> 
                    <td><?php if($id != ''){
                      //echo $id->carcno;
                    }else{
                      echo'-';
                    } ?></td> 
                    <td><?php if($id != ''){
                      //echo $id->carcdate;
                    }else{
                      echo'-';
                    } ?></td> 
                    <td><?php if($id != ''){
                      //echo $id->rfdc;
                    }else{
                      echo'-';
                    } ?></td> 
                    </tr>
                <?php endforeach; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="13">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
          </div><!-- table-responsive -->  
         
        </div><!-- panel-body -->
        </div><!-- panel -->
      </div><!-- col-sm-12 -->
    </div><!-- row -->
    
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
         scrollY: 350
    } );
  

});
</script>
</body>
</html>