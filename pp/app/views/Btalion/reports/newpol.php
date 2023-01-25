<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>Pol Return</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
    <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<h3 class="text-center"> VEHICLES STATEMENT OF  <?php echo $this->session->userdata('nick');  ?> <?php echo $this->session->userdata('nick2');  ?>  FOR THE MONTH OF <?php $a = array('01' => 'Jan','02' => 'Feb','03' => 'March','04' => 'April','05' => 'May','06' => 'June','07' => 'July','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec'); echo strtoupper($a[$this->uri->segment(2)]);?> <?php echo $this->uri->segment(3);?></h3>
<div class="container">
 <div class="row">
        <div class="col-sm-12">
            <table border="2">
              <thead>
                 <tr>
                  <th> &nbsp; S.No &nbsp; </th>
                 <!--  <th> &nbsp; Unit &nbsp; </th> -->
                  <th> &nbsp; Place of Duty &nbsp; </th>
                  <th> &nbsp; Last Date of Duty &nbsp; </th>
                  <th> &nbsp; Veh. No &nbsp; </th>
                  <th> &nbsp; Type vechile &nbsp; </th>
                  <th> &nbsp; Model &nbsp; </th> 
                  <th> &nbsp; BP/Non BP &nbsp; </th> 
                  <th> &nbsp; Avg &nbsp; </th>
                  <th> &nbsp; Des/pet &nbsp; </th>
                  <th> &nbsp; Month km/Hours &nbsp; </th>
                  <th> &nbsp; Total km/Hours &nbsp; </th>
                  <th> &nbsp; Month pol (Ltr.) </th>
                  <th> &nbsp; Total pol (Ltr.) </th>
                  <th> &nbsp; Month Pol Exp (Rs) &nbsp; </th>
                  <th> &nbsp; Month Repair (Rs) &nbsp; </th>
                  <th> &nbsp; Total repair (Rs) &nbsp;  </th>
                 </tr>
              </thead>
              <tbody> 
                <?php 
                  $count = 0; if($msk!=''){ foreach($msk as $value):  ?>
                <?php
                if(isset($poiis_[$value->mt_id])){
                 $poiis = $poiis_[$value->mt_id];//fetchoneinfopollistpost_2($value->mt_id,$this->uri->segment(3).'-'.$this->uri->segment(2).'-31',$ninfo);
//var_dump($poiis);


                    if($poiis !=''){
                        //$poiis=$poiis[0];
                        if($poiis->noduty != '' || $poiis->oname !='' || $poiis->instone4 || $poiis->duty_details){

                          $count = $count+1;
                        }
                    }
                }else{
                    $poiis = '';
                }
                     ?>
                 <tr class="odd gradeX">
                    <td> &nbsp; <?php echo $count; ?></td>
                    <?php if($poiis==''){
                        ?>
                        <td colspan="2"><span class="error">This Month Duty is not updated</span></td>
                                <?php }else{ ?>
                    <td> &nbsp; <?php 
                    //$poiis = fetchoneinfopollistpost($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
//                    $poiis = fetchoneinfo pollistpost_2($value->mt_id,$this->uri->segment(3).'-'.$this->uri->segment(2).'-31',$ninfo);
                    if($poiis !=''){
                      if($poiis->noduty == 'Officer'){}else{echo $poiis->noduty;
                        } $osi = fetchoneinfo('newosi',array('man_id' => $poiis->officer));
                    if($osi!=''){echo $osi->name.' &nbsp;, '.$osi->cexrank.' &nbsp;';}else{}
                      echo $poiis->oname.'&nbsp;'.$poiis->instone4.'&nbsp;'.$poiis->duty_details;
                    }                        
                      ?> <?php  ?></td>
                    
                    <td> &nbsp; <?php 
                    if($poiis !=''){
                        echo convertDate2($poiis->date_of_duty);
                  }
                        
                      ?> <?php  ?></td>
                                <?Php } ?>
                    <td> &nbsp; <?php echo $value->regnom; ?></td>
                    <td> &nbsp;  &nbsp;  <?php echo $value->catofvechicle; ?></td>
                    <td> &nbsp; <?php echo $value->vechile_year; ?></td>
                    <td> &nbsp; -</td>
                    <td> &nbsp; <?php echo $value->avg; ?></td>
                    <td> &nbsp; <?php echo $value->ftype ?></td>
                    <td> &nbsp; <?php $po = fetchoneinfopollist($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo); if($po !=''){echo $po->tkm - $po->mkm;}else{ echo'0'; }
                      ?></td>
                    
                    <td> &nbsp; <?php  if($po !=''){echo $po->tkm;}else{ echo'0'; }  ?></td>
                    <td> &nbsp; <?php if($po !=''){echo $po->tpol - $po->mpol;}else{ echo'0'; } ?></td>
                    <td> &nbsp; <?php if($po !=''){echo $po->tpol;}else{ echo'0'; }?></td>
                    <td> &nbsp; <?php if($po !=''){echo $po->polex;}else{ echo'0'; }?></td>
                    <td> &nbsp; <?php $pols = fetchoneinfopol($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                      $bval = '';
                      $bvals = '';
                      $mins = '';
                      if($pols !=''){
                        
                            $bval.=$pols->total;
                       
                           $bvals.= $pols->totals;
                       
                          echo $mins .= $bval + $bvals;
                      }
                        
                    
                     ?></td>
                    <td> &nbsp; <?php 
                    $polt = fetchoneinfopoltotal($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);

                      if($polt !=''){
                       /* $poltdec = fetchoneinfopoltotaldec($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);*/

                    $poltdecs = fetchoneinfopoltotaldecii($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);

                    $pol2017 = fetchoneinfopoltotaldeciisss($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                              if($this->uri->segment(3)==2017)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi;
                              }
                    $pol2018 = fetchoneinfopoltotaldeciisssa($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2018)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi; 
                              }
                    $pol2019 = fetchoneinfopoltotaldeciisssb($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2019)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi;
                              }

                    $pol2020 = fetchoneinfopoltotaldeciisssc($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2020)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi; 
                              }

                    $pol2021 = fetchoneinfopoltotaldeciisssd($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2021)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi; 
                              }

                    $pol2022 = fetchoneinfopoltotaldeciissse($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2022)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi + $pol2021->deci + $pol2021->decsi; 
                              }

                    $pol2023 = fetchoneinfopoltotaldeciisssf($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2023)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi + $pol2021->deci + $pol2021->decsi + $pol2022->deci + $pol2022->decsi; 
                              }

                    $pol2024 = fetchoneinfopoltotaldeciisssg($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2024)
                              {
                               echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi + $pol2021->deci + $pol2021->decsi + $pol2022->deci + $pol2022->decsi + $pol2023->deci + $pol2023->decsi; 
                              }
                    $pol2025 = fetchoneinfopoltotaldeciisssh($value->mt_id,$this->uri->segment(2),$this->uri->segment(3),$ninfo);
                           if($this->uri->segment(3)==2025)
                              {
                                echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi + $pol2021->deci + $pol2021->decsi + $pol2022->deci + $pol2022->decsi + $pol2023->deci + $pol2023->decsi + $pol2024->deci + $pol2024->decsi; 

                            }elseif($this->uri->segment(3)==2026){
                               echo  /*$poltdec->decsi +*/ $polt->total + $polt->totals + $poltdecs->decsi + $pol2017->decsi + $pol2018->deci + $pol2018->decsi + $pol2019->deci + $pol2019->decsi + $pol2020->deci + $pol2020->decsi + $pol2021->deci + $pol2021->decsi + $pol2022->deci + $pol2022->decsi + $pol2023->deci + $pol2023->decsi + $pol2024->deci + $pol2024->decsi + $pol2025->deci + $pol2025->decsi; 
                            }/*else{
                              echo   $polt->total + $polt->totals + $poltdecs->decsi;
                            } */  
                    }
                     ?></td>
               
                </tr>
                 <?php  endforeach; ?><?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="16">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
           </div>
           </div>
           </div>
</body>
</html>