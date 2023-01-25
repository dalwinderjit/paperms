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
<?php $ninfo = $this->session->userdata('rid'); ?>
</head>
<body>
  
  <h3 class="text-center">DETAIL OF ANTI RIOT & SECURITY EQUIPMENTS <?php $val = explode(' ', $info->nick); echo $val[0];  ?> <?php $val = explode(' ', $info->nick2); echo $val[0];  ?> FOR THE MONTH OF <?php echo strtoupper(date('M-Y')); ?></h3>
<h4 class="text-right">Till: <?php echo date('d-m-Y'); ?></h4>

       
        <div class="row">
          <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered"  id="table">
              <thead>
                 <tr>
                  <th>Sr No.</th>
                  <th>Name of Equipments </th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Issued</th>
                  <th>Total In Store</th>
                  <th>Serviceable</th>
                  <th>Un-Serviceable</th>
                  <th>Temp-Recevied from other Unit</th>
                  <th>Temp-Issued to other Unit</th>
                 </tr>
              </thead>
              <tbody>
              <tr><td colspan="9">Category (A) Anti Riot Equipments</td></tr>
              <tr>
                <td>1</td>
                <td>Body protector Set</td>
                  <td><?php $sans = info_fetch_msksan('Body Protector',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Body Protector',$ninfo); 
                $holds = info_fetch_countmskitemiis('Body Protector',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Body Protector',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Body Protector',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Body Protector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Body Protector',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Body Protector',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Body Protector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Body Protector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
              <td>2</td>
                <td>Body Protector (Training)</td>
                  <td><?php $sans = info_fetch_msksan('Body Protector (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Body Protector (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Body Protector (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Body Protector (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Body Protector (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Body Protector (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Body Protector (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Body Protector (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Body Protector (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Body Protector (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Body Protector (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>3</td>
                <td>ProtectiveVest</td>
                 <td><?php $sans = info_fetch_msksan('ProtectiveVest',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('ProtectiveVest',$ninfo); 
                $holds = info_fetch_countmskitemiis('ProtectiveVest',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('ProtectiveVest',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('ProtectiveVest',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('ProtectiveVest',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('ProtectiveVest',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('ProtectiveVest',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('ProtectiveVest',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('ProtectiveVest',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('ProtectiveVest',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('ProtectiveVest',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('ProtectiveVest',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>4</td>
                <td>P.C Shield</td>
                   <td><?php $sans = info_fetch_msksan('PC Shield',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Shield',$ninfo); 
                $holds = info_fetch_countmskitemiis('PC Shield',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('PC Shield',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('PC Shield',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('PC Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('PC Shield',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('PC Shield',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('PC Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('PC Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
               <td>5</td>
                <td>PC Shield (Training)</td>
                   <td><?php $sans = info_fetch_msksan('PC Shield (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Shield (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('PC Shield (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('PC Shield (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('PC Shield (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('PC Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('PC Shield (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('PC Shield (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('PC Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('PC Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Shield (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>6</td>
                <td>Cane Shield</td>
                   <td><?php $sans = info_fetch_msksan('Cane Shield',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Cane Shield',$ninfo); 
                $holds = info_fetch_countmskitemiis('Cane Shield',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Cane Shield',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Cane Shield',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Cane Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Cane Shield',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Cane Shield',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Cane Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Cane Shield',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <tr>
                <td>7</td>
                <td>Cane Shield (Training)</td>
                   <td><?php $sans = info_fetch_msksan('Cane Shield (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Cane Shield (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Cane Shield (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Cane Shield (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Cane Shield (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Cane Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Cane Shield (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Cane Shield (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Cane Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Cane Shield (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Cane Shield (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>8</td>
                <td>Helmet</td>
                    <td><?php $sans = info_fetch_msksan('Helmet',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Helmet',$ninfo); 
                $holds = info_fetch_countmskitemiis('Helmet',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Helmet',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Helmet',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Helmet',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>9</td>
                <td>FRB Helmet</td>
                    <td><?php $sans = info_fetch_msksan('FRB Helmet',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('FRB Helmet',$ninfo); 
                $holds = info_fetch_countmskitemiis('FRB Helmet',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('FRB Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('FRB Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('FRB Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('FRB Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('FRB Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('FRB Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('FRB Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
              <tr>
                <td>10</td>
                <td>FRB Helmet (Training)</td>
                   <td><?php $sans = info_fetch_msksan('FRB Helmet (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('FRB Helmet (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('FRB Helmet (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('FRB Helmet (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('FRB Helmet (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('FRB Helmet (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('FRB Helmet (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('FRB Helmet (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('FRB Helmet (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('FRB Helmet (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('FRB Helmet (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>11</td>
                <td> P.C Lathies Small</td>
                  <td><?php $sans = info_fetch_msksan('PC Lathies',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Lathies',$ninfo); 
                $holds = info_fetch_countmskitemiis('PC Lathies',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('PC Lathies',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('PC Lathies',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('PC Lathies',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('PC Lathies',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('PC Lathies',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('PC Lathies',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('PC Lathies',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
               <tr>
                <td>12</td>
                <td> PC Lathies Small (Training)</td>
                  <td><?php $sans = info_fetch_msksan('PC Lathies Small (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Lathies Small (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('PC Lathies Small (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('PC Lathies Small (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('PC Lathies Small (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('PC Lathies Small (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies Small (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('PC Lathies Small (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('PC Lathies Small (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('PC Lathies Small (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies Small (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('PC Lathies Small (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PC Lathies Small (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>13</td>
                <td>Lathies Short Bamboos</td>
                <td><?php $sans = info_fetch_msksan('Lathies Short Bamboos',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Short Bamboos',$ninfo); 
                $holds = info_fetch_countmskitemiis('Lathies Short Bamboos',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Short Bamboos',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Lathies Short Bamboos',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Short Bamboos',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Lathies Short Bamboos',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>14</td>
                <td>Lathies Short Bamboos (Training)</td>
                <td><?php $sans = info_fetch_msksan('Lathies Short Bamboos (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Short Bamboos (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Lathies Short Bamboos (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Short Bamboos (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Lathies Short Bamboos (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Short Bamboos (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Lathies Short Bamboos (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Lathies Short Bamboos (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Short Bamboos (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>15</td>
                <td>Lathies Long Bamboos</td>
                <td><?php $sans = info_fetch_msksan('Lathies Long Bamboo',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Long Bamboo',$ninfo); 
                $holds = info_fetch_countmskitemiis('Lathies Long Bamboo',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Long Bamboo',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Lathies Long Bamboo',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Long Bamboo',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Lathies Long Bamboo',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>16</td>
                <td> Lathies Long Bamboo (Training)</td>
                  <td><?php $sans = info_fetch_msksan('Lathies Long Bamboo (Training)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Long Bamboo (Training)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Lathies Long Bamboo (Training)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Long Bamboo (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Lathies Long Bamboo (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo (Training)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Lathies Long Bamboo (Training)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Lathies Long Bamboo (Training)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo (Training)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Lathies Long Bamboo (Training)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Lathies Long Bamboo (Training)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
               <td>17</td>
                <td>Shock Batten (Jawala)</td>
                 <td><?php $sans = info_fetch_msksan('Shock Batten (Jawala)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Shock Batten (Jawala)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Shock Batten (Jawala)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Jawala)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Shock Batten (Jawala)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Jawala)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Shock Batten (Jawala)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
               <td>18</td>
                <td>Shock Batten (Jawala) (Training))</td>
                 <td><?php $sans = info_fetch_msksan('Shock Batten (Jawala) (Training))',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Shock Batten (Jawala) (Training))',$ninfo); 
                $holds = info_fetch_countmskitemiis('Shock Batten (Jawala) (Training))',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Jawala) (Training))',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Shock Batten (Jawala) (Training))',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala) (Training))',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala) (Training))',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Jawala) (Training))',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Shock Batten (Jawala) (Training))',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala) (Training))',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala) (Training))',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Jawala) (Training))',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Jawala) (Training))',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>19</td>
                <td>Shock Batten (Defender)</td>
                 <td><?php $sans = info_fetch_msksan('Shock Batten (Defender)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Shock Batten (Defender)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Shock Batten (Defender)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Defender)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Shock Batten (Defender)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Shock Batten (Defender)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Defender)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Shock Batten (Defender)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Shock Batten (Defender)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Defender)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Defender)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Shock Batten (Defender)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Shock Batten (Defender)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                  <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>20</td>
                <td>Riot Control Barricades</td>
                  <td><?php $sans = info_fetch_msksan('Riot Control Barricades',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Riot Control Barricades',$ninfo); 
                $holds = info_fetch_countmskitemiis('Riot Control Barricades',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Riot Control Barricades',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Riot Control Barricades',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Riot Control Barricades',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Riot Control Barricades',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Riot Control Barricades',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Riot Control Barricades',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Riot Control Barricades',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Riot Control Barricades',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Riot Control Barricades',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Riot Control Barricades',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr><td colspan="9">Category (B) Bullet Proof Equipments</td></tr>
            <tr>
                <td>1</td>
                <td>B.P Jacket (Weight Wise in KG)</td>
                 <td><?php $sans = info_fetch_msksan('B.P Jacket',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Jacket',$ninfo); 
                $holds = info_fetch_countmskitemiis('B.P Jacket',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('B.P Jacket',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('B.P Jacket',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('B.P Jacket',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Jacket',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('B.P Jacket',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('B.P Jacket',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('B.P Jacket',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Jacket',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('B.P Jacket',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Jacket',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>B.P Morcha</td>
                 <td><?php $sans = info_fetch_msksan('B.P Morcha',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Morcha',$ninfo); 
                $holds = info_fetch_countmskitemiis('B.P Morcha',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('B.P Morcha',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('B.P Morcha',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('B.P Morcha',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Morcha',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('B.P Morcha',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('B.P Morcha',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('B.P Morcha',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Morcha',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('B.P Morcha',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Morcha',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>3</td>
                <td>B.P Patka</td>
                 <td><?php $sans = info_fetch_msksan('B.P Patka',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Patka',$ninfo); 
                $holds = info_fetch_countmskitemiis('B.P Patka',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('B.P Patka',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('B.P Patka',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('B.P Patka',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Patka',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('B.P Patka',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('B.P Patka',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('B.P Patka',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Patka',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('B.P Patka',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Patka',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>4</td>
                <td>B.P Helmet</td>
                <td><?php $sans = info_fetch_msksan('B.P Helmet',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Helmet',$ninfo); 
                $holds = info_fetch_countmskitemiis('B.P Helmet',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('B.P Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('B.P Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('B.P Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Helmet',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('B.P Helmet',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('B.P Helmet',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('B.P Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Helmet',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('B.P Helmet',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('B.P Helmet',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr><td colspan="9">Category (C) Security Equipments</td></tr>
                           <tr>
                <td>1</td>
                <td>Mega Phone</td>
                 <td><?php $sans = info_fetch_msksan('Mega Phone',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Mega Phone',$ninfo); 
                $holds = info_fetch_countmskitemiis('Mega Phone',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Mega Phone',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Mega Phone',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Mega Phone',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mega Phone',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Mega Phone',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Mega Phone',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Mega Phone',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mega Phone',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Mega Phone',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mega Phone',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Mobile Loud Speaker</td>
                <td><?php $sans = info_fetch_msksan('Mobile Loud Speaker',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Mobile Loud Speaker',$ninfo); 
                $holds = info_fetch_countmskitemiis('Mobile Loud Speaker',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Mobile Loud Speaker',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Mobile Loud Speaker',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Mobile Loud Speaker',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mobile Loud Speaker',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Mobile Loud Speaker',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Mobile Loud Speaker',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Mobile Loud Speaker',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mobile Loud Speaker',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Mobile Loud Speaker',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Mobile Loud Speaker',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>3</td>
                <td>P.A System</td>
                 <td><?php $sans = info_fetch_msksan('PA System',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PA System',$ninfo); 
                $holds = info_fetch_countmskitemiis('PA System',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('PA System',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('PA System',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('PA System',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PA System',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('PA System',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('PA System',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('PA System',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PA System',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('PA System',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('PA System',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>4</td>
                <td>Telescope</td>
                <td><?php $sans = info_fetch_msksan('Telescope',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Telescope',$ninfo); 
                $holds = info_fetch_countmskitemiis('Telescope',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Telescope',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Telescope',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Telescope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Telescope',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Telescope',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Telescope',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Telescope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Telescope',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Telescope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Telescope',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>5</td>
                <td>Night Vision Device</td>
                <td><?php $sans = info_fetch_msksan('Night Vision Device',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Night Vision Device',$ninfo); 
                $holds = info_fetch_countmskitemiis('Night Vision Device',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Night Vision Device',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Night Vision Device',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Night Vision Device',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Night Vision Device',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Night Vision Device',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Night Vision Device',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Night Vision Device',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Night Vision Device',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Night Vision Device',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Night Vision Device',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>6</td>
                <td>Binocular</td>
                 <td><?php $sans = info_fetch_msksan('Binocular',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Binocular',$ninfo); 
                $holds = info_fetch_countmskitemiis('Binocular',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Binocular',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Binocular',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Binocular',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Binocular',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Binocular',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Binocular',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Binocular',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Binocular',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Binocular',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Binocular',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Still Photography Camera</td>
               <td><?php $sans = info_fetch_msksan('Still Photography Camera',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Still Photography Camera',$ninfo); 
                $holds = info_fetch_countmskitemiis('Still Photography Camera',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Still Photography Camera',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Still Photography Camera',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Still Photography Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Still Photography Camera',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Still Photography Camera',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Still Photography Camera',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Still Photography Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Still Photography Camera',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Still Photography Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Still Photography Camera',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>8</td>
                <td> Video Camera</td>
                 <td><?php $sans = info_fetch_msksan('Video Camera',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Video Camera',$ninfo); 
                $holds = info_fetch_countmskitemiis('Video Camera',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Video Camera',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Video Camera',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Video Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Video Camera',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Video Camera',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Video Camera',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Video Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Video Camera',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Video Camera',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Video Camera',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Search Light</td>
                <td><?php $sans = info_fetch_msksan('Search Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Search Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Search Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Search Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Search Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Search Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Search Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Search Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Search Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Search Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Search Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Search Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Search Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Dragon Light</td>
                 <td><?php $sans = info_fetch_msksan('Dragon Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Dragon Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Dragon Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Dragon Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Dragon Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Dragon Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Dragon Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Dragon Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Dragon Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Dragon Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Dragon Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Dragon Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Dragon Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>11</td>
                <td>Commando Light</td>
                 <td><?php $sans = info_fetch_msksan('Commando Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Commando Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Commando Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Commando Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Commando Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Commando Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Commando Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Commando Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Commando Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Commando Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Commando Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Commando Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Commando Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Halogen Light</td>
                <td><?php $sans = info_fetch_msksan('Halogen Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Halogen Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Halogen Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Halogen Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Halogen Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Halogen Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Halogen Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Halogen Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Halogen Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Halogen Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Halogen Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Halogen Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Halogen Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>13</td>
                <td>Emergency Light</td>
                 <td><?php $sans = info_fetch_msksan('Emergency Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Emergency Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Emergency Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Emergency Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Emergency Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Emergency Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Emergency Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Emergency Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Emergency Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Emergency Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Emergency Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Emergency Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Emergency Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>

              <tr>
                <td>14</td>
                <td>Flood Light</td>
                <td><?php $sans = info_fetch_msksan('Flood Light',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Flood Light',$ninfo); 
                $holds = info_fetch_countmskitemiis('Flood Light',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Flood Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Flood Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Flood Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Flood Light',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Flood Light',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Flood Light',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Flood Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Flood Light',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Flood Light',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Flood Light',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>15</td>
                <td>HHMD</td>
                <td><?php $sans = info_fetch_msksan('HHMD',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('HHMD',$ninfo); 
                $holds = info_fetch_countmskitemiis('HHMD',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('HHMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('HHMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('HHMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHMD',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('HHMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('HHMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('HHMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHMD',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('HHMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHMD',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>16</td>
                <td>DFMD</td>
                 <td><?php $sans = info_fetch_msksan('DFMD',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('DFMD',$ninfo); 
                $holds = info_fetch_countmskitemiis('DFMD',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('DFMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('DFMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('DFMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DFMD',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('DFMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('DFMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('DFMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DFMD',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('DFMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DFMD',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                </tr>
               <tr>
                <td>17</td>
                <td>DSMD</td>
                 <td><?php $sans = info_fetch_msksan('DSMD',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('DSMD',$ninfo); 
                $holds = info_fetch_countmskitemiis('DSMD',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('DSMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('DSMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('DSMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DSMD',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('DSMD',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('DSMD',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('DSMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DSMD',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('DSMD',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('DSMD',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>18</td>
                <td>Periscope</td>
                 <td><?php $sans = info_fetch_msksan('Periscope',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Periscope',$ninfo); 
                $holds = info_fetch_countmskitemiis('Periscope',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Periscope',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Periscope',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Periscope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Periscope',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Periscope',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Periscope',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Periscope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Periscope',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Periscope',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Periscope',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>19</td>
                <td>Letter Bomb Detector</td>
                 <td><?php $sans = info_fetch_msksan('Letter Bomb Detector',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Letter Bomb Detector',$ninfo); 
                $holds = info_fetch_countmskitemiis('Letter Bomb Detector',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Letter Bomb Detector',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Letter Bomb Detector',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Letter Bomb Detector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Letter Bomb Detector',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Letter Bomb Detector',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Letter Bomb Detector',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Letter Bomb Detector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Letter Bomb Detector',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Letter Bomb Detector',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Letter Bomb Detector',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>20</td>
                <td>Inspection Mirror Trolly</td>
                 <td><?php $sans = info_fetch_msksan('Inspection Mirror Trolly',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror Trolly',$ninfo); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror Trolly',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror Trolly',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Inspection Mirror Trolly',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Inspection Mirror Trolly',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror Trolly',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror Trolly',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Inspection Mirror Trolly',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror Trolly',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror Trolly',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror Trolly',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror Trolly',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>21</td>
                <td>Inspection Mirror under vehicle</td>
                 <td><?php $sans = info_fetch_msksan('Inspection Mirror under vehicle',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror under vehicle',$ninfo); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror under vehicle',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror under vehicle',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Inspection Mirror under vehicle',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Inspection Mirror under vehicle',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror under vehicle',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror under vehicle',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Inspection Mirror under vehicle',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror under vehicle',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror under vehicle',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror under vehicle',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror under vehicle',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>22</td>
                <td>Inspection Mirror over head</td>
                 <td><?php $sans = info_fetch_msksan('Inspection Mirror over head',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror over head',$ninfo); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror over head',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror over head',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Inspection Mirror over head',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Inspection Mirror over head',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror over head',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Inspection Mirror over head',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Inspection Mirror over head',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror over head',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror over head',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Inspection Mirror over head',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Inspection Mirror over head',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>23</td>
                <td>Prodder/Probe</td>
                <td><?php $sans = info_fetch_msksan('Prodder/Probe',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Prodder/Probe',$ninfo); 
                $holds = info_fetch_countmskitemiis('Prodder/Probe',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Prodder/Probe',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Prodder/Probe',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Prodder/Probe',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Prodder/Probe',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Prodder/Probe',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Prodder/Probe',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Prodder/Probe',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Prodder/Probe',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Prodder/Probe',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Prodder/Probe',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
              </tr>
               <tr>
                <td>24</td>
                <td>HHTF</td>
                <td><?php $sans = info_fetch_msksan('HHTF',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('HHTF',$ninfo); 
                $holds = info_fetch_countmskitemiis('HHTF',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('HHTF',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('HHTF',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('HHTF',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHTF',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('HHTF',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('HHTF',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('HHTF',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHTF',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('HHTF',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('HHTF',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>25</td>
                <td>Life Saving Jackets</td>
                <td><?php $sans = info_fetch_msksan('Life Saving Jackets',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Life Saving Jackets',$ninfo); 
                $holds = info_fetch_countmskitemiis('Life Saving Jackets',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Life Saving Jackets',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Life Saving Jackets',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Life Saving Jackets',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Life Saving Jackets',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Life Saving Jackets',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Life Saving Jackets',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Life Saving Jackets',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Life Saving Jackets',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Life Saving Jackets',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Life Saving Jackets',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>26</td>
                <td>Fire Extinguisher</td>
                <td><?php $sans = info_fetch_msksan('Fire Extinguisher',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Fire Extinguisher',$ninfo); 
                $holds = info_fetch_countmskitemiis('Fire Extinguisher',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Fire Extinguisher',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Fire Extinguisher',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Fire Extinguisher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Fire Extinguisher',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Fire Extinguisher',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Fire Extinguisher',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Fire Extinguisher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Fire Extinguisher',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Fire Extinguisher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Fire Extinguisher',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>27</td>
                <td>Folding Stretcher</td>
                <td><?php $sans = info_fetch_msksan('Folding Stretcher',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Folding Stretcher',$ninfo); 
                $holds = info_fetch_countmskitemiis('Folding Stretcher',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Folding Stretcher',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Folding Stretcher',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Folding Stretcher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Folding Stretcher',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Folding Stretcher',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Folding Stretcher',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Folding Stretcher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Folding Stretcher',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Folding Stretcher',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Folding Stretcher',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>28</td>
                <td>Tyre Killer & Boom Barrier</td>
                <td><?php $sans = info_fetch_msksan('Tyre Killer & Boom Barrier',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Tyre Killer & Boom Barrier',$ninfo); 
                $holds = info_fetch_countmskitemiis('Tyre Killer & Boom Barrier',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Tyre Killer & Boom Barrier',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Tyre Killer & Boom Barrier',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Tyre Killer & Boom Barrier',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tyre Killer & Boom Barrier',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Tyre Killer & Boom Barrier',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Tyre Killer & Boom Barrier',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Tyre Killer & Boom Barrier',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tyre Killer & Boom Barrier',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Tyre Killer & Boom Barrier',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tyre Killer & Boom Barrier',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>29</td>
                <td>Unmanned Aircraft Vehicle (UAV)</td>
                <td><?php $sans = info_fetch_msksan('Unmanned Aircraft Vehicle (UAV)',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                $holds = info_fetch_countmskitemiis('Unmanned Aircraft Vehicle (UAV)',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Unmanned Aircraft Vehicle (UAV)',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              </tbody>
               <tfoot>
                <tr>
                  <td colspan="10">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
            </div>
              </div>
</body>
</html>