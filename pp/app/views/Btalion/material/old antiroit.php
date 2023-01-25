<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>MSK Report</title>
       <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
           <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
        <h3 class="text-center">DETAIL OF ANTI RIOT & SECURITY EQUIPMENTS  <?php $val = explode(' ', $this->session->userdata('nick')); echo $val[0];  ?> BATTALION,PAP JRC.</h3>
        <div class="row">
          <div class="col-sm-10 col-xs-offset-1">
            <table class="table table-bordered"  id="table">
              <thead>
                 <tr>
                  <th>Sr No.</th>
                  <th>Name of Equipments </th>
                  <th>Sanctioned</th>
                  <th>Holding</th>
                  <th>Issued</th>
                  <th>Total In Store</th>
                  <th>Serviceable</th>
                  <th>Un-Serviceable</th>
                  <th>Temp-Recevied from other Unit</th>
                  <th>Temp-Issued to other Unit</th>
                 </tr>
              </thead>
              <tbody>
              <tr><td colspan="9">Category (A) Anti Riot Equipments</td></tr>
              <tr>
                <td>1</td>
                <td>Body protector Set</td>
                <td><?php $sans = info_fetch_msksan('Body Protector',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Body Protector',$this->session->userdata('userid'));
                $holds = info_fetch_countmskitemiis('Body Protector',$this->session->userdata('userid'));  
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>ProtectiveVest</td>
                <td><?php $sans = info_fetch_msksan('ProtectiveVest',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('ProtectiveVest',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('ProtectiveVest',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>3</td>
                <td>P.C Shield</td>
                  <td><?php $sans = info_fetch_msksan('PC Shield',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Shield',$this->session->userdata('userid'));
                $holds = info_fetch_countmskitemiis('PC Shield',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $hold->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>4</td>
                <td>Cane Shield</td>
                  <td><?php $sans = info_fetch_msksan('Cane Shield',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Cane Shield',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Cane Shield',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>5</td>
                <td>Helmet</td>
                   <td><?php $sans = info_fetch_msksan('Helmet',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Helmet',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Helmet',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty+$holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php $holds = info_fetch_countmskitemiis('Helmet',$this->session->userdata('userid')); 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>6</td>
                <td> FRB Helmet</td>
                   <td><?php $sans = info_fetch_msksan('FRB Helmet',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('FRB Helmet',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('FRB Helmet',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>7</td>
                <td> P.C Lathies Small</td>
                 <td><?php $sans = info_fetch_msksan('PC Lathies',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PC Lathies',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('PC Lathies',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                 <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>8</td>
                <td>Lathies Short Bamboos</td>
                 <td><?php $sans = info_fetch_msksan('Lathies Short Bamboos',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Short Bamboos',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Lathies Short Bamboos',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Lathies Long Bamboos</td>
                <td><?php $sans = info_fetch_msksan('Lathies Long Bamboo',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Lathies Long Bamboo',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Lathies Long Bamboo',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Shock Battons Jawala</td>
                <td><?php $sans = info_fetch_msksan('Shock Battons Jawala',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Shock Battons Jawala',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php $holds = info_fetch_countmskitemiis('Shock Battons Jawala',$this->session->userdata('userid')); 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>11</td>
                <td>Riot Control Barricade</td>
                 <td><?php $sans = info_fetch_msksan('Riot Control Barricade',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Riot Control Barricade',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Riot Control Barricade',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr><td colspan="9">Category (B) Bullet Proof Equipments</td></tr>
            <tr>
                <td>1</td>
                <td>B.P Jacket (Weight Wise in KG)</td>
                 <td><?php $sans = info_fetch_msksan('B.P Jacket',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Jacket',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('B.P Jacket',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>B.P Morcha</td>
                <td><?php $sans = info_fetch_msksan('B.P Morcha',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Morcha',$this->session->userdata('userid'));
                 $holds = info_fetch_countmskitemiis('B.P Morcha',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>3</td>
                <td>B.P Patka</td>
                <td><?php $sans = info_fetch_msksan('B.P Patka',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Patka',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('B.P Patka',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>4</td>
                <td>B.P Helmet</td>
                <td><?php $sans = info_fetch_msksan('B.P Helmet',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('B.P Helmet',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('B.P Helmet',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
              <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr><td colspan="9">Category (C) Security Equipments</td></tr>
                           <tr>
                <td>1</td>
                <td>Mega Phone</td>
                <td><?php $sans = info_fetch_msksan('Mega Phone',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Mega Phone',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Mega Phone',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Mobile Loud Speaker</td>
                <td><?php $sans = info_fetch_msksan('Mobile Loud Speaker',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Mobile Loud Speaker',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Mobile Loud Speaker',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
                <<td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>3</td>
                <td>P.A System</td>
                <td><?php $sans = info_fetch_msksan('PA System',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('PA System',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('PA System',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>4</td>
                <td>Telescope</td>
                <td><?php $sans = info_fetch_msksan('Telescope',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Telescope',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Telescope',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
             <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
                <tr>
                <td>5</td>
                <td>Night Vision Device</td>
                <td><?php $sans = info_fetch_msksan('Night Vision Device',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Night Vision Device',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Night Vision Device',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>6</td>
                <td>Binocular</td>
                <td><?php $sans = info_fetch_msksan('Binocular',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Binocular',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Binocular',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Still Photography Camera</td>
              <td><?php $sans = info_fetch_msksan('Still Photography Camera',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Still Photography Camera',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Still Photography Camera',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>8</td>
                <td> Video Camera</td>
                <td><?php $sans = info_fetch_msksan('Video Camera',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Video Camera',$this->session->userdata('userid'));
                $holds = info_fetch_countmskitemiis('Video Camera',$this->session->userdata('userid'));  
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Search Light</td>
               <td><?php $sans = info_fetch_msksan('Search Light',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Search Light',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Search Light',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Dragon Light</td>
                <td><?php $sans = info_fetch_msksan('Dragon Light',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Dragon Light',$this->session->userdata('userid')); 
                   $holds = info_fetch_countmskitemiis('Dragon Light',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>11</td>
                <td>Commando Light</td>
                <td><?php $sans = info_fetch_msksan('Commando Light',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Commando Light',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Commando Light',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Halgon Light</td>
                <td><?php $sans = info_fetch_msksan('Halgon Light',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Halgon Light',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Halgon Light',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>13</td>
                <td>Emergency Light</td>
                <td><?php $sans = info_fetch_msksan('Emergency Light',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Emergency Light',$this->session->userdata('userid'));
                $holds = info_fetch_countmskitemiis('Emergency Light',$this->session->userdata('userid'));  
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>

              <tr>
                <td>14</td>
                <td>Flood Phone</td>
                <td><?php $sans = info_fetch_msksan('Flood Phone',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Flood Phone',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Flood Phone',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty +  $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>15</td>
                <td>HHMD</td>
                <td><?php $sans = info_fetch_msksan('HHMD',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('HHMD',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('HHMD',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>16</td>
                <td>DFMD</td>
                <td><?php $sans = info_fetch_msksan('DFMD',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('DFMD',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('DFMD',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td> -</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>17</td>
                <td>Periscope</td>
                <td><?php $sans = info_fetch_msksan('Periscope',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Periscope',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Periscope',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>18</td>
                <td>Letter Bomb Detector</td>
                <td><?php $sans = info_fetch_msksan('Letter Bomb Detector',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Letter Bomb Detector',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Letter Bomb Detector',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
               <td> -</td>
              <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>19</td>
                <td>Inspection Mirror Trolly</td>
                <td><?php $sans = info_fetch_msksan('Inspection Mirror Trolly',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror Trolly',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror Trolly',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>20</td>
                <td>Inspection Mirror over vehicle</td>
                <td><?php $sans = info_fetch_msksan('Inspection Mirror over vehicle',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror over vehicle',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror over vehicle',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
              <tr>
                <td>21</td>
                <td>Inspection Mirror over head</td>
                <td><?php $sans = info_fetch_msksan('Inspection Mirror over head',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Inspection Mirror over head',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Inspection Mirror over head',$this->session->userdata('userid'));
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php  
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
               <tr>
                <td>22</td>
                <td>Prodder/Probe</td>
               <td><?php $sans = info_fetch_msksan('Prodder/Probe',$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                <td><?php $hold = info_fetch_countmskitemii('Prodder/Probe',$this->session->userdata('userid')); 
                $holds = info_fetch_countmskitemiis('Prodder/Probe',$this->session->userdata('userid')); 
                 if($hold!=''){echo $hold->qty + $holds->issued;}else{echo "-";}
                 ?></td>
                <td><?php 
                if($holds!=''){echo  $holds->issued;}else{echo "-";}
                 ?></td>
                  <td><?php if($holds!='' || $hold!=''){echo  $hold->qty + $holds->issued - $holds->issued;}else{echo "-";} ?></td>
                 <td> -</td>
               <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>


                <?php   if($info!=''){ $count = 0;  
                $alldata = fetchinfo('newmsk',array('typeofitem' => $info,'bat_id' => $this->session->userdata('userid')));
                 foreach($alldata as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofitem;  ?></td>
                    <td><?php echo $value->nameofitem;  ?></td>
                    <td><?php $sans = info_fetch_msksan($value->nameofitem,$this->session->userdata('userid')); if($sans!=''){echo $sans->san;}else{echo "-";} ?></td>
                    <td><?php $hold = info_fetch_countmskitem($value->nameofitem,$this->session->userdata('userid')); echo $hold; ?></td>
                    <td><?php  $issued = info_fetch_countmskitemussued($value->nameofitem,$this->session->userdata('userid')); echo $issued; ?></td>
                    <td>-</td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
               <tfoot>
                <tr>
                  <td colspan="10">Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></td>
                </tr>
              </tfoot>
           </table>
            </div>
              </div>
</body>
</html>