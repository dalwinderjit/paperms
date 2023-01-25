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
    <br>
<h3 class="text-center">STATEMENT  OF QUARTERS <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> </h3>
<h4 class="text-right">Till: <?php echo date('d-m-Y'); ?></h4>
<form method="POST">
<input class="btn btn-primary" name="download" value="DOWNLOAD EXCEL" type="submit">
<input class="btn btn-primary" type="submit" value="PRINT" onclick="window.print()"/>
</form>
<br>
     <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Type of Quarter</th>
                    <th>Quarter No.</th>
                    <th>Floor</th>
                    <th>Location</th>
                    <th>Battalions/Units/ <BR> Distt/Other</th>
                    <th>Rank, Name and Belt No.</th>
		                <th>Mobile No.</th>
                    <th>Place of Posting</th>
                    <th>Allotment Order</th>
                    <th>Allotment Date</th>
                    
                   
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofqtr; ?> </td>
                    <td class="text-center"><?php echo $value->qtrno; ?></td>
                    <td><?php echo $value->flor; ?></td>
                    <td><?php echo $value->location; ?></td>
                    <td><?php echo $value->balot; ?></td>
                    <td><?php echo $value->rank; ?> &nbsp; <?php echo $value->nameofallote.$value->qother; ?> &nbsp; <?php echo $value->regltno; ?></td>
					          <td><?php echo $value->contactno; ?></td>
                    <td><?php echo $value->placeofposting; ?></td>
                    <td><?php echo $value->allotmentorder; ?></td>
                    <td><?php echo $value->allotmentdate; ?></td>
                     
                    
                    
                    </tr>
 
                <?php endforeach; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="11">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
           </div></div>
</body>
</html>