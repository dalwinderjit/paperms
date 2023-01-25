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
<h3 class="text-center">Detail of Govt. Vehicles</h3>
 <div class="row">
        <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered"  id="table">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>Category of vehicle </th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Deficency</th>
                  <th>On road</th>
                  <th>Off road</th>
                  <th>Condemn</th>
                  <th>Extra</th>
                  <th>Model</th>
                 <th>Registration No.</th> 
                  <th>Place of duty</th>
                  <th>Condition of Vehicle</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php $ranks = info_fetch_countmtoigp($value->catofvechicle); if($ranks!=''){echo  $ranks->san;}else{echo'-';}  ?></td>
                    <td><?php $rank = info_fetch_countmtoalligp($value->catofvechicle); echo $rank;  ?></td>
                    <td><?php if($ranks!=''){echo  $ranks->san - $rank;}else{echo'-';} ?></td>
                    <td><?php $ofroad = info_fetch_countmtoallinfosupigp($value->regnom);
                    foreach ($ofroad as  $values) {
                      if($values->vc == 'On Road'){    
                       echo 'On Road';
                      }else{echo "-";}
                     } ?> </td>
                    <td><?php 
                    $ofroad = info_fetch_countmtoallinfosupigp($value->regnom);
                    foreach ($ofroad as  $values) {
                      if($values->vc == 'Off Road'){    
                       echo 'Off Road';
                      }else{echo "-";}
                     } ?></td>
                    <td><?php echo $value->vechile_year; ?></td>
                    <td>-</td>
                    <td><?php echo $value->condemdate; ?> </td>
                    
                    <td><?php $reg = info_fetch_countmtoallinfosigpss($value->catofvechicle); foreach($reg as $listing){echo $listing->regnom.'<br/>';};  ?></td>
                    <td><?php $rank = fetchoneinfo('users',array('users_id' => $value->ibattalion));
                    if($rank!=''){echo $rank->nick;}   ?>
                      <?php 
                      $reg = info_fetch_countmtoallinfosigpss($value->catofvechicle); foreach($reg as $listing){ if($listing->iduty_details == '_'){echo "In MT Garage".'<br/>';}else{echo $listing->iduty_details.'<br/>';}  } ?></td>
                    <td><?php $reg = info_fetch_countmtoallinfosigpss($value->catofvechicle); foreach($reg as $listing){echo $listing->conditionofvechile.'<br/>';}; ?></td>
                <?php endforeach; } ?>
                </tr>
              </tbody>
           </table>
           </div>
           </div>
</body>
</html>