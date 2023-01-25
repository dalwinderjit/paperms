<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Empty shell Reutrn</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<h3 class="text-center"> </h3>
<div class="container">
 <div class="row">
        <div class="col-sm-12">
            <table border="2">
              <thead>
                 <tr>
                  <th> &nbsp; S.No &nbsp; </th>
                  <th> &nbsp; Unit &nbsp; </th>
                  <th> &nbsp; Month &nbsp; </th>
                  <th> &nbsp; Officer &nbsp; </th>
                  <th> &nbsp; Vno &nbsp; </th>
                  <th> &nbsp; Type vechile &nbsp; </th>
                  <th> &nbsp; Bp &nbsp; </th>
                  <th> &nbsp; Model &nbsp; </th> 
                  <th> &nbsp; Avg &nbsp; </th>
                  <th> &nbsp; Des/pet &nbsp; </th>
                  <th> &nbsp; Month km &nbsp; </th>
                  <th> &nbsp; Total month km &nbsp; </th>
                  <th> &nbsp; Month pol &nbsp; </th>
                  <th> &nbsp; Total Month pol &nbsp; </th>
                  <th> &nbsp; Total Pol exp &nbsp; </th>
                  <th> &nbsp; Repair &nbsp; </th>
                  <th> &nbsp; Total repair &nbsp; </th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td> &nbsp; <?php echo $count; ?></td>
                    <td> &nbsp; <?php $a = explode('.', $this->session->userdata('username')); echo $a[0].'-'.$a[1]; ?></td>
                    <td> &nbsp; <?php echo date('M-Y'); ?></td>
                    <td> &nbsp; <?php if($value->pduty == 'Officer'){}else{echo  $value->pduty;
                    } ?> <?php $osi = fetchoneinfo('newosi',array('man_id' => $value->officer));
                    if($osi!=''){echo $osi->name.' &nbsp;, '.$osi->cexrank.' &nbsp;';}else{}
                      echo $value->oname.$value->dutydetails; ?></td>
                    <td> &nbsp; <?php echo $value->regnom; ?></td>
                    <td> &nbsp;  &nbsp;  <?php echo $value->catofvechicle; ?></td>
                    <td> &nbsp;</td>
                    <td> &nbsp; <?php echo $value->vechile_year; ?></td>
                    <td> &nbsp; <?php echo $value->avg; ?></td>
                    <td> &nbsp; <?php echo $value->ftype ?></td>
                    <td> &nbsp; <?php echo $value->mkm;  ?></td>
                    <td> &nbsp; <?php echo $value->tmkm;  ?></td>
                    <td> &nbsp; <?php echo $value->mpol; ?></td>
                     <td> &nbsp; <?php echo $value->tmpol; ?></td>
                    <td> &nbsp; <?php echo $value->polexp;  ?></td>
                    <td> &nbsp; <?php echo $value->repair ?></td>
                    <td> &nbsp; <?php echo $value->trpair ?></td>
                <?php endforeach; } ?>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="16">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
           </div>
           </div>
           </div>
</body>
</html>