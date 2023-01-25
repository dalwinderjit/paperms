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
  &nbsp; &nbsp; &nbsp; <button type="button" id="excel">Export to excel</button>
  <a href="<?php echo base_url('bt-osireportone'); ?>">Go Back</a>
</div>
            <?php  $posstrength1 = $this->session->userdata('g1');  ?>
            <?php  $posstrength2 = $this->session->userdata('g2');  ?>
            <?php  $posstrength3 = $this->session->userdata('g3');  ?>
            <?php  $posstrength4 = $this->session->userdata('g4');  ?>
            <?php  $posstrength5 = $this->session->userdata('g5'); ?>
            <?php  $posstrength6 = $this->session->userdata('g6');  ?>
          <div class="col-lg-10 col-xs-offset-2"><br/>
       <table border="0"  data-tableName="Test Table 1"><tr><td>&nbsp;</td><td><h3>DEPLOYMENT STATEMENT OF <?php $a = explode('.',$this->session->userdata('username')); echo $a[0]; ?> PAP BATTALION</h3></td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td> </tr></table>
            <table width="920" border="1"  data-tableName="Test Table 2">
              <thead>
                 <tr>
                 <th width="30"></th>
                    <th width="574"></th>
                    <th width="48">INSPR</th>
                    <th width="39">SI</th>
                    <th width="38">ASI </th>
                    <th width="42">HC</th>
                    <th width="44">CT</th>
                    <th width="53">TOTAL</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                <td>&nbsp; </td>
                  <td>SANCTIONED STRENGTH</td>
                  <td> <?php $hold1 = fetchoneinfo('osi_san',array('rank' => 'INSP','bat_id' => $this->session->userdata('userid')));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1->san; echo $sanpart1 =$h1;
            }else{
               echo $sanpart1 = 0;
              }  ?> </td>
            <td><?php $hold3 = fetchoneinfo('osi_san',array('rank' => 'SI','bat_id' => $this->session->userdata('userid'))); 
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
            <td><?php $hold6 = fetchoneinfo('osi_san',array('rank' => 'ASI','bat_id' => $this->session->userdata('userid')));
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
            <td><?php $hold9 = fetchoneinfo('osi_san',array('rank' => 'HC','bat_id' => $this->session->userdata('userid'))); 
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
            <td><?php $hold12 = fetchoneinfo('osi_san',array('rank' => 'CT','bat_id' => $this->session->userdata('userid')));
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
                    <td>     
                          <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP')); 
                                       $h1 = ''; 
                            if($hold1 != ''){
                              $h1 .= $hold1; 
                            }else{
                              $h1 .= 0; 
                              } $exa1 =  $h1; ?>
                                
                              <?php $hold1 = info_fetch_updepden('INSP');
                                       $h1 = '';
                            if($hold1 != ''){
                              $h1 .= $hold1; 
                            }else{
                              $h1 .= 0; 
                              } $notreli1 = $h1; ?>

                            <?php $hold1 = info_fetch_updepdenli('INSP');
                                       $h1 = '';
                            if($hold1 != ''){
                              $h1 .= $hold1; 
                            }else{
                              $h1 .= 0; 
                              } $notrep1 =  $h1; ?>

                              <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'INSP'));
                                       $h1 = '';
                            if($hold1 != ''){
                              $h1 .= $hold1; 
                            }else{
                              $h1 .= 0; 
                              } $pfpp1 =  $h1; ?>

                              <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'INSP'));
                                       $h1 = '';
                            if($hold1 != ''){
                              $h1 .= $hold1; 
                            }else{
                              $h1 .= 0; 
                              }  $foni1 = $h1;

                              $osi1 = $posstrength1 - $exa1 - $notreli1 + $notrep1 + $pfpp1 + $foni1;
                              echo $ois1 =  $sanpart1 - $osi1;
                               ?>


                    </td>
                    
                    <td> 
                          <?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI')); 
                            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP/LR'));
                            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP/CR'));


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

                             $exa2 =$h3 + $h4  + $h5;
                         
                              ?>
                              <?php $hold3 = info_fetch_updepden('SI'); 
                            $hold4 = info_fetch_updepden('INSP/LR');
                            $hold5 = info_fetch_updepden('INSP/CR');

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

                             $notreli2 =  $h3 + $h4  + $h5;
                         
                              ?>

                              <?php $hold3 = info_fetch_updepdenli('SI'); 
                            $hold4 = info_fetch_updepdenli('INSP/LR');
                            $hold5 = info_fetch_updepdenli('INSP/CR');

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

                             $notrep2 = $h3 + $h4  + $h5;
                         
                              ?>

                              <?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'SI')); 
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

                             $pfpp2 = $h3 + $h4  + $h5;
                         
                              ?>

                              <?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'SI')); 
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

                             $foni2 = $h3 + $h4  + $h5;  ?>  

                             <?php
               $osi2 = $posstrength2 - $exa2 - $notreli2 + $notrep2 + $pfpp2 + $foni2;

               echo $ois2 =   $sanpart2 - $osi2;
              ?>          
                    </td>

                    <td>
                          <?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI'));
                              $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI/CR'));
                              $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI/LR'));


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
                           $exa3 = $asi1 = $h6 + $h7 + $h8; 

                           ?>
                             
                           <?php $hold6 = info_fetch_updepden('ASI');
                              $hold7 = info_fetch_updepden('SI/CR');
                              $hold8 = info_fetch_updepden('SI/LR');


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
                             $notreli3 = $h6 + $h7 + $h8; 

                           ?>

                           <?php $hold6 = info_fetch_updepdenli('ASI');
                              $hold7 = info_fetch_updepdenli('SI/CR');
                              $hold8 = info_fetch_updepdenli('SI/LR');


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
                             $notrep3 = $h6 + $h7 + $h8; 

                           ?>

                           <?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' =>  'ASI'));
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
                             $pfpp3 = $h6 + $h7 + $h8; 

                           ?>

                           <?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'ASI'));
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
                           $foni3 =  $h6 + $h7 + $h8; 

                           ?> 

                           <?php $osi3 = $posstrength3 - $exa3 - $notreli3 + $notrep3 + $pfpp3 + $foni3; echo $ois3 = $sanpart3 - $osi3;  ?>      
                    </td>

                    <td> 
                         <?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC')); 
                                            $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI/LR')); 
                                             $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI/CR'));

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

                                      $exa4 = $h9 +  $h10 + $h11;  ?>

                                     <?php $hold9 = info_fetch_updepden('HC'); 
                                            $hold10 = info_fetch_updepden('ASI/LR'); 
                                             $hold11 = info_fetch_updepden('ASI/CR');

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

                                      $notreli4 = $h9 +  $h10 + $h11;  ?>

                                     <?php $hold9 = info_fetch_updepdenli('HC'); 
                                            $hold10 = info_fetch_updepdenli('ASI/LR'); 
                                             $hold11 = info_fetch_updepdenli('ASI/CR');

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

                                  $notrep4 = $h9 +  $h10 + $h11;  ?>

                                     <?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'HC')); 
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

                                     $pfpp4 = $h9 +  $h10 + $h11;  ?>

                                     <?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'HC')); 
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

                                     $foni4 =  $h9 +  $h10 + $h11;  ?> 
                                     <?php  $osi4 = $posstrength4 - $exa4 - $notreli4 + $notrep4 + $pfpp4 + $foni4; echo  $ois4 =  $sanpart4 - $osi4;?>                      
                    </td>

                    <td>
                                                <?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment ', 'cexrank' => 'CT'));
                                           $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC/PR'));
                                            $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC/LR')); 
                                             $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'Sr.Const')); 
                                             $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'C-II'));

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
                                           $exa5= $h12 + $h13 + $h14 + $h15 + $h16;  ?>

                                           <?php $hold12 = info_fetch_updepden('CT');
                                                     $hold13 = info_fetch_updepden('HC/PR');
                                                      $hold14 = info_fetch_updepden( 'HC/LR'); 
                                                       $hold15 = info_fetch_updepden('Sr.Const'); 
                                                       $hold16 = info_fetch_updepden('C-II');

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
                                           $notreli5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?>

                                           <?php $hold12 = info_fetch_updepdenli('CT');
                                                     $hold13 = info_fetch_updepdenli('HC/PR');
                                                      $hold14 = info_fetch_updepdenli('HC/LR'); 
                                                       $hold15 = info_fetch_updepdenli('Sr.Const'); 
                                                       $hold16 = info_fetch_updepdenli('C-II');

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
                                           $notrep5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?>

                                           <?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'CT'));
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
                                           $pfpp5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?>


                                           <?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Formal Order Not Issued', 'cexrank' => 'CT'));
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
                                      $foni5 =  $h12 + $h13 + $h14 + $h15 + $h16;

                                       ?><?php $osi5 = $posstrength5 - $exa5 - $notreli5 + $notrep5 + $pfpp5 + $foni5;
                                       echo  $ois5 =  $sanpart5 - $osi5; ?>
                      </td>

            <td> <?php echo $ois1 + $ois2 + $ois3 + $ois4 + $ois5;?></td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>&nbsp; </td>
                   <td>&nbsp;  </td>
            <td>&nbsp; </td>
            <td>&nbsp; </td>
            <td>&nbsp; </td>
            <td>&nbsp; </td>
            <td>&nbsp; </td>
                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>POSTED STRENGTH</td>
                  <td>
              <?php echo $osi1;?>
              </td>
              <!-- 2ND -->
              <td>
               <?php
              echo $osi2;
              ?>
              </td>

              <!-- 3rd -->

              <td>
          <?php echo $osi3;?>
             </td>

             <!-- 4rth -->
             <td>
               

             <?php echo $osi4;?>
             </td>
             <!-- 5TH -->
             <td>
               
             <?php echo $osi5;?>
             </td>

             <!-- 6TH -->

             <td>
               <?php echo $osi1 + $osi2 + $osi3 + $osi4 + $osi5;  ?>

             </td>
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

                        $dr = info_fetch_updep('newosi',array('inductionmode' => 'Transfer Pay Purpose', 'cexrank' => 'DSP/CR'));

                       $h1 = ''; $dr1 = '';
            if($hold1 != '' ){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              }
                if($dr !=''){
                  $dr1 .= $dr;
                }

               echo $pfpp1 =  $h1+ $dr1; ?> </td>
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
                        <td> <?php $hold1 = info_fetch_updepdenli('INSP');
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $notrep1 =  $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updepdenli('SI'); 
            $hold4 = info_fetch_updepdenli('INSP/LR');
            $hold5 = info_fetch_updepdenli('INSP/CR');

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
            <td><?php $hold6 = info_fetch_updepdenli('ASI');
                $hold7 = info_fetch_updepdenli('SI/CR');
                $hold8 = info_fetch_updepdenli('SI/LR');


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
            <td><?php $hold9 = info_fetch_updepdenli('HC'); 
                    $hold10 = info_fetch_updepdenli('ASI/LR'); 
                     $hold11 = info_fetch_updepdenli('ASI/CR');

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
            <td><?php $hold12 = info_fetch_updepdenli('CT');
                       $hold13 = info_fetch_updepdenli('HC/PR');
                        $hold14 = info_fetch_updepdenli('HC/LR'); 
                         $hold15 = info_fetch_updepdenli('Sr.Const'); 
                         $hold16 = info_fetch_updepdenli('C-II');

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
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $notreli1 = $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updepden('SI'); 
            $hold4 = info_fetch_updepden('INSP/LR');
            $hold5 = info_fetch_updepden('INSP/CR');

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

            echo $notreli2 =  $h3 + $h4  + $h5;
         
              ?></td>
            <td><?php $hold6 = info_fetch_updepden('ASI');
                $hold7 = info_fetch_updepden('SI/CR');
                $hold8 = info_fetch_updepden('SI/LR');


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
                echo $notreli3 = $h6 + $h7 + $h8; 

             ?></td>
            <td><?php $hold9 = info_fetch_updepden('HC'); 
                    $hold10 = info_fetch_updepden('ASI/LR'); 
                     $hold11 = info_fetch_updepden('ASI/CR');

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

             echo $notreli4 = $h9 +  $h10 + $h11;  ?></td>
            <td><?php $hold12 = info_fetch_updepden('CT');
                       $hold13 = info_fetch_updepden('HC/PR');
                        $hold14 = info_fetch_updepden( 'HC/LR'); 
                         $hold15 = info_fetch_updepden('Sr.Const'); 
                         $hold16 = info_fetch_updepden('C-II');

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
             echo $notreli5 = $h12 + $h13 + $h14 + $h15 + $h16;  ?></td>
            <td><?php echo $notreli6 = $h1 + $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12+ $h13+ $h14+ $h15+ $h16;  ?></td>                </tr>

                 <tr>
                 <td>&nbsp;</td>
                  <td>EXCESS ATTACHED</td>
                  <td> <?php $hold1 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP'));
                       $h1 = '';
            if($hold1 != ''){
              $h1 .= $hold1; 
            }else{
              $h1 .= 0; 
              } echo $exa1 =  $h1; ?> </td>
            <td><?php $hold3 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI')); 
            $hold4 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP/LR'));
            $hold5 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'INSP/CR'));


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
            <td><?php $hold6 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI'));
                $hold7 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI/CR'));
                $hold8 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'SI/LR'));


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
            <td><?php $hold9 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC')); 
                    $hold10 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI/LR')); 
                     $hold11 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'ASI/CR'));

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
            <td><?php $hold12 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'CT'));
                       $hold13 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC/PR'));
                        $hold14 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'HC/LR')); 
                         $hold15 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'Sr.Const')); 
                         $hold16 = info_fetch_updep('newosi',array('inductionmode' => 'Attachment', 'cexrank' => 'C-II'));

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
                   <td><?php echo $posstrength1;  ?></td>
                    <td><?php echo $posstrength2;  ?></td>
                    <td><?php echo $posstrength3;  ?></td>
                    <td><?php echo $posstrength4;  ?></td>
                    <td><?php echo $posstrength5;  ?></td>
                    <td><?php echo $posstrength6;  ?></td>
                </tr>
              </tbody>
               <tfoot>
                <tr>
                  <td colspan="8">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
              
          <div>
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