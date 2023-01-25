           <table border="1">
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
                  <td>SANCTIONED STRENGTH</td>
                  <td  style="width: 40px"><?php $san1 = info_fetch_osireportsan('INSP'); 
                      $san2 = info_fetch_osireportsan('DSP/CR'); 
                      echo $sans1 = $san1->san + $san2->san;  ?></td>
            <td style="width: 40px"><?php $san3 = info_fetch_osireportsan('SI');
            $san4 = info_fetch_osireportsan('INSP/LR'); 
            $san5 = info_fetch_osireportsan('INSP/CR'); 
            echo $sans2 = $san3->san + $san4->san + $san5->san;
              ?></td>
            <td  style="width: 40px"><?php $san6 = info_fetch_osireportsan('ASI'); 
                $san7 = info_fetch_osireportsan('SI/CR');  
                $san8 = info_fetch_osireportsan('SI/LR'); 
                echo $sans3 = $san6->san + $san7->san + $san8->san; 
             ?></td>
            <td  style="width: 40px"><?php $san9 = info_fetch_osireportsan('HC');
                    $san10 = info_fetch_osireportsan('ASI/LR');
                     $san11 = info_fetch_osireportsan('ASI/CR');
             echo $sans4 = $san9->san +  $san10->san + $san11->san;  ?></td>
            <td  style="width: 40px"><?php $san12 = info_fetch_osireportsan('CT');
                       $san13 = info_fetch_osireportsan('HC/PR');
                        $san14 = info_fetch_osireportsan('HC/LR');
                         $san15 = info_fetch_osireportsan('Sr.Const');
                         $san16 = info_fetch_osireportsan('C-II');

             echo $sans5 = $san12->san + $san13->san + $san14->san + $san15->san + $san16->san;  ?></td>
            <td><?php echo $sans1 +  $sans2 + $sans3 + $sans4 + $sans5;  ?></td>
                </tr>

            <tr>
                  <td style="width: 570px">VACANCIES</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">POSTED STRENGTH</td>
                  <td  style="width: 40px"><?php $post1 = info_fetch_pposting('INSP'); 
                      $post2 = info_fetch_pposting('DSP/CR'); 
                      echo $posti1 = $post1 + $post2;  ?></td>
            <td style="width: 40px"><?php $post3 = info_fetch_pposting('SI');
            $post4 = info_fetch_pposting('INSP/LR'); 
            $post5 = info_fetch_pposting('INSP/CR'); 
            echo $posti2 = $post3 + $post4 + $post5;
              ?></td>
            <td  style="width: 40px"><?php $post6 = info_fetch_pposting('ASI'); 
                $post7 = info_fetch_pposting('SI/CR');  
                $post8 = info_fetch_pposting('SI/LR'); 
                echo $posti3 = $post6 + $post7 + $post8; 
             ?></td>
            <td  style="width: 40px"><?php $post9 = info_fetch_pposting('HC');
                    $post10 = info_fetch_pposting('ASI/LR');
                     $post11 = info_fetch_pposting('ASI/CR');
             echo $posti4 = $post9 +  $post10 + $post11;  ?></td>
            <td  style="width: 40px"><?php $post12 = info_fetch_pposting('CT');
                       $post13 = info_fetch_pposting('HC/PR');
                        $post14 = info_fetch_pposting('HC/LR');
                         $post15 = info_fetch_pposting('Sr.Const');
                         $post16 = info_fetch_pposting('C-II');

             echo $posti5 = $post12 + $post13 + $post14 + $post15 + $post16;  ?></td>
            <td><?php echo $posti1 +  $posti2 + $posti3 + $posti4 + $posti5;  ?></td>
                </tr>

            <tr>
                  <td style="width: 570px">FORMAL ORDER NOT ISSUED</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">POSTED FOR PAY PURPOSE</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">NOT REPORTED</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">NOT RELIEVED</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">EXCESS ATTACHED</td>
                  <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>

            <tr>
                  <td style="width: 570px">ACTUAL POSTED</td>
                   <td  style="width: 40px"></td>
            <td style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
            <td  style="width: 40px"></td>
                </tr>


          </tbody></table>