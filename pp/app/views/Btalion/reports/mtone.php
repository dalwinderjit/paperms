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
<style type="text/css">
  .table {
  border: 1px solid #000000;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
   border: 1px solid #000000;
}
hr{
  margin-top: 11px !important;
  margin-bottom: 0px !important;
  border-top: 1px solid #000 !important;
}
body{
  font-size: 13px;
}
</style>
</head>
<body>
<h3 class="text-center">DETAIL OF GOVT. VEHICLES <?php if($this->session->userdata('username') != ''){ echo $this->session->userdata('nick'); }  ?> FOR THE MONTH OF ____________2017</h3>
 <div class="row">
        <div class="col-sm-12 col-xs-offset-1">
            <table border="1">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>Category of vehicle </th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Difference</th>
                  <th>Status of vehicle</th>
                  <th>Model</th>
                 <th>Registration No.</th> 
                  <th>Place of duty</th>
                  <th>Condition of Vehicle</th>
                  <th>Fuel Type</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php $ranks = info_fetch_countmto($value->catofvechicle,$this->session->userdata('rid')); if($ranks!=''){echo  $ranks->san;}else{echo'-';}  ?></td>
                    <td><?php $rank = info_fetch_countmtoall($value->catofvechicle,$this->session->userdata('rid')); if($value->catofvechicle == 'Truck'){echo "0";}else{echo $rank;}   ?></td>
                    <td><?php if($ranks!=''){ 
                      if($value->catofvechicle == 'Truck'){echo $ranks->san;}else{echo  $ranks->san - $rank;}
                    }else{echo'-';} ?></td>
                    <td> <?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($reg as $listing){echo $listing->statusofvechile.'<hr/>';};  ?></td>
                    <td> <?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($reg as $listing){echo $listing->vechile_year.'<hr/>';};  ?></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($reg as $listing){echo $listing->regnom.'<hr/>';};  ?></td>
                    <td><?php $rank = fetchoneinfo('users',array('users_id' => $value->battalion));
                    if($rank!=''){echo $rank->nick;}   ?>
                      <?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($reg as $listing){ $nums = info_fetch_countmtoallinforeg($value->catofvechicle,$listing->regnom,$this->session->userdata('rid')); $osi = fetchoneinfo('newosi',array('man_id' => $nums->officer));
                      if($nums->pduty == 'Officer'){}else{echo $nums->pduty.'&nbsp;';}
                    if($osi!=''){echo $osi->name.'&nbsp;,'.$osi->presentrank;}else{}
                      echo $nums->dutydetails.'<hr/>';} ?></td>
                    <td><?php echo $value->vehiclecon; /*$reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($reg as $listing){echo $listing->iveccon.'<hr/>';};*/ ?></td>
                    <td><?php $f = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('rid')); foreach($f as $listing){echo $listing->ftype.'<hr/>';}; ?></td>
                <?php endforeach; } ?>
                </tr>
              </tbody>
           </table>
           </div>
           </div>
</body>
</html>