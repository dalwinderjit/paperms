<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Muniation Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
          <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>  
<div class="container">   
<h3 class="text-center">STATEMENT OF MUNITION <?php echo $this->session->userdata('nick'); ?>, JRC.</h3>
<h3 class=""><span></span> <span class="pull-right">Till Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-Y');?> &nbsp; &nbsp; &nbsp; &nbsp;</span></h3>
 <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                 <th>Sr No.</th>
                    <th>Name of Arms </th>
                    <th>Sanction</th>
                     <th>Holding</th>
                      <th>Issued</th>
                      <th>Balance In Kot</th>
                      <th>Remarks</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($msk!=''){ $counts = 0; foreach($msk as $value): $counts = $counts+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $counts; ?></td>
                    <td><?php echo $value->mname;  ?></td>
                    <td><?php /*$issued = info_fetch_ammucountmunition($value->ammubore,$ninfo); 
                    if($issued!=''){echo $issued->sun;}else{echo "-";}*/  ?></td>
                    <td><?php $issued = info_fetch_ammucountmunition($value->mname,$ninfo); 
                    if($issued!=''){echo $issued->qty;}else{echo "-";}  ?> </td>
                    <td><?php
                    if($issued!=''){echo $issued->issued;}else{echo "-";}  ?></td>
                    <td><?php if($issued!=''){ echo $issued->qty + $issued->issued;}  ?></td>
                    <td>-</td>
                <?php endforeach; } ?>
              </tbody>
           </table>
    </div>
</body>
</html>