<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Arms Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
      <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<button onclick="myFunction()">Print this page</button>
<h3 class="text-center">Detail of practice ammunition</h3>
<h3 class=""><span><?php echo $this->session->userdata('nick'); ?></span> <span class="pull-right">Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-Y');?> &nbsp; &nbsp; &nbsp; &nbsp;</span></h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                 <th>Sr No.</th>
                    <th>Detail of Arms </th>
                    <th>Sanction</th>
                     <th>Holding</th>
                      <th>Issued</th>
                      <th>Balance In Kot</th>
                      <th>Remarks</th>
                 </tr>
              </thead>
              <tbody>
            
                <?php  if($msk!=''){ $count = 0; foreach($msk as $value): $count = $count + 1;  ?>
                 <tr class="odd gradeX">
                 <td><?php echo$count; ?></td>
                    <td><?php echo $value->tow;  ?></td>
                    <td><?php $issued = info_fetch_countarmsan($value->tow,$ninfo); if($issued!=''){echo $issued->sun;}  ?></td>
                    <td><?php $hold = info_fetch_countarm($value->tow,$ninfo); echo $hold;  ?> </td>
                    <td><?php $iss = info_fetch_countarmissued($value->tow,$ninfo); echo  $iss; ?></td>
                    <td><?php echo $hold - $iss;  ?></td>
                    <td>-</td>
                <?php endforeach; } ?>
              </tbody>
           </table>
          </body>
</html>