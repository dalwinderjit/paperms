<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Practice Ammuniation Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
          <script>
            function myFunction() {
                window.print();
            }
          </script>
</head>
<body>
<h3 class="text-center">STATEMENT  OF PRACTICE AMMUNITION <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> BATTALION,PAP JRC  FOR THE MONTH OF <?php echo strtoupper(date('M-Y')); ?></h3>
            <div class="row">
        <div class="col-sm-10 col-xs-offset-1">
            <table class="table  table-bordered">
              <thead>
                 <tr>
                 <th>Sr No.</th>
                    <th>Detail of Arms </th>
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
                    <td><?php $issued = info_fetch_ammucountpi($value->bore,$value->arm,$ninfo); if($issued!=''){echo $issued->sun;}else{echo "-";}  ?></td>
                     <td><?php $hold = fetchoneinfoammu('newwepon_dataqtyp',array('bore' => $value->bore , 'arm' => $value->arm, 'bat_id' => $ninfo)); if($hold!=''){echo $hol =  $hold->qty + $hold->issued;}else{echo "-";};  ?> </td>
                    <td><?php if($hold!=''){echo $hold->issued;}else{echo "-";} ?> </td>
                    <td> <?php if($hold!=''){echo $hold->qty;}else{echo "-";} ?></td>
                    <td><?php if($issued!=''){echo $issued->remarkwep;}else{echo "-";}  ?></td></tr>
                    <?php endforeach; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="14">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
           </div></div>
</body>
</html>