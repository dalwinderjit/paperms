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
   <script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/js/jquery.table2excel.min.js"></script>
  </head>
<body class="table2excel"> <div class="row">
<div class="row">
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button type="button" id="excel">Export to excel</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo base_url('bt-osireportones'); ?>"><Strong>DEPLOYMENT HEADING</strong></a>
</div>
          <div class="col-lg-10 col-xs-offset-1"><br/>
       <table border="0"  data-tableName="Test Table 1"><tr><td>&nbsp;</td><td><h3>DEPLOYMENT STATEMENT OF <?php $a = explode('.',$this->session->userdata('username')); if( $a[0] == 'Adgp'){echo $this->session->userdata('nick');}else{echo $a[0];}  ?>  BATTALION</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="pull-right"><h3>Till Date: <?php echo date('d-m-Y'); ?></h3></td> </tr></table>
          
          <table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td><h3> 1. FIX DUTIES</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
          
            <table width="922" border="1"  class="table2excel" data-tableName="Test Table 2">
              <thead>
                 <tr>
                    <th colspan="2"> </th>
                    <th width="48">INSPR</th>
                    <th width="40">SI</th>
                    <th width="40">ASI </th>
                    <th width="40">HC</th>
                    <th width="40">CT</th>
                    <th width="49">TOTAL</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="26">i)</td>
                  <td width="573">VP GUARDS</td>
                  <td><?php $vpg1 =  info_fetch_osireport('INSP','VP Guards','fone1'); 
                      $vpg2 = info_fetch_osireport('DSP/CR','VP Guards','fone1'); 
                      echo $vpgisp = $vpg1 + $vpg2;  ?></td>
            <td><?php $vpg3 = info_fetch_osireport('SI','VP Guards','fone1');
            $vpg4 = info_fetch_osireport('INSP/LR','VP Guards','fone1'); 
            $vpg5 = info_fetch_osireport('INSP/CR','VP Guards','fone1'); 
            echo $vpgsi = $vpg3 + $vpg4 + $vpg5;
              ?></td>
            <td><?php $vpg6 = info_fetch_osireport('ASI','VP Guards','fone1'); 
                $vpg7 = info_fetch_osireport('SI/CR','VP Guards','fone1');  
                $vpg8 = info_fetch_osireport('SI/LR','VP Guards','fone1'); 
                echo $vpgasi = $vpg6 + $vpg7 + $vpg8; 
             ?></td>
            <td><?php $vpg9 = info_fetch_osireport('HC','VP Guards','fone1');
                    $vpg10 = info_fetch_osireport('ASI/LR','VP Guards','fone1');
                     $vpg11 = info_fetch_osireport('ASI/CR','VP Guards','fone1');
             echo $vpghc = $vpg9 +  $vpg10 + $vpg11;  ?></td>
            <td><?php $vpg12 = info_fetch_osireport('CT','VP Guards','fone1');
                       $vpg13 = info_fetch_osireport('HC/PR','VP Guards','fone1');
                        $vpg14 = info_fetch_osireport('HC/LR','VP Guards','fone1');
                         $vpg15 = info_fetch_osireport('Sr.Const','VP Guards','fone1');
                         $vpg16 = info_fetch_osireport('C-II','VP Guards','fone1');

             echo $vpgct = $vpg12 + $vpg13 + $vpg14 + $vpg15 + $vpg16;  ?></td>
            <td><?php echo $vpgisp +  $vpgsi + $vpgasi + $vpghc + $vpgct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>JAILS SEC.</td>
                  <td><?php $jailsec1 = info_fetch_osireport('INSP','Jails Security','fone2'); 
                      $jailsec2 = info_fetch_osireport('DSP/CR','Jails Security','fone2'); 
                      echo $jailsecinsp = $jailsec1 + $jailsec2;
                   ?></td>
                  <td><?php  $jailsec3 = info_fetch_osireport('SI','Jails Security','fone2');
                                  $jailsec4 = info_fetch_osireport('INSP/LR','Jails Security','fone2'); 
                               $jailsec5 = info_fetch_osireport('INSP/CR','Jails Security','fone2');
                   echo $jailsecsi = $jailsec3 + $jailsec4 + $jailsec5;  ?></td>
                  <td><?php   $jailsec6 = info_fetch_osireport('ASI','Jails Security','fone2');
                   $jailsec7 = info_fetch_osireport('SI/CR','Jails Security','fone2');  
                $jailsec8 = info_fetch_osireport('SI/LR','Jails Security','fone2'); 
                echo $jailsecasi = $jailsec6 + $jailsec7 + $jailsec8; 
                ?></td>
                  <td><?php  $jailsec9 = info_fetch_osireport('HC','Jails Security','fone2');
                      $jailsec10 = info_fetch_osireport('ASI/LR','Jails Security','fone2');
                     $jailsec11 = info_fetch_osireport('ASI/CR','Jails Security','fone2');
                    echo $jailsechc = $jailsec9 +  $jailsec10 + $jailsec11;
                    ?></td>
                  <td><?php  $jailsec12 = info_fetch_osireport('CT','Jails Security','fone2'); 
                        $jailsec13 = info_fetch_osireport('HC/PR','Jails Security','fone2');
                        $jailsec14 = info_fetch_osireport('HC/LR','Jails Security','fone2');
                         $jailsec15 = info_fetch_osireport('Sr.Const','Jails Security','fone2');
                         $jailsec16 = info_fetch_osireport('C-II','Jails Security','fone2');
                         echo $jailsecct = $jailsec12 +  $jailsec13 + $jailsec14 +  $jailsec15 + $jailsec16;
                    ?></td>
                  <td><?php echo   $jailsecinsp + $jailsecsi + $jailsecasi + $jailsechc + $jailsecct;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>PUNJAB POLICE HQRS, SEC.9 CHG</td>
                  <td><?php $pphsch1 = info_fetch_osireport('INSP','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      $pphsch2 = info_fetch_osireport('DSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      echo $pphscinsp = $pphsch1 + $pphsch2;  ?></td>
            <td><?php $pphsch3 = info_fetch_osireport('SI','Punjab Police HQRS,SEC.9,CHG','fone3');
            $pphsch4 = info_fetch_osireport('INSP/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            $pphsch5 = info_fetch_osireport('INSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            echo $pphscisi = $pphsch3 + $pphsch4 + $pphsch5;
              ?></td>
            <td><?php $pphsch6 = info_fetch_osireport('ASI','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                $pphsch7 = info_fetch_osireport('SI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');  
                $pphsch8 = info_fetch_osireport('SI/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                echo $pphsciasi =  $pphsch6 + $pphsch7 + $pphsch8; 

             ?></td>
            <td><?php $pphsch9 = info_fetch_osireport('HC','Punjab Police HQRS,SEC.9,CHG','fone3');
                    $pphsch10 = info_fetch_osireport('ASI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                     $pphsch11 = info_fetch_osireport('ASI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');
             echo $pphscihc = $pphsch9 +  $pphsch10 + $pphsch11;  ?></td>
            <td><?php $pphsch12 = info_fetch_osireport('CT','Punjab Police HQRS,SEC.9,CHG','fone3');
                       $pphsch13 = info_fetch_osireport('HC/PR','Punjab Police HQRS,SEC.9,CHG','fone3');
                        $pphsch14 = info_fetch_osireport('HC/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $pphsch15 = info_fetch_osireport('Sr.Const','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $pphsch16 = info_fetch_osireport('C-II','Punjab Police HQRS,SEC.9,CHG','fone3');

             echo $pphscict = $pphsch12 + $pphsch13 + $pphsch14 + $pphsch15 + $pphsch16;  ?></td>
            <td><?php echo $pphscinsp + $pphscisi + $pphsciasi + $pphscihc + $pphscict;  ?></td>
                </tr>

                 <tr>
                  <td>iv)</td>
                  <td>DERA BEAS SECURITY DUTY</td>
                   <td><?php $dbsd1 = info_fetch_osireport('INSP','DERA BEAS SECURITY DUTY','fone4'); 
                      $dbsd2 = info_fetch_osireport('DSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
                      echo $dbsdinsp = $dbsd1 + $dbsd2;  ?></td>
            <td><?php $dbsd3 = info_fetch_osireport('SI','DERA BEAS SECURITY DUTY','fone4');
            $dbsd4 = info_fetch_osireport('INSP/LR','DERA BEAS SECURITY DUTY','fone4'); 
            $dbsd5 = info_fetch_osireport('INSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
            echo $dbsdsi = $dbsd3 + $dbsd4 + $dbsd5;
              ?></td>
            <td><?php $dbsd6 = info_fetch_osireport('ASI','DERA BEAS SECURITY DUTY','fone4'); 
                $dbsd7 = info_fetch_osireport('SI/CR','DERA BEAS SECURITY DUTY','fone4');  
                $dbsd8 = info_fetch_osireport('SI/LR','DERA BEAS SECURITY DUTY','fone4'); 
                echo $dbsdasi = $dbsd6 + $dbsd7+ $dbsd8; 

             ?></td>
            <td><?php $dbsd9 = info_fetch_osireport('HC','DERA BEAS SECURITY DUTY','fone4');
                    $dbsd10 = info_fetch_osireport('ASI/LR','DERA BEAS SECURITY DUTY','fone4');
                     $dbsd11 = info_fetch_osireport('ASI/CR','DERA BEAS SECURITY DUTY','fone4');
             echo $dbsdhc = $dbsd9 +  $dbsd10 + $dbsd11;  ?></td>
            <td><?php $dbsd12 = info_fetch_osireport('CT','DERA BEAS SECURITY DUTY','fone4');
                       $dbsd13 = info_fetch_osireport('HC/PR','DERA BEAS SECURITY DUTY','fone4');
                        $dbsd14 = info_fetch_osireport('HC/LR','DERA BEAS SECURITY DUTY','fone4');
                         $dbsd15 = info_fetch_osireport('Sr.Const','DERA BEAS SECURITY DUTY','fone4');
                         $dbsd16 = info_fetch_osireport('C-II','DERA BEAS SECURITY DUTY','fone4');

             echo $dbsdct = $dbsd12 + $dbsd13 + $dbsd14 + $dbsd15 + $dbsd16;  ?></td>
            <td><?php echo $dbsdinsp + $dbsdsi + $dbsdasi + $dbsdhc + $dbsdct;  ?></td>
                </tr>

                 <tr>
                  <td>v)</td>
                  <td>OTHER STATIC GUARDS</td>
                <td><?php $otstgu1 = info_fetch_osireport('INSP','OTHER STATIC GUARDS','fone5'); 
                      $otstgu2 = info_fetch_osireport('DSP/CR','OTHER STATIC GUARDS','fone5'); 
                      echo $otstguinsp = $otstgu1 + $otstgu2;  ?></td>
            <td><?php $otstgu3 = info_fetch_osireport('SI','OTHER STATIC GUARDS','fone5');
            $otstgu4 = info_fetch_osireport('INSP/LR','OTHER STATIC GUARDS','fone5'); 
            $otstgu5 = info_fetch_osireport('INSP/CR','OTHER STATIC GUARDS','fone5'); 
            echo $otstgusi = $otstgu3 + $otstgu4 + $otstgu5;
              ?></td>
            <td><?php $otstgu6 = info_fetch_osireport('ASI','OTHER STATIC GUARDS','fone5'); 
                $otstgu7 = info_fetch_osireport('SI/CR','OTHER STATIC GUARDS','fone5');  
                $otstgu8 = info_fetch_osireport('SI/LR','OTHER STATIC GUARDS','fone5'); 
                echo $otstguasi = $otstgu6 + $otstgu7 + $otstgu8; 

             ?></td>
            <td><?php $otstgu9 = info_fetch_osireport('HC','OTHER STATIC GUARDS','fone5');
                    $otstgu10 = info_fetch_osireport('ASI/LR','OTHER STATIC GUARDS','fone5');
                     $otstgu11 = info_fetch_osireport('ASI/CR','OTHER STATIC GUARDS','fone5');
             echo $otstguhc = $otstgu9 +  $otstgu10 + $otstgu11;  ?></td>
            <td><?php $otstgu12 = info_fetch_osireport('CT','OTHER STATIC GUARDS','fone5');
                       $otstgu13 = info_fetch_osireport('HC/PR','OTHER STATIC GUARDS','fone5');
                        $otstgu14 = info_fetch_osireport('HC/LR','OTHER STATIC GUARDS','fone5');
                         $otstgu15 = info_fetch_osireport('Sr.Const','OTHER STATIC GUARDS','fone5');
                         $otstgu16 = info_fetch_osireport('C-II','OTHER STATIC GUARDS','fone5');

             echo $otstguct= $otstgu12 + $otstgu13 + $otstgu14 + $otstgu15 + $otstgu16;  ?></td>
            <td><?php echo $otstguinsp + $otstgusi + $otstguasi + $otstguhc + $otstguct;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>PSOs/GUNMAN FROM BNS</td>
                 <td><?php $pgfbotao1 = info_fetch_osireports('INSP','','fone6'); 
                      $pgfbotao2 = info_fetch_osireports('DSP/CR','','fone6'); 
                      echo $pgfbotaoinsp = $pgfbotao1 + $pgfbotao2;  ?></td>
            <td><?php $pgfbotao3 = info_fetch_osireports('SI','','fone6');
            $pgfbotao4 = info_fetch_osireports('INSP/LR','','fone6'); 
            $pgfbotao5 = info_fetch_osireports('INSP/CR','','fone6'); 
            echo $pgfbotaosi = $pgfbotao3 + $pgfbotao4 + $pgfbotao5;
              ?></td>
            <td><?php $pgfbotao6 = info_fetch_osireports('ASI','','fone6'); 
                $pgfbotao7 = info_fetch_osireports('SI/CR','','fone6');  
                $pgfbotao8 = info_fetch_osireports('SI/LR','','fone6'); 
                echo $pgfbotaoasi = $pgfbotao6 + $pgfbotao7 + $pgfbotao8; 

             ?></td>
            <td><?php $pgfbotao9 = info_fetch_osireports('HC','','fone6');
                    $pgfbotao10 = info_fetch_osireports('ASI/LR','','fone6');
                     $pgfbotao11 = info_fetch_osireports('ASI/CR','','fone6');
             echo $pgfbotaohc = $pgfbotao9 +  $pgfbotao10 + $pgfbotao11;  ?></td>
            <td><?php $pgfbotao12 = info_fetch_osireports('CT','','fone6');
                       $pgfbotao13 = info_fetch_osireports('HC/PR','','fone6');
                        $pgfbotao14 = info_fetch_osireports('HC/LR','','fone6');
                         $pgfbotao15 = info_fetch_osireports('Sr.Const','','fone6');
                         $pgfbotao16 = info_fetch_osireports('C-II','','fone6');

             echo $pgfbotaoct= $pgfbotao12 + $pgfbotao13 + $pgfbotao14 + $pgfbotao15 + $pgfbotao16;  ?></td>
            <td><?php echo $pgfbotaoinsp + $pgfbotaosi + $pgfbotaoasi + $pgfbotaohc + $pgfbotaoct;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>VIP SEC.WING CHG U/82nd BN.</td>
                 <td><?php $vswcueb1 = info_fetch_osireport('INSP','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      $vswcueb2 = info_fetch_osireport('DSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      echo $vswcuebinsp = $vswcueb1 + $vswcueb2;  ?></td>
            <td><?php $vswcueb3 = info_fetch_osireport('SI','VIP SEC.WING CHG.U/82nd BN.','fone7');
            $vswcueb4 = info_fetch_osireport('INSP/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            $vswcueb5 = info_fetch_osireport('INSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            echo $vswcuebsi = $vswcueb3 + $vswcueb4 + $vswcueb5;
              ?></td>
            <td><?php $vswcueb6 = info_fetch_osireport('ASI','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                $vswcueb7 = info_fetch_osireport('SI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                $vswcueb8 = info_fetch_osireport('SI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                echo $vswcuebasi = $vswcueb6 + $vswcueb7 + $vswcueb8; 

             ?></td>
            <td><?php $vswcueb9 = info_fetch_osireport('HC','VIP SEC.WING CHG.U/82nd BN.','fone7');
                    $vswcueb10 = info_fetch_osireport('ASI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                     $vswcueb11 = info_fetch_osireport('ASI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');
             echo $vswcuebhc =  $vswcueb9 +  $vswcueb10 + $vswcueb11;  ?></td>
            <td><?php $vswcueb12 = info_fetch_osireport('CT','VIP SEC.WING CHG.U/82nd BN.','fone7');
                       $vswcueb13 = info_fetch_osireport('HC/PR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                        $vswcueb14 = info_fetch_osireport('HC/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $vswcueb15 = info_fetch_osireport('Sr.Const','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $vswcueb16 = info_fetch_osireport('C-II','VIP SEC.WING CHG.U/82nd BN.','fone7');

             echo $vswcuebct= $vswcueb12 + $vswcueb13 + $vswcueb14 + $vswcueb15 + $vswcueb16;  ?></td>
            <td><?php echo $vswcuebinsp + $vswcuebsi + $vswcuebasi + $vswcuebhc + $vswcuebct;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>POLICE SEC.WING CHG U/13th BN.</td>
                  <td><?php $pswcutb1 = info_fetch_osireport('INSP','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      $pswcutb2 = info_fetch_osireport('DSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      echo $pswcutbinsp = $pswcutb1 + $pswcutb2;  ?></td>
            <td><?php $pswcutb3 = info_fetch_osireport('SI','POLICE SEC.WING CHG U/13th BN.','fone8');
            $pswcutb4 = info_fetch_osireport('INSP/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            $pswcutb5 = info_fetch_osireport('INSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            echo $pswcutbsi = $pswcutb3 + $pswcutb4 + $pswcutb5;
              ?></td>
            <td><?php $pswcutb6 = info_fetch_osireport('ASI','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                $pswcutb7 = info_fetch_osireport('SI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');  
                $pswcutb8 = info_fetch_osireport('SI/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                echo $pswcutbasi = $pswcutb6 + $pswcutb7 + $pswcutb8; 

             ?></td>
            <td><?php $pswcutb9 = info_fetch_osireport('HC','POLICE SEC.WING CHG U/13th BN.','fone8');
                    $pswcutb10 = info_fetch_osireport('ASI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                     $pswcutb11 = info_fetch_osireport('ASI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');
             echo  $pswcutbhc = $pswcutb9 +  $pswcutb10 + $pswcutb11;  ?></td>
            <td><?php $pswcutb12 = info_fetch_osireport('CT','POLICE SEC.WING CHG U/13th BN.','fone8');
                       $pswcutb13 = info_fetch_osireport('HC/PR','POLICE SEC.WING CHG U/13th BN.','fone8');
                        $pswcutb14 = info_fetch_osireport('HC/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $pswcutb15 = info_fetch_osireport('Sr.Const','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $pswcutb16 = info_fetch_osireport('C-II','POLICE SEC.WING CHG U/13th BN.','fone8');

             echo $pswcutbct= $pswcutb12 + $pswcutb13 + $pswcutb14 + $pswcutb15 + $pswcutb16;  ?></td>
            <td><?php echo $pswcutbinsp + $pswcutbsi + $pswcutbasi + $pswcutbhc + $pswcutbct;  ?></td>
                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>BANK SECURITY DUTY</td>
                   <td><?php $banksd1 = info_fetch_osireport('INSP','BANK SECURITY DUTY','fone9'); 
                      $banksd2 = info_fetch_osireport('DSP/CR','BANK SECURITY DUTY','fone9'); 
                      echo $banksdinsp = $banksd1 + $banksd2;  ?></td>
            <td><?php $banksd3 = info_fetch_osireport('SI','BANK SECURITY DUTY','fone9');
            $banksd4 = info_fetch_osireport('INSP/LR','BANK SECURITY DUTY','fone9'); 
            $banksd5 = info_fetch_osireport('INSP/CR','BANK SECURITY DUTY','fone9'); 
            echo $banksdsi = $banksd3 + $banksd4 + $banksd5;
              ?></td>
            <td><?php $banksd6 = info_fetch_osireport('ASI','BANK SECURITY DUTY','fone9'); 
                $banksd7 = info_fetch_osireport('SI/CR','BANK SECURITY DUTY','fone9');  
                $banksd8 = info_fetch_osireport('SI/LR','BANK SECURITY DUTY','fone9'); 
                echo $banksdasi = $banksd6 + $banksd7 + $banksd8; 

             ?></td>
            <td><?php $banksd9 = info_fetch_osireport('HC','BANK SECURITY DUTY','fone9');
                    $banksd10 = info_fetch_osireport('ASI/LR','BANK SECURITY DUTY','fone9');
                     $banksd11 = info_fetch_osireport('ASI/CR','BANK SECURITY DUTY','fone9');
             echo $banksdhc = $banksd9 +  $banksd10 + $banksd11;  ?></td>
            <td><?php $banksd12 = info_fetch_osireport('CT','BANK SECURITY DUTY','fone9');
                       $banksd13 = info_fetch_osireport('HC/PR','BANK SECURITY DUTY','fone9');
                        $banksd14 = info_fetch_osireport('HC/LR','BANK SECURITY DUTY','fone9');
                         $banksd15 = info_fetch_osireport('Sr.Const','BANK SECURITY DUTY','fone9');
                         $banksd16 = info_fetch_osireport('C-II','BANK SECURITY DUTY','fone9');

             echo $banksdct= $banksd12 + $banksd13 + $banksd14 + $banksd15 + $banksd16;  ?></td>
            <td><?php echo $banksdinsp + $banksdsi + $banksdasi + $banksdhc + $banksdct;  ?></td>
                </tr>
                 <tr>
                  <td>x)</td>
                  <td>SPECIAL PROTECTION UNIT (C.M.SEC.)</td>
                  <td><?php $spucmsec1 = info_fetch_osireport('INSP','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      $spucmsec2 = info_fetch_osireport('DSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      echo $spucmsecinsp = $spucmsec1 + $spucmsec2;  ?></td>
            <td><?php $spucmsec3 = info_fetch_osireport('SI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
            $spucmsec4 = info_fetch_osireport('INSP/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            $spucmsec5 = info_fetch_osireport('INSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            echo $spucmsecsi =  $spucmsec3 + $spucmsec4 + $spucmsec5;
              ?></td>
            <td><?php $spucmsec4 = info_fetch_osireport('ASI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                $spucmsec5 = info_fetch_osireport('SI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                $spucmsec6 = info_fetch_osireport('SI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                echo $spucmsecasi =  $spucmsec4 + $spucmsec5 + $spucmsec6; 

             ?></td>

            <td><?php $spucmsec7 = info_fetch_osireport('HC','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                    $spucmsec8 = info_fetch_osireport('ASI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                     $spucmsec9 = info_fetch_osireport('ASI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
             echo $spucmsechc = $spucmsec7 +  $spucmsec8 + $spucmsec9;  ?></td>
            <td><?php $spucmsec10 = info_fetch_osireport('CT','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                       $spucmsec11 = info_fetch_osireport('HC/PR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                        $spucmsec12 = info_fetch_osireport('HC/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $spucmsec13 = info_fetch_osireport('Sr.Const','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $spucmsec14 = info_fetch_osireport('C-II','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

             echo $spucmsecct= $spucmsec10 + $spucmsec11 + $spucmsec12 + $spucmsec13 + $spucmsec14;  ?></td>

            <td><?php echo $spucmsecinsp + $spucmsecsi + $spucmsecasi + $spucmsechc + $spucmsecct;  ?></td>
                </tr>

                 <tr>
                  <td>xi)</td>
                  <td>PB. BHAWAN, NEW DELHI (SEC DUTY)</td>
                 <td><?php $pbbndsdy1 = info_fetch_osireport('INSP','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      $pbbndsdy2 = info_fetch_osireport('DSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      echo $pbbndsdyinsp = $pbbndsdy1 + $pbbndsdy2;  ?></td>
            <td><?php $pbbndsdy3 = info_fetch_osireport('SI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
            $pbbndsdy4 = info_fetch_osireport('INSP/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            $pbbndsdy5 = info_fetch_osireport('INSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            echo $pbbndsdysi =   $pbbndsdy3 + $pbbndsdy4 + $pbbndsdy5;
              ?></td>
            <td><?php $pbbndsdy6 = info_fetch_osireport('ASI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                $pbbndsdy7 = info_fetch_osireport('SI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                $pbbndsdy8 = info_fetch_osireport('SI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                echo $pbbndsdyasi =   $pbbndsdy6 + $pbbndsdy7 + $pbbndsdy8; 

             ?></td>
            <td><?php $pbbndsdy9 = info_fetch_osireport('HC','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                    $pbbndsdy10 = info_fetch_osireport('ASI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                     $pbbndsdy11 = info_fetch_osireport('ASI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
             echo $pbbndsdyhc = $pbbndsdy9 +  $pbbndsdy10 + $pbbndsdy11;  ?></td>
            <td><?php $pbbndsdy12 = info_fetch_osireport('CT','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                       $pbbndsdy13 = info_fetch_osireport('HC/PR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                        $pbbndsdy14 = info_fetch_osireport('HC/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $pbbndsdy15 = info_fetch_osireport('Sr.Const','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $pbbndsdy16 = info_fetch_osireport('C-II','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

             echo $pbbndsdyct= $pbbndsdy12 + $pbbndsdy13 + $pbbndsdy14 + $pbbndsdy15 + $pbbndsdy16;  ?></td>
            <td><?php echo $pbbndsdyinsp + $pbbndsdysi + $pbbndsdyasi + $pbbndsdyhc + $pbbndsdyct;  ?></td>
                </tr>
                 <tr>
                  <td>xii)</td>
                  <td>PB. BHAWAN, NEW DELHI (RESERVE)</td>
                  <td><?php $pbbndres1 = info_fetch_osireport('INSP','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      $pbbndres2 = info_fetch_osireport('DSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      echo $pbbndresinsp = $pbbndres1 + $pbbndres2;  ?></td>
            <td><?php $pbbndres3 = info_fetch_osireport('SI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
            $pbbndres4 = info_fetch_osireport('INSP/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            $pbbndres5 = info_fetch_osireport('INSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            echo $pbbndressi=  $pbbndres3 + $pbbndres4 + $pbbndres5;
              ?></td>
            <td><?php $pbbndres6 = info_fetch_osireport('ASI','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                $pbbndres7 = info_fetch_osireport('SI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                $pbbndres8 = info_fetch_osireport('SI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                echo $pbbndresasi = $pbbndres6 + $pbbndres7 + $pbbndres8; 

             ?></td>

            <td><?php $pbbndres9 = info_fetch_osireport('HC','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                    $pbbndres10 = info_fetch_osireport('ASI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                     $pbbndres11 = info_fetch_osireport('ASI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
             echo $pbbndreshc = $pbbndres9 +  $pbbndres10 + $pbbndres11;  ?></td>
            <td><?php $pbbndres12 = info_fetch_osireport('CT','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                       $pbbndres13 = info_fetch_osireport('HC/PR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                        $pbbndres14 = info_fetch_osireport('HC/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $pbbndres15 = info_fetch_osireport('Sr.Const','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $pbbndres16 = info_fetch_osireport('C-II','PB. BHAWAN NEW DELHI (RESERVE)','fone12');

             echo $pbbndresct=  $pbbndres12 + $pbbndres13 + $pbbndres14 + $pbbndres15 + $pbbndres16;  ?></td>

            <td><?php echo $pbbndresinsp + $pbbndressi + $pbbndresasi + $pbbndreshc + $pbbndresct;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $vpgisp + $jailsecinsp + $pphscinsp + $dbsdinsp + $otstguinsp + $pgfbotaoinsp + $vswcuebinsp + $pswcutbinsp + $banksdinsp + $spucmsecinsp + $pbbndsdyinsp + $pbbndresinsp;  ?></td>
                  <td><?php echo $vpgsi + $jailsecsi + $pphscisi + $dbsdsi + $otstgusi + $pgfbotaosi+$vswcuebsi + $pswcutbsi+ $banksdsi+ $spucmsecsi + $pbbndsdysi + $pbbndressi;  ?></td>
                  <td><?php echo $vpgasi + $jailsecasi + $pphsciasi + $dbsdasi + $otstguasi + $pgfbotaoasi + $vswcuebasi + $pswcutbasi + $banksdasi + $spucmsecasi + $pbbndsdyasi + $pbbndresasi;  ?></td>
                  <td><?php 
                          echo $vpghc + $jailsechc + $pphscihc + $dbsdhc + $otstguhc + $pgfbotaohc +$vswcuebhc + $pswcutbhc + $banksdhc + $spucmsechc + $pbbndsdyhc + $pbbndreshc;   
                    ?></td>
                  <td><?php echo $vpgct + $jailsecct + $pphscict + $dbsdct + $otstguct + $pgfbotaoct + $vswcuebct + $pswcutbct + $banksdct + $spucmsecct + $pbbndsdyct + $pbbndresct; ?></td>
                  <td><?php echo $box1 = $vpgisp + $jailsecinsp + $pphscinsp + $dbsdinsp + $otstguinsp + $pgfbotaoinsp + $vswcuebinsp + $pswcutbinsp + $banksdinsp + $spucmsecinsp + $pbbndsdyinsp + $pbbndresinsp + $vpgsi + $jailsecsi + $pphscisi + $dbsdsi + $otstgusi + $pgfbotaosi + $vswcuebsi + $pswcutbsi+ $banksdsi+ $spucmsecsi + $pbbndsdysi + $pbbndressi + $vpgasi + $jailsecasi + $pphsciasi + $dbsdasi + $otstguasi + $pgfbotaoasi + $vswcuebasi + $pswcutbasi + $banksdasi + $spucmsecasi + $pbbndsdyasi + $pbbndresasi + $vpghc + $jailsechc + $pphscihc + $dbsdhc + $otstguhc + $pgfbotaohc +$vswcuebhc + $pswcutbhc + $banksdhc + $spucmsechc + $pbbndsdyhc + $pbbndreshc + $vpgct + $jailsecct + $pphscict + $dbsdct + $otstguct + $pgfbotaoct + $vswcuebct + $pswcutbct + $banksdct + $spucmsecct + $pbbndsdyct + $pbbndresct;

                    ?>

                   </td>
                </tr>
              </tbody>
           </table>

                    
                     <table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td> <h3> 2. LAW & ORDER DUTY</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
            <table width="925" border="1">
              
              <tbody>
                <tr>
                  <td width="26" >i)</td>
                  <td width="579"  >PERMANENT DUTY</td>
                 <td width="57" ><?php $permanentduty1 = info_fetch_osireport('INSP','PERMANENT DUTY','lone1'); 
                      $permanentduty2 = info_fetch_osireport('DSP/CR','PERMANENT DUTY','lone1'); 
                      echo $permanentdutyinsp =  $permanentduty1 + $permanentduty2;  ?></td>
            <td width="42"><?php $permanentduty3 = info_fetch_osireport('SI','PERMANENT DUTY','lone1');
            $permanentduty4 = info_fetch_osireport('INSP/LR','PERMANENT DUTY','lone1'); 
            $permanentduty5 = info_fetch_osireport('INSP/CR','PERMANENT DUTY','lone1'); 
            echo $permanentdutysi= $permanentduty3 + $permanentduty4 + $permanentduty5;
              ?></td>
            <td width="42"><?php $permanentduty6 = info_fetch_osireport('ASI','PERMANENT DUTY','lone1'); 
                $permanentduty7 = info_fetch_osireport('SI/CR','PERMANENT DUTY','lone1');  
                $permanentduty8 = info_fetch_osireport('SI/LR','PERMANENT DUTY','lone1'); 
                echo $permanentdutyasi = $permanentduty6 + $permanentduty7 + $permanentduty8; 

             ?></td>
            <td width="42"><?php $permanentduty9 = info_fetch_osireport('HC','PERMANENT DUTY','lone1');
                    $permanentduty10 = info_fetch_osireport('ASI/LR','PERMANENT DUTY','lone1');
                     $permanentduty11 = info_fetch_osireport('ASI/CR','PERMANENT DUTY','lone1');
             echo $permanentdutyhc = $permanentduty9 +  $permanentduty10 + $permanentduty11;  ?></td>
            <td width="42"><?php $permanentduty12 = info_fetch_osireport('CT','PERMANENT DUTY','lone1');
                       $permanentduty13 = info_fetch_osireport('HC/PR','PERMANENT DUTY','lone1');
                        $permanentduty14 = info_fetch_osireport('HC/LR','PERMANENT DUTY','lone1');
                         $permanentduty15 = info_fetch_osireport('Sr.Const','PERMANENT DUTY','lone1');
                         $permanentduty16 = info_fetch_osireport('C-II','PERMANENT DUTY','lone1');

             echo $permanentdutyct= $permanentduty12 + $permanentduty13 + $permanentduty14 + $permanentduty15 + $permanentduty16;  ?></td>
            <td width="43"><?php echo $permanentdutyinsp + $permanentdutysi + $permanentdutyasi + $permanentdutyhc + $permanentdutyct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DGP/RESERVE</td>
                   <td><?php $dgpreserve1 = info_fetch_osireport('INSP','DGP, RESERVES','lone2'); 
                      $dgpreserve2 = info_fetch_osireport('DSP/CR','DGP, RESERVES','lone2'); 
                      echo $dgpreserveinsp = $dgpreserve1 + $dgpreserve2;  ?></td>
            <td><?php $dgpreserve3 = info_fetch_osireport('SI','DGP, RESERVES','lone2');
            $dgpreserve4 = info_fetch_osireport('INSP/LR','DGP, RESERVES','lone2'); 
            $dgpreserve5 = info_fetch_osireport('INSP/CR','DGP, RESERVES','lone2'); 
            echo $dgpreservesi= $dgpreserve3 + $dgpreserve4 + $dgpreserve5;
              ?></td>
            <td><?php $dgpreserve6 = info_fetch_osireport('ASI','DGP, RESERVES','lone2'); 
                $dgpreserve7 = info_fetch_osireport('SI/CR','DGP, RESERVES','lone2');  
                $dgpreserve8 = info_fetch_osireport('SI/LR','DGP, RESERVES','lone2'); 
                echo $dgpreserveasi = $dgpreserve6 + $dgpreserve7 + $dgpreserve8; 

             ?></td>
            <td><?php $dgpreserve9 = info_fetch_osireport('HC','DGP, RESERVES','lone2');
                    $dgpreserve10 = info_fetch_osireport('ASI/LR','DGP, RESERVES','lone2');
                     $dgpreserve11 = info_fetch_osireport('ASI/CR','DGP, RESERVES','lone2');
             echo  $dgpreservehc = $dgpreserve9 +  $dgpreserve10 + $dgpreserve11;  ?></td>
            <td><?php $dgpreserve12 = info_fetch_osireport('CT','DGP, RESERVES','lone2');
                       $dgpreserve13 = info_fetch_osireport('HC/PR','DGP, RESERVES','lone2');
                        $dgpreserve14 = info_fetch_osireport('HC/LR','DGP, RESERVES','lone2');
                         $dgpreserve15 = info_fetch_osireport('Sr.Const','DGP, RESERVES','lone2');
                         $dgpreserve16 = info_fetch_osireport('C-II','DGP, RESERVES','lone2');

             echo $dgpreservect= $dgpreserve12 + $dgpreserve13 + $dgpreserve14 + $dgpreserve15 + $dgpreserve16;  ?></td>
            <td><?php echo $dgpreserveinsp + $dgpreservesi + $dgpreserveasi + $dgpreservehc + $dgpreservect;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>TRG./E.D.RESERVE</td>
                <td><?php $trgedreserve1 = info_fetch_osireport('INSP','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      $trgedreserve2 = info_fetch_osireport('DSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      echo $trgedreserveinsp = $trgedreserve1 + $trgedreserve2;  ?></td>
            <td><?php $trgedreserve3 = info_fetch_osireport('SI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
            $trgedreserve4 = info_fetch_osireport('INSP/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            $trgedreserve5 = info_fetch_osireport('INSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            echo $trgedreservesi= $trgedreserve3 + $trgedreserve4 + $trgedreserve5;
              ?></td>
            <td><?php $trgedreserve6 = info_fetch_osireport('ASI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                $trgedreserve7 = info_fetch_osireport('SI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');  
                $trgedreserve8 = info_fetch_osireport('SI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                echo $trgedreserveasi = $trgedreserve6 + $trgedreserve7 + $trgedreserve8; 

             ?></td>
            <td><?php $trgedreserve9 = info_fetch_osireport('HC','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                    $trgedreserve10 = info_fetch_osireport('ASI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                     $trgedreserve11 = info_fetch_osireport('ASI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
             echo $trgedreservehc = $trgedreserve9 +  $trgedreserve10 + $trgedreserve11;  ?></td>
            <td><?php $trgedreserve12 = info_fetch_osireport('CT','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                       $trgedreserve13 = info_fetch_osireport('HC/PR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                        $trgedreserve14 = info_fetch_osireport('HC/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $trgedreserve15 = info_fetch_osireport('Sr.Const','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $trgedreserve16 = info_fetch_osireport('C-II','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

             echo $trgedreservect= $trgedreserve12 + $trgedreserve13 + $trgedreserve14 + $trgedreserve15 + $trgedreserve16;  ?></td>
            <td><?php echo $trgedreserveinsp + $trgedreservesi + $trgedreserveasi + $trgedreservehc + $trgedreservect;  ?></td>
                </tr>

                     <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $permanentdutyinsp + $dgpreserveinsp + $trgedreserveinsp; ?></td>
                  <td><?php echo $permanentdutysi + $dgpreservesi + $trgedreservesi;  ?></td>
                  <td><?php echo $permanentdutyasi + $dgpreserveasi + $trgedreserveasi;  ?></td>
                  <td><?php echo $permanentdutyhc + $dgpreservehc + $trgedreservehc; ?></td>
                  <td><?php echo $permanentdutyct + $dgpreservect + $trgedreservect;?></td>
                  <td><?php echo $box2 =  $permanentdutyinsp + $dgpreserveinsp + $trgedreserveinsp + $permanentdutysi + $dgpreservesi + $trgedreservesi + $permanentdutyasi + $dgpreserveasi + $trgedreserveasi + $permanentdutyhc + $dgpreservehc + $trgedreservehc + $permanentdutyct + $dgpreservect + $trgedreservect; ?>
                   </td>
                </tr>
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td> <h3> 3. SPECIAL SQUADS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
           
            <table width="925" border="1">
              <tbody>
                <tr>
                  <td width="27">i)</td>
                  <td width="580">ANTI RIOT POLICE, JALANDHAR</td>
                 <td width="56"><?php $antiroitpojal1 = info_fetch_osireport('INSP','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      $antiroitpojal2 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      echo $antiroitpojalinsp = $antiroitpojal1 + $antiroitpojal2;  ?></td>
            <td width="43"><?php $antiroitpojal3 = info_fetch_osireport('SI','ANTI RIOT POLICE, JALANDHAR','sqone1');
            $antiroitpojal4 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            $antiroitpojal5 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            echo $antiroitpojalsi= $antiroitpojal3 + $antiroitpojal4 + $antiroitpojal5;
              ?></td>
            <td width="42"><?php $antiroitpojal6 = info_fetch_osireport('ASI','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                $antiroitpojal7 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');  
                $antiroitpojal8 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                echo $antiroitpojalasi = $antiroitpojal6 + $antiroitpojal7 + $antiroitpojal8; 

             ?></td>
            <td width="42""><?php $antiroitpojal9 = info_fetch_osireport('HC','ANTI RIOT POLICE, JALANDHAR','sqone1');
                    $antiroitpojal10 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                     $antiroitpojal11 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $antiroitpojalhc =  $antiroitpojal9 +  $antiroitpojal10 + $antiroitpojal11;  ?></td>
            <td width="41"><?php $antiroitpojal12 = info_fetch_osireport('CT','ANTI RIOT POLICE, JALANDHAR','sqone1');
                       $antiroitpojal13 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                        $antiroitpojal14 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $antiroitpojal15 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $antiroitpojal16 = info_fetch_osireport('C-II','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $antiroitpojalct= $antiroitpojal12 + $antiroitpojal13 + $antiroitpojal14 + $antiroitpojal15 + $antiroitpojal16;  ?></td>
            <td width="42"><?php echo $antiroitpojalinsp + $antiroitpojalsi + $antiroitpojalasi + $antiroitpojalhc + $antiroitpojalct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>ANTI RIOT POLICE, MANSA</td>
                  <td><?php $antiroitpomansa1 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MANSA','sqone2'); 
                      $antiroitpomansa2 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
                      echo $antiroitpomansainsp = $antiroitpomansa1 + $antiroitpomansa2;  ?></td>
            <td><?php $antiroitpomansa3 = info_fetch_osireport('SI','ANTI RIOT POLICE, MANSA','sqone2');
            $antiroitpomansa4 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
            $antiroitpomansa5 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
            echo $antiroitpomansasi= $antiroitpomansa3 + $antiroitpomansa4 + $antiroitpomansa5;
              ?></td>
            <td><?php $antiroitpomansa6 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MANSA','sqone2'); 
                $antiroitpomansa7 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MANSA','sqone2');  
                $antiroitpomansa8 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
                echo $antiroitpomansaasi = $antiroitpomansa6 + $antiroitpomansa7 + $antiroitpomansa8; 

             ?></td>
            <td><?php $antiroitpomansa9 = info_fetch_osireport('HC','ANTI RIOT POLICE, MANSA','sqone2');
                    $antiroitpomansa10 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MANSA','sqone2');
                     $antiroitpomansa11 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MANSA','sqone2');
             echo $antiroitpomansahc =   $antiroitpomansa9 +  $antiroitpomansa10 + $antiroitpomansa11;  ?></td>
            <td><?php $antiroitpomansa12 = info_fetch_osireport('CT','ANTI RIOT POLICE, MANSA','sqone2');
                       $antiroitpomansa13 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MANSA','sqone2');
                        $antiroitpomansa14 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MANSA','sqone2');
                         $antiroitpomansa15 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MANSA','sqone2');
                         $antiroitpomansa16 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MANSA','sqone2');

             echo $antiroitpomansact= $antiroitpomansa12 + $antiroitpomansa13 + $antiroitpomansa14 + $antiroitpomansa15 + $antiroitpomansa16;  ?></td>
            <td><?php echo $antiroitpomansainsp + $antiroitpomansasi + $antiroitpomansaasi + $antiroitpomansahc + $antiroitpomansact;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ANTI RIOT POLICE, MUKATSAR</td>
                  <td><?php $antiroitpomukastsar1 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      $antiroitpomukastsar2 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      echo $antiroitpomukastsarinsp = $antiroitpomukastsar1 + $antiroitpomukastsar2;  ?></td>
            <td><?php $antiroitpomukastsar3 = info_fetch_osireport('SI','ANTI RIOT POLICE, MUKATSAR','sqone3');
            $antiroitpomukastsar4 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            $antiroitpomukastsar5 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            echo $antiroitpomukastsarsi= $antiroitpomukastsar3 + $antiroitpomukastsar4 + $antiroitpomukastsar5;
              ?></td>
            <td><?php $antiroitpomukastsar6 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                $antiroitpomukastsar7 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');  
                $antiroitpomukastsar8 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                echo $antiroitpomukastsarasi = $antiroitpomukastsar6 + $antiroitpomukastsar7 + $antiroitpomukastsar8; 

             ?></td>
            <td><?php $antiroitpomukastsar9 = info_fetch_osireport('HC','ANTI RIOT POLICE, MUKATSAR','sqone3');
                    $antiroitpomukastsar10 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                     $antiroitpomukastsar11 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');
             echo $antiroitpomukastsarhc =  $antiroitpomukastsar9 +  $antiroitpomukastsar10 + $antiroitpomukastsar11;  ?></td>
            <td><?php $antiroitpomukastsar12 = info_fetch_osireport('CT','ANTI RIOT POLICE, MUKATSAR','sqone3');
                       $antiroitpomukastsar13 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                        $antiroitpomukastsar14 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $antiroitpomukastsar15 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $antiroitpomukastsar16 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MUKATSAR','sqone3');

             echo $antiroitpomukastsarct= $antiroitpomukastsar12 + $antiroitpomukastsar13 + $antiroitpomukastsar14 + $antiroitpomukastsar15 + $antiroitpomukastsar16;  ?></td>
            <td><?php echo $antiroitpomukastsarinsp + $antiroitpomukastsarsi + $antiroitpomukastsarasi + $antiroitpomukastsarhc + $antiroitpomukastsarct;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>SDRF TEAM JALANDHAR</td>
                 <td><?php $sdrfteamjal1 = info_fetch_osireport('INSP','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      $sdrfteamjal2 = info_fetch_osireport('DSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      echo $sdrfteamjalinsp = $sdrfteamjal1 + $sdrfteamjal2;  ?></td>
            <td><?php $sdrfteamjal3 = info_fetch_osireport('SI','S.D.R.F. TEAM, JALANDHAR','sqone4');
            $sdrfteamjal4 = info_fetch_osireport('INSP/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            $sdrfteamjal5 = info_fetch_osireport('INSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            echo $sdrfteamjalsi=  $sdrfteamjal3 + $sdrfteamjal4 + $sdrfteamjal5;
              ?></td>
            <td><?php $sdrfteamjal6 = info_fetch_osireport('ASI','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                $sdrfteamjal7 = info_fetch_osireport('SI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');  
                $sdrfteamjal8 = info_fetch_osireport('SI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                echo $sdrfteamjalasi = $sdrfteamjal6 + $sdrfteamjal7 + $sdrfteamjal8; 

             ?></td>
            <td><?php $sdrfteamjal9 = info_fetch_osireport('HC','S.D.R.F. TEAM, JALANDHAR','sqone4');
                    $sdrfteamjal10 = info_fetch_osireport('ASI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                     $sdrfteamjal11 = info_fetch_osireport('ASI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');
             echo $sdrfteamjalhc =  $sdrfteamjal9 +  $sdrfteamjal10 + $sdrfteamjal11;  ?></td>
            <td><?php $sdrfteamjal12 = info_fetch_osireport('CT','S.D.R.F. TEAM, JALANDHAR','sqone4');
                       $sdrfteamjal13 = info_fetch_osireport('HC/PR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                        $sdrfteamjal14 = info_fetch_osireport('HC/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $sdrfteamjal15 = info_fetch_osireport('Sr.Const','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $sdrfteamjal16 = info_fetch_osireport('C-II','S.D.R.F. TEAM, JALANDHAR','sqone4');

             echo $sdrfteamjalct= $sdrfteamjal12 + $sdrfteamjal13 + $sdrfteamjal14 + $sdrfteamjal15 + $sdrfteamjal16;  ?></td>
            <td><?php echo $sdrfteamjalinsp + $sdrfteamjalsi + $sdrfteamjalasi + $sdrfteamjalhc + $sdrfteamjalct;  ?></td>
                </tr>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>SPL. STRIKING GROUP </td>
                 <td><?php $splstrikgroup1 = info_fetch_osireport('INSP','SPL. STRIKING GROUPS','sqone5'); 
                      $splstrikgroup2 = info_fetch_osireport('DSP/CR','SPL. STRIKING GROUPS','sqone5'); 
                      echo $splstrikgroupinsp = $splstrikgroup1 + $splstrikgroup2;  ?></td>
            <td><?php $splstrikgroup3 = info_fetch_osireport('SI','SPL. STRIKING GROUPS','sqone5');
            $splstrikgroup4 = info_fetch_osireport('INSP/LR','SPL. STRIKING GROUPS','sqone5'); 
            $splstrikgroup5 = info_fetch_osireport('INSP/CR','SPL. STRIKING GROUPS','sqone5'); 
            echo $splstrikgroupsi= $splstrikgroup3 + $splstrikgroup4 + $splstrikgroup5;
              ?></td>
            <td><?php $splstrikgroup6 = info_fetch_osireport('ASI','SPL. STRIKING GROUPS','sqone5'); 
                $splstrikgroup7 = info_fetch_osireport('SI/CR','SPL. STRIKING GROUPS','sqone5');  
                $splstrikgroup8 = info_fetch_osireport('SI/LR','SPL. STRIKING GROUPS','sqone5'); 
                echo $splstrikgroupasi = $splstrikgroup6 + $splstrikgroup7 + $splstrikgroup8; 

             ?></td>
            <td><?php $splstrikgroup9 = info_fetch_osireport('HC','SPL. STRIKING GROUPS','sqone5');
                    $splstrikgroup10 = info_fetch_osireport('ASI/LR','SPL. STRIKING GROUPS','sqone5');
                     $splstrikgroup11 = info_fetch_osireport('ASI/CR','SPL. STRIKING GROUPS','sqone5');
             echo $splstrikgrouphc =  $splstrikgroup9 +  $splstrikgroup10 + $splstrikgroup11;  ?></td>
            <td><?php $splstrikgroup12 = info_fetch_osireport('CT','SPL. STRIKING GROUPS','sqone5');
                       $splstrikgroup13 = info_fetch_osireport('HC/PR','SPL. STRIKING GROUPS','sqone5');
                        $splstrikgroup14 = info_fetch_osireport('HC/LR','SPL. STRIKING GROUPS','sqone5');
                         $splstrikgroup15 = info_fetch_osireport('Sr.Const','SPL. STRIKING GROUPS','sqone5');
                         $splstrikgroup16 = info_fetch_osireport('C-II','SPL. STRIKING GROUPS','sqone5');

             echo $splstrikgroupct= $splstrikgroup12 + $splstrikgroup13 + $splstrikgroup14 + $splstrikgroup15 + $splstrikgroup16;  ?></td>
            <td><?php echo $splstrikgroupinsp + $splstrikgroupsi + $splstrikgroupasi + $splstrikgrouphc + $splstrikgroupct;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>SWAT TEAM(4TH CDO) </td>
                  <td><?php $swatreamfcdo1 = info_fetch_osireport('INSP','SWAT TEAM (4TH CDO)','sqone6'); 
                      $swatreamfcdo2 = info_fetch_osireport('DSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
                      echo $swatreamfcdoinsp = $swatreamfcdo1 + $swatreamfcdo2;  ?></td>
            <td><?php $swatreamfcdo3 = info_fetch_osireport('SI','SWAT TEAM (4TH CDO)','sqone6');
            $swatreamfcdo4 = info_fetch_osireport('INSP/LR','SWAT TEAM (4TH CDO)','sqone6'); 
            $swatreamfcdo5 = info_fetch_osireport('INSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
            echo $swatreamfcdosi= $swatreamfcdo3 + $swatreamfcdo4 + $swatreamfcdo5;
              ?></td>
            <td><?php $swatreamfcdo6 = info_fetch_osireport('ASI','SWAT TEAM (4TH CDO)','sqone6'); 
                $swatreamfcdo7 = info_fetch_osireport('SI/CR','SWAT TEAM (4TH CDO)','sqone6');  
                $swatreamfcdo8 = info_fetch_osireport('SI/LR','SWAT TEAM (4TH CDO)','sqone6'); 
                echo $swatreamfcdoasi = $swatreamfcdo6 + $swatreamfcdo7 + $swatreamfcdo8; 

             ?></td>
            <td><?php $hold329 = info_fetch_osireport('HC','SWAT TEAM (4TH CDO)','sqone6');
                    $hold330 = info_fetch_osireport('ASI/LR','SWAT TEAM (4TH CDO)','sqone6');
                     $hold331 = info_fetch_osireport('ASI/CR','SWAT TEAM (4TH CDO)','sqone6');
             echo $swatreamfcdohc =  $hold329 +  $hold330 + $hold331;  ?></td>
            <td><?php $hold332 = info_fetch_osireport('CT','SWAT TEAM (4TH CDO)','sqone6');
                       $hold333 = info_fetch_osireport('HC/PR','SWAT TEAM (4TH CDO)','sqone6');
                        $hold334 = info_fetch_osireport('HC/LR','SWAT TEAM (4TH CDO)','sqone6');
                         $hold335 = info_fetch_osireport('Sr.Const','SWAT TEAM (4TH CDO)','sqone6');
                         $hold336 = info_fetch_osireport('C-II','SWAT TEAM (4TH CDO)','sqone6');

             echo $swatreamfcdoct= $hold332 + $hold333 + $hold334 + $hold335 + $hold336;  ?></td>
            <td><?php echo $swatreamfcdoinsp + $swatreamfcdosi + $swatreamfcdoasi + $swatreamfcdohc + $swatreamfcdoct;  ?></td>
                </tr>

                                 <tr>
                  <td>  vii)</td>
                  <td>SOG BHG.,PTL(SPECIAL OPS.GROUP)</td>
                  <td><?php $sogbhgptlspopsgroup1 = info_fetch_osireport('INSP','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
                      $sogbhgptlspopsgroup2 = info_fetch_osireport('DSP/CR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
                      echo $sogbhgptlspopsgroupinsp = $sogbhgptlspopsgroup1 + $sogbhgptlspopsgroup2;  ?></td>
            <td><?php $sogbhgptlspopsgroup3 = info_fetch_osireport('SI','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
            $sogbhgptlspopsgroup4 = info_fetch_osireport('INSP/LR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
            $sogbhgptlspopsgroup5 = info_fetch_osireport('INSP/CR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
            echo $sogbhgptlspopsgroupsi = $sogbhgptlspopsgroup3 + $sogbhgptlspopsgroup4 + $sogbhgptlspopsgroup5;
              ?></td>
            <td><?php $sogbhgptlspopsgroup6 = info_fetch_osireport('ASI','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
                $sogbhgptlspopsgroup7 = info_fetch_osireport('SI/CR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');  
                $sogbhgptlspopsgroup8 = info_fetch_osireport('SI/LR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7'); 
                echo $sogbhgptlspopsgroupasi = $sogbhgptlspopsgroup6 + $sogbhgptlspopsgroup7 + $sogbhgptlspopsgroup8; 

             ?></td>
            <td><?php $sogbhgptlspopsgroup9 = info_fetch_osireport('HC','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                    $sogbhgptlspopsgroup10 = info_fetch_osireport('ASI/LR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                     $sogbhgptlspopsgroup11 = info_fetch_osireport('ASI/CR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
             echo $sogbhgptlspopsgrouphc =  $sogbhgptlspopsgroup9 +  $sogbhgptlspopsgroup10 + $sogbhgptlspopsgroup11;  ?></td>
            <td><?php $sogbhgptlspopsgroup12 = info_fetch_osireport('CT','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                       $sogbhgptlspopsgroup13 = info_fetch_osireport('HC/PR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                        $sogbhgptlspopsgroup14 = info_fetch_osireport('HC/LR','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                         $sogbhgptlspopsgroup15 = info_fetch_osireport('Sr.Const','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');
                         $sogbhgptlspopsgroup16 = info_fetch_osireport('C-II','SOG BHG.,PTL(SPECIAL OPS.GROUP)','sqone7');

             echo $sogbhgptlspopsgroupct= $sogbhgptlspopsgroup12 + $sogbhgptlspopsgroup13 + $sogbhgptlspopsgroup14 + $sogbhgptlspopsgroup15 + $sogbhgptlspopsgroup16;  ?></td>
            <td><?php echo $sogbhgptlspopsgroupinsp + $sogbhgptlspopsgroupsi + $sogbhgptlspopsgroupasi + $sogbhgptlspopsgrouphc + $sogbhgptlspopsgroupct;  ?></td>
                </tr>

           <tr>
                  <td>  viii)</td>
                  <td>UNMANNED AERIAL VEHICLE (UAV)</td>
                  <td><?php $uavteam1 = info_fetch_osireport('INSP','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
                      $uavteam2 = info_fetch_osireport('DSP/CR','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
                      echo $uavteaminsp = $uavteam1 + $uavteam2;  ?></td>
            <td><?php $uavteam3 = info_fetch_osireport('SI','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
            $uavteam4 = info_fetch_osireport('INSP/LR','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
            $uavteam5 = info_fetch_osireport('INSP/CR','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
            echo $uavteamsi = $uavteam3 + $uavteam4 + $uavteam5;
              ?></td>
            <td><?php $uavteam6 = info_fetch_osireport('ASI','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
                $uavteam7 = info_fetch_osireport('SI/CR','UNMANNED AERIAL VEHICLE (UAV)','sqone8');  
                $uavteam8 = info_fetch_osireport('SI/LR','UNMANNED AERIAL VEHICLE (UAV)','sqone8'); 
                echo $uavteamasi = $uavteam6 + $uavteam7 + $uavteam8; 

             ?></td>
            <td><?php $uavteam9 = info_fetch_osireport('HC','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                    $uavteam10 = info_fetch_osireport('ASI/LR','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                     $uavteam11 = info_fetch_osireport('ASI/CR','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
             echo $uavteamhc =  $uavteam9 +  $uavteam10 + $uavteam11;  ?></td>
            <td><?php $uavteam12 = info_fetch_osireport('CT','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                       $uavteam13 = info_fetch_osireport('HC/PR','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                        $uavteam14 = info_fetch_osireport('HC/LR','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                         $uavteam15 = info_fetch_osireport('Sr.Const','UNMANNED AERIAL VEHICLE (UAV)','sqone8');
                         $uavteam16 = info_fetch_osireport('C-II','UNMANNED AERIAL VEHICLE (UAV)','sqone8');

             echo $uavteamct= $uavteam12 + $uavteam13 + $uavteam14 + $uavteam15 + $uavteam16;  ?></td>
            <td><?php echo $uavteaminsp + $uavteamsi + $uavteamasi + $uavteamhc + $uavteamct;  ?></td>
                </tr>


                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $antiroitpojalinsp + $antiroitpomansainsp + $antiroitpomukastsarinsp + $sdrfteamjalinsp + $splstrikgroupinsp +
                           $swatreamfcdoinsp + $sogbhgptlspopsgroupinsp + $uavteaminsp; ?></td>
                  <td><?php echo $antiroitpojalsi + $antiroitpomansasi + $antiroitpomukastsarsi + $sdrfteamjalsi + $splstrikgroupsi +
                           $swatreamfcdosi + $sogbhgptlspopsgroupsi + $uavteamsi ;  ?></td>
                  <td><?php echo $antiroitpojalasi + $antiroitpomansaasi + $antiroitpomukastsarasi + $sdrfteamjalasi + $splstrikgroupasi +
                           $swatreamfcdoasi + $sogbhgptlspopsgroupasi + $uavteamasi;  ?></td>
                  <td><?php echo $antiroitpojalhc + $antiroitpomansahc + $antiroitpomukastsarhc + $sdrfteamjalhc + $splstrikgrouphc +
                           $swatreamfcdohc + $sogbhgptlspopsgrouphc + $uavteamhc; ?></td>
                  <td><?php echo $antiroitpojalct + $antiroitpomansact + $antiroitpomukastsarct + $sdrfteamjalct + $splstrikgroupct +
                           $swatreamfcdoct + $sogbhgptlspopsgroupct + $uavteamct; ?></td>
                  <td><?php echo $box3 =  $antiroitpojalinsp + $antiroitpomansainsp + $antiroitpomukastsarinsp + $sdrfteamjalinsp + $splstrikgroupinsp +
                           $swatreamfcdoinsp + $antiroitpojalsi + $antiroitpomansasi + $antiroitpomukastsarsi + $sdrfteamjalsi + $splstrikgroupsi +
                           $swatreamfcdosi + $antiroitpojalasi + $antiroitpomansaasi + $antiroitpomukastsarasi + $sdrfteamjalasi + $splstrikgroupasi +
                           $swatreamfcdoasi + $antiroitpojalhc + $antiroitpomansahc + $antiroitpomukastsarhc + $sdrfteamjalhc + $splstrikgrouphc +
                           $swatreamfcdohc + $antiroitpojalct + $antiroitpomansact + $antiroitpomukastsarct + $sdrfteamjalct + $splstrikgroupct +
                           $swatreamfcdoct + $sogbhgptlspopsgroupinsp + $sogbhgptlspopsgroupsi + $sogbhgptlspopsgroupasi + $sogbhgptlspopsgrouphc + $sogbhgptlspopsgroupct; + $uavteaminsp + $uavteamsi + $uavteamasi + $uavteamhc + $uavteamct; ?>
                   </td>
                </tr>              </tbody>
           </table>
<table border="0"><tr><td>&nbsp;</td><td>  <h3> 4. PERMANENT ATTACHMENT</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
   
                   
            <table width="924" border="1">
              <tbody>
                <tr>
                  <td width="31">i)</td>
                  <td width="575">DISTT. MOHALI</td>
                <td width="59"><?php $disttmohali1 = info_fetch_osireport('INSP','ATTACHED WITH DISTT., MOHALI','paone1'); 
                      $disttmohali2 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT., MOHALI','paone1'); 
                      echo $disttmohaliinsp = $disttmohali1 + $disttmohali2;  ?></td>
            <td width="42"><?php $disttmohali3 = info_fetch_osireport('SI','ATTACHED WITH DISTT., MOHALI','paone1');
            $disttmohali4 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT., MOHALI','paone1'); 
            $disttmohali5 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT., MOHALI','paone1'); 
            echo $disttmohalisi= $disttmohali3 + $disttmohali4 + $disttmohali5;
              ?></td>
            <td width="42"><?php $disttmohali6 = info_fetch_osireport('ASI','ATTACHED WITH DISTT., MOHALI','paone1'); 
                $disttmohali7 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT., MOHALI','paone1');  
                $disttmohali8 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT., MOHALI','paone1'); 
                echo $disttmohaliasi =  $disttmohali6 + $disttmohali7 + $disttmohali8; 

             ?></td>
            <td width="43"><?php $disttmohali9 = info_fetch_osireport('HC','ATTACHED WITH DISTT., MOHALI','paone1');
                    $disttmohali10 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT., MOHALI','paone1');
                     $disttmohali11 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT., MOHALI','paone1');
             echo $disttmohalihc =  $disttmohali9 +  $disttmohali10 + $disttmohali11;  ?></td>
            <td width="43"><?php $disttmohali12 = info_fetch_osireport('CT','ATTACHED WITH DISTT., MOHALI','paone1');
                       $disttmohali13 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT., MOHALI','paone1');
                        $disttmohali14 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT., MOHALI','paone1');
                         $disttmohali15 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT., MOHALI','paone1');
                         $disttmohali16 = info_fetch_osireport('C-II','ATTACHED WITH DISTT., MOHALI','paone1');

             echo $disttmohalict= $disttmohali12 + $disttmohali13 + $disttmohali14 + $disttmohali15 + $disttmohali16;  ?></td>
            <td width="37"><?php echo $disttmohaliinsp + $disttmohalisi + $disttmohaliasi + $disttmohalihc + $disttmohalict;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN MALE)</td>
                  <td><?php $dppmarkinmale1 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      $dppmarkinmale2 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      echo $dppmarkinmaleinsp = $dppmarkinmale1 + $dppmarkinmale2;  ?></td>
            <td><?php $dppmarkinmale3 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
            $dppmarkinmale4 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            $dppmarkinmale5 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            echo $dppmarkinmalesi= $dppmarkinmale3 + $dppmarkinmale4 + $dppmarkinmale5;
              ?></td>
            <td><?php $dppmarkinmale6 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                $dppmarkinmale7 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');  
                $dppmarkinmale8 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                echo $dppmarkinmaleasi = $dppmarkinmale6 + $dppmarkinmale7 + $dppmarkinmale8; 

             ?></td>
            <td><?php $dppmarkinmale9 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                    $dppmarkinmale10 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                     $dppmarkinmale11 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
             echo $dppmarkinmalehc = $dppmarkinmale9 +  $dppmarkinmale10 + $dppmarkinmale11;  ?></td>
            <td><?php $dppmarkinmale12 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                       $dppmarkinmale13 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                        $dppmarkinmale14 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $dppmarkinmale15 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $dppmarkinmale16 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');

             echo $dppmarkinmalect= $dppmarkinmale12 + $dppmarkinmale13 + $dppmarkinmale14 + $dppmarkinmale15 + $dppmarkinmale16;  ?></td>
            <td><?php echo $dppmarkinmaleinsp + $dppmarkinmalesi + $dppmarkinmaleasi + $dppmarkinmalehc + $dppmarkinmalect;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN FEMALE)</td>
                              <td><?php $dipmarkinfemale1 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      $dipmarkinfemale2 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      echo $dipmarkinfemaleinsp = $dipmarkinfemale1 + $dipmarkinfemale2;  ?></td>
            <td><?php $dipmarkinfemale3 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
            $dipmarkinfemale4 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            $dipmarkinfemale5 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            echo  $dipmarkinfemalesi=  $dipmarkinfemale3 + $dipmarkinfemale4 + $dipmarkinfemale5;
              ?></td>
            <td><?php $dipmarkinfemale6 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                $dipmarkinfemale7 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');  
                $dipmarkinfemale8 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                echo $dipmarkinfemaleasi =  $dipmarkinfemale6 + $dipmarkinfemale7 + $dipmarkinfemale8; 

             ?></td>
            <td><?php $dipmarkinfemale9 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                    $dipmarkinfemale10 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                     $dipmarkinfemale11 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
             echo $dipmarkinfemalehc = $dipmarkinfemale9 +  $dipmarkinfemale10 + $dipmarkinfemale11;  ?></td>
            <td><?php $dipmarkinfemale12 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                       $dipmarkinfemale13 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                        $dipmarkinfemale14 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $dipmarkinfemale15 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $dipmarkinfemale16 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');

             echo $dipmarkinfemalect= $dipmarkinfemale12 + $dipmarkinfemale13 + $dipmarkinfemale14 + $dipmarkinfemale15 + $dipmarkinfemale16;  ?></td>
            <td><?php echo $dipmarkinfemaleinsp + $dipmarkinfemalesi + $dipmarkinfemaleasi + $dipmarkinfemalehc + $dipmarkinfemalect;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>DISTT.POLICE (OTHERS MALE)</td>
                                <td><?php $dispolothmale1 = info_fetch_osireports('INSP','','paone4'); 
                      $dispolothmale2 = info_fetch_osireports('DSP/CR','','paone4'); 
                      echo $dispolothmaleinsp = $dispolothmale1 + $dispolothmale2;  ?></td>
            <td><?php $dispolothmale3 = info_fetch_osireports('SI','','paone4');
            $dispolothmale4 = info_fetch_osireports('INSP/LR','','paone4'); 
            $dispolothmale5 = info_fetch_osireports('INSP/CR','','paone4'); 
            echo $dispolothmalesi=  $dispolothmale3 + $dispolothmale4 + $dispolothmale5;
              ?></td>
          <td><?php $dispolothmale6 = info_fetch_osireports('ASI','','paone4'); 
                $dispolothmale7 = info_fetch_osireports('SI/CR','','paone4');  
                $dispolothmale8 = info_fetch_osireports('SI/LR','','paone4'); 
                echo $dispolothmaleasi = $dispolothmale6 + $dispolothmale7 + $dispolothmale8; 

             ?></td>
            <td><?php $dispolothmale9 = info_fetch_osireports('HC','','paone4');
                    $dispolothmale10 = info_fetch_osireports('ASI/LR','','paone4');
                     $dispolothmale11 = info_fetch_osireports('ASI/CR','','paone4');
             echo $dispolothmalehc= $dispolothmale9 +  $dispolothmale10 + $dispolothmale11;  ?></td>
            <td><?php $dispolothmale12 = info_fetch_osireports('CT','','paone4');
                       $dispolothmale13 = info_fetch_osireports('HC/PR','','paone4');
                        $dispolothmale14 = info_fetch_osireports('HC/LR','','paone4');
                         $dispolothmale15 = info_fetch_osireports('Sr.Const','','paone4');
                         $dispolothmale16 = info_fetch_osireports('C-II','','paone4');

             echo $dispolothmalect=  $dispolothmale12 + $dispolothmale13 + $dispolothmale14 + $dispolothmale15 + $dispolothmale16;  ?></td>
            <td><?php echo $dispolothmaleinsp + $dispolothmalesi + $dispolothmaleasi + $dispolothmalehc + $dispolothmalect;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>DISTT.POLICE (OTHERS FEMALE)</td>
                        <td><?php $dispolothfemale1 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      $dispolothfemale2 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      echo $dispolothfemaleinsp = $dispolothfemale1 + $dispolothfemale2;  ?></td>
            <td><?php $dispolothfemale3 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
            $dispolothfemale4 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            $dispolothfemale5 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            echo $dispolothfemalesi= $dispolothfemale3 + $dispolothfemale4 + $dispolothfemale5;
              ?></td>
            <td><?php $dispolothfemale6 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                $dispolothfemale7 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');  
                $dispolothfemale8 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                echo $dispolothfemaleasi = $dispolothfemale6 + $dispolothfemale7 + $dispolothfemale8; 

             ?></td>
            <td><?php $dispolothfemale9 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                    $holddispolothfemale10 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                     $dispolothfemale11 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
             echo $dispolothfemalehc=  $dispolothfemale9 +  $holddispolothfemale10 + $dispolothfemale11;  ?></td>
            <td><?php $dispolothfemale12 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                       $dispolothfemale13 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                        $dispolothfemale14 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $dispolothfemale15 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $dispolothfemale16 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');

             echo $dispolothfemalect= $dispolothfemale12 + $dispolothfemale13 + $dispolothfemale14 + $dispolothfemale15 + $dispolothfemale16;  ?></td>
            <td><?php echo $dispolothfemaleinsp + $dispolothfemalesi + $dispolothfemaleasi + $dispolothfemalehc + $dispolothfemalect;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>C.P.O ATTACHMENT UNDER 13th BN.</td>
                              <td><?php $cpoattachundertbn1 = info_fetch_osireport('INSP','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      $cpoattachundertbn2 = info_fetch_osireport('DSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      echo $cpoattachundertbninsp = $cpoattachundertbn1 + $cpoattachundertbn2;  ?></td>
            <td><?php $cpoattachundertbn3 = info_fetch_osireport('SI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
            $cpoattachundertbn4 = info_fetch_osireport('INSP/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            $cpoattachundertbn5 = info_fetch_osireport('INSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            echo $cpoattachundertbnsi = $cpoattachundertbn3 + $cpoattachundertbn4 + $cpoattachundertbn5;
              ?></td>
            <td><?php $cpoattachundertbn6 = info_fetch_osireport('ASI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                $cpoattachundertbn7 = info_fetch_osireport('SI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');  
                $cpoattachundertbn8 = info_fetch_osireport('SI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                echo  $cpoattachundertbnasi = $cpoattachundertbn6 + $cpoattachundertbn7 + $cpoattachundertbn8; 


             ?></td>
            <td><?php $cpoattachundertbn9 = info_fetch_osireport('HC','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                    $cpoattachundertbn10 = info_fetch_osireport('ASI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                     $cpoattachundertbn11 = info_fetch_osireport('ASI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
             echo $cpoattachundertbnhc= $cpoattachundertbn9 +  $cpoattachundertbn10 + $cpoattachundertbn11;  ?></td>
            <td><?php $cpoattachundertbn12 = info_fetch_osireport('CT','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                       $cpoattachundertbn13 = info_fetch_osireport('HC/PR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                        $cpoattachundertbn14 = info_fetch_osireport('HC/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $cpoattachundertbn15 = info_fetch_osireport('Sr.Const','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $cpoattachundertbn16 = info_fetch_osireport('C-II','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

             echo $cpoattachundertbnct= $cpoattachundertbn12 + $cpoattachundertbn13 + $cpoattachundertbn14 + $cpoattachundertbn15 + $cpoattachundertbn16;  ?></td>
            <td><?php echo $cpoattachundertbninsp + $cpoattachundertbnsi + $cpoattachundertbnasi + $cpoattachundertbnhc + $cpoattachundertbnct;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>PB.POLICE OFFICE INSTITUTE SEC 32 CHG</td>
                                <td><?php $pbpoloffinstsecttchg1 = info_fetch_osireport('INSP','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      $pbpoloffinstsecttchg2 = info_fetch_osireport('DSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      echo $pbpoloffinstsecttchginsp = $pbpoloffinstsecttchg1 + $pbpoloffinstsecttchg2;  ?></td>
            <td><?php $pbpoloffinstsecttchg3 = info_fetch_osireport('SI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
            $pbpoloffinstsecttchg4 = info_fetch_osireport('INSP/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            $pbpoloffinstsecttchg5 = info_fetch_osireport('INSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            echo  $pbpoloffinstsecttchgsi= $pbpoloffinstsecttchg3 + $pbpoloffinstsecttchg4 + $pbpoloffinstsecttchg5;
              ?></td>
            <td><?php $pbpoloffinstsecttchg6 = info_fetch_osireport('ASI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                $pbpoloffinstsecttchg7 = info_fetch_osireport('SI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');  
                $pbpoloffinstsecttchg8 = info_fetch_osireport('SI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                echo $pbpoloffinstsecttchgasi = $pbpoloffinstsecttchg6 + $pbpoloffinstsecttchg7 + $pbpoloffinstsecttchg8; 

             ?></td>
            <td><?php $pbpoloffinstsecttchg9 = info_fetch_osireport('HC','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                    $pbpoloffinstsecttchg10 = info_fetch_osireport('ASI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                     $pbpoloffinstsecttchg11 = info_fetch_osireport('ASI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
             echo $pbpoloffinstsecttchghc = $pbpoloffinstsecttchg9 +  $pbpoloffinstsecttchg10 + $pbpoloffinstsecttchg11;  ?></td>
            <td><?php $pbpoloffinstsecttchg12 = info_fetch_osireport('CT','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                       $pbpoloffinstsecttchg13 = info_fetch_osireport('HC/PR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                        $pbpoloffinstsecttchg14 = info_fetch_osireport('HC/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $pbpoloffinstsecttchg15 = info_fetch_osireport('Sr.Const','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $pbpoloffinstsecttchg16 = info_fetch_osireport('C-II','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

             echo $pbpoloffinstsecttchgct= $pbpoloffinstsecttchg12 + $pbpoloffinstsecttchg13 + $pbpoloffinstsecttchg14 + $pbpoloffinstsecttchg15 + $pbpoloffinstsecttchg16;  ?></td>
            <td><?php echo $pbpoloffinstsecttchginsp + $pbpoloffinstsecttchgsi + $pbpoloffinstsecttchgasi + $pbpoloffinstsecttchghc + $pbpoloffinstsecttchgct;  ?></td>
                </tr>

                <tr>
                  <td>viii)</td>
                  <td>NRI CELL MOHALI</td>
                                    <td><?php $nricellmohali1 = info_fetch_osireport('INSP','NRI CELL MOHALI','paone8'); 
                      $nricellmohali2 = info_fetch_osireport('DSP/CR','NRI CELL MOHALI','paone8'); 
                      echo $nricellmohaliinsp = $nricellmohali1 + $nricellmohali2;  ?></td>
            <td><?php $nricellmohali3 = info_fetch_osireport('SI','NRI CELL MOHALI','paone8');
            $nricellmohali4 = info_fetch_osireport('INSP/LR','NRI CELL MOHALI','paone8'); 
            $nricellmohali5 = info_fetch_osireport('INSP/CR','NRI CELL MOHALI','paone8'); 
            echo $nricellmohalisi= $nricellmohali3 + $nricellmohali4 + $nricellmohali5;
              ?></td>
            <td><?php $nricellmohali6 = info_fetch_osireport('ASI','NRI CELL MOHALI','paone8'); 
                $nricellmohali7 = info_fetch_osireport('SI/CR','NRI CELL MOHALI','paone8');  
                $nricellmohali8 = info_fetch_osireport('SI/LR','NRI CELL MOHALI','paone8'); 
                echo $nricellmohaliasi =  $nricellmohali6 + $nricellmohali7 + $nricellmohali8; 

             ?></td>
            <td><?php $nricellmohali9 = info_fetch_osireport('HC','NRI CELL MOHALI','paone8');
                    $nricellmohali10 = info_fetch_osireport('ASI/LR','NRI CELL MOHALI','paone8');
                     $nricellmohali11 = info_fetch_osireport('ASI/CR','NRI CELL MOHALI','paone8');
             echo $nricellmohalihc= $nricellmohali9 +  $nricellmohali10 + $nricellmohali11;  ?></td>
            <td><?php $nricellmohali12 = info_fetch_osireport('CT','NRI CELL MOHALI','paone8');
                       $nricellmohali13 = info_fetch_osireport('HC/PR','NRI CELL MOHALI','paone8');
                        $nricellmohali14 = info_fetch_osireport('HC/LR','NRI CELL MOHALI','paone8');
                         $nricellmohali15 = info_fetch_osireport('Sr.Const','NRI CELL MOHALI','paone8');
                         $nricellmohali16 = info_fetch_osireport('C-II','NRI CELL MOHALI','paone8');

             echo $nricellmohalict= $nricellmohali12 + $nricellmohali13 + $nricellmohali14 + $nricellmohali15 + $nricellmohali16;  ?></td>
            <td><?php echo $nricellmohaliinsp + $nricellmohalisi + $nricellmohaliasi + $nricellmohalihc + $nricellmohalict;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>INT. WING</td>
                                <td><?php $intwing1 = info_fetch_osireport('INSP','INTELLIGENCE WING','paone9'); 
                      $intwing2 = info_fetch_osireport('DSP/CR','INTELLIGENCE WING','paone9'); 
                      echo $intwinginsp =  $intwing1 + $intwing2;  ?></td>
            <td><?php $intwing3 = info_fetch_osireport('SI','INTELLIGENCE WING','paone9');
            $intwing4 = info_fetch_osireport('INSP/LR','INTELLIGENCE WING','paone9'); 
            $intwing5 = info_fetch_osireport('INSP/CR','INTELLIGENCE WING','paone9'); 
            echo $intwingsi = $intwing3 + $intwing4 + $intwing5;
              ?></td>
            <td><?php $intwing6 = info_fetch_osireport('ASI','INTELLIGENCE WING','paone9'); 
                $intwing7 = info_fetch_osireport('SI/CR','INTELLIGENCE WING','paone9');  
                $intwing8 = info_fetch_osireport('SI/LR','INTELLIGENCE WING','paone9'); 
                echo $intwingasi = $intwing6 + $intwing7 + $intwing8; 

             ?></td>
            <td><?php $intwing9 = info_fetch_osireport('HC','INTELLIGENCE WING','paone9');
                    $intwing10 = info_fetch_osireport('ASI/LR','INTELLIGENCE WING','paone9');
                     $intwing11 = info_fetch_osireport('ASI/CR','INTELLIGENCE WING','paone9');
             echo $intwinghc=  $intwing9 +  $intwing10 + $intwing11;  ?></td>
            <td><?php $intwing12 = info_fetch_osireport('CT','INTELLIGENCE WING','paone9');
                       $intwing13 = info_fetch_osireport('HC/PR','INTELLIGENCE WING','paone9');
                        $intwing14 = info_fetch_osireport('HC/LR','INTELLIGENCE WING','paone9');
                         $intwing15 = info_fetch_osireport('Sr.Const','INTELLIGENCE WING','paone9');
                         $intwing16 = info_fetch_osireport('C-II','INTELLIGENCE WING','paone9');

             echo  $intwingct = $intwing12 + $intwing13 + $intwing14 + $intwing15 + $intwing16;  ?></td>
            <td><?php echo $intwinginsp + $intwingsi + $intwingasi + $intwinghc + $intwingct;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>CENTRAL POLICE LINE MOHALI</td>
                                <td><?php $centralpollinemohali1 = info_fetch_osireport('INSP','CENTRAL POLICE LINE MOHALI','paone10'); 
                      $centralpollinemohali2 = info_fetch_osireport('DSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
                      echo $centralpollinemohaliinsp = $centralpollinemohali1 + $centralpollinemohali2;  ?></td>
            <td><?php $centralpollinemohali3 = info_fetch_osireport('SI','CENTRAL POLICE LINE MOHALI','paone10');
            $centralpollinemohali4 = info_fetch_osireport('INSP/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
            $centralpollinemohali5 = info_fetch_osireport('INSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
            echo $centralpollinemohalisi =$centralpollinemohali3 + $centralpollinemohali4 + $centralpollinemohali5;
              ?></td>
            <td><?php $centralpollinemohali6 = info_fetch_osireport('ASI','CENTRAL POLICE LINE MOHALI','paone10'); 
                $centralpollinemohali7 = info_fetch_osireport('SI/CR','CENTRAL POLICE LINE MOHALI','paone10');  
                $centralpollinemohali8 = info_fetch_osireport('SI/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
                echo $centralpollinemohaliasi = $centralpollinemohali6 + $centralpollinemohali7 + $centralpollinemohali8; 

             ?></td>
            <td><?php $centralpollinemohali9 = info_fetch_osireport('HC','CENTRAL POLICE LINE MOHALI','paone10');
                    $centralpollinemohali10 = info_fetch_osireport('ASI/LR','CENTRAL POLICE LINE MOHALI','paone10');
                     $centralpollinemohali11 = info_fetch_osireport('ASI/CR','CENTRAL POLICE LINE MOHALI','paone10');
             echo  $centralpollinemohalihc = $centralpollinemohali9 +  $centralpollinemohali10 + $centralpollinemohali11;  ?></td>
            <td><?php $centralpollinemohali12 = info_fetch_osireport('CT','CENTRAL POLICE LINE MOHALI','paone10');
                       $centralpollinemohali13 = info_fetch_osireport('HC/PR','CENTRAL POLICE LINE MOHALI','paone10');
                        $centralpollinemohali14 = info_fetch_osireport('HC/LR','CENTRAL POLICE LINE MOHALI','paone10');
                         $centralpollinemohali15 = info_fetch_osireport('Sr.Const','CENTRAL POLICE LINE MOHALI','paone10');
                         $centralpollinemohali16 = info_fetch_osireport('C-II','CENTRAL POLICE LINE MOHALI','paone10');

             echo $centralpollinemohalict=  $centralpollinemohali12 + $centralpollinemohali13 + $centralpollinemohali14 + $centralpollinemohali15 + $centralpollinemohali16;  ?></td>
            <td><?php echo $centralpollinemohaliinsp + $centralpollinemohalisi + $centralpollinemohaliasi + $centralpollinemohalihc + $centralpollinemohalict;  ?></td>
                </tr>

                <tr>
                  <td>xi)</td>
                  <td>VIG.BUREAU</td>
                               <td><?php $vigbureau1 = info_fetch_osireport('INSP','VIGILANCE BUREAU','paone11'); 
                      $vigbureau2 = info_fetch_osireport('DSP/CR','VIGILANCE BUREAU','paone11'); 
                      echo $vigbureauinsp = $vigbureau1 + $vigbureau2;  ?></td>
            <td><?php $vigbureau3 = info_fetch_osireport('SI','VIGILANCE BUREAU','paone11');
            $vigbureau4 = info_fetch_osireport('INSP/LR','VIGILANCE BUREAU','paone11'); 
            $vigbureau5 = info_fetch_osireport('INSP/CR','VIGILANCE BUREAU','paone11'); 
            echo $vigbureausi = $vigbureau3 + $vigbureau4 + $vigbureau5;
              ?></td>
            <td><?php $vigbureau6 = info_fetch_osireport('ASI','VIGILANCE BUREAU','paone11'); 
                $vigbureau7 = info_fetch_osireport('SI/CR','VIGILANCE BUREAU','paone11');  
                $vigbureau8 = info_fetch_osireport('SI/LR','VIGILANCE BUREAU','paone11'); 
                echo $vigbureauasi = $vigbureau6 + $vigbureau7 + $vigbureau8; 

             ?></td>
            <td><?php $vigbureau9 = info_fetch_osireport('HC','VIGILANCE BUREAU','paone11');
                    $vigbureau10 = info_fetch_osireport('ASI/LR','VIGILANCE BUREAU','paone11');
                     $vigbureau11 = info_fetch_osireport('ASI/CR','VIGILANCE BUREAU','paone11');
             echo $vigbureauhc =  $vigbureau9 +  $vigbureau10 + $vigbureau11;  ?></td>
            <td><?php $vigbureau12 = info_fetch_osireport('CT','VIGILANCE BUREAU','paone11');
                       $vigbureau13 = info_fetch_osireport('HC/PR','VIGILANCE BUREAU','paone11');
                        $vigbureau14 = info_fetch_osireport('HC/LR','VIGILANCE BUREAU','paone11');
                         $vigbureau15 = info_fetch_osireport('Sr.Const','VIGILANCE BUREAU','paone11');
                         $vigbureau16 = info_fetch_osireport('C-II','VIGILANCE BUREAU','paone11');

             echo $vigbureauct=  $vigbureau12 + $vigbureau13 + $vigbureau14 + $vigbureau15 + $vigbureau16;  ?></td>
            <td><?php echo $vigbureauinsp + $vigbureausi + $vigbureauasi + $vigbureauhc + $vigbureauct;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>SNCB</td>
                              <td><?php $sbcb1 = info_fetch_osireport('INSP','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      $sbcb2 = info_fetch_osireport('DSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      echo $sbcbinsp = $sbcb1 + $sbcb2;  ?></td>
            <td><?php $sbcb3 = info_fetch_osireport('SI','STATE NARCOTIC CRIME BUREAU','paone12');
            $sbcb4 = info_fetch_osireport('INSP/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            $sbcb5 = info_fetch_osireport('INSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            echo $sbcbsi = $sbcb3 + $sbcb4 + $sbcb5;
              ?></td>
            <td><?php $sbcb6 = info_fetch_osireport('ASI','STATE NARCOTIC CRIME BUREAU','paone12'); 
                $sbcb7 = info_fetch_osireport('SI/CR','STATE NARCOTIC CRIME BUREAU','paone12');  
                $sbcb8 = info_fetch_osireport('SI/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                echo $sbcbasi = $sbcb6 + $sbcb7 + $sbcb8; 

             ?></td>
            <td><?php $sbcb9 = info_fetch_osireport('HC','STATE NARCOTIC CRIME BUREAU','paone12');
                    $sbcb10 = info_fetch_osireport('ASI/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                     $sbcb11 = info_fetch_osireport('ASI/CR','STATE NARCOTIC CRIME BUREAU','paone12');
             echo $sbcbhc = $sbcb9 +  $sbcb10 + $sbcb11;  ?></td>
            <td><?php $sbcb12 = info_fetch_osireport('CT','STATE NARCOTIC CRIME BUREAU','paone12');
                       $sbcb13 = info_fetch_osireport('HC/PR','STATE NARCOTIC CRIME BUREAU','paone12');
                        $sbcb14 = info_fetch_osireport('HC/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                         $sbcb15 = info_fetch_osireport('Sr.Const','STATE NARCOTIC CRIME BUREAU','paone12');
                         $sbcb16 = info_fetch_osireport('C-II','STATE NARCOTIC CRIME BUREAU','paone12');

             echo $sbcbct= $sbcb12 + $sbcb13 + $sbcb14 + $sbcb15 + $sbcb16;  ?></td>
            <td><?php echo $sbcbinsp + $sbcbsi + $sbcbasi + $sbcbhc + $sbcbct;  ?></td>
                </tr>

                <tr>
                  <td>xiii)</td>
                  <td>MOHALI AIRPORT IMMIGRATION DUTY</td>
                               <td><?php $mairimmduty1 = info_fetch_osireport('INSP','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      $mairimmduty2 = info_fetch_osireport('DSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      echo $mairimmdutyinsp = $mairimmduty1 + $mairimmduty2;  ?></td>
            <td><?php $mairimmduty3 = info_fetch_osireport('SI','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
            $mairimmduty4 = info_fetch_osireport('INSP/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            $mairimmduty5 = info_fetch_osireport('INSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            echo $mairimmdutysi = $mairimmduty3 + $mairimmduty4 + $mairimmduty5;
              ?></td>
            <td><?php $mairimmduty6 = info_fetch_osireport('ASI','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                $mairimmduty7 = info_fetch_osireport('SI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');  
                $mairimmduty8 = info_fetch_osireport('SI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                echo $mairimmdutyasi = $mairimmduty6 + $mairimmduty7 + $mairimmduty8; 

             ?></td>
            <td><?php $mairimmduty9 = info_fetch_osireport('HC','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                    $mairimmduty10 = info_fetch_osireport('ASI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                     $mairimmduty11 = info_fetch_osireport('ASI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
             echo $mairimmdutyhc = $mairimmduty9 +  $mairimmduty10 + $mairimmduty11;  ?></td>
            <td><?php $mairimmduty12 = info_fetch_osireport('CT','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                       $mairimmduty13 = info_fetch_osireport('HC/PR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                        $mairimmduty14 = info_fetch_osireport('HC/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $mairimmduty15 = info_fetch_osireport('Sr.Const','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $mairimmduty16 = info_fetch_osireport('C-II','MOHALI AIRPORT IMMIGRATION DUTY','paone13');

             echo $mairimmdutyct = $mairimmduty12 + $mairimmduty13 + $mairimmduty14 + $mairimmduty15 + $mairimmduty16;  ?></td>
            <td><?php echo $mairimmdutyinsp + $mairimmdutysi + $mairimmdutyasi + $mairimmdutyhc + $mairimmdutyct;  ?></td>
                </tr>

                <tr>
                  <td>xiv)</td>
                  <td>P.H.R.C.</td>
                               <td><?php $phrc1 = info_fetch_osireport('INSP','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      $phrc2 = info_fetch_osireport('DSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      echo $phrcinsp = $phrc1 + $phrc2;  ?></td>
            <td><?php $phrc3 = info_fetch_osireport('SI','STATE HUMAN RIGHTS COMMISSION','paone14');
            $phrc4 = info_fetch_osireport('INSP/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            $phrc5 = info_fetch_osireport('INSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            echo $phrcsi = $phrc3 + $phrc4 + $phrc5;
              ?></td>
            <td><?php $phrc6 = info_fetch_osireport('ASI','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                $phrc7 = info_fetch_osireport('SI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');  
                $phrc8 = info_fetch_osireport('SI/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                echo $phrcasi = $phrc6 + $phrc7 + $phrc8; 

             ?></td>
            <td><?php $phrc9 = info_fetch_osireport('HC','STATE HUMAN RIGHTS COMMISSION','paone14');
                    $phrc10 = info_fetch_osireport('ASI/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                     $phrc11 = info_fetch_osireport('ASI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');
             echo $phrchc = $phrc9 +  $phrc10 + $phrc11;  ?></td>

            <td><?php $phrc12 = info_fetch_osireport('CT','STATE HUMAN RIGHTS COMMISSION','paone14');
                       $phrc13 = info_fetch_osireport('HC/PR','STATE HUMAN RIGHTS COMMISSION','paone14');
                        $phrc14 = info_fetch_osireport('HC/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $phrc15 = info_fetch_osireport('Sr.Const','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $phrc16 = info_fetch_osireport('C-II','STATE HUMAN RIGHTS COMMISSION','paone14');

             echo $phrcct= $phrc12 + $phrc13 + $phrc14 + $phrc15 + $phrc16;  ?></td>
            <td><?php echo $phrcinsp + $phrcsi + $phrcasi + $phrchc + $phrcct;  ?></td>
                </tr>

                <tr>
                  <td>xv)</td>
                  <td>BUREAU OF INVESTIGATION</td>
                            <td><?php $burofinvestigation1 = info_fetch_osireport('INSP','BUREAU OF INVESTIGATION','paone15'); 
                      $burofinvestigation2 = info_fetch_osireport('DSP/CR','BUREAU OF INVESTIGATION','paone15'); 
                      echo $burofinvestigationinsp = $burofinvestigation1 + $burofinvestigation2;  ?></td>
            <td><?php $burofinvestigation3 = info_fetch_osireport('SI','BUREAU OF INVESTIGATION','paone15');
            $burofinvestigation4 = info_fetch_osireport('INSP/LR','BUREAU OF INVESTIGATION','paone15'); 
            $burofinvestigation5 = info_fetch_osireport('INSP/CR','BUREAU OF INVESTIGATION','paone15'); 
            echo $burofinvestigationsi = $burofinvestigation3 + $burofinvestigation4 + $burofinvestigation5;
              ?></td>
            <td><?php $burofinvestigation6 = info_fetch_osireport('ASI','BUREAU OF INVESTIGATION','paone15'); 
                $burofinvestigation7 = info_fetch_osireport('SI/CR','BUREAU OF INVESTIGATION','paone15');  
                $burofinvestigation8 = info_fetch_osireport('SI/LR','BUREAU OF INVESTIGATION','paone15'); 
                echo $burofinvestigationasi = $burofinvestigation6 + $burofinvestigation7 + $burofinvestigation8; 

             ?></td>
            <td><?php $burofinvestigation9 = info_fetch_osireport('HC','BUREAU OF INVESTIGATION','paone15');
                    $burofinvestigation10 = info_fetch_osireport('ASI/LR','BUREAU OF INVESTIGATION','paone15');
                     $burofinvestigation11 = info_fetch_osireport('ASI/CR','BUREAU OF INVESTIGATION','paone15');
             echo $burofinvestigationhc = $burofinvestigation9 +  $burofinvestigation10 + $burofinvestigation11;  ?></td>
            <td><?php $burofinvestigation12 = info_fetch_osireport('CT','BUREAU OF INVESTIGATION','paone15');
                       $burofinvestigation13 = info_fetch_osireport('HC/PR','BUREAU OF INVESTIGATION','paone15');
                        $burofinvestigation14 = info_fetch_osireport('HC/LR','BUREAU OF INVESTIGATION','paone15');
                         $burofinvestigation15 = info_fetch_osireport('Sr.Const','BUREAU OF INVESTIGATION','paone15');
                         $burofinvestigation16 = info_fetch_osireport('C-II','BUREAU OF INVESTIGATION','paone15');

             echo $burofinvestigationct= $burofinvestigation12 + $burofinvestigation13 + $burofinvestigation14 + $burofinvestigation15 + $burofinvestigation16;  ?></td>
            <td><?php echo $burofinvestigationinsp + $burofinvestigationsi + $burofinvestigationasi + $burofinvestigationhc + $burofinvestigationct;  ?></td>
                </tr>
                          <tr>
                  <td>xvi)</td>
                  <td>SPECIAL TASK FORCE(STF)</td>
                    <td><?php $spectaskforcestf1 = info_fetch_osireport('INSP','SPECIAL TASK FORCE(STF)','paone23'); 
                      $spectaskforcestf2 = info_fetch_osireport('DSP/CR','SPECIAL TASK FORCE(STF)','paone23'); 
                      echo $spectaskforcestfinsp =  $spectaskforcestf1 + $spectaskforcestf2;  ?></td>
            <td><?php $spectaskforcestf3 = info_fetch_osireport('SI','SPECIAL TASK FORCE(STF)','paone23');
            $spectaskforcestf4 = info_fetch_osireport('INSP/LR','SPECIAL TASK FORCE(STF)','paone23'); 
            $spectaskforcestf5 = info_fetch_osireport('INSP/CR','SPECIAL TASK FORCE(STF)','paone23'); 
            echo $spectaskforcestfsi = $spectaskforcestf3 + $spectaskforcestf4 + $spectaskforcestf5;
              ?></td>
            <td><?php $spectaskforcestf6 = info_fetch_osireport('ASI','SPECIAL TASK FORCE(STF)','paone23'); 
                $spectaskforcestf7 = info_fetch_osireport('SI/CR','SPECIAL TASK FORCE(STF)','paone23');  
                $spectaskforcestf8 = info_fetch_osireport('SI/LR','SPECIAL TASK FORCE(STF)','paone23'); 
                echo $spectaskforcestfasi = $spectaskforcestf6 + $spectaskforcestf7 + $spectaskforcestf8; 

             ?></td>
            <td><?php $spectaskforcestf9 = info_fetch_osireport('HC','SPECIAL TASK FORCE(STF)','paone23');
                    $spectaskforcestf10 = info_fetch_osireport('ASI/LR','SPECIAL TASK FORCE(STF)','paone23');
                     $spectaskforcestf11 = info_fetch_osireport('ASI/CR','SPECIAL TASK FORCE(STF)','paone23');
             echo $spectaskforcestfhc =  $spectaskforcestf9 +  $spectaskforcestf10 + $spectaskforcestf11;  ?></td>
            <td><?php $spectaskforcestf12 = info_fetch_osireport('CT','SPECIAL TASK FORCE(STF)','paone23');
                       $spectaskforcestf13 = info_fetch_osireport('HC/PR','SPECIAL TASK FORCE(STF)','paone23');
                        $spectaskforcestf14 = info_fetch_osireport('HC/LR','SPECIAL TASK FORCE(STF)','paone23');
                         $spectaskforcestf15 = info_fetch_osireport('Sr.Const','SPECIAL TASK FORCE(STF)','paone23');
                         $spectaskforcestf16 = info_fetch_osireport('C-II','SPECIAL TASK FORCE(STF)','paone23');

             echo $spectaskforcestfct=  $spectaskforcestf12 + $spectaskforcestf13 + $spectaskforcestf14 + $spectaskforcestf15 + $spectaskforcestf16;  ?></td>
            <td><?php echo $spectaskforcestfinsp + $spectaskforcestfsi + $spectaskforcestfasi + $spectaskforcestfhc + $spectaskforcestfct;  ?></td>
                </tr>
                          <tr>
                  <td>xvi)</td>
                  <td>PPSSOC</td>
                    <td><?php $ppssoc1 = info_fetch_osireport('INSP','PPSSOC','paone24'); 
                      $ppssoc2 = info_fetch_osireport('DSP/CR','PPSSOC','paone24'); 
                      echo $ppssocinsp =  $ppssoc1 + $ppssoc2;  ?></td>
            <td><?php $ppssoc3 = info_fetch_osireport('SI','PPSSOC','paone24');
            $ppssoc4 = info_fetch_osireport('INSP/LR','PPSSOC','paone24'); 
            $ppssoc5 = info_fetch_osireport('INSP/CR','PPSSOC','paone24'); 
            echo $ppssocsi = $ppssoc3 + $ppssoc4 + $ppssoc5;
              ?></td>
            <td><?php $ppssoc6 = info_fetch_osireport('ASI','PPSSOC','paone24'); 
                $ppssoc7 = info_fetch_osireport('SI/CR','PPSSOC','paone24');  
                $ppssoc8 = info_fetch_osireport('SI/LR','PPSSOC','paone24'); 
                echo $ppssocasi = $ppssoc6 + $ppssoc7 + $ppssoc8; 

             ?></td>
            <td><?php $ppssoc9 = info_fetch_osireport('HC','PPSSOC','paone24');
                    $ppssoc10 = info_fetch_osireport('ASI/LR','PPSSOC','paone24');
                     $ppssoc11 = info_fetch_osireport('ASI/CR','PPSSOC','paone24');
             echo $ppssochc =  $ppssoc9 +  $ppssoc10 + $ppssoc11;  ?></td>
            <td><?php $ppssoc12 = info_fetch_osireport('CT','PPSSOC','paone24');
                       $ppssoc13 = info_fetch_osireport('HC/PR','PPSSOC','paone24');
                        $ppssoc14 = info_fetch_osireport('HC/LR','PPSSOC','paone24');
                         $ppssoc15 = info_fetch_osireport('Sr.Const','PPSSOC','paone24');
                         $ppssoc16 = info_fetch_osireport('C-II','PPSSOC','paone24');

             echo $ppssocct=  $ppssoc12 + $ppssoc13 + $ppssoc14 + $ppssoc15 + $ppssoc16;  ?></td>
            <td><?php echo $ppssocinsp + $ppssocsi + $ppssocasi + $ppssochc + $ppssocct;  ?></td>
                </tr>




                <tr>
                  <td>xvi)</td>
                  <td>RTC/PAP JALANDHAR</td>
                    <td><?php $rtcpapjal1 = info_fetch_osireport('INSP','RTC/PAP, JALANDHAR','paone16'); 
                      $rtcpapjal2 = info_fetch_osireport('DSP/CR','RTC/PAP, JALANDHAR','paone16'); 
                      echo $rtcpapjalinsp =  $rtcpapjal1 + $rtcpapjal2;  ?></td>
            <td><?php $rtcpapjal3 = info_fetch_osireport('SI','RTC/PAP, JALANDHAR','paone16');
            $rtcpapjal4 = info_fetch_osireport('INSP/LR','RTC/PAP, JALANDHAR','paone16'); 
            $rtcpapjal5 = info_fetch_osireport('INSP/CR','RTC/PAP, JALANDHAR','paone16'); 
            echo $rtcpapjalsi = $rtcpapjal3 + $rtcpapjal4 + $rtcpapjal5;
              ?></td>
            <td><?php $rtcpapjal6 = info_fetch_osireport('ASI','RTC/PAP, JALANDHAR','paone16'); 
                $rtcpapjal7 = info_fetch_osireport('SI/CR','RTC/PAP, JALANDHAR','paone16');  
                $rtcpapjal8 = info_fetch_osireport('SI/LR','RTC/PAP, JALANDHAR','paone16'); 
                echo $rtcpapjalasi = $rtcpapjal6 + $rtcpapjal7 + $rtcpapjal8; 

             ?></td>
            <td><?php $rtcpapjal9 = info_fetch_osireport('HC','RTC/PAP, JALANDHAR','paone16');
                    $rtcpapjal10 = info_fetch_osireport('ASI/LR','RTC/PAP, JALANDHAR','paone16');
                     $rtcpapjal11 = info_fetch_osireport('ASI/CR','RTC/PAP, JALANDHAR','paone16');
             echo $rtcpapjalhc =  $rtcpapjal9 +  $rtcpapjal10 + $rtcpapjal11;  ?></td>
            <td><?php $rtcpapjal12 = info_fetch_osireport('CT','RTC/PAP, JALANDHAR','paone16');
                       $rtcpapjal13 = info_fetch_osireport('HC/PR','RTC/PAP, JALANDHAR','paone16');
                        $rtcpapjal14 = info_fetch_osireport('HC/LR','RTC/PAP, JALANDHAR','paone16');
                         $rtcpapjal15 = info_fetch_osireport('Sr.Const','RTC/PAP, JALANDHAR','paone16');
                         $rtcpapjal16 = info_fetch_osireport('C-II','RTC/PAP, JALANDHAR','paone16');

             echo $rtcpapjalct =  $rtcpapjal12 + $rtcpapjal13 + $rtcpapjal14 + $rtcpapjal15 + $rtcpapjal16;  ?></td>
            <td><?php echo $rtcpapjalinsp + $rtcpapjalsi + $rtcpapjalasi + $rtcpapjalhc + $rtcpapjalct;  ?></td>
                </tr>

                <tr>
                  <td>xvii)</td>
                  <td>ISTC/PAP KAPURTHALA</td>
                    <td><?php $istcpapkap1 = info_fetch_osireport('INSP','ISTC/PAP, KAPURTHALA','paone17'); 
                      $istcpapkap2 = info_fetch_osireport('DSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
                      echo $istcpapkapinsp = $istcpapkap1 + $istcpapkap2;  ?></td>
            <td><?php $istcpapkap3 = info_fetch_osireport('SI','ISTC/PAP, KAPURTHALA','paone17');
            $istcpapkap4 = info_fetch_osireport('INSP/LR','ISTC/PAP, KAPURTHALA','paone17'); 
            $istcpapkap5 = info_fetch_osireport('INSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
            echo $istcpapkapsi = $istcpapkap3 + $istcpapkap4 + $istcpapkap5;
              ?></td>
            <td><?php $istcpapkap6 = info_fetch_osireport('ASI','ISTC/PAP, KAPURTHALA','paone17'); 
                $istcpapkap7 = info_fetch_osireport('SI/CR','ISTC/PAP, KAPURTHALA','paone17');  
                $istcpapkap8 = info_fetch_osireport('SI/LR','ISTC/PAP, KAPURTHALA','paone17'); 
                echo $istcpapkapasi =  $istcpapkap6 + $istcpapkap7 + $istcpapkap8; 

             ?></td>
            <td><?php $istcpapkap9 = info_fetch_osireport('HC','ISTC/PAP, KAPURTHALA','paone17');
                    $istcpapkap10 = info_fetch_osireport('ASI/LR','ISTC/PAP, KAPURTHALA','paone17');
                     $istcpapkap11 = info_fetch_osireport('ASI/CR','ISTC/PAP, KAPURTHALA','paone17');
             echo $istcpapkaphc = $istcpapkap9 +  $istcpapkap10 + $istcpapkap11;  ?></td>
            <td><?php $istcpapkap12 = info_fetch_osireport('CT','ISTC/PAP, KAPURTHALA','paone17');
                       $istcpapkap13 = info_fetch_osireport('HC/PR','ISTC/PAP, KAPURTHALA','paone17');
                        $istcpapkap14 = info_fetch_osireport('HC/LR','ISTC/PAP, KAPURTHALA','paone17');
                         $istcpapkap15 = info_fetch_osireport('Sr.Const','ISTC/PAP, KAPURTHALA','paone17');
                         $istcpapkap16 = info_fetch_osireport('C-II','ISTC/PAP, KAPURTHALA','paone17');

             echo $istcpapkapct =  $istcpapkap12 + $istcpapkap13 + $istcpapkap14 + $istcpapkap15 + $istcpapkap16;  ?></td>
            <td><?php echo $istcpapkapinsp + $istcpapkapsi + $istcpapkapasi + $istcpapkaphc + $istcpapkapct;  ?></td>
              
                </tr>

                      <tr>
                  <td>  </td>
                  <td>A) DRILL STAFF</td>
                             <td><?php $drillstaff1 = info_fetch_osireport('INSP','Drill Staff','paone17'); 
                      $drillstaff2 = info_fetch_osireport('DSP/CR','Drill Staff','paone17'); 
                      echo $drillstaffinsp = $drillstaff1 + $drillstaff2;  ?></td>
            <td><?php $drillstaff3 = info_fetch_osireport('SI','Drill Staff','paone17');
            $drillstaff4 = info_fetch_osireport('INSP/LR','Drill Staff','paone17'); 
            $drillstaff5 = info_fetch_osireport('INSP/CR','Drill Staff','paone17'); 
            echo $drillstaffsi = $drillstaff3 + $drillstaff4 + $drillstaff5;
              ?></td>
            <td><?php $drillstaff6 = info_fetch_osireport('ASI','Drill Staff','paone17'); 
                $drillstaff7 = info_fetch_osireport('SI/CR','Drill Staff','paone17');  
                $drillstaff8 = info_fetch_osireport('SI/LR','Drill Staff','paone17'); 
                echo $drillstaffasi =  $drillstaff6 + $drillstaff7 + $drillstaff8; 

             ?></td>
            <td><?php $drillstaff9 = info_fetch_osireport('HC','Drill Staff','paone17');
                    $drillstaff10 = info_fetch_osireport('ASI/LR','Drill Staff','paone17');
                     $drillstaff11 = info_fetch_osireport('ASI/CR','Drill Staff','paone17');
             echo $drillstaffhc= $drillstaff9 +  $drillstaff10 + $drillstaff11;  ?></td>
            <td><?php $drillstaff12 = info_fetch_osireport('CT','Drill Staff','paone17');
                       $drillstaff13 = info_fetch_osireport('HC/PR','Drill Staff','paone17');
                        $drillstaff14 = info_fetch_osireport('HC/LR','Drill Staff','paone17');
                         $drillstaff15 = info_fetch_osireport('Sr.Const','Drill Staff','paone17');
                         $drillstaff16 = info_fetch_osireport('C-II','Drill Staff','paone17');

             echo $drillstaffct=  $drillstaff12 + $drillstaff13 + $drillstaff14 + $drillstaff15 + $drillstaff16;  ?></td>
            <td><?php echo $drillstaffinsp + $drillstaffsi + $drillstaffasi + $drillstaffhc + $drillstaffct;  ?></td>
              
                </tr>

                  <tr>
                  <td>   </td>
                  <td>B) LAW STAFF</td>
                             <td><?php $lawstaff1 = info_fetch_osireport('INSP','Law Staff','paone17'); 
                      $lawstaff2 = info_fetch_osireport('DSP/CR','Law Staff','paone17'); 
                      echo $lawstaffinsp = $lawstaff1 + $lawstaff2;  ?></td>
            <td><?php $lawstaff3 = info_fetch_osireport('SI','Law Staff','paone17');
            $lawstaff4 = info_fetch_osireport('INSP/LR','Law Staff','paone17'); 
            $lawstaff5 = info_fetch_osireport('INSP/CR','Law Staff','paone17'); 
            echo $lawstaffsi = $lawstaff3 + $lawstaff4 + $lawstaff5;
              ?></td>
            <td><?php $lawstaff6 = info_fetch_osireport('ASI','Law Staff','paone17'); 
                $lawstaff7 = info_fetch_osireport('SI/CR','Law Staff','paone17');  
                $lawstaff8 = info_fetch_osireport('SI/LR','Law Staff','paone17'); 
                echo $lawstaffasi =  $lawstaff6 + $lawstaff7 + $lawstaff8; 

             ?></td>
            <td><?php $lawstaff9 = info_fetch_osireport('HC','Law Staff','paone17');
                    $lawstaff10 = info_fetch_osireport('ASI/LR','Law Staff','paone17');
                     $lawstaff11 = info_fetch_osireport('ASI/CR','Law Staff','paone17');
             echo $lawstaffhc= $lawstaff9 +  $lawstaff10 + $lawstaff11;  ?></td>
            <td><?php $lawstaff12 = info_fetch_osireport('CT','Law Staff','paone17');
                       $lawstaff13 = info_fetch_osireport('HC/PR','Law Staff','paone17');
                        $lawstaff14 = info_fetch_osireport('HC/LR','Law Staff','paone17');
                         $lawstaff15 = info_fetch_osireport('Sr.Const','Law Staff','paone17');
                         $lawstaff16 = info_fetch_osireport('C-II','Law Staff','paone17');

             echo $lawstaffct=  $lawstaff12 + $lawstaff13 + $lawstaff14 + $lawstaff15 + $lawstaff16;  ?></td>
            <td><?php echo $lawstaffinsp + $lawstaffsi + $lawstaffasi + $lawstaffhc + $lawstaffct;  ?></td>
              
                </tr>

            

                <tr>
                  <td>xviii)</td>
                  <td>PCTS BHG. PATIALA</td>
                              <td><?php $pctsbhgpatiala1 = info_fetch_osireport('INSP','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      $pctsbhgpatiala2 = info_fetch_osireport('DSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      echo $pctsbhgpatialainsp = $pctsbhgpatiala1 + $pctsbhgpatiala2;  ?></td>
            <td><?php $pctsbhgpatiala3 = info_fetch_osireport('SI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
            $pctsbhgpatiala4 = info_fetch_osireport('INSP/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            $pctsbhgpatiala5 = info_fetch_osireport('INSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            echo $pctsbhgpatialasi =  $pctsbhgpatiala3 + $pctsbhgpatiala4 + $pctsbhgpatiala5;
              ?></td>
            <td><?php $pctsbhgpatiala6 = info_fetch_osireport('ASI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                $pctsbhgpatiala7 = info_fetch_osireport('SI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');  
                $pctsbhgpatiala8 = info_fetch_osireport('SI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                echo $pctsbhgpatialaasi =  $pctsbhgpatiala6 + $pctsbhgpatiala7 + $pctsbhgpatiala8; 

             ?></td>
            <td><?php $pctsbhgpatiala9 = info_fetch_osireport('HC','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                    $pctsbhgpatiala10 = info_fetch_osireport('ASI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                     $pctsbhgpatiala11 = info_fetch_osireport('ASI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
             echo $pctsbhgpatialahc =  $pctsbhgpatiala9 +  $pctsbhgpatiala10 + $pctsbhgpatiala11;  ?></td>
            <td><?php $pctsbhgpatiala12 = info_fetch_osireport('CT','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                       $pctsbhgpatiala13 = info_fetch_osireport('HC/PR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                        $pctsbhgpatiala14 = info_fetch_osireport('HC/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $pctsbhgpatiala15 = info_fetch_osireport('Sr.Const','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $pctsbhgpatiala16 = info_fetch_osireport('C-II','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');

             echo $pctsbhgpatialact =  $pctsbhgpatiala12 + $pctsbhgpatiala13 + $pctsbhgpatiala14 + $pctsbhgpatiala15 + $pctsbhgpatiala16;  ?></td>
            <td><?php echo $pctsbhgpatialainsp + $pctsbhgpatialasi + $pctsbhgpatialaasi + $pctsbhgpatialahc + $pctsbhgpatialact;  ?></td>
                </tr>

                <tr>
                  <td>xix)</td>
                  <td>RTC LADDA KOTHI SANGRUR</td>
                              <td><?php $rtcladdakithisangrur1 = info_fetch_osireport('INSP','RTC LADDA KOTHI SANGRUR','paone19'); 
                      $rtcladdakithisangrur2 = info_fetch_osireport('DSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
                      echo $rtcladdakithisangrurinsp =  $rtcladdakithisangrur1 + $rtcladdakithisangrur2;  ?></td>
            <td><?php $rtcladdakithisangrur3 = info_fetch_osireport('SI','RTC LADDA KOTHI SANGRUR','paone19');
            $rtcladdakithisangrur4 = info_fetch_osireport('INSP/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
            $rtcladdakithisangrur5 = info_fetch_osireport('INSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
            echo $rtcladdakithisangrursi =  $rtcladdakithisangrur3 + $rtcladdakithisangrur4 + $rtcladdakithisangrur5;
              ?></td>
            <td><?php $rtcladdakithisangrur6 = info_fetch_osireport('ASI','RTC LADDA KOTHI SANGRUR','paone19'); 
                $rtcladdakithisangrur7 = info_fetch_osireport('SI/CR','RTC LADDA KOTHI SANGRUR','paone19');  
                $rtcladdakithisangrur8 = info_fetch_osireport('SI/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
                echo $rtcladdakithisangrurasi =  $rtcladdakithisangrur6 + $rtcladdakithisangrur7 + $rtcladdakithisangrur8; 
             ?></td>
            <td><?php $rtcladdakithisangrur9 = info_fetch_osireport('HC','RTC LADDA KOTHI SANGRUR','paone19');
                    $rtcladdakithisangrur10 = info_fetch_osireport('ASI/LR','RTC LADDA KOTHI SANGRUR','paone19');
                     $rtcladdakithisangrur11 = info_fetch_osireport('ASI/CR','RTC LADDA KOTHI SANGRUR','paone19');
             echo $rtcladdakithisangrurhc= $rtcladdakithisangrur9 +  $rtcladdakithisangrur10 + $rtcladdakithisangrur11;  ?></td>
            <td><?php $rtcladdakithisangrur12 = info_fetch_osireport('CT','RTC LADDA KOTHI SANGRUR','paone19');
                       $rtcladdakithisangrur13 = info_fetch_osireport('HC/PR','RTC LADDA KOTHI SANGRUR','paone19');
                        $rtcladdakithisangrur14 = info_fetch_osireport('HC/LR','RTC LADDA KOTHI SANGRUR','paone19');
                         $rtcladdakithisangrur15 = info_fetch_osireport('Sr.Const','RTC LADDA KOTHI SANGRUR','paone19');
                         $rtcladdakithisangrur16 = info_fetch_osireport('C-II','RTC LADDA KOTHI SANGRUR','paone19');

             echo $rtcladdakithisangrurct= $rtcladdakithisangrur12 + $rtcladdakithisangrur13 + $rtcladdakithisangrur14 + $rtcladdakithisangrur15 + $rtcladdakithisangrur16;  ?></td>
            <td><?php echo $rtcladdakithisangrurinsp + $rtcladdakithisangrursi + $rtcladdakithisangrurasi + $rtcladdakithisangrurhc + $rtcladdakithisangrurct;  ?></td>
                </tr>



                <tr>
                  <td>xx)</td>
                  <td>PPA PHILLAUR </td>
                               <td><?php $ppaphillaur1 = info_fetch_osireport('INSP','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      $ppaphillaur2 = info_fetch_osireport('DSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      echo $ppaphillaurinsp = $ppaphillaur1 + $ppaphillaur2;  ?></td>
            <td><?php $ppaphillaur3 = info_fetch_osireport('SI','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
            $ppaphillaur4 = info_fetch_osireport('INSP/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            $ppaphillaur5 = info_fetch_osireport('INSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            echo $ppaphillaursi = $ppaphillaur3 + $ppaphillaur4 + $ppaphillaur5;
              ?></td>
            <td><?php $ppaphillaur6 = info_fetch_osireport('ASI','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                $ppaphillaur7 = info_fetch_osireport('SI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');  
                $ppaphillaur8 = info_fetch_osireport('SI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                echo $ppaphillaurasi =  $ppaphillaur6 + $ppaphillaur7 + $ppaphillaur8; 

             ?></td>
            <td><?php $ppaphillaur9 = info_fetch_osireport('HC','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                    $ppaphillaur10 = info_fetch_osireport('ASI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                     $ppaphillaur11 = info_fetch_osireport('ASI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
             echo $ppaphillaurhc =  $ppaphillaur9 +  $ppaphillaur10 + $ppaphillaur11;  ?></td>
            <td><?php $ppaphillaur12 = info_fetch_osireport('CT','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                       $ppaphillaur13 = info_fetch_osireport('HC/PR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                        $ppaphillaur14 = info_fetch_osireport('HC/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $ppaphillaur15 = info_fetch_osireport('Sr.Const','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $ppaphillaur16 = info_fetch_osireport('C-II','PUNJAB POLICE ACADEMY PHILLAUR','paone20');

             echo $ppaphillaurct=  $ppaphillaur12 + $ppaphillaur13 + $ppaphillaur14 + $ppaphillaur15 + $ppaphillaur16;  ?></td>
            <td><?php echo $ppaphillaurinsp + $ppaphillaursi + $ppaphillaurasi + $ppaphillaurhc + $ppaphillaurct;  ?></td>
                </tr>
                <tr>
                  <td>xxi)</td>
                  <td>PRTC/JAHAN KHELAN</td>
                               <td><?php $prtcjahankhelan1 = info_fetch_osireport('INSP','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      $prtcjahankhelan2 = info_fetch_osireport('DSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      echo $prtcjahankhelaninsp =  $prtcjahankhelan1 + $prtcjahankhelan2;  ?></td>
            <td><?php $prtcjahankhelan3 = info_fetch_osireport('SI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
            $prtcjahankhelan4 = info_fetch_osireport('INSP/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            $prtcjahankhelan5 = info_fetch_osireport('INSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            echo $prtcjahankhelansi =  $prtcjahankhelan3 + $prtcjahankhelan4 + $prtcjahankhelan5;
              ?></td>
            <td><?php $prtcjahankhelan6 = info_fetch_osireport('ASI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                $prtcjahankhelan7 = info_fetch_osireport('SI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');  
                $prtcjahankhelan8 = info_fetch_osireport('SI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                echo $prtcjahankhelanasi = $prtcjahankhelan6 + $prtcjahankhelan7 + $prtcjahankhelan8; 

             ?></td>
            <td><?php $prtcjahankhelan9 = info_fetch_osireport('HC','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                    $prtcjahankhelan10 = info_fetch_osireport('ASI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                     $prtcjahankhelan11 = info_fetch_osireport('ASI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
             echo $prtcjahankhelanhc= $prtcjahankhelan9 +  $prtcjahankhelan10 + $prtcjahankhelan11;  ?></td>
            <td><?php $prtcjahankhelan12 = info_fetch_osireport('CT','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                       $prtcjahankhelan13 = info_fetch_osireport('HC/PR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                        $prtcjahankhelan14 = info_fetch_osireport('HC/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $prtcjahankhelan15 = info_fetch_osireport('Sr.Const','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $prtcjahankhelan16 = info_fetch_osireport('C-II','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');

             echo $prtcjahankhelanct=  $prtcjahankhelan12 + $prtcjahankhelan13 + $prtcjahankhelan14 + $prtcjahankhelan15 + $prtcjahankhelan16;  ?></td>
            <td><?php echo $prtcjahankhelaninsp + $prtcjahankhelansi + $prtcjahankhelanasi + $prtcjahankhelanhc + $prtcjahankhelanct;  ?></td>
                </tr>

                 <tr>
                  <td>xxii)</td>
                  <td>ERSS PROJECT DIAL 112</td>
                               <td><?php $erss1 = info_fetch_osireport('INSP','ERSS PROJECT DIAL 112','paone27'); 
                      $erss2 = info_fetch_osireport('DSP/CR','ERSS PROJECT DIAL 112','paone27'); 
                      echo $erssinsp =  $erss1 + $erss2;  ?></td>
            <td><?php $erss3 = info_fetch_osireport('SI','ERSS PROJECT DIAL 112','paone27');
            $erss4 = info_fetch_osireport('INSP/LR','ERSS PROJECT DIAL 112','paone27'); 
            $erss5 = info_fetch_osireport('INSP/CR','ERSS PROJECT DIAL 112','paone27'); 
            echo $ersssi =  $erss3 + $erss4 + $erss5;
              ?></td>
            <td><?php $erss6 = info_fetch_osireport('ASI','ERSS PROJECT DIAL 112','paone27'); 
                $erss7 = info_fetch_osireport('SI/CR','ERSS PROJECT DIAL 112','paone27');  
                $erss8 = info_fetch_osireport('SI/LR','ERSS PROJECT DIAL 112','paone27'); 
                echo $erssasi = $erss6 + $erss7 + $erss8; 

             ?></td>
            <td><?php $erss9 = info_fetch_osireport('HC','ERSS PROJECT DIAL 112','paone27');
                    $erss10 = info_fetch_osireport('ASI/LR','ERSS PROJECT DIAL 112','paone27');
                     $erss11 = info_fetch_osireport('ASI/CR','ERSS PROJECT DIAL 112','paone27');
             echo $ersshc= $erss9 +  $erss10 + $erss11;  ?></td>
            <td><?php $erss12 = info_fetch_osireport('CT','ERSS PROJECT DIAL 112','paone27');
                       $erss13 = info_fetch_osireport('HC/PR','ERSS PROJECT DIAL 112','paone27');
                        $erss14 = info_fetch_osireport('HC/LR','ERSS PROJECT DIAL 112','paone27');
                         $erss15 = info_fetch_osireport('Sr.Const','ERSS PROJECT DIAL 112','paone27');
                         $erss16 = info_fetch_osireport('C-II','ERSS PROJECT DIAL 112','paone27');

             echo $erssct=  $erss12 + $erss13 + $erss14 + $erss15 + $erss16;  ?></td>
            <td><?php echo $erssinsp + $ersssi + $erssasi + $ersshc + $erssct;  ?></td>
                </tr>


                <tr>
                  <td></td>
                
                  <td>TOTAL</td>
                          <td><?php echo $disttmohaliinsp + $dppmarkinmaleinsp + $dipmarkinfemaleinsp + $dispolothmaleinsp + $dispolothfemaleinsp + $cpoattachundertbninsp + $pbpoloffinstsecttchginsp + $nricellmohaliinsp + $intwinginsp + $centralpollinemohaliinsp + $vigbureauinsp + $sbcbinsp + $mairimmdutyinsp+ $phrcinsp + $burofinvestigationinsp + $spectaskforcestfinsp + $ppssocinsp + $rtcpapjalinsp + $istcpapkapinsp + $drillstaffinsp + $lawstaffinsp + $pctsbhgpatialainsp + $rtcladdakithisangrurinsp + $ppaphillaurinsp + $prtcjahankhelaninsp + $erssinsp; ?></td>
                  <td><?php echo $disttmohalisi + $dppmarkinmalesi + $dipmarkinfemalesi + $dispolothmalesi + $dispolothfemalesi + $cpoattachundertbnsi + $pbpoloffinstsecttchgsi + $nricellmohalisi + $intwingsi + $centralpollinemohalisi + $vigbureausi + $sbcbsi + $mairimmdutysi + $phrcsi + $burofinvestigationsi + $spectaskforcestfsi + $ppssocsi + $rtcpapjalsi + $istcpapkapsi + $drillstaffsi + $lawstaffsi + $pctsbhgpatialasi + $rtcladdakithisangrursi + $ppaphillaursi + $prtcjahankhelansi + $ersssi;  ?></td>
                  <td><?php echo $disttmohaliasi + $dppmarkinmaleasi + $dipmarkinfemaleasi + $dispolothmaleasi + $dispolothfemaleasi + $cpoattachundertbnasi + $pbpoloffinstsecttchgasi + $nricellmohaliasi + $intwingasi + $centralpollinemohaliasi + $vigbureauasi + $sbcbasi + $mairimmdutyasi + $phrcasi + $burofinvestigationasi + $spectaskforcestfasi + $ppssocasi + $rtcpapjalasi + $istcpapkapasi + $drillstaffasi + $lawstaffasi + $pctsbhgpatialaasi + $rtcladdakithisangrurasi + $ppaphillaurasi + $prtcjahankhelanasi + $erssasi;  ?></td>
                  <td><?php echo $disttmohalihc + $dppmarkinmalehc + $dipmarkinfemalehc + $dispolothmalehc + $dispolothfemalehc + $cpoattachundertbnhc + $pbpoloffinstsecttchghc + $nricellmohalihc + $intwinghc + $centralpollinemohalihc + $vigbureauhc + $sbcbhc + $mairimmdutyhc + $phrchc + $burofinvestigationhc + $spectaskforcestfhc + $ppssochc + $rtcpapjalhc + $istcpapkaphc + $drillstaffhc + $lawstaffhc + $pctsbhgpatialahc + $rtcladdakithisangrurhc + $ppaphillaurhc + $prtcjahankhelanhc + $ersshc; ?></td>
                  <td><?php echo $disttmohalict + $dppmarkinmalect + $dipmarkinfemalect + $dispolothmalect + $dispolothfemalect + $cpoattachundertbnct + $pbpoloffinstsecttchgct + $nricellmohalict + $intwingct + $centralpollinemohalict + $vigbureauct + $sbcbct + $mairimmdutyct + $phrcct + $burofinvestigationct + $spectaskforcestfct + $ppssocct + $rtcpapjalct + $istcpapkapct + $drillstaffct + $lawstaffct + $pctsbhgpatialact + $rtcladdakithisangrurct + $ppaphillaurct + $prtcjahankhelanct + $erssct;?></td>
                  <td><?php echo $box4 =  $disttmohaliinsp + $dppmarkinmaleinsp + $dipmarkinfemaleinsp + $dispolothmaleinsp + $dispolothfemaleinsp + $cpoattachundertbninsp + $pbpoloffinstsecttchginsp + $nricellmohaliinsp + $intwinginsp + $centralpollinemohaliinsp + $vigbureauinsp + $sbcbinsp + $mairimmdutyinsp+ $phrcinsp + $burofinvestigationinsp + $spectaskforcestfinsp + $ppssocinsp + $rtcpapjalinsp + $istcpapkapinsp + $drillstaffinsp + $lawstaffinsp + $pctsbhgpatialainsp + $rtcladdakithisangrurinsp + $ppaphillaurinsp + $prtcjahankhelaninsp + $erssinsp+ $disttmohalisi + $dppmarkinmalesi + $dipmarkinfemalesi + $dispolothmalesi + $dispolothfemalesi + $cpoattachundertbnsi + $pbpoloffinstsecttchgsi + $nricellmohalisi + $intwingsi + $centralpollinemohalisi + $vigbureausi + $sbcbsi + $mairimmdutysi + $phrcsi + $burofinvestigationsi + $spectaskforcestfsi + $ppssocsi + $rtcpapjalsi + $istcpapkapsi + $drillstaffsi + $lawstaffsi + $pctsbhgpatialasi + $rtcladdakithisangrursi + $ppaphillaursi + $prtcjahankhelansi + $ersssi + $disttmohaliasi + $dppmarkinmaleasi + $dipmarkinfemaleasi + $dispolothmaleasi + $dispolothfemaleasi + $cpoattachundertbnasi + $pbpoloffinstsecttchgasi + $nricellmohaliasi + $intwingasi + $centralpollinemohaliasi + $vigbureauasi + $sbcbasi + $mairimmdutyasi + $phrcasi + $burofinvestigationasi + $spectaskforcestfasi + $ppssocasi + $rtcpapjalasi + $istcpapkapasi + $drillstaffasi + $lawstaffasi + $pctsbhgpatialaasi + $rtcladdakithisangrurasi + $ppaphillaurasi + $prtcjahankhelanasi + $erssasi + $disttmohalihc + $dppmarkinmalehc + $dipmarkinfemalehc + $dispolothmalehc + $dispolothfemalehc + $cpoattachundertbnhc + $pbpoloffinstsecttchghc + $nricellmohalihc + $intwinghc + $centralpollinemohalihc + $vigbureauhc + $sbcbhc + $mairimmdutyhc + $phrchc + $burofinvestigationhc + $spectaskforcestfhc + $ppssochc + $rtcpapjalhc + $istcpapkaphc + $drillstaffhc + $lawstaffhc + $pctsbhgpatialahc + $rtcladdakithisangrurhc + $ppaphillaurhc + $prtcjahankhelanhc + $ersshc + $disttmohalict + $dppmarkinmalect + $dipmarkinfemalect + $dispolothmalect + $dispolothfemalect + $cpoattachundertbnct + $pbpoloffinstsecttchgct + $nricellmohalict + $intwingct + $centralpollinemohalict + $vigbureauct + $sbcbct + $mairimmdutyct + $phrcct + $burofinvestigationct + $spectaskforcestfct + $ppssocct + $rtcpapjalct + $istcpapkapct + $drillstaffct + $lawstaffct + $pctsbhgpatialact + $rtcladdakithisangrurct + $ppaphillaurct + $prtcjahankhelanct + $erssct; ?>
                   </td>
                </tr>    

              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 5. TRAINING</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
                                
            <table width="927" border="1">
              <tbody>
                <tr>
                  <td width="30">i)</td>
                  <td width="577">BASIC TRAINING</td>
                              <td width="59"><?php $basictraining1 = info_fetch_osireport('INSP','BASIC TRANING','traning1'); 
                      $basictraining2 = info_fetch_osireport('DSP/CR','BASIC TRANING','traning1'); 
                      echo $basictraininginsp = $basictraining1 + $basictraining2;  ?></td>
            <td width="43"><?php $basictraining3 = info_fetch_osireport('SI','BASIC TRANING','traning1');
            $basictraining4 = info_fetch_osireport('INSP/LR','BASIC TRANING','traning1'); 
            $basictraining5 = info_fetch_osireport('INSP/CR','BASIC TRANING','traning1'); 
            echo $basictrainingsi =$basictraining3 + $basictraining4 + $basictraining5;
              ?></td>
            <td width="42"><?php $basictraining6 = info_fetch_osireport('ASI','BASIC TRANING','traning1'); 
                $basictraining7 = info_fetch_osireport('SI/CR','BASIC TRANING','traning1');  
                $basictraining8 = info_fetch_osireport('SI/LR','BASIC TRANING','traning1'); 
                echo $basictrainingasi =  $basictraining6 + $basictraining7 + $basictraining8; 

             ?></td>
            <td width="43"><?php $basictraining9 = info_fetch_osireport('HC','BASIC TRANING','traning1');
                    $basictraining10 = info_fetch_osireport('ASI/LR','BASIC TRANING','traning1');
                     $basictraining11 = info_fetch_osireport('ASI/CR','BASIC TRANING','traning1');
             echo $basictraininghc= $basictraining9 +  $basictraining10 + $basictraining11;  ?></td>
            <td width="43"><?php $basictraining12 = info_fetch_osireport('CT','BASIC TRANING','traning1');
                       $basictraining13 = info_fetch_osireport('HC/PR','BASIC TRANING','traning1');
                        $basictraining14 = info_fetch_osireport('HC/LR','BASIC TRANING','traning1');
                         $basictraining15 = info_fetch_osireport('Sr.Const','BASIC TRANING','traning1');
                         $basictraining16 = info_fetch_osireport('C-II','BASIC TRANING','traning1');

             echo $basictrainingct= $basictraining12 + $basictraining13 + $basictraining14 + $basictraining15 + $basictraining16;  ?></td>
            <td width="38"><?php echo $basictraininginsp + $basictrainingsi + $basictrainingasi + $basictraininghc + $basictrainingct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>PROMOTIONAL COURSES</td>
                               <td><?php $promotionalcours1 = info_fetch_osireport('INSP','PROMOTIONAL COURSE','traning2'); 
                      $promotionalcours2 = info_fetch_osireport('DSP/CR','PROMOTIONAL COURSE','traning2'); 
                      echo $promotionalcoursinsp = $promotionalcours1 + $promotionalcours2;  ?></td>
            <td><?php $promotionalcours3 = info_fetch_osireport('SI','PROMOTIONAL COURSE','traning2');
            $promotionalcours4 = info_fetch_osireport('INSP/LR','PROMOTIONAL COURSE','traning2'); 
            $promotionalcours5 = info_fetch_osireport('INSP/CR','PROMOTIONAL COURSE','traning2'); 
            echo $promotionalcourssi =$promotionalcours3 + $promotionalcours4 + $promotionalcours5;
              ?></td>
            <td><?php $promotionalcours6 = info_fetch_osireport('ASI','PROMOTIONAL COURSE','traning2'); 
                $promotionalcours7 = info_fetch_osireport('SI/CR','PROMOTIONAL COURSE','traning2');  
                $promotionalcours8 = info_fetch_osireport('SI/LR','PROMOTIONAL COURSE','traning2'); 
                echo $promotionalcoursasi = $promotionalcours6 + $promotionalcours7 + $promotionalcours8; 

             ?></td>
            <td><?php $promotionalcours9 = info_fetch_osireport('HC','PROMOTIONAL COURSE','traning2');
                    $promotionalcours10 = info_fetch_osireport('ASI/LR','PROMOTIONAL COURSE','traning2');
                     $promotionalcours11 = info_fetch_osireport('ASI/CR','PROMOTIONAL COURSE','traning2');
             echo $promotionalcourshc = $promotionalcours9 +  $promotionalcours10 + $promotionalcours11;  ?></td>
            <td><?php $promotionalcours12 = info_fetch_osireport('CT','PROMOTIONAL COURSE','traning2');
                       $promotionalcours13 = info_fetch_osireport('HC/PR','PROMOTIONAL COURSE','traning2');
                        $promotionalcours14 = info_fetch_osireport('HC/LR','PROMOTIONAL COURSE','traning2');
                         $promotionalcours15 = info_fetch_osireport('Sr.Const','PROMOTIONAL COURSE','traning2');
                         $promotionalcours16 = info_fetch_osireport('C-II','PROMOTIONAL COURSE','traning2');

             echo $promotionalcoursct=  $promotionalcours12 + $promotionalcours13 + $promotionalcours14 + $promotionalcours15 + $promotionalcours16;  ?></td>
            <td><?php echo $promotionalcoursinsp + $promotionalcourssi + $promotionalcoursasi + $promotionalcourshc + $promotionalcoursct;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DEPARTMENTAL COURSES</td>
                               <td><?php $departmentcourse1 = info_fetch_osireport('INSP','DEPARTMENT COURSE','traning3'); 
                      $departmentcourse2 = info_fetch_osireport('DSP/CR','DEPARTMENT COURSE','traning3'); 
                      echo $departmentcourseinsp = $departmentcourse1 + $departmentcourse2;  ?></td>
            <td><?php $departmentcourse3 = info_fetch_osireport('SI','DEPARTMENT COURSE','traning3');
            $departmentcourse4 = info_fetch_osireport('INSP/LR','DEPARTMENT COURSE','traning3'); 
            $departmentcourse5 = info_fetch_osireport('INSP/CR','DEPARTMENT COURSE','traning3'); 
            echo $departmentcoursesi =$departmentcourse3 + $departmentcourse4 + $departmentcourse5;
              ?></td>
            <td><?php $departmentcourse6 = info_fetch_osireport('ASI','DEPARTMENT COURSE','traning3'); 
                $departmentcourse7 = info_fetch_osireport('SI/CR','DEPARTMENT COURSE','traning3');  
                $departmentcourse8 = info_fetch_osireport('SI/LR','DEPARTMENT COURSE','traning3'); 
                echo $departmentcourseasi =  $departmentcourse6 + $departmentcourse7 + $departmentcourse8; 

             ?></td>
            <td><?php $departmentcourse9 = info_fetch_osireport('HC','DEPARTMENT COURSE','traning3');
                    $departmentcourse10 = info_fetch_osireport('ASI/LR','DEPARTMENT COURSE','traning3');
                     $departmentcourse11 = info_fetch_osireport('ASI/CR','DEPARTMENT COURSE','traning3');
             echo $departmentcoursehc =  $departmentcourse9 +  $departmentcourse10 + $departmentcourse11;  ?></td>
            <td><?php $departmentcourse12 = info_fetch_osireport('CT','DEPARTMENT COURSE','traning3');
                       $departmentcourse13 = info_fetch_osireport('HC/PR','DEPARTMENT COURSE','traning3');
                        $departmentcourse14 = info_fetch_osireport('HC/LR','DEPARTMENT COURSE','traning3');
                         $departmentcourse15 = info_fetch_osireport('Sr.Const','DEPARTMENT COURSE','traning3');
                         $departmentcourse16 = info_fetch_osireport('C-II','DEPARTMENT COURSE','traning3');

             echo $departmentcoursect=  $departmentcourse12 + $departmentcourse13 + $departmentcourse14 + $departmentcourse15 + $departmentcourse16;  ?></td>
            <td><?php echo $departmentcourseinsp + $departmentcoursesi + $departmentcourseasi + $departmentcoursehc + $departmentcoursect;  ?></td>
                </tr>
  

                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $basictraininginsp + $promotionalcoursinsp + $departmentcourseinsp; ?></td>
                  <td><?php echo $basictrainingsi + $promotionalcourssi + $departmentcoursesi;  ?></td>
                  <td><?php echo $basictrainingasi + $promotionalcoursasi + $departmentcourseasi;  ?></td>
                  <td><?php echo $basictraininghc + $promotionalcourshc + $departmentcoursehc; ?></td>
                  <td><?php echo $basictrainingct + $promotionalcoursct + $departmentcoursect;?></td>
                  <td><?php echo $box5 = $basictraininginsp + $promotionalcoursinsp + $departmentcourseinsp + $basictrainingsi + $promotionalcourssi + $departmentcoursesi + $basictrainingasi + $promotionalcoursasi + $departmentcourseasi + $basictraininghc + $promotionalcourshc + $departmentcoursehc + $basictrainingct + $promotionalcoursct + $departmentcoursect; ?>
                   </td>
                </tr>    
              </tbody>
           </table>

<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>   <h3> 6. SPORTS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
     
           
            <table width="926" border="1">
              <tbody>
                <tr>
                  <td width="28">i)</td>
                  <td width="580">DSO</td>
                               <td width="59"><?php $dso1 = info_fetch_osireport('INSP','DSO','ssone23'); 
                      $dso2 = info_fetch_osireport('DSP/CR','DSO','ssone23'); 
                      echo $dsoinsp = $dso1 + $dso2;  ?></td>
            <td width="41"><?php $dso3 = info_fetch_osireport('SI','DSO','ssone23');
            $dso4 = info_fetch_osireport('INSP/LR','DSO','ssone23'); 
            $dso5 = info_fetch_osireport('INSP/CR','DSO','ssone23'); 
            echo $dsosi = $dso3 + $dso4 + $dso5;
              ?></td>
            <td width="45"><?php $dso6 = info_fetch_osireport('ASI','DSO','ssone23'); 
                $dso7 = info_fetch_osireport('SI/CR','DSO','ssone23');  
                $dso8 = info_fetch_osireport('SI/LR','DSO','ssone23'); 
                echo $dsoasi = $dso6 + $dso7 + $dso8; 

             ?></td>
            <td width="44"><?php $dso9 = info_fetch_osireport('HC','DSO','ssone23');
                    $dso10 = info_fetch_osireport('ASI/LR','DSO','ssone23');
                     $dso11 = info_fetch_osireport('ASI/CR','DSO','ssone23');
             echo $dsohc= $dso9 +  $dso10 + $dso11;  ?></td>
            <td width="44"><?php $dso12 = info_fetch_osireport('CT','DSO','ssone23');
                       $dso13 = info_fetch_osireport('HC/PR','DSO','ssone23');
                        $dso14 = info_fetch_osireport('HC/LR','DSO','ssone23');
                         $dso15 = info_fetch_osireport('Sr.Const','DSO','ssone23');
                         $dso16 = info_fetch_osireport('C-II','DSO','ssone23');

             echo $dsoct=  $dso12 + $dso13 + $dso14 + $dso15 + $dso16;  ?></td>
            <td width="33"><?php echo $dsoinsp + $dsosi + $dsoasi + $dsohc + $dsoct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CENTRAL SPORTS OFFICE JALANDHAR</td>
                               <td><?php $censportoffjal1 = info_fetch_osireport('INSP','CSO, JALANDHAR','ssone24'); 
                      $censportoffjal2 = info_fetch_osireport('DSP/CR','CSO, JALANDHAR','ssone24'); 
                      echo $censportoffjalinsp = $censportoffjal1 + $censportoffjal2;  ?></td>
            <td><?php $censportoffjal3 = info_fetch_osireport('SI','CSO, JALANDHAR','ssone24');
            $censportoffjal4 = info_fetch_osireport('INSP/LR','CSO, JALANDHAR','ssone24'); 
            $censportoffjal5 = info_fetch_osireport('INSP/CR','CSO, JALANDHAR','ssone24'); 
            echo $censportoffjalsi = $censportoffjal3 + $censportoffjal4 + $censportoffjal5;
              ?></td>
            <td><?php $censportoffjal6 = info_fetch_osireport('ASI','CSO, JALANDHAR','ssone24'); 
                $censportoffjal7 = info_fetch_osireport('SI/CR','CSO, JALANDHAR','ssone24');  
                $censportoffjal8 = info_fetch_osireport('SI/LR','CSO, JALANDHAR','ssone24'); 
                echo $censportoffjalasi =  $censportoffjal6 + $censportoffjal7 + $censportoffjal8; 

             ?></td>
            <td><?php $censportoffjal9 = info_fetch_osireport('HC','CSO, JALANDHAR','ssone24');
                    $censportoffjal10 = info_fetch_osireport('ASI/LR','CSO, JALANDHAR','ssone24');
                     $censportoffjal11 = info_fetch_osireport('ASI/CR','CSO, JALANDHAR','ssone24');
             echo $censportoffjalhc = $censportoffjal9 +  $censportoffjal10 + $censportoffjal11;  ?></td>
            <td><?php $censportoffjal12 = info_fetch_osireport('CT','CSO, JALANDHAR','ssone24');
                       $censportoffjal13 = info_fetch_osireport('HC/PR','CSO, JALANDHAR','ssone24');
                        $censportoffjal14 = info_fetch_osireport('HC/LR','CSO, JALANDHAR','ssone24');
                         $censportoffjal15 = info_fetch_osireport('Sr.Const','CSO, JALANDHAR','ssone24');
                         $censportoffjal16 = info_fetch_osireport('C-II','CSO, JALANDHAR','ssone24');

             echo $censportoffjalct=  $censportoffjal12 + $censportoffjal13 + $censportoffjal14 + $censportoffjal15 + $censportoffjal16;  ?></td>
            <td><?php echo $censportoffjalinsp + $censportoffjalsi + $censportoffjalasi + $censportoffjalhc + $censportoffjalct;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>NIS PATIALA</td>
                              <td><?php $nispatiala1 = info_fetch_osireport('INSP','NIS PATIALA','ssone25'); 
                      $nispatiala2 = info_fetch_osireport('DSP/CR','NIS PATIALA','ssone25'); 
                      echo $nispatialainsp = $nispatiala1 + $nispatiala2;  ?></td>
            <td><?php $nispatiala3 = info_fetch_osireport('SI','NIS PATIALA','ssone25');
            $nispatiala4 = info_fetch_osireport('INSP/LR','NIS PATIALA','ssone25'); 
            $nispatiala5 = info_fetch_osireport('INSP/CR','NIS PATIALA','ssone25'); 
            echo $nispatialasi = $nispatiala3 + $nispatiala4 + $nispatiala5;
              ?></td>
            <td><?php $nispatiala6 = info_fetch_osireport('ASI','NIS PATIALA','ssone25'); 
                $nispatiala7 = info_fetch_osireport('SI/CR','NIS PATIALA','ssone25');  
                $nispatiala8 = info_fetch_osireport('SI/LR','NIS PATIALA','ssone25'); 
                echo $nispatialaasi = $nispatiala6 + $nispatiala7 + $nispatiala8; 

             ?></td>
            <td><?php $nispatiala9 = info_fetch_osireport('HC','NIS PATIALA','ssone25');
                    $nispatiala10 = info_fetch_osireport('ASI/LR','NIS PATIALA','ssone25');
                     $nispatiala11 = info_fetch_osireport('ASI/CR','NIS PATIALA','ssone25');
             echo $nispatialahc= $nispatiala9 +  $nispatiala10 + $nispatiala11;  ?></td>
            <td><?php $nispatiala12 = info_fetch_osireport('CT','NIS PATIALA','ssone25');
                       $nispatiala13 = info_fetch_osireport('HC/PR','NIS PATIALA','ssone25');
                        $nispatiala14 = info_fetch_osireport('HC/LR','NIS PATIALA','ssone25');
                         $nispatiala15 = info_fetch_osireport('Sr.Const','NIS PATIALA','ssone25');
                         $nispatiala16 = info_fetch_osireport('C-II','NIS PATIALA','ssone25');

             echo $nispatialact= $nispatiala12 + $nispatiala13 + $nispatiala14 + $nispatiala15 + $nispatiala16;  ?></td>
            <td><?php echo $nispatialainsp + $nispatialasi + $nispatialaasi + $nispatialahc + $nispatialact;  ?></td>
                </tr>

                 <tr>
                  <td>iv)</td>
                  <td>OTHER</td>
                               <td><?php $othersports1 = info_fetch_osireport('INSP','OTHERS','ssone26'); 
                      $othersports2 = info_fetch_osireport('DSP/CR','OTHERS','ssone26'); 
                      echo $othersportsinsp = $othersports1 + $othersports2;  ?></td>
            <td><?php $othersports3 = info_fetch_osireport('SI','OTHERS','ssone26');
            $othersports4 = info_fetch_osireport('INSP/LR','OTHERS','ssone26'); 
            $othersports5 = info_fetch_osireport('INSP/CR','OTHERS','ssone26'); 
            echo $othersportssi = $othersports3 + $othersports4 + $othersports5;
              ?></td>
            <td><?php $othersports6 = info_fetch_osireport('ASI','OTHERS','ssone26'); 
                $othersports7 = info_fetch_osireport('SI/CR','OTHERS','ssone26');  
                $othersports8 = info_fetch_osireport('SI/LR','OTHERS','ssone26'); 
                echo $othersportsasi = $othersports6 + $othersports7 + $othersports8; 

             ?></td>
            <td><?php $othersports9 = info_fetch_osireport('HC','OTHERS','ssone26');
                    $othersports10 = info_fetch_osireport('ASI/LR','OTHERS','ssone26');
                     $othersports11 = info_fetch_osireport('ASI/CR','OTHERS','ssone26');
             echo $othersportshc= $othersports9 +  $othersports10 + $othersports11;  ?></td>
            <td><?php $othersports12 = info_fetch_osireport('CT','OTHERS','ssone26');
                       $othersports13 = info_fetch_osireport('HC/PR','OTHERS','ssone26');
                        $othersports14 = info_fetch_osireport('HC/LR','OTHERS','ssone26');
                         $othersports15 = info_fetch_osireport('Sr.Const','OTHERS','ssone26');
                         $othersports16 = info_fetch_osireport('C-II','OTHERS','ssone26');

             echo $othersportsct= $othersports12 + $othersports13 + $othersports14 + $othersports15 + $othersports16;  ?></td>
            <td><?php echo $othersportsinsp + $othersportssi + $othersportsasi + $othersportshc + $othersportsct;  ?></td>
                </tr>

                 <tr>
                  <td></td>

                  <td>TOTAL</td>
                          <td><?php echo $dsoinsp + $censportoffjalinsp + $nispatialainsp + $othersportsinsp; ?></td>
                  <td><?php echo $dsosi + $censportoffjalsi + $nispatialasi + $othersportssi;  ?></td>
                  <td><?php echo $dsoasi + $censportoffjalasi + $nispatialaasi + $othersportsasi;  ?></td>
                  <td><?php echo $dsohc + $censportoffjalhc + $nispatialahc + $othersportshc;  ?></td>
                  <td><?php echo $dsoct + $censportoffjalct + $nispatialact + $othersportsct;?></td>
                  <td><?php echo $box6 = $dsoinsp + $censportoffjalinsp + $nispatialainsp + $othersportsinsp + $dsosi + $censportoffjalsi + $nispatialasi + $othersportssi + $dsoasi + $censportoffjalasi + $nispatialaasi + $othersportsasi + $dsohc + $censportoffjalhc + $nispatialahc + $othersportshc + $dsoct + $censportoffjalct + $nispatialact + $othersportsct; ?>
                   </td>
                </tr>    
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 7. AVAILABLE WITH BNs.</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
 

                    
            <table width="927" border="1">
              <tbody>
                <tr>
                  <td width="28">i)</td>
                  <td width="583">PAP HQRS. CAMPUS SECURITY,BN. KOT GUARDS,BN. HQRS OTHER GUARDS</td>
                               <td width="54"><?php $phcsbkgbhog1 = info_fetch_osireports('INSP','','awbone1'); 
                      $phcsbkgbhog2 = info_fetch_osireports('DSP/CR','','awbone1'); 
                      echo $phcsbkgbhoginsp = $phcsbkgbhog1 + $phcsbkgbhog2;  ?></td>
            <td width="49" ><?php $phcsbkgbhog3 = info_fetch_osireports('SI','','awbone1');
            $phcsbkgbhog4 = info_fetch_osireports('INSP/LR','','awbone1'); 
            $phcsbkgbhog5 = info_fetch_osireports('INSP/CR','','awbone1'); 
            echo $phcsbkgbhogsi =  $phcsbkgbhog3 + $phcsbkgbhog4 + $phcsbkgbhog5;
              ?></td>
            <td width="41"><?php $phcsbkgbhog6 = info_fetch_osireports('ASI','','awbone1'); 
                $phcsbkgbhog7 = info_fetch_osireports('SI/CR','','awbone1');  
                $phcsbkgbhog8 = info_fetch_osireports('SI/LR','','awbone1'); 
                echo $phcsbkgbhogasi = $phcsbkgbhog6 + $phcsbkgbhog7 + $phcsbkgbhog8; 

             ?></td>
            <td width="45"><?php $phcsbkgbhog9 = info_fetch_osireports('HC','','awbone1');
                    $phcsbkgbhog10 = info_fetch_osireports('ASI/LR','','awbone1');
                     $phcsbkgbhog11 = info_fetch_osireports('ASI/CR','','awbone1');
             echo $phcsbkgbhoghc= $phcsbkgbhog9 +  $phcsbkgbhog10 + $phcsbkgbhog11;  ?></td>
            <td width="43"><?php $phcsbkgbhog12 = info_fetch_osireports('CT','','awbone1');
                       $phcsbkgbhog13 = info_fetch_osireports('HC/PR','','awbone1');
                        $phcsbkgbhog14 = info_fetch_osireports('HC/LR','','awbone1');
                         $phcsbkgbhog15 = info_fetch_osireports('Sr.Const','','awbone1');
                         $phcsbkgbhog16 = info_fetch_osireports('C-II','','awbone1');

             echo $phcsbkgbhogct=  $phcsbkgbhog12 + $phcsbkgbhog13 + $phcsbkgbhog14 + $phcsbkgbhog15 + $phcsbkgbhog16;  ?></td>
            <td width="32"><?php echo $phcsbkgbhoginsp + $phcsbkgbhogsi + $phcsbkgbhogasi + $phcsbkgbhoghc + $phcsbkgbhogct;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>OFFICE STAFF IN ARMED HIGHER OFFICES</td>
                  <td><?php $osiaho1 = info_fetch_osireports('INSP','','awbone3'); 
                      $osiaho2 = info_fetch_osireports('DSP/CR','','awbone3'); 
                      echo $osiahoinsp = $osiaho1 + $osiaho2;  ?></td>
            <td><?php $osiaho3 = info_fetch_osireports('SI','','awbone3');
            $osiaho4 = info_fetch_osireports('INSP/LR','','awbone3'); 
            $osiaho5 = info_fetch_osireports('INSP/CR','','awbone3'); 
            echo $osiahosi = $osiaho3 + $osiaho4 + $osiaho5;
              ?></td>
            <td><?php $osiaho6 = info_fetch_osireports('ASI','','awbone3'); 
                $osiaho7 = info_fetch_osireports('SI/CR','','awbone3');  
                $osiaho8 = info_fetch_osireports('SI/LR','','awbone3'); 
                echo $osiahoasi = $osiaho6 + $osiaho7 + $osiaho8; 
             ?></td>
            <td><?php $osiaho9 = info_fetch_osireports('HC','','awbone3');
                    $osiaho10 = info_fetch_osireports('ASI/LR','','awbone3');
                     $osiaho11 = info_fetch_osireports('ASI/CR','','awbone3');
             echo $osiahohc=  $osiaho9 +  $osiaho10 + $osiaho11;  ?></td>
            <td><?php $osiaho12 = info_fetch_osireports('CT','','awbone3');
                       $osiaho13 = info_fetch_osireports('HC/PR','','awbone3');
                        $osiaho14 = info_fetch_osireports('HC/LR','','awbone3');
                         $osiaho15 = info_fetch_osireports('Sr.Const','','awbone3');
                         $osiaho16 = info_fetch_osireports('C-II','','awbone3');
             echo $osiahoct= $osiaho12 + $osiaho13 + $osiaho14 + $osiaho15 + $osiaho16;  ?></td>
            <td><?php echo $osiahoinsp + $osiahosi + $osiahoasi + $osiahohc + $osiahoct;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>OFFICE STAFF IN BN. OFFICES</td>
                            <td><?php $osinbnoffices1 = info_fetch_osireports('INSP','','awbone4'); 
                      $osinbnoffices2 = info_fetch_osireports('DSP/CR','','awbone4'); 
                      echo $osinbnofficesinsp = $osinbnoffices1 + $osinbnoffices2;  ?></td>
            <td><?php $osinbnoffices3 = info_fetch_osireports('SI','','awbone4');
            $osinbnoffices4 = info_fetch_osireports('INSP/LR','','awbone4'); 
            $osinbnoffices5 = info_fetch_osireports('INSP/CR','','awbone4'); 
            echo $osinbnofficessi = $osinbnoffices3 + $osinbnoffices4 + $osinbnoffices5;
              ?></td>
            <td><?php $osinbnoffices6 = info_fetch_osireports('ASI','','awbone4'); 
                $osinbnoffices7 = info_fetch_osireports('SI/CR','','awbone4');  
                $osinbnoffices8 = info_fetch_osireports('SI/LR','','awbone4'); 
                echo $osinbnofficesasi =  $osinbnoffices6 + $osinbnoffices7 + $osinbnoffices8; 

             ?></td>
            <td><?php $osinbnoffices9 = info_fetch_osireports('HC','','awbone4');
                    $osinbnoffices10 = info_fetch_osireports('ASI/LR','','awbone4');
                     $osinbnoffices11 = info_fetch_osireports('ASI/CR','','awbone4');
             echo $osinbnofficeshc= $osinbnoffices9 +  $osinbnoffices10 + $osinbnoffices11;  ?></td>
            <td><?php $osinbnoffices12 = info_fetch_osireports('CT','','awbone4');
                       $osinbnoffices13 = info_fetch_osireports('HC/PR','','awbone4');
                        $osinbnoffices14 = info_fetch_osireports('HC/LR','','awbone4');
                         $osinbnoffices15 = info_fetch_osireports('Sr.Const','','awbone4');
                         $osinbnoffices16 = info_fetch_osireports('C-II','','awbone4');

             echo $osinbnofficesct= $osinbnoffices12 + $osinbnoffices13 + $osinbnoffices14 + $osinbnoffices15 + $osinbnoffices16;  ?></td>
            <td><?php echo $osinbnofficesinsp + $osinbnofficessi + $osinbnofficesasi + $osinbnofficeshc + $osinbnofficesct;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>TRADEMEN</td>
                 <td><?php $trademan1 = info_fetch_osireport('INSP','TRADEMEN','awbone7'); 
                          
                      $trademan2 = info_fetch_osireport('DSP/CR','TRADEMEN','awbone7'); 
                      echo $trademaninsp = $trademan1 + $trademan2;  ?></td>
            <td><?php $trademan3 = info_fetch_osireport('SI','TRADEMEN','awbone7');
            $trademan4 = info_fetch_osireport('INSP/LR','TRADEMEN','awbone7'); 
            $trademan5 = info_fetch_osireport('INSP/CR','TRADEMEN','awbone7'); 
            echo $trademansi = $trademan3 + $trademan4 + $trademan5;
              ?></td>
            <td><?php $trademan6 = info_fetch_osireport('ASI','TRADEMEN','awbone7'); 
                $trademan7 = info_fetch_osireport('SI/CR','TRADEMEN','awbone7');  
                $trademan8 = info_fetch_osireport('SI/LR','TRADEMEN','awbone7'); 
                echo $trademanasi = $trademan6 + $trademan7 + $trademan8; 

             ?></td>
            <td><?php $trademan9 = info_fetch_osireport('HC','TRADEMEN','awbone7');
                    $trademan10 = info_fetch_osireport('ASI/LR','TRADEMEN','awbone7');
                     $trademan11 = info_fetch_osireport('ASI/CR','TRADEMEN','awbone7');
             echo  $trademanhc= $trademan9 +  $trademan10 + $trademan11;  ?></td>
            <td><?php $trademan12 = info_fetch_osireport('CT','TRADEMEN','awbone7');
                       $trademan13 = info_fetch_osireport('HC/PR','TRADEMEN','awbone7');
                        $trademan14 = info_fetch_osireport('HC/LR','TRADEMEN','awbone7');
                         $trademan15 = info_fetch_osireport('Sr.Const','TRADEMEN','awbone7');
                         $trademan16 = info_fetch_osireport('C-II','TRADEMEN','awbone7');
             echo $trademanct= $trademan12 + $trademan13 + $trademan14 + $trademan15 + $trademan16;  ?></td>
            <td><?php echo $trademaninsp + $trademansi + $trademanasi + $trademanhc + $trademanct;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>ARMOURER</td>
                 <td><?php $armourer1 = info_fetch_osireport('INSP','Armourer & A/Armourer','awbone13'); 
                      $armourer2 = info_fetch_osireport('DSP/CR','Armourer & A/Armourer','awbone13'); 
                      echo $armourerinsp = $armourer1 + $armourer2;  ?></td>
            <td><?php $armourer3 = info_fetch_osireport('SI','Armourer & A/Armourer','awbone13');
            $armourer4 = info_fetch_osireport('INSP/LR','Armourer & A/Armourer','awbone13'); 
            $armourer5 = info_fetch_osireport('INSP/CR','Armourer & A/Armourer','awbone13'); 
            echo $armourersi = $armourer3 + $armourer4 + $armourer5;
              ?></td>
            <td><?php $armourer6 = info_fetch_osireport('ASI','Armourer & A/Armourer','awbone13'); 
                $armourer7 = info_fetch_osireport('SI/CR','Armourer & A/Armourer','awbone13');  
                $armourer8 = info_fetch_osireport('SI/LR','Armourer & A/Armourer','awbone13'); 
                echo $armourerasi = $armourer6 + $armourer7 + $armourer8; 

             ?></td>
            <td><?php $armourer9 = info_fetch_osireport('HC','Armourer & A/Armourer','awbone13');
                    $armourer10= info_fetch_osireport('ASI/LR','Armourer & A/Armourer','awbone13');
                     $armourer11 = info_fetch_osireport('ASI/CR','Armourer & A/Armourer','awbone13');
             echo  $armourerhc= $armourer9 +  $armourer10 + $armourer11;  ?></td>
            <td><?php $armourer12 = info_fetch_osireport('CT','Armourer & A/Armourer','awbone13');
                       $armourer13 = info_fetch_osireport('HC/PR','Armourer & A/Armourer','awbone13');
                        $armourer14 = info_fetch_osireport('HC/LR','Armourer & A/Armourer','awbone13');
                         $armourer15 = info_fetch_osireport('Sr.Const','Armourer & A/Armourer','awbone13');
                         $armourer16 = info_fetch_osireport('C-II','Armourer & A/Armourer','awbone13');
             echo $armourerct= $armourer12 + $armourer13 + $armourer14 + $armourer15 + $armourer16;  ?></td>
            <td><?php echo $armourerinsp + $armourersi + $armourerasi + $armourerhc + $armourerct;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>M.T.SECTION </td>
                    <td><?php $mtsection1 = info_fetch_osireport('INSP','M.T. SECTION','awbone8'); 
                      $mtsection2 = info_fetch_osireport('DSP/CR','M.T. SECTION','awbone8'); 
                      echo $mtsectioninsp = $mtsection1 + $mtsection2;  ?></td>
            <td><?php $mtsection3 = info_fetch_osireport('SI','M.T. SECTION','awbone8');
            $mtsection4 = info_fetch_osireport('INSP/LR','M.T. SECTION','awbone8'); 
            $mtsection5 = info_fetch_osireport('INSP/CR','M.T. SECTION','awbone8'); 
            echo $mtsectionsi =  $mtsection3 + $mtsection4 + $mtsection5;
              ?></td>
            <td><?php $mtsection6 = info_fetch_osireport('ASI','M.T. SECTION','awbone8'); 
                $mtsection7 = info_fetch_osireport('SI/CR','M.T. SECTION','awbone8');  
                $mtsection8 = info_fetch_osireport('SI/LR','M.T. SECTION','awbone8'); 
                echo $mtsectionasi = $mtsection6 + $mtsection7 + $mtsection8; 

             ?></td>
            <td><?php $mtsection9 = info_fetch_osireport('HC','M.T. SECTION','awbone8');
                    $mtsection10 = info_fetch_osireport('ASI/LR','M.T. SECTION','awbone8');
                     $mtsection11 = info_fetch_osireport('ASI/CR','M.T. SECTION','awbone8');
             echo $mtsectionhc = $mtsection9 +  $mtsection10 + $mtsection11;  ?></td>
            <td><?php $mtsection12 = info_fetch_osireport('CT','M.T. SECTION','awbone8');
                       $mtsection13 = info_fetch_osireport('HC/PR','M.T. SECTION','awbone8');
                        $mtsection14 = info_fetch_osireport('HC/LR','M.T. SECTION','awbone8');
                         $mtsection15 = info_fetch_osireport('Sr.Const','M.T. SECTION','awbone8');
                         $mtsection16 = info_fetch_osireport('C-II','M.T. SECTION','awbone8');

             echo $mtsectionct = $mtsection12 + $mtsection13 + $mtsection14 + $mtsection15 + $mtsection16;  ?></td>
            <td><?php echo $mtsectioninsp + $mtsectionsi + $mtsectionasi + $mtsectionhc + $mtsectionct;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>QUARTER MASTER BRANCH (LINE STAFF)</td>
                  <td><?php $qumasbranchlinestaff1 = info_fetch_osireports('INSP','','awbone9'); 
                      $qumasbranchlinestaff2 = info_fetch_osireports('DSP/CR','','awbone9'); 
                      echo $qumasbranchlinestaffinsp = $qumasbranchlinestaff1 + $qumasbranchlinestaff2;  ?></td>
            <td><?php $qumasbranchlinestaff3 = info_fetch_osireports('SI','','awbone9');
            $qumasbranchlinestaff4 = info_fetch_osireports('INSP/LR','','awbone9'); 
            $qumasbranchlinestaff5 = info_fetch_osireports('INSP/CR','','awbone9'); 
            echo $qumasbranchlinestaffsi =  $qumasbranchlinestaff3 + $qumasbranchlinestaff4 + $qumasbranchlinestaff5;
              ?></td>
            <td><?php $qumasbranchlinestaff6 = info_fetch_osireports('ASI','','awbone9'); 
                $qumasbranchlinestaff7 = info_fetch_osireports('SI/CR','','awbone9');  
                $qumasbranchlinestaff8 = info_fetch_osireports('SI/LR','','awbone9'); 
                echo $qumasbranchlinestaffasi = $qumasbranchlinestaff6 + $qumasbranchlinestaff7 + $qumasbranchlinestaff8; 

             ?></td>
            <td><?php $qumasbranchlinestaff9 = info_fetch_osireports('HC','','awbone9');
                    $qumasbranchlinestaff10 = info_fetch_osireports('ASI/LR','','awbone9');
                     $qumasbranchlinestaff11 = info_fetch_osireports('ASI/CR','','awbone9');
             echo $qumasbranchlinestaffhc = $qumasbranchlinestaff9 +  $qumasbranchlinestaff10 + $qumasbranchlinestaff11;  ?></td>
            <td><?php $qumasbranchlinestaff12 = info_fetch_osireports('CT','','awbone9');
                       $qumasbranchlinestaff13 = info_fetch_osireports('HC/PR','','awbone9');
                        $qumasbranchlinestaff14 = info_fetch_osireports('HC/LR','','awbone9');
                         $qumasbranchlinestaff15 = info_fetch_osireports('Sr.Const','','awbone9');
                         $qumasbranchlinestaff16 = info_fetch_osireports('C-II','','awbone9');

             echo $qumasbranchlinestaffct = $qumasbranchlinestaff12 + $qumasbranchlinestaff13 + $qumasbranchlinestaff14 + $qumasbranchlinestaff15 + $qumasbranchlinestaff16;  ?></td>
            <td><?php echo $qumasbranchlinestaffinsp + $qumasbranchlinestaffsi + $qumasbranchlinestaffasi + $qumasbranchlinestaffhc + $qumasbranchlinestaffct;  ?></td>
                </tr>

                <tr>
                  <td>xi)</td>
                  <td>GENERAL DUTY, AVAILABLE FORCE FOR EMERGENT L&O DUTY</td>
                <td><?php $gdaffedu1 = info_fetch_osireport('INSP','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
                      $gdaffedu2 = info_fetch_osireport('DSP/CR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
                      echo $gdaffeduinsp = $gdaffedu1 + $gdaffedu2;  ?></td>
            <td><?php $gdaffedu3 = info_fetch_osireport('SI','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
            $gdaffedu4 = info_fetch_osireport('INSP/LR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
            $gdaffedu5 = info_fetch_osireport('INSP/CR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
            echo $gdaffedusi = $gdaffedu3 + $gdaffedu4 + $gdaffedu5;
              ?></td>
            <td><?php $gdaffedu6 = info_fetch_osireport('ASI','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
                $gdaffedu7 = info_fetch_osireport('SI/CR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');  
                $gdaffedu8 = info_fetch_osireport('SI/LR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10'); 
                echo $gdaffeduasi = $gdaffedu6 + $gdaffedu7 + $gdaffedu8; 

             ?></td>
            <td><?php $gdaffedu9 = info_fetch_osireport('HC','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                    $gdaffedu10 = info_fetch_osireport('ASI/LR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                     $gdaffedu11 = info_fetch_osireport('ASI/CR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
             echo $gdaffeduhc= $gdaffedu9 +  $gdaffedu10 + $gdaffedu11;  ?></td>
            <td><?php $gdaffedu12 = info_fetch_osireport('CT','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                       $gdaffedu13 = info_fetch_osireport('HC/PR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                        $gdaffedu14 = info_fetch_osireport('HC/LR','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                         $gdaffedu15 = info_fetch_osireport('Sr.Const','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');
                         $gdaffedu16 = info_fetch_osireport('C-II','GENERAL DUTY ,AVAILABLE FORCE FOR EMERGENT L&O DUTY','awbone10');

             echo $gdaffeduct= $gdaffedu12 + $gdaffedu13 + $gdaffedu14 + $gdaffedu15 + $gdaffedu16;  ?></td>
            <td><?php echo $gdaffeduinsp + $gdaffedusi + $gdaffeduasi + $gdaffeduhc + $gdaffeduct;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>TRG. RESERVE AT BN.HQRS</td>
                <td><?php $trgresatbnhqrs1 = info_fetch_osireport('INSP','TRG. RESERVE AT BN.HQRS.','awbone11'); 
                      $trgresatbnhqrs2 = info_fetch_osireport('DSP/CR','TRG. RESERVE AT BN.HQRS.','awbone11'); 
                      echo $trgresatbnhqrsinsp = $trgresatbnhqrs1 + $trgresatbnhqrs2;  ?></td>
            <td><?php $trgresatbnhqrs3 = info_fetch_osireport('SI','TRG. RESERVE AT BN.HQRS.','awbone11');
            $trgresatbnhqrs4 = info_fetch_osireport('INSP/LR','TRG. RESERVE AT BN.HQRS.','awbone11'); 
            $trgresatbnhqrs5 = info_fetch_osireport('INSP/CR','TRG. RESERVE AT BN.HQRS.','awbone11'); 
            echo $trgresatbnhqrssi = $trgresatbnhqrs3 + $trgresatbnhqrs4 + $trgresatbnhqrs5;
              ?></td>
            <td><?php $trgresatbnhqrs6 = info_fetch_osireport('ASI,','TRG. RESERVE AT BN.HQRS.','awbone11'); 
                $trgresatbnhqrs7 = info_fetch_osireport('SI/CR','TRG. RESERVE AT BN.HQRS.','awbone11');  
                $trgresatbnhqrs8 = info_fetch_osireport('SI/LR','TRG. RESERVE AT BN.HQRS.','awbone11'); 
                echo $trgresatbnhqrsasi =  $trgresatbnhqrs6 + $trgresatbnhqrs7 + $trgresatbnhqrs8; 

             ?></td>
            <td><?php $trgresatbnhqrs9 = info_fetch_osireport('HC','TRG. RESERVE AT BN.HQRS.','awbone11');
                    $trgresatbnhqrs10 = info_fetch_osireport('ASI/LR','TRG. RESERVE AT BN.HQRS.','awbone11');
                     $trgresatbnhqrs11 = info_fetch_osireport('ASI/CR','TRG. RESERVE AT BN.HQRS.','awbone11');
             echo $trgresatbnhqrshc= $trgresatbnhqrs9 +  $trgresatbnhqrs10 + $trgresatbnhqrs11;  ?></td>
            <td><?php $trgresatbnhqrs12 = info_fetch_osireport('CT','TRG. RESERVE AT BN.HQRS.','awbone11');
                       $trgresatbnhqrs13 = info_fetch_osireport('HC/PR','TRG. RESERVE AT BN.HQRS.','awbone11');
                        $trgresatbnhqrs14 = info_fetch_osireport('HC/LR','TRG. RESERVE AT BN.HQRS.','awbone11');
                         $trgresatbnhqrs15 = info_fetch_osireport('Sr.Const','TRG. RESERVE AT BN.HQRS.','awbone11');
                         $trgresatbnhqrs16 = info_fetch_osireport('C-II','TRG. RESERVE AT BN.HQRS.','awbone11');

             echo $trgresatbnhqrsct= $trgresatbnhqrs12 + $trgresatbnhqrs13 + $trgresatbnhqrs14 + $trgresatbnhqrs15 + $trgresatbnhqrs16;  ?></td>
            <td><?php echo $trgresatbnhqrsinsp + $trgresatbnhqrssi + $trgresatbnhqrsasi + $trgresatbnhqrshc + $trgresatbnhqrsct;  ?></td>
                </tr>

                 <tr>
                  <td>xii)</td>
                  <td>OTHER DUTIES</td>
                <td><?php $otherduties1 = info_fetch_osireport('INSP','OTHER DUTIES','awbone12'); 
                      $otherduties2 = info_fetch_osireport('DSP/CR','OTHER DUTIES','awbone12'); 
                      echo $otherdutiesinsp = $otherduties1 + $otherduties2;  ?></td>

              <td><?php $otherduties3 = info_fetch_osireport('SI','OTHER DUTIES','awbone12');
                        $otherduties4 = info_fetch_osireport('INSP/LR','OTHER DUTIES','awbone12'); 
                        $otherduties5 = info_fetch_osireport('INSP/CR','OTHER DUTIES','awbone12'); 
              echo $otherdutiessi = $otherduties3 + $otherduties4 + $otherduties5;  ?></td>

              <td><?php $otherduties6 = info_fetch_osireport('ASI','OTHER DUTIES','awbone12');
                      $otherduties7 = info_fetch_osireport('SI/LR','OTHER DUTIES','awbone12');
                      $otherduties8 = info_fetch_osireport('SI/CR','OTHER DUTIES','awbone12');
              echo $otherdutiesasi= $otherduties6 +  $otherduties7 + $otherduties8; ?></td>


              <td><?php $otherduties9 = info_fetch_osireport('HC','OTHER DUTIES','awbone12');
                    $otherduties10 = info_fetch_osireport('ASI/LR','OTHER DUTIES','awbone12');
                     $otherduties11 = info_fetch_osireport('ASI/CR','OTHER DUTIES','awbone12');
                echo $otherdutieshc= $otherduties9 +  $otherduties10 + $otherduties11;  ?></td>
            
              <td><?php $otherduties12 = info_fetch_osireport('CT','OTHER DUTIES','awbone12');
                       $otherduties13 = info_fetch_osireport('HC/PR','OTHER DUTIES','awbone12');
                        $otherduties14 = info_fetch_osireport('HC/LR','OTHER DUTIES','awbone12');
                         $otherduties15 = info_fetch_osireport('Sr.Const','OTHER DUTIES','awbone12');
                         $otherduties16 = info_fetch_osireport('C-II','OTHER DUTIES','awbone12');

                echo $otherdutiesct= $otherduties12 + $otherduties13 + $otherduties14 + $otherduties15 + $otherduties16;  ?></td>
                <td><?php echo $otherdutiesinsp + $otherdutiessi + $otherdutiesasi + $otherdutieshc + $otherdutiesct;  ?></td>
                </tr>

                           
                 <tr>
                  <td></td>

                  <td>TOTAL</td>
                          <td><?php echo $phcsbkgbhoginsp  + $osiahoinsp +  $osinbnofficesinsp + $trademaninsp  + $armourerinsp + $mtsectioninsp + $qumasbranchlinestaffinsp + $gdaffeduinsp +  $trgresatbnhqrsinsp + $otherdutiesinsp; ?></td>
                  <td><?php echo $phcsbkgbhogsi  + $osiahosi +  $osinbnofficessi + $trademansi  + $armourersi + $mtsectionsi + $qumasbranchlinestaffsi + $gdaffedusi +  $trgresatbnhqrssi + $otherdutiessi;  ?></td>
                  <td><?php echo $phcsbkgbhogasi  + $osiahoasi +  $osinbnofficesasi + $trademanasi  + $armourerasi + $mtsectionasi + $qumasbranchlinestaffasi + $gdaffeduasi +  $trgresatbnhqrsasi + $otherdutiesasi;  ?></td>
                  <td><?php echo $phcsbkgbhoghc  + $osiahohc +  $osinbnofficeshc + $trademanhc  + $armourerhc + $mtsectionhc + $qumasbranchlinestaffhc + $gdaffeduhc +  $trgresatbnhqrshc + $otherdutieshc; ?></td>
                  <td><?php echo $phcsbkgbhogct  + $osiahoct +  $osinbnofficesct + $trademanct  + $armourerct + $mtsectionct + $qumasbranchlinestaffct + $gdaffeduct +  $trgresatbnhqrsct + $otherdutiesct;?></td>
                  <td><?php echo $box7 = $phcsbkgbhoginsp  + $osiahoinsp +  $osinbnofficesinsp + $trademaninsp  + $armourerinsp + $mtsectioninsp + $qumasbranchlinestaffinsp + $gdaffeduinsp +  $trgresatbnhqrsinsp + $otherdutiesinsp + $phcsbkgbhogsi  + $osiahosi +  $osinbnofficessi + $trademansi  + $armourersi + $mtsectionsi + $qumasbranchlinestaffsi + $gdaffedusi +  $trgresatbnhqrssi + $otherdutiessi + $phcsbkgbhogasi  + $osiahoasi +  $osinbnofficesasi + $trademanasi  + $armourerasi + $mtsectionasi + $qumasbranchlinestaffasi + $gdaffeduasi +  $trgresatbnhqrsasi + $otherdutiesasi + $phcsbkgbhoghc  + $osiahohc +  $osinbnofficeshc + $trademanhc  + $armourerhc + $mtsectionhc + $qumasbranchlinestaffhc + $gdaffeduhc +  $trgresatbnhqrshc + $otherdutieshc + $phcsbkgbhogct  + $osiahoct +  $osinbnofficesct + $trademanct  + $armourerct + $mtsectionct + $qumasbranchlinestaffct + $gdaffeduct +  $trgresatbnhqrsct + $otherdutiesct; ?>
                   </td>
                </tr>   
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3>8. MISC</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>

<table width="925" border="1">
  <tbody>
    <tr>
                  <td width="29">i)</td>
                  <td width="584">RECRUITS</td>
                 

                    <td width="52"><?php $recruits1 = info_fetch_osireport('INSP','RECRUIT','bmdone1'); 
                      $recruits2 = info_fetch_osireport('DSP/CR','RECRUIT','bmdone1'); 
                      echo $recruitsinsp = $recruits1 + $recruits2;  ?></td>
            <td width="51"><?php $recruits3 = info_fetch_osireport('SI','RECRUIT','bmdone1');
            $recruits4 = info_fetch_osireport('INSP/LR','RECRUIT','bmdone1'); 
            $recruits5 = info_fetch_osireport('INSP/CR','RECRUIT','bmdone1'); 
            echo $recruitssi = $recruits3 + $recruits4 + $recruits5;
              ?></td>
            <td width="41"><?php $recruits6 = info_fetch_osireport('ASI','RECRUIT','bmdone1'); 
                $recruits7 = info_fetch_osireport('SI/CR','RECRUIT','bmdone1');  
                $recruits8 = info_fetch_osireport('SI/LR','RECRUIT','bmdone1'); 
                echo $recruitsasi = $recruits6 + $recruits7 + $recruits8; 

             ?></td>
            <td width="45"><?php $recruits9 = info_fetch_osireport('HC','RECRUIT','bmdone1');
                    $recruits10 = info_fetch_osireport('ASI/LR','RECRUIT','bmdone1');
                     $recruits11 = info_fetch_osireport('ASI/CR','RECRUIT','bmdone1');
             echo $recruitshc= $recruits9 +  $recruits10 + $recruits11;  ?></td>
            <td width="43"><?php $recruits12 = info_fetch_osireport('CT','RECRUIT','bmdone1');
                       $recruits13 = info_fetch_osireport('HC/PR','RECRUIT','bmdone1');
                        $recruits14 = info_fetch_osireport('HC/LR','RECRUIT','bmdone1');
                         $recruits15 = info_fetch_osireport('Sr.Const','RECRUIT','bmdone1');
                         $recruits16 = info_fetch_osireport('C-II','RECRUIT','bmdone1');

             echo $recruitsct= $recruits1 + $recruits12 + $recruits13 + $recruits14 + $recruits16;  ?></td>
            <td width="28"><?php echo $recruitsinsp + $recruitssi + $recruitsasi + $recruitshc + $recruitsct;  ?></td>

                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>LEAVES</td>
                
                    <td><?php $leaves1 = info_fetch_osireports('INSP','','bmdone2'); 
                      $leaves2 = info_fetch_osireports('DSP/CR','','bmdone2'); 
                      echo $leavesinsp = $leaves1 + $leaves2;  ?></td>
            <td><?php $leaves3 = info_fetch_osireports('SI','','bmdone2');
            $leaves4 = info_fetch_osireports('INSP/LR','','bmdone2'); 
            $leaves5 = info_fetch_osireports('INSP/CR','','bmdone2'); 
            echo $leavessi = $leaves3 + $leaves4 + $leaves5;
              ?></td>
            <td><?php $leaves6 = info_fetch_osireports('ASI','','bmdone2'); 
                $leaves7 = info_fetch_osireports('SI/CR','','bmdone2');  
                $leaves8 = info_fetch_osireports('SI/LR','','bmdone2'); 
                echo $leavesasi = $leaves6 + $leaves7 + $leaves8; 

             ?></td>
            <td><?php $leaves9 = info_fetch_osireports('HC','','bmdone2');
                    $leaves10 = info_fetch_osireports('ASI/LR','','bmdone2');
                     $leaves11 = info_fetch_osireports('ASI/CR','','bmdone2');
             echo $leaveshc= $leaves9 +  $leaves10 + $leaves11;  ?></td>
            <td><?php $leaves12 = info_fetch_osireports('CT','','bmdone2');
                       $leaves13 = info_fetch_osireports('HC/PR','','bmdone2');
                        $leaves14 = info_fetch_osireports('HC/LR','','bmdone2');
                         $leaves15 = info_fetch_osireports('Sr.Const','','bmdone2');
                         $leaves16 = info_fetch_osireports('C-II','','bmdone2');

             echo $leavesct= $leaves12 + $leaves13 + $leaves14 + $leaves15 + $leaves16;  ?></td>
            <td><?php echo $leavesinsp + $leavessi + $leavesasi + $leaveshc + $leavesct;  ?></td>

                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ABSENT</td>
                <td><?php $absent1 = info_fetch_osireport('INSP','ABSENT','bmdone3'); 
                      $absent2 = info_fetch_osireport('DSP/CR','ABSENT','bmdone3'); 
                      echo $absentinsp = $absent1 + $absent2;  ?></td>
            <td><?php $absent3 = info_fetch_osireport('SI','ABSENT','bmdone3');
            $absent4 = info_fetch_osireport('INSP/LR','ABSENT','bmdone3'); 
            $absent5 = info_fetch_osireport('INSP/CR','ABSENT','bmdone3'); 
            echo $absentsi = $absent3 + $absent4 + $absent5;
              ?></td>
            <td><?php $absent6 = info_fetch_osireport('ASI','ABSENT','bmdone3'); 
                $absent7 = info_fetch_osireport('SI/CR','ABSENT','bmdone3');  
                $absent8 = info_fetch_osireport('SI/LR','ABSENT','bmdone3'); 
                echo $absentasi = $absent6 + $absent7 + $absent8; 

             ?></td>
            <td><?php $absent9 = info_fetch_osireport('HC','ABSENT','bmdone3');
                    $absent10 = info_fetch_osireport('ASI/LR','ABSENT','bmdone3');
                     $absent11 = info_fetch_osireport('ASI/CR','ABSENT','bmdone3');
             echo $absenthc = $absent9 +  $absent10 + $absent11;  ?></td>
            <td><?php $absent12 = info_fetch_osireport('CT','ABSENT','bmdone3');
                       $absent13 = info_fetch_osireport('HC/PR','ABSENT','bmdone3');
                        $absent14 = info_fetch_osireport('HC/LR','ABSENT','bmdone3');
                         $absent15 = info_fetch_osireport('Sr.Const','ABSENT','bmdone3');
                         $absent16 = info_fetch_osireport('C-II','ABSENT','bmdone3');

             echo $absentct= $absent12 + $absent13 + $absent14 + $absent15 + $absent16;  ?></td>
            <td><?php echo $absentinsp + $absentsi + $absentasi + $absenthc + $absentct;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>UNDER SUSPENTION</td>

                         <td><?php $undersuspection1 = info_fetch_osireport('INSP','UNDER SUSPENSION','bmdone4'); 
                      $undersuspection2 = info_fetch_osireport('DSP/CR','UNDER SUSPENSION','bmdone4'); 
                      echo $undersuspectioninsp = $undersuspection1 + $undersuspection2;  ?></td>
            <td><?php $undersuspection3 = info_fetch_osireport('SI','UNDER SUSPENSION','bmdone4');
            $undersuspection4 = info_fetch_osireport('INSP/LR','UNDER SUSPENSION','bmdone4'); 
            $undersuspection5 = info_fetch_osireport('INSP/CR','UNDER SUSPENSION','bmdone4'); 
            echo $undersuspectionsi = $undersuspection3 + $undersuspection4 + $undersuspection5;
              ?></td>
            <td><?php $undersuspection6 = info_fetch_osireport('ASI','UNDER SUSPENSION','bmdone4'); 
                $undersuspection7 = info_fetch_osireport('SI/CR','UNDER SUSPENSION','bmdone4');  
                $undersuspection8 = info_fetch_osireport('SI/LR','UNDER SUSPENSION','bmdone4'); 
                echo $undersuspectionasi =  $undersuspection6 + $undersuspection7 + $undersuspection8; 

             ?></td>
            <td><?php $undersuspection9 = info_fetch_osireport('HC','UNDER SUSPENSION','bmdone4');
                    $undersuspection10 = info_fetch_osireport('ASI/LR','UNDER SUSPENSION','bmdone4');
                     $undersuspection11 = info_fetch_osireport('ASI/CR','UNDER SUSPENSION','bmdone4');
             echo $undersuspectionhc= $undersuspection9 +  $undersuspection10 + $undersuspection11;  ?></td>
            <td><?php $undersuspection12 = info_fetch_osireport('CT','UNDER SUSPENSION','bmdone4');
                       $undersuspection13 = info_fetch_osireport('HC/PR','UNDER SUSPENSION','bmdone4');
                        $undersuspection14 = info_fetch_osireport('HC/LR','UNDER SUSPENSION','bmdone4');
                         $undersuspection15 = info_fetch_osireport('Sr.Const','UNDER SUSPENSION','bmdone4');
                         $undersuspection16 = info_fetch_osireport('C-II','UNDER SUSPENSION','bmdone4');

             echo $undersuspectionct= $undersuspection12 + $undersuspection13 + $undersuspection14 + $undersuspection15 + $undersuspection16;  ?></td>
            <td><?php echo $undersuspectioninsp + $undersuspectionsi + $undersuspectionasi + $undersuspectionhc + $undersuspectionct;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>HANDICAPPED ON MEDICAL REST</td>
                 
                         <td><?php $handionmedrest1 = info_fetch_osireport('INSP','Handicapped on Medical Rest','bmdone5'); 
                      $handionmedrest2 = info_fetch_osireport('DSP/CR','Handicapped on Medical Rest','bmdone5'); 
                      echo $handionmedrestinsp = $handionmedrest1 + $handionmedrest2;  ?></td>
            <td><?php $handionmedrest3 = info_fetch_osireport('SI','Handicapped on Medical Rest','bmdone5');
            $handionmedrest4 = info_fetch_osireport('INSP/LR','Handicapped on Medical Rest','bmdone5'); 
            $handionmedrest5 = info_fetch_osireport('INSP/CR','Handicapped on Medical Rest','bmdone5'); 
            echo $handionmedrestsi =  $handionmedrest3 + $handionmedrest4 + $handionmedrest5;
              ?></td>
            <td><?php $handionmedrest6 = info_fetch_osireport('ASI','Handicapped on Medical Rest','bmdone5'); 
                $handionmedrest7 = info_fetch_osireport('SI/CR','Handicapped on Medical Rest','bmdone5');  
                $handionmedrest8 = info_fetch_osireport('SI/LR','Handicapped on Medical Rest','bmdone5'); 
                echo $handionmedrestasi =  $handionmedrest6 + $handionmedrest7 + $handionmedrest8; 

             ?></td>
            <td><?php $handionmedrest9 = info_fetch_osireport('HC','Handicapped on Medical Rest','bmdone5');
                    $handionmedrest10 = info_fetch_osireport('ASI/LR','Handicapped on Medical Rest','bmdone5');
                     $handionmedrest11 = info_fetch_osireport('ASI/CR','Handicapped on Medical Rest','bmdone5');
             echo $handionmedresthc = $handionmedrest9 +  $handionmedrest10 + $handionmedrest11;  ?></td>
            <td><?php $handionmedrest12 = info_fetch_osireport('CT','Handicapped on Medical Rest','bmdone5');
                       $handionmedrest13 = info_fetch_osireport('HC/PR','Handicapped on Medical Rest','bmdone5');
                        $handionmedrest14 = info_fetch_osireport('HC/LR','Handicapped on Medical Rest','bmdone5');
                         $handionmedrest15 = info_fetch_osireport('Sr.Const','Handicapped on Medical Rest','bmdone5');
                         $handionmedrest16 = info_fetch_osireport('C-II','Handicapped on Medical Rest','bmdone5');

             echo $handionmedrestct= $handionmedrest12 + $handionmedrest13 + $handionmedrest14 + $handionmedrest15 + $handionmedrest15;  ?></td>
            <td><?php echo $handionmedrestinsp + $handionmedrestsi + $handionmedrestasi + $handionmedresthc + $handionmedrestct;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>HANDICAPPED ON LIGHT DUTY</td>

             <td><?php $handionlightduty1 = info_fetch_osireport('INSP','Handicapped on light duty','bmdone6'); 
                      $handionlightduty2 = info_fetch_osireport('DSP/CR','Handicapped on light duty','bmdone6'); 
                      echo $handionlightdutyinsp = $handionlightduty1 + $handionlightduty2;  ?></td>
            <td><?php $handionlightduty3 = info_fetch_osireport('SI','Handicapped on light duty','bmdone6');
            $handionlightduty4 = info_fetch_osireport('INSP/LR','Handicapped on light duty','bmdone6'); 
            $handionlightduty5 = info_fetch_osireport('INSP/CR','Handicapped on light duty','bmdone6'); 
            echo $handionlightdutysi = $handionlightduty3 + $handionlightduty4 + $handionlightduty5;
              ?></td>
            <td><?php $handionlightduty6 = info_fetch_osireport('ASI','Handicapped on light duty','bmdone6'); 
                $handionlightduty7 = info_fetch_osireport('SI/CR','Handicapped on light duty','bmdone6');  
                $handionlightduty8 = info_fetch_osireport('SI/LR','Handicapped on light duty','bmdone6'); 
                echo $handionlightdutyasi = $handionlightduty6 + $handionlightduty7 + $handionlightduty8; 

             ?></td>
            <td><?php $handionlightduty9 = info_fetch_osireport('HC','Handicapped on light duty','bmdone6');
                    $handionlightduty10 = info_fetch_osireport('ASI/LR','Handicapped on light duty','bmdone6');
                     $handionlightduty11 = info_fetch_osireport('ASI/CR','Handicapped on light duty','bmdone6');
             echo $handionlightdutyhc = $handionlightduty9 +  $handionlightduty10 + $handionlightduty11;  ?></td>
            <td><?php $handionlightduty12 = info_fetch_osireport('CT','Handicapped on light duty','bmdone6');
                       $handionlightduty13 = info_fetch_osireport('HC/PR','Handicapped on light duty','bmdone6');
                        $handionlightduty14 = info_fetch_osireport('HC/LR','Handicapped on light duty','bmdone6');
                         $handionlightduty15 = info_fetch_osireport('Sr.Const','Handicapped on light duty','bmdone6');
                         $handionlightduty16 = info_fetch_osireport('C-II','Handicapped on light duty','bmdone6');

             echo $handionlightdutyct= $handionlightduty12 + $handionlightduty13 + $handionlightduty14 + $handionlightduty15 + $handionlightduty16;  ?></td>
            <td><?php echo $handionlightdutyinsp + $handionlightdutysi + $handionlightdutyasi + $handionlightdutyhc + $handionlightdutyct;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>CHRONIC ON MEDICAL REST</td>
                                           <td><?php $chonmedrest1 = info_fetch_osireport('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $chonmedrest2 = info_fetch_osireport('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $chonmedrestinsp = $chonmedrest1 + $chonmedrest2;  ?></td>
            <td><?php $chonmedrest3 = info_fetch_osireport('SI','Chronic Disease on Medical Rest','bmdone7');
            $chonmedrest4 = info_fetch_osireport('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $chonmedrest5 = info_fetch_osireport('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $chonmedrestsi = $chonmedrest3 + $chonmedrest4 + $chonmedrest5;
              ?></td>
            <td><?php $chonmedrest6 = info_fetch_osireport('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $chonmedrest7 = info_fetch_osireport('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $chonmedrest8 = info_fetch_osireport('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $chonmedrestasi =  $chonmedrest6 + $chonmedrest7 + $chonmedrest8; 

             ?></td>
            <td><?php $chonmedrest9 = info_fetch_osireport('HC','Chronic Disease on Medical Rest','bmdone7');
                    $chonmedrest10 = info_fetch_osireport('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $chonmedrest11 = info_fetch_osireport('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $chonmedresthc = $chonmedrest9 +  $chonmedrest10 + $chonmedrest11;  ?></td>
            <td><?php $chonmedrest12 = info_fetch_osireport('CT','Chronic Disease on Medical Rest','bmdone7');
                       $chonmedrest13 = info_fetch_osireport('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $chonmedrest14 = info_fetch_osireport('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                        $chonmedrest15 = info_fetch_osireport('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $chonmedrest16 = info_fetch_osireport('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $chonmedrestct = $chonmedrest12 + $chonmedrest13 + $chonmedrest14 + $chonmedrest15 + $chonmedrest16;  ?></td>
            <td><?php echo $chonmedrestinsp + $chonmedrestsi + $chonmedrestasi + $chonmedresthc + $chonmedrestct;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>CHRONIC ON LIGHT DUTY</td> 
               
                          <td><?php $chroonliduty1 = info_fetch_osireport('INSP','Chronic Disease on light duty','bmdone8'); 
                      $chroonliduty2 = info_fetch_osireport('DSP/CR','Chronic Disease on light duty','bmdone8'); 
                      echo $chroonlidutyinsp = $chroonliduty1 + $chroonliduty2;  ?></td>
            <td><?php $chroonliduty3 = info_fetch_osireport('SI','Chronic Disease on light duty','bmdone8');
            $chroonliduty4 = info_fetch_osireport('INSP/LR','Chronic Disease on light duty','bmdone8'); 
            $chroonliduty5 = info_fetch_osireport('INSP/CR','Chronic Disease on light duty','bmdone8'); 
            echo $chroonlidutysi = $chroonliduty3 + $chroonliduty4 + $chroonliduty5;
              ?></td>
            <td><?php $chroonliduty6 = info_fetch_osireport('ASI','Chronic Disease on light duty','bmdone8'); 
                $chroonliduty7 = info_fetch_osireport('SI/CR','Chronic Disease on light duty','bmdone8');  
                $chroonliduty8 = info_fetch_osireport('SI/LR','Chronic Disease on light duty','bmdone8'); 
                echo $chroonlidutyasi = $chroonliduty6 + $chroonliduty7 + $chroonliduty8; 

             ?></td>
            <td><?php $chroonliduty9 = info_fetch_osireport('HC','Chronic Disease on light duty','bmdone8');
                    $chroonliduty10 = info_fetch_osireport('ASI/LR','Chronic Disease on light duty','bmdone8');
                     $chroonliduty11 = info_fetch_osireport('ASI/CR','Chronic Disease on light duty','bmdone8');
             echo $chroonlidutyhc = $chroonliduty9 +  $chroonliduty10 + $chroonliduty11;  ?></td>
            <td><?php $chroonliduty12 = info_fetch_osireport('CT','Chronic Disease on light duty','bmdone8');
                       $chroonliduty13 = info_fetch_osireport('HC/PR','Chronic Disease on light duty','bmdone8');
                        $chroonliduty14 = info_fetch_osireport('HC/LR','Chronic Disease on light duty','bmdone8');
                        $chroonliduty15 = info_fetch_osireport('Sr.Const','Chronic Disease on light duty','bmdone8');
                         $chroonliduty16 = info_fetch_osireport('C-II','Chronic Disease on light duty','bmdone8');

             echo $chroonlidutyct=  $chroonliduty12 + $chroonliduty13 + $chroonliduty14 + $chroonliduty15 + $chroonliduty16;  ?></td>
            <td><?php echo $chroonlidutyinsp + $chroonlidutysi + $chroonlidutyasi + $chroonlidutyhc + $chroonlidutyct;  ?></td>

                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>OSD ETC.</td>
                   <td><?php $osdetc1 = info_fetch_osireport('INSP','OSD ETC','bmdone9'); 
                      $osdetc2 = info_fetch_osireport('DSP/CR','OSD ETC','bmdone9'); 
                      echo $osdetcinsp = $osdetc1 + $osdetc2;  ?></td>
            <td><?php $osdetc3 = info_fetch_osireport('SI','OSD ETC','bmdone9');
            $osdetc4 = info_fetch_osireport('INSP/LR','OSD ETC','bmdone9'); 
            $osdetc5 = info_fetch_osireport('INSP/CR','OSD ETC','bmdone9'); 
            echo $osdetcsi = $osdetc3 + $osdetc4 + $osdetc5;
              ?></td>
            <td><?php $osdetc6 = info_fetch_osireport('ASI','OSD ETC','bmdone9'); 
                $osdetc7 = info_fetch_osireport('SI/CR','OSD ETC','bmdone9');  
                $osdetc8 = info_fetch_osireport('SI/LR','OSD ETC','bmdone9'); 
                echo $osdetcasi=  $osdetc6 + $osdetc7 + $osdetc8; 

             ?></td>
            <td><?php $osdetc9 = info_fetch_osireport('HC','OSD ETC','bmdone9');
                    $osdetc10 = info_fetch_osireport('ASI/LR','OSD ETC','bmdone9');
                     $osdetc11 = info_fetch_osireport('ASI/CR','OSD ETC','bmdone9');
             echo $osdetchc = $osdetc9 +  $osdetc10 + $osdetc11;  ?></td>
            <td><?php $osdetc12 = info_fetch_osireport('CT','OSD ETC','bmdone9');
                       $osdetc13 = info_fetch_osireport('HC/PR','OSD ETC','bmdone9');
                        $osdetc14 = info_fetch_osireport('HC/LR','OSD ETC','bmdone9');
                         $osdetc15 = info_fetch_osireport('Sr.Const','OSD ETC','bmdone9');
                         $osdetc16 = info_fetch_osireport('C-II','OSD ETC','bmdone9');

             echo $osdetcct= $osdetc12 + $osdetc13 + $osdetc14 + $osdetc15 + $osdetc16;  ?></td>
            <td><?php echo $osdetcinsp + $osdetcsi + $osdetcasi + $osdetchc + $osdetcct;  ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo  $recruitsinsp + $leavesinsp + $absentinsp + $undersuspectioninsp + $handionmedrestinsp + $handionlightdutyinsp + $chonmedrestinsp + $chroonlidutyinsp + $osdetcinsp; ?></td>
                  <td><?php echo  $recruitssi + $leavessi + $absentsi + $undersuspectionsi + $handionmedrestsi + $handionlightdutysi + $chonmedrestsi + $chroonlidutysi + $osdetcsi;  ?></td>
                  <td><?php echo $recruitsasi + $leavesasi + $absentasi + $undersuspectionasi + $handionmedrestasi + $handionlightdutyasi + $chonmedrestasi + $chroonlidutyasi + $osdetcasi;  ?></td>
                  <td><?php echo $recruitshc + $leaveshc + $absenthc + $undersuspectionhc + $handionmedresthc + $handionlightdutyhc + $chonmedresthc + $chroonlidutyhc + $osdetchc; ?></td>
                  <td><?php echo  $recruitsct + $leavesct + $absentct + $undersuspectionct + $handionmedrestct + $handionlightdutyct + $chonmedrestct + $chroonlidutyct + $osdetcct;?></td>
                  <td><?php echo  $recruitsinsp + $leavesinsp + $absentinsp + $undersuspectioninsp + $handionmedrestinsp + $handionlightdutyinsp + $chonmedrestinsp + $chroonlidutyinsp + $osdetcinsp + $recruitssi + $leavessi + $absentsi + $undersuspectionsi + $handionmedrestsi + $handionlightdutysi + $chonmedrestsi + $chroonlidutysi + $osdetcsi + $recruitsasi + $leavesasi + $absentasi + $undersuspectionasi + $handionmedrestasi + $handionlightdutyasi + $chonmedrestasi + $chroonlidutyasi + $osdetcasi + $recruitshc + $leaveshc + $absenthc + $undersuspectionhc + $handionmedresthc + $handionlightdutyhc + $chonmedresthc + $chroonlidutyhc + $osdetchc + $recruitsct + $leavesct + $absentct + $undersuspectionct + $handionmedrestct + $handionlightdutyct + $chonmedrestct + $chroonlidutyct + $osdetcct; ?>
                   </td>
                </tr>   
  </tbody>

</table>

<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 9. INSTITUTIONS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>

                          
            <table width="925" border="1">
              <tbody>
                <tr>
                  <td width="31">i)</td>
                  <td width="586">PAP HQRS INSTITUTIONS</td>
                   

                   <td width="49"><?php $paphqrsinstitutions1 = info_fetch_osireports('INSP','','instone10'); 
                      $paphqrsinstitutions2 = info_fetch_osireports('DSP/CR','','instone10'); 
                      echo $paphqrsinstitutionsinsp= $paphqrsinstitutions1 + $paphqrsinstitutions2;  ?></td>
            <td width="52"><?php $paphqrsinstitutions3 = info_fetch_osireports('SI','','instone10');
            $paphqrsinstitutions4 = info_fetch_osireports('INSP/LR','','instone10'); 
            $paphqrsinstitutions5 = info_fetch_osireports('INSP/CR','','instone10'); 
            echo $paphqrsinstitutionssi = $paphqrsinstitutions3 + $paphqrsinstitutions4 + $paphqrsinstitutions5;
              ?></td>
            <td width="40"><?php $paphqrsinstitutions6 = info_fetch_osireports('ASI','','instone10'); 
                $paphqrsinstitutions7 = info_fetch_osireports('SI/CR','','instone10');  
                $paphqrsinstitutions8 = info_fetch_osireports('SI/LR','','instone10'); 
                echo $paphqrsinstitutionsasi =  $paphqrsinstitutions6 + $paphqrsinstitutions7 + $paphqrsinstitutions8; 

             ?></td>
            <td width="46"><?php $paphqrsinstitutions9 = info_fetch_osireports('HC','','instone10');
                    $paphqrsinstitutions10 = info_fetch_osireports('ASI/LR','','instone10');
                     $paphqrsinstitutions11 = info_fetch_osireports('ASI/CR','','instone10');
             echo $paphqrsinstitutionshc= $paphqrsinstitutions9 +  $paphqrsinstitutions10 + $paphqrsinstitutions11;  ?></td>
            <td width="41"><?php $paphqrsinstitutions12 = info_fetch_osireports('CT','','instone10');
                       $paphqrsinstitutions13 = info_fetch_osireports('HC/PR','','instone10');
                        $paphqrsinstitutions14 = info_fetch_osireports('HC/LR','','instone10');
                         $paphqrsinstitutions15 = info_fetch_osireports('Sr.Const','','instone10');
                         $paphqrsinstitutions16 = info_fetch_osireports('C-II','','instone10');

             echo $paphqrsinstitutionsct= $paphqrsinstitutions12 + $paphqrsinstitutions13 + $paphqrsinstitutions14 + $paphqrsinstitutions15 + $paphqrsinstitutions16;  ?></td>
            <td width="28"><?php echo $paphqrsinstitutionsinsp + $paphqrsinstitutionssi + $paphqrsinstitutionsasi + $paphqrsinstitutionshc + $paphqrsinstitutionsct;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CDO INSTITUTIONS</td>
                  
                           <td><?php $cdoinstitutes1 = info_fetch_osireport('INSP','CDO Institutions','instone2'); 
                      $cdoinstitutes2 = info_fetch_osireport('DSP/CR','CDO Institutions','instone2'); 
                      echo $cdoinstitutesinsp= $cdoinstitutes1 + $cdoinstitutes2;  ?></td>
            <td><?php $cdoinstitutes3 = info_fetch_osireport('SI','CDO Institutions','instone2');
            $cdoinstitutes4 = info_fetch_osireport('INSP/LR','CDO Institutions','instone2'); 
            $cdoinstitutes5 = info_fetch_osireport('INSP/CR','CDO Institutions','instone2'); 
            echo $cdoinstitutessi = $cdoinstitutes3 + $cdoinstitutes4 + $cdoinstitutes5;
              ?></td>
            <td><?php $cdoinstitutes6 = info_fetch_osireport('ASI','CDO Institutions','instone2'); 
                $cdoinstitutes7 = info_fetch_osireport('SI/CR','CDO Institutions','instone2');  
                $cdoinstitutes8 = info_fetch_osireport('SI/LR','CDO Institutions','instone2'); 
                echo  $cdoinstitutesasi = $cdoinstitutes6 + $cdoinstitutes7 + $cdoinstitutes8; 

             ?></td>
            <td><?php $cdoinstitutes9 = info_fetch_osireport('HC','CDO Institutions','instone2');
                    $cdoinstitutes10 = info_fetch_osireport('ASI/LR','CDO Institutions','instone2');
                     $cdoinstitutes11 = info_fetch_osireport('ASI/CR','CDO Institutions','instone2');
             echo $cdoinstituteshc= $cdoinstitutes9 +  $cdoinstitutes10 + $cdoinstitutes11;  ?></td>
            <td><?php $cdoinstitutes12 = info_fetch_osireport('CT','CDO Institutions','instone2');
                       $cdoinstitutes13 = info_fetch_osireport('HC/PR','CDO Institutions','instone2');
                        $cdoinstitutes14 = info_fetch_osireport('HC/LR','CDO Institutions','instone2');
                         $cdoinstitutes15 = info_fetch_osireport('Sr.Const','CDO Institutions','instone2');
                         $cdoinstitutes16 = info_fetch_osireport('C-II','CDO Institutions','instone2');

             echo $cdoinstitutesct=  $cdoinstitutes12 + $cdoinstitutes13 + $cdoinstitutes14 + $cdoinstitutes15 + $cdoinstitutes16;  ?></td>
            <td><?php echo $cdoinstitutesinsp + $cdoinstitutessi + $cdoinstitutesasi + $cdoinstituteshc + $cdoinstitutesct;  ?></td>


            
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>IRBN. INSTITUTIONS</td>

     
             <td><?php $irbninstition1 = info_fetch_osireport('INSP','IRB Institutions','instone1'); 
                      $irbninstition2 = info_fetch_osireport('DSP/CR','IRB Institutions','instone1'); 
                      echo $irbninstitioninsp= $irbninstition1 + $irbninstition2;  ?></td>
            <td><?php $irbninstition3 = info_fetch_osireport('SI','IRB Institutions','instone1');
            $irbninstition4 = info_fetch_osireport('INSP/LR','IRB Institutions','instone1'); 
            $irbninstition5 = info_fetch_osireport('INSP/CR','IRB Institutions','instone1'); 
            echo $irbninstitionsi = $irbninstition3 + $irbninstition4 + $irbninstition5;
              ?></td>
            <td><?php $irbninstition6 = info_fetch_osireport('ASI','IRB Institutions','instone1'); 
                $irbninstition7 = info_fetch_osireport('SI/CR','IRB Institutions','instone1');  
                $irbninstition8 = info_fetch_osireport('SI/LR','IRB Institutions','instone1'); 
                echo $irbninstitionasi = $irbninstition6 + $irbninstition7 + $irbninstition8; 

             ?></td>
            <td><?php $irbninstition9 = info_fetch_osireport('HC','IRB Institutions','instone1');
                    $irbninstition10 = info_fetch_osireport('ASI/LR','IRB Institutions','instone1');
                     $irbninstition11 = info_fetch_osireport('ASI/CR','IRB Institutions','instone1');
             echo $irbninstitionhc = $irbninstition9 +  $irbninstition10 + $irbninstition11;  ?></td>
            <td><?php $irbninstition12 = info_fetch_osireport('CT','IRB Institutions','instone1');
                       $irbninstition13 = info_fetch_osireport('HC/PR','IRB Institutions','instone1');
                        $irbninstition14 = info_fetch_osireport('HC/LR','IRB Institutions','instone1');
                         $irbninstition15 = info_fetch_osireport('Sr.Const','IRB Institutions','instone1');
                         $irbninstition16 = info_fetch_osireport('C-II','IRB Institutions','instone1');

             echo $irbninstitionct = $irbninstition12 + $irbninstition13 + $irbninstition14 + $irbninstition15 + $irbninstition16;  ?></td>
            <td><?php echo $irbninstitioninsp + $irbninstitionsi + $irbninstitionasi + $irbninstitionhc + $irbninstitionct;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>PAP OUTER BNS. INSTITUTIONS</td>
                 <td><?php $papobinstitutes1 = info_fetch_osireport('INSP','PAP Outer Bn Institutions','instone3'); 
                      $papobinstitutes2 = info_fetch_osireport('DSP/CR','PAP Outer Bn Institutions','instone3'); 
                      echo $papobinstitutesinsp=  $papobinstitutes1 + $papobinstitutes2;  ?></td>

            <td><?php $papobinstitutes3 = info_fetch_osireport('SI','PAP Outer Bn Institutions','instone3');
            $papobinstitutes4 = info_fetch_osireport('INSP/LR','PAP Outer Bn Institutions','instone3'); 
            $papobinstitutes5 = info_fetch_osireport('INSP/CR','PAP Outer Bn Institutions','instone3'); 
            echo $papobinstitutessi = $papobinstitutes3 + $papobinstitutes4 + $papobinstitutes5;
              ?></td>

            <td><?php $papobinstitutes6 = info_fetch_osireport('ASI','PAP Outer Bn Institutions','instone3'); 
                $papobinstitutes7 = info_fetch_osireport('SI/CR','PAP Outer Bn Institutions','instone3');  
                $papobinstitutes8 = info_fetch_osireport('SI/LR','PAP Outer Bn Institutions','instone3'); 
                echo $papobinstitutesasi = $papobinstitutes6 + $papobinstitutes7 + $papobinstitutes8; 

             ?></td>
            <td><?php $papobinstitutes9 = info_fetch_osireport('HC','PAP Outer Bn Institutions','instone3');
                    $papobinstitutes10 = info_fetch_osireport('ASI/LR','PAP Outer Bn Institutions','instone3');
                     $papobinstitutes11 = info_fetch_osireport('ASI/CR','PAP Outer Bn Institutions','instone3');
             echo $papobinstituteshc  = $papobinstitutes9 +  $papobinstitutes10 + $papobinstitutes11;  ?></td>
            <td><?php $papobinstitutes12 = info_fetch_osireport('CT','PAP Outer Bn Institutions','instone3');
                       $papobinstitutes13 = info_fetch_osireport('HC/PR','PAP Outer Bn Institutions','instone3');
                        $papobinstitutes14 = info_fetch_osireport('HC/LR','PAP Outer Bn Institutions','instone3');
                         $papobinstitutes15 = info_fetch_osireport('Sr.Const','PAP Outer Bn Institutions','instone3');
                         $papobinstitutes16 = info_fetch_osireport('C-II','PAP Outer Bn Institutions','instone3');

             echo  $papobinstitutesct= $papobinstitutes12 + $papobinstitutes13 + $papobinstitutes14 + $papobinstitutes15 + $papobinstitutes16;  ?></td>
            <td><?php echo $papobinstitutesinsp + $papobinstitutessi + $papobinstitutesasi + $papobinstituteshc + $papobinstitutesct;  ?></td>
                </tr>
                <tr>
                  <td></td>

                  
                  <td>TOTAL</td>
                          <td><?php echo  $paphqrsinstitutionsinsp + $cdoinstitutesinsp + $irbninstitioninsp + $papobinstitutesinsp; ?></td>
                  <td><?php echo  $paphqrsinstitutionssi + $cdoinstitutessi + $irbninstitionsi + $papobinstitutessi;  ?></td>
                  <td><?php echo $paphqrsinstitutionsasi + $cdoinstitutesasi + $irbninstitionasi + $papobinstitutesasi;  ?></td>
                  <td><?php echo $paphqrsinstitutionshc + $cdoinstituteshc + $irbninstitionhc + $papobinstituteshc; ?></td>
                  <td><?php echo $paphqrsinstitutionsct + $cdoinstitutesct + $irbninstitionct + $papobinstitutesct;?></td>
                  <td><?php echo  $paphqrsinstitutionsinsp + $cdoinstitutesinsp + $irbninstitioninsp + $papobinstitutesinsp + $paphqrsinstitutionssi + $cdoinstitutessi + $irbninstitionsi + $papobinstitutessi + $paphqrsinstitutionsasi + $cdoinstitutesasi + $irbninstitionasi + $papobinstitutesasi + $paphqrsinstitutionshc + $cdoinstituteshc + $irbninstitionhc + $papobinstituteshc + $paphqrsinstitutionsct + $cdoinstitutesct + $irbninstitionct + $papobinstitutesct; ?>
                   </td>
                </tr>   

                            <tr>
                  <td></td>
                  <td><strong>GTOTAL</strong></td>
                  <td><?php echo $g1 =  $vpgisp + $jailsecinsp + $pphscinsp + $dbsdinsp + $otstguinsp + $pgfbotaoinsp + $vswcuebinsp + $pswcutbinsp + $banksdinsp + $spucmsecinsp + $pbbndsdyinsp + $pbbndresinsp + $permanentdutyinsp + $dgpreserveinsp + $trgedreserveinsp + $antiroitpojalinsp + $antiroitpomansainsp + $antiroitpomukastsarinsp + $sdrfteamjalinsp + $splstrikgroupinsp +
                  $swatreamfcdoinsp + $disttmohaliinsp + $dppmarkinmaleinsp + $dipmarkinfemaleinsp + $dispolothmaleinsp + $dispolothfemaleinsp + $cpoattachundertbninsp + $pbpoloffinstsecttchginsp + $nricellmohaliinsp + $intwinginsp + $centralpollinemohaliinsp + $vigbureauinsp + $sbcbinsp + $mairimmdutyinsp+ $phrcinsp + $burofinvestigationinsp + $spectaskforcestfinsp + $ppssocinsp + $rtcpapjalinsp + $istcpapkapinsp + $drillstaffinsp + $lawstaffinsp + $pctsbhgpatialainsp + $rtcladdakithisangrurinsp + $ppaphillaurinsp + $prtcjahankhelaninsp + $erssinsp + $basictraininginsp + $promotionalcoursinsp + $departmentcourseinsp + 
                  $dsoinsp + $censportoffjalinsp + $nispatialainsp + $othersportsinsp +
                  $phcsbkgbhoginsp  + $osiahoinsp +  $osinbnofficesinsp + $trademaninsp  + $armourerinsp + $mtsectioninsp + $qumasbranchlinestaffinsp + $gdaffeduinsp +  $trgresatbnhqrsinsp + $otherdutiesinsp + $recruitsinsp + $leavesinsp + $absentinsp + $undersuspectioninsp + $handionmedrestinsp + $handionlightdutyinsp + $chonmedrestinsp + $chroonlidutyinsp + $osdetcinsp + $paphqrsinstitutionsinsp + $cdoinstitutesinsp + $irbninstitioninsp + $papobinstitutesinsp + $sogbhgptlspopsgroupinsp + $uavteaminsp;  ?></td>

 

                  <td><?php echo $g2 = $vpgsi + $jailsecsi + $pphscisi + $dbsdsi + $otstgusi + $pgfbotaosi + $vswcuebsi + $pswcutbsi + $banksdsi + $spucmsecsi + $pbbndsdysi + $pbbndressi + $permanentdutysi + $dgpreservesi + $trgedreservesi + $antiroitpojalsi + $antiroitpomansasi + $antiroitpomukastsarsi + $sdrfteamjalsi + $splstrikgroupsi +
                  $swatreamfcdosi + $disttmohalisi + $dppmarkinmalesi + $dipmarkinfemalesi + $dispolothmalesi + $dispolothfemalesi + $cpoattachundertbnsi + $pbpoloffinstsecttchgsi + $nricellmohalisi + $intwingsi + $centralpollinemohalisi + $vigbureausi + $sbcbsi + $mairimmdutysi + $phrcsi + $burofinvestigationsi + $spectaskforcestfsi + $ppssocsi + $rtcpapjalsi + $istcpapkapsi + $drillstaffsi + $lawstaffsi + $pctsbhgpatialasi + $rtcladdakithisangrursi + $ppaphillaursi + $prtcjahankhelansi + $ersssi + $basictrainingsi + $promotionalcourssi + $departmentcoursesi + 
                  $dsosi + $censportoffjalsi + $nispatialasi + $othersportssi +
                  $phcsbkgbhogsi  + $osiahosi +  $osinbnofficessi + $trademansi  + $armourersi + $mtsectionsi + $qumasbranchlinestaffsi + $gdaffedusi +  $trgresatbnhqrssi + $otherdutiessi + $recruitssi + $leavessi + $absentsi + $undersuspectionsi + $handionmedrestsi + $handionlightdutysi + $chonmedrestsi + $chroonlidutysi + $osdetcsi + $paphqrsinstitutionssi + $cdoinstitutessi + $irbninstitionsi + $papobinstitutessi + $sogbhgptlspopsgroupsi + $uavteamsi;  ?></td>
                  
                  <td><?php   
                  echo $g3 = $vpgasi + $jailsecasi + $pphsciasi + $dbsdasi + $otstguasi + $pgfbotaoasi + $vswcuebasi + $pswcutbasi + $banksdasi + $spucmsecasi + $pbbndsdyasi + $pbbndresasi + $permanentdutyasi + $dgpreserveasi + $trgedreserveasi + $antiroitpojalasi + $antiroitpomansaasi + $antiroitpomukastsarasi + $sdrfteamjalasi + $splstrikgroupasi +
                  $swatreamfcdoasi + $disttmohaliasi + $dppmarkinmaleasi + $dipmarkinfemaleasi + $dispolothmaleasi + $dispolothfemaleasi + $cpoattachundertbnasi + $pbpoloffinstsecttchgasi + $nricellmohaliasi + $intwingasi + $centralpollinemohaliasi + $vigbureauasi + $sbcbasi + $mairimmdutyasi + $phrcasi + $burofinvestigationasi + $spectaskforcestfasi + $ppssocasi + $rtcpapjalasi + $istcpapkapasi + $drillstaffasi + $lawstaffasi + $pctsbhgpatialaasi + $rtcladdakithisangrurasi + $ppaphillaurasi + $prtcjahankhelanasi + $erssasi +$basictrainingasi + $promotionalcoursasi + $departmentcourseasi + 
                  $dsoasi + $censportoffjalasi + $nispatialaasi + $othersportsasi +
                  $phcsbkgbhogasi  + $osiahoasi +  $osinbnofficesasi + $trademanasi  + $armourerasi + $mtsectionasi + $qumasbranchlinestaffasi + $gdaffeduasi +  $trgresatbnhqrsasi + $otherdutiesasi + $recruitsasi + $leavesasi + $absentasi + $undersuspectionasi + $handionmedrestasi + $handionlightdutyasi + $chonmedrestasi + $chroonlidutyasi + $osdetcasi + $paphqrsinstitutionsasi + $cdoinstitutesasi + $irbninstitionasi + $papobinstitutesasi + $sogbhgptlspopsgroupasi + $uavteamasi; ?></td>


                  <td><?php  echo $g4 = $vpghc + $jailsechc + $pphscihc + $dbsdhc + $otstguhc + $pgfbotaohc + $vswcuebhc + $pswcutbhc + $banksdhc + $spucmsechc + $pbbndsdyhc + $pbbndreshc + $permanentdutyhc + $dgpreservehc + $trgedreservehc + $antiroitpojalhc + $antiroitpomansahc + $antiroitpomukastsarhc + $sdrfteamjalhc + $splstrikgrouphc +
                  $swatreamfcdohc + $disttmohalihc + $dppmarkinmalehc + $dipmarkinfemalehc + $dispolothmalehc + $dispolothfemalehc + $cpoattachundertbnhc + $pbpoloffinstsecttchghc + $nricellmohalihc + $intwinghc + $centralpollinemohalihc + $vigbureauhc + $sbcbhc + $mairimmdutyhc + $phrchc + $burofinvestigationhc + $spectaskforcestfhc + $ppssochc + $rtcpapjalhc + $istcpapkaphc + $drillstaffhc + $lawstaffhc + $pctsbhgpatialahc + $rtcladdakithisangrurhc + $ppaphillaurhc + $prtcjahankhelanhc + $ersshc + $basictraininghc + $promotionalcourshc + $departmentcoursehc + 
                  $dsohc + $censportoffjalhc + $nispatialahc + $othersportshc +
                  $phcsbkgbhoghc  + $osiahohc +  $osinbnofficeshc + $trademanhc  + $armourerhc + $mtsectionhc + $qumasbranchlinestaffhc + $gdaffeduhc +  $trgresatbnhqrshc + $otherdutieshc + $recruitshc + $leaveshc + $absenthc + $undersuspectionhc + $handionmedresthc + $handionlightdutyhc + $chonmedresthc + $chroonlidutyhc + $osdetchc + $paphqrsinstitutionshc + $cdoinstituteshc + $irbninstitionhc + $papobinstituteshc + $sogbhgptlspopsgrouphc + $uavteamhc; ?></td>
                  <td><?php echo $g5 = 
                     $vpgct + $jailsecct + $pphscict + $dbsdct + $otstguct + $pgfbotaoct + $vswcuebct + $pswcutbct + $banksdct + $spucmsecct + $pbbndsdyct + $pbbndresct + $permanentdutyct + $dgpreservect + $trgedreservect + $antiroitpojalct + $antiroitpomansact + $antiroitpomukastsarct + $sdrfteamjalct + $splstrikgroupct +
                  $swatreamfcdoct + $disttmohalict + $dppmarkinmalect + $dipmarkinfemalect + $dispolothmalect + $dispolothfemalect + $cpoattachundertbnct + $pbpoloffinstsecttchgct + $nricellmohalict + $intwingct + $centralpollinemohalict + $vigbureauct + $sbcbct + $mairimmdutyct + $phrcct + $burofinvestigationct + $spectaskforcestfct + $ppssocct + $rtcpapjalct + $istcpapkapct + $drillstaffct + $lawstaffct + $pctsbhgpatialact + $rtcladdakithisangrurct + $ppaphillaurct + $prtcjahankhelanct + $erssct + $basictrainingct + $promotionalcoursct + $departmentcoursect + 
                  $dsoct + $censportoffjalct + $nispatialact + $othersportsct +
                  $phcsbkgbhogct  + $osiahoct +  $osinbnofficesct + $trademanct  + $armourerct + $mtsectionct + $qumasbranchlinestaffct + $gdaffeduct +  $trgresatbnhqrsct + $otherdutiesct + $recruitsct + $leavesct + $absentct + $undersuspectionct + $handionmedrestct + $handionlightdutyct + $chonmedrestct + $chroonlidutyct + $osdetcct + $paphqrsinstitutionsct + $cdoinstitutesct + $irbninstitionct + $papobinstitutesct + $sogbhgptlspopsgroupct + + $uavteamct; ?></td>
                  <td><strong><?php echo $g6 =  $g1 + $g2 + $g3 + $g4 + $g5;
                  $data=array('g1' => $g1,'g2' => $g2, 'g3' => $g3, 'g4' => $g4,'g5' => $g5,'g6' => $g6);
                  $this->session->set_userdata($data);  
                
 ?> </strong></td>
                </tr>
              </tbody>
               <tfoot>
                <tr>
                  <td colspan="8">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
          </div><!-- table-responsive -->  </div></div>
         <script>
      $(function() {
        $("#excel").click(function(){
             $(".table2excel").table2excel({
          exclude: ".noExl",
          name: "Excel Document Name",
          filename: "myFileName",
          fileext: ".xls",
          exclude_img: true,
          exclude_links: true,
          exclude_inputs: true
        });
        });
       
      });
    </script>
</body>
</html>