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
          <div >
          <h3>DEPLOYMENT STATEMENT OF.................................. BATTALIONS</h3>
            <table border="2">
              <thead>
                 <tr>
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
                  <td style="width: 570px">SANCTIONED STRENGTH</td>
                  <td style="width: 50px"> <?php $hold1 = fetchoneinfo('osi_san',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; echo $sanpart1 =$h1;
            }  ?> </td>
            <td style="width: 50px"><?php $hold3 = fetchoneinfo('osi_san',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_san',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_san',array('rank' => 'INSP/CR'));


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
            <td style="width: 50px"><?php $hold6 = fetchoneinfo('osi_san',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_san',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_san',array('rank' => 'SI/LR'));


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
            <td style="width: 50px"><?php $hold9 = fetchoneinfo('osi_san',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_san',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_san',array('rank' => 'ASI/CR'));

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
            <td style="width: 50px"><?php $hold12 = fetchoneinfo('osi_san',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_san',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_san',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_san',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_san',array('rank' => 'C-II'));

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
                  <td>VACANCIES</td>
                   <td> <?php $hold1 = fetchoneinfo('osi_van',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $sanpar1 =  $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_van',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_van',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_van',array('rank' => 'INSP/CR'));


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
            <td><?php $hold6 = fetchoneinfo('osi_van',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_van',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_van',array('rank' => 'SI/LR'));


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
            <td><?php $hold9 = fetchoneinfo('osi_van',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_van',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_van',array('rank' => 'ASI/CR'));

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
            <td><?php $hold12 = fetchoneinfo('osi_van',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_van',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_van',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_van',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_van',array('rank' => 'C-II'));

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
                  <td> &nbsp;</td>
                   <td> &nbsp; </td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
            <td> &nbsp;</td>
                </tr>

                 <tr>
                  <td>POSTED STRENGTH</td>
                  <td><?php echo $sanpart1 - $sanpar1;  ?></td>
            <td><?php echo $sanpart2 - $sanpar1;  ?></td>
            <td><?php echo $sanpart3 - $sanpar3;  ?></td>
            <td><?php echo $sanpart4 - $sanpar4;  ?></td>
            <td><?php echo $sanpart5 - $sanpar5;  ?></td>
            <td><?php echo $sanpart6 - $sanpar6;  ?></td>
                </tr>

                 <tr>
                  <td>FORMAL ORDER NOT ISSUED</td>
                   <td> <?php $hold1 = fetchoneinfo('osi_foni',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_foni',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_foni',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_foni',array('rank' => 'INSP/CR'));


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

            echo $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = fetchoneinfo('osi_foni',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_foni',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_foni',array('rank' => 'SI/LR'));


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
                echo $asi1 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = fetchoneinfo('osi_foni',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_foni',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_foni',array('rank' => 'ASI/CR'));

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

             echo $hc1 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = fetchoneinfo('osi_foni',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_foni',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_foni',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_foni',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_foni',array('rank' => 'C-II'));

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
             echo $ct1 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                  <td>POSTED FOR PAY PURPOSE</td>
                        <td> <?php $hold1 = fetchoneinfo('osi_pfpp',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_pfpp',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_pfpp',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_pfpp',array('rank' => 'INSP/CR'));


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

            echo $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = fetchoneinfo('osi_pfpp',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_pfpp',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_pfpp',array('rank' => 'SI/LR'));


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
                echo $asi1 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = fetchoneinfo('osi_pfpp',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_pfpp',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_pfpp',array('rank' => 'ASI/CR'));

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

             echo $hc1 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = fetchoneinfo('osi_pfpp',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_pfpp',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_pfpp',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_pfpp',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_pfpp',array('rank' => 'C-II'));

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
             echo $ct1 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                  <td>NOT REPORTED</td>
                        <td> <?php $hold1 = fetchoneinfo('osi_nor',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_nor',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_nor',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_nor',array('rank' => 'INSP/CR'));


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

            echo $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = fetchoneinfo('osi_nor',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_nor',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_nor',array('rank' => 'SI/LR'));


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
                echo $asi1 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = fetchoneinfo('osi_nor',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_nor',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_nor',array('rank' => 'ASI/CR'));

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

             echo $hc1 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = fetchoneinfo('osi_nor',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_nor',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_nor',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_nor',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_nor',array('rank' => 'C-II'));

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
             echo $ct1 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>
                </tr>

                 <tr>
                  <td>NOT RELIEVED</td>
                 <td> <?php $hold1 = fetchoneinfo('osi_nord',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_nord',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_nord',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_nord',array('rank' => 'INSP/CR'));


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

            echo $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = fetchoneinfo('osi_nord',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_nord',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_nord',array('rank' => 'SI/LR'));


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
                echo $asi1 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = fetchoneinfo('osi_nord',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_nord',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_nord',array('rank' => 'ASI/CR'));

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

             echo $hc1 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = fetchoneinfo('osi_nord',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_nord',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_nord',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_nord',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_nord',array('rank' => 'C-II'));

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
             echo $ct1 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>                </tr>

                 <tr>
                  <td>EXCESS ATTACHED</td>
                  <td> <?php $hold1 = fetchoneinfo('osi_ea',array('rank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; 
            } echo $h1; ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_ea',array('rank' => 'SI')); 
            $hold4 = fetchoneinfo('osi_ea',array('rank' => 'INSP/LR'));
            $hold5 = fetchoneinfo('osi_ea',array('rank' => 'INSP/CR'));


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

            echo $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = fetchoneinfo('osi_ea',array('rank' => 'ASI'));
                $hold7 = fetchoneinfo('osi_ea',array('rank' => 'SI/CR'));
                $hold8 = fetchoneinfo('osi_ea',array('rank' => 'SI/LR'));


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
                echo $asi1 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = fetchoneinfo('osi_ea',array('rank' => 'HC')); 
                    $hold10 = fetchoneinfo('osi_ea',array('rank' => 'ASI/LR')); 
                     $hold11 = fetchoneinfo('osi_ea',array('rank' => 'ASI/CR'));

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

             echo $hc1 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = fetchoneinfo('osi_ea',array('rank' => 'CT'));
                       $hold13 = fetchoneinfo('osi_ea',array('rank' => 'HC/PR'));
                        $hold14 = fetchoneinfo('osi_ea',array('rank' => 'HC/LR')); 
                         $hold15 = fetchoneinfo('osi_ea',array('rank' => 'Sr.Const')); 
                         $hold16 = fetchoneinfo('osi_ea',array('rank' => 'C-II'));

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
             echo $ct1 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo  $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td> 
                </tr>

                 <tr>
                  <td>ACTUAL POSTED</td>
                   <td><?php $hold1 = info_fetch_osireportsd('INSP'); 
                      $hold2 = info_fetch_osireportsd('DSP/CR'); 
                      echo $insp9 = $hold1 + $hold2;  ?></td>
            <td><?php $hold3 = info_fetch_osireportsd('SI');
            $hold4 = info_fetch_osireportsd('INSP/LR'); 
            $hold5 = info_fetch_osireportsd('INSP/CR'); 
            echo $si9 = $hold3 + $hold4 + $hold5;
              ?></td>
            <td><?php $hold6 = info_fetch_osireportsd('ASI'); 
                $hold7 = info_fetch_osireportsd('SI/CR');  
                $hold8 = info_fetch_osireportsd('SI/LR'); 
                echo $asi9 = $hold6 + $hold7 + $hold8; 

             ?></td>
            <td><?php $hold9 = info_fetch_osireportsd('HC');
                    $hold10 = info_fetch_osireportsd('ASI/LR');
                     $hold11 = info_fetch_osireportsd('ASI/CR');
             echo $hc9 = $hold9 +  $hold10 + $hold11;  ?></td>
            <td><?php $hold12 = info_fetch_osireportsd('CT');
                       $hold13 = info_fetch_osireportsd('HC/PR');
                        $hold14 = info_fetch_osireportsd('HC/LR');
                         $hold15 = info_fetch_osireportsd('Sr.Const');
                         $hold16 = info_fetch_osireportsd('C-II');

             echo $ct9= $hold12 + $hold13 + $hold14 + $hold15 + $hold16;  ?></td>
            <td><?php echo $hold1 + $hold2 + $hold3 + $hold4 + $hold5 + $hold6 + $hold7 + $hold8 + $hold9 + $hold10 + $hold11 + $hold12 + $hold13 + $hold14 + $hold15 + $hold16 ;  ?></td>
                </tr>
              </tbody>
           </table>
              </tbody>
           </table>
          </div><!-- table-responsive -->  </div></div>
          
</body>
</html>