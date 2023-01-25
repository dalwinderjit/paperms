<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MT Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<button onclick="myFunction()">Print this page</button>
<h3 class="text-center">Detail of Govt. Vehicles</h3>
<h3 class=""><span><?php echo $this->session->userdata('nick'); ?></span> <span class="pull-right">Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-Y');?> &nbsp; &nbsp; &nbsp; &nbsp;</span></h3>
            <table class="table"  id="table">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>Category of vehicle </th>
                  <th>Make</th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Deficency</th>
                  <th>Registration No.</th>
                  <th>Model </th>
                  <th>Status of Vehicle</th>
                  <th>Reason of Condemn </th>
                  <th>Complete Km for Condemnation</th>
                  <th>Place of duty</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td>-</td>
                    <td><?php $ranks = info_fetch_countmto($value->catofvechicle,$ninfo[0]); if($ranks!=''){echo  $ranks->san;}else{echo'-';}  ?></td>
                    <td><?php $rank = info_fetch_countmtoall($value->catofvechicle,$ninfo[0]); echo $rank;  ?></td>
                    <td><?php if($ranks!=''){echo  $ranks->san - $rank;}else{echo'-';} ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->vechile_year; ?></td>
                    <td><?php //echo $value->conditionofvechile; ?>-</td>
                    <td><?php //echo $value->condemdate; ?> - </td>
                    <td><?php echo $value->speedormeter; ?></td>
                    <td><?php $rank = fetchoneinfo('users',array('users_id' => $value->ibattalion));
                    if($rank!=''){echo $rank->nick;}   ?>
                      
                      <?php $dri = fetchoneinfo('newosi',array('man_id' => $value->ipdriver_name));
                    if($dri!=''){echo $dri->name. '&nbsp;'.$dri->presentrank;}else{echo"-";}   ?>

                    </td>
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>