<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title> QUARTER Module</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
      <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<div class="row">
<div class="col-sm-10 col-xs-offset-1">
<h3 class="text-center">STATEMENT  OF QUARTERS <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> BATTALION,PAP JRC.</h3>
     <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Type of Quarter</th>
                    <th>Name of Allottee</th>
                       <th>Quarter No.</th>
                       <th>Allotment Order</th>
                       <th>Allotment Date</th>
                        <th> Place of Posting</th>
                        <th>Floor</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofqtr; ?></td><!-- 
                    <td><?php //echo $value->res; ?></td> -->
                    <td><?php echo $value->nameofallote; ?></td>
                    <td><?php echo $value->qtrno; ?></td>
                    <td><?php echo $value->allotmentorder; ?></td>
                    <td><?php echo $value->allotmentdate; ?></td>
                     <td><?php echo $value->placeofposting; ?></td>
                    <td><?php echo $value->flor; ?></td>
                    
                    </tr>
                     
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div></div>
</body>
</html>