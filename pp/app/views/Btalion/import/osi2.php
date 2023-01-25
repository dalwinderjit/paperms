<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
            <table>
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Battalion/Unit</th>
                    <th>Name</th>
                    <th>Present Rank</th>
                    <th>Dept. No </th>
                    <th>Type of Duty</th>
                    <th>Gender</th>
                    <th>Present Posting</th>
                    <th>Posting Details</th>
                    <th>Date Of Posting</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php if($value->bunitdistrict ==''){
                      $bats = fetchoneinfo('users',array('users_id' => $value->bat_id)); echo $bats->nick; 
                       }else{
                        $value->bunitdistrict; 
                       }   ?></td>
                    <td> <?php echo $value->name; ?></td>
                    <td><?php echo $value->cexrank.$value->cminirank.$value->cmedirank.$value->ccprank.$value->cccrank; ?></td>
                    <td><?php echo $value->depttno; ?></td>
                    <td><?php echo $value->typeofduty; ?></td>
                    <td><?php echo $value->gender; ?></td>
                    <td>
                        <?php 
                        $userd = fetchoneinfo('newosip',array('man_id' => $value->man_id));
                        if($userd !=''){
                        ?>
                    

                    <?php echo $userd->fone1; ?> <?php echo $userd->fone2; ?><?php echo $userd->fone3; ?><?php echo $userd->fone4; ?><?php echo $userd->fone5; ?><?php echo $userd->fone6; ?><?php echo $userd->fone7; ?><?php echo $userd->fone8; ?><?php echo $userd->fone9; ?><?php echo $userd->fone10; ?><?php echo $userd->fone11; ?><?php echo $userd->fone12; ?><?php echo $userd->lone1; ?><?php echo $userd->lone2; ?><?php echo $userd->lone3; ?><?php echo $userd->sqone1; ?><?php echo $userd->sqone2; ?><?php echo $userd->sqone3; ?><?php echo $userd->sqone4; ?><?php echo $userd->sqone5; ?><?php echo $userd->sqone6; ?><?php echo $userd->sqone7; ?><?php echo $userd->paone1; ?><?php echo $userd->paone2; ?><?php echo $userd->paone3; ?><?php echo $userd->paone4; ?><?php echo $userd->paone5; ?><?php echo $userd->paone6; ?><?php echo $userd->paone7; ?><?php echo $userd->paone8; ?><?php echo $userd->paone9; ?><?php echo $userd->paone10; ?><?php echo $userd->paone11; ?><?php echo $userd->paone12; ?><?php echo $userd->paone13; ?><?php echo $userd->paone14; ?><?php echo $userd->paone15; ?><?php echo $userd->paone16; ?><?php echo $userd->paone17; ?><?php echo $userd->paone18; ?><?php echo $userd->paone19; ?><?php echo $userd->paone20; ?><?php echo $userd->paone21; ?><?php echo $userd->paone22; ?><?php echo $userd->paone23; ?><?php echo $userd->paone24; ?><?php echo $userd->paone27; ?><?php echo $userd->traning1; ?><?php echo $userd->traning2; ?><?php echo $userd->traning3; ?><?php echo $userd->ssone23; ?><?php echo $userd->ssone24; ?><?php echo $userd->ssone25; ?><?php echo $userd->ssone26; ?><?php echo $userd->awbone1; ?><?php echo $userd->awbone2; ?><?php echo $userd->awbone3; ?><?php echo $userd->awbone4; ?><?php echo $userd->awbone5; ?><?php echo $userd->awbone6; ?><?php echo $userd->awbone7; ?><?php echo $userd->awbone8; ?><?php echo $userd->awbone9; ?><?php echo $userd->awbone10; ?><?php echo $userd->awbone11; ?><?php echo $userd->awbone12; ?><?php echo $userd->awbone13; ?><?php echo $userd->bmdone1; ?><?php echo $userd->bmdone2; ?><?php echo $userd->bmdone3; ?><?php echo $userd->bmdone4; ?><?php echo $userd->bmdone5; ?><?php echo $userd->bmdone6; ?><?php echo $userd->bmdone7; ?><?php echo $userd->bmdone8; ?><?php echo $userd->bmdone9; ?><?php echo $userd->bmdone10; ?><?php echo $userd->instone1; ?><?php echo $userd->instone2; ?><?php echo $userd->instone3; ?><?php echo $userd->instone4; ?> <?php echo $userd->btarin1; ?><?php echo $userd->btarin2; ?><?php echo $userd->btarin3; ?><?php echo $userd->btarin4; ?><?php echo $userd->btarin5; ?><?php echo $userd->btarin6; ?><?php echo $userd->btarin7; ?><?php echo $userd->btarin8; ?><?php echo $userd->btarin9; ?><?php echo $userd->btarin10; ?> <?php echo $userd->adminstaff; ?> <?php echo $userd->game; ?> <?php echo $userd->game; ?>  &nbsp; <?php if($userd->vploc !=''){echo $userd->vploc.'&nbsp;';}  ?> <?php if($userd->vpdis !=''){ echo $userd->vpdis.'&nbsp;'; } ?> <?php if($userd->noj !=''){ echo $userd->noj.'&nbsp;'; }  ?> <?php if($userd->jsdis !=''){ echo $userd->jsdis.'&nbsp;'; } ?><?php if($userd->osgloc !=''){ echo $userd->osgloc.'&nbsp;'; } ?><?php if($userd->osgdis !=''){ echo $userd->osgdis.'&nbsp;'; } ?><?php if($userd->bsdnob !=''){ echo $userd->bsdnob.'&nbsp;'; } ?><?php if($userd->bsddis !=''){ echo $userd->bsddis.'&nbsp;'; } ?><?php if($userd->bsdloc !=''){ echo $userd->bsdloc.'&nbsp;'; } ?><?php if($userd->perdupod !=''){ echo $userd->perdupod.'&nbsp;'; } ?><?php if($userd->perdudis !=''){ echo $userd->perdudis.'&nbsp;'; } ?><?php if($userd->perduorno !=''){ echo $userd->perduorno.'&nbsp;'; } ?><?php if($userd->perduordate !=''){ echo $userd->perduordate.'&nbsp;'; } ?><?php if($userd->dgppod !=''){ echo $userd->dgppod; } ?><?php if($userd->dgpdis !=''){ echo $userd->dgpdis.'&nbsp;'; } ?><?php if($userd->dgporno !=''){ echo $userd->dgporno.'&nbsp;'; } ?><?php if($userd->dgpordate !=''){ echo $userd->dgpordate.'&nbsp;'; } ?> <?php if($userd->tertdpod !=''){echo $userd->tertdpod.'&nbsp;'; } ?><?php if($userd->tertddis !=''){ echo $userd->tertddis.'&nbsp;'; } ?><?php if($userd->tertdordate !=''){ echo $userd->tertdordate.'&nbsp;'; } ?><?php if($userd->sstgpod !=''){ echo $userd->sstgpod.'&nbsp;';  } ?><?php if($userd->sstgdis !=''){ echo $userd->sstgdis.'&nbsp;'; } ?><?php if($userd->sstgorno !=''){ echo $userd->sstgorno.'&nbsp;';} ?><?php if($userd->sstgordate !=''){ echo $userd->sstgordate.'&nbsp;'; } ?><?php if($userd->swatpod !=''){ echo $userd->swatpod.'&nbsp;'; } ?><?php if($userd->swatdis !=''){ echo $userd->swatdis.'&nbsp;'; } ?><?php if($userd->swatorno !=''){ echo $userd->swatorno.'&nbsp;'; } ?><?php if($userd->swatordate !=''){echo $userd->swatordate.'&nbsp;';} ?><?php if($userd->awdpmpod !=''){echo $userd->awdpmpod.'&nbsp;'; } ?><?php if($userd->awdpmorno !=''){echo $userd->awdpmorno.'&nbsp;'; } ?><?php if($userd->awdpmordate !=''){echo $userd->awdpmordate.'&nbsp;'; } ?><?php if($userd->awdpfpod !=''){echo $userd->awdpfpod.'&nbsp;';} ?><?php if($userd->awdpforno !=''){echo $userd->awdpforno.'&nbsp;'; } ?><?php if($userd->awdpfordate !=''){echo $userd->awdpfordate.'&nbsp;'; } ?><?php if($userd->awdpompod !=''){echo $userd->awdpompod.'&nbsp;';} ?><?php if($userd->awdpomorno !=''){echo $userd->awdpomorno.'&nbsp;';} ?><?php if($userd->awdpomordate !=''){echo $userd->awdpomordate.'&nbsp;'; } ?><?php if($userd->awdpofpod !=''){ echo $userd->awdpofpod.'&nbsp;'; } ?><?php if($userd->awdpoforno !=''){ echo $userd->awdpoforno.'&nbsp;'; } ?>
 <?php if($userd->awdpofordate !=''){ echo $userd->awdpofordate.'&nbsp;'; } ?><?php if($userd->dsopod !=''){ echo $userd->dsopod.'&nbsp;';} ?><?php if($userd->dsoorno !=''){ echo $userd->dsoorno.'&nbsp;'; } ?><?php if($userd->dsoordate !=''){ echo $userd->dsoordate.'&nbsp;'; } ?><?php if($userd->csojalorno !=''){ echo $userd->csojalorno.'&nbsp;'; } ?><?php if($userd->csojalordate !=''){ echo $userd->csojalordate.'&nbsp;'; } ?><?php if($userd->mispatorno !=''){ echo $userd->mispatorno.'&nbsp;'; } ?><?php if($userd->mispatordate !=''){echo $userd->mispatordate.'&nbsp;'; } ?><?php if($userd->othersnod !=''){echo $userd->othersnod.'&nbsp;'; } ?><?php if($userd->othersnodis !=''){echo $userd->othersnodis.'&nbsp;';} ?><?php if($userd->othersorno !=''){ echo $userd->othersorno.'&nbsp;';} ?><?php if($userd->othersordate !=''){echo $userd->othersordate.'&nbsp;'; } ?><?php if($userd->pssawonof !=''){ echo $userd->pssawonof.'&nbsp;'; } ?><?php if($userd->pssaworank !=''){ echo $userd->pssaworank.'&nbsp;'; } ?> <?php if($userd->pssawoordate !=''){echo $userd->pssawoordate.'&nbsp;'; } ?> <?php if($userd->osihonoo !=''){ echo $userd->osihonoo.'&nbsp;'; } ?><?php if($userd->Readerosinbo !=''){ echo $userd->Readerosinbo.'&nbsp;'; } ?><?php if($userd->Orderly !=''){ echo $userd->Orderly.'&nbsp;'; } ?><?php if($userd->telopr !=''){echo $userd->telopr.'&nbsp;';} ?><?php if($userd->darrun !=''){echo $userd->darrun.'&nbsp;';} ?><?php if($userd->bnkgdop !=''){echo $userd->bnkgdop.'&nbsp;';} ?><?php if($userd->bhogpog !=''){echo $userd->bhogpog.'&nbsp;';} ?><?php if($userd->bhogdop !=''){echo $userd->bhogdop.'&nbsp;';} ?><?php if($userd->tradestot !=''){ echo $userd->tradestot.'&nbsp;';} ?><?php if($userd->tradestt !=''){echo $userd->tradestt.'&nbsp;'; } ?><?php if($userd->tradesbat !=''){echo $userd->tradesbat.'&nbsp;';} ?><?php if($userd->tradesdop !=''){echo $userd->tradesdop.'&nbsp;';} ?><?php if($userd->tradesorno !=''){echo $userd->tradesorno.'&nbsp;';} ?><?php if($userd->mtsecpod !=''){echo $userd->mtsecpod.'&nbsp;';} ?><?php if($userd->mtsecvehno !=''){echo $userd->mtsecvehno.'&nbsp;';} ?><?php if($userd->mtsecdop !=''){echo $userd->mtsecdop.'&nbsp;';} ?><?php if($userd->mtsecorno !=''){echo $userd->mtsecorno.'&nbsp;';} ?><?php if($userd->quartbradop !=''){echo $userd->quartbradop.'&nbsp;';} ?><?php if($userd->quartbraorno !=''){echo $userd->quartbraorno.'&nbsp;';} ?><?php if($userd->recrutnorb !=''){ echo $userd->recrutnorb.'&nbsp;'; } ?><?php if($userd->recrutorno !=''){echo $userd->recrutorno.'&nbsp;'; } ?><?php if($userd->recrutordate !=''){echo $userd->recrutordate.'&nbsp;'; } ?><?php if($userd->leavefrom !=''){echo $userd->leavefrom.'&nbsp;'; } ?> <?php if($userd->leaveto !=''){echo $userd->leaveto.'&nbsp;'; } ?><?php if($userd->absentfrom !=''){echo $userd->absentfrom.'&nbsp;'; } ?><?php if($userd->absentddr !=''){echo $userd->absentddr.'&nbsp;'; } ?><?php if($userd->absentdate !=''){echo $userd->absentdate.'&nbsp;'; } ?><?php if($userd->usdos !=''){echo $userd->usdos.'&nbsp;';} ?><?php if($userd->usros !=''){echo $userd->usros.'&nbsp;';} ?><?php if($userd->cfpop !=''){echo $userd->cfpop.'&nbsp;';} ?><?php if($userd->cfppd !=''){echo $userd->cfppd.'&nbsp;';} ?><?php if($userd->cfpdop !=''){echo $userd->cfpdop.'&nbsp;';} } ?></td>
                    <td><?php $userded = fetchoneinfo('seccover',array('man_id' => $value->man_id));
                                if($userded !=''){
                                    echo $userded->name.'&nbsp;'.$userded->placeofposting.'&nbsp;'.$userded->placeofposting.'&nbsp;'.$userded->address.'&nbsp;'.$userded->rank.'&nbsp;'.$userded->des;
                                }
                                
                     ?> </td>
                      <td>  <?php echo $value->dateofposting1; ?></td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
      
</body>
</html>