<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>OSI Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
  </head>
<body> <div class="row">
          <div class="col-lg-10 col-xs-offset-1">
          <div class="table-responsive">
          
          <h3> 1. FIX DUTIES</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th>INSPR</th>
                    <th>SI</th>
                    <th>ASI </th>
                    <th>HC</th>
                    <th>CT</th>
                    <th>TOTAL</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 570px">VP GUARDS</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','VP Guards','fone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','VP Guards','fone1'); 
                      echo $insp1 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','VP Guards','fone1');
            $hold4 = info_fetch_osireportig('INSP/LR','VP Guards','fone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','VP Guards','fone1'); 
            echo $si1 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','VP Guards','fone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','VP Guards','fone1');  
                $hold8 = info_fetch_osireportig('SI/LR','VP Guards','fone1'); 
                echo $asi1 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','VP Guards','fone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','VP Guards','fone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','VP Guards','fone1');
             echo $hc1 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','VP Guards','fone1');
                       $hold13 = info_fetch_osireportig('HC/PR','VP Guards','fone1');
                        $hold14 = info_fetch_osireportig('HC/LR','VP Guards','fone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','VP Guards','fone1');
                         $hold16 = info_fetch_osireportig('C-II','VP Guards','fone1');

             echo $ct1 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>JAILS SEC.</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','Jails Security','fone2'); 
                      $hold6 = info_fetch_osireportig('DSP/CR','Jails Security','fone2'); 
                      echo $insp2 = $hold1 + $hold6;
                   ?></td>
                  <td><?php $si2 = $hold2 = info_fetch_osireportig('SI','Jails Security','fone2'); echo $hold2;  ?></td>
                  <td><?php $asi2 =  $hold3 = info_fetch_osireportig('ASI','Jails Security','fone2'); echo $hold3;  ?></td>
                  <td><?php $hc2 = $hold4 = info_fetch_osireportig('HC','Jails Security','fone2'); echo $hold4;  ?></td>
                  <td><?php $ct2 = $hold5 = info_fetch_osireportig('CT','Jails Security','fone2'); echo $hold5;  ?></td>
                  <td><?php echo   $hold1 + $hold2 + $hold3 + $hold4 + $hold5;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>PUNJAB POLICE HQRS, SEC.9 CHG</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      echo $insp3 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','Punjab Police HQRS,SEC.9,CHG','fone3');
            $hold4 = info_fetch_osireportig('INSP/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            echo $si3 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');  
                $hold8 = info_fetch_osireportig('SI/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                echo $asi3 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','Punjab Police HQRS,SEC.9,CHG','fone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');
             echo $hc3 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','Punjab Police HQRS,SEC.9,CHG','fone3');
                       $hold13 = info_fetch_osireportig('HC/PR','Punjab Police HQRS,SEC.9,CHG','fone3');
                        $hold14 = info_fetch_osireportig('HC/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $hold16 = info_fetch_osireportig('C-II','Punjab Police HQRS,SEC.9,CHG','fone3');

             echo $ct3 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iv)</td>
                  <td>DERA BEAS SECURITY DUTY</td>
                   <td><?php $hold1 = info_fetch_osireportig('INSP','DERA BEAS SECURITY DUTY','fone4'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
                      echo $insp4 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','DERA BEAS SECURITY DUTY','fone4');
            $hold4 = info_fetch_osireportig('INSP/LR','DERA BEAS SECURITY DUTY','fone4'); 
            $hold5 = info_fetch_osireportig('INSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
            echo $si4 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','DERA BEAS SECURITY DUTY','fone4'); 
                $hold7 = info_fetch_osireportig('SI/CR','DERA BEAS SECURITY DUTY','fone4');  
                $hold8 = info_fetch_osireportig('SI/LR','DERA BEAS SECURITY DUTY','fone4'); 
                echo $asi4 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','DERA BEAS SECURITY DUTY','fone4');
                    $hold10 = info_fetch_osireportig('ASI/LR','DERA BEAS SECURITY DUTY','fone4');
                     $hold11 = info_fetch_osireportig('ASI/CR','DERA BEAS SECURITY DUTY','fone4');
             echo $hc4 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','DERA BEAS SECURITY DUTY','fone4');
                       $hold13 = info_fetch_osireportig('HC/PR','DERA BEAS SECURITY DUTY','fone4');
                        $hold14 = info_fetch_osireportig('HC/LR','DERA BEAS SECURITY DUTY','fone4');
                         $hold15 = info_fetch_osireportig('Sr.Const','DERA BEAS SECURITY DUTY','fone4');
                         $hold16 = info_fetch_osireportig('C-II','DERA BEAS SECURITY DUTY','fone4');

             echo $ct4 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>v)</td>
                  <td>OTHER STATIC GUARDS</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','OTHER STSTIC GUARDS','fone5'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','OTHER STSTIC GUARDS','fone5'); 
                      echo $insp5 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','OTHER STSTIC GUARDS','fone5');
            $hold4 = info_fetch_osireportig('INSP/LR','OTHER STSTIC GUARDS','fone5'); 
            $hold5 = info_fetch_osireportig('INSP/CR','OTHER STSTIC GUARDS','fone5'); 
            echo $si5 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','OTHER STSTIC GUARDS','fone5'); 
                $hold7 = info_fetch_osireportig('SI/CR','OTHER STSTIC GUARDS','fone5');  
                $hold8 = info_fetch_osireportig('SI/LR','OTHER STSTIC GUARDS','fone5'); 
                echo $asi5 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','OTHER STSTIC GUARDS','fone5');
                    $hold10 = info_fetch_osireportig('ASI/LR','OTHER STSTIC GUARDS','fone5');
                     $hold11 = info_fetch_osireportig('ASI/CR','OTHER STSTIC GUARDS','fone5');
             echo $hc5 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','OTHER STSTIC GUARDS','fone5');
                       $hold13 = info_fetch_osireportig('HC/PR','OTHER STSTIC GUARDS','fone5');
                        $hold14 = info_fetch_osireportig('HC/LR','OTHER STSTIC GUARDS','fone5');
                         $hold15 = info_fetch_osireportig('Sr.Const','OTHER STSTIC GUARDS','fone5');
                         $hold16 = info_fetch_osireportig('C-II','OTHER STSTIC GUARDS','fone5');

             echo $ct5= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>PSOs/GUNMAN FROM BNS.(OTHER THEN ARMED OFFICERS)</td>
                 <td><?php $hold1 = info_fetch_osireportsipgs('INSP','','fone6'); 
                      $hold2 = info_fetch_osireportsipgs('DSP/CR','','fone6'); 
                      echo $insp6 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportsipgs('SI','','fone6');
            $hold4 = info_fetch_osireportsipgs('INSP/LR','','fone6'); 
            $hold5 = info_fetch_osireportsipgs('INSP/CR','','fone6'); 
            echo $si6 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportsipgs('ASI','','fone6'); 
                $hold7 = info_fetch_osireportsipgs('SI/CR','','fone6');  
                $hold8 = info_fetch_osireportsipgs('SI/LR','','fone6'); 
                echo $asi6 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportsipgs('HC','','fone6');
                    $hold10 = info_fetch_osireportsipgs('ASI/LR','','fone6');
                     $hold11 = info_fetch_osireportsipgs('ASI/CR','','fone6');
             echo $hc6 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportsipgs('CT','','fone6');
                       $hold13 = info_fetch_osireportsipgs('HC/PR','','fone6');
                        $hold14 = info_fetch_osireportsipgs('HC/LR','','fone6');
                         $hold15 = info_fetch_osireportsipgs('Sr.Const','','fone6');
                         $hold16 = info_fetch_osireportsipgs('C-II','','fone6');

             echo $ct6= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>VIP SEC.WING CHG U/82nd BN.</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      echo $insp7 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','VIP SEC.WING CHG.U/82nd BN.','fone7');
            $hold4 = info_fetch_osireportig('INSP/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            $hold5 = info_fetch_osireportig('INSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            echo $si7 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                $hold7 = info_fetch_osireportig('SI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                $hold8 = info_fetch_osireportig('SI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                echo $asi7 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','VIP SEC.WING CHG.U/82nd BN.','fone7');
                    $hold10 = info_fetch_osireportig('ASI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                     $hold11 = info_fetch_osireportig('ASI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');
             echo $hc7 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','VIP SEC.WING CHG.U/82nd BN.','fone7');
                       $hold13 = info_fetch_osireportig('HC/PR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                        $hold14 = info_fetch_osireportig('HC/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $hold15 = info_fetch_osireportig('Sr.Const','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $hold16 = info_fetch_osireportig('C-II','VIP SEC.WING CHG.U/82nd BN.','fone7');

             echo $ct7= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>POLICE SEC.WING CHG U/13th BN.</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      echo $insp8 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','POLICE SEC.WING CHG U/13th BN.','fone8');
            $hold4 = info_fetch_osireportig('INSP/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            $hold5 = info_fetch_osireportig('INSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            echo $si8 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                $hold7 = info_fetch_osireportig('SI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');  
                $hold8 = info_fetch_osireportig('SI/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                echo $asi8 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','POLICE SEC.WING CHG U/13th BN.','fone8');
                    $hold10 = info_fetch_osireportig('ASI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                     $hold11 = info_fetch_osireportig('ASI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');
             echo  $hc8 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','POLICE SEC.WING CHG U/13th BN.','fone8');
                       $hold13 = info_fetch_osireportig('HC/PR','POLICE SEC.WING CHG U/13th BN.','fone8');
                        $hold14 = info_fetch_osireportig('HC/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $hold15 = info_fetch_osireportig('Sr.Const','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $hold16 = info_fetch_osireportig('C-II','POLICE SEC.WING CHG U/13th BN.','fone8');

             echo $ct8= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>BANK SECURITY DUTY</td>
                   <td><?php $hold1 = info_fetch_osireportig('INSP','BANK SECURITY DUTY','fone9'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','BANK SECURITY DUTY','fone9'); 
                      echo $insp9 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','BANK SECURITY DUTY','fone9');
            $hold4 = info_fetch_osireportig('INSP/LR','BANK SECURITY DUTY','fone9'); 
            $hold5 = info_fetch_osireportig('INSP/CR','BANK SECURITY DUTY','fone9'); 
            echo $si9 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','BANK SECURITY DUTY','fone9'); 
                $hold7 = info_fetch_osireportig('SI/CR','BANK SECURITY DUTY','fone9');  
                $hold8 = info_fetch_osireportig('SI/LR','BANK SECURITY DUTY','fone9'); 
                echo $asi9 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','BANK SECURITY DUTY','fone9');
                    $hold10 = info_fetch_osireportig('ASI/LR','BANK SECURITY DUTY','fone9');
                     $hold11 = info_fetch_osireportig('ASI/CR','BANK SECURITY DUTY','fone9');
             echo $hc9 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','BANK SECURITY DUTY','fone9');
                       $hold13 = info_fetch_osireportig('HC/PR','BANK SECURITY DUTY','fone9');
                        $hold14 = info_fetch_osireportig('HC/LR','BANK SECURITY DUTY','fone9');
                         $hold15 = info_fetch_osireportig('Sr.Const','BANK SECURITY DUTY','fone9');
                         $hold16 = info_fetch_osireportig('C-II','BANK SECURITY DUTY','fone9');

             echo $ct9= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>x)</td>
                  <td>SPECIAL PROTECTION UNIT (C.M.SEC.)</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      echo $insp10 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
            $hold4 = info_fetch_osireportig('INSP/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            $hold5 = info_fetch_osireportig('INSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            echo $si10 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                $hold7 = info_fetch_osireportig('SI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                $hold8 = info_fetch_osireportig('SI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                echo $asi10 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                    $hold10 = info_fetch_osireportig('ASI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                     $hold11 = info_fetch_osireportig('ASI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
             echo $hc10 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                       $hold13 = info_fetch_osireportig('HC/PR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                        $hold14 = info_fetch_osireportig('HC/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $hold15 = info_fetch_osireportig('Sr.Const','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $hold16 = info_fetch_osireportig('C-II','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

             echo $ct10= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>


                 <tr>
                  <td>xi)</td>
                  <td>PB. BHAWAN, NEW DELHI (SEC DUTY)</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      echo $insp11 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
            $hold4 = info_fetch_osireportig('INSP/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            echo $si11 =   $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                $hold7 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                $hold8 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                echo $asi11 =   $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                    $hold10 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                     $hold11 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
             echo $hc11 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                       $hold13 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                        $hold14 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $hold15 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $hold16 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

             echo $ct11= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>xii)</td>
                  <td>PB. BHAWAN, NEW DELHI (RESERVE)</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      echo $insp12 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
            $hold4 = info_fetch_osireportig('INSP/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            echo $si12=  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                $hold7 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                $hold8 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                echo $asi12 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                    $hold10 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                     $hold11 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
             echo $hc12 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                       $hold13 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                        $hold14 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $hold15 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $hold16 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (RESERVE)','fone12');

             echo $ct12=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php 
                            $fix1 = info_fetch_osireportig('INSP','VP Guards','fone1');
                            $fix2 = info_fetch_osireportig('DSP/CR','VP Guards','fone1');

                            $fix3 = info_fetch_osireportig('INSP','Jails Security','fone2'); 
                            $fix4 = info_fetch_osireportig('DSP/CR','Jails Security','fone2');

                            $fix5 = info_fetch_osireportig('INSP','Punjab Police HQRS,SEC.9,CHG','fone3');  
                            $fix6 = info_fetch_osireportig('DSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                            $fix7 = info_fetch_osireportig('INSP','DERA BEAS SECURITY DUTY','fone4');  
                            $fix8 = info_fetch_osireportig('DSP/CR','DERA BEAS SECURITY DUTY','fone4');

                            $fix9 = info_fetch_osireportig('INSP','OTHER STSTIC GUARDS','fone5');  
                            $fix10 = info_fetch_osireportig('DSP/CR','OTHER STSTIC GUARDS','fone5');

                             $fix11 = info_fetch_osireportsipgs('INSP','','fone6');  
                            $fix12 = info_fetch_osireportsipgs('DSP/CR','','fone6');

                            $fix13 = info_fetch_osireportig('INSP','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                            $fix14 = info_fetch_osireportig('DSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                            $fix15 = info_fetch_osireportig('INSP','POLICE SEC.WING CHG U/13th BN.','fone8');  
                            $fix16 = info_fetch_osireportig('DSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                            $fix17 = info_fetch_osireportig('INSP','BANK SECURITY DUTY','fone9');  
                            $fix18 = info_fetch_osireportig('DSP/CR','BANK SECURITY DUTY','fone9');

                            $fix19 = info_fetch_osireportig('INSP','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                            $fix20 = info_fetch_osireportig('DSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                            $fix21 = info_fetch_osireportig('INSP','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                            $fix22 = info_fetch_osireportig('DSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                             $fix23 = info_fetch_osireportig('INSP','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                            $fix24 = info_fetch_osireportig('DSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');

                            echo $fix1 + $fix2 + $fix3 + $fix4 + $fix5 + $fix6 + $fix7 + $fix8 + $fix9 + $fix10 + $fix11 + $fix12 + $fix13 + $fix14 + $fix15 + $fix16 + $fix17 + $fix18 + $fix19 + $fix20 + $fix21 +  $fix22 + $fix23 + $fix24;
                    ?></td>
                  <td><?php 
                            $fix25 = info_fetch_osireportig('SI','VP Guards','fone1');
                            $fix26 = info_fetch_osireportig('INSP/LR','VP Guards','fone1');
                            $fix27 = info_fetch_osireportig('INSP/CR','VP Guards','fone1'); 

                            $fix28 = info_fetch_osireportig('SI','Jails Security','fone2');
                            $fix29 = info_fetch_osireportig('INSP/LR','Jails Security','fone2');  
                            $fix30 = info_fetch_osireportig('INSP/CR','Jails Security','fone2');

                            $fix31 = info_fetch_osireportig('SI','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fix32 = info_fetch_osireportig('INSP/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fix33 = info_fetch_osireportig('INSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                            $fix34 = info_fetch_osireportig('SI','DERA BEAS SECURITY DUTY','fone4');
                            $fix35 = info_fetch_osireportig('INSP/LR','DERA BEAS SECURITY DUTY','fone4');
                            $fix36 = info_fetch_osireportig('INSP/CR','DERA BEAS SECURITY DUTY','fone4');

                            $fix37 = info_fetch_osireportig('SI','OTHER STSTIC GUARDS','fone5');
                            $fix38 = info_fetch_osireportig('INSP/LR','OTHER STSTIC GUARDS','fone5');
                            $fix39 = info_fetch_osireportig('INSP/CR','OTHER STSTIC GUARDS','fone5');

                            $fix40 = info_fetch_osireportsipgs('SI','','fone6');
                            $fix41 = info_fetch_osireportsipgs('INSP/LR','','fone6');
                            $fix42 = info_fetch_osireportsipgs('INSP/CR','','fone6');

                            $fix43 = info_fetch_osireportig('SI','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fix44 = info_fetch_osireportig('INSP/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fix45 = info_fetch_osireportig('INSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                            $fix46 = info_fetch_osireportig('SI','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fix47 = info_fetch_osireportig('INSP/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fix48 = info_fetch_osireportig('INSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                            $fix49 = info_fetch_osireportig('SI','BANK SECURITY DUTY','fone9');
                            $fix50 = info_fetch_osireportig('INSP/LR','BANK SECURITY DUTY','fone9');
                            $fix51 = info_fetch_osireportig('INSP/CR','BANK SECURITY DUTY','fone9');

                            $fix52 = info_fetch_osireportig('SI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fix53 = info_fetch_osireportig('INSP/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fix54 = info_fetch_osireportig('INSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                            $fix55 = info_fetch_osireportig('SI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fix56 = info_fetch_osireportig('INSP/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fix57 = info_fetch_osireportig('INSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                            $fix58 = info_fetch_osireportig('SI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fix59 = info_fetch_osireportig('INSP/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fix60 = info_fetch_osireportig('INSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                            echo $fix25 + $fix26 + $fix27 + $fix28 + $fix29 + $fix30 + $fix31 + $fix32 + $fix33 + $fix34 + $fix35 + $fix36 + $fix37 + $fix38 + $fix39 + $fix40 + $fix41 + $fix42 + $fix43 + $fix44 + $fix45 + $fix46 + $fix47 + $fix48 + $fix49 + $fix50 + $fix51 + $fix52 + $fix53 + $fix54 + $fix55 + $fix56 + $fix57 + $fix58 + $fix59 + $fix60;
                    ?></td>
                  <td><?php 
                            $fixx52 = info_fetch_osireportig('ASI','VP Guards','fone1');
                            $fixx53 = info_fetch_osireportig('SI/LR','VP Guards','fone1');
                            $fixx54 = info_fetch_osireportig('SI/CR','VP Guards','fone1'); 

                            $fixx55 = info_fetch_osireportig('ASI','Jails Security','fone2');
                            $fixx56 = info_fetch_osireportig('SI/LR','Jails Security','fone2');  
                            $fixx57 = info_fetch_osireportig('SI/CR','Jails Security','fone2');

                           $fixx58 = info_fetch_osireportig('ASI','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fixx59 = info_fetch_osireportig('SI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');  
                            $fixx60 = info_fetch_osireportig('SI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                            $fixx61 = info_fetch_osireportig('ASI','DERA BEAS SECURITY DUTY','fone4');
                            $fixx62 = info_fetch_osireportig('SI/LR','DERA BEAS SECURITY DUTY','fone4');  
                            $fixx63 = info_fetch_osireportig('SI/CR','DERA BEAS SECURITY DUTY','fone4');

                            $fixx64 = info_fetch_osireportig('ASI','OTHER STSTIC GUARDS','fone5');
                            $fixx65 = info_fetch_osireportig('SI/LR','OTHER STSTIC GUARDS','fone5');  
                            $fixx66 = info_fetch_osireportig('SI/CR','OTHER STSTIC GUARDS','fone5');

                            $fixx67 = info_fetch_osireportsipgs('ASI','','fone6');
                            $fixx68 = info_fetch_osireportsipgs('SI/LR','','fone6');  
                            $fixx69 = info_fetch_osireportsipgs('SI/CR','','fone6');

                            $fixx70 = info_fetch_osireportig('ASI','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fixx71 = info_fetch_osireportig('SI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                            $fixx72 = info_fetch_osireportig('SI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                            $fixx73 = info_fetch_osireportig('ASI','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fixx74 = info_fetch_osireportig('SI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');  
                            $fixx75 = info_fetch_osireportig('SI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                            $fixx76 = info_fetch_osireportig('ASI','BANK SECURITY DUTY','fone9');
                            $fixx77 = info_fetch_osireportig('SI/LR','BANK SECURITY DUTY','fone9');  
                            $fixx78 = info_fetch_osireportig('SI/CR','BANK SECURITY DUTY','fone9');

                            $fixx79 = info_fetch_osireportig('ASI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fixx80 = info_fetch_osireportig('SI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                            $fixx81 = info_fetch_osireportig('SI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                            $fixx82 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fixx83 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                            $fixx84 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                            $fixx85 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fixx86 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                            $fixx87 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                            echo $fixx52 + $fixx53 + $fixx54 + $fixx55 + $fixx56 + $fixx57 + $fixx58 + $fixx59 + $fixx60 + $fixx61 + $fixx62 + $fixx63 + $fixx64 + $fixx65 + $fixx66 + $fixx67 + $fixx68 + $fixx69 + $fixx70 + $fixx71 + $fixx72 + $fixx73 + $fixx74 + $fixx75 + $fixx76 + $fixx77 + $fixx78 + $fixx79 + $fixx80 + $fixx81 + $fixx82 + $fixx83 + $fixx84 + $fixx85 + $fixx86 + $fixx87;
                    ?></td>
                  <td><?php 
                            $fiix1 = info_fetch_osireportig('HC','VP Guards','fone1');
                            $fiix2 = info_fetch_osireportig('ASI/LR','VP Guards','fone1');
                            $fiix3 = info_fetch_osireportig('ASI/CR','VP Guards','fone1'); 

                            $fiix4 = info_fetch_osireportig('HC','Jails Security','fone2');
                            $fiix5 = info_fetch_osireportig('ASI/LR','Jails Security','fone2');  
                            $fiix6 = info_fetch_osireportig('ASI/CR','Jails Security','fone2');

                            $fiix7 = info_fetch_osireportig('HC','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fiix8 = info_fetch_osireportig('ASI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fiix9 = info_fetch_osireportig('ASI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                             $fiix10 = info_fetch_osireportig('HC','DERA BEAS SECURITY DUTY','fone4');
                            $fiix11 = info_fetch_osireportig('ASI/LR','DERA BEAS SECURITY DUTY','fone4');
                            $fiix12 = info_fetch_osireportig('ASI/CR','DERA BEAS SECURITY DUTY','fone4');

                             $fiix13 = info_fetch_osireportig('HC','OTHER STSTIC GUARDS','fone5');
                            $fiix14 = info_fetch_osireportig('ASI/LR','OTHER STSTIC GUARDS','fone5');
                            $fiix15 = info_fetch_osireportig('ASI/CR','OTHER STSTIC GUARDS','fone5');

                             $fiix16 = info_fetch_osireportsipgs('HC','','fone6');
                            $fiix17 = info_fetch_osireportsipgs('ASI/LR','','fone6');
                            $fiix18 = info_fetch_osireportsipgs('ASI/CR','','fone6');

                             $fiix19 = info_fetch_osireportig('HC','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fiix20 = info_fetch_osireportig('ASI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fiix21 = info_fetch_osireportig('ASI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                             $fiix22 = info_fetch_osireportig('HC','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fiix23 = info_fetch_osireportig('ASI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fiix24 = info_fetch_osireportig('ASI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                             $fiix25 = info_fetch_osireportig('HC','BANK SECURITY DUTY','fone9');
                            $fiix26 = info_fetch_osireportig('ASI/LR','BANK SECURITY DUTY','fone9');
                            $fiix27 = info_fetch_osireportig('ASI/CR','BANK SECURITY DUTY','fone9');

                             $fiix28 = info_fetch_osireportig('HC','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fiix29 = info_fetch_osireportig('ASI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fiix30 = info_fetch_osireportig('ASI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                             $fiix31 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fiix32 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fiix33 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                             $fiix34 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fiix35 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fiix36 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                            echo $fiix1 + $fiix2 + $fiix3 + $fiix4 + $fiix5 + $fiix6 + $fiix7 + $fiix8 + $fiix9 + $fiix10 + $fiix11+ $fiix12 + $fiix13 + $fiix14 + $fiix15 + $fiix16 + $fiix17 + $fiix18 + $fiix19 + $fiix20 + $fiix21 + $fiix22 + $fiix23 + $fiix24 + $fiix25 + $fiix26 + $fiix27 + $fiix28 + $fiix29 + $fiix30 + $fiix31 + $fiix32 + $fiix32 + $fiix33 + $fiix34 + $fiix35 + $fiix36;
                    ?></td>
                  <td><?php 
                            $fx1 = info_fetch_osireportig('CT','VP Guards','fone1');
                            $fx2 = info_fetch_osireportig('HC/PR','VP Guards','fone1');
                            $fx3 = info_fetch_osireportig('HC/LR','VP Guards','fone1');
                            $fx4 = info_fetch_osireportig('Sr.Const','VP Guards','fone1');
                             $fx5 = info_fetch_osireportig('C-II','VP Guards','fone1'); 

                            $fx6 = info_fetch_osireportig('CT','Jails Security','fone2');
                            $fx7 = info_fetch_osireportig('HC/PR','Jails Security','fone2');  
                            $fx8 = info_fetch_osireportig('HC/LR','Jails Security','fone2');
                            $fx9 = info_fetch_osireportig('Sr.Const','Jails Security','fone2');
                            $fx10 = info_fetch_osireportig('C-II','Jails Security','fone2');

                            $fx11 = info_fetch_osireportig('CT','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx12 = info_fetch_osireportig('HC/PR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx13 = info_fetch_osireportig('HC/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx14 = info_fetch_osireportig('Sr.Const','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx15 = info_fetch_osireportig('C-II','Punjab Police HQRS,SEC.9,CHG','fone3');


                            $fx16 = info_fetch_osireportig('CT','DERA BEAS SECURITY DUTY','fone4');
                            $fx17 = info_fetch_osireportig('HC/PR','DERA BEAS SECURITY DUTY','fone4');
                            $fx18 = info_fetch_osireportig('HC/LR','DERA BEAS SECURITY DUTY','fone4');
                            $fx19 = info_fetch_osireportig('Sr.Const','DERA BEAS SECURITY DUTY','fone4');
                            $fx20 = info_fetch_osireportig('C-II','DERA BEAS SECURITY DUTY','fone4');

                            $fx21 = info_fetch_osireportig('CT','OTHER STSTIC GUARDS','fone5');
                            $fx22 = info_fetch_osireportig('HC/PR','OTHER STSTIC GUARDS','fone5');
                            $fx23 = info_fetch_osireportig('HC/LR','OTHER STSTIC GUARDS','fone5');
                            $fx24 = info_fetch_osireportig('Sr.Const','OTHER STSTIC GUARDS','fone5');
                            $fx25 = info_fetch_osireportig('C-II','OTHER STSTIC GUARDS','fone5');


                            $fx26 = info_fetch_osireportsipgs('CT','','fone6');
                            $fx27 = info_fetch_osireportsipgs('HC/PR','','fone6');
                            $fx28 = info_fetch_osireportsipgs('HC/LR','','fone6');
                            $fx29 = info_fetch_osireportsipgs('Sr.Const','','fone6');
                            $fx30 = info_fetch_osireportsipgs('C-II','','fone6');


                            $fx31 = info_fetch_osireportig('CT','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx32 = info_fetch_osireportig('HC/PR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx33 = info_fetch_osireportig('HC/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx34 = info_fetch_osireportig('Sr.Const','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx35 = info_fetch_osireportig('C-II','VIP SEC.WING CHG.U/82nd BN.','fone7');


                            $fx36 = info_fetch_osireportig('CT','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx37 = info_fetch_osireportig('HC/PR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx38 = info_fetch_osireportig('HC/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx39 = info_fetch_osireportig('Sr.Const','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx40 = info_fetch_osireportig('C-II','POLICE SEC.WING CHG U/13th BN.','fone8');


                            $fx41 = info_fetch_osireportig('CT','BANK SECURITY DUTY','fone9');
                            $fx42 = info_fetch_osireportig('HC/PR','BANK SECURITY DUTY','fone9');
                            $fx43 = info_fetch_osireportig('HC/LR','BANK SECURITY DUTY','fone9');
                            $fx44 = info_fetch_osireportig('Sr.Const','BANK SECURITY DUTY','fone9');
                            $fx45 = info_fetch_osireportig('C-II','BANK SECURITY DUTY','fone9');


                            $fx46 = info_fetch_osireportig('CT','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx47 = info_fetch_osireportig('HC/PR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx48 = info_fetch_osireportig('HC/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx49 = info_fetch_osireportig('Sr.Const','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx50 = info_fetch_osireportig('C-II','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');


                            $fx51 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx52 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx53 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx54 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx55 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                             $fx56 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx57 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx58 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx59 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx60 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                     echo $fx1 + $fx2 + $fx3 + $fx4 + $fx5 + $fx6 + $fx7 + $fx8 + $fx9 + $fx10 + $fx11 + $fx12 + $fx13 + $fx14 + $fx15 + $fx16 + $fx17 + $fx18 + $fx19 + $fx20 + $fx21 + $fx22 + $fx23 + $fx24 + $fx25 + $fx26 + $fx27 + $fx28 + $fx29 + $fx30 + $fx31 + $fx32 + $fx33 + $fx34 + $fx35 + $fx36 + $fx37 + $fx38 + $fx39 + $fx40 + $fx41 + $fx42 + $fx43 + $fx44 + $fx45 + $fx46 + $fx47 + $fx48 + $fx49 + $fx50 + $fx51 + $fx52 + $fx53 + $fx54 + $fx55 + $fx56 + $fx57 + $fx58 + $fx59 + $fx60;
                    ?></td>
                  <td><?php  



                      echo $fixings = $fix1 + $fix2 + $fix3 + $fix4 + $fix5 + $fix6 + $fix7 + $fix8 + $fix9 + $fix10 + $fix11 + $fix12 + $fix13 + $fix14 + $fix15 + $fix16 + $fix17 + $fix18 + $fix19 + $fix20 + $fix21 +  $fix22 + $fix23 + $fix24 + $fix25 + $fix26 + $fix27 + $fix28 + $fix29 + $fix30 + $fix31 + $fix32 + $fix33 + $fix34 + $fix35 + $fix36 + $fix37 + $fix38 + $fix39 + $fix40 + $fix41 + $fix42 + $fix43 + $fix44 + $fix45 + $fix46 + $fix47 + $fix48 + $fix49 + $fix50 + $fix51 + $fix52 + $fix53 + $fix54 + $fix55 + $fix56 + $fix57 + $fix58 + $fix59 + $fix60 + $fixx52 + $fixx53 + $fixx54 + $fixx55 + $fixx56 + $fixx57 + $fixx58 + $fixx59 + $fixx60 + $fixx61 + $fixx62 + $fixx63 + $fixx64 + $fixx65 + $fixx66 + $fixx67 + $fixx68 + $fixx69 + $fixx70 + $fixx71 + $fixx72 + $fixx73 + $fixx74 + $fixx75 + $fixx76 + $fixx77 + $fixx78 + $fixx79 + $fixx80 + $fixx81 + $fixx82 + $fixx83 + $fixx84 + $fixx85 + $fixx86 + $fixx87 + $fiix1 + $fiix2 + $fiix3 + $fiix4 + $fiix5 + $fiix6 + $fiix7 + $fiix8 + $fiix9 + $fiix10 + $fiix11+ $fiix12 + $fiix13 + $fiix14 + $fiix15 + $fiix16 + $fiix17 + $fiix18 + $fiix19 + $fiix20 + $fiix21 + $fiix22 + $fiix23 + $fiix24 + $fiix25 + $fiix26 + $fiix27 + $fiix28 + $fiix29 + $fiix30 + $fiix31 + $fiix32 + $fiix32 + $fiix33 + $fiix34 + $fiix35 + $fiix36 + $fx1 + $fx2 + $fx3 + $fx4 + $fx5 + $fx6 + $fx7 + $fx8 + $fx9 + $fx10 + $fx11 + $fx12 + $fx13 + $fx14 + $fx15 + $fx16 + $fx17 + $fx18 + $fx19 + $fx20 + $fx21 + $fx22 + $fx23 + $fx24 + $fx25 + $fx26 + $fx27 + $fx28 + $fx29 + $fx30 + $fx31 + $fx32 + $fx33 + $fx34 + $fx35 + $fx36 + $fx37 + $fx38 + $fx39 + $fx40 + $fx41 + $fx42 + $fx43 + $fx44 + $fx45 + $fx46 + $fx47 + $fx48 + $fx49 + $fx50 + $fx51 + $fx52 + $fx53 + $fx54 + $fx55 + $fx56 + $fx57 + $fx58 + $fx59 + $fx60;

                    ?>

                   </td>
                </tr>
              </tbody>
           </table>

                     <h3> 2. LAW & ORDER DUTY</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 570px">PERMANENT DUTY</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','PERMANENT DUTY','lone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PERMANENT DUTY','lone1'); 
                      echo $insp13 =  $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PERMANENT DUTY','lone1');
            $hold4 = info_fetch_osireportig('INSP/LR','PERMANENT DUTY','lone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PERMANENT DUTY','lone1'); 
            echo $si13= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PERMANENT DUTY','lone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','PERMANENT DUTY','lone1');  
                $hold8 = info_fetch_osireportig('SI/LR','PERMANENT DUTY','lone1'); 
                echo $asi13 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PERMANENT DUTY','lone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','PERMANENT DUTY','lone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','PERMANENT DUTY','lone1');
             echo $hc13 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PERMANENT DUTY','lone1');
                       $hold13 = info_fetch_osireportig('HC/PR','PERMANENT DUTY','lone1');
                        $hold14 = info_fetch_osireportig('HC/LR','PERMANENT DUTY','lone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','PERMANENT DUTY','lone1');
                         $hold16 = info_fetch_osireportig('C-II','PERMANENT DUTY','lone1');

             echo $ct13= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DGP/RESERVE</td>
                   <td><?php $hold1 = info_fetch_osireportig('INSP','DGP, RESERVES','lone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','DGP, RESERVES','lone2'); 
                      echo $insp14 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','DGP, RESERVES','lone2');
            $hold4 = info_fetch_osireportig('INSP/LR','DGP, RESERVES','lone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','DGP, RESERVES','lone2'); 
            echo $si14= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','DGP, RESERVES','lone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','DGP, RESERVES','lone2');  
                $hold8 = info_fetch_osireportig('SI/LR','DGP, RESERVES','lone2'); 
                echo $asi14 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','DGP, RESERVES','lone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','DGP, RESERVES','lone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','DGP, RESERVES','lone2');
             echo  $hc14 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','DGP, RESERVES','lone2');
                       $hold13 = info_fetch_osireportig('HC/PR','DGP, RESERVES','lone2');
                        $hold14 = info_fetch_osireportig('HC/LR','DGP, RESERVES','lone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','DGP, RESERVES','lone2');
                         $hold16 = info_fetch_osireportig('C-II','DGP, RESERVES','lone2');

             echo $ct14= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>TRG./E.D.RESERVE</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      echo $insp15 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
            $hold4 = info_fetch_osireportig('INSP/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            echo $si15= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');  
                $hold8 = info_fetch_osireportig('SI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                echo $asi15 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
             echo $hc15 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                       $hold13 = info_fetch_osireportig('HC/PR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                        $hold14 = info_fetch_osireportig('HC/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold16 = info_fetch_osireportig('C-II','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

             echo $ct15= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                  
                  <td><?php 
                            $law1 = info_fetch_osireportig('INSP','PERMANENT DUTY','lone1');
                            $law2 = info_fetch_osireportig('DSP/CR','PERMANENT DUTY','lone1');

                            $law3 = info_fetch_osireportig('INSP','DGP, RESERVES','lone2'); 
                            $law4 = info_fetch_osireportig('DSP/CR','DGP, RESERVES','lone2');

                            $law5 = info_fetch_osireportig('INSP','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');  
                            $law6 = info_fetch_osireportig('DSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

                          
                           
                            echo $law1 + $law2 + $law3 + $law4 + $law5 + $law6;
                    ?></td>
                  <td><?php 
                            $law7 = info_fetch_osireportig('SI','PERMANENT DUTY','lone1');
                            $law8 = info_fetch_osireportig('INSP/LR','PERMANENT DUTY','lone1');
                            $law9 = info_fetch_osireportig('INSP/CR','PERMANENT DUTY','lone1'); 

                            $law10 = info_fetch_osireportig('SI','DGP, RESERVES','lone2');
                            $law11 = info_fetch_osireportig('INSP/LR','DGP, RESERVES','lone2');  
                            $law12 = info_fetch_osireportig('INSP/CR','DGP, RESERVES','lone2');

                            $law13 = info_fetch_osireportig('SI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law14 = info_fetch_osireportig('INSP/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law15 = info_fetch_osireportig('INSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

                            echo $law7 + $law8 + $law9 + $law10 + $law11 + $law12 + $law13 + $law14 + $law15;
                    ?></td>
                  <td><?php 
                            $law16 = info_fetch_osireportig('ASI','PERMANENT DUTY','lone1');
                            $law17 = info_fetch_osireportig('SI/LR','PERMANENT DUTY','lone1');
                            $law18 = info_fetch_osireportig('SI/CR','PERMANENT DUTY','lone1'); 

                            $law19 = info_fetch_osireportig('ASI','DGP, RESERVES','lone2');
                            $law20 = info_fetch_osireportig('SI/LR','DGP, RESERVES','lone2');  
                            $law21 = info_fetch_osireportig('SI/CR','DGP, RESERVES','lone2');

                            $law22 = info_fetch_osireportig('ASI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law23 = info_fetch_osireportig('SI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law24 = info_fetch_osireportig('SI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');


                            echo $law16 + $law17 + $law18 + $law19 + $law20 + $law21 + $law22 + $law23 + $law24;
                    ?></td>
                  <td><?php 
                            $law25 = info_fetch_osireportig('HC','PERMANENT DUTY','lone1');
                            $law26 = info_fetch_osireportig('ASI/LR','PERMANENT DUTY','lone1');
                            $law27 = info_fetch_osireportig('ASI/CR','PERMANENT DUTY','lone1'); 

                            $law28 = info_fetch_osireportig('HC','DGP, RESERVES','lone2');
                            $law29 = info_fetch_osireportig('ASI/LR','DGP, RESERVES','lone2');  
                            $law30 = info_fetch_osireportig('ASI/CR','DGP, RESERVES','lone2');

                            $law31 = info_fetch_osireportig('HC','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law32 = info_fetch_osireportig('ASI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law33 = info_fetch_osireportig('ASI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

                            echo $law25 + $law26 + $law27 + $law28 + $law29 + $law30 + $law31 + $law32 + $law33;
                    ?></td>
                  <td><?php 
                            $law34 = info_fetch_osireportig('CT','PERMANENT DUTY','lone1');
                            $law35 = info_fetch_osireportig('HC/PR','PERMANENT DUTY','lone1');
                            $law36 = info_fetch_osireportig('HC/LR','PERMANENT DUTY','lone1');
                            $law37 = info_fetch_osireportig('Sr.Const','PERMANENT DUTY','lone1');
                             $law38 = info_fetch_osireportig('C-II','PERMANENT DUTY','lone1'); 

                            $law39 = info_fetch_osireportig('CT','DGP, RESERVES','lone2');
                            $law40 = info_fetch_osireportig('HC/PR','DGP, RESERVES','lone2');  
                            $law41 = info_fetch_osireportig('HC/LR','DGP, RESERVES','lone2');
                            $law42 = info_fetch_osireportig('Sr.Const','DGP, RESERVES','lone2');
                            $law43 = info_fetch_osireportig('C-II','DGP, RESERVES','lone2');

                            $law44 = info_fetch_osireportig('CT','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law45 = info_fetch_osireportig('HC/PR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law46 = info_fetch_osireportig('HC/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law47 = info_fetch_osireportig('Sr.Const','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                            $law48 = info_fetch_osireportig('C-II','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');


                     echo $law34 + $law35 + $law36 + $law37 + $law38 + $law39 + $law40 + $law41 + $law42 + $law43 + $law44 + $law45 + $law46 + $law47 + $law48;
                    ?></td>
                  <td><?php 


                     echo $lawing =  $law1 + $law2 + $law3 + $law4 + $law5 + $law6 + $law7 + $law8 + $law9 + $law10 + $law11 + $law12 + $law13 + $law14 + $law15 + $law16 + $law17 + $law18 + $law19 + $law20 + $law21 + $law22 + $law23 + $law24 + $law25 + $law26 + $law27 + $law28 + $law29 + $law30 + $law31 + $law32 + $law33 + $law34 + $law35 + $law36 + $law37 + $law38 + $law39 + $law40 + $law41 + $law42 + $law43 + $law44 + $law45 + $law46 + $law47 + $law48;

                    ?>

                   </td>
                </tr>
              </tbody>
           </table>

           <h3> 3. SPECIAL SQUADS</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 570px">ANTI RIOT POLICE, JALANDHAR</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      echo $insp16 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ANTI RIOT POLICE, JALANDHAR','sqone1');
            $hold4 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            echo $si16= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');  
                $hold8 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                echo $asi16 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ANTI RIOT POLICE, JALANDHAR','sqone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $hc16 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ANTI RIOT POLICE, JALANDHAR','sqone1');
                       $hold13 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                        $hold14 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold16 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, JALANDHAR','sqone1');

             echo $ct16= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>ANTI RIOT POLICE, MANSA</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, MANSA','sqone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
                      echo $insp17 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ANTI RIOT POLICE, MANSA','sqone2');
            $hold4 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
            echo $si17= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, MANSA','sqone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, MANSA','sqone2');  
                $hold8 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
                echo $asi17 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ANTI RIOT POLICE, MANSA','sqone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, MANSA','sqone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, MANSA','sqone2');
             echo $hc17 =   $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ANTI RIOT POLICE, MANSA','sqone2');
                       $hold13 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, MANSA','sqone2');
                        $hold14 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold16 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, MANSA','sqone2');

             echo $ct17= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ANTI RIOT POLICE, MUKATSAR</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      echo $insp18 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ANTI RIOT POLICE, MUKATSAR','sqone3');
            $hold4 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            echo $si18= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');  
                $hold8 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                echo $asi18 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ANTI RIOT POLICE, MUKATSAR','sqone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');
             echo $hc18 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ANTI RIOT POLICE, MUKATSAR','sqone3');
                       $hold13 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                        $hold14 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold16 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, MUKATSAR','sqone3');

             echo $ct18= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>SDRF TEAM JALANDHAR</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      echo $insp19 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','S.D.R.F. TEAM, JALANDHAR','sqone4');
            $hold4 = info_fetch_osireportig('INSP/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            $hold5 = info_fetch_osireportig('INSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            echo $si19=  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                $hold7 = info_fetch_osireportig('SI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');  
                $hold8 = info_fetch_osireportig('SI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                echo $asi19 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','S.D.R.F. TEAM, JALANDHAR','sqone4');
                    $hold10 = info_fetch_osireportig('ASI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                     $hold11 = info_fetch_osireportig('ASI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');
             echo $hc19 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','S.D.R.F. TEAM, JALANDHAR','sqone4');
                       $hold13 = info_fetch_osireportig('HC/PR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                        $hold14 = info_fetch_osireportig('HC/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold15 = info_fetch_osireportig('Sr.Const','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold16 = info_fetch_osireportig('C-II','S.D.R.F. TEAM, JALANDHAR','sqone4');

             echo $ct19= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>SPL. STRIKING GROUP </td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','SPL. STRIKING GROUPS','sqone5'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','SPL. STRIKING GROUPS','sqone5'); 
                      echo $insp20 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','SPL. STRIKING GROUPS','sqone5');
            $hold4 = info_fetch_osireportig('INSP/LR','SPL. STRIKING GROUPS','sqone5'); 
            $hold5 = info_fetch_osireportig('INSP/CR','SPL. STRIKING GROUPS','sqone5'); 
            echo $si20= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','SPL. STRIKING GROUPS','sqone5'); 
                $hold7 = info_fetch_osireportig('SI/CR','SPL. STRIKING GROUPS','sqone5');  
                $hold8 = info_fetch_osireportig('SI/LR','SPL. STRIKING GROUPS','sqone5'); 
                echo $asi20 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','SPL. STRIKING GROUPS','sqone5');
                    $hold10 = info_fetch_osireportig('ASI/LR','SPL. STRIKING GROUPS','sqone5');
                     $hold11 = info_fetch_osireportig('ASI/CR','SPL. STRIKING GROUPS','sqone5');
             echo $hc20 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','SPL. STRIKING GROUPS','sqone5');
                       $hold13 = info_fetch_osireportig('HC/PR','SPL. STRIKING GROUPS','sqone5');
                        $hold14 = info_fetch_osireportig('HC/LR','SPL. STRIKING GROUPS','sqone5');
                         $hold15 = info_fetch_osireportig('Sr.Const','SPL. STRIKING GROUPS','sqone5');
                         $hold16 = info_fetch_osireportig('C-II','SPL. STRIKING GROUPS','sqone5');

             echo $ct20= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>SWAT TEAM(4TH CDO) </td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','SWAT TEAM (4TH CDO)','sqone6'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
                      echo $insp21 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','SWAT TEAM (4TH CDO)','sqone6');
            $hold4 = info_fetch_osireportig('INSP/LR','SWAT TEAM (4TH CDO)','sqone6'); 
            $hold5 = info_fetch_osireportig('INSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
            echo $si21= $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','SWAT TEAM (4TH CDO)','sqone6'); 
                $hold7 = info_fetch_osireportig('SI/CR','SWAT TEAM (4TH CDO)','sqone6');  
                $hold8 = info_fetch_osireportig('SI/LR','SWAT TEAM (4TH CDO)','sqone6'); 
                echo $asi21 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','SWAT TEAM (4TH CDO)','sqone6');
                    $hold10 = info_fetch_osireportig('ASI/LR','SWAT TEAM (4TH CDO)','sqone6');
                     $hold11 = info_fetch_osireportig('ASI/CR','SWAT TEAM (4TH CDO)','sqone6');
             echo $hc21 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','SWAT TEAM (4TH CDO)','sqone6');
                       $hold13 = info_fetch_osireportig('HC/PR','SWAT TEAM (4TH CDO)','sqone6');
                        $hold14 = info_fetch_osireportig('HC/LR','SWAT TEAM (4TH CDO)','sqone6');
                         $hold15 = info_fetch_osireportig('Sr.Const','SWAT TEAM (4TH CDO)','sqone6');
                         $hold16 = info_fetch_osireportig('C-II','SWAT TEAM (4TH CDO)','sqone6');

             echo $ct21= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                  
                  <td><?php 
                            $anti1 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti2 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');

                            $anti3 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, MANSA','sqone2'); 
                            $anti4 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, MANSA','sqone2');

                            $anti5 = info_fetch_osireportig('INSP','ANTI RIOT POLICE, MUKATSAR','sqone3');  
                            $anti6 = info_fetch_osireportig('DSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');

                            $anti7 = info_fetch_osireportig('INSP','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti8 = info_fetch_osireportig('DSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');

                            $anti9 = info_fetch_osireportig('INSP','SPL. STRIKING GROUPS','sqone5');
                            $anti10 = info_fetch_osireportig('DSP/CR','SPL. STRIKING GROUPS','sqone5');

                            $anti11 = info_fetch_osireportig('INSP','SWAT TEAM (4TH CDO)','sqone6');
                            $anti12 = info_fetch_osireportig('DSP/CR','SWAT TEAM (4TH CDO)','sqone6');

                           

                            echo $anti1 + $anti2 + $anti3 + $anti4 + $anti5 + $anti6 + $anti7 + $anti8 + $anti9 + $anti10 + $anti11 + $anti12;
                    ?></td>
                  <td><?php 
                            $anti13 = info_fetch_osireportig('SI','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti14 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti15 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 

                            $anti16 = info_fetch_osireportig('SI','ANTI RIOT POLICE, MANSA','sqone2');
                            $anti17 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, MANSA','sqone2');  
                            $anti18 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, MANSA','sqone2');

                            $anti19 = info_fetch_osireportig('SI','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti20 = info_fetch_osireportig('INSP/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti21 = info_fetch_osireportig('INSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');

                            $anti22 = info_fetch_osireportig('SI','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti23 = info_fetch_osireportig('INSP/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti24 = info_fetch_osireportig('INSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');

                            $anti25 = info_fetch_osireportig('SI','SPL. STRIKING GROUPS','sqone5');
                            $anti26 = info_fetch_osireportig('INSP/LR','SPL. STRIKING GROUPS','sqone5');
                            $anti27 = info_fetch_osireportig('INSP/CR','SPL. STRIKING GROUPS','sqone5');

                            $anti28 = info_fetch_osireportig('SI','SWAT TEAM (4TH CDO)','sqone6');
                            $anti29 = info_fetch_osireportig('INSP/LR','SWAT TEAM (4TH CDO)','sqone6');
                            $anti30 = info_fetch_osireportig('INSP/CR','SWAT TEAM (4TH CDO)','sqone6');

                           
                            echo $anti13 + $anti14 + $anti15 + $anti16 + $anti17 + $anti18 + $anti19 + $anti20 + $anti21 + $anti22 + $anti23 + $anti24 + $anti25 + $anti26 + $anti27 + $anti28 + $anti29 + $anti28 + $anti29 + $anti30;
                    ?></td>
                  <td><?php 
                            $anti31 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti32 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti33 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 

                            $anti34 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, MANSA','sqone2');
                            $anti35 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, MANSA','sqone2');  
                            $anti36 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, MANSA','sqone2');

                            $anti37 = info_fetch_osireportig('ASI','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti38 = info_fetch_osireportig('SI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti39 = info_fetch_osireportig('SI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');

                            $anti40 = info_fetch_osireportig('ASI','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti41 = info_fetch_osireportig('SI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti42 = info_fetch_osireportig('SI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');

                            $anti43 = info_fetch_osireportig('ASI','SPL. STRIKING GROUPS','sqone5');
                            $anti44 = info_fetch_osireportig('SI/LR','SPL. STRIKING GROUPS','sqone5');
                            $anti45 = info_fetch_osireportig('SI/CR','SPL. STRIKING GROUPS','sqone5');

                            $anti46 = info_fetch_osireportig('ASI','SWAT TEAM (4TH CDO)','sqone6');
                            $anti47 = info_fetch_osireportig('SI/LR','SWAT TEAM (4TH CDO)','sqone6');
                            $anti48 = info_fetch_osireportig('SI/CR','SWAT TEAM (4TH CDO)','sqone6');
                           



                            echo $anti31 + $anti32 + $anti33 + $anti34 + $anti35 + $anti36 + $anti37 + $anti38 + $anti39 + $anti40 + $anti41 + $anti42 + $anti43 + $anti44 + $anti45 + $anti46 + $anti47 + $anti48;
                    ?></td>
                  <td><?php 
                            $anti49 = info_fetch_osireportig('HC','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti50 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $anti51 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 

                            $anti52 = info_fetch_osireportig('HC','ANTI RIOT POLICE, MANSA','sqone2');
                            $anti53 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, MANSA','sqone2');  
                            $anti54 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, MANSA','sqone2');

                            $anti55 = info_fetch_osireportig('HC','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti56 = info_fetch_osireportig('ASI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $anti57 = info_fetch_osireportig('ASI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');

                            $anti58 = info_fetch_osireportig('HC','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti59 = info_fetch_osireportig('ASI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $anti60 = info_fetch_osireportig('ASI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');

                            $anti61 = info_fetch_osireportig('HC','SPL. STRIKING GROUPS','sqone5');
                            $anti62 = info_fetch_osireportig('ASI/LR','SPL. STRIKING GROUPS','sqone5');
                            $anti63 = info_fetch_osireportig('ASI/CR','SPL. STRIKING GROUPS','sqone5');

                            $anti64 = info_fetch_osireportig('HC','SWAT TEAM (4TH CDO)','sqone6');
                            $anti65 = info_fetch_osireportig('ASI/LR','SWAT TEAM (4TH CDO)','sqone6');
                            $anti66 = info_fetch_osireportig('ASI/CR','SWAT TEAM (4TH CDO)','sqone6');



                            echo $anti49 + $anti50 + $anti51 + $anti52 + $anti53 + $anti54 + $anti55 + $anti56 + $anti57 + $anti58 + $anti59 + $anti60 + $anti61 + $anti62 + $anti63  + $anti64 + $anti65 + $anti66;
                    ?></td>
                  <td><?php 
                            $antii1 = info_fetch_osireportig('CT','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $antii2 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $antii3 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                            $antii4 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, JALANDHAR','sqone1');
                             $antii5 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, JALANDHAR','sqone1'); 

                            $antii6 = info_fetch_osireportig('CT','ANTI RIOT POLICE, MANSA','sqone2');
                            $antii7 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, MANSA','sqone2');  
                            $antii8 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, MANSA','sqone2');
                            $antii9 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, MANSA','sqone2');
                            $antii10 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, MANSA','sqone2');

                            $antii11 = info_fetch_osireportig('CT','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $antii12 = info_fetch_osireportig('HC/PR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $antii13 = info_fetch_osireportig('HC/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $antii14 = info_fetch_osireportig('Sr.Const','ANTI RIOT POLICE, MUKATSAR','sqone3');
                            $antii15 = info_fetch_osireportig('C-II','ANTI RIOT POLICE, MUKATSAR','sqone3');

                            $antii16 = info_fetch_osireportig('CT','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $antii17 = info_fetch_osireportig('HC/PR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $antii18 = info_fetch_osireportig('HC/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                            $antii19 = info_fetch_osireportig('Sr.Const','S.D.R.F. TEAM, JALANDHAR','sqone4');
                             $antii20 = info_fetch_osireportig('C-II','S.D.R.F. TEAM, JALANDHAR','sqone4');

                             $antii21 = info_fetch_osireportig('CT','SPL. STRIKING GROUPS','sqone5');
                            $antii22 = info_fetch_osireportig('HC/PR','SPL. STRIKING GROUPS','sqone5');
                            $antii23 = info_fetch_osireportig('HC/LR','SPL. STRIKING GROUPS','sqone5');
                            $antii24 = info_fetch_osireportig('Sr.Const','SPL. STRIKING GROUPS','sqone5');
                            $antii25 = info_fetch_osireportig('C-II','SPL. STRIKING GROUPS','sqone5');

                            $antii26 = info_fetch_osireportig('CT','SWAT TEAM (4TH CDO)','sqone6');
                            $antii27 = info_fetch_osireportig('HC/PR','SWAT TEAM (4TH CDO)','sqone6');
                            $antii28 = info_fetch_osireportig('HC/LR','SWAT TEAM (4TH CDO)','sqone6');
                            $antii29 = info_fetch_osireportig('Sr.Const','SWAT TEAM (4TH CDO)','sqone6');
                            $antii30 = info_fetch_osireportig('C-II','SWAT TEAM (4TH CDO)','sqone6');



                     echo $antii1 + $antii2 + $antii3 + $antii4 + $antii5 + $antii6 + $antii7 + $antii8 + $antii9 + $antii10 + $antii11 + $antii12 + $antii13 + $antii14 + $antii15 + $antii16 + $antii17 + $antii18 + $antii19 + $antii20 + $antii21 + $antii22 + $antii23 +  $antii24 + $antii25 + $antii26 + $antii27 + $antii28 + $antii29 + $antii30;
                    ?></td>
                  <td><?php  
                   echo $antiting =  $anti1 + $anti2 + $anti3 + $anti4 + $anti5 + $anti6 + $anti7 + $anti8 + $anti9 + $anti10 + $anti11 + $anti12 + $anti13 + $anti14 + $anti15 + $anti16 + $anti17 + $anti18 + $anti19 + $anti20 + $anti21 + $anti22 + $anti23 + $anti24 + $anti25 + $anti26 + $anti27 + $anti28 + $anti29 + $anti28 + $anti29 + $anti30 + $anti31 + $anti32 + $anti33 + $anti34 + $anti35 + $anti36 + $anti37 + $anti38 + $anti39 + $anti40 + $anti41 + $anti42 + $anti43 + $anti44 + $anti45 + $anti46 + $anti47 + $anti48 + $anti49 + $anti50 + $anti51 + $anti52 + $anti53 + $anti54 + $anti55 + $anti56 + $anti57 + $anti58 + $anti59 + $anti60 + $anti61 + $anti62 + $anti63  + $anti64 + $anti65 + $anti66 + $antii1 + $antii2 + $antii3 + $antii4 + $antii5 + $antii6 + $antii7 + $antii8 + $antii9 + $antii10 + $antii11 + $antii12 + $antii13 + $antii14 + $antii15 + $antii16 + $antii17 + $antii18 + $antii19 + $antii20 + $antii21 + $antii22 + $antii23 +  $antii24 + $antii25 + $antii26 + $antii27 + $antii28 + $antii29 + $antii30;

                    ?>

                   </td>

                </tr>
              </tbody>
           </table>

                    <h3> 4. PERMANENT ATTACHMENT</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 550px">DISTT. MOHALI</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT.','paone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT.','paone1'); 
                      echo $insp22 = $part1 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ATTACHED WITH DISTT.','paone1');
            $hold4 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT.','paone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT.','paone1'); 
            echo $si22= $part2 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ATTACHED WITH DISTT.','paone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','ATTACHED WITH DISTT.','paone1');  
                $hold8 = info_fetch_osireportig('SI/LR','ATTACHED WITH DISTT.','paone1'); 
                echo $asi22 = $part3 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ATTACHED WITH DISTT.','paone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','ATTACHED WITH DISTT.','paone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','ATTACHED WITH DISTT.','paone1');
             echo $hc22 =  $part4 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ATTACHED WITH DISTT.','paone1');
                       $hold13 = info_fetch_osireportig('HC/PR','ATTACHED WITH DISTT.','paone1');
                        $hold14 = info_fetch_osireportig('HC/LR','ATTACHED WITH DISTT.','paone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','ATTACHED WITH DISTT.','paone1');
                         $hold16 = info_fetch_osireportig('C-II','ATTACHED WITH DISTT.','paone1');

             echo $ct22= $part5 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN MALE)</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      echo $insp23 = $part6 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
            $hold4 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            echo $si23= $part7 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');  
                $hold8 = info_fetch_osireportig('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                echo $asi23 = $part8 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
             echo $hc23= $part9 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                       $hold13 = info_fetch_osireportig('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                        $hold14 = info_fetch_osireportig('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $hold16 = info_fetch_osireportig('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');

             echo $ct23= $part10 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN FEMALE)</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      echo $insp24 =$part11 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
            $hold4 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            echo  $si24= $part12 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');  
                $hold8 = info_fetch_osireportig('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                echo $hc24=  $part13 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
             echo $asi24 = $part14 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                       $hold13 = info_fetch_osireportig('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                        $hold14 = info_fetch_osireportig('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $hold16 = info_fetch_osireportig('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');

             echo $ct24= $part15 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>DISTT.POLICE (OTHERS MALE)</td>
                                <td><?php $hold1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      echo $insp25 = $part16 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
            $hold4 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            echo $si25= $part17 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                $hold7 = info_fetch_osireportig('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');  
                $hold8 = info_fetch_osireportig('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                echo $asi25 =  $part18 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                    $hold10 = info_fetch_osireportig('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                     $hold11 = info_fetch_osireportig('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
             echo $hc25= $part19 =  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                       $hold13 = info_fetch_osireportig('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                        $hold14 = info_fetch_osireportig('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold15 = info_fetch_osireportig('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold16 = info_fetch_osireportig('C-II','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');

             echo $ct25= $part20 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>DISTT.POLICE (OTHERS FEMALE)</td>
                        <td><?php $hold1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      echo $insp26 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
            $hold4 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            echo $si26= $part21 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                $hold7 = info_fetch_osireportig('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');  
                $hold8 = info_fetch_osireportig('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                echo $asi26 = $part22 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                    $hold10 = info_fetch_osireportig('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                     $hold11 = info_fetch_osireportig('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
             echo $hc26= $part23 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                       $hold13 = info_fetch_osireportig('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                        $hold14 = info_fetch_osireportig('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold15 = info_fetch_osireportig('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold16 = info_fetch_osireportig('C-II','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');

             echo $ct26= $part24 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>C.P.O ATTACHMENT UNDER 13th BN.</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      echo $insp27 = $part25 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
            $hold4 = info_fetch_osireportig('INSP/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            $hold5 = info_fetch_osireportig('INSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            echo $si27= $part26 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                $hold7 = info_fetch_osireportig('SI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');  
                $hold8 = info_fetch_osireportig('SI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                echo  $asi27 = $part27 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                    $hold10 = info_fetch_osireportig('ASI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                     $hold11 = info_fetch_osireportig('ASI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
             echo $hc27=  $part28 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                       $hold13 = info_fetch_osireportig('HC/PR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                        $hold14 = info_fetch_osireportig('HC/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold15 = info_fetch_osireportig('Sr.Const','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold16 = info_fetch_osireportig('C-II','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

             echo $ct27= $part29 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>PB.POLICE OFFICE INSTITUTE SEC 32 CHG</td>
                                <td><?php $hold1 = info_fetch_osireportig('INSP','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      echo $insp28 = $part30 =  $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
            $hold4 = info_fetch_osireportig('INSP/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            echo  $si28= $part31 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                $hold7 = info_fetch_osireportig('SI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');  
                $hold8 = info_fetch_osireportig('SI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                echo $asi28 = $part32 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                    $hold10 = info_fetch_osireportig('ASI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                     $hold11 = info_fetch_osireportig('ASI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
             echo $hc28=  $part33 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                       $hold13 = info_fetch_osireportig('HC/PR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                        $hold14 = info_fetch_osireportig('HC/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold15 = info_fetch_osireportig('Sr.Const','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold16 = info_fetch_osireportig('C-II','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

             echo $ct28= $part34 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>viii)</td>
                  <td>NRI CELL MOHALI</td>
                                    <td><?php $hold1 = info_fetch_osireportig('INSP','NRI CELL MOHALI','paone8'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','NRI CELL MOHALI','paone8'); 
                      echo $insp29 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','NRI CELL MOHALI','paone8');
            $hold4 = info_fetch_osireportig('INSP/LR','NRI CELL MOHALI','paone8'); 
            $hold5 = info_fetch_osireportig('INSP/CR','NRI CELL MOHALI','paone8'); 
            echo $si29= $part35 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','NRI CELL MOHALI','paone8'); 
                $hold7 = info_fetch_osireportig('SI/CR','NRI CELL MOHALI','paone8');  
                $hold8 = info_fetch_osireportig('SI/LR','NRI CELL MOHALI','paone8'); 
                echo $asi29 = $part36 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','NRI CELL MOHALI','paone8');
                    $hold10 = info_fetch_osireportig('ASI/LR','NRI CELL MOHALI','paone8');
                     $hold11 = info_fetch_osireportig('ASI/CR','NRI CELL MOHALI','paone8');
             echo $hc29= $part37 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','NRI CELL MOHALI','paone8');
                       $hold13 = info_fetch_osireportig('HC/PR','NRI CELL MOHALI','paone8');
                        $hold14 = info_fetch_osireportig('HC/LR','NRI CELL MOHALI','paone8');
                         $hold15 = info_fetch_osireportig('Sr.Const','NRI CELL MOHALI','paone8');
                         $hold16 = info_fetch_osireportig('C-II','NRI CELL MOHALI','paone8');

             echo $ct29= $part38 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>INT. WING</td>
                                <td><?php $hold1 = info_fetch_osireportig('INSP','INTELLIGENCE WING','paone9'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','INTELLIGENCE WING','paone9'); 
                      echo $insp30 = $part39 =  $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','INTELLIGENCE WING','paone9');
            $hold4 = info_fetch_osireportig('INSP/LR','INTELLIGENCE WING','paone9'); 
            $hold5 = info_fetch_osireportig('INSP/CR','INTELLIGENCE WING','paone9'); 
            echo $si30 = $part40 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','INTELLIGENCE WING','paone9'); 
                $hold7 = info_fetch_osireportig('SI/CR','INTELLIGENCE WING','paone9');  
                $hold8 = info_fetch_osireportig('SI/LR','INTELLIGENCE WING','paone9'); 
                echo $asi30 =  $part41 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','INTELLIGENCE WING','paone9');
                    $hold10 = info_fetch_osireportig('ASI/LR','INTELLIGENCE WING','paone9');
                     $hold11 = info_fetch_osireportig('ASI/CR','INTELLIGENCE WING','paone9');
             echo $hc30= $part42 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','INTELLIGENCE WING','paone9');
                       $hold13 = info_fetch_osireportig('HC/PR','INTELLIGENCE WING','paone9');
                        $hold14 = info_fetch_osireportig('HC/LR','INTELLIGENCE WING','paone9');
                         $hold15 = info_fetch_osireportig('Sr.Const','INTELLIGENCE WING','paone9');
                         $hold16 = info_fetch_osireportig('C-II','INTELLIGENCE WING','paone9');

             echo  $ct30= $part43 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>CENTRAL POLICE LINE MOHALI</td>
                                <td><?php $hold1 = info_fetch_osireportig('INSP','CENTRAL POLICE LINE MOHALI','paone10'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
                      echo $insp31 = $part44 =  $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','CENTRAL POLICE LINE MOHALI','paone10');
            $hold4 = info_fetch_osireportig('INSP/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
            $hold5 = info_fetch_osireportig('INSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
            echo $si31 =$part45 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','CENTRAL POLICE LINE MOHALI','paone10'); 
                $hold7 = info_fetch_osireportig('SI/CR','CENTRAL POLICE LINE MOHALI','paone10');  
                $hold8 = info_fetch_osireportig('SI/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
                echo $asi31 = $part46 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','CENTRAL POLICE LINE MOHALI','paone10');
                    $hold10 = info_fetch_osireportig('ASI/LR','CENTRAL POLICE LINE MOHALI','paone10');
                     $hold11 = info_fetch_osireportig('ASI/CR','CENTRAL POLICE LINE MOHALI','paone10');
             echo  $hc31 = $part47 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','CENTRAL POLICE LINE MOHALI','paone10');
                       $hold13 = info_fetch_osireportig('HC/PR','CENTRAL POLICE LINE MOHALI','paone10');
                        $hold14 = info_fetch_osireportig('HC/LR','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold15 = info_fetch_osireportig('Sr.Const','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold16 = info_fetch_osireportig('C-II','CENTRAL POLICE LINE MOHALI','paone10');

             echo $ct31= $part48 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xi)</td>
                  <td>VIG.BUREAU</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','VIGILANCE BUREAU','paone11'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','VIGILANCE BUREAU','paone11'); 
                      echo $insp32 = $part49 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','VIGILANCE BUREAU','paone11');
            $hold4 = info_fetch_osireportig('INSP/LR','VIGILANCE BUREAU','paone11'); 
            $hold5 = info_fetch_osireportig('INSP/CR','VIGILANCE BUREAU','paone11'); 
            echo $si32 =$part50 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','VIGILANCE BUREAU','paone11'); 
                $hold7 = info_fetch_osireportig('SI/CR','VIGILANCE BUREAU','paone11');  
                $hold8 = info_fetch_osireportig('SI/LR','VIGILANCE BUREAU','paone11'); 
                echo $asi32 = $part51 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','VIGILANCE BUREAU','paone11');
                    $hold10 = info_fetch_osireportig('ASI/LR','VIGILANCE BUREAU','paone11');
                     $hold11 = info_fetch_osireportig('ASI/CR','VIGILANCE BUREAU','paone11');
             echo $hc32 = $part52 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','VIGILANCE BUREAU','paone11');
                       $hold13 = info_fetch_osireportig('HC/PR','VIGILANCE BUREAU','paone11');
                        $hold14 = info_fetch_osireportig('HC/LR','VIGILANCE BUREAU','paone11');
                         $hold15 = info_fetch_osireportig('Sr.Const','VIGILANCE BUREAU','paone11');
                         $hold16 = info_fetch_osireportig('C-II','VIGILANCE BUREAU','paone11');

             echo $ct32= $part53 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>SNCB</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      echo $insp33 = $part54 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','STATE NARCOTIC CRIME BUREAU','paone12');
            $hold4 = info_fetch_osireportig('INSP/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            $hold5 = info_fetch_osireportig('INSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            echo $si33 = $part55 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','STATE NARCOTIC CRIME BUREAU','paone12'); 
                $hold7 = info_fetch_osireportig('SI/CR','STATE NARCOTIC CRIME BUREAU','paone12');  
                $hold8 = info_fetch_osireportig('SI/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                echo $asi33 = $part56 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','STATE NARCOTIC CRIME BUREAU','paone12');
                    $hold10 = info_fetch_osireportig('ASI/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                     $hold11 = info_fetch_osireportig('ASI/CR','STATE NARCOTIC CRIME BUREAU','paone12');
             echo $hc33 = $part57 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','STATE NARCOTIC CRIME BUREAU','paone12');
                       $hold13 = info_fetch_osireportig('HC/PR','STATE NARCOTIC CRIME BUREAU','paone12');
                        $hold14 = info_fetch_osireportig('HC/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold15 = info_fetch_osireportig('Sr.Const','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold16 = info_fetch_osireportig('C-II','STATE NARCOTIC CRIME BUREAU','paone12');

             echo $ct33= $part58 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xiii)</td>
                  <td>MOHALI AIRPORT IMMIGRATION DUTY</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      echo $insp34 = $part59 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
            $hold4 = info_fetch_osireportig('INSP/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            $hold5 = info_fetch_osireportig('INSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            echo $si34 =$part60 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                $hold7 = info_fetch_osireportig('SI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');  
                $hold8 = info_fetch_osireportig('SI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                echo $asi34 = $part61 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                    $hold10 = info_fetch_osireportig('ASI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                     $hold11 = info_fetch_osireportig('ASI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
             echo $hc34 = $part62 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                       $hold13 = info_fetch_osireportig('HC/PR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                        $hold14 = info_fetch_osireportig('HC/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold15 = info_fetch_osireportig('Sr.Const','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold16 = info_fetch_osireportig('C-II','MOHALI AIRPORT IMMIGRATION DUTY','paone13');

             echo $ct34= $part63 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xiv)</td>
                  <td>P.H.R.C.</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      echo $insp35 = $part64 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','STATE HUMAN RIGHTS COMMISSION','paone14');
            $hold4 = info_fetch_osireportig('INSP/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            $hold5 = info_fetch_osireportig('INSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            echo $si35 =$part65 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                $hold7 = info_fetch_osireportig('SI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');  
                $hold8 = info_fetch_osireportig('SI/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                echo $asi35 = $part66 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','STATE HUMAN RIGHTS COMMISSION','paone14');
                    $hold10 = info_fetch_osireportig('ASI/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                     $hold11 = info_fetch_osireportig('ASI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');
             echo $hc35 = $part67 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','STATE HUMAN RIGHTS COMMISSION','paone14');
                       $hold13 = info_fetch_osireportig('HC/PR','STATE HUMAN RIGHTS COMMISSION','paone14');
                        $hold14 = info_fetch_osireportig('HC/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold15 = info_fetch_osireportig('Sr.Const','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold16 = info_fetch_osireportig('C-II','STATE HUMAN RIGHTS COMMISSION','paone14');

             echo $ct35= $part68 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xv)</td>
                  <td>BUREAU OF INVESTIGATION</td>
                            <td><?php $hold1 = info_fetch_osireportig('INSP','BUREAU OF INVESTIGATION','paone15'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','BUREAU OF INVESTIGATION','paone15'); 
                      echo $insp36 = $part69 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','BUREAU OF INVESTIGATION','paone15');
            $hold4 = info_fetch_osireportig('INSP/LR','BUREAU OF INVESTIGATION','paone15'); 
            $hold5 = info_fetch_osireportig('INSP/CR','BUREAU OF INVESTIGATION','paone15'); 
            echo $si36 =$part70 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','BUREAU OF INVESTIGATION','paone15'); 
                $hold7 = info_fetch_osireportig('SI/CR','BUREAU OF INVESTIGATION','paone15');  
                $hold8 = info_fetch_osireportig('SI/LR','BUREAU OF INVESTIGATION','paone15'); 
                echo $asi36 = $part71 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','BUREAU OF INVESTIGATION','paone15');
                    $hold10 = info_fetch_osireportig('ASI/LR','BUREAU OF INVESTIGATION','paone15');
                     $hold11 = info_fetch_osireportig('ASI/CR','BUREAU OF INVESTIGATION','paone15');
             echo $hc36 = $part72 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','BUREAU OF INVESTIGATION','paone15');
                       $hold13 = info_fetch_osireportig('HC/PR','BUREAU OF INVESTIGATION','paone15');
                        $hold14 = info_fetch_osireportig('HC/LR','BUREAU OF INVESTIGATION','paone15');
                         $hold15 = info_fetch_osireportig('Sr.Const','BUREAU OF INVESTIGATION','paone15');
                         $hold16 = info_fetch_osireportig('C-II','BUREAU OF INVESTIGATION','paone15');

             echo $ct36= $part73 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xvi)</td>
                  <td>RTC/PAP JALANDHAR</td>
                    <td><?php $hold1 = info_fetch_osireportig('INSP','RTC/PAP, JALANDHAR','paone16'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','RTC/PAP, JALANDHAR','paone16'); 
                      echo $insp37 = $part74 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','RTC/PAP, JALANDHAR','paone16');
            $hold4 = info_fetch_osireportig('INSP/LR','RTC/PAP, JALANDHAR','paone16'); 
            $hold5 = info_fetch_osireportig('INSP/CR','RTC/PAP, JALANDHAR','paone16'); 
            echo $si38 =$part75 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','RTC/PAP, JALANDHAR','paone16'); 
                $hold7 = info_fetch_osireportig('SI/CR','RTC/PAP, JALANDHAR','paone16');  
                $hold8 = info_fetch_osireportig('SI/LR','RTC/PAP, JALANDHAR','paone16'); 
                echo $asi37 = $part76 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','RTC/PAP, JALANDHAR','paone16');
                    $hold10 = info_fetch_osireportig('ASI/LR','RTC/PAP, JALANDHAR','paone16');
                     $hold11 = info_fetch_osireportig('ASI/CR','RTC/PAP, JALANDHAR','paone16');
             echo $hc37 =  $part77 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','RTC/PAP, JALANDHAR','paone16');
                       $hold13 = info_fetch_osireportig('HC/PR','RTC/PAP, JALANDHAR','paone16');
                        $hold14 = info_fetch_osireportig('HC/LR','RTC/PAP, JALANDHAR','paone16');
                         $hold15 = info_fetch_osireportig('Sr.Const','RTC/PAP, JALANDHAR','paone16');
                         $hold16 = info_fetch_osireportig('C-II','RTC/PAP, JALANDHAR','paone16');

             echo $ct37= $part78 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xvii)</td>
                  <td>ISTC/PAP KAPURTHALA</td>
                             <td><?php $hold1 = info_fetch_osireportig('INSP','ISTC/PAP, KAPURTHALA','paone17'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
                      echo $insp38 = $part79 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ISTC/PAP, KAPURTHALA','paone17');
            $hold4 = info_fetch_osireportig('INSP/LR','ISTC/PAP, KAPURTHALA','paone17'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
            echo $si39 =$part80 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ISTC/PAP, KAPURTHALA','paone17'); 
                $hold7 = info_fetch_osireportig('SI/CR','ISTC/PAP, KAPURTHALA','paone17');  
                $hold8 = info_fetch_osireportig('SI/LR','ISTC/PAP, KAPURTHALA','paone17'); 
                echo $asi38 = $part81 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ISTC/PAP, KAPURTHALA','paone17');
                    $hold10 = info_fetch_osireportig('ASI/LR','ISTC/PAP, KAPURTHALA','paone17');
                     $hold11 = info_fetch_osireportig('ASI/CR','ISTC/PAP, KAPURTHALA','paone17');
             echo $hc38= $part82 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ISTC/PAP, KAPURTHALA','paone17');
                       $hold13 = info_fetch_osireportig('HC/PR','ISTC/PAP, KAPURTHALA','paone17');
                        $hold14 = info_fetch_osireportig('HC/LR','ISTC/PAP, KAPURTHALA','paone17');
                         $hold15 = info_fetch_osireportig('Sr.Const','ISTC/PAP, KAPURTHALA','paone17');
                         $hold16 = info_fetch_osireportig('C-II','ISTC/PAP, KAPURTHALA','paone17');

             echo $ct38= $part83 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>
                </tr>

                <tr>
                  <td>xviii)</td>
                  <td>PCTS BHG. PATIALA</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      echo $insp39 = $part84 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
            $hold4 = info_fetch_osireportig('INSP/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            $hold5 = info_fetch_osireportig('INSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            echo $si40 =$part85 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                $hold7 = info_fetch_osireportig('SI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');  
                $hold8 = info_fetch_osireportig('SI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                echo $asi39 = $part86 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                    $hold10 = info_fetch_osireportig('ASI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                     $hold11 = info_fetch_osireportig('ASI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
             echo $hc39= $part87 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                       $hold13 = info_fetch_osireportig('HC/PR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                        $hold14 = info_fetch_osireportig('HC/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold15 = info_fetch_osireportig('Sr.Const','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold16 = info_fetch_osireportig('C-II','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');

             echo $ct39= $part88 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xix)</td>
                  <td>RTC LADDA KOTHI SANGRUR</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','RTC LADDA KOTHI SANGRUR','paone19'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
                      echo $insp40 = $part89 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','RTC LADDA KOTHI SANGRUR','paone19');
            $hold4 = info_fetch_osireportig('INSP/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
            $hold5 = info_fetch_osireportig('INSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
            echo $si41 =$part90 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','RTC LADDA KOTHI SANGRUR','paone19'); 
                $hold7 = info_fetch_osireportig('SI/CR','RTC LADDA KOTHI SANGRUR','paone19');  
                $hold8 = info_fetch_osireportig('SI/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
                echo $asi40 = $part91 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','RTC LADDA KOTHI SANGRUR','paone19');
                    $hold10 = info_fetch_osireportig('ASI/LR','RTC LADDA KOTHI SANGRUR','paone19');
                     $hold11 = info_fetch_osireportig('ASI/CR','RTC LADDA KOTHI SANGRUR','paone19');
             echo $hc40= $part92 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','RTC LADDA KOTHI SANGRUR','paone19');
                       $hold13 = info_fetch_osireportig('HC/PR','RTC LADDA KOTHI SANGRUR','paone19');
                        $hold14 = info_fetch_osireportig('HC/LR','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold15 = info_fetch_osireportig('Sr.Const','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold16 = info_fetch_osireportig('C-II','RTC LADDA KOTHI SANGRUR','paone19');

             echo $ct40= $part93 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xx)</td>
                  <td>PPA PHILLAUR </td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      echo $insp41 = $part94 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
            $hold4 = info_fetch_osireportig('INSP/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            echo $si42 = $part95 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                $hold7 = info_fetch_osireportig('SI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');  
                $hold8 = info_fetch_osireportig('SI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                echo $asi41 = $part96 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                    $hold10 = info_fetch_osireportig('ASI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                     $hold11 = info_fetch_osireportig('ASI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
             echo $hc41= $part97 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                       $hold13 = info_fetch_osireportig('HC/PR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                        $hold14 = info_fetch_osireportig('HC/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold15 = info_fetch_osireportig('Sr.Const','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold16 = info_fetch_osireportig('C-II','PUNJAB POLICE ACADEMY PHILLAUR','paone20');

             echo $ct41= $part98 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xxi)</td>
                  <td>PRTC/JAHAN KHELAN</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      echo $insp42 = $part99 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
            $hold4 = info_fetch_osireportig('INSP/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            $hold5 = info_fetch_osireportig('INSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            echo $si43 = $part100 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                $hold7 = info_fetch_osireportig('SI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');  
                $hold8 = info_fetch_osireportig('SI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                echo $asi42 = $part101 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                    $hold10 = info_fetch_osireportig('ASI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                     $hold11 = info_fetch_osireportig('ASI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
             echo $hc42= $part102 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                       $hold13 = info_fetch_osireportig('HC/PR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                        $hold14 = info_fetch_osireportig('HC/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold15 = info_fetch_osireportig('Sr.Const','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold16 = info_fetch_osireportig('C-II','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');

             echo $ct42= $part103 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>TOTAL</td>
                 <td><?php 
                            /*$paone1 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT.','paone1');
                            $paone2 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT.','paone1');

                            $paone3 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                            $paone4 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');

                            $paone5 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');  
                            $paone6 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');

                            $paone7 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');  
                            $paone8 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');

                            $paone9 = info_fetch_osireportig('INSP','ATTACHED WITH DISTT. POLICE (OTHERS  FEMALE)','paone5');  
                            $paone10 = info_fetch_osireportig('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');

                            $paone11 = info_fetch_osireportig('INSP','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');  
                            $paone12 = info_fetch_osireportig('DSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

                            $paone13 = info_fetch_osireportig('INSP','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');  
                            $paone14 = info_fetch_osireportig('DSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

                            

                             $paone15 = info_fetch_osireportig('INSP','NRI CELL MOHALI','paone8');  
                            $paone16 = info_fetch_osireportig('DSP/CR','NRI CELL MOHALI','paone8');

                            $paone17 = info_fetch_osireportig('INSP','INTELLIGENCE WING','paone9');  
                            $paone18 = info_fetch_osireportig('DSP/CR','INTELLIGENCE WING','paone9');

                            $paone19 = info_fetch_osireportig('INSP','CENTRAL POLICE LINE MOHALI','paone10');  
                            $paone20 = info_fetch_osireportig('DSP/CR','CENTRAL POLICE LINE MOHALI','paone10');

                            $paone21 = info_fetch_osireportig('INSP','VIGILANCE BUREAU','paone11');  
                            $paone22 = info_fetch_osireportig('DSP/CR','VIGILANCE BUREAU','paone11');

                            $paone23 = info_fetch_osireportig('INSP','STATE NARCOTIC CRIME BUREAU','paone12');  
                            $paone24 = info_fetch_osireportig('DSP/CR','STATE NARCOTIC CRIME BUREAU','paone12');

                            $paone25 = info_fetch_osireportig('INSP','MOHALI AIRPORT IMMIGRATION DUTY','paone13');  
                            $paone26 = info_fetch_osireportig('DSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');

                             $paone27 = info_fetch_osireportig('INSP','STATE HUMAN RIGHTS COMMISSION','paone14');  
                            $paone28 = info_fetch_osireportig('DSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14');

                            $paone29 = info_fetch_osireportig('INSP','BUREAU OF INVESTIGATION','paone15');  
                            $paone30 = info_fetch_osireportig('DSP/CR','BUREAU OF INVESTIGATION','paone15');

                             $paone31 = info_fetch_osireportig('INSP','RTC/PAP, JALANDHAR','paone16');  
                            $paone32 = info_fetch_osireportig('DSP/CR','RTC/PAP, JALANDHAR','paone16');

                             $paone33 = info_fetch_osireportig('INSP','ISTC/PAP, KAPURTHALA','paone17');  
                            $paone34 = info_fetch_osireportig('DSP/CR','ISTC/PAP, KAPURTHALA','paone17');

                             $paone35 = info_fetch_osireportig('INSP','POLICE COMMANDO TRG. CENTRE','paone18');  
                            $paone36 = info_fetch_osireportig('DSP/CR','POLICE COMMANDO TRG. CENTRE','paone18');

                             $paone37 = info_fetch_osireportig('INSP','RTC LADDA KOTHI SANGRUR','paone19');  
                            $paone38 = info_fetch_osireportig('DSP/CR','RTC LADDA KOTHI SANGRUR','paone19');

                             $paone39 = info_fetch_osireportig('INSP','PUNJAB POLICE ACADEMY PHILLAUR','paone20');  
                            $paone40 = info_fetch_osireportig('DSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');


                             $paone41 = info_fetch_osireportig('INSP','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');  
                            $paone42 = info_fetch_osireportig('DSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');

                            echo $paone1 + $paone2 + $paone3 + $paone4 + $paone5 + $paone6 + $paone7 + $paone8 + $paone9 + $paone10 + $paone11 + $paone12 + $paone13 + $paone14 + $paone15 + $paone16 + $paone17 + $paone18 + $paone19 + $paone20 + $paone21 +  $paone22 + $paone23 + $paone24 + $paone25 + $paone26 + $paone27 + $paone28 + $paone29 + $paone30 + $paone31 + $paone32 + $paone33 + $paone34 + $paone35 + $paone36 + $paone37 + $paone38 + $paone39 + $paone40 + $paone41;*/
                    ?></td>
                  <td><?php 
                            /*$paonet1 = info_fetch_osireportig('SI','ATTACHED WITH DISTT.','paone1');
                            $paonet2 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT.','paone1');
                            $paonet3 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT.','paone1'); 

                            $paonet4 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                            $paonet5 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');  
                            $paonet6 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');

                            $paonet7 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                            $paonet8 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');

                            $paonet9 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                            $paonet10 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                            $paonet11 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                            $paonet15 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');

                            $paonet16 = info_fetch_osireportig('SI','ATTACHED WITH DISTT. POLICE (OTHERS  FEMALE)','paone5');
                            $paonet17 = info_fetch_osireportig('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS  FEMALE)','paone5');
                            $paonet18 = info_fetch_osireportig('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS  FEMALE)','paone5');

                            $paonet19 = info_fetch_osireportig('SI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                            $paonet20 = info_fetch_osireportig('INSP/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                            $paonet21 = info_fetch_osireportig('INSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

                            $paonet22 = info_fetch_osireportig('SI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                            $paonet23 = info_fetch_osireportig('INSP/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                            $paonet24 = info_fetch_osireportig('INSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

                            $paonet25 = info_fetch_osireportig('SI','POLICE SEC.WING CHG U/13th BN.','paone8');
                            $paonet26 = info_fetch_osireportig('INSP/LR','POLICE SEC.WING CHG U/13th BN.','paone8');
                            $paonet27 = info_fetch_osireportig('INSP/CR','POLICE SEC.WING CHG U/13th BN.','paone8');

                            $paonet28 = info_fetch_osireportig('SI','NRI CELL MOHALI','paone9');
                            $paonet29 = info_fetch_osireportig('INSP/LR','NRI CELL MOHALI','paone9');
                            $paonet30 = info_fetch_osireportig('INSP/CR','NRI CELL MOHALI','paone9');

                            $paonet31 = info_fetch_osireportig('SI','INTELLIGENCE WING','paone10');
                            $paonet32 = info_fetch_osireportig('INSP/LR','INTELLIGENCE WING','paone10');
                            $paonet33 = info_fetch_osireportig('INSP/CR','INTELLIGENCE WING','paone10');

                            $paonet34 = info_fetch_osireportig('SI','CENTRAL POLICE LINE MOHALI','paone11');
                            $paonet35 = info_fetch_osireportig('INSP/LR','CENTRAL POLICE LINE MOHALI','paone11');
                            $paonet36 = info_fetch_osireportig('INSP/CR','CENTRAL POLICE LINE MOHALI','paone11');

                            $paonet37 = info_fetch_osireportig('SI','VIGILANCE BUREAU','paone12');
                            $paonet38 = info_fetch_osireportig('INSP/LR','VIGILANCE BUREAU','paone12');
                            $paonet39 = info_fetch_osireportig('INSP/CR','VIGILANCE BUREAU','paone12');

                            $paonet40 = info_fetch_osireportig('SI','STATE NARCOTIC CRIME BUREAU','paone13');
                            $paonet41 = info_fetch_osireportig('INSP/LR','STATE NARCOTIC CRIME BUREAU','paone13');
                            $paonet42 = info_fetch_osireportig('INSP/CR','STATE NARCOTIC CRIME BUREAU','paone13');

                             $paonet43 = info_fetch_osireportig('SI','MOHALI AIRPORT IMMIGRATION DUTY','paone14');
                            $paonet44 = info_fetch_osireportig('INSP/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone14');
                            $paonet45 = info_fetch_osireportig('INSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone14');


                            $paonet46 = info_fetch_osireportig('SI','STATE HUMAN RIGHTS COMMISSION','paone15');
                            $paonet47 = info_fetch_osireportig('INSP/LR','STATE HUMAN RIGHTS COMMISSION','paone15');
                            $paonet48 = info_fetch_osireportig('INSP/CR','STATE HUMAN RIGHTS COMMISSION','paone15');


                             $paonet49 = info_fetch_osireportig('SI','BUREAU OF INVESTIGATION','paone16');
                            $paonet50 = info_fetch_osireportig('INSP/LR','BUREAU OF INVESTIGATION','paone16');
                            $paonet51 = info_fetch_osireportig('INSP/CR','BUREAU OF INVESTIGATION','paone16');

                             $paonet52 = info_fetch_osireportig('SI','RTC/PAP, JALANDHAR','paone17');
                            $paonet53 = info_fetch_osireportig('INSP/LR','RTC/PAP, JALANDHAR','paone17');
                            $paonet54 = info_fetch_osireportig('INSP/CR','RTC/PAP, JALANDHAR','paone17');

                               $paonet55 = info_fetch_osireportig('SI','ISTC/PAP, KAPURTHALA','paone18');
                            $paonet56 = info_fetch_osireportig('INSP/LR','ISTC/PAP, KAPURTHALA','paone18');
                            $paonet57 = info_fetch_osireportig('INSP/CR','ISTC/PAP, KAPURTHALA','paone18');

                            $paonet58 = info_fetch_osireportig('SI','POLICE COMMANDO TRG. CENTRE','paone19');
                            $paonet59 = info_fetch_osireportig('INSP/LR','POLICE COMMANDO TRG. CENTRE','paone19');
                            $paonet60 = info_fetch_osireportig('INSP/CR','POLICE COMMANDO TRG. CENTRE','paone19');
                            

                            $paonet61 = info_fetch_osireportig('SI','RTC LADDA KOTHI SANGRUR','paone20');
                            $paonet62 = info_fetch_osireportig('INSP/LR','RTC LADDA KOTHI SANGRUR','paone20');
                            $paonet63 = info_fetch_osireportig('INSP/CR','RTC LADDA KOTHI SANGRUR','paone20');

                             $paonet64 = info_fetch_osireportig('SI','PUNJAB POLICE ACADEMY PHILLAUR','paone21');
                            $paonet65 = info_fetch_osireportig('INSP/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone21');
                            $paonet66 = info_fetch_osireportig('INSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone21');

                             $paonet67 = info_fetch_osireportig('SI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                            $paonet68 = info_fetch_osireportig('INSP/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                            $paonet69 = info_fetch_osireportig('INSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                     
                            echo $paonet1 + $paonet2 + $paonet3 + $paonet4 + $paonet5 + $paonet6 + $paonet7 + $paonet8 + $paonet9 + $paonet10 + $paonet11 + $paonet15 + $paonet16 + $paonet17 + $paonet18 + $paonet19 + $paonet20 + $paonet20 +  $paonet21 + $paonet22 + $paonet23 + $paonet24 + $paonet25 + $paonet26 + $paonet27 + $paonet28 + $paonet29 + $paonet30 + $paonet31 + $paonet32 + $paonet33 + $paonet34 + $paonet35 + $paonet36 + $paonet37 + $paonet38 + $paonet39 + $paonet40 + $paonet41 + $paonet42 + $paonet43 + $paonet44 + $paonet45 + $paonet46 + $paonet47 + $paonet48 + $paonet49 + $paonet50 + $paonet51 + $paonet52 + $paonet53 + $paonet54 +  $paonet55 + $paonet56 + $paonet57 + $paonet58 + $paonet59 + $paonet60 + $paonet61 + $paonet62 + $paonet63 + $paonet64 + $paonet65 + $paonet66 + $paonet67 + $paonet68 + $paonet69;*/
                    ?></td>
                  <td><?php 
                            /*$fix52 = info_fetch_osireportig('ASI','VP Guards','fone1');
                            $fix53 = info_fetch_osireportig('SI/LR','VP Guards','fone1');
                            $fix54 = info_fetch_osireportig('SI/CR','VP Guards','fone1'); 

                            $fix55 = info_fetch_osireportig('ASI','Jails Security','fone2');
                            $fix56 = info_fetch_osireportig('SI/LR','Jails Security','fone2');  
                            $fix57 = info_fetch_osireportig('SI/CR','Jails Security','fone2');

                           $fix58 = info_fetch_osireportig('ASI','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fix59 = info_fetch_osireportig('SI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');  
                            $fix60 = info_fetch_osireportig('SI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                            $fix61 = info_fetch_osireportig('ASI','DERA BEAS SECURITY DUTY','fone4');
                            $fix62 = info_fetch_osireportig('SI/LR','DERA BEAS SECURITY DUTY','fone4');  
                            $fix63 = info_fetch_osireportig('SI/CR','DERA BEAS SECURITY DUTY','fone4');

                            $fix64 = info_fetch_osireportig('ASI','OTHER STSTIC GUARDS','fone5');
                            $fix65 = info_fetch_osireportig('SI/LR','OTHER STSTIC GUARDS','fone5');  
                            $fix66 = info_fetch_osireportig('SI/CR','OTHER STSTIC GUARDS','fone5');

                            $fix67 = info_fetch_osireportig('ASI','Police Officer','fone6');
                            $fix68 = info_fetch_osireportig('SI/LR','Police Officer','fone6');  
                            $fix69 = info_fetch_osireportig('SI/CR','Police Officer','fone6');

                            $fix70 = info_fetch_osireportig('ASI','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fix71 = info_fetch_osireportig('SI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                            $fix72 = info_fetch_osireportig('SI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                            $fix73 = info_fetch_osireportig('ASI','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fix74 = info_fetch_osireportig('SI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');  
                            $fix75 = info_fetch_osireportig('SI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                            $fix76 = info_fetch_osireportig('ASI','BANK SECURITY DUTY','fone9');
                            $fix77 = info_fetch_osireportig('SI/LR','BANK SECURITY DUTY','fone9');  
                            $fix78 = info_fetch_osireportig('SI/CR','BANK SECURITY DUTY','fone9');

                            $fix79 = info_fetch_osireportig('ASI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fix80 = info_fetch_osireportig('SI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                            $fix81 = info_fetch_osireportig('SI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                            $fix82 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fix83 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                            $fix84 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                            $fix85 = info_fetch_osireportig('ASI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fix86 = info_fetch_osireportig('SI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                            $fix87 = info_fetch_osireportig('SI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                            echo $fix52 + $fix53 + $fix54 + $fix55 + $fix56 + $fix57 + $fix58 + $fix59 + $fix60 + $fix61 + $fix62 + $fix63 + $fix64 + $fix65 + $fix66 + $fix67 + $fix68 + $fix69 + $fix70 + $fix71 + $fix72 + $fix73 + $fix74 + $fix75 + $fix76 + $fix77 + $fix78 + $fix79 + $fix80 + $fix81 + $fix82 + $fix83 + $fix84 + $fix85 + $fix86 + $fix87;*/
                    ?></td>
                  <td><?php 
                            /*$fiix1 = info_fetch_osireportig('HC','VP Guards','fone1');
                            $fiix2 = info_fetch_osireportig('ASI/LR','VP Guards','fone1');
                            $fiix3 = info_fetch_osireportig('ASI/CR','VP Guards','fone1'); 

                            $fiix4 = info_fetch_osireportig('HC','Jails Security','fone2');
                            $fiix5 = info_fetch_osireportig('ASI/LR','Jails Security','fone2');  
                            $fiix6 = info_fetch_osireportig('ASI/CR','Jails Security','fone2');

                            $fiix7 = info_fetch_osireportig('HC','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fiix8 = info_fetch_osireportig('ASI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fiix9 = info_fetch_osireportig('ASI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');

                             $fiix10 = info_fetch_osireportig('HC','DERA BEAS SECURITY DUTY','fone4');
                            $fiix11 = info_fetch_osireportig('ASI/LR','DERA BEAS SECURITY DUTY','fone4');
                            $fiix12 = info_fetch_osireportig('ASI/CR','DERA BEAS SECURITY DUTY','fone4');

                             $fiix13 = info_fetch_osireportig('HC','OTHER STSTIC GUARDS','fone5');
                            $fiix14 = info_fetch_osireportig('ASI/LR','OTHER STSTIC GUARDS','fone5');
                            $fiix15 = info_fetch_osireportig('ASI/CR','OTHER STSTIC GUARDS','fone5');

                             $fiix16 = info_fetch_osireportig('HC','Police Officer','fone6');
                            $fiix17 = info_fetch_osireportig('ASI/LR','Police Officer','fone6');
                            $fiix18 = info_fetch_osireportig('ASI/CR','Police Officer','fone6');

                             $fiix19 = info_fetch_osireportig('HC','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fiix20 = info_fetch_osireportig('ASI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fiix21 = info_fetch_osireportig('ASI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');

                             $fiix22 = info_fetch_osireportig('HC','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fiix23 = info_fetch_osireportig('ASI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fiix24 = info_fetch_osireportig('ASI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');

                             $fiix25 = info_fetch_osireportig('HC','BANK SECURITY DUTY','fone9');
                            $fiix26 = info_fetch_osireportig('ASI/LR','BANK SECURITY DUTY','fone9');
                            $fiix27 = info_fetch_osireportig('ASI/CR','BANK SECURITY DUTY','fone9');

                             $fiix28 = info_fetch_osireportig('HC','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fiix29 = info_fetch_osireportig('ASI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fiix30 = info_fetch_osireportig('ASI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

                             $fiix31 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fiix32 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fiix33 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                             $fiix34 = info_fetch_osireportig('HC','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fiix35 = info_fetch_osireportig('ASI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fiix36 = info_fetch_osireportig('ASI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');



                            echo $fiix1 + $fiix2 + $fiix3 + $fiix4 + $fiix5 + $fiix6 + $fiix7 + $fiix8 + $fiix9 + $fiix10 + $fiix11+ $fiix12 + $fiix13 + $fiix14 + $fiix15 + $fiix16 + $fiix17 + $fiix18 + $fiix19 + $fiix20 + $fiix21 + $fiix22 + $fiix23 + $fiix24 + $fiix25 + $fiix26 + $fiix27 + $fiix28 + $fiix29 + $fiix30;
         */           ?></td>
                  <td><?php 
                            /*$fx1 = info_fetch_osireportig('CT','VP Guards','fone1');
                            $fx2 = info_fetch_osireportig('HC/PR','VP Guards','fone1');
                            $fx3 = info_fetch_osireportig('HC/LR','VP Guards','fone1');
                            $fx4 = info_fetch_osireportig('Sr.Const','VP Guards','fone1');
                             $fx5 = info_fetch_osireportig('C-II','VP Guards','fone1'); 

                            $fx6 = info_fetch_osireportig('CT','Jails Security','fone2');
                            $fx7 = info_fetch_osireportig('HC/PR','Jails Security','fone2');  
                            $fx8 = info_fetch_osireportig('HC/LR','Jails Security','fone2');
                            $fx9 = info_fetch_osireportig('Sr.Const','Jails Security','fone2');
                            $fx10 = info_fetch_osireportig('C-II','Jails Security','fone2');

                            $fx11 = info_fetch_osireportig('CT','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx12 = info_fetch_osireportig('HC/PR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx13 = info_fetch_osireportig('HC/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx14 = info_fetch_osireportig('Sr.Const','Punjab Police HQRS,SEC.9,CHG','fone3');
                            $fx15 = info_fetch_osireportig('C-II','Punjab Police HQRS,SEC.9,CHG','fone3');


                            $fx16 = info_fetch_osireportig('CT','DERA BEAS SECURITY DUTY','fone4');
                            $fx17 = info_fetch_osireportig('HC/PR','DERA BEAS SECURITY DUTY','fone4');
                            $fx18 = info_fetch_osireportig('HC/LR','DERA BEAS SECURITY DUTY','fone4');
                            $fx19 = info_fetch_osireportig('Sr.Const','DERA BEAS SECURITY DUTY','fone4');
                            $fx20 = info_fetch_osireportig('C-II','DERA BEAS SECURITY DUTY','fone4');

                            $fx21 = info_fetch_osireportig('CT','OTHER STSTIC GUARDS','fone5');
                            $fx22 = info_fetch_osireportig('HC/PR','OTHER STSTIC GUARDS','fone5');
                            $fx23 = info_fetch_osireportig('HC/LR','OTHER STSTIC GUARDS','fone5');
                            $fx24 = info_fetch_osireportig('Sr.Const','OTHER STSTIC GUARDS','fone5');
                            $fx25 = info_fetch_osireportig('C-II','OTHER STSTIC GUARDS','fone5');


                            $fx26 = info_fetch_osireportig('CT','Police Officer','fone6');
                            $fx27 = info_fetch_osireportig('HC/PR','Police Officer','fone6');
                            $fx28 = info_fetch_osireportig('HC/LR','Police Officer','fone6');
                            $fx29 = info_fetch_osireportig('Sr.Const','Police Officer','fone6');
                            $fx30 = info_fetch_osireportig('C-II','Police Officer','fone6');


                            $fx31 = info_fetch_osireportig('CT','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx32 = info_fetch_osireportig('HC/PR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx33 = info_fetch_osireportig('HC/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx34 = info_fetch_osireportig('Sr.Const','VIP SEC.WING CHG.U/82nd BN.','fone7');
                            $fx35 = info_fetch_osireportig('C-II','VIP SEC.WING CHG.U/82nd BN.','fone7');


                            $fx36 = info_fetch_osireportig('CT','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx37 = info_fetch_osireportig('HC/PR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx38 = info_fetch_osireportig('HC/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx39 = info_fetch_osireportig('Sr.Const','POLICE SEC.WING CHG U/13th BN.','fone8');
                            $fx40 = info_fetch_osireportig('C-II','POLICE SEC.WING CHG U/13th BN.','fone8');


                            $fx41 = info_fetch_osireportig('CT','BANK SECURITY DUTY','fone9');
                            $fx42 = info_fetch_osireportig('HC/PR','BANK SECURITY DUTY','fone9');
                            $fx43 = info_fetch_osireportig('HC/LR','BANK SECURITY DUTY','fone9');
                            $fx44 = info_fetch_osireportig('Sr.Const','BANK SECURITY DUTY','fone9');
                            $fx45 = info_fetch_osireportig('C-II','BANK SECURITY DUTY','fone9');


                            $fx46 = info_fetch_osireportig('CT','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx47 = info_fetch_osireportig('HC/PR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx48 = info_fetch_osireportig('HC/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx49 = info_fetch_osireportig('Sr.Const','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                            $fx50 = info_fetch_osireportig('C-II','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');


                            $fx51 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx52 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx53 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx54 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                            $fx55 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

                             $fx56 = info_fetch_osireportig('CT','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx57 = info_fetch_osireportig('HC/PR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx58 = info_fetch_osireportig('HC/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx59 = info_fetch_osireportig('Sr.Const','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                            $fx60 = info_fetch_osireportig('C-II','PB. BHAWAN NEW DELHI (RESERVE)','fone12');


                     echo $fx1 + $fx2 + $fx3 + $fx4 + $fx5 + $fx6 + $fx7 + $fx8 + $fx9 + $fx10 + $fx11 + $fx12 + $fx13 + $fx14 + $fx15 + $fx16 + $fx17 + $fx18 + $fx19 + $fx20 + $fx21 + $fx22 + $fx23 + $fx24 + $fx25 + $fx26 + $fx27 + $fx28 + $fx29 + $fx30 + $fx31 + $fx32 + $fx33 + $fx34 + $fx35 + $fx36 + $fx37 + $fx38 + $fx39 + $fx40 + $fx41 + $fx42 + $fx43 + $fx44 + $fx45 + $fx46 + $fx47 + $fx48 + $fx49 + $fx50 + $fx51 + $fx52 + $fx53 + $fx54 + $fx55 + $fx56 + $fx57 + $fx58 + $fx59 + $fx60;
              */      ?></td>
                  <td><?php  
                     echo $parting =  $part1 + $part2 + $part3 + $part4 + $part5 + $part6 + $part7 + $part8 + $part9 + $part10 + $part11 + $part12 + $part13 + $part14 + $part15 + $part16 + $part17 + $part18 + $part19 + $part20 + $part21 +  $part22 + $part23 + $part24 + $part25 + $part26 + $part27 + $part28 + $part29 + $part30 + $part31 + $part32 + $part33 + $part34 + $part35 + $part36 + $part37 + $part38 + $part39 + $part40 + $part41 + $part42 + $part43 + $part44 + $part45 + $part46 + $part47 + $part48 + $part49 + $part50 + $part51 + $part52 + $part53 + $part54 + $part55 + $part56 + $part57 + $part58 + $part59+ $part60 + $part61 + $part62 + $part63 + $part64 + $part65 + $part66 + $part67 + $part68 + $part69 + $part70 + $part71 + $part72 + $part73 + $part74 + $part75 + $part76 + $part77 + $part78 + $part79 + $part80 + $part81 + $part82 + $part83 + $part84 + $part85 + $part86 + $part87 + $part88 + $part89 + $part90 + $part91 + $part92 + $part93 + $part94 + $part95 + $part96 + $part97 + $part98 + $part99 + $part100 + $part101 + $part102 + $part103;

                    ?>

                   </td>
                </tr>

              </tbody>
           </table>

                                <h3> 5. TRAINING</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 580px">BASIC TRAINING</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','BASIC TRANING','traning1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','BASIC TRANING','traning1'); 
                      echo $insp43 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','BASIC TRANING','traning1');
            $hold4 = info_fetch_osireportig('INSP/LR','BASIC TRANING','traning1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','BASIC TRANING','traning1'); 
            echo $si44 =$hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','BASIC TRANING','traning1'); 
                $hold7 = info_fetch_osireportig('SI/CR','BASIC TRANING','traning1');  
                $hold8 = info_fetch_osireportig('SI/LR','BASIC TRANING','traning1'); 
                echo $asi43 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','BASIC TRANING','traning1');
                    $hold10 = info_fetch_osireportig('ASI/LR','BASIC TRANING','traning1');
                     $hold11 = info_fetch_osireportig('ASI/CR','BASIC TRANING','traning1');
             echo $hc43= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','BASIC TRANING','traning1');
                       $hold13 = info_fetch_osireportig('HC/PR','BASIC TRANING','traning1');
                        $hold14 = info_fetch_osireportig('HC/LR','BASIC TRANING','traning1');
                         $hold15 = info_fetch_osireportig('Sr.Const','BASIC TRANING','traning1');
                         $hold16 = info_fetch_osireportig('C-II','BASIC TRANING','traning1');

             echo $ct43= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>PROMOTIONAL COURSES</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','PROMOTIONAL COURSE','traning2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PROMOTIONAL COURSE','traning2'); 
                      echo $insp44 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PROMOTIONAL COURSE','traning2');
            $hold4 = info_fetch_osireportig('INSP/LR','PROMOTIONAL COURSE','traning2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PROMOTIONAL COURSE','traning2'); 
            echo $si45 =$hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PROMOTIONAL COURSE','traning2'); 
                $hold7 = info_fetch_osireportig('SI/CR','PROMOTIONAL COURSE','traning2');  
                $hold8 = info_fetch_osireportig('SI/LR','PROMOTIONAL COURSE','traning2'); 
                echo $asi44 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PROMOTIONAL COURSE','traning2');
                    $hold10 = info_fetch_osireportig('ASI/LR','PROMOTIONAL COURSE','traning2');
                     $hold11 = info_fetch_osireportig('ASI/CR','PROMOTIONAL COURSE','traning2');
             echo $hc44= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PROMOTIONAL COURSE','traning2');
                       $hold13 = info_fetch_osireportig('HC/PR','PROMOTIONAL COURSE','traning2');
                        $hold14 = info_fetch_osireportig('HC/LR','PROMOTIONAL COURSE','traning2');
                         $hold15 = info_fetch_osireportig('Sr.Const','PROMOTIONAL COURSE','traning2');
                         $hold16 = info_fetch_osireportig('C-II','PROMOTIONAL COURSE','traning2');

             echo $ct44=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DEPARTTMENTAL COURSES</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','DEPARTMENT COURSE','traning3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','DEPARTMENT COURSE','traning3'); 
                      echo $insp45 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','DEPARTMENT COURSE','traning3');
            $hold4 = info_fetch_osireportig('INSP/LR','DEPARTMENT COURSE','traning3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','DEPARTMENT COURSE','traning3'); 
            echo $si46 =$hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','DEPARTMENT COURSE','traning3'); 
                $hold7 = info_fetch_osireportig('SI/CR','DEPARTMENT COURSE','traning3');  
                $hold8 = info_fetch_osireportig('SI/LR','DEPARTMENT COURSE','traning3'); 
                echo $asi45 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','DEPARTMENT COURSE','traning3');
                    $hold10 = info_fetch_osireportig('ASI/LR','DEPARTMENT COURSE','traning3');
                     $hold11 = info_fetch_osireportig('ASI/CR','DEPARTMENT COURSE','traning3');
             echo $hc45=  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','DEPARTMENT COURSE','traning3');
                       $hold13 = info_fetch_osireportig('HC/PR','DEPARTMENT COURSE','traning3');
                        $hold14 = info_fetch_osireportig('HC/LR','DEPARTMENT COURSE','traning3');
                         $hold15 = info_fetch_osireportig('Sr.Const','DEPARTMENT COURSE','traning3');
                         $hold16 = info_fetch_osireportig('C-II','DEPARTMENT COURSE','traning3');

             echo $ct45=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>


                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                 <td><?php 
                            $tain1 = info_fetch_osireportig('INSP','BASIC TRANING','traning1');
                            $tain2 = info_fetch_osireportig('DSP/CR','BASIC TRANING','traning1');

                            $tain3 = info_fetch_osireportig('INSP','PROMOTIONAL COURSE','traning2'); 
                            $tain4 = info_fetch_osireportig('DSP/CR','PROMOTIONAL COURSE','traning2');

                            $tain5 = info_fetch_osireportig('INSP','DEPARTMENT COURSE','traning3');  
                            $tain6 = info_fetch_osireportig('DSP/CR','DEPARTMENT COURSE','traning3');

                           
                            echo $tain1 + $tain2 + $tain3 + $tain4 + $tain5 + $tain6;
                    ?></td>
                  <td><?php 
                            $tain7 = info_fetch_osireportig('SI','BASIC TRANING','traning1');
                            $tain8 = info_fetch_osireportig('INSP/LR','BASIC TRANING','traning1');
                            $tain9 = info_fetch_osireportig('INSP/CR','BASIC TRANING','traning1'); 

                            $tain10 = info_fetch_osireportig('SI','PROMOTIONAL COURSE','traning2');
                            $tain11 = info_fetch_osireportig('INSP/LR','PROMOTIONAL COURSE','traning2');  
                            $tain12 = info_fetch_osireportig('INSP/CR','PROMOTIONAL COURSE','traning2');

                            $tain13 = info_fetch_osireportig('SI','DEPARTMENT COURSE','traning3');
                            $tain14 = info_fetch_osireportig('INSP/LR','DEPARTMENT COURSE','traning3');
                            $tain15 = info_fetch_osireportig('INSP/CR','DEPARTMENT COURSE','traning3');


                            echo  $tain7 + $tain8 + $tain9 + $tain10 + $tain11 + $tain12 + $tain13 + $tain14 + $tain15;
                    ?></td>
                  <td><?php 
                            $tain16 = info_fetch_osireportig('ASI','BASIC TRANING','traning1');
                            $tain17 = info_fetch_osireportig('SI/LR','BASIC TRANING','traning1');
                            $tain18 = info_fetch_osireportig('SI/CR','BASIC TRANING','traning1'); 

                            $tain19 = info_fetch_osireportig('ASI','PROMOTIONAL COURSE','traning2');
                            $tain20 = info_fetch_osireportig('SI/LR','PROMOTIONAL COURSE','traning2');  
                            $tain21 = info_fetch_osireportig('SI/CR','PROMOTIONAL COURSE','traning2');

                            $tain22 = info_fetch_osireportig('ASI','DEPARTMENT COURSE','traning3');
                            $tain23 = info_fetch_osireportig('SI/LR','DEPARTMENT COURSE','traning3');
                            $tain24 = info_fetch_osireportig('SI/CR','DEPARTMENT COURSE','traning3');

                           
                           
                            echo  $tain16 + $tain17 + $tain18 + $tain19 + $tain20 + $tain21 + $tain22 + $tain23 + $tain24;
                    ?></td>
                  <td><?php 
                            $tain25 = info_fetch_osireportig('HC','BASIC TRANING','traning1');
                            $tain26 = info_fetch_osireportig('ASI/LR','BASIC TRANING','traning1');
                            $tain27 = info_fetch_osireportig('ASI/CR','BASIC TRANING','traning1'); 

                            $tain28 = info_fetch_osireportig('HC','PROMOTIONAL COURSE','traning2');
                            $tain29 = info_fetch_osireportig('ASI/LR','PROMOTIONAL COURSE','traning2');  
                            $tain30 = info_fetch_osireportig('ASI/CR','PROMOTIONAL COURSE','traning2');

                            $tain31 = info_fetch_osireportig('HC','DEPARTMENT COURSE','traning3');
                            $tain32 = info_fetch_osireportig('ASI/LR','DEPARTMENT COURSE','traning3');
                            $tain33 = info_fetch_osireportig('ASI/CR','DEPARTMENT COURSE','traning3');


                            echo $tain25 + $tain26 + $tain27 + $tain28 + $tain29 + $tain30 + $tain31 + $tain32 + $tain33;
                    ?></td>
                  <td><?php 
                            $tain34 = info_fetch_osireportig('CT','BASIC TRANING','traning1');
                            $tain35 = info_fetch_osireportig('HC/PR','BASIC TRANING','traning1');
                            $tain36 = info_fetch_osireportig('HC/LR','BASIC TRANING','traning1');
                            $tain37 = info_fetch_osireportig('Sr.Const','BASIC TRANING','traning1');
                            $tain38 = info_fetch_osireportig('C-II','BASIC TRANING','traning1'); 

                            $tain39 = info_fetch_osireportig('CT','PROMOTIONAL COURSE','traning2');
                            $tain40 = info_fetch_osireportig('HC/PR','PROMOTIONAL COURSE','traning2');  
                            $tain41 = info_fetch_osireportig('HC/LR','PROMOTIONAL COURSE','traning2');
                            $tain42 = info_fetch_osireportig('Sr.Const','PROMOTIONAL COURSE','traning2');
                            $tain43 = info_fetch_osireportig('C-II','PROMOTIONAL COURSE','traning2');

                            $tain44 = info_fetch_osireportig('CT','DEPARTMENT COURSE','traning3');
                            $tain45 = info_fetch_osireportig('HC/PR','DEPARTMENT COURSE','traning3');
                            $tain46 = info_fetch_osireportig('HC/LR','DEPARTMENT COURSE','traning3');
                            $tain47 = info_fetch_osireportig('Sr.Const','DEPARTMENT COURSE','traning3');
                            $tain48 = info_fetch_osireportig('C-II','DEPARTMENT COURSE','traning3');
                             

                            echo $tain34 + $tain35 + $tain36 + $tain37 + $tain38 + $tain39 + $tain40 + $tain41 + $tain42 + $tain43 + $tain44 + $tain45 + $tain46 + $tain47 + $tain48;
                    ?></td>
                  <td><?php  
                    echo $training = $tain1 + $tain2 + $tain3 + $tain4 + $tain5 + $tain6 + $tain7 + $tain8 + $tain9 + $tain10 + $tain11 + $tain12 + $tain13 + $tain14 + $tain15 + $tain16 + $tain17 + $tain18 + $tain19 + $tain20 + $tain21 + $tain22 + $tain23 + $tain24 + $tain25 + $tain26 + $tain27 + $tain28 + $tain29 + $tain30 + $tain31 + $tain32 + $tain33 + $tain34 + $tain35 + $tain36 + $tain37 + $tain38 + $tain39 + $tain40 + $tain41 + $tain42 + $tain43 + $tain44 + $tain45 + $tain46 + $tain47 + $tain48;
                    ?>

                   </td>

                </tr>
              </tbody>
           </table>


                                <h3> 6. SPORTS</h3>
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th> </th>
                    <th></th>
                    <th></th>
                    <th></th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 570px">DSO</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','DSO','ssone23'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','DSO','ssone23'); 
                      echo $insp46 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','DSO','ssone23');
            $hold4 = info_fetch_osireportig('INSP/LR','DSO','ssone23'); 
            $hold5 = info_fetch_osireportig('INSP/CR','DSO','ssone23'); 
            echo $si47 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','DSO','ssone23'); 
                $hold7 = info_fetch_osireportig('SI/CR','DSO','ssone23');  
                $hold8 = info_fetch_osireportig('SI/LR','DSO','ssone23'); 
                echo $asi46 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','DSO','ssone23');
                    $hold10 = info_fetch_osireportig('ASI/LR','DSO','ssone23');
                     $hold11 = info_fetch_osireportig('ASI/CR','DSO','ssone23');
             echo $hc46= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','DSO','ssone23');
                       $hold13 = info_fetch_osireportig('HC/PR','DSO','ssone23');
                        $hold14 = info_fetch_osireportig('HC/LR','DSO','ssone23');
                         $hold15 = info_fetch_osireportig('Sr.Const','DSO','ssone23');
                         $hold16 = info_fetch_osireportig('C-II','DSO','ssone23');

             echo $ct46=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CENTRAL SPORTS OFFICE JALANDHAR</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','CSO, JALANDHAR','ssone24'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','CSO, JALANDHAR','ssone24'); 
                      echo $insp47 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','CSO, JALANDHAR','ssone24');
            $hold4 = info_fetch_osireportig('INSP/LR','CSO, JALANDHAR','ssone24'); 
            $hold5 = info_fetch_osireportig('INSP/CR','CSO, JALANDHAR','ssone24'); 
            echo $si48 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','CSO, JALANDHAR','ssone24'); 
                $hold7 = info_fetch_osireportig('SI/CR','CSO, JALANDHAR','ssone24');  
                $hold8 = info_fetch_osireportig('SI/LR','CSO, JALANDHAR','ssone24'); 
                echo $asi47 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','CSO, JALANDHAR','ssone24');
                    $hold10 = info_fetch_osireportig('ASI/LR','CSO, JALANDHAR','ssone24');
                     $hold11 = info_fetch_osireportig('ASI/CR','CSO, JALANDHAR','ssone24');
             echo $hc47= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','CSO, JALANDHAR','ssone24');
                       $hold13 = info_fetch_osireportig('HC/PR','CSO, JALANDHAR','ssone24');
                        $hold14 = info_fetch_osireportig('HC/LR','CSO, JALANDHAR','ssone24');
                         $hold15 = info_fetch_osireportig('Sr.Const','CSO, JALANDHAR','ssone24');
                         $hold16 = info_fetch_osireportig('C-II','CSO, JALANDHAR','ssone24');

             echo $ct47=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>NIS PATIALA</td>
                              <td><?php $hold1 = info_fetch_osireportig('INSP','NIS PATIALA','ssone25'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','NIS PATIALA','ssone25'); 
                      echo $insp48 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','NIS PATIALA','ssone25');
            $hold4 = info_fetch_osireportig('INSP/LR','NIS PATIALA','ssone25'); 
            $hold5 = info_fetch_osireportig('INSP/CR','NIS PATIALA','ssone25'); 
            echo $si49 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','NIS PATIALA','ssone25'); 
                $hold7 = info_fetch_osireportig('SI/CR','NIS PATIALA','ssone25');  
                $hold8 = info_fetch_osireportig('SI/LR','NIS PATIALA','ssone25'); 
                echo $asi48 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','NIS PATIALA','ssone25');
                    $hold10 = info_fetch_osireportig('ASI/LR','NIS PATIALA','ssone25');
                     $hold11 = info_fetch_osireportig('ASI/CR','NIS PATIALA','ssone25');
             echo $hc48= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','NIS PATIALA','ssone25');
                       $hold13 = info_fetch_osireportig('HC/PR','NIS PATIALA','ssone25');
                        $hold14 = info_fetch_osireportig('HC/LR','NIS PATIALA','ssone25');
                         $hold15 = info_fetch_osireportig('Sr.Const','NIS PATIALA','ssone25');
                         $hold16 = info_fetch_osireportig('C-II','NIS PATIALA','ssone25');

             echo $ct48= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>


                 <tr>
                  <td>iv)</td>
                  <td>OTHER</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','OTHERS','ssone26'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','OTHERS','ssone26'); 
                      echo $insp49 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','OTHERS','ssone26');
            $hold4 = info_fetch_osireportig('INSP/LR','OTHERS','ssone26'); 
            $hold5 = info_fetch_osireportig('INSP/CR','OTHERS','ssone26'); 
            echo $si50 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','OTHERS','ssone26'); 
                $hold7 = info_fetch_osireportig('SI/CR','OTHERS','ssone26');  
                $hold8 = info_fetch_osireportig('SI/LR','OTHERS','ssone26'); 
                echo $asi49 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','OTHERS','ssone26');
                    $hold10 = info_fetch_osireportig('ASI/LR','OTHERS','ssone26');
                     $hold11 = info_fetch_osireportig('ASI/CR','OTHERS','ssone26');
             echo $hc49= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','OTHERS','ssone26');
                       $hold13 = info_fetch_osireportig('HC/PR','OTHERS','ssone26');
                        $hold14 = info_fetch_osireportig('HC/LR','OTHERS','ssone26');
                         $hold15 = info_fetch_osireportig('Sr.Const','OTHERS','ssone26');
                         $hold16 = info_fetch_osireportig('C-II','OTHERS','ssone26');

             echo $ct49= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                   <td><?php 
                            $ssone1 = info_fetch_osireportig('INSP','DSO','ssone23');
                            $ssone2 = info_fetch_osireportig('DSP/CR','DSO','ssone23');

                            $ssone3 = info_fetch_osireportig('INSP','CSO, JALANDHAR','ssone24'); 
                            $ssone4 = info_fetch_osireportig('DSP/CR','CSO, JALANDHAR','ssone24');

                            $ssone5 = info_fetch_osireportig('INSP','NIS PATIALA','ssone25');  
                            $ssone6 = info_fetch_osireportig('DSP/CR','NIS PATIALA','ssone25');

                            $ssone7 = info_fetch_osireportig('INSP','OTHERS','ssone26');
                            $ssone8 = info_fetch_osireportig('DSP/CR','OTHERS','ssone26');

                           
                            echo $ssone1 + $ssone2 + $ssone3 + $ssone4 + $ssone5 + $ssone6 + $ssone7 + $ssone8;
                    ?></td>
                  <td><?php 
                            $ssone9 = info_fetch_osireportig('SI','DSO','ssone23');
                            $ssone10 = info_fetch_osireportig('INSP/LR','DSO','ssone23');
                            $ssone11 = info_fetch_osireportig('INSP/CR','DSO','ssone23'); 

                            $ssone12 = info_fetch_osireportig('SI','CSO, JALANDHAR','ssone24');
                            $ssone13 = info_fetch_osireportig('INSP/LR','CSO, JALANDHAR','ssone24');  
                            $ssone14 = info_fetch_osireportig('INSP/CR','CSO, JALANDHAR','ssone24');

                            $ssone15 = info_fetch_osireportig('SI','NIS PATIALA','ssone25');
                            $ssone16 = info_fetch_osireportig('INSP/LR','NIS PATIALA','ssone25');
                            $ssone17 = info_fetch_osireportig('INSP/CR','NIS PATIALA','ssone25');

                            $ssone18 = info_fetch_osireportig('SI','OTHERS','ssone26');
                            $ssone19 = info_fetch_osireportig('INSP/LR','OTHERS','ssone26');
                            $ssone20 = info_fetch_osireportig('INSP/CR','OTHERS','ssone26');

                          
                           
                            echo  $ssone9 + $ssone10 + $ssone11 + $ssone12 + $ssone13 + $ssone14 + $ssone15 + $ssone16 + $ssone17 + $ssone18 + $ssone19 + $ssone20;
                    ?></td>
                  <td><?php 
                            $ssone21 = info_fetch_osireportig('ASI','DSO','ssone23');
                            $ssone22 = info_fetch_osireportig('SI/LR','DSO','ssone23');
                            $ssone23 = info_fetch_osireportig('SI/CR','DSO','ssone23'); 

                            $ssone24 = info_fetch_osireportig('ASI','CSO, JALANDHAR','ssone24');
                            $ssone25 = info_fetch_osireportig('SI/LR','CSO, JALANDHAR','ssone24');  
                            $ssone26 = info_fetch_osireportig('SI/CR','CSO, JALANDHAR','ssone24');

                            $ssone27 = info_fetch_osireportig('ASI','NIS PATIALA','ssone25');
                            $ssone28 = info_fetch_osireportig('SI/LR','NIS PATIALA','ssone25');
                            $ssone29 = info_fetch_osireportig('SI/CR','NIS PATIALA','ssone25');

                            $ssone30 = info_fetch_osireportig('ASI','OTHERS','ssone26');
                            $ssone31 = info_fetch_osireportig('SI/LR','OTHERS','ssone26');
                            $ssone32 = info_fetch_osireportig('SI/CR','OTHERS','ssone26');

                           
                           
                            echo  $ssone21 + $ssone22 + $ssone23 + $ssone24 + $ssone25 + $ssone26 + $ssone27 + $ssone28 + $ssone29 + $ssone30 + $ssone31 + $ssone32;
                    ?></td>
                  <td><?php 
                            $ssone33 = info_fetch_osireportig('HC','DSO','ssone23');
                            $ssone34 = info_fetch_osireportig('ASI/LR','DSO','ssone23');
                            $ssone35 = info_fetch_osireportig('ASI/CR','DSO','ssone23'); 

                            $ssone36 = info_fetch_osireportig('HC','CSO, JALANDHAR','ssone24');
                            $ssone37 = info_fetch_osireportig('ASI/LR','CSO, JALANDHAR','ssone24');  
                            $ssone38 = info_fetch_osireportig('ASI/CR','CSO, JALANDHAR','ssone24');

                            $ssone39 = info_fetch_osireportig('HC','NIS PATIALA','ssone25');
                            $ssone40 = info_fetch_osireportig('ASI/LR','NIS PATIALA','ssone25');
                            $ssone41 = info_fetch_osireportig('ASI/CR','NIS PATIALA','ssone25');

                            $ssone42 = info_fetch_osireportig('HC','OTHERS','ssone26');
                            $ssone43 = info_fetch_osireportig('ASI/LR','OTHERS','ssone26');
                            $ssone44 = info_fetch_osireportig('ASI/CR','OTHERS','ssone26');

                          
                            echo $ssone33 + $ssone34 + $ssone35 + $ssone36 + $ssone37 + $ssone38 + $ssone39 + $ssone40 + $ssone41 + $ssone42 + $ssone43 + $ssone44;
                    ?></td>
                  <td><?php 
                            $ssone45 = info_fetch_osireportig('CT','DSO','ssone23');
                            $ssone46 = info_fetch_osireportig('HC/PR','DSO','ssone23');
                            $ssone47 = info_fetch_osireportig('HC/LR','DSO','ssone23');
                            $ssone48 = info_fetch_osireportig('Sr.Const','DSO','ssone23');
                            $ssone49 = info_fetch_osireportig('C-II','DSO','ssone23'); 

                            $ssone50 = info_fetch_osireportig('CT','CSO, JALANDHAR','ssone24');
                            $ssone51 = info_fetch_osireportig('HC/PR','CSO, JALANDHAR','ssone24');  
                            $ssone52 = info_fetch_osireportig('HC/LR','CSO, JALANDHAR','ssone24');
                            $ssone53 = info_fetch_osireportig('Sr.Const','CSO, JALANDHAR','ssone24');
                            $ssone54 = info_fetch_osireportig('C-II','CSO, JALANDHAR','ssone24');

                            $ssone55 = info_fetch_osireportig('CT','NIS PATIALA','ssone25');
                            $ssone56 = info_fetch_osireportig('HC/PR','NIS PATIALA','ssone25');
                            $ssone57 = info_fetch_osireportig('HC/LR','NIS PATIALA','ssone25');
                            $ssone58 = info_fetch_osireportig('Sr.Const','NIS PATIALA','ssone25');
                            $ssone59 = info_fetch_osireportig('C-II','NIS PATIALA','ssone25');

                            $ssone60 = info_fetch_osireportig('CT','OTHERS','ssone26');
                            $ssone61 = info_fetch_osireportig('HC/PR','OTHERS','ssone26');
                            $ssone62 = info_fetch_osireportig('HC/LR','OTHERS','ssone26');
                            $ssone63 = info_fetch_osireportig('Sr.Const','OTHERS','ssone26');
                            $ssone64 = info_fetch_osireportig('C-II','OTHERS','ssone26');


                                                      
                            echo $ssone45 + $ssone46 + $ssone47 + $ssone48 + $ssone49 + $ssone50 + $ssone51 + $ssone52 + $ssone53 + $ssone54 + $ssone55 + $ssone56 + $ssone57 + $ssone58 + $ssone59 + $ssone60 + $ssone61 + $ssone62 + $ssone63 + $ssone64;
                    ?></td>
                  <td><?php  
                   echo $ssonees =  $ssone1 + $ssone2 + $ssone3 + $ssone4 + $ssone5 + $ssone6 + $ssone7 + $ssone8 + $ssone9 + $ssone10 + $ssone11 + $ssone12 + $ssone13 + $ssone14 + $ssone15 + $ssone16 + $ssone17 + $ssone18 + $ssone19 + $ssone20 + $ssone21 + $ssone22 + $ssone23 + $ssone24 + $ssone25 + $ssone26 + $ssone27 + $ssone28 + $ssone29 + $ssone30 + $ssone31 + $ssone32 + $ssone33 + $ssone34 + $ssone35 + $ssone36 + $ssone37 + $ssone38 + $ssone39 + $ssone40 + $ssone41 + $ssone42 + $ssone43 + $ssone44 + $ssone45 + $ssone46 + $ssone47 + $ssone48 + $ssone49 + $ssone50 + $ssone51 + $ssone52 + $ssone53 + $ssone54 + $ssone55 + $ssone56 + $ssone57 + $ssone58 + $ssone59 + $ssone60 + $ssone61 + $ssone62 + $ssone63 + $ssone64;
                    ?>

                   </td>
                </tr>
              </tbody>
           </table>


                    <h3> 7. AVAILABLE WITH BNs.</h3>
            <table class="table  table-fixedheader"  id="table">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 570px">PAP HQRS. CAMPUS SECURITY</td>
                               <td><?php $hold1 = info_fetch_osireportig('INSP','PAP CAMPUS  SECURITY','awbone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
                      echo $insp50 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PAP CAMPUS  SECURITY','awbone1');
            $hold4 = info_fetch_osireportig('INSP/LR','PAP CAMPUS  SECURITY','awbone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
            echo $si51 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PAP CAMPUS  SECURITY','awbone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','PAP CAMPUS  SECURITY','awbone1');  
                $hold8 = info_fetch_osireportig('SI/LR','PAP CAMPUS  SECURITY','awbone1'); 
                echo $asi50 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PAP CAMPUS  SECURITY','awbone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','PAP CAMPUS  SECURITY','awbone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','PAP CAMPUS  SECURITY','awbone1');
             echo $hc50= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PAP CAMPUS  SECURITY','awbone1');
                       $hold13 = info_fetch_osireportig('HC/PR','PAP CAMPUS  SECURITY','awbone1');
                        $hold14 = info_fetch_osireportig('HC/LR','PAP CAMPUS  SECURITY','awbone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','PAP CAMPUS  SECURITY','awbone1');
                         $hold16 = info_fetch_osireportig('C-II','PAP CAMPUS  SECURITY','awbone1');

             echo $ct50=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                      echo $insp51 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
            $hold4 = info_fetch_osireportig('INSP/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            echo $si52 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                $hold8 = info_fetch_osireportig('SI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                echo $asi51 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
             echo $hc51= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                       $hold13 = info_fetch_osireportig('HC/PR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                        $hold14 = info_fetch_osireportig('HC/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold16 = info_fetch_osireportig('C-II','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

             echo $ct51=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>OFFICE STAFF IN ARMED HIGHER OFFICES</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      echo $insp52 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','OFFICE STAFF IN HIGHER OFFICES','awbone3');
            $hold4 = info_fetch_osireportig('INSP/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            echo $si53 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');  
                $hold8 = info_fetch_osireportig('SI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                echo $asi52 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
             echo $hc52=  $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                       $hold13 = info_fetch_osireportig('HC/PR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                        $hold14 = info_fetch_osireportig('HC/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold16 = info_fetch_osireportig('C-II','OFFICE STAFF IN HIGHER OFFICES','awbone3');

             echo $ct52= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>OFFICE STAFF IN BN. OFFICES</td>
                            <td><?php $hold1 = info_fetch_osireportsipgs('INSP','','awbone4'); 
                      $hold2 = info_fetch_osireportsipgs('DSP/CR','','awbone4'); 
                      echo $insp53 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportsipgs('SI','','awbone4');
            $hold4 = info_fetch_osireportsipgs('INSP/LR','','awbone4'); 
            $hold5 = info_fetch_osireportsipgs('INSP/CR','','awbone4'); 
            echo $si54 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportsipgs('ASI','','awbone4'); 
                $hold7 = info_fetch_osireportsipgs('SI/CR','','awbone4');  
                $hold8 = info_fetch_osireportsipgs('SI/LR','','awbone4'); 
                echo $asi53 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportsipgs('HC','','awbone4');
                    $hold10 = info_fetch_osireportsipgs('ASI/LR','','awbone4');
                     $hold11 = info_fetch_osireportsipgs('ASI/CR','','awbone4');
             echo $hc54= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportsipgs('CT','','awbone4');
                       $hold13 = info_fetch_osireportsipgs('HC/PR','','awbone4');
                        $hold14 = info_fetch_osireportsipgs('HC/LR','','awbone4');
                         $hold15 = info_fetch_osireportsipgs('Sr.Const','','awbone4');
                         $hold16 = info_fetch_osireportsipgs('C-II','','awbone4');

             echo $ct53= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>BN. KOT GUARDS</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','BN. KOT GUARDS','awbone5'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','BN KOT GUARD','awbone5'); 
                      echo $insp54 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','BN KOT GUARD','awbone5');
            $hold4 = info_fetch_osireportig('INSP/LR','BN KOT GUARD','awbone5'); 
            $hold5 = info_fetch_osireportig('INSP/CR','BN KOT GUARD','awbone5'); 
            echo $si55 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','BN KOT GUARD','awbone5'); 
                $hold7 = info_fetch_osireportig('SI/CR','BN KOT GUARD','awbone5');  
                $hold8 = info_fetch_osireportig('SI/LR','BN KOT GUARD','awbone5'); 
                echo $asi54 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','BN KOT GUARD','awbone5');
                    $hold10 = info_fetch_osireportig('ASI/LR','BN KOT GUARD','awbone5');
                     $hold11 = info_fetch_osireportig('ASI/CR','BN KOT GUARD','awbone5');
             echo $hc55= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','BN KOT GUARD','awbone5');
                       $hold13 = info_fetch_osireportig('HC/PR','BN KOT GUARD','awbone5');
                        $hold14 = info_fetch_osireportig('HC/LR','BN KOT GUARD','awbone5');
                         $hold15 = info_fetch_osireportig('Sr.Const','BN KOT GUARD','awbone5');
                         $hold16 = info_fetch_osireportig('C-II','BN KOT GUARD','awbone5');

             echo $ct54= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>BN. HQRS OTHER GUARDS</td>
                  <td><?php $hold1 = info_fetch_osireportsipgs('INSP','','awbone6'); 
                      $hold2 = info_fetch_osireportsipgs('DSP/CR','','awbone6'); 
                      echo $insp55 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportsipgs('SI','','awbone6');
            $hold4 = info_fetch_osireportsipgs('INSP/LR','','awbone6'); 
            $hold5 = info_fetch_osireportsipgs('INSP/CR','','awbone6'); 
            echo $si56 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportsipgs('ASI','','awbone6'); 
                $hold7 = info_fetch_osireportsipgs('SI/CR','','awbone6');  
                $hold8 = info_fetch_osireportsipgs('SI/LR','','awbone6'); 
                echo $asi55 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportsipgs('HC','BN. HQRS.  OTHER GUARD','awbone6');
                    $hold10 = info_fetch_osireportsipgs('ASI/LR','BN. HQRS.  OTHER GUARD','awbone6');
                     $hold11 = info_fetch_osireportsipgs('ASI/CR','BN. HQRS.  OTHER GUARD','awbone6');
             echo $hc56= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportsipgs('CT','BN. HQRS.  OTHER GUARD','awbone6');
                       $hold13 = info_fetch_osireportsipgs('HC/PR','BN. HQRS.  OTHER GUARD','awbone6');
                        $hold14 = info_fetch_osireportsipgs('HC/LR','BN. HQRS.  OTHER GUARD','awbone6');
                         $hold15 = info_fetch_osireportsipgs('Sr.Const','BN. HQRS.  OTHER GUARD','awbone6');
                         $hold16 = info_fetch_osireportsipgs('C-II','BN. HQRS.  OTHER GUARD','awbone6');

             echo $ct55= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>TRADEMEN</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','TRADESMEN','awbone7'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','TRADESMEN','awbone7'); 
                      echo $insp56 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','TRADESMEN','awbone7');
            $hold4 = info_fetch_osireportig('INSP/LR','TRADESMEN','awbone7'); 
            $hold5 = info_fetch_osireportig('INSP/CR','TRADESMEN','awbone7'); 
            echo $si57 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','TRADESMEN','awbone7'); 
                $hold7 = info_fetch_osireportig('SI/CR','TRADESMEN','awbone7');  
                $hold8 = info_fetch_osireportig('SI/LR','TRADESMEN','awbone7'); 
                echo $asi56 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','TRADESMEN','awbone7');
                    $hold10 = info_fetch_osireportig('ASI/LR','TRADESMEN','awbone7');
                     $hold11 = info_fetch_osireportig('ASI/CR','TRADESMEN','awbone7');
             echo  $hc57= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','TRADESMEN','awbone7');
                       $hold13 = info_fetch_osireportig('HC/PR','TRADESMEN','awbone7');
                        $hold14 = info_fetch_osireportig('HC/LR','TRADESMEN','awbone7');
                         $hold15 = info_fetch_osireportig('Sr.Const','TRADESMEN','awbone7');
                         $hold16 = info_fetch_osireportig('C-II','TRADESMEN','awbone7');

             echo $ct56= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>viii)</td>
                  <td>M.T.SECTION </td>
                    <td><?php $hold1 = info_fetch_osireportig('INSP','M.T. SECTION','awbone8'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','M.T. SECTION','awbone8'); 
                      echo $insp57 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','M.T. SECTION','awbone8');
            $hold4 = info_fetch_osireportig('INSP/LR','M.T. SECTION','awbone8'); 
            $hold5 = info_fetch_osireportig('INSP/CR','M.T. SECTION','awbone8'); 
            echo $si58 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','M.T. SECTION','awbone8'); 
                $hold7 = info_fetch_osireportig('SI/CR','M.T. SECTION','awbone8');  
                $hold8 = info_fetch_osireportig('SI/LR','M.T. SECTION','awbone8'); 
                echo $asi57 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','M.T. SECTION','awbone8');
                    $hold10 = info_fetch_osireportig('ASI/LR','M.T. SECTION','awbone8');
                     $hold11 = info_fetch_osireportig('ASI/CR','M.T. SECTION','awbone8');
             echo $hc58= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','M.T. SECTION','awbone8');
                       $hold13 = info_fetch_osireportig('HC/PR','M.T. SECTION','awbone8');
                        $hold14 = info_fetch_osireportig('HC/LR','M.T. SECTION','awbone8');
                         $hold15 = info_fetch_osireportig('Sr.Const','M.T. SECTION','awbone8');
                         $hold16 = info_fetch_osireportig('C-II','M.T. SECTION','awbone8');

             echo $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>QUARTER MASTER BRANCH (LINE STAFF)</td>
                  <td><?php $hold1 = info_fetch_osireportig('INSP','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
                      echo $insp58 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
            $hold4 = info_fetch_osireportig('INSP/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
            $hold5 = info_fetch_osireportig('INSP/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
            echo $si59 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
                $hold7 = info_fetch_osireportig('SI/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');  
                $hold8 = info_fetch_osireportig('SI/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9'); 
                echo $asi58 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                    $hold10 = info_fetch_osireportig('ASI/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                     $hold11 = info_fetch_osireportig('ASI/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
             echo $hc59= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                       $hold13 = info_fetch_osireportig('HC/PR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                        $hold14 = info_fetch_osireportig('HC/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                         $hold15 = info_fetch_osireportig('Sr.Const','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                         $hold16 = info_fetch_osireportig('C-II','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');

             echo $ct57= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>GENERAL DUTY</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','GENERAL DUTY BN.HQRS','awbone10'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
                      echo $insp59 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','GENERAL DUTY BN.HQRS','awbone10');
            $hold4 = info_fetch_osireportig('INSP/LR','GENERAL DUTY BN.HQRS','awbone10'); 
            $hold5 = info_fetch_osireportig('INSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
            echo $si60 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','GENERAL DUTY BN.HQRS','awbone10'); 
                $hold7 = info_fetch_osireportig('SI/CR','GENERAL DUTY BN.HQRS','awbone10');  
                $hold8 = info_fetch_osireportig('SI/LR','GENERAL DUTY BN.HQRS','awbone10'); 
                echo $asi59 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','GENERAL DUTY BN.HQRS','awbone10');
                    $hold10 = info_fetch_osireportig('ASI/LR','GENERAL DUTY BN.HQRS','awbone10');
                     $hold11 = info_fetch_osireportig('ASI/CR','GENERAL DUTY BN.HQRS','awbone10');
             echo $hc60= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','GENERAL DUTY BN.HQRS','awbone10');
                       $hold13 = info_fetch_osireportig('HC/PR','GENERAL DUTY BN.HQRS','awbone10');
                        $hold14 = info_fetch_osireportig('HC/LR','GENERAL DUTY BN.HQRS','awbone10');
                         $hold15 = info_fetch_osireportig('Sr.Const','GENERAL DUTY BN.HQRS','awbone10');
                         $hold16 = info_fetch_osireportig('C-II','GENERAL DUTY BN.HQRS','awbone10');

             echo $ct58= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>RECRUITMENT DUTY</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','RECRUITMENT DUTY','awbone12'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','RECRUITMENT DUTY','awbone12'); 
                      echo $insp60 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','RECRUITMENT DUTY','awbone12');
            $hold4 = info_fetch_osireportig('INSP/LR','RECRUITMENT DUTY','awbone12'); 
            $hold5 = info_fetch_osireportig('INSP/CR','RECRUITMENT DUTY','awbone12'); 
            echo $si61 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI,','RECRUITMENT DUTY','awbone12'); 
                $hold7 = info_fetch_osireportig('SI/CR','RECRUITMENT DUTY','awbone12');  
                $hold8 = info_fetch_osireportig('SI/LR','RECRUITMENT DUTY','awbone12'); 
                echo $asi60 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','RECRUITMENT DUTY','awbone12');
                    $hold10 = info_fetch_osireportig('ASI/LR','RECRUITMENT DUTY','awbone12');
                     $hold11 = info_fetch_osireportig('ASI/CR','RECRUITMENT DUTY','awbone12');
             echo $hc61= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','RECRUITMENT DUTY','awbone12');
                       $hold13 = info_fetch_osireportig('HC/PR','RECRUITMENT DUTY','awbone12');
                        $hold14 = info_fetch_osireportig('HC/LR','RECRUITMENT DUTY','awbone12');
                         $hold15 = info_fetch_osireportig('Sr.Const','RECRUITMENT DUTY','awbone12');
                         $hold16 = info_fetch_osireportig('C-II','RECRUITMENT DUTY','awbone12');

             echo $ct59= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                           

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                  <td><?php 
                            $bmdone1 = info_fetch_osireportig('INSP','PAP CAMPUS  SECURITY','awbone1');
                            $bmdone2 = info_fetch_osireportig('DSP/CR','PAP CAMPUS  SECURITY','awbone1');

                            $bmdone3 = info_fetch_osireportig('INSP','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2'); 
                            $bmdone4 = info_fetch_osireportig('DSP/CR','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2');

                            $bmdone5 = info_fetch_osireportig('INSP','OFFICE STAFF IN HIGHER OFFICES','awbone3');  
                            $bmdone6 = info_fetch_osireportig('DSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');

                            $bmdone7 = info_fetch_osireportsipgs('INSP','','awbone4');
                            $bmdone8 = info_fetch_osireportsipgs('DSP/CR','','awbone4');

                            $bmdone9 = info_fetch_osireportig('INSP','BN. KOT GUARDS','awbone5');
                            $bmdone10 = info_fetch_osireportig('DSP/CR','BN. KOT GUARDS','awbone5');

                            $bmdone11 = info_fetch_osireportig('INSP','BN. HQRS.  OTHER GUARD','bmdone6');
                            $bmdone12 = info_fetch_osireportig('DSP/CR','BN. HQRS.  OTHER GUARD','awbone6');

                            $bmdone13 = info_fetch_osireportig('INSP','TRADESMEN','awbone7');
                            $bmdone14 = info_fetch_osireportig('DSP/CR','TRADESMEN','awbone7');

                            $bmdone15 = info_fetch_osireportig('INSP','M.T. SECTION','awbone8');
                            $bmdone16 = info_fetch_osireportig('DSP/CR','M.T. SECTION','awbone8');

                             $bmdone17 = info_fetch_osireportig('INSP','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdone18 = info_fetch_osireportig('DSP/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');

                             $bmdone19 = info_fetch_osireportig('INSP','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdone20 = info_fetch_osireportig('DSP/CR','GENERAL DUTY BN.HQRS','awbone10');

                             $bmdone21 = info_fetch_osireportig('INSP','RECRUITMENT DUTY','awbone12');
                            $bmdone22 = info_fetch_osireportig('DSP/CR','RECRUITMENT DUTY','awbone12');

                         
                           
                            echo $bmdone1 + $bmdone2 + $bmdone3 + $bmdone4 + $bmdone5 + $bmdone6 + $bmdone7 + $bmdone8 + $bmdone9 + $bmdone10 + $bmdone11 + $bmdone12 + $bmdone13 + $bmdone14 + $bmdone15 + $bmdone16 + $bmdone17 + $bmdone18 + $bmdone19 + $bmdone20 + $bmdone21 + $bmdone22;
                    ?></td>
                  <td><?php 
                            $bmdt1 = info_fetch_osireportig('SI','PAP CAMPUS  SECURITY','awbone1');
                            $bmdt2 = info_fetch_osireportig('INSP/LR','PAP CAMPUS  SECURITY','awbone1');
                            $bmdt3 = info_fetch_osireportig('INSP/CR','PAP CAMPUS  SECURITY','awbone1'); 

                  $bmdt4 = info_fetch_osireportig('SI','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2');
                            $bmdt5 = info_fetch_osireportig('INSP/LR','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2');  
                            $bmdt6 = info_fetch_osireportig('INSP/CR','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2');

                            $bmdt6 = info_fetch_osireportig('SI','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdt7 = info_fetch_osireportig('INSP/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdt8 = info_fetch_osireportig('INSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');

                            $bmdt9 = info_fetch_osireportsipgs('SI','','awbone4');
                            $bmdt10 = info_fetch_osireportsipgs('INSP/LR','','awbone4');
                            $bmdt11 = info_fetch_osireportsipgs('INSP/CR','','awbone4');

                            $bmdt12 = info_fetch_osireportig('SI','BN. KOT GUARDS','awbone5');
                            $bmdt13 = info_fetch_osireportig('INSP/LR','BN. KOT GUARDS','awbone5');
                            $bmdt14 = info_fetch_osireportig('INSP/CR','BN. KOT GUARDS','awbone5');

                            $bmdt15 = info_fetch_osireportig('SI','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdt16 = info_fetch_osireportig('INSP/LR','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdt17 = info_fetch_osireportig('INSP/CR','BN. HQRS.  OTHER GUARD','awbone6');


                           $bmdt18 = info_fetch_osireportig('SI','TRADESMEN','awbone7');
                            $bmdt19 = info_fetch_osireportig('INSP/LR','TRADESMEN','awbone7');
                            $bmdt20 = info_fetch_osireportig('INSP/CR','TRADESMEN','awbone7');

                            $bmdt21 = info_fetch_osireportig('SI','M.T. SECTION','awbone8');
                            $bmdt22 = info_fetch_osireportig('INSP/LR','M.T. SECTION','awbone8');
                            $bmdt23 = info_fetch_osireportig('INSP/CR','M.T. SECTION','awbone8');

                            $bmdt24 = info_fetch_osireportig('SI','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdt25 = info_fetch_osireportig('INSP/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdt26 = info_fetch_osireportig('INSP/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');                            

                            $bmdt27 = info_fetch_osireportig('SI','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdt28 = info_fetch_osireportig('INSP/LR','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdt29 = info_fetch_osireportig('INSP/CR','GENERAL DUTY BN.HQRS','awbone10');

                            $bmdt30 = info_fetch_osireportig('SI','RECRUITMENT DUTY','awbone12');
                            $bmdt31 = info_fetch_osireportig('INSP/LR','RECRUITMENT DUTY','awbone12');
                            $bmdt32 = info_fetch_osireportig('INSP/CR','RECRUITMENT DUTY','awbone12'); 

                         
                           
                            echo $bmdt1 + $bmdt2 + $bmdt3 + $bmdt4 + $bmdt5 + $bmdt6 + $bmdt7 + $bmdt8 + $bmdt9 + $bmdt10 + $bmdt11 + $bmdt12 + $bmdt13 + $bmdt14 + $bmdt15 + $bmdt16 + $bmdt17 + $bmdt18 + $bmdt19 + $bmdt20 + $bmdt21 + $bmdt22 +  $bmdt23 + $bmdt24 + $bmdt25 + $bmdt26 + $bmdt27 + $bmdt28 + $bmdt29 + $bmdt30 + $bmdt31 + $bmdt32;
                    ?></td>
                  <td><?php 
                            $bmdth1 = info_fetch_osireportig('ASI','PAP CAMPUS  SECURITY','awbone1');
                            $bmdth2 = info_fetch_osireportig('SI/LR','PAP CAMPUS  SECURITY','awbone1');
                            $bmdth3 = info_fetch_osireportig('SI/CR','PAP CAMPUS  SECURITY','awbone1'); 

                  $bmdth4 = info_fetch_osireportig('ASI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                            $bmdth5 = info_fetch_osireportig('SI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                            $bmdth6 = info_fetch_osireportig('SI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

                            $bmdth6 = info_fetch_osireportig('ASI','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdth7 = info_fetch_osireportig('SI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdth8 = info_fetch_osireportig('SI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');

                            $bmdth9 = info_fetch_osireportsipgs('ASI','','awbone4');
                            $bmdth10 = info_fetch_osireportsipgs('SI/LR','','awbone4');
                            $bmdth11 = info_fetch_osireportsipgs('SI/CR','','awbone4');

                            $bmdth12 = info_fetch_osireportig('ASI','BN. KOT GUARDS','awbone5');
                            $bmdth13 = info_fetch_osireportig('SI/LR','BN. KOT GUARDS','awbone5');
                            $bmdth14 = info_fetch_osireportig('SI/CR','BN. KOT GUARDS','awbone5');

                            $bmdth15 = info_fetch_osireportig('ASI','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdth16 = info_fetch_osireportig('SI/LR','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdth17 = info_fetch_osireportig('SI/CR','BN. HQRS.  OTHER GUARD','awbone6');


                           $bmdth18 = info_fetch_osireportig('ASI','TRADESMEN','awbone7');
                            $bmdth19 = info_fetch_osireportig('SI/LR','TRADESMEN','awbone7');
                            $bmdth20 = info_fetch_osireportig('SI/CR','TRADESMEN','awbone7');

                            $bmdth21 = info_fetch_osireportig('ASI','M.T. SECTION','awbone8');
                            $bmdth22 = info_fetch_osireportig('SI/LR','M.T. SECTION','awbone8');
                            $bmdth23 = info_fetch_osireportig('SI/CR','M.T. SECTION','awbone8');

                            $bmdth24 = info_fetch_osireportig('ASI','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdth25 = info_fetch_osireportig('SI/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdth26 = info_fetch_osireportig('SI/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');                            

                            $bmdth27 = info_fetch_osireportig('ASI','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdth28 = info_fetch_osireportig('SI/LR','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdth29 = info_fetch_osireportig('SI/CR','GENERAL DUTY BN.HQRS','awbone10');

                            $bmdth30 = info_fetch_osireportig('ASI','RECRUITMENT DUTY','awbone12');
                            $bmdth31 = info_fetch_osireportig('SI/LR','RECRUITMENT DUTY','awbone12');
                            $bmdth32 = info_fetch_osireportig('SI/CR','RECRUITMENT DUTY','awbone12'); 

                         
                           
                            echo $bmdth1 + $bmdth2 + $bmdth3 + $bmdth4 + $bmdth5 + $bmdth6 + $bmdth7 + $bmdth8 + $bmdth9 + $bmdth10 + $bmdth11 + $bmdth12 + $bmdth13 + $bmdth14 + $bmdth15 + $bmdth16 + $bmdth17 + $bmdth18 + $bmdth19 + $bmdth20 + $bmdth21 + $bmdth22 +  $bmdth23 + $bmdth24 + $bmdth25 + $bmdth26 + $bmdth27 + $bmdth28 + $bmdth29 + $bmdth30 + $bmdth31 + $bmdth32;
                    ?></td>
                  <td><?php 
                            $bmdf1 = info_fetch_osireportig('HC','PAP CAMPUS  SECURITY','awbone1');
                            $bmdf2 = info_fetch_osireportig('ASI/LR','PAP CAMPUS  SECURITY','awbone1');
                            $bmdf3 = info_fetch_osireportig('ASI/CR','PAP CAMPUS  SECURITY','awbone1'); 

                            $bmdf4 = info_fetch_osireportig('HC','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                            $bmdf5 = info_fetch_osireportig('ASI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                            $bmdf6 = info_fetch_osireportig('ASI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

                            $bmdf6 = info_fetch_osireportig('HC','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdf7 = info_fetch_osireportig('ASI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdf8 = info_fetch_osireportig('ASI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');

                            $bmdf9 = info_fetch_osireportsipgs('HC','','awbone4');
                            $bmdf10 = info_fetch_osireportsipgs('ASI/LR','','awbone4');
                            $bmdf11 = info_fetch_osireportsipgs('ASI/CR','','awbone4');

                            $bmdf12 = info_fetch_osireportig('HC','BN. KOT GUARDS','awbone5');
                            $bmdf13 = info_fetch_osireportig('ASI/LR','BN. KOT GUARDS','awbone5');
                            $bmdf14 = info_fetch_osireportig('ASI/CR','BN. KOT GUARDS','awbone5');

                            $bmdf15 = info_fetch_osireportig('HC','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdf16 = info_fetch_osireportig('ASI/LR','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdf17 = info_fetch_osireportig('ASI/CR','BN. HQRS.  OTHER GUARD','awbone6');


                           $bmdf18 = info_fetch_osireportig('HC','TRADESMEN','awbone7');
                            $bmdf19 = info_fetch_osireportig('ASI/LR','TRADESMEN','awbone7');
                            $bmdf20 = info_fetch_osireportig('ASI/CR','TRADESMEN','awbone7');

                            $bmdf21 = info_fetch_osireportig('HC','M.T. SECTION','awbone8');
                            $bmdf22 = info_fetch_osireportig('ASI/LR','M.T. SECTION','awbone8');
                            $bmdf23 = info_fetch_osireportig('ASI/CR','M.T. SECTION','awbone8');

                            $bmdf24 = info_fetch_osireportig('HC','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdf25 = info_fetch_osireportig('ASI/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdf26 = info_fetch_osireportig('ASI/CR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');                            

                            $bmdf27 = info_fetch_osireportig('HC','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdf28 = info_fetch_osireportig('ASI/LR','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdf29 = info_fetch_osireportig('ASI/CR','GENERAL DUTY BN.HQRS','awbone10');

                            $bmdf30 = info_fetch_osireportig('HC','RECRUITMENT DUTY','awbone12');
                            $bmdf31 = info_fetch_osireportig('ASI/LR','RECRUITMENT DUTY','awbone12');
                            $bmdf32 = info_fetch_osireportig('ASI/CR','RECRUITMENT DUTY','awbone12'); 

                         
                           
                            echo $bmdf1 + $bmdf2 + $bmdf3 + $bmdf4 + $bmdf5 + $bmdf6 + $bmdf7 + $bmdf8 + $bmdf9 + $bmdf10 + $bmdf11 + $bmdf12 + $bmdf13 + $bmdf14 + $bmdf15 + $bmdf16 + $bmdf17 + $bmdf18 + $bmdf19 + $bmdf20 + $bmdf21 + $bmdf22 +  $bmdf23 + $bmdf24 + $bmdf25 + $bmdf26 + $bmdf27 + $bmdf28 + $bmdf29 + $bmdf30 + $bmdf31 + $bmdf32;
                    ?></td>
                  <td><?php 
                            $bmdfv1 = info_fetch_osireportig('CT','PAP CAMPUS  SECURITY','awbone1');
                            $bmdfv2 = info_fetch_osireportig('HC/PR','PAP CAMPUS  SECURITY','awbone1');
                            $bmdfv3 = info_fetch_osireportig('HC/LR','PAP CAMPUS  SECURITY','awbone1');
                            $bmdfv4 = info_fetch_osireportig('Sr.Const','PAP CAMPUS  SECURITY','awbone1');
                             $bmdfv5 = info_fetch_osireportig('C-II','PAP CAMPUS  SECURITY','awbone1'); 

                            $bmdfv6 = info_fetch_osireportig('CT','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                            $bmdfv7 = info_fetch_osireportig('HC/PR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                            $bmdfv8 = info_fetch_osireportig('HC/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                            $bmdfv9 = info_fetch_osireportig('Sr.Const','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                            $bmdfv10 = info_fetch_osireportig('C-II','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

                            $bmdfv11 = info_fetch_osireportig('CT','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdfv12 = info_fetch_osireportig('HC/PR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdfv13 = info_fetch_osireportig('HC/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdfv14 = info_fetch_osireportig('Sr.Const','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                            $bmdfv15 = info_fetch_osireportig('C-II','OFFICE STAFF IN HIGHER OFFICES','awbone3');

                            $bmdfv16 = info_fetch_osireportsipgs('CT','','awbone4');
                            $bmdfv17 = info_fetch_osireportsipgs('HC/PR','','awbone4');
                            $bmdfv18 = info_fetch_osireportsipgs('HC/LR','','awbone4');
                            $bmdfv19 = info_fetch_osireportsipgs('Sr.Const','','awbone4');
                             $bmdfv20 = info_fetch_osireportsipgs('C-II','','awbone4');

                            $bmdfv21 = info_fetch_osireportig('CT','BN. KOT GUARDS','awbone5');
                            $bmdfv22 = info_fetch_osireportig('HC/PR','BN. KOT GUARDS','awbone5');
                            $bmdfv23 = info_fetch_osireportig('HC/LR','BN. KOT GUARDS','awbone5');
                            $bmdfv24 = info_fetch_osireportig('Sr.Const','BN. KOT GUARDS','awbone5');
                            $bmdfv25 = info_fetch_osireportig('C-II','BN. KOT GUARDS','awbone5');

                            $bmdfv26 = info_fetch_osireportig('CT','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdfv27 = info_fetch_osireportig('HC/PR','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdfv28 = info_fetch_osireportig('HC/LR','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdfv29 = info_fetch_osireportig('Sr.Const','BN. HQRS.  OTHER GUARD','awbone6');
                            $bmdfv30 = info_fetch_osireportig('C-II','BN. HQRS.  OTHER GUARD','awbone6');

                           $bmdfv31 = info_fetch_osireportig('CT','TRADESMEN','awbone7');
                            $bmdfv32 = info_fetch_osireportig('HC/PR','TRADESMEN','awbone7');
                            $bmdfv33 = info_fetch_osireportig('HC/LR','TRADESMEN','awbone7');
                            $bmdfv34 = info_fetch_osireportig('Sr.Const','TRADESMEN','awbone7');
                             $bmdfv35 = info_fetch_osireportig('C-II','TRADESMEN','awbone7');

                            $bmdfv36 = info_fetch_osireportig('CT','M.T. SECTION','awbone8');
                            $bmdfv37 = info_fetch_osireportig('HC/PR','M.T. SECTION','awbone8');
                            $bmdfv38 = info_fetch_osireportig('HC/LR','M.T. SECTION','awbone8');
                            $bmdfv39 = info_fetch_osireportig('Sr.Const','M.T. SECTION','awbone8');
                            $bmdfv40 = info_fetch_osireportig('C-II','M.T. SECTION','awbone8');

                            $bmdfv41 = info_fetch_osireportig('CT','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdfv42 = info_fetch_osireportig('HC/PR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                            $bmdfv43 = info_fetch_osireportig('HC/LR','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');                            
                            $bmdfv44 = info_fetch_osireportig('Sr.Const','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');
                             $bmdfv45 = info_fetch_osireportig('C-II','QUARTERMASTER BRANCH (LINE STAFF)','awbone9');

                            $bmdfv46 = info_fetch_osireportig('CT','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdfv47 = info_fetch_osireportig('HC/PR','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdfv48 = info_fetch_osireportig('HC/LR','GENERAL DUTY BN.HQRS','awbone10');
                            $bmdfv49 = info_fetch_osireportig('Sr.Const','GENERAL DUTY BN.HQRS','awbone10');
                             $bmdfv50 = info_fetch_osireportig('C-II','GENERAL DUTY BN.HQRS','awbone10');


                            $bmdfv51 = info_fetch_osireportig('CT','RECRUITMENT DUTY','awbone12');
                            $bmdfv52 = info_fetch_osireportig('HC/PR','RECRUITMENT DUTY','awbone12');
                            $bmdfv53 = info_fetch_osireportig('HC/LR','RECRUITMENT DUTY','awbone12');
                            $bmdfv54 = info_fetch_osireportig('Sr.Const','RECRUITMENT DUTY','awbone12'); 
                            $bmdfv55 = info_fetch_osireportig('C-II','RECRUITMENT DUTY','awbone12'); 



                            echo $bmdfv1 + $bmdfv2 + $bmdfv3 + $bmdfv4 + $bmdfv5 + $bmdfv6 + $bmdfv7 + $bmdfv8 + $bmdfv8 + $bmdfv9 + $bmdfv10 + $bmdfv11 + $bmdfv12 + $bmdfv13 + $bmdfv14 + $bmdfv15 + $bmdfv16 + $bmdfv17 + $bmdfv18 + $bmdfv19 + $bmdfv20 + $bmdfv21 + $bmdfv22 +  $bmdfv23 + $bmdfv24 + $bmdfv25 + $bmdfv26 + $bmdfv27 + $bmdfv28 + $bmdfv29 + $bmdfv30 + $bmdfv31 + $bmdfv32 + $bmdfv33 + $bmdfv34 + $bmdfv35 + $bmdfv36 + $bmdfv37 + $bmdfv38 + $bmdfv39 + $bmdfv40 + $bmdfv41 + $bmdfv42 + $bmdfv43 + $bmdfv44 + $bmdfv45 + $bmdfv46 + $bmdfv47 + $bmdfv48 + $bmdfv49 + $bmdfv50 + $bmdfv51 + $bmdfv52 + $bmdfv53 + $bmdfv54 + $bmdfv55;
                    ?></td>

                  <td><?php  
                    echo $bmdonessss =  $bmdone1 + $bmdone2 + $bmdone3 + $bmdone4 + $bmdone5 + $bmdone6 + $bmdone7 + $bmdone8 + $bmdone9 + $bmdone10 + $bmdone11 + $bmdone12 + $bmdone13 + $bmdone14 + $bmdone15 + $bmdone16 + $bmdone17 + $bmdone18 + $bmdone19 + $bmdone20 + $bmdone21 + $bmdone22 + $bmdt1 + $bmdt2 + $bmdt3 + $bmdt4 + $bmdt5 + $bmdt6 + $bmdt7 + $bmdt8 + $bmdt9 + $bmdt10 + $bmdt11 + $bmdt12 + $bmdt13 + $bmdt14 + $bmdt15 + $bmdt16 + $bmdt17 + $bmdt18 + $bmdt19 + $bmdt20 + $bmdt21 + $bmdt22 +  $bmdt23 + $bmdt24 + $bmdt25 + $bmdt26 + $bmdt27 + $bmdt28 + $bmdt29 + $bmdt30 + $bmdt31 + $bmdt32 + $bmdth1 + $bmdth2 + $bmdth3 + $bmdth4 + $bmdth5 + $bmdth6 + $bmdth7 + $bmdth8 + $bmdth9 + $bmdth10 + $bmdth11 + $bmdth12 + $bmdth13 + $bmdth14 + $bmdth15 + $bmdth16 + $bmdth17 + $bmdth18 + $bmdth19 + $bmdth20 + $bmdth21 + $bmdth22 +  $bmdth23 + $bmdth24 + $bmdth25 + $bmdth26 + $bmdth27 + $bmdth28 + $bmdth29 + $bmdth30 + $bmdth31 + $bmdth32 + $bmdf1 + $bmdf2 + $bmdf3 + $bmdf4 + $bmdf5 + $bmdf6 + $bmdf7 + $bmdf8 + $bmdf9 + $bmdf10 + $bmdf11 + $bmdf12 + $bmdf13 + $bmdf14 + $bmdf15 + $bmdf16 + $bmdf17 + $bmdf18 + $bmdf19 + $bmdf20 + $bmdf21 + $bmdf22 +  $bmdf23 + $bmdf24 + $bmdf25 + $bmdf26 + $bmdf27 + $bmdf28 + $bmdf29 + $bmdf30 + $bmdf31 + $bmdf32 + $bmdfv1 + $bmdfv2 + $bmdfv3 + $bmdfv4 + $bmdfv5 + $bmdfv6 + $bmdfv7 + $bmdfv8 + $bmdfv8 + $bmdfv9 + $bmdfv10 + $bmdfv11 + $bmdfv12 + $bmdfv13 + $bmdfv14 + $bmdfv15 + $bmdfv16 + $bmdfv17 + $bmdfv18 + $bmdfv19 + $bmdfv20 + $bmdfv21 + $bmdfv22 +  $bmdfv23 + $bmdfv24 + $bmdfv25 + $bmdfv26 + $bmdfv27 + $bmdfv28 + $bmdfv29 + $bmdfv30 + $bmdfv31 + $bmdfv32 + $bmdfv33 + $bmdfv34 + $bmdfv35 + $bmdfv36 + $bmdfv37 + $bmdfv38 + $bmdfv39 + $bmdfv40 + $bmdfv41 + $bmdfv42 + $bmdfv43 + $bmdfv44 + $bmdfv45 + $bmdfv46 + $bmdfv47 + $bmdfv48 + $bmdfv49 + $bmdfv50 + $bmdfv51 + $bmdfv52 + $bmdfv53 + $bmdfv54 + $bmdfv55;
                    ?></td>
                </tr>
              </tbody>
           </table>

<h3>8. MISC</h3>
<table  class="table  table-fixedheader"  id="table">
  <tbody>
    <tr>
                  <td>i)</td>
                  <td  style="width: 570px">RECRUITS</td>
                 

                    <td><?php $hold1 = info_fetch_osireportig('INSP','RECRUIT','bmdone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','RECRUIT','bmdone1'); 
                      echo $insp61 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','RECRUIT','bmdone1');
            $hold4 = info_fetch_osireportig('INSP/LR','RECRUIT','bmdone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','RECRUIT','bmdone1'); 
            echo $si62 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','RECRUIT','bmdone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','RECRUIT','bmdone1');  
                $hold8 = info_fetch_osireportig('SI/LR','RECRUIT','bmdone1'); 
                echo $asi61 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','RECRUIT','bmdone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','RECRUIT','bmdone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','RECRUIT','bmdone1');
             echo $hc62= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','RECRUIT','bmdone1');
                       $hold13 = info_fetch_osireportig('HC/PR','RECRUIT','bmdone1');
                        $hold14 = info_fetch_osireportig('HC/LR','RECRUIT','bmdone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','RECRUIT','bmdone1');
                         $hold16 = info_fetch_osireportig('C-II','RECRUIT','bmdone1');

             echo $ct60= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>

                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>LEAVES</td>
                 

                    <td><?php $hold1 = info_fetch_osireportig('INSP','LEAVE','bmdone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','LEAVE','bmdone2'); 
                      echo $insp62 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','LEAVE','bmdone2');
            $hold4 = info_fetch_osireportig('INSP/LR','LEAVE','bmdone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','LEAVE','bmdone2'); 
            echo $si63 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','LEAVE','bmdone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','LEAVE','bmdone2');  
                $hold8 = info_fetch_osireportig('SI/LR','LEAVE','bmdone2'); 
                echo $asi62 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','LEAVE','bmdone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','LEAVE','bmdone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','LEAVE','bmdone2');
             echo $hc63= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','LEAVE','bmdone2');
                       $hold13 = info_fetch_osireportig('HC/PR','LEAVE','bmdone2');
                        $hold14 = info_fetch_osireportig('HC/LR','LEAVE','bmdone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','LEAVE','bmdone2');
                         $hold16 = info_fetch_osireportig('C-II','LEAVE','bmdone2');

             echo $ct61= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>

                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ABSENT</td>
                <td><?php $hold1 = info_fetch_osireportig('INSP','ABSENT','bmdone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','ABSENT','bmdone3'); 
                      echo $insp63 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','ABSENT','bmdone3');
            $hold4 = info_fetch_osireportig('INSP/LR','ABSENT','bmdone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','ABSENT','bmdone3'); 
            echo $si64 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','ABSENT','bmdone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','ABSENT','bmdone3');  
                $hold8 = info_fetch_osireportig('SI/LR','ABSENT','bmdone3'); 
                echo $asi63 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','ABSENT','bmdone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','ABSENT','bmdone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','ABSENT','bmdone3');
             echo $hc64= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','ABSENT','bmdone3');
                       $hold13 = info_fetch_osireportig('HC/PR','ABSENT','bmdone3');
                        $hold14 = info_fetch_osireportig('HC/LR','ABSENT','bmdone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','ABSENT','bmdone3');
                         $hold16 = info_fetch_osireportig('C-II','ABSENT','bmdone3');

             echo $ct62= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>UNDER SUSPENTION</td>

                         <td><?php $hold1 = info_fetch_osireportig('INSP','UNDER SUSPENSION','bmdone4'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','UNDER SUSPENSION','bmdone4'); 
                      echo $insp64 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','UNDER SUSPENSION','bmdone4');
            $hold4 = info_fetch_osireportig('INSP/LR','UNDER SUSPENSION','bmdone4'); 
            $hold5 = info_fetch_osireportig('INSP/CR','UNDER SUSPENSION','bmdone4'); 
            echo $si65 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','UNDER SUSPENSION','bmdone4'); 
                $hold7 = info_fetch_osireportig('SI/CR','UNDER SUSPENSION','bmdone4');  
                $hold8 = info_fetch_osireportig('SI/LR','UNDER SUSPENSION','bmdone4'); 
                echo $asi64 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','UNDER SUSPENSION','bmdone4');
                    $hold10 = info_fetch_osireportig('ASI/LR','UNDER SUSPENSION','bmdone4');
                     $hold11 = info_fetch_osireportig('ASI/CR','UNDER SUSPENSION','bmdone4');
             echo $hc65= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','UNDER SUSPENSION','bmdone4');
                       $hold13 = info_fetch_osireportig('HC/PR','UNDER SUSPENSION','bmdone4');
                        $hold14 = info_fetch_osireportig('HC/LR','UNDER SUSPENSION','bmdone4');
                         $hold15 = info_fetch_osireportig('Sr.Const','UNDER SUSPENSION','bmdone4');
                         $hold16 = info_fetch_osireportig('C-II','UNDER SUSPENSION','bmdone4');

             echo $ct63= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>HANDICAPPED ON MEDICAL REST</td>
                 
                         <td><?php $hold1 = info_fetch_osireportig('INSP','Handicapped on Medical Rest','bmdone5'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','Handicapped on Medical Rest','bmdone5'); 
                      echo $insp65 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','Handicapped on Medical Rest','bmdone5');
            $hold4 = info_fetch_osireportig('INSP/LR','Handicapped on Medical Rest','bmdone5'); 
            $hold5 = info_fetch_osireportig('INSP/CR','Handicapped on Medical Rest','bmdone5'); 
            echo $si66 =  $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','Handicapped on Medical Rest','bmdone5'); 
                $hold7 = info_fetch_osireportig('SI/CR','Handicapped on Medical Rest','bmdone5');  
                $hold8 = info_fetch_osireportig('SI/LR','Handicapped on Medical Rest','bmdone5'); 
                echo $asi65 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','Handicapped on Medical Rest','bmdone5');
                    $hold10 = info_fetch_osireportig('ASI/LR','Handicapped on Medical Rest','bmdone5');
                     $hold11 = info_fetch_osireportig('ASI/CR','Handicapped on Medical Rest','bmdone5');
             echo $hc66= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','Handicapped on Medical Rest','bmdone5');
                       $hold13 = info_fetch_osireportig('HC/PR','Handicapped on Medical Rest','bmdone5');
                        $hold14 = info_fetch_osireportig('HC/LR','Handicapped on Medical Rest','bmdone5');
                         $hold15 = info_fetch_osireportig('Sr.Const','Handicapped on Medical Rest','bmdone5');
                         $hold16 = info_fetch_osireportig('C-II','Handicapped on Medical Rest','bmdone5');

             echo $ct64= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>HANDICAPPED ON LIGHT DUTY</td>

             <td><?php $hold1 = info_fetch_osireportig('INSP','Handicapped on light duty','bmdone6'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','Handicapped on light duty','bmdone6'); 
                      echo $insp66 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','Handicapped on light duty','bmdone6');
            $hold4 = info_fetch_osireportig('INSP/LR','Handicapped on light duty','bmdone6'); 
            $hold5 = info_fetch_osireportig('INSP/CR','Handicapped on light duty','bmdone6'); 
            echo $si67 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','Handicapped on light duty','bmdone6'); 
                $hold7 = info_fetch_osireportig('SI/CR','Handicapped on light duty','bmdone6');  
                $hold8 = info_fetch_osireportig('SI/LR','Handicapped on light duty','bmdone6'); 
                echo $asi66 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','Handicapped on light duty','bmdone6');
                    $hold10 = info_fetch_osireportig('ASI/LR','Handicapped on light duty','bmdone6');
                     $hold11 = info_fetch_osireportig('ASI/CR','Handicapped on light duty','bmdone6');
             echo $hc67= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','Handicapped on light duty','bmdone6');
                       $hold13 = info_fetch_osireportig('HC/PR','Handicapped on light duty','bmdone6');
                        $hold14 = info_fetch_osireportig('HC/LR','Handicapped on light duty','bmdone6');
                         $hold15 = info_fetch_osireportig('Sr.Const','Handicapped on light duty','bmdone6');
                         $hold16 = info_fetch_osireportig('C-II','Handicapped on light duty','bmdone6');

             echo $ct65= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>CHRONIC ON MEDICAL REST</td>
                                           <td><?php $hold1 = info_fetch_osireportig('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp67 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold4 = info_fetch_osireportig('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold5 = info_fetch_osireportig('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si68 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold7 = info_fetch_osireportig('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold8 = info_fetch_osireportig('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi67 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold10 = info_fetch_osireportig('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold11 = info_fetch_osireportig('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc68= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold13 = info_fetch_osireportig('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold14 = info_fetch_osireportig('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                         $hold15 = info_fetch_osireportig('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold16 = info_fetch_osireportig('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct66= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>CHRONIC ON LIGHT DUTY</td>
               
                          <td><?php $hold1 = info_fetch_osireportig('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp68 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold4 = info_fetch_osireportig('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold5 = info_fetch_osireportig('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si69 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold7 = info_fetch_osireportig('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold8 = info_fetch_osireportig('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi68 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold10 = info_fetch_osireportig('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold11 = info_fetch_osireportig('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc69= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold13 = info_fetch_osireportig('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold14 = info_fetch_osireportig('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                         $hold15 = info_fetch_osireportig('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold16 = info_fetch_osireportig('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct67=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>

                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>OSD ETC.</td>
                   <td><?php $hold1 = info_fetch_osireportig('INSP','OSD ETC','bmdone8'); 
                      $hold6 = info_fetch_osireportig('DSP/CR','OSD ETC','bmdone8'); 
                      echo $insp69 = $hold1 + $hold6;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','OSD ETC','bmdone8');
            $hold4 = info_fetch_osireportig('INSP/LR','OSD ETC','bmdone8'); 
            $hold5 = info_fetch_osireportig('INSP/CR','OSD ETC','bmdone8'); 
            echo $si70 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','OSD ETC','bmdone8'); 
                $hold7 = info_fetch_osireportig('SI/CR','OSD ETC','bmdone8');  
                $hold8 = info_fetch_osireportig('SI/LR','OSD ETC','bmdone8'); 
                echo $asi67 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','OSD ETC','bmdone8');
                    $hold10 = info_fetch_osireportig('ASI/LR','OSD ETC','bmdone8');
                     $hold11 = info_fetch_osireportig('ASI/CR','OSD ETC','bmdone8');
             echo $hc70= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','OSD ETC','bmdone8');
                       $hold13 = info_fetch_osireportig('HC/PR','OSD ETC','bmdone8');
                        $hold14 = info_fetch_osireportig('HC/LR','OSD ETC','bmdone8');
                         $hold15 = info_fetch_osireportig('Sr.Const','OSD ETC','bmdone8');
                         $hold16 = info_fetch_osireportig('C-II','OSD ETC','bmdone8');

             echo $ct68= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>TOTAL</td>

                  <td><?php 
                            $misc1 = info_fetch_osireportig('INSP','RECRUIT','bmdone1');
                            $misc2 = info_fetch_osireportig('DSP/CR','RECRUIT','bmdone1');

                            $misc3 = info_fetch_osireportig('INSP','LEAVE','bmdone2'); 
                            $misc4 = info_fetch_osireportig('DSP/CR','LEAVE','bmdone2');

                            $misc5 = info_fetch_osireportig('INSP','ABSENT','bmdone3');  
                            $misc6 = info_fetch_osireportig('DSP/CR','ABSENT','bmdone3');

                            $misc7 = info_fetch_osireportig('INSP','UNDER SUSPENSION','bmdone4');
                            $misc8 = info_fetch_osireportig('DSP/CR','UNDER SUSPENSION','bmdone4');

                            $misc9 = info_fetch_osireportig('INSP','Handicapped on Medical Rest','bmdone5');
                            $misc10 = info_fetch_osireportig('DSP/CR','Handicapped on Medical Rest','bmdone5');

                            $misc11 = info_fetch_osireportig('INSP','Handicapped on light duty','bmdone6');
                            $misc12 = info_fetch_osireportig('DSP/CR','Handicapped on light duty','bmdone6');

                            $misc13 = info_fetch_osireportig('INSP','Chronic Disease on Medical Rest','bmdone7');
                            $misc14 = info_fetch_osireportig('DSP/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misc15 = info_fetch_osireportig('INSP','Chronic Disease on Medical Rest','bmdone7');
                            $misc16 = info_fetch_osireportig('DSP/CR','Chronic Disease on Medical Rest','bmdone7');

                             $misc17 = info_fetch_osireportig('INSP','OSD ETC','bmdone8');
                            $misc18 = info_fetch_osireportig('DSP/CR','OSD ETC','bmdone8');
   
                           
                            echo $misc1 + $misc2 + $misc3 + $misc4 + $misc5 + $misc6 + $misc7 + $misc8 + $misc9 + $misc10 + $misc11 + $misc12 + $misc13 + $misc14 + $misc15 + $misc16 + $misc17 + $misc18;
                    ?></td>
                  <td><?php 
                            $misc19 = info_fetch_osireportig('SI','RECRUIT','bmdone1');
                            $misc20 = info_fetch_osireportig('INSP/LR','RECRUIT','bmdone1');
                            $misc21 = info_fetch_osireportig('INSP/CR','RECRUIT','bmdone1'); 

                            $misc22 = info_fetch_osireportig('SI','LEAVE','bmdone2');
                            $misc23 = info_fetch_osireportig('INSP/LR','LEAVE','bmdone2');  
                            $misc24 = info_fetch_osireportig('INSP/CR','LEAVE','bmdone2');

                            $misc25 = info_fetch_osireportig('SI','ABSENT','bmdone3');
                            $misc26 = info_fetch_osireportig('INSP/LR','ABSENT','bmdone3');
                            $misc27 = info_fetch_osireportig('INSP/CR','ABSENT','bmdone3');

                            $misc28 = info_fetch_osireportig('SI','UNDER SUSPENSION','bmdone4');
                            $misc29 = info_fetch_osireportig('INSP/LR','UNDER SUSPENSION','bmdone4');
                            $misc30 = info_fetch_osireportig('INSP/CR','UNDER SUSPENSION','bmdone4');

                            $misc31 = info_fetch_osireportig('SI','Handicapped on Medical Rest','bmdone5');
                            $misc32 = info_fetch_osireportig('INSP/LR','Handicapped on Medical Rest','bmdone5');
                            $misc33 = info_fetch_osireportig('INSP/CR','Handicapped on Medical Rest','bmdone5');

                            $misc34 = info_fetch_osireportig('SI','Handicapped on light duty','bmdone6');
                            $misc35 = info_fetch_osireportig('INSP/LR','Handicapped on light duty','bmdone6');
                            $misc36 = info_fetch_osireportig('INSP/CR','Handicapped on light duty','bmdone6');


                            $misc37 = info_fetch_osireportig('SI','Chronic Disease on Medical Rest','bmdone7');
                            $misc38 = info_fetch_osireportig('INSP/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misc39 = info_fetch_osireportig('INSP/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misc40 = info_fetch_osireportig('SI','Chronic Disease on Medical Rest','bmdone7');
                            $misc41 = info_fetch_osireportig('INSP/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misc42 = info_fetch_osireportig('INSP/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misc43 = info_fetch_osireportig('SI','OSD ETC','bmdone8');
                            $misc44 = info_fetch_osireportig('INSP/LR','OSD ETC','bmdone8');
                            $misc45 = info_fetch_osireportig('INSP/CR','OSD ETC','bmdone8');                            

                           
                            echo $misc19 + $misc20 + $misc21 + $misc22 + $misc23 + $misc24 + $misc25 + $misc26 + $misc27 + $misc28 + $misc30 + $misc31 + $misc32 + $misc33 + $misc34 + $misc35 + $misc36 + $misc37 + $misc38 + $misc39 + $misc40 + $misc41 +  $misc42 + $misc43 + $misc44 + $misc45;
                    ?></td>
                  <td><?php 
                            $misc46 = info_fetch_osireportig('ASI','RECRUIT','bmdone1');
                            $misc47 = info_fetch_osireportig('SI/LR','RECRUIT','bmdone1');
                            $misc48 = info_fetch_osireportig('SI/CR','RECRUIT','bmdone1'); 

                  $misc49 = info_fetch_osireportig('ASI','LEAVE','bmdone2');
                            $misc50 = info_fetch_osireportig('SI/LR','LEAVE','bmdone2');  
                            $misc51 = info_fetch_osireportig('SI/CR','LEAVE','bmdone2');

                            $misc52 = info_fetch_osireportig('ASI','ABSENT','bmdone3');
                            $misc53 = info_fetch_osireportig('SI/LR','ABSENT','bmdone3');
                            $misc54 = info_fetch_osireportig('SI/CR','ABSENT','bmdone3');

                            $misc55 = info_fetch_osireportig('ASI','UNDER SUSPENSION','bmdone4');
                            $misc56 = info_fetch_osireportig('SI/LR','UNDER SUSPENSION','bmdone4');
                            $misc57 = info_fetch_osireportig('SI/CR','UNDER SUSPENSION','bmdone4');

                            $misc58 = info_fetch_osireportig('ASI','Handicapped on Medical Rest','bmdone5');
                            $misc59 = info_fetch_osireportig('SI/LR','Handicapped on Medical Rest','bmdone5');
                            $misc60 = info_fetch_osireportig('SI/CR','Handicapped on Medical Rest','bmdone5');

                            $misc61 = info_fetch_osireportig('ASI','Handicapped on light duty','bmdone6');
                            $misc62 = info_fetch_osireportig('SI/LR','Handicapped on light duty','bmdone6');
                            $misc62 = info_fetch_osireportig('SI/CR','Handicapped on light duty','bmdone6');


                           $misc63 = info_fetch_osireportig('ASI','Chronic Disease on Medical Rest','bmdone7');
                            $misc64 = info_fetch_osireportig('SI/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misc65 = info_fetch_osireportig('SI/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misc66 = info_fetch_osireportig('ASI','Chronic Disease on Medical Rest','bmdone7');
                            $misc67 = info_fetch_osireportig('SI/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misc68 = info_fetch_osireportig('SI/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misc69 = info_fetch_osireportig('ASI','OSD ETC','bmdone8');
                            $misc70 = info_fetch_osireportig('SI/LR','OSD ETC','bmdone8');
                            $misc71 = info_fetch_osireportig('SI/CR','OSD ETC','bmdone8');              
                         
                           
                            echo $misc46 + $misc47 + $misc48 + $misc49 + $misc50 + $misc51 + $misc52 + $misc53 + $misc54 + $misc55 + $misc56 + $misc57 + $misc57 + $misc59 + $misc60 + $misc61 + $misc62 + $misc63 + $misc64 + $misc65 + $misc66 + $misc67 +  $misc68 + $misc69 + $misc70 + $misc71;
                    ?></td>
                  <td><?php 
                            $misci1 = info_fetch_osireportig('HC','RECRUIT','bmdone1');
                            $misci2 = info_fetch_osireportig('ASI/LR','RECRUIT','bmdone1');
                            $misci3 = info_fetch_osireportig('ASI/CR','RECRUIT','bmdone1'); 

                            $misci4 = info_fetch_osireportig('HC','LEAVE','bmdone2');
                            $misci5 = info_fetch_osireportig('ASI/LR','LEAVE','bmdone2');  
                            $misci6 = info_fetch_osireportig('ASI/CR','LEAVE','bmdone2');

                            $misci7 = info_fetch_osireportig('HC','ABSENT','bmdone3');
                            $misci8 = info_fetch_osireportig('ASI/LR','ABSENTS','bmdone3');
                            $misci9 = info_fetch_osireportig('ASI/CR','ABSENT','bmdone3');

                            $misci10 = info_fetch_osireportig('HC','UNDER SUSPENSION','bmdone4');
                            $misci11 = info_fetch_osireportig('ASI/LR','UNDER SUSPENSION','bmdone4');
                            $misci12 = info_fetch_osireportig('ASI/CR','UNDER SUSPENSION','bmdone4');

                            $misci13 = info_fetch_osireportig('HC','Handicapped on Medical Rest','bmdone5');
                            $misci14 = info_fetch_osireportig('ASI/LR','Handicapped on Medical Rest','bmdone5');
                            $misci15 = info_fetch_osireportig('ASI/CR','Handicapped on Medical Rest','bmdone5');

                            $misci16 = info_fetch_osireportig('HC','Handicapped on light duty','bmdone6');
                            $misci17 = info_fetch_osireportig('ASI/LR','Handicapped on light duty','bmdone6');
                            $misci18 = info_fetch_osireportig('ASI/CR','Handicapped on light duty','bmdone6');


                           $misci19 = info_fetch_osireportig('HC','Chronic Disease on Medical Rest','bmdone7');
                            $misci20 = info_fetch_osireportig('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misci21 = info_fetch_osireportig('ASI/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misci22 = info_fetch_osireportig('HC','Chronic Disease on Medical Rest','bmdone7');
                            $misci23 = info_fetch_osireportig('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misci24 = info_fetch_osireportig('ASI/CR','Chronic Disease on Medical Rest','bmdone7');

                            $misci25 = info_fetch_osireportig('HC','OSD ETC','bmdone8');
                            $misci26 = info_fetch_osireportig('ASI/LR','OSD ETC','bmdone8');
                            $misci27 = info_fetch_osireportig('ASI/CR','OSD ETC','bmdone8');


                            echo $misci1 + $misci2 + $misci3 + $misci4 + $misci5 + $misci6 + $misci7 + $misci8 + $misci9 + $misci10 + $misci11 + $misci12 + $misci13 + $misci14 + $misci15 + $misci16 + $misci17 + $misci18 + $misci19 + $misci20 + $misci21 + $misci22 +  $misci23 + $misci24 + $misci25 + $misci26 + $misci27;
                    ?></td>
                  <td><?php 
                            $misci28 = info_fetch_osireportig('CT','RECRUIT','bmdone1');
                            $misci29 = info_fetch_osireportig('HC/PR','RECRUIT','bmdone1');
                            $misci30 = info_fetch_osireportig('HC/LR','RECRUIT','bmdone1');
                            $misci31 = info_fetch_osireportig('Sr.Const','RECRUIT','bmdone1');
                             $misci32 = info_fetch_osireportig('C-II','RECRUIT','bmdone1'); 

                            $misci33 = info_fetch_osireportig('CT','LEAVE','bmdone2');
                            $misci34 = info_fetch_osireportig('HC/PR','LEAVE','bmdone2');  
                            $misci35 = info_fetch_osireportig('HC/LR','LEAVE','bmdone2');
                            $misci36 = info_fetch_osireportig('Sr.Const','LEAVE','bmdone2');
                            $misci37 = info_fetch_osireportig('C-II','LEAVE','bmdone2');

                            $misci38 = info_fetch_osireportig('CT','ABSENT','bmdone3');
                            $misci39 = info_fetch_osireportig('HC/PR','ABSENT','bmdone3');
                            $misci40 = info_fetch_osireportig('HC/LR','ABSENT','bmdone3');
                            $misci41 = info_fetch_osireportig('Sr.Const','ABSENT','bmdone3');
                            $misci42 = info_fetch_osireportig('C-II','ABSENT','bmdone3');

                            $misci43 = info_fetch_osireportig('CT','UNDER SUSPENSION','bmdone4');
                            $misci44 = info_fetch_osireportig('HC/PR','UNDER SUSPENSION','bmdone4');
                            $misci45 = info_fetch_osireportig('HC/LR','UNDER SUSPENSION','bmdone4');
                            $misci46 = info_fetch_osireportig('Sr.Const','UNDER SUSPENSION','bmdone4');
                             $misci47 = info_fetch_osireportig('C-II','UNDER SUSPENSION','bmdone4');

                            $misci48 = info_fetch_osireportig('CT','Handicapped on Medical Rest','bmdone5');
                            $misci49 = info_fetch_osireportig('HC/PR','Handicapped on Medical Rest','bmdone5');
                            $misci50 = info_fetch_osireportig('HC/LR','Handicapped on Medical Rest','bmdone5');
                            $misci51 = info_fetch_osireportig('Sr.Const','Handicapped on Medical Rest','bmdone5');
                            $misci52 = info_fetch_osireportig('C-II','Handicapped on Medical Rest','bmdone5');

                            $misci53 = info_fetch_osireportig('CT','Handicapped on light duty','bmdone6');
                            $misci54 = info_fetch_osireportig('HC/PR','Handicapped on light duty','bmdone6');
                            $misci55 = info_fetch_osireportig('HC/LR','Handicapped on light duty','bmdone6');
                            $misci56 = info_fetch_osireportig('Sr.Const','Handicapped on light duty','bmdone6');
                            $misci57 = info_fetch_osireportig('C-II','Handicapped on light duty','bmdone6');

                           $misci58 = info_fetch_osireportig('CT','Chronic Disease on Medical Rest','bmdone7');
                            $misci59 = info_fetch_osireportig('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                            $misci60 = info_fetch_osireportig('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misci61 = info_fetch_osireportig('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                             $misci62 = info_fetch_osireportig('C-II','Chronic Disease on Medical Rest','bmdone7');

                            $misci63 = info_fetch_osireportig('CT','Chronic Disease on Medical Rest','bmdone7');
                            $misci64 = info_fetch_osireportig('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                            $misci65 = info_fetch_osireportig('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                            $misci66 = info_fetch_osireportig('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                            $misci67 = info_fetch_osireportig('C-II','Chronic Disease on Medical Rest','bmdone7');

                            $misci68 = info_fetch_osireportig('CT','OSD ETC','bmdone8');
                            $misci69 = info_fetch_osireportig('HC/PR','OSD ETC','bmdone8');
                            $misci70 = info_fetch_osireportig('HC/LR','OSD ETC','bmdone8');                            
                            $misci71 = info_fetch_osireportig('Sr.Const','OSD ETC','bmdone8');
                             $misci72 = info_fetch_osireportig('C-II','OSD ETC','bmdone8');

                           
                            echo $misci28 + $misci29 + $misci30 + $misci31 + $misci32 + $misci33 + $misci34 + $misci35 + $misci36 + $misci37 + $misci38 + $misci39 + $misci40 + $misci41 + $misci42 + $misci43 + $misci44 + $misci45 + $misci46 + $misci47 + $misci48 + $misci49 + $misci50 +  $misci51 + $misci52 + $misci53 + $misci54 + $misci55 + $misci56 + $misci57 + $misci58 + $misci59 + $misci60 + $misci61 + $misci62 + $misci63 + $misci64 + $misci65 + $misci66 + $misci67 + $misci68 + $misci69 + $misci70 + $misci71 + $misci72;
                    ?></td>

                  <td><?php  
                   echo $miscval = $misc1 + $misc2 + $misc3 + $misc4 + $misc5 + $misc6 + $misc7 + $misc8 + $misc9 + $misc10 + $misc11 + $misc12 + $misc13 + $misc14 + $misc15 + $misc16 + $misc17 + $misc18 +
                     $misc19 + $misc20 + $misc21 + $misc22 + $misc23 + $misc24 + $misc25 + $misc26 + $misc27 + $misc28 + $misc30 + $misc31 + $misc32 + $misc33 + $misc34 + $misc35 + $misc36 + $misc37 + $misc38 + $misc39 + $misc40 + $misc41 +  $misc42 + $misc43 + $misc44 + $misc45+
                       $misc46 + $misc47 + $misc48 + $misc49 + $misc50 + $misc51 + $misc52 + $misc53 + $misc54 + $misc55 + $misc56 + $misc57 + $misc57 + $misc59 + $misc60 + $misc61 + $misc62 + $misc63 + $misc64 + $misc65 + $misc66 + $misc67 +  $misc68 + $misc69 + $misc70 + $misc71+
                  $misci1 + $misci2 + $misci3 + $misci4 + $misci5 + $misci6 + $misci7 + $misci8 + $misci9 + $misci10 + $misci11 + $misci12 + $misci13 + $misci14 + $misci15 + $misci16 + $misci17 + $misci18 + $misci19 + $misci20 + $misci21 + $misci22 +  $misci23 + $misci24 + $misci25 + $misci26 + $misci27 +
 $misci28 + $misci29 + $misci30 + $misci31 + $misci32 + $misci33 + $misci34 + $misci35 + $misci36 + $misci37 + $misci38 + $misci39 + $misci40 + $misci41 + $misci42 + $misci43 + $misci44 + $misci45 + $misci46 + $misci47 + $misci48 + $misci49 + $misci50 +  $misci51 + $misci52 + $misci53 + $misci54 + $misci55 + $misci56 + $misci57 + $misci58 + $misci59 + $misci60 + $misci61 + $misci62 + $misci63 + $misci64 + $misci65 + $misci66 + $misci67 + $misci68 + $misci69 + $misci70 + $misci71 + $misci72;
                    ?>

                   </td>
                </tr>

  </tbody>

</table>


                          <h3> 9. INSTITUTIONS</h3>
            <table class="table  table-fixedheader"  id="table">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 580px">PAP HQRS INSTITUTIONS</td>
                   

                   <td><?php $hold1 = info_fetch_osireportsipgs('INSP','','instone10'); 
                      $hold2 = info_fetch_osireportsipgs('DSP/CR','','instone10'); 
                      echo $insp70= $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportsipgs('SI','','instone10');
            $hold4 = info_fetch_osireportsipgs('INSP/LR','','instone10'); 
            $hold5 = info_fetch_osireportsipgs('INSP/CR','','instone10'); 
            echo $si71 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportsipgs('ASI','','instone10'); 
                $hold7 = info_fetch_osireportsipgs('SI/CR','','instone10');  
                $hold8 = info_fetch_osireportsipgs('SI/LR','','instone10'); 
                echo $asi68 =  $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportsipgs('HC','','instone10');
                    $hold10 = info_fetch_osireportsipgs('ASI/LR','','instone10');
                     $hold11 = info_fetch_osireportsipgs('ASI/CR','','instone10');
             echo $hc71= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportsipgs('CT','','instone10');
                       $hold13 = info_fetch_osireportsipgs('HC/PR','','instone10');
                        $hold14 = info_fetch_osireportsipgs('HC/LR','','instone10');
                         $hold15 = info_fetch_osireportsipgs('Sr.Const','','instone10');
                         $hold16 = info_fetch_osireportsipgs('C-II','','instone10');

             echo $ct69= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $insitiute = $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>




                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CDO INSTITUTIONS</td>
                  
                           <td><?php $hold1 = info_fetch_osireportig('INSP','CDO Institutions','instone2'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','CDO Institutions','instone2'); 
                      echo $insp71= $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','CDO Institutions','instone2');
            $hold4 = info_fetch_osireportig('INSP/LR','CDO Institutions','instone2'); 
            $hold5 = info_fetch_osireportig('INSP/CR','CDO Institutions','instone2'); 
            echo $si72 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','CDO Institutions','instone2'); 
                $hold7 = info_fetch_osireportig('SI/CR','CDO Institutions','instone2');  
                $hold8 = info_fetch_osireportig('SI/LR','CDO Institutions','instone2'); 
                echo  $asi69 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','CDO Institutions','instone2');
                    $hold10 = info_fetch_osireportig('ASI/LR','CDO Institutions','instone2');
                     $hold11 = info_fetch_osireportig('ASI/CR','CDO Institutions','instone2');
             echo $hc72= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','CDO Institutions','instone2');
                       $hold13 = info_fetch_osireportig('HC/PR','CDO Institutions','instone2');
                        $hold14 = info_fetch_osireportig('HC/LR','CDO Institutions','instone2');
                         $hold15 = info_fetch_osireportig('Sr.Const','CDO Institutions','instone2');
                         $hold16 = info_fetch_osireportig('C-II','CDO Institutions','instone2');

             echo $ct70=  $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>


            
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>IRBN. INSTITUTIONS</td>

     
             <td><?php $hold1 = info_fetch_osireportig('INSP','IRB Institutions','instone1'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','IRB Institutions','instone1'); 
                      echo $insp72= $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportig('SI','IRB Institutions','instone1');
            $hold4 = info_fetch_osireportig('INSP/LR','IRB Institutions','instone1'); 
            $hold5 = info_fetch_osireportig('INSP/CR','IRB Institutions','instone1'); 
            echo $si73 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportig('ASI','IRB Institutions','instone1'); 
                $hold7 = info_fetch_osireportig('SI/CR','IRB Institutions','instone1');  
                $hold8 = info_fetch_osireportig('SI/LR','IRB Institutions','instone1'); 
                echo $asi70 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','IRB Institutions','instone1');
                    $hold10 = info_fetch_osireportig('ASI/LR','IRB Institutions','instone1');
                     $hold11 = info_fetch_osireportig('ASI/CR','IRB Institutions','instone1');
             echo $hc73= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','IRB Institutions','instone1');
                       $hold13 = info_fetch_osireportig('HC/PR','IRB Institutions','instone1');
                        $hold14 = info_fetch_osireportig('HC/LR','IRB Institutions','instone1');
                         $hold15 = info_fetch_osireportig('Sr.Const','IRB Institutions','instone1');
                         $hold16 = info_fetch_osireportig('C-II','IRB Institutions','instone1');

             echo $ct71= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>PAP OUTER BNS. INSTITUTIONS</td>
                 <td><?php $hold1 = info_fetch_osireportig('INSP','PAP Outer Bn Institutions','instone3'); 
                      $hold2 = info_fetch_osireportig('DSP/CR','PAP Outer Bn Institutions','instone3'); 
                      echo $insp73=  $hold1 + $hold2;  ?></td>

            <td><?php $hold3 = info_fetch_osireportig('SI','PAP Outer Bn Institutions','instone3');
            $hold4 = info_fetch_osireportig('INSP/LR','PAP Outer Bn Institutions','instone3'); 
            $hold5 = info_fetch_osireportig('INSP/CR','PAP Outer Bn Institutions','instone3'); 
            echo $si74 = $hold3 + $hold4 + $hold5;
              ?></td>

            <td><?php $hold6 = info_fetch_osireportig('ASI','PAP Outer Bn Institutions','instone3'); 
                $hold7 = info_fetch_osireportig('SI/CR','PAP Outer Bn Institutions','instone3');  
                $hold8 = info_fetch_osireportig('SI/LR','PAP Outer Bn Institutions','instone3'); 
                echo $asi71 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportig('HC','PAP Outer Bn Institutions','instone3');
                    $hold10 = info_fetch_osireportig('ASI/LR','PAP Outer Bn Institutions','instone3');
                     $hold11 = info_fetch_osireportig('ASI/CR','PAP Outer Bn Institutions','instone3');
             echo $hc74= $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportig('CT','PAP Outer Bn Institutions','instone3');
                       $hold13 = info_fetch_osireportig('HC/PR','PAP Outer Bn Institutions','instone3');
                        $hold14 = info_fetch_osireportig('HC/LR','PAP Outer Bn Institutions','instone3');
                         $hold15 = info_fetch_osireportig('Sr.Const','PAP Outer Bn Institutions','instone3');
                         $hold16 = info_fetch_osireportig('C-II','PAP Outer Bn Institutions','instone3');

             echo  $ct72= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                  <td><?php $ist1 = info_fetch_osireportig('INSP','IRB Institutions','instone1');
                            $ist2 = info_fetch_osireportig('INSP','CDO Institutions','instone2');
                            $ist3 = info_fetch_osireportig('INSP','IRB Institutions','instone1'); 
                            $ist4 = info_fetch_osireportig('INSP','PAP Outer Bn Institutions','instone3');
                            $ist5 = info_fetch_osireportig('DSP/CR','PAP Outer Bn Institutions','instone3');  
                            $ist6 = info_fetch_osireportig('DSP/CR','IRB Institutions','instone1');
                            $ist7 = info_fetch_osireportig('DSP/CR','CDO Institutions','instone2');
                            $ist8 = info_fetch_osireportig('DSP/CR','IRB Institutions','instone1'); 
                           
                            echo $ist1 + $ist2 + $ist3 + $ist4 + $ist5 + $ist6 + $ist7 + $ist8;
                    ?></td>
                  <td><?php $iist1 = info_fetch_osireportig('SI','IRB Institutions','instone1');
                            $iist2 = info_fetch_osireportig('SI','CDO Institutions','instone2');
                            $iist3 = info_fetch_osireportig('SI','IRB Institutions','instone1'); 
                            $iist4 = info_fetch_osireportig('SI','PAP Outer Bn Institutions','instone3');
                            $iist5 = info_fetch_osireportig('INSP/LR','PAP Outer Bn Institutions','instone3');  
                            $iist6 = info_fetch_osireportig('INSP/LR','IRB Institutions','instone1');
                            $iist7 = info_fetch_osireportig('INSP/LR','CDO Institutions','instone2');
                            $iist8 = info_fetch_osireportig('INSP/LR','IRB Institutions','instone1'); 
                            $iist9 = info_fetch_osireportig('INSP/CR','PAP Outer Bn Institutions','instone3');  
                            $iist10 = info_fetch_osireportig('INSP/CR','IRB Institutions','instone1');
                            $iist11 = info_fetch_osireportig('INSP/CR','CDO Institutions','instone2');
                            $iist12 = info_fetch_osireportig('INSP/CR','IRB Institutions','instone1'); 
                           
                            echo $iist1 + $iist2 + $iist3 + $iist4 + $iist5 + $iist6 + $iist7 + $iist8 + $iist9 + $iist10 + $iist11 + $iist12;
                    ?></td>
                  <td><?php $iiist1 = info_fetch_osireportig('ASI','IRB Institutions','instone1');
                            $iiist2 = info_fetch_osireportig('ASI','CDO Institutions','instone2');
                            $iiist3 = info_fetch_osireportig('ASI','IRB Institutions','instone1'); 
                            $iiist4 = info_fetch_osireportig('ASI','PAP Outer Bn Institutions','instone3');
                            $iiist5 = info_fetch_osireportig('SI/CR','PAP Outer Bn Institutions','instone3');  
                            $iiist6 = info_fetch_osireportig('SI/CR','IRB Institutions','instone1');
                            $iiist7 = info_fetch_osireportig('SI/CR','CDO Institutions','instone2');
                            $iiist8 = info_fetch_osireportig('SI/CR','IRB Institutions','instone1'); 
                            $iiist9 = info_fetch_osireportig('SI/LR','PAP Outer Bn Institutions','instone3');  
                            $iiist10 = info_fetch_osireportig('SI/LR','IRB Institutions','instone1');
                            $iiist11 = info_fetch_osireportig('SI/LR','CDO Institutions','instone2');
                            $iiist12 = info_fetch_osireportig('SI/LR','IRB Institutions','instone1'); 
                           
                            echo $iiist1 + $iiist2 + $iiist3 + $iiist4 + $iiist5 + $iiist6 + $iiist7 + $iiist8 + $iiist9 + $iiist10 + $iiist11 + $iiist12;
                    ?></td>
                  <td><?php $iiiist1 = info_fetch_osireportig('HC','IRB Institutions','instone1');
                            $iiiist2 = info_fetch_osireportig('HC','CDO Institutions','instone2');
                            $iiiist3 = info_fetch_osireportig('HC','IRB Institutions','instone1'); 
                            $iiiist4 = info_fetch_osireportig('HC','PAP Outer Bn Institutions','instone3');
                            $iiiist5 = info_fetch_osireportig('ASI/LR','PAP Outer Bn Institutions','instone3');  
                            $iiiist6 = info_fetch_osireportig('ASI/LR','IRB Institutions','instone1');
                            $iiiist7 = info_fetch_osireportig('ASI/LR','CDO Institutions','instone2');
                            $iiiist8 = info_fetch_osireportig('ASI/LR','IRB Institutions','instone1'); 
                            $iiiist9 = info_fetch_osireportig('ASI/CR','PAP Outer Bn Institutions','instone3');  
                            $iiiist10 = info_fetch_osireportig('ASI/CR','IRB Institutions','instone1');
                            $iiiist11 = info_fetch_osireportig('ASI/CR','CDO Institutions','instone2');
                            $iiiist12 = info_fetch_osireportig('ASI/CR','IRB Institutions','instone1'); 
                           
                            echo $iiiist1 + $iiiist2 + $iiiist3 + $iiiist4 + $iiiist5 + $iiiist6 + $iiiist7 + $iiiist8 + $iiiist9 + $iiiist10 + $iiiist11 + $iiiist12;
                    ?></td>
                  <td><?php $vist1 = info_fetch_osireportig('CT','IRB Institutions','instone1');
                            $vist2 = info_fetch_osireportig('CT','CDO Institutions','instone2');
                            $vist3 = info_fetch_osireportig('CT','IRB Institutions','instone1'); 
                            $vist4 = info_fetch_osireportig('CT','PAP Outer Bn Institutions','instone3');
                            $vist5 = info_fetch_osireportig('HC/PR','PAP Outer Bn Institutions','instone3');  
                            $vist6 = info_fetch_osireportig('HC/PR','IRB Institutions','instone1');
                            $vist7 = info_fetch_osireportig('HC/PR','CDO Institutions','instone2');
                            $vist8 = info_fetch_osireportig('HC/PR','IRB Institutions','instone1'); 
                            $vist9 = info_fetch_osireportig('HC/LR','PAP Outer Bn Institutions','instone3');  
                            $vist10 = info_fetch_osireportig('HC/LR','IRB Institutions','instone1');
                            $vist11 = info_fetch_osireportig('HC/LR','CDO Institutions','instone2');
                            $vist12 = info_fetch_osireportig('HC/LR','IRB Institutions','instone1');
                            $vist13 = info_fetch_osireportig('Sr.Const','PAP Outer Bn Institutions','instone3');  
                            $vist14 = info_fetch_osireportig('Sr.Const','IRB Institutions','instone1');
                            $vist15 = info_fetch_osireportig('Sr.Const','CDO Institutions','instone2');
                            $vist16 = info_fetch_osireportig('Sr.Const','IRB Institutions','instone1'); 
                            $vist17 = info_fetch_osireportig('C-II','PAP Outer Bn Institutions','instone3');  
                            $vist18 = info_fetch_osireportig('C-II','IRB Institutions','instone1');
                            $vist19 = info_fetch_osireportig('C-II','CDO Institutions','instone2');
                            $vist20 = info_fetch_osireportig('C-II','IRB Institutions','instone1'); 
                           
                            echo $vist1 + $vist2 + $vist3 + $vist4 + $vist5 + $vist6 + $vist7 + $vist8 + $vist9 + $vist10 + $vist11 + $vist12 + $vist13 + $vist14 + $vist15 + $vist16 + $vist17 + $vist18 + $vist19 + $vist20;
                    ?></td>
                  <td><?php echo $ist1 + $ist2 + $ist3 + $ist4 + $ist5 + $ist6 + $ist7 + $ist8 + $iist1 + $iist2 + $iist3 + $iist4 + $iist5 + $iist6 + $iist7 + $iist8 + $iist9 + $iist10 + $iist11 + $iist12 + $iiist1 + $iiist2 + $iiist3 + $iiist4 + $iiist5 + $iiist6 + $iiist7 + $iiist8 + $iiist9 + $iiist10 + $iiist11 + $iiist12 + $iiiist1 + $iiiist2 + $iiiist3 + $iiiist4 + $iiiist5 + $iiiist6 + $iiiist7 + $iiiist8 + $iiiist9 + $iiiist10 + $iiiist11 + $iiiist12 + $vist1 + $vist2 + $vist3 + $vist4 + $vist5 + $vist6 + $vist7 + $vist8 + $vist9 + $vist10 + $vist11 + $vist12 + $vist13 + $vist14 + $vist15 + $vist16 + $vist17 + $vist18 + $vist19 + $vist20 + $insitiute; ?> </td>
                </tr>

                            <tr>
                  <td></td>
                  <td><strong>GTOTAL</strong></td>
                  <td><?php echo $insp1+$insp2+$insp3+$insp4+$insp5+$insp6+$insp7+$insp8+$insp9+$insp10+$insp11+$insp12+$insp13+$insp14+$insp15+$insp16+$insp17+$insp18+$insp19+$insp20+$insp21+$insp22+$insp23+$insp24+$insp25+$insp26+$insp27+$insp28+$insp29+$insp30+$insp31+$insp32+$insp33+$insp34+$insp35+$insp36+$insp37+$insp38+$insp39+$insp40+$insp41+$insp42+$insp43+$insp44+$insp45+$insp46+$insp47+$insp48+$insp49+$insp50+$insp51+$insp52+$insp53+$insp54+$insp55+$insp56+$insp57+$insp58+$insp59+$insp60+$insp61+$insp62+$insp63+$insp64+$insp65+$insp66+$insp67+$insp68+$insp69+$insp70+$insp71+$insp72+$insp73;  ?></td>
                  <td><?php echo $si1+$si2+$si3+$si4+$si5+$si6+$si7+$si8+$si9+$si10+$si11+$si12+$si13+$si14+$si15+$si16+$si17+$si18+$si19+$si20+$si21+$si22+$si23+$si24+$si25+$si26+$si27+$si28+$si29+$si30+$si31+$si32+$si33+$si34+$si35+$si36+$si38+$si39+$si40+$si41+$si42+$si43+$si44+$si45+$si46+$si47+$si48+$si49+$si50+$si51+$si52+$si53+$si54+$si55+$si56+$si57+$si58+$si59+$si60+$si61+$si62+$si63+$si64+$si65+$si66+$si67+$si68+$si69+$si70+$si71+$si72+$si73+$si74;  ?></td>
                  <td><?php   
                  echo $asi1+$asi2+$asi3+$asi4+$asi5+$asi6+$asi7+$asi8+$asi9+$asi10+$asi11+$asi12+$asi13+$asi14+$asi15+$asi16+$asi17+$asi18+$asi19+$asi20+$asi21+$asi22+$asi23+$asi24+$asi25+$asi26+$asi27+$asi28+$asi29+$asi30+$asi31+$asi32+$asi33+$asi34+$asi35+$asi36+$asi37+$asi38+$asi39+$asi40+$asi41+$asi42+$asi43+$asi44+$asi45+$asi46+$asi47+$asi48+$asi49+$asi50+$asi51+$asi52+$asi53+$asi54+$asi55+$asi56+$asi57+$asi58+$asi59+$asi60+$asi61+$asi62+$asi63+$asi64+$asi65+$asi66+$asi67+$asi68+$asi69+$asi70+$asi71;

                  ?></td>
                  <td><?php echo $hc1+$hc2+$hc3+$hc4+$hc5+$hc6+$hc7+$hc8+$hc9+$hc10+$hc11+$hc12+$hc13+$hc14+$hc15+$hc16+$hc17+$hc18+$hc19+$hc20+$hc21+$hc22+$hc23+$hc24+$hc25+$hc26+$hc27+$hc28+$hc29+$hc30+$hc31+$hc32+$hc33+$hc34+$hc35+$hc36+$hc37+$hc38+$hc39+$hc40+$hc41+$hc42+$hc43+$hc44+$hc45+$hc46+$hc47+$hc48+$hc49+$hc50+$hc51+$hc52+$hc54+$hc55+$hc56+$hc57+$hc58+$hc59+$hc60+$hc61+$hc62+$hc63+$hc64+$hc65+$hc66+$hc67+$hc68+$hc69+$hc70+$hc71+$hc72+$hc73+$hc74; ?></td>
                  <td><?php echo 
                    $fx1 + $fx2 + $fx3 + $fx4 + $fx5 + $fx6 + $fx7 + $fx8 + $fx9 + $fx10 + $fx11 + $fx12 + $fx13 + $fx14 + $fx15 + $fx16 + $fx17 + $fx18 + $fx19 + $fx20 + $fx21 + $fx22 + $fx23 + $fx24 + $fx25 + $fx26 + $fx27 + $fx28 + $fx29 + $fx30 + $fx31 + $fx32 + $fx33 + $fx34 + $fx35 + $fx36 + $fx37 + $fx38 + $fx39 + $fx40 + $fx41 + $fx42 + $fx43 + $fx44 + $fx45 + $fx46 + $fx47 + $fx48 + $fx49 + $fx50 + $fx51 + $fx52 + $fx53 + $fx54 + $fx55 + $fx56 + $fx57 + $fx58 + $fx59 + $fx60 + $law34 + $law35 + $law36 + $law37 + $law38 + $law39 + $law40 + $law41 + $law42 + $law43 + $law44 + $law45 + $law46 + $law47 + $law48 + $antii1 + $antii2 + $antii3 + $antii4 + $antii5 + $antii6 + $antii7 + $antii8 + $antii9 + $antii10 + $antii11 + $antii12 + $antii13 + $antii14 + $antii15 + $antii16 + $antii17 + $antii18 + $antii19 + $antii20 + $antii21 + $antii22 + $antii23 +  $antii24 + $antii25 + $antii26 + $antii27 + $antii28 + $antii29 + $antii30 + $tain34 + $tain35 + $tain36 + $tain37 + $tain38 + $tain39 + $tain40 + $tain41 + $tain42 + $tain43 + $tain44 + $tain45 + $tain46 + $tain47 + $tain48 + $ssone45 + $ssone46 + $ssone47 + $ssone48 + $ssone49 + $ssone50 + $ssone51 + $ssone52 + $ssone53 + $ssone54 + $ssone55 + $ssone56 + $ssone57 + $ssone58 + $ssone59 + $ssone60 + $ssone61 + $ssone62 + $ssone63 + $ssone64 + $bmdfv1 + $bmdfv2 + $bmdfv3 + $bmdfv4 + $bmdfv5 + $bmdfv6 + $bmdfv7 + $bmdfv8 + $bmdfv8 + $bmdfv9 + $bmdfv10 + $bmdfv11 + $bmdfv12 + $bmdfv13 + $bmdfv14 + $bmdfv15 + $bmdfv16 + $bmdfv17 + $bmdfv18 + $bmdfv19 + $bmdfv20 + $bmdfv21 + $bmdfv22 +  $bmdfv23 + $bmdfv24 + $bmdfv25 + $bmdfv26 + $bmdfv27 + $bmdfv28 + $bmdfv29 + $bmdfv30 + $bmdfv31 + $bmdfv32 + $bmdfv33 + $bmdfv34 + $bmdfv35 + $bmdfv36 + $bmdfv37 + $bmdfv38 + $bmdfv39 + $bmdfv40 + $bmdfv41 + $bmdfv42 + $bmdfv43 + $bmdfv44 + $bmdfv45 + $bmdfv46 + $bmdfv47 + $bmdfv48 + $bmdfv49 + $bmdfv50 + $bmdfv51 + $bmdfv52 + $bmdfv53 + $bmdfv54 + $bmdfv55 + $misci28 + $misci29 + $misci30 + $misci31 + $misci32 + $misci33 + $misci34 + $misci35 + $misci36 + $misci37 + $misci38 + $misci39 + $misci40 + $misci41 + $misci42 + $misci43 + $misci44 + $misci45 + $misci46 + $misci47 + $misci48 + $misci49 + $misci50 +  $misci51 + $misci52 + $misci53 + $misci54 + $misci55 + $misci56 + $misci57 + $misci58 + $misci59 + $misci60 + $misci61 + $misci62 + $misci63 + $misci64 + $misci65 + $misci66 + $misci67 + $misci68 + $misci69 + $misci70 + $misci71 + $misci72 + $vist1 + $vist2 + $vist3 + $vist4 + $vist5 + $vist6 + $vist7 + $vist8 + $vist9 + $vist10 + $vist11 + $vist12 + $vist13 + $vist14 + $vist15 + $vist16 + $vist17 + $vist18 + $vist19 + $vist20; ?></td>
                  <td><strong><?php echo $insp1+$insp2+$insp3+$insp4+$insp5+$insp6+$insp7+$insp8+$insp9+$insp10+$insp11+$insp12+$insp13+$insp14+$insp15+$insp16+$insp17+$insp18+$insp19+$insp20+$insp21+$insp22+$insp23+$insp24+$insp25+$insp26+$insp27+$insp28+$insp29+$insp30+$insp31+$insp32+$insp33+$insp34+$insp35+$insp36+$insp37+$insp38+$insp39+$insp40+$insp41+$insp42+$insp43+$insp44+$insp45+$insp46+$insp47+$insp48+$insp49+$insp50+$insp51+$insp52+$insp53+$insp54+$insp55+$insp56+$insp57+$insp58+$insp59+$insp60+$insp61+$insp62+$insp63+$insp64+$insp65+$insp66+$insp67+$insp68+$insp69+$insp70+$insp71+$insp72+$insp73+$si1+$si2+$si3+$si4+$si5+$si6+$si7+$si8+$si9+$si10+$si11+$si12+$si13+$si14+$si15+$si16+$si17+$si18+$si19+$si20+$si21+$si22+$si23+$si24+$si25+$si26+$si27+$si28+$si29+$si30+$si31+$si32+$si33+$si34+$si35+$si36+$si38+$si39+$si40+$si41+$si42+$si43+$si44+$si45+$si46+$si47+$si48+$si49+$si50+$si51+$si52+$si53+$si54+$si55+$si56+$si57+$si58+$si59+$si60+$si61+$si62+$si63+$si64+$si65+$si66+$si67+$si68+$si69+$si70+$si71+$si72+$si73+$si74+$asi1+$asi2+$asi3+$asi4+$asi5+$asi6+$asi7+$asi8+$asi9+$asi10+$asi11+$asi12+$asi13+$asi14+$asi15+$asi16+$asi17+$asi18+$asi19+$asi20+$asi21+$asi22+$asi23+$asi24+$asi25+$asi26+$asi27+$asi28+$asi29+$asi30+$asi31+$asi32+$asi33+$asi34+$asi35+$asi36+$asi37+$asi38+$asi39+$asi40+$asi41+$asi42+$asi43+$asi44+$asi45+$asi46+$asi47+$asi48+$asi49+$asi50+$asi51+$asi52+$asi53+$asi54+$asi55+$asi56+$asi57+$asi58+$asi59+$asi60+$asi61+$asi62+$asi63+$asi64+$asi65+$asi66+$asi67+$asi68+$asi69+$asi70+$asi71+$hc1+$hc2+$hc3+$hc4+$hc5+$hc6+$hc7+$hc8+$hc9+$hc10+$hc11+$hc12+$hc13+$hc14+$hc15+$hc16+$hc17+$hc18+$hc19+$hc20+$hc21+$hc22+$hc23+$hc24+$hc25+$hc26+$hc27+$hc28+$hc29+$hc30+$hc31+$hc32+$hc33+$hc34+$hc35+$hc36+$hc37+$hc38+$hc39+$hc40+$hc41+$hc42+$hc43+$hc44+$hc45+$hc46+$hc47+$hc48+$hc49+$hc50+$hc51+$hc52+$hc54+$hc55+$hc56+$hc57+$hc58+$hc59+$hc60+$hc61+$hc62+$hc63+$hc64+$hc65+$hc66+$hc67+$hc68+$hc69+$hc70+$hc71+$hc72+$hc73+$hc74+$fx1 + $fx2 + $fx3 + $fx4 + $fx5 + $fx6 + $fx7 + $fx8 + $fx9 + $fx10 + $fx11 + $fx12 + $fx13 + $fx14 + $fx15 + $fx16 + $fx17 + $fx18 + $fx19 + $fx20 + $fx21 + $fx22 + $fx23 + $fx24 + $fx25 + $fx26 + $fx27 + $fx28 + $fx29 + $fx30 + $fx31 + $fx32 + $fx33 + $fx34 + $fx35 + $fx36 + $fx37 + $fx38 + $fx39 + $fx40 + $fx41 + $fx42 + $fx43 + $fx44 + $fx45 + $fx46 + $fx47 + $fx48 + $fx49 + $fx50 + $fx51 + $fx52 + $fx53 + $fx54 + $fx55 + $fx56 + $fx57 + $fx58 + $fx59 + $fx60 + $law34 + $law35 + $law36 + $law37 + $law38 + $law39 + $law40 + $law41 + $law42 + $law43 + $law44 + $law45 + $law46 + $law47 + $law48 + $antii1 + $antii2 + $antii3 + $antii4 + $antii5 + $antii6 + $antii7 + $antii8 + $antii9 + $antii10 + $antii11 + $antii12 + $antii13 + $antii14 + $antii15 + $antii16 + $antii17 + $antii18 + $antii19 + $antii20 + $antii21 + $antii22 + $antii23 +  $antii24 + $antii25 + $antii26 + $antii27 + $antii28 + $antii29 + $antii30 + $tain34 + $tain35 + $tain36 + $tain37 + $tain38 + $tain39 + $tain40 + $tain41 + $tain42 + $tain43 + $tain44 + $tain45 + $tain46 + $tain47 + $tain48 + $ssone45 + $ssone46 + $ssone47 + $ssone48 + $ssone49 + $ssone50 + $ssone51 + $ssone52 + $ssone53 + $ssone54 + $ssone55 + $ssone56 + $ssone57 + $ssone58 + $ssone59 + $ssone60 + $ssone61 + $ssone62 + $ssone63 + $ssone64 + $bmdfv1 + $bmdfv2 + $bmdfv3 + $bmdfv4 + $bmdfv5 + $bmdfv6 + $bmdfv7 + $bmdfv8 + $bmdfv8 + $bmdfv9 + $bmdfv10 + $bmdfv11 + $bmdfv12 + $bmdfv13 + $bmdfv14 + $bmdfv15 + $bmdfv16 + $bmdfv17 + $bmdfv18 + $bmdfv19 + $bmdfv20 + $bmdfv21 + $bmdfv22 +  $bmdfv23 + $bmdfv24 + $bmdfv25 + $bmdfv26 + $bmdfv27 + $bmdfv28 + $bmdfv29 + $bmdfv30 + $bmdfv31 + $bmdfv32 + $bmdfv33 + $bmdfv34 + $bmdfv35 + $bmdfv36 + $bmdfv37 + $bmdfv38 + $bmdfv39 + $bmdfv40 + $bmdfv41 + $bmdfv42 + $bmdfv43 + $bmdfv44 + $bmdfv45 + $bmdfv46 + $bmdfv47 + $bmdfv48 + $bmdfv49 + $bmdfv50 + $bmdfv51 + $bmdfv52 + $bmdfv53 + $bmdfv54 + $bmdfv55 + $misci28 + $misci29 + $misci30 + $misci31 + $misci32 + $misci33 + $misci34 + $misci35 + $misci36 + $misci37 + $misci38 + $misci39 + $misci40 + $misci41 + $misci42 + $misci43 + $misci44 + $misci45 + $misci46 + $misci47 + $misci48 + $misci49 + $misci50 +  $misci51 + $misci52 + $misci53 + $misci54 + $misci55 + $misci56 + $misci57 + $misci58 + $misci59 + $misci60 + $misci61 + $misci62 + $misci63 + $misci64 + $misci65 + $misci66 + $misci67 + $misci68 + $misci69 + $misci70 + $misci71 + $misci72 + $vist1 + $vist2 + $vist3 + $vist4 + $vist5 + $vist6 + $vist7 + $vist8 + $vist9 + $vist10 + $vist11 + $vist12 + $vist13 + $vist14 + $vist15 + $vist16 + $vist17 + $vist18 + $vist19 + $vist20;

 ?> </strong></td>
                </tr>
              </tbody>
           </table>
          </div><!-- table-responsive -->  </div></div>
          <?php /* for ($i=1; $i <72 ; $i++) { 
            echo '$ct'.$i.'+';
          }*/ ?>
</body>
</html>