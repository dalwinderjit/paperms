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

    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/tabulator.css">
  <script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo base_url();?>webroot/js/jquery-ui-1.10.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/tabulator.js"></script>
    <script>
function myFunction() {
    window.print();
}
</script>
<style type="text/css">

</style>
</head>
<body>
<h3 class="text-center">DETAIL OF GOVT. VEHICLES <?php //$val = explode(' ', $info->nick); echo $val[0];  ?> BATTALION,PAP JRC.</h3>
 <div class="row">
        <div class="col-sm-10 col-xs-offset-1">
            <table  id="table">
              <thead>
                 <tr>
                  <th>S.No</th>
                  <th>UNIT </th>
                  <th>MNTH</th>
                  <th>OFFICER_NM</th>
                  <th>RANK</th>
                  <th>VNO</th>
                  <th>TYPE_VEH</th>
                  <th>BP</th> 
                  <th>MODEL</th>
                  <th>AVER</th>
                  <th>DES_PET</th>
                  <th>MONTH_KM</th>
                  <th>TOTAL_KM</th>
                  <th>MONTH_POL</th>
                  <th>TOTAL_POL</th>
                  <th>POL_EXP</th>
                  <th>REPIAR</th>
                  <th>TOT_REPIAR</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($msk!=''){ foreach($msk as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td>75TH</td>
                    <td><?php echo date('M-Y'); ?></td>
                    <td style="width: 300px;"><?php $rank = fetchoneinfo('users',array('users_id' => $value->battalion));
                    if($rank!=''){echo $rank->nick;}   ?>
                      <?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){ $nums = info_fetch_countmtoallinforeg($value->catofvechicle,$listing->regnom,$this->session->userdata('userid')); $osi = fetchoneinfo('newosi',array('man_id' => $nums->officer));
                      if($nums->pduty == 'Officer'){}else{echo $nums->pduty.'&nbsp;';}
                    if($osi!=''){echo $osi->name.'&nbsp;,'.$osi->presentrank.'<br/>';}else{}
                      echo $nums->dutydetails.'<br/>';} ?></td>
                    <td></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->regnom.'<br/>';};  ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td></td>
                   <td> <?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->vechile_year.'<br/>';};  ?></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->avg.'<br/>';};  ?></td>
                    <td><?php $f = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($f as $listing){echo $listing->ftype.'<br/>';}; ?></td>
                   
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->mkm.'<br/>';};  ?></td>
                    
                    
                   <td></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->mpol.'<br/>';};  ?></td>
                    <td></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->polexp.'<br/>';};  ?></td>
                    <td><?php $reg = info_fetch_countmtoallinfos($value->catofvechicle,$this->session->userdata('userid')); foreach($reg as $listing){echo $listing->repair.'<br/>';};  ?></td>
                    <td></td>
                    
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

           <script type="text/javascript">
           $("#table").tabulator({
    height:"320px", // set height of table (optional)
    fitColumns:true, //fit columns to width of table (optional)
    columns:[ //Define Table Columns
        {title:"Name", field:"UNIT", sorter:"string", width:150},
        {title:"Age", field:"MNTH", sorter:"number", align:"left", formatter:"progress"},
    rowClick:function(e, id, data, row){ //trigger an alert message when the row is clicked
        alert("Row " + id + " Clicked!!!!");
    },
});


           
           </script>
 <script type="text/javascript">

           //create Tabulator on DOM element with id "example-table"
$("#example-table").tabulator({
    height:"320px", // set height of table (optional)
    fitColumns:true, //fit columns to width of table (optional)
    columns:[ //Define Table Columns
        {title:"Name", field:"name", sorter:"string", width:150},
        {title:"Age", field:"age", sorter:"number", align:"left", formatter:"progress"},
        {title:"Favourite Color", field:"col", sorter:"string", sortable:false},
        {title:"Date Of Birth", field:"dob", sorter:"date", align:"center"},
    ],
    rowClick:function(e, id, data, row){ //trigger an alert message when the row is clicked
        alert("Row " + id + " Clicked!!!!");
    },
});

          //define some sample data
var tabledata = [
    {id:1, name:"Oli Bob", age:"12", col:"red", dob:""},
    {id:2, name:"Mary May", age:"1", col:"blue", dob:"14/05/1982"},
    {id:3, name:"Christine Lobowski", age:"42", col:"green", dob:"22/05/1982"},
    {id:4, name:"Brendon Philips", age:"125", col:"orange", dob:"01/08/1980"},
    {id:5, name:"Margret Marmajuke", age:"16", col:"yellow", dob:"31/01/1999"},
];

//load sample data into the table
$("#example-table").tabulator("setData", tabledata);

 
           </script>
</body>
</html>