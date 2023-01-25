<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<body>
<p><button type="button" id="excel">Export to excel</button>
<a href="<?php echo base_url('bt-osireportone'); ?>">Go Back</a>
      <table width="785" height="0" align="center" bordercolor="#666666">
  <tr>
    <td><p><strong>DEPLOYMENT STATEMENT OF.................................. BATTALIONS</strong></p></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td>&nbsp;</td>
    <th width="56" align="center">INSPR</th>
    <th width="56" align="center">SI</th>
    <th width="56" align="center">ASI </th>
    <th width="56" align="center">HC</th>
    <th width="56" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="401"><span style="width: 570px">SANCTIONED STRENGTH</span></td>
    <td align="center" style="width: 50px"><?php $hold1 = fetchoneinfo('osi_san',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; echo $sanpart1 =$h1;
            }else{
               echo $sanpart1 = 0;
              }  ?>    </td>
    <td align="center" style="width: 50px"><?php $hold3 = fetchoneinfo('osi_san',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
            $hold4 = fetchoneinfo('osi_san',array('rank' => 'INSP/LR','bat_id' => $this->session->userdata('userid')));
            $hold5 = fetchoneinfo('osi_san',array('rank' => 'INSP/CR','bat_id' => $this->session->userdata('userid')));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $sanpart2 =  $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center" style="width: 50px"><?php $hold6 = fetchoneinfo('osi_san',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
                $hold7 = fetchoneinfo('osi_san',array('rank' => 'SI/CR','bat_id' => $this->session->userdata('userid')));
                $hold8 = fetchoneinfo('osi_san',array('rank' => 'SI/LR','bat_id' => $this->session->userdata('userid')));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $sanpart3 =  $h6 + $h7 + $h8; 

             ?></td>
    <td align="center" style="width: 50px"><?php $hold9 = fetchoneinfo('osi_san',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
                    $hold10 = fetchoneinfo('osi_san',array('rank' => 'ASI/LR','bat_id' => $this->session->userdata('userid'))); 
                     $hold11 = fetchoneinfo('osi_san',array('rank' => 'ASI/CR','bat_id' => $this->session->userdata('userid')));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $sanpart4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center" style="width: 50px"><?php $hold12 = fetchoneinfo('osi_san',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
                       $hold13 = fetchoneinfo('osi_san',array('rank' => 'HC/PR','bat_id' => $this->session->userdata('userid')));
                        $hold14 = fetchoneinfo('osi_san',array('rank' => 'HC/LR','bat_id' => $this->session->userdata('userid'))); 
                         $hold15 = fetchoneinfo('osi_san',array('rank' => 'Sr.Const','bat_id' => $this->session->userdata('userid'))); 
                         $hold16 = fetchoneinfo('osi_san',array('rank' => 'C-II','bat_id' => $this->session->userdata('userid')));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $sanpart5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $sanpart6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>VACANCIES</td>
    <td align="center"><?php $hold1 = fetchoneinfo('osi_van',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $sanpar1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = fetchoneinfo('osi_van',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
            $hold4 = fetchoneinfo('osi_van',array('rank' => 'INSP/LR','bat_id' => $this->session->userdata('userid')));
            $hold5 = fetchoneinfo('osi_van',array('rank' => 'INSP/CR','bat_id' => $this->session->userdata('userid')));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $sanpar2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = fetchoneinfo('osi_van',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
                $hold7 = fetchoneinfo('osi_van',array('rank' => 'SI/CR','bat_id' => $this->session->userdata('userid')));
                $hold8 = fetchoneinfo('osi_van',array('rank' => 'SI/LR','bat_id' => $this->session->userdata('userid')));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $sanpar3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = fetchoneinfo('osi_van',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
                    $hold10 = fetchoneinfo('osi_van',array('rank' => 'ASI/LR','bat_id' => $this->session->userdata('userid'))); 
                     $hold11 = fetchoneinfo('osi_van',array('rank' => 'ASI/CR','bat_id' => $this->session->userdata('userid')));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $sanpar4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = fetchoneinfo('osi_van',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
                       $hold13 = fetchoneinfo('osi_van',array('rank' => 'HC/PR','bat_id' => $this->session->userdata('userid')));
                        $hold14 = fetchoneinfo('osi_van',array('rank' => 'HC/LR','bat_id' => $this->session->userdata('userid'))); 
                         $hold15 = fetchoneinfo('osi_van',array('rank' => 'Sr.Const','bat_id' => $this->session->userdata('userid'))); 
                         $hold16 = fetchoneinfo('osi_van',array('rank' => 'C-II','bat_id' => $this->session->userdata('userid')));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $sanpar5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $sanpar6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>POSTED STRENGTH</td>
    <td align="center"><?php echo $posstrength1 = $sanpart1 - $sanpar1;  ?></td>
    <td align="center"><?php echo $posstrength2 = $sanpart2 - $sanpar1;  ?></td>
    <td align="center"><?php echo $posstrength3 =$sanpart3 - $sanpar3;  ?></td>
    <td align="center"><?php echo $posstrength4 =$sanpart4 - $sanpar4;  ?></td>
    <td align="center"><?php echo $posstrength5 =$sanpart5 - $sanpar5;  ?></td>
    <td align="center"><?php echo $posstrength6 =$sanpart6 - $sanpar6;  ?></td>
  </tr>
  <tr>
    <td>FORMAL ORDER NOT ISSUED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $foni1 = $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $foni2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $foni3 =  $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $foni4 =  $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $foni5 =  $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>POSTED FOR PAY PURPOSE</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $pfpp1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $pfpp2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $pfpp3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $pfpp4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $pfpp5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $pfpp6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>NOT REPORTED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $notrep1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $notrep2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $notrep3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $notrep4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $notrep5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $notrep6 =  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>NOT RELIEVED</td>
    <td align="center"><?php $hold1 = info_fetch_updepden('INSP');
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            }else{
              $h1 .= 0; 
              } echo $notreli1 = $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updepden('SI'); 
            $hold4 = info_fetch_updepden('INSP/LR');
            $hold5 = info_fetch_updepden('INSP/CR');

             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $notreli2 =  $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updepden('ASI');
                $hold7 = info_fetch_updepden('SI/CR');
                $hold8 = info_fetch_updepden('SI/LR');


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $notreli3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updepden('HC'); 
                    $hold10 = info_fetch_updepden('ASI/LR'); 
                     $hold11 = info_fetch_updepden('ASI/CR');

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $notreli4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updepden('CT');
                       $hold13 = info_fetch_updepden('HC/PR');
                        $hold14 = info_fetch_updepden( 'HC/LR'); 
                         $hold15 = info_fetch_updepden('Sr.Const'); 
                         $hold16 = info_fetch_updepden('C-II');

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $notreli5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $notreli6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>EXCESS ATTACHED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $exa1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $exa2 =$h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $exa3 = $asi1 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $exa4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $exa5= $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $exa6= $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td>ACTUAL POSTED</td>
    <td align="center"><?php echo $aposted1 =  $posstrength1-$foni1-$pfpp1-$notrep1+$notreli1 + $exa1;  ?></td>
    <td align="center"><?php echo $aposted2 =  $posstrength2-$foni2-$pfpp2-$notrep2+$notreli2 + $exa2;  ?></td>
    <td align="center"><?php echo $aposted3 = $posstrength3-$foni3-$pfpp3-$notrep3+$notreli3 + $exa3;  ?></td>
    <td align="center"><?php echo $aposted4 = $posstrength4-$foni4-$pfpp4-$notrep4+$notreli4 + $exa4;  ?></td>
    <td align="center"><?php echo $aposted5 = $posstrength5-$foni5-$pfpp5-$notrep5+$notreli5 + $exa5;  ?></td>
    <td align="center"><?php echo $aposted1+$aposted2+$aposted3+$aposted4+$aposted5;  ?></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>1. FIX DUTIES</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 570px">SANCTIONED STRENGTH</span></td>
    <td align="center" style="width: 50px"><?php $hold1 = fetchoneinfo('osi_san',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; echo $sanpart1 =$h1;
            }else{
               echo $sanpart1 = 0;
              }  ?>    </td>
    <td align="center" style="width: 50px"><?php $hold3 = fetchoneinfo('osi_san',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
            $hold4 = fetchoneinfo('osi_san',array('rank' => 'INSP/LR','bat_id' => $this->session->userdata('userid')));
            $hold5 = fetchoneinfo('osi_san',array('rank' => 'INSP/CR','bat_id' => $this->session->userdata('userid')));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $sanpart2 =  $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center" style="width: 50px"><?php $hold6 = fetchoneinfo('osi_san',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
                $hold7 = fetchoneinfo('osi_san',array('rank' => 'SI/CR','bat_id' => $this->session->userdata('userid')));
                $hold8 = fetchoneinfo('osi_san',array('rank' => 'SI/LR','bat_id' => $this->session->userdata('userid')));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $sanpart3 =  $h6 + $h7 + $h8; 

             ?></td>
    <td align="center" style="width: 50px"><?php $hold9 = fetchoneinfo('osi_san',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
                    $hold10 = fetchoneinfo('osi_san',array('rank' => 'ASI/LR','bat_id' => $this->session->userdata('userid'))); 
                     $hold11 = fetchoneinfo('osi_san',array('rank' => 'ASI/CR','bat_id' => $this->session->userdata('userid')));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $sanpart4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center" style="width: 50px"><?php $hold12 = fetchoneinfo('osi_san',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
                       $hold13 = fetchoneinfo('osi_san',array('rank' => 'HC/PR','bat_id' => $this->session->userdata('userid')));
                        $hold14 = fetchoneinfo('osi_san',array('rank' => 'HC/LR','bat_id' => $this->session->userdata('userid'))); 
                         $hold15 = fetchoneinfo('osi_san',array('rank' => 'Sr.Const','bat_id' => $this->session->userdata('userid'))); 
                         $hold16 = fetchoneinfo('osi_san',array('rank' => 'C-II','bat_id' => $this->session->userdata('userid')));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $sanpart5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $sanpart6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>VACANCIES</td>
    <td align="center"><?php $hold1 = fetchoneinfo('osi_van',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $sanpar1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = fetchoneinfo('osi_van',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
            $hold4 = fetchoneinfo('osi_van',array('rank' => 'INSP/LR','bat_id' => $this->session->userdata('userid')));
            $hold5 = fetchoneinfo('osi_van',array('rank' => 'INSP/CR','bat_id' => $this->session->userdata('userid')));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $sanpar2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = fetchoneinfo('osi_van',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
                $hold7 = fetchoneinfo('osi_van',array('rank' => 'SI/CR','bat_id' => $this->session->userdata('userid')));
                $hold8 = fetchoneinfo('osi_van',array('rank' => 'SI/LR','bat_id' => $this->session->userdata('userid')));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $sanpar3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = fetchoneinfo('osi_van',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
                    $hold10 = fetchoneinfo('osi_van',array('rank' => 'ASI/LR','bat_id' => $this->session->userdata('userid'))); 
                     $hold11 = fetchoneinfo('osi_van',array('rank' => 'ASI/CR','bat_id' => $this->session->userdata('userid')));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $sanpar4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = fetchoneinfo('osi_van',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
                       $hold13 = fetchoneinfo('osi_van',array('rank' => 'HC/PR','bat_id' => $this->session->userdata('userid')));
                        $hold14 = fetchoneinfo('osi_van',array('rank' => 'HC/LR','bat_id' => $this->session->userdata('userid'))); 
                         $hold15 = fetchoneinfo('osi_van',array('rank' => 'Sr.Const','bat_id' => $this->session->userdata('userid'))); 
                         $hold16 = fetchoneinfo('osi_van',array('rank' => 'C-II','bat_id' => $this->session->userdata('userid')));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $sanpar5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $sanpar6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>POSTED STRENGTH</td>
    <td align="center"><?php echo $posstrength1 = $sanpart1 - $sanpar1;  ?></td>
    <td align="center"><?php echo $posstrength2 = $sanpart2 - $sanpar1;  ?></td>
    <td align="center"><?php echo $posstrength3 =$sanpart3 - $sanpar3;  ?></td>
    <td align="center"><?php echo $posstrength4 =$sanpart4 - $sanpar4;  ?></td>
    <td align="center"><?php echo $posstrength5 =$sanpart5 - $sanpar5;  ?></td>
    <td align="center"><?php echo $posstrength6 =$sanpart6 - $sanpar6;  ?></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>FORMAL ORDER NOT ISSUED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $foni1 = $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $foni2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $foni3 =  $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $foni4 =  $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $foni5 =  $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">v)</div></td>
    <td>POSTED FOR PAY PURPOSE</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $pfpp1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $pfpp2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $pfpp3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $pfpp4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $pfpp5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $pfpp6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">vi)</div></td>
    <td>NOT REPORTED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $notrep1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $notrep2 = $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $notrep3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $notrep4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $notrep5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $notrep6 =  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">vii)</div></td>
    <td>NOT RELIEVED</td>
    <td align="center"><?php $hold1 = info_fetch_updepden('INSP');
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            }else{
              $h1 .= 0; 
              } echo $notreli1 = $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updepden('SI'); 
            $hold4 = info_fetch_updepden('INSP/LR');
            $hold5 = info_fetch_updepden('INSP/CR');

             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3->san;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4->san;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5->san;
            }

            echo $notreli2 =  $h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updepden('ASI');
                $hold7 = info_fetch_updepden('SI/CR');
                $hold8 = info_fetch_updepden('SI/LR');


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6->san;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7->san;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8->san;
            }
                echo $notreli3 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updepden('HC'); 
                    $hold10 = info_fetch_updepden('ASI/LR'); 
                     $hold11 = info_fetch_updepden('ASI/CR');

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9->san;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10->san;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11->san;
            }

             echo $notreli4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updepden('CT');
                       $hold13 = info_fetch_updepden('HC/PR');
                        $hold14 = info_fetch_updepden( 'HC/LR'); 
                         $hold15 = info_fetch_updepden('Sr.Const'); 
                         $hold16 = info_fetch_updepden('C-II');

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12->san;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13->san;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14->san;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15->san;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16->san;
            }
             echo $notreli5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $notreli6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">viii)</div></td>
    <td>EXCESS ATTACHED</td>
    <td align="center"><?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $exa1 =  $h1; ?>    </td>
    <td align="center"><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP/CR'));


             $h3 = '';
            if($hold3 != ''){
              $h3 .= $hold3;
            }

            $h4 = '';
            if($hold4 != ''){
              $h4 .= $hold4;
            }

            $h5 = '';
            if($hold5 != ''){
              $h5 .= $hold5;
            }

            echo $exa2 =$h3 + $h4  + $h5;
         
              ?></td>
    <td align="center"><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI/LR'));


             $h6 = '';
            if($hold6 != ''){
              $h6 .= $hold6;
            }

             $h7 = '';
            if($hold7 != ''){
              $h7 .= $hold7;
            }

            $h8 = '';
            if($hold8 != ''){
              $h8 .= $hold8;
            }
                echo $exa3 = $asi1 = $h6 + $h7 + $h8; 

             ?></td>
    <td align="center"><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI/CR'));

            $h9 = '';
            if($hold9 != ''){
              $h9 .= $hold9;
            }


            $h10 = '';
            if($hold10 != ''){
              $h10 .= $hold10;
            }

            $h11 = '';
            if($hold11 != ''){
              $h11 .= $hold11;
            }

             echo $exa4 = $h9 +  $h10 + $h11;  ?></td>
    <td align="center"><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'C-II'));

            $h12 = '';
            if($hold12 != ''){
              $h12 .= $hold12;
            }

            $h13 = '';
            if($hold13 != ''){
              $h13 .= $hold13;
            }

            $h14 = '';
            if($hold14 != ''){
              $h14 .= $hold14;
            }

            $h15 = '';
            if($hold15 != ''){
              $h15 .= $hold15;
            }

            $h16 = '';
            if($hold16 != ''){
              $h16 .= $hold16;
            }
             echo $exa5= $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
    <td align="center"><?php echo $exa6= $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
  </tr>
  <tr>
    <td><div align="center">ix)</div></td>
    <td>ACTUAL POSTED</td>
    <td align="center"><?php echo $aposted1 =  $posstrength1-$foni1-$pfpp1-$notrep1+$notreli1 + $exa1;  ?></td>
    <td align="center"><?php echo $aposted2 =  $posstrength2-$foni2-$pfpp2-$notrep2+$notreli2 + $exa2;  ?></td>
    <td align="center"><?php echo $aposted3 = $posstrength3-$foni3-$pfpp3-$notrep3+$notreli3 + $exa3;  ?></td>
    <td align="center"><?php echo $aposted4 = $posstrength4-$foni4-$pfpp4-$notrep4+$notreli4 + $exa4;  ?></td>
    <td align="center"><?php echo $aposted5 = $posstrength5-$foni5-$pfpp5-$notrep5+$notreli5 + $exa5;  ?></td>
    <td align="center"><?php echo $aposted1+$aposted2+$aposted3+$aposted4+$aposted5;  ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left"><strong>TOTAL</strong></div></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>2. LAW &amp; ORDER DUTY</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="63" align="center"><div align="center">INSPR</div></th>
    <th width="54" align="center"><div align="center">SI</div></th>
    <th width="54" align="center"><div align="center">ASI </div></th>
    <th width="54" align="center"><div align="center">HC</div></th>
    <th width="56" align="center"><div align="center">CT</div></th>
    <th width="61" align="center"><div align="center">TOTAL</div></th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 568px">PERMANENT DUTY</span></td>
    <td style="width: 40px"><div align="center"></div></td>
    <td style="width: 40px">
      <div align="right">
        <?php $hold193 = info_fetch_osireport('SI','PERMANENT DUTY','lone1');
            $hold194 = info_fetch_osireport('INSP/LR','PERMANENT DUTY','lone1'); 
            $hold195 = info_fetch_osireport('INSP/CR','PERMANENT DUTY','lone1'); 
            echo $si13= $hold193 + $hold194 + $hold195;
              ?>
      </div></td>
    <td style="width: 40px">
      <div align="right">
        <?php $hold196 = info_fetch_osireport('ASI','PERMANENT DUTY','lone1'); 
                $hold197 = info_fetch_osireport('SI/CR','PERMANENT DUTY','lone1');  
                $hold198 = info_fetch_osireport('SI/LR','PERMANENT DUTY','lone1'); 
                echo $asi13 = $hold196 + $hold197 + $hold198; 

             ?>
      </div></td>
    <td style="width: 40px">
      <div align="right">
        <?php $hold199 = info_fetch_osireport('HC','PERMANENT DUTY','lone1');
                    $hold200 = info_fetch_osireport('ASI/LR','PERMANENT DUTY','lone1');
                     $hold201 = info_fetch_osireport('ASI/CR','PERMANENT DUTY','lone1');
             echo $hc13 = $hold199 +  $hold200 + $hold201;  ?>
      </div></td>
    <td style="width: 40px">
      <div align="right">
        <?php $hold202 = info_fetch_osireport('CT','PERMANENT DUTY','lone1');
                       $hold203 = info_fetch_osireport('HC/PR','PERMANENT DUTY','lone1');
                        $hold204 = info_fetch_osireport('HC/LR','PERMANENT DUTY','lone1');
                         $hold205 = info_fetch_osireport('Sr.Const','PERMANENT DUTY','lone1');
                         $hold206 = info_fetch_osireport('C-II','PERMANENT DUTY','lone1');

             echo $ct13= $hold202 + $hold203 + $hold204 + $hold205 + $hold206;  ?>
      </div></td>
    <td style="width: 40px"><div align="right"><?php echo  $si13 + $asi13 + $hc13 + $ct13;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>DGP/RESERVE</td>
    <td><div align="center">
      <?php $hold207 = info_fetch_osireport('INSP','DGP, RESERVES','lone2'); 
                      $hold208 = info_fetch_osireport('DSP/CR','DGP, RESERVES','lone2'); 
                      echo $insp14 = $hold207 + $hold208;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold209 = info_fetch_osireport('SI','DGP, RESERVES','lone2');
            $hold210 = info_fetch_osireport('INSP/LR','DGP, RESERVES','lone2'); 
            $hold211 = info_fetch_osireport('INSP/CR','DGP, RESERVES','lone2'); 
            echo $si14= $hold209 + $hold210 + $hold211;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold212 = info_fetch_osireport('ASI','DGP, RESERVES','lone2'); 
                $hold213 = info_fetch_osireport('SI/CR','DGP, RESERVES','lone2');  
                $hold214 = info_fetch_osireport('SI/LR','DGP, RESERVES','lone2'); 
                echo $asi14 = $hold212 + $hold213 + $hold214; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold215 = info_fetch_osireport('HC','DGP, RESERVES','lone2');
                    $hold216 = info_fetch_osireport('ASI/LR','DGP, RESERVES','lone2');
                     $hold217 = info_fetch_osireport('ASI/CR','DGP, RESERVES','lone2');
             echo  $hc14 = $hold215 +  $hold216 + $hold217;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold218 = info_fetch_osireport('CT','DGP, RESERVES','lone2');
                       $hold219 = info_fetch_osireport('HC/PR','DGP, RESERVES','lone2');
                        $hold220 = info_fetch_osireport('HC/LR','DGP, RESERVES','lone2');
                         $hold221 = info_fetch_osireport('Sr.Const','DGP, RESERVES','lone2');
                         $hold222 = info_fetch_osireport('C-II','DGP, RESERVES','lone2');

             echo $ct14= $hold218 + $hold219 + $hold220 + $hold221 + $hold222;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp14 + $si14 + $asi14 + $hc14 + $ct14;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>TRG./E.D.RESERVE</td>
    <td><div align="center">
      <?php $hold223 = info_fetch_osireport('INSP','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      $hold224 = info_fetch_osireport('DSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      echo $insp15 = $hold223 + $hold224;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold225 = info_fetch_osireport('SI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
            $hold226 = info_fetch_osireport('INSP/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            $hold227 = info_fetch_osireport('INSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            echo $si15= $hold225 + $hold226 + $hold227;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold228 = info_fetch_osireport('ASI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                $hold229 = info_fetch_osireport('SI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');  
                $hold230 = info_fetch_osireport('SI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                echo $asi15 = $hold228 + $hold229 + $hold230; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold231 = info_fetch_osireport('HC','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                    $hold232 = info_fetch_osireport('ASI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                     $hold233 = info_fetch_osireport('ASI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
             echo $hc15 = $hold231 +  $hold232 + $hold233;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold234 = info_fetch_osireport('CT','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                       $hold235 = info_fetch_osireport('HC/PR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                        $hold236 = info_fetch_osireport('HC/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold237 = info_fetch_osireport('Sr.Const','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold238 = info_fetch_osireport('C-II','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

             echo $ct15= $hold234 + $hold235 + $hold236 + $hold237 + $hold238;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp15 + $si15 + $asi15 + $hc15 + $ct15;  ?></div></td>
  </tr>
  
  <tr>
    <td><div align="center"></div></td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo  $insp14 + $insp15; ?></div></td>
    <td><div align="center"><?php echo $si13 + $si14 + $si15;  ?></div></td>
    <td><div align="center"><?php echo $asi13 + $asi14 + $asi15;  ?></div></td>
    <td><div align="center"><?php echo $hc13 + $hc14 + $hc15; ?></div></td>
    <td><div align="center"><?php echo $ct13 + $ct14 + $ct15;?></div></td>
    <td><div align="center"><?php echo  $insp14 + $insp15 + $si13 + $si14 + $si15 + $asi13 + $asi14 + $asi15 + $hc13 + $hc14 + $hc15 + $ct13 + $ct14 + $ct15; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>3. SPECIAL SQUADS</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 575px">ANTI RIOT POLICE, JALANDHAR</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold239 = info_fetch_osireport('INSP','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      $hold240 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      echo $insp16 = $hold239 + $hold240;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold241 = info_fetch_osireport('SI','ANTI RIOT POLICE, JALANDHAR','sqone1');
            $hold242 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            $hold243 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            echo $si16= $hold241 + $hold242 + $hold243;
              ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold244 = info_fetch_osireport('ASI','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                $hold245 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');  
                $hold246 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                echo $asi16 = $hold244 + $hold245 + $hold246; 

             ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold2460 = info_fetch_osireport('HC','ANTI RIOT POLICE, JALANDHAR','sqone1');
                    $hold247 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                     $hold248 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $hc16 =  $hold2460 +  $hold247 + $hold248;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold249 = info_fetch_osireport('CT','ANTI RIOT POLICE, JALANDHAR','sqone1');
                       $hold250 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                        $hold251 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold252 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold253 = info_fetch_osireport('C-II','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $ct16= $hold249 + $hold250 + $hold251 + $hold252 + $hold253;  ?>
    </div></td>
    <td style="width: 40px"><div align="center"><?php echo $insp16 + $si16 + $asi16 + $hc16 + $ct16;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>ANTI RIOT POLICE, MANSA</td>
    <td><div align="center">
      <?php $hold254 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MANSA','sqone2'); 
                      $hold255 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
                      echo $insp17 = $hold254 + $hold255;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold256 = info_fetch_osireport('SI','ANTI RIOT POLICE, MANSA','sqone2');
            $hold257 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
            $hold258 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
            echo $si17= $hold256 + $hold257 + $hold258;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold259 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MANSA','sqone2'); 
                $hold260 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MANSA','sqone2');  
                $hold261 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
                echo $asi17 = $hold259 + $hold260 + $hold261; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold262 = info_fetch_osireport('HC','ANTI RIOT POLICE, MANSA','sqone2');
                    $hold263 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MANSA','sqone2');
                     $hold264 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MANSA','sqone2');
             echo $hc17 =   $hold262 +  $hold263 + $hold264;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold265 = info_fetch_osireport('CT','ANTI RIOT POLICE, MANSA','sqone2');
                       $hold266 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MANSA','sqone2');
                        $hold267 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold268 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold269 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MANSA','sqone2');

             echo $ct17= $hold265 + $hold266 + $hold267 + $hold268 + $hold269;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp17 + $si17 + $asi17 + $hc17 + $ct17;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>ANTI RIOT POLICE, MUKATSAR</td>
    <td><div align="center">
      <?php $hold270 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      $hold271 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      echo $insp18 = $hold270 + $hold271;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold272 = info_fetch_osireport('SI','ANTI RIOT POLICE, MUKATSAR','sqone3');
            $hold273 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            $hold274 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            echo $si18= $hold272 + $hold273 + $hold274;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold275 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                $hold276 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');  
                $hold277 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                echo $asi18 = $hold275 + $hold276 + $hold277; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold278 = info_fetch_osireport('HC','ANTI RIOT POLICE, MUKATSAR','sqone3');
                    $hold279 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                     $hold280 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');
             echo $hc18 =  $hold278 +  $hold279 + $hold280;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold284 = info_fetch_osireport('CT','ANTI RIOT POLICE, MUKATSAR','sqone3');
                       $hold285 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                        $hold286 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold287 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold288 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MUKATSAR','sqone3');

             echo $ct18= $hold284 + $hold285 + $hold286 + $hold287 + $hold288;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp18 + $si18 + $asi18 + $hc18 + $ct18;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>SDRF TEAM JALANDHAR</td>
    <td><div align="center">
      <?php $hold289 = info_fetch_osireport('INSP','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      $hold290 = info_fetch_osireport('DSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      echo $insp19 = $hold289 + $hold290;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold291 = info_fetch_osireport('SI','S.D.R.F. TEAM, JALANDHAR','sqone4');
            $hold292 = info_fetch_osireport('INSP/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            $hold293 = info_fetch_osireport('INSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            echo $si19=  $hold291 + $hold292 + $hold293;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold294 = info_fetch_osireport('ASI','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                $hold295 = info_fetch_osireport('SI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');  
                $hold296 = info_fetch_osireport('SI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                echo $asi19 = $hold294 + $hold295 + $hold296; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold297 = info_fetch_osireport('HC','S.D.R.F. TEAM, JALANDHAR','sqone4');
                    $hold298 = info_fetch_osireport('ASI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                     $hold299 = info_fetch_osireport('ASI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');
             echo $hc19 =  $hold297 +  $hold298 + $hold299;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold300 = info_fetch_osireport('CT','S.D.R.F. TEAM, JALANDHAR','sqone4');
                       $hold301 = info_fetch_osireport('HC/PR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                        $hold302 = info_fetch_osireport('HC/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold303 = info_fetch_osireport('Sr.Const','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold304 = info_fetch_osireport('C-II','S.D.R.F. TEAM, JALANDHAR','sqone4');

             echo $ct19= $hold300 + $hold301 + $hold302 + $hold303 + $hold304;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp19 + $si19 + $asi19 + $hc19 + $ct19;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">v)</div></td>
    <td>SPL. STRIKING GROUP </td>
    <td><div align="center">
      <?php $hold305 = info_fetch_osireport('INSP','SPL. STRIKING GROUPS','sqone5'); 
                      $hold306 = info_fetch_osireport('DSP/CR','SPL. STRIKING GROUPS','sqone5'); 
                      echo $insp20 = $hold305 + $hold306;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold307 = info_fetch_osireport('SI','SPL. STRIKING GROUPS','sqone5');
            $hold308 = info_fetch_osireport('INSP/LR','SPL. STRIKING GROUPS','sqone5'); 
            $hold309 = info_fetch_osireport('INSP/CR','SPL. STRIKING GROUPS','sqone5'); 
            echo $si20= $hold307 + $hold308 + $hold309;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold310 = info_fetch_osireport('ASI','SPL. STRIKING GROUPS','sqone5'); 
                $hold311 = info_fetch_osireport('SI/CR','SPL. STRIKING GROUPS','sqone5');  
                $hold312 = info_fetch_osireport('SI/LR','SPL. STRIKING GROUPS','sqone5'); 
                echo $asi20 = $hold310 + $hold311 + $hold312; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold313 = info_fetch_osireport('HC','SPL. STRIKING GROUPS','sqone5');
                    $hold314 = info_fetch_osireport('ASI/LR','SPL. STRIKING GROUPS','sqone5');
                     $hold315 = info_fetch_osireport('ASI/CR','SPL. STRIKING GROUPS','sqone5');
             echo $hc20 =  $hold313 +  $hold314 + $hold315;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold316 = info_fetch_osireport('CT','SPL. STRIKING GROUPS','sqone5');
                       $hold317 = info_fetch_osireport('HC/PR','SPL. STRIKING GROUPS','sqone5');
                        $hold318 = info_fetch_osireport('HC/LR','SPL. STRIKING GROUPS','sqone5');
                         $hold319 = info_fetch_osireport('Sr.Const','SPL. STRIKING GROUPS','sqone5');
                         $hold320 = info_fetch_osireport('C-II','SPL. STRIKING GROUPS','sqone5');

             echo $ct20= $hold316 + $hold317 + $hold318 + $hold319 + $hold320;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp20 + $si20 + $asi20 + $hc20 + $ct20;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vi)</div></td>
    <td>SWAT TEAM(4TH CDO) </td>
    <td><div align="center">
      <?php $hold321 = info_fetch_osireport('INSP','SWAT TEAM (4TH CDO)','sqone6'); 
                      $hold322 = info_fetch_osireport('DSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
                      echo $insp21 = $hold321 + $hold322;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold323 = info_fetch_osireport('SI','SWAT TEAM (4TH CDO)','sqone6');
            $hold324 = info_fetch_osireport('INSP/LR','SWAT TEAM (4TH CDO)','sqone6'); 
            $hold325 = info_fetch_osireport('INSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
            echo $si21= $hold323 + $hold324 + $hold325;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold326 = info_fetch_osireport('ASI','SWAT TEAM (4TH CDO)','sqone6'); 
                $hold327 = info_fetch_osireport('SI/CR','SWAT TEAM (4TH CDO)','sqone6');  
                $hold328 = info_fetch_osireport('SI/LR','SWAT TEAM (4TH CDO)','sqone6'); 
                echo $asi21 = $hold326 + $hold327 + $hold328; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold329 = info_fetch_osireport('HC','SWAT TEAM (4TH CDO)','sqone6');
                    $hold330 = info_fetch_osireport('ASI/LR','SWAT TEAM (4TH CDO)','sqone6');
                     $hold331 = info_fetch_osireport('ASI/CR','SWAT TEAM (4TH CDO)','sqone6');
             echo $hc21 =  $hold329 +  $hold330 + $hold331;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold332 = info_fetch_osireport('CT','SWAT TEAM (4TH CDO)','sqone6');
                       $hold333 = info_fetch_osireport('HC/PR','SWAT TEAM (4TH CDO)','sqone6');
                        $hold334 = info_fetch_osireport('HC/LR','SWAT TEAM (4TH CDO)','sqone6');
                         $hold335 = info_fetch_osireport('Sr.Const','SWAT TEAM (4TH CDO)','sqone6');
                         $hold336 = info_fetch_osireport('C-II','SWAT TEAM (4TH CDO)','sqone6');

             echo $ct21= $hold332 + $hold333 + $hold334 + $hold335 + $hold336;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp21 + $si21 + $asi21 + $hc21 + $ct21;  ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><strong><?php echo $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21; ?></strong></div></td>
    <td><div align="center"><strong><?php echo $si16 + $si17 + $si18 + $si19 + $si20 + $si21;  ?></strong></div></td>
    <td><div align="center"><strong><?php echo $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21;  ?></strong></div></td>
    <td><div align="center"><strong><?php echo $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21; ?></strong></div></td>
    <td><div align="center"><strong><?php echo $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21;?></strong></div></td>
    <td><div align="center"><strong><?php echo $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21 + $si16 + $si17 + $si18 + $si19 + $si20 + $si21 + $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21 + $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21 + $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21; ?> </strong></div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>4. PERMANENT ATTACHMENT</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 560px">DISTT. MOHALI</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold337 = info_fetch_osireport('INSP','ATTACHED WITH DISTT.','paone1'); 
                      $hold338 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT.','paone1'); 
                      echo $insp22 = $hold337 + $hold338;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold339 = info_fetch_osireport('SI','ATTACHED WITH DISTT.','paone1');
            $hold340 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT.','paone1'); 
            $hold341 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT.','paone1'); 
            echo $si22= $hold339 + $hold340 + $hold341;
              ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold342 = info_fetch_osireport('ASI','ATTACHED WITH DISTT.','paone1'); 
                $hold343 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT.','paone1');  
                $hold344 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT.','paone1'); 
                echo $asi22 =  $hold342 + $hold343 + $hold344; 

             ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold345 = info_fetch_osireport('HC','ATTACHED WITH DISTT.','paone1');
                    $hold346 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT.','paone1');
                     $hold347 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT.','paone1');
             echo $hc22 =  $hold345 +  $hold346 + $hold347;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold348 = info_fetch_osireport('CT','ATTACHED WITH DISTT.','paone1');
                       $hold349 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT.','paone1');
                        $hold350 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT.','paone1');
                         $hold351 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT.','paone1');
                         $hold352 = info_fetch_osireport('C-II','ATTACHED WITH DISTT.','paone1');

             echo $ct22= $hold348 + $hold349 + $hold350 + $hold351 + $hold352;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center"><?php echo $insp22 + $si22 + $asi22 + $hc22 + $ct22;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>DISTT.POLICE (MARTYR'S KIN MALE)</td>
    <td><div align="center">
      <?php $hold353 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
                      $hold354 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
                      echo $insp23 = $hold352 + $hold354;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold355 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
            $hold356 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
            $hold357 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
            echo $si23= $hold355 + $hold356 + $hold357;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold358 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
                $hold359 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');  
                $hold360 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2'); 
                echo $asi23 = $hold358 + $hold359 + $hold360; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold361 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                    $hold362 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                     $hold363 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
             echo $hc23 = $hold361 +  $hold362 + $hold363;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold364 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                       $hold365 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                        $hold366 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                         $hold367 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');
                         $hold368 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN MALE)','paone2');

             echo $ct23= $hold364 + $hold365 + $hold366 + $hold367 + $hold368;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp23 + $si23 + $asi23 + $hc23 + $ct23;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>DISTT.POLICE (MARTYR'S KIN FEMALE)</td>
    <td><div align="center">
      <?php $hold369 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
                      $hold370 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
                      echo $insp24 = $hold369 + $hold370;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold371 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
            $hold372 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
            $hold373 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
            echo  $si24=  $hold371 + $hold372 + $hold373;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold374 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
                $hold375 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');  
                $hold376 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3'); 
                echo $hc24 =  $hold374 + $hold375 + $hold376; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold377 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                    $hold378 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                     $hold379 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
             echo $asi24 = $hold377 +  $hold378 + $hold379;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold380 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                       $hold381 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                        $hold382 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                         $hold383 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');
                         $hold384 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR&rsquo;S KIN FEMALE)','paone3');

             echo $ct24= $hold380 + $hold381 + $hold382 + $hold383 + $hold384;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp24 + $si24 + $asi24 + $hc24 + $ct24;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>DISTT.POLICE (OTHERS MALE)</td>
    <td><div align="center">
      <?php $hold385 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      $hold386 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      echo $insp25 = $hold385 + $hold386;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold387 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
            $hold388 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            $hold389 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            echo $si25=  $hold387 + $hold388 + $hold389;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold390 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                $hold391 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');  
                $hold392 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                echo $asi25 = $hold390 + $hold391 + $hold392; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold393 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                    $hold394 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                     $hold395 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
             echo $hc25= $hold393 +  $hold394 + $hold395;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold396 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                       $hold397 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                        $hold398 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold399 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold400 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');

             echo $ct25=  $hold396 + $hold397 + $hold398 + $hold399 + $hold400;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp25 + $si25 + $asi25 + $hc25 + $ct25;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">v)</div></td>
    <td>DISTT.POLICE (OTHERS FEMALE)</td>
    <td><div align="center">
      <?php $hold401 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      $hold402 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      echo $insp26 = $hold401 + $hold402;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold403 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
            $hold404 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            $hold405 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            echo $si26= $hold403 + $hold404 + $hold405;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold406 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                $hold407 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');  
                $hold408 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                echo $asi26 = $hold406 + $hold407 + $hold408; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold409 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                    $hold410 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                     $hold411 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
             echo $hc26=  $hold409 +  $hold410 + $hold411;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold412 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                       $hold413 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                        $hold414 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold415 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold416 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');

             echo $ct26= $hold412 + $hold413 + $hold414 + $hold415 + $hold416;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp26 + $si26 + $asi26 + $hc26 + $ct26;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vi)</div></td>
    <td>C.P.O ATTACHMENT UNDER 13th BN.</td>
    <td><div align="center">
      <?php $hold417 = info_fetch_osireport('INSP','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      $hold418 = info_fetch_osireport('DSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      echo $insp27 = $hold417 + $hold418;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold419 = info_fetch_osireport('SI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
            $hold420 = info_fetch_osireport('INSP/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            $hold421 = info_fetch_osireport('INSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            echo $si27= $hold419 + $hold420 + $hold421;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold422 = info_fetch_osireport('ASI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                $hold423 = info_fetch_osireport('SI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');  
                $hold424 = info_fetch_osireport('SI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                echo  $asi27 = $hold422 + $hold423 + $hold424; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold425 = info_fetch_osireport('HC','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                    $hold426 = info_fetch_osireport('ASI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                     $hold427 = info_fetch_osireport('ASI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
             echo $hc27= $hold425 +  $hold426 + $hold427;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold428 = info_fetch_osireport('CT','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                       $hold429 = info_fetch_osireport('HC/PR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                        $hold430 = info_fetch_osireport('HC/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold431 = info_fetch_osireport('Sr.Const','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold432 = info_fetch_osireport('C-II','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

             echo $ct27= $hold428 + $hold429 + $hold430 + $hold431 + $hold432;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp27 + $si27 + $asi27 + $hc27 + $ct27;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vii)</div></td>
    <td>PB.POLICE OFFICE INSTITUTE SEC 32 CHG</td>
    <td><div align="center">
      <?php $hold433 = info_fetch_osireport('INSP','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      $hold434 = info_fetch_osireport('DSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      echo $insp28 = $hold433 + $hold434;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold435 = info_fetch_osireport('SI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
            $hold436 = info_fetch_osireport('INSP/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            $hold437 = info_fetch_osireport('INSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            echo  $si28= $hold435 + $hold436 + $hold437;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold438 = info_fetch_osireport('ASI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                $hold439 = info_fetch_osireport('SI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');  
                $hold440 = info_fetch_osireport('SI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                echo $asi28 = $hold438 + $hold439 + $hold440; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold441 = info_fetch_osireport('HC','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                    $hold442 = info_fetch_osireport('ASI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                     $hold443 = info_fetch_osireport('ASI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
             echo $hc28= $hold441 +  $hold442 + $hold443;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold444 = info_fetch_osireport('CT','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                       $hold445 = info_fetch_osireport('HC/PR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                        $hold446 = info_fetch_osireport('HC/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold447 = info_fetch_osireport('Sr.Const','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold448 = info_fetch_osireport('C-II','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

             echo $ct28= $hold444 + $hold445 + $hold446 + $hold447 + $hold448;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp28 + $si28 + $asi28 + $hc28 + $ct28;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">viii)</div></td>
    <td>NRI CELL MOHALI</td>
    <td><div align="center">
      <?php $hold449 = info_fetch_osireport('INSP','NRI CELL MOHALI','paone8'); 
                      $hold450 = info_fetch_osireport('DSP/CR','NRI CELL MOHALI','paone8'); 
                      echo $insp29 = $hold449 + $hold450;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold451 = info_fetch_osireport('SI','NRI CELL MOHALI','paone8');
            $hold452 = info_fetch_osireport('INSP/LR','NRI CELL MOHALI','paone8'); 
            $hold453 = info_fetch_osireport('INSP/CR','NRI CELL MOHALI','paone8'); 
            echo $si29= $hold451 + $hold452 + $hold453;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold454 = info_fetch_osireport('ASI','NRI CELL MOHALI','paone8'); 
                $hold455 = info_fetch_osireport('SI/CR','NRI CELL MOHALI','paone8');  
                $hold456 = info_fetch_osireport('SI/LR','NRI CELL MOHALI','paone8'); 
                echo $asi29 =  $hold454 + $hold455 + $hold456; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold457 = info_fetch_osireport('HC','NRI CELL MOHALI','paone8');
                    $hold458 = info_fetch_osireport('ASI/LR','NRI CELL MOHALI','paone8');
                     $hold459 = info_fetch_osireport('ASI/CR','NRI CELL MOHALI','paone8');
             echo $hc29= $hold457 +  $hold458 + $hold459;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold460 = info_fetch_osireport('CT','NRI CELL MOHALI','paone8');
                       $hold461 = info_fetch_osireport('HC/PR','NRI CELL MOHALI','paone8');
                        $hold462 = info_fetch_osireport('HC/LR','NRI CELL MOHALI','paone8');
                         $hold463 = info_fetch_osireport('Sr.Const','NRI CELL MOHALI','paone8');
                         $hold464 = info_fetch_osireport('C-II','NRI CELL MOHALI','paone8');

             echo $ct29= $hold460 + $hold461 + $hold462 + $hold463 + $hold464;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp29 + $si29 + $asi29 + $hc29 + $ct29;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ix)</div></td>
    <td>INT. WING</td>
    <td><div align="center">
      <?php $hold465 = info_fetch_osireport('INSP','INTELLIGENCE WING','paone9'); 
                      $hold466 = info_fetch_osireport('DSP/CR','INTELLIGENCE WING','paone9'); 
                      echo $insp30 =  $hold465 + $hold466;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold467 = info_fetch_osireport('SI','INTELLIGENCE WING','paone9');
            $hold468 = info_fetch_osireport('INSP/LR','INTELLIGENCE WING','paone9'); 
            $hold469 = info_fetch_osireport('INSP/CR','INTELLIGENCE WING','paone9'); 
            echo $si30 = $hold467 + $hold468 + $hold469;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold470 = info_fetch_osireport('ASI','INTELLIGENCE WING','paone9'); 
                $hold471 = info_fetch_osireport('SI/CR','INTELLIGENCE WING','paone9');  
                $hold472 = info_fetch_osireport('SI/LR','INTELLIGENCE WING','paone9'); 
                echo $asi30 = $hold470 + $hold471 + $hold472; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold473 = info_fetch_osireport('HC','INTELLIGENCE WING','paone9');
                    $hold474 = info_fetch_osireport('ASI/LR','INTELLIGENCE WING','paone9');
                     $hold475 = info_fetch_osireport('ASI/CR','INTELLIGENCE WING','paone9');
             echo $hc30=  $hold473 +  $hold474 + $hold475;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold476 = info_fetch_osireport('CT','INTELLIGENCE WING','paone9');
                       $hold477 = info_fetch_osireport('HC/PR','INTELLIGENCE WING','paone9');
                        $hold478 = info_fetch_osireport('HC/LR','INTELLIGENCE WING','paone9');
                         $hold479 = info_fetch_osireport('Sr.Const','INTELLIGENCE WING','paone9');
                         $hold480 = info_fetch_osireport('C-II','INTELLIGENCE WING','paone9');

             echo  $ct30= $hold476 + $hold477 + $hold478 + $hold479 + $hold480;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp30 + $si30 + $asi30 + $hc30 + $ct30;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">x)</div></td>
    <td>CENTRAL POLICE LINE MOHALI</td>
    <td><div align="center">
      <?php $hold481 = info_fetch_osireport('INSP','CENTRAL POLICE LINE MOHALI','paone10'); 
                      $hold482 = info_fetch_osireport('DSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
                      echo $insp31 = $hold481 + $hold482;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold483 = info_fetch_osireport('SI','CENTRAL POLICE LINE MOHALI','paone10');
            $hold484 = info_fetch_osireport('INSP/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
            $hold485 = info_fetch_osireport('INSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
            echo $si31 =$hold483 + $hold484 + $hold485;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold486 = info_fetch_osireport('ASI','CENTRAL POLICE LINE MOHALI','paone10'); 
                $hold487 = info_fetch_osireport('SI/CR','CENTRAL POLICE LINE MOHALI','paone10');  
                $hold488 = info_fetch_osireport('SI/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
                echo $asi31 = $hold486 + $hold487 + $hold488; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold489 = info_fetch_osireport('HC','CENTRAL POLICE LINE MOHALI','paone10');
                    $hold490 = info_fetch_osireport('ASI/LR','CENTRAL POLICE LINE MOHALI','paone10');
                     $hold491 = info_fetch_osireport('ASI/CR','CENTRAL POLICE LINE MOHALI','paone10');
             echo  $hc31 = $hold489 +  $hold490 + $hold491;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold492 = info_fetch_osireport('CT','CENTRAL POLICE LINE MOHALI','paone10');
                       $hold493 = info_fetch_osireport('HC/PR','CENTRAL POLICE LINE MOHALI','paone10');
                        $hold494 = info_fetch_osireport('HC/LR','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold495 = info_fetch_osireport('Sr.Const','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold496 = info_fetch_osireport('C-II','CENTRAL POLICE LINE MOHALI','paone10');

             echo $ct31=  $hold492 + $hold493 + $hold494 + $hold495 + $hold496;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp31 + $si31 + $asi31 + $hc31 + $ct31;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xi)</div></td>
    <td>VIG. BUREAU</td>
    <td><div align="center">
      <?php $hold497 = info_fetch_osireport('INSP','VIGILANCE BUREAU','paone11'); 
                      $hold498 = info_fetch_osireport('DSP/CR','VIGILANCE BUREAU','paone11'); 
                      echo $insp32 = $hold497 + $hold498;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold499 = info_fetch_osireport('SI','VIGILANCE BUREAU','paone11');
            $hold500 = info_fetch_osireport('INSP/LR','VIGILANCE BUREAU','paone11'); 
            $hold501 = info_fetch_osireport('INSP/CR','VIGILANCE BUREAU','paone11'); 
            echo $si32 = $hold499 + $hold500 + $hold501;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold502 = info_fetch_osireport('ASI','VIGILANCE BUREAU','paone11'); 
                $hold503 = info_fetch_osireport('SI/CR','VIGILANCE BUREAU','paone11');  
                $hold504 = info_fetch_osireport('SI/LR','VIGILANCE BUREAU','paone11'); 
                echo $asi32 = $hold502 + $hold503 + $hold504; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold505 = info_fetch_osireport('HC','VIGILANCE BUREAU','paone11');
                    $hold506 = info_fetch_osireport('ASI/LR','VIGILANCE BUREAU','paone11');
                     $hold507 = info_fetch_osireport('ASI/CR','VIGILANCE BUREAU','paone11');
             echo $hc32 =  $hold505 +  $hold506 + $hold507;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold508 = info_fetch_osireport('CT','VIGILANCE BUREAU','paone11');
                       $hold509 = info_fetch_osireport('HC/PR','VIGILANCE BUREAU','paone11');
                        $hold510 = info_fetch_osireport('HC/LR','VIGILANCE BUREAU','paone11');
                         $hold511 = info_fetch_osireport('Sr.Const','VIGILANCE BUREAU','paone11');
                         $hold512 = info_fetch_osireport('C-II','VIGILANCE BUREAU','paone11');

             echo $ct32=  $hold508 + $hold509 + $hold510 + $hold511 + $hold512;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp32 + $si32 + $asi32 + $hc32 + $ct32;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xii)</div></td>
    <td>SNCB</td>
    <td><div align="center">
      <?php $hold513 = info_fetch_osireport('INSP','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      $hold514 = info_fetch_osireport('DSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      echo $insp33 = $hold513 + $hold514;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold515 = info_fetch_osireport('SI','STATE NARCOTIC CRIME BUREAU','paone12');
            $hold516 = info_fetch_osireport('INSP/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            $hold517 = info_fetch_osireport('INSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            echo $si33 = $hold515 + $hold516 + $hold517;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold518 = info_fetch_osireport('ASI','STATE NARCOTIC CRIME BUREAU','paone12'); 
                $hold519 = info_fetch_osireport('SI/CR','STATE NARCOTIC CRIME BUREAU','paone12');  
                $hold520 = info_fetch_osireport('SI/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                echo $asi33 = $hold518 + $hold519 + $hold520; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold521 = info_fetch_osireport('HC','STATE NARCOTIC CRIME BUREAU','paone12');
                    $hold522 = info_fetch_osireport('ASI/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                     $hold523 = info_fetch_osireport('ASI/CR','STATE NARCOTIC CRIME BUREAU','paone12');
             echo $hc33 = $hold521 +  $hold522 + $hold523;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold524 = info_fetch_osireport('CT','STATE NARCOTIC CRIME BUREAU','paone12');
                       $hold525 = info_fetch_osireport('HC/PR','STATE NARCOTIC CRIME BUREAU','paone12');
                        $hold526 = info_fetch_osireport('HC/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold527 = info_fetch_osireport('Sr.Const','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold528 = info_fetch_osireport('C-II','STATE NARCOTIC CRIME BUREAU','paone12');

             echo $ct33= $hold524 + $hold525 + $hold526 + $hold527 + $hold528;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp33 + $si33 + $asi33 + $hc33 + $ct33;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xiii)</div></td>
    <td>MOHALI AIRPORT IMMIGRATION DUTY</td>
    <td><div align="center">
      <?php $hold529 = info_fetch_osireport('INSP','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      $hold530 = info_fetch_osireport('DSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      echo $insp34 = $hold529 + $hold530;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold531 = info_fetch_osireport('SI','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
            $hold532 = info_fetch_osireport('INSP/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            $hold533 = info_fetch_osireport('INSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            echo $si34 = $hold531 + $hold532 + $hold533;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold534 = info_fetch_osireport('ASI','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                $hold535 = info_fetch_osireport('SI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');  
                $hold536 = info_fetch_osireport('SI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                echo $asi34 = $hold534 + $hold535 + $hold536; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold537 = info_fetch_osireport('HC','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                    $hold538 = info_fetch_osireport('ASI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                     $hold539 = info_fetch_osireport('ASI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
             echo $hc34 = $hold537 +  $hold538 + $hold539;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold540 = info_fetch_osireport('CT','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                       $hold541 = info_fetch_osireport('HC/PR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                        $hold542 = info_fetch_osireport('HC/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold543 = info_fetch_osireport('Sr.Const','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold544 = info_fetch_osireport('C-II','MOHALI AIRPORT IMMIGRATION DUTY','paone13');

             echo $ct34= $hold540 + $hold541 + $hold542 + $hold543 + $hold544;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp34 + $si34 + $asi34 + $hc34 + $ct34;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xiv)</div></td>
    <td>P.H.R.C.</td>
    <td><div align="center">
      <?php $hold545 = info_fetch_osireport('INSP','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      $hold546 = info_fetch_osireport('DSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      echo $insp35 = $hold545 + $hold546;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold547 = info_fetch_osireport('SI','STATE HUMAN RIGHTS COMMISSION','paone14');
            $hold548 = info_fetch_osireport('INSP/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            $hold549 = info_fetch_osireport('INSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            echo $si35 = $hold547 + $hold548 + $hold549;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold550 = info_fetch_osireport('ASI','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                $hold551 = info_fetch_osireport('SI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');  
                $hold552 = info_fetch_osireport('SI/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                echo $asi35 = $hold550 + $hold551 + $hold552; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold553 = info_fetch_osireport('HC','STATE HUMAN RIGHTS COMMISSION','paone14');
                    $hold554 = info_fetch_osireport('ASI/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                     $hold555 = info_fetch_osireport('ASI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');
             echo $hc35 = $hold553 +  $hold554 + $hold555;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold556 = info_fetch_osireport('CT','STATE HUMAN RIGHTS COMMISSION','paone14');
                       $hold557 = info_fetch_osireport('HC/PR','STATE HUMAN RIGHTS COMMISSION','paone14');
                        $hold558 = info_fetch_osireport('HC/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold559 = info_fetch_osireport('Sr.Const','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold560 = info_fetch_osireport('C-II','STATE HUMAN RIGHTS COMMISSION','paone14');

             echo $ct35= $hold556 + $hold557 + $hold558 + $hold559 + $hold560;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp35 + $si35 + $asi35 + $hc35 + $ct35;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xv)</div></td>
    <td>BUREAU OF INVESTIGATION</td>
    <td><div align="center">
      <?php $hold561 = info_fetch_osireport('INSP','BUREAU OF INVESTIGATION','paone15'); 
                      $hold562 = info_fetch_osireport('DSP/CR','BUREAU OF INVESTIGATION','paone15'); 
                      echo $insp36 = $hold561 + $hold562;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold563 = info_fetch_osireport('SI','BUREAU OF INVESTIGATION','paone15');
            $hold564 = info_fetch_osireport('INSP/LR','BUREAU OF INVESTIGATION','paone15'); 
            $hold565 = info_fetch_osireport('INSP/CR','BUREAU OF INVESTIGATION','paone15'); 
            echo $si36 = $hold563 + $hold564 + $hold565;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold566 = info_fetch_osireport('ASI','BUREAU OF INVESTIGATION','paone15'); 
                $hold567 = info_fetch_osireport('SI/CR','BUREAU OF INVESTIGATION','paone15');  
                $hold568 = info_fetch_osireport('SI/LR','BUREAU OF INVESTIGATION','paone15'); 
                echo $asi36 = $hold566 + $hold567 + $hold568; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold569 = info_fetch_osireport('HC','BUREAU OF INVESTIGATION','paone15');
                    $hold570 = info_fetch_osireport('ASI/LR','BUREAU OF INVESTIGATION','paone15');
                     $hold571 = info_fetch_osireport('ASI/CR','BUREAU OF INVESTIGATION','paone15');
             echo $hc36 = $hold569 +  $hold570 + $hold571;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold572 = info_fetch_osireport('CT','BUREAU OF INVESTIGATION','paone15');
                       $hold573 = info_fetch_osireport('HC/PR','BUREAU OF INVESTIGATION','paone15');
                        $hold574 = info_fetch_osireport('HC/LR','BUREAU OF INVESTIGATION','paone15');
                         $hold575 = info_fetch_osireport('Sr.Const','BUREAU OF INVESTIGATION','paone15');
                         $hold576 = info_fetch_osireport('C-II','BUREAU OF INVESTIGATION','paone15');

             echo $ct36= $hold572 + $hold573 + $hold574 + $hold575 + $hold576;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp36 + $si36 + $asi36 + $hc36 + $ct36;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xvi)</div></td>
    <td>RTC/PAP JALANDHAR</td>
    <td><div align="center">
      <?php $hold577 = info_fetch_osireport('INSP','RTC/PAP, JALANDHAR','paone16'); 
                      $hold578 = info_fetch_osireport('DSP/CR','RTC/PAP, JALANDHAR','paone16'); 
                      echo $insp37 =  $hold577 + $hold578;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold579 = info_fetch_osireport('SI','RTC/PAP, JALANDHAR','paone16');
            $hold580 = info_fetch_osireport('INSP/LR','RTC/PAP, JALANDHAR','paone16'); 
            $hold581 = info_fetch_osireport('INSP/CR','RTC/PAP, JALANDHAR','paone16'); 
            echo $si37 = $hold579 + $hold580 + $hold581;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold582 = info_fetch_osireport('ASI','RTC/PAP, JALANDHAR','paone16'); 
                $hold583 = info_fetch_osireport('SI/CR','RTC/PAP, JALANDHAR','paone16');  
                $hold584 = info_fetch_osireport('SI/LR','RTC/PAP, JALANDHAR','paone16'); 
                echo $asi37 = $hold582 + $hold583 + $hold584; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold585 = info_fetch_osireport('HC','RTC/PAP, JALANDHAR','paone16');
                    $hold586 = info_fetch_osireport('ASI/LR','RTC/PAP, JALANDHAR','paone16');
                     $hold587 = info_fetch_osireport('ASI/CR','RTC/PAP, JALANDHAR','paone16');
             echo $hc37 =  $hold585 +  $hold586 + $hold587;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold588 = info_fetch_osireport('CT','RTC/PAP, JALANDHAR','paone16');
                       $hold589 = info_fetch_osireport('HC/PR','RTC/PAP, JALANDHAR','paone16');
                        $hold590 = info_fetch_osireport('HC/LR','RTC/PAP, JALANDHAR','paone16');
                         $hold591 = info_fetch_osireport('Sr.Const','RTC/PAP, JALANDHAR','paone16');
                         $hold592 = info_fetch_osireport('C-II','RTC/PAP, JALANDHAR','paone16');

             echo $ct37=  $hold588 + $hold589 + $hold590 + $hold591 + $hold592;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp37 + $si37 + $asi37 + $hc37 + $ct37;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xvii)</div></td>
    <td>ISTC/PAP KAPURTHALA</td>
    <td><div align="center">
      <?php $hold593 = info_fetch_osireport('INSP','ISTC/PAP, KAPURTHALA','paone17'); 
                      $hold594 = info_fetch_osireport('DSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
                      echo $insp38 = $hold593 + $hold594;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold595 = info_fetch_osireport('SI','ISTC/PAP, KAPURTHALA','paone17');
            $hold596 = info_fetch_osireport('INSP/LR','ISTC/PAP, KAPURTHALA','paone17'); 
            $hold597 = info_fetch_osireport('INSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
            echo $si38 = $hold595 + $hold596 + $hold597;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold598 = info_fetch_osireport('ASI','ISTC/PAP, KAPURTHALA','paone17'); 
                $hold599 = info_fetch_osireport('SI/CR','ISTC/PAP, KAPURTHALA','paone17');  
                $hold600 = info_fetch_osireport('SI/LR','ISTC/PAP, KAPURTHALA','paone17'); 
                echo $asi38 =  $hold598 + $hold599 + $hold600; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold601 = info_fetch_osireport('HC','ISTC/PAP, KAPURTHALA','paone17');
                    $hold602 = info_fetch_osireport('ASI/LR','ISTC/PAP, KAPURTHALA','paone17');
                     $hold603 = info_fetch_osireport('ASI/CR','ISTC/PAP, KAPURTHALA','paone17');
             echo $hc38= $hold601 +  $hold602 + $hold603;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold604 = info_fetch_osireport('CT','ISTC/PAP, KAPURTHALA','paone17');
                       $hold605 = info_fetch_osireport('HC/PR','ISTC/PAP, KAPURTHALA','paone17');
                        $hold606 = info_fetch_osireport('HC/LR','ISTC/PAP, KAPURTHALA','paone17');
                         $hold607 = info_fetch_osireport('Sr.Const','ISTC/PAP, KAPURTHALA','paone17');
                         $hold608 = info_fetch_osireport('C-II','ISTC/PAP, KAPURTHALA','paone17');

             echo $ct38=  $hold604 + $hold605 + $hold606 + $hold607 + $hold608;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp38 + $si38 + $asi38 + $hc38 + $ct38;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xviii)</div></td>
    <td>PCTS BHG. PATIALA</td>
    <td><div align="center">
      <?php $hold609 = info_fetch_osireport('INSP','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      $hold610 = info_fetch_osireport('DSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      echo $insp39 = $hold609 + $hold610;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold611 = info_fetch_osireport('SI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
            $hold612 = info_fetch_osireport('INSP/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            $hold613 = info_fetch_osireport('INSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            echo $si39 =  $hold611 + $hold612 + $hold613;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold614 = info_fetch_osireport('ASI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                $hold615 = info_fetch_osireport('SI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');  
                $hold616 = info_fetch_osireport('SI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                echo $asi39 =  $hold614 + $hold615 + $hold616; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold617 = info_fetch_osireport('HC','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                    $hold618 = info_fetch_osireport('ASI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                     $hold619 = info_fetch_osireport('ASI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
             echo $hc39=  $hold617 +  $hold618 + $hold619;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold620 = info_fetch_osireport('CT','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                       $hold621 = info_fetch_osireport('HC/PR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                        $hold622 = info_fetch_osireport('HC/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold623 = info_fetch_osireport('Sr.Const','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold624 = info_fetch_osireport('C-II','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');

             echo $ct39=  $hold620 + $hold621 + $hold622 + $hold623 + $hold624;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp39 + $si39 + $asi39 + $hc39 + $ct39;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xix)</div></td>
    <td>RTC LADDA KOTHI SANGRUR</td>
    <td><div align="center">
      <?php $hold625 = info_fetch_osireport('INSP','RTC LADDA KOTHI SANGRUR','paone19'); 
                      $hold626 = info_fetch_osireport('DSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
                      echo $insp40 =  $hold625 + $hold626;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold627 = info_fetch_osireport('SI','RTC LADDA KOTHI SANGRUR','paone19');
            $hold628 = info_fetch_osireport('INSP/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
            $hold629 = info_fetch_osireport('INSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
            echo $si40 =  $hold627 + $hold628 + $hold629;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold630 = info_fetch_osireport('ASI','RTC LADDA KOTHI SANGRUR','paone19'); 
                $hold631 = info_fetch_osireport('SI/CR','RTC LADDA KOTHI SANGRUR','paone19');  
                $hold632 = info_fetch_osireport('SI/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
                echo $asi40 =  $hold630 + $hold631 + $hold632; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold633 = info_fetch_osireport('HC','RTC LADDA KOTHI SANGRUR','paone19');
                    $hold634 = info_fetch_osireport('ASI/LR','RTC LADDA KOTHI SANGRUR','paone19');
                     $hold635 = info_fetch_osireport('ASI/CR','RTC LADDA KOTHI SANGRUR','paone19');
             echo $hc40= $hold633 +  $hold634 + $hold635;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold6350 = info_fetch_osireport('CT','RTC LADDA KOTHI SANGRUR','paone19');
                       $hold636 = info_fetch_osireport('HC/PR','RTC LADDA KOTHI SANGRUR','paone19');
                        $hold637 = info_fetch_osireport('HC/LR','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold638 = info_fetch_osireport('Sr.Const','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold639 = info_fetch_osireport('C-II','RTC LADDA KOTHI SANGRUR','paone19');

             echo $ct40= $hold6350 + $hold636 + $hold637 + $hold638 + $hold639;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp40 + $si40 + $asi40 + $hc40 + $ct40;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xx)</div></td>
    <td>PPA PHILLAUR </td>
    <td><div align="center">
      <?php $hold640 = info_fetch_osireport('INSP','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      $hold641 = info_fetch_osireport('DSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      echo $insp41 = $hold640 + $hold641;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold642 = info_fetch_osireport('SI','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
            $hold643 = info_fetch_osireport('INSP/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            $hold644 = info_fetch_osireport('INSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            echo $si41 = $hold642 + $hold643 + $hold644;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold645 = info_fetch_osireport('ASI','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                $hold646 = info_fetch_osireport('SI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');  
                $hold647 = info_fetch_osireport('SI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                echo $asi41 =  $hold645 + $hold646 + $hold647; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold648 = info_fetch_osireport('HC','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                    $hold649 = info_fetch_osireport('ASI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                     $hold650 = info_fetch_osireport('ASI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
             echo $hc41=  $hold648 +  $hold649 + $hold650;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold651 = info_fetch_osireport('CT','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                       $hold652 = info_fetch_osireport('HC/PR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                        $hold653 = info_fetch_osireport('HC/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold654 = info_fetch_osireport('Sr.Const','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold655 = info_fetch_osireport('C-II','PUNJAB POLICE ACADEMY PHILLAUR','paone20');

             echo $ct41=  $hold651 + $hold652 + $hold653 + $hold654 + $hold655;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp41 + $si41 + $asi41 + $hc41 + $ct41;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xxi)</div></td>
    <td>PRTC/JAHAN KHELAN</td>
    <td><div align="center">
      <?php $hold656 = info_fetch_osireport('INSP','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      $hold657 = info_fetch_osireport('DSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      echo $insp42 =  $hold656 + $hold657;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold660 = info_fetch_osireport('SI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
            $hold661 = info_fetch_osireport('INSP/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            $hold662 = info_fetch_osireport('INSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            echo $si42 =  $hold660 + $hold661 + $hold662;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold663 = info_fetch_osireport('ASI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                $hold664 = info_fetch_osireport('SI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');  
                $hold665 = info_fetch_osireport('SI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                echo $asi42 = $hold663 + $hold664 + $hold665; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold666 = info_fetch_osireport('HC','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                    $hold667 = info_fetch_osireport('ASI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                     $hold668 = info_fetch_osireport('ASI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
             echo $hc42= $hold666 +  $hold667 + $hold668;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold669 = info_fetch_osireport('CT','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                       $hold670 = info_fetch_osireport('HC/PR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                        $hold671 = info_fetch_osireport('HC/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold672 = info_fetch_osireport('Sr.Const','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold673 = info_fetch_osireport('C-II','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');

             echo $ct42=  $hold669 + $hold670 + $hold671 + $hold672 + $hold673;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp42 + $si42 + $asi42 + $hc42 + $ct42;  ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 ; ?></div></td>
    <td><div align="center"><?php echo $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 ;  ?></div></td>
    <td><div align="center"><?php echo $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42;  ?></div></td>
    <td><div align="center"><?php echo $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42; ?></div></td>
    <td><div align="center"><?php echo $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42;?></div></td>
    <td><div align="center"><?php echo $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 + $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 + $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42 + $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42 + $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td> <strong>5. TRAINING</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 573px">BASIC TRAINING</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold674 = info_fetch_osireport('INSP','BASIC TRANING','traning1'); 
                      $hold675 = info_fetch_osireport('DSP/CR','BASIC TRANING','traning1'); 
                      echo $insp43 = $hold674 + $hold675;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold676 = info_fetch_osireport('SI','BASIC TRANING','traning1');
            $hold677 = info_fetch_osireport('INSP/LR','BASIC TRANING','traning1'); 
            $hold678 = info_fetch_osireport('INSP/CR','BASIC TRANING','traning1'); 
            echo $si43 =$hold676 + $hold677 + $hold678;
              ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold679 = info_fetch_osireport('ASI','BASIC TRANING','traning1'); 
                $hold680 = info_fetch_osireport('SI/CR','BASIC TRANING','traning1');  
                $hold681 = info_fetch_osireport('SI/LR','BASIC TRANING','traning1'); 
                echo $asi43 =  $hold679 + $hold680 + $hold681; 

             ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold682 = info_fetch_osireport('HC','BASIC TRANING','traning1');
                    $hold683 = info_fetch_osireport('ASI/LR','BASIC TRANING','traning1');
                     $hold684 = info_fetch_osireport('ASI/CR','BASIC TRANING','traning1');
             echo $hc43= $hold682 +  $hold683 + $hold684;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold685 = info_fetch_osireport('CT','BASIC TRANING','traning1');
                       $hold686 = info_fetch_osireport('HC/PR','BASIC TRANING','traning1');
                        $hold687 = info_fetch_osireport('HC/LR','BASIC TRANING','traning1');
                         $hold688 = info_fetch_osireport('Sr.Const','BASIC TRANING','traning1');
                         $hold689 = info_fetch_osireport('C-II','BASIC TRANING','traning1');

             echo $ct43= $hold685 + $hold686 + $hold687 + $hold688 + $hold689;  ?>
    </div></td>
    <td style="width: 40px"><div align="center"><?php echo $insp43 + $si43 + $asi43 + $hc43 + $ct43;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>PROMOTIONAL COURSES</td>
    <td><div align="center">
      <?php $hold690 = info_fetch_osireport('INSP','PROMOTIONAL COURSE','traning2'); 
                      $hold691 = info_fetch_osireport('DSP/CR','PROMOTIONAL COURSE','traning2'); 
                      echo $insp44 = $hold690 + $hold691;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold692 = info_fetch_osireport('SI','PROMOTIONAL COURSE','traning2');
            $hold693 = info_fetch_osireport('INSP/LR','PROMOTIONAL COURSE','traning2'); 
            $hold694 = info_fetch_osireport('INSP/CR','PROMOTIONAL COURSE','traning2'); 
            echo $si44 =$hold692 + $hold693 + $hold694;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold695 = info_fetch_osireport('ASI','PROMOTIONAL COURSE','traning2'); 
                $hold696 = info_fetch_osireport('SI/CR','PROMOTIONAL COURSE','traning2');  
                $hold697 = info_fetch_osireport('SI/LR','PROMOTIONAL COURSE','traning2'); 
                echo $asi44 = $hold695 + $hold696 + $hold697; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold698 = info_fetch_osireport('HC','PROMOTIONAL COURSE','traning2');
                    $hold699 = info_fetch_osireport('ASI/LR','PROMOTIONAL COURSE','traning2');
                     $hold700 = info_fetch_osireport('ASI/CR','PROMOTIONAL COURSE','traning2');
             echo $hc44= $hold698 +  $hold699 + $hold700;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold701 = info_fetch_osireport('CT','PROMOTIONAL COURSE','traning2');
                       $hold702 = info_fetch_osireport('HC/PR','PROMOTIONAL COURSE','traning2');
                        $hold703 = info_fetch_osireport('HC/LR','PROMOTIONAL COURSE','traning2');
                         $hold704 = info_fetch_osireport('Sr.Const','PROMOTIONAL COURSE','traning2');
                         $hold705 = info_fetch_osireport('C-II','PROMOTIONAL COURSE','traning2');

             echo $ct44=  $hold701 + $hold702 + $hold703 + $hold704 + $hold705;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp44 + $si44 + $asi44 + $hc44 + $ct44;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>DEPARTTMENTAL COURSES</td>
    <td><div align="center">
      <?php $hold706 = info_fetch_osireport('INSP','DEPARTMENT COURSE','traning3'); 
                      $hold707 = info_fetch_osireport('DSP/CR','DEPARTMENT COURSE','traning3'); 
                      echo $insp45 = $hold706 + $hold707;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold708 = info_fetch_osireport('SI','DEPARTMENT COURSE','traning3');
            $hold709 = info_fetch_osireport('INSP/LR','DEPARTMENT COURSE','traning3'); 
            $hold710 = info_fetch_osireport('INSP/CR','DEPARTMENT COURSE','traning3'); 
            echo $si45 =$hold708 + $hold709 + $hold710;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold711 = info_fetch_osireport('ASI','DEPARTMENT COURSE','traning3'); 
                $hold712 = info_fetch_osireport('SI/CR','DEPARTMENT COURSE','traning3');  
                $hold713 = info_fetch_osireport('SI/LR','DEPARTMENT COURSE','traning3'); 
                echo $asi45 =  $hold711 + $hold712 + $hold713; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold714 = info_fetch_osireport('HC','DEPARTMENT COURSE','traning3');
                    $hold715 = info_fetch_osireport('ASI/LR','DEPARTMENT COURSE','traning3');
                     $hold716 = info_fetch_osireport('ASI/CR','DEPARTMENT COURSE','traning3');
             echo $hc45=  $hold714 +  $hold715 + $hold716;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold717 = info_fetch_osireport('CT','DEPARTMENT COURSE','traning3');
                       $hold718 = info_fetch_osireport('HC/PR','DEPARTMENT COURSE','traning3');
                        $hold719 = info_fetch_osireport('HC/LR','DEPARTMENT COURSE','traning3');
                         $hold720 = info_fetch_osireport('Sr.Const','DEPARTMENT COURSE','traning3');
                         $hold721 = info_fetch_osireport('C-II','DEPARTMENT COURSE','traning3');

             echo $ct45=  $hold717 + $hold718 + $hold719 + $hold720 + $hold721;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp45 + $si45 + $asi45 + $hc45 + $ct45;  ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo $insp43 + $insp44 + $insp45; ?></div></td>
    <td><div align="center"><?php echo $si43 + $si44 + $si45;  ?></div></td>
    <td><div align="center"><?php echo $asi43 + $asi44 + $asi45;  ?></div></td>
    <td><div align="center"><?php echo $hc43 + $hc44 + $hc45; ?></div></td>
    <td><div align="center"><?php echo $ct43 + $ct44 + $ct45;?></div></td>
    <td><div align="center"><?php echo $insp43 + $insp44 + $insp45 + $si43 + $si44 + $si45 + $asi43 + $asi44 + $asi45 + $hc43 + $hc44 + $hc45 + $ct43 + $ct44 + $ct45; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><h3> 6. SPORTS</h3></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 572px">DSO</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold722 = info_fetch_osireport('INSP','DSO','ssone23'); 
                      $hold723 = info_fetch_osireport('DSP/CR','DSO','ssone23'); 
                      echo $insp46 = $hold722 + $hold723;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold724 = info_fetch_osireport('SI','DSO','ssone23');
            $hold725 = info_fetch_osireport('INSP/LR','DSO','ssone23'); 
            $hold726 = info_fetch_osireport('INSP/CR','DSO','ssone23'); 
            echo $si46 = $hold724 + $hold725 + $hold726;
              ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold727 = info_fetch_osireport('ASI','DSO','ssone23'); 
                $hold728 = info_fetch_osireport('SI/CR','DSO','ssone23');  
                $hold729 = info_fetch_osireport('SI/LR','DSO','ssone23'); 
                echo $asi46 = $hold727 + $hold728 + $hold729; 

             ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold730 = info_fetch_osireport('HC','DSO','ssone23');
                    $hold731 = info_fetch_osireport('ASI/LR','DSO','ssone23');
                     $hold732 = info_fetch_osireport('ASI/CR','DSO','ssone23');
             echo $hc46= $hold730 +  $hold731 + $hold732;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold733 = info_fetch_osireport('CT','DSO','ssone23');
                       $hold734 = info_fetch_osireport('HC/PR','DSO','ssone23');
                        $hold735 = info_fetch_osireport('HC/LR','DSO','ssone23');
                         $hold736 = info_fetch_osireport('Sr.Const','DSO','ssone23');
                         $hold737 = info_fetch_osireport('C-II','DSO','ssone23');

             echo $ct46=  $hold733 + $hold734 + $hold735 + $hold736 + $hold737;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center"><?php echo $insp46 + $si46 + $asi46 + $hc46 + $ct46;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>CENTRAL SPORTS OFFICE JALANDHAR</td>
    <td><div align="center">
      <?php $hold738 = info_fetch_osireport('INSP','CSO, JALANDHAR','ssone24'); 
                      $hold739 = info_fetch_osireport('DSP/CR','CSO, JALANDHAR','ssone24'); 
                      echo $insp47 = $hold738 + $hold739;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold740 = info_fetch_osireport('SI','CSO, JALANDHAR','ssone24');
            $hold741 = info_fetch_osireport('INSP/LR','CSO, JALANDHAR','ssone24'); 
            $hold742 = info_fetch_osireport('INSP/CR','CSO, JALANDHAR','ssone24'); 
            echo $si47 = $hold740 + $hold741 + $hold742;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold743 = info_fetch_osireport('ASI','CSO, JALANDHAR','ssone24'); 
                $hold744 = info_fetch_osireport('SI/CR','CSO, JALANDHAR','ssone24');  
                $hold745 = info_fetch_osireport('SI/LR','CSO, JALANDHAR','ssone24'); 
                echo $asi47 =  $hold743 + $hold744 + $hold745; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold746 = info_fetch_osireport('HC','CSO, JALANDHAR','ssone24');
                    $hold747 = info_fetch_osireport('ASI/LR','CSO, JALANDHAR','ssone24');
                     $hold748 = info_fetch_osireport('ASI/CR','CSO, JALANDHAR','ssone24');
             echo $hc47= $hold746 +  $hold747 + $hold748;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold749 = info_fetch_osireport('CT','CSO, JALANDHAR','ssone24');
                       $hold750 = info_fetch_osireport('HC/PR','CSO, JALANDHAR','ssone24');
                        $hold751 = info_fetch_osireport('HC/LR','CSO, JALANDHAR','ssone24');
                         $hold752 = info_fetch_osireport('Sr.Const','CSO, JALANDHAR','ssone24');
                         $hold753 = info_fetch_osireport('C-II','CSO, JALANDHAR','ssone24');

             echo $ct47=  $hold749 + $hold750 + $hold751 + $hold752 + $hold753;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp47 + $si47 + $asi47 + $hc47 + $ct47;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>NIS PATIALA</td>
    <td><div align="center">
      <?php $hold754 = info_fetch_osireport('INSP','NIS PATIALA','ssone25'); 
                      $hold755 = info_fetch_osireport('DSP/CR','NIS PATIALA','ssone25'); 
                      echo $insp48 = $hold754 + $hold755;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold756 = info_fetch_osireport('SI','NIS PATIALA','ssone25');
            $hold757 = info_fetch_osireport('INSP/LR','NIS PATIALA','ssone25'); 
            $hold758 = info_fetch_osireport('INSP/CR','NIS PATIALA','ssone25'); 
            echo $si48 = $hold756 + $hold757 + $hold758;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold759 = info_fetch_osireport('ASI','NIS PATIALA','ssone25'); 
                $hold760 = info_fetch_osireport('SI/CR','NIS PATIALA','ssone25');  
                $hold761 = info_fetch_osireport('SI/LR','NIS PATIALA','ssone25'); 
                echo $asi48 = $hold759 + $hold760 + $hold761; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold762 = info_fetch_osireport('HC','NIS PATIALA','ssone25');
                    $hold763 = info_fetch_osireport('ASI/LR','NIS PATIALA','ssone25');
                     $hold764 = info_fetch_osireport('ASI/CR','NIS PATIALA','ssone25');
             echo $hc48= $hold762 +  $hold763 + $hold764;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold765 = info_fetch_osireport('CT','NIS PATIALA','ssone25');
                       $hold766 = info_fetch_osireport('HC/PR','NIS PATIALA','ssone25');
                        $hold767 = info_fetch_osireport('HC/LR','NIS PATIALA','ssone25');
                         $hold768 = info_fetch_osireport('Sr.Const','NIS PATIALA','ssone25');
                         $hold769 = info_fetch_osireport('C-II','NIS PATIALA','ssone25');

             echo $ct48= $hold765 + $hold766 + $hold767 + $hold768 + $hold769;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp48 + $si48 + $asi48 + $hc48 + $ct48;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>OTHER</td>
    <td><div align="center">
      <?php $hold770 = info_fetch_osireport('INSP','OTHERS','ssone26'); 
                      $hold771 = info_fetch_osireport('DSP/CR','OTHERS','ssone26'); 
                      echo $insp49 = $hold770 + $hold771;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold772 = info_fetch_osireport('SI','OTHERS','ssone26');
            $hold773 = info_fetch_osireport('INSP/LR','OTHERS','ssone26'); 
            $hold774 = info_fetch_osireport('INSP/CR','OTHERS','ssone26'); 
            echo $si49 = $hold772 + $hold773 + $hold774;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold775 = info_fetch_osireport('ASI','OTHERS','ssone26'); 
                $hold776 = info_fetch_osireport('SI/CR','OTHERS','ssone26');  
                $hold777 = info_fetch_osireport('SI/LR','OTHERS','ssone26'); 
                echo $asi49 = $hold775 + $hold776 + $hold777; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold778 = info_fetch_osireport('HC','OTHERS','ssone26');
                    $hold779 = info_fetch_osireport('ASI/LR','OTHERS','ssone26');
                     $hold780 = info_fetch_osireport('ASI/CR','OTHERS','ssone26');
             echo $hc49= $hold778 +  $hold779 + $hold780;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold781 = info_fetch_osireport('CT','OTHERS','ssone26');
                       $hold782 = info_fetch_osireport('HC/PR','OTHERS','ssone26');
                        $hold783 = info_fetch_osireport('HC/LR','OTHERS','ssone26');
                         $hold784 = info_fetch_osireport('Sr.Const','OTHERS','ssone26');
                         $hold785 = info_fetch_osireport('C-II','OTHERS','ssone26');

             echo $ct49= $hold781 + $hold782 + $hold783 + $hold784 + $hold785;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp49 + $si49 + $asi49 + $hc49 + $ct49;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>TOTAL</td>
    <td><div align="center"><?php echo $insp46 + $insp47 + $insp48 + $insp49; ?></div></td>
    <td><div align="center"><?php echo $si46 + $si47 + $si48 + $si49;  ?></div></td>
    <td><div align="center"><?php echo $asi46 +  $asi47 + $asi48 + $asi49;  ?></div></td>
    <td><div align="center"><?php echo $hc46 + $hc47 + $hc48 + $hc49; ?></div></td>
    <td><div align="center"><?php echo $ct46 + $ct47 + $ct48 + $ct49;?></div></td>
    <td><div align="center"><?php echo $insp46 + $insp47 + $insp48 + $insp49 + $si46 + $si47 + $si48 + $si49 + $asi46 +  $asi47 + $asi48 + $asi49 + $hc46 + $hc47 + $hc48 + $hc49 + $ct46 + $ct47 + $ct48 + $ct49; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td> <strong>7. AVAILABLE WITH BNs.</strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 565px">PAP HQRS. CAMPUS SECURITY</span></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold786 = info_fetch_osireport('INSP','PAP CAMPUS  SECURITY','awbone1'); 
                      $hold787 = info_fetch_osireport('DSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
                      echo $insp50 = $hold786 + $hold787;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold788 = info_fetch_osireport('SI','PAP CAMPUS  SECURITY','awbone1');
            $hold789 = info_fetch_osireport('INSP/LR','PAP CAMPUS  SECURITY','awbone1'); 
            $hold790 = info_fetch_osireport('INSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
            echo $si50 =  $hold788 + $hold789 + $hold790;
              ?>
    </div></td>
    <td   style="width: 40px"><div align="center">
      <?php $hold791 = info_fetch_osireport('ASI','PAP CAMPUS  SECURITY','awbone1'); 
                $hold792 = info_fetch_osireport('SI/CR','PAP CAMPUS  SECURITY','awbone1');  
                $hold793 = info_fetch_osireport('SI/LR','PAP CAMPUS  SECURITY','awbone1'); 
                echo $asi50 = $hold791 + $hold792 + $hold793; 

             ?>
    </div></td>
    <td   style="width: 40px"><div align="center">
      <?php $hold794 = info_fetch_osireport('HC','PAP CAMPUS  SECURITY','awbone1');
                    $hold795 = info_fetch_osireport('ASI/LR','PAP CAMPUS  SECURITY','awbone1');
                     $hold796 = info_fetch_osireport('ASI/CR','PAP CAMPUS  SECURITY','awbone1');
             echo $hc50= $hold794 +  $hold795 + $hold796;  ?>
    </div></td>
    <td   style="width: 40px"><div align="center">
      <?php $hold797 = info_fetch_osireport('CT','PAP CAMPUS  SECURITY','awbone1');
                       $hold798 = info_fetch_osireport('HC/PR','PAP CAMPUS  SECURITY','awbone1');
                        $hold799 = info_fetch_osireport('HC/LR','PAP CAMPUS  SECURITY','awbone1');
                         $hold800 = info_fetch_osireport('Sr.Const','PAP CAMPUS  SECURITY','awbone1');
                         $hold801 = info_fetch_osireport('C-II','PAP CAMPUS  SECURITY','awbone1');

             echo $ct50=  $hold797 + $hold798 + $hold799 + $hold800 + $hold801;  ?>
    </div></td>
    <td   style="width: 40px"><div align="center"><?php echo $insp50 + $si50 + $asi50 + $hc50 + $ct50;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td><p>PERSONEL SECURITY STAFF WITH <br />
    ARMED WING OFFICERS</p></td>
    <td><div align="center">
      <?php $hold802 = info_fetch_osireport('INSP','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2'); 
                      $hold803 = info_fetch_osireport('DSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                      echo $insp51 = $hold802 + $hold803;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold804 = info_fetch_osireport('SI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
            $hold805 = info_fetch_osireport('INSP/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            $hold806 = info_fetch_osireport('INSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            echo $si51 = $hold804 + $hold805 + $hold806;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold807 = info_fetch_osireport('ASI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                $hold8017 = info_fetch_osireport('SI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                $hold808 = info_fetch_osireport('SI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                echo $asi51 = $hold807 + $hold8017 + $hold808; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold809 = info_fetch_osireport('HC','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                    $hold810 = info_fetch_osireport('ASI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                     $hold811 = info_fetch_osireport('ASI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
             echo $hc51= $hold809 +  $hold810 + $hold811;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold812 = info_fetch_osireport('CT','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                       $hold813 = info_fetch_osireport('HC/PR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                        $hold814 = info_fetch_osireport('HC/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold815 = info_fetch_osireport('Sr.Const','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold816 = info_fetch_osireport('C-II','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

             echo $ct51=  $hold812 + $hold813 + $hold814 + $hold815 + $hold816;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp51 + $si51 + $asi51 + $hc51 + $ct51;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>OFFICE STAFF IN ARMED HIGHER OFFICES</td>
    <td><div align="center">
      <?php $hold817 = info_fetch_osireport('INSP','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      $hold818 = info_fetch_osireport('DSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      echo $insp52 = $hold817 + $hold818;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold819 = info_fetch_osireport('SI','OFFICE STAFF IN HIGHER OFFICES','awbone3');
            $hold820 = info_fetch_osireport('INSP/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            $hold821 = info_fetch_osireport('INSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            echo $si52 = $hold819 + $hold820 + $hold821;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold822 = info_fetch_osireport('ASI','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                $hold823 = info_fetch_osireport('SI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');  
                $hold824 = info_fetch_osireport('SI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                echo $asi52 = $hold822 + $hold823 + $hold824; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold825 = info_fetch_osireport('HC','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                    $hold826 = info_fetch_osireport('ASI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                     $hold827 = info_fetch_osireport('ASI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
             echo $hc52=  $hold825 +  $hold826 + $hold827;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold828 = info_fetch_osireport('CT','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                       $hold829 = info_fetch_osireport('HC/PR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                        $hold830 = info_fetch_osireport('HC/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold831 = info_fetch_osireport('Sr.Const','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold832 = info_fetch_osireport('C-II','OFFICE STAFF IN HIGHER OFFICES','awbone3');

             echo $ct52= $hold828 + $hold829 + $hold830 + $hold831 + $hold832;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp52 + $si52 + $asi52 + $hc52 + $ct52;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>OFFICE STAFF IN BN. OFFICES</td>
    <td><div align="center">
      <?php $hold833 = info_fetch_osireports('INSP','','awbone4'); 
                      $hold834 = info_fetch_osireports('DSP/CR','','awbone4'); 
                      echo $insp53 = $hold833 + $hold834;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold835 = info_fetch_osireports('SI','','awbone4');
            $hold836 = info_fetch_osireports('INSP/LR','','awbone4'); 
            $hold837 = info_fetch_osireports('INSP/CR','','awbone4'); 
            echo $si53 = $hold835 + $hold836 + $hold837;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold838 = info_fetch_osireports('ASI','','awbone4'); 
                $hold839 = info_fetch_osireports('SI/CR','','awbone4');  
                $hold840 = info_fetch_osireports('SI/LR','','awbone4'); 
                echo $asi53 =  $hold838 + $hold839 + $hold840; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold841 = info_fetch_osireports('HC','','awbone4');
                    $hold842 = info_fetch_osireports('ASI/LR','','awbone4');
                     $hold843 = info_fetch_osireports('ASI/CR','','awbone4');
             echo $hc53= $hold841 +  $hold842 + $hold843;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold844 = info_fetch_osireports('CT','','awbone4');
                       $hold845 = info_fetch_osireports('HC/PR','','awbone4');
                        $hold846 = info_fetch_osireports('HC/LR','','awbone4');
                         $hold847 = info_fetch_osireports('Sr.Const','','awbone4');
                         $hold848 = info_fetch_osireports('C-II','','awbone4');

             echo $ct53= $hold844 + $hold845 + $hold846 + $hold847 + $hold848;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp53 + $si53 + $asi53 + $hc53 + $ct53;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">v)</div></td>
    <td>BN. KOT GUARDS</td>
    <td><div align="center">
      <?php $hold849 = info_fetch_osireport('INSP','BN. KOT GUARDS','awbone5'); 
                      $hold850 = info_fetch_osireport('DSP/CR','BN KOT GUARD','awbone5'); 
                      echo $insp54 = $hold849 + $hold850;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold851 = info_fetch_osireport('SI','BN KOT GUARD','awbone5');
            $hold852 = info_fetch_osireport('INSP/LR','BN KOT GUARD','awbone5'); 
            $hold853 = info_fetch_osireport('INSP/CR','BN KOT GUARD','awbone5'); 
            echo $si54 = $hold851 + $hold852 + $hold853;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold854 = info_fetch_osireport('ASI','BN KOT GUARD','awbone5'); 
                $hold855 = info_fetch_osireport('SI/CR','BN KOT GUARD','awbone5');  
                $hold856 = info_fetch_osireport('SI/LR','BN KOT GUARD','awbone5'); 
                echo $asi54 = $hold854 + $hold855 + $hold856; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold857 = info_fetch_osireport('HC','BN KOT GUARD','awbone5');
                    $hold858 = info_fetch_osireport('ASI/LR','BN KOT GUARD','awbone5');
                     $hold859 = info_fetch_osireport('ASI/CR','BN KOT GUARD','awbone5');
             echo $hc54= $hold857 +  $hold858 + $hold859;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold860 = info_fetch_osireport('CT','BN KOT GUARD','awbone5');
                       $hold861 = info_fetch_osireport('HC/PR','BN KOT GUARD','awbone5');
                        $hold862 = info_fetch_osireport('HC/LR','BN KOT GUARD','awbone5');
                         $hold863 = info_fetch_osireport('Sr.Const','BN KOT GUARD','awbone5');
                         $hold864 = info_fetch_osireport('C-II','BN KOT GUARD','awbone5');

             echo $ct54= $hold860 + $hold861 + $hold862 + $hold863 + $hold864;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp54 + $si54 + $asi54 + $hc54 + $ct54;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vi)</div></td>
    <td>BN. HQRS OTHER GUARDS</td>
    <td><div align="center">
      <?php $hold865 = info_fetch_osireports('INSP','','awbone6'); 
                      $hold866 = info_fetch_osireports('DSP/CR','','awbone6'); 
                      echo $insp55 = $hold865 + $hold866;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold867 = info_fetch_osireports('SI','','awbone6');
            $hold868 = info_fetch_osireports('INSP/LR','','awbone6'); 
            $hold869 = info_fetch_osireports('INSP/CR','','awbone6'); 
            echo $si55 = $hold867 + $hold868 + $hold869;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold870 = info_fetch_osireports('ASI','','awbone6'); 
                $hold871 = info_fetch_osireports('SI/CR','','awbone6');  
                $hold872 = info_fetch_osireports('SI/LR','','awbone6'); 
                echo $asi55 =  $hold870 + $hold871 + $hold872; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold873 = info_fetch_osireports('HC','','awbone6');
                    $hold874 = info_fetch_osireports('ASI/LR','','awbone6');
                     $hold875 = info_fetch_osireports('ASI/CR','','awbone6');
             echo $hc55= $hold873 +  $hold874 + $hold875;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold876 = info_fetch_osireports('CT','','awbone6');
                       $hold877 = info_fetch_osireports('HC/PR','','awbone6');
                        $hold878 = info_fetch_osireports('HC/LR','','awbone6');
                         $hold879 = info_fetch_osireports('Sr.Const','','awbone6');
                         $hold880 = info_fetch_osireports('C-II','','awbone6');

             echo $ct55= $hold876 + $hold877 + $hold878 + $hold879 + $hold880;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp55 + $si55 + $asi55 + $hc55 + $ct55;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vii)</div></td>
    <td>TRADEMEN</td>
    <td><div align="center">
      <?php $hold881 = info_fetch_osireport('INSP','TRADESMEN','awbone7'); 
                      $hold882 = info_fetch_osireport('DSP/CR','TRADESMEN','awbone7'); 
                      echo $insp56 = $hold881 + $hold882;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold884 = info_fetch_osireport('SI','TRADESMEN','awbone7');
            $hold885 = info_fetch_osireport('INSP/LR','TRADESMEN','awbone7'); 
            $hold886 = info_fetch_osireport('INSP/CR','TRADESMEN','awbone7'); 
            echo $si56 = $hold884 + $hold885 + $hold886;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold887 = info_fetch_osireport('ASI','TRADESMEN','awbone7'); 
                $hold888 = info_fetch_osireport('SI/CR','TRADESMEN','awbone7');  
                $hold889 = info_fetch_osireport('SI/LR','TRADESMEN','awbone7'); 
                echo $asi56 = $hold887 + $hold888 + $hold889; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold890 = info_fetch_osireport('HC','TRADESMEN','awbone7');
                    $hold891 = info_fetch_osireport('ASI/LR','TRADESMEN','awbone7');
                     $hold892 = info_fetch_osireport('ASI/CR','TRADESMEN','awbone7');
             echo  $hc56= $hold890 +  $hold891 + $hold892;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold893 = info_fetch_osireport('CT','TRADESMEN','awbone7');
                       $hold894 = info_fetch_osireport('HC/PR','TRADESMEN','awbone7');
                        $hold895 = info_fetch_osireport('HC/LR','TRADESMEN','awbone7');
                         $hold896 = info_fetch_osireport('Sr.Const','TRADESMEN','awbone7');
                         $hold897 = info_fetch_osireport('C-II','TRADESMEN','awbone7');
             echo $ct56= $hold893 + $hold894 + $hold895 + $hold896 + $hold897;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp56 + $si56 + $asi56 + $hc56 + $ct56;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">viii)</div></td>
    <td>ARMOURER</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">ix)</div></td>
    <td>M.T.SECTION </td>
    <td><div align="center">
      <?php $hold898 = info_fetch_osireport('INSP','M.T. SECTION','awbone8'); 
                      $hold899 = info_fetch_osireport('DSP/CR','M.T. SECTION','awbone8'); 
                      echo $insp57 = $hold898 + $hold899;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold8990 = info_fetch_osireport('SI','M.T. SECTION','awbone8');
            $hold900 = info_fetch_osireport('INSP/LR','M.T. SECTION','awbone8'); 
            $hold901 = info_fetch_osireport('INSP/CR','M.T. SECTION','awbone8'); 
            echo $si57 =  $hold8990 + $hold900 + $hold901;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold902 = info_fetch_osireport('ASI','M.T. SECTION','awbone8'); 
                $hold903 = info_fetch_osireport('SI/CR','M.T. SECTION','awbone8');  
                $hold904 = info_fetch_osireport('SI/LR','M.T. SECTION','awbone8'); 
                echo $asi57 = $hold902 + $hold903 + $hold904; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold905 = info_fetch_osireport('HC','M.T. SECTION','awbone8');
                    $hold906 = info_fetch_osireport('ASI/LR','M.T. SECTION','awbone8');
                     $hold907 = info_fetch_osireport('ASI/CR','M.T. SECTION','awbone8');
             echo $hc57= $hold905 +  $hold906 + $hold907;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold908 = info_fetch_osireport('CT','M.T. SECTION','awbone8');
                       $hold909 = info_fetch_osireport('HC/PR','M.T. SECTION','awbone8');
                        $hold910 = info_fetch_osireport('HC/LR','M.T. SECTION','awbone8');
                         $hold911 = info_fetch_osireport('Sr.Const','M.T. SECTION','awbone8');
                         $hold912 = info_fetch_osireport('C-II','M.T. SECTION','awbone8');

             echo $ct57 = $hold908 + $hold909 + $hold910 + $hold911 + $hold912;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp57 + $si57 + $asi57 + $hc57 + $ct57;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">x)</div></td>
    <td>QUARTER MASTER BRANCH (LINE STAFF)</td>
    <td><div align="center">
      <?php $hold913 = info_fetch_osireports('INSP','','awbone9'); 
                      $hold914 = info_fetch_osireports('DSP/CR','','awbone9'); 
                      echo $insp58 = $hold913 + $hold914;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold915 = info_fetch_osireports('SI','','awbone9');
            $hold916 = info_fetch_osireports('INSP/LR','','awbone9'); 
            $hold917 = info_fetch_osireports('INSP/CR','','awbone9'); 
            echo $si58 =  $hold915 + $hold916 + $hold917;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold918 = info_fetch_osireports('ASI','','awbone9'); 
                $hold919 = info_fetch_osireports('SI/CR','','awbone9');  
                $hold920 = info_fetch_osireports('SI/LR','','awbone9'); 
                echo $asi58 = $hold918 + $hold919 + $hold920; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold921 = info_fetch_osireports('HC','','awbone9');
                    $hold922 = info_fetch_osireports('ASI/LR','','awbone9');
                     $hold923 = info_fetch_osireports('ASI/CR','','awbone9');
             echo $hc58= $hold921 +  $hold922 + $hold923;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold924 = info_fetch_osireports('CT','','awbone9');
                       $hold925 = info_fetch_osireports('HC/PR','','awbone9');
                        $hold926 = info_fetch_osireports('HC/LR','','awbone9');
                         $hold927 = info_fetch_osireports('Sr.Const','','awbone9');
                         $hold928 = info_fetch_osireports('C-II','','awbone9');

             echo $ct58= $hold924 + $hold925 + $hold926 + $hold927 + $hold928;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp58 + $si58 + $asi58 + $hc58 + $ct58;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xi)</div></td>
    <td>GENERAL DUTY</td>
    <td><div align="center">
      <?php $hold929 = info_fetch_osireport('INSP','GENERAL DUTY BN.HQRS','awbone10'); 
                      $hold930 = info_fetch_osireport('DSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
                      echo $insp59 = $hold929 + $hold930;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold931 = info_fetch_osireport('SI','GENERAL DUTY BN.HQRS','awbone10');
            $hold932 = info_fetch_osireport('INSP/LR','GENERAL DUTY BN.HQRS','awbone10'); 
            $hold933 = info_fetch_osireport('INSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
            echo $si59 = $hold931 + $hold932 + $hold933;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold934 = info_fetch_osireport('ASI','GENERAL DUTY BN.HQRS','awbone10'); 
                $hold935 = info_fetch_osireport('SI/CR','GENERAL DUTY BN.HQRS','awbone10');  
                $hold936 = info_fetch_osireport('SI/LR','GENERAL DUTY BN.HQRS','awbone10'); 
                echo $asi59 = $hold934 + $hold935 + $hold936; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold937 = info_fetch_osireport('HC','GENERAL DUTY BN.HQRS','awbone10');
                    $hold938 = info_fetch_osireport('ASI/LR','GENERAL DUTY BN.HQRS','awbone10');
                     $hold939 = info_fetch_osireport('ASI/CR','GENERAL DUTY BN.HQRS','awbone10');
             echo $hc59= $hold937 +  $hold938 + $hold939;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold940 = info_fetch_osireport('CT','GENERAL DUTY BN.HQRS','awbone10');
                       $hold941 = info_fetch_osireport('HC/PR','GENERAL DUTY BN.HQRS','awbone10');
                        $hold942 = info_fetch_osireport('HC/LR','GENERAL DUTY BN.HQRS','awbone10');
                         $hold943 = info_fetch_osireport('Sr.Const','GENERAL DUTY BN.HQRS','awbone10');
                         $hold944 = info_fetch_osireport('C-II','GENERAL DUTY BN.HQRS','awbone10');

             echo $ct59= $hold940 + $hold941 + $hold942 + $hold943 + $hold944;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp59 + $si59 + $asi59 + $hc59 + $ct59;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">xii)</div></td>
    <td>RECRUITMENT DUTY</td>
    <td><div align="center">
      <?php $hold945 = info_fetch_osireport('INSP','RECRUITMENT DUTY','awbone12'); 
                      $hold946 = info_fetch_osireport('DSP/CR','RECRUITMENT DUTY','awbone12'); 
                      echo $insp60 = $hold945 + $hold946;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold947 = info_fetch_osireport('SI','RECRUITMENT DUTY','awbone12');
            $hold948 = info_fetch_osireport('INSP/LR','RECRUITMENT DUTY','awbone12'); 
            $hold949 = info_fetch_osireport('INSP/CR','RECRUITMENT DUTY','awbone12'); 
            echo $si60 = $hold947 + $hold948 + $hold949;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold950 = info_fetch_osireport('ASI,','RECRUITMENT DUTY','awbone12'); 
                $hold951 = info_fetch_osireport('SI/CR','RECRUITMENT DUTY','awbone12');  
                $hold952 = info_fetch_osireport('SI/LR','RECRUITMENT DUTY','awbone12'); 
                echo $asi60 =  $hold950 + $hold951 + $hold952; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold953 = info_fetch_osireport('HC','RECRUITMENT DUTY','awbone12');
                    $hold954 = info_fetch_osireport('ASI/LR','RECRUITMENT DUTY','awbone12');
                     $hold955 = info_fetch_osireport('ASI/CR','RECRUITMENT DUTY','awbone12');
             echo $hc60= $hold953 +  $hold954 + $hold955;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold956 = info_fetch_osireport('CT','RECRUITMENT DUTY','awbone12');
                       $hold957 = info_fetch_osireport('HC/PR','RECRUITMENT DUTY','awbone12');
                        $hold958 = info_fetch_osireport('HC/LR','RECRUITMENT DUTY','awbone12');
                         $hold959 = info_fetch_osireport('Sr.Const','RECRUITMENT DUTY','awbone12');
                         $hold960 = info_fetch_osireport('C-II','RECRUITMENT DUTY','awbone12');

             echo $ct60= $hold956 + $hold957 + $hold958 + $hold959 + $hold960;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp60 + $si60 + $asi60 + $hc60 + $ct60;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60; ?></div></td>
    <td><div align="center"><?php echo $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60;  ?></div></td>
    <td><div align="center"><?php echo $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60;  ?></div></td>
    <td><div align="center"><?php echo $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60; ?></div></td>
    <td><div align="center"><?php echo $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60;?></div></td>
    <td><div align="center"><?php echo $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60 + $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60 + $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60 + $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60 + $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>8. MISCELLANEOUS </strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 565px">RECRUITS</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold961 = info_fetch_osireport('INSP','RECRUIT','bmdone1'); 
                      $hold962 = info_fetch_osireport('DSP/CR','RECRUIT','bmdone1'); 
                      echo $insp61 = $hold961 + $hold962;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold963 = info_fetch_osireport('SI','RECRUIT','bmdone1');
            $hold964 = info_fetch_osireport('INSP/LR','RECRUIT','bmdone1'); 
            $hold965 = info_fetch_osireport('INSP/CR','RECRUIT','bmdone1'); 
            echo $si61 = $hold963 + $hold964 + $hold965;
              ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold966 = info_fetch_osireport('ASI','RECRUIT','bmdone1'); 
                $hold967 = info_fetch_osireport('SI/CR','RECRUIT','bmdone1');  
                $hold968 = info_fetch_osireport('SI/LR','RECRUIT','bmdone1'); 
                echo $asi61 = $hold966 + $hold967 + $hold968; 

             ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold969 = info_fetch_osireport('HC','RECRUIT','bmdone1');
                    $hold970 = info_fetch_osireport('ASI/LR','RECRUIT','bmdone1');
                     $hold971 = info_fetch_osireport('ASI/CR','RECRUIT','bmdone1');
             echo $hc61= $hold969 +  $hold970 + $hold971;  ?>
    </div></td>
    <td style="width: 40px"><div align="center">
      <?php $hold972 = info_fetch_osireport('CT','RECRUIT','bmdone1');
                       $hold973 = info_fetch_osireport('HC/PR','RECRUIT','bmdone1');
                        $hold974 = info_fetch_osireport('HC/LR','RECRUIT','bmdone1');
                         $hold975 = info_fetch_osireport('Sr.Const','RECRUIT','bmdone1');
                         $hold976 = info_fetch_osireport('C-II','RECRUIT','bmdone1');

             echo $ct61= $hold972 + $hold973 + $hold974 + $hold975 + $hold976;  ?>
    </div></td>
    <td style="width: 40px"><div align="center"><?php echo $insp61 + $si61 + $asi61 + $hc61 + $ct61;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>LEAVES</td>
    <td><div align="center">
      <?php $hold977 = info_fetch_osireport('INSP','LEAVE','bmdone2'); 
                      $hold978 = info_fetch_osireport('DSP/CR','LEAVE','bmdone2'); 
                      echo $insp62 = $hold977 + $hold978;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold979 = info_fetch_osireport('SI','LEAVE','bmdone2');
            $hold980 = info_fetch_osireport('INSP/LR','LEAVE','bmdone2'); 
            $hold981 = info_fetch_osireport('INSP/CR','LEAVE','bmdone2'); 
            echo $si62 = $hold979 + $hold980 + $hold981;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold982 = info_fetch_osireport('ASI','LEAVE','bmdone2'); 
                $hold983 = info_fetch_osireport('SI/CR','LEAVE','bmdone2');  
                $hold984 = info_fetch_osireport('SI/LR','LEAVE','bmdone2'); 
                echo $asi62 = $hold982 + $hold983 + $hold984; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold985 = info_fetch_osireport('HC','LEAVE','bmdone2');
                    $hold986 = info_fetch_osireport('ASI/LR','LEAVE','bmdone2');
                     $hold987 = info_fetch_osireport('ASI/CR','LEAVE','bmdone2');
             echo $hc62= $hold985 +  $hold986 + $hold987;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold988 = info_fetch_osireport('CT','LEAVE','bmdone2');
                       $hold989 = info_fetch_osireport('HC/PR','LEAVE','bmdone2');
                        $hold990 = info_fetch_osireport('HC/LR','LEAVE','bmdone2');
                         $hold991 = info_fetch_osireport('Sr.Const','LEAVE','bmdone2');
                         $hold992 = info_fetch_osireport('C-II','LEAVE','bmdone2');

             echo $ct62= $hold988 + $hold989 + $hold990 + $hold991 + $hold992;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp62 + $si62 + $asi62 + $hc62 + $ct62;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>ABSENT</td>
    <td><div align="center">
      <?php $hold993 = info_fetch_osireport('INSP','ABSENT','bmdone3'); 
                      $hold994 = info_fetch_osireport('DSP/CR','ABSENT','bmdone3'); 
                      echo $insp63 = $hold993 + $hold994;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold995 = info_fetch_osireport('SI','ABSENT','bmdone3');
            $hold996 = info_fetch_osireport('INSP/LR','ABSENT','bmdone3'); 
            $hold997 = info_fetch_osireport('INSP/CR','ABSENT','bmdone3'); 
            echo $si63 = $hold995 + $hold996 + $hold997;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold998 = info_fetch_osireport('ASI','ABSENT','bmdone3'); 
                $hold999 = info_fetch_osireport('SI/CR','ABSENT','bmdone3');  
                $hold1000 = info_fetch_osireport('SI/LR','ABSENT','bmdone3'); 
                echo $asi63 = $hold998 + $hold999 + $hold1000; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1001 = info_fetch_osireport('HC','ABSENT','bmdone3');
                    $hold1002 = info_fetch_osireport('ASI/LR','ABSENT','bmdone3');
                     $hold1003 = info_fetch_osireport('ASI/CR','ABSENT','bmdone3');
             echo $hc63 = $hold1001 +  $hold1002 + $hold1003;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1004 = info_fetch_osireport('CT','ABSENT','bmdone3');
                       $hold1005 = info_fetch_osireport('HC/PR','ABSENT','bmdone3');
                        $hold1006 = info_fetch_osireport('HC/LR','ABSENT','bmdone3');
                         $hold1007 = info_fetch_osireport('Sr.Const','ABSENT','bmdone3');
                         $hold1008 = info_fetch_osireport('C-II','ABSENT','bmdone3');

             echo $ct63= $hold1004 + $hold1005 + $hold1006 + $hold1007 + $hold1008;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp63 + $si63 + $asi63 + $hc63 + $ct63;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>UNDER SUSPENTION</td>
    <td><div align="center">
      <?php $hold1009 = info_fetch_osireport('INSP','UNDER SUSPENSION','bmdone4'); 
                      $hold1010 = info_fetch_osireport('DSP/CR','UNDER SUSPENSION','bmdone4'); 
                      echo $insp64 = $hold1009 + $hold1010;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1011 = info_fetch_osireport('SI','UNDER SUSPENSION','bmdone4');
            $hold1012 = info_fetch_osireport('INSP/LR','UNDER SUSPENSION','bmdone4'); 
            $hold1013 = info_fetch_osireport('INSP/CR','UNDER SUSPENSION','bmdone4'); 
            echo $si64 = $hold1011 + $hold1012 + $hold1013;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1014 = info_fetch_osireport('ASI','UNDER SUSPENSION','bmdone4'); 
                $hold1015 = info_fetch_osireport('SI/CR','UNDER SUSPENSION','bmdone4');  
                $hold1016 = info_fetch_osireport('SI/LR','UNDER SUSPENSION','bmdone4'); 
                echo $asi64 =  $hold1014 + $hold1015 + $hold1016; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1017 = info_fetch_osireport('HC','UNDER SUSPENSION','bmdone4');
                    $hold1018 = info_fetch_osireport('ASI/LR','UNDER SUSPENSION','bmdone4');
                     $hold1019 = info_fetch_osireport('ASI/CR','UNDER SUSPENSION','bmdone4');
             echo $hc64= $hold1017 +  $hold1018 + $hold1019;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1020 = info_fetch_osireport('CT','UNDER SUSPENSION','bmdone4');
                       $hold1021 = info_fetch_osireport('HC/PR','UNDER SUSPENSION','bmdone4');
                        $hold1022 = info_fetch_osireport('HC/LR','UNDER SUSPENSION','bmdone4');
                         $hold1023 = info_fetch_osireport('Sr.Const','UNDER SUSPENSION','bmdone4');
                         $hold1024 = info_fetch_osireport('C-II','UNDER SUSPENSION','bmdone4');

             echo $ct64= $hold1020 + $hold1021 + $hold1022 + $hold1023 + $hold1024;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp64 + $si64 + $asi64 + $hc64 + $ct64;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">v)</div></td>
    <td>HANDICAPPED ON MEDICAL REST</td>
    <td><div align="center">
      <?php $hold1025 = info_fetch_osireport('INSP','Handicapped on Medical Rest','bmdone5'); 
                      $hold1026 = info_fetch_osireport('DSP/CR','Handicapped on Medical Rest','bmdone5'); 
                      echo $insp65 = $hold1025 + $hold1026;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1027 = info_fetch_osireport('SI','Handicapped on Medical Rest','bmdone5');
            $hold1028 = info_fetch_osireport('INSP/LR','Handicapped on Medical Rest','bmdone5'); 
            $hold1029 = info_fetch_osireport('INSP/CR','Handicapped on Medical Rest','bmdone5'); 
            echo $si65 =  $hold1027 + $hold1028 + $hold1029;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1030 = info_fetch_osireport('ASI','Handicapped on Medical Rest','bmdone5'); 
                $hold1031 = info_fetch_osireport('SI/CR','Handicapped on Medical Rest','bmdone5');  
                $hold1032 = info_fetch_osireport('SI/LR','Handicapped on Medical Rest','bmdone5'); 
                echo $asi65 =  $hold1030 + $hold1031 + $hold1032; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1033 = info_fetch_osireport('HC','Handicapped on Medical Rest','bmdone5');
                    $hold1034 = info_fetch_osireport('ASI/LR','Handicapped on Medical Rest','bmdone5');
                     $hold1035 = info_fetch_osireport('ASI/CR','Handicapped on Medical Rest','bmdone5');
             echo $hc65= $hold1033 +  $hold1034 + $hold1035;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1036 = info_fetch_osireport('CT','Handicapped on Medical Rest','bmdone5');
                       $hold1037 = info_fetch_osireport('HC/PR','Handicapped on Medical Rest','bmdone5');
                        $hold1038 = info_fetch_osireport('HC/LR','Handicapped on Medical Rest','bmdone5');
                         $hold1039 = info_fetch_osireport('Sr.Const','Handicapped on Medical Rest','bmdone5');
                         $hold1040 = info_fetch_osireport('C-II','Handicapped on Medical Rest','bmdone5');

             echo $ct65= $hold1036 + $hold1037 + $hold1038 + $hold1039 + $hold1040;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp65 + $si65 + $asi65 + $hc65 + $ct65;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vi)</div></td>
    <td>HANDICAPPED ON LIGHT DUTY</td>
    <td><div align="center">
      <?php $hold1041 = info_fetch_osireport('INSP','Handicapped on light duty','bmdone6'); 
                      $hold1042 = info_fetch_osireport('DSP/CR','Handicapped on light duty','bmdone6'); 
                      echo $insp66 = $hold1041 + $hold1042;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1043 = info_fetch_osireport('SI','Handicapped on light duty','bmdone6');
            $hold1044 = info_fetch_osireport('INSP/LR','Handicapped on light duty','bmdone6'); 
            $hold1045 = info_fetch_osireport('INSP/CR','Handicapped on light duty','bmdone6'); 
            echo $si66 = $hold1043 + $hold1044 + $hold1045;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1046 = info_fetch_osireport('ASI','Handicapped on light duty','bmdone6'); 
                $hold1047 = info_fetch_osireport('SI/CR','Handicapped on light duty','bmdone6');  
                $hold1048 = info_fetch_osireport('SI/LR','Handicapped on light duty','bmdone6'); 
                echo $asi66 = $hold1046 + $hold1047 + $hold1048; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1049 = info_fetch_osireport('HC','Handicapped on light duty','bmdone6');
                    $hold1050 = info_fetch_osireport('ASI/LR','Handicapped on light duty','bmdone6');
                     $hold1051 = info_fetch_osireport('ASI/CR','Handicapped on light duty','bmdone6');
             echo $hc66 = $hold1049 +  $hold1050 + $hold1051;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1052 = info_fetch_osireport('CT','Handicapped on light duty','bmdone6');
                       $hold1053 = info_fetch_osireport('HC/PR','Handicapped on light duty','bmdone6');
                        $hold1054 = info_fetch_osireport('HC/LR','Handicapped on light duty','bmdone6');
                         $hold1055 = info_fetch_osireport('Sr.Const','Handicapped on light duty','bmdone6');
                         $hold1056 = info_fetch_osireport('C-II','Handicapped on light duty','bmdone6');

             echo $ct66= $hold1052 + $hold1053 + $hold1054 + $hold1055 + $hold1056;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp66 + $si66 + $asi66 + $hc66 + $ct66;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">vii)</div></td>
    <td>CHRONIC ON MEDICAL REST</td>
    <td><div align="center">
      <?php $hold1057 = info_fetch_osireport('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold1058 = info_fetch_osireport('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp67 = $hold1057 + $hold1058;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1059 = info_fetch_osireport('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold1060 = info_fetch_osireport('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold1061 = info_fetch_osireport('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si67 = $hold1059 + $hold1060 + $hold1061;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1062 = info_fetch_osireport('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold1063 = info_fetch_osireport('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold1064 = info_fetch_osireport('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi67 =  $hold1062 + $hold1063 + $hold1064; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1065 = info_fetch_osireport('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold1066 = info_fetch_osireport('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold1067 = info_fetch_osireport('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc67= $hold1065 +  $hold1066 + $hold1067;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1068 = info_fetch_osireport('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold1069 = info_fetch_osireport('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1070 = info_fetch_osireport('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1071 = info_fetch_osireport('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold1072 = info_fetch_osireport('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct67 = $hold1068 + $hold1069 + $hold1070 + $hold1071 + $hold1072;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp67 + $si67 + $asi67 + $hc67 + $ct67;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">viii)</div></td>
    <td>CHRONIC ON LIGHT DUTY</td>
    <td><div align="center">
      <?php $hold1073 = info_fetch_osireport('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold1074 = info_fetch_osireport('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp68 = $hold1073 + $hold1074;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1075 = info_fetch_osireport('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold1076 = info_fetch_osireport('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold1077 = info_fetch_osireport('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si68 = $hold1075 + $hold1076 + $hold1077;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1078 = info_fetch_osireport('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold1079 = info_fetch_osireport('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold1080 = info_fetch_osireport('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi68 = $hold1078 + $hold1079 + $hold1080; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1081 = info_fetch_osireport('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold1082 = info_fetch_osireport('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold1083 = info_fetch_osireport('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc68 = $hold1081 +  $hold1082 + $hold1083;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1084 = info_fetch_osireport('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold1085 = info_fetch_osireport('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1086 = info_fetch_osireport('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1087 = info_fetch_osireport('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold1088 = info_fetch_osireport('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct68=  $hold1084 + $hold1085 + $hold1086 + $hold1087 + $hold1088;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp68 + $si68 + $asi68 + $hc68 + $ct68;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ix)</div></td>
    <td>OSD ETC.</td>
    <td><div align="center">
      <?php $hold1089 = info_fetch_osireport('INSP','OSD ETC','bmdone8'); 
                      $hold1090 = info_fetch_osireport('DSP/CR','OSD ETC','bmdone8'); 
                      echo $insp69 = $hold1089 + $hold1090;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1091 = info_fetch_osireport('SI','OSD ETC','bmdone8');
            $hold1092 = info_fetch_osireport('INSP/LR','OSD ETC','bmdone8'); 
            $hold1093 = info_fetch_osireport('INSP/CR','OSD ETC','bmdone8'); 
            echo $si69 = $hold1091 + $hold1092 + $hold1093;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1094 = info_fetch_osireport('ASI','OSD ETC','bmdone8'); 
                $hold1095 = info_fetch_osireport('SI/CR','OSD ETC','bmdone8');  
                $hold1096 = info_fetch_osireport('SI/LR','OSD ETC','bmdone8'); 
                echo $asi69=  $hold1094 + $hold1095 + $hold1096; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1097 = info_fetch_osireport('HC','OSD ETC','bmdone8');
                    $hold1098 = info_fetch_osireport('ASI/LR','OSD ETC','bmdone8');
                     $hold1099 = info_fetch_osireport('ASI/CR','OSD ETC','bmdone8');
             echo $hc69 = $hold1097 +  $hold1098 + $hold1099;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1100 = info_fetch_osireport('CT','OSD ETC','bmdone8');
                       $hold1101 = info_fetch_osireport('HC/PR','OSD ETC','bmdone8');
                        $hold1102 = info_fetch_osireport('HC/LR','OSD ETC','bmdone8');
                         $hold1103 = info_fetch_osireport('Sr.Const','OSD ETC','bmdone8');
                         $hold1104 = info_fetch_osireport('C-II','OSD ETC','bmdone8');

             echo $ct69= $hold1100 + $hold1101 + $hold1102 + $hold1103 + $hold1104;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp69 + $si69 + $asi69 + $hc69 + $ct69;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo  $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69; ?></div></td>
    <td><div align="center"><?php echo  $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69;  ?></div></td>
    <td><div align="center"><?php echo $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69;  ?></div></td>
    <td><div align="center"><?php echo $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69; ?></div></td>
    <td><div align="center"><?php echo $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69;?></div></td>
    <td><div align="center"><?php echo  $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69 + $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69 + $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69 + $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69 + $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69; ?> </div></td>
  </tr>
</table>
<table width="785" align="center" bordercolor="#666666">
  <tr>
    <td><strong>9. INSTITUTIONS </strong></td>
  </tr>
</table>
<table width="785" border="2" align="center" bordercolor="#666666">
  <tr>
    <td><strong>SR. NO. </strong></td>
    <td><strong>DETAILS</strong></td>
    <th width="62" align="center">INSPR</th>
    <th width="54" align="center">SI</th>
    <th width="54" align="center">ASI </th>
    <th width="54" align="center">HC</th>
    <th width="62" align="center">CT</th>
    <th width="56" align="center">TOTAL</th>
  </tr>
  <tr>
    <td width="65"><div align="center">i)</div></td>
    <td width="324"><span style="width: 572px">PAP HQRS INSTITUTIONS</span></td>
    <td style="width: 40px"><div align="center">
      <?php $hold1105 = info_fetch_osireports('INSP','','instone4'); 
                      $hold1106 = info_fetch_osireports('DSP/CR','','instone4'); 
                      echo $insp70= $hold1105 + $hold1106;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold1107 = info_fetch_osireports('SI','','instone4');
            $hold1108 = info_fetch_osireports('INSP/LR','','instone4'); 
            $hold1109 = info_fetch_osireports('INSP/CR','','instone4'); 
            echo $si70 = $hold1107 + $hold1108 + $hold1109;
              ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold1110 = info_fetch_osireports('ASI','','instone4'); 
                $hold1111 = info_fetch_osireports('SI/CR','','instone4');  
                $hold1112 = info_fetch_osireports('SI/LR','','instone4'); 
                echo $asi70 =  $hold1110 + $hold1111 + $hold1112; 

             ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold1113 = info_fetch_osireports('HC','','instone4');
                    $hold1114 = info_fetch_osireports('ASI/LR','','instone4');
                     $hold1115 = info_fetch_osireports('ASI/CR','','instone4');
             echo $hc70= $hold1113 +  $hold1114 + $hold1115;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center">
      <?php $hold1116 = info_fetch_osireports('CT','','instone4');
                       $hold1117 = info_fetch_osireports('HC/PR','','instone4');
                        $hold1118 = info_fetch_osireports('HC/LR','','instone4');
                         $hold1119 = info_fetch_osireports('Sr.Const','','instone4');
                         $hold1120 = info_fetch_osireports('C-II','','instone4');

             echo $ct70= $hold1116 + $hold1117 + $hold1118 + $hold1119 + $hold1120;  ?>
    </div></td>
    <td  style="width: 40px"><div align="center"><?php echo $insp70 + $si70 + $asi70 + $hc70 + $ct70;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">ii)</div></td>
    <td>CDO INSTITUTIONS</td>
    <td><div align="center">
      <?php $hold1121 = info_fetch_osireport('INSP','CDO Institutions','instone2'); 
                      $hold1122 = info_fetch_osireport('DSP/CR','CDO Institutions','instone2'); 
                      echo $insp71= $hold1121 + $hold1122;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1123 = info_fetch_osireport('SI','CDO Institutions','instone2');
            $hold1124 = info_fetch_osireport('INSP/LR','CDO Institutions','instone2'); 
            $hold1125 = info_fetch_osireport('INSP/CR','CDO Institutions','instone2'); 
            echo $si71 = $hold1123 + $hold1124 + $hold1125;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1126 = info_fetch_osireport('ASI','CDO Institutions','instone2'); 
                $hold1127 = info_fetch_osireport('SI/CR','CDO Institutions','instone2');  
                $hold1128 = info_fetch_osireport('SI/LR','CDO Institutions','instone2'); 
                echo  $asi71 = $hold1126 + $hold1127 + $hold1128; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1129 = info_fetch_osireport('HC','CDO Institutions','instone2');
                    $hold1130 = info_fetch_osireport('ASI/LR','CDO Institutions','instone2');
                     $hold1131 = info_fetch_osireport('ASI/CR','CDO Institutions','instone2');
             echo $hc71= $hold1129 +  $hold1130 + $hold1131;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1132 = info_fetch_osireport('CT','CDO Institutions','instone2');
                       $hold1133 = info_fetch_osireport('HC/PR','CDO Institutions','instone2');
                        $hold1134 = info_fetch_osireport('HC/LR','CDO Institutions','instone2');
                         $hold1135 = info_fetch_osireport('Sr.Const','CDO Institutions','instone2');
                         $hold1136 = info_fetch_osireport('C-II','CDO Institutions','instone2');

             echo $ct71=  $hold1132 + $hold1133 + $hold1134 + $hold1135 + $hold1136;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp71 + $si71 + $asi71 + $hc71 + $ct71;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iii)</div></td>
    <td>IRBN. INSTITUTIONS</td>
    <td><div align="center">
      <?php $hold1137 = info_fetch_osireport('INSP','IRB Institutions','instone1'); 
                      $hold1138 = info_fetch_osireport('DSP/CR','IRB Institutions','instone1'); 
                      echo $insp72= $hold1137 + $hold1138;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1139 = info_fetch_osireport('SI','IRB Institutions','instone1');
            $hold1140 = info_fetch_osireport('INSP/LR','IRB Institutions','instone1'); 
            $hold1141 = info_fetch_osireport('INSP/CR','IRB Institutions','instone1'); 
            echo $si72 = $hold1139 + $hold1140 + $hold1141;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1142 = info_fetch_osireport('ASI','IRB Institutions','instone1'); 
                $hold1143 = info_fetch_osireport('SI/CR','IRB Institutions','instone1');  
                $hold1144 = info_fetch_osireport('SI/LR','IRB Institutions','instone1'); 
                echo $asi72 = $hold1142 + $hold1143 + $hold1144; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1145 = info_fetch_osireport('HC','IRB Institutions','instone1');
                    $hold1146 = info_fetch_osireport('ASI/LR','IRB Institutions','instone1');
                     $hold1147 = info_fetch_osireport('ASI/CR','IRB Institutions','instone1');
             echo $hc72= $hold1145 +  $hold1146 + $hold1147;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1148 = info_fetch_osireport('CT','IRB Institutions','instone1');
                       $hold1149 = info_fetch_osireport('HC/PR','IRB Institutions','instone1');
                        $hold1150 = info_fetch_osireport('HC/LR','IRB Institutions','instone1');
                         $hold1151 = info_fetch_osireport('Sr.Const','IRB Institutions','instone1');
                         $hold1152 = info_fetch_osireport('C-II','IRB Institutions','instone1');

             echo $ct72= $hold1148 + $hold1149 + $hold1150 + $hold1151 + $hold1152;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp72 + $si72 + $asi72 + $hc72 + $ct72;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center">iv)</div></td>
    <td>PAP OUTER BNS. INSTITUTIONS</td>
    <td><div align="center">
      <?php $hold1153 = info_fetch_osireport('INSP','PAP Outer Bn Institutions','instone3'); 
                      $hold1154 = info_fetch_osireport('DSP/CR','PAP Outer Bn Institutions','instone3'); 
                      echo $insp73=  $hold1153 + $hold1154;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1155 = info_fetch_osireport('SI','PAP Outer Bn Institutions','instone3');
            $hold1156 = info_fetch_osireport('INSP/LR','PAP Outer Bn Institutions','instone3'); 
            $hold1157 = info_fetch_osireport('INSP/CR','PAP Outer Bn Institutions','instone3'); 
            echo $si73 = $hold1155 + $hold1156 + $hold1157;
              ?>
    </div></td>
    <td><div align="center">
      <?php $hold1158 = info_fetch_osireport('ASI','PAP Outer Bn Institutions','instone3'); 
                $hold1159 = info_fetch_osireport('SI/CR','PAP Outer Bn Institutions','instone3');  
                $hold1160 = info_fetch_osireport('SI/LR','PAP Outer Bn Institutions','instone3'); 
                echo $asi73 = $hold1158 + $hold1159 + $hold1160; 

             ?>
    </div></td>
    <td><div align="center">
      <?php $hold1161 = info_fetch_osireport('HC','PAP Outer Bn Institutions','instone3');
                    $hold1162 = info_fetch_osireport('ASI/LR','PAP Outer Bn Institutions','instone3');
                     $hold1163 = info_fetch_osireport('ASI/CR','PAP Outer Bn Institutions','instone3');
             echo $hc73= $hold1161 +  $hold1162 + $hold1163;  ?>
    </div></td>
    <td><div align="center">
      <?php $hold1164 = info_fetch_osireport('CT','PAP Outer Bn Institutions','instone3');
                       $hold1165 = info_fetch_osireport('HC/PR','PAP Outer Bn Institutions','instone3');
                        $hold1166 = info_fetch_osireport('HC/LR','PAP Outer Bn Institutions','instone3');
                         $hold1167 = info_fetch_osireport('Sr.Const','PAP Outer Bn Institutions','instone3');
                         $hold1168 = info_fetch_osireport('C-II','PAP Outer Bn Institutions','instone3');

             echo  $ct73= $hold1164 + $hold1165 + $hold1166 + $hold1167 + $hold1168;  ?>
    </div></td>
    <td><div align="center"><?php echo $insp73 + $si73 + $asi73 + $hc73 + $ct73;  ?></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><strong>TOTAL</strong></td>
    <td><div align="center"><?php echo  $insp70 + $insp71 + $insp72 + $insp73; ?></div></td>
    <td><div align="center"><?php echo  $si70 + $si71 + $si72 + $si73;  ?></div></td>
    <td><div align="center"><?php echo $asi70 + $asi71 + $asi72 + $asi73;  ?></div></td>
    <td><div align="center"><?php echo $hc70 + $hc71 + $hc72 + $hc73; ?></div></td>
    <td><div align="center"><?php echo $ct70 + $ct71 + $ct72 + $ct73;?></div></td>
    <td><div align="center"><?php echo  $insp70 + $insp71 + $insp72 + $insp73 + $si70 + $si71 + $si72 + $si73 + $asi70 + $asi71 + $asi72 + $asi73 + $hc70 + $hc71 + $hc72 + $hc73 + $ct70 + $ct71 + $ct72 + $ct73; ?> </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>GRAND TOTAL</strong></td>
    <td><div align="center"><?php echo $insp1+$insp2+$insp3+$insp4+$insp5+$insp6+$insp7+$insp8+$insp9+$insp10+$insp11+$insp12+$insp13+$insp14+$insp15+$insp16+$insp17+$insp18+$insp19+$insp20+$insp21+$insp22+$insp23+$insp24+$insp25+$insp26+$insp27+$insp28+$insp29+$insp30+$insp31+$insp32+$insp33+$insp34+$insp35+$insp36+$insp37+$insp38+$insp39+$insp40+$insp41+$insp42+$insp43+$insp44+$insp45+$insp46+$insp47+$insp48+$insp49+$insp50+$insp51+$insp52+$insp53+$insp54+$insp55+$insp56+$insp57+$insp58+$insp59+$insp60+$insp61+$insp62+$insp63+$insp64+$insp65+$insp66+$insp67+$insp68+$insp69+$insp70+$insp71+$insp72+$insp73;  ?></div></td>
    <td><div align="center"><?php echo $si1+$si2+$si3+$si4+$si5+$si6+$si7+$si8+$si9+$si10+$si11+$si12+$si13+$si14+$si15+$si16+$si17+$si18+$si19+$si20+$si21+$si22+$si23+$si24+$si25+$si26+$si27+$si28+$si29+$si30+$si31+$si32+$si33+$si34+$si35+$si36+$si37+$si38+$si39+$si40+$si41+$si42+$si43+$si44+$si45+$si46+$si47+$si48+$si49+$si50+$si51+$si52+$si53+$si54+$si55+$si56+$si57+$si58+$si59+$si60+$si61+$si62+$si63+$si64+$si65+$si66+$si67+$si68+$si69+$si70+$si71+$si72+$si73;  ?></div></td>
    <td><div align="center">
     <?php   
                  echo $asi1+$asi2+$asi3+$asi4+$asi5+$asi6+$asi7+$asi8+$asi9+$asi10+$asi11+$asi12+$asi13+$asi14+$asi15+$asi16+$asi17+$asi18+$asi19+$asi20+$asi21+$asi22+$asi23+$asi24+$asi25+$asi26+$asi27+$asi28+$asi29+$asi30+$asi31+$asi32+$asi33+$asi34+$asi35+$asi36+$asi37+$asi38+$asi39+$asi40+$asi41+$asi42+$asi43+$asi44+$asi45+$asi46+$asi47+$asi48+$asi49+$asi50+$asi51+$asi52+$asi53+$asi54+$asi55+$asi56+$asi57+$asi58+$asi59+$asi60+$asi61+$asi62+$asi63+$asi64+$asi65+$asi66+$asi67+$asi68+$asi69+$asi70+$asi71 + $asi72 + $asi73;

                  ?>
    </div></td>
    <td><div align="center"><?php echo $hc1+$hc2+$hc3+$hc4+$hc5+$hc6+$hc7+$hc8+$hc9+$hc10+$hc11+$hc12+$hc13+$hc14+$hc15+$hc16+$hc17+$hc18+$hc19+$hc20+$hc21+$hc22+$hc23+$hc24+$hc25+$hc26+$hc27+$hc28+$hc29+$hc30+$hc31+$hc32+$hc33+$hc34+$hc35+$hc36+$hc37+$hc38+$hc39+$hc40+$hc41+$hc42+$hc43+$hc44+$hc45+$hc46+$hc47+$hc48+$hc49+$hc50+$hc51+$hc52+$hc53+$hc54+$hc55+$hc56+$hc57+$hc58+$hc59+$hc60+$hc61+$hc62+$hc63+$hc64+$hc65+$hc66+$hc67+$hc68+$hc69+$hc70+$hc71+$hc72+$hc73; ?></div></td>
    <td><div align="center"><?php echo 
                     $ct1+$ct2+$ct3+$ct4+$ct5+$ct6+$ct7+$ct8+$ct9+$ct10+$ct11+$ct12+$ct13+$ct14+$ct15+$ct16+$ct17+$ct18+$ct19+$ct20+$ct21+$ct22+$ct23+$ct24+$ct25+$ct26+$ct27+$ct28+$ct29+$ct30+$ct31+$ct32+$ct33+$ct34+$ct35+$ct36+$ct37+$ct38+$ct39+$ct40+$ct41+$ct42+$ct43+$ct44+$ct45+$ct46+$ct47+$ct48+$ct49+$ct50+$ct51+$ct52+$ct53+$ct54+$ct55+$ct56+$ct57+$ct58+$ct59+$ct60+$ct61+$ct62+$ct63+$ct64+$ct65+$ct66+$ct67+$ct68+$ct69+$ct70+$ct71+$ct72 + $ct73; ?></div></td>
    <td><div align="center"><strong><?php echo $insp1 + $insp2 + $insp3 + $insp4 + $insp5 + $insp6 + $insp7 + $insp8 + $insp9 + $insp10 + $insp11 + $insp12 +  $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $si9 + $si10 + $si11 + $si12 + $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $asi9 + $asi10 + $asi11 + $asi12 + $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $hc9 + $hc10 + $hc11 + $hc12 + $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $ct9 + $ct10 + $ct11 + $ct12 + $insp13 + $insp14 + $insp15 + $si13 + $si14 + $si15 + $asi13 + $asi14 + $asi15 + $hc13 + $hc14 + $hc15 + $ct13 + $ct14 + $ct15 + $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21 + $si16 + $si17 + $si18 + $si19 + $si20 + $si21 + $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21 + $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21 + $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21 + $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 + $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 + $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42 + $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42 + $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42 + $insp43 + $insp44 + $insp45 + $si43 + $si44 + $si45 + $asi43 + $asi44 + $asi45 + $hc43 + $hc44 + $hc45 + $ct43 + $ct44 + $ct45 +  $insp46 + $insp47 + $insp48 + $insp49 + $si46 + $si47 + $si48 + $si49 + $asi46 +  $asi47 + $asi48 + $asi49 + $hc46 + $hc47 + $hc48 + $hc49 + $ct46 + $ct47 + $ct48 + $ct49 + $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60 + $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60 + $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60 + $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60 + $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60 + $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69 + $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69 + $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69 + $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69 + $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69 + $insp70 + $insp71 + $insp72 + $insp73 + $si70 + $si71 + $si72 + $si73 + $asi70 + $asi71 + $asi72 + $asi73 + $hc70 + $hc71 + $hc72 + $hc73 + $ct70 + $ct71 + $ct72 + $ct73;

 ?>  </strong></div></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
