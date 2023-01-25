<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Service Ammuniation Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
          <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<h3 class="text-center">STATEMENT  OF SERVICE AMMUNITION <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> BATTALION,PAP JRC.</h3>
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
                    <td><?php $issued = info_fetch_ammucountigp($value->bore); if($issued!=''){echo $issued->sun;}else{echo "-";}  ?></td>
                    <td><?php $hold = fetchoneinfoammuipg('newwepon_dataqty',array('bore' => $value->bore)); if($hold!=''){
                      foreach ($hold as $valuei) {
                          echo $valuei->total;
                      }

                         }else{echo "-";};  ?> </td>
                    <td><?php $hold = fetchoneinfoammuissuipg('newwepon_dataqty',array('bore' => $value->bore)); if($hold!=''){
                      foreach ($hold as $valueii) {
                          echo $valueii->totalis;
                      }

                         }else{echo "-";};  ?> </td>
                    <td> <?php $hold = fetchoneinfoammusankuipg('newamus',array('ammubore' => $value->bore)); if($hold!=''){
                      foreach ($hold as $valueii) {
                          echo $valueii->totalss;
                      }

                         }else{echo "-";};  ?></td>
                    <td>-</td></tr>
                    <?php endforeach; } ?>
              </tbody>
           </table>
           </div></div>
</body>
</html>