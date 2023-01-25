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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>webroot/js/jquery.table2excel.min.js"></script>
  </head>
<body class="table2excel"> <div class="row">
<div class="row">
  &nbsp; &nbsp; &nbsp; <button type="button" id="excel">Export to excel</button>
</div>
          <div class="col-lg-10 col-xs-offset-1"><br/>
       <table border="0"  data-tableName="Test Table 1"><tr><td>&nbsp;</td><td><h3>DEPLOYMENT STATEMENT OF.................................. BATTALIONS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td> </tr></table>
            <table border="1"  data-tableName="Test Table 2">
              <thead>
                 <tr>
                 <th></th>
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
                <td>&nbsp; </td>
                  <td style="width: 570px">SANCTIONED STRENGTH</td>
                  <td style="width: 50px"> <?php $hold1 = fetchoneinfo('osi_san',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; echo $sanpart1 =$h1;
            }else{
               echo $sanpart1 = 0;
              }  ?> </td>
            <td style="width: 50px"><?php $hold3 = fetchoneinfo('osi_san',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
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
            <td style="width: 50px"><?php $hold6 = fetchoneinfo('osi_san',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
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
            <td style="width: 50px"><?php $hold9 = fetchoneinfo('osi_san',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
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
            <td style="width: 50px"><?php $hold12 = fetchoneinfo('osi_san',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
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
            <td><?php echo $sanpart6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>VACANCIES</td>
                   <td> <?php $hold1 = fetchoneinfo('osi_van',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $sanpar1 =  $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_van',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
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
            <td><?php $hold6 = fetchoneinfo('osi_van',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
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
            <td><?php $hold9 = fetchoneinfo('osi_van',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
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
            <td><?php $hold12 = fetchoneinfo('osi_van',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
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
            <td><?php echo $sanpar6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td> &nbsp;</td>
                   <td> &nbsp; </td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>POSTED STRENGTH</td>
                  <td><?php echo $posstrength1 = $sanpart1 - $sanpar1;  ?></td>
            <td><?php echo $posstrength2 = $sanpart2 - $sanpar1;  ?></td>
            <td><?php echo $posstrength3 =$sanpart3 - $sanpar3;  ?></td>
            <td><?php echo $posstrength4 =$sanpart4 - $sanpar4;  ?></td>
            <td><?php echo $posstrength5 =$sanpart5 - $sanpar5;  ?></td>
            <td><?php echo $posstrength6 =$sanpart6 - $sanpar6;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>FORMAL ORDER NOT ISSUED</td>
                   <td> <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $foni1 = $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
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
            <td><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
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
            <td><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
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
            <td><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
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
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>POSTED FOR PAY PURPOSE</td>
                        <td> <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $pfpp1 =  $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI')); 
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
            <td><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'ASI'));
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
            <td><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC')); 
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
            <td><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'CT'));
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
            <td><?php echo $pfpp6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>NOT REPORTED</td>
                        <td> <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $notrep1 =  $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
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
            <td><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
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
            <td><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
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
            <td><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
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
            <td><?php echo $notrep6 =  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>NOT RELIEVED</td>
                 <td> <?php $hold1 = info_fetch_updepden('INSP');
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            }else{
              $h1 .= 0; 
              } echo $notreli1 = $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updepden('SI'); 
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
            <td><?php $hold6 = info_fetch_updepden('ASI');
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
            <td><?php $hold9 = info_fetch_updepden('HC'); 
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
            <td><?php $hold12 = info_fetch_updepden('CT');
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
            <td><?php echo $notreli6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>EXCESS ATTACHED</td>
                  <td> <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $exa1 =  $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'SI')); 
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
            <td><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'ASI'));
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
            <td><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'HC')); 
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
            <td><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer(Excess)', 'presentrank' => 'CT'));
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
            <td><?php echo $exa6= $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td> 
                </tr>

                 <tr>
                 <td>&nbsp;</td><!-- +$notreli1 + $exa1 -->
                  <td>ACTUAL POSTED</td>
                   <td><?php echo $aposted1 =  $posstrength1-$foni1-$pfpp1-$notrep1+$notreli1 + $exa1;  ?></td>
            <td><?php echo $aposted2 =  $posstrength2-$foni2-$pfpp2-$notrep2+$notreli2 + $exa2;  ?></td>
            <td><?php echo $aposted3 = $posstrength3-$foni3-$pfpp3-$notrep3+$notreli3 + $exa3;  ?></td>
            <td><?php echo $aposted4 = $posstrength4-$foni4-$pfpp4-$notrep4+$notreli4 + $exa4;  ?></td>
            <td><?php echo $aposted5 = $posstrength5-$foni5-$pfpp5-$notrep5+$notreli5 + $exa5;  ?></td>
            <td><?php echo $aposted1+$aposted2+$aposted3+$aposted4+$aposted5;  ?></td>
                </tr>
              </tbody>
           </table>
              
          <div>
          <table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td><h3> 1. FIX DUTIES</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
          
            <table border="1"  class="table2excel" data-tableName="Test Table 2">
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
                  <td  style="width: 40px"><?php $hold1 =  info_fetch_osireport('INSP','VP Guards','fone1'); 
                      $hold2 = info_fetch_osireport('DSP/CR','VP Guards','fone1'); 
                      echo $insp1 = $hold1 + $hold2;  ?></td>
            <td style="width: 40px"><?php $hold3 = info_fetch_osireport('SI','VP Guards','fone1');
            $hold4 = info_fetch_osireport('INSP/LR','VP Guards','fone1'); 
            $hold5 = info_fetch_osireport('INSP/CR','VP Guards','fone1'); 
            echo $si1 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td  style="width: 40px"><?php $hold6 = info_fetch_osireport('ASI','VP Guards','fone1'); 
                $hold7 = info_fetch_osireport('SI/CR','VP Guards','fone1');  
                $hold8 = info_fetch_osireport('SI/LR','VP Guards','fone1'); 
                echo $asi1 = $hold6 + $hold7 + $hold8; 
             ?></td>
            <td  style="width: 40px"><?php $hold9 = info_fetch_osireport('HC','VP Guards','fone1');
                    $hold10 = info_fetch_osireport('ASI/LR','VP Guards','fone1');
                     $hold11 = info_fetch_osireport('ASI/CR','VP Guards','fone1');
             echo $hc1 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td  style="width: 40px"><?php $hold12 = info_fetch_osireport('CT','VP Guards','fone1');
                       $hold13 = info_fetch_osireport('HC/PR','VP Guards','fone1');
                        $hold14 = info_fetch_osireport('HC/LR','VP Guards','fone1');
                         $hold15 = info_fetch_osireport('Sr.Const','VP Guards','fone1');
                         $hold16 = info_fetch_osireport('C-II','VP Guards','fone1');

             echo $ct1 = $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $insp1 +  $si1 + $asi1 + $hc1 + $ct1;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>JAILS SEC.</td>
                  <td><?php $hold17 = info_fetch_osireport('INSP','Jails Security','fone2'); 
                      $hold18 = info_fetch_osireport('DSP/CR','Jails Security','fone2'); 
                      echo $insp2 = $hold17 + $hold18;
                   ?></td>
                  <td><?php  $hold19 = info_fetch_osireport('SI','Jails Security','fone2');
                                  $hold20 = info_fetch_osireport('INSP/LR','Jails Security','fone2'); 
                               $hold21 = info_fetch_osireport('INSP/CR','Jails Security','fone2');
                   echo $si2 = $hold19 + $hold20 + $hold21;  ?></td>
                  <td><?php   $hold22 = info_fetch_osireport('ASI','Jails Security','fone2');
                   $hold23 = info_fetch_osireport('SI/CR','Jails Security','fone2');  
                $hold24 = info_fetch_osireport('SI/LR','Jails Security','fone2'); 
                echo $asi2 = $hold22 + $hold23 + $hold24; 
                ?></td>
                  <td><?php  $hold25 = info_fetch_osireport('HC','Jails Security','fone2');
                      $hold26 = info_fetch_osireport('ASI/LR','Jails Security','fone2');
                     $hold27 = info_fetch_osireport('ASI/CR','Jails Security','fone2');
                    echo $hc2 = $hold25 +  $hold26 + $hold27;
                    ?></td>
                  <td><?php  $hold28 = info_fetch_osireport('CT','Jails Security','fone2'); 
                        $hold29 = info_fetch_osireport('HC/PR','Jails Security','fone1');
                        $hold30 = info_fetch_osireport('HC/LR','Jails Security','fone1');
                         $hold31 = info_fetch_osireport('Sr.Const','Jails Security','fone1');
                         $hold32 = info_fetch_osireport('C-II','Jails Security','fone1');
                         echo $ct2 = $hold28 +  $hold29 + $hold30 +  $hold31 + $hold32;
                    ?></td>
                  <td><?php echo   $insp2 + $si2 + $asi2 + $hc2 + $ct2;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>PUNJAB POLICE HQRS, SEC.9 CHG</td>
                  <td><?php $hold3100 = info_fetch_osireport('INSP','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      $hold3200 = info_fetch_osireport('DSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                      echo $insp3 = $hold3100 + $hold3200;  ?></td>
            <td><?php $hold33 = info_fetch_osireport('SI','Punjab Police HQRS,SEC.9,CHG','fone3');
            $hold34 = info_fetch_osireport('INSP/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            $hold35 = info_fetch_osireport('INSP/CR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
            echo $si3 = $hold33 + $hold34 + $hold35;
              ?></td>
            <td><?php $hold36 = info_fetch_osireport('ASI','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                $hold37 = info_fetch_osireport('SI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');  
                $hold38 = info_fetch_osireport('SI/LR','Punjab Police HQRS,SEC.9,CHG','fone3'); 
                echo $asi3 =  $hold36 + $hold37 + $hold38; 

             ?></td>
            <td><?php $hold39 = info_fetch_osireport('HC','Punjab Police HQRS,SEC.9,CHG','fone3');
                    $hold40 = info_fetch_osireport('ASI/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                     $hold41 = info_fetch_osireport('ASI/CR','Punjab Police HQRS,SEC.9,CHG','fone3');
             echo $hc3 = $hold39 +  $hold40 + $hold41;  ?></td>
            <td><?php $hold42 = info_fetch_osireport('CT','Punjab Police HQRS,SEC.9,CHG','fone3');
                       $hold43 = info_fetch_osireport('HC/PR','Punjab Police HQRS,SEC.9,CHG','fone3');
                        $hold44 = info_fetch_osireport('HC/LR','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $hold45 = info_fetch_osireport('Sr.Const','Punjab Police HQRS,SEC.9,CHG','fone3');
                         $hold46 = info_fetch_osireport('C-II','Punjab Police HQRS,SEC.9,CHG','fone3');

             echo $ct3 = $hold42 + $hold43 + $hold44 + $hold45 + $hold46;  ?></td>
            <td><?php echo $insp3 + $si3 + $asi3 + $hc3 + $ct3;  ?></td>
                </tr>

                 <tr>
                  <td>iv)</td>
                  <td>DERA BEAS SECURITY DUTY</td>
                   <td><?php $hold47 = info_fetch_osireport('INSP','DERA BEAS SECURITY DUTY','fone4'); 
                      $hold48 = info_fetch_osireport('DSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
                      echo $insp4 = $hold47 + $hold48;  ?></td>
            <td><?php $hold49 = info_fetch_osireport('SI','DERA BEAS SECURITY DUTY','fone4');
            $hold50 = info_fetch_osireport('INSP/LR','DERA BEAS SECURITY DUTY','fone4'); 
            $hold51 = info_fetch_osireport('INSP/CR','DERA BEAS SECURITY DUTY','fone4'); 
            echo $si4 = $hold49 + $hold50 + $hold51;
              ?></td>
            <td><?php $hold52 = info_fetch_osireport('ASI','DERA BEAS SECURITY DUTY','fone4'); 
                $hold53 = info_fetch_osireport('SI/CR','DERA BEAS SECURITY DUTY','fone4');  
                $hold54 = info_fetch_osireport('SI/LR','DERA BEAS SECURITY DUTY','fone4'); 
                echo $asi4 = $hold52 + $hold53+ $hold54; 

             ?></td>
            <td><?php $hold55 = info_fetch_osireport('HC','DERA BEAS SECURITY DUTY','fone4');
                    $hold56 = info_fetch_osireport('ASI/LR','DERA BEAS SECURITY DUTY','fone4');
                     $hold57 = info_fetch_osireport('ASI/CR','DERA BEAS SECURITY DUTY','fone4');
             echo $hc4 = $hold55 +  $hold56 + $hold57;  ?></td>
            <td><?php $hold58 = info_fetch_osireport('CT','DERA BEAS SECURITY DUTY','fone4');
                       $hold59 = info_fetch_osireport('HC/PR','DERA BEAS SECURITY DUTY','fone4');
                        $hold60 = info_fetch_osireport('HC/LR','DERA BEAS SECURITY DUTY','fone4');
                         $hold61 = info_fetch_osireport('Sr.Const','DERA BEAS SECURITY DUTY','fone4');
                         $hold62 = info_fetch_osireport('C-II','DERA BEAS SECURITY DUTY','fone4');

             echo $ct4 = $hold58 + $hold59 + $hold60 + $hold61 + $hold62;  ?></td>
            <td><?php echo $insp4 + $si4 + $asi4 + $hc4 + $ct4;  ?></td>
                </tr>

                 <tr>
                  <td>v)</td>
                  <td>OTHER STATIC GUARDS</td>
                <td><?php $hold63 = info_fetch_osireport('INSP','OTHER STSTIC GUARDS','fone5'); 
                      $hold64 = info_fetch_osireport('DSP/CR','OTHER STSTIC GUARDS','fone5'); 
                      echo $insp5 = $hold63 + $hold64;  ?></td>
            <td><?php $hold65 = info_fetch_osireport('SI','OTHER STSTIC GUARDS','fone5');
            $hold66 = info_fetch_osireport('INSP/LR','OTHER STSTIC GUARDS','fone5'); 
            $hold67 = info_fetch_osireport('INSP/CR','OTHER STSTIC GUARDS','fone5'); 
            echo $si5 = $hold65 + $hold66 + $hold67;
              ?></td>
            <td><?php $hold68 = info_fetch_osireport('ASI','OTHER STSTIC GUARDS','fone5'); 
                $hold69 = info_fetch_osireport('SI/CR','OTHER STSTIC GUARDS','fone5');  
                $hold70 = info_fetch_osireport('SI/LR','OTHER STSTIC GUARDS','fone5'); 
                echo $asi5 = $hold68 + $hold69 + $hold70; 

             ?></td>
            <td><?php $hold71 = info_fetch_osireport('HC','OTHER STSTIC GUARDS','fone5');
                    $hold72 = info_fetch_osireport('ASI/LR','OTHER STSTIC GUARDS','fone5');
                     $hold73 = info_fetch_osireport('ASI/CR','OTHER STSTIC GUARDS','fone5');
             echo $hc5 = $hold71 +  $hold72 + $hold73;  ?></td>
            <td><?php $hold74 = info_fetch_osireport('CT','OTHER STSTIC GUARDS','fone5');
                       $hold75 = info_fetch_osireport('HC/PR','OTHER STSTIC GUARDS','fone5');
                        $hold76 = info_fetch_osireport('HC/LR','OTHER STSTIC GUARDS','fone5');
                         $hold77 = info_fetch_osireport('Sr.Const','OTHER STSTIC GUARDS','fone5');
                         $hold78 = info_fetch_osireport('C-II','OTHER STSTIC GUARDS','fone5');

             echo $ct5= $hold74 + $hold75 + $hold76 + $hold77 + $hold78;  ?></td>
            <td><?php echo $insp5 + $si5 + $asi5 + $hc5 + $ct5;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>PSOs/GUNMAN FROM BNS.(OTHER THEN ARMED OFFICERS)</td>
                 <td><?php $hold79 = info_fetch_osireports('INSP','','fone6'); 
                      $hold80 = info_fetch_osireports('DSP/CR','','fone6'); 
                      echo $insp6 = $hold79 + $hold80;  ?></td>
            <td><?php $hold81 = info_fetch_osireports('SI','','fone6');
            $hold82 = info_fetch_osireports('INSP/LR','','fone6'); 
            $hold83 = info_fetch_osireports('INSP/CR','','fone6'); 
            echo $si6 = $hold81 + $hold82 + $hold83;
              ?></td>
            <td><?php $hold84 = info_fetch_osireports('ASI','','fone6'); 
                $hold85 = info_fetch_osireports('SI/CR','','fone6');  
                $hold86 = info_fetch_osireports('SI/LR','','fone6'); 
                echo $asi6 = $hold84 + $hold85 + $hold86; 

             ?></td>
            <td><?php $hold87 = info_fetch_osireports('HC','','fone6');
                    $hold88 = info_fetch_osireports('ASI/LR','','fone6');
                     $hold89 = info_fetch_osireports('ASI/CR','','fone6');
             echo $hc6 = $hold87 +  $hold88 + $hold89;  ?></td>
            <td><?php $hold90 = info_fetch_osireports('CT','','fone6');
                       $hold91 = info_fetch_osireports('HC/PR','','fone6');
                        $hold92 = info_fetch_osireports('HC/LR','','fone6');
                         $hold93 = info_fetch_osireports('Sr.Const','','fone6');
                         $hold94 = info_fetch_osireports('C-II','','fone6');

             echo $ct6= $hold90 + $hold91 + $hold92 + $hold93 + $hold94;  ?></td>
            <td><?php echo $insp6 + $si6 + $asi6 + $hc6 + $ct6;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>VIP SEC.WING CHG U/82nd BN.</td>
                 <td><?php $hold95 = info_fetch_osireport('INSP','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      $hold96 = info_fetch_osireport('DSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                      echo $insp7 = $hold95 + $hold96;  ?></td>
            <td><?php $hold97 = info_fetch_osireport('SI','VIP SEC.WING CHG.U/82nd BN.','fone7');
            $hold98 = info_fetch_osireport('INSP/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            $hold99 = info_fetch_osireport('INSP/CR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
            echo $si7 = $hold97 + $hold98 + $hold99;
              ?></td>
            <td><?php $hold100 = info_fetch_osireport('ASI','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                $hold101 = info_fetch_osireport('SI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');  
                $hold102 = info_fetch_osireport('SI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7'); 
                echo $asi7 = $hold100 + $hold101 + $hold102; 

             ?></td>
            <td><?php $hold103 = info_fetch_osireport('HC','VIP SEC.WING CHG.U/82nd BN.','fone7');
                    $hold104 = info_fetch_osireport('ASI/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                     $hold105 = info_fetch_osireport('ASI/CR','VIP SEC.WING CHG.U/82nd BN.','fone7');
             echo $hc7 =  $hold103 +  $hold104 + $hold105;  ?></td>
            <td><?php $hold106 = info_fetch_osireport('CT','VIP SEC.WING CHG.U/82nd BN.','fone7');
                       $hold107 = info_fetch_osireport('HC/PR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                        $hold108 = info_fetch_osireport('HC/LR','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $hold109 = info_fetch_osireport('Sr.Const','VIP SEC.WING CHG.U/82nd BN.','fone7');
                         $hold110 = info_fetch_osireport('C-II','VIP SEC.WING CHG.U/82nd BN.','fone7');

             echo $ct7= $hold106 + $hold107 + $hold108 + $hold109 + $hold110;  ?></td>
            <td><?php echo $insp7 + $si7 + $asi7 + $hc7 + $ct7;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>POLICE SEC.WING CHG U/13th BN.</td>
                  <td><?php $hold111 = info_fetch_osireport('INSP','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      $hold112 = info_fetch_osireport('DSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                      echo $insp8 = $hold111 + $hold112;  ?></td>
            <td><?php $hold113 = info_fetch_osireport('SI','POLICE SEC.WING CHG U/13th BN.','fone8');
            $hold114 = info_fetch_osireport('INSP/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            $hold115 = info_fetch_osireport('INSP/CR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
            echo $si8 = $hold113 + $hold114 + $hold115;
              ?></td>
            <td><?php $hold116 = info_fetch_osireport('ASI','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                $hold117 = info_fetch_osireport('SI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');  
                $hold118 = info_fetch_osireport('SI/LR','POLICE SEC.WING CHG U/13th BN.','fone8'); 
                echo $asi8 = $hold116 + $hold117 + $hold118; 

             ?></td>
            <td><?php $hold119 = info_fetch_osireport('HC','POLICE SEC.WING CHG U/13th BN.','fone8');
                    $hold120 = info_fetch_osireport('ASI/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                     $hold121 = info_fetch_osireport('ASI/CR','POLICE SEC.WING CHG U/13th BN.','fone8');
             echo  $hc8 = $hold119 +  $hold120 + $hold121;  ?></td>
            <td><?php $hold122 = info_fetch_osireport('CT','POLICE SEC.WING CHG U/13th BN.','fone8');
                       $hold123 = info_fetch_osireport('HC/PR','POLICE SEC.WING CHG U/13th BN.','fone8');
                        $hold124 = info_fetch_osireport('HC/LR','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $hold125 = info_fetch_osireport('Sr.Const','POLICE SEC.WING CHG U/13th BN.','fone8');
                         $hold126 = info_fetch_osireport('C-II','POLICE SEC.WING CHG U/13th BN.','fone8');

             echo $ct8= $hold122 + $hold123 + $hold124 + $hold125 + $hold126;  ?></td>
            <td><?php echo $insp8 + $si8 + $asi8 + $hc8 + $ct8;  ?></td>
                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>BANK SECURITY DUTY</td>
                   <td><?php $hold127 = info_fetch_osireport('INSP','BANK SECURITY DUTY','fone9'); 
                      $hold128 = info_fetch_osireport('DSP/CR','BANK SECURITY DUTY','fone9'); 
                      echo $insp9 = $hold127 + $hold128;  ?></td>
            <td><?php $hold129 = info_fetch_osireport('SI','BANK SECURITY DUTY','fone9');
            $hold130 = info_fetch_osireport('INSP/LR','BANK SECURITY DUTY','fone9'); 
            $hold131 = info_fetch_osireport('INSP/CR','BANK SECURITY DUTY','fone9'); 
            echo $si9 = $hold129 + $hold130 + $hold131;
              ?></td>
            <td><?php $hold132 = info_fetch_osireport('ASI','BANK SECURITY DUTY','fone9'); 
                $hold133 = info_fetch_osireport('SI/CR','BANK SECURITY DUTY','fone9');  
                $hold134 = info_fetch_osireport('SI/LR','BANK SECURITY DUTY','fone9'); 
                echo $asi9 = $hold132 + $hold133 + $hold134; 

             ?></td>
            <td><?php $hold135 = info_fetch_osireport('HC','BANK SECURITY DUTY','fone9');
                    $hold136 = info_fetch_osireport('ASI/LR','BANK SECURITY DUTY','fone9');
                     $hold137 = info_fetch_osireport('ASI/CR','BANK SECURITY DUTY','fone9');
             echo $hc9 = $hold135 +  $hold136 + $hold137;  ?></td>
            <td><?php $hold138 = info_fetch_osireport('CT','BANK SECURITY DUTY','fone9');
                       $hold139 = info_fetch_osireport('HC/PR','BANK SECURITY DUTY','fone9');
                        $hold140 = info_fetch_osireport('HC/LR','BANK SECURITY DUTY','fone9');
                         $hold141 = info_fetch_osireport('Sr.Const','BANK SECURITY DUTY','fone9');
                         $hold142 = info_fetch_osireport('C-II','BANK SECURITY DUTY','fone9');

             echo $ct9= $hold138 + $hold139 + $hold140 + $hold141 + $hold142;  ?></td>
            <td><?php echo $insp9 + $si9 + $asi9 + $hc9 + $ct9;  ?></td>
                </tr>

                 <tr>
                  <td>x)</td>
                  <td>SPECIAL PROTECTION UNIT (C.M.SEC.)</td>
                  <td><?php $hold143 = info_fetch_osireport('INSP','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      $hold144 = info_fetch_osireport('DSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                      echo $insp10 = $hold143 + $hold144;  ?></td>
            <td><?php $hold145 = info_fetch_osireport('SI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
            $hold146 = info_fetch_osireport('INSP/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            $hold147 = info_fetch_osireport('INSP/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
            echo $si10 =  $hold145 + $hold146 + $hold147;
              ?></td>
            <td><?php $hold148 = info_fetch_osireport('ASI','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                $hold149 = info_fetch_osireport('SI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');  
                $hold150 = info_fetch_osireport('SI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10'); 
                echo $asi10 =  $hold148 + $hold149 + $hold150; 

             ?></td>
            <td><?php $hold151 = info_fetch_osireport('HC','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                    $hold152 = info_fetch_osireport('ASI/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                     $hold153 = info_fetch_osireport('ASI/CR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
             echo $hc10 = $hold151 +  $hold152 + $hold153;  ?></td>
            <td><?php $hold154 = info_fetch_osireport('CT','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                       $hold155 = info_fetch_osireport('HC/PR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                        $hold156 = info_fetch_osireport('HC/LR','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $hold157 = info_fetch_osireport('Sr.Const','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');
                         $hold158 = info_fetch_osireport('C-II','SPECIAL PROTECTION UNIT (C.M. SEC.)','fone10');

             echo $ct10= $hold154 + $hold155 + $hold156 + $hold157 + $hold158;  ?></td>
            <td><?php echo $insp10 + $si10 + $asi10 + $hc10 + $ct10;  ?></td>
                </tr>


                 <tr>
                  <td>xi)</td>
                  <td>PB. BHAWAN, NEW DELHI (SEC DUTY)</td>
                 <td><?php $hold159 = info_fetch_osireport('INSP','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      $hold160 = info_fetch_osireport('DSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                      echo $insp11 = $hold159 + $hold160;  ?></td>
            <td><?php $hold161 = info_fetch_osireport('SI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
            $hold162 = info_fetch_osireport('INSP/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            $hold163 = info_fetch_osireport('INSP/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
            echo $si11 =   $hold161 + $hold162 + $hold163;
              ?></td>
            <td><?php $hold164 = info_fetch_osireport('ASI','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                $hold165 = info_fetch_osireport('SI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');  
                $hold166 = info_fetch_osireport('SI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11'); 
                echo $asi11 =   $hold164 + $hold165 + $hold166; 

             ?></td>
            <td><?php $hold167 = info_fetch_osireport('HC','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                    $hold168 = info_fetch_osireport('ASI/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                     $hold169 = info_fetch_osireport('ASI/CR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
             echo $hc11 = $hold167 +  $hold168 + $hold169;  ?></td>
            <td><?php $hold170 = info_fetch_osireport('CT','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                       $hold171 = info_fetch_osireport('HC/PR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                        $hold172 = info_fetch_osireport('HC/LR','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $hold173 = info_fetch_osireport('Sr.Const','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');
                         $hold174 = info_fetch_osireport('C-II','PB. BHAWAN NEW DELHI (SEC. DUTY)','fone11');

             echo $ct11= $hold170 + $hold171 + $hold172 + $hold173 + $hold174;  ?></td>
            <td><?php echo $insp11 + $si11 + $asi11 + $hc11 + $ct11;  ?></td>
                </tr>

                 <tr>
                  <td>xii)</td>
                  <td>PB. BHAWAN, NEW DELHI (RESERVE)</td>
                  <td><?php $hold175 = info_fetch_osireport('INSP','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      $hold176 = info_fetch_osireport('DSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                      echo $insp12 = $hold175 + $hold176;  ?></td>
            <td><?php $hold177 = info_fetch_osireport('SI','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
            $hold178 = info_fetch_osireport('INSP/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            $hold179 = info_fetch_osireport('INSP/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
            echo $si12=  $hold177 + $hold178 + $hold179;
              ?></td>
            <td><?php $hold180 = info_fetch_osireport('ASI','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                $hold181 = info_fetch_osireport('SI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');  
                $hold182 = info_fetch_osireport('SI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12'); 
                echo $asi12 = $hold180 + $hold181 + $hold182; 

             ?></td>
            <td><?php $hold183 = info_fetch_osireport('HC','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                    $hold184 = info_fetch_osireport('ASI/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                     $hold185 = info_fetch_osireport('ASI/CR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
             echo $hc12 = $hold183 +  $hold184 + $hold185;  ?></td>
            <td><?php $hold186 = info_fetch_osireport('CT','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                       $hold187 = info_fetch_osireport('HC/PR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                        $hold188 = info_fetch_osireport('HC/LR','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $hold189 = info_fetch_osireport('Sr.Const','PB. BHAWAN NEW DELHI (RESERVE)','fone12');
                         $hold190 = info_fetch_osireport('C-II','PB. BHAWAN NEW DELHI (RESERVE)','fone12');

             echo $ct12=  $hold186 + $hold187 + $hold188 + $hold189 + $hold190;  ?></td>
            <td><?php echo $insp12 + $si12 + $asi12 + $hc12 + $ct12;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp1 + $insp2 + $insp3 + $insp4 + $insp5 + $insp6 + $insp7 + $insp8 + $insp9 + $insp10 + $insp11 + $insp12;  ?></td>
                  <td><?php echo $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $si9 + $si10 + $si11 + $si12;  ?></td>
                  <td><?php echo $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $asi9 + $asi10 + $asi11 + $asi12;  ?></td>
                  <td><?php 
                          echo $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $hc9 + $hc10 + $hc11 + $hc12 ;   
                    ?></td>
                  <td><?php echo $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $ct9 + $ct10 + $ct11 + $ct12; ?></td>
                  <td><?php echo $insp1 + $insp2 + $insp3 + $insp4 + $insp5 + $insp6 + $insp7 + $insp8 + $insp9 + $insp10 + $insp11 + $insp12 +  $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $si9 + $si10 + $si11 + $si12 + $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $asi9 + $asi10 + $asi11 + $asi12 + $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $hc9 + $hc10 + $hc11 + $hc12 + $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $ct9 + $ct10 + $ct11 + $ct12;

                    ?>

                   </td>
                </tr>
              </tbody>
           </table>

                    
                     <table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td> <h3> 2. LAW & ORDER DUTY</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
            <table border="1">
              
              <tbody>
                <tr>
                  <td  style="width: 25px">i)</td>
                  <td  style="width: 568px">PERMANENT DUTY</td>
                 <td style="width: 40px"><?php $hold191 = info_fetch_osireport('INSP','PERMANENT DUTY','lone1'); 
                      $hold192 = info_fetch_osireport('DSP/CR','PERMANENT DUTY','lone1'); 
                      echo $insp13 =  $hold190 + $hold192;  ?></td>
            <td style="width: 40px"><?php $hold193 = info_fetch_osireport('SI','PERMANENT DUTY','lone1');
            $hold194 = info_fetch_osireport('INSP/LR','PERMANENT DUTY','lone1'); 
            $hold195 = info_fetch_osireport('INSP/CR','PERMANENT DUTY','lone1'); 
            echo $si13= $hold193 + $hold194 + $hold195;
              ?></td>
            <td style="width: 40px"><?php $hold196 = info_fetch_osireport('ASI','PERMANENT DUTY','lone1'); 
                $hold197 = info_fetch_osireport('SI/CR','PERMANENT DUTY','lone1');  
                $hold198 = info_fetch_osireport('SI/LR','PERMANENT DUTY','lone1'); 
                echo $asi13 = $hold196 + $hold197 + $hold198; 

             ?></td>
            <td style="width: 40px"><?php $hold199 = info_fetch_osireport('HC','PERMANENT DUTY','lone1');
                    $hold200 = info_fetch_osireport('ASI/LR','PERMANENT DUTY','lone1');
                     $hold201 = info_fetch_osireport('ASI/CR','PERMANENT DUTY','lone1');
             echo $hc13 = $hold199 +  $hold200 + $hold201;  ?></td>
            <td style="width: 40px"><?php $hold202 = info_fetch_osireport('CT','PERMANENT DUTY','lone1');
                       $hold203 = info_fetch_osireport('HC/PR','PERMANENT DUTY','lone1');
                        $hold204 = info_fetch_osireport('HC/LR','PERMANENT DUTY','lone1');
                         $hold205 = info_fetch_osireport('Sr.Const','PERMANENT DUTY','lone1');
                         $hold206 = info_fetch_osireport('C-II','PERMANENT DUTY','lone1');

             echo $ct13= $hold202 + $hold203 + $hold204 + $hold205 + $hold206;  ?></td>
            <td style="width: 40px"><?php echo $insp13 + $si13 + $asi13 + $hc13 + $ct13;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DGP/RESERVE</td>
                   <td><?php $hold207 = info_fetch_osireport('INSP','DGP, RESERVES','lone2'); 
                      $hold208 = info_fetch_osireport('DSP/CR','DGP, RESERVES','lone2'); 
                      echo $insp14 = $hold207 + $hold208;  ?></td>
            <td><?php $hold209 = info_fetch_osireport('SI','DGP, RESERVES','lone2');
            $hold210 = info_fetch_osireport('INSP/LR','DGP, RESERVES','lone2'); 
            $hold211 = info_fetch_osireport('INSP/CR','DGP, RESERVES','lone2'); 
            echo $si14= $hold209 + $hold210 + $hold211;
              ?></td>
            <td><?php $hold212 = info_fetch_osireport('ASI','DGP, RESERVES','lone2'); 
                $hold213 = info_fetch_osireport('SI/CR','DGP, RESERVES','lone2');  
                $hold214 = info_fetch_osireport('SI/LR','DGP, RESERVES','lone2'); 
                echo $asi14 = $hold212 + $hold213 + $hold214; 

             ?></td>
            <td><?php $hold215 = info_fetch_osireport('HC','DGP, RESERVES','lone2');
                    $hold216 = info_fetch_osireport('ASI/LR','DGP, RESERVES','lone2');
                     $hold217 = info_fetch_osireport('ASI/CR','DGP, RESERVES','lone2');
             echo  $hc14 = $hold215 +  $hold216 + $hold217;  ?></td>
            <td><?php $hold218 = info_fetch_osireport('CT','DGP, RESERVES','lone2');
                       $hold219 = info_fetch_osireport('HC/PR','DGP, RESERVES','lone2');
                        $hold220 = info_fetch_osireport('HC/LR','DGP, RESERVES','lone2');
                         $hold221 = info_fetch_osireport('Sr.Const','DGP, RESERVES','lone2');
                         $hold222 = info_fetch_osireport('C-II','DGP, RESERVES','lone2');

             echo $ct14= $hold218 + $hold219 + $hold220 + $hold221 + $hold222;  ?></td>
            <td><?php echo $insp14 + $si14 + $asi14 + $hc14 + $ct14;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>TRG./E.D.RESERVE</td>
                <td><?php $hold223 = info_fetch_osireport('INSP','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      $hold224 = info_fetch_osireport('DSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                      echo $insp15 = $hold223 + $hold224;  ?></td>
            <td><?php $hold225 = info_fetch_osireport('SI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
            $hold226 = info_fetch_osireport('INSP/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            $hold227 = info_fetch_osireport('INSP/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
            echo $si15= $hold225 + $hold226 + $hold227;
              ?></td>
            <td><?php $hold228 = info_fetch_osireport('ASI','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                $hold229 = info_fetch_osireport('SI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');  
                $hold230 = info_fetch_osireport('SI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3'); 
                echo $asi15 = $hold228 + $hold229 + $hold230; 

             ?></td>
            <td><?php $hold231 = info_fetch_osireport('HC','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                    $hold232 = info_fetch_osireport('ASI/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                     $hold233 = info_fetch_osireport('ASI/CR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
             echo $hc15 = $hold231 +  $hold232 + $hold233;  ?></td>
            <td><?php $hold234 = info_fetch_osireport('CT','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                       $hold235 = info_fetch_osireport('HC/PR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                        $hold236 = info_fetch_osireport('HC/LR','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold237 = info_fetch_osireport('Sr.Const','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');
                         $hold238 = info_fetch_osireport('C-II','TRAINING /EMERGENCY RESERVE FOR TEMP. DUTY','lone3');

             echo $ct15= $hold234 + $hold235 + $hold236 + $hold237 + $hold238;  ?></td>
            <td><?php echo $insp15 + $si15 + $asi15 + $hc15 + $ct15;  ?></td>
                </tr>

                     <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp13 + $insp14 + $insp15; ?></td>
                  <td><?php echo $si13 + $si14 + $si15;  ?></td>
                  <td><?php echo $asi13 + $asi14 + $asi15;  ?></td>
                  <td><?php echo $hc13 + $hc14 + $hc15; ?></td>
                  <td><?php echo $ct13 + $ct14 + $ct15;?></td>
                  <td><?php echo $insp13 + $insp14 + $insp15 + $si13 + $si14 + $si15 + $asi13 + $asi14 + $asi15 + $hc13 + $hc14 + $hc15 + $ct13 + $ct14 + $ct15; ?>
                   </td>
                </tr>
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td> <h3> 3. SPECIAL SQUADS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
           
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 575px">ANTI RIOT POLICE, JALANDHAR</td>
                 <td style="width: 40px"><?php $hold239 = info_fetch_osireport('INSP','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      $hold240 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                      echo $insp16 = $hold239 + $hold240;  ?></td>
            <td style="width: 40px"><?php $hold241 = info_fetch_osireport('SI','ANTI RIOT POLICE, JALANDHAR','sqone1');
            $hold242 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            $hold243 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
            echo $si16= $hold241 + $hold242 + $hold243;
              ?></td>
            <td style="width: 40px"><?php $hold244 = info_fetch_osireport('ASI','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                $hold245 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');  
                $hold246 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1'); 
                echo $asi16 = $hold244 + $hold245 + $hold246; 

             ?></td>
            <td style="width: 40px"><?php $hold2460 = info_fetch_osireport('HC','ANTI RIOT POLICE, JALANDHAR','sqone1');
                    $hold247 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                     $hold248 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $hc16 =  $hold2460 +  $hold247 + $hold248;  ?></td>
            <td style="width: 40px"><?php $hold249 = info_fetch_osireport('CT','ANTI RIOT POLICE, JALANDHAR','sqone1');
                       $hold250 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                        $hold251 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold252 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, JALANDHAR','sqone1');
                         $hold253 = info_fetch_osireport('C-II','ANTI RIOT POLICE, JALANDHAR','sqone1');
             echo $ct16= $hold249 + $hold250 + $hold251 + $hold252 + $hold253;  ?></td>
            <td style="width: 40px"><?php echo $insp16 + $si16 + $asi16 + $hc16 + $ct16;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>ANTI RIOT POLICE, MANSA</td>
                  <td><?php $hold254 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MANSA','sqone2'); 
                      $hold255 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
                      echo $insp17 = $hold254 + $hold255;  ?></td>
            <td><?php $hold256 = info_fetch_osireport('SI','ANTI RIOT POLICE, MANSA','sqone2');
            $hold257 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
            $hold258 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MANSA','sqone2'); 
            echo $si17= $hold256 + $hold257 + $hold258;
              ?></td>
            <td><?php $hold259 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MANSA','sqone2'); 
                $hold260 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MANSA','sqone2');  
                $hold261 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MANSA','sqone2'); 
                echo $asi17 = $hold259 + $hold260 + $hold261; 

             ?></td>
            <td><?php $hold262 = info_fetch_osireport('HC','ANTI RIOT POLICE, MANSA','sqone2');
                    $hold263 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MANSA','sqone2');
                     $hold264 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MANSA','sqone2');
             echo $hc17 =   $hold262 +  $hold263 + $hold264;  ?></td>
            <td><?php $hold265 = info_fetch_osireport('CT','ANTI RIOT POLICE, MANSA','sqone2');
                       $hold266 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MANSA','sqone2');
                        $hold267 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold268 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MANSA','sqone2');
                         $hold269 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MANSA','sqone2');

             echo $ct17= $hold265 + $hold266 + $hold267 + $hold268 + $hold269;  ?></td>
            <td><?php echo $insp17 + $si17 + $asi17 + $hc17 + $ct17;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ANTI RIOT POLICE, MUKATSAR</td>
                  <td><?php $hold270 = info_fetch_osireport('INSP','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      $hold271 = info_fetch_osireport('DSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                      echo $insp18 = $hold270 + $hold271;  ?></td>
            <td><?php $hold272 = info_fetch_osireport('SI','ANTI RIOT POLICE, MUKATSAR','sqone3');
            $hold273 = info_fetch_osireport('INSP/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            $hold274 = info_fetch_osireport('INSP/CR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
            echo $si18= $hold272 + $hold273 + $hold274;
              ?></td>
            <td><?php $hold275 = info_fetch_osireport('ASI','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                $hold276 = info_fetch_osireport('SI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');  
                $hold277 = info_fetch_osireport('SI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3'); 
                echo $asi18 = $hold275 + $hold276 + $hold277; 

             ?></td>
            <td><?php $hold278 = info_fetch_osireport('HC','ANTI RIOT POLICE, MUKATSAR','sqone3');
                    $hold279 = info_fetch_osireport('ASI/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                     $hold280 = info_fetch_osireport('ASI/CR','ANTI RIOT POLICE, MUKATSAR','sqone3');
             echo $hc18 =  $hold278 +  $hold279 + $hold280;  ?></td>
            <td><?php $hold284 = info_fetch_osireport('CT','ANTI RIOT POLICE, MUKATSAR','sqone3');
                       $hold285 = info_fetch_osireport('HC/PR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                        $hold286 = info_fetch_osireport('HC/LR','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold287 = info_fetch_osireport('Sr.Const','ANTI RIOT POLICE, MUKATSAR','sqone3');
                         $hold288 = info_fetch_osireport('C-II','ANTI RIOT POLICE, MUKATSAR','sqone3');

             echo $ct18= $hold284 + $hold285 + $hold286 + $hold287 + $hold288;  ?></td>
            <td><?php echo $insp18 + $si18 + $asi18 + $hc18 + $ct18;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>SDRF TEAM JALANDHAR</td>
                 <td><?php $hold289 = info_fetch_osireport('INSP','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      $hold290 = info_fetch_osireport('DSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                      echo $insp19 = $hold289 + $hold290;  ?></td>
            <td><?php $hold291 = info_fetch_osireport('SI','S.D.R.F. TEAM, JALANDHAR','sqone4');
            $hold292 = info_fetch_osireport('INSP/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            $hold293 = info_fetch_osireport('INSP/CR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
            echo $si19=  $hold291 + $hold292 + $hold293;
              ?></td>
            <td><?php $hold294 = info_fetch_osireport('ASI','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                $hold295 = info_fetch_osireport('SI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');  
                $hold296 = info_fetch_osireport('SI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4'); 
                echo $asi19 = $hold294 + $hold295 + $hold296; 

             ?></td>
            <td><?php $hold297 = info_fetch_osireport('HC','S.D.R.F. TEAM, JALANDHAR','sqone4');
                    $hold298 = info_fetch_osireport('ASI/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                     $hold299 = info_fetch_osireport('ASI/CR','S.D.R.F. TEAM, JALANDHAR','sqone4');
             echo $hc19 =  $hold297 +  $hold298 + $hold299;  ?></td>
            <td><?php $hold300 = info_fetch_osireport('CT','S.D.R.F. TEAM, JALANDHAR','sqone4');
                       $hold301 = info_fetch_osireport('HC/PR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                        $hold302 = info_fetch_osireport('HC/LR','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold303 = info_fetch_osireport('Sr.Const','S.D.R.F. TEAM, JALANDHAR','sqone4');
                         $hold304 = info_fetch_osireport('C-II','S.D.R.F. TEAM, JALANDHAR','sqone4');

             echo $ct19= $hold300 + $hold301 + $hold302 + $hold303 + $hold304;  ?></td>
            <td><?php echo $insp19 + $si19 + $asi19 + $hc19 + $ct19;  ?></td>
                </tr>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>SPL. STRIKING GROUP </td>
                 <td><?php $hold305 = info_fetch_osireport('INSP','SPL. STRIKING GROUPS','sqone5'); 
                      $hold306 = info_fetch_osireport('DSP/CR','SPL. STRIKING GROUPS','sqone5'); 
                      echo $insp20 = $hold305 + $hold306;  ?></td>
            <td><?php $hold307 = info_fetch_osireport('SI','SPL. STRIKING GROUPS','sqone5');
            $hold308 = info_fetch_osireport('INSP/LR','SPL. STRIKING GROUPS','sqone5'); 
            $hold309 = info_fetch_osireport('INSP/CR','SPL. STRIKING GROUPS','sqone5'); 
            echo $si20= $hold307 + $hold308 + $hold309;
              ?></td>
            <td><?php $hold310 = info_fetch_osireport('ASI','SPL. STRIKING GROUPS','sqone5'); 
                $hold311 = info_fetch_osireport('SI/CR','SPL. STRIKING GROUPS','sqone5');  
                $hold312 = info_fetch_osireport('SI/LR','SPL. STRIKING GROUPS','sqone5'); 
                echo $asi20 = $hold310 + $hold311 + $hold312; 

             ?></td>
            <td><?php $hold313 = info_fetch_osireport('HC','SPL. STRIKING GROUPS','sqone5');
                    $hold314 = info_fetch_osireport('ASI/LR','SPL. STRIKING GROUPS','sqone5');
                     $hold315 = info_fetch_osireport('ASI/CR','SPL. STRIKING GROUPS','sqone5');
             echo $hc20 =  $hold313 +  $hold314 + $hold315;  ?></td>
            <td><?php $hold316 = info_fetch_osireport('CT','SPL. STRIKING GROUPS','sqone5');
                       $hold317 = info_fetch_osireport('HC/PR','SPL. STRIKING GROUPS','sqone5');
                        $hold318 = info_fetch_osireport('HC/LR','SPL. STRIKING GROUPS','sqone5');
                         $hold319 = info_fetch_osireport('Sr.Const','SPL. STRIKING GROUPS','sqone5');
                         $hold320 = info_fetch_osireport('C-II','SPL. STRIKING GROUPS','sqone5');

             echo $ct20= $hold316 + $hold317 + $hold318 + $hold319 + $hold320;  ?></td>
            <td><?php echo $insp20 + $si20 + $asi20 + $hc20 + $ct20;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>SWAT TEAM(4TH CDO) </td>
                  <td><?php $hold321 = info_fetch_osireport('INSP','SWAT TEAM (4TH CDO)','sqone6'); 
                      $hold322 = info_fetch_osireport('DSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
                      echo $insp21 = $hold321 + $hold322;  ?></td>
            <td><?php $hold323 = info_fetch_osireport('SI','SWAT TEAM (4TH CDO)','sqone6');
            $hold324 = info_fetch_osireport('INSP/LR','SWAT TEAM (4TH CDO)','sqone6'); 
            $hold325 = info_fetch_osireport('INSP/CR','SWAT TEAM (4TH CDO)','sqone6'); 
            echo $si21= $hold323 + $hold324 + $hold325;
              ?></td>
            <td><?php $hold326 = info_fetch_osireport('ASI','SWAT TEAM (4TH CDO)','sqone6'); 
                $hold327 = info_fetch_osireport('SI/CR','SWAT TEAM (4TH CDO)','sqone6');  
                $hold328 = info_fetch_osireport('SI/LR','SWAT TEAM (4TH CDO)','sqone6'); 
                echo $asi21 = $hold326 + $hold327 + $hold328; 

             ?></td>
            <td><?php $hold329 = info_fetch_osireport('HC','SWAT TEAM (4TH CDO)','sqone6');
                    $hold330 = info_fetch_osireport('ASI/LR','SWAT TEAM (4TH CDO)','sqone6');
                     $hold331 = info_fetch_osireport('ASI/CR','SWAT TEAM (4TH CDO)','sqone6');
             echo $hc21 =  $hold329 +  $hold330 + $hold331;  ?></td>
            <td><?php $hold332 = info_fetch_osireport('CT','SWAT TEAM (4TH CDO)','sqone6');
                       $hold333 = info_fetch_osireport('HC/PR','SWAT TEAM (4TH CDO)','sqone6');
                        $hold334 = info_fetch_osireport('HC/LR','SWAT TEAM (4TH CDO)','sqone6');
                         $hold335 = info_fetch_osireport('Sr.Const','SWAT TEAM (4TH CDO)','sqone6');
                         $hold336 = info_fetch_osireport('C-II','SWAT TEAM (4TH CDO)','sqone6');

             echo $ct21= $hold332 + $hold333 + $hold334 + $hold335 + $hold336;  ?></td>
            <td><?php echo $insp21 + $si21 + $asi21 + $hc21 + $ct21;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21; ?></td>
                  <td><?php echo $si16 + $si17 + $si18 + $si19 + $si20 + $si21;  ?></td>
                  <td><?php echo $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21;  ?></td>
                  <td><?php echo $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21; ?></td>
                  <td><?php echo $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21;?></td>
                  <td><?php echo $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21 + $si16 + $si17 + $si18 + $si19 + $si20 + $si21 + $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21 + $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21 + $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21; ?>
                   </td>
                </tr>              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 4. PERMANENT ATTACHMENT</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
   
                   
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 560px">DISTT. MOHALI</td>
                <td style="width: 40px"><?php $hold337 = info_fetch_osireport('INSP','ATTACHED WITH DISTT.','paone1'); 
                      $hold338 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT.','paone1'); 
                      echo $insp22 = $hold337 + $hold338;  ?></td>
            <td  style="width: 40px"><?php $hold339 = info_fetch_osireport('SI','ATTACHED WITH DISTT.','paone1');
            $hold340 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT.','paone1'); 
            $hold341 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT.','paone1'); 
            echo $si22= $hold339 + $hold340 + $hold341;
              ?></td>
            <td  style="width: 40px"><?php $hold342 = info_fetch_osireport('ASI','ATTACHED WITH DISTT.','paone1'); 
                $hold343 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT.','paone1');  
                $hold344 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT.','paone1'); 
                echo $asi22 =  $hold342 + $hold343 + $hold344; 

             ?></td>
            <td  style="width: 40px"><?php $hold345 = info_fetch_osireport('HC','ATTACHED WITH DISTT.','paone1');
                    $hold346 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT.','paone1');
                     $hold347 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT.','paone1');
             echo $hc22 =  $hold345 +  $hold346 + $hold347;  ?></td>
            <td  style="width: 40px"><?php $hold348 = info_fetch_osireport('CT','ATTACHED WITH DISTT.','paone1');
                       $hold349 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT.','paone1');
                        $hold350 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT.','paone1');
                         $hold351 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT.','paone1');
                         $hold352 = info_fetch_osireport('C-II','ATTACHED WITH DISTT.','paone1');

             echo $ct22= $hold348 + $hold349 + $hold350 + $hold351 + $hold352;  ?></td>
            <td  style="width: 40px"><?php echo $insp22 + $si22 + $asi22 + $hc22 + $ct22;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN MALE)</td>
                  <td><?php $hold353 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      $hold354 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                      echo $insp23 = $hold352 + $hold354;  ?></td>
            <td><?php $hold355 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
            $hold356 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            $hold357 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
            echo $si23= $hold355 + $hold356 + $hold357;
              ?></td>
            <td><?php $hold358 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                $hold359 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');  
                $hold360 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2'); 
                echo $asi23 = $hold358 + $hold359 + $hold360; 

             ?></td>
            <td><?php $hold361 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                    $hold362 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                     $hold363 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
             echo $hc23 = $hold361 +  $hold362 + $hold363;  ?></td>
            <td><?php $hold364 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                       $hold365 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                        $hold366 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $hold367 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');
                         $hold368 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN MALE)','paone2');

             echo $ct23= $hold364 + $hold365 + $hold366 + $hold367 + $hold368;  ?></td>
            <td><?php echo $insp23 + $si23 + $asi23 + $hc23 + $ct23;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DISTT.POLICE (MARTYR'S KIN FEMALE)</td>
                              <td><?php $hold369 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      $hold370 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                      echo $insp24 = $hold369 + $hold370;  ?></td>
            <td><?php $hold371 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
            $hold372 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            $hold373 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
            echo  $si24=  $hold371 + $hold372 + $hold373;
              ?></td>
            <td><?php $hold374 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                $hold375 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');  
                $hold376 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3'); 
                echo $hc24 =  $hold374 + $hold375 + $hold376; 

             ?></td>
            <td><?php $hold377 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                    $hold378 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                     $hold379 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
             echo $asi24 = $hold377 +  $hold378 + $hold379;  ?></td>
            <td><?php $hold380 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                       $hold381 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                        $hold382 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $hold383 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');
                         $hold384 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (MARTYR’S KIN FEMALE)','paone3');

             echo $ct24= $hold380 + $hold381 + $hold382 + $hold383 + $hold384;  ?></td>
            <td><?php echo $insp24 + $si24 + $asi24 + $hc24 + $ct24;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>DISTT.POLICE (OTHERS MALE)</td>
                                <td><?php $hold385 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      $hold386 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                      echo $insp25 = $hold385 + $hold386;  ?></td>
            <td><?php $hold387 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
            $hold388 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            $hold389 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
            echo $si25=  $hold387 + $hold388 + $hold389;
              ?></td>
          <td><?php $hold390 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                $hold391 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');  
                $hold392 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4'); 
                echo $asi25 = $hold390 + $hold391 + $hold392; 

             ?></td>
            <td><?php $hold393 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                    $hold394 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                     $hold395 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
             echo $hc25= $hold393 +  $hold394 + $hold395;  ?></td>
            <td><?php $hold396 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                       $hold397 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                        $hold398 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold399 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');
                         $hold400 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (OTHERS MALE)','paone4');

             echo $ct25=  $hold396 + $hold397 + $hold398 + $hold399 + $hold400;  ?></td>
            <td><?php echo $insp25 + $si25 + $asi25 + $hc25 + $ct25;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>DISTT.POLICE (OTHERS FEMALE)</td>
                        <td><?php $hold401 = info_fetch_osireport('INSP','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      $hold402 = info_fetch_osireport('DSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                      echo $insp26 = $hold401 + $hold402;  ?></td>
            <td><?php $hold403 = info_fetch_osireport('SI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
            $hold404 = info_fetch_osireport('INSP/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            $hold405 = info_fetch_osireport('INSP/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
            echo $si26= $hold403 + $hold404 + $hold405;
              ?></td>
            <td><?php $hold406 = info_fetch_osireport('ASI','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                $hold407 = info_fetch_osireport('SI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');  
                $hold408 = info_fetch_osireport('SI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5'); 
                echo $asi26 = $hold406 + $hold407 + $hold408; 

             ?></td>
            <td><?php $hold409 = info_fetch_osireport('HC','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                    $hold410 = info_fetch_osireport('ASI/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                     $hold411 = info_fetch_osireport('ASI/CR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
             echo $hc26=  $hold409 +  $hold410 + $hold411;  ?></td>
            <td><?php $hold412 = info_fetch_osireport('CT','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                       $hold413 = info_fetch_osireport('HC/PR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                        $hold414 = info_fetch_osireport('HC/LR','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold415 = info_fetch_osireport('Sr.Const','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');
                         $hold416 = info_fetch_osireport('C-II','ATTACHED WITH DISTT. POLICE (OTHERS FEMALE)','paone5');

             echo $ct26= $hold412 + $hold413 + $hold414 + $hold415 + $hold416;  ?></td>
            <td><?php echo $insp26 + $si26 + $asi26 + $hc26 + $ct26;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>C.P.O ATTACHMENT UNDER 13th BN.</td>
                              <td><?php $hold417 = info_fetch_osireport('INSP','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      $hold418 = info_fetch_osireport('DSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                      echo $insp27 = $hold417 + $hold418;  ?></td>
            <td><?php $hold419 = info_fetch_osireport('SI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
            $hold420 = info_fetch_osireport('INSP/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            $hold421 = info_fetch_osireport('INSP/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
            echo $si27= $hold419 + $hold420 + $hold421;
              ?></td>
            <td><?php $hold422 = info_fetch_osireport('ASI','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                $hold423 = info_fetch_osireport('SI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');  
                $hold424 = info_fetch_osireport('SI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6'); 
                echo  $asi27 = $hold422 + $hold423 + $hold424; 

             ?></td>
            <td><?php $hold425 = info_fetch_osireport('HC','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                    $hold426 = info_fetch_osireport('ASI/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                     $hold427 = info_fetch_osireport('ASI/CR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
             echo $hc27= $hold425 +  $hold426 + $hold427;  ?></td>
            <td><?php $hold428 = info_fetch_osireport('CT','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                       $hold429 = info_fetch_osireport('HC/PR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                        $hold430 = info_fetch_osireport('HC/LR','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold431 = info_fetch_osireport('Sr.Const','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');
                         $hold432 = info_fetch_osireport('C-II','C.P.O. ATTACHMENT UNDER 13TH BN','paone6');

             echo $ct27= $hold428 + $hold429 + $hold430 + $hold431 + $hold432;  ?></td>
            <td><?php echo $insp27 + $si27 + $asi27 + $hc27 + $ct27;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>PB.POLICE OFFICE INSTITUTE SEC 32 CHG</td>
                                <td><?php $hold433 = info_fetch_osireport('INSP','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      $hold434 = info_fetch_osireport('DSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                      echo $insp28 = $hold433 + $hold434;  ?></td>
            <td><?php $hold435 = info_fetch_osireport('SI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
            $hold436 = info_fetch_osireport('INSP/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            $hold437 = info_fetch_osireport('INSP/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
            echo  $si28= $hold435 + $hold436 + $hold437;
              ?></td>
            <td><?php $hold438 = info_fetch_osireport('ASI','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                $hold439 = info_fetch_osireport('SI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');  
                $hold440 = info_fetch_osireport('SI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7'); 
                echo $asi28 = $hold438 + $hold439 + $hold440; 

             ?></td>
            <td><?php $hold441 = info_fetch_osireport('HC','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                    $hold442 = info_fetch_osireport('ASI/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                     $hold443 = info_fetch_osireport('ASI/CR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
             echo $hc28= $hold441 +  $hold442 + $hold443;  ?></td>
            <td><?php $hold444 = info_fetch_osireport('CT','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                       $hold445 = info_fetch_osireport('HC/PR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                        $hold446 = info_fetch_osireport('HC/LR','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold447 = info_fetch_osireport('Sr.Const','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');
                         $hold448 = info_fetch_osireport('C-II','PB. POLICE OFFICER INSTITUTE SEC 32 CHG','paone7');

             echo $ct28= $hold444 + $hold445 + $hold446 + $hold447 + $hold448;  ?></td>
            <td><?php echo $insp28 + $si28 + $asi28 + $hc28 + $ct28;  ?></td>
                </tr>

                <tr>
                  <td>viii)</td>
                  <td>NRI CELL MOHALI</td>
                                    <td><?php $hold449 = info_fetch_osireport('INSP','NRI CELL MOHALI','paone8'); 
                      $hold450 = info_fetch_osireport('DSP/CR','NRI CELL MOHALI','paone8'); 
                      echo $insp29 = $hold449 + $hold450;  ?></td>
            <td><?php $hold451 = info_fetch_osireport('SI','NRI CELL MOHALI','paone8');
            $hold452 = info_fetch_osireport('INSP/LR','NRI CELL MOHALI','paone8'); 
            $hold453 = info_fetch_osireport('INSP/CR','NRI CELL MOHALI','paone8'); 
            echo $si29= $hold451 + $hold452 + $hold453;
              ?></td>
            <td><?php $hold454 = info_fetch_osireport('ASI','NRI CELL MOHALI','paone8'); 
                $hold455 = info_fetch_osireport('SI/CR','NRI CELL MOHALI','paone8');  
                $hold456 = info_fetch_osireport('SI/LR','NRI CELL MOHALI','paone8'); 
                echo $asi29 =  $hold454 + $hold455 + $hold456; 

             ?></td>
            <td><?php $hold457 = info_fetch_osireport('HC','NRI CELL MOHALI','paone8');
                    $hold458 = info_fetch_osireport('ASI/LR','NRI CELL MOHALI','paone8');
                     $hold459 = info_fetch_osireport('ASI/CR','NRI CELL MOHALI','paone8');
             echo $hc29= $hold457 +  $hold458 + $hold459;  ?></td>
            <td><?php $hold460 = info_fetch_osireport('CT','NRI CELL MOHALI','paone8');
                       $hold461 = info_fetch_osireport('HC/PR','NRI CELL MOHALI','paone8');
                        $hold462 = info_fetch_osireport('HC/LR','NRI CELL MOHALI','paone8');
                         $hold463 = info_fetch_osireport('Sr.Const','NRI CELL MOHALI','paone8');
                         $hold464 = info_fetch_osireport('C-II','NRI CELL MOHALI','paone8');

             echo $ct29= $hold460 + $hold461 + $hold462 + $hold463 + $hold464;  ?></td>
            <td><?php echo $insp29 + $si29 + $asi29 + $hc29 + $ct29;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>INT. WING</td>
                                <td><?php $hold465 = info_fetch_osireport('INSP','INTELLIGENCE WING','paone9'); 
                      $hold466 = info_fetch_osireport('DSP/CR','INTELLIGENCE WING','paone9'); 
                      echo $insp30 =  $hold465 + $hold466;  ?></td>
            <td><?php $hold467 = info_fetch_osireport('SI','INTELLIGENCE WING','paone9');
            $hold468 = info_fetch_osireport('INSP/LR','INTELLIGENCE WING','paone9'); 
            $hold469 = info_fetch_osireport('INSP/CR','INTELLIGENCE WING','paone9'); 
            echo $si30 = $hold467 + $hold468 + $hold469;
              ?></td>
            <td><?php $hold470 = info_fetch_osireport('ASI','INTELLIGENCE WING','paone9'); 
                $hold471 = info_fetch_osireport('SI/CR','INTELLIGENCE WING','paone9');  
                $hold472 = info_fetch_osireport('SI/LR','INTELLIGENCE WING','paone9'); 
                echo $asi30 = $hold470 + $hold471 + $hold472; 

             ?></td>
            <td><?php $hold473 = info_fetch_osireport('HC','INTELLIGENCE WING','paone9');
                    $hold474 = info_fetch_osireport('ASI/LR','INTELLIGENCE WING','paone9');
                     $hold475 = info_fetch_osireport('ASI/CR','INTELLIGENCE WING','paone9');
             echo $hc30=  $hold473 +  $hold474 + $hold475;  ?></td>
            <td><?php $hold476 = info_fetch_osireport('CT','INTELLIGENCE WING','paone9');
                       $hold477 = info_fetch_osireport('HC/PR','INTELLIGENCE WING','paone9');
                        $hold478 = info_fetch_osireport('HC/LR','INTELLIGENCE WING','paone9');
                         $hold479 = info_fetch_osireport('Sr.Const','INTELLIGENCE WING','paone9');
                         $hold480 = info_fetch_osireport('C-II','INTELLIGENCE WING','paone9');

             echo  $ct30= $hold476 + $hold477 + $hold478 + $hold479 + $hold480;  ?></td>
            <td><?php echo $insp30 + $si30 + $asi30 + $hc30 + $ct30;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>CENTRAL POLICE LINE MOHALI</td>
                                <td><?php $hold481 = info_fetch_osireport('INSP','CENTRAL POLICE LINE MOHALI','paone10'); 
                      $hold482 = info_fetch_osireport('DSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
                      echo $insp31 = $hold481 + $hold482;  ?></td>
            <td><?php $hold483 = info_fetch_osireport('SI','CENTRAL POLICE LINE MOHALI','paone10');
            $hold484 = info_fetch_osireport('INSP/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
            $hold485 = info_fetch_osireport('INSP/CR','CENTRAL POLICE LINE MOHALI','paone10'); 
            echo $si31 =$hold483 + $hold484 + $hold485;
              ?></td>
            <td><?php $hold486 = info_fetch_osireport('ASI','CENTRAL POLICE LINE MOHALI','paone10'); 
                $hold487 = info_fetch_osireport('SI/CR','CENTRAL POLICE LINE MOHALI','paone10');  
                $hold488 = info_fetch_osireport('SI/LR','CENTRAL POLICE LINE MOHALI','paone10'); 
                echo $asi31 = $hold486 + $hold487 + $hold488; 

             ?></td>
            <td><?php $hold489 = info_fetch_osireport('HC','CENTRAL POLICE LINE MOHALI','paone10');
                    $hold490 = info_fetch_osireport('ASI/LR','CENTRAL POLICE LINE MOHALI','paone10');
                     $hold491 = info_fetch_osireport('ASI/CR','CENTRAL POLICE LINE MOHALI','paone10');
             echo  $hc31 = $hold489 +  $hold490 + $hold491;  ?></td>
            <td><?php $hold492 = info_fetch_osireport('CT','CENTRAL POLICE LINE MOHALI','paone10');
                       $hold493 = info_fetch_osireport('HC/PR','CENTRAL POLICE LINE MOHALI','paone10');
                        $hold494 = info_fetch_osireport('HC/LR','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold495 = info_fetch_osireport('Sr.Const','CENTRAL POLICE LINE MOHALI','paone10');
                         $hold496 = info_fetch_osireport('C-II','CENTRAL POLICE LINE MOHALI','paone10');

             echo $ct31=  $hold492 + $hold493 + $hold494 + $hold495 + $hold496;  ?></td>
            <td><?php echo $insp31 + $si31 + $asi31 + $hc31 + $ct31;  ?></td>
                </tr>

                <tr>
                  <td>xi)</td>
                  <td>VIG.BUREAU</td>
                               <td><?php $hold497 = info_fetch_osireport('INSP','VIGILANCE BUREAU','paone11'); 
                      $hold498 = info_fetch_osireport('DSP/CR','VIGILANCE BUREAU','paone11'); 
                      echo $insp32 = $hold497 + $hold498;  ?></td>
            <td><?php $hold499 = info_fetch_osireport('SI','VIGILANCE BUREAU','paone11');
            $hold500 = info_fetch_osireport('INSP/LR','VIGILANCE BUREAU','paone11'); 
            $hold501 = info_fetch_osireport('INSP/CR','VIGILANCE BUREAU','paone11'); 
            echo $si32 = $hold499 + $hold500 + $hold501;
              ?></td>
            <td><?php $hold502 = info_fetch_osireport('ASI','VIGILANCE BUREAU','paone11'); 
                $hold503 = info_fetch_osireport('SI/CR','VIGILANCE BUREAU','paone11');  
                $hold504 = info_fetch_osireport('SI/LR','VIGILANCE BUREAU','paone11'); 
                echo $asi32 = $hold502 + $hold503 + $hold504; 

             ?></td>
            <td><?php $hold505 = info_fetch_osireport('HC','VIGILANCE BUREAU','paone11');
                    $hold506 = info_fetch_osireport('ASI/LR','VIGILANCE BUREAU','paone11');
                     $hold507 = info_fetch_osireport('ASI/CR','VIGILANCE BUREAU','paone11');
             echo $hc32 =  $hold505 +  $hold506 + $hold507;  ?></td>
            <td><?php $hold508 = info_fetch_osireport('CT','VIGILANCE BUREAU','paone11');
                       $hold509 = info_fetch_osireport('HC/PR','VIGILANCE BUREAU','paone11');
                        $hold510 = info_fetch_osireport('HC/LR','VIGILANCE BUREAU','paone11');
                         $hold511 = info_fetch_osireport('Sr.Const','VIGILANCE BUREAU','paone11');
                         $hold512 = info_fetch_osireport('C-II','VIGILANCE BUREAU','paone11');

             echo $ct32=  $hold508 + $hold509 + $hold510 + $hold511 + $hold512;  ?></td>
            <td><?php echo $insp32 + $si32 + $asi32 + $hc32 + $ct32;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>SNCB</td>
                              <td><?php $hold513 = info_fetch_osireport('INSP','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      $hold514 = info_fetch_osireport('DSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                      echo $insp33 = $hold513 + $hold514;  ?></td>
            <td><?php $hold515 = info_fetch_osireport('SI','STATE NARCOTIC CRIME BUREAU','paone12');
            $hold516 = info_fetch_osireport('INSP/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            $hold517 = info_fetch_osireport('INSP/CR','STATE NARCOTIC CRIME BUREAU','paone12'); 
            echo $si33 = $hold515 + $hold516 + $hold517;
              ?></td>
            <td><?php $hold518 = info_fetch_osireport('ASI','STATE NARCOTIC CRIME BUREAU','paone12'); 
                $hold519 = info_fetch_osireport('SI/CR','STATE NARCOTIC CRIME BUREAU','paone12');  
                $hold520 = info_fetch_osireport('SI/LR','STATE NARCOTIC CRIME BUREAU','paone12'); 
                echo $asi33 = $hold518 + $hold519 + $hold520; 

             ?></td>
            <td><?php $hold521 = info_fetch_osireport('HC','STATE NARCOTIC CRIME BUREAU','paone12');
                    $hold522 = info_fetch_osireport('ASI/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                     $hold523 = info_fetch_osireport('ASI/CR','STATE NARCOTIC CRIME BUREAU','paone12');
             echo $hc33 = $hold521 +  $hold522 + $hold523;  ?></td>
            <td><?php $hold524 = info_fetch_osireport('CT','STATE NARCOTIC CRIME BUREAU','paone12');
                       $hold525 = info_fetch_osireport('HC/PR','STATE NARCOTIC CRIME BUREAU','paone12');
                        $hold526 = info_fetch_osireport('HC/LR','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold527 = info_fetch_osireport('Sr.Const','STATE NARCOTIC CRIME BUREAU','paone12');
                         $hold528 = info_fetch_osireport('C-II','STATE NARCOTIC CRIME BUREAU','paone12');

             echo $ct33= $hold524 + $hold525 + $hold526 + $hold527 + $hold528;  ?></td>
            <td><?php echo $insp33 + $si33 + $asi33 + $hc33 + $ct33;  ?></td>
                </tr>

                <tr>
                  <td>xiii)</td>
                  <td>MOHALI AIRPORT IMMIGRATION DUTY</td>
                               <td><?php $hold529 = info_fetch_osireport('INSP','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      $hold530 = info_fetch_osireport('DSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                      echo $insp34 = $hold529 + $hold530;  ?></td>
            <td><?php $hold531 = info_fetch_osireport('SI','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
            $hold532 = info_fetch_osireport('INSP/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            $hold533 = info_fetch_osireport('INSP/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
            echo $si34 = $hold531 + $hold532 + $hold533;
              ?></td>
            <td><?php $hold534 = info_fetch_osireport('ASI','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                $hold535 = info_fetch_osireport('SI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');  
                $hold536 = info_fetch_osireport('SI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13'); 
                echo $asi34 = $hold534 + $hold535 + $hold536; 

             ?></td>
            <td><?php $hold537 = info_fetch_osireport('HC','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                    $hold538 = info_fetch_osireport('ASI/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                     $hold539 = info_fetch_osireport('ASI/CR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
             echo $hc34 = $hold537 +  $hold538 + $hold539;  ?></td>
            <td><?php $hold540 = info_fetch_osireport('CT','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                       $hold541 = info_fetch_osireport('HC/PR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                        $hold542 = info_fetch_osireport('HC/LR','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold543 = info_fetch_osireport('Sr.Const','MOHALI AIRPORT IMMIGRATION DUTY','paone13');
                         $hold544 = info_fetch_osireport('C-II','MOHALI AIRPORT IMMIGRATION DUTY','paone13');

             echo $ct34= $hold540 + $hold541 + $hold542 + $hold543 + $hold544;  ?></td>
            <td><?php echo $insp34 + $si34 + $asi34 + $hc34 + $ct34;  ?></td>
                </tr>

                <tr>
                  <td>xiv)</td>
                  <td>P.H.R.C.</td>
                               <td><?php $hold545 = info_fetch_osireport('INSP','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      $hold546 = info_fetch_osireport('DSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                      echo $insp35 = $hold545 + $hold546;  ?></td>
            <td><?php $hold547 = info_fetch_osireport('SI','STATE HUMAN RIGHTS COMMISSION','paone14');
            $hold548 = info_fetch_osireport('INSP/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            $hold549 = info_fetch_osireport('INSP/CR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
            echo $si35 = $hold547 + $hold548 + $hold549;
              ?></td>
            <td><?php $hold550 = info_fetch_osireport('ASI','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                $hold551 = info_fetch_osireport('SI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');  
                $hold552 = info_fetch_osireport('SI/LR','STATE HUMAN RIGHTS COMMISSION','paone14'); 
                echo $asi35 = $hold550 + $hold551 + $hold552; 

             ?></td>
            <td><?php $hold553 = info_fetch_osireport('HC','STATE HUMAN RIGHTS COMMISSION','paone14');
                    $hold554 = info_fetch_osireport('ASI/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                     $hold555 = info_fetch_osireport('ASI/CR','STATE HUMAN RIGHTS COMMISSION','paone14');
             echo $hc35 = $hold553 +  $hold554 + $hold555;  ?></td>
            <td><?php $hold556 = info_fetch_osireport('CT','STATE HUMAN RIGHTS COMMISSION','paone14');
                       $hold557 = info_fetch_osireport('HC/PR','STATE HUMAN RIGHTS COMMISSION','paone14');
                        $hold558 = info_fetch_osireport('HC/LR','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold559 = info_fetch_osireport('Sr.Const','STATE HUMAN RIGHTS COMMISSION','paone14');
                         $hold560 = info_fetch_osireport('C-II','STATE HUMAN RIGHTS COMMISSION','paone14');

             echo $ct35= $hold556 + $hold557 + $hold558 + $hold559 + $hold560;  ?></td>
            <td><?php echo $insp35 + $si35 + $asi35 + $hc35 + $ct35;  ?></td>
                </tr>

                <tr>
                  <td>xv)</td>
                  <td>BUREAU OF INVESTIGATION</td>
                            <td><?php $hold561 = info_fetch_osireport('INSP','BUREAU OF INVESTIGATION','paone15'); 
                      $hold562 = info_fetch_osireport('DSP/CR','BUREAU OF INVESTIGATION','paone15'); 
                      echo $insp36 = $hold561 + $hold562;  ?></td>
            <td><?php $hold563 = info_fetch_osireport('SI','BUREAU OF INVESTIGATION','paone15');
            $hold564 = info_fetch_osireport('INSP/LR','BUREAU OF INVESTIGATION','paone15'); 
            $hold565 = info_fetch_osireport('INSP/CR','BUREAU OF INVESTIGATION','paone15'); 
            echo $si36 = $hold563 + $hold564 + $hold565;
              ?></td>
            <td><?php $hold566 = info_fetch_osireport('ASI','BUREAU OF INVESTIGATION','paone15'); 
                $hold567 = info_fetch_osireport('SI/CR','BUREAU OF INVESTIGATION','paone15');  
                $hold568 = info_fetch_osireport('SI/LR','BUREAU OF INVESTIGATION','paone15'); 
                echo $asi36 = $hold566 + $hold567 + $hold568; 

             ?></td>
            <td><?php $hold569 = info_fetch_osireport('HC','BUREAU OF INVESTIGATION','paone15');
                    $hold570 = info_fetch_osireport('ASI/LR','BUREAU OF INVESTIGATION','paone15');
                     $hold571 = info_fetch_osireport('ASI/CR','BUREAU OF INVESTIGATION','paone15');
             echo $hc36 = $hold569 +  $hold570 + $hold571;  ?></td>
            <td><?php $hold572 = info_fetch_osireport('CT','BUREAU OF INVESTIGATION','paone15');
                       $hold573 = info_fetch_osireport('HC/PR','BUREAU OF INVESTIGATION','paone15');
                        $hold574 = info_fetch_osireport('HC/LR','BUREAU OF INVESTIGATION','paone15');
                         $hold575 = info_fetch_osireport('Sr.Const','BUREAU OF INVESTIGATION','paone15');
                         $hold576 = info_fetch_osireport('C-II','BUREAU OF INVESTIGATION','paone15');

             echo $ct36= $hold572 + $hold573 + $hold574 + $hold575 + $hold576;  ?></td>
            <td><?php echo $insp36 + $si36 + $asi36 + $hc36 + $ct36;  ?></td>
                </tr>

                <tr>
                  <td>xvi)</td>
                  <td>RTC/PAP JALANDHAR</td>
                    <td><?php $hold577 = info_fetch_osireport('INSP','RTC/PAP, JALANDHAR','paone16'); 
                      $hold578 = info_fetch_osireport('DSP/CR','RTC/PAP, JALANDHAR','paone16'); 
                      echo $insp37 =  $hold577 + $hold578;  ?></td>
            <td><?php $hold579 = info_fetch_osireport('SI','RTC/PAP, JALANDHAR','paone16');
            $hold580 = info_fetch_osireport('INSP/LR','RTC/PAP, JALANDHAR','paone16'); 
            $hold581 = info_fetch_osireport('INSP/CR','RTC/PAP, JALANDHAR','paone16'); 
            echo $si37 = $hold579 + $hold580 + $hold581;
              ?></td>
            <td><?php $hold582 = info_fetch_osireport('ASI','RTC/PAP, JALANDHAR','paone16'); 
                $hold583 = info_fetch_osireport('SI/CR','RTC/PAP, JALANDHAR','paone16');  
                $hold584 = info_fetch_osireport('SI/LR','RTC/PAP, JALANDHAR','paone16'); 
                echo $asi37 = $hold582 + $hold583 + $hold584; 

             ?></td>
            <td><?php $hold585 = info_fetch_osireport('HC','RTC/PAP, JALANDHAR','paone16');
                    $hold586 = info_fetch_osireport('ASI/LR','RTC/PAP, JALANDHAR','paone16');
                     $hold587 = info_fetch_osireport('ASI/CR','RTC/PAP, JALANDHAR','paone16');
             echo $hc37 =  $hold585 +  $hold586 + $hold587;  ?></td>
            <td><?php $hold588 = info_fetch_osireport('CT','RTC/PAP, JALANDHAR','paone16');
                       $hold589 = info_fetch_osireport('HC/PR','RTC/PAP, JALANDHAR','paone16');
                        $hold590 = info_fetch_osireport('HC/LR','RTC/PAP, JALANDHAR','paone16');
                         $hold591 = info_fetch_osireport('Sr.Const','RTC/PAP, JALANDHAR','paone16');
                         $hold592 = info_fetch_osireport('C-II','RTC/PAP, JALANDHAR','paone16');

             echo $ct37=  $hold588 + $hold589 + $hold590 + $hold591 + $hold592;  ?></td>
            <td><?php echo $insp37 + $si37 + $asi37 + $hc37 + $ct37;  ?></td>
                </tr>

                <tr>
                  <td>xvii)</td>
                  <td>ISTC/PAP KAPURTHALA</td>
                             <td><?php $hold593 = info_fetch_osireport('INSP','ISTC/PAP, KAPURTHALA','paone17'); 
                      $hold594 = info_fetch_osireport('DSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
                      echo $insp38 = $hold593 + $hold594;  ?></td>
            <td><?php $hold595 = info_fetch_osireport('SI','ISTC/PAP, KAPURTHALA','paone17');
            $hold596 = info_fetch_osireport('INSP/LR','ISTC/PAP, KAPURTHALA','paone17'); 
            $hold597 = info_fetch_osireport('INSP/CR','ISTC/PAP, KAPURTHALA','paone17'); 
            echo $si38 = $hold595 + $hold596 + $hold597;
              ?></td>
            <td><?php $hold598 = info_fetch_osireport('ASI','ISTC/PAP, KAPURTHALA','paone17'); 
                $hold599 = info_fetch_osireport('SI/CR','ISTC/PAP, KAPURTHALA','paone17');  
                $hold600 = info_fetch_osireport('SI/LR','ISTC/PAP, KAPURTHALA','paone17'); 
                echo $asi38 =  $hold598 + $hold599 + $hold600; 

             ?></td>
            <td><?php $hold601 = info_fetch_osireport('HC','ISTC/PAP, KAPURTHALA','paone17');
                    $hold602 = info_fetch_osireport('ASI/LR','ISTC/PAP, KAPURTHALA','paone17');
                     $hold603 = info_fetch_osireport('ASI/CR','ISTC/PAP, KAPURTHALA','paone17');
             echo $hc38= $hold601 +  $hold602 + $hold603;  ?></td>
            <td><?php $hold604 = info_fetch_osireport('CT','ISTC/PAP, KAPURTHALA','paone17');
                       $hold605 = info_fetch_osireport('HC/PR','ISTC/PAP, KAPURTHALA','paone17');
                        $hold606 = info_fetch_osireport('HC/LR','ISTC/PAP, KAPURTHALA','paone17');
                         $hold607 = info_fetch_osireport('Sr.Const','ISTC/PAP, KAPURTHALA','paone17');
                         $hold608 = info_fetch_osireport('C-II','ISTC/PAP, KAPURTHALA','paone17');

             echo $ct38=  $hold604 + $hold605 + $hold606 + $hold607 + $hold608;  ?></td>
            <td><?php echo $insp38 + $si38 + $asi38 + $hc38 + $ct38;  ?></td>
                </tr>
                </tr>

                <tr>
                  <td>xviii)</td>
                  <td>PCTS BHG. PATIALA</td>
                              <td><?php $hold609 = info_fetch_osireport('INSP','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      $hold610 = info_fetch_osireport('DSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                      echo $insp39 = $hold609 + $hold610;  ?></td>
            <td><?php $hold611 = info_fetch_osireport('SI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
            $hold612 = info_fetch_osireport('INSP/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            $hold613 = info_fetch_osireport('INSP/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
            echo $si39 =  $hold611 + $hold612 + $hold613;
              ?></td>
            <td><?php $hold614 = info_fetch_osireport('ASI','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                $hold615 = info_fetch_osireport('SI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');  
                $hold616 = info_fetch_osireport('SI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18'); 
                echo $asi39 =  $hold614 + $hold615 + $hold616; 

             ?></td>
            <td><?php $hold617 = info_fetch_osireport('HC','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                    $hold618 = info_fetch_osireport('ASI/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                     $hold619 = info_fetch_osireport('ASI/CR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
             echo $hc39=  $hold617 +  $hold618 + $hold619;  ?></td>
            <td><?php $hold620 = info_fetch_osireport('CT','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                       $hold621 = info_fetch_osireport('HC/PR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                        $hold622 = info_fetch_osireport('HC/LR','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold623 = info_fetch_osireport('Sr.Const','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');
                         $hold624 = info_fetch_osireport('C-II','POLICE COMMANDO TRG. CENTRE, BHG, PATIALA','paone18');

             echo $ct39=  $hold620 + $hold621 + $hold622 + $hold623 + $hold624;  ?></td>
            <td><?php echo $insp39 + $si39 + $asi39 + $hc39 + $ct39;  ?></td>
                </tr>

                <tr>
                  <td>xix)</td>
                  <td>RTC LADDA KOTHI SANGRUR</td>
                              <td><?php $hold625 = info_fetch_osireport('INSP','RTC LADDA KOTHI SANGRUR','paone19'); 
                      $hold626 = info_fetch_osireport('DSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
                      echo $insp40 =  $hold625 + $hold626;  ?></td>
            <td><?php $hold627 = info_fetch_osireport('SI','RTC LADDA KOTHI SANGRUR','paone19');
            $hold628 = info_fetch_osireport('INSP/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
            $hold629 = info_fetch_osireport('INSP/CR','RTC LADDA KOTHI SANGRUR','paone19'); 
            echo $si40 =  $hold627 + $hold628 + $hold629;
              ?></td>
            <td><?php $hold630 = info_fetch_osireport('ASI','RTC LADDA KOTHI SANGRUR','paone19'); 
                $hold631 = info_fetch_osireport('SI/CR','RTC LADDA KOTHI SANGRUR','paone19');  
                $hold632 = info_fetch_osireport('SI/LR','RTC LADDA KOTHI SANGRUR','paone19'); 
                echo $asi40 =  $hold630 + $hold631 + $hold632; 

             ?></td>
            <td><?php $hold633 = info_fetch_osireport('HC','RTC LADDA KOTHI SANGRUR','paone19');
                    $hold634 = info_fetch_osireport('ASI/LR','RTC LADDA KOTHI SANGRUR','paone19');
                     $hold635 = info_fetch_osireport('ASI/CR','RTC LADDA KOTHI SANGRUR','paone19');
             echo $hc40= $hold633 +  $hold634 + $hold635;  ?></td>
            <td><?php $hold6350 = info_fetch_osireport('CT','RTC LADDA KOTHI SANGRUR','paone19');
                       $hold636 = info_fetch_osireport('HC/PR','RTC LADDA KOTHI SANGRUR','paone19');
                        $hold637 = info_fetch_osireport('HC/LR','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold638 = info_fetch_osireport('Sr.Const','RTC LADDA KOTHI SANGRUR','paone19');
                         $hold639 = info_fetch_osireport('C-II','RTC LADDA KOTHI SANGRUR','paone19');

             echo $ct40= $hold6350 + $hold636 + $hold637 + $hold638 + $hold639;  ?></td>
            <td><?php echo $insp40 + $si40 + $asi40 + $hc40 + $ct40;  ?></td>
                </tr>

                <tr>
                  <td>xx)</td>
                  <td>PPA PHILLAUR </td>
                               <td><?php $hold640 = info_fetch_osireport('INSP','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      $hold641 = info_fetch_osireport('DSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                      echo $insp41 = $hold640 + $hold641;  ?></td>
            <td><?php $hold642 = info_fetch_osireport('SI','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
            $hold643 = info_fetch_osireport('INSP/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            $hold644 = info_fetch_osireport('INSP/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
            echo $si41 = $hold642 + $hold643 + $hold644;
              ?></td>
            <td><?php $hold645 = info_fetch_osireport('ASI','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                $hold646 = info_fetch_osireport('SI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');  
                $hold647 = info_fetch_osireport('SI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20'); 
                echo $asi41 =  $hold645 + $hold646 + $hold647; 

             ?></td>
            <td><?php $hold648 = info_fetch_osireport('HC','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                    $hold649 = info_fetch_osireport('ASI/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                     $hold650 = info_fetch_osireport('ASI/CR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
             echo $hc41=  $hold648 +  $hold649 + $hold650;  ?></td>
            <td><?php $hold651 = info_fetch_osireport('CT','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                       $hold652 = info_fetch_osireport('HC/PR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                        $hold653 = info_fetch_osireport('HC/LR','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold654 = info_fetch_osireport('Sr.Const','PUNJAB POLICE ACADEMY PHILLAUR','paone20');
                         $hold655 = info_fetch_osireport('C-II','PUNJAB POLICE ACADEMY PHILLAUR','paone20');

             echo $ct41=  $hold651 + $hold652 + $hold653 + $hold654 + $hold655;  ?></td>
            <td><?php echo $insp41 + $si41 + $asi41 + $hc41 + $ct41;  ?></td>
                </tr>

                <tr>
                  <td>xxi)</td>
                  <td>PRTC/JAHAN KHELAN</td>
                               <td><?php $hold656 = info_fetch_osireport('INSP','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      $hold657 = info_fetch_osireport('DSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                      echo $insp42 =  $hold656 + $hold657;  ?></td>
            <td><?php $hold660 = info_fetch_osireport('SI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
            $hold661 = info_fetch_osireport('INSP/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            $hold662 = info_fetch_osireport('INSP/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
            echo $si42 =  $hold660 + $hold661 + $hold662;
              ?></td>
            <td><?php $hold663 = info_fetch_osireport('ASI','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                $hold664 = info_fetch_osireport('SI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');  
                $hold665 = info_fetch_osireport('SI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21'); 
                echo $asi42 = $hold663 + $hold664 + $hold665; 

             ?></td>
            <td><?php $hold666 = info_fetch_osireport('HC','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                    $hold667 = info_fetch_osireport('ASI/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                     $hold668 = info_fetch_osireport('ASI/CR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
             echo $hc42= $hold666 +  $hold667 + $hold668;  ?></td>
            <td><?php $hold669 = info_fetch_osireport('CT','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                       $hold670 = info_fetch_osireport('HC/PR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                        $hold671 = info_fetch_osireport('HC/LR','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold672 = info_fetch_osireport('Sr.Const','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');
                         $hold673 = info_fetch_osireport('C-II','POLICE RECRUITS TRAINING CENTRE, JAHAN KHELAN','paone21');

             echo $ct42=  $hold669 + $hold670 + $hold671 + $hold672 + $hold673;  ?></td>
            <td><?php echo $insp42 + $si42 + $asi42 + $hc42 + $ct42;  ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 ; ?></td>
                  <td><?php echo $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 ;  ?></td>
                  <td><?php echo $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42;  ?></td>
                  <td><?php echo $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42; ?></td>
                  <td><?php echo $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42;?></td>
                  <td><?php echo $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 + $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 + $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42 + $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42 + $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42; ?>
                   </td>
                </tr>    

              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 5. TRAINING</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
                                
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 573px">BASIC TRAINING</td>
                              <td style="width: 40px"><?php $hold674 = info_fetch_osireport('INSP','BASIC TRANING','traning1'); 
                      $hold675 = info_fetch_osireport('DSP/CR','BASIC TRANING','traning1'); 
                      echo $insp43 = $hold674 + $hold675;  ?></td>
            <td style="width: 40px"><?php $hold676 = info_fetch_osireport('SI','BASIC TRANING','traning1');
            $hold677 = info_fetch_osireport('INSP/LR','BASIC TRANING','traning1'); 
            $hold678 = info_fetch_osireport('INSP/CR','BASIC TRANING','traning1'); 
            echo $si43 =$hold676 + $hold677 + $hold678;
              ?></td>
            <td style="width: 40px"><?php $hold679 = info_fetch_osireport('ASI','BASIC TRANING','traning1'); 
                $hold680 = info_fetch_osireport('SI/CR','BASIC TRANING','traning1');  
                $hold681 = info_fetch_osireport('SI/LR','BASIC TRANING','traning1'); 
                echo $asi43 =  $hold679 + $hold680 + $hold681; 

             ?></td>
            <td style="width: 40px"><?php $hold682 = info_fetch_osireport('HC','BASIC TRANING','traning1');
                    $hold683 = info_fetch_osireport('ASI/LR','BASIC TRANING','traning1');
                     $hold684 = info_fetch_osireport('ASI/CR','BASIC TRANING','traning1');
             echo $hc43= $hold682 +  $hold683 + $hold684;  ?></td>
            <td style="width: 40px"><?php $hold685 = info_fetch_osireport('CT','BASIC TRANING','traning1');
                       $hold686 = info_fetch_osireport('HC/PR','BASIC TRANING','traning1');
                        $hold687 = info_fetch_osireport('HC/LR','BASIC TRANING','traning1');
                         $hold688 = info_fetch_osireport('Sr.Const','BASIC TRANING','traning1');
                         $hold689 = info_fetch_osireport('C-II','BASIC TRANING','traning1');

             echo $ct43= $hold685 + $hold686 + $hold687 + $hold688 + $hold689;  ?></td>
            <td style="width: 40px"><?php echo $insp43 + $si43 + $asi43 + $hc43 + $ct43;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>PROMOTIONAL COURSES</td>
                               <td><?php $hold690 = info_fetch_osireport('INSP','PROMOTIONAL COURSE','traning2'); 
                      $hold691 = info_fetch_osireport('DSP/CR','PROMOTIONAL COURSE','traning2'); 
                      echo $insp44 = $hold690 + $hold691;  ?></td>
            <td><?php $hold692 = info_fetch_osireport('SI','PROMOTIONAL COURSE','traning2');
            $hold693 = info_fetch_osireport('INSP/LR','PROMOTIONAL COURSE','traning2'); 
            $hold694 = info_fetch_osireport('INSP/CR','PROMOTIONAL COURSE','traning2'); 
            echo $si44 =$hold692 + $hold693 + $hold694;
              ?></td>
            <td><?php $hold695 = info_fetch_osireport('ASI','PROMOTIONAL COURSE','traning2'); 
                $hold696 = info_fetch_osireport('SI/CR','PROMOTIONAL COURSE','traning2');  
                $hold697 = info_fetch_osireport('SI/LR','PROMOTIONAL COURSE','traning2'); 
                echo $asi44 = $hold695 + $hold696 + $hold697; 

             ?></td>
            <td><?php $hold698 = info_fetch_osireport('HC','PROMOTIONAL COURSE','traning2');
                    $hold699 = info_fetch_osireport('ASI/LR','PROMOTIONAL COURSE','traning2');
                     $hold700 = info_fetch_osireport('ASI/CR','PROMOTIONAL COURSE','traning2');
             echo $hc44= $hold698 +  $hold699 + $hold700;  ?></td>
            <td><?php $hold701 = info_fetch_osireport('CT','PROMOTIONAL COURSE','traning2');
                       $hold702 = info_fetch_osireport('HC/PR','PROMOTIONAL COURSE','traning2');
                        $hold703 = info_fetch_osireport('HC/LR','PROMOTIONAL COURSE','traning2');
                         $hold704 = info_fetch_osireport('Sr.Const','PROMOTIONAL COURSE','traning2');
                         $hold705 = info_fetch_osireport('C-II','PROMOTIONAL COURSE','traning2');

             echo $ct44=  $hold701 + $hold702 + $hold703 + $hold704 + $hold705;  ?></td>
            <td><?php echo $insp44 + $si44 + $asi44 + $hc44 + $ct44;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>DEPARTMENTAL COURSES</td>
                               <td><?php $hold706 = info_fetch_osireport('INSP','DEPARTMENT COURSE','traning3'); 
                      $hold707 = info_fetch_osireport('DSP/CR','DEPARTMENT COURSE','traning3'); 
                      echo $insp45 = $hold706 + $hold707;  ?></td>
            <td><?php $hold708 = info_fetch_osireport('SI','DEPARTMENT COURSE','traning3');
            $hold709 = info_fetch_osireport('INSP/LR','DEPARTMENT COURSE','traning3'); 
            $hold710 = info_fetch_osireport('INSP/CR','DEPARTMENT COURSE','traning3'); 
            echo $si45 =$hold708 + $hold709 + $hold710;
              ?></td>
            <td><?php $hold711 = info_fetch_osireport('ASI','DEPARTMENT COURSE','traning3'); 
                $hold712 = info_fetch_osireport('SI/CR','DEPARTMENT COURSE','traning3');  
                $hold713 = info_fetch_osireport('SI/LR','DEPARTMENT COURSE','traning3'); 
                echo $asi45 =  $hold711 + $hold712 + $hold713; 

             ?></td>
            <td><?php $hold714 = info_fetch_osireport('HC','DEPARTMENT COURSE','traning3');
                    $hold715 = info_fetch_osireport('ASI/LR','DEPARTMENT COURSE','traning3');
                     $hold716 = info_fetch_osireport('ASI/CR','DEPARTMENT COURSE','traning3');
             echo $hc45=  $hold714 +  $hold715 + $hold716;  ?></td>
            <td><?php $hold717 = info_fetch_osireport('CT','DEPARTMENT COURSE','traning3');
                       $hold718 = info_fetch_osireport('HC/PR','DEPARTMENT COURSE','traning3');
                        $hold719 = info_fetch_osireport('HC/LR','DEPARTMENT COURSE','traning3');
                         $hold720 = info_fetch_osireport('Sr.Const','DEPARTMENT COURSE','traning3');
                         $hold721 = info_fetch_osireport('C-II','DEPARTMENT COURSE','traning3');

             echo $ct45=  $hold717 + $hold718 + $hold719 + $hold720 + $hold721;  ?></td>
            <td><?php echo $insp45 + $si45 + $asi45 + $hc45 + $ct45;  ?></td>
                </tr>


                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp43 + $insp44 + $insp45; ?></td>
                  <td><?php echo $si43 + $si44 + $si45;  ?></td>
                  <td><?php echo $asi43 + $asi44 + $asi45;  ?></td>
                  <td><?php echo $hc43 + $hc44 + $hc45; ?></td>
                  <td><?php echo $ct43 + $ct44 + $ct45;?></td>
                  <td><?php echo $insp43 + $insp44 + $insp45 + $si43 + $si44 + $si45 + $asi43 + $asi44 + $asi45 + $hc43 + $hc44 + $hc45 + $ct43 + $ct44 + $ct45; ?>
                   </td>
                </tr>    
              </tbody>
           </table>

<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>   <h3> 6. SPORTS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
     
           
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 572px">DSO</td>
                               <td style="width: 40px"><?php $hold722 = info_fetch_osireport('INSP','DSO','ssone23'); 
                      $hold723 = info_fetch_osireport('DSP/CR','DSO','ssone23'); 
                      echo $insp46 = $hold722 + $hold723;  ?></td>
            <td  style="width: 40px"><?php $hold724 = info_fetch_osireport('SI','DSO','ssone23');
            $hold725 = info_fetch_osireport('INSP/LR','DSO','ssone23'); 
            $hold726 = info_fetch_osireport('INSP/CR','DSO','ssone23'); 
            echo $si46 = $hold724 + $hold725 + $hold726;
              ?></td>
            <td  style="width: 40px"><?php $hold727 = info_fetch_osireport('ASI','DSO','ssone23'); 
                $hold728 = info_fetch_osireport('SI/CR','DSO','ssone23');  
                $hold729 = info_fetch_osireport('SI/LR','DSO','ssone23'); 
                echo $asi46 = $hold727 + $hold728 + $hold729; 

             ?></td>
            <td  style="width: 40px"><?php $hold730 = info_fetch_osireport('HC','DSO','ssone23');
                    $hold731 = info_fetch_osireport('ASI/LR','DSO','ssone23');
                     $hold732 = info_fetch_osireport('ASI/CR','DSO','ssone23');
             echo $hc46= $hold730 +  $hold731 + $hold732;  ?></td>
            <td  style="width: 40px"><?php $hold733 = info_fetch_osireport('CT','DSO','ssone23');
                       $hold734 = info_fetch_osireport('HC/PR','DSO','ssone23');
                        $hold735 = info_fetch_osireport('HC/LR','DSO','ssone23');
                         $hold736 = info_fetch_osireport('Sr.Const','DSO','ssone23');
                         $hold737 = info_fetch_osireport('C-II','DSO','ssone23');

             echo $ct46=  $hold733 + $hold734 + $hold735 + $hold736 + $hold737;  ?></td>
            <td  style="width: 40px"><?php echo $insp46 + $si46 + $asi46 + $hc46 + $ct46;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CENTRAL SPORTS OFFICE JALANDHAR</td>
                               <td><?php $hold738 = info_fetch_osireport('INSP','CSO, JALANDHAR','ssone24'); 
                      $hold739 = info_fetch_osireport('DSP/CR','CSO, JALANDHAR','ssone24'); 
                      echo $insp47 = $hold738 + $hold739;  ?></td>
            <td><?php $hold740 = info_fetch_osireport('SI','CSO, JALANDHAR','ssone24');
            $hold741 = info_fetch_osireport('INSP/LR','CSO, JALANDHAR','ssone24'); 
            $hold742 = info_fetch_osireport('INSP/CR','CSO, JALANDHAR','ssone24'); 
            echo $si47 = $hold740 + $hold741 + $hold742;
              ?></td>
            <td><?php $hold743 = info_fetch_osireport('ASI','CSO, JALANDHAR','ssone24'); 
                $hold744 = info_fetch_osireport('SI/CR','CSO, JALANDHAR','ssone24');  
                $hold745 = info_fetch_osireport('SI/LR','CSO, JALANDHAR','ssone24'); 
                echo $asi47 =  $hold743 + $hold744 + $hold745; 

             ?></td>
            <td><?php $hold746 = info_fetch_osireport('HC','CSO, JALANDHAR','ssone24');
                    $hold747 = info_fetch_osireport('ASI/LR','CSO, JALANDHAR','ssone24');
                     $hold748 = info_fetch_osireport('ASI/CR','CSO, JALANDHAR','ssone24');
             echo $hc47= $hold746 +  $hold747 + $hold748;  ?></td>
            <td><?php $hold749 = info_fetch_osireport('CT','CSO, JALANDHAR','ssone24');
                       $hold750 = info_fetch_osireport('HC/PR','CSO, JALANDHAR','ssone24');
                        $hold751 = info_fetch_osireport('HC/LR','CSO, JALANDHAR','ssone24');
                         $hold752 = info_fetch_osireport('Sr.Const','CSO, JALANDHAR','ssone24');
                         $hold753 = info_fetch_osireport('C-II','CSO, JALANDHAR','ssone24');

             echo $ct47=  $hold749 + $hold750 + $hold751 + $hold752 + $hold753;  ?></td>
            <td><?php echo $insp47 + $si47 + $asi47 + $hc47 + $ct47;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>NIS PATIALA</td>
                              <td><?php $hold754 = info_fetch_osireport('INSP','NIS PATIALA','ssone25'); 
                      $hold755 = info_fetch_osireport('DSP/CR','NIS PATIALA','ssone25'); 
                      echo $insp48 = $hold754 + $hold755;  ?></td>
            <td><?php $hold756 = info_fetch_osireport('SI','NIS PATIALA','ssone25');
            $hold757 = info_fetch_osireport('INSP/LR','NIS PATIALA','ssone25'); 
            $hold758 = info_fetch_osireport('INSP/CR','NIS PATIALA','ssone25'); 
            echo $si48 = $hold756 + $hold757 + $hold758;
              ?></td>
            <td><?php $hold759 = info_fetch_osireport('ASI','NIS PATIALA','ssone25'); 
                $hold760 = info_fetch_osireport('SI/CR','NIS PATIALA','ssone25');  
                $hold761 = info_fetch_osireport('SI/LR','NIS PATIALA','ssone25'); 
                echo $asi48 = $hold759 + $hold760 + $hold761; 

             ?></td>
            <td><?php $hold762 = info_fetch_osireport('HC','NIS PATIALA','ssone25');
                    $hold763 = info_fetch_osireport('ASI/LR','NIS PATIALA','ssone25');
                     $hold764 = info_fetch_osireport('ASI/CR','NIS PATIALA','ssone25');
             echo $hc48= $hold762 +  $hold763 + $hold764;  ?></td>
            <td><?php $hold765 = info_fetch_osireport('CT','NIS PATIALA','ssone25');
                       $hold766 = info_fetch_osireport('HC/PR','NIS PATIALA','ssone25');
                        $hold767 = info_fetch_osireport('HC/LR','NIS PATIALA','ssone25');
                         $hold768 = info_fetch_osireport('Sr.Const','NIS PATIALA','ssone25');
                         $hold769 = info_fetch_osireport('C-II','NIS PATIALA','ssone25');

             echo $ct48= $hold765 + $hold766 + $hold767 + $hold768 + $hold769;  ?></td>
            <td><?php echo $insp48 + $si48 + $asi48 + $hc48 + $ct48;  ?></td>
                </tr>


                 <tr>
                  <td>iv)</td>
                  <td>OTHER</td>
                               <td><?php $hold770 = info_fetch_osireport('INSP','OTHERS','ssone26'); 
                      $hold771 = info_fetch_osireport('DSP/CR','OTHERS','ssone26'); 
                      echo $insp49 = $hold770 + $hold771;  ?></td>
            <td><?php $hold772 = info_fetch_osireport('SI','OTHERS','ssone26');
            $hold773 = info_fetch_osireport('INSP/LR','OTHERS','ssone26'); 
            $hold774 = info_fetch_osireport('INSP/CR','OTHERS','ssone26'); 
            echo $si49 = $hold772 + $hold773 + $hold774;
              ?></td>
            <td><?php $hold775 = info_fetch_osireport('ASI','OTHERS','ssone26'); 
                $hold776 = info_fetch_osireport('SI/CR','OTHERS','ssone26');  
                $hold777 = info_fetch_osireport('SI/LR','OTHERS','ssone26'); 
                echo $asi49 = $hold775 + $hold776 + $hold777; 

             ?></td>
            <td><?php $hold778 = info_fetch_osireport('HC','OTHERS','ssone26');
                    $hold779 = info_fetch_osireport('ASI/LR','OTHERS','ssone26');
                     $hold780 = info_fetch_osireport('ASI/CR','OTHERS','ssone26');
             echo $hc49= $hold778 +  $hold779 + $hold780;  ?></td>
            <td><?php $hold781 = info_fetch_osireport('CT','OTHERS','ssone26');
                       $hold782 = info_fetch_osireport('HC/PR','OTHERS','ssone26');
                        $hold783 = info_fetch_osireport('HC/LR','OTHERS','ssone26');
                         $hold784 = info_fetch_osireport('Sr.Const','OTHERS','ssone26');
                         $hold785 = info_fetch_osireport('C-II','OTHERS','ssone26');

             echo $ct49= $hold781 + $hold782 + $hold783 + $hold784 + $hold785;  ?></td>
            <td><?php echo $insp49 + $si49 + $asi49 + $hc49 + $ct49;  ?></td>
                </tr>

                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp46 + $insp47 + $insp48 + $insp49; ?></td>
                  <td><?php echo $si46 + $si47 + $si48 + $si49;  ?></td>
                  <td><?php echo $asi46 +  $asi47 + $asi48 + $asi49;  ?></td>
                  <td><?php echo $hc46 + $hc47 + $hc48 + $hc49; ?></td>
                  <td><?php echo $ct46 + $ct47 + $ct48 + $ct49;?></td>
                  <td><?php echo $insp46 + $insp47 + $insp48 + $insp49 + $si46 + $si47 + $si48 + $si49 + $asi46 +  $asi47 + $asi48 + $asi49 + $hc46 + $hc47 + $hc48 + $hc49 + $ct46 + $ct47 + $ct48 + $ct49; ?>
                   </td>
                </tr>    
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 7. AVAILABLE WITH BNs.</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>
 

                    
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td  style="width: 565px">PAP HQRS. CAMPUS SECURITY</td>
                               <td  style="width: 40px"><?php $hold786 = info_fetch_osireport('INSP','PAP CAMPUS  SECURITY','awbone1'); 
                      $hold787 = info_fetch_osireport('DSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
                      echo $insp50 = $hold786 + $hold787;  ?></td>
            <td  style="width: 40px"><?php $hold788 = info_fetch_osireport('SI','PAP CAMPUS  SECURITY','awbone1');
            $hold789 = info_fetch_osireport('INSP/LR','PAP CAMPUS  SECURITY','awbone1'); 
            $hold790 = info_fetch_osireport('INSP/CR','PAP CAMPUS  SECURITY','awbone1'); 
            echo $si50 =  $hold788 + $hold789 + $hold790;
              ?></td>
            <td   style="width: 40px"><?php $hold791 = info_fetch_osireport('ASI','PAP CAMPUS  SECURITY','awbone1'); 
                $hold792 = info_fetch_osireport('SI/CR','PAP CAMPUS  SECURITY','awbone1');  
                $hold793 = info_fetch_osireport('SI/LR','PAP CAMPUS  SECURITY','awbone1'); 
                echo $asi50 = $hold791 + $hold792 + $hold793; 

             ?></td>
            <td   style="width: 40px"><?php $hold794 = info_fetch_osireport('HC','PAP CAMPUS  SECURITY','awbone1');
                    $hold795 = info_fetch_osireport('ASI/LR','PAP CAMPUS  SECURITY','awbone1');
                     $hold796 = info_fetch_osireport('ASI/CR','PAP CAMPUS  SECURITY','awbone1');
             echo $hc50= $hold794 +  $hold795 + $hold796;  ?></td>
            <td   style="width: 40px"><?php $hold797 = info_fetch_osireport('CT','PAP CAMPUS  SECURITY','awbone1');
                       $hold798 = info_fetch_osireport('HC/PR','PAP CAMPUS  SECURITY','awbone1');
                        $hold799 = info_fetch_osireport('HC/LR','PAP CAMPUS  SECURITY','awbone1');
                         $hold800 = info_fetch_osireport('Sr.Const','PAP CAMPUS  SECURITY','awbone1');
                         $hold801 = info_fetch_osireport('C-II','PAP CAMPUS  SECURITY','awbone1');

             echo $ct50=  $hold797 + $hold798 + $hold799 + $hold800 + $hold801;  ?></td>
            <td   style="width: 40px"><?php echo $insp50 + $si50 + $asi50 + $hc50 + $ct50;  ?></td>
                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS</td>
                  <td><?php $hold802 = info_fetch_osireport('INSP','PERSONEL SECURITY STAFF WITH ARMED WING OFFICERS','awbone2'); 
                      $hold803 = info_fetch_osireport('DSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                      echo $insp51 = $hold802 + $hold803;  ?></td>
            <td><?php $hold804 = info_fetch_osireport('SI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
            $hold805 = info_fetch_osireport('INSP/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            $hold806 = info_fetch_osireport('INSP/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
            echo $si51 = $hold804 + $hold805 + $hold806;
              ?></td>
            <td><?php $hold807 = info_fetch_osireport('ASI','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                $hold8017 = info_fetch_osireport('SI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');  
                $hold808 = info_fetch_osireport('SI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2'); 
                echo $asi51 = $hold807 + $hold8017 + $hold808; 

             ?></td>
            <td><?php $hold809 = info_fetch_osireport('HC','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                    $hold810 = info_fetch_osireport('ASI/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                     $hold811 = info_fetch_osireport('ASI/CR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
             echo $hc51= $hold809 +  $hold810 + $hold811;  ?></td>
            <td><?php $hold812 = info_fetch_osireport('CT','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                       $hold813 = info_fetch_osireport('HC/PR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                        $hold814 = info_fetch_osireport('HC/LR','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold815 = info_fetch_osireport('Sr.Const','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');
                         $hold816 = info_fetch_osireport('C-II','PERSONAL SECURITY STAFF ARMED WING OFFICER','awbone2');

             echo $ct51=  $hold812 + $hold813 + $hold814 + $hold815 + $hold816;  ?></td>
            <td><?php echo $insp51 + $si51 + $asi51 + $hc51 + $ct51;  ?></td>
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>OFFICE STAFF IN ARMED HIGHER OFFICES</td>
                  <td><?php $hold817 = info_fetch_osireport('INSP','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      $hold818 = info_fetch_osireport('DSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                      echo $insp52 = $hold817 + $hold818;  ?></td>
            <td><?php $hold819 = info_fetch_osireport('SI','OFFICE STAFF IN HIGHER OFFICES','awbone3');
            $hold820 = info_fetch_osireport('INSP/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            $hold821 = info_fetch_osireport('INSP/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
            echo $si52 = $hold819 + $hold820 + $hold821;
              ?></td>
            <td><?php $hold822 = info_fetch_osireport('ASI','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                $hold823 = info_fetch_osireport('SI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');  
                $hold824 = info_fetch_osireport('SI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3'); 
                echo $asi52 = $hold822 + $hold823 + $hold824; 

             ?></td>
            <td><?php $hold825 = info_fetch_osireport('HC','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                    $hold826 = info_fetch_osireport('ASI/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                     $hold827 = info_fetch_osireport('ASI/CR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
             echo $hc52=  $hold825 +  $hold826 + $hold827;  ?></td>
            <td><?php $hold828 = info_fetch_osireport('CT','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                       $hold829 = info_fetch_osireport('HC/PR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                        $hold830 = info_fetch_osireport('HC/LR','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold831 = info_fetch_osireport('Sr.Const','OFFICE STAFF IN HIGHER OFFICES','awbone3');
                         $hold832 = info_fetch_osireport('C-II','OFFICE STAFF IN HIGHER OFFICES','awbone3');

             echo $ct52= $hold828 + $hold829 + $hold830 + $hold831 + $hold832;  ?></td>
            <td><?php echo $insp52 + $si52 + $asi52 + $hc52 + $ct52;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>OFFICE STAFF IN BN. OFFICES</td>
                            <td><?php $hold833 = info_fetch_osireports('INSP','','awbone4'); 
                      $hold834 = info_fetch_osireports('DSP/CR','','awbone4'); 
                      echo $insp53 = $hold833 + $hold834;  ?></td>
            <td><?php $hold835 = info_fetch_osireports('SI','','awbone4');
            $hold836 = info_fetch_osireports('INSP/LR','','awbone4'); 
            $hold837 = info_fetch_osireports('INSP/CR','','awbone4'); 
            echo $si53 = $hold835 + $hold836 + $hold837;
              ?></td>
            <td><?php $hold838 = info_fetch_osireports('ASI','','awbone4'); 
                $hold839 = info_fetch_osireports('SI/CR','','awbone4');  
                $hold840 = info_fetch_osireports('SI/LR','','awbone4'); 
                echo $asi53 =  $hold838 + $hold839 + $hold840; 

             ?></td>
            <td><?php $hold841 = info_fetch_osireports('HC','','awbone4');
                    $hold842 = info_fetch_osireports('ASI/LR','','awbone4');
                     $hold843 = info_fetch_osireports('ASI/CR','','awbone4');
             echo $hc53= $hold841 +  $hold842 + $hold843;  ?></td>
            <td><?php $hold844 = info_fetch_osireports('CT','','awbone4');
                       $hold845 = info_fetch_osireports('HC/PR','','awbone4');
                        $hold846 = info_fetch_osireports('HC/LR','','awbone4');
                         $hold847 = info_fetch_osireports('Sr.Const','','awbone4');
                         $hold848 = info_fetch_osireports('C-II','','awbone4');

             echo $ct53= $hold844 + $hold845 + $hold846 + $hold847 + $hold848;  ?></td>
            <td><?php echo $insp53 + $si53 + $asi53 + $hc53 + $ct53;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>BN. KOT GUARDS</td>
                 <td><?php $hold849 = info_fetch_osireport('INSP','BN. KOT GUARDS','awbone5'); 
                      $hold850 = info_fetch_osireport('DSP/CR','BN KOT GUARD','awbone5'); 
                      echo $insp54 = $hold849 + $hold850;  ?></td>
            <td><?php $hold851 = info_fetch_osireport('SI','BN KOT GUARD','awbone5');
            $hold852 = info_fetch_osireport('INSP/LR','BN KOT GUARD','awbone5'); 
            $hold853 = info_fetch_osireport('INSP/CR','BN KOT GUARD','awbone5'); 
            echo $si54 = $hold851 + $hold852 + $hold853;
              ?></td>
            <td><?php $hold854 = info_fetch_osireport('ASI','BN KOT GUARD','awbone5'); 
                $hold855 = info_fetch_osireport('SI/CR','BN KOT GUARD','awbone5');  
                $hold856 = info_fetch_osireport('SI/LR','BN KOT GUARD','awbone5'); 
                echo $asi54 = $hold854 + $hold855 + $hold856; 

             ?></td>
            <td><?php $hold857 = info_fetch_osireport('HC','BN KOT GUARD','awbone5');
                    $hold858 = info_fetch_osireport('ASI/LR','BN KOT GUARD','awbone5');
                     $hold859 = info_fetch_osireport('ASI/CR','BN KOT GUARD','awbone5');
             echo $hc54= $hold857 +  $hold858 + $hold859;  ?></td>
            <td><?php $hold860 = info_fetch_osireport('CT','BN KOT GUARD','awbone5');
                       $hold861 = info_fetch_osireport('HC/PR','BN KOT GUARD','awbone5');
                        $hold862 = info_fetch_osireport('HC/LR','BN KOT GUARD','awbone5');
                         $hold863 = info_fetch_osireport('Sr.Const','BN KOT GUARD','awbone5');
                         $hold864 = info_fetch_osireport('C-II','BN KOT GUARD','awbone5');

             echo $ct54= $hold860 + $hold861 + $hold862 + $hold863 + $hold864;  ?></td>
            <td><?php echo $insp54 + $si54 + $asi54 + $hc54 + $ct54;  ?></td>
                </tr>

                 <tr>
                  <td>  vi)</td>
                  <td>BN. HQRS OTHER GUARDS</td>
                  <td><?php $hold865 = info_fetch_osireports('INSP','','awbone6'); 
                      $hold866 = info_fetch_osireports('DSP/CR','','awbone6'); 
                      echo $insp55 = $hold865 + $hold866;  ?></td>
            <td><?php $hold867 = info_fetch_osireports('SI','','awbone6');
            $hold868 = info_fetch_osireports('INSP/LR','','awbone6'); 
            $hold869 = info_fetch_osireports('INSP/CR','','awbone6'); 
            echo $si55 = $hold867 + $hold868 + $hold869;
              ?></td>
            <td><?php $hold870 = info_fetch_osireports('ASI','','awbone6'); 
                $hold871 = info_fetch_osireports('SI/CR','','awbone6');  
                $hold872 = info_fetch_osireports('SI/LR','','awbone6'); 
                echo $asi55 =  $hold870 + $hold871 + $hold872; 

             ?></td>
            <td><?php $hold873 = info_fetch_osireports('HC','','awbone6');
                    $hold874 = info_fetch_osireports('ASI/LR','','awbone6');
                     $hold875 = info_fetch_osireports('ASI/CR','','awbone6');
             echo $hc55= $hold873 +  $hold874 + $hold875;  ?></td>
            <td><?php $hold876 = info_fetch_osireports('CT','','awbone6');
                       $hold877 = info_fetch_osireports('HC/PR','','awbone6');
                        $hold878 = info_fetch_osireports('HC/LR','','awbone6');
                         $hold879 = info_fetch_osireports('Sr.Const','','awbone6');
                         $hold880 = info_fetch_osireports('C-II','','awbone6');

             echo $ct55= $hold876 + $hold877 + $hold878 + $hold879 + $hold880;  ?></td>
            <td><?php echo $insp55 + $si55 + $asi55 + $hc55 + $ct55;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>TRADEMEN</td>
                 <td><?php $hold881 = info_fetch_osireport('INSP','TRADESMEN','awbone7'); 
                      $hold882 = info_fetch_osireport('DSP/CR','TRADESMEN','awbone7'); 
                      echo $insp56 = $hold881 + $hold882;  ?></td>
            <td><?php $hold884 = info_fetch_osireport('SI','TRADESMEN','awbone7');
            $hold885 = info_fetch_osireport('INSP/LR','TRADESMEN','awbone7'); 
            $hold886 = info_fetch_osireport('INSP/CR','TRADESMEN','awbone7'); 
            echo $si56 = $hold884 + $hold885 + $hold886;
              ?></td>
            <td><?php $hold887 = info_fetch_osireport('ASI','TRADESMEN','awbone7'); 
                $hold888 = info_fetch_osireport('SI/CR','TRADESMEN','awbone7');  
                $hold889 = info_fetch_osireport('SI/LR','TRADESMEN','awbone7'); 
                echo $asi56 = $hold887 + $hold888 + $hold889; 

             ?></td>
            <td><?php $hold890 = info_fetch_osireport('HC','TRADESMEN','awbone7');
                    $hold891 = info_fetch_osireport('ASI/LR','TRADESMEN','awbone7');
                     $hold892 = info_fetch_osireport('ASI/CR','TRADESMEN','awbone7');
             echo  $hc56= $hold890 +  $hold891 + $hold892;  ?></td>
            <td><?php $hold893 = info_fetch_osireport('CT','TRADESMEN','awbone7');
                       $hold894 = info_fetch_osireport('HC/PR','TRADESMEN','awbone7');
                        $hold895 = info_fetch_osireport('HC/LR','TRADESMEN','awbone7');
                         $hold896 = info_fetch_osireport('Sr.Const','TRADESMEN','awbone7');
                         $hold897 = info_fetch_osireport('C-II','TRADESMEN','awbone7');
             echo $ct56= $hold893 + $hold894 + $hold895 + $hold896 + $hold897;  ?></td>
            <td><?php echo $insp56 + $si56 + $asi56 + $hc56 + $ct56;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>ARMOURER</td>
                 <td><?php $hold881 = info_fetch_osireport('INSP','ARMOURER','awbone7'); 
                      $hold882 = info_fetch_osireport('DSP/CR','ARMOURER','awbone7'); 
                      echo $insp56 = $hold881 + $hold882;  ?></td>
            <td><?php $hold884 = info_fetch_osireport('SI','ARMOURER','awbone7');
            $hold885 = info_fetch_osireport('INSP/LR','ARMOURER','awbone7'); 
            $hold886 = info_fetch_osireport('INSP/CR','ARMOURER','awbone7'); 
            echo $si56 = $hold884 + $hold885 + $hold886;
              ?></td>
            <td><?php $hold887 = info_fetch_osireport('ASI','ARMOURER','awbone7'); 
                $hold888 = info_fetch_osireport('SI/CR','ARMOURER','awbone7');  
                $hold889 = info_fetch_osireport('SI/LR','ARMOURER','awbone7'); 
                echo $asi56 = $hold887 + $hold888 + $hold889; 

             ?></td>
            <td><?php $hold890 = info_fetch_osireport('HC','ARMOURER','awbone7');
                    $hold891 = info_fetch_osireport('ASI/LR','ARMOURER','awbone7');
                     $hold892 = info_fetch_osireport('ASI/CR','ARMOURER','awbone7');
             echo  $hc56= $hold890 +  $hold891 + $hold892;  ?></td>
            <td><?php $hold893 = info_fetch_osireport('CT','ARMOURER','awbone7');
                       $hold894 = info_fetch_osireport('HC/PR','ARMOURER','awbone7');
                        $hold895 = info_fetch_osireport('HC/LR','ARMOURER','awbone7');
                         $hold896 = info_fetch_osireport('Sr.Const','ARMOURER','awbone7');
                         $hold897 = info_fetch_osireport('C-II','ARMOURER','awbone7');
             echo $ct56= $hold893 + $hold894 + $hold895 + $hold896 + $hold897;  ?></td>
            <td><?php echo $insp56 + $si56 + $asi56 + $hc56 + $ct56;  ?></td>
                </tr>

                <tr>
                  <td>ix)</td>
                  <td>M.T.SECTION </td>
                    <td><?php $hold898 = info_fetch_osireport('INSP','M.T. SECTION','awbone8'); 
                      $hold899 = info_fetch_osireport('DSP/CR','M.T. SECTION','awbone8'); 
                      echo $insp57 = $hold898 + $hold899;  ?></td>
            <td><?php $hold8990 = info_fetch_osireport('SI','M.T. SECTION','awbone8');
            $hold900 = info_fetch_osireport('INSP/LR','M.T. SECTION','awbone8'); 
            $hold901 = info_fetch_osireport('INSP/CR','M.T. SECTION','awbone8'); 
            echo $si57 =  $hold8990 + $hold900 + $hold901;
              ?></td>
            <td><?php $hold902 = info_fetch_osireport('ASI','M.T. SECTION','awbone8'); 
                $hold903 = info_fetch_osireport('SI/CR','M.T. SECTION','awbone8');  
                $hold904 = info_fetch_osireport('SI/LR','M.T. SECTION','awbone8'); 
                echo $asi57 = $hold902 + $hold903 + $hold904; 

             ?></td>
            <td><?php $hold905 = info_fetch_osireport('HC','M.T. SECTION','awbone8');
                    $hold906 = info_fetch_osireport('ASI/LR','M.T. SECTION','awbone8');
                     $hold907 = info_fetch_osireport('ASI/CR','M.T. SECTION','awbone8');
             echo $hc57= $hold905 +  $hold906 + $hold907;  ?></td>
            <td><?php $hold908 = info_fetch_osireport('CT','M.T. SECTION','awbone8');
                       $hold909 = info_fetch_osireport('HC/PR','M.T. SECTION','awbone8');
                        $hold910 = info_fetch_osireport('HC/LR','M.T. SECTION','awbone8');
                         $hold911 = info_fetch_osireport('Sr.Const','M.T. SECTION','awbone8');
                         $hold912 = info_fetch_osireport('C-II','M.T. SECTION','awbone8');

             echo $ct57 = $hold908 + $hold909 + $hold910 + $hold911 + $hold912;  ?></td>
            <td><?php echo $insp57 + $si57 + $asi57 + $hc57 + $ct57;  ?></td>
                </tr>

                <tr>
                  <td>x)</td>
                  <td>QUARTER MASTER BRANCH (LINE STAFF)</td>
                  <td><?php $hold913 = info_fetch_osireports('INSP','','awbone9'); 
                      $hold914 = info_fetch_osireports('DSP/CR','','awbone9'); 
                      echo $insp58 = $hold913 + $hold914;  ?></td>
            <td><?php $hold915 = info_fetch_osireports('SI','','awbone9');
            $hold916 = info_fetch_osireports('INSP/LR','','awbone9'); 
            $hold917 = info_fetch_osireports('INSP/CR','','awbone9'); 
            echo $si58 =  $hold915 + $hold916 + $hold917;
              ?></td>
            <td><?php $hold918 = info_fetch_osireports('ASI','','awbone9'); 
                $hold919 = info_fetch_osireports('SI/CR','','awbone9');  
                $hold920 = info_fetch_osireports('SI/LR','','awbone9'); 
                echo $asi58 = $hold918 + $hold919 + $hold920; 

             ?></td>
            <td><?php $hold921 = info_fetch_osireports('HC','','awbone9');
                    $hold922 = info_fetch_osireports('ASI/LR','','awbone9');
                     $hold923 = info_fetch_osireports('ASI/CR','','awbone9');
             echo $hc58= $hold921 +  $hold922 + $hold923;  ?></td>
            <td><?php $hold924 = info_fetch_osireports('CT','','awbone9');
                       $hold925 = info_fetch_osireports('HC/PR','','awbone9');
                        $hold926 = info_fetch_osireports('HC/LR','','awbone9');
                         $hold927 = info_fetch_osireports('Sr.Const','','awbone9');
                         $hold928 = info_fetch_osireports('C-II','','awbone9');

             echo $ct58= $hold924 + $hold925 + $hold926 + $hold927 + $hold928;  ?></td>
            <td><?php echo $insp58 + $si58 + $asi58 + $hc58 + $ct58;  ?></td>
                </tr>

                <tr>
                  <td>xi)</td>
                  <td>GENERAL DUTY</td>
                <td><?php $hold929 = info_fetch_osireport('INSP','GENERAL DUTY BN.HQRS','awbone10'); 
                      $hold930 = info_fetch_osireport('DSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
                      echo $insp59 = $hold929 + $hold930;  ?></td>
            <td><?php $hold931 = info_fetch_osireport('SI','GENERAL DUTY BN.HQRS','awbone10');
            $hold932 = info_fetch_osireport('INSP/LR','GENERAL DUTY BN.HQRS','awbone10'); 
            $hold933 = info_fetch_osireport('INSP/CR','GENERAL DUTY BN.HQRS','awbone10'); 
            echo $si59 = $hold931 + $hold932 + $hold933;
              ?></td>
            <td><?php $hold934 = info_fetch_osireport('ASI','GENERAL DUTY BN.HQRS','awbone10'); 
                $hold935 = info_fetch_osireport('SI/CR','GENERAL DUTY BN.HQRS','awbone10');  
                $hold936 = info_fetch_osireport('SI/LR','GENERAL DUTY BN.HQRS','awbone10'); 
                echo $asi59 = $hold934 + $hold935 + $hold936; 

             ?></td>
            <td><?php $hold937 = info_fetch_osireport('HC','GENERAL DUTY BN.HQRS','awbone10');
                    $hold938 = info_fetch_osireport('ASI/LR','GENERAL DUTY BN.HQRS','awbone10');
                     $hold939 = info_fetch_osireport('ASI/CR','GENERAL DUTY BN.HQRS','awbone10');
             echo $hc59= $hold937 +  $hold938 + $hold939;  ?></td>
            <td><?php $hold940 = info_fetch_osireport('CT','GENERAL DUTY BN.HQRS','awbone10');
                       $hold941 = info_fetch_osireport('HC/PR','GENERAL DUTY BN.HQRS','awbone10');
                        $hold942 = info_fetch_osireport('HC/LR','GENERAL DUTY BN.HQRS','awbone10');
                         $hold943 = info_fetch_osireport('Sr.Const','GENERAL DUTY BN.HQRS','awbone10');
                         $hold944 = info_fetch_osireport('C-II','GENERAL DUTY BN.HQRS','awbone10');

             echo $ct59= $hold940 + $hold941 + $hold942 + $hold943 + $hold944;  ?></td>
            <td><?php echo $insp59 + $si59 + $asi59 + $hc59 + $ct59;  ?></td>
                </tr>

                <tr>
                  <td>xii)</td>
                  <td>RECRUITMENT DUTY</td>
                <td><?php $hold945 = info_fetch_osireport('INSP','RECRUITMENT DUTY','awbone12'); 
                      $hold946 = info_fetch_osireport('DSP/CR','RECRUITMENT DUTY','awbone12'); 
                      echo $insp60 = $hold945 + $hold946;  ?></td>
            <td><?php $hold947 = info_fetch_osireport('SI','RECRUITMENT DUTY','awbone12');
            $hold948 = info_fetch_osireport('INSP/LR','RECRUITMENT DUTY','awbone12'); 
            $hold949 = info_fetch_osireport('INSP/CR','RECRUITMENT DUTY','awbone12'); 
            echo $si60 = $hold947 + $hold948 + $hold949;
              ?></td>
            <td><?php $hold950 = info_fetch_osireport('ASI,','RECRUITMENT DUTY','awbone12'); 
                $hold951 = info_fetch_osireport('SI/CR','RECRUITMENT DUTY','awbone12');  
                $hold952 = info_fetch_osireport('SI/LR','RECRUITMENT DUTY','awbone12'); 
                echo $asi60 =  $hold950 + $hold951 + $hold952; 

             ?></td>
            <td><?php $hold953 = info_fetch_osireport('HC','RECRUITMENT DUTY','awbone12');
                    $hold954 = info_fetch_osireport('ASI/LR','RECRUITMENT DUTY','awbone12');
                     $hold955 = info_fetch_osireport('ASI/CR','RECRUITMENT DUTY','awbone12');
             echo $hc60= $hold953 +  $hold954 + $hold955;  ?></td>
            <td><?php $hold956 = info_fetch_osireport('CT','RECRUITMENT DUTY','awbone12');
                       $hold957 = info_fetch_osireport('HC/PR','RECRUITMENT DUTY','awbone12');
                        $hold958 = info_fetch_osireport('HC/LR','RECRUITMENT DUTY','awbone12');
                         $hold959 = info_fetch_osireport('Sr.Const','RECRUITMENT DUTY','awbone12');
                         $hold960 = info_fetch_osireport('C-II','RECRUITMENT DUTY','awbone12');

             echo $ct60= $hold956 + $hold957 + $hold958 + $hold959 + $hold960;  ?></td>
            <td><?php echo $insp60 + $si60 + $asi60 + $hc60 + $ct60;  ?></td>
                </tr>

                           
                 <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60; ?></td>
                  <td><?php echo $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60;  ?></td>
                  <td><?php echo $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60;  ?></td>
                  <td><?php echo $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60; ?></td>
                  <td><?php echo $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60;?></td>
                  <td><?php echo $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60 + $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60 + $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60 + $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60 + $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60; ?>
                   </td>
                </tr>   
              </tbody>
           </table>
<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3>8. MISC</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>

<table border="1">
  <tbody>
    <tr>
                  <td>i)</td>
                  <td style="width: 565px">RECRUITS</td>
                 

                    <td style="width: 40px"><?php $hold961 = info_fetch_osireport('INSP','RECRUIT','bmdone1'); 
                      $hold962 = info_fetch_osireport('DSP/CR','RECRUIT','bmdone1'); 
                      echo $insp61 = $hold961 + $hold962;  ?></td>
            <td style="width: 40px"><?php $hold963 = info_fetch_osireport('SI','RECRUIT','bmdone1');
            $hold964 = info_fetch_osireport('INSP/LR','RECRUIT','bmdone1'); 
            $hold965 = info_fetch_osireport('INSP/CR','RECRUIT','bmdone1'); 
            echo $si61 = $hold963 + $hold964 + $hold965;
              ?></td>
            <td style="width: 40px"><?php $hold966 = info_fetch_osireport('ASI','RECRUIT','bmdone1'); 
                $hold967 = info_fetch_osireport('SI/CR','RECRUIT','bmdone1');  
                $hold968 = info_fetch_osireport('SI/LR','RECRUIT','bmdone1'); 
                echo $asi61 = $hold966 + $hold967 + $hold968; 

             ?></td>
            <td style="width: 40px"><?php $hold969 = info_fetch_osireport('HC','RECRUIT','bmdone1');
                    $hold970 = info_fetch_osireport('ASI/LR','RECRUIT','bmdone1');
                     $hold971 = info_fetch_osireport('ASI/CR','RECRUIT','bmdone1');
             echo $hc61= $hold969 +  $hold970 + $hold971;  ?></td>
            <td style="width: 40px"><?php $hold972 = info_fetch_osireport('CT','RECRUIT','bmdone1');
                       $hold973 = info_fetch_osireport('HC/PR','RECRUIT','bmdone1');
                        $hold974 = info_fetch_osireport('HC/LR','RECRUIT','bmdone1');
                         $hold975 = info_fetch_osireport('Sr.Const','RECRUIT','bmdone1');
                         $hold976 = info_fetch_osireport('C-II','RECRUIT','bmdone1');

             echo $ct61= $hold972 + $hold973 + $hold974 + $hold975 + $hold976;  ?></td>
            <td style="width: 40px"><?php echo $insp61 + $si61 + $asi61 + $hc61 + $ct61;  ?></td>

                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>LEAVES</td>
                
                    <td><?php $hold977 = info_fetch_osireport('INSP','LEAVE','bmdone2'); 
                      $hold978 = info_fetch_osireport('DSP/CR','LEAVE','bmdone2'); 
                      echo $insp62 = $hold977 + $hold978;  ?></td>
            <td><?php $hold979 = info_fetch_osireport('SI','LEAVE','bmdone2');
            $hold980 = info_fetch_osireport('INSP/LR','LEAVE','bmdone2'); 
            $hold981 = info_fetch_osireport('INSP/CR','LEAVE','bmdone2'); 
            echo $si62 = $hold979 + $hold980 + $hold981;
              ?></td>
            <td><?php $hold982 = info_fetch_osireport('ASI','LEAVE','bmdone2'); 
                $hold983 = info_fetch_osireport('SI/CR','LEAVE','bmdone2');  
                $hold984 = info_fetch_osireport('SI/LR','LEAVE','bmdone2'); 
                echo $asi62 = $hold982 + $hold983 + $hold984; 

             ?></td>
            <td><?php $hold985 = info_fetch_osireport('HC','LEAVE','bmdone2');
                    $hold986 = info_fetch_osireport('ASI/LR','LEAVE','bmdone2');
                     $hold987 = info_fetch_osireport('ASI/CR','LEAVE','bmdone2');
             echo $hc62= $hold985 +  $hold986 + $hold987;  ?></td>
            <td><?php $hold988 = info_fetch_osireport('CT','LEAVE','bmdone2');
                       $hold989 = info_fetch_osireport('HC/PR','LEAVE','bmdone2');
                        $hold990 = info_fetch_osireport('HC/LR','LEAVE','bmdone2');
                         $hold991 = info_fetch_osireport('Sr.Const','LEAVE','bmdone2');
                         $hold992 = info_fetch_osireport('C-II','LEAVE','bmdone2');

             echo $ct62= $hold988 + $hold989 + $hold990 + $hold991 + $hold992;  ?></td>
            <td><?php echo $insp62 + $si62 + $asi62 + $hc62 + $ct62;  ?></td>

                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>ABSENT</td>
                <td><?php $hold993 = info_fetch_osireport('INSP','ABSENT','bmdone3'); 
                      $hold994 = info_fetch_osireport('DSP/CR','ABSENT','bmdone3'); 
                      echo $insp63 = $hold993 + $hold994;  ?></td>
            <td><?php $hold995 = info_fetch_osireport('SI','ABSENT','bmdone3');
            $hold996 = info_fetch_osireport('INSP/LR','ABSENT','bmdone3'); 
            $hold997 = info_fetch_osireport('INSP/CR','ABSENT','bmdone3'); 
            echo $si63 = $hold995 + $hold996 + $hold997;
              ?></td>
            <td><?php $hold998 = info_fetch_osireport('ASI','ABSENT','bmdone3'); 
                $hold999 = info_fetch_osireport('SI/CR','ABSENT','bmdone3');  
                $hold1000 = info_fetch_osireport('SI/LR','ABSENT','bmdone3'); 
                echo $asi63 = $hold998 + $hold999 + $hold1000; 

             ?></td>
            <td><?php $hold1001 = info_fetch_osireport('HC','ABSENT','bmdone3');
                    $hold1002 = info_fetch_osireport('ASI/LR','ABSENT','bmdone3');
                     $hold1003 = info_fetch_osireport('ASI/CR','ABSENT','bmdone3');
             echo $hc63 = $hold1001 +  $hold1002 + $hold1003;  ?></td>
            <td><?php $hold1004 = info_fetch_osireport('CT','ABSENT','bmdone3');
                       $hold1005 = info_fetch_osireport('HC/PR','ABSENT','bmdone3');
                        $hold1006 = info_fetch_osireport('HC/LR','ABSENT','bmdone3');
                         $hold1007 = info_fetch_osireport('Sr.Const','ABSENT','bmdone3');
                         $hold1008 = info_fetch_osireport('C-II','ABSENT','bmdone3');

             echo $ct63= $hold1004 + $hold1005 + $hold1006 + $hold1007 + $hold1008;  ?></td>
            <td><?php echo $insp63 + $si63 + $asi63 + $hc63 + $ct63;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>UNDER SUSPENTION</td>

                         <td><?php $hold1009 = info_fetch_osireport('INSP','UNDER SUSPENSION','bmdone4'); 
                      $hold1010 = info_fetch_osireport('DSP/CR','UNDER SUSPENSION','bmdone4'); 
                      echo $insp64 = $hold1009 + $hold1010;  ?></td>
            <td><?php $hold1011 = info_fetch_osireport('SI','UNDER SUSPENSION','bmdone4');
            $hold1012 = info_fetch_osireport('INSP/LR','UNDER SUSPENSION','bmdone4'); 
            $hold1013 = info_fetch_osireport('INSP/CR','UNDER SUSPENSION','bmdone4'); 
            echo $si64 = $hold1011 + $hold1012 + $hold1013;
              ?></td>
            <td><?php $hold1014 = info_fetch_osireport('ASI','UNDER SUSPENSION','bmdone4'); 
                $hold1015 = info_fetch_osireport('SI/CR','UNDER SUSPENSION','bmdone4');  
                $hold1016 = info_fetch_osireport('SI/LR','UNDER SUSPENSION','bmdone4'); 
                echo $asi64 =  $hold1014 + $hold1015 + $hold1016; 

             ?></td>
            <td><?php $hold1017 = info_fetch_osireport('HC','UNDER SUSPENSION','bmdone4');
                    $hold1018 = info_fetch_osireport('ASI/LR','UNDER SUSPENSION','bmdone4');
                     $hold1019 = info_fetch_osireport('ASI/CR','UNDER SUSPENSION','bmdone4');
             echo $hc64= $hold1017 +  $hold1018 + $hold1019;  ?></td>
            <td><?php $hold1020 = info_fetch_osireport('CT','UNDER SUSPENSION','bmdone4');
                       $hold1021 = info_fetch_osireport('HC/PR','UNDER SUSPENSION','bmdone4');
                        $hold1022 = info_fetch_osireport('HC/LR','UNDER SUSPENSION','bmdone4');
                         $hold1023 = info_fetch_osireport('Sr.Const','UNDER SUSPENSION','bmdone4');
                         $hold1024 = info_fetch_osireport('C-II','UNDER SUSPENSION','bmdone4');

             echo $ct64= $hold1020 + $hold1021 + $hold1022 + $hold1023 + $hold1024;  ?></td>
            <td><?php echo $insp64 + $si64 + $asi64 + $hc64 + $ct64;  ?></td>
                </tr>

                <tr>
                  <td>  v)</td>
                  <td>HANDICAPPED ON MEDICAL REST</td>
                 
                         <td><?php $hold1025 = info_fetch_osireport('INSP','Handicapped on Medical Rest','bmdone5'); 
                      $hold1026 = info_fetch_osireport('DSP/CR','Handicapped on Medical Rest','bmdone5'); 
                      echo $insp65 = $hold1025 + $hold1026;  ?></td>
            <td><?php $hold1027 = info_fetch_osireport('SI','Handicapped on Medical Rest','bmdone5');
            $hold1028 = info_fetch_osireport('INSP/LR','Handicapped on Medical Rest','bmdone5'); 
            $hold1029 = info_fetch_osireport('INSP/CR','Handicapped on Medical Rest','bmdone5'); 
            echo $si65 =  $hold1027 + $hold1028 + $hold1029;
              ?></td>
            <td><?php $hold1030 = info_fetch_osireport('ASI','Handicapped on Medical Rest','bmdone5'); 
                $hold1031 = info_fetch_osireport('SI/CR','Handicapped on Medical Rest','bmdone5');  
                $hold1032 = info_fetch_osireport('SI/LR','Handicapped on Medical Rest','bmdone5'); 
                echo $asi65 =  $hold1030 + $hold1031 + $hold1032; 

             ?></td>
            <td><?php $hold1033 = info_fetch_osireport('HC','Handicapped on Medical Rest','bmdone5');
                    $hold1034 = info_fetch_osireport('ASI/LR','Handicapped on Medical Rest','bmdone5');
                     $hold1035 = info_fetch_osireport('ASI/CR','Handicapped on Medical Rest','bmdone5');
             echo $hc65= $hold1033 +  $hold1034 + $hold1035;  ?></td>
            <td><?php $hold1036 = info_fetch_osireport('CT','Handicapped on Medical Rest','bmdone5');
                       $hold1037 = info_fetch_osireport('HC/PR','Handicapped on Medical Rest','bmdone5');
                        $hold1038 = info_fetch_osireport('HC/LR','Handicapped on Medical Rest','bmdone5');
                         $hold1039 = info_fetch_osireport('Sr.Const','Handicapped on Medical Rest','bmdone5');
                         $hold1040 = info_fetch_osireport('C-II','Handicapped on Medical Rest','bmdone5');

             echo $ct65= $hold1036 + $hold1037 + $hold1038 + $hold1039 + $hold1040;  ?></td>
            <td><?php echo $insp65 + $si65 + $asi65 + $hc65 + $ct65;  ?></td>
                </tr>

                 <tr>
                  <td>vi)</td>
                  <td>HANDICAPPED ON LIGHT DUTY</td>

             <td><?php $hold1041 = info_fetch_osireport('INSP','Handicapped on light duty','bmdone6'); 
                      $hold1042 = info_fetch_osireport('DSP/CR','Handicapped on light duty','bmdone6'); 
                      echo $insp66 = $hold1041 + $hold1042;  ?></td>
            <td><?php $hold1043 = info_fetch_osireport('SI','Handicapped on light duty','bmdone6');
            $hold1044 = info_fetch_osireport('INSP/LR','Handicapped on light duty','bmdone6'); 
            $hold1045 = info_fetch_osireport('INSP/CR','Handicapped on light duty','bmdone6'); 
            echo $si66 = $hold1043 + $hold1044 + $hold1045;
              ?></td>
            <td><?php $hold1046 = info_fetch_osireport('ASI','Handicapped on light duty','bmdone6'); 
                $hold1047 = info_fetch_osireport('SI/CR','Handicapped on light duty','bmdone6');  
                $hold1048 = info_fetch_osireport('SI/LR','Handicapped on light duty','bmdone6'); 
                echo $asi66 = $hold1046 + $hold1047 + $hold1048; 

             ?></td>
            <td><?php $hold1049 = info_fetch_osireport('HC','Handicapped on light duty','bmdone6');
                    $hold1050 = info_fetch_osireport('ASI/LR','Handicapped on light duty','bmdone6');
                     $hold1051 = info_fetch_osireport('ASI/CR','Handicapped on light duty','bmdone6');
             echo $hc66 = $hold1049 +  $hold1050 + $hold1051;  ?></td>
            <td><?php $hold1052 = info_fetch_osireport('CT','Handicapped on light duty','bmdone6');
                       $hold1053 = info_fetch_osireport('HC/PR','Handicapped on light duty','bmdone6');
                        $hold1054 = info_fetch_osireport('HC/LR','Handicapped on light duty','bmdone6');
                         $hold1055 = info_fetch_osireport('Sr.Const','Handicapped on light duty','bmdone6');
                         $hold1056 = info_fetch_osireport('C-II','Handicapped on light duty','bmdone6');

             echo $ct66= $hold1052 + $hold1053 + $hold1054 + $hold1055 + $hold1056;  ?></td>
            <td><?php echo $insp66 + $si66 + $asi66 + $hc66 + $ct66;  ?></td>
                </tr>

                 <tr>
                  <td>vii)</td>
                  <td>CHRONIC ON MEDICAL REST</td>
                                           <td><?php $hold1057 = info_fetch_osireport('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold1058 = info_fetch_osireport('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp67 = $hold1057 + $hold1058;  ?></td>
            <td><?php $hold1059 = info_fetch_osireport('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold1060 = info_fetch_osireport('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold1061 = info_fetch_osireport('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si67 = $hold1059 + $hold1060 + $hold1061;
              ?></td>
            <td><?php $hold1062 = info_fetch_osireport('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold1063 = info_fetch_osireport('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold1064 = info_fetch_osireport('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi67 =  $hold1062 + $hold1063 + $hold1064; 

             ?></td>
            <td><?php $hold1065 = info_fetch_osireport('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold1066 = info_fetch_osireport('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold1067 = info_fetch_osireport('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc67= $hold1065 +  $hold1066 + $hold1067;  ?></td>
            <td><?php $hold1068 = info_fetch_osireport('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold1069 = info_fetch_osireport('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1070 = info_fetch_osireport('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1071 = info_fetch_osireport('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold1072 = info_fetch_osireport('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct67 = $hold1068 + $hold1069 + $hold1070 + $hold1071 + $hold1072;  ?></td>
            <td><?php echo $insp67 + $si67 + $asi67 + $hc67 + $ct67;  ?></td>
                </tr>

                 <tr>
                  <td>viii)</td>
                  <td>CHRONIC ON LIGHT DUTY</td>
               
                          <td><?php $hold1073 = info_fetch_osireport('INSP','Chronic Disease on Medical Rest','bmdone7'); 
                      $hold1074 = info_fetch_osireport('DSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
                      echo $insp68 = $hold1073 + $hold1074;  ?></td>
            <td><?php $hold1075 = info_fetch_osireport('SI','Chronic Disease on Medical Rest','bmdone7');
            $hold1076 = info_fetch_osireport('INSP/LR','Chronic Disease on Medical Rest','bmdone7'); 
            $hold1077 = info_fetch_osireport('INSP/CR','Chronic Disease on Medical Rest','bmdone7'); 
            echo $si68 = $hold1075 + $hold1076 + $hold1077;
              ?></td>
            <td><?php $hold1078 = info_fetch_osireport('ASI','Chronic Disease on Medical Rest','bmdone7'); 
                $hold1079 = info_fetch_osireport('SI/CR','Chronic Disease on Medical Rest','bmdone7');  
                $hold1080 = info_fetch_osireport('SI/LR','Chronic Disease on Medical Rest','bmdone7'); 
                echo $asi68 = $hold1078 + $hold1079 + $hold1080; 

             ?></td>
            <td><?php $hold1081 = info_fetch_osireport('HC','Chronic Disease on Medical Rest','bmdone7');
                    $hold1082 = info_fetch_osireport('ASI/LR','Chronic Disease on Medical Rest','bmdone7');
                     $hold1083 = info_fetch_osireport('ASI/CR','Chronic Disease on Medical Rest','bmdone7');
             echo $hc68 = $hold1081 +  $hold1082 + $hold1083;  ?></td>
            <td><?php $hold1084 = info_fetch_osireport('CT','Chronic Disease on Medical Rest','bmdone7');
                       $hold1085 = info_fetch_osireport('HC/PR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1086 = info_fetch_osireport('HC/LR','Chronic Disease on Medical Rest','bmdone7');
                        $hold1087 = info_fetch_osireport('Sr.Const','Chronic Disease on Medical Rest','bmdone7');
                         $hold1088 = info_fetch_osireport('C-II','Chronic Disease on Medical Rest','bmdone7');

             echo $ct68=  $hold1084 + $hold1085 + $hold1086 + $hold1087 + $hold1088;  ?></td>
            <td><?php echo $insp68 + $si68 + $asi68 + $hc68 + $ct68;  ?></td>

                </tr>

                 <tr>
                  <td>ix)</td>
                  <td>OSD ETC.</td>
                   <td><?php $hold1089 = info_fetch_osireport('INSP','OSD ETC','bmdone8'); 
                      $hold1090 = info_fetch_osireport('DSP/CR','OSD ETC','bmdone8'); 
                      echo $insp69 = $hold1089 + $hold1090;  ?></td>
            <td><?php $hold1091 = info_fetch_osireport('SI','OSD ETC','bmdone8');
            $hold1092 = info_fetch_osireport('INSP/LR','OSD ETC','bmdone8'); 
            $hold1093 = info_fetch_osireport('INSP/CR','OSD ETC','bmdone8'); 
            echo $si69 = $hold1091 + $hold1092 + $hold1093;
              ?></td>
            <td><?php $hold1094 = info_fetch_osireport('ASI','OSD ETC','bmdone8'); 
                $hold1095 = info_fetch_osireport('SI/CR','OSD ETC','bmdone8');  
                $hold1096 = info_fetch_osireport('SI/LR','OSD ETC','bmdone8'); 
                echo $asi69=  $hold1094 + $hold1095 + $hold1096; 

             ?></td>
            <td><?php $hold1097 = info_fetch_osireport('HC','OSD ETC','bmdone8');
                    $hold1098 = info_fetch_osireport('ASI/LR','OSD ETC','bmdone8');
                     $hold1099 = info_fetch_osireport('ASI/CR','OSD ETC','bmdone8');
             echo $hc69 = $hold1097 +  $hold1098 + $hold1099;  ?></td>
            <td><?php $hold1100 = info_fetch_osireport('CT','OSD ETC','bmdone8');
                       $hold1101 = info_fetch_osireport('HC/PR','OSD ETC','bmdone8');
                        $hold1102 = info_fetch_osireport('HC/LR','OSD ETC','bmdone8');
                         $hold1103 = info_fetch_osireport('Sr.Const','OSD ETC','bmdone8');
                         $hold1104 = info_fetch_osireport('C-II','OSD ETC','bmdone8');

             echo $ct69= $hold1100 + $hold1101 + $hold1102 + $hold1103 + $hold1104;  ?></td>
            <td><?php echo $insp69 + $si69 + $asi69 + $hc69 + $ct69;  ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo  $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69; ?></td>
                  <td><?php echo  $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69;  ?></td>
                  <td><?php echo $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69;  ?></td>
                  <td><?php echo $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69; ?></td>
                  <td><?php echo $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69;?></td>
                  <td><?php echo  $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69 + $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69 + $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69 + $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69 + $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69; ?>
                   </td>
                </tr>   
  </tbody>

</table>

<table border="0" data-tableName="Test Table 3"><tr><td>&nbsp;</td><td>  <h3> 9. INSTITUTIONS</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>

                          
            <table border="1">
              <tbody>
                <tr>
                  <td>i)</td>
                  <td style="width: 572px">PAP HQRS INSTITUTIONS</td>
                   

                   <td style="width: 40px"><?php $hold1105 = info_fetch_osireports('INSP','','instone4'); 
                      $hold1106 = info_fetch_osireports('DSP/CR','','instone4'); 
                      echo $insp70= $hold1105 + $hold1106;  ?></td>
            <td  style="width: 40px"><?php $hold1107 = info_fetch_osireports('SI','','instone4');
            $hold1108 = info_fetch_osireports('INSP/LR','','instone4'); 
            $hold1109 = info_fetch_osireports('INSP/CR','','instone4'); 
            echo $si70 = $hold1107 + $hold1108 + $hold1109;
              ?></td>
            <td  style="width: 40px"><?php $hold1110 = info_fetch_osireports('ASI','','instone4'); 
                $hold1111 = info_fetch_osireports('SI/CR','','instone4');  
                $hold1112 = info_fetch_osireports('SI/LR','','instone4'); 
                echo $asi70 =  $hold1110 + $hold1111 + $hold1112; 

             ?></td>
            <td  style="width: 40px"><?php $hold1113 = info_fetch_osireports('HC','','instone4');
                    $hold1114 = info_fetch_osireports('ASI/LR','','instone4');
                     $hold1115 = info_fetch_osireports('ASI/CR','','instone4');
             echo $hc70= $hold1113 +  $hold1114 + $hold1115;  ?></td>
            <td  style="width: 40px"><?php $hold1116 = info_fetch_osireports('CT','','instone4');
                       $hold1117 = info_fetch_osireports('HC/PR','','instone4');
                        $hold1118 = info_fetch_osireports('HC/LR','','instone4');
                         $hold1119 = info_fetch_osireports('Sr.Const','','instone4');
                         $hold1120 = info_fetch_osireports('C-II','','instone4');

             echo $ct70= $hold1116 + $hold1117 + $hold1118 + $hold1119 + $hold1120;  ?></td>
            <td  style="width: 40px"><?php echo $insp70 + $si70 + $asi70 + $hc70 + $ct70;  ?></td>

                </tr>

                 <tr>
                  <td>ii)</td>
                  <td>CDO INSTITUTIONS</td>
                  
                           <td><?php $hold1121 = info_fetch_osireport('INSP','CDO Institutions','instone2'); 
                      $hold1122 = info_fetch_osireport('DSP/CR','CDO Institutions','instone2'); 
                      echo $insp71= $hold1121 + $hold1122;  ?></td>
            <td><?php $hold1123 = info_fetch_osireport('SI','CDO Institutions','instone2');
            $hold1124 = info_fetch_osireport('INSP/LR','CDO Institutions','instone2'); 
            $hold1125 = info_fetch_osireport('INSP/CR','CDO Institutions','instone2'); 
            echo $si71 = $hold1123 + $hold1124 + $hold1125;
              ?></td>
            <td><?php $hold1126 = info_fetch_osireport('ASI','CDO Institutions','instone2'); 
                $hold1127 = info_fetch_osireport('SI/CR','CDO Institutions','instone2');  
                $hold1128 = info_fetch_osireport('SI/LR','CDO Institutions','instone2'); 
                echo  $asi71 = $hold1126 + $hold1127 + $hold1128; 

             ?></td>
            <td><?php $hold1129 = info_fetch_osireport('HC','CDO Institutions','instone2');
                    $hold1130 = info_fetch_osireport('ASI/LR','CDO Institutions','instone2');
                     $hold1131 = info_fetch_osireport('ASI/CR','CDO Institutions','instone2');
             echo $hc71= $hold1129 +  $hold1130 + $hold1131;  ?></td>
            <td><?php $hold1132 = info_fetch_osireport('CT','CDO Institutions','instone2');
                       $hold1133 = info_fetch_osireport('HC/PR','CDO Institutions','instone2');
                        $hold1134 = info_fetch_osireport('HC/LR','CDO Institutions','instone2');
                         $hold1135 = info_fetch_osireport('Sr.Const','CDO Institutions','instone2');
                         $hold1136 = info_fetch_osireport('C-II','CDO Institutions','instone2');

             echo $ct71=  $hold1132 + $hold1133 + $hold1134 + $hold1135 + $hold1136;  ?></td>
            <td><?php echo $insp71 + $si71 + $asi71 + $hc71 + $ct71;  ?></td>


            
                </tr>

                 <tr>
                  <td>iii)</td>
                  <td>IRBN. INSTITUTIONS</td>

     
             <td><?php $hold1137 = info_fetch_osireport('INSP','IRB Institutions','instone1'); 
                      $hold1138 = info_fetch_osireport('DSP/CR','IRB Institutions','instone1'); 
                      echo $insp72= $hold1137 + $hold1138;  ?></td>
            <td><?php $hold1139 = info_fetch_osireport('SI','IRB Institutions','instone1');
            $hold1140 = info_fetch_osireport('INSP/LR','IRB Institutions','instone1'); 
            $hold1141 = info_fetch_osireport('INSP/CR','IRB Institutions','instone1'); 
            echo $si72 = $hold1139 + $hold1140 + $hold1141;
              ?></td>
            <td><?php $hold1142 = info_fetch_osireport('ASI','IRB Institutions','instone1'); 
                $hold1143 = info_fetch_osireport('SI/CR','IRB Institutions','instone1');  
                $hold1144 = info_fetch_osireport('SI/LR','IRB Institutions','instone1'); 
                echo $asi72 = $hold1142 + $hold1143 + $hold1144; 

             ?></td>
            <td><?php $hold1145 = info_fetch_osireport('HC','IRB Institutions','instone1');
                    $hold1146 = info_fetch_osireport('ASI/LR','IRB Institutions','instone1');
                     $hold1147 = info_fetch_osireport('ASI/CR','IRB Institutions','instone1');
             echo $hc72= $hold1145 +  $hold1146 + $hold1147;  ?></td>
            <td><?php $hold1148 = info_fetch_osireport('CT','IRB Institutions','instone1');
                       $hold1149 = info_fetch_osireport('HC/PR','IRB Institutions','instone1');
                        $hold1150 = info_fetch_osireport('HC/LR','IRB Institutions','instone1');
                         $hold1151 = info_fetch_osireport('Sr.Const','IRB Institutions','instone1');
                         $hold1152 = info_fetch_osireport('C-II','IRB Institutions','instone1');

             echo $ct72= $hold1148 + $hold1149 + $hold1150 + $hold1151 + $hold1152;  ?></td>
            <td><?php echo $insp72 + $si72 + $asi72 + $hc72 + $ct72;  ?></td>
                </tr>

                 <tr>
                  <td> iv)</td>
                  <td>PAP OUTER BNS. INSTITUTIONS</td>
                 <td><?php $hold1153 = info_fetch_osireport('INSP','PAP Outer Bn Institutions','instone3'); 
                      $hold1154 = info_fetch_osireport('DSP/CR','PAP Outer Bn Institutions','instone3'); 
                      echo $insp73=  $hold1153 + $hold1154;  ?></td>

            <td><?php $hold1155 = info_fetch_osireport('SI','PAP Outer Bn Institutions','instone3');
            $hold1156 = info_fetch_osireport('INSP/LR','PAP Outer Bn Institutions','instone3'); 
            $hold1157 = info_fetch_osireport('INSP/CR','PAP Outer Bn Institutions','instone3'); 
            echo $si73 = $hold1155 + $hold1156 + $hold1157;
              ?></td>

            <td><?php $hold1158 = info_fetch_osireport('ASI','PAP Outer Bn Institutions','instone3'); 
                $hold1159 = info_fetch_osireport('SI/CR','PAP Outer Bn Institutions','instone3');  
                $hold1160 = info_fetch_osireport('SI/LR','PAP Outer Bn Institutions','instone3'); 
                echo $asi73 = $hold1158 + $hold1159 + $hold1160; 

             ?></td>
            <td><?php $hold1161 = info_fetch_osireport('HC','PAP Outer Bn Institutions','instone3');
                    $hold1162 = info_fetch_osireport('ASI/LR','PAP Outer Bn Institutions','instone3');
                     $hold1163 = info_fetch_osireport('ASI/CR','PAP Outer Bn Institutions','instone3');
             echo $hc73= $hold1161 +  $hold1162 + $hold1163;  ?></td>
            <td><?php $hold1164 = info_fetch_osireport('CT','PAP Outer Bn Institutions','instone3');
                       $hold1165 = info_fetch_osireport('HC/PR','PAP Outer Bn Institutions','instone3');
                        $hold1166 = info_fetch_osireport('HC/LR','PAP Outer Bn Institutions','instone3');
                         $hold1167 = info_fetch_osireport('Sr.Const','PAP Outer Bn Institutions','instone3');
                         $hold1168 = info_fetch_osireport('C-II','PAP Outer Bn Institutions','instone3');

             echo  $ct73= $hold1164 + $hold1165 + $hold1166 + $hold1167 + $hold1168;  ?></td>
            <td><?php echo $insp73 + $si73 + $asi73 + $hc73 + $ct73;  ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>TOTAL</td>
                          <td><?php echo  $insp70 + $insp71 + $insp72 + $insp73; ?></td>
                  <td><?php echo  $si70 + $si71 + $si72 + $si73;  ?></td>
                  <td><?php echo $asi70 + $asi71 + $asi72 + $asi73;  ?></td>
                  <td><?php echo $hc70 + $hc71 + $hc72 + $hc73; ?></td>
                  <td><?php echo $ct70 + $ct71 + $ct72 + $ct73;?></td>
                  <td><?php echo  $insp70 + $insp71 + $insp72 + $insp73 + $si70 + $si71 + $si72 + $si73 + $asi70 + $asi71 + $asi72 + $asi73 + $hc70 + $hc71 + $hc72 + $hc73 + $ct70 + $ct71 + $ct72 + $ct73; ?>
                   </td>
                </tr>   

                            <tr>
                  <td></td>
                  <td><strong>GTOTAL</strong></td>
                  <td><?php echo $insp1+$insp2+$insp3+$insp4+$insp5+$insp6+$insp7+$insp8+$insp9+$insp10+$insp11+$insp12+$insp13+$insp14+$insp15+$insp16+$insp17+$insp18+$insp19+$insp20+$insp21+$insp22+$insp23+$insp24+$insp25+$insp26+$insp27+$insp28+$insp29+$insp30+$insp31+$insp32+$insp33+$insp34+$insp35+$insp36+$insp37+$insp38+$insp39+$insp40+$insp41+$insp42+$insp43+$insp44+$insp45+$insp46+$insp47+$insp48+$insp49+$insp50+$insp51+$insp52+$insp53+$insp54+$insp55+$insp56+$insp57+$insp58+$insp59+$insp60+$insp61+$insp62+$insp63+$insp64+$insp65+$insp66+$insp67+$insp68+$insp69+$insp70+$insp71+$insp72+$insp73;  ?></td>
                  <td><?php echo $si1+$si2+$si3+$si4+$si5+$si6+$si7+$si8+$si9+$si10+$si11+$si12+$si13+$si14+$si15+$si16+$si17+$si18+$si19+$si20+$si21+$si22+$si23+$si24+$si25+$si26+$si27+$si28+$si29+$si30+$si31+$si32+$si33+$si34+$si35+$si36+$si37+$si38+$si39+$si40+$si41+$si42+$si43+$si44+$si45+$si46+$si47+$si48+$si49+$si50+$si51+$si52+$si53+$si54+$si55+$si56+$si57+$si58+$si59+$si60+$si61+$si62+$si63+$si64+$si65+$si66+$si67+$si68+$si69+$si70+$si71+$si72+$si73;  ?></td>
                  <td><?php   
                  echo $asi1+$asi2+$asi3+$asi4+$asi5+$asi6+$asi7+$asi8+$asi9+$asi10+$asi11+$asi12+$asi13+$asi14+$asi15+$asi16+$asi17+$asi18+$asi19+$asi20+$asi21+$asi22+$asi23+$asi24+$asi25+$asi26+$asi27+$asi28+$asi29+$asi30+$asi31+$asi32+$asi33+$asi34+$asi35+$asi36+$asi37+$asi38+$asi39+$asi40+$asi41+$asi42+$asi43+$asi44+$asi45+$asi46+$asi47+$asi48+$asi49+$asi50+$asi51+$asi52+$asi53+$asi54+$asi55+$asi56+$asi57+$asi58+$asi59+$asi60+$asi61+$asi62+$asi63+$asi64+$asi65+$asi66+$asi67+$asi68+$asi69+$asi70+$asi71 + $asi72 + $asi73;

                  ?></td>
                  <td><?php echo $hc1+$hc2+$hc3+$hc4+$hc5+$hc6+$hc7+$hc8+$hc9+$hc10+$hc11+$hc12+$hc13+$hc14+$hc15+$hc16+$hc17+$hc18+$hc19+$hc20+$hc21+$hc22+$hc23+$hc24+$hc25+$hc26+$hc27+$hc28+$hc29+$hc30+$hc31+$hc32+$hc33+$hc34+$hc35+$hc36+$hc37+$hc38+$hc39+$hc40+$hc41+$hc42+$hc43+$hc44+$hc45+$hc46+$hc47+$hc48+$hc49+$hc50+$hc51+$hc52+$hc53+$hc54+$hc55+$hc56+$hc57+$hc58+$hc59+$hc60+$hc61+$hc62+$hc63+$hc64+$hc65+$hc66+$hc67+$hc68+$hc69+$hc70+$hc71+$hc72+$hc73; ?></td>
                  <td><?php echo 
                     $ct1+$ct2+$ct3+$ct4+$ct5+$ct6+$ct7+$ct8+$ct9+$ct10+$ct11+$ct12+$ct13+$ct14+$ct15+$ct16+$ct17+$ct18+$ct19+$ct20+$ct21+$ct22+$ct23+$ct24+$ct25+$ct26+$ct27+$ct28+$ct29+$ct30+$ct31+$ct32+$ct33+$ct34+$ct35+$ct36+$ct37+$ct38+$ct39+$ct40+$ct41+$ct42+$ct43+$ct44+$ct45+$ct46+$ct47+$ct48+$ct49+$ct50+$ct51+$ct52+$ct53+$ct54+$ct55+$ct56+$ct57+$ct58+$ct59+$ct60+$ct61+$ct62+$ct63+$ct64+$ct65+$ct66+$ct67+$ct68+$ct69+$ct70+$ct71+$ct72 + $ct73; ?></td>
                  <td><strong><?php echo $insp1 + $insp2 + $insp3 + $insp4 + $insp5 + $insp6 + $insp7 + $insp8 + $insp9 + $insp10 + $insp11 + $insp12 +  $si1 + $si2 + $si3 + $si4 + $si5 + $si6 + $si7 + $si8 + $si9 + $si10 + $si11 + $si12 + $asi1 + $asi2 + $asi3 + $asi4 + $asi5 + $asi6 + $asi7 + $asi8 + $asi9 + $asi10 + $asi11 + $asi12 + $hc1 + $hc2 + $hc3 + $hc4 + $hc5 + $hc6 + $hc7 + $hc8 + $hc9 + $hc10 + $hc11 + $hc12 + $ct1 + $ct2 + $ct3 + $ct4 + $ct5 + $ct6 + $ct7 + $ct8 + $ct9 + $ct10 + $ct11 + $ct12 + $insp13 + $insp14 + $insp15 + $si13 + $si14 + $si15 + $asi13 + $asi14 + $asi15 + $hc13 + $hc14 + $hc15 + $ct13 + $ct14 + $ct15 + $insp16 + $insp17 + $insp18 + $insp19 + $insp20 + $insp21 + $si16 + $si17 + $si18 + $si19 + $si20 + $si21 + $asi16 + $asi17 + $asi18 + $asi19 + $asi20 + $asi21 + $hc16 + $hc17 + $hc18 + $hc19 + $hc20 + $hc21 + $ct16 + $ct17 + $ct18 + $ct19 +  $ct20 + $ct21 + $insp22 + $insp23 + $insp24 + $insp25 + $insp26 + $insp27 + $insp28 + $insp29 + $insp30 + $insp31 + $insp32 + $insp33 + $insp34 + $insp35 + $insp36 + $insp37 + $insp38 + $insp39 + $insp40 + $insp41 + $insp42 + $si22 + $si23 + $si24 + $si25 + $si26 + $si27 + $si28 + $si29 + $si30 + $si31 + $si32 + $si33 + $si34 + $si35 + $si36 + $si37 + $si38 + $si39 + $si40 + $si41 + $si42 + $asi22 + $asi23 + $asi24 + $asi25 + $asi26 + $asi27 + $asi28 + $asi29 + $asi30 + $asi31 + $asi32 + $asi33 + $asi34 + $asi35 + $asi36 + $asi37 + $asi38 + $asi39 + $asi40 + $asi41 + $asi42 + $hc22 + $hc23 + $hc24 + $hc25 + $hc26 + $hc27 + $hc28 + $hc29 + $hc30 + $hc31 + $hc32 + $hc33 + $hc34 + $hc35 + $hc36 + $hc37 + $hc38 + $hc39 + $hc40 + $hc41 + $hc42 + $ct22 + $ct23 + $ct24 + $ct25 +  $ct26 + $ct27 + $ct28 + $ct29 + $ct30 + $ct31 + $ct32  + $ct33 + $ct34 + $ct35 + $ct36 + $ct37 + $ct38 + $ct39 + $ct40 + $ct41 + $ct42 + $insp43 + $insp44 + $insp45 + $si43 + $si44 + $si45 + $asi43 + $asi44 + $asi45 + $hc43 + $hc44 + $hc45 + $ct43 + $ct44 + $ct45 +  $insp46 + $insp47 + $insp48 + $insp49 + $si46 + $si47 + $si48 + $si49 + $asi46 +  $asi47 + $asi48 + $asi49 + $hc46 + $hc47 + $hc48 + $hc49 + $ct46 + $ct47 + $ct48 + $ct49 + $insp50 + $insp51 + $insp52 + $insp53 + $insp54 + $insp55 + $insp56 + $insp57 +$insp58 + $insp59 +$insp60 + $si50 + $si51 + $si52 + $si53 + $si54 + $si55 + $si56 + $si57 + $si58 + $si59 +$si60 + $asi50 +  $asi51 + $asi52 + $asi53 + $asi54 + $asi55 + $asi56 + $asi57 + $asi58 + $asi59 + $asi60 + $hc50 + $hc51 + $hc52 + $hc53 + $hc54 + $hc55 + $hc56 + $hc57 + $hc58 + $hc59 +$hc60 + $ct50 + $ct51 + $ct52 + $ct53 + $ct54 + $ct55 + $ct56 + $ct57 + $ct58 + $ct59 + $ct60 + $insp61 + $insp62 + $insp63 + $insp64 + $insp65 + $insp66 + $insp67 +$insp68 + $insp69 + $si61 + $si62 + $si63 + $si64 + $si65 + $si66 + $si67 + $si68 + $si69 + $asi61 + $asi62 + $asi63 + $asi64 + $asi65 + $asi66 + $asi67 + $asi68 + $asi69 + $hc61 + $hc62 + $hc63 + $hc64 + $hc65 + $hc66 + $hc67 + $hc68 + $hc69 + $ct61 + $ct62 + $ct63 + $ct64 + $ct65 + $ct66 + $ct67 + $ct68 + $ct69 + $insp70 + $insp71 + $insp72 + $insp73 + $si70 + $si71 + $si72 + $si73 + $asi70 + $asi71 + $asi72 + $asi73 + $hc70 + $hc71 + $hc72 + $hc73 + $ct70 + $ct71 + $ct72 + $ct73;

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