<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MSK Report III</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
           <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>  
            <h3 class="text-center">DETAIL OF MISCELLANEOUS ARTICLES <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> <?php $val = explode(' ', $this->session->userdata('nick2')); echo $val[0];  ?> FOR THE MONTH OF <?php echo strtoupper(date('M-Y')); ?></h3>
                    <div class="row">
          <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered"  id="table">
              <thead>
                 <tr>
                  <th>Sr No.</th>
                  <th>Name of Article </th>
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
                <td>Steel Bed Nawari</td>
                 <td><?php $sans = info_fetch_msksan('Steel Bed Nawari',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Steel Bed Nawari',$ninfo); 
                $holds = info_fetch_countmskitemiis('Steel Bed Nawari',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Steel Bed Nawari',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Steel Bed Nawari',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Steel Bed Nawari',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Nawari',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Steel Bed Nawari',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Steel Bed Nawari',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Steel Bed Nawari',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Nawari',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Steel Bed Nawari',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Steel Bed Nawari',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Nawari',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td> -</td>
              </tr>
               <tr>
                <td>2</td>
                <td>Steel Bed Wooden</td>
                 <td><?php $sans = info_fetch_msksan('Steel Bed Wooden',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Steel Bed Wooden',$ninfo); 
                $holds = info_fetch_countmskitemiis('Steel Bed Wooden',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Steel Bed Wooden',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Steel Bed Wooden',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Steel Bed Wooden',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Wooden',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Steel Bed Wooden',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Steel Bed Wooden',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Steel Bed Wooden',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Wooden',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Steel Bed Wooden',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Steel Bed Wooden',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Steel Bed Wooden',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Pedestal Fan</td>
                  <td><?php $sans = info_fetch_msksan('Pedestal Fan',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php //$hold = info_fetch_countmskitemii('Pedestal Fan',$ninfo); 
                $holds = info_fetch_countmskitemiis('Pedestal Fan',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Pedestal Fan',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Pedestal Fan',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Pedestal Fan',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Pedestal Fan',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Pedestal Fan',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Pedestal Fan',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Pedestal Fan',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Pedestal Fan',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Pedestal Fan',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Pedestal Fan',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Pedestal Fan',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>4</td>
                <td>Heater</td>
                 <td><?php $sans = info_fetch_msksan('Heater',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Heater',$ninfo); 
                $holds = info_fetch_countmskitemiis('Heater',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Heater',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Heater',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Heater',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Heater',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Heater',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Heater',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Heater',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Heater',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Heater',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Heater',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Heater',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>5</td>
                <td>Hot Case</td>
               <td><?php $sans = info_fetch_msksan('Hot Case',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Hot Case',$ninfo); 
                $holds = info_fetch_countmskitemiis('Hot Case',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Hot Case',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Hot Case',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Hot Case',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Hot Case',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Hot Case',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Hot Case',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Hot Case',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Hot Case',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Hot Case',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Hot Case',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Hot Case',$ninfo); 
                  echo $ser1->recqut + $ser2->quantity; ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>6</td>
                <td>Gloves</td>
               <td><?php $sans = info_fetch_msksan('Gloves',$ninfo); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Gloves',$ninfo); 
                $holds = info_fetch_countmskitemiis('Gloves',$ninfo);
                 //if($hold!='' && $holds!=''){//echo $hold->qty + $holds->issued;}else{echo "-";}
                $asec = '';
                 $ser1 = info_fetch_countserviable('Gloves',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}
                  $bsec = '';
                  $ser1 = info_fetch_countunserviable('Gloves',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}

                 $csec = '';
                 $ser1 = info_fetch_countunserviables('Gloves',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Gloves',$ninfo); 
                  $csec.= $ser1->recqut /*+ $ser2->quantity*/;
                 echo $t =  $asec + $bsec + $csec;
                 ?></td>
                <td><?php   $i = '';
                if($holds!=''){echo $i .= $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php echo $j = $t - $i; ?></td>
                <td><?php /*$asec = '';
                 $ser1 = info_fetch_countserviable('Gloves',$ninfo); 
                 if($ser1!=''){ $asec .= $ser1->recqut;}

                 $bsec = '';
                 $ser1 = info_fetch_countunserviable('Gloves',$ninfo); 
                 if($ser1!=''){ $bsec .= $ser1->total;}
                 echo $asec + $bsec;*/ 
                 $ser1 = info_fetch_countunserviables('Gloves',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Gloves',$ninfo); 
                 $ser3 = info_fetch_countunserviablesdepoo('Gloves',$ninfo); 
                 
                 $z = $ser1->recqut + $ser2->quantity; 
                 echo $i + $j - $z - ($ser3->quantity);
                   ?></td>
               <td><?php 
                 $ser1 = info_fetch_countunserviables('Gloves',$ninfo); 
                 $ser2 = info_fetch_countunserviablesdep('Gloves',$ninfo); 
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