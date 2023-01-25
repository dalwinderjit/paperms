<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MSK Report II</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
           <script>
function myFunction() {
    window.print();
}
</script>
<?php $ninfo = $this->session->userdata('rid'); ?>
</head>
<body>
    <h3 class="text-center">DETAIL OF TENTS <?php $val = explode(' ', $info->nick); echo $val[0];  ?> <?php $val = explode(' ', $info->nick2); echo $val[0];  ?> FOR THE MONTH OF <?php echo strtoupper(date('M-Y')); ?></h3>
        
        <div class="row">
          <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered"  id="table">
              <thead>
                 <tr>
                  <th>Sr No.</th>
                  <th>Name of Tents </th>
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
              <tr>
                <td>1</td>
                <td>Store Tent</td>
               <td><?php $sans = info_fetch_msksan('Store Tent D/F',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Store Tent D/F',$ninfo); 
                $holds = info_fetch_countmskitemiis('Store Tent D/F',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Store Tent D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Store Tent D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Store Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Store Tent D/F',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Store Tent D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Store Tent D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Store Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Store Tent D/F',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Store Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Store Tent D/F',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>                
              </tr>
              <tr>
                <td>2</td>
                <td>EPIP Tent</td>
                 <td><?php $sans = info_fetch_msksan('EPIP Tent D/F',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('EPIP Tent D/F',$ninfo); 
                $holds = info_fetch_countmskitemiis('EPIP Tent D/F',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('EPIP Tent D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('EPIP Tent D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('EPIP Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Tent D/F',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('EPIP Tent D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('EPIP Tent D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('EPIP Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Tent D/F',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('EPIP Tent D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Tent D/F',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
                </tr>
              <tr>
              <td>3</td>
                <td>EPIP Water Proof Tent</td>
                 <td><?php $sans = info_fetch_msksan('EPIP Water Proof Tent',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('EPIP Water Proof Tent',$ninfo); 
                $holds = info_fetch_countmskitemiis('EPIP Water Proof Tent',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('EPIP Water Proof Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('EPIP Water Proof Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('EPIP Water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Water Proof Tent',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('EPIP Water Proof Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('EPIP Water Proof Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('EPIP Water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Water Proof Tent',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('EPIP Water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('EPIP Water Proof Tent',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
                </tr>
                <tr>
                 <td>4</td>
                <td>180 LBS Tent</td>
                   <td><?php $sans = info_fetch_msksan('Tent 180 LBS',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Tent 180 LBS',$ninfo); 
                $holds = info_fetch_countmskitemiis('Tent 180 LBS',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Tent 180 LBS',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Tent 180 LBS',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Tent 180 LBS',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 180 LBS',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Tent 180 LBS',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Tent 180 LBS',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Tent 180 LBS',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 180 LBS',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Tent 180 LBS',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 180 LBS',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>5</td>
                <td>180 LBS water Proof Tent</td>
                 <td><?php $sans = info_fetch_msksan('180 LBS water Proof Tent',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('180 LBS water Proof Tent',$ninfo); 
                $holds = info_fetch_countmskitemiis('180 LBS water Proof Tent',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('180 LBS water Proof Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('180 LBS water Proof Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('180 LBS water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('180 LBS water Proof Tent',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('180 LBS water Proof Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('180 LBS water Proof Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('180 LBS water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('180 LBS water Proof Tent',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('180 LBS water Proof Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('180 LBS water Proof Tent',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>6</td>
                <td>40 LBS Tent </td>
                 <td><?php $sans = info_fetch_msksan('Tent 40 Pound D/F',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Tent 40 Pound D/F',$ninfo); 
                $holds = info_fetch_countmskitemiis('Tent 40 Pound D/F',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Tent 40 Pound D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Tent 40 Pound D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Tent 40 Pound D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 40 Pound D/F',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Tent 40 Pound D/F',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Tent 40 Pound D/F',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Tent 40 Pound D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 40 Pound D/F',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Tent 40 Pound D/F',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent 40 Pound D/F',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>7</td>
                <td> Latrine Tent</td>
                  <td><?php $sans = info_fetch_msksan('Latrine Tent',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Latrine Tent',$ninfo); 
                $holds = info_fetch_countmskitemiis('Latrine Tent',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Latrine Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Latrine Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Latrine Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Latrine Tent',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Latrine Tent',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Latrine Tent',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Latrine Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Latrine Tent',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Latrine Tent',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Latrine Tent',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>8</td>
                <td> Tent Service Pole</td>
                  <td><?php $sans = info_fetch_msksan('Tent Service Pole',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Tent Service Pole',$ninfo); 
                $holds = info_fetch_countmskitemiis('Tent Service Pole',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Tent Service Pole',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Tent Service Pole',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Tent Service Pole',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent Service Pole',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Tent Service Pole',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Tent Service Pole',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Tent Service Pole',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent Service Pole',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Tent Service Pole',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Tent Service Pole',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Swiss Cottage 10"x10"</td>
                 <td><?php $sans = info_fetch_msksan('Swiss Cottage 10"x10"',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Swiss Cottage 10"x10"',$ninfo); 
                $holds = info_fetch_countmskitemiis('Swiss Cottage 10"x10"',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Swiss Cottage 10"x10"',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Swiss Cottage 10"x10"',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 10"x10"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 10"x10"',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Swiss Cottage 10"x10"',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Swiss Cottage 10"x10"',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 10"x10"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 10"x10"',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 10"x10"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 10"x10"',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Swiss Cottage 12"x12"</td>
                 <td><?php $sans = info_fetch_msksan('Swiss Cottage 12"x12"',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Swiss Cottage 12"x12"',$ninfo); 
                $holds = info_fetch_countmskitemiis('Swiss Cottage 12"x12"',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Swiss Cottage 12"x12"',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Swiss Cottage 12"x12"',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 12"x12"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 12"x12"',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Swiss Cottage 12"x12"',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Swiss Cottage 12"x12"',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 12"x12"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 12"x12"',$ninfo); 
                $z = $ser1->recqut + $ser2->quantity;
                 echo $i + $j -$z;
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Swiss Cottage 12"x12"',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Swiss Cottage 12"x12"',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
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