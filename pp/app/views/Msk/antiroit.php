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
    <style>
        .simple_table{
            width:100%;
        }
        .simple_table>tbody>tr>td,.simple_table>thead>tr>th{border:1px solid black;}
        .simple_table>tbody>tr>td:nth-child(n+3):nth-child(-n+8){text-align:center;}
        .text2{
            font-size:14px;
            text-align:center;
            font-weight:bold;
            color:black;
        }
         @media print {
             #filters{display:none;}
             .printarea>div{margin-left:0px;}
             #main-content{width:600px;}
         }
    </style>
</head>
<body id="main_document">
        <h3 class="text-center" style="margin-top:30px;">DETAIL OF ANTI RIOT & SECURITY EQUIPMENTS  <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> <?php $val2 = explode(' ', $this->session->userdata('nick2')); echo $val2[0];  ?> on <?php echo strtoupper(date('d-m-Y h:i:s a')); ?></h3>
        <div class="row" id="filters">
                         <?php 
     $attributes = array(
      'name'        => 'basicForm4',
      'id'        => 'basicForm4',
      'accept-charset'  => 'utf-8',
      'autocomplete'    =>'off', 
      'method' => 'post',
	 
      );
	echo form_open_multipart("", $attributes);?>
            <div class="col-md-6"></div>
	<div class="col-md-4 text-right">
		<input type="submit" name="download" class="btn btn-primary" value="Download Excel"/>
                <button  class="btn btn-primary" onClick="copyReport('main_document');return false; ">Copy</button>
                <button  class="btn btn-primary" onClick="window.print();return false;">Print <span class="fa fa-print"></span></button>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
		<input type="checkbox" name="skipZeroEquipments" id="skipZeroEquipments" <?php 
			if(null!=$this->input->post('search')){
				echo (null!=$this->input->post('skipZeroEquipments'))?'checked':'';
			}else{
				echo   ' checked="checked"';
			}?>>
			
			<label for="skipZeroEquipments">Skip zero value Equipment</label><BR>
	

	<?php echo form_close(); ?>
                        <br/>
	</div>
            
	</div>
        <div class="row printarea">
          <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered" id="table-data">
                <thead>
                        <tr>
                                <td class="text-center" colspan="9"><?php echo (isset($_POST['namOfItemType'])) ? $_POST['namOfItemType'] : $typeOfItem;?> Figures</td>
                        </tr>
                        <tr>
                                <th>S. No.</th>
                                <th>Name of Equipments</th>
                                <th>Sanctioned</th>
                                <th>Holding</th>
                                <th>Issued</th>
                                <th>Total in store</th>
                                <th>Serviceable</th>
                                <th>Unserviceable</th>
                                <!--th>Temp-Recevied from other Unit</th>
                                <th>Temp-Issued to other Unit</th-->
                                <!--th>Auctioned(status D)</th-->
                        </tr>
                </thead>
                <tbody>

        <?php
        $counter = 0;
        foreach($equipments as $eqid=>$battalions){
                $counter++;
?>	
                <tr>
                        <td><?php echo $counter; ?></td>

                        <td><?php echo $battalions['equipments_name'];?></td>
                        <?php foreach($battalions as $k=>$status){ 


                                                if($k!='equipments_name'){

                                                        ?>

                                <td><?php echo $battalions[$k]['sanction']; ?></td>
                                <td><?php echo $battalions[$k]['holding']; ?></td>
                                <td><?php echo $battalions[$k]['issued'] ;?></td>
                                <td><?php echo $battalions[$k]['total_in_store']; ?></td>
                                <td><?php echo $battalions[$k]['serviceable']; ?></td>
                                <td><?php echo $battalions[$k]['unserviceable']; ?></td>
                                <!--td>-</td>
                                <td>-</td-->
                                

                        <?php break; 	}
                        } ?>

                </tr>

<?php } ?>
<tr>
                        <td>&nbsp;</td>
                        <td>Grand Total</td>
                        <td><?php echo $grand_total['sanction']; ?></td>
                        <td><?php echo $grand_total['holding']; ?></td>
                        <td><?php echo $grand_total['issued'] ;?></td>
                        <td><?php echo $grand_total['total_in_store']; ?></td>
                        <td><?php echo $grand_total['serviceable']; ?></td>
                        <td><?php echo $grand_total['unserviceable']; ?></td>
                        <!--td>-</td>
                        <td>-</td-->
                </tr>
                <tr><td colspan="6">Report generated by: <?php echo $val[0].' '.$val2[0]; ?></td><td colspan="2" style="text-align:right;"> <?php echo date('d-m-Y h:i:s a'); ?></td></tr>
        </tbody>
            </table>
            </div>
              </div>
</body>
<script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
    
    function copyReport(id) {
	var range = document.createRange();
	var width = $('#'+id).css('width');
	$('#'+id).css('width','500px');
        $('#'+id+'>h3').removeClass('text-center');
        $('#'+id+'>h3').addClass('text2');
        $('#table-data').addClass('simple_table');
        $('#table-data').removeClass('table table-bordered');
        $('#filters').css('display','none');
	range.selectNode(document.getElementById(id));
	window.getSelection().removeAllRanges(); // clear current selection
	window.getSelection().addRange(range); // to select text
	document.execCommand("copy");
	window.getSelection().removeAllRanges();// to deselect
        $('#filters').css('display','');
        $('#'+id+'>h3').addClass('text-center');
	$('#'+id).css('width',width);
        $('#table-data').removeClass('simple_table');
        $('#'+id+'>h3').removeClass('text2');
        $('#table-data').addClass('table table-bordered');
        alert('Reprot Copied to Clipboard\nReady to Paste anywhere!');
}
var oldPrintFunction = window.print;

window.print = function () {
    console.log('hi');
    id="main_document";
    var width = $('#'+id).css('width');
    console.log(width);
	$('#'+id).css('width','800px');
        $('#'+id+'>h3').removeClass('text-center');
        $('#'+id+'>h3').addClass('text2');
        $('#table-data').addClass('simple_table');
        $('#table-data').removeClass('table table-bordered');
        $('#filters').css('display','none');
    
	oldPrintFunction();
    	$('#filters').css('display','');
        $('#'+id+'>h3').addClass('text-center');
	$('#'+id).css('width',width);
        $('#table-data').removeClass('simple_table');
        $('#'+id+'>h3').removeClass('text2');
        $('#table-data').addClass('table table-bordered');
    
};
jQuery(document).bind("keyup keydown", function(e) {
   if (e.ctrlKey && e.keyCode == 80) {
      window.print();
      return false;
   }
});
</script>
</html>