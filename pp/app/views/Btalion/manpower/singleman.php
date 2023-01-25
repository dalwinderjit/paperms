<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>User info </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" /><link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/data/css/dataTables.colVis.css"/>

    <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<div class="row">
<div class="col-sm-8 col-xs-offset-2">
<table class="table">
<tbody>
 <tr><td colspan="3"><h2 class="text-center"><strong><?php echo $user->name; ?></strong></h2> </td></tr>
 <tr><td><strong>Sr.No.</strong></td><td><strong>Field</strong></td><td><strong>Details</strong></td></tr>
 <tr><td>1</td><td>Battalion/Unit</td><td><?php if($user->bunitdistrict ==''){
$bats = fetchoneinfo('users',array('users_id' => $user->bat_id)); echo $bats->nick; 
 }else{
  $user->bunitdistrict; 
 }  
  ?></td></tr>
  <tr><td>2</td><td>Category of post</td><td><?php echo $user->presentrank; ?></td></tr>
 <tr><td>3</td><td>Present Rank</td><td><?php echo $user->cexrank.$user->cminirank.$user->cmedirank.$user->ccprank.$user->cccrank; ?></td></tr>
 <tr><td>4</td><td>Dept. No</td><td><?php echo $user->depttno; ?></td></tr>
 <tr><td>5</td><td>Type of Duty</td><td><?php echo $user->typeofduty; ?></td></tr>
 <tr><td>6</td><td>Father's Name</td><td><?php echo $user->fathername; ?></td></tr>
 <tr><td><strong>Present Address </strong></td></tr>
 <tr><td>7</td><td>House no.</td><td><?php echo $user->phouse; ?></td></tr>
 <tr><td>8</td><td>Street No.</td><td><?php echo $user->pstreet; ?></td></tr>
 <tr><td>9</td><td>Ward No.</td><td><?php echo $user->pward; ?></td></tr>
 <tr><td>10</td><td>Village/Mohalla</td><td><?php echo $user->pvillmohala; ?></td></tr>
 <tr><td>11</td><td>Post Office</td><td><?php echo $user->ppostoffice; ?></td></tr>
 <tr><td>12</td><td>Police Station</td><td><?php echo $user->ppolicestation; ?></td></tr>
 <tr><td>13</td><td>Tehsil</td><td><?php echo $user->ptehsil; ?></td></tr>
 <tr><td>14</td><td>District</td><td><?php echo $user->pdistrict; ?></td></tr>
 <tr><td>15</td><td>State</td><td><?php echo $user->pstate; ?></td></tr>
 <tr><td><strong>Permanent Address </strong></td></tr>
 <tr><td>16</td><td>House no.</td><td><?php echo $user->houseno; ?></td></tr>
 <tr><td>17</td><td>Street No.</td><td><?php echo $user->streetno; ?></td></tr>
 <tr><td>18</td><td>Ward No.</td><td><?php echo $user->wardno; ?></td></tr>
 <tr><td>19</td><td>Village/Mohalla</td><td><?php echo $user->villmohala; ?></td></tr>
 <tr><td>20</td><td>Post Office</td><td><?php echo $user->postoffice; ?></td></tr>
 <tr><td>21</td><td>Police Station</td><td><?php echo $user->policestation; ?></td></tr>
 <tr><td>22</td><td>Tehsil</td><td><?php echo $user->teshil; ?></td></tr>
 <tr><td>23</td><td>District</td><td><?php echo $user->district; ?></td></tr>
 <tr><td>24</td><td>State</td><td><?php echo $user->state; ?></td></tr>
 <tr><td><strong>Misc Details </strong></td></tr>
 <tr><td>25</td><td>Gender</td><td><?php echo $user->gender; ?></td></tr>
 <tr><td>26</td><td>Marital Status</td><td><?php echo $user->maritalstatus; ?></td></tr>
 <tr><td>27</td><td>Date of Birth</td><td>
<?php $dd =  date('d-m-Y',strtotime($user->dateofbith)); if($dd == '01-01-1970'){echo'Not OK!! '; echo $employee->getDateOfBirth();}else{ echo $dd;} ?></td></tr>
 <tr><td>28</td><td>Age</td><td><?php echo $employee->getAge(); ?></td></tr>
 <tr><td>29</td><td>Caste</td><td><?php echo $user->caste; ?></td></tr>
 <tr><td>30</td><td>Category</td><td><?php echo $user->category; ?></td></tr>
 <tr><td>31</td><td>Phone1</td><td><?php echo $user->phono1; ?></td></tr>
 <tr><td>32</td><td>Phone2</td><td><?php echo $user->phono2; ?></td></tr>
 <tr><td>33</td><td>Email ID</td><td><?php echo $user->email; ?></td></tr>
 <tr><td>34</td><td>Adhaar no.</td><td><?php echo $user->adharno; ?></td></tr>
 <tr><td>35</td><td>PAN Card no.</td><td><?php echo $user->pan; ?></td></tr>
 <tr><td>36</td><td>Name of Bank</td><td><?php echo $user->nameofbank; ?></td></tr>
 <tr><td>37</td><td>Name of Branch</td><td><?php echo $user->nameofbranch; ?></td></tr>
 <tr><td>38</td><td>Bank AC No.</td><td><?php echo $user->bankacno; ?></td></tr>
 <tr><td>39</td><td>IFSC Code</td><td><?php echo $user->ifsccode; ?></td></tr>
 <tr><td>40</td><td>Blood Group</td><td><?php echo $user->bloodgroup; ?></td></tr>
 <tr><td>41</td><td>Identification Mark</td><td><?php echo $user->identificationmark; ?></td></tr>
 <tr><td>42</td><td>Height</td><td><?php echo $user->feet; ?> <?php echo $user->inch; ?></td></tr>
 <tr><td>43</td><td>Educational Qualification</td><td>
  <?php echo $qualification;//echo $user->eduqalification." ".$user->UnderGraduate." ".$user->Graduate." ".$user->PostGraduate." ".$user->Doctorate." ".$user->Doctorateother; ?></td></tr>
 <tr><td><strong>Service Details </strong></td></tr>
 <tr><td>44</td><td>Previous Batalion</td><td><?php echo $user->prebattalion; ?></td></tr>
 <tr><td>45</td><td>Mode of Recruitment</td><td><?php echo $user->modeofrec; ?></td></tr>
 <tr><td>46</td><td>Enlistment Unit</td><td><?php echo $user->EnlistmentUnit.$user->enutherdistrict; ?></td></tr>
 <tr><td>47</td><td>Date of Enlistment</td><td>
<?php $dde =  date('d-m-Y',strtotime($user->dateofinlitment)); if($dde == '01-01-1970'){echo'-';}else{ echo $dde;} ?></td></tr>
 <tr><td>48</td><td>Rank of Enlistment</td><td><?php echo $user->eexrank.$user->eminirank.$user->emedirank.$user->ecprank; ?></td></tr>
  <tr><td>49</td><td>Enlistment Category</td><td><?php echo $user->enlistmentcat; ?></td></tr>
  <tr><td>50</td><td>Date of Retirement</td><td>
<?php echo $user->dateofretirment; ?>
</td></tr>
  <tr><td>51</td><td>GPF Pol No/ PRAN NO</td><td><?php echo $user->gpfpranno; ?> &nbsp; <?php echo $user->PRAN; ?></td></tr>
  <tr><td>52</td><td>Good entries</td><td><?php echo $user->gd1; ?></td></tr>
  <tr><td>53</td><td>Bad entries</td><td><?php echo $user->bd1; ?></td></tr>
  <tr><td>54</td><td>Induction Rank</td><td><?php echo $user->ierank; ?></td></tr>
  <tr><td>55</td><td>Induction Mode</td><td><?php echo $user->inductionmode; ?></td></tr>
  <tr><td>56</td><td>Induction Date</td><td><?php echo $user->inductiondate; ?></td></tr>
  <tr><td>57</td><td>Previous BN./Unit</td><td><?php echo $user->prebattalion; ?></td></tr>
  <tr><td>58</td><td>Previous BN. No.</td><td><?php echo $user->prebattno; ?></td></tr>
  <tr><td>59</td><td>Placement as Junior Asst. Date</td><td><?php echo $user->dateblockm1; ?></td></tr>
  <tr><td>60</td><td>Promotion as Sr. Asst. Date</td><td><?php echo $user->dateblockm2; ?></td></tr>
  <tr><td>61</td><td>Promotion as Supdt Grade-I</td><td><?php echo $user->dateblockm3; ?></td></tr>
  <tr><td>62</td><td>Promotion as Supdt Grade-II</td><td><?php echo $user->dateblockm4; ?></td></tr>
 <?php if($userd!=''){
  if($userd->cfpop !='' || $userd->cfppd !=''){ ?>
  <?php if($userd!=''){ ?>
 <tr><td>63</td><td>Posting </td><td><?php echo $userd->fone1; ?> <?php echo $userd->fone2; ?><?php echo $userd->fone3; ?><?php echo $userd->fone4; ?><?php echo $userd->fone5; ?><?php echo $userd->fone6; ?><?php echo $userd->fone7; ?><?php echo $userd->fone8; ?><?php echo $userd->fone9; ?><?php echo $userd->fone10; ?><?php echo $userd->fone11; ?><?php echo $userd->fone12; ?><?php echo $userd->lone1; ?><?php echo $userd->lone2; ?><?php echo $userd->lone3; ?><?php echo $userd->sqone1; ?><?php echo $userd->sqone2; ?><?php echo $userd->sqone3; ?><?php echo $userd->sqone4; ?><?php echo $userd->sqone5; ?><?php echo $userd->sqone6; ?><?php echo $userd->paone1; ?><?php echo $userd->paone2; ?><?php echo $userd->paone3; ?><?php echo $userd->paone4; ?><?php echo $userd->paone5; ?><?php echo $userd->paone6; ?><?php echo $userd->paone7; ?><?php echo $userd->paone8; ?><?php echo $userd->paone9; ?><?php echo $userd->paone10; ?><?php echo $userd->paone11; ?><?php echo $userd->paone12; ?><?php echo $userd->paone13; ?><?php echo $userd->paone14; ?><?php echo $userd->paone15; ?><?php echo $userd->paone16; ?><?php echo $userd->paone17; ?><?php echo $userd->paone18; ?><?php echo $userd->paone19; ?><?php echo $userd->paone20; ?><?php echo $userd->paone21; ?><?php echo $userd->traning1; ?><?php echo $userd->traning2; ?><?php echo $userd->traning3; ?><?php echo $userd->ssone23; ?><?php echo $userd->ssone24; ?><?php echo $userd->ssone25; ?><?php echo $userd->ssone26; ?><?php echo $userd->awbone1; ?><?php echo $userd->awbone2; ?><?php echo $userd->awbone3; ?><?php echo $userd->awbone4; ?><?php echo $userd->awbone5; ?><?php echo $userd->awbone6; ?><?php echo $userd->awbone7; ?><?php echo $userd->awbone8; ?><?php echo $userd->awbone9; ?><?php echo $userd->awbone10; ?><?php echo $userd->awbone11; ?><?php echo $userd->awbone12; ?><?php echo $userd->awbone13; ?><?php echo $userd->bmdone1; ?><?php echo $userd->bmdone2; ?><?php echo $userd->bmdone3; ?><?php echo $userd->bmdone4; ?><?php echo $userd->bmdone5; ?><?php echo $userd->bmdone6; ?><?php echo $userd->bmdone7; ?><?php echo $userd->bmdone8; ?><?php echo $userd->instone1; ?><?php echo $userd->instone2; ?><?php echo $userd->instone3; ?><?php echo $userd->instone4; ?> &nbsp; <?php if($userd->vploc !=''){echo $userd->vploc.'&nbsp;';}  ?> <?php if($userd->vpdis !=''){ echo $userd->vpdis.'&nbsp;'; } ?> <?php if($userd->noj !=''){ echo $userd->noj.'&nbsp;'; }  ?> <?php if($userd->jsdis !=''){ echo $userd->jsdis.'&nbsp;'; } ?><?php if($userd->osgloc !=''){ echo $userd->osgloc.'&nbsp;'; } ?><?php if($userd->osgdis !=''){ echo $userd->osgdis.'&nbsp;'; } ?><?php if($userd->bsdnob !=''){ echo $userd->bsdnob.'&nbsp;'; } ?><?php if($userd->bsddis !=''){ echo $userd->bsddis.'&nbsp;'; } ?><?php if($userd->bsdloc !=''){ echo $userd->bsdloc.'&nbsp;'; } ?><?php if($userd->perdupod !=''){ echo $userd->perdupod.'&nbsp;'; } ?><?php if($userd->perdudis !=''){ echo $userd->perdudis.'&nbsp;'; } ?><?php if($userd->perduorno !=''){ echo $userd->perduorno.'&nbsp;'; } ?><?php if($userd->perduordate !=''){ echo $userd->perduordate.'&nbsp;'; } ?><?php if($userd->dgppod !=''){ echo $userd->dgppod; } ?><?php if($userd->dgpdis !=''){ echo $userd->dgpdis.'&nbsp;'; } ?><?php if($userd->dgporno !=''){ echo $userd->dgporno.'&nbsp;'; } ?><?php if($userd->dgpordate !=''){ echo $userd->dgpordate.'&nbsp;'; } ?> <?php if($userd->tertdpod !=''){echo $userd->tertdpod.'&nbsp;'; } ?><?php if($userd->tertddis !=''){ echo $userd->tertddis.'&nbsp;'; } ?><?php if($userd->tertdordate !=''){ echo $userd->tertdordate.'&nbsp;'; } ?><?php if($userd->sstgpod !=''){ echo $userd->sstgpod.'&nbsp;';  } ?><?php if($userd->sstgdis !=''){ echo $userd->sstgdis.'&nbsp;'; } ?><?php if($userd->sstgorno !=''){ echo $userd->sstgorno.'&nbsp;';} ?><?php if($userd->sstgordate !=''){ echo $userd->sstgordate.'&nbsp;'; } ?><?php if($userd->swatpod !=''){ echo $userd->swatpod.'&nbsp;'; } ?><?php if($userd->swatdis !=''){ echo $userd->swatdis.'&nbsp;'; } ?><?php if($userd->swatorno !=''){ echo $userd->swatorno.'&nbsp;'; } ?><?php if($userd->swatordate !=''){echo $userd->swatordate.'&nbsp;';} ?><?php if($userd->awdpmpod !=''){echo $userd->awdpmpod.'&nbsp;'; } ?><?php if($userd->awdpmorno !=''){echo $userd->awdpmorno.'&nbsp;'; } ?><?php if($userd->awdpmordate !=''){echo $userd->awdpmordate.'&nbsp;'; } ?><?php if($userd->awdpfpod !=''){echo $userd->awdpfpod.'&nbsp;';} ?><?php if($userd->awdpforno !=''){echo $userd->awdpforno.'&nbsp;'; } ?><?php if($userd->awdpfordate !=''){echo $userd->awdpfordate.'&nbsp;'; } ?><?php if($userd->awdpompod !=''){echo $userd->awdpompod.'&nbsp;';} ?><?php if($userd->awdpomorno !=''){echo $userd->awdpomorno.'&nbsp;';} ?><?php if($userd->awdpomordate !=''){echo $userd->awdpomordate.'&nbsp;'; } ?><?php if($userd->awdpofpod !=''){ echo $userd->awdpofpod.'&nbsp;'; } ?><?php if($userd->awdpoforno !=''){ echo $userd->awdpoforno.'&nbsp;'; } ?>
 <?php if($userd->awdpofordate !=''){ echo $userd->awdpofordate.'&nbsp;'; } ?><?php if($userd->dsopod !=''){ echo $userd->dsopod.'&nbsp;';} ?><?php if($userd->dsoorno !=''){ echo $userd->dsoorno.'&nbsp;'; } ?><?php if($userd->dsoordate !=''){ echo $userd->dsoordate.'&nbsp;'; } ?><?php if($userd->csojalorno !=''){ echo $userd->csojalorno.'&nbsp;'; } ?><?php if($userd->csojalordate !=''){ echo $userd->csojalordate.'&nbsp;'; } ?><?php if($userd->mispatorno !=''){ echo $userd->mispatorno.'&nbsp;'; } ?><?php if($userd->mispatordate !=''){echo $userd->mispatordate.'&nbsp;'; } ?><?php if($userd->othersnod !=''){echo $userd->othersnod.'&nbsp;'; } ?><?php if($userd->othersnodis !=''){echo $userd->othersnodis.'&nbsp;';} ?><?php if($userd->othersorno !=''){ echo $userd->othersorno.'&nbsp;';} ?><?php if($userd->othersordate !=''){echo $userd->othersordate.'&nbsp;'; } ?><?php if($userd->pssawonof !=''){ echo $userd->pssawonof.'&nbsp;'; } ?><?php if($userd->pssaworank !=''){ echo $userd->pssaworank.'&nbsp;'; } ?> <?php if($userd->pssawoordate !=''){echo $userd->pssawoordate.'&nbsp;'; } ?> <?php if($userd->osihonoo !=''){ echo $userd->osihonoo.'&nbsp;'; } ?><?php if($userd->Readerosinbo !=''){ echo $userd->Readerosinbo.'&nbsp;'; } ?><?php if($userd->Orderly !=''){ echo $userd->Orderly.'&nbsp;'; } ?><?php if($userd->telopr !=''){echo $userd->telopr.'&nbsp;';} ?><?php if($userd->darrun !=''){echo $userd->darrun.'&nbsp;';} ?><?php if($userd->bnkgdop !=''){echo $userd->bnkgdop.'&nbsp;';} ?><?php if($userd->bhogpog !=''){echo $userd->bhogpog.'&nbsp;';} ?><?php if($userd->bhogdop !=''){echo $userd->bhogdop.'&nbsp;';} ?><?php if($userd->tradestot !=''){ echo $userd->tradestot.'&nbsp;';} ?><?php if($userd->tradestt !=''){echo $userd->tradestt.'&nbsp;'; } ?><?php if($userd->tradesbat !=''){echo $userd->tradesbat.'&nbsp;';} ?><?php if($userd->tradesdop !=''){echo $userd->tradesdop.'&nbsp;';} ?><?php if($userd->tradesorno !=''){echo $userd->tradesorno.'&nbsp;';} ?><?php if($userd->mtsecpod !=''){echo $userd->mtsecpod.'&nbsp;';} ?><?php if($userd->mtsecvehno !=''){echo $userd->mtsecvehno.'&nbsp;';} ?><?php if($userd->mtsecdop !=''){echo $userd->mtsecdop.'&nbsp;';} ?><?php if($userd->mtsecorno !=''){echo $userd->mtsecorno.'&nbsp;';} ?><?php if($userd->quartbradop !=''){echo $userd->quartbradop.'&nbsp;';} ?><?php if($userd->quartbraorno !=''){echo $userd->quartbraorno.'&nbsp;';} ?><?php if($userd->recrutnorb !=''){ echo $userd->recrutnorb.'&nbsp;'; } ?><?php if($userd->recrutorno !=''){echo $userd->recrutorno.'&nbsp;'; } ?><?php if($userd->recrutordate !=''){echo $userd->recrutordate.'&nbsp;'; } ?><?php if($userd->leavefrom !=''){echo $userd->leavefrom.'&nbsp;'; } ?> <?php if($userd->leaveto !=''){echo $userd->leaveto.'&nbsp;'; } ?><?php if($userd->absentfrom !=''){echo $userd->absentfrom.'&nbsp;'; } ?><?php if($userd->absentddr !=''){echo $userd->absentddr.'&nbsp;'; } ?><?php if($userd->absentdate !=''){echo $userd->absentdate.'&nbsp;'; } ?><?php if($userd->usdos !=''){echo $userd->usdos.'&nbsp;';} ?><?php if($userd->usros !=''){echo $userd->usros.'&nbsp;';} ?><?php if($userd->cfpop !=''){echo $userd->cfpop.'&nbsp;';} ?><?php if($userd->cfppd !=''){echo $userd->cfppd.'&nbsp;';} ?><?php if($userd->cfpdop !=''){echo $userd->cfpdop.'&nbsp;';} ?> 

 <?php  $names = fetchoneinfodesc('seccover',array('man_id'=> $this->uri->segment(2)),'seccover_id');
        if($names !=''){
          echo'<strong>'.$names->nod.'/&nbsp;'.$names->name.'/&nbsp;'.$names->rank.'</strong>';
        }
        
     ?>
  </td></tr>
<?php } if(isset($userd->dateofposting1)){ ?>
<tr><td>64</td><td>Date Of Posting</td><td>
    <?php echo $userd->dateofposting1;
      ?></td></tr> <?php } ?>
 <?php }else{ ?>
 <tr><td>65</td><td>Lower School Course Date</td><td><?php echo $user->loweschoolcdate; ?></td></tr>
 <tr><td>66</td><td>Date of List C-I</td><td><?php echo $user->doc1; ?></td></tr>
 <tr><td>67</td><td>Date of List C-II</td><td><?php echo $user->doc2; ?></td></tr>
 <tr><td>68</td><td>Date of Offg. HC</td><td><?php echo $user->dofhc; ?></td></tr>
 <tr><td>69</td><td>Inter Mediate School Course  Passing  Date</td><td><?php echo $user->intermediatescor; ?></td></tr>
 <tr><td>70</td><td>Date of List-D</td><td><?php echo $user->dofld; ?></td></tr>
 <tr><td>71</td><td>Date of List-D-II</td><td><?php echo $user->dofld2; ?></td></tr>
 <tr><td>72</td><td>Date of Offg.ASI</td><td><?php echo $user->dateofoffasi; ?></td></tr>
 <tr><td>73</td><td>Upper School Course Passing Date</td><td><?php echo $user->upperschool; ?></td></tr>
 <tr><td>74</td><td>Date of  List E</td><td><?php echo $user->dateofliste; ?></td></tr>
 <tr><td>75</td><td>Date of List E-II</td><td><?php echo $user->dateofliste2; ?></td></tr>
 <tr><td>76</td><td>Date of Offg. SI</td><td><?php echo $user->dateoffsi; ?></td></tr>
 <tr><td>77</td><td>Date of List-F</td><td><?php echo $user->dateoflistf; ?></td></tr>
 <!-- <tr><td>70</td><td>Date of List-F-II</td><td><?php //echo $user->dateoflistf2; ?></td></tr> -->
 <tr><td>78</td><td>Date of offg. INSP</td><td><?php echo $user->dateofinsp; ?></td></tr>
<!--  <tr><td>72</td><td>Date of Promotion DSP/ASP</td><td><?php //echo $user->dopdasp; ?></td></tr>
 <tr><td>73</td><td>Date of Promotion SP</td><td><?php //echo $user->doprosp; ?></td></tr>
 <tr><td>74</td><td>Date of Promotion as CR/LR/PR if any</td><td><?php //echo $user->doprocl; ?></td></tr> -->
 <tr><td>79</td><td>Basic Training Course Institute</td><td><?php echo $user->btic; ?></td></tr>
 <tr><td>80</td><td>Batch /GroupNo.</td><td><?php echo $user->batchgroup; ?></td></tr>
 <tr><td>81</td><td>Passout Year</td><td><?php echo $user->passoutyear; ?></td></tr>
 <tr><td>82</td><td>Name of Range</td><td><?php echo $user->NameofsRanges; ?></td></tr>
 <tr><td>83</td><td>Firing Weapon</td><td><?php echo $user->tow; ?></td></tr>
<tr><td>84</td><td>Last Date of Firing</td><td><?php echo $user->dateofprcatice; ?></td></tr>
 
   <?php if($userd!=''){ ?>
 <tr><td>85</td><td>Present Posting </td><td><?php echo $userd->fone1; ?> <?php echo $userd->fone2; ?><?php echo $userd->fone3; ?><?php echo $userd->fone4; ?><?php echo $userd->fone5; ?><?php echo $userd->fone6; ?><?php echo $userd->fone7; ?><?php echo $userd->fone8; ?><?php echo $userd->fone9; ?><?php echo $userd->fone10; ?><?php echo $userd->fone11; ?><?php echo $userd->fone12; ?><?php echo $userd->lone1; ?><?php echo $userd->lone2; ?><?php echo $userd->lone3; ?><?php echo $userd->sqone1; ?><?php echo $userd->sqone2; ?><?php echo $userd->sqone3; ?><?php echo $userd->sqone4; ?><?php echo $userd->sqone5; ?><?php echo $userd->sqone6; ?><?php echo $userd->sqone7; ?> <?php echo $userd->paone1; ?><?php echo $userd->paone2; ?><?php echo $userd->paone3; ?><?php echo $userd->paone4; ?><?php echo $userd->paone5; ?><?php echo $userd->paone6; ?><?php echo $userd->paone7; ?><?php echo $userd->paone8; ?><?php echo $userd->paone9; ?><?php echo $userd->paone10; ?><?php echo $userd->paone11; ?><?php echo $userd->paone12; ?><?php echo $userd->paone13; ?><?php echo $userd->paone14; ?><?php echo $userd->paone15; ?><?php echo $userd->paone16; ?><?php echo $userd->paone17; ?><?php echo $userd->paone18; ?><?php echo $userd->paone19; ?><?php echo $userd->paone20; ?><?php echo $userd->paone21; ?><?php echo $userd->paone23; ?><?php echo $userd->traning1; ?><?php echo $userd->traning2; ?><?php echo $userd->traning3; ?><?php echo $userd->ssone23; ?><?php echo $userd->ssone24; ?><?php echo $userd->ssone25; ?><?php echo $userd->ssone26; ?><?php echo $userd->awbone1; ?><?php echo $userd->awbone2; ?><?php echo $userd->awbone3; ?><?php echo $userd->awbone4; ?><?php echo $userd->awbone5; ?><?php echo $userd->awbone6; ?><?php echo $userd->awbone7; ?><?php echo $userd->awbone8; ?><?php echo $userd->awbone9; ?><?php echo $userd->awbone10; ?><?php echo $userd->awbone12; ?><?php echo $userd->awbone11; ?><?php echo $userd->awbone12; ?><?php echo $userd->awbone13; ?><?php echo $userd->bmdone1; ?><?php echo $userd->bmdone2; ?><?php echo $userd->bmdone3; ?><?php echo $userd->bmdone4; ?><?php echo $userd->bmdone5; ?><?php echo $userd->bmdone6; ?><?php echo $userd->bmdone7; ?><?php echo $userd->bmdone8; ?><?php echo $userd->instone1; ?><?php echo $userd->instone2; ?><?php echo $userd->instone3; ?><?php echo $userd->instone4; ?> &nbsp; <?php if($userd->vploc !=''){echo $userd->vploc.'&nbsp;';}  ?> <?php if($userd->vpdis !=''){ echo $userd->vpdis.'&nbsp;'; } ?> <?php if($userd->noj !=''){ echo $userd->noj.'&nbsp;'; }  ?> <?php if($userd->jsdis !=''){ echo $userd->jsdis.'&nbsp;'; } ?><?php if($userd->osgloc !=''){ echo $userd->osgloc.'&nbsp;'; } ?><?php if($userd->osgdis !=''){ echo $userd->osgdis.'&nbsp;'; } ?><?php if($userd->bsdnob !=''){ echo $userd->bsdnob.'&nbsp;'; } ?><?php if($userd->bsddis !=''){ echo $userd->bsddis.'&nbsp;'; } ?><?php if($userd->bsdloc !=''){ echo $userd->bsdloc.'&nbsp;'; } ?><?php if($userd->perdupod !=''){ echo $userd->perdupod.'&nbsp;'; } ?><?php if($userd->perdudis !=''){ echo $userd->perdudis.'&nbsp;'; } ?><?php if($userd->perduorno !=''){ echo $userd->perduorno.'&nbsp;'; } ?><?php if($userd->perduordate !=''){ echo $userd->perduordate.'&nbsp;'; } ?><?php if($userd->dgppod !=''){ echo $userd->dgppod; } ?><?php if($userd->dgpdis !=''){ echo $userd->dgpdis.'&nbsp;'; } ?><?php if($userd->dgporno !=''){ echo $userd->dgporno.'&nbsp;'; } ?><?php if($userd->dgpordate !=''){ echo $userd->dgpordate.'&nbsp;'; } ?> <?php if($userd->tertdpod !=''){echo $userd->tertdpod.'&nbsp;'; } ?><?php if($userd->tertddis !=''){ echo $userd->tertddis.'&nbsp;'; } ?><?php if($userd->tertdordate !=''){ echo $userd->tertdordate.'&nbsp;'; } ?><?php if($userd->sstgpod !=''){ echo $userd->sstgpod.'&nbsp;';  } ?><?php if($userd->sstgdis !=''){ echo $userd->sstgdis.'&nbsp;'; } ?><?php if($userd->sstgorno !=''){ echo $userd->sstgorno.'&nbsp;';} ?><?php if($userd->sstgordate !=''){ echo $userd->sstgordate.'&nbsp;'; } ?><?php if($userd->swatpod !=''){ echo $userd->swatpod.'&nbsp;'; } ?><?php if($userd->swatdis !=''){ echo $userd->swatdis.'&nbsp;'; } ?><?php if($userd->swatorno !=''){ echo $userd->swatorno.'&nbsp;'; } ?><?php if($userd->swatordate !=''){echo $userd->swatordate.'&nbsp;';} ?><?php if($userd->awdpmpod !=''){echo $userd->awdpmpod.'&nbsp;'; } ?><?php if($userd->awdpmorno !=''){echo $userd->awdpmorno.'&nbsp;'; } ?><?php if($userd->awdpmordate !=''){echo $userd->awdpmordate.'&nbsp;'; } ?><?php if($userd->awdpfpod !=''){echo $userd->awdpfpod.'&nbsp;';} ?><?php if($userd->awdpforno !=''){echo $userd->awdpforno.'&nbsp;'; } ?><?php if($userd->awdpfordate !=''){echo $userd->awdpfordate.'&nbsp;'; } ?><?php if($userd->awdpompod !=''){echo $userd->awdpompod.'&nbsp;';} ?><?php if($userd->awdpomorno !=''){echo $userd->awdpomorno.'&nbsp;';} ?><?php if($userd->awdpomordate !=''){echo $userd->awdpomordate.'&nbsp;'; } ?><?php if($userd->awdpofpod !=''){ echo $userd->awdpofpod.'&nbsp;'; } ?><?php if($userd->awdpoforno !=''){ echo $userd->awdpoforno.'&nbsp;'; } ?>
 <?php if($userd->awdpofordate !=''){ echo $userd->awdpofordate.'&nbsp;'; } ?><?php if($userd->dsopod !=''){ echo $userd->dsopod.'&nbsp;';} ?><?php if($userd->dsoorno !=''){ echo $userd->dsoorno.'&nbsp;'; } ?><?php if($userd->dsoordate !=''){ echo $userd->dsoordate.'&nbsp;'; } ?><?php if($userd->csojalorno !=''){ echo $userd->csojalorno.'&nbsp;'; } ?><?php if($userd->csojalordate !=''){ echo $userd->csojalordate.'&nbsp;'; } ?><?php if($userd->mispatorno !=''){ echo $userd->mispatorno.'&nbsp;'; } ?><?php if($userd->mispatordate !=''){echo $userd->mispatordate.'&nbsp;'; } ?><?php if($userd->othersnod !=''){echo $userd->othersnod.'&nbsp;'; } ?><?php if($userd->othersnodis !=''){echo $userd->othersnodis.'&nbsp;';} ?><?php if($userd->othersorno !=''){ echo $userd->othersorno.'&nbsp;';} ?><?php if($userd->othersordate !=''){echo $userd->othersordate.'&nbsp;'; } ?><?php if($userd->pssawonof !=''){ echo $userd->pssawonof.'&nbsp;'; } ?><?php if($userd->pssaworank !=''){ echo $userd->pssaworank.'&nbsp;'; } ?> <?php if($userd->pssawoordate !=''){echo $userd->pssawoordate.'&nbsp;'; } ?> <?php if($userd->osihonoo !=''){ echo $userd->osihonoo.'&nbsp;'; } ?><?php if($userd->Readerosinbo !=''){ echo $userd->Readerosinbo.'&nbsp;'; } ?><?php if($userd->Orderly !=''){ echo $userd->Orderly.'&nbsp;'; } ?><?php if($userd->telopr !=''){echo $userd->telopr.'&nbsp;';} ?><?php if($userd->darrun !=''){echo $userd->darrun.'&nbsp;';} ?><?php if($userd->bnkgdop !=''){echo $userd->bnkgdop.'&nbsp;';} ?><?php if($userd->bhogpog !=''){echo $userd->bhogpog.'&nbsp;';} ?><?php if($userd->bhogdop !=''){echo $userd->bhogdop.'&nbsp;';} ?><?php if($userd->tradestot !=''){ echo $userd->tradestot.'&nbsp;';} ?><?php if($userd->tradestt !=''){echo $userd->tradestt.'&nbsp;'; } ?><?php if($userd->tradesbat !=''){echo $userd->tradesbat.'&nbsp;';} ?><?php if($userd->tradesdop !=''){echo $userd->tradesdop.'&nbsp;';} ?><?php if($userd->tradesorno !=''){echo $userd->tradesorno.'&nbsp;';} ?><?php if($userd->mtsecpod !=''){echo $userd->mtsecpod.'&nbsp;';} ?><?php if($userd->mtsecvehno !=''){echo $userd->mtsecvehno.'&nbsp;';} ?><?php if($userd->mtsecdop !=''){echo $userd->mtsecdop.'&nbsp;';} ?><?php if($userd->mtsecorno !=''){echo $userd->mtsecorno.'&nbsp;';} ?><?php if($userd->quartbradop !=''){echo $userd->quartbradop.'&nbsp;';} ?><?php if($userd->quartbraorno !=''){echo $userd->quartbraorno.'&nbsp;';} ?><?php if($userd->recrutnorb !=''){ echo $userd->recrutnorb.'&nbsp;'; } ?><?php if($userd->recrutorno !=''){echo $userd->recrutorno.'&nbsp;'; } ?><?php if($userd->recrutordate !=''){echo $userd->recrutordate.'&nbsp;'; } ?><?php if($userd->leavefrom !=''){echo $userd->leavefrom.'&nbsp;'; } ?> <?php if($userd->leaveto !=''){echo $userd->leaveto.'&nbsp;'; } ?><?php if($userd->absentfrom !=''){echo $userd->absentfrom.'&nbsp;'; } ?><?php if($userd->absentddr !=''){echo $userd->absentddr.'&nbsp;'; } ?><?php if($userd->absentdate !=''){echo $userd->absentdate.'&nbsp;'; } ?><?php if($userd->usdos !=''){echo $userd->usdos.'&nbsp;';} ?><?php if($userd->usros !=''){echo $userd->usros.'&nbsp;';} ?><?php if($userd->cfpop !=''){echo $userd->cfpop.'&nbsp;';} ?><?php if($userd->cfppd !=''){echo $userd->cfppd.'&nbsp;';} ?><?php if($userd->cfpdop !=''){echo $userd->cfpdop.'&nbsp;';} $userd->adminstaff; ?> 

 <?php  $names = fetchoneinfodesc('seccover',array('man_id'=> $this->uri->segment(2)),'seccover_id');
        if($names !=''){
          echo'<strong>'.$names->nod.'/&nbsp;'.$names->name.'/&nbsp;'.$names->rank.'</strong>';
        }
        
     ?>
  </td></tr>

<?php } if(isset($userd->dateofposting1)){ ?>
<tr><td>86</td><td>Date Of Posting</td><td>
    <?php echo $userd->dateofposting1;
      ?></td></tr>




       <?php } ?>
 <tr><td>87</td><td>Computer literate</td><td><?php echo $user->comlit; ?></td></tr>
<?php if(isset($_GET['show_old'])){ ?>

        <tr><td colspan="3"><strong>Professional Courses Old Data(<?php $tr = explode('@', $user->TrainingInstitutessti); echo count($tr); ?>)</strong></td></tr>
<?php $tr = explode('@', $user->TrainingInstitutessti);
      $tr1 = explode('@', $user->NamesofsCourses);
      $tr2 = explode('@', $user->DurationsofsCourses);
      $tr3 = explode('@', $user->DurationsofsCoursest);
      
       $c = 0;
      foreach ($tr as $key => $value) { $c = $c +1;
         echo' <tr><td class="text-right"><strong>'.$c.')</strong></td><td>Training Institute</td><td> '.$value.'</td></tr>
 <tr><td></td><td>Name of Course</td><td>'.$tr1[$key].'</td></tr>
 <tr><td></td><td>Duration of Course</td><td>'.$tr2[$key].'&nbsp;To&nbsp;'.$tr3[$key]. '</td></tr>';
      }
}
 ?>

 <?php }}else{ ?>
<tr><td>60</td><td>Lower School Course Date</td><td><?php echo $user->loweschoolcdate; ?></td></tr>
 <tr><td>61</td><td>Date of List C-I</td><td><?php echo $user->doc1; ?></td></tr>
 <tr><td>62</td><td>Date of List C-II</td><td><?php echo $user->doc2; ?></td></tr>
 <tr><td>63</td><td>Date of Offg. HC</td><td><?php echo $user->dofhc; ?></td></tr>
 <tr><td>64</td><td>Inter Mediate School Course  Passing  Date</td><td><?php echo $user->intermediatescor; ?></td></tr>
 <tr><td>65</td><td>Date of List-D</td><td><?php echo $user->dofld; ?></td></tr>
 <tr><td>66</td><td>Date of List-D-II</td><td><?php echo $user->dofld2; ?></td></tr>
 <tr><td>67</td><td>Date of Offg.ASI</td><td><?php echo $user->dateofoffasi; ?></td></tr>
 <tr><td>68</td><td>Upper School Course Passing Date</td><td><?php echo $user->upperschool; ?></td></tr>
 <tr><td>69</td><td>Date of  List E</td><td><?php echo $user->dateofliste; ?></td></tr>
 <tr><td>70</td><td>Date of List E-II</td><td><?php echo $user->dateofliste2; ?></td></tr>
 <tr><td>71</td><td>Date of Offg. SI</td><td><?php echo $user->dateoffsi; ?></td></tr>
 <tr><td>72</td><td>Date of List-F</td><td><?php echo $user->dateoflistf; ?></td></tr>
 <!-- <tr><td>70</td><td>Date of List-F-II</td><td><?php //echo $user->dateoflistf2; ?></td></tr> -->
 <tr><td>73</td><td>Date of offg. INSP</td><td><?php echo $user->dateofinsp; ?></td></tr>
<!--  <tr><td>72</td><td>Date of Promotion DSP/ASP</td><td><?php //echo $user->dopdasp; ?></td></tr>
 <tr><td>73</td><td>Date of Promotion SP</td><td><?php //echo $user->doprosp; ?></td></tr>
 <tr><td>74</td><td>Date of Promotion as CR/LR/PR if any</td><td><?php //echo $user->doprocl; ?></td></tr> -->
 <tr><td>74</td><td>Basic Training Course Institute</td><td><?php echo $user->btic; ?></td></tr>
 <tr><td>75</td><td>Batch /GroupNo.</td><td><?php echo $user->batchgroup; ?></td></tr>
 <tr><td>76</td><td>Passout Year</td><td><?php echo $user->passoutyear; ?></td></tr>
 <tr><td>77</td><td>Name of Range</td><td><?php echo $user->NameofsRanges; ?></td></tr>
 <tr><td>78</td><td>Firing Weapon</td><td><?php echo $user->tow; ?></td></tr>
<tr><td>79</td><td>Date of Firing</td><td><?php echo $user->dateofprcatice; ?></td></tr>
  <tr><td>80</td><td>Computer literate</td><td><?php echo $user->comlit; ?></td></tr>
 
  <?php if($userd!=''){ ?>
 <tr><td>81</td><td>Present Posting </td><td><?php echo $userd->fone1; ?> <?php echo $userd->fone2; ?><?php echo $userd->fone3; ?><?php echo $userd->fone4; ?><?php echo $userd->fone5; ?><?php echo $userd->fone6; ?><?php echo $userd->fone7; ?><?php echo $userd->fone8; ?><?php echo $userd->fone9; ?><?php echo $userd->fone10; ?><?php echo $userd->fone11; ?><?php echo $userd->fone12; ?><?php echo $userd->lone1; ?><?php echo $userd->lone2; ?><?php echo $userd->lone3; ?><?php echo $userd->sqone1; ?><?php echo $userd->sqone2; ?><?php echo $userd->sqone3; ?><?php echo $userd->sqone4; ?><?php echo $userd->sqone5; ?><?php echo $userd->sqone6; ?><?php echo $userd->sqone7; ?> <?php echo $userd->paone1; ?><?php echo $userd->paone2; ?><?php echo $userd->paone3; ?><?php echo $userd->paone4; ?><?php echo $userd->paone5; ?><?php echo $userd->paone6; ?><?php echo $userd->paone7; ?><?php echo $userd->paone8; ?><?php echo $userd->paone9; ?><?php echo $userd->paone10; ?><?php echo $userd->paone11; ?><?php echo $userd->paone12; ?><?php echo $userd->paone13; ?><?php echo $userd->paone14; ?><?php echo $userd->paone15; ?><?php echo $userd->paone16; ?><?php echo $userd->paone17; ?><?php echo $userd->paone18; ?><?php echo $userd->paone19; ?><?php echo $userd->paone20; ?><?php echo $userd->paone21; ?><?php echo $userd->paone23; ?><?php echo $userd->traning1; ?><?php echo $userd->traning2; ?><?php echo $userd->traning3; ?><?php echo $userd->ssone23; ?><?php echo $userd->ssone24; ?><?php echo $userd->ssone25; ?><?php echo $userd->ssone26; ?><?php echo $userd->awbone1; ?><?php echo $userd->awbone2; ?><?php echo $userd->awbone3; ?><?php echo $userd->awbone4; ?><?php echo $userd->awbone5; ?><?php echo $userd->awbone6; ?><?php echo $userd->awbone7; ?><?php echo $userd->awbone8; ?><?php echo $userd->awbone9; ?><?php echo $userd->awbone10; ?><?php echo $userd->awbone11; ?><?php echo $userd->awbone12; ?><?php echo $userd->awbone12; ?><?php echo $userd->bmdone1; ?><?php echo $userd->bmdone2; ?><?php echo $userd->bmdone3; ?><?php echo $userd->bmdone4; ?><?php echo $userd->bmdone5; ?><?php echo $userd->bmdone6; ?><?php echo $userd->bmdone7; ?><?php echo $userd->bmdone8; ?><?php echo $userd->instone1; ?><?php echo $userd->instone2; ?><?php echo $userd->instone3; ?><?php echo $userd->instone4; ?> &nbsp; <?php if($userd->vploc !=''){echo $userd->vploc.'&nbsp;';}  ?> <?php if($userd->vpdis !=''){ echo $userd->vpdis.'&nbsp;'; } ?> <?php if($userd->noj !=''){ echo $userd->noj.'&nbsp;'; }  ?> <?php if($userd->jsdis !=''){ echo $userd->jsdis.'&nbsp;'; } ?><?php if($userd->osgloc !=''){ echo $userd->osgloc.'&nbsp;'; } ?><?php if($userd->osgdis !=''){ echo $userd->osgdis.'&nbsp;'; } ?><?php if($userd->bsdnob !=''){ echo $userd->bsdnob.'&nbsp;'; } ?><?php if($userd->bsddis !=''){ echo $userd->bsddis.'&nbsp;'; } ?><?php if($userd->bsdloc !=''){ echo $userd->bsdloc.'&nbsp;'; } ?><?php if($userd->perdupod !=''){ echo $userd->perdupod.'&nbsp;'; } ?><?php if($userd->perdudis !=''){ echo $userd->perdudis.'&nbsp;'; } ?><?php if($userd->perduorno !=''){ echo $userd->perduorno.'&nbsp;'; } ?><?php if($userd->perduordate !=''){ echo $userd->perduordate.'&nbsp;'; } ?><?php if($userd->dgppod !=''){ echo $userd->dgppod; } ?><?php if($userd->dgpdis !=''){ echo $userd->dgpdis.'&nbsp;'; } ?><?php if($userd->dgporno !=''){ echo $userd->dgporno.'&nbsp;'; } ?><?php if($userd->dgpordate !=''){ echo $userd->dgpordate.'&nbsp;'; } ?> <?php if($userd->tertdpod !=''){echo $userd->tertdpod.'&nbsp;'; } ?><?php if($userd->tertddis !=''){ echo $userd->tertddis.'&nbsp;'; } ?><?php if($userd->tertdordate !=''){ echo $userd->tertdordate.'&nbsp;'; } ?><?php if($userd->sstgpod !=''){ echo $userd->sstgpod.'&nbsp;';  } ?><?php if($userd->sstgdis !=''){ echo $userd->sstgdis.'&nbsp;'; } ?><?php if($userd->sstgorno !=''){ echo $userd->sstgorno.'&nbsp;';} ?><?php if($userd->sstgordate !=''){ echo $userd->sstgordate.'&nbsp;'; } ?><?php if($userd->swatpod !=''){ echo $userd->swatpod.'&nbsp;'; } ?><?php if($userd->swatdis !=''){ echo $userd->swatdis.'&nbsp;'; } ?><?php if($userd->swatorno !=''){ echo $userd->swatorno.'&nbsp;'; } ?><?php if($userd->swatordate !=''){echo $userd->swatordate.'&nbsp;';} ?><?php if($userd->awdpmpod !=''){echo $userd->awdpmpod.'&nbsp;'; } ?><?php if($userd->awdpmorno !=''){echo $userd->awdpmorno.'&nbsp;'; } ?><?php if($userd->awdpmordate !=''){echo $userd->awdpmordate.'&nbsp;'; } ?><?php if($userd->awdpfpod !=''){echo $userd->awdpfpod.'&nbsp;';} ?><?php if($userd->awdpforno !=''){echo $userd->awdpforno.'&nbsp;'; } ?><?php if($userd->awdpfordate !=''){echo $userd->awdpfordate.'&nbsp;'; } ?><?php if($userd->awdpompod !=''){echo $userd->awdpompod.'&nbsp;';} ?><?php if($userd->awdpomorno !=''){echo $userd->awdpomorno.'&nbsp;';} ?><?php if($userd->awdpomordate !=''){echo $userd->awdpomordate.'&nbsp;'; } ?><?php if($userd->awdpofpod !=''){ echo $userd->awdpofpod.'&nbsp;'; } ?><?php if($userd->awdpoforno !=''){ echo $userd->awdpoforno.'&nbsp;'; } ?>
 <?php if($userd->awdpofordate !=''){ echo $userd->awdpofordate.'&nbsp;'; } ?><?php if($userd->dsopod !=''){ echo $userd->dsopod.'&nbsp;';} ?><?php if($userd->dsoorno !=''){ echo $userd->dsoorno.'&nbsp;'; } ?><?php if($userd->dsoordate !=''){ echo $userd->dsoordate.'&nbsp;'; } ?><?php if($userd->csojalorno !=''){ echo $userd->csojalorno.'&nbsp;'; } ?><?php if($userd->csojalordate !=''){ echo $userd->csojalordate.'&nbsp;'; } ?><?php if($userd->mispatorno !=''){ echo $userd->mispatorno.'&nbsp;'; } ?><?php if($userd->mispatordate !=''){echo $userd->mispatordate.'&nbsp;'; } ?><?php if($userd->othersnod !=''){echo $userd->othersnod.'&nbsp;'; } ?><?php if($userd->othersnodis !=''){echo $userd->othersnodis.'&nbsp;';} ?><?php if($userd->othersorno !=''){ echo $userd->othersorno.'&nbsp;';} ?><?php if($userd->othersordate !=''){echo $userd->othersordate.'&nbsp;'; } ?><?php if($userd->pssawonof !=''){ echo $userd->pssawonof.'&nbsp;'; } ?><?php if($userd->pssaworank !=''){ echo $userd->pssaworank.'&nbsp;'; } ?> <?php if($userd->pssawoordate !=''){echo $userd->pssawoordate.'&nbsp;'; } ?> <?php if($userd->osihonoo !=''){ echo $userd->osihonoo.'&nbsp;'; } ?><?php if($userd->Readerosinbo !=''){ echo $userd->Readerosinbo.'&nbsp;'; } ?><?php if($userd->Orderly !=''){ echo $userd->Orderly.'&nbsp;'; } ?><?php if($userd->telopr !=''){echo $userd->telopr.'&nbsp;';} ?><?php if($userd->darrun !=''){echo $userd->darrun.'&nbsp;';} ?><?php if($userd->bnkgdop !=''){echo $userd->bnkgdop.'&nbsp;';} ?><?php if($userd->bhogpog !=''){echo $userd->bhogpog.'&nbsp;';} ?><?php if($userd->bhogdop !=''){echo $userd->bhogdop.'&nbsp;';} ?><?php if($userd->tradestot !=''){ echo $userd->tradestot.'&nbsp;';} ?><?php if($userd->tradestt !=''){echo $userd->tradestt.'&nbsp;'; } ?><?php if($userd->tradesbat !=''){echo $userd->tradesbat.'&nbsp;';} ?><?php if($userd->tradesdop !=''){echo $userd->tradesdop.'&nbsp;';} ?><?php if($userd->tradesorno !=''){echo $userd->tradesorno.'&nbsp;';} ?><?php if($userd->mtsecpod !=''){echo $userd->mtsecpod.'&nbsp;';} ?><?php if($userd->mtsecvehno !=''){echo $userd->mtsecvehno.'&nbsp;';} ?><?php if($userd->mtsecdop !=''){echo $userd->mtsecdop.'&nbsp;';} ?><?php if($userd->mtsecorno !=''){echo $userd->mtsecorno.'&nbsp;';} ?><?php if($userd->quartbradop !=''){echo $userd->quartbradop.'&nbsp;';} ?><?php if($userd->quartbraorno !=''){echo $userd->quartbraorno.'&nbsp;';} ?><?php if($userd->recrutnorb !=''){ echo $userd->recrutnorb.'&nbsp;'; } ?><?php if($userd->recrutorno !=''){echo $userd->recrutorno.'&nbsp;'; } ?><?php if($userd->recrutordate !=''){echo $userd->recrutordate.'&nbsp;'; } ?><?php if($userd->leavefrom !=''){echo $userd->leavefrom.'&nbsp;'; } ?> <?php if($userd->leaveto !=''){echo $userd->leaveto.'&nbsp;'; } ?><?php if($userd->absentfrom !=''){echo $userd->absentfrom.'&nbsp;'; } ?><?php if($userd->absentddr !=''){echo $userd->absentddr.'&nbsp;'; } ?><?php if($userd->absentdate !=''){echo $userd->absentdate.'&nbsp;'; } ?><?php if($userd->usdos !=''){echo $userd->usdos.'&nbsp;';} ?><?php if($userd->usros !=''){echo $userd->usros.'&nbsp;';} ?><?php if($userd->cfpop !=''){echo $userd->cfpop.'&nbsp;';} ?><?php if($userd->cfppd !=''){echo $userd->cfppd.'&nbsp;';} ?><?php if($userd->cfpdop !=''){echo $userd->cfpdop.'&nbsp;';} $userd->adminstaff; ?> 

 <?php  $names = fetchoneinfodesc('seccover',array('man_id'=> $this->uri->segment(2)),'seccover_id');
        if($names !=''){
          echo'<strong>'.$names->nod.' &nbsp;'.$names->name.' &nbsp;'.$names->rank.'</strong>';
        }
        
     ?>
  </td></tr>

<?php } if(isset($userd->dateofposting1)){ ?>
<tr><td>82</td><td>Date Of Posting</td><td>
    <?php echo $userd->dateofposting1;
      ?></td></tr> <?php } ?>
 <?php } ?>
 
 <tr><td colspan="3"><strong>Professional Courses New Data (<?php echo count($professionalCourses); ?>)</strong></td></tr>
 <?php
	if(count($professionalCourses)>0){
		foreach($professionalCourses as $k=>$prof_course){
			?>
				<tr>
					<td><?php echo ($k+1);?></td>
					<td>Training Institute</td>
					<td><?php echo $prof_course['institute_name']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Name of Course</td>
					<td><?php echo $prof_course['course_name']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Duration of Course</td>
					<td><?php echo convertDate2($prof_course['start_date']).' - '.convertDate2($prof_course['end_date']); ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Order Number</td>
					<td><?php echo $prof_course['course_order_no']; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Order Date</td>
					<td><?php echo converDateFromYMDtoDMY($prof_course['course_order_date']); ?></td>
				</tr>
			<?php
		}
	}else{ ?>
		<tr>
			<td colspan="3">No Courses Found</td>
		</tr>
		<?php
	}
 ?><tr><td colspan="3"><strong>Posting History</strong></td></tr>
 <tr><td><td>Current Posting</td><td><?PHP echo $employee->getCurrentPosting();?></td></tr>
                <tr><td><td>View Posting History</td><td>
                        <button class="btn btn-primary" onClick="posting_history_obj.getPostingHistory(<?php echo $employee->getId(); ?>)">Posting History</button></td></tr>
</tbody></table>
          </div></div>
    <script src="<?php echo base_url();?>webroot/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url();?>webroot/js/jquery.dataTables.min2015.js"></script>
    <script src="<?php echo base_url();?>webroot/js/bootstrap.min.js"></script>
    <div class="modal fade modal-lg modal-posting" id="postingHistoryOfEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-in-posting" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Posting History of <span id="posting_employee_name">Dalwinderjit Singh</span>(<span id="posting_employee_battalion">27</span>/<span id="posting_employee_regimental_no">275</span>).</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <script type="text/javascript">
	  var posting_history_obj ={};
	  posting_history_obj.employee_id = null;
	  posting_history_obj.getPostingHistory = function(employee_id){
		  posting_history_obj.employee_id = employee_id;
		  if(posting_history_obj.dataTable===undefined){
			  //alert('new');
			  posting_history_obj.initialize();
		  }else{
			//  alert('old');
			  posting_history_obj.dataTable.draw();
		  }
		  $('#postingHistoryOfEmployee').modal('show');
		  //posting_history_obj.dataTable.draw();
	  }
	  $(document).ready(function(){
		  //posting_history_obj.getPostingHistory(24144);
	  });
	//########################### POSTING HISTORY OF EMPLOYEE ##################################
	posting_history_obj.initialize = function(){
		posting_history_obj.dataTable = $('#posting_history_table').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			
			//bFilter: false,
			"ajax":{
				url:"<?php echo base_url().'battalion/ajax-get-all-posting-history-by-employee-id';?>",
				type:"POST" ,
				"data":function(data){
					data.employee_id =  posting_history_obj.employee_id
				}
			},"columns": [
						{ "data": "sno"},
						{ "data": "posting_name"},
						{ "data": "order_no"},
						{ "data": "battalion"},
						{ "data": "posting_date"},
						{ "data": "order_date"},
			],
			"columnDefs":[  
					{  
						 "targets":[0,2],  
						 "orderable":false,  
					},  
					{
						"targets":[1,2],
						"className":"text-left",
					},
			], 
			"initComplete": function(settings, json) {
				//console.log(settings);
				//console.log('hi');
				//console.log(json);
				$('#posting_employee_name').html(json.name);
				$('#posting_employee_regimental_no').html(json.regimental_no);
				$('#posting_employee_battalion').html(json.battalion);
				
			},
			"drawCallback": function( settings ) {
				console.log(settings.json);
				var json = settings.json;
				$('#posting_employee_name').html(json.name);
				$('#posting_employee_regimental_no').html(json.regimental_no);
				$('#posting_employee_battalion').html(json.battalion);
			}
		}); 
		
	}
	//#############################################################
	  </script>
      <div class="modal-body" id="posting_history">
		<table class="table" id="posting_history_table" style="width:100%;">
			<thead>
				<tr><td>S.no</td><td>Posting</td><td>Order Number</td><td>Battalion</td><td>Posting Date</td><td>Order Date</td></tr>
			</thead>
			
		</table>
		
      <div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
    
</body>
</html>