<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

            <table>
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Type of Weapon </th>
                    <th>Body No.</th>
                     <th>Butt No</th>
                      <th>Received From</th>
                       <th>Received Mode </th>
                        <th>Received Voucher/ RC No.  </th>
                         <th>Received Date</th>
                         <th>No. of Magazine Received</th>
                          <th>Condition of Weapon </th>
                           <th>Status of Serviceable  Weapon </th>
                            <th>Status of Un-Serviceable weapon in Kot</th>
                             <th>If Condemn then Date of condemn</th>
                              <th>Last RA Inspection Date</th>
                              <th>Last AIA Inspection Date</th>
                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->tow; ?></td>
                    <td><?php echo $value->bono; ?></td>
                    <td><?php echo $value->buno; ?></td>
                    <td><?php echo $value->recform; ?></td>
                    <td><?php echo $value->recmod; ?></td>
                    <td><?php echo $value->recvoc; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->magrec; ?></td>
                    <td><?php echo $value->conofwap; ?></td>
                    <td><?php echo $value->staofserv; ?></td>
                    <td><?php echo $value->unwepkot; ?></td>
                    <td><?php echo $value->condate; ?></td>
                    <td><?php echo $value->raidate; ?></td>
                    <td><?php echo $value->alaidate; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>