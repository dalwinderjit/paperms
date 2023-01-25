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
          <h2 class="text-center">SUMMARY OF SECURITY COVER OF ARMED BN. OFFICIAL PROVIDED AS ON <?php echo date('d-m-Y') ?></h2><br/>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                 <tr>
                    <th> Sr.No.</th>
                    <th>Category</th>
                    <th>INSPRs</th>
                    <th>SIs</th>
                    <th>ASIs</th>
                    <th>HCs</th>
                    <th>CTs</th>
                    <th>TOTAL</th>
                    <th>Annexure</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>SERVING POLICE OFFICERS</td>
                  <td><?php $l1 = info_fetch_osireport('INSP','Police Officer','fone6'); 
                           $l2 = info_fetch_osireport('DSP/CR','Police Officer','fone6'); 
                      echo $is1 = $l1 + $l2;  ?></td>
                  <td><?php $l3 = info_fetch_osireport('SI','Police Officer','fone6'); 
                           $l4 = info_fetch_osireport('INSP/LR','Police Officer','fone6'); 
                           $l5 = info_fetch_osireport('INSP/CR','Police Officer','fone6'); 
                      echo $si1 =   $l3 + $l4 + $l5;  ?></td>
                  <td><?php $l6 = info_fetch_osireport('ASI','Police Officer','fone6'); 
                           $l7 = info_fetch_osireport('SI/LR','Police Officer','fone6'); 
                           $l8 = info_fetch_osireport('SI/CR','Police Officer','fone6'); 
                      echo $asi1 = $l6 + $l7 + $l8;  ?></td>
                  <td><?php $l9 = info_fetch_osireport('HC','Police Officer','fone6'); 
                           $l10 = info_fetch_osireport('ASI/LR','Police Officer','fone6'); 
                           $l11 = info_fetch_osireport('ASI/CR','Police Officer','fone6'); 
                      echo $hc1 = $l9 + $l10 + $l11;  ?></td>
                  <td><?php $l12 = info_fetch_osireport('CT','Police Officer','fone6'); 
                           $l13 = info_fetch_osireport('HC/PR','Police Officer','fone6'); 
                           $l14 = info_fetch_osireport('HC/LR','Police Officer','fone6');
                           $l15 = info_fetch_osireport('Sr.Const','Police Officer','fone6'); 
                           $l16 = info_fetch_osireport('C-II','Police Officer','fone6'); 
                      echo $ct1 = $l12 + $l13 + $l14 + $l15 + $l16;  ?></td>
                  <td> <?php echo $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7 + $l8 + $l9 + $l10 + $l11 + $l12 + $l13 + $l14 + $l15 + $l16; ?></td>
                  <td>A</td>
                </tr>

                <tr>
                  <td>2</td>
                  <td>RETIRED  POLICE OFFICERS</td>
                  <td><?php $a1 = info_fetch_osireport('INSP','Retired Police Officer','fone6'); 
                           $a2 = info_fetch_osireport('DSP/CR','Retired Police Officer','fone6'); 
                      echo $is2 =  $a1 + $a2;  ?></td>
                  <td><?php $a3 = info_fetch_osireport('SI','Retired Police Officer','fone6'); 
                           $a4 = info_fetch_osireport('INSP/LR','Retired Police Officer','fone6'); 
                           $a5 = info_fetch_osireport('INSP/CR','Retired Police Officer','fone6'); 
                      echo $si2 = $a3 + $a4 + $a5;  ?></td>
                  <td><?php $a6 = info_fetch_osireport('ASI','Retired Police Officer','fone6'); 
                           $a7 = info_fetch_osireport('SI/LR','Retired Police Officer','fone6'); 
                           $a8 = info_fetch_osireport('SI/CR','Retired Police Officer','fone6'); 
                      echo $asi2 = $a6 + $a7 + $a8;  ?></td>
                  <td><?php $a9 = info_fetch_osireport('HC','Retired Police Officer','fone6'); 
                           $a10 = info_fetch_osireport('ASI/LR','Retired Police Officer','fone6'); 
                           $a11 = info_fetch_osireport('ASI/CR','Retired Police Officer','fone6'); 
                      echo  $hc2 = $a9 + $a10 + $a11;  ?></td>
                  <td><?php $a12 = info_fetch_osireport('CT','Retired Police Officer','fone6'); 
                           $a13 = info_fetch_osireport('HC/PR','Retired Police Officer','fone6'); 
                           $a14 = info_fetch_osireport('HC/LR','Retired Police Officer','fone6');
                           $a15 = info_fetch_osireport('Sr.Const','Retired Police Officer','fone6'); 
                           $a16 = info_fetch_osireport('C-II','Retired Police Officer','fone6'); 
                      echo $ct2 = $a12 + $a13 + $a14 + $a15 + $a16;  ?></td>
                  <td> <?php echo $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13 + $a14 + $a15 + $a16; ?></td>
                  <td>B</td>
                </tr>

                 <tr>
                  <td>3</td>
                  <td>POLITICAL LEADERS</td>
                  <td><?php $c1 = info_fetch_osireport('INSP','Political Persons','fone6'); 
                           $c2 = info_fetch_osireport('DSP/CR','Political Persons','fone6'); 
                      echo  $is3 = $c1 + $c2;  ?></td>
                  <td><?php $c3 = info_fetch_osireport('SI','Political Persons','fone6'); 
                           $c4 = info_fetch_osireport('INSP/LR','Political Persons','fone6'); 
                           $c5 = info_fetch_osireport('INSP/CR','Political Persons','fone6'); 
                      echo  $si3 =$c3 + $c4 + $c5;  ?></td>
                  <td><?php $c6 = info_fetch_osireport('ASI','Political Persons','fone6'); 
                           $c7 = info_fetch_osireport('SI/LR','Political Persons','fone6'); 
                           $c8 = info_fetch_osireport('SI/CR','Political Persons','fone6'); 
                      echo $asi3 = $c6 + $c7 + $c8;  ?></td>
                  <td><?php $c9 = info_fetch_osireport('HC','Political Persons','fone6'); 
                           $c10 = info_fetch_osireport('ASI/LR','Political Persons','fone6'); 
                           $c11 = info_fetch_osireport('ASI/CR','Political Persons','fone6'); 
                      echo  $hc3 = $c9 + $c10 + $c11;  ?></td>
                  <td><?php $c12 = info_fetch_osireport('CT','Political Persons','fone6'); 
                           $c13 = info_fetch_osireport('HC/PR','Political Persons','fone6'); 
                           $c14 = info_fetch_osireport('HC/LR','Political Persons','fone6');
                           $c15 = info_fetch_osireport('Sr.Const','Political Persons','fone6'); 
                           $c16 = info_fetch_osireport('C-II','Political Persons','fone6'); 
                      echo $ct3 =  $c12 + $c13 + $c14 + $c15 + $c16;  ?></td>
                  <td> <?php echo $c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11 + $c12 + $c13 + $c14 + $c15 + $c16; ?></td>
                  <td>C</td>
                </tr>

                <tr>
                  <td>4</td>
                  <td>CIVIL OFFICERS</td>
                   <td><?php $d1 = info_fetch_osireport('INSP','Civil Officers','fone6'); 
                           $d2 = info_fetch_osireport('DSP/CR','Civil Officers','fone6'); 
                      echo $is4 =  $d1 + $d2;  ?></td>
                  <td><?php $d3 = info_fetch_osireport('SI','Civil Officers','fone6'); 
                           $d4 = info_fetch_osireport('INSP/LR','Civil Officers','fone6'); 
                           $d5 = info_fetch_osireport('INSP/CR','Civil Officers','fone6'); 
                      echo $si4 = $d3 + $d4 + $d5;  ?></td>
                  <td><?php $d6 = info_fetch_osireport('ASI','Civil Officers','fone6'); 
                           $d7 = info_fetch_osireport('SI/LR','Civil Officers','fone6'); 
                           $d8 = info_fetch_osireport('SI/CR','Civil Officers','fone6'); 
                      echo $asi4 = $d6 + $d7 + $d8;  ?></td>
                  <td><?php $d9 = info_fetch_osireport('HC','Civil Officers','fone6'); 
                           $d10 = info_fetch_osireport('ASI/LR','Civil Officers','fone6'); 
                           $d11 = info_fetch_osireport('ASI/CR','Civil Officers','fone6'); 
                      echo  $hc4 = $d9 + $d10 + $d11;  ?></td>
                  <td><?php $d12 = info_fetch_osireport('CT','Civil Officers','fone6'); 
                           $d13 = info_fetch_osireport('HC/PR','Civil Officers','fone6'); 
                           $d14 = info_fetch_osireport('HC/LR','Civil Officers','fone6');
                           $d15 = info_fetch_osireport('Sr.Const','Civil Officers','fone6'); 
                           $d16 = info_fetch_osireport('C-II','Civil Officers','fone6'); 
                      echo $ct4 = $d12 + $d13 + $d14 + $d15 + $d16;  ?></td>
                  <td> <?php echo $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $d7 + $d8 + $d9 + $d10 + $d11 + $d12 + $d13 + $d14 + $d15 + $d16; ?></td>
                  <td>D</td>
                </tr>

                 <tr>
                  <td>5</td>
                  <td>RETIRED CIVIL OFFICERS</td>
                   <td><?php $d1 = info_fetch_osireport('INSP','Retired Civil Officers','fone6'); 
                           $d2 = info_fetch_osireport('DSP/CR','Retired Civil Officers','fone6'); 
                      echo $is5 =  $d1 + $d2;  ?></td>
                  <td><?php $d3 = info_fetch_osireport('SI','Retired Civil Officers','fone6'); 
                           $d4 = info_fetch_osireport('INSP/LR','Retired Retired Civil Officers','fone6'); 
                           $d5 = info_fetch_osireport('INSP/CR','Retired Civil Officers','fone6'); 
                      echo $si5 = $d3 + $d4 + $d5;  ?></td>
                  <td><?php $d6 = info_fetch_osireport('ASI','Retired Civil Officers','fone6'); 
                           $d7 = info_fetch_osireport('SI/LR','Retired Civil Officers','fone6'); 
                           $d8 = info_fetch_osireport('SI/CR','Retired Civil Officers','fone6'); 
                      echo $asi5 = $d6 + $d7 + $d8;  ?></td>
                  <td><?php $d9 = info_fetch_osireport('HC','Retired Civil Officers','fone6'); 
                           $d10 = info_fetch_osireport('ASI/LR','Retired Civil Officers','fone6'); 
                           $d11 = info_fetch_osireport('ASI/CR','Retired Retired Civil Officers','fone6'); 
                      echo $hc5 =  $d9 + $d10 + $d11;  ?></td>
                  <td><?php $d12 = info_fetch_osireport('CT','Retired Civil Officers','fone6'); 
                           $d13 = info_fetch_osireport('HC/PR','Retired Civil Officers','fone6'); 
                           $d14 = info_fetch_osireport('HC/LR','Retired Civil Officers','fone6');
                           $d15 = info_fetch_osireport('Sr.Const','Retired Civil Officers','fone6'); 
                           $d16 = info_fetch_osireport('C-II','Retired Civil Officers','fone6'); 
                      echo $ct5 =  $d12 + $d13 + $d14 + $d15 + $d16;  ?></td>
                  <td> <?php echo $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $d7 + $d8 + $d9 + $d10 + $d11 + $d12 + $d13 + $d14 + $d15 + $d16; ?></td>
                  <td>E</td>
                </tr>

                  <tr>
                  <td>6</td>
                  <td>JUDICAL OFFICERS</td>
                  <td><?php $e1 = info_fetch_osireport('INSP','Judicial Officers','fone6'); 
                           $e2 = info_fetch_osireport('DSP/CR','Judicial Officers','fone6'); 
                      echo  $is6 = $e1 + $e2;  ?></td>
                  <td><?php $e3 = info_fetch_osireport('SI','Judicial Officers','fone6'); 
                           $e4 = info_fetch_osireport('INSP/LR','Judicial Officers','fone6'); 
                           $e5 = info_fetch_osireport('INSP/CR','Judicial Officers','fone6'); 
                      echo $si6 = $e3 + $e4 + $e5;  ?></td>
                  <td><?php $e6 = info_fetch_osireport('ASI','Judicial Officers','fone6'); 
                           $e7 = info_fetch_osireport('SI/LR','Judicial Officers','fone6'); 
                           $e8 = info_fetch_osireport('SI/CR','Judicial Officers','fone6'); 
                      echo $asi6 = $e6 + $e7 + $e8;  ?></td>
                  <td><?php $e9 = info_fetch_osireport('HC','Judicial Officers','fone6'); 
                           $e10 = info_fetch_osireport('ASI/LR','Judicial Officers','fone6'); 
                           $e11 = info_fetch_osireport('ASI/CR','Judicial Officers','fone6'); 
                      echo  $hc6 = $e9 + $e10 + $e11;  ?></td>
                  <td><?php $e12 = info_fetch_osireport('CT','Judicial Officers','fone6'); 
                           $e13 = info_fetch_osireport('HC/PR','Judicial Officers','fone6'); 
                           $e14 = info_fetch_osireport('HC/LR','Judicial Officers','fone6');
                           $e15 = info_fetch_osireport('Sr.Const','Judicial Officers','fone6'); 
                           $e16 = info_fetch_osireport('C-II','Judicial Officers','fone6'); 
                      echo $ct6 =  $e12 + $e13 + $e14 + $e15 + $e16;  ?></td>
                  <td> <?php echo $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10 + $e11 + $e12 + $e13 + $e14 + $e15 + $e16; ?></td>
                  <td>F</td>
                </tr>

                <tr>
                  <td>7</td>
                  <td>RETIRED JUDICAL OFFICERS</td>
                         <td><?php $f1 = info_fetch_osireport('INSP','Retired Judicial Officers','fone6'); 
                           $f2 = info_fetch_osireport('DSP/CR','Retired Judicial Officers','fone6'); 
                      echo  $is7 = $f1 + $f2;  ?></td>
                  <td><?php $f3 = info_fetch_osireport('SI','Retired Judicial Officers','fone6'); 
                           $f4 = info_fetch_osireport('INSP/LR','Retired Judicial Officers','fone6'); 
                           $f5 = info_fetch_osireport('INSP/CR','Retired Judicial Officers','fone6'); 
                      echo $si7 = $f3 + $f4 + $f5;  ?></td>
                  <td><?php $f6 = info_fetch_osireport('ASI','Retired Judicial Officers','fone6'); 
                           $f7 = info_fetch_osireport('SI/LR','Retired Judicial Officers','fone6'); 
                           $f8 = info_fetch_osireport('SI/CR','Retired Judicial Officers','fone6'); 
                      echo $asi7 = $f6 + $f7 + $f8;  ?></td>
                  <td><?php $f9 = info_fetch_osireport('HC','Retired Judicial Officers','fone6'); 
                           $f10 = info_fetch_osireport('ASI/LR','Retired Judicial Officers','fone6'); 
                           $f11 = info_fetch_osireport('ASI/CR','Retired Judicial Officers','fone6'); 
                      echo  $hc7 = $f9 + $f10 + $f11;  ?></td>
                  <td><?php $f12 = info_fetch_osireport('CT','Retired Judicial Officers','fone6'); 
                           $f13 = info_fetch_osireport('HC/PR','Retired Judicial Officers','fone6'); 
                           $f14 = info_fetch_osireport('HC/LR','Retired Judicial Officers','fone6');
                           $f15 = info_fetch_osireport('Sr.Const','Retired Judicial Officers','fone6'); 
                           $f16 = info_fetch_osireport('C-II','Retired Judicial Officers','fone6'); 
                      echo $ct7 = $f12 + $f13 + $f14 + $f15 + $f16;  ?></td>
                  <td> <?php echo $f1 + $f2 + $f3 + $f4 + $f5 + $f6 + $f7 + $f8 + $f9 + $f10 + $f11 + $f12 + $f13 + $f14 + $f15 + $f16; ?></td>
                  <td>G</td>
                </tr>

                  <tr>
                  <td>8</td>
                  <td>THREATEND PERSONS</td>
                   <td><?php $f1 = info_fetch_osireport('INSP','Threatening persons','fone6'); 
                           $f2 = info_fetch_osireport('DSP/CR','Threatening persons','fone6'); 
                      echo $is8 = $f1 + $f2;  ?></td>
                  <td><?php $f3 = info_fetch_osireport('SI','Threatening persons','fone6'); 
                           $f4 = info_fetch_osireport('INSP/LR','Threatening persons','fone6'); 
                           $f5 = info_fetch_osireport('INSP/CR','Threatening persons','fone6'); 
                      echo $si8 =$f3 + $f4 + $f5;  ?></td>
                  <td><?php $f6 = info_fetch_osireport('ASI','Threatening persons','fone6'); 
                           $f7 = info_fetch_osireport('SI/LR','Threatening persons','fone6'); 
                           $f8 = info_fetch_osireport('SI/CR','Threatening persons','fone6'); 
                      echo  $asi8 = $f6 + $f7 + $f8;  ?></td>
                  <td><?php $f9 = info_fetch_osireport('HC','Threatening persons','fone6'); 
                           $f10 = info_fetch_osireport('ASI/LR','Threatening persons','fone6'); 
                           $f11 = info_fetch_osireport('ASI/CR','Threatening persons','fone6'); 
                      echo  $hc8 =  $f9 + $f10 + $f11;  ?></td>
                  <td><?php $f12 = info_fetch_osireport('CT','Threatening persons','fone6'); 
                           $f13 = info_fetch_osireport('HC/PR','Threatening persons','fone6'); 
                           $f14 = info_fetch_osireport('HC/LR','Threatening persons','fone6');
                           $f15 = info_fetch_osireport('Sr.Const','Threatening persons','fone6'); 
                           $f16 = info_fetch_osireport('C-II','Threatening persons','fone6'); 
                      echo  $ct8 = $f12 + $f13 + $f14 + $f15 + $f16;  ?></td>
                  <td> <?php echo $f1 + $f2 + $f3 + $f4 + $f5 + $f6 + $f7 + $f8 + $f9 + $f10 + $f11 + $f12 + $f13 + $f14 + $f15 + $f16; ?></td>
                  <td>H</td>
                </tr>
                 <tr>
                  <td></td>
                  <td><strong> TOTAL </strong></td>
                  <td><?php echo $is1 + $is2 + $is3 + $is4 + $is5 + $is6 + $is7 + $is8; ?></td>
                  <td><?php echo $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8; ?></td>
                  <td><?php echo $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8; ?></td>
                  <td><?php echo $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8; ?></td>
                  <td><?php echo $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8; ?></td>
                  <td><?php echo $is1 + $is2 + $is3 + $is4 + $is5 + $is6 + $is7 + $is8 + $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8; ?></td>
                  <td></td>
                </tr>

                 <tr>
                  <td>9</td>
                  <td>ARMED BNS POLICE OFFICERS</td>
                          <td><?php $f1 = info_fetch_osireport('INSP','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f2 = info_fetch_osireport('DSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                      echo $at1 =  $f1 + $f2;  ?></td>
                  <td><?php $f3 = info_fetch_osireport('SI','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f4 = info_fetch_osireport('INSP/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f5 = info_fetch_osireport('INSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                      echo $at2 = $f3 + $f4 + $f5;  ?></td>
                  <td><?php $f6 = info_fetch_osireport('ASI','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f7 = info_fetch_osireport('SI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f8 = info_fetch_osireport('SI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                      echo $at3 = $f6 + $f7 + $f8;  ?></td>
                  <td><?php $f9 = info_fetch_osireport('HC','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f10 = info_fetch_osireport('ASI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f11 = info_fetch_osireport('ASI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                      echo  $at4 = $f9 + $f10 + $f11;  ?></td>
                  <td><?php $f12 = info_fetch_osireport('CT','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f13 = info_fetch_osireport('HC/PR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f14 = info_fetch_osireport('HC/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6');
                           $f15 = info_fetch_osireport('Sr.Const','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                           $f16 = info_fetch_osireport('C-II','PERSONAL SECURITY STAFF ARMED WING OFFICER','fone6'); 
                      echo $at5 = $f12 + $f13 + $f14 + $f15 + $f16;  ?></td>
                  <td> <?php echo $f1 + $f2 + $f3 + $f4 + $f5 + $f6 + $f7 + $f8 + $f9 + $f10 + $f11 + $f12 + $f13 + $f14 + $f15 + $f16; ?></td>
                  <td>I</td>
                </tr>

                <tr>
                  <td></td>
                  <td><strong> G.TOTAL </strong></td>
                 <td><?php echo $is1 + $is2 + $is3 + $is4 + $is5 + $is6 + $is7 + $is8 + $at1; ?></td>
                  <td><?php echo $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $at2; ?></td>
                  <td><?php echo $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $at3; ?></td>
                  <td><?php echo $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $at4; ?></td>
                  <td><?php echo $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $at5; ?></td>
                  <td><?php echo $is1 + $is2 + $is3 + $is4 + $is5 + $is6 + $is7 + $is8 + $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $at1 + $at2 + $at3 + $at4 + $at5; ?></td>
                  <td></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="9">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>

              
          </div><!-- table-responsive -->  </div></div>
</body>
</html>