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
  <script src="<?php echo base_url();?>webroot/js/printThis.js"></script>
<style type="text/css">
body{
      font-size: 10px !important;
    }
</style>
</head>
<body>
<h3 class="text-center">DETAIL OF GOVT. VEHICLES ..................................... BATTALION,PAP JRC.</h3>
 <div class="row">
        <div class="col-sm-12">
        <button id="download-csv">Export to Excel</button>
        <div id="example-table"></div>
            
           </div>
           </div>

           <script type="text/javascript">
 
           $("#example-table").tabulator({
    fitColumns:true, //fit columns to width of table (optional)
    columns:[ //Define Table Columns
        {title:"Sno", field:"sno", sorter:"number", width:40, sortable:false},
        {title:"Unit", field:"unit", sorter:"string", align:"left", sortable:false},
        {title:"Month", field:"month", sorter:"string",width:60, sortable:false},
        {title:"Officer", field:"officer", sorter:"string", align:"left", width:230, sortable:false},
        {title:"Vno", field:"vno", sorter:"string", align:"left", width:80, sortable:false},
        {title:"Type vechile", field:"typevechile", sorter:"string", align:"left", width:120, sortable:false},
        {title:"Bp", field:"bp", sorter:"string", align:"left", width:40, sortable:false},
        {title:"Model", field:"model", sorter:"string", align:"left", width:80, sortable:false},
        {title:"Avg", field:"avg", sorter:"string", align:"left", width:40, sortable:false},
        {title:"Despet", field:"despet", sorter:"string", align:"left", width:50, sortable:false},
        {title:"Month km", field:"monthkm", sorter:"string", align:"left", width:60, sortable:false},
        {title:"Total month km", field:"totalmonthkm", sorter:"string", align:"left", width:80, sortable:false},
        {title:"Month pol", field:"monthpol", sorter:"string", align:"left", width:60, sortable:false},
        {title:"Total month pol", field:"totalmonthpol", sorter:"string", align:"left", width:80, sortable:false},
        {title:"Polexp", field:"polexp", sorter:"string", align:"left", width:50, sortable:false},
        {title:"Repair", field:"repair", sorter:"string", align:"left", width:50, sortable:false},
        {title:"Total repair", field:"Totalrepair", sorter:"string", align:"left", width:70, sortable:false},
    ],
    
});

                    //define some sample data
var tabledata = [
  <?php  $count = 0;  foreach($msk as $value): $count = $count+1; ?>
    {id:<?php echo $count; ?>, sno:"<?php echo $count; ?>", unit:"75TH", month:"<?php echo date('M-Y'); ?>", officer:" <?php if($value->pduty == 'Officer'){}else{echo  $value->pduty;} ?> <?php $osi = fetchoneinfo('newosi',array('man_id' => $value->officer));
                    if($osi!=''){echo $osi->name.'&nbsp;,'.$osi->presentrank;}else{}
                      echo $value->dutydetails; ?>",vno:"<?php echo $value->regnom; ?>",
                        typevechile: "<?php echo $value->catofvechicle; ?>",bp: "", model:"<?php echo $value->regnom; ?>", avg: "<?php echo $value->avg; ?>",despet: "<?php echo $value->ftype ?>",monthkm:"<?php echo $value->mkm;  ?>", totalmonthkm:"<?php echo $value->tmkm;  ?>",monthpol:"<?php echo $value->polexp; ?>", totalmonthpol:"<?php echo $value->tmpol;  ?>", polexp:"<?php echo $value->polexp ?>",repair:"<?php echo $value->repair ?>",Totalrepair:"<?php echo $value->trpair;  ?>"  },
    <?php endforeach;  ?>
];

//load sample data into the table
$("#example-table").tabulator("setData", tabledata);

/*$(document).on('click', '#download-csv', function() {
    $("#example-table").printThis({
  importCSS: true,
  printContainer: true,
  loadCSS:"<?php echo base_url();?>webroot/css/tabulator.css"
  });
});*/


//trigger download of data.csv file
$("#download-csv").click(function(){
    $("#example-table").tabulator("download", "csv", "data.csv");
});

           </script>
</body>
</html>