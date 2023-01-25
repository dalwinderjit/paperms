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
    	<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap-datepicker3.css" />
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

    <h3 class="text-center">DETAIL OF GOVT. VEHICLES <?php if(isset($name)){ echo $name->nick;  } else if($this->session->userdata('username') != ''){ echo $this->session->userdata('nick'); } { /*echo $this->session->userdata('nick2');*/ }  ?> FOR THE MONTH OF <?php $a = array('01' => 'Jan','02' => 'Feb','03' => 'March','04' => 'April','05' => 'May','06' => 'June','07' => 'July','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec'); echo $date;/*.' '.strtoupper($a[$month]);?> <?php echo $year;*/?></h3>
    <div class="row" id="searchformdiv">
        <div class="col-md-2"></div>
        <div class="col-md-10">
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
                      'method' => 'post',
//                    'onsubmit'=>'osi_records.dataTable.draw();return false;'
                      );
                 echo form_open_multipart("", $attributes);
                ?>
            <div class="col-sm-2"><br/>     <div class="input-group">
                 <?php
$select_date = array('type' => 'text','name' => 'select_date','id' => 'select_date','class' => 'form-control','placeholder' =>'Select Date','value' => set_value('select_date', date('d/m/Y')));
echo form_input($select_date);
echo form_error('select_date');
?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
                </div>
            <div class="col-sm-3"><br/>
                   <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                   <a href="<?php echo base_url('bt-osi-old'); ?>" class="btn btn-default">Reset</a>
                   <button name="download" value="download" class="btn btn-primary" onClick="printReport()">Print</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <br>
                <div class="row">
        <div class="col-sm-12 col-xs-offset-1">
            <table border="1">
              <thead>
                 <tr>
                  <th width="10">S.No</th>
                  <th width="130">Category of vehicle </th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Difference</th>
                  <th>Status of vehicle</th>
                  <th>Model</th>
                  <th>Registration No.</th> 
                  <th>Place of duty</th>
                  <th>Current Date of Duty</th>
                  <th>Condition of Vehicle</th>
                  <th>Fuel Type</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1;
//var_dump($value);
//die;
                 ?>
                 <tr>
                    <td width="10"><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php $ranks = isset($ranks_[$value->catofvechicle])?$ranks_[$value->catofvechicle]:'';//info_fetch_countmto($value->catofvechicle,$ninfo); 
                    if($ranks!=''){echo  $ranks->san;}else{echo'-';}  ?></td>
                    <td><?php $reg = $regs[$value->catofvechicle];//info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                    echo $k = count($reg);  ?></td>
                    <td><?php if($ranks!=''){  
                      echo  $ranks->san - $k;
                    }else{echo'-';} ?></td>
                    <td> <?php 
                         //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                         foreach($reg as $listing){
                             
                      $poiis = $poiis_[$listing->mt_id];
                      if($poiis !=''){
                        echo $poiis->vstatus.'<hr/>';
                    }
                      }    
                      ?></td>
                    <td> <?php //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                    foreach($reg as $listing){echo $listing->vechile_year.'<hr/>';};  ?></td>
                    
                    <td><?php //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                    foreach($reg as $listing){echo $listing->regnom.'<hr/>';};  ?></td>

                    <!-- <td><?php //$rank = fetchoneinfo('users',array('users_id' => $value->battalion));
                    //if($rank!=''){echo $rank->nick;}   ?>
                      <?php //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){ $nums = info_fetch_countmtoallinforeg($value->catofvechicle,$listing->regnom,$this->session->userdata('userid')); $osi = fetchoneinfo('newosi',array('man_id' => $nums->officer));
                      //if($nums->pduty == 'Officer'){}else{echo $nums->pduty.'&nbsp;';}
                    //if($osi!=''){echo $osi->name.'&nbsp;,'.$osi->cexrank;}else{}
                     // echo $nums->oname. '&nbsp;'.$nums->dutydetails.'<hr/>';} ?></td> -->

                     <td><?php 
                     $date_of_duty_=[];
                         //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                         foreach($reg as $listing){
                      $poiis = $poiis_[$listing->mt_id];
                      if($poiis !=''){
                          $date_of_duty_[] = convertDate2($poiis->date_of_duty);
                         $osi = fetchoneinfo('newosi',array('man_id' => $poiis->officer));
                      if($osi!=''){echo $osi->name.' &nbsp;, '.$osi->cexrank.' &nbsp;';}else{}
                        echo $poiis->oname.'&nbsp;'.$poiis->instone4.'&nbsp;'.$poiis->duty_details.'&nbsp;'.$poiis->noduty.'&nbsp;'.$poiis->other_state.'<hr/>';
                    }
                      }    
                      ?> </td>
                     <td><?php 
                      foreach ($date_of_duty_ as $k1=>$val1){
                          echo $val1. '<hr>';
                      }
                     ?>
                         
                     </td>

                    <td><?php  //$reg = info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                    foreach($reg as $listing){echo $listing->vehiclecon.'<hr/>';}; ?></td>
                    <td><?php $f = $reg; //info_fetch_countmtoallinfos($value->catofvechicle,$ninfo,$this->uri->segment(2),$this->uri->segment(3)); 
                    foreach($f as $listing){echo $listing->ftype.'<hr/>';}; ?></td>
                <?php endforeach; } ?>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="11">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
           </div>
           </div>
</body>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/bootstrap-datepicker3.min.js"></script>
<script>
jQuery(document).ready(function(){
  "use strict";
  jQuery('#select_date').datepicker({format: "dd/mm/yyyy"});
});
var oldPrintFunction = window.print;
        window.print = printPage;
        function printPage(){
//            td_height = 700;
//            original_address = $('#address_main').html();
//            footer_bottom = $('#footer').css('bottom');
//            new_address = getAddressRows();
//            console.log(original_address);
//            console.log(new_address);
//            footer_bottom_for_print = 0;
//            for(i=0;i<address_rows && i<3;i++){
//                footer_bottom_for_print += 20;
//                if(i>0){
//                    td_height -= 25;
//                }
//            }
//            $('table.notes_table>tbody>tr>td:nth-child(1)').css('height',td_height+'px');
//            $('#footer').css('bottom',footer_bottom_for_print+'px');
//            $('#address_main').html(new_address);
console.log('hi');
            $('#searchformdiv').css('display','none');
            oldPrintFunction();
            $('#searchformdiv').css('display','block');
            
            //$('#footer').css('bottom',footer_bottom);
            //$('#address_main').html(original_address);
//            $('table.notes_table>tbody>tr>td:nth-child(1)').css('height','400px');
        }
        jQuery(document).bind("keyup keydown", function(e) {
            if (e.ctrlKey && e.keyCode == 80) {
               printPage();
               return false;
            }
         });
</script>
</html>