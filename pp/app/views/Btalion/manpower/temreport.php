<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>OSI Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  </head>
<body> <div class="row">
          <div class="col-lg-10 col-xs-offset-1">
          <div class="table-responsive">
          <h2 class="text-center">Detail of <?php echo $this->session->userdata('nick');  ?> <?php echo $this->session->userdata('nick2');  ?> official attached with other units.</h2>
            <table class="table table-bordered">
              <thead>
                 <tr>
                    <th> Sr.No.</th>
                    <th>Rank</th>
                    <th>Name of officer/official</th>
                    <th>Dept.No</th>  
                    <th>BN</th>
                    <th>Temporary attached with</th>
                    <th>Order By</th>
                    <th>Order No. & date</th>
                 </tr>
              </thead>
              <tbody>
              <?php if($ninfo != 74){ 
                $count = 0 ; $names = fetchinfoosit('tcover',array('status'=> 1,'bat_id' => $ninfo));   ?>
              <?php  foreach($names as $listng){ $count = $count + 1; ?>
                <tr>
                  <td><?php echo $count; ?></td>
                   <td><?php $a = fetchoneinfo('newosi',array('man_id'=> $listng->man_id)); ?><?php if($a !=''){
                    echo $a->cexrank;
                    }  ?></td>
                  <td><?php if($a !=''){echo $a->name;} ?></td>
                 <td><?php if($a !=''){echo $a->depttno;} ?></td>
                  <td><?php if($a !=''){echo $a->battalion;} ?></td>
                  <td><?php echo $listng->tname.'&nbsp;'./*$listng->tem.*/'&nbsp;'.$listng->dis; ?></td>
                  <td><?php echo $listng->orderby; ?></td>
                  <td><?php echo $listng->orderno.'<br/> Dated: '.$listng->orderdate; ?></td>
                </tr>
                <?php }} ?>
              </tbody>
               <tfoot>
                <tr>
                  <td colspan="8">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>

          </div><!-- table-responsive -->  </div></div>
</body>
</html>