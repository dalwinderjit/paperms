
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webroot/images/favicon.png" type="image/png">
    <title>All Modules Report</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.default.css" />
          <script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>

<h3 class="text-center">All MODULES REPORT 75th BATTALION,PAP JRC.</h3>
<div class="row">
<h3 class="text-center">MSK</h3>
<div class="col-xs-8 col-xs-offset-2">
	 <table class="table table-fixedheader table-bordered"  id="table">
              <thead>
                 <tr>
                    <th>Type of items </th>
                    <th>Holding</th>
                     <th>In Store</th>
                      <th>Issued</th>
                 </tr>
              </thead>
              <tbody>
                <?php $count = 0; if($msk!=''){ $count = $count+1; foreach($msk as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->typeofitem;  ?></td>
                    <td><?php $a = array(); $hold = info_fetch_countmskfall($value->typeofitem,$ninfo); foreach($hold as $vals){
                      $a[$count] = $vals->total;
                      echo $vals->total;
                    } ?></td>
                    <td><?php $b = array();  $issued = info_fetch_countmskissuedfall($value->typeofitem,$ninfo); foreach($issued as $vals){
                     $b[$count] = $vals->totali;
                       $vals->totali;
                    } ?><?php echo $a[$count]-  $b[$count]; ?></td>
                    <td><?php   $issued = info_fetch_countmskissuedfall($value->typeofitem,$ninfo); foreach($issued as $vals){
                       echo $vals->totali;
                    } ?></td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div>
</div>

<div class="row">
<h3 class="text-center">KHC</h3>
<div class="col-xs-8 col-xs-offset-2">
	     <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>Type of Weapon </th>
                    <th>Holding</th>
                     <th>In Kot</th>
                      <th>Issued</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($arm!=''){ foreach($arm as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->tow;  ?></td>
                    <td><?php $hold = info_fetch_countarm($value->tow,$ninfo2); echo $hold; ?></td>
                    <td><?php  $issued = info_fetch_countarmissued($value->tow,$ninfo2); echo  $hold - $issued; ?></td>
                    <td><?php  echo $issued; ?></td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div>
</div>

<div class="row">
<h3 class="text-center">OSI</h3>
<div class="col-xs-8 col-xs-offset-2">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>Rank </th>
                    <th>Sanctioned</th>
                     <th>Posted</th>
                      <th>Vacancy</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($osi!=''){ foreach($osi as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->presentrank;  ?></td>
                    <td><?php $hold = info_fetch_countosi($value->presentrank,$ninfo3); if($hold!=''){echo $hold->san;}else{echo "-";}  ?></td>
                    <td><?php $issued = info_fetch_countosirank($value->presentrank,$ninfo3); echo $issued;?></td>
                    <td><?php if($hold ==''){echo 0;}else{
                      $total =   $hold->san - $issued; echo $total;  } ?></td>
                      </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
</div></div>

<div class="row">
<h3 class="text-center">Quarter</h3>
<div class="col-xs-8 col-xs-offset-2">
            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>Type of Quarter </th>
                    <th>Occupied</th>
                     <th>Vacant</th>
                      <th>Total</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($msk!=''){ foreach($qtr as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->typeofqtr;  ?></td>
                    <td><?php  $issued = info_fetch_countisuequtr($value->typeofqtr,$ninfo4); echo  $issued; ?></td>
                    <td><?php $hold = info_fetch_countqutr($value->typeofqtr,$ninfo4); echo $hold - $issued;  ?> </td>
                    <td><?php echo $hold;  ?></td>
                    </tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div> </div>

           <div class="row">
           <h3 class="text-center">MTO</h3>
<div class="col-xs-8 col-xs-offset-2">
           	            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>Type of Vehicle </th>
                    <th>Sanctioned</th>
                     <th>Holding</th>
                      <th>In MT</th>
                      <th>On duty</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($mto!=''){ foreach($mto as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->catofvechicle;  ?></td>
                    <td><?php  $ranks = info_fetch_countmto($value->catofvechicle,$ninfo5); if($ranks!=''){echo  $ranks->san;}else{echo "-";} ?> </td>
                    <td><?php $hold = info_fetch_countmtoall($value->catofvechicle,$ninfo5); echo $hold; ?> </td>
                    <td><?php $inmt = info_fetch_countmtoin($value->catofvechicle,$ninfo5); echo $hold - $inmt ; ?></td>
                    <td> <?php echo  $inmt ; ?></td></tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div></div>

<?php if($this->session->userdata('nick') == '7th Bn. PAP'){ ?>
           <div class="row">
           <h3 class="text-center">MOUNT</h3>
<div class="col-xs-8 col-xs-offset-2">
           	            <table class="table  table-fixedheader"  id="table">
              <thead>
                 <tr>
                    <th>Sanctioned </th>
                    <th>Holding</th>
                     <th>In stable</th>
                      <th>Other units</th>
                      <th>Total</th>
                 </tr>
              </thead>
              <tbody>
                <?php  if($mount!=''){ foreach($mount as $value): ?>
                 <tr class="odd gradeX">
                    <td><?php echo $value->san;  ?></td>
                    <td><?php  $holdding = info_fetch_counthorse(); echo $holdding; ?> </td>
                    <td><?php echo $holdding; ?> </td>
                    <td>-</td>
                    <td> <?php echo $value->san;  ?></td></tr>
                <?php endforeach; } ?>
              </tbody>
           </table>
           </div></div>
           <?php } ?>
</body>
</html>