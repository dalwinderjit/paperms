<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MSK Report</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
           <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<div class="row">
<?php 
 /*Form Validation set*/
 $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  /*----End Form Validation----*/
  
 /*Create HTML form*/
 $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      );
 echo form_open_multipart("", $attributes);
?>


               <div class="col-sm-3"><div class="form-group">
                 <?php  
$tpi = array('' => '--Select Type of items --','Tentage A' => 'Tentage A','Tentage B' => 'Tentage B','Tentage C' => 'Tentage C', 'Security Equipments' => 'Security Equipments', 'Electronic Items' =>'Electronic Items','Computers' => 'Computers','Computer Equipments' => 'Computer Equipments', 'Laptops' =>'Laptops','Furniture' =>'Furniture','Machinery' => 'Machinery','SDRF Items' => 'SDRF Items','Sanitory Items' => 'Sanitory Items', 'Stationery' => 'Stationery','Computer Stationery' => 'Computer Stationery', 'Building Material' => 'Building Material', 'Paint' => 'Paint','CTS Items' =>'CTS Items','Other Misc Items' =>'Other Misc Items','Others' =>'Others');
/*newarea Textfield*/
 echo form_dropdown('tpi', $tpi, set_value('tpi',1),'id="tpi" data-placeholder="Choose One" title="Please select at least 1 area" class="form-control"'); 
 echo form_error('tpi');
/*----End newarea Textfield----*/
 ?>
                    <label for="tpi" class="error"></label>
                  </div>
                </div> 
<div class="col-sm-3">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   <button onclick="myFunction()" class="btn btn-default">Print this page</button>
                </div>
<?php echo form_close(); ?>
          </div><br/>
        <h3 class="text-center">Status of MSK Items</h3>
        <h4 class="text-center"><?php echo $ito; ?></h4>
<h3 class=""><span><?php echo $this->session->userdata('nick'); ?></span> <span class="pull-right">Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-Y');?> &nbsp; &nbsp; &nbsp; &nbsp;</span></h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                  <th>Sr No.</th>
                  <th>Categories of item</th>
                  <th>Type of items </th>
                  <th>Sanction</th>
                  <th>Holding</th>
                  <th>Issued</th>
                  <th>Serviceable</th>
                  <th>Un-Serviceable</th>
                 </tr>
              </thead>
              <tbody>
                <?php   if($info!=''){ $count = 0;  
                $alldata = fetchinfo('newmsk',array('typeofitem' => $info,'bat_id' => $ninfo));
                 foreach($alldata as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofitem;  ?></td>
                    <td><?php echo $value->nameofitem;  ?></td>
                    <td><?php $sans = info_fetch_msksan($value->nameofitem,$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                    <td><?php $hold = info_fetch_countmskitem($value->nameofitem,$ninfo); echo $hold; ?></td>
                    <td><?php  $issued = info_fetch_countmskitemussued($value->nameofitem,$ninfo); echo $issued; ?></td>
                    <td>-</td>
                    <td>-</td>
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>