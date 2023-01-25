<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>KHC Report</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
</head>
<body>
      <h3 class="text-center"> &nbsp; &nbsp; STATEMENT OF ARMS <?php $val = explode(' ', $info->nick); echo $val[0];  ?> <?php $val = explode(' ', $info->nick2); echo $val[0];  ?> FOR THE MONTH OF <?php echo strtoupper(date('M-Y')); ?></h3>   
      <div class="row">
        <div class="col-sm-10 col-xs-offset-1">
            <table class="table  table-bordered">
              <thead>
                 <tr>
                 <th>Sr No.</th>
                    <th>Name of Arms </th>
                    <th>Sanctioned</th>
                     <th>Holding</th>
                      <th>Issued</th>
                       <th>Balance In Kot</th>
                      <th>Remarks</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($msk!=''){ $count = 0; foreach($msk as $value): $count = $count + 1; ?>
                 <tr class="odd gradeX">
                 <td><?php echo $count;  ?></td>
                    <td><?php echo $value->arm;  ?></td>
                    <td><?php $issued = info_fetch_countarmsan($value->arm,$this->session->userdata('rid')); if($issued!=''){if($issued->sun == 0){echo "-";}else{echo $issued->sun; }
                    }else{echo "-";}  ?></td>
                    <td><?php $hold = info_fetch_countarm($value->arm,$this->session->userdata('rid')); if($hold == 0){echo "-";}else{echo $hold;} ?></td>
                    <td><?php $issued = info_fetch_countarmissued($value->arm,$this->session->userdata('rid')); if($issued == 0){echo "-";}else{echo $issued;}  ?></td>
                    <td><?php  $t =  $hold - $issued ; if($t == 0){echo "-";}else{echo $t;}   ?></td>
                    <td><?php $issued = info_fetch_countarmsan($value->arm,$this->session->userdata('rid')); if($issued!=''){echo $issued->remarkwep; 
                    }else{echo "-";}  ?></td></tr>
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

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
        pageLength: 50
    } );
  

});
</script>

</body>
</html>