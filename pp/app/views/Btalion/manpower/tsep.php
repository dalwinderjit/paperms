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
    <style type="text/css">
      .table{
        margin-bottom: 0px;
      }

    </style>
  </head>
<body> <div class="row">
          <div class="col-lg-10 col-xs-offset-1">
          <div class="table-responsive">
          <h2 class="text-center">Detail of Armed wing security cover provided to Serving Police Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Police Officer','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  $count = 0; foreach($names as $listng){ $count = $count+1; ?>

              <table border="1" >
  <tr>
    <td width="65"><strong> Sr No. </strong></td>
    <td width="274"><strong>Name of serving police officer </strong></td>
    <td width="237"><strong>Rank</strong></td>
    <td width="278"><strong>Place of posting</strong> </td>
    <td width="400"><strong>Address</strong></td>
  </tr>
  <tr>
   <td><?php echo '<strong>'.$count.'.</strong>'; ?></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td width="400"><?php echo $listng->address; ?></td>
  </tr>
  <tr>
    <td width="100"><strong>Sr No.</strong> </td>
    <td><table width="310">
      <tr>
        <td width="250"><strong><strong>Rank & Name</strong> </td>
        <td width="90"><strong>Dept.No </strong></td>
      </tr>
    </table></td>
    <td><table width="287">
      <tr>
        <td width="121"><strong>BN</strong></td>
        <td width="150"><strong>Nature of duty </strong></td>
      </tr>
    </table></td>
    <td><table width="295">
      <tr>
        <td width="120"><strong>Mobile No.</strong> </td>
        <td width="159"><strong>Order By</strong> </td>
      </tr>
    </table></td>
    <td><strong>Order No. &amp; date </strong></td>
  </tr>
  <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
    <tr>
    <td><?php echo $nc.')'; ?></td>
    <td><table width="310" >
      <tr>
        <td width="250"><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));
        if($a !=''){

         echo $a->cexrank.'&nbsp;'.$a->name;} ?></td>
        
        <td width="90"><?php if($a !=''){ echo $a->depttno; } ?></td>
      </tr>
    </table></td>
    <td><table width="287">
      <tr>
        <td width="121"><?php  if($a !=''){ echo $a->battalion; }  ?></td>
        <td width="150"><?php  if($a !=''){ echo $value->nod; } ?></td>
      </tr>
    </table></td>
    <td><table width="295">
      <tr>
        <td width="120"><?php  if($a !=''){ echo $a->phono1; } ?></td>
        <td width="159"><?php  if($a !=''){ echo $value->orderby; } ?></td>
      </tr>
    </table></td>
    <td><?php echo $value->orderno.'<br/> Dated: '.$value->order_date; ?></td>
  </tr>
  <?php } ?>
</table>

      
            <br/> <?php } ?>

 <h2 class="text-center">Detail of Armed wing security cover provided to Retired Police Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Retired Police Officer','bat_id' => $this->session->userdata('userid')));  ?>
              <?php $count = 0;  foreach($names as $listng){ $count = $count+1; ?>
              <table  border="1">
  <thead>
    <tr>
      <td width="65"> Sr.No.</td>
      <td width="274">Name of police officer</td>
      <td width="237">Rank</td>
      <td width="278">Place of posting</td>
      <td width="400">Address</td>
      <td width="100">Mobile No.</td>
    </tr>
  </thead>
  <tbody>
  <tr>
<td><?php echo '<strong>'.$count.'.</strong>'; ?></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
<td><?php echo $listng->mobile; ?></td>
</tr>
    <tr> <td  colspan="5"></td>
    </tr>
  </tbody>
</table>
<table  border="1">
                    <tr>
                    <td width="65"> Sr.No.</th>
                    <td width="274">Name of officials</th>
                    <td width="237">Dept.No</th>
                    <td width="278">BN</th>
                    <td width="200">Nature of duty</th>
                    <td width="100">Mobile No.</th>
                   <td width="100">Order by</th>
                    <td width="100">Order No. & date</th>
                 </tr>
                  <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                  <td><?php echo $nc.')'; ?></td> 
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id)); 
                   if($a !=''){ echo $a->name; } ?></td>
                   <td><?php  if($a !=''){ echo $a->depttno; } ?></td>
                  <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; }?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'<br/> Dated: '.$value->order_date; ?></td>
                  </tr>
                  <?php } ?>
                  </table>
      
            <hr/> <?php } ?>


              <h2 class="text-center">Detail of Armed wing security cover provided to Political Leaders</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Political Persons','bat_id' => $this->session->userdata('userid')));  ?>
              <?php $count = 0;   foreach($names as $listng){ $count = $count+1; ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td><?php echo '<strong>'.$count.'.</strong>'; ?></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                 <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                   <td><?php echo $nc.')'; ?></td>   
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id)); 
                   if($a !=''){echo $a->name; }  ?></td>
                   <td><?php  if($a !=''){ echo $a->depttno; } ?></td>
                  <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr>
                  <?php } ?>
                  </table></td>
    </tr>
  </tbody>
</table>
      
            <hr/> <?php } ?>


             <h2 class="text-center">Detail of Armed wing security cover provided to Civil Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Civil Officers','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                 <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                   <td><?php echo $nc.')'; ?></td>  
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id)); 
                   if($a !=''){ echo $a->name; } ?></td>
                   <td><?php  if($a !=''){ echo $a->depttno; } ?></td>
                  <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php echo $a->phono1; ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr>
                  <?php } ?>
                  </table></td>
    </tr>
  </tbody>
</table>
      
            <hr/> <?php } ?>


            <h2 class="text-center">Detail of Armed wing security cover provided to Retired Civil Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Retired Civil Officer','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?></td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                  <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                   <td><?php echo $nc.')'; ?></td>   
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));  if($a !=''){echo $a->name; } ?></td>
                  <td><?php  if($a !=''){ echo $a->depttno; } ?></td>
                  <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr>
                  <?php } ?>
                  </table></td>
    </tr>
  </tbody>
</table>
      
            <hr/> <?php } ?>


              <h2 class="text-center">Detail of Armed wing security cover provided to Judicial Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Judicial Officers','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?></td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                 <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                  <td><?php echo $nc.')'; ?></td>   
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));
                   if($a !=''){ echo $a->name; } ?></td>
                   <td><?php  if($a !=''){echo $a->depttno;} ?></td>
                  <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr><?php } ?></table></td>
    </tr>
  </tbody>
</table>
      
            <hr/> <?php } ?>


              <h2 class="text-center">Detail of Armed wing security cover provided to Retired Judicial Officers</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Retired Judicial Officer','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                 <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                   <td><?php echo $nc.')'; ?></td>    
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));
                   if($a !=''){ echo $a->name; } ?></td>
                   <td><?php  if($a !=''){echo $a->depttno; } ?></td>
                 <td><?php  if($a !=''){echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr><?php } ?></table></td>
    </tr>
  </tbody>
</table>
            <hr/> <?php } ?>
      <h2 class="text-center">Detail of Armed wing security cover provided to Threatened Persons</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'Threatening persons','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of protectee</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                  <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                  <td><?php echo $nc.')'; ?></td>   
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));
                   if($a !=''){ echo $a->name; } ?></td>
                   <td><?php  if($a !=''){echo $a->depttno; } ?></td>
                 <td><?php  if($a !=''){ echo $a->battalion; } ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){ echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr> <?php } ?></table></td>
    </tr>
  </tbody>
</table>
            <hr/> <?php } ?>
             <h2 class="text-center">Detail of Armed wing security cover provided to Armed Battalions Police</h2>
           <?php $names = fetchinfoosi('seccover',array('status'=> 1,'tname' => 'PERSONAL SECURITY STAFF ARMED WING OFFICER','bat_id' => $this->session->userdata('userid')));  ?>
              <?php  foreach($names as $listng){ ?>
              <table>
  <thead>
    <tr>
      <th> Sr.No.</th>
      <th>Name of police officer</th>
      <th>Rank</th>
      <th>Place of posting</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
  <tr>
<td></td>
<td><?php echo $listng->name; ?> </td>
<td><?php echo $listng->rank.$listng->des; ?></td>
<td><?php echo $listng->placeofposting; ?></td>
<td><?php echo $listng->address; ?></td>
</tr>
    <tr> <td  colspan="5"><table>
                    <tr>
                    <th> Sr.No.</th>
                    <th>Name of officials</th>
                    <th>Dept.No</th>
                    <th>BN</th>
                    <th>Nature of duty</th>
                    <th>Mobile No.</th>
                    <th>Order by</th>
                    <th>Order No. & date</th>
                 </tr>
                 <?php $nlist =  fetchoneinfoall('seccover',array('name' => $listng->name,'bat_id' => $this->session->userdata('userid'))); $nc = 0;  foreach ($nlist as $value){ $nc = $nc + 1; ?>
                  <tr>
                  <td><?php echo $nc.')'; ?></td>    
                  <td><?php $a = fetchoneinfo('newosi',array('man_id' => $value->man_id));  if($a !=''){echo $a->name; } ?></td><td><?php  if($a !=''){echo $a->depttno; } ?></td>
                  <td><?php  if($a !=''){echo $a->battalion;} ?></td>
                  <td><?php echo $value->nod; ?></td>
                  <td><?php  if($a !=''){echo $a->phono1; } ?></td>
                  <td><?php echo $value->orderby; ?></td>
                  <td><?php echo $value->orderno.'&nbsp;'.$value->order_date; ?></td>
                  </tr><?php } ?></table></td>
    </tr>
  </tbody>
</table>
            <hr/> <?php } ?>

 <div>Report genrated by: <strong><?php echo $this->session->userdata('username'); ?></strong> <span class="pull-right">Date: <strong><?php echo date('d-m-Y h:i:A'); ?></strong></span></div>
              
          </div><!-- table-responsive -->  </div></div>
</body>
</html>